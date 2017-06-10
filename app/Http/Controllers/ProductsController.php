<?php

namespace App\Http\Controllers;


use App\Area;
use App\Category;
use App\Core\Cart\Cart;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\ProductDetail;
use Auth;
use Cache;
use Request;

class ProductsController extends Controller
{
    /**
     * @var Product
     */
    private $productModel;
    /**
     * @var Area
     */
    private $areaModel;
    /**
     * @var Category
     */
    private $categoryModel;
    /**
     * @var Cart
     */
    private $cart;

    /**
     * @param Product $productModel
     * @param Area $areaModel
     * @param Category $categoryModel
     * @param Cart $cart
     * @internal param Category $category
     */
    public function __construct(Product $productModel,Area $areaModel, Category $categoryModel, Cart $cart)
    {
        $this->productModel = $productModel;
        $this->middleware('auth')->only('favorite');
        $this->middleware('area')->only(['index','getProductsForCategory']);
        $this->areaModel = $areaModel;
        $this->categoryModel = $categoryModel;
        $this->cart = $cart;
    }

    /**
     * Show All products
     *
     * @return mixed
     */
    public function index()
    {
        $selectedArea = Cache::get('selectedArea');

        $area = $this->areaModel->with(['stores'=>function($q){
            $q->select(['id']);
        }])->find($selectedArea['id']);

        $areaStores = $area->stores->pluck('id');

        $parentCategories = $this->categoryModel->with('children.products')->where('parent_id',0)->get();

        $parentCategories->map(function($parentCategory) use ($areaStores) {
            $childCategories = $parentCategory->children->pluck('id')->toArray();
            $parentCategory->products =
                $this->productModel
                    ->has('detail')
                    ->with(['detail','store','userLikes'])
                    ->whereIn('store_id',$areaStores)
                    ->childrenCategoryProducts($childCategories)
                    ->select('products.*')
                    ->limit(4)
                    ->get();
        });

        $cartItems = $this->cart->getItems();

        return view('products.index', compact('parentCategories','cartItems'));
    }


    /**
     * @param $categorySlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show 4 items for Each Category
     */
    public function getProductsForCategory($categorySlug)
    {
        $cartItems = $this->cart->getItems();

        $selectedArea = Cache::get('selectedArea');

        $area = $this->areaModel->with(['stores'=>function($q){
            $q->select(['id']);
        }])->find($selectedArea['id']);

        $areaStores = $area->stores->pluck('id');

        $category = $this->categoryModel->with('children')->where('slug_en',$categorySlug)->orWhere('slug_ar',$categorySlug)->first();

        $isParent = false;

        if($category->parent_id === 0) {
            $isParent = true;
            $category->children->map(function($childCategory) use ($areaStores) {
                $childCategory->products =
                    $this->productModel
                        ->has('detail')
                        ->with(['detail','store','userLikes'])
                        ->whereIn('store_id',$areaStores)
                        ->childrenCategoryProducts([$childCategory->id])
                        ->select('products.*')
                        ->limit(4)
                        ->get();
            });
        } else {
            $category->products = $this->productModel
                ->has('detail')
                ->with(['detail','store','userLikes'])
                ->whereIn('store_id',$areaStores)
                ->childrenCategoryProducts([$category->id])
                ->select('products.*')
                ->limit(4)
                ->get();
        }

        return view('products.category.index', compact('category','cartItems', 'isParent'));

    }

    /**
     * @param $categorySlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show All Items
     */
    public function getAllProductsForCategory($categorySlug)
    {
        $cartItems = $this->cart->getItems();
        $selectedArea = Cache::get('selectedArea');

        $area = $this->areaModel->with(['stores'=>function($q){
            $q->select(['id']);
        }])->find($selectedArea['id']);

        $areaStores = $area->stores->pluck('id');

        $category = $this->categoryModel->with('children')->where('slug_en',$categorySlug)->orWhere('slug_ar',$categorySlug)->first();

        $childCategories = [$category->id];

        if($category->parent_id === 0 ) {
            $childCategories = $category->children->pluck('id')->toArray();
        }

        $category->products =
            $this->productModel
                ->has('detail')
                ->with(['detail','store','userLikes'])
                ->whereIn('store_id',$areaStores)
                ->childrenCategoryProducts($childCategories)
                ->select('products.*')
                ->paginate(30);

        return view('products.category.view', compact('category','cartItems'));

    }

    public function show(\Request $request, $id, $name)
    {
        $product = $this->productModel->find($id);
        $cartItems = $this->cart->getItems();

        return view('products.view',compact('product','cartItems'));
    }

    /**
     * Create product
     *
     * @return mixed
     */
    public function create()
    {
        return view('backend.shared.products.create');
    }

    /**
     * Create a product
     *
     * @var CreateProductRequest $request
     *
     * @return mixed
     */
    public function store(CreateProductRequest $request)
    {
        $attributes = $request->only(['store_id','sku', 'name_en', 'name_ar']);
        $attributesDetails = $request->only(['price','weight', 'is_sale', 'sale_price', 'start_sale_date','end_sale_date', 'quantity', 'description_en', 'description_ar','main_image']);
        $product = $this->product->create($attributes);

        $details = new ProductDetail([
            'price' => $attributesDetails['price'],
            'weight' => $attributesDetails['weight'],
            'is_sale' => $attributesDetails['is_sale'],
            'sale_price' => $attributesDetails['sale_price'],
            'start_sale_date' => $attributesDetails['start_sale_date'],
            'end_sale_date' => $attributesDetails['end_sale_date'],
            'quantity' => $attributesDetails['quantity'],
            'description_en' => $attributesDetails['description_en'],
            'description_ar' => $attributesDetails['description_ar'],
            'main_image' => $attributesDetails['main_image'],
        ]);

        $product->detail()->save($details);

        return redirect('manager/products');
    }

    /**
     * Edit product
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $product = $this->product->getById($id);

        return view('manager.product.edit', compact('product'));
    }

    /**
     * Update a product
     *
     * @var integer $id
     * @var UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateProductRequest $request)
    {
        $attributes = $request->only(['store_id','sku', 'name_en', 'name_ar']);
        $attributesDetails = $request->only(['price','weight', 'is_sale', 'sale_price', 'start_sale_date','end_sale_date', 'quantity', 'description_en', 'description_ar','main_image']);
        $product = $this->product->update($id, $attributes);

        $details = new ProductDetail([
            'price' => $attributesDetails['price'],
            'weight' => $attributesDetails['weight'],
            'is_sale' => $attributesDetails['is_sale'],
            'sale_price' => $attributesDetails['sale_price'],
            'start_sale_date' => $attributesDetails['start_sale_date'],
            'end_sale_date' => $attributesDetails['end_sale_date'],
            'quantity' => $attributesDetails['quantity'],
            'description_en' => $attributesDetails['description_en'],
            'description_ar' => $attributesDetails['description_ar'],
            'main_image' => $attributesDetails['main_image'],
        ]);

        $product->detail()->save($details);

        return redirect()->route('products.index');
    }

    /**
     * Delete a product
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $this->product->delete($id);

        return redirect()->route('product.index');
    }

    /**
     * Disable a product
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function disable($id)
    {
        $this->product->disable($id);

        return redirect()->route('products.index');
    }

    /**
     * Activate a product
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function activate($id)
    {
        $this->productModel->activate($id);

        return redirect()->route('products.index');
    }

    public function favorite(Request $request,$id)
    {
        $user = Auth::user();
        $product = $this->productModel->find($id);
        if($product->userLikes->contains('id',$user->id)){
            $product->userLikes()->detach($user->id);
        } else {
            $product->userLikes()->attach($user->id);
        }
        return redirect()->back();
    }


}

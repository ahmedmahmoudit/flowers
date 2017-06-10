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
        //#@todo get only for current country and area

        // get user country
        $selectedArea = Cache::get('selectedArea');

        $area = $this->areaModel->with(['stores'=>function($q){
            $q->select(['id']);
        }])->find($selectedArea['id']);

        $areaStores = $area->stores->pluck('id');

        $parentCategories = $this->categoryModel->where('parent_id',0)->get();

        $products = $this->productModel->has('detail')->with(['detail','store','userLikes'])->whereIn('store_id',$areaStores);

        $parentCategories->map(function($parentCategory) use ($areaStores,$products) {
            $childCategories = $parentCategory->children->pluck('id')->toArray();
            $parentCategory->products = $products->childrenCategoryProducts($childCategories)->select('products.*')->limit(4)->get();
        });

//        foreach ($parentCategories as $category) {
//            foreach ($category->products as $product) {
//                dd($product->userLikes->pluck('id')->toArray());
//                print_r($product->userLikes->contains('id',auth()->id()));
//            }
//        }

        $cartItems = $this->cart->getItems();

        return view('products.index', compact('parentCategories','cartItems'));
    }

    /**
     * @param Request $request
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProductsForCategory(Request $request, $categorySlug)
    {

        //#@todo get only for current country and area
        $cartItems = $this->cart->getItems();

        // get user country
        $selectedArea = Cache::get('selectedArea');

        $area = $this->areaModel->with(['stores'=>function($q){
            $q->select(['id']);
        }])->find($selectedArea['id']);

        $areaStores = $area->stores->pluck('id');

        $category = $this->categoryModel->where('slug_en',$categorySlug)->orWhere('slug_ar',$categorySlug)->first();

        $products = $this->productModel->has('detail')->with(['detail','store','userLikes'])->whereIn('store_id',$areaStores);

        if($category->parent_id === 0) {

            $childCategories = $category->children->pluck('id')->toArray();
            $category->products = $products->childrenCategoryProducts($childCategories)->select('products.*')->limit(4)->get();
            return view('products.category.index', compact('category','cartItems'));

        } else {
            $category->products = $products->childrenCategoryProducts([$category->id])->select('products.*')->limit(40)->get();
            return view('products.category.view', compact('category','cartItems'));
        }

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

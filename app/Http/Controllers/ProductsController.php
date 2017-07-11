<?php

namespace App\Http\Controllers;


use App\Area;
use App\Category;
use App\Core\Cart\Cart;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\ProductDetail;
use App\Store;
use Auth;
use Cache;
use DB;
use Illuminate\Http\Request;

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
     * @var Store
     */
    private $storeModel;

    protected $deliveryTimes = [
        'en' =>['morning 6-12am','afternoon 12-4pm','4-8pm'],
        'ar' =>['morning 6-12am','afternoon 12-4pm','4-8pm']
    ];

    protected $selectedPriceFrom = 50;
    protected $selectedPriceTo = 150;

    /**
     * @param Product $productModel
     * @param Area $areaModel
     * @param Category $categoryModel
     * @param Cart $cart
     * @param Store $storeModel
     * @internal param Category $category
     */
    public function __construct(Product $productModel,Area $areaModel, Category $categoryModel, Cart $cart,Store $storeModel)
    {
        $this->middleware('auth')->only('favorite');
        $this->middleware('area')->only(['index','getProductsForCategory','getAllProductsForCategory','searchProducts']);
        $this->productModel = $productModel;
        $this->areaModel = $areaModel;
        $this->categoryModel = $categoryModel;
        $this->cart = $cart;
        $this->storeModel = $storeModel;
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

    public function bestSellers(Request $request)
    {
        //@todo : replace with the best selling products

        $bestSellers  = $this->productModel->has('detail')->with(['detail','store','userLikes']);

        if($request->sort) {
            switch ($request->sort) {
                case 'price-l-h':
                    $bestSellers->join('product_details','products.id','=','product_details.product_id')
                        ->orderBy('price','ASC');
                    break;
                case 'price-h-l':
                    $bestSellers->join('product_details','products.id','=','product_details.product_id')
                        ->orderBy('price','DESC');
                    break;
                default:
                    break;
            }
        } else {
            $bestSellers = $bestSellers->latest();
        }

        $bestSellers = $bestSellers->paginate(20);

        $cartItems = $this->cart->getItems();

        $sort = $request->sort;

        return view('products.top',compact('bestSellers','cartItems','sort'));
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
     * @param Request $request
     * @param $categorySlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View Show All Items
     * Show All Items
     */
    public function getAllProductsForCategory(Request $request,$categorySlug)
    {
        $searchTerm = $request->has('term') ? $request->get('term') : '';
        $selectedCategory = $categorySlug;
        $cartItems = $this->cart->getItems();
        $selectedArea = Cache::get('selectedArea');

        $priceRangeFrom = $request->has('pricefrom') ? $request->get('pricefrom') : $this->selectedPriceFrom;
        $priceRangeTo = $request->has('priceto') ? $request->get('priceto') : $this->selectedPriceTo;
        $priceRangeMin = 1;
        $priceRangeMax  = DB::table('product_details')
            ->select(DB::raw('MAX(price) as maxprice'))
            ->get()
            ->first()
            ->maxprice
        ; // @todo: refactor query

        $sort = $request->sort;

        $selectCountryID = \Cache::get('selectedCountryID');

        if(Cache::has('stores')) {
            $stores = Cache::get('stores');
        } else {
            $stores = $this->storeModel->where('country_id',$selectCountryID)->get();
            Cache::put('stores',$stores,60*24);
        }

        $selectedStore = $request->has('store') ? $request->get('store') : '';

        $area = $this->areaModel->with(['stores'=>function($q){
            $q->select(['id']);
        }])->find($selectedArea['id']);

        $areaStores = $area->stores->pluck('id');

        $category = $this->categoryModel->with('children')->where('slug_en',$categorySlug)->orWhere('slug_ar',$categorySlug)->first();

        $childCategories = [$category->id];

        if($category->parent_id === 0 ) {
            $childCategories = $category->children->pluck('id')->toArray();
        }

        $parentCategories = Cache::get('parentCategories');


        $products =
            $this->productModel
                ->has('detail')
                ->with(['detail','store','userLikes'])
                ->whereIn('store_id',$areaStores)
                ->childrenCategoryProducts($childCategories)
                ->select('products.*')
        ;

        if($request->sort) {
            switch ($request->sort) {
                case 'price-l-h':
                    $products->join('product_details','products.id','=','product_details.product_id')
                        ->orderBy('price','ASC');
                    break;
                case 'price-h-l':
                    $products->join('product_details','products.id','=','product_details.product_id')
                        ->orderBy('price','DESC');
                    break;
                default:
                    break;
            }
        }

        $category->products = $products->paginate(30);

        return view('products.category.view', compact('category','cartItems','parentCategories','searchTerm','selectedCategory','stores','selectedStore','priceRangeTo','priceRangeFrom','priceRangeMax','priceRangeMin','sort'));

    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->has('term') ? $request->get('term') : '';
        $selectedCategory = $request->has('category') ? $request->get('category') : false;
        $selectedStore = $request->has('store') ? $request->get('store') : '';

        $priceRangeFrom = $request->has('pricefrom') ? $request->get('pricefrom') : $this->selectedPriceFrom;
        $priceRangeTo = $request->has('priceto') ? $request->get('priceto') : $this->selectedPriceTo;
        $priceRangeMin = 1;
        $priceRangeMax  = DB::table('product_details')
            ->select(DB::raw('MAX(price) as maxprice'))
            ->get()
            ->first()
            ->maxprice
        ; // @todo: refactor query

        $parentCategories = Cache::get('parentCategories');
        $selectCountryID = \Cache::get('selectedCountryID');
        $selectedArea = Cache::get('selectedArea');
        $sort = $request->sort;

        $area = $this->areaModel->with(['stores'=>function($q){
            $q->select(['id']);
        }])->find($selectedArea['id']);

        $areaStores = $area->stores->pluck('id');
        $cartItems = $this->cart->getItems();

        if(Cache::has('stores')) {
            $stores = Cache::get('stores');
        } else {
            $stores = $this->storeModel->where('country_id',$selectCountryID)->get();
            Cache::put('stores',$stores,60*24);
        }

        $products = $this->productModel
            ->has('detail')
            ->with(['detail','store','userLikes'])
            ->whereIn('store_id',$areaStores);

        if($selectedCategory) {

            $category = $this->categoryModel->with('children')->where('slug_en',$selectedCategory)->orWhere('slug_ar',$selectedCategory)->first();
            $childCategories = [$category->id];

            if($category->parent_id === 0 ) {
                $childCategories = $category->children->pluck('id')->toArray();
            }

            $products = $products->childrenCategoryProducts($childCategories)->select('products.*');
        }

        if($searchTerm) {
            $products = $products
                ->where('name_en','like','%'.$searchTerm.'%')
                ->orWhere('name_ar','like','%'.$searchTerm.'%')
                ->orWhere('sku','=',$searchTerm);
        }

        if($selectedStore) {
            $store = $this->storeModel->where('slug_en',$selectedStore)->orWhere('slug_ar',$selectedStore)->first();
            if($store) {
                $products = $products
                    ->where('store_id',$store ? $store->id : 0);
            } else {
                $store = null;
            }
        } else {
            $store = null;
        }

        if($priceRangeTo >= $this->selectedPriceTo) {
            $products = $products->whereHas('detail',function($q) use ($priceRangeFrom)  {
                $q->where('price','>=',$priceRangeFrom);
            });
        } else {
            $products = $products->whereHas('detail',function($q) use ($priceRangeFrom,$priceRangeTo)  {
                $q->whereBetween('price',[$priceRangeFrom,$priceRangeTo]);
            });
        }

        if($request->sort) {
            switch ($request->sort) {
                case 'price-l-h':
                    $products->join('product_details','products.id','=','product_details.product_id')
                        ->orderBy('price','ASC');
                    break;
                case 'price-h-l':
                    $products->join('product_details','products.id','=','product_details.product_id')
                        ->orderBy('price','DESC');
                    break;
                default:
                    break;
            }
        }

        $products =  $products->paginate(30);

        return view('products.search', compact('category','cartItems','parentCategories','searchTerm','selectedCategory','stores','selectedStore','priceRangeFrom','priceRangeTo','priceRangeMin','priceRangeMax','products','sort','store'));
    }

    public function show(\Request $request, $id, $name)
    {
        $product = $this->productModel->with('userLikes')->find($id);
        $cartItems = $this->cart->getItems();
        $deliveryTimes = $this->deliveryTimes[app()->getLocale()];

        return view('products.view',compact('product','cartItems','deliveryTimes'));
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

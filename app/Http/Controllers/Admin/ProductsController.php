<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\ProductDetail;
use App\ProductImage;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\StoreRepositoryInterface;
use App\Store;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use App\Category;

class ProductsController extends Controller
{
    /**
     * @var $product
     */
    private $product;

    /**
     * @var $store
     */
    private $store;

    /**
     * @var $category
     */
    private $category;

    /**
     * @param ProductRepositoryInterface $product
     * @param StoreRepositoryInterface $store
     * @param CategoryRepository $category
     */
    public function __construct(ProductRepositoryInterface $product, StoreRepositoryInterface $store, CategoryRepository $category)
    {
        $this->product = $product;
        $this->store = $store;
        $this->category = $category;
    }

    /**
     * Show All products
     *
     * @return mixed
     */
    public function index()
    {
        if(Auth::user()->isStoreAdmin())
        {
            $products = $this->product->getByStore();
        }
        else
        {
            $products = $this->product->getAll();
        }

        return view('backend.shared.products.index', compact('products'));
    }

    public function show(\Request $request, $id, $name)
    {

        $product = $this->productModel->find($id);

        return view('products.view' ,compact('product'));

    }

    /**
     * Create product
     *
     * @return mixed
     */
    public function create()
    {
        $stores = $this->store->getAll();
        $categories = $this->category->getParentCategoriesWithChildren();
        $categoriesList = [];

        $user = Auth::user();
        if($user->isStoreAdmin()) {

            $store = $user->store;

            if(!$store->areas->count()) {
                return redirect()->action('Admin\StoresController@showAreas')->with('error','Please Specify the Delivery Areas Your Store Covers');
            }
        }

        return view('backend.shared.products.create', compact('stores','categories', 'categoriesList'));
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
        if(Auth::user()->isManager())
        {
            $store = $request->only(['store']);
            $store_id = $store['store'];
            $storeDb = Store::find($store_id);
            $storeVerification = $storeDb->verified;
        }
        else
        {
            $store_id = Auth::user()->store->id;
            $storeVerification = Auth::user()->store->verified;
        }
        $attributes = $request->only(['sku', 'name_en', 'name_ar', 'active','natural']);
        $attributesDetails = $request->only(['price', 'height', 'width', 'is_sale', 'sale_price', 'start_sale_date','end_sale_date', 'qty', 'description_en', 'description_ar']);
        $categoryParent = $request->only(['parent_id']);
        $categories = $request->only(['categories']);
        $mainImage = $request->only(['main_image']);
        $images = $request->only(['images']);

        $attributes['store_id'] = $store_id;
        $attributes['slug_en'] = $attributes['name_en'];
        $attributes['slug_ar'] = $attributes['name_ar'];
        $attributes['verified'] = $storeVerification;

        //@todo: as per the client request, disable all the products by default
        $attributes['active'] = '0';

        $product = $this->product->create($attributes);
        //save main image
        $imageName = str_random(15);

//        Image::make($mainImage['main_image'])
//            ->resize(700, 900)->encode('jpg')
//            ->save('uploads/products/'.$imageName.'.jpg');

        Image::make($mainImage['main_image'])
            ->fit(640)
            ->encode('jpg')
            ->save('uploads/products/'.$imageName.'.jpg');
//        Image::make($mainImage['main_image'])->resize(555, 715)->encode('jpg')->save('uploads/products/large/'.$imageName.'.jpg');
//        Image::make($mainImage['main_image'])->resize(136, 175)->encode('jpg')->save('uploads/products/thumb/'.$imageName.'.jpg');
        $attributesDetails['main_image'] = $imageName.'.jpg';

        $details = new ProductDetail([
            'price' => $attributesDetails['price'],
            'height' => $attributesDetails['height'],
            'width' => $attributesDetails['width'],
            'is_sale' => isset($attributesDetails['is_sale']) ? '1' : '0',
            'sale_price' => $attributesDetails['sale_price'],
            'start_sale_date' => $attributesDetails['start_sale_date'],
            'end_sale_date' => $attributesDetails['end_sale_date'],
            'quantity' => $attributesDetails['qty'],
            'description_en' => $attributesDetails['description_en'],
            'description_ar' => $attributesDetails['description_ar'],
            'main_image' => $attributesDetails['main_image'],
        ]);

        $product->detail()->save($details);

        if(count($categories['categories']) > 0)
        {
            $product->categories()->sync($categoryParent['parent_id']);
            $product->categories()->syncWithoutDetaching($categories['categories']);
        }

        if($request->images)
        {
            $savedImages = [];
            foreach ($images['images'] as $image)
            {
                $randomImageName = str_random(15);
//                Image::make($image)
//                    ->resize(700, 900)
//                    ->encode('jpg')->save('uploads/products/'.$randomImageName.'.jpg');
                Image::make($image)
                    ->fit(640)
                    ->encode('jpg')
                    ->save('uploads/products/'.$randomImageName.'.jpg');
                $savedImage = new ProductImage([
                    'image' => $randomImageName.'.jpg'
                ]);

                $savedImages[] = $savedImage;
            }

            $product->productImages()->saveMany($savedImages);
        }

        $this->updateSlug($product);

        return redirect(Request::segment(1).'/products');
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
        $stores = $this->store->getAll();
        $categories = $this->category->getParentCategoriesWithChildren();
        $categoriesList = $product->categories->pluck('id')->toArray();
        return view('backend.shared.products.edit', compact('product','stores', 'categories', 'categoriesList'));
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
        if(Auth::user()->isManager())
        {
            $store = $request->only(['store']);
            $store_id = $store['store'];
        }
        else
        {
            $store_id = Auth::user()->store->id;
        }
        $attributes = $request->only(['name_en', 'name_ar', 'active','natural']);
        $attributesDetails = $request->only(['price','height', 'width', 'is_sale', 'sale_price', 'start_sale_date','end_sale_date', 'qty', 'description_en', 'description_ar']);
        $categoryParent = $request->only(['parent_id']);
        $categories = $request->only(['categories']);
        $mainImage = $request->only(['main_image']);
        $images = $request->only(['images']);

        $attributes['store_id'] = $store_id;

        //@todo: as per client request
        $attributes['active'] = '0';


        $product = $this->product->getById($id);
        $this->product->update($id, $attributes);

        $details = [
            'price' => $attributesDetails['price'],
            'height' => $attributesDetails['height'],
            'width' => $attributesDetails['width'],
            'is_sale' => isset($attributesDetails['is_sale']) ? '1' : '0',
            'sale_price' => $attributesDetails['sale_price'],
            'quantity' => $attributesDetails['qty'],
            'description_en' => $attributesDetails['description_en'],
            'description_ar' => $attributesDetails['description_ar'],
        ];

        if($attributesDetails['start_sale_date'])
        {
            $startDate = Carbon::createFromFormat('d-m-Y', $attributesDetails['start_sale_date']);
            $details['start_sale_date'] = $startDate->format('Y-m-d');
        }

        if($attributesDetails['end_sale_date'])
        {
            $endDate = Carbon::createFromFormat('d-m-Y', $attributesDetails['end_sale_date']);
            $details['end_sale_date'] = $endDate->format('Y-m-d');
        }

        if($mainImage['main_image'])
        {
            $imageName = str_random(15);

            Image::make($mainImage['main_image'])->fit(640)->encode('jpg')->save('uploads/products/'.$imageName.'.jpg');
            $attributesDetails['main_image'] = $imageName.'.jpg';
            $details['main_image'] = $attributesDetails['main_image'];
        }

        $product->detail()->update($details);

        $product->categories()->sync($categoryParent['parent_id']);
        $product->categories()->syncWithoutDetaching($categories['categories']);

        if($request->images)
        {
            $savedImages = array();
            foreach ($images['images'] as $image)
            {
                $randomImageName = str_random(15);
                Image::make($image)
                    ->fit(640)
                    ->encode('jpg')
                    ->save('uploads/products/'.$randomImageName.'.jpg');

                $savedImage = new ProductImage([
                    'image' => $randomImageName.'.jpg'
                ]);

                $savedImages[] = $savedImage;
            }

            $product->productImages()->saveMany($savedImages);
        }

        $this->updateSlug($product);

        return redirect(Request::segment(1).'/products');
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

        return url()->previous();
    }

    /**
     * Delete a product image
     *
     * @var integer $id image ID
     *
     * @return mixed
     */
    public function destroyImage($id)
    {
        //@todo: also delete the image file from server
        ProductImage::find($id)->delete();
        return url()->previous();
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

        return url()->previous();
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
        $this->product->activate($id);

        return url()->previous();
    }

    public function getAllWithVerifications()
    {
        $products = $this->product->getAll();
        return view('backend.manager.verifications.products', compact('products'));
    }

    public function verify($id)
    {
        $this->product->verify($id);

        Session()->flash('success', 'Store Verified Successfully!');
        return route('manager.verifications.products');
    }

    public function unVerify($id)
    {
        $this->product->unVerify($id);

        Session()->flash('success', 'Store Un Verified Successfully!');
        return route('manager.verifications.products');
    }


}

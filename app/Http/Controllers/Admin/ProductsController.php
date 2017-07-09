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

        return view('backend.shared.products.create', compact('stores', 'categories', 'categoriesList'));
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
        }
        else
        {
            $store_id = Auth::user()->store->id;
        }
        $attributes = $request->only(['sku', 'name_en', 'name_ar', 'active']);
        $attributesDetails = $request->only(['price','weight', 'height', 'width', 'is_sale', 'sale_price', 'start_sale_date','end_sale_date', 'qty', 'description_en', 'description_ar']);
        $categoryParent = $request->only(['parent_id']);
        $categories = $request->only(['categories']);
        $mainImage = $request->only(['main_image']);
        $images = $request->only(['images']);

        $attributes['store_id'] = $store_id;
        $product = $this->product->create($attributes);
        //save main image
        $imageName = str_random(15);
        Image::make($mainImage['main_image'])->resize(700, 900)->encode('jpg')->save('uploads/products/original/'.$imageName.'.jpg');
        Image::make($mainImage['main_image'])->resize(555, 715)->encode('jpg')->save('uploads/products/large/'.$imageName.'.jpg');
        Image::make($mainImage['main_image'])->resize(136, 175)->encode('jpg')->save('uploads/products/thumb/'.$imageName.'.jpg');
        $attributesDetails['main_image'] = $imageName.'.jpg';

        $details = new ProductDetail([
            'price' => $attributesDetails['price'],
            'weight' => $attributesDetails['weight'],
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

        if(isset($images['images']) AND count($images['images'] > 0))
        {
            $savedImages = array();
            foreach ($images['images'] as $image)
            {
                $randomImageName = str_random(15);
                Image::make($image)->resize(700, 900)->encode('jpg')->save('uploads/products/original/'.$randomImageName.'.jpg');
                Image::make($image)->resize(555, 715)->encode('jpg')->save('uploads/products/large/'.$randomImageName.'.jpg');
                Image::make($image)->resize(136, 175)->encode('jpg')->save('uploads/products/thumb/'.$randomImageName.'.jpg');
                $savedImage = new ProductImage([
                    'image' => $randomImageName.'.jpg'
                ]);

                $savedImages[] = $savedImage;
            }

            $product->productImages()->saveMany($savedImages);
        }

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
//        dd($categoriesList);
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
        $attributes = $request->only(['name_en', 'name_ar', 'active']);
        $attributesDetails = $request->only(['price','weight','height', 'width', 'is_sale', 'sale_price', 'start_sale_date','end_sale_date', 'qty', 'description_en', 'description_ar']);
        $categoryParent = $request->only(['parent_id']);
        $categories = $request->only(['categories']);
        $mainImage = $request->only(['main_image']);
        $images = $request->only(['images']);

        $attributes['store_id'] = $store_id;

        $product = $this->product->getById($id);
        $this->product->update($id, $attributes);

        $details = [
            'price' => $attributesDetails['price'],
            'weight' => $attributesDetails['weight'],
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
            Image::make($mainImage['main_image'])->resize(700, 900)->encode('jpg')->save('uploads/products/original/'.$imageName.'.jpg');
            Image::make($mainImage['main_image'])->resize(555, 715)->encode('jpg')->save('uploads/products/large/'.$imageName.'.jpg');
            Image::make($mainImage['main_image'])->resize(136, 175)->encode('jpg')->save('uploads/products/thumb/'.$imageName.'.jpg');
            $attributesDetails['main_image'] = $imageName.'.jpg';
            $details['main_image'] = $attributesDetails['main_image'];
        }

        $product->detail()->update($details);

//        if(count($categories['categories']) > 0)
//        {
        $product->categories()->sync($categoryParent['parent_id']);
        $product->categories()->syncWithoutDetaching($categories['categories']);
//        }

        if(isset($images['images']) AND count($images['images'] > 0))
        {
            $savedImages = array();
            foreach ($images['images'] as $image)
            {
                $randomImageName = str_random(15);
                Image::make($image)->resize(700, 900)->encode('jpg')->save('uploads/products/original/'.$randomImageName.'.jpg');
                Image::make($image)->resize(555, 715)->encode('jpg')->save('uploads/products/large/'.$randomImageName.'.jpg');
                Image::make($image)->resize(136, 175)->encode('jpg')->save('uploads/products/thumb/'.$randomImageName.'.jpg');
                $savedImage = new ProductImage([
                    'image' => $randomImageName.'.jpg'
                ]);

                $savedImages[] = $savedImage;
            }

            $product->productImages()->saveMany($savedImages);
        }

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


}

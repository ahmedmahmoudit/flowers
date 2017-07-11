<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Cache;

class SubCategoriesController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = $this->category->getChildrenCategoriesWithParent();

        return view('backend.manager.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategoriesOnly = $this->category->getParentCategoriesOnly();
        $parentCategories = $parentCategoriesOnly->pluck('name_en', 'id')->prepend("Please Select Parent Category", "");

        return view('backend.manager.subcategory.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSubCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubCategoryRequest $request)
    {
        $attributes = $request->only(['parent_id', 'name_en', 'name_ar', 'description_en', 'description_ar']);
        $subCategory = $this->category->createSubCategory($attributes);

        //clear cache
        Cache::flush();
        if ($subCategory) {

            return redirect()->route('manager.subcategories.index')->with('success', 'successfully created');

        }

        return redirect()->back()->with('error', 'not created !!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = $this->category->getById($id);
        $parentCategoriesOnly = $this->category->getParentCategoriesOnly();

        $parentCategories = $parentCategoriesOnly->pluck('name_en', 'id')->prepend("Please Select Parent Category", "");

        return view('backend.manager.subcategory.edit', compact('subcategory', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSubCategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, $id)
    {
        $subcategory = $this->category->getById($id)->update([
            'parent_id' => $request->parent_id,
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar
        ]);

        if ($subcategory) {

            return redirect()->route('manager.subcategories.index')->with('success', 'subcategory updated!!');

        }
        return redirect()->back()->with('error', 'sub category not saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check if category not assigned to any of products
        if ($this->category->getById($id)->products->count() > 0)
        {
            return ['error' => 'SubCategory Assigned to Product!!'];
        }

        if ($this->category->getById($id)->delete())
        {
            return url()->previous();
        }
        return ['error' => 'System Error!!'];
    }
}

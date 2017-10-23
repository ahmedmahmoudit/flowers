<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Cache;

class CategoriesController extends Controller
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
        $categories = $this->category->getParentCategoriesOnly();

        return view('backend.manager.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.manager.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $attributes = $request->only(['description_en', 'name_en', 'name_ar', 'description_ar']);
        $category = $this->category->create($attributes);

        //clear cache
        Cache::forget('parentCategories');

        $this->updateSlug($category);

        if ($category) {
            return redirect()->route('manager.categories.index')->with('success', 'successfully created');
        }

        return redirect()->back()->withErrors()->withInputs();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->getById($id);

        return view('backend.manager.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->category->getById($id);

        $category->update([
            'name_en'        => $request->name_en,
            'name_ar'        => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar
        ]);

        Cache::forget('parentCategories');

        $this->updateSlug($category);

        if ($category) {
            return redirect()->route('manager.categories.index')->with('success', 'category updated!!');
        }

        return redirect()->back()->withErrors();

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
        if ($this->category->getById($id)->products->count() > 0) {
            return ['error' => 'Category Assigned to Product!!'];
        }
        //check if category has subcategories
        if ($this->category->getById($id)->children->count() > 0) {
            return ['error' => 'Category Already has been Assigned To SubCategory!!'];
        }

        if ($this->category->getById($id)->delete()) {

            Cache::forget('parentCategories');

            return url()->previous();
        }

        return ['error' => 'not successful !!'];
    }
}

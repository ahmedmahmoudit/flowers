<?php


namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentCategory constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Get all categories.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get category by Id.
     *
     * @param integer $id
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    function getById($id)
    {
        return $this->model->find($id);
    }

    public function getParentCategoriesWithChildren()
    {
        return $this->model->where('parent_id', 0)->with('children')->get();
    }

    public function getParentCategoriesOnly()
    {
        return $this->model->where('parent_id', 0)->get();
    }

    public function getChildrenCategoriesWithParent()
    {
        return $this->model->where('parent_id', '!=', 0)->with('parent')->get();
    }

    /**
     * Add New Category
     *
     * @var array $data
     *
     * @return int
     */
    public function create(array $data)
    {
        $category = new Category;
        $category->name_en          = $data['name_en'];
        $category->name_ar          = $data['name_ar'];
        $category->description_en   = $data['description_en'];
        $category->description_ar   = $data['description_ar'];
        $category->slug_en   = $data['name_en'];
        $category->slug_ar   = $data['name_ar'];

        return($category->save());
    }

    /**
     * Add New Category
     *
     * @var array $data
     *
     * @return int
     */
    public function createSubCategory(array $data)
    {
        $category = new Category;
        $category->parent_id          = $data['parent_id'];
        $category->name_en            = $data['name_en'];
        $category->name_ar            = $data['name_ar'];
        $category->description_en     = $data['description_en'];
        $category->description_ar     = $data['description_ar'];

        return($category->save());
    }


    /**
     * Update a category.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return Coupon
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete a category.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        $category = $this->model->find($id);

        if(count($category->products) > 0)
        {
            return 0;
        }

        return $category->delete();
    }
}
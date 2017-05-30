<?php


namespace App\Repositories;

use App\Coupon;

class CouponRepository implements CouponRepositoryInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentCoupon constructor.
     *
     * @param Coupon $model
     */
    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }

    /**
     * Get all coupons.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get coupon by Id.
     *
     * @param integer $id
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new coupon.
     *
     * @param array $attributes
     *
     * @return Coupon
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a coupon.
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
     * Delete a coupon.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * Disable a coupon.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function disable($id)
    {
        return $this->model->find($id)->update(['consumed' => 0]);
    }

    /**
     * Activate a coupon.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function activate($id)
    {
        return $this->model->find($id)->update(['consumed' => 1]);
    }
}
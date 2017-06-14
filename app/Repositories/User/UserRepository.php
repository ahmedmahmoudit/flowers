<?php


namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentUser constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Get all users.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get  user by Id.
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
     * Update a user.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return User
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete a user.
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
     * Disable a user.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function disable($id)
    {
        return $this->model->find($id)->update(['active' => '0']);
    }

    /**
     * Activate a user.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function activate($id)
    {
        return $this->model->find($id)->update(['active' => '1']);
    }
}
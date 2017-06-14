<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use App\Store;

class UsersController extends Controller
{
    /**
     * @var $user
     */
    private $user;

    /**
     * UserController constructor.
     *
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Show All users
     *
     * @return mixed
     */
    public function index()
    {
        $users = $this->user->getAll();
        return view('backend.manager.user.index', compact('users'));
    }


    /**
     * Edit user
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $user = $this->user->getById($id);
        $stores = Store::all();

        return view('backend.manager.user.edit', compact('user', 'stores'));
    }

    /**
     * Update user
     *
     * @var integer $id
     * @var UpdateUserRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateUserRequest $request)
    {
        if($request->input('role') == '2')
        {
            //Remove user from any store before assign him to another one
            $store = Store::where('user_id', $id)->first();
            if($store)
            {
                $store->update(['user_id' => NULL]);
            }

            $store_id = $request->input('store');
            $store = Store::find($store_id);
            if($store)
            {
                $store->update(['user_id' => $id]);
            }
        }
        else
        {
            //Remove user from store before change role
            $store = Store::where('user_id', $id)->first();
            if($store)
            {
                $store->update(['user_id' => NULL]);
            }
        }

        $attributes = $request->only(['name','email','role']);
        $this->user->update($id, $attributes);

        return redirect()->route('manager.users.index');
    }

    /**
     * Delete user
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $this->user->delete($id);

        Session()->flash('success', 'User Delete Successfully!');
        return route('manager.users.index');
    }

    /**
     * Disable user
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function disable($id)
    {
        $this->user->disable($id);

        Session()->flash('success', 'User Disabled Successfully!');
        return route('manager.users.index');
    }

    /**
     * Activate user
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function activate($id)
    {
        $this->user->activate($id);

        Session()->flash('success', 'User Activated Successfully!');
        return route('manager.users.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepositoryInterface;

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
        return view('manager.user.index', ['users' => $users]);
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

        return view('manager.user.edit', compact('user'));
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
        $attributes = $request->only(['name','email','password','password_confirm','role']);
        $this->user->update($id, $attributes);

        return redirect()->route('users.index');
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

        return redirect()->route('users.index');
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

        return redirect()->route('users.index');
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

        return redirect()->route('users.index');
    }
}

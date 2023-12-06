<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function users()
    {
        $users = $this->userService->users();
        return view('admin.pages.users.all', ['title' => __('trans.bhoothat')], ['users' => $users]);
    }

    public function userDetails($id)
    {
        $user = $this->userService->userDetails($id);
        return view('admin.pages.users.view', ['title' => __('trans.bhoothat')], ['user' => $user]);
    }

    public function viewAddUser()
    {
        return view('admin.pages.users.add', ['title' => __('trans.bhoothat')]);
    }

    public function storeUser(UserRequest $request)
    {
        $this->userService->storeUser($request);
        return redirect()->back()->with('success', 'تمت اضافة المستخدم بنجاح');
    }

    public function viewUpdateUser($id)
    {
        $user = $this->userService->viewUpdateUser($id);
        return view('admin.pages.users.add', ['title' => __('trans.bhoothat')], ['user' => $user]);
    }

    public function updateUser(UserRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->back()->with('success', __('trans.msg_request_success'));
    }

    public function deleteUser($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with('success', __('trans.msg_request_success'));
    }
}

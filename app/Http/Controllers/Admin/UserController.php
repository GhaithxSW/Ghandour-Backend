<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
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
        return view('admin.pages.users.all', ['title' => 'المستخدمين'], ['users' => $users]);
    }

    public function userDetails($id)
    {
        $user = $this->userService->userDetails($id);
        return view('admin.pages.users.view', ['title' => 'معلومات المستخدم'], ['user' => $user]);
    }

    public function viewAddUser()
    {
        return view('admin.pages.users.add', ['title' => 'اضافة مستخدم']);
    }

    public function storeUser(UserRequest $request)
    {
        $this->userService->storeUser($request);
        return redirect()->back()->with('success', 'تمت اضافة المستخدم بنجاح');
    }

    public function viewUpdateUser($id)
    {
        $user = $this->userService->viewUpdateUser($id);
        return view('admin.pages.users.edit', ['title' => 'تعديل المستخدم'], ['user' => $user]);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->back()->with('success', 'تم تعديل المستخدم بنجاح');
    }

    public function deleteUser($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
    }
}

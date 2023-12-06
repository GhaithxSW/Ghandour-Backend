<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Services\Admin\AdminService;
use App\Http\Services\Admin\OrderService;
use App\Http\Services\Admin\ResearchService;
use App\Http\Services\Admin\UserService;

class AdminController extends Controller
{
    private AdminService $adminService;
    private UserService $userService;
    private OrderService $orderService;
    private ResearchService $researchService;

    public function __construct(AdminService $adminService, UserService $userService, OrderService $orderService, ResearchService $researchService)
    {
        $this->adminService = $adminService;
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->researchService = $researchService;
    }

    public function dashboard()
    {
        $users = $this->userService->users();
        $orders = $this->orderService->orders();
        $researches = $this->researchService->researches();
        return view('admin.pages.dashboard', ['title' => __('trans.bhoothat')], [
            'users' => $users,
            'orders' => $orders,
            'researches' => $researches
        ]);
    }

    public function viewSignIn()
    {
        return view('admin.pages.authentication.boxed.signin', ['title' => __('trans.bhoothat')]);
    }

    public function login(LoginRequest $request)
    {
        $formFields = $request->validated();

        if (Auth::guard('admin')->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $this->adminService->logout($request);
        return redirect()->route('admin-sign-in');
    }

    public function redirectToDashboard()
    {
        return redirect()->route('dashboard');
    }
}

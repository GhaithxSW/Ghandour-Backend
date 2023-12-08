<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view('admin.pages.dashboard', ['title' => 'لوحة التحكم'], [
            'users' => $users,
            'orders' => $orders,
            'researches' => $researches,
        ]);
    }

    public function viewSignIn()
    {
        return view('admin.pages.authentication.boxed.signin', ['title' => 'تسجيل الدخول']);
    }

    public function login(LoginRequest $request)
    {
        $this->adminService->login($request);
        return redirect()->route('dashboard');
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

    // public function charts()
    // {
    //     $services = Service::all();
    //     $subCategories = SubCategory::all();
    //     $categories = Category::all();
    //     $clients = Client::all();
    //     $maintenances = MaintenanceTechnician::all();
    //     $maintenancesJoinRequests = MaintenanceTechnician::where('is_verified', 0)->get();

    //     $orders = Order::all();
    //     $finished = Order::where('status', OrderStatus::finished)->get();
    //     $processing = Order::where('status', OrderStatus::processing)->get();
    //     $canceled = Order::where('status', OrderStatus::canceled)->get();
    //     $other = Order::whereIn('status', [OrderStatus::newOrder, OrderStatus::pendingClientApprove, OrderStatus::pendingClientApproveFinish, OrderStatus::pendingMaintenanceConfirm])->get();

    //     $totalPrice = 0.0;
    //     foreach ($orders as $order) {
    //         foreach ($order->orderServices as $orderService) {
    //             $totalPrice += $orderService->service->price * $orderService->quantity;
    //         }
    //     }

    //     return view('dashboard', [
    //         'services' => $services,
    //         'subCategories' => $subCategories,
    //         'categories' => $categories,
    //         'clients' => $clients,
    //         'maintenances' => $maintenances,
    //         'maintenancesJoinRequests' => $maintenancesJoinRequests,
    //         'finished' => $finished,
    //         'processing' => $processing,
    //         'canceled' => $canceled,
    //         'other' => $other,
    //         'totalPrice' => $totalPrice,
    //     ]);
    // }
}

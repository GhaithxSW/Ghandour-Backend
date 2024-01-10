<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\TeamService;
use App\Http\Services\Admin\UserService;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Services\Admin\AdminService;
use App\Http\Services\Admin\OrderService;
use App\Http\Services\Admin\ResearchService;

class AdminController extends Controller
{
    private AdminService $adminService;
    private UserService $userService;
    private OrderService $orderService;
    private ResearchService $researchService;
    private TeamService $teamService;

    public function __construct(AdminService $adminService, UserService $userService, OrderService $orderService, ResearchService $researchService, TeamService $teamService)
    {
        $this->adminService = $adminService;
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->researchService = $researchService;
        $this->teamService = $teamService;
    }

    public function dashboard()
    {
        $admins = $this->adminService->admins();
        $users = $this->userService->users();
        $orders = $this->orderService->orders();
        $researches = $this->researchService->researches();
        $members = $this->teamService->members();

        return view('admin.pages.dashboard', ['title' => 'لوحة التحكم'], [
            'admins' => $admins,
            'users' => $users,
            'orders' => $orders,
            'researches' => $researches,
            'members' => $members,
        ]);
    }

    public function admins()
    {
        $admins = $this->adminService->admins();
        return view('admin.pages.admins.all', ['title' => 'الأدمن'], ['admins' => $admins]);
    }

    public function viewAddAdmin()
    {
        return view('admin.pages.admins.add', ['title' => 'إضافة أدمن']);
    }

    public function storeAdmin(AdminRequest $request)
    {
        try {
            $this->adminService->storeAdmin($request);
            return redirect()->back()->with('success', 'تمت اضافة الأدمن بنجاح');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function viewUpdateAdmin($id)
    {
        $admin = $this->adminService->adminDetails($id);
        return view('admin.pages.admins.edit', ['title' => 'تعديل الأدمن'], ['admin' => $admin]);
    }

    public function updateAdmin(AdminRequest $request, $id)
    {
        try {
            $this->adminService->updateAdmin($request, $id);
            return redirect()->back()->with('success', 'تم تعديل الأدمن بنجاح');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteAdmin($id)
    {
        $this->adminService->deleteAdmin($id);
        return redirect()->back()->with('success', 'تم حذف الأدمن بنجاح');
    }
}

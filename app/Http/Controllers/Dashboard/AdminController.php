<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enums\UserRole;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function admins(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $admins = User::where('role_id', Role::where('name', UserRole::admin->value)->first()->id)->get();
        return view('admin.pages.admins.all', ['title' => 'اللأدمن'], ['admins' => $admins]);
    }

    public function adminDetails($adminId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $admin = User::find($adminId);
        return view('admin.pages.admins.view', ['title' => 'معلومات اللأدمن'], ['admin' => $admin]);
    }

    public function viewAddAdmin(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.admins.add', ['title' => 'اضافة لأدمن']);
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $validatedRequest = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);

            User::create([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'password' => bcrypt('123456'),
                'role_id' => Role::where('name', UserRole::admin->value)->first()->id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'تمت اضافة اللأدمن بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة اللأدمن');
        }
    }

    public function viewUpdateAdmin($adminId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $admin = User::find($adminId);
        return view('admin.pages.admins.edit', ['title' => 'تعديل اللأدمن'], ['admin' => $admin]);
    }

    public function updateAdmin(Request $request, $adminId): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $admin = User::findOrFail($adminId);

            $validatedRequest = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            ]);

            $admin->update([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'تم تحديث بيانات اللأدمن بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث بيانات اللأدمن');
        }
    }

    public function deleteAdmin($adminId): RedirectResponse
    {
        User::find($adminId)->delete();
        return redirect()->back()->with('success', 'تم حذف اللأدمن بنجاح');
    }
}

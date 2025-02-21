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

class UserController extends Controller
{
    public function users(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::where('role_id', Role::where('name', UserRole::user->value)->first()->id)->get();
        return view('admin.pages.users.all', ['title' => 'المستخدمين'], ['users' => $users]);
    }

    public function userDetails($userId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($userId);
        return view('admin.pages.users.view', ['title' => 'معلومات المستخدم'], ['user' => $user]);
    }

    public function viewAddUser(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.pages.users.add', ['title' => 'اضافة مستخدم']);
    }

    public function storeUser(Request $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $validatedRequest = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'child_name' => 'required|string|max:255',
                'child_age' => 'required|string|max:255',
            ]);

            User::create([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'password' => bcrypt('123456'),
                'child_name' => $validatedRequest['child_name'],
                'child_age' => $validatedRequest['child_age'],
                'role_id' => Role::where('name', UserRole::user->value)->first()->id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'تمت اضافة المستخدم بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة المستخدم');
        }
    }

    public function viewUpdateUser($userId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($userId);
        return view('admin.pages.users.edit', ['title' => 'تعديل المستخدم'], ['user' => $user]);
    }

    public function updateUser(Request $request, $userId): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail($userId);

            $validatedRequest = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'child_name' => 'required|string|max:255',
                'child_age' => 'required|string|max:255',
            ]);

            $user->update([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'child_name' => $validatedRequest['child_name'],
                'child_age' => $validatedRequest['child_age'],
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'تم تحديث بيانات المستخدم بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث بيانات المستخدم');
        }
    }

    public function deleteUser($userId): RedirectResponse
    {
        User::find($userId)->delete();
        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
    }
}

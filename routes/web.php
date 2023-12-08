<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', [HomeController::class, 'clear']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('index');

        // Route::middleware(['auth.redirect'])->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/request-research', [OrderController::class, 'orderResearch'])->name('request-research');
            Route::post('/add-request-research', [OrderController::class, 'storeOrder']);
        });

        Route::controller(UserController::class)->group(function () {
            // Route::get('/sign-up', 'viewSignUp')->name('sign-up');
            Route::post('/register', 'register');
            // Route::get('/sign-in', 'viewSignIn')->name('sign-in');
            Route::post('/login', 'login')->name('login');
            Route::post('/logout', 'logout')->name('logout');
        });
    }
);

// admin

Route::prefix('admin-panel-management')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {

        Route::controller(ResearchController::class)->group(function () {
            Route::get('/researches', 'researches');
            Route::get('/research/{id}/details', 'researchDetails');
            Route::get('/research/add', 'viewAddResearch');
            Route::post('/research/store', 'addResearch');
            Route::get('/research/{id}/edit', 'viewUpdateResearch');
            Route::put('/research/{id}/update', 'updateResearch');
            Route::delete('/research/{id}/delete', 'deleteResearch')->name('delete-research');
        });

        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'redirectToDashboard');
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::post('/logout', 'logout')->name('admin-logout');
        });

        Route::get('/users', [AdminUserController::class, 'users']);
        Route::get('/user/{id}/details', [AdminUserController::class, 'userDetails']);
        Route::get('/user/add', [AdminUserController::class, 'viewAddUser']);
        Route::post('/user/store', [AdminUserController::class, 'storeUser']);
        Route::get('/user/{id}/edit', [AdminUserController::class, 'viewUpdateUser']);
        Route::put('/user/{id}/update', [AdminUserController::class, 'updateUser']);
        Route::delete('/user/{id}/delete', [AdminUserController::class, 'deleteUser'])->name('delete-user');

        Route::get('/orders', [AdminOrderController::class, 'orders']);
        Route::get('/order/{id}/details', [AdminOrderController::class, 'orderDetails']);
        Route::delete('/order/{id}/delete', [AdminOrderController::class, 'deleteOrder'])->name('delete-order');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/sign-in', 'viewSignIn')->name('admin-sign-in');
        Route::post('/login', 'login')->name('admin-login');
    });
});

// analytics
Route::get('/analytics', function () {
    return view('pages.dashboard.analytics');
});

// Route::get('/test', function () {
//     return "test";
// })->middleware('auth');

// Route::get('/test2', function () {
//     return "test";
// })->middleware('auth:admin');

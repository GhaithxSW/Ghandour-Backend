<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ResearchController as ControllersResearchController;
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
        Route::get('/research/{id}', [ControllersResearchController::class, 'showResearch']);

        Route::middleware(['auth'])->group(function () {
            Route::controller(OrderController::class)->group(function () {
                Route::get('/request-research', 'orderResearch')->name('request-research');
                Route::post('/add-request-research', 'storeOrder');
            });
        });

        Route::controller(UserController::class)->group(function () {
            Route::post('/register', 'register');
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

        Route::controller(AdminUserController::class)->group(function () {
            Route::get('/users', 'users');
            Route::get('/user/{id}/details', 'userDetails');
            Route::get('/user/add', 'viewAddUser');
            Route::post('/user/store', 'storeUser');
            Route::get('/user/{id}/edit', 'viewUpdateUser');
            Route::put('/user/{id}/update', 'updateUser');
            Route::delete('/user/{id}/delete', 'deleteUser')->name('delete-user');
        });

        Route::controller(AdminOrderController::class)->group(function () {
            Route::get('/orders', 'orders');
            Route::get('/order/{id}/details', 'orderDetails');
            Route::delete('/order/{id}/delete', 'deleteOrder')->name('delete-order');
        });
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/sign-in', 'viewSignIn')->name('admin-sign-in');
        Route::post('/login', 'login')->name('admin-login');
    });
});

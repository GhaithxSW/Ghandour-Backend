<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestResearchController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\ResearchRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use function Ramsey\Uuid\v1;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [HomeController::class, 'index']);
        Route::get('/rtl/', [HomeController::class, 'index']);
        Route::get('/clear', [HomeController::class, 'clear']);

        Route::middleware(['auth'])->group(function () {
            Route::controller(ServiceController::class)->group(function () {

                Route::get('/request-research', [RequestResearchController::class, 'requestResearch']);
                Route::get('/rtl/request-research', [RequestResearchController::class, 'requestResearch']);
                Route::post('/add-request-research', [RequestResearchController::class, 'storeRequestResearch']);
            });
            // Route::controller(ServiceImageController::class)->group(function () {
            //     Route::post('/detail/{service}/add-service-image', 'addImageService');
            //     Route::post('/edit/{service}/edit-service-image/{serviceImage}', 'editImageService');
            //     Route::post('/delete/{service}/delete-service-image/{serviceImage}', 'deleteImageService');
            // });
            Route::get('/profile', [UserController::class, 'profile']);
        });
        Route::controller(UserController::class)->group(function () {
            Route::get('/sign-up', 'viewSignUp')->name('sign-up');
            Route::post('/register', 'register');
            Route::get('/sign-in', 'viewSignIn')->name('sign-in');
            Route::post('/login', 'login');
            Route::post('/logout', 'logout');
        });
    }
);


/// admin


Route::prefix('admin-panel-management')->group(function () {

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::get('/requests', [ResearchRequestController::class, 'researchRequests']);
        Route::get('/researches', [ResearchController::class, 'researches']);
        Route::get('/research/{id}/details', [ResearchController::class, 'viewResearch']);
        Route::get('/research/add', [ResearchController::class, 'viewCreateResearch']);
        Route::post('/research/store', [ResearchController::class, 'addResearch']);
        Route::delete('/research/{id}/delete', [ResearchController::class, 'deleteResearch'])->name('delete-research');
        Route::get('/research/{id}/edit', [ResearchController::class, 'viewUpdateResearch']);
        Route::put('/research/{id}/update', [ResearchController::class, 'editResearch']);
        Route::get('/users', [UserController::class, 'getAllUsers']);
        // Route::get('/profile', [AdminController::class, 'profile']);
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/sign-in', 'viewSignIn')->name('sign-in');
        Route::post('/login', 'login');
        Route::get('/sign-up', 'viewSignUp')->name('sign-up');
        Route::post('/register', 'register');
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::get('/analytics', function () {
    return view('pages.dashboard.
    analytics');
});

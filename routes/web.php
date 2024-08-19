<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.page');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.page');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});

//admin start path /admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        // start path /admin/role
        Route::prefix('role')->name('role.')->group(function () {
            //take action with pages
            Route::name('redirect.')->group(function () {
                //assign permission for role
                Route::get('/{role}/assign/permission', 'assignPermission')->name('assign.permission.page');
                Route::get('/create', 'create')->name('create.page');
                Route::get('/{role}/edit', 'edit')->name('edit.page');
            });
            //take actions with data
            Route::post('/save/permission', 'savePermissions')->name('assign.permission.save');
            Route::post('/create', 'store')->name('store');
            Route::put('/{role}/update', 'update')->name('update');
            Route::delete('/{role}/delete', 'destroy')->name('delete');
        });
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission', 'index')->name('permission.page');
        // start path /admin/permission
        Route::prefix('permission')->name('permission.')->group(function () {
            //take action with pages
            Route::name('redirect.')->group(function () {
                Route::get('/create', 'create')->name('create.page');
                Route::get('/{permission}/edit', 'edit')->name('edit.page');
            });
            //take actions with data
            Route::post('/create', 'store')->name('store');
            Route::put('/{permission}/update', 'update')->name('update');
            Route::delete('/{permission}/delete', 'destroy')->name('delete');
        });
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user.page');
        // start path /admin/permission
        Route::prefix('user')->name('user.')->group(function () {
            //take action with pages
            Route::name('redirect.')->group(function () {
                Route::get('/{user}/assign/permission', 'assignPermission')->name('assign.user.permission.page');
            });
            //take actions with data
            Route::post('/save/user/permission', 'savePermissions')->name('assign.user.permissio.save');
        });
    });
});


Route::middleware(['auth', 'role:owner'])->group(function () {});

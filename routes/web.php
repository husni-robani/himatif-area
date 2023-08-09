<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware('auth')->group(function () {
    Route::middleware('user')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->middleware('verified')->name('dashboard');
    });

    Route::middleware('is_admin')->group(function () {
        Route::get('/admin/dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::delete('/admin/users/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::patch('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');

        Route::get('admin/periods', [\App\Http\Controllers\Admin\PeriodController::class, 'index'])->name('admin.periods.index');

        Route::get('/test', function () {
            $user = \App\Models\User::where('name', 'Puspa Puspita')->first();
            $imageService = new \App\Services\ImageService($user, '', 'images');
            $imageService->deleteImage('image');

            return 'success';


        });
    });
});

require __DIR__ . '/auth.php';

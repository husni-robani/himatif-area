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
    return Inertia::render('Guest/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/aspiration', [\App\Http\Controllers\AspirationController::class, 'index'])->name('aspiration.index');
Route::post('/aspiration/email', [\App\Http\Controllers\AspirationController::class, 'storeEmail'])->name('aspiration.store-email');
Route::get('/aspiration/{token}', [\App\Http\Controllers\AspirationController::class, 'create'])->name('aspiration.create')->middleware('aspiration');
Route::post('aspiration/{token}', [\App\Http\Controllers\AspirationController::class, 'store'])->name('aspiration.store');


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
        //TODO : change route admin.users.edit to route parameter
        Route::get('/admin/users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::delete('/admin/users/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::patch('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');

        Route::get('admin/periods', [\App\Http\Controllers\Admin\PeriodController::class, 'index'])->name('admin.periods.index');
        Route::delete('admin/periods/{year}', [\App\Http\Controllers\Admin\PeriodController::class, 'destroy'])->name('admin.periods.destroy');
        Route::get('admin/periods/edit/{year}', [\App\Http\Controllers\Admin\PeriodController::class, 'edit'])->name('admin.periods.edit');
        Route::post('admin/periods/newPeriod', [\App\Http\Controllers\Admin\PeriodController::class, 'store'])->name('admin.periods.store');
        Route::patch('admin/periods/update/{year}', [\App\Http\Controllers\Admin\PeriodController::class, 'update'])->name('admin.periods.update');
        Route::post('admin/periods/activeStatus/{year}', [\App\Http\Controllers\Admin\PeriodController::class, 'changeActive'])->name('admin.periods.activeStatus');

//        Route::get('/test', function () {
////            $user = \App\Models\User::where('name', 'Puspa Puspita')->first();
////            $imageService = new \App\Services\ImageService($user, '', 'images');
////            $imageService->deleteImage('image');
//
//            return 'success';
//        })->name('test');

        Route::get('/test2', function () {
            $period = \App\Services\Period\GetPeriodService::getActivatedPeriod();
            dd($period);
        });
    });
});

require __DIR__ . '/auth.php';

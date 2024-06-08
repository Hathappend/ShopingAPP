<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    $findUser = User::query()->find(Auth::user()->id);
    return view('admin.index', ['user' => $findUser]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Route
Route::middleware('auth')->group(function (){
    Route::get('/admin/profile', [AdminProfileController::class, 'create'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/edit', [AdminProfileController::class, 'postEdit'])->name('admin.profile.postEdit');
    Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});

// Home Slide Route
Route::controller(HomeSliderController::class)->group(function (){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

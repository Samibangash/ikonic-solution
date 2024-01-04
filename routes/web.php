<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFeedbackController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {

    return redirect()->route('landing.list');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/', 'landing_index')->name('landing.list');
    Route::get('product/view/{product}', 'show')->name('product.view');
});
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});



Route::middleware('auth','user-role:admin')->group(function () {

    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'admin_dashboard')->name('admin_dashboard');
    });

    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function(){
        Route::get('list', 'index')->name('list');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{user}', 'edit')->name('edit');
        Route::put('update/{user}', 'update')->name('update');
        Route::get('delete/{user}', 'destroy')->name('delete');
    });

    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function(){
        Route::get('list', 'index')->name('list');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{product}', 'edit')->name('edit');
        Route::put('update/{product}', 'update')->name('update');
        Route::get('delete/{product}', 'destroy')->name('delete');
    });

    Route::prefix('feedback.')->name('feedback.')->controller(ProductFeedbackController::class)->group(function(){
        Route::get('list', 'index')->name('list');
    });
});


Route::middleware('auth','user-role:user')->group(function () {

    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function(){

        Route::post('productFeedback', 'productFeedback')->name('productFeedback');
        Route::post('productFeedbackComment', 'productFeedbackComment')->name('productFeedbackComment');
    });

    Route::prefix('feedback.')->name('feedback.')->controller(ProductFeedbackController::class)->group(function(){
        Route::get('count/{productFeedback}', 'show')->name('count');
    });
});

require __DIR__.'/auth.php';

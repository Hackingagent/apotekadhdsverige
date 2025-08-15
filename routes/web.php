<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\auth\AuthController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');



Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');


Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

Route::get('/user/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
Route::get('/user/orders', [OrderController::class, 'showOrder'])->name('order');
Route::get('/user/profile', [ProfileController::class, 'showProfile'])->name('profile');



Route::get('/product', [ProductController::class, 'showProduct'])->name('product');
Route::get('/category', [ProductController::class, 'showCategory'])->name('category');


Route::get('/run-migrations', function() {
    Artisan::call('migrate');
    return 'Migrations completed!';
});





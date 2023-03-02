<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/dashboard")->group(function () {
    Route::redirect("/", "/dashboard/products");
    Route::get("/products", [DashboardController::class, "products"])->name("dashboard.products");
    Route::get("/orders", [DashboardController::class, "orders"])->name("dashboard.orders");
    Route::get("/customers", [DashboardController::class, "customers"])->name("dashboard.customers");
})->middleware("role");

Route::get('/user', [TestController::class, 'user'])->name('user');
Route::get('/admin', [TestController::class, 'admin'])->middleware('role')->name('admin');
Route::post('/upload/{id}', [TestController::class, 'upload'])->middleware('role');

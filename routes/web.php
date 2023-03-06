<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/carts', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::post('/carts/store', [CartController::class, 'store'])->name('cart.store')->middleware('auth');
Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');

Route::prefix("/dashboard")->group(function () {

})->middleware("role");

Route::group(['prefix' => '/dashboard', 'middleware' => "role"], function() {
    Route::redirect("/", "/dashboard/products");
    Route::get("/products", [DashboardController::class, "products"])->name("dashboard.products");
    Route::get("/products/create", [ProductController::class, "create"])->name("dashboard.products.create");
    Route::get("/products/{id}", [ProductController::class, "show"])->name("dashboard.products.show");
    Route::post("/products/store", [ProductController::class, "store"])->name("dashboard.products.store");
    Route::get("/products/edit/{id}", [ProductController::class, "edit"])->name("dashboard.products.edit");
    Route::put("/products/update/{id}", [ProductController::class, "update"])->name("dashboard.products.update");
    Route::get("/orders", [DashboardController::class, "orders"])->name("dashboard.orders");
    Route::put("/orders/approve/{id}", [OrderController::class, "approve"])->name('orders.approve');
    Route::put("/orders/reject/{id}", [OrderController::class, "reject"])->name('orders.reject');
    Route::delete("/orders/delete/{id}", [OrderController::class, "destroy"])->name('orders.delete');
    Route::get("/customers", [DashboardController::class, "customers"])->name("dashboard.customers");
});

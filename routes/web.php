<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');
// -------------------trang chủ---------------------------
// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/detail/{id}', [HomeController::class, 'show'])->name('detail');
Route::get('/products', [HomeController::class, 'products'])->name('home.products');
Route::get('/sort', [HomeController::class, 'sort'])->name('sort');
Route::get('/filter', [HomeController::class, 'filter'])->name('filter');

// -------------contacts---------------------------------

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// -------------search---------------------------------
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/product/search-result', [ProductController::class, 'searchResult'])->name('products.searchResult');

// -------------cart---------------------------------
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/check', [CartController::class, 'check'])->name('cart.check');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');


// -------------order revieww---------------------------------

Route::get('/order/information', [OrderController::class, 'information'])->name('order.information')->middleware('auth');
Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
Route::get('/orders/{order_id}/review/{product_id}', [OrderController::class, 'showReviewForm'])->name('orders.review');
Route::post('/orders/{order_id}/review/{product_id}', [OrderController::class, 'submitReview'])->name('orders.submitReview');

// ---------------login-------------------- 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');








// -----------------===========================================
Route::prefix('editor')->middleware(['auth','role:admin'])->group(function () {
// ----------------------admin=========================================================================>>

    Route::get('/admin/assign-role', [UsersController::class, 'showAssignRoleForm'])->name('assign.role-form');
    Route::post('/admin/assign-role', [UsersController::class, 'assignRole'])->name('assign.role');
// ----------------------user=========================================================================>>

    // Route::get('/', [EditorController::class, 'home'])->name('home');
    Route::get('/', [UsersController::class, 'index'])->name('layout.header');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');



// ----------------------category=========================================================================>>
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('insert_category');
    Route::post('/categories', [CategoryController::class, 'store'])->name('store_category');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// ----------------------product=========================================================================>>
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/admin_search', [ProductController::class, 'admin_search'])->name('product.admin_search');
// ----------------------order=========================================================================>>

    Route::get('/orders', [OrderController::class, 'orders'])->name('orders.index');
    Route::put('/update/status/{id}', [OrderController::class, 'updateStatus'])->name('updateStatus');
// ----------------------chart=========================================================================>>
    Route::get('/sales-by-day', [ChartController::class, 'salesByDay'])->name('chart.sales_by_day');
// ----------------------contact=========================================================================>>
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

});

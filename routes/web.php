<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
// });
Route::get('/', [HomeController::class, 'index'])->name('index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware('auth')->get('/redirect', [HomeController::class, 'redirect'])->name('redirect');

Route::middleware('auth')->get('/view_category', [AdminController::class, 'view_category'])->name('view_category');

Route::middleware('auth')->post('/add_category', [AdminController::class, 'add_category'])->name('add_category');

Route::middleware('auth')->get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');

Route::middleware('auth')->get('/view_product', [AdminController::class, 'view_product'])->name('view_product');

Route::middleware('auth')->post('/add_product', [AdminController::class, 'add_product'])->name('add_product');

Route::middleware('auth')->get('/show_product', [AdminController::class, 'show_product'])->name('show_product');

Route::middleware('auth')->get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');

Route::middleware('auth')->get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product');

Route::middleware('auth')->post('/edit_product_confirm/{id}', [AdminController::class, 'edit_product_confirm'])->name('edit_product_confirm');

Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');

Route::get('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');

Route::middleware('auth')->get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');

Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart'])->name('delete_cart');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order');

Route::get('/mpesa', [HomeController::class, 'mpesa'])->name('mpesa');

// Route::post('/stk_initiate', [HomeController::class, 'stk_initiate'])->name('stk_initiate');


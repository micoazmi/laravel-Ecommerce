<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/', [ProductController::class, 'index']);
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->middleware(['auth', 'verified'])->name('addToCart');
Route::get('/cart', [CartController::class, 'index'])->middleware(['auth', 'verified'])->name('cart');
Route::post('/checkout', [PaymentController::class, 'checkout']);
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/payment/finish', [PaymentController::class, 'finish'])->name('payment.finish');
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::post('/payment-notification', [InvoiceController::class, 'paymentNotification']);
Route::get('/invoice/{id}/success', [InvoiceController::class, 'success'])->name('invoice.success');
Route::get('/invoice/{id}/pending', [InvoiceController::class, 'pending'])->name('invoice.pending');
Route::get('/invoice/{id}/error', [InvoiceController::class, 'error'])->name('invoice.error');
Route::get('/invoices', [InvoiceController::class, 'index'])->middleware(['auth', 'verified'])->name('invoices.index');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

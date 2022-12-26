<?php

use App\Http\Controllers\StripePaymentController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::get('payments', [StripePaymentController::class, 'paymentDetail'])->name('payment-detail');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

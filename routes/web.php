<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingListController;

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
    return view('shop-form');
});

Route::get('/shop-bill', [ShoppingListController::class, 'showResult'])->name('shop-bill');

Route::post('/shop', [ShoppingListController::class, 'calculate']);

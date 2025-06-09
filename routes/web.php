<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UnitController;
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

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/'); // Redirect ke halaman utama setelah logout
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('auth.register'); // Pastikan file view ada
});

Auth::routes();

Route::resource('unit', UnitController::class);
Route::resource('medicines', MedicineController::class);
Route::resource('customers', CustomersController::class);
Route::resource('sales', SalesController::class);
Route::resource('sale_items', SaleItemController::class);







<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TransactionUserController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/detail', [DetailController::class, 'index'])->name('detail');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');


Route::post('/checkout/{id}', [CheckoutController::class, 'process'])->name('checkout-proses')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/create/{id}', [CheckoutController::class, 'create'])->name('checkout-create')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])->name('checkout-remove')
    ->middleware(['auth', 'verified']);



Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])->name('checkout-success')
    ->middleware(['auth', 'verified']);    

// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
// Route::get('/success', [CheckoutController::class, 'success'])->name('checkout-success');


Route::get('/dashboard', function () {
    return 'selamat datang user';
})->name('dashboard');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
   Route::resource('travel-package', TravelPackageController::class);
   Route::resource('gallery', GalleryController::class);
   Route::resource('transaction', TransactionController::class);
   Route::resource('transactionUser', TransactionUserController::class);
});




// INI ADALAH DEFAULT

Route::get('/dashboard-default', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboarddefault');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

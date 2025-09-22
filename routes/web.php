<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('admin.dashboard', ['title' => 'Dashboard']);
// })->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [OrderController::class, 'showOrder'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/akses', function () {
    return view('akses');
});

Route::get('/produk', [HomeController::class, 'product']);
Route::get('/detail/{product:id}', [HomeController::class, 'show'])->name('detail.show');

Route::get('/about', function () {
    return view('tentang');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/home', [HomeController::class, 'indexUser']);
    Route::get('/produk-user', [HomeController::class, 'productUser']);
    Route::get('/detail-user/{product:id}', [HomeController::class, 'showUser'])->name('detail.user');
    Route::get('/about-user', function () {
        return view('user.tentang-user');
    });
    Route::post('/home', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{product:id}', [OrderController::class, 'index']);
    Route::get('/history', [OrderController::class, 'history'])->name('orders.history');
});
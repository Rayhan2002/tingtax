<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;

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
    return view('home');
})->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login',[AuthController::class, 'index'])->name('login');
    Route::post('/login',[AuthController::class, 'login']);
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/services/store', [ServicesController::class, 'store'])->name('admin.services.store');
    Route::put('/admin/{services}', [ServicesController::class, 'update'])->name('admin.services.update');
    Route::delete('admin/{services}', [ServicesController::class, 'destroy'])->name('admin.services.destroy');
    Route::post('/admin/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::put('/admin/portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
    Route::delete('/admin/portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');
    Route::delete('/admin/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');

    Route::get('/logout', [AuthController::class, 'logout']);
});

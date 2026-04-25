<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\PortfolioAdminController;
use App\Http\Controllers\PortfolioSiteController;
use App\Http\Controllers\UserTasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioSiteController::class, 'home']);
Route::get('/portifolio', [PortfolioSiteController::class, 'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('tasks.index');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return redirect()->route('profile.show');
    })->name('profile.edit');

    Route::resource('tasks', UserTasksController::class);
    Route::post('category/store', [UserTasksController::class, 'storeCategory'])->name('category.store');

    Route::middleware('portfolio.admin')->prefix('portfolio-admin')->name('portfolio-admin.')->group(function () {
        Route::get('/', [PortfolioAdminController::class, 'index'])->name('index');
        Route::post('/', [PortfolioAdminController::class, 'store'])->name('store');
        Route::put('/{portfolioItem}', [PortfolioAdminController::class, 'update'])->name('update');
    });
});

Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('/{detailPath}', [PortfolioSiteController::class, 'detailByPath'])
    ->where('detailPath', 'projeto(?:-[A-Za-z0-9]+(?:\.html)?)?');

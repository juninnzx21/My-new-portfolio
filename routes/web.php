<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\UserTasksController;

// Rota principal
Route::get('/', function () {
    return view('portifolio');
});

// Middleware para rotas autenticadas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Remove ou modifica a rota para dashboard e redireciona para tasks
    Route::get('/dashboard', function () {
        return redirect()->route('tasks.index');
    })->name('dashboard');
});

// Grupo de rotas autenticadas para gerenciamento de tarefas
Route::middleware('auth')->group(function () {
    // Rota para gerenciar tarefas
    Route::resource('tasks', UserTasksController::class);

    // Rota para criar nova categoria
    Route::post('category/store', [UserTasksController::class, 'storeCategory'])->name('category.store');
});

// Rota do portfólio
Route::get('/portifolio', function () {
    return view('portifolio');
});

// Rota para o envio de mensagens de contato
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');


Route::get('/projeto', function () {
    return view('portfolio_details');
});

Route::get('/projeto-1', function () {
    return view('portfolio_details-1');
});

Route::get('/projeto-2', function () {
    return view('portfolio_details-2');
});

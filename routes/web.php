<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DiscoController;
use App\Http\Controllers\PedidoController;
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
    return view('base.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('usuario', UsuarioController::class);
    Route::resource('disco', DiscoController::class);
    Route::resource('pedido', PedidoController::class);
    Route::resource('leitura', LeituraController::class);
    
    Route::post('usuario/search', [UsuarioController::class, 'search'])->name(
        'usuario.search'
    );
    Route::post('disco/search', [DiscoController::class, 'search'])->name(
        'disco.search'
    );
    Route::post('pedido/search', [PedidoController::class, 'search'])->name(
        'pedido.search'
    );
    Route::post('leitura/search', [LeituraController::class, 'search'])->name(
        'leitura.search'
    );
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

require __DIR__.'/auth.php';

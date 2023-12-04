<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/itens', function () {
        return view('pages.item.index');
    })->name('itens');

    Route::get('/clientes', function () {
        return view('pages.cliente.index');
    })->name('clientes');

    Route::get('/pedidos', function () {
        return view('pages.pedido.index');
    })->name('pedidos');

    Route::get('/contas', function () {
        return view('pages.contas.index');
    })->name('contas');

    Route::prefix('/contas')->group(function () {

        Route::get('/contas-pagar', function () {
            return view('pages.contas.contas-pagar');
        })->name('contas-pagar');

    });

    Route::get('/relatorios', function () {
        return view('pages.relatorios');
    })->name('relatorios');

    Route::prefix('/relatorios')->group(function () {

        Route::get('/relatorio-pedidos', function () {
            return view('pages.relatorios.relatorio-pedidos');
        })->name('relatorio-pedidos');

    });
});

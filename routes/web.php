<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PessoalController;
use App\Http\Controllers\ProdutoController;
use App\Mail\MensagemMail;
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

Route::get('/mensagem-texto', function () {
    return new MensagemMail();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('/pessoal')->name('pessoal.')->group(function () {
        Route::get('/', function () {
            return view('pages.pessoal.index');
        })->name('index');

        Route::get('/{codigo}', [PessoalController::class, 'show'])->name('show');
    });

    Route::prefix('/produto')->name('produto.')->group(function () {
        Route::get('/', function () {
            return view('pages.produto.index');
        })->name('index');

        Route::get('/{codigo}', [ProdutoController::class, 'show'])->name('show');
    });

    Route::prefix('/pedidos')->name('pedidos.')->group(function () {
        Route::get('/', function () {
            return view('pages.pedido.index');
        })->name('index');

        Route::get('/{codigo}', [PedidoController::class, 'show'])->name('show');
    });



    Route::prefix('/contas')->name('contas.')->group(function () {

        Route::get('/', function () {
            return view('pages.contas.index');
        })->name('index');

        Route::get('/{codigo}', [ContaController::class, 'show'])->name('show');
    });

    

    Route::prefix('/relatorios')->name('relatorios.')->group(function () {

        Route::get('/', function () {
            return view('pages.relatorios.index');
        })->name('index');

        Route::get('/pedidos', function () {
            return view('pages.relatorios.relatorio-pedidos');
        })->name('relatorio-pedidos');

        Route::get('/contas', function () {
            return view('pages.relatorios.relatorio-contas');
        })->name('relatorio-contas');
    });

    Route::get('/configuracao', function () {
        return view('pages.configuracao.index');
    })->name('configuracao');
});

<?php

use App\Http\Controllers\PessoalController;
use App\Livewire\Pessoal\CadastroPessoas;
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


    Route::get('/produtos', function () {
        return view('pages.produto.index');
    })->name('produtos');

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
        return view('pages.relatorios.index');
    })->name('relatorios');

    Route::prefix('/relatorios')->group(function () {

        Route::get('/pedidos', function () {
            return view('pages.relatorios.relatorio-pedidos');
        })->name('relatorio-pedidos');

        Route::get('/contas-pagar', function () {
            return view('pages.relatorios.relatorio-contas-pagar');
        })->name('relatorio-contas-pagar');
    });

    Route::get('/configuracao', function () {
        return view('pages.configuracao.index');
    })->name('configuracao');
});

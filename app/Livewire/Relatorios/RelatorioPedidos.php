<?php

namespace App\Livewire\Relatorios;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class RelatorioPedidos extends Component
{
    use WithPagination;

    public $cliente;
    public $formaPagamento;

    public $mostrarRelatorio;


    public function mostrarFiltros(){
        $this->mostrarRelatorio = false;
    }

    public function visualizarRelatorio(){
        $this->mostrarRelatorio = true;
     
    }

    public function render()
    {
        $pedidos = Pedido::where('cliente_id', 'like', '%'. $this->cliente .'%')
                    ->where('forma_pagamento_id', 'like', '%'. $this->formaPagamento .'%')
                    ->paginate(10);

        $clientes = Cliente::all();
        $formaPagamentos = FormaPagamento::all();

        return view('livewire.relatorios.relatorio-pedidos', [ 
            'pedidos' => $pedidos,
            'formaPagamentos' => $formaPagamentos,
            'clientes' => $clientes
        ]);
    }
}

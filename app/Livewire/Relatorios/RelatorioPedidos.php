<?php

namespace App\Livewire\Relatorios;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Pedido;
use Livewire\Component;

class RelatorioPedidos extends Component
{
    public function render()
    {
        $pedidos = Pedido::all();
        $clientes = Cliente::all();
        $formaPagamentos = FormaPagamento::all();

        return view('livewire.relatorios.relatorio-pedidos', [ 
            'pedidos' => $pedidos,
            'formaPagamentos' => $formaPagamentos,
            'clientes' => $clientes
        ]);
    }
}

<?php

namespace App\Livewire\Relatorios;

use App\Models\Pedido;
use Livewire\Component;

class RelatorioPedidos extends Component
{
    public function render()
    {
        $pedidos = Pedido::all();
        return view('livewire.relatorios.relatorio-pedidos', [ 
            'pedidos' => $pedidos
        ]);
    }
}

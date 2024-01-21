<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemPedidos extends Component
{
    use WithPagination;

    public $readyLoad = false;

    public $search;

    public function load(){
        $this->readyLoad = true;
    }

    public function dados(){
        $pedidos = Pedido::select([
            'pedidos.id',
            'pedidos.pessoa_id',
            'pedidos.forma_pagamento_id',
            'pedidos.descricao',
            'pedidos.status',
            'pedidos.total_itens',
            'pedidos.desconto',
            'pedidos.total_pedido',
        ])->paginate(5);

        return $pedidos;
    }

    public function render()
    {
        return view('livewire.pedidos.listagem-pedidos', [
            'pedidos' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}

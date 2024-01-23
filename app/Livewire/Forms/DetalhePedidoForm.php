<?php

namespace App\Livewire\Forms;

use App\Models\Pedido;
use Livewire\Attributes\Rule;
use Livewire\Form;

class DetalhePedidoForm extends Form
{
    public $pedido;
    public $pessoa;
    public $descricao;
    public $formaDePagamento;
    public $totalPedido;
    public $total;
    public $desconto;
    public $totalProdutos;
    
    public function pedido($codigo){
        $this->pedido = Pedido::where('id', $codigo)->get()->first();

        // $this->codigoPedido = $pedido->id;
        // $this->pessoa = $pedido->pessoa_id;
        // $this->descricao = $pedido->descricao;
        // $this->formaDePagamento = $pedido->forma_pagamento_id;
        // $this->totalPedido = $pedido->total_pedido;
        // $this->total = $pedido->total_pedido;
        // $this->desconto = $pedido->desconto;
        // $this->totalProdutos = $pedido->total_itens;
    }
}

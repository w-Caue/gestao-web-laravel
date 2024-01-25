<?php

namespace App\Livewire\Forms;

use App\Models\Pedido;
use Livewire\Attributes\Rule;
use Livewire\Form;

class DetalhePedidoForm extends Form
{
    public $pedido;

    public $pagamento;
    public $descricao;


    public function pedido($codigo)
    {
        $this->pedido = Pedido::where('id', $codigo)->get()->first();

        $this->pagamento = $this->pedido->forma_pagamento_id;
        $this->descricao = $this->pedido->descricao;
    }

    public function finalizar()
    {
        Pedido::find($this->pedido->id)->update([
            'forma_pagamento_id' => $this->pagamento,
            'descricao' => $this->descricao,
            'status' => 'Finalizado'
        ]);
    }
}

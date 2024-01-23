<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\DetalhePedidoForm;
use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class DetalhePedidos extends Component
{
    public DetalhePedidoForm $form;

    use WithPagination;

    // public $produtos;

    public function mount($codigo){
        $this->form->pedido($codigo);
    }

    public function produtos(){
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca_id',
            'produtos.preco_1',
        ]);

        return $produtos->paginate(5);
    }

    public function render()
    {
        return view('livewire.pedidos.detalhe-pedidos', [
            'produtos' => $this->produtos(),
        ]);
    }
}

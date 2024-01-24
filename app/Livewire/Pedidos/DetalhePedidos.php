<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\DetalhePedidoForm;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class DetalhePedidos extends Component
{
    public DetalhePedidoForm $form;

    use WithPagination;

    public $produtoDetalhe;

    public $quantidade;
    public $total;

    public function mount($codigo)
    {
        $this->form->pedido($codigo);
    }

    public function produtos()
    {
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca_id',
            'produtos.preco_1',
        ]);

        return $produtos->paginate(4);
    }

    public function produtoPedido($codigo)
    {
        $this->produtoDetalhe = Produto::where('id', $codigo)->get()->first();

        $this->total = $this->produtoDetalhe->preco_1;

        $this->dispatch('open-produto');
    }

    public function adicionarProduto()
    {
        $this->total = $this->total * $this->quantidade;

        PedidoItem::create([
            'pedido_id' => $this->form->pedido->id,
            'produto_id' => $this->produtoDetalhe->id,
            'quantidade' => $this->quantidade,
            'total' => $this->total
        ]);

        $this->dispatch('close-produto');

        // // $this->totalPedido = $this->total + $this->totalPedido;
        // $this->total = $this->total + $this->form->pedido->total_itens;

        // Pedido::findOrFail($this->tform->pedido->id)->update([
        //     'total_pedido' => $this->totalPedido,
        //     'total_itens' => $this->total
        // ]);

        $this->alert('success', 'Item Adicionado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.pedidos.detalhe-pedidos', [
            'produtos' => $this->produtos(),
        ]);
    }
}

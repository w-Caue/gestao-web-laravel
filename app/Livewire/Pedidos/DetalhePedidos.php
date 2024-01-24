<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\DetalhePedidoForm;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Produto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class DetalhePedidos extends Component
{
    public DetalhePedidoForm $form;

    use LivewireAlert;

    use WithPagination;

    public $produtoDetalhe;

    public $quantidade = 1;
    public $total;
    public $totalPedido;

    protected $listeners = [
        'deleteProduto'
    ];

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

        if ($this->total <= 0) {
            return $this->alert('warning', 'Produto sem Preço!', [
                'position' => 'center',
                'timer' => '2000',
                'toast' => false,
            ]);
        }

        $this->total *= $this->quantidade;

        PedidoItem::create([
            'pedido_id' => $this->form->pedido->id,
            'produto_id' => $this->produtoDetalhe->id,
            'quantidade' => $this->quantidade,
            'total' => $this->total
        ]);

        $this->dispatch('close-produto');

        $this->totalPedido += $this->total;
        $this->total += $this->form->pedido->total_itens;

        Pedido::findOrFail($this->form->pedido->id)->update([
            'total_pedido' => $this->totalPedido,
            'total_itens' => $this->total
        ]);

        $this->alert('success', 'Item Adicionado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function removerProduto(Produto $produto)
    {
        $this->deleteProduto($produto);

        $this->alert('info', 'Remover Esse Item do Pedido?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'deleteProduto',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function deleteProduto(Produto $produto)
    {
        $pedido = Pedido::where('id', $this->form->pedido->id)->get()->first();

        $pedidoItem = PedidoItem::where('pedido_id', $this->form->pedido->id)
            ->where('produto_id', $produto->id)->get()->first();

        $totalPedido = $pedido->total_pedido;
        $totalPedido -= $produto->preco_1 * $pedidoItem->quantidade;

        $totalItens = $pedidoItem->total;
        $totalItens -= $produto->preco_1 * $pedidoItem->quantidade;

        Pedido::findOrFail($this->form->pedido->id)->update([
            'total_pedido' => $totalPedido,
            'total_itens' => $totalItens,
        ]);

        PedidoItem::where('pedido_id', $this->form->pedido->id)
            ->where('produto_id', $produto->id)->delete();


        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        return view('livewire.pedidos.detalhe-pedidos', [
            'produtos' => $this->produtos(),
        ]);
    }
}

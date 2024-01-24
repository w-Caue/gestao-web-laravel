<?php

namespace App\Livewire\Pedidos;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Pessoa;
use App\Models\Produto;
use App\Models\Status;
use Illuminate\Support\Facades\Date;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Pedidos extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $modal = false;
    public $formStatus;
    public $startDate;
    public $endDate;

    #tela de pessoas
    public $pessoas;
    public $pessoaPedido;

    // #criar pedido
    public $formaDePagamento;
    public $descricao;
    public $status = 'Aberto';

    #tela de itens
    public $telaPedido;
    public $produtos;
    public $codigoProduto;

    public $quantidade = 1;

    #visualizar pedido
    public $itemPedido;
    public $totalPedido = '0';
    public $totalProdutos = '0';

    #autenticação
    public $showAutenticacao = false;
    public $desconto;
    public $total;
    public $valorPago;
    public $troco;

    protected $listeners = [
        'deleteItem'
    ];

    public function show(Pedido $pedido)
    {
        $this->modal = true;
        $this->visualizarPedido($pedido);

    }

    public function openModal()
    {
        $this->modal = true;  
        $this->formStatus = 'novo';
        $this->telaPedido = new Pedido();
    }

    public function closeModal()
    {
        $this->reset('formaDePagamento');
        $this->resetValidation();
        $this->modal = false;
        $this->dispatch('close-detalhes');
    }

    public function save()
    {
        $pedido = Pedido::create([
            'pessoa_id' => $this->pessoaPedido->id,
            'forma_pagamento_id' => $this->formaDePagamento,
            'descricao' => $this->descricao,
            'status' => 'Aberto'
        ]);

        $this->dispatch('close-modal');

        $this->redirectRoute('pedidos.show', ['codigo'=> $pedido->id]);
    }

    // public function visualizarPedido(Pedido $pedido)
    // {
    //     $this->formStatus = 'visualizar';

    //     $this->telaPedido = Pedido::where('id', $pedido->id)->get()->first();

    //     $this->formaDePagamento = $this->telaPedido->forma_pagamento_id;
    //     $this->totalPedido = $this->telaPedido->total_pedido;
    //     $this->total = $this->telaPedido->total_pedido;
    //     $this->desconto = $this->telaPedido->desconto;
    //     $this->totalProdutos = $this->telaPedido->total_itens;
    //     $this->status = $this->telaPedido->status;
    //     $this->descricao = $this->telaPedido->descricao;
    // }

    public function finalizarPedido()
    {
        Pedido::find($this->telaPedido->id)->update([
            'forma_pagamento_id' => $this->formaDePagamento,
            'descricao' => $this->descricao,
            'total_itens' => $this->totalProdutos,
            'total_pedido' => $this->totalPedido,
            'status' => 'Finalizado'
        ]);

        $this->modal = false;

        $this->alert('success', 'Pedido Finalizado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function autenticarPedido()
    {
        Pedido::findOrFail($this->telaPedido->id)->update([
            'forma_pagamento_id' => $this->formaDePagamento,
            'total_pedido' => $this->total,
            'desconto' => $this->desconto,
            'status' => 'Autenticado'
        ]);

        $this->dispatch('close-detalhes');

        $this->alert('success', 'Pedido Autenticado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);

        $this->modal = false;
    }

    public function editePedido()
    {
        if ($this->status == 'Aberto') {
            Pedido::findOrFail($this->telaPedido->id)->update([
                'forma_pagamento_id' => $this->formaDePagamento,
                'total_pedido' => $this->telaPedido->total_itens,
                'desconto' => '0',
                'descricao' => $this->descricao,
                'status' => $this->status
            ]);
        } else {
            Pedido::findOrFail($this->telaPedido->id)->update([
                'forma_pagamento_id' => $this->formaDePagamento,
                'descricao' => $this->descricao,
                'status' => $this->status
            ]);
        }

        $this->modal = false;

        $this->alert('success', 'Pedido Salvo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function pedidoProdutos()
    {
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca',
            'produtos.preco_1',
        ])->get();

        $this->produtos = $produtos;
    }

    public function detalheProduto(Produto $produto)
    {

        $this->codigoProduto = $produto;

        $this->totalProdutos = $produto->preco_1;
    }

    

    public function removerItem(Produto $item)
    {
        $this->itemPedido = $item;

        $this->alert('info', 'Remover Esse Item do Pedido?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'deleteItem',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function deleteItem()
    {

        $pedido = PedidoItem::where('pedido_id', $this->telaPedido->id)
            ->where('item_id', $this->itemPedido->id)->get()->first();

        $this->totalPedido = $this->totalPedido - ($this->itemPedido->preco_1 * $pedido->quantidade);
        $this->totalProdutos = $this->totalProdutos - ($this->itemPedido->preco_1 * $pedido->quantidade);

        Pedido::findOrFail($this->telaPedido->id)->update([
            'total_pedido' => $this->totalPedido,
            'total_itens' => $this->totalProdutos
        ]);

        PedidoItem::where('pedido_id', $this->telaPedido->id)
            ->where('item_id', $this->itemPedido->id)->delete();


        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        if ($this->startDate == null or $this->startDate == '' or $this->endDate == null or $this->endDate == '') {
            $this->startDate = date('Y-m-d');
            $this->endDate = date('Y-m-d');
        }

        $pedidos = Pedido::whereDate('created_at', '>=', $this->startDate)
            ->whereDate('created_at', '<=', $this->endDate)
            ->paginate(5);

        $itens = Produto::all();

        $formasPagamentos = FormaPagamento::all();

        $statusPedido = Status::all();

        return view('livewire.pedidos.pedidos', [
            'pedidos' => $pedidos,
            'itens' => $itens,
            'formasPagamentos' => $formasPagamentos,
            'statusPedido' => $statusPedido
        ]);
    }
}

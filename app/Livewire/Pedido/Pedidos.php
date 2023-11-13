<?php

namespace App\Livewire\Pedido;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Status;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Pedidos extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $newPedido;

    #tela de clientes
    public $showClientes;
    public $clientes;
    public $clientePedido;

    #criar pedido
    public $formaDePagamento;
    public $descricao;
    public $status = 'Aberto';

    #tela de itens
    public $showPedido;
    public $telaPedido;
    public $showItem;
    public $itens;

    #visualizar pedido
    public $itemPedido;
    public $totalPedido = '0';

    protected $listeners = [
        'deleteItem'
    ];

    public function novoPedido()
    {
        $this->newPedido = true;
    }

    public function fecharPedido()
    {
        $this->reset();
        $this->resetValidation();
        $this->newPedido = false;
        $this->showPedido = false;
    }

    public function fecharTelaItens()
    {
        $this->showItem = false;
    }

    public function visualizarClientes()
    {
        $this->showClientes = !$this->showClientes;
    }

    public function visualizarPedido(Pedido $pedido)
    {
        $this->showPedido = true;

        $this->telaPedido = Pedido::where('id', $pedido->id)->get()->first();

        $this->formaDePagamento = $this->telaPedido->forma_pagamento_id;
        $this->totalPedido = $this->telaPedido->total;
        $this->status = $this->telaPedido->status;
        $this->descricao = $this->telaPedido->descricao;
    }

    public function telaItens()
    {
        $this->showItem = true;

        $itens = Item::select([
            'itens.id',
            'itens.nome',
            'itens.descricao',
            'itens.marca',
            'itens.preco_1',
        ])->where('marca', 'Propria')->get();

        $this->itens = $itens;
    }

    public function adicionarItem(Item $item)
    {
        $pedidoItem = PedidoItem::where('pedido_id', $this->telaPedido->id)
            ->where('item_id', $item->id)->get()->count();

        if ($pedidoItem > 0) {
            $this->alert('info', 'Item Já Adicionado!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => true,
            ]);
        } else {
            PedidoItem::create([
                'pedido_id' => $this->telaPedido->id,
                'item_id' => $item->id
            ]);

            $this->totalPedido = $item->preco_1 + $this->totalPedido;

            $this->alert('success', 'Item Adicionado!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => true,
            ]);
        }
    }

    public function pesquisaClientes()
    {
        $clientes = Cliente::select([
            'clientes.id',
            'clientes.nome',
            'clientes.whatsapp',
            'clientes.status',
        ])->where('status', 'Ativo')->get();

        $this->clientes = $clientes;
    }

    public function selecioneCliente($cliente)
    {
        $this->clientePedido = Cliente::where('id', $cliente)->get()->first();

        $this->visualizarClientes();
    }

    public function save()
    {
        Pedido::create([
            'cliente_id' => $this->clientePedido->id,
            'forma_pagamento_id' => $this->formaDePagamento,
            'descricao' => $this->descricao,
            'status' => 'Aberto'
        ]);

        $this->fecharPedido();

        $this->alert('success', 'Pedido Criado!', [
            'position' => 'center',
            'timer' => '2000',
            'toast' => false,
        ]);
    }

    public function finalizarPedido()
    {
        Pedido::findOrFail($this->telaPedido->id)->update([
            'forma_pagamento_id' => $this->formaDePagamento,
            'descricao' => $this->descricao,
            'total' => $this->totalPedido,
            'status' => 'Finalizado'
        ]);

        $this->fecharPedido();

        $this->alert('success', 'Pedido Finalizado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function editePedido()
    {
        Pedido::findOrFail($this->telaPedido->id)->update([
            'forma_pagamento_id' => $this->formaDePagamento,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        $this->fecharPedido();

        $this->alert('success', 'Pedido Salvo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function removerItem(Item $item){
        $this->itemPedido = $item;

        $this->alert('info','Remover Esse Item do Pedido?', [
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

    public function deleteItem(){

        PedidoItem::where('pedido_id', $this->telaPedido->id)
                    ->where('item_id', $this->itemPedido->id)->delete();

        $this->totalPedido = $this->totalPedido - $this->itemPedido->preco_1;

        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        $pedidos = Pedido::paginate(5);

        $formasPagamentos = FormaPagamento::all();

        $statusPedido = Status::all();

        return view('livewire.pedido.pedidos', [
            'pedidos' => $pedidos,
            'formasPagamentos' => $formasPagamentos,
            'statusPedido' => $statusPedido
        ]);
    }
}

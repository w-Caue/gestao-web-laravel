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

    #detalhe do cliente
    public $clienteDetalhe;
    public $informacoesCliente;

    #criar pedido
    public $formaDePagamento;
    public $descricao;
    public $status = 'Aberto';

    #tela de itens
    public $showPedido;
    public $telaPedido;
    public $showItem;
    public $itens;
    public $detalheItem;
    public $itemId;
    public $quantidade = 1;

    #visualizar pedido
    public $itemPedido;
    public $totalPedido = '0';
    public $totalItens = '';

    #autenticação
    public $showAutenticacao = false;
    public $desconto;
    public $valorPago;
    public $troco;

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
        $this->totalPedido = $this->telaPedido->total_pedido;
        $this->desconto = $this->telaPedido->desconto;
        $this->totalItens = $this->telaPedido->total_itens;
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

    public function quantidadeItem(Item $item)
    {
        $this->detalheItem = true;

        $this->itemId = $item;

        $this->totalItens = $item->preco_1;
    }

    public function fecharDetalhe()
    {
        $this->detalheItem = false;
    }

    public function adicionarItem()
    {

        $this->totalItens = $this->totalItens * $this->quantidade;

        PedidoItem::create([
            'pedido_id' => $this->telaPedido->id,
            'item_id' => $this->itemId->id,
            'quantidade' => $this->quantidade,
            'total' => $this->totalItens
        ]);

        $this->fecharDetalhe();

        $this->totalPedido = $this->totalItens + $this->totalPedido;
        $this->totalItens = $this->totalItens + $this->telaPedido->total_itens;

        Pedido::findOrFail($this->telaPedido->id)->update([
            'total_pedido' => $this->totalPedido,
            'total_itens' => $this->totalItens
        ]);

        $this->alert('success', 'Item Adicionado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);
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
            'total_itens' => $this->totalItens,
            'total_pedido' => $this->totalPedido,
            'status' => 'Finalizado'
        ]);

        $this->showAutenticacao = true;
    }

    public function autenticarPedido()
    {
        Pedido::findOrFail($this->telaPedido->id)->update([
            'total_pedido' => $this->totalPedido,
            'desconto' => $this->desconto,
            'status' => 'Autenticado'
        ]);

        $this->showAutenticacao = false;

        $this->alert('success', 'Pedido Autenticado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
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

        $this->fecharPedido();

        $this->alert('success', 'Pedido Salvo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function removerItem(Item $item)
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


        PedidoItem::where('pedido_id', $this->telaPedido->id)
            ->where('item_id', $this->itemPedido->id)->delete();


        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function detalheCliente(Pedido $pedido)
    {
        $this->clienteDetalhe = true;

        $this->informacoesCliente = Pedido::where('cliente_id', $pedido->cliente_id)->get()->first();
    }

    public function fecharDetalheCliente()
    {
        $this->clienteDetalhe = false;
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

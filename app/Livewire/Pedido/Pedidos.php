<?php

namespace App\Livewire\Pedido;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Pedidos extends Component
{
    use LivewireAlert;

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

    public function novoPedido()
    {
        $this->newPedido = true;
    }

    public function fecharPedido()
    {
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

    public function adicionarItem($item)
    {
        $pedidoItem = PedidoItem::where('pedido_id', $this->telaPedido->id)
                                ->where('item_id', $item)->get()->count();

        if ($pedidoItem > 0) {
            $this->alert('info', 'Item Já Adicionado!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => true,
            ]);
        } else {
            PedidoItem::create([
                'pedido_id' => $this->telaPedido->id,
                'item_id' => $item
            ]);

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
        ])->get();

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
            'status' => $this->status
        ]);

        $this->fecharPedido();

        $this->alert('success', 'Pedido Criado!', [
            'position' => 'center',
            'timer' => '2000',
            'toast' => false,
        ]);
    }



    public function render()
    {
        $pedidos = Pedido::all();

        $formasPagamentos = FormaPagamento::all();

        return view('livewire.pedido.pedidos', [
            'pedidos' => $pedidos,
            'formasPagamentos' => $formasPagamentos
        ]);
    }
}

<?php

namespace App\Livewire\Pedido;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Pedido;
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
    

    public function novoPedido()
    {
        $this->newPedido = true;
    }

    public function fecharPedido()
    {
        $this->newPedido = false;
    }

    public function visualizarClientes()
    {
        $this->showClientes = !$this->showClientes;
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

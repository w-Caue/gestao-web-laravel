<?php

namespace App\Livewire\Relatorios;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class RelatorioPedidos extends Component
{
    use WithPagination;

    public $mostrarRelatorio;

    public $pedidos;

    public $clientes;
    public $clienteRelatorio;

    public $cliente;
    public $formaPagamento;
    public $dataInicio;
    public $dataFinal;

    public $totais;


    public function filtros()
    {
        $this->mostrarRelatorio = false;
        $this->reset('cliente', 'clienteRelatorio');
    }

    public function visualizarRelatorio()
    {
        $this->mostrarRelatorio = true;
    }

    public function pesquisaClientes()
    {
        $clientes = Cliente::select([
            'clientes.id',
            'clientes.nome',
            'clientes.whatsapp',
            'clientes.status',
            'clientes.tipo',
        ])->where('status', 'Ativo')->get();

        $this->clientes = $clientes;
    }

    public function selecioneCliente($cliente)
    {
        $this->clienteRelatorio = Cliente::where('id', $cliente)->get()->first();

        $this->cliente = $this->clienteRelatorio->id;

        $this->dispatch('close-clientes');
    }

    public function relatorio()
    {
        $this->mostrarRelatorio = true;

        $pedidos = Pedido::select([
            'pedidos.id',
            'pedidos.cliente_id',
            'pedidos.descricao',
            'pedidos.forma_pagamento_id',
            'pedidos.total_pedido',
            'pedidos.created_at',
        ])
            #Filtros
        ->when($this->cliente, function ($query) {
            return $query->where('cliente_id', $this->cliente);
        })
            ->when($this->formaPagamento, function ($query) {
                return $query->where('forma_pagamento_id', $this->formaPagamento);
            })
            ->when($this->dataInicio, function ($query) {
                return $query->whereDate('created_at', '>=' , $this->dataInicio);
            })
            ->when($this->dataFinal, function ($query) {
                return $query->whereDate('created_at', '<=' , $this->dataFinal);
            });

        $this->pedidos = $pedidos->get();

        $total = 0;
        foreach ($this->pedidos as $key => $value) {
            $total += $value['total_pedido'];
        }
        $this->totais = $total;
    }

    public function render()
    {
        $clientes = Cliente::all();
        $formaPagamentos = FormaPagamento::all();

        return view('livewire.relatorios.relatorio-pedidos', [
            'formaPagamentos' => $formaPagamentos,
            'clientes' => $clientes
        ]);
    }
}

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

    public $clientes;
    public $clienteRelatorio;
    public $clienteEmpresa;
    public $formaPagamento;


    public function mostrarFiltros(){
        $this->mostrarRelatorio = false;
    }

    public function visualizarRelatorio(){
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

        $this->clienteEmpresa = $this->clienteRelatorio->id;
    }

    public function render()
    {
        $pedidos = Pedido::where('cliente_id', 'like', '%'. $this->clienteEmpresa .'%')
                    ->where('forma_pagamento_id', 'like', '%'. $this->formaPagamento .'%')
                    ->paginate(10);

        $clientes = Cliente::all();
        $formaPagamentos = FormaPagamento::all();

        return view('livewire.relatorios.relatorio-pedidos', [ 
            'pedidos' => $pedidos,
            'formaPagamentos' => $formaPagamentos,
            'clientes' => $clientes
        ]);
    }
}

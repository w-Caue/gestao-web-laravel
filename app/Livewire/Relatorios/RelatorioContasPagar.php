<?php

namespace App\Livewire\Relatorios;

use App\Models\AgenteCobrador;
use App\Models\Cliente;
use App\Models\Conta;
use Livewire\Component;

class RelatorioContasPagar extends Component
{
    public $documentos;

    public $clienteEmpresa = '';
    public $agenteCobrador;
    public $status;
    public $startData;
    public $endData;

    public $visualizarDocumentos;

    public $clientes;
    public $mostrarClientes;
    public $clienteRelatorio;
    public $doc;

    public $totais;

    public $dataVencimentoInicio;
    public $dataVencimentoFinal;


    public function mount(){
        $this->dataVencimentoInicio = date('Y-m-d');
        $this->dataVencimentoFinal = date('Y-m-d');
    }

    public function mostrarRelatorio()
    {
        $this->visualizarDocumentos = true;

        $documentos = Conta::select([
            'contas.id',
            'contas.cliente_id',
            'contas.descricao',
            'contas.ag_cobrador_id',
            'contas.forma_pagamento_id',
            'contas.data_lancamento',
            'contas.data_vencimento',
            'contas.data_pagamento',
            'contas.valor_documento',
            'contas.valor_pago',
        ]);


        if ($this->clienteEmpresa == '') {
            $documentos->whereDate('data_vencimento', '>=', $this->dataVencimentoInicio)->
                        whereDate('data_vencimento', '<=', $this->dataVencimentoFinal);
            $this->documentos = $documentos->get();
        } else {
            $documentos->where('cliente_id', $this->clienteEmpresa);
            $this->documentos = $documentos->get();
        }

        $total = 0;
        foreach ($this->documentos as $key => $value) {
            $total += $value['valor_documento'];
        }
        $this->totais = $total;

    }

    public function fecharRelatorio()
    {
        $this->visualizarDocumentos = false;
    }

    public function visualizarClientes()
    {
        $this->mostrarClientes = !$this->mostrarClientes;
    }

    public function pesquisaClientes()
    {
        $clientes = Cliente::select([
            'clientes.id',
            'clientes.nome',
            'clientes.whatsapp',
            'clientes.status',
            'clientes.tipo',
        ])->where('status', 'Ativo')->where('tipo', 'Empresa')->get();

        $this->clientes = $clientes;
    }

    public function selecioneCliente($cliente)
    {
        $this->clienteRelatorio = Cliente::where('id', $cliente)->get()->first();

        $this->clienteEmpresa = $this->clienteRelatorio->id;

        $this->visualizarClientes();
    }

    public function render()
    {
        $agentesCobradores = AgenteCobrador::all();

        return view('livewire.relatorios.relatorio-contas-pagar', [
            'agentesCobradores' => $agentesCobradores
        ]);
    }
}

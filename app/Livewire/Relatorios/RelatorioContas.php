<?php

namespace App\Livewire\Relatorios;

use App\Models\AgenteCobrador;
use App\Models\Cliente;
use App\Models\Conta;
use Livewire\Component;

class RelatorioContas extends Component
{
    public $documentos;

    public $clienteEmpresa;
    public $cobrador;
    public $status;

    public $inicioDataLancamento;
    public $finalDataLancamento;

    public $inicioDataVencimento;
    public $finalDataVencimento;

    public $visualizarDocumentos;

    public $clientes;
    public $tipo = 'Cliente';
    public $mostrarClientes;
    public $clienteRelatorio;

    public $totais;


    public function mount()
    {
        // $this->dataVencimentoInicio = date('m');
        // $this->dataVencimentoFinal = date('Y-m-d');
    }

    public function fecharRelatorio()
    {
        $this->visualizarDocumentos = false;
    }

    public function relatorio()
    {
        // $this->visualizarDocumentos = true;
        // $this->dispatch('open-modal');

        $documentos = Conta::select([
            'contas.id',
            'contas.pessoa_id',
            'contas.status',
            'contas.descricao',
            'contas.ag_cobrador_id',
            'contas.forma_pagamento_id',
            'contas.data_lancamento',
            'contas.data_vencimento',
            'contas.data_pagamento',
            'contas.valor_documento',
            'contas.valor_pago',
        ])    #Filtros
            ->when($this->clienteEmpresa, function ($query) {
                return $query->where('cliente_id', $this->clienteEmpresa);
            })
            ->when($this->cobrador, function ($query) {
                return $query->where('ag_cobrador_id', $this->cobrador);
            })
            ->when($this->inicioDataVencimento, function ($query) {
                return $query->whereDate('data_vencimento', '>=', $this->inicioDataVencimento);
            })
            ->when($this->finalDataVencimento, function ($query) {
                return $query->whereDate('data_vencimento', '<=', $this->finalDataVencimento);
            });

        $this->documentos = $documentos->get();

        $total = 0;
        foreach ($this->documentos as $key => $value) {
            $total += $value['valor_documento'];
        }

        $this->totais = $total;
    }

    // public function pesquisaClientes()
    // {
    //     $clientes = Cliente::select([
    //         'clientes.id',
    //         'clientes.nome',
    //         'clientes.whatsapp',
    //         'clientes.status',
    //         'clientes.tipo',
    //     ])->when($this->tipo, function ($query) {
    //         return $query->where('tipo', '=', $this->tipo);
    //     });


    //     $this->clientes = $clientes->get();
    // }

    // public function selecioneCliente($cliente)
    // {
    //     $this->clienteRelatorio = Cliente::where('id', $cliente)->get()->first();

    //     $this->clienteEmpresa = $this->clienteRelatorio->id;

    //     $this->dispatch('close-detalhes');
    // }

    public function render()
    {
        return view('livewire.relatorios.relatorio-contas', [
            'cobradores' => AgenteCobrador::all(),
        ]);
    }
}

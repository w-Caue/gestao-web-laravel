<?php

namespace App\Livewire\Relatorios;

use App\Models\AgenteCobrador;
use App\Models\Cliente;
use App\Models\Conta;
use App\Models\Pessoa;
use Livewire\Component;

class RelatorioContas extends Component
{
    public $documentos;

    public $clienteEmpresa;
    public $cobrador;
    public $status = '';

    public $inicioDataLancamento;
    public $finalDataLancamento;

    public $inicioDataVencimento;
    public $finalDataVencimento;

    public $visualizarDocumentos;

    public $pessoas;
    public $pessoaRelatorio;

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
            ->when($this->pessoaRelatorio, function ($query) {
                return $query->where('pessoa_id', $this->pessoaRelatorio->id);
            })
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->when($this->cobrador, function ($query) {
                return $query->where('ag_cobrador_id', $this->cobrador);
            })

            ->when($this->inicioDataLancamento, function ($query) {
                return $query->whereDate('data_lancamento', '>=', $this->inicioDataLancamento);
            })
            ->when($this->inicioDataLancamento, function ($query) {
                return $query->whereDate('data_lancamento', '<=', $this->inicioDataLancamento);
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

        return;
    }

    public function pesquisaPessoas()
    {
        $pessoas = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.telefone',
            'pessoas.status',
            'pessoas.tipo',
        ]);


        $this->pessoas = $pessoas->get();
    }

    public function selecionePessoa($codigo)
    {
        $this->pessoaRelatorio = Pessoa::where('id', $codigo)->get()->first();

        $this->dispatch('close-detalhes');
    }

    public function render()
    {
        return view('livewire.relatorios.relatorio-contas', [
            'cobradores' => AgenteCobrador::all(),
        ]);
    }
}

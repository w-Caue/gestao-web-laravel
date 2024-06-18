<?php

namespace App\Livewire\Forms;

use App\Models\Conta;
use Livewire\Attributes\Rule;
use Livewire\Form;

class DetalheContaForm extends Form
{
    public $conta;
    //
    public $codigo;
    public $pessoa;

    public $descricao;
    public $agCobrador;

    public $dataLancamento;
    public $dataVencimento;
    public $dataPagamento;
    public $dataPago;

    public $valorDocumento;

    public $status;
    public $deletado;

    public $pagamento;
    public $valorPago;

    public function conta($codigo)
    {
        $this->conta = Conta::select([
            'contas.*',
            'pessoas.id as codigoPessoa',
            'pessoas.nome as pessoa',
            'agentes_cobradores.nome as cobrador',
        ])
            ->where('contas.id', '=', $codigo)
            ->leftjoin('pessoas', 'pessoas.id', '=', 'contas.pessoa_id')
            ->leftjoin('agentes_cobradores', 'agentes_cobradores.id', '=', 'contas.ag_cobrador_id')
            ->get()->first();

        $this->codigo = $this->conta->id;
        $this->pessoa = $this->conta->pessoa;

        $this->descricao = $this->conta->descricao;
        $this->agCobrador = $this->conta->cobrador;

        $this->dataLancamento = date('Y-m-d', strtotime($this->conta->data_lancamento));
        $this->dataVencimento = date('Y-m-d', strtotime($this->conta->data_vencimento));
        $this->dataPagamento = date('Y-m-d', strtotime($this->conta->data_pagamento));
        $this->dataPago = date('Y-m-d');

        $this->status = $this->conta->status;

        $this->valorDocumento = "R$ " . number_format($this->conta->valor_documento, 2, ',', '.');
        $this->valorPago = "R$ " . number_format($this->conta->valor_pago, 2, ',', '.');
    }


    public function baixa()
    {

        $conta = Conta::query()
            ->findOrFail($this->conta->id)->update([
                'forma_pagamento_id' => $this->pagamento,
                'data_pagamento' => $this->dataPago,
            ]);

        if ($this->conta->valor_documento != $this->valorPago) {
            $conta = Conta::query()
                ->findOrFail($this->conta->id)->update([
                    'valor_pago' => $this->valorPago,
                ]);

            return;
        } else {
            $conta = Conta::query()
                ->findOrFail($this->conta->id)->update([
                    'status' => 'Paga',
                    'valor_pago' => $this->valorPago,
                ]);
        }

        return $conta;
    }
}

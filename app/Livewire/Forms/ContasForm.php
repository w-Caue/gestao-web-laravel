<?php

namespace App\Livewire\Forms;

use App\Models\Cliente;
use App\Models\Conta;
use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ContasForm extends Form
{

    public $codigoDocumento;

    public $clienteDocumento;
    public $descricao;

    #[Rule('required', message: 'coloque o Agente Cobrador!')]
    public $agenteCobrador;

    #[Rule('required', message: 'Preencha a Data de Lançamento!')]
    public $dataLancamento;

    #[Rule('required', message: 'Preencha a Data de Vencimento!')]
    public $dataVencimento;

    #[Rule('required', message: 'Preencha o campo Valor do Documento!')]
    public $valorDocumento;

    // #[Rule('required', message: 'Preencha o campo Valor Pago!')]
    public $valorPago;

    // #[Rule('required', message: 'Coloque a Forma de Pagamento!')]
    public $formaPagamento;

    // #[Rule('required', message: 'Preencha o campo Data do Pagamento!')]
    public $dataPagamento;

    public $statusDocumento = 'Pagar';

    public function pesquisaDocumentos(Conta $documento)
    {

        $this->codigoDocumento = $documento->id;

        $this->clienteDocumento = Pessoa::where('id', $documento->cliente_id)->get()->first();
        $this->descricao = $documento->descricao;
        $this->dataLancamento = date('Y-m-d', strtotime($documento->data_lancamento));
        $this->agenteCobrador = $documento->ag_cobrador_id;
        $this->dataVencimento = date('Y-m-d', strtotime($documento->data_vencimento));
        $this->valorDocumento = number_format($documento->valor_documento, 2, ',', '');
        $this->dataPagamento = date('Y-m-d');
    }

    public function contaPagar()
    {
        $this->validate();

        $this->valorDocumento = str_replace(',', '.', $this->valorDocumento);
        $this->valorDocumento = floatval($this->valorDocumento);

        Conta::create([
            'pessoa_id' => $this->clienteDocumento->id,
            'descricao' => $this->descricao,
            'ag_cobrador_id' => $this->agenteCobrador,
            'data_lancamento' => $this->dataLancamento,
            'data_vencimento' => $this->dataVencimento,
            'valor_documento' => $this->valorDocumento,
            'tipo' => 'P',
        ]);

        return;
    }

    public function contaReceber()
    {
        $this->validate();

        $this->valorDocumento = str_replace(',', '.', $this->valorDocumento);
        $this->valorDocumento = floatval($this->valorDocumento);

        Conta::create([
            'pessoa_id' => $this->clienteDocumento->id,
            'descricao' => $this->descricao,
            'ag_cobrador_id' => $this->agenteCobrador,
            'data_lancamento' => $this->dataLancamento,
            'data_vencimento' => $this->dataVencimento,
            'valor_documento' => $this->valorDocumento,
            'tipo' => 'R',
        ]);

        return;
    }

    public function update()
    {
        $this->valorDocumento = str_replace(',', '.', $this->valorDocumento);
        $this->valorDocumento = floatval($this->valorDocumento);

        Conta::findOrFail($this->codigoDocumento)->update([
            'cliente_id' => $this->clienteDocumento->id,
            'descricao' => $this->descricao,
            'ag_cobrador_id' => $this->agenteCobrador,
            'data_lancamento' => $this->dataLancamento,
            'data_vencimento' => $this->dataVencimento,
            'valor_documento' => $this->valorDocumento,
            'status_documento' => $this->statusDocumento,
        ]);
    }

    public function baixa()
    {
        $this->validate();
        
        $this->valorPago = str_replace(',', '.', $this->valorPago);
        $this->valorPago = floatval($this->valorPago);

        Conta::findOrFail($this->codigoDocumento)->update([
            'status_documento' => 'Pago',
            'forma_pagamento_id' => $this->formaPagamento,
            'data_pagamento' => $this->dataPagamento,
            'valor_pago' => $this->valorPago,
        ]);
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\Cliente;
use App\Models\Conta;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ContasPagarForm extends Form
{

    public $codigoDocumento;

    public $clienteDocumento;
    public $descricao;

    #[Rule('required', message: 'O Agente Cobrador tem que ser Selecionado!')]
    public $agenteCobrador;

    #[Rule('required', message: 'A Data de Lançamento tem que ser Preenchida!')]
    public $dataLancamento;

    #[Rule('required', message: 'A Data de Vencimento tem que ser Preenchida!')]
    public $dataVencimento;

    #[Rule('required', message: 'O Valor do Documento tem que ser Preenchido!')]
    public $valorDocumento;

    #[Rule('required', message: 'O Valor a Pagar tem que ser Preenchido!')]
    public $valorPago;

    #[Rule('required', message: 'A Forma de Pagamento tem que ser Selecionada!')]
    public $formaPagamento;

    #[Rule('required', message: 'A Data do Pagamento tem que ser Preenchida!')]
    public $dataPagamento;

    public $statusDocumento = 'Pagar';

    public function pesquisaDocumentos(Conta $documento)
    {

        $this->codigoDocumento = $documento->id;

        $this->clienteDocumento = Cliente::where('id', $documento->cliente_id)->get()->first();
        $this->descricao = $documento->descricao;
        $this->dataLancamento = date('Y-m-d', strtotime($documento->data_lancamento));
        $this->agenteCobrador = $documento->ag_cobrador_id;
        $this->dataVencimento = date('Y-m-d', strtotime($documento->data_vencimento));
        $this->valorDocumento = number_format($documento->valor_documento, 2, ',', '');
        $this->dataPagamento = date('Y-m-d');
    }

    public function save()
    {
        // $this->validate();

        $this->valorDocumento = str_replace(',', '.', $this->valorDocumento);
        $this->valorDocumento = floatval($this->valorDocumento);


        // dd($this->clienteDocumento);
        Conta::create([
            'cliente_id' => $this->clienteDocumento->id,
            'descricao' => $this->descricao,
            'ag_cobrador_id' => $this->agenteCobrador,
            'data_lancamento' => $this->dataLancamento,
            'data_vencimento' => $this->dataVencimento,
            'valor_documento' => $this->valorDocumento,
            'status_documento' => $this->statusDocumento,
        ]);
    }

    public function update()
    {
        // $this->validate();

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

<?php

namespace App\Livewire\Forms;

use App\Models\Conta;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ContasForm extends Form
{
    public $clienteEmpresa;
    public $descricao;
    public $agCobrador;
    public $dtLancamento;
    public $dtVencimento;
    public $vlDocumento;

    public function save(){
        Conta::create([
            'cliente_id' => $this->clienteEmpresa,
            'descricao' => $this->descricao,
            'ag_cobrador_id' => $this->agCobrador,
            'data_lancamento' => $this->dtLancamento,
            'data_vencimento' => $this->dtVencimento,
            'valor_documento' => $this->vlDocumento,
        ]);
    }
}

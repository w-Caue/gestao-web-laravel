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
    public $cliente;

    public $descricao;
    public $ag_cobrador_id;

    public $dataLancamento;
    public $dataVencimento;

    public $valor_documento;

    public $status;
    public $deletado;

    public function conta($codigo){
        $this->conta = Conta::where('id', '=', $codigo)->get()->first();

        $this->codigo = $this->conta->id;
    }
}

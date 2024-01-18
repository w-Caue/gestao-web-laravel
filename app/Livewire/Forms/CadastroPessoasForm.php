<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Termwind\Components\Dd;

class CadastroPessoasForm extends Form
{
    public $codigo;
    public $nome = '';
    public $nomeContato;
    public $email;
    public $whatsapp;
    public $dataNascimento;
    public $dataCadastro;
    public $tipoCliente;
    public $tipoFuncionario;
    public $tipoEmpresa;

    public function pessoa(Pessoa $pessoa){
        $pessoa = Pessoa::where('id', '=', $pessoa->id)->get()->first();

        $this->codigo = $pessoa->id;
        $this->nome = $pessoa->nome;
        $this->nomeContato = $pessoa->nome_contato;
        $this->email = $pessoa->email;
        $this->whatsapp = $pessoa->whatsapp;
        $this->dataNascimento = date('Y-m-d', strtotime($pessoa->data_nascimento));
        $this->dataCadastro = date('Y-m-d', strtotime($pessoa->created_at));
        $this->tipoCliente = $pessoa->tipo_cliente;
        $this->tipoFuncionario = $pessoa->funcionario;
        $this->tipoEmpresa = $pessoa->tipo_empresa;
    }
}

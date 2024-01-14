<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CadastroPessoasForm extends Form
{
    public $codigo;
    public $nome = '';
    public $nomeContato;
    public $email;
    public $whatsapp;
    public $dataNascimento;
    public $dataCadastro;
    public $tipo = [];

    public function pessoa(Pessoa $pessoa){
        $pessoa = Pessoa::where('id', '=', $pessoa->id)->get()->first();

        $this->codigo = $pessoa->id;
        $this->nome = $pessoa->nome;
        $this->nomeContato = $pessoa->nome_contato;
        $this->email = $pessoa->email;
        $this->whatsapp = $pessoa->whatsapp;
        $this->dataNascimento = $pessoa->data_nascimento;
        $this->dataCadastro = $pessoa->created_at;
        $this->tipo = $pessoa->tipo;
    }
}

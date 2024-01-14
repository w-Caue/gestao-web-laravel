<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PessoaForm extends Form
{

    public $codigoCliente = '';

    // #[Rule('required', message: 'O campo nome tem que ser preenchido!')]
    // #[Rule('min:3', message: 'O campo nome tem que ter mais de 3 caracteres!')]
    public $nome = '';

    public $email = '';

    public $whatsapp = '';

    public $tipo = [];

    public function save()
    {
        // $this->validate();

        $this->tipo = implode(',', $this->tipo);

        Pessoa::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'tipo' => $this->tipo,
        ]);
    }

    public function pesquisaCliente(Pessoa $cliente)
    {

        $this->codigoCliente = $cliente->id;

        $this->nome = $cliente->nome;
        $this->email = $cliente->email;
        $this->whatsapp = $cliente->whatsapp;

        if($cliente->tipo == 'Empresa'){
            $this->tipo = true;
        } else {
            $this->tipo = false;
        }
        
    }

    public function update()
    {
        $this->validate();

        if($this->tipo == true){
            $this->tipo = 'Empresa';
        } else {
            $this->tipo = 'Cliente';
        }

        Pessoa::findOrFail($this->codigoCliente)->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'tipo' => $this->tipo
        ]);
    }
}

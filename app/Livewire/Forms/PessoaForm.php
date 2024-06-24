<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PessoaForm extends Form
{

    public $codigo = '';

    #[Rule('required', message: 'Preencha o campo Nome!')]
    public $nome = '';

    #[Rule('required', message: 'Preencha o campo Email!')]
    public $email = '';

    #[Rule('required', message: 'Preencha o campo Telefone!')]
    public $telefone = '';

    public $tipo = 'Cliente';

    public $user;

    public function save()
    {
        $this->validate();
        
        $this->user = auth()->user()->id;

        $pessoa = Pessoa::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'tipo' => $this->tipo,
            'user' => $this->user,
        ]);

        $this->codigo = $pessoa->id;

        return;
    }
}

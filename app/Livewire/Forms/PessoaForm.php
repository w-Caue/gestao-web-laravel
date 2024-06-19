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

    public function save()
    {
        $this->validate();

        $pessoa = Pessoa::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'tipo' => $this->tipo,
        ]);

        $this->codigo = $pessoa->id;

        return;
    }
}

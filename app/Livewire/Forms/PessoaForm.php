<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PessoaForm extends Form
{

    public $codigoCliente = '';

    #[Rule('required', message: 'O campo nome tem que ser preenchido!')]
    public $nome = '';

    public $email = '';

    public $whatsapp = '';

    public $tipoCliente = '';
    public $tipoFuncionario = '';
    public $tipoEmpresa = '';

    public function save()
    {
        // $this->validate();

        Pessoa::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'tipo_cliente' => $this->tipoCliente,
            'tipo_funcionario' => $this->tipoFuncionario,
            'tipo_empresa' => $this->tipoEmpresa,
        ]);   
    }
}

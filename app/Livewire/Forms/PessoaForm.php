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

    public $tipoCliente;
    public $tipoFuncionario;
    public $tipoFornecedor;

    public function save()
    {
        // $this->validate();

        if ($this->tipoCliente == true) {
            $this->tipoCliente = 'S';
        } else {
            $this->tipoCliente = 'N';
        }
        
        if ($this->tipoFuncionario == true) {
            $this->tipoFuncionario = 'S';
        } else {
            $this->tipoFuncionario = 'N';
        }

        if ($this->tipoFornecedor == true) {
            $this->tipoFornecedor = 'S';
        } else {
            $this->tipoFornecedor = 'N';
        }

        Pessoa::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'tipo_cliente' => $this->tipoCliente,
            'tipo_funcionario' => $this->tipoFuncionario,
            'tipo_fornecedor' => $this->tipoFornecedor,
        ]);
    }
}

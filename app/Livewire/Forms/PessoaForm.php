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
    public $phone = '';

    public $tipoCliente;
    public $tipoFuncionario;
    public $tipoFornecedor;

    public function save()
    {
        $this->validate();

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

        $pessoa = Pessoa::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'phone' => $this->phone,
            'tipo_cliente' => $this->tipoCliente,
            'tipo_funcionario' => $this->tipoFuncionario,
            'tipo_fornecedor' => $this->tipoFornecedor,
        ]);

        $this->codigo = $pessoa->id;

        return;
    }
}

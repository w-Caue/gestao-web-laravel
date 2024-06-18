<?php

namespace App\Livewire\Forms;

use App\Models\Conta;
use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Termwind\Components\Dd;

class CadastroPessoasForm extends Form
{
    public $codigo;

    public $nome;
    public $email;
    public $whatsapp;

    public $dataNascimento;
    public $dataCadastro;

    public $tipoCliente;
    public $tipoFuncionario;
    public $tipoFornecedor;

    public $contas;

    public function pessoa($codigo)
    {
        $pessoa = Pessoa::select([
            'pessoas.*',
        ])
            ->where('pessoas.id', '=', $codigo)
            ->get()->first();

        // dd($pessoa);

        $this->contas = Conta::select([
            'contas.*',
        ])
            ->where('pessoa_id', '=', $codigo)->get();

        $this->codigo = $pessoa->id;
        $this->nome = $pessoa->nome;

        $this->email = $pessoa->email;
        $this->whatsapp = $pessoa->whatsapp;

        $this->dataNascimento = date('Y-m-d', strtotime($pessoa->data_nascimento));
        $this->dataCadastro = date('Y-m-d', strtotime($pessoa->created_at));

        $this->tipoCliente = $pessoa->tipo_cliente;
        $this->tipoFuncionario = $pessoa->tipo_funcionario;
        $this->tipoFornecedor = $pessoa->tipo_fornecedor;
    }

    public function update()
    {
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

        Pessoa::findOrFail($this->codigo)->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'data_nascimento' => $this->dataNascimento,
            'tipo_cliente' => $this->tipoCliente,
            'tipo_funcionario' => $this->tipoFuncionario,
            'tipo_fornecedor' => $this->tipoFornecedor,
        ]);
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\Cliente;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ClienteForm extends Form
{

    public $clienteId = '';

    #[Rule('required', message: 'O campo nome tem que ser preenchido!')]
    #[Rule('min:3', message: 'O campo nome tem que ter mais de 3 caracteres!')]
    public $nome = '';

    #[Rule('email', message: 'É necessario colocar um email válido!')]
    public $email = '';

    #[Rule('numeric', message: 'É necessario colocar um número válido!')]
    public $whatsapp = '';

    public function save()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
        ]);
    }

    public function edit(Cliente $cliente)
    {
        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->email = $cliente->email;
        $this->whatsapp = $cliente->whatsapp;
    }

    public function update()
    {
        $this->validate();

        Cliente::findOrFail($this->clienteId)->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp
        ]);
    }
}

<?php

namespace App\Livewire\Cliente;

use App\Livewire\Forms\ClienteForm;
use App\Models\Cliente;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ClienteForm $form;

    public $search = '';

    public $newCliente = false;

    public function novoCliente()
    {
        $this->newCliente = !$this->newCliente;
    }

    public function fecharCliente()
    {
        $this->reset();

        $this->resetValidation();

        $this->newCliente = false;
    }

    public function save()
    {
        $this->form->save();

        $this->fecharCliente();

        $this->alert('success', 'Cliente Cadastrado', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
           ]);
    }

    public function edit(Cliente $cliente)
    {
        $this->novoCliente();

        $this->form->edit($cliente);
    }

    public function update()
    {
        $this->form->update();

        $this->novoCliente();

        $this->alert('success', 'Cliente Atualizado', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
           ]);
    }

    public function render()
    {
        $clientes = Cliente::where('nome', 'like', '%'. $this->search .'%')->paginate(5);

        return view('livewire.cliente.clientes', [
            'clientes' => $clientes
        ]);
    }
}

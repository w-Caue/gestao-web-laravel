<?php

namespace App\Livewire\Cliente;

use App\Livewire\Forms\ClienteForm;
use App\Models\Cliente;
use App\Traits\WithModal;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ClienteForm $form;

    public $search = '';
    public $modal = false;

    public $cliente;

    public $codigoCliente;
    public $tipo = 'Cliente';

    protected $listeners = [
        'delete'
    ];

    public function show(Cliente $cliente)
    {
        $this->codigoCliente = $cliente->id;
        $this->form->pesquisaCliente($cliente);
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->resetValidation();
        $this->modal = false;
    }

    public function save()
    {
        $this->form->save();

        $this->modal = false;

        $this->alert('success', 'Cliente Cadastrado', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function update()
    {
        $this->form->update();

        $this->modal = false;

        $this->alert('success', 'Cliente Atualizado', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function remover()
    {
        $this->alert('info', 'Deletar o Cadastro Desse Cliente?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#d33',
            'onConfirmed' => 'delete',
            'showCancelButton' => true,
            'cancelButtonColor' => '#3085d6',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function delete()
    {

        Cliente::where('id', $this->codigoCliente)->update([
            'status' => 'Deletado'
        ]);

        $this->modal = false;

        $this->alert('success', 'Cliente Deletado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        $clientes = Cliente::where('nome', 'like', '%' . $this->search . '%')
            ->where('status', 'Ativo')
            ->where('tipo', $this->tipo)->paginate(5);

        return view('livewire.cliente.clientes', [
            'clientes' => $clientes
        ]);
    }
}

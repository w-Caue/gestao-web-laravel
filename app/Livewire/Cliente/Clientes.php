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

    // public ClienteForm $form;

    public $search = '';

    public $cliente;
    public $codigoCliente;
    public $tipo = 'Cliente';

    protected $listeners = [
        'delete', 'nome'
    ];

    public function show(Cliente $cliente)
    {
        $this->codigoCliente = $cliente->id;

        $this->pesquisaCliente();
        $this->dispatch('open-modal');
    }

    function pesquisaCliente(){
        $this->cliente = Cliente::where('id', '=', $this->codigoCliente)->get()->first();
        if($this->cliente == null){
            $this->cliente = new Cliente();
        }
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal');

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

        $this->alert('success', 'Cliente Atualizado', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function remover(Cliente $cliente)
    {
        // $this->clienteId = $cliente->id;

        $this->alert('info', 'Deletar o Cadastro Desse Cliente?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'delete',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function delete()
    {

        Cliente::where('id', $this->clienteId)->update([
            'status' => 'Deletado'
        ]);

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

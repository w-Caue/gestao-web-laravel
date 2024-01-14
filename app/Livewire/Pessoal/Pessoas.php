<?php

namespace App\Livewire\Pessoal;

use App\Livewire\Forms\PessoaForm;
use App\Models\Pessoa;
use App\Traits\WithModal;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Pessoas extends Component
{
    use LivewireAlert;

    use WithPagination;

    public PessoaForm $form;

    public $search = '';
    public $modal = false;

    public $cliente;
    public $pessoal;

    public $codigoCliente;
    public $tipo = 'Cliente';

    protected $listeners = [
        'delete'
    ];

    protected $rules = [
        'cliente.nome',
        'cliente.email',
        'cliente.whatsapp',
    ];

    public function show(Pessoa $cliente)
    {
        $this->codigoCliente = $cliente->id;
        $this->pesquisaCliente($cliente);
    }

    public function pesquisaCliente($cliente){
        $this->cliente = Pessoa::where('id', '=', $cliente->id)->get()->first();
    }

    
    public function closeModal()
    {
        $this->resetValidation();
        $this->modal = false;
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal');

        $this->alert('success', 'Cadastro Realizado', [
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

    public function render()
    {
        return view('livewire.pessoal.pessoal');
    }
}

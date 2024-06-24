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

    public $pessoa;

    public $codigoPessoa;

    protected $listeners = [
        'delete'
    ];

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal');

        $this->alert('success', 'Cadastro Realizado', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);

        return redirect()->route('pessoal.show', ['codigo' => $this->form->codigo]);
    }
    
    public function render()
    {
        return view('livewire.pessoal.pessoal');
    }
}

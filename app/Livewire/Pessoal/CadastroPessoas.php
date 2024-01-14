<?php

namespace App\Livewire\Pessoal;

use App\Livewire\Forms\CadastroPessoasForm;
use App\Models\Pessoa;
use Livewire\Component;

class CadastroPessoas extends Component
{
    public CadastroPessoasForm $form;

    public Pessoa $pessoa;

    
    public function mount(Pessoa $codigo){
        $this->form->pessoa($codigo);
        // dd($this->pessoa);
    }

    public function render()
    {
        return view('livewire.pessoal.cadastro-pessoas');
    }
}

<?php

namespace App\Livewire\Contas;

use App\Livewire\Forms\DetalheContaForm;
use Livewire\Component;

class DetalheContas extends Component
{
    public DetalheContaForm $form;

    public function mount($codigo){
        $this->form->conta($codigo);
    }

    public function render()
    {
        return view('livewire.contas.detalhe-contas');
    }
}

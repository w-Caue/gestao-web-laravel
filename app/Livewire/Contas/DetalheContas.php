<?php

namespace App\Livewire\Contas;

use App\Livewire\Forms\DetalheContaForm;
use App\Models\FormaPagamento;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DetalheContas extends Component
{
    use LivewireAlert;

    public DetalheContaForm $form;

    public function mount($codigo)
    {
        $this->form->conta($codigo);
    }

    public function confirmarBaixa()
    {
        $this->form->baixa();

        $this->dispatch('close-detalhes');

        return  $this->alert('success', 'Conta Baixada!', [
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.contas.detalhe-contas', [
            'pagamentos' => FormaPagamento::all(),
        ]);
    }
}

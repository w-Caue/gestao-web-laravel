<?php

namespace App\Livewire\Contas;

use App\Livewire\Forms\DetalheContaForm;
use App\Models\FormaPagamento;
use App\Models\Pagamento;
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
        $user = auth()->user()->id;

        return view('livewire.contas.detalhe-contas', [
            'pagamentos' => Pagamento::where('user', $user)->get(),
        ]);
    }
}

<?php

namespace App\Livewire\Configuracao;

use App\Models\FormaPagamento;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Configuracao extends Component
{
    use LivewireAlert;

    public $nome;
    public $formaDePagamentoId;

    public $newFormaPG;

    public function mostrarForm()
    {
        $this->newFormaPG = !$this->newFormaPG;

        $this->reset('nome', 'formaDePagamentoId');
    }

    public function formaPG(FormaPagamento $formaPagamento)
    {
        $this->mostrarForm();

        $this->formaDePagamentoId = $formaPagamento->id;
        $this->nome = $formaPagamento->nome;
    }

    public function save()
    {
        FormaPagamento::create([
            'nome' => $this->nome,
        ]);

        $this->mostrarForm();

        $this->alert('success', 'Forma de Pagamento Criada!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function update()
    {
        FormaPagamento::findOrFail($this->formaDePagamentoId)->update([
            'nome' => $this->nome
        ]);

        $this->mostrarForm();

        $this->alert('success', 'Forma de Pagamento Atualizada!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.configuracao.configuracao', [
            'formasPagamentos' => FormaPagamento::all()
        ]);
    }
}

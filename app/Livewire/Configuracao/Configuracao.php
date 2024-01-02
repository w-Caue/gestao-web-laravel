<?php

namespace App\Livewire\Configuracao;

use App\Models\FormaPagamento;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Configuracao extends Component
{
    use LivewireAlert;

    public $nome;
    public $formaDePagamento;

    public $newFormaPG;
    public $modal;

    public function mostrarForm()
    {
        $this->newFormaPG = !$this->newFormaPG;

        $this->reset('nome', 'formaDePagamento');
    }

    public function formaPG(FormaPagamento $formaPagamento)
    {
        $this->mostrarForm();

        $this->formaDePagamento = $formaPagamento;
        $this->nome = $formaPagamento->nome;
    }

    public function save()
    {
        if ($this->nome == null or $this->nome == '') {
            $this->alert('error', 'Informe o nome', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
            ]);
            return;
        }

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
        FormaPagamento::findOrFail($this->formaDePagamento->id)->update([
            'nome' => $this->nome
        ]);

        $this->mostrarForm();

        $this->alert('success', 'Forma de Pagamento Atualizada!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function deleteRetorno()
    {
        if ($this->formaDePagamento->status == 'Deletado') {
            FormaPagamento::findOrFail($this->formaDePagamento->id)->update([
                'status' => 'Ativo'
            ]);

            $this->mostrarForm();

            $this->alert('success', 'Forma de Pagamento Retornada!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
            ]);
        } else {
            FormaPagamento::findOrFail($this->formaDePagamento->id)->update([
                'status' => 'Deletado'
            ]);

            $this->mostrarForm();

            $this->alert('success', 'Forma de Pagamento Deletada!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.configuracao.configuracao', [
            'formasPagamentos' => FormaPagamento::all()
        ]);
    }
}

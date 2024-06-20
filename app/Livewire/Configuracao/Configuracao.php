<?php

namespace App\Livewire\Configuracao;

use App\Models\AgenteCobrador;
use App\Models\FormaPagamento;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Configuracao extends Component
{
    use LivewireAlert;

    #[Rule('required', message: 'Preencha o campo Nome!')]
    public $nomePagamento;

    #[Rule('required', message: 'Preencha o campo Nome!')]
    public $nomeCobrador;
    public $siglaCobrador;

    public $takePagamento = 3;
    public $takeCobrador = 3;

    public $formaDePagamento;
    public $pagamentos;
    public $cobradores;

    public $readyLoad = false;

    public function load()
    {
        $this->readyLoad = true;
    }

    // public function mount()
    // {
    //     $this->dados();
    // }

    public function savePagamento()
    {
        $this->validate();

        FormaPagamento::create([
            'nome' => $this->nomePagamento,
        ]);

        $this->alert('success', 'Forma de Pagamento Criada!', [
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function saveCobrador()
    {
        $this->validate();

        AgenteCobrador::create([
            'sigla' => $this->siglaCobrador,
            'nome' => $this->nomeCobrador,
        ]);

        $this->alert('success', 'Agente Cobrador Criada!', [
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function update()
    {
        FormaPagamento::findOrFail($this->formaDePagamento->id)->update([
            'nome' => $this->nome
        ]);

        $this->alert('success', 'Forma de Pagamento Atualizada!', [
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

    public function dados()
    {
        $this->pagamentos = FormaPagamento::all()->take($this->takePagamento);
        $this->cobradores = AgenteCobrador::all()->take($this->takeCobrador);

        return;
    }

    public function render()
    {
        $this->dados();
        return view('livewire.configuracao.configuracao');
    }
}

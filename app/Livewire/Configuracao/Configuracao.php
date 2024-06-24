<?php

namespace App\Livewire\Configuracao;

use App\Models\Cobrador;
use App\Models\FormaPagamento;
use App\Models\Pagamento;
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
    public $Fpagamentos;
    public $Acobradores;

    public $readyLoad = false;
    public $user;

    public function load()
    {
        $this->readyLoad = true;
    }

    public function mount()
    {
        $this->user = auth()->user()->id;
    }

    public function savePagamento()
    {
        // $this->validate();

        Pagamento::create([
            'nome' => $this->nomePagamento,
            'user' => $this->user,
        ]);

        $this->dispatch('close-modal');
        
        $this->alert('success', 'Forma de Pagamento Criada!', [
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function saveCobrador()
    {
        // $this->validate();

        Cobrador::create([
            'sigla' => $this->siglaCobrador,
            'nome' => $this->nomeCobrador,
            'user' => $this->user,
        ]);

        $this->dispatch('close-modal');

        $this->alert('success', 'Agente Cobrador Criada!', [
            'timer' => 2000,
            'toast' => true,
        ]);
    }

    public function update()
    {
        Pagamento::findOrFail($this->formaDePagamento->id)->update([
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
            Pagamento::findOrFail($this->formaDePagamento->id)->update([
                'status' => 'Ativo'
            ]);

            $this->mostrarForm();

            $this->alert('success', 'Forma de Pagamento Retornada!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
            ]);
        } else {
            Pagamento::findOrFail($this->formaDePagamento->id)->update([
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
        $this->user = auth()->user()->id;
        $pagamentos = Pagamento::where('user', '=', $this->user)->get()->take($this->takePagamento);
        $cobradores = Cobrador::where('user', '=', $this->user)->get()->take($this->takeCobrador);

        return view('livewire.configuracao.configuracao', [
            'pagamentos' => $this->readyLoad ? $pagamentos : [],
            'cobradores' => $this->readyLoad ? $cobradores : []
        ]);
    }
}

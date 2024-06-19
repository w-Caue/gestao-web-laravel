<?php

namespace App\Livewire\Contas;

use App\Livewire\Forms\ContasForm;
use App\Livewire\Forms\ContasPagarForm;
use App\Models\AgenteCobrador;
use App\Models\Cliente;
use App\Models\Conta;
use App\Models\FormaPagamento;
use App\Models\Pessoa;
use Faker\Core\Number;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ContasPagar extends Component
{
    use LivewireAlert;
    use WithPagination;

    public ContasPagarForm $form;

    public $clientes;

    public $documento;

    public $tipo = 'Cliente';

    public function mount()
    {
        $this->form->dataLancamento = date('Y-m-d');
    }

    public function show(Conta $documento)
    {
        $this->form->pesquisaDocumentos($documento);
    }

    public function pesquisaClientes()
    {
        $clientes = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.telefone',
            'pessoas.status',
            'pessoas.tipo',
        ])->where('status', '=', 'Ativo');

        $this->clientes = $clientes->get();
    }

    public function selecioneCliente($cliente)
    {
        $this->form->clienteDocumento = Pessoa::where('id', $cliente)->get()->first();

        $this->dispatch('close-detalhes');
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal');

        $this->alert('success', 'Conta criada!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function render()
    {
        return view('livewire.contas.contas-pagar', [
            'agenteCobradores' => AgenteCobrador::all(),
            'formasPagamentos' => FormaPagamento::all()
        ]);
    }
}

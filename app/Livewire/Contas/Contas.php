<?php

namespace App\Livewire\Contas;

use App\Livewire\Forms\ContasForm;
use App\Models\AgenteCobrador;
use App\Models\Cobrador;
use App\Models\Conta;
use App\Models\FormaPagamento;
use App\Models\Pagamento;
use App\Models\Pessoa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Contas extends Component
{
    use LivewireAlert;
    use WithPagination;

    public ContasForm $form;

    public $clientes;

    public $documento;

    public $tipo = 'Cliente';

    public $user;

    public function mount()
    {
        $this->form->dataLancamento = date('Y-m-d');
        $this->status();
    }

    public function pesquisaClientes()
    {
        $clientes = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.telefone',
            'pessoas.status',
            'pessoas.tipo',
            'pessoas.user',
        ])->where('user', '=', $this->user)
            ->where('status', '=', 'Ativo');

        $this->clientes = $clientes->get();
    }

    public function selecioneCliente($cliente)
    {
        $this->form->clienteDocumento = Pessoa::where('id', $cliente)->get()->first();

        $this->dispatch('close-detalhes');
    }

    public function contaPagar()
    {
        if ($this->form->clienteDocumento == null) {
            return $this->alert('error', 'Cliente ou empresa não selecionado!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
            ]);
        }

        $this->form->contaPagar();

        $this->dispatch('close-modal');

        $this->alert('success', 'Conta criada!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);

        $this->js('window.location.reload()');
    }

    public function contaReceber()
    {
        if ($this->form->clienteDocumento == null) {
            return $this->alert('error', 'Cliente ou empresa não selecionado!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
            ]);
        }

        $this->form->contaReceber();

        $this->dispatch('close-modal');

        $this->alert('success', 'Conta criada!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);

        $this->js('window.location.reload()');
    }

    public function status()
    {
        $mes = date('m');

        $contasMes = Conta::whereMonth('data_vencimento', $mes)
            ->where('user', $this->user)
            ->where('status', 'Aberto')
            ->get()->take(5);

        $hoje = date('Y-m-d');
        foreach ($contasMes as $contas) {

            if (date('Y-m-d', strtotime($contas->data_vencimento)) == $hoje) {
                Conta::findOrFail($contas->id)->update([
                    'status' => 'Hoje',
                ]);
            };
            // dd($hoje, date('Y-m-d', strtotime($contas->data_vencimento)));

            if ($hoje > $contas->data_vencimento) {
                Conta::findOrFail($contas->id)->update([
                    'status' => 'Vencida',
                ]);
            };
        }
    }

    public function render()
    {
        $this->user = auth()->user()->id;

        return view('livewire.contas.contas', [
            'agenteCobradores' => Cobrador::where('user', '=', $this->user)->get(),
            'formasPagamentos' => Pagamento::where('user', '=', $this->user)->get()
        ]);
    }
}

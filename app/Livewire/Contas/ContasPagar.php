<?php

namespace App\Livewire\Contas;

use App\Livewire\Forms\ContasForm;
use App\Models\AgenteCobrador;
use App\Models\Cliente;
use App\Models\Conta;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ContasPagar extends Component
{
    use LivewireAlert;

    public ContasForm $form;

    public  $showDocumento;

    public $showClientes;
    public $clientes;
    public $clienteDocumento;

    public function novoDocumento(){
        $this->showDocumento = true;
    }

    public function fecharDocumento(){
        $this->showDocumento = false;
    }

    public function visualizarClientes()
    {
        $this->showClientes = !$this->showClientes;
    }

    public function pesquisaClientes()
    {
        $clientes = Cliente::select([
            'clientes.id',
            'clientes.nome',
            'clientes.whatsapp',
            'clientes.status',
        ])->where('status', 'Ativo')->get();

        $this->clientes = $clientes;
    }

    public function selecioneCliente($cliente)
    {
        $this->clienteDocumento = Cliente::where('id', $cliente)->get()->first();

        $this->visualizarClientes();
    }

    public function criarDocumento(){
        $this->form->save();

        $this->alert('success', 'Documento criado!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
           ]);
    }

    public function render()
    {
        $contas = Conta::all();

        $agenteCobradores = AgenteCobrador::all();

        return view('livewire.contas.contas-pagar', [
            'contas' => $contas,
            'agenteCobradores' => $agenteCobradores
        ]);
    }
}

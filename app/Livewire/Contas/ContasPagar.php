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

    public $clienteEmpresa;
    public $descricao;
    public $agCobrador;
    public $dtLancamento;
    public $dtVencimento;
    public $vlDocumento;
    public $statusDocumento = 'Aberto';

    public function novoDocumento()
    {
        $this->showDocumento = true;
    }

    public function fecharDocumento()
    {
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
            'clientes.tipo',
        ])->where('status', 'Ativo')->where('tipo', 'Empresa')->get();

        $this->clientes = $clientes;
    }

    public function selecioneCliente($cliente)
    {
        $this->clienteDocumento = Cliente::where('id', $cliente)->get()->first();

        $this->visualizarClientes();
    }

    public function criarDocumento()
    {
        
        Conta::create([
            'cliente_id' => $this->clienteDocumento->id,
            'descricao' => $this->descricao,
            'ag_cobrador_id' => $this->agCobrador,
            'data_lancamento' => $this->dtLancamento,
            'data_vencimento' => $this->dtVencimento,
            'valor_documento' => $this->vlDocumento,
            'status_documento' => $this->statusDocumento,
        ]);

        $this->fecharDocumento();

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

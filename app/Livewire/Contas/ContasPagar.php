<?php

namespace App\Livewire\Contas;

use App\Livewire\Forms\ContasForm;
use App\Models\AgenteCobrador;
use App\Models\Cliente;
use App\Models\Conta;
use App\Models\FormaPagamento;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ContasPagar extends Component
{
    use LivewireAlert;
    use WithPagination;

    public ContasForm $form;

    public  $showDocumento;

    public $showClientes;
    public $clientes;
    public $clienteDocumento;

    #Criar Documento
    public $descricao;
    public $agenteCobrador;
    public $dataLancamento;
    public $dataVencimento ;
    public $valorDocumento;

    #Baixar Documento
    public $documento;
    public $dataPagamento;
    public $formaPagamento;
    public $valorPago;

    public $statusDocumento = 'Aberto';

    public $showBaixa;


    public function novoDocumento()
    {
        $this->showDocumento = true;

        $this->dataLancamento = date('Y-m-d');
    }

    public function fecharDocumento()
    {
        $this->reset('clienteDocumento', 'descricao', 'agenteCobrador', 'dataLancamento', 
        'dataVencimento', 'valorDocumento', 'formaPagamento', 'valorPago');
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
            'ag_cobrador_id' => $this->agenteCobrador,
            'data_lancamento' => $this->dataLancamento,
            'data_vencimento' => $this->dataVencimento,
            'valor_documento' => $this->valorDocumento,
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

    public function baixaDocumento()
    {
        $this->showBaixa = !$this->showBaixa;
    }

    public function mostrarDocumento(Conta $documento)
    {
        $this->showDocumento = true;

        $this->documento = $documento;
        $this->clienteDocumento = Cliente::where('id', $documento->cliente_id)->get()->first();
        $this->descricao = $documento->descricao;
        $this->dataLancamento = date('Y-m-d', strtotime($documento->data_lancamento));
        $this->agenteCobrador = $documento->ag_cobrador_id;
        $this->dataVencimento = date('Y-m-d', strtotime($documento->data_vencimento));
        $this->valorDocumento = number_format($documento->valor_documento, 2, ',', '.');
        $this->dataPagamento = date('Y-m-d');

    }

    public function confirmarBaixa(){
        Conta::findOrFail($this->documento->id)->update([
            'status_documento' => 'Pagar',
            'forma_pagamento_id' => $this->formaPagamento,
            'data_pagamento' => $this->dataPagamento,
            'valor_pago' => $this->valorPago,
        ]);

        $this->baixaDocumento();
        $this->fecharDocumento();

        $this->alert('success', 'Documento Baixado!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function render()
    {
        $contas = Conta::paginate(5);

        $agenteCobradores = AgenteCobrador::all();

        $formasPagamentos = FormaPagamento::all();

        return view('livewire.contas.contas-pagar', [
            'contas' => $contas,
            'agenteCobradores' => $agenteCobradores,
            'formasPagamentos' => $formasPagamentos
        ]);
    }
}

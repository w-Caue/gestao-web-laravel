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

    public $modal = false;

    public $clientes;
   
    public $documento;

    public $status = 'Ativo';
    public $tipo = 'Cliente';

    protected $listeners = [
        'deleteRetorno'
    ];

    public function mount(){
        $this->form->dataLancamento = date('Y-m-d');
    }

    public function show(Conta $documento)
    {
        $this->modal = true;

        $this->documento = $documento;
        $this->form->pesquisaDocumentos($documento);
    }

    public function openModal(){
        $this->modal = true;
        $this->form->dataLancamento = date('Y-m-d');
    }

    public function closeModal(){
        $this->reset();
        $this->modal = false;
    }

    public function pesquisaClientes()
    {
        $clientes = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.phone',
            'pessoas.status',
        ]);


        $this->clientes = $clientes->get();
    }

    public function selecioneCliente($cliente)
    {
        $this->form->clienteDocumento = Pessoa::where('id', $cliente)->get()->first();

        $this->dispatch('close-detalhes');
    }

    public function criarDocumento()
    {

        $this->form->save();

        $this->closeModal();

        $this->alert('success', 'Documento criado!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function editarDocumento()
    {
        $this->form->update();
        
        $this->closeModal();

        $this->alert('success', 'Documento Atualizado!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function confirmarBaixa()
    {
        $this->form->baixa();

        $this->dispatch('close-detalhes');
        $this->closeModal();

        $this->alert('success', 'Documento Baixado!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);
    }

    public function deletarDocumento()
    {
        if ($this->documento->status == "Deletado") {
            $this->alert('info', 'Retornar Esse Documento?', [
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
                'showConfirmButton' => true,
                'confirmButtonColor' => '#bb27d9',
                'onConfirmed' => 'deleteRetorno',
                'showCancelButton' => true,
                'cancelButtonColor' => '#d33',
                'onDismissed' => '',
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Retornar',
            ]);
        } else {
            $this->alert('info', 'Deletar Esse Documento?', [
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
                'showConfirmButton' => true,
                'confirmButtonColor' => '#3085d6',
                'onConfirmed' => 'deleteRetorno',
                'showCancelButton' => true,
                'cancelButtonColor' => '#d33',
                'onDismissed' => '',
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Deletar',
            ]);
        }
    }

    public function deleteRetorno()
    {

        if ($this->documento->status == "Deletado") {
            Conta::where('id', $this->documento->id)->update([
                'status' => 'Ativo'
            ]);

            $this->closeModal();

            $this->alert('success', 'Documento Retornado!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
            ]);
        } else {
            Conta::where('id', $this->documento->id)->update([
                'status' => 'Deletado'
            ]);

            $this->closeModal();

            $this->alert('success', 'Documento Deletado!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
            ]);
        }
    }

    public function render()
    {
        $contas = Conta::where('status', $this->status)->paginate(5);

        $agenteCobradores = AgenteCobrador::all();

        $formasPagamentos = FormaPagamento::all();

        return view('livewire.contas.contas-pagar', [
            'contas' => $contas,
            'agenteCobradores' => $agenteCobradores,
            'formasPagamentos' => $formasPagamentos
        ]);
    }
}

<?php

namespace App\Livewire\Pedidos;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Pessoa;
use App\Models\Produto;
use App\Models\Status;
use Illuminate\Support\Facades\Date;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Pedidos extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $formStatus;
    public $startDate;
    public $endDate;

    #tela de pessoas
    public $pessoas;
    public $pessoaPedido;

    // #criar pedido
    public $formaDePagamento;
    public $descricao;
    public $status = 'Aberto';

    #tela de itens
    public $telaPedido;
    public $produtos;
    public $codigoProduto;

    public $quantidade = 1;

    #visualizar pedido
    public $itemPedido;
    public $totalPedido = '0';
    public $totalProdutos = '0';

    #autenticação
    public $showAutenticacao = false;
    public $desconto;
    public $total;
    public $valorPago;
    public $troco;

    public function show(Pedido $pedido)
    {
        $this->visualizarPedido($pedido);

    }

    public function save()
    {
        $pedido = Pedido::create([
            'pessoa_id' => $this->pessoaPedido->id,
            'forma_pagamento_id' => $this->formaDePagamento,
            'descricao' => $this->descricao,
            'status' => 'Aberto'
        ]);

        $this->dispatch('close-modal');

        $this->redirectRoute('pedidos.show', ['codigo'=> $pedido->id]);
    }

    public function pesquisaPessoa()
    {
        $pessoas = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.whatsapp',
            'pessoas.status',
        ])->where('status', 'Ativo')->get();

        $this->pessoas = $pessoas;
    }

    public function pedidoPessoa($pessoa)
    {
        $this->pessoaPedido = Pessoa::where('id', $pessoa)->get()->first();

        $this->dispatch('close-detalhes');
    }
    
   
    public function autenticarPedido()
    {
        Pedido::findOrFail($this->telaPedido->id)->update([
            'forma_pagamento_id' => $this->formaDePagamento,
            'total_pedido' => $this->total,
            'desconto' => $this->desconto,
            'status' => 'Autenticado'
        ]);

        $this->dispatch('close-detalhes');

        $this->alert('success', 'Pedido Autenticado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);

    }

    public function editePedido()
    {
        if ($this->status == 'Aberto') {
            Pedido::findOrFail($this->telaPedido->id)->update([
                'forma_pagamento_id' => $this->formaDePagamento,
                'total_pedido' => $this->telaPedido->total_itens,
                'desconto' => '0',
                'descricao' => $this->descricao,
                'status' => $this->status
            ]);
        } else {
            Pedido::findOrFail($this->telaPedido->id)->update([
                'forma_pagamento_id' => $this->formaDePagamento,
                'descricao' => $this->descricao,
                'status' => $this->status
            ]);
        }

        $this->alert('success', 'Pedido Salvo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        if ($this->startDate == null or $this->startDate == '' or $this->endDate == null or $this->endDate == '') {
            $this->startDate = date('Y-m-d');
            $this->endDate = date('Y-m-d');
        }


        $formasPagamentos = FormaPagamento::all();

        $statusPedido = Status::all();

        return view('livewire.pedidos.pedidos', [
            'formasPagamentos' => $formasPagamentos,
            'statusPedido' => $statusPedido
        ]);
    }
}

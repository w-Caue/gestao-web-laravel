<?php

namespace App\Livewire\Contas;

use App\Models\Conta;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemContasPagar extends Component
{
    use WithPagination;

    public $search;

    public $readyLoad = false;
    
    public $user;

    public function load()
    {
        $this->readyLoad = true;

        $this->user = auth()->user()->id;
    }

    public function dados()
    {
        $contas = Conta::select([
            'contas.id',
            'pessoas.id as codPessoa',
            'pessoas.nome as pessoa',
            'contas.descricao',
            'contas.data_lancamento',
            'contas.data_vencimento',
            'contas.valor_documento',
            'contas.status',
            'contas.tipo',
        ])
            ->leftjoin('pessoas', 'pessoas.id', '=', 'contas.pessoa_id')
            ->where('contas.user', '=', $this->user)
            ->where('contas.tipo', '=', 'P')
            #Filtros
            ->when($this->search, function ($query) {
                return $query->where('pessoas.nome', 'LIKE', "%" . $this->search . "%");
            });

        return $contas->paginate(5);
    }

    public function render()
    {
        return view('livewire.contas.listagem-contas-pagar', [
            'contas' => $this->readyLoad ? $this->dados() : []
        ]);
    }
}

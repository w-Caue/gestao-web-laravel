<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemProdutos extends Component
{
    use WithPagination;

    public $readyLoad = false;

    public $pesquisa;

    public $sortField;

    public $user;

    public function sortFilter($field)
    {
        // if ($this->sortField === $field) {
        //     $this->sortAsc = !$this->sortAsc;
        // } else {
        //     $this->sortAsc = true;
        // }
        $this->sortField = $field;
    }

    public function load(){
        $this->readyLoad = true;
    }

    public function dados(){
        $this->user = auth()->user()->id;

        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.preco_1',
            'produtos.preco_1',
            'produtos.user',
        ])->where('user', $this->user)
        #Filtros
        ->when($this->pesquisa, function ($query) {
            $filter = strtolower($this->sortField);
            return $query->where($filter, 'like', "%". $this->pesquisa ."%");
        });

        $this->dispatch('close-modalfilter');

        return $produtos->paginate(5);
    }

    public function render()
    {
        return view('livewire.produto.listagem-produtos', [
            'produtos' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}

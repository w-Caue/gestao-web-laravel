<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemProdutos extends Component
{
    use WithPagination;

    public $readyLoad = false;

    public $search;

    public function load(){
        $this->readyLoad = true;
    }

    public function dados(){
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca_id',
            'produtos.unidade_medida_id',
            'produtos.preco_1',
        ]) #Filtros
        ->when($this->search, function ($query) {
            return $query->where('nome', 'like', "%".$this->search."%");
        });

        return $produtos->paginate(5);
    }

    public function render()
    {
        return view('livewire.produto.listagem-produtos', [
            'produtos' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}

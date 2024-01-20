<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemProdutos extends Component
{
    use WithPagination;

    public function dados(){
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca',
            'produtos.unidade_medida_id',
            'produtos.preco_1',
        ]);

        return $produtos->paginate(5);
    }

    public function render()
    {
        return view('livewire.produto.listagem-produtos', [
            'produtos' => $this->dados(),
        ]);
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ItemForm extends Form
{
    public $itemId;

    #[Rule('required|min:3')]
    public $nome = '';

    #[Rule('required|min:5')]
    public $descricao;

    #[Rule('min:2')]
    public $marca;

    #[Rule('required')]
    public $unidadeMedida;

    public $vlcusto;
    public $preco1;
    public $preco2;

    public function save()
    {
        $this->validate();

        Item::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'marca' => $this->marca,
            'unidade_medida_id' => $this->unidadeMedida,
            'valor_custo' => $this->vlcusto,
            'preco_1' => $this->preco1,
            'preco_2' => $this->preco2,
        ]);
    }

    public function edit(Item $item)
    {
        $this->itemId = $item->id;
        $this->nome = $item->nome;
        $this->descricao = $item->descricao;
        $this->marca = $item->marca;
        $this->unidadeMedida = $item->unidade_medida_id;
        $this->vlcusto = $item->valor_custo;
        $this->preco1 = $item->preco_1;
        $this->preco2 = $item->preco_2;
    }

    public function update()
    {
        Item::findOrFail($this->itemId)->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'marca' => $this->marca,
            'unidade_medida_id' => $this->unidadeMedida,
            'valor_custo' => $this->vlcusto,
            'preco_1' => $this->preco1,
            'preco_2' => $this->preco2,
        ]);
    }
}

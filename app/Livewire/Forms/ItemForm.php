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

        $this->preco1 = str_replace(',', '.', $this->preco1);
        $this->preco1 = floatval($this->preco1);
        $this->preco2 = str_replace(',', '.', $this->preco2);
        $this->preco2 = floatval($this->preco2);
        $this->vlcusto = str_replace(',', '.', $this->vlcusto);
        $this->vlcusto = floatval($this->vlcusto);

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
        $this->vlcusto = number_format($item->valor_custo, 2, ',', '');
        $this->preco1 = number_format($item->preco_1, 2, ',', '');
        $this->preco2 = number_format($item->preco_2, 2, ',', '');
    }

    public function update()
    {
        $this->preco1 = str_replace(',', '.', $this->preco1);
        $this->preco1 = floatval($this->preco1);
        $this->preco2 = str_replace(',', '.', $this->preco2);
        $this->preco2 = floatval($this->preco2);
        $this->vlcusto = str_replace(',', '.', $this->vlcusto);
        $this->vlcusto = floatval($this->vlcusto);

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

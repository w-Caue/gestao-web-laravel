<?php

namespace App\Livewire\Forms;

use App\Models\Produto;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProdutoForm extends Form
{
    public $codigoProduto;

    #[Rule('required|min:3')]
    public $nome = '';

    #[Rule('required|min:5')]
    public $descricao;

    public $marca;

    #[Rule('required')]
    public $unidadeMedida;

    public $vlcusto;
    public $preco1;
    public $preco2;

    public function save()
    {
        // $this->validate();

        $this->preco1 = str_replace(',', '.', $this->preco1);
        $this->preco1 = floatval($this->preco1);
        $this->preco2 = str_replace(',', '.', $this->preco2);
        $this->preco2 = floatval($this->preco2);
        $this->vlcusto = str_replace(',', '.', $this->vlcusto);
        $this->vlcusto = floatval($this->vlcusto);


        Produto::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'marca_id' => $this->marca,
            'unidade_medida_id' => $this->unidadeMedida,
            'valor_custo' => $this->vlcusto,
            'preco_1' => $this->preco1,
            'preco_2' => $this->preco2,
            'codigo_barras' => '1234567890123',
        ]);
    }

    public function pesquisarProduto(Produto $produto)
    {
        $this->codigoProduto = $produto->id;
        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->marca = $produto->marca;
        $this->unidadeMedida = $produto->unidade_medida_id;
        $this->vlcusto = number_format($produto->valor_custo, 2, ',', '');
        $this->preco1 = number_format($produto->preco_1, 2, ',', '');
        $this->preco2 = number_format($produto->preco_2, 2, ',', '');
    }

    public function update()
    {
        $this->preco1 = str_replace(',', '.', $this->preco1);
        $this->preco1 = floatval($this->preco1);
        $this->preco2 = str_replace(',', '.', $this->preco2);
        $this->preco2 = floatval($this->preco2);
        $this->vlcusto = str_replace(',', '.', $this->vlcusto);
        $this->vlcusto = floatval($this->vlcusto);

        Produto::findOrFail($this->codigoProduto)->update([
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

<?php

namespace App\Livewire\Forms;

use App\Models\Produto;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CadastroProdutoForm extends Form
{
    public $codigoProduto;
    public $nome;
    public $descricao;
    public $unidadeMedida;
    public $codigoBarras;
    public $marca;
    public $grupo;
    public $subgrupo;

    public $vlcusto;
    public $vlcustoReal;
    public $preco1;
    public $preco2;



    public function pesquisaProduto($codigo){
        $produto = Produto::where('id', '=', $codigo)->get()->first();

        $this->codigoProduto = $produto->id;
        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->unidadeMedida = $produto->unidade_medida_id;
        $this->codigoBarras = $produto->codigo_barras;
        $this->marca = $produto->marca_id;
        $this->grupo = $produto->grupo_id;
        $this->subgrupo = $produto->subgrupo_id;
        $this->vlcusto = number_format($produto->valor_custo, 2 ,',');
        $this->vlcustoReal = number_format($produto->valor_custo_real, 2 ,',');
        $this->preco1 = number_format($produto->preco_1, 2 ,',');
        $this->preco2 = number_format($produto->preco_2, 2 ,',');

    }

    public function update(){

        $this->preco1 = str_replace(',', '.', $this->preco1);
        $this->preco1 = floatval($this->preco1);
        $this->preco2 = str_replace(',', '.', $this->preco2);
        $this->preco2 = floatval($this->preco2);
        $this->vlcusto = str_replace(',', '.', $this->vlcusto);
        $this->vlcusto = floatval($this->vlcusto);
        $this->vlcustoReal = str_replace(',', '.', $this->vlcustoReal);
        $this->vlcustoReal = floatval($this->vlcustoReal);


        Produto::findOrFail($this->codigoProduto)->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'unidade_medida_id' => $this->unidadeMedida,
            'unidade_barras' => $this->codigoBarras,
            'marca_id' => $this->marca,
            'grupo_id' => $this->grupo,
            'subgrupo_id' => $this->subgrupo,
            'valor_custo' => $this->vlcusto,
            'valor_custo_real' => $this->vlcustoReal,
            'preco_1' => $this->preco1,
            'preco_2' => $this->preco2,
        ]);
    }
}

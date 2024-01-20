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

    public $vlCusto;
    public $vlCustoReal;
    public $preco1;
    public $preco2;



    public function pesquisaProduto($codigo){
        $produto = Produto::where('id', '=', $codigo)->get()->first();

        $this->codigoProduto = $produto->id;
        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->unidadeMedida = $produto->unidade_medida_id;
        // $this->codigoBarras = $produto->codigo_barras;
        $this->marca = $produto->marca;
        $this->grupo = $produto->grupo;
        $this->subgrupo = $produto->subgrupo;
        $this->vlCusto = number_format($produto->valor_custo, 2 ,',');
        // $this->vlCustoReal = $produto->valor_custo_real;
        $this->preco1 = number_format($produto->preco_1, 2 ,',');
        $this->preco2 = number_format($produto->preco_2, 2 ,',');

    }
}

<?php

namespace App\Livewire\Produto;

use App\Livewire\Forms\CadastroProdutoForm;
use App\Models\Grupo;
use App\Models\Marca;
use App\Models\SubGrupo;
use App\Models\UnidadeMedida;
use Livewire\Component;

class CadastroProdutos extends Component
{
    public CadastroProdutoForm $form;

    public $unidadeMedidas;
    public $marcas;
    public $grupos;
    public $subgrupos;

    public function mount($codigo){
        $this->form->pesquisaProduto($codigo);
        $this->parametros();
    }

    public function parametros(){
        $this->unidadeMedidas = UnidadeMedida::all();
        $this->marcas = Marca::all();
        $this->grupos = Grupo::all();
        $this->subgrupos = SubGrupo::all();
    }

    public function render()
    {
        return view('livewire.produto.cadastro-produtos');
    }
}

<?php

namespace App\Livewire\Produto;

use App\Livewire\Forms\ItemForm;
use App\Livewire\Forms\ProdutoForm;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Produtos extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ProdutoForm $form;

    public $search = '';

    public $modal = false;

    public $codigoProduto;

    public function show(Produto $produto)
    {
        $this->codigoProduto = $produto->id;

        $this->form->pesquisarProduto($produto);
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function save()
    {
        $this->form->save();

        $this->modal = false;

        $this->alert('success', 'Item Cadastrado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function update()
    {
        $this->form->update();

        $this->modal = false;

        $this->alert('success', 'Cadastro Salvo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        $produtos = Produto::where('nome', 'like', '%' . $this->search . '%')->paginate(5);

        $unidadeMedidas = UnidadeMedida::all();

        return view('livewire.produto.produtos', [
            'produtos' => $produtos,
            'unidadeMedidas' => $unidadeMedidas
        ]);
    }
}

<?php

namespace App\Livewire\Produto;

use App\Livewire\Forms\ItemForm;
use App\Models\Item;
use App\Models\UnidadeMedida;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Produtos extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ItemForm $form;

    public $search = '';

    public $modal = false;

    public $codigoProduto;

    public $precoItem = false;

    public function show(Item $produto)
    {
        $this->codigoProduto = $produto->id;

        $this->form->pesquisarProduto($produto);
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function precificacao()
    {
        $this->precoItem = !$this->precoItem;
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

    // public function edit(Item $item)
    // {
    //     $this->novoItem();

    //     $this->form->edit($item);
    // }

    public function update()
    {
        $this->form->update();

        $this->fecharItem();

        $this->alert('success', 'Cadastro Salvo!', [
            'position' => 'center',
            'timer' => '2000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        $produtos = Item::where('nome', 'like', '%' . $this->search . '%')->paginate(5);

        $unidadeMedidas = UnidadeMedida::all();

        return view('livewire.produto.produtos', [
            'produtos' => $produtos,
            'unidadeMedidas' => $unidadeMedidas
        ]);
    }
}

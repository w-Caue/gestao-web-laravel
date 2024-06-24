<?php

namespace App\Livewire\Produto;

use App\Livewire\Forms\ItemForm;
use App\Livewire\Forms\ProdutoForm;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Produtos extends Component
{
    use LivewireAlert;

    public ProdutoForm $form;

    public function mount()
    {
    }

    public function show(Produto $produto)
    {

        $this->form->pesquisarProduto($produto);
    }

    public function closeModal()
    {
        $this->reset();
        $this->dispatch('close-modal');
    }

    public function save()
    {
        $this->form->save();

        $this->closeModal();

        $this->alert('success', 'Produto Cadastrado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);

        $this->js('window.location.reload()');
    }

    public function render()
    {
        return view('livewire.produto.produtos');
    }
}

<?php

namespace App\Livewire\Item;

use App\Livewire\Forms\ItemForm;
use App\Models\Item;
use App\Models\UnidadeMedida;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Itens extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ItemForm $form;

    public $search = '';

    public $newItem = false;

    public $precoItem = false;

    public function novoItem()
    {
        $this->newItem = !$this->newItem;
    }

    public function precificacao()
    {
        $this->precoItem = !$this->precoItem;
    }

    public function fecharItem()
    {
        $this->reset('form.nome', 'form.decricao', 'form.marca', 'form.unidadeMedida', 'form.vlcusto', 'form.preco1', 'form.preco2');

        $this->newItem = false;
    }

    public function save()
    {
        $this->form->save();

        $this->fecharItem();

        $this->alert('success', 'Item Cadastrado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function edit(Item $item)
    {
        $this->novoItem();

        $this->form->edit($item);
    }

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
        $itens = Item::where('nome', 'like' , '%'.$this->search.'%')->paginate(5);

        $unidadeMedidas = UnidadeMedida::all();

        return view('livewire.item.itens', [
            'itens' => $itens,
            'unidadeMedidas' => $unidadeMedidas
        ]);
    }
}

<?php

namespace App\Livewire\Pessoal;
use App\Models\Pessoa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemPessoas extends Component
{
    use LivewireAlert;

    use WithPagination;

    public $pessoa;

    public $pesquisa;

    protected $listeners = [
        'delete'
    ];

    public function dados()
    {
        $pessoas = Pessoa::select(
            [
                'pessoas.id',
                'pessoas.nome',
                'pessoas.email',
                'pessoas.whatsapp',
                'pessoas.status',
                'pessoas.tipo',
                'pessoas.created_at',
            ]
        ) #Filtros
        ->when($this->pesquisa, function ($query) {
            return $query->where('nome', 'LIKE', "%".$this->pesquisa);
        });

        
        return $pessoas->paginate(5);
    }

    public function remover(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
        $this->alert('info', 'Deletar esse Cadastro?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#d33',
            'onConfirmed' => 'delete',
            'showCancelButton' => true,
            'cancelButtonColor' => '#3085d6',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function delete()
    {

        Pessoa::where('id', $this->pessoa->id)->update([
            'status' => 'Deletado'
        ]);

        $this->alert('success', 'Cliente Deletado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        
        return view('livewire.pessoal.listagem-pessoas',[
            'pessoas' => $this->dados(),
        ]);
    }
}

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

    #Filtros
    public $status = 'Ativo';

    public $readyLoad = false;

    protected $listeners = [
        'delete'
    ];

    public function load(){
        $this->readyLoad = true;
    }

    public function dados()
    {
        $pessoas = Pessoa::select(
            [
                'pessoas.id',
                'pessoas.nome',
                'pessoas.email',
                'pessoas.whatsapp',
                'pessoas.status',
                'pessoas.tipo_cliente',
                'pessoas.tipo_funcionario',
                'pessoas.tipo_fornecedor',
                'pessoas.created_at',
            ]
        ) #Filtros
        ->when($this->pesquisa, function ($query) {
            return $query->where('nome', 'like', "%".$this->pesquisa);
        })
        ->when($this->status, function ($query) {
            return $query->where('status', '=', $this->status);
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

        $this->alert('success', 'Cadastro Deletado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        
        return view('livewire.pessoal.listagem-pessoas',[
            'pessoas' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}

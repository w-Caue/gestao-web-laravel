<?php

namespace App\Livewire\Pessoal;
use App\Models\Pessoa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ListagemPessoas extends Component
{
    use LivewireAlert;

    public $pessoa;

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
        );

        
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

<?php

namespace App\Livewire\Pessoal;

use App\Models\Pessoa;
use Livewire\Component;

class ListagemPessoas extends Component
{
    public $load = false;

    public function load()
    {
        $this->load = true;
    }

    public function dados()
    {
        $clientes = Pessoa::select(
            [
                'clientes.id',
                'clientes.nome',
                'clientes.email',
                'clientes.whatsapp',
                'clientes.tipo',
            ]
        )->paginate(5);

        
        return $clientes;
    }

    public function render()
    {
        
        return view('livewire.cliente.listagem-clientes',[
            'clientes' => $this->dados(),
        ]);
    }
}

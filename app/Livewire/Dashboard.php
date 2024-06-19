<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Conta;
use App\Models\Pedido;
use App\Models\Pessoa;
use Livewire\Component;

class Dashboard extends Component
{
    public $clientes;
    public $pedidos;
    public $contas;

    public function mount(){
        $clientes = Pessoa::get('id')->count();
        $this->clientes = $clientes;

        // $pedidos = Pedido::where('status', 'Aberto')->get()->count();
        // $this->pedidos = $pedidos;

        $contas = Conta::get('id')->count();
        $this->contas = $contas;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}

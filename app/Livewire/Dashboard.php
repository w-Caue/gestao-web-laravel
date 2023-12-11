<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Pedido;
use Livewire\Component;

class Dashboard extends Component
{
    public $clientes;
    public $pedidos;

    public function mount(){
        $clientes = Cliente::all()->count();
        $this->clientes = $clientes;

        $pedidos = Pedido::where('status', 'Aberto')->get()->count();
        $this->pedidos= $pedidos;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}

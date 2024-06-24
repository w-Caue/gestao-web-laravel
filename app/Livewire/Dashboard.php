<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Conta;
use App\Models\Pedido;
use App\Models\Pessoa;
use GuzzleHttp\Psr7\Message;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;

    public $clientesCard;
    public $pedidos;
    public $contasCard;

    public $contasMes;
    public $totalContasMes;

    public function mount()
    {
        $this->user = auth()->user()->id;

        $this->cards();
        $this->contas();
    }

    public function cards()
    {
        $clientes = Pessoa::where('user', $this->user)->get('id')->count();
        $this->clientesCard = $clientes;

        // $pedidos = Pedido::where('status', 'Aberto')->get()->count();
        // $this->pedidos = $pedidos;

        $contas = Conta::where('user', $this->user)->get('id')->count();
        $this->contasCard = $contas;
    }

    public function contas()
    {
        $mes = date('m');

        $this->contasMes = Conta::whereMonth('data_vencimento', $mes)
            ->where('user', $this->user)
            ->where('status', 'Aberto')
            ->get()->take(5);

        $total = 0;
        foreach ($this->contasMes as $key => $value) {
            $total += $value['valor_documento'];
        }

        $this->totalContasMes = $total;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}

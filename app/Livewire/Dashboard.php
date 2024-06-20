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
    public $clientesCard;
    public $pedidos;
    public $contasCard;

    public $contasMes;
    public $totalContasMes;

    public function mount()
    {
        $this->cards();
        $this->contas();
    }

    public function cards()
    {
        $clientes = Pessoa::get('id')->count();
        $this->clientesCard = $clientes;

        // $pedidos = Pedido::where('status', 'Aberto')->get()->count();
        // $this->pedidos = $pedidos;

        $contas = Conta::get('id')->count();
        $this->contasCard = $contas;
    }

    public function contas()
    {
        $mes = date('m');

        $this->contasMes = Conta::whereMonth('data_vencimento', $mes)
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

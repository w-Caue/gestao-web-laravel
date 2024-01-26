<?php

namespace App\Livewire\Contas;

use App\Models\Conta;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemContasPagar extends Component
{
    use WithPagination;

    public function dados(){
        $contas = Conta::select([
            'contas.id',
            'contas.pessoa_id',
            'contas.descricao',
            'contas.data_lancamento',
            'contas.data_vencimento',
            'contas.valor_documento',
        ])->paginate(5);

        return $contas;
    }

    public function render()
    {
        return view('livewire.contas.listagem-contas-pagar', [
            'contas' => $this->dados()
        ]);
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\Conta;
use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Termwind\Components\Dd;

class CadastroPessoasForm extends Form
{
    public $codigo;

    public $nome;
    public $email;
    public $telefone;

    public $dataNascimento;
    public $dataCadastro;

    public $tipo;

    public $contas;

    public $contasAberto;
    public $totalAberto;

    public $contasPaga;
    public $totalPaga;

    public $contasAtrasada;
    public $totalAtrasada;

    public $contasVencida;
    public $totalVencida;

    public function pessoa($codigo)
    {
        $pessoa = Pessoa::select([
            'pessoas.*',
        ])
            ->where('pessoas.id', '=', $codigo)
            ->get()->first();

        $this->contas = Conta::select([
            'contas.*',
        ])
            ->where('pessoa_id', '=', $codigo)->get();

            $this->parametros();

        $this->codigo = $pessoa->id;
        $this->nome = $pessoa->nome;

        $this->email = $pessoa->email;
        $this->telefone = $pessoa->telefone;

        $this->dataCadastro = date('Y-m-d', strtotime($pessoa->created_at));

        $this->tipo = $pessoa->tipo;
    }

    public function parametros()
    {
        $contas = Conta::select([
            'contas.*',
        ])
            ->where('pessoa_id', '=', 1)
            ->get();
            
        $contaAbertas = $contas->where('status', 'Aberto');
        $contaPagas = $contas->where('status', 'Paga');

        $contaAtrasadas = $contas->where('status', 'Atraso');
        $contaVencidas = $contas->where('status', 'Vencida');

        $this->contasAberto = $contaAbertas->count();
        $this->contasPaga = $contaPagas->count();

        $this->contasAtrasada = $contaAtrasadas->count();
        $this->contasVencida = $contaVencidas->count();

        $total = 0;
        foreach ($contaAbertas as $key => $value) {
            $total += $value['valor_documento'];
        }

        $this->totalAberto = $total;

        $total2 = 0;
        foreach ($contaPagas as $key => $value) {
            $total2 += $value['valor_documento'];
        }

        $this->totalPaga = $total2;

        $total3 = 0;
        foreach ($contaAtrasadas as $key => $value) {
            $total3 += $value['valor_documento'];
        }

        $this->totalAtrasada = $total3;

        $total4 = 0;
        foreach ($contaVencidas as $key => $value) {
            $total4 += $value['valor_documento'];
        }

        $this->totalVencida = $total4;
    }

    public function update()
    {
        Pessoa::findOrFail($this->codigo)->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'tipo' => $this->tipo,
        ]);
    }
}

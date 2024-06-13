<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;
    protected $fillable = ['pessoa_id', 'descricao', 'ag_cobrador_id', 
        'data_lancamento', 'data_vencimento', 'valor_documento', 'tipo', 'status',
        'status_documento', 'forma_pagamento_id', 'data_pagamento', 'valor_pago'];

    protected $dates = ['data_lancamento', 'data_vencimento', 'data_pagamento'];

    public function pessoa(){
        return $this->belongsTo('App\Models\Pessoa' , 'pessoa_id');
    }

    public function agenteCobrador(){
        return $this->belongsTo('App\Models\AgenteCobrador', 'ag_cobrador_id');
    }

    public function formaPagamento(){
        return $this->belongsTo('App\Models\FormaPagamento', 'forma_pagamento_id');
    }
}

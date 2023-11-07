<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'forma_pagamento_id', 'descricao', 'status'];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente' , 'cliente_id');
    }

    public function formaPagamento(){
        return $this->belongsTo('App\Models\FormaPagamento', 'forma_pagamento_id');
    }
}

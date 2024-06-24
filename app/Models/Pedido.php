<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['pessoa_id', 'forma_pagamento_id', 'descricao', 'status', 'total_itens', 
    'desconto', 'total_pedido', 'user'];

    public function pessoa(){
        return $this->belongsTo('App\Models\Pessoa' , 'pessoa_id');
    }

    public function Produtos(){
        return $this->belongsToMany('App\Models\Produto', 'pedidos_itens')->withPivot('quantidade', 'total');
    }

    public function formaPagamento(){
        return $this->belongsTo('App\Models\FormaPagamento', 'forma_pagamento_id');
    }

    public function pedidoItem(){
        return $this->belongsToMany('App\Models\PedidoItem', 'pedido_id' ,'item_id', 'quantidade');
    }
}

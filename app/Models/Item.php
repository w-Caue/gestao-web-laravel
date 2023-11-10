<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'itens';
    protected $fillable = ['nome', 'descricao', 'marca', 'unidade_medida_id', 'valor_custo', 'preco_1', 'preco_2'];

    public function unidadeMedida(){
        return $this->belongsTo('App\Models\UnidadeMedida');
        #'App\Models\UnidadeMedida', 'unidade_medida_id'
    }
}

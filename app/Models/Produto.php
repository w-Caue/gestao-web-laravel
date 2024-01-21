<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'Produtos';
    protected $fillable = [
        'nome', 'descricao', 'marca_id', 'unidade_medida_id', 'valor_custo', 
        'valor_custo_real', 'preco_1', 'preco_2', 'codigo_barras',
        'grupo_id', 'subgrupo_id'
    ];

    public function unidadeMedida()
    {
        return $this->belongsTo('App\Models\UnidadeMedida', 'unidade_medida_id');
        #'App\Models\UnidadeMedida', 'unidade_medida_id'
    }

    public function marca()
    {
        return $this->belongsTo('App\Models\Marca', 'marca_id');
    }
}

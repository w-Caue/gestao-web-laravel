<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'Produtos';
    protected $fillable = [
        'nome', 'descricao', 'valor_custo', 'preco_1', 'preco_2', 'codigo_barras', 'user'
    ];
}

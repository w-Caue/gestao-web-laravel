<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'descricao', 'ag_cobrador_id', 'data_lancamento', 'data_vencimento', 'valor_documento'];
}

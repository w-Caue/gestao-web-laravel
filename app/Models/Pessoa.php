<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'pessoas';
    protected $fillable = ['nome', 'email', 'whatsapp', 'tipo_cliente', 'tipo_funcionario', 'tipo_empresa', 'endereco_id'];
}

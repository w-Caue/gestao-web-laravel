<?php

namespace Database\Seeders;

use App\Models\UnidadeMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnidadeMedida::create(['nome' => 'Unidade']);
        UnidadeMedida::create(['nome' => 'Caixa']);
        UnidadeMedida::create(['nome' => 'Kilo']);
        UnidadeMedida::create(['nome' => 'Grama']);
        UnidadeMedida::create(['nome' => 'Saco']);
        UnidadeMedida::create(['nome' => 'Pacote']);
    }
}

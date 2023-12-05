<?php

namespace Database\Seeders;

use App\Models\AgenteCobrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgenteCobradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgenteCobrador::create(['sigla' => 'Doc','nome' => 'Documento']);
        AgenteCobrador::create(['sigla' => 'Bol','nome' => 'Boleto']);
    }
}

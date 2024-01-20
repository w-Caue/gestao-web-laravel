<?php

namespace Database\Seeders;

use App\Models\SubGrupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubGrupo::create(['nome' => 'Sem SubGrupo']);
    }
}

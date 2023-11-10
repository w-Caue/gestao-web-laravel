<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['nome' => 'Concluido']);
        Status::create(['nome' => 'Pendente Pagamento']);
        Status::create(['nome' => 'Finalizado']);
    }
}

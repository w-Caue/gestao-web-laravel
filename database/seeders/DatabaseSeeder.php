<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UnidadeMedidaSeeder::class);
        $this->call(FormaPagamentoSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(AgenteCobradorSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(SubGrupoSeeder::class);
    }
}

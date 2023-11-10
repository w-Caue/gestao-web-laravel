<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormaPagamento::create(['nome' => 'Dinheiro']);
        FormaPagamento::create(['nome' => 'Pix']);
        FormaPagamento::create(['nome' => 'Cartão de Credito']);
        FormaPagamento::create(['nome' => 'Cartão de Debito']);
    }
}

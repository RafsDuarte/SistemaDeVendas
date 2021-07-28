<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SapatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sapato::create([

            'nome' => 'Voilat',
            'modelo' => 'Nike',
            'numeracao' => '35',
            'cor' => 'Azul Marinho',
            'descricao' => 'Azul-Marinho-Nike-35',
            'preco' => '57.90',
        ]);

        \App\Models\Sapato::create([

            'nome' => 'Perseus',
            'modelo' => 'ADIDAS',
            'numeracao' => '37',
            'cor' => 'Preto',
            'descricao' => 'Perseus-ADIDAS-37',
            'preco' => '60',
        ]);

        \App\Models\Sapato::create([

            'nome' => 'King',
            'modelo' => 'Rainha',
            'numeracao' => '40',
            'cor' => 'Cinza',
            'descricao' => 'King-Rainha-40',
            'preco' => '65',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cliente::create(
            [
                'nome' => 'Rafael',
                'email' => 'teste@gmail.com',
                'celular_whatsapp' => '99 - 99999-9999'
            ]
        );

        \App\Models\Cliente::create(
            [
                'nome' => 'Flademir',
                'email' => 'teste1@gmail.com',
                'celular_whatsapp' => '99 - 88999-9999'
            ]

        );

        \App\Models\Cliente::create(
                       
            [
                'nome' => 'Mike',
                'email' => 'teste2@gmail.com',
                'celular_whatsapp' => '99 - 88888-9999'
            ]
        );
    }
}

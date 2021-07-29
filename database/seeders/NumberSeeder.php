<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Color::create([

            'numero' => '37',

        ]);
    }
}

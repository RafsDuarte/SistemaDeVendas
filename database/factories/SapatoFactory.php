<?php

namespace Database\Factories;

use App\Models\Sapato;
use Illuminate\Database\Eloquent\Factories\Factory;

class SapatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sapato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    
    public function definition()
    {  

        return [
            'nome' => $this->faker->name(),
            'modelo' => $this->faker->name(),
            'numeracao' => $this->faker->randomNumber(),
            'cor' => $this->faker->colorName(),
            'descricao' => $this->faker->sentence(),
            'conteudo' => $this->faker->paragraph(5, true),
            'preco' => $this->faker->randomFloat(2, 1, 100),
            'estoque' => $this->faker->randomNumber(),
            'slug' => $this->faker->slug()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{

    public function definition()
    {
        return [
            'codigo'=>$this->faker->unique()->randomNumber($nbDigits = 3),
            'nombre'=>$this->faker->name,
            'precio'=>$this->faker->randomNumber($nbDigits = 5),
            'lote'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'vencimiento'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'estado'=>1,
        ];
    }
}

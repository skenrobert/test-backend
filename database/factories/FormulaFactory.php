<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TipoFacturacione;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormulaFactory extends Factory
{
    
    public function definition()
    {
        $tipofacturaciones = TipoFacturacione::orderBy('id', 'ASC')->pluck('id')->all();

        return [
            'codigo'=>$this->faker->unique()->randomNumber($nbDigits = 3),
            'fechavence'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'pagocontado'=>$this->faker->unique()->randomNumber($nbDigits = 5),
            'pagocredito'=>$this->faker->unique()->randomNumber($nbDigits = 7),
            'consecutivodian'=> Str::random(8),
            'factura'=>$this->faker->unique()->randomNumber($nbDigits = 3),
            'observacion'=>$this->faker->address,
            'user_id'=>1,
            'tipo_facturacione_id' => $this->faker->randomElement($tipofacturaciones),
        ];
    }
}

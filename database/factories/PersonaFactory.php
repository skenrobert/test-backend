<?php

namespace Database\Factories;

use App\Models\Ciudade;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    public function definition()
    {
        return [
            'nombres'=>$this->faker->name,
            'apellidos'=>$this->faker->lastName,
            'identificacion'=>$this->faker->unique()->randomNumber($nbDigits = 8),
            'direccion'=>$this->faker->address,
            'celular'=>$this->faker->phoneNumber,
            'telefono'=>$this->faker->phoneNumber,
            'email'=> $this->faker->unique()->safeEmail(),
            'cumpleanios'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}

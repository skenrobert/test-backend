<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Tipoidentificacione;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    public function definition()
    {
        $tipoidentificaciones = Tipoidentificacione::orderBy('id', 'ASC')->pluck('id')->all();

        $img = file_get_contents(__DIR__.'/../../public/images/profile/user-uploads'.'/user-'.'0'.rand(1, 9).'.jpg');
        $fileName = Str::random(5).'_'.'.jpg';
        file_put_contents("public/images/img_api/personas/$fileName", $img);

        return [
            'nombres'=>$this->faker->name,
            'apellidos'=>$this->faker->lastName,
            'identificacion'=>$this->faker->unique()->randomNumber($nbDigits = 8),
            'direccion'=>$this->faker->address,
            'celular'=>$this->faker->phoneNumber,
            'telefono'=>$this->faker->phoneNumber,
            'imagen' =>  $fileName,
            'tipoidentificacione_id' => $this->faker->randomElement($tipoidentificaciones),
            'email'=> $this->faker->unique()->safeEmail(),
            'cumpleanios'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}

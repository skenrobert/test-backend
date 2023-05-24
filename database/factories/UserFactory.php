<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{

    public function definition()
    {
        static $password;
        $personas = Persona::orderBy('id', 'ASC')->pluck('id')->all();

        $img = file_get_contents(__DIR__.'/../../public/images/profile/user-uploads'.'/user-'.'0'.rand(1, 9).'.jpg');
        $fileName = Str::random(5).'_'.'.jpg';
        file_put_contents("public/images/img_api/users/$fileName", $img);

        return [
            'email' => 'kennyrmcali@gmail.com',
            'password' => $password ?: $password = bcrypt('12345678'), 
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'imagen' =>  $fileName,
            'persona_id' => $this->faker->unique()->randomElement($personas),
            ];
    }


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

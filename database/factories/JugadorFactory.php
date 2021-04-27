<?php

namespace Database\Factories;

use App\Models\jugador;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = jugador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres_apellidos'=>$this->faker->streetName(),
            'foto_perfil'=>$this->faker->imageUrl('800', '600', 'cats'),
            'fecha_nacimiento'=>$this->faker->date(),
            'nombre_apellido_apoderado'=>$this->faker->sentence(),
            'telefono_apoderado'=>$this->faker->e164PhoneNumber(),
            'club_actual'=>$this->faker->streetName(),
            'fecha_fin_contrato'=>$this->faker->dateTimeBetween('now', '+4 years'),
            'agente'=>$this->faker->sentence(),
            'video1'=>$this->faker->sentence(),
            'pierna_habil'=>$this->faker->randomElement(['Izquierda', 'Derecha']),
            'altura'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 50, $max = 200),
            'posicion'=>$this->faker->randomElement(['Portero', 'Mediocentro', 'Pivote']),
            'telefono'=>$this->faker->e164PhoneNumber(),
            'email'=>$this->faker->email(),
            'perfil_transfermarkt'=>$this->faker->sentence(),
            'perfil_soccerway'=>$this->faker->sentence()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empleado_m;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado_m>
 */
class Empleado_mFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cedula'=> $this->faker->unique()->randomElement(['V23456789','E147258369','G789456123','J741852963','V87654321']),
            'nombre' => $this->faker->name(),
            'sexo' => $this->faker->randomElement(['1','2']),
            'fecha_nac' => $this->faker->dateTimeBetween(),
            'estado' => $this->faker->numberBetween(1,4),
            'departamento' => $this->faker->numberBetween(1,5),
            'edad' => $this->faker->numberBetween(1,100),
            'hora_lleg' => $this->faker->randomElement(['00:00:00']),
            'hora_sal' => $this->faker->randomElement(['00:00:00']),
        ];
    }
}

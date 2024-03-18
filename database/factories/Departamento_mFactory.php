<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departamento_m;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departamento_m>
 */
class Departamento_mFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Departamento_m::class;
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->unique()->randomElement(['Sistemas','Administración','Soporte','Producción','Calidad','Contabilidad','Recursos Humanos'])
        ];
    }
}

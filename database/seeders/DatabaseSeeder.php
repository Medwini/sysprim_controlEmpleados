<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento_m;
use App\Models\Empleado_m;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(EstadosSeeder::class);
        $this->call(SexosSeeder::class);
        Departamento_m::factory(5)->create();
        Empleado_m::factory(5)->create();

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Sexo_m;

class SexosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sexo = new Sexo_m();

        $sexo->descripcion = "Femenino";
        $sexo->save();

        $sexo2 = new Sexo_m();

        $sexo2->descripcion = "Masculino";
        $sexo2->save();
    }
}

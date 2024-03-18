<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Estado_m;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estado = new Estado_m();

        $estado->descripcion = "Activo";
        $estado->accion = 1;
        $estado->save();

        $estado2 = new Estado_m();
        $estado2->descripcion = "Retirado";
        $estado2->accion = 2;
        $estado2->save();

        $estado3 = new Estado_m();
        $estado3->descripcion = "Desincorporado";
        $estado3->accion = 3;
        $estado3->save();

        $estado4 = new Estado_m();
        $estado4->descripcion = "De reposo";
        $estado4->accion = 4;
        $estado4->save();

    }
}

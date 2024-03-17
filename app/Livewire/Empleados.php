<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\Models\Empleado_m;
use App\Models\Estado_m;
use App\Models\Sexo_m;
use App\Models\Departamento_m;

class Empleados extends Component
{
    public $fecha_nac = '';
    public $edad = 0;
    public $nuev = false;
    public $edit = false;
    public $mensaje = "";

    //Variables para nuevos
    public $valor_tipo = "";
    public $valor_ci = "";
    public $valor_cedula = "";
    public $valor_nombre = "";
    public $valor_sexo = 0;
    public $valor_fecha_nac = "";
    public $valor_estatus = 0;
    public $valor_departamento = 0;
    public $valor_hora_lleg = "";
    public $valor_hora_sal = "";


    //Variable para editar
    public $edit_cedula = "";
    public $edit_nombre = "";
    public $edit_sexo = 0;
    public $edit_fecha_nac = "";
    public $edit_estatus = 0;
    public $edit_departamento = 0;
    public $edit_hora_lleg = "";
    public $edit_hora_sal = "";
    public $edit_id = "";

    protected $rules = [
        "valor_ci" => 'integer|min:6|required|max:12',
        "valor_nombre" => 'string|min:3|required',
        "valor_sexo" => 'integer|required|min:1',
        "valor_fecha_nac" => 'required|date',
        "valor_estatus" => 'integer|required|min:1',
        "valor_departamento" => 'integer|required|min:1',
    ];

    protected $messages = [
        'unique' => 'Este valor ya existe.',
        'required' => 'El campo no puede estar vacío.',
        'min' => 'El campo posee pocos carácteres.',
        'max' => 'El campo posee demasiados carácteres.',
        'integer' => 'Este campo solo admite numeros.',
        'date' => 'El campo debe ser tipo fecha.',
        'string' => 'Este campo solo admite letras.',
    ];

    public function limpiar(){
        $this->reset();
    }

    public function nuevo(){
        $this->limpiar();
        $this->nuev = true;
    }


    public function a ($fecha_nac){
        $fechaActualCarbon = Carbon::now();
        $fechaNacCarbon = Carbon::parse($fecha_nac);

        $this->edad = $fechaActualCarbon->diffInYears($fechaNacCarbon);
        //$this->edad = $fechaActualCarbon;
    }    


    public function render()
    {
        $empleados = Empleado_m::all();
        $estados = Estado_m::all();
        $sexos = Sexo_m::all();
        $departamentos = Departamento_m::all();
        $this->fechaActual = Carbon::now()->format('d-m-Y');

        return view('livewire.empleados',[
            'empleados' => $empleados,
            'estados' => $estados,
            'sexos' => $sexos,
            'departamentos' => $departamentos,
            'fechaActual' => $this->fechaActual,
            'edad' => $this->edad,
            'nuevo' => $this->nuev
        ]);
    }
}

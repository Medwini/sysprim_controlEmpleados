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
    public $valor_hora_lleg = "00:00:00";
    public $valor_hora_sal = "00:00:00";


    //Variable para editar
    public $edit_cedula = "";
    public $edit_nombre = "";
    public $edit_sexo = 0;
    public $edit_fecha_nac = "";
    public $edit_estatus = 0;
    public $edit_departamento = 0;
    public $edit_hora_lleg = "";
    public $edit_hora_sal = "";
    public $id_editar = "";

    protected $rules = [
        "valor_ci" => 'integer|min:100000|required|max:9999999999|unique:empleado_ms,cedula',
        "valor_nombre" => 'string|min:3|required',
        "valor_sexo" => 'integer|required|min:1',
        "valor_fecha_nac" => 'required',
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

    public function hab_edit($id){
        $this->limpiar();
        $this->edit = true;
        $this->id_editar = $id;
        $ConsultaEmpleado = Empleado_m::find($id);
        $this->edit_cedula = $ConsultaEmpleado->cedula;
        $this->edit_nombre = $ConsultaEmpleado->nombre;
        $this->edit_sexo = $ConsultaEmpleado->sexo;
        $this->edit_fecha_nac = $ConsultaEmpleado->fecha_nac;
        $this->edit_estatus = $ConsultaEmpleado->estado;
        $this->edit_departamento = $ConsultaEmpleado->departamento;
        $this->edit_fecha_nac = $ConsultaEmpleado->fecha_nac;
        $this->edit_hora_lleg = $ConsultaEmpleado->hora_lleg;
        $this->edit_hora_sal = $ConsultaEmpleado->hora_sal;
    }


    public function a ($id){
        $ConsultaEmpleado = Empleado_m::find($id);
        $this->fecha_nac = $ConsultaEmpleado->fecha_nac;
        $fechaActualCarbon = Carbon::now();
        $fechaNacCarbon = Carbon::parse($this->fecha_nac);
        $this->edad = floor($fechaNacCarbon->diffInYears($fechaActualCarbon));
        $ConsultaEmpleado->edad = $this->edad;
        $ConsultaEmpleado->save();
    }    

    public function cambiarEstado($estado, $id){
        $this->mensaje = "";
        $this->id_editar = $id;
        $ConsultaEmpleado = Empleado_m::find($id);
        $ConsultaEmpleado->estado = $estado;
        $ConsultaEmpleado->save();
        $this->limpiar();
        $this->mensaje = "Empleado actualizado exitosamente";
    }

    public function entrada($id){
        $this->mensaje = "";
        $ConsultaEmpleado = Empleado_m::find($id);
        $this->edit_hora_lleg = $ConsultaEmpleado->hora_lleg;
        $this->edit_hora_sal = $ConsultaEmpleado->hora_sal;

        if ($this->edit_hora_lleg > '00:00:00' && $this->edit_hora_sal > '00:00:00'){
            $this->edit_hora_sal = "00:00:00";
            $ConsultaEmpleado->hora_lleg = Carbon::now()->format('H:i:s');
            $ConsultaEmpleado->hora_sal = $this->edit_hora_sal;
            $ConsultaEmpleado->save();
            $this->limpiar();
            $this->mensaje = "Empleado actualizado exitosamente";
        }elseif ($this->edit_hora_sal <= '00:00:00') {
            $this->limpiar();
            $this->mensaje = "Empleado aún no tiene hora de salida.";
        }
    }

    public function salida($id){
        $this->mensaje = "";
        $ConsultaEmpleado = Empleado_m::find($id);
        $this->edit_hora_lleg = $ConsultaEmpleado->hora_lleg;
        $this->edit_hora_sal = $ConsultaEmpleado->hora_sal;

        if ($this->edit_hora_lleg > '00:00:00' && $this->edit_hora_sal > '00:00:00'){
            $this->limpiar();
            $this->mensaje = "Empleado aún no ha ingresado";
        }else {
            $ConsultaEmpleado->hora_sal = Carbon::now()->format('H:i:s');
            $ConsultaEmpleado->hora_lleg = $this->edit_hora_lleg;
            $ConsultaEmpleado->save();
            $this->limpiar();
            $this->mensaje = "Empleado actualizado correctamente";
        }
    }


    public function crear(){
        $this->mensaje = "";
        $this->valor_cedula = $this->valor_tipo . $this->valor_ci;
        $this->valor_estatus = 1;
        $this->validate();

        Empleado_m::create(
            [
                "cedula" => $this->valor_cedula,
                "nombre" => $this->valor_nombre,
                "sexo" => $this->valor_sexo,
                "fecha_nac" => $this->valor_fecha_nac,
                "estado" => $this->valor_estatus,
                "departamento" => $this->valor_departamento,
                'hora_lleg' => $this->valor_hora_lleg,
                'hora_sal' => $this->valor_hora_sal
            ]
        );
        $this->limpiar();
        $this->mensaje = "Empleado registrado exitosamente";
    }

    public function editar($id){
        $this->mensaje = "";
        $this->validate([   
            "edit_nombre" => 'string|min:3|required',
            "edit_sexo" => 'integer|required|min:1',
            "edit_fecha_nac" => 'required',
            "edit_departamento" => 'integer|required|min:1',
        ]);

        $ConsultaEmpleado = Empleado_m::find($id);
        $ConsultaEmpleado->nombre = $this->edit_nombre;
        $ConsultaEmpleado->sexo = $this->edit_sexo;
        $ConsultaEmpleado->fecha_nac = $this->edit_fecha_nac;
        $ConsultaEmpleado->departamento = $this->edit_departamento;
        $ConsultaEmpleado->save();
        $this->limpiar();
        $this->mensaje = "Empleado actualizado exitosamente";
    }

    public function eliminar($id){
        $this->limpiar();
        Empleado_m::destroy($id);
        $this->mensaje = "Empleado eliminado exitosamente";
    }


    public function render()
    {
        $empleados = Empleado_m::all();
        $estados = Estado_m::all();
        $sexos = Sexo_m::all();
        $departamentos = Departamento_m::all();

        return view('livewire.empleados',[
            'empleados' => $empleados,
            'estados' => $estados,
            'sexos' => $sexos,
            'departamentos' => $departamentos,
            'edad' => $this->edad,
            'nuevo' => $this->nuev,
            'id_editar' => $this->id_editar,
            'edit_cedula' => $this->edit_cedula,
            'edit_nombre' => $this->edit_nombre,
            'edit_sexo' => $this->edit_sexo,
            'edit_fecha_nac' => $this->edit_fecha_nac,
            'edit_estatus' => $this->edit_estatus,
            'edit_departamento' => $this->edit_departamento,
            'edit_fecha_nac' => $this->edit_fecha_nac,
            'edit_hora_lleg' => $this->edit_hora_lleg,
            'edit_hora_sal' => $this->edit_hora_sal

        ]);
    }
}

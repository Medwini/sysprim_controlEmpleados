<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Departamento_m;

class Departamentos extends Component
{

    public $new = false;
    public $edit = false;
    public $mensaje = "";
    public $valor = "";
    public $valor_edit ="";
    public $id_editar = "";

    protected $rules = [
        "valor" => 'required|min:2|unique:departamento_ms,descripcion',
    ];

    protected $messages = [
        'unique' => 'Este valor ya existe.',
        'required' => 'El campo no puede estar vacío.',
        'min' => 'El campo posee pocos carácteres.',
        'max' => 'El campo posee demasiados carácteres.',
    ];

    public function limpiar(){
        $this->reset(['new','mensaje','valor','valor_edit','id_editar','edit']);
    }

    public function nuevo(){
        $this->limpiar();
        $this->new = true;
    }

    public function hab_edit($id){
        $this->limpiar();
        $this->edit = true;
        $this->id_editar = $id;
        $ConsultaDepartamento = Departamento_m::find($id);
        $this->valor_edit = $ConsultaDepartamento->descripcion;
    }

    public function crear(){
        $this->mensaje = "";
        $this->validate();

        Departamento_m::create(
            [
                "descripcion" => $this->valor
            ]
        );
        $this->limpiar();
        $this->mensaje = "Departamento registrado exitosamente";
    }

    public function editar($id){
        $this->mensaje = "";
        $this->validate([   
            "valor_edit" => 'required|min:4|unique:departamento_ms,descripcion'
        ]);

        $ConsultaDepartamento = Departamento_m::find($id);
        $ConsultaDepartamento->descripcion = $this->valor_edit;
        $ConsultaDepartamento->save();
        $this->limpiar();
        $this->mensaje = "Departamento actualizado exitosamente";
    }

    public function eliminar($id){
        $this->limpiar();
        Departamento_m::destroy($id);
        $this->mensaje = "Departamento eliminado exitosamente";
    }

    public function render()
    {
        $departamentos = Departamento_m::all();
        return view('livewire.departamentos',[
            'departamentos' => $departamentos,
            'id_editar' => $this->id_editar,
            'nuevo' => $this->new,
            'edit' => $this->edit
        ]);
    }
}

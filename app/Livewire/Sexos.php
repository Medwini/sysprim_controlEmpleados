<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Sexo_m;

class Sexos extends Component
{

    public $new = false;
    public $edit = false;
    public $mensaje = "";
    public $valor = "";
    public $valor_edit ="";
    public $id_editar = "";

    protected $rules = [
        "valor" => 'required|min:2|unique:sexo_ms,descripcion',
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
        $ConsultaSexo = Sexo_m::find($id);
        $this->valor_edit = $ConsultaSexo->descripcion;
    }

    public function crear(){
        $this->mensaje = "";
        $this->validate();

        Sexo_m::create(
            [
                "descripcion" => $this->valor
            ]
        );
        $this->limpiar();
        $this->mensaje = "Sexo registrado exitosamente";
    }

    public function editar($id){
        $this->mensaje = "";
        $this->validate([   
            "valor_edit" => 'required|min:4|unique:sexo_ms,descripcion'
        ]);

        $ConsultaSexo = Sexo_m::find($id);
        $ConsultaSexo->descripcion = $this->valor_edit;
        $ConsultaSexo->save();
        $this->limpiar();
        $this->mensaje = "Sexo actualizado exitosamente";
    }

    public function eliminar($id){
        $this->limpiar();
        Sexo_m::destroy($id);
        $this->mensaje = "Sexo eliminado exitosamente";
    }

    public function render()
    {
        $sexos = Sexo_m::all();
        return view('livewire.sexos',[
            'sexos' => $sexos,
            'id_editar' => $this->id_editar,
            'nuevo' => $this->new,
            'edit' => $this->edit
        ]);
    }
}

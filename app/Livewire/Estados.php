<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Estado_m;

class Estados extends Component
{

    public $new = false;
    public $edit = false;
    public $mensaje = "";
    public $valor = "";
    public $accion = 0;
    public $valor_edit ="";
    public $id_editar = "";
    public $accion_edit = 0;

    protected $rules = [
        "valor" => 'required|min:2|unique:estado_ms,descripcion',
        "accion" => 'integer|required|min:1|max:4'
    ];

    protected $messages = [
        'unique' => 'Este valor ya existe.',
        'required' => 'El campo no puede estar vacío.',
        'min' => 'El campo posee pocos carácteres.',
        'max' => 'El campo posee demasiados carácteres.',
    ];

    public function limpiar(){
        $this->reset(['new','mensaje','valor','valor_edit','id_editar','edit','accion']);
    }

    public function nuevo(){
        $this->limpiar();
        $this->new = true;
    }

    public function hab_edit($id){
        $this->limpiar();
        $this->edit = true;
        $this->id_editar = $id;
        $ConsultaEstado = Estado_m::find($id);
        $this->valor_edit = $ConsultaEstado->descripcion;
    }

    public function crear(){
        $this->mensaje = "";
        $this->validate();

        Estado_m::create(
            [
                "descripcion" => $this->valor,
                "accion" => $this->accion
            ]
        );
        $this->limpiar();
        $this->mensaje = "Estado registrado exitosamente";
    }

    public function editar($id){
        $this->mensaje = "";
        $this->validate([   
            "valor_edit" => 'required|min:4|unique:estado_ms,descripcion',
            "accion_edit" => 'integer|required|min:1|max:4'
        ]);

        $ConsultaEstado = Estado_m::find($id);
        $ConsultaEstado->descripcion = $this->valor_edit;
        $ConsultaEstado->accion = $this->accion_edit;
        $ConsultaEstado->save();
        $this->limpiar();
        $this->mensaje = "Estado actualizado exitosamente";
    }

    public function eliminar($id){
        $this->limpiar();
        Estado_m::destroy($id);
        $this->mensaje = "Estado eliminado exitosamente";
    }


    public function render()
    {
        $estados = Estado_m::all();
        return view('livewire.estados',[
            'estados' => $estados,
            'id_editar' => $this->id_editar,
            'nuevo' => $this->new,
            'edit' => $this->edit
        ]);
    }
}

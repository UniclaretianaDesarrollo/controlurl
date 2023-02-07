<?php

namespace App\Http\Livewire;

use App\Models\programas;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CrearProgramas extends Component
{
    public $nombre;
    public $nombreAbreviado;
    public $colorPrograma;
    public $descripcionPrograma;
    // public $variable;

    public function render()
    {
        return view('livewire.crear-programas');
    }

    protected $rules = [
        'nombre' => 'required|max:200|unique:programas,nombre',
        'nombreAbreviado' => 'required|max:100',
        'colorPrograma' => 'required|max:10|regex:/#(?:[0-9a-fA-F]{3,4}){1,2}/',
        'descripcionPrograma' => 'max:500',
    ];

    protected function messages(){
        return [
            'nombre.required'=>'El campo nombre es requerido',
            'nombre.max'=>'El nombre no puede contener más de 200 caracteres',
            'nombre.unique'=>'Ya existe otro programa con el nombre de ' .$this->nombre,
            'nombreAbreviado.required'=>'El campo del nombre abreviado es requerido',
            'nombreAbreviado.max'=>'El nombre abreviado no puede contener más de 200 caracteres',
            'colorPrograma.required'=>'El campo color es requerido',
            'colorPrograma.max'=>'El campo color no puede contener más de 10 caracteres',
            'colorPrograma.regex'=>'Ingrese un formato válido',
            'descripcionPrograma.max'=>'La descripción no puede contener más de 500 caracteres',
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function guardar() {
        $this->validate();
        try {
            
            // dd(substr($this->colorPrograma, 0,1));
            // dd(str_replace(' ', '',$this->colorPrograma));
            
            programas::create([
                'nombre'=>$this->nombre,
                'nombreAbreviado'=>$this->nombreAbreviado,
                'colorPrograma'=>$this->colorPrograma,
                'descripcionPrograma'=>$this->descripcionPrograma,
            ]);
            
            // Llamamos a reste para que se quiten los datos que quedan en el modal
            $this->reset();
            
            //para cerrar el modal
            $this->dispatchBrowserEvent('jsCerrarModalCrear'); 

            // llamamos el metodo emit par que se actualice la lista de los programas
            $this->emitTo('ver-programas','actualizarlistaprograma');

            // para llamar a la alerta 
            $this->dispatchBrowserEvent('alert');

        } catch (\Throwable $th) {
            $this->reset();

        }
        
    }
}

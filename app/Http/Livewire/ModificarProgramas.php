<?php

namespace App\Http\Livewire;

use App\Models\programas;
use Livewire\Component;

class ModificarProgramas extends Component
{
    public programas $programa;

    public function render()
    {
        return view('livewire.modificar-programas', ['datos'=>$this->programa]);
    }

    protected function rules() 
    {
        return [
            'programa.nombre' => ['required', 'unique:programas,nombre,' . $this->programa->id, 'max:200'],
            'programa.nombreAbreviado' => ['required','max:100'],
            'programa.colorPrograma' => ['required','max:10','regex:/#(?:[0-9a-fA-F]{3,4}){1,2}/'],
            'programa.descripcionPrograma' => ['max:500'],
        ];
    }

    // protected $rules = [
    //     'programa.nombre' => 'required|max:200|unique:programas,nombre',
    //     'programa.nombreAbreviado' => 'required|max:100',
    //     'programa.colorPrograma' => 'required|max:10|regex:/#(?:[0-9a-fA-F]{3,4}){1,2}/',
    //     'programa.descripcionPrograma' => 'max:500',
    // ];

    protected function messages(){
        return [
            'programa.nombre.required'=>'El campo nombre es requerido',
            'programa.nombre.max'=>'El nombre no puede contener más de 200 caracteres',
            'programa.nombre.unique'=>'Ya existe otro programa con el nombre de ' .$this->programa->nombre,
            'programa.nombreAbreviado.required'=>'El campo del nombre abreviado es requerido',
            'programa.nombreAbreviado.max'=>'El nombre abreviado no puede contener más de 200 caracteres',
            'programa.colorPrograma.required'=>'El campo color es requerido',
            'programa.colorPrograma.max'=>'El campo color no puede contener más de 10 caracteres',
            'programa.colorPrograma.regex'=>'Ingrese un formato válido',
            'programa.descripcionPrograma.max'=>'La descripción no puede contener más de 500 caracteres',
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function actualizar(){
        $this->validate();
        try {
            $this->programa->save();
            // para cerrar el modal
            session()->flash('ModificarPrograma');
            $this->dispatchBrowserEvent('ModificarPrograma'); 

            // llamamos el metodo emit par que se actualice la lista de los programas
            $this->emitTo('ver-programas','actualizarlistaprograma');
            
            // para llamar a la alerta 
            $this->dispatchBrowserEvent('alert');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

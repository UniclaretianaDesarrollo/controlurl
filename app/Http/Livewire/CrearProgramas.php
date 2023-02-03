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
        'nombre' => 'required|max:200',
        'nombreAbreviado' => 'required|max:100',
        'colorPrograma' => 'required|max:10|regex:/#(?:[0-9a-fA-F]{3,4}){1,2}/',
        'descripcionPrograma' => 'max:500',
    ];

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

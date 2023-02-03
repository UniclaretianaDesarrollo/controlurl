<?php

namespace App\Http\Livewire;

use App\Models\programas;
use Livewire\Component;

class VerProgramas extends Component
{
    public $buscar;
    public $variableOrdenar = "id";
    public $tipoOrden = "desc";

    protected $listeners = [
        'actualizarlistaprograma' => 'render'
    ];
    
    public function render()
    {
        $programas = programas::where('nombre', 'like', '%'.$this->buscar . '%')
        ->orWhere('nombreAbreviado', 'like', '%'.$this->buscar . '%')
        ->orderBy($this->variableOrdenar, $this->tipoOrden)
        ->get();
        $vacio=empty(programas::count());
        return view('livewire.ver-programas', compact("programas", "vacio"));
    }


    public function ordenar ($variable) {
        if ($this->variableOrdenar == $variable) {
            if ($this->tipoOrden == 'desc') {
                $this->tipoOrden = 'asc';
            } else {
                $this->tipoOrden = 'desc';
            }
        } else {
            $this->variableOrdenar=$variable;
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\programas;
use Livewire\Component;
use Livewire\WithPagination;

class VerProgramas extends Component
{
    use WithPagination;
    // para que agregue los estilos a la paginacion
    protected $paginationTheme = 'bootstrap';

    public $buscar = '';
    public $programa;
    public $variableOrdenar = "id";
    public $tipoOrden = "desc";
    public $cantidad = '10';
    public $load = false;

    // para pasar parametros por url
    protected $queryString = [
        'buscar' =>['except' => ''],
        'variableOrdenar' =>['except' => 'id'],
        'tipoOrden' =>['except' => 'desc'],
        'cantidad' =>['except' => '10'],
    ];
    // para escuchra eventos desde js tenemos que recibirlos en los listener, por esto, vamos a poner el cambiarEstado
    protected $listeners = [
        'actualizarlistaprograma' => 'render',
        'cambiarEstado',
        'eliminarEstado'
    ];
    
    public function render()
    {
        if ($this->load) {
            $programas = programas::where('nombre', 'like', '%'.$this->buscar . '%')
                ->orWhere('nombreAbreviado', 'like', '%'.$this->buscar . '%')
                ->orderBy($this->variableOrdenar, $this->tipoOrden)
                ->paginate($this->cantidad);
        } else {
            $programas = [];
        }
        
        $vacio=empty(programas::count());
        return view('livewire.ver-programas', compact("programas", "vacio"));
    }

    public function loadPrograma()
    {
        $this->load = true;
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

    public function cambiarEstado(programas $programa)
    {
        $programa->estado==1?$programa->update(['estado'=>0]):$programa->update(['estado'=>1]);
    }

    public function eliminarEstado(programas $programa)
    {
        $programa->delete();
    }

    // método que se ejecuta para que se actualice la paginación al momento que se vaya a buscar algo
    // al decir que updatingVariable estamos pasando la variable que queremos que se resetee, para eso la función
    public function updatingBuscar(){
        $this->resetPage();
    }
}

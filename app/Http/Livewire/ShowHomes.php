<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\jugador; 
use Livewire\WithPagination;

class ShowHomes extends Component
{

    use WithPagination;

    public $search, $jugador;
    public $sort = 'id';
    public $direction = 'desc';
    public $open_edit= false;

    protected $rules = [
        'jugador.nombres_apellidos'=>'required|max:50',
        'jugador.fecha_nacimiento'=>'required',
        'jugador.pierna_habil'=>'required',
        'jugador.posicion'=>'required',
        'jugador.telefono'=>'required'                
    ];

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $listeners = ['render'];

    public function render()
    {
        $jugadores = jugador::where('posicion', 'like', '%'. $this->search.'%')
                            ->orWhere('pierna_habil', 'like', '%'. $this->search.'%')
                            ->orWhere('fecha_nacimiento', 'like', '%'. $this->search.'%')
                            ->orWhere('nombres_apellidos', 'like', '%'. $this->search.'%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(10);
        return view('livewire.show-homes', compact('jugadores'));
    }

    public function order($sort){

        if ($this->sort == $sort) {
            if ($this->direction=='desc') {
                $this->direction='asc';
            } else {
                $this->direction='desc';
            }            
        }else{
            $this->sort = $sort;
            $this->direction='asc';
        }
        
    }

    public function edit(jugador $jugador){
        $this->jugador = $jugador;
        $this->open_edit= true;        
    }

    public function update(){

        $this->validate(); 

        $this->jugador->save();

        $this->reset('open_edit');        

        $this->emit('alert', 'El jugador se actualizó correctamente');
    }

    public function destroy($jugador){   
        $this->emit('alertDelete', '¿Desea eliminar jugador?');     
        jugador::destroy($jugador);       
        
    }

    
    public function resetCancelar(){
        $this->open_edit = false;
        
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\jugador; 

class ShowHomes extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render'=>'render'];

    public function render()
    {
        $jugadores = jugador::where('posicion', 'like', '%'. $this->search.'%')
                            ->orWhere('pierna_habil', 'like', '%'. $this->search.'%')
                            ->orWhere('fecha_nacimiento', 'like', '%'. $this->search.'%')
                            ->orderBy($this->sort, $this->direction)
                            ->get();
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
}

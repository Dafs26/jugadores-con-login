<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jugador; 

class ShowHomes extends Component
{
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function render()
    {
        $jugadores = Jugador::where('posicion', 'like', '%'. $this->search.'%')
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

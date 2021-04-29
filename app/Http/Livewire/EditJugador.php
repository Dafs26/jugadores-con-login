<?php

namespace App\Http\Livewire;

use App\Models\jugador;
use Livewire\Component;

class EditJugador extends Component
{

    public $jugador;

    public $open = false;

    protected $rules = [
        'nombres_apellidos'=>'required|max:50',
        'fecha_nacimiento'=>'required',
        'pierna_habil'=>'required',
        'posicion'=>'required',
        'telefono'=>'required'        
    ];

    public function mount(jugador $jugador){
        $this->jugador = $jugador;
    }

    public function save(){
        $this->jugador->save();
    }

    public function render()
    {
        return view('livewire.edit-jugador');
    }
}

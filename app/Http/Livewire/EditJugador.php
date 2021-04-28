<?php

namespace App\Http\Livewire;

use App\Models\jugador;
use Livewire\Component;

class EditJugador extends Component
{

    public $jugador;

    public $open = false;

    public function mount(jugador $jugador){
        $this->jugador = $jugador;
    }

    public function render()
    {
        return view('livewire.edit-jugador');
    }
}

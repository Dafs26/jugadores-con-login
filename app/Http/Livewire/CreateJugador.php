<?php

namespace App\Http\Livewire;

use App\Models\jugador;
use Livewire\Component;

class CreateJugador extends Component
{
    public $nombres_apellidos, $foto_perfil, $fecha_nacimiento, $nombre_apellido_apoderado,
            $telefono_apoderado, $club_actual, $fecha_fin_contrato, $agente, $video1, $video2,
            $video3, $pierna_habil, $altura, $posicion, $telefono, $email, $perfil_transfermarkt,
            $perfil_soccerway;
    public $open = false;

    public function save(){
        jugador::create([
        'nombres_apellidos'=>$this->nombres_apellidos,
        'foto_perfil'=>$this->foto_perfil,
        'fecha_nacimiento'=>$this->fecha_nacimiento,
        'nombre_apellido_apoderado'=>$this->nombre_apellido_apoderado,
        'telefono_apoderado'=>$this->telefono_apoderado,
        'club_actual'=>$this->club_actual,
        'fecha_fin_contrato'=>$this->fecha_fin_contrato,
        'agente'=>$this->agente,
        'video1'=>$this->video1,
        'video2'=>$this->video2,
        'video3'=>$this->video3,
        'pierna_habil'=>$this->pierna_habil,
        ''=>$this->altura,
        'posicion'=>$this->posicion,
        'telefono'=>$this->telefono,
        'email'=>$this->email,
        'perfil_transfermarkt'=>$this->perfil_transfermarkt,
        'perfil_soccerway'=>$this->perfil_soccerway
        ]);
    }

    public function render()
    {
        return view('livewire.create-jugador');
    }
}

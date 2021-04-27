<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();

            $table->string('nombres_apellidos');          
            $table->string('foto_perfil')->nullable();
            $table->date('fecha_nacimiento');//<18 telefono apoderado 
            $table->string('nombre_apellido_apoderado')->nullable();
            $table->string('telefono_apoderado')->nullable();
            $table->string('club_actual')->nullable();
            $table->date('fecha_fin_contrato')->nullable();
            $table->string('agente')->nullable();//si o no
            $table->string('video1')->nullable();
            $table->string('video2')->nullable();
            $table->string('video3')->nullable();
            $table->string('pierna_habil');
            $table->string('altura')->nullable();
            $table->string('posicion');            
            $table->string('telefono');   
            $table->string('email');        
            $table->string('perfil_transfermarkt')->nullable();
            $table->string('perfil_soccerway')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadors');
    }
}

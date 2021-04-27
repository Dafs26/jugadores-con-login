<div> {{-- Div-padre --}}
    <x-jet-button wire:click="$set('open', true)">
        Registrar jugador
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title" >
            <h2 class="text-green-600 text-2xl" >Ingrese sus datos</h2>
        </x-slot>

        <x-slot name="content">
            {{-- nombre y apellido --}}
            <div class="mb-4">
                <x-jet-input  class="w-full border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm" placeholder="Nombres y Apellidos" type="text" wire:model.defer="nombres_apellidos" />
            </div>
            {{-- foto perfil --}}
            <div class="mb-4">
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">                        
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                <span>Suba su foto de perfil</span>
                                <input  type="file" class="sr-only" wire:model.defer="foto_perfil" >
                            </label>
                            <p class="pl-1">o arrastre y suelte</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- fecha nacimiento - telefono --}}
            <div class="mb-4">
                <label class="text-green-600 mr-8">Fecha de Nacimiento
                    <x-jet-input  class="text-gray-500 border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" type="date" wire:model.defer="fecha_nacimiento"/>
                </label>
                <label class="text-green-600" >Telefono</label>
                <x-jet-input  class="flex float-right border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="Telefono" type="text" wire:model.defer="telefono" />
            </div>
            {{-- nombre apoderado y telefono apoderado --}}
            <div class="mb-4 grid grid-cols-2 gap-4">
                <x-jet-input  class=" border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="Nombre Apoderado (solo si es menor)" type="text" wire:model.defer="nombre_apellido_apoderado" />
                <x-jet-input  class=" border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="Telefono Apoderado (solo si es menor)" type="text" wire:model.defer="telefono_apoderado" />
            </div>
            {{-- club actual y fecha fin contrato --}}
            <div class="mb-4">
                <label class="text-green-600 mr-4">Club   
                    <x-jet-input  class="ml-4 mr-6 border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="Club Actual" type="text" wire:model.defer="club_actual"/>
                </label>
                <label class="text-green-600">Fecha fin Contrato
                    <x-jet-input  class="text-gray-500 float-right" type="date" wire:model.defer="fecha_fin_contrato"/>
                </label>                
            </div>
            {{-- video 1, 2 y 3 --}}
            <div class="mb-4 grid grid-cols-3 gap-4">
                <x-jet-input  class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="video 1 (URl)" type="text" wire:model.defer="video1"/>
                <x-jet-input  class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="video 2 (URl)" type="text" wire:model.defer="video2"/>
                <x-jet-input  class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="video 3 (URl)" type="text" wire:model.defer="video3"/>
            </div>
            {{-- pierna habil, altura, posición --}}
            <div class="mb-4 grid grid-cols-3 gap-4">
                <select 
                class="border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm" wire:model.defer="pierna_habil">
                    <option>-- Pierna Habil --</option>
                    <option value="derecha">Derecha</option>
                    <option value="izquierda">Izquierda</option>
                </select>
                <x-jet-input  placeholder="Altura (ej: 1,65 o 1.65)" type="text" class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" wire:model.defer="altura"/>
                <select 
                class="border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm" wire:model.defer="posicion">
                    <option>-- Posición --</option>
                    <option value="portero">Portero</option>
                    <option value="lateral derecho">Lateral Derecho</option>
                    <option value="lateral izquierdo">Lateral Izquierdo</option>
                    <option value="defensa central">Defensa Central</option>
                    <option value="pivote">Pivote</option>
                    <option value="mediocentro">Mediocentro</option>
                    <option value="extremo izquierdo">Extremo Izquierdo</option>
                    <option value="extremo derecho">Extremo Derecho</option>
                    <option value="delantero centro">Delantero Centro</option>                    
                </select>
            </div>
            {{-- email y agente --}}
            <div class="mb-4 grid grid-cols-2 gap-4">
                <x-jet-input   placeholder="Email" type="text" wire:model.defer="email"/>
                <x-jet-input   placeholder="Agente" type="text" wire:model.defer="agente"/>
            </div>
            {{-- perfil transfermarkt --}}
            <div class="mb-4">
                <x-jet-input  class="w-full" placeholder="Perfil Transfermarkt (URL)" type="text" wire:model.defer="perfil_transfermarkt" />
            </div>
            {{-- perfil soccerway --}}
            <div class="mb-4">
                <x-jet-input  class="w-full" placeholder="Perfil Soccerway (URL)" type="text"  wire:model.defer="perfil_soccerway" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button  wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button class="ml-2"  wire:click="save">
                Registrar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>







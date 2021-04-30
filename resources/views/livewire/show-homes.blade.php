<div>{{-- Div padre --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <x-table>
            <div class="px-6 py-4 flex items-center mt-5">
                <x-jet-input class="flex-1 mr-4" type="text" wire:model="search" placeholder="Buscar"/>

                @livewire('create-jugador')

            </div>

            @if ($jugadores->count())               
            
            <table class="min-w-full divide-y divide-gray-200">                  
                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="w-24 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('id')">
                                            id
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('nombres_apellidos')">
                                            Nombre y Apellido
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('fecha_nacimiento')">
                                            Fecha Nacimiento
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('pierna_habil')">
                                            Pierna Habil
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer" wire:click="order('posicion')">
                                            Posición
                                            <i class="fas fa-sort float-right mt-1"></i>
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Editar</span>
                                        </th>
                                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($jugadores as $jugador)                       
                                    
                                    <tr>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">{{$jugador->id}}</div>                                          
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    +
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$jugador->nombres_apellidos}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{$jugador->email}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">{{$jugador->fecha_nacimiento}}</div>
                                            <div class="text-sm text-gray-500">Club Actual: {{$jugador->club_actual}}</div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">{{$jugador->pierna_habil}}</div>
                                            <div class="text-sm text-gray-500">Altura: {{$jugador->altura}}cm</div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">
                                                {{$jugador->posicion}}</div>
                                            <div class="text-sm text-gray-500">Telefono: {{$jugador->telefono}}</div>
                                        </td>
                                        <td class="px-6 py-4 mr-0">                                            
                                            <a wire:click="edit({{$jugador}})" class="btn btn-green">
                                                <i class="far fa-edit"></i>                                                
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a wire:click="destroy({{$jugador}})" class="btn btn-red">
                                                <i class="far fa-trash"></i>                                                
                                            </a>
                                            
                                        </td>
                                    </tr>    
                    @endforeach                                                
                </tbody>                
            </table>

            @else
                <div class="px-6 py-4">
                    <small class="text-red-500">No hay jugadores coincidentes</small>
                </div>
            @endif
            
            @if ($jugadores->hasPages())               
                <div class="px-6 py-3">
                    {{$jugadores->links()}}
                </div>
            @endif
        </x-table> 
        
        {{-- Modal de edición --}}
        <x-jet-dialog-modal wire:model="open_edit">

            <x-slot name="title">
                <h2 class="mb-4 text-green-600 text-2xl float-left">
                    Actualizar datos
                </h2>
            </x-slot>

            {{-- Inputs --}}
    
            <x-slot name="content">
                
                {{-- nombre y apellido --}}
                <div class="mb-4">
                    <x-jet-input wire:model="jugador.nombres_apellidos" class="w-full border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm"
                        placeholder="Nombres y Apellidos" type="text"  />
                        <x-jet-input-error for="nombres_apellidos" />
                </div>
                {{-- fecha nacimiento - telefono --}}
                <div class="mb-4">
                    <label class="text-green-600 mr-8">Fecha de Nacimiento
                        <x-jet-input wire:model="jugador.fecha_nacimiento" class="text-gray-500 border border-gray-300 bg-white rounded-md shadow-sm     sm:text-sm" type="date" />
                            <x-jet-input-error for="fecha_nacimiento" />
                    </label>
                    <label class="text-green-600">Telefono</label>
                    <x-jet-input wire:model="jugador.telefono" class="flex float-right border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm"
                        placeholder="Telefono" type="text" maxlength="12" />
                        <x-jet-input-error for="telefono" />
                </div>
                {{-- nombre apoderado y telefono apoderado --}}
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <x-jet-input wire:model="jugador.nombre_apellido_apoderado"  class=" border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm"
                        placeholder="Nombre Apoderado (solo si es menor)" type="text" />
                    <x-jet-input wire:model="jugador.telefono_apoderado" class=" border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm"
                        placeholder="Telefono Apoderado (solo si es menor)" type="text" maxlength="12"/>
                </div>
                {{-- club actual y fecha fin contrato --}}
                <div class="mb-4">
                    <label class="text-green-600 mr-4">Club
                        <x-jet-input  wire:model="jugador.club_actual" class="ml-4 mr-6 border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm"
                            placeholder="Club Actual" type="text" />
                    </label>
                    <label class="text-green-600">Fecha fin Contrato
                        <x-jet-input wire:model="jugador.fecha_fin_contrato" class="text-gray-500 float-right" type="date" />
                    </label>
                </div>
                {{-- video 1, 2 y 3 --}}
                <div class="mb-4 grid grid-cols-3 gap-4">
                    <x-jet-input wire:model="jugador.video1" class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="video 1 (URl)" type="text" />
                    <x-jet-input wire:model="jugador.video2" class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="video 2 (URl)" type="text" />
                    <x-jet-input wire:model="jugador.video3" class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm" placeholder="video 3 (URl)" type="text" />
                </div>
                {{-- pierna habil, altura, posición --}}
                <div class="mb-4 grid grid-cols-3 gap-4">
                    <select wire:model="jugador.pierna_habil"
                        class="border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm">
                        <option>-- Pierna Habil --</option>
                        <option value="derecha">Derecha</option>
                        <option value="izquierda">Izquierda</option>
                    </select> <x-jet-input-error for="pierna_habil" />
    
                    <x-jet-input wire:model="jugador.altura" placeholder="Altura (ej: 1,65 o 1.65)" type="text" class="border border-gray-300 bg-white rounded-md shadow-sm  sm:text-sm"/>
    
                    <select wire:model="jugador.posicion"
                        class="border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-300 focus:border-green-300 sm:text-sm" >
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
                    </select><x-jet-input-error for="posicion" />
                </div>
                {{-- email y agente --}}
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <x-jet-input wire:model="jugador.email" placeholder="Email" type="text"  />
                    <x-jet-input  wire:model="jugador.agente" placeholder="Agente" type="text" />
                </div>
                {{-- perfil transfermarkt --}}
                <div class="mb-4">
                    <x-jet-input  wire:model.defer="jugador.perfil_transfermarkt" class="w-full" placeholder="Perfil Transfermarkt (URL)" type="text" />
                </div>
                {{-- perfil soccerway --}}
                <div class="mb-4">
                    <x-jet-input  wire:model.defer="jugador.perfil_soccerway" class="w-full" placeholder="Perfil Soccerway (URL)" type="text" />
                </div>
                
            </x-slot>

            {{-- Botones --}}
    
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="resetCancelar">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                    Actualizar
                </x-jet-button>
            </x-slot>
    
        </x-jet-dialog-modal>

    </div>
</div>

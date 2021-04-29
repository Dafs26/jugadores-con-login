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
                                        <td class="px-6 py-4  text-right text-sm font-medium">
                                            @livewire('edit-jugador', ['jugador' => $jugador], key($jugador->id))
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
        </x-table>                
    </div>
</div>

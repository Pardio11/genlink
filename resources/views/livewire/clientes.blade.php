<div class="flex flex-row">



    @livewire('nav-admin')

    <div class="w-[79vw] mx-auto p-4 mb-10 h-full">
        <!-- Filtros -->
        
<form>   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input name="buscarpor" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

        <div class="bg-white p-2 rounded shadow-md mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="zona" class="block font-semibold">Zona:</label>
                    <select wire:model="zona_id" id="modeloAntenaFK" name="zona_id" class="w-1/2 p-2 border rounded block" required>
                        @foreach($zonas as $zona)
                            <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="estatus" class="block font-semibold">Estatus:</label>
                    <select id="estatus" name="estatus" class="w-full p-2 border rounded">
                        <!-- Opciones del select Estatus -->
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow-md">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-600">Id</th>
                        <th class="px-6 py-3 border-b border-gray-600">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-600">Correo</th>
                        <th class="px-6 py-3 border-b border-gray-600">Teléfono</th>
                        <th class="px-6 py-3 border-b border-gray-600">Zona</th>
                        <th class="px-6 py-3 border-b border-gray-600">Dirección</th>
                        <th class="px-6 py-3 border-b border-gray-600">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ( $clientes as $c)
                    <tr class="border-b border-gray-600 text-center">
                        <td class="px-6 py-4">{{$c->n_id}}</td>
                        <td class="px-6 py-4">{{$c->user->name}}</td>
                        <td class="px-6 py-4">{{$c->user->email}}</td>
                        <td class="px-6 py-4">{{ $c->telefono }}</td>
                        <td class="px-6 py-4">{{ $c->zona->nombre }}</td>
                        <td class="px-6 py-4">{{ $c->direccion }}</td>
                        <td class="px-6 py-4">
                            <div class="flex-col ">
                                <button wire:click="openEditModal({{ $c->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded mb-3">Editar</button>
                                <button wire:click="deleteCliente({{ $c->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold w-20 h-8 rounded">Eliminar</button>                            
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          
    </div>
    @if ($isEditing)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal Panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full sm:p-6">
                
                <div>
                    <h2 class="text-lg font-semibold mb-4">Editar Cliente</h2>
                    <form wire:submit.prevent="updateCliente">                        
                        <input wire:model="idC" type="hidden" id="idC" name="idC" >
                        
                        
                        <div>
                            <label for="nombre" class="block font-semibold">Nombre:</label>
                            <input wire:model="userName" type="text" id="userName" name="userName" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label for="correo" class="block font-semibold">Correo:</label>
                            <input wire:model="userMail" type="text" id="userMail" name="userMail" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label for="telefono" class="block font-semibold">Teléfono:</label>
                            <input wire:model="userTel" type="text" id="userTel" name="userTel" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label for="direccion" class="block font-semibold">Dirección:</label>
                            <input wire:model="userDirec" type="text" id="userDirec" name="userDirec" class="w-full p-2 border rounded">
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded">Guardar</button>
                        </div>
                    </form>

                    <button wire:click="closeEditModal" class="bg-gray-400 hover:bg-gray-600 text-white font-bold w-20 h-8 rounded ml-2">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endif

{{-----
<div class="contenedor flex">

    <div class="izquierda w-[20%]  items-center ">
        @foreach ($clientes as $c)

<h1>{{$c->user->name}}</h1>
@foreach ($c->pagos as $p)
@php
$obj=json_decode($p,true);


@endphp
<h1>
{{$obj['fecha_pagado']}}

</h1>
@endforeach
    <h1>------------------------------------------</h1>
@endforeach
    </div>

    <div class="medio">


        @foreach ($clientes as $c)

    @foreach ($c->pagos as $p)
    @php
    $obj=json_decode($p,true);
    @endphp
    @if ($this->compare()&&$this->compareMes($obj['fecha_limite']))
        
    @if ($this->compareMes($obj['fecha_pagado'])&&($obj['fecha_pagado']!=NULL))
      <h1>{{$c->user->name}}</h1>
      <h1>tiene</h1>  
    @else
        @if ($p->recargo_id===NULL)
        @php($this->crearRecargo($p->id))
            
        @endif
    <h1>{{$c->user->name}}</h1>
    <h1>no tiene</h1>
      @endif


@endif


@endforeach
<h1>------------------------------------------</h1>
@endforeach
    </div>

    <div class="derecha">
@foreach ($clientes as $c)

    
<h1>{{$c->user->name}}</h1>
@foreach ($c->pagos as $p)

@isset($p->recargo_id)
<h1>{{$p->recargo_id}}</h1>
    
@endisset
    
@endforeach
    

@endforeach
    </div>



</div>
--}}





    
    
</div>{{-----final-del-template----}}

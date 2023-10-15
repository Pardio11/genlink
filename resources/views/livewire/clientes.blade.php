<div class="flex flex-row">



    @livewire('nav-admin')

    <div class="w-[79vw] mx-auto p-4 h-[100rem]">
        <!-- Filtros -->
        <div class="bg-white p-2 rounded shadow-md mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="zona" class="block font-semibold">Zona:</label>
                    <select id="zona" name="zona" class="w-full p-2 border rounded">
                        <!-- Opciones del select Zona -->
                        <option value="zona1">Zona 1</option>
                        <option value="zona2">Zona 2</option>
                        <option value="zona3">Zona 3</option>
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
                        <th class="px-6 py-3 border-b border-gray-600">Dirección</th>
                        <th class="px-6 py-3 border-b border-gray-600">Zonas</th>
                        <th class="px-6 py-3 border-b border-gray-600">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $c)
                    <tr class="border-b border-gray-600 text-center">
                       
                        <td class="px-6 py-4">{{$c->n_id}}</td>
                        <td class="px-6 py-4">{{$c->user->name}}</td>
                        <td class="px-6 py-4">{{$c->user->email}}</td>
                        <td class="px-6 py-4">{{ $c->telefono }}</td>
                        <td class="px-6 py-4">{{ $c->direccion }}</td>
                        <td class="px-6 py-4">@if (@isset($c->zona->nombre))>
                            {{ $c->zona->nombre }} 
                        @else
                          N/a  
                        @endif</td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded mr-2">Editar</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold w-20 h-8 rounded">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          
    </div>

</div>

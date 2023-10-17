<div class="flex flex-row">



    @livewire('nav-admin')

    <div class="w-[79vw] mx-auto p-4 mb-10 h-full">
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
                        <td class="px-6 py-4">{{ $c->direccion }}</td>
                        <td class="px-6 py-4">
                            <div class="flex-col ">
                                <button wire:click="openEditModal({{ $c->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded mb-3">Editar</button>
                                <button wire:click="deleteCliente({{ $c->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold w-20 h-8 rounded">Eliminar</button>                            </div>
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
                        <div>
                            <label for="nombre" class="block font-semibold">Nombre:</label>
                            <input wire:model="editingCliente.user.name" type="text" id="nombre" name="nombre" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label for="correo" class="block font-semibold">Correo:</label>
                            <input wire:model="editingCliente.user.email" type="text" id="correo" name="correo" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label for="telefono" class="block font-semibold">Teléfono:</label>
                            <input wire:model="editingCliente.telefono" type="text" id="telefono" name="telefono" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label for="direccion" class="block font-semibold">Dirección:</label>
                            <input wire:model="editingCliente.direccion" type="text" id="direccion" name="direccion" class="w-full p-2 border rounded">
                        </div>
                        
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded">Guardar</button>
                            <button wire:click="closeEditModal" class="bg-gray-400 hover:bg-gray-600 text-white font-bold w-20 h-8 rounded ml-2">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

    
    
</div>

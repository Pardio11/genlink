<div class="flex flex-row">



    @livewire('nav-admin')

    <div class="w-[79vw] mx-auto p-4 mb-10 h-full">
     
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        <span class="sr-only">Action button</span>
                        Estado
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 max-h-40 overflow-y-auto">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                        </div>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search-users" onkeyup="filterTable()" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Numero de telefono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estatus
                        </th>
                        <th scope="col" class="px-6 py-3">
                            IP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Punto de acceso
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody id="user-table-body">
                    @foreach ( $clientes as $c)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 user-row">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img   wire:click="openProfile({{$c->user->id}})"class="w-10 h-10 rounded-full" src="/imagenes/pictureUser/user-1.jpg" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$c->user->name}}</div>
                                <div class="font-normal text-gray-500">{{$c->user->email}}</div>
                            </div>  
                        </th>
                        <td class="px-6 py-4">
                            {{$c->telefono}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $c->antena?->ip ?? '' }}
                        </td>
                        <td class="px-6 py-4 relative">
                            <div class="flex items-center">
                                @if ($c->zona->nombre ?? '')
                                    <span class="mr-2">{{ $c->zona->nombre }}</span>
                                @endif
                                @if ($c->zona->nombre ?? '')
                                    <img class="h-10 w-10 cursor-pointer border border-gray-400 rounded-lg shadow-2xl transition duration-300 transform hover:scale-110" 
                                    src="{{ asset('Iconos/antenna2.svg') }}" alt="Cerrar sesión" 
                                    wire:click="openModal({{$c->zona->id}})">
                                @endif
                            </div>
                            <!-- Modal -->
                            @if ($showModal)
                            <div class="fixed top-0 left-0 flex justify-center items-center z-50 w-full h-full bg-black bg-opacity-25">
                                <div class="bg-white p-6 max-w-md border border-gray-300 rounded-lg shadow-lg">
                                    <!-- Contenido del modal con la información del AP -->
                                    <div class="text-center">
                                        <h1 class="text-2xl font-bold mb-4">Detalles del Punto de Acceso</h1>
                                        <p class="text-gray-700 mb-4">Zona: <span class="font-semibold">{{ $zona->nombre ?? '' }}</span></p>
                                        <!-- Agrega más detalles aquí si es necesario -->
                                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" wire:click="closeModal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
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

                    <button wire:click="closeEditModal" class="bg-gray-400 hover:bg-gray-600 text-white font-bold w-20 h-8 rounded mt-2">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const dropdownButton = document.getElementById('dropdownActionButton');
    const dropdownMenu = document.getElementById('dropdownAction');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
});

function filterTable() {
    let input = document.getElementById('table-search-users');
    let filter = input.value.toLowerCase();
    let tableBody = document.getElementById('user-table-body');
    let rows = tableBody.getElementsByClassName('user-row');

    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        let name = row.getElementsByTagName('th')[0].innerText.toLowerCase();
        if (name.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}

    </script>
 <style>
     #dropdownAction {
                max-height: 10rem; /* Limita la altura del menú */
               
                position: absolute; /* Asegura que se sobreponga */
                z-index: 1000; /* Asegura que se superponga a otros elementos */
            }
    </style>
    

</div>
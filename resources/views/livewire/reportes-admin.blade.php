<div class="flex flex-row">

    @livewire('nav-admin')

    <div class="container">

        <div class="max-w-screen-lg mx-auto mb-16">
            <div class="title flex items-center justify-center text-4xl mt-10">
                <i class="icon fas fa-exclamation-triangle text-yellow-500  text-6xl mr-4"></i> REPORTES
            </div>
        </div>
    
        <table class="w-[75vw] bg-white rounded shadow-md mb-16 ml-6">
            <thead class="bg-gray-800 text-white">
                <tr>
                   
                    <th class="px-6 py-3 border-b border-gray-600">#</th>
                    <th class="px-6 py-3 border-b border-gray-600">Nombre</th>
                    <th class="px-6 py-3 border-b border-gray-600">Telefono</th>
                    <th class="px-6 py-3 border-b border-gray-600">Direccion</th>
                    <th class="px-6 py-3 border-b border-gray-600">Asunto</th>
                </tr>
            </thead>
            <tbody>
                @php($contador=0)

                @foreach ($reportes as $r)
                <tr class="border-b border-gray-600 text-center">

                        @php($contador++)

                        <td class="px-6 py-4">{{$contador}}</td>
                        <td class="px-6 py-4">{{$r->cliente->user->name}}</td>
                        <td class="px-6 py-4">{{$r->cliente->telefono}}</td>
                        <td class="px-6 py-4">{{$r->cliente->direccion}}</td>
                        <td>
                            <div class="flex justify-center">
                                <button class="show-popup-button bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded mr-2">Ver</button>
                            </div>
                        </td>

      
                    
                </tr>
                @endforeach
                          <!-- Popup -->
                <div id="popup" class="fixed inset-0 flex items-center justify-center hidden">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
                            <!-- Contenido del popup aquí -->
                            <button class="modal-close-button modal-close absolute top-0 right-0 px-6 py-4">Cerrar</button>
                        </div>
                    </div>
                </div>

            </tbody>
        </table>

    </div>




    <style>
        /* Estilos del overlay del popup */
        .modal-overlay {
            opacity: 0.5;
        }
    
        /* Estilos del botón de cierre del popup */
        .modal-close {
            background: #ccc;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    
    

</div>

<script>
const showPopupButtons = document.querySelectorAll('.show-popup-button');
const closePopupButtons = document.querySelectorAll('.modal-close-button');

showPopupButtons.forEach(button => {
    button.addEventListener('click', () => {
        popup.classList.remove('hidden');
    });
});

closePopupButtons.forEach(button => {
    button.addEventListener('click', () => {
        popup.classList.add('hidden');
    });
});

</script>

    

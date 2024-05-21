<div>
    <div class="bg-gray-200 min-h-screen mb-[10rem]">
        <!-- Banner de perfil -->
        <div class="relative">
            <div class="bg-cover h-72 " style="background-image: url('/imagenes/profile/portada.jpg');"></div>
            <!-- Sección de perfil -->
            <div class="absolute top-32 left-1/2 transform -translate-x-1/2 w-3/4 bg-gray-100 rounded-lg shadow-lg pb-4">
                <!-- Avatar -->
                <div class="flex flex-col items-center -mt-16">
                    <img class="rounded-full border-4 border-white h-32 w-32" src="/imagenes/pictureUser/user-1.jpg"
                        alt="Jenna Stones" />
                    <!-- Nombre y detalles -->
                    <h1 class="text-2xl font-bold mt-2">{{$cliente->name}}</h1>
                    <div class="flex space-x-4 mt-3">
                        <div class="flex items-center flex-col text-center">
                            <i class="fas fa-map-marker-alt text-gray-500"></i>
                            <div class="break-word" style="word-break: break-word; max-width: 110px;">
                                {{$cliente->cliente->direccion}}
                            </div>
                        </div>
                        
                        <div class="flex items-center flex-col">
                            <i class="fas fa-phone-alt text-gray-500"></i>
                            <div>
                                {{$cliente->cliente->telefono}}
                            </div>
                        </div>
                        <div class="flex items-center flex-col">
                            <i class="fas fa-wifi text-gray-500"></i>
                            <div>
                                {{$cliente->cliente->zona->nombre}}
                            </div>
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div class="text-center text-gray-700 mt-3 mx-4">
                        <!-- Información de contacto -->
                        <p>Correo electrónico: {{$cliente->email}}</p>
                        <!-- Estado del servicio -->
                        <p>Estado del servicio: 
                            @if($cliente->cliente->contrato->activo ?? 0)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </p>
                        
                        <!-- Información de facturación -->
                        <p>Plan de servicio: Premium</p>
                    </div>

                    <!-- Calendario -->
                    <div class="mt-6 grid grid-cols-4 gap-4">
                        <!-- Enero -->
                        <div id="enero" class="mes flex flex-col items-center p-4 bg-green-500 text-white rounded-md"
                            onclick="changeStatus('enero')">
                            <i id="icon-enero" class="fas fa-check-circle text-xl"></i>
                            <div class="font-bold">Enero</div>
                        </div>
                        <!-- Febrero -->
                        <div id="febrero" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('febrero')">
                            <i id="icon-febrero" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Febrero</div>
                        </div>
                        <!-- Marzo -->
                        <div id="marzo" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('marzo')">
                            <i id="icon-marzo" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Marzo</div>
                        </div>
                        <!-- Abril -->
                        <div id="abril" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('abril')">
                            <i id="icon-abril" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Abril</div>
                        </div>
                        <!-- Mayo -->
                        <div id="mayo" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('mayo')">
                            <i id="icon-mayo" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Mayo</div>
                        </div>
                        <!-- Junio -->
                        <div id="junio" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('junio')">
                            <i id="icon-junio" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Junio</div>
                        </div>
                        <!-- Julio -->
                        <div id="julio" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('julio')">
                            <i id="icon-julio" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Julio</div>
                        </div>

                        <!-- Agosto -->
                        <div id="agosto" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('agosto')">
                            <i id="icon-agosto" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Agosto</div>
                        </div>
                        <!-- Septiembre -->
                        <div id="septiembre" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('septiembre')">
                            <i id="icon-septiembre" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Septiembre</div>
                        </div>
                        <!-- Octubre -->
                        <div id="octubre" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('octubre')">
                            <i id="icon-octubre" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Octubre</div>
                        </div>
                        <!-- Noviembre -->
                        <div id="noviembre" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('noviembre')">
                            <i id="icon-noviembre" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Noviembre</div>
                        </div>
                        <!-- Diciembre -->
                        <div id="diciembre" class="mes flex flex-col items-center p-4 bg-red-500 text-white rounded-md"
                            onclick="changeStatus('diciembre')">
                            <i id="icon-diciembre" class="fas fa-exclamation-circle text-xl"></i>
                            <div class="font-bold">Diciembre</div>
                        </div>
                    </div>
                   <!-- Botón de cobrar -->
                   <!-- Botón de cobrar -->
                   <div class="text-center mt-6">
                    <button onclick="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Cobrar
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@livewire('payment-modal')

</div>



<script>
let selectedMonth = '';

function changeStatus(month) {
    var element = document.getElementById(month);
    var iconElement = document.getElementById('icon-' + month);

    if (element.classList.contains('bg-red-500')) {
        element.classList.remove('bg-red-500');
        element.classList.add('bg-yellow-500'); // Cambiar a color de "en proceso"
        iconElement.classList.remove('fa-exclamation-circle');
        iconElement.classList.add('fa-spinner'); // Cambiar el icono a "en proceso"
    } else if (element.classList.contains('bg-yellow-500')) {
        element.classList.remove('bg-yellow-500');
        element.classList.add('bg-red-500'); // Cambiar de vuelta a color rojo
        iconElement.classList.remove('fa-spinner');
        iconElement.classList.add('fa-exclamation-circle'); // Cambiar el icono de vuelta
    }

    // Guardar el mes seleccionado
    selectedMonth = month;
}

function openModal() {
    if (selectedMonth === '') {
        alert('Por favor, selecciona un mes primero.');
        return;
    }

    Livewire.dispatch('openModal', [selectedMonth]);
}
</script>

<div class="flex flex-row ">
    @livewire('nav-admin')


    <input type="hidden" id="selectedInstalacion" value="{{ $selectedInstalacion }}">


    <div id="formCliente" class=" flex justify-center items-center ">
        <div class="justify-center h-auto mb-12  w-[75vw] mt-14">
            <div class="mb-4 text-center">
                <i class="fas fa-user text-4xl text-blue-500 mb-2"></i>
                <h2 class="text-2xl font-semibold">Formulario de Antena</h2>
            </div>
            <form id="clienteForm" wire:submit.prevent="crearUser" class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
                <!-- Paso 1: Información básica -->
                <div class="form-step" id="step1">
                    <h2 class="text-2xl font-bold mb-4">Paso 1: Información de usuario</h2>
                    <div class="mb-4">
                        <label for="user" class="block">Nombre:</label>
                        <input wire:model="user" type="text" id="user" name="user" class="w-1/2 p-2 border rounded" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="block">Contraseña:</label>
                        <input wire:model="password" type="text" id="password" name="password" class="w-1/2 p-2 border rounded" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="correo" class="block">Correo:</label>
                        <input wire:model="correo" type="text" id="correo" name="correo" class="w-1/2 p-2 border rounded" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="direccion" class="block">Dirección:</label>
                        <input wire:model="direccion" type="text" id="direccion" name="direccion" class="w-1/2 p-2 border rounded" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="telefono" class="block">Teléfono:</label>
                        <input wire:model="telefono" type="text" id="telefono" name="telefono" class="w-1/2 p-2 border rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="zonaFK">Precio:</label>
                        <select wire:model="precio" id="precio" name="precio" class="w-1/2 p-2 border rounded block" required>
                                <option value="230">230</option>
                                <option value="250">250</option>
                                <option value="300">300</option>
                        </select>
                    </div>



                    <div class="mb-4">
                        <label for="zonaFK">Zona:</label>
                        <select wire:model="zona_id" id="modeloAntenaFK" name="zona_id" class="w-1/2 p-2 border rounded block" required>
                            <!-- Include options for the "modelo" foreign key from your data source -->
                            @foreach($zonas as $zona)
                                <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block">Tipo de descuento:</label>
                        @foreach($descuentos as $descuento)
                            <label class="inline-flex items-center mt-2">
                                <input type="checkbox" wire:model="selectedDescuentos" value="{{ $descuento->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2">{{ $descuento->nombre }}</span>
                            </label>
                        @endforeach
                    </div>
                    
                    <div class="mb-4">
                        <label for="nota" class="block">Nota de Instalación:</label>
                        <textarea wire:model="nota" id="nota" name="nota" class="w-1/2 p-2 border rounded" rows="4" required></textarea>
                    </div>
            
                    <div class="flex justify-end">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="nextStep(2)">Siguiente</button>
                    </div>
                </div>
            
                <!-- Paso 2: Información de antena -->
                <div class="form-step" id="step2" wire:loading.attr="disabled" wire:target="agregarCliente" style="display: none;">
                    <h2 class="text-2xl font-bold mb-4">Paso 2: Información de antena</h2>
                    <!-- Campos de entrada de Antena -->
                    <div class="mb-4">
                        <label for="userAntena">Usuario:</label>
                        <input wire:model="userAntena" type="text" id="userAntena" name="userAntena" class="w-1/2 p-2 border rounded block" required>
                    </div>
            
                    <div class="mb-4">
                        <label for="passwordAntena">Contraseña:</label>
                        <input wire:model="passwordAntena" type="text" id="passwordAntena" name="passwordAntena" class="w-1/2 p-2 border rounded block" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="ipAntena">IP:</label>
                        <input wire:model="ipAntena" type="text" id="ipAntena" name="ipAntena" class="w-1/2 p-2 border rounded block" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="macAntena">MAC:</label>
                        <input wire:model="macAntena" type="text" id="macAntena" name="macAntena" class="w-1/2 p-2 border rounded block" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="modeloAntenaFK">Modelo de Antena:</label>
                        <select wire:model="modelo_antena_id" id="modeloAntenaFK" name="modelo_antena_id" class="w-1/2 p-2 border rounded block" required>
                            <!-- Include options for the "modelo" foreign key from your data source -->
                            @foreach($antenas as $antena)
                                <option value="{{ $antena->id }}">{{ $antena->modelo }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="flex justify-between">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="prevStep(1)">Anterior</button>
                        <button type="button" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="nextStep(3)">Siguiente</button>
                    </div>
                </div>
            
                <!-- Paso 3: Información del router -->
                <div class="form-step" id="step3" wire:loading.attr="disabled" wire:target="agregarCliente" style="display: none;">
                    <h2 class="text-2xl font-bold mb-4">Paso 3: Información del router</h2>
                    <div class="mb-4">
                        <label for="userRouter">Usuario:</label>
                        <input wire:model="userRouter" type="text" id="userRouter" name="userRouter" class="w-1/2 p-2 border rounded block" required>
                    </div>
            
                    <div class="mb-4">
                        <label for="passwordRouter">Contraseña:</label>
                        <input wire:model="passwordRouter" type="text" id="passwordRouter" name="passwordRouter" class="w-1/2 p-2 border rounded block" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="ipRouter">IP:</label>
                        <input wire:model="ipRouter" type="text" id="ipRouter" name="ipRouter" class="w-1/2 p-2 border rounded block" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="macRouter">MAC:</label>
                        <input wire:model="macRouter" type="text" id="macRouter" name="macRouter" class="w-1/2 p-2 border rounded block" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="modeloRouterFK">Modelo de Router:</label>
                        <select wire:model="modelo_router_id" id="modeloRouterFK" name="modelo_router_id" class="w-1/2 p-2 border rounded block" required>
                            <!-- Include options for the "modelo_router_id" field from your data source -->
                            @foreach($routers as $router)
                                <option value="{{ $router->id }}">{{ $router->modelo }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="flex justify-between">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="prevStep(2)">Anterior</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>

</div>

<script>
    let currentStep = 1;
    const formSteps = document.querySelectorAll('.form-step');

    function nextStep(step) {
        formSteps[currentStep - 1].style.display = 'none';
        currentStep = step;
        formSteps[currentStep - 1].style.display = 'block';
    }

    function prevStep(step) {
        formSteps[currentStep - 1].style.display = 'none';
        currentStep = step;
        formSteps[currentStep - 1].style.display = 'block';
    }

    let selectedInstalacion = document.getElementById('selectedInstalacion').value;
    
    if (selectedInstalacion) {
        // Utiliza el valor de selectedInstalacion para prellenar tu formulario
        nombreInstalacionInput.value = selectedInstalacion;

    }
</script>


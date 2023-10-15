
<div class="max-w-screen-lg mx-auto">
    <!-- Botones para activar los formularios -->
    <div class="flex space-x-4 mb-4 mt-10 justify-center">
        <button id="btnCobradores" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cobradores</button>
        <button id="btnModeloRouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modelo Router</button>
        <button id="btnModeloAntena" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modelo Antena</button>
        <button id="btnTipoServicio" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tipo de Servicio</button>
        <button id="btnTipoDescuento" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tipo de Descuento</button>
        <button id="btnZonas" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zonas</button>
        
    </div>
    <div class="flex space-x-4 mb-4 mt-6 justify-center">
        <button id="btnRouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Router</button>
        <button id="btnAntena" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Antena</button>
        
    </div>

    <!-- Formulario de Cobradores -->
    <div id="formCobradores" class="mb-8 ">
        <div class="text-center">
            <i class="fas fa-user-tie text-4xl text-blue-500"></i>
            <h2 class="text-2xl font-semibold mb-4">Formulario de Cobradores</h2>
        </div>
        <form class="bg-white rounded shadow-md p-6 mx-auto  w-1/2">
            <!-- Campos de entrada de Cobradores -->
            <div class="mb-4 ">
                <label for="nombreCobrador">Nombre:</label>
                <input type="text" id="nombreCobrador" name="nombreCobrador" class="w-1/2 p-2 border rounded block">
            </div>
            <div class="mb-4">
                <label for="telefonoCobrador">Número de Teléfono:</label>
                <input type="text" id="telefonoCobrador" name="telefonoCobrador" class="w-1/2 p-2 border rounded block">
            </div>
            <div class="mb-4">
                <label for="direccionCobrador">Dirección:</label>
                <input type="text" id="direccionCobrador" name="direccionCobrador" class="w-1/2 p-2 border rounded block">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>

<!-- Formulario de Modelo Router -->
<div id="formModeloRouter" class="mb-8 hidden" >
    <div class="text-center">
        <i class="fas fa-wifi text-4xl text-blue-500"></i>
        <h2 class="text-2xl font-semibold mb-4">Formulario de Modelo Router</h2>
    </div>
    <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
        <!-- Campos de entrada de Modelo Router -->
        <div class="mb-4">
            <label for="modeloRouter">Modelo:</label>
            <input wire:model="modeloRouter" type="text" id="modeloRouter" name="modeloRouter" class="w-1/2 p-2 border rounded block">
            @error('modeloRouter') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="marcaRouter">Marca:</label>
            <input wire:model="marcaRouter" type="text" id="marcaRouter" name="marcaRouter" class="w-1/2 p-2 border rounded block">
            @error('marcaRouter') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button wire:click.prevent="guardarModeloRouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
    </form>
</div>


     <!-- Formulario de Modelo de Antena -->
     <div id="formModeloAntena" class="mb-8 hidden">
        <div class="text-center">
            <i class="fas fa-satellite-dish text-4xl text-blue-500"></i>
            <h2 class="text-2xl font-semibold mb-4">Formulario de Modelo de Antena</h2>
        </div>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Modelo de Antena -->
            <div class="mb-4">
                <label for="modeloAntena">Modelo:</label>
                <input wire:model="modeloAntena" type="text" id="modeloAntena" name="modeloAntena" class="w-1/2 p-2 border rounded block">
                @error('modeloAntena') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="marcaAntena">Marca:</label>
                <input wire:model="marcaAntena" type="text" id="marcaAntena" name="marcaAntena" class="w-1/2 p-2 border rounded block">
                @error('marcaAntena') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button wire:click.prevent="guardarModeloAntena" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
        
    </div>

    <!-- Formulario de Tipo de Servicio -->
    <div id="formTipoServicio" class="mb-8 hidden">
        <div class="text-center">
            <i class="fas fa-cogs text-4xl text-blue-500"></i>
            <h2 class="text-2xl font-semibold mb-4">Formulario de Tipo de Servicio</h2>
        </div>
        <form  class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            @csrf <!-- Agregar el token CSRF -->
            <!-- Campos de entrada de Tipo de Servicio -->
            <div class="mb-4">
                <label for="nombreTipoServicio">Nombre:</label>
                <input wire:model="nombreTipoServicio" type="text" id="nombreTipoServicio" name="nombreTipoServicio" class="w-1/2 p-2 border rounded block">
            </div>
            <div class="mb-4">
                <label for="costoTipoServicio">Costo:</label>
                <input wire:model="costoTipoServicio" type="text" id="costoTipoServicio" name="costoTipoServicio" class="w-1/2 p-2 border rounded block">
            </div>
            <button wire:click.prevent="guardarTipoServicio" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>

    <!-- Formulario de Tipo de Descuento -->
    <div id="formTipoDescuento" class="mb-8 hidden">
        <div class="text-center">
            <i class="fas fa-money-bill-wave text-4xl text-blue-500"></i>
            <h2 class="text-2xl font-semibold mb-4">Formulario de Tipo de Descuento</h2>
        </div>
                   
        <!-- Campos de entrada de Tipo de Descuento-->
        <form  class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
        <div class="mb-4">
                <label for="nombreTipoDescuento">Nombre:</label>
                <input wire:model="nombreTipoDescuento" type="text" id="nombreTipoDescuento" name="nombreTipoDescuento" class="w-1/2 p-2 border rounded block">
                @error('nombreTipoDescuento') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="montoTipoDescuento">Monto:</label>
                <input wire:model="montoTipoDescuento" type="text" id="montoTipoDescuento" name="montoTipoDescuento" class="w-1/2 p-2 border rounded block">
                @error('montoTipoDescuento') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button wire:click.submit="tipoDescuentoAgregado" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
            
        </form>
        
        
    </div>

    <!-- Formulario de Zonas -->
    <div id="formZonas" class="mb-8 hidden">
        <div class="text-center">
            <i class="fas fa-map-marker-alt text-4xl text-blue-500"></i>
            <h2 class="text-2xl font-semibold mb-4">Formulario de Zonas</h2>
        </div>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Zonas -->

            <div class="mb-4">
                <label for="nombreZona">Nombre:</label>
                <input wire:model="nombre" type="text" id="nombreZona" name="nombreZona" class="w-1/2 p-2 border rounded block">
            </div>
            <div class="mb-4">
                <label for="direccionZona">Dirección:</label>
                <input wire:model="direccion" type="text" id="direccionZona" name="direccionZona" class="w-1/2 p-2 border rounded block">
            </div>
            <div class="mb-4">
                <label for="alcanceZona">Alcance:</label>
                <input wire:model="alcance" type="text" id="alcanceZona" name="alcanceZona" class="w-1/2 p-2 border rounded block">
            </div>

            <div class="mb-4">
                <label for="routerZona">Router:</label>
                <select wire:model="router_id" id="routerZona" name="routerZona" class="w-1/2 p-2 border rounded block">
                    
                    <!-- Opciones del select para Router -->
                    @foreach ($routers as $router)
                        <option selected value="{{ $router->id }}">{{ $router->marca }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="antenaZona">Antena:</label>
                <select required wire:model="antena_id" id="antenaZona" name="antenaZona" class="w-1/2 p-2 border rounded block">
                    <!-- Opciones del select para Antena -->
                    @foreach ($antenas as $antena)
                        <option selected value="{{ $antena->id }}">{{ $antena->marca }}</option>
                    @endforeach
                </select>
            </div>
            
            
            <button wire:click.prevent="guardarZona" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>

<!-- Formulario de Antena -->
<div id="formAntena" class="mb-8 hidden">
    <div class="text-center">
        <i class="fas fa-satellite-dish text-4xl text-blue-500"></i>
        <h2 class="text-2xl font-semibold mb-4">Formulario de Antena</h2>
    </div>
    <form wire:submit.prevent="storeAntena" class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
        @csrf <!-- Add CSRF token -->

        <!-- Campos de entrada de Antena -->
        <div class="mb-4">
            <label for="userAntena">Usuario Antena:</label>
            <input wire:model="user" type="text" id="userAntena" name="user" class="w-1/2 p-2 border rounded block" required>
        </div>
        <div class="mb-4">
            <label for="passwordAntena">Contraseña:</label>
            <input wire:model="password"  id="passwordAntena" name="password" class="w-1/2 p-2 border rounded block" required>
        </div>
        <div class="mb-4">
            <label for="ipAntena">IP:</label>
            <input wire:model="ip" type="text" id="ipAntena" name="ip" class="w-1/2 p-2 border rounded block" required>
        </div>
        <div class="mb-4">
            <label for="macAntena">MAC:</label>
            <input wire:model="mac" type="text" id="macAntena" name="mac" class="w-1/2 p-2 border rounded block" required>
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
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
    </form>
</div>
    <!-- Agrega formularios para los otros elementos (Modelo Antena, Tipo de Servicio, Tipo de Descuento, Zonas) de manera similar -->
</div>
<script>

        const formCobradores = document.getElementById("formCobradores");
        const formModeloRouter = document.getElementById("formModeloRouter");
        const formModeloAntena = document.getElementById("formModeloAntena");
        const formTipoServicio = document.getElementById("formTipoServicio");
        const formTipoDescuento = document.getElementById("formTipoDescuento");
        const formZonas = document.getElementById("formZonas");
        const formAntena = document.getElementById("formAntena");


        document.getElementById("btnAntena").addEventListener("click", () => {
            formAntena.style.display = "block";
            formCobradores.style.display = "none";
            formModeloRouter.style.display = "none";
            formModeloAntena.style.display = "none";
            formTipoServicio.style.display = "none";
            formTipoDescuento.style.display = "none";
            formZonas.style.display = "none";
        });
        

        document.getElementById("btnCobradores").addEventListener("click", () => {
            formCobradores.style.display = "block";
            formModeloRouter.style.display = "none";
            formModeloAntena.style.display = "none";
            formTipoServicio.style.display = "none";
            formTipoDescuento.style.display = "none";
            formZonas.style.display = "none";
        });

        document.getElementById("btnModeloRouter").addEventListener("click", () => {
            formCobradores.style.display = "none";
            formModeloRouter.style.display = "block";
            formModeloAntena.style.display = "none";
            formTipoServicio.style.display = "none";
            formTipoDescuento.style.display = "none";
            formZonas.style.display = "none";
        });

        document.getElementById("btnModeloAntena").addEventListener("click", () => {
            formCobradores.style.display = "none";
            formModeloRouter.style.display = "none";
            formModeloAntena.style.display = "block";
            formTipoServicio.style.display = "none";
            formTipoDescuento.style.display = "none";
            formZonas.style.display = "none";
        });

        document.getElementById("btnTipoServicio").addEventListener("click", () => {
            formCobradores.style.display = "none";
            formModeloRouter.style.display = "none";
            formModeloAntena.style.display = "none";
            formTipoServicio.style.display = "block";
            formTipoDescuento.style.display = "none";
            formZonas.style.display = "none";
        });

        document.getElementById("btnTipoDescuento").addEventListener("click", () => {
            formCobradores.style.display = "none";
            formModeloRouter.style.display = "none";
            formModeloAntena.style.display = "none";
            formTipoServicio.style.display = "none";
            formTipoDescuento.style.display = "block";
            formZonas.style.display = "none";
        });

        document.getElementById("btnZonas").addEventListener("click", () => {
            formCobradores.style.display = "none";
            formModeloRouter.style.display = "none";
            formModeloAntena.style.display = "none";
            formTipoServicio.style.display = "none";
            formTipoDescuento.style.display = "none";
            formZonas.style.display = "block";
        });
    </script>
</body>
</html>


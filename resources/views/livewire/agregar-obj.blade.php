<div class="max-w-screen-lg mx-auto">
    <!-- Botones para activar los formularios -->
    <div class="flex space-x-4 mb-4">
        <button id="btnCobradores" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cobradores</button>
        <button id="btnModeloRouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modelo Router</button>
        <button id="btnModeloAntena" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modelo Antena</button>
        <button id="btnTipoServicio" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tipo de Servicio</button>
        <button id="btnTipoDescuento" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tipo de Descuento</button>
        <button id="btnZonas" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zonas</button>
    </div>

    <!-- Formulario de Cobradores -->
    <div id="formCobradores" class="mb-8 hidden">
        <h2 class="text-2xl font-semibold mb-4">Formulario de Cobradores</h2>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Cobradores -->
            <div class="mb-4">
                <label for="nombreCobrador">Nombre:</label>
                <input type="text" id="nombreCobrador" name="nombreCobrador" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="telefonoCobrador">Número de Teléfono:</label>
                <input type="text" id="telefonoCobrador" name="telefonoCobrador" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="direccionCobrador">Dirección:</label>
                <input type="text" id="direccionCobrador" name="direccionCobrador" class="w-1/2 p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>

    <!-- Formulario de Modelo Router -->
    <div id="formModeloRouter" class="mb-8 hidden">
        <h2 class="text-2xl font-semibold mb-4">Formulario de Modelo Router</h2>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Modelo Router -->
            <div class="mb-4">
                <label for="modeloRouter">Modelo:</label>
                <input type="text" id="modeloRouter" name="modeloRouter" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="marcaRouter">Marca:</label>
                <input type="text" id="marcaRouter" name="marcaRouter" class="w-1/2 p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>
    <div id="formModeloAntena" class="mb-8 hidden">
        <h2 class="text-2xl font-semibold mb-4">Formulario de Modelo Antena</h2>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Modelo Antena -->
            <div class="mb-4">
                <label for="modeloAntena">Modelo:</label>
                <input type="text" id="modeloAntena" name="modeloAntena" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="marcaAntena">Marca:</label>
                <input type="text" id="marcaAntena" name="marcaAntena" class="w-1/2 p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>
    
    <!-- Formulario de Tipo de Servicio -->
    <div id="formTipoServicio" class="mb-8 hidden">
        <h2 class="text-2xl font-semibold mb-4">Formulario de Tipo de Servicio</h2>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Tipo de Servicio -->
            <div class="mb-4">
                <label for="nombreTipoServicio">Nombre:</label>
                <input type="text" id="nombreTipoServicio" name="nombreTipoServicio" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="costoTipoServicio">Costo:</label>
                <input type="text" id="costoTipoServicio" name="costoTipoServicio" class="w-1/2 p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>
    
    <!-- Formulario de Tipo de Descuento -->
    <div id="formTipoDescuento" class="mb-8 hidden">
        <h2 class="text-2xl font-semibold mb-4">Formulario de Tipo de Descuento</h2>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Tipo de Descuento -->
            <div class="mb-4">
                <label for="nombreTipoDescuento">Nombre:</label>
                <input type="text" id="nombreTipoDescuento" name="nombreTipoDescuento" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="montoTipoDescuento">Monto:</label>
                <input type="text" id="montoTipoDescuento" name="montoTipoDescuento" class="w-1/2 p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </form>
    </div>
    
    <!-- Formulario de Zonas -->
    <div id="formZonas" class="mb-8 hidden">
        <h2 class="text-2xl font-semibold mb-4">Formulario de Zonas</h2>
        <form class="bg-white rounded shadow-md p-6 mx-auto w-1/2">
            <!-- Campos de entrada de Zonas -->
            <div class="mb-4">
                <label for="idZona">ID:</label>
                <input type="text" id="idZona" name="idZona" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="nombreZona">Nombre:</label>
                <input type="text" id="nombreZona" name="nombreZona" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="direccionZona">Dirección:</label>
                <input type="text" id="direccionZona" name="direccionZona" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="alcanceZona">Alcance:</label>
                <input type="text" id="alcanceZona" name="alcanceZona" class="w-1/2 p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="routerZona">Router:</label>
                <select id="routerZona" name="routerZona" class="w-1/2 p-2 border rounded">
                    <!-- Opciones del select para Router -->
                    <option value="router1">Router 1</option>
                    <option value="router2">Router 2</option>
                    <option value="router3">Router 3</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="antenaZona">Antena:</label>
                <select id="antenaZona" name="antenaZona" class="w-1/2 p-2 border rounded">
                    <!-- Opciones del select para Antena -->
                    <option value="antena1">Antena 1</option>
                    <option value="antena2">Antena 2</option>
                    <option value="antena3">Antena 3</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
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


    <script>
        const formCobradores = document.getElementById("formCobradores");
        const formModeloRouter = document.getElementById("formModeloRouter");
        const formModeloAntena = document.getElementById("formModeloAntena");
        const formTipoServicio = document.getElementById("formTipoServicio");
        const formTipoDescuento = document.getElementById("formTipoDescuento");
        const formZonas = document.getElementById("formZonas");

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

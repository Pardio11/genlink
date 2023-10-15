<div class="flex flex-row">

    @livewire('nav-admin')

    <div class="p-4 w-[75vw] mx-auto ">
        <div class="flex justify-between items-center  mb-9">
            <div class="calendar w-1/4 p-4 border bg-gray-300">
                <div class="bg-red-500 text-white text-2xl font-bold mb-4 p-2 rounded">Calendario</div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-gray-500 p-2 text-white rounded">1</div>
                    <div class="bg-gray-500 p-2 text-white rounded">2</div>
                    <div class="bg-gray-500 p-2 text-white rounded">3</div>
                    <div class="bg-gray-500 p-2 text-white rounded">4</div>
                    <div class="bg-gray-500 p-2 text-white rounded">5</div>
                    <div class="bg-gray-500 p-2 text-white rounded">6</div>
                    <div class="bg-gray-500 p-2 text-white rounded">7</div>
                    <div class="bg-gray-500 p-2 text-white rounded">8</div>
                    <div class="bg-gray-500 p-2 text-white rounded">9</div>
                    <div class="bg-gray-500 p-2 text-white rounded">10</div>
                    <div class="bg-gray-500 p-2 text-white rounded">11</div>
                    <div class="bg-gray-500 p-2 text-white rounded">12</div>
                </div>
                <div class="flex justify-between mt-4">
                    <button>&lt;</button>
                    <button>&gt;</button>
                </div>
            </div>
            <div class="data w-3/4 text-center">
                <div class="text-black text-2xl font-bold  p-2 mb-16 rounded">Reporte de Mes</div>
                <div class="flex justify-between">
                    <div class="w-1/3">
                        Dinero esperado: <span id="dineroEsperado" class="text-blue-500">$</span>
                    </div>
                    <div class="w-1/3">
                        Dinero en caja: <span id="dineroEnCaja" class="text-green-500">$</span>
                    </div>
                    <div class="w-1/3">
                        Dinero pendiente: <span id="dineroPendiente" class="text-red-500">$</span>
                    </div>
                </div>
            </div>


        </div>
        <table class="min-w-full bg-white rounded shadow-md mb-16">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 border-b border-gray-600">Puntos de venta</th>
                    <th class="px-6 py-3 border-b border-gray-600">Dinero en Caja </th>
                    <th class="px-6 py-3 border-b border-gray-600">Dinero Pendiente</th>
                    <th class="px-6 py-3 border-b border-gray-600">Dinero Cobrado</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-600 text-center">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Ejemplo 1</td>
                    <td class="px-6 py-4">ejemplo1@example.com</td>
                    <td class="px-6 py-4">123-456-7890</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

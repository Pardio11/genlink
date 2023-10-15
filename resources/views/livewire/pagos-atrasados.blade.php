<div class="flex flex-row">

    @livewire('nav-admin')

    <div class="container">

        <div class="w-[75vw] mx-auto mb-16  mt-10">
            <div class="title flex items-center justify-center text-4xl">
                <i class="icon fas fa-money-check text-red-500  text-6xl mr-4"></i> PAGOS ATRASADOS
            </div>
        </div>
    
        <div class="w-[75vw] mx-auto">
            <table class="min-w-full bg-white rounded shadow-md mb-16 mx-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-600">#</th>
                        <th class="px-6 py-3 border-b border-gray-600">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-600">Telefono</th>
                        <th class="px-6 py-3 border-b border-gray-600">Direccion</th>
                        <th class="px-6 py-3 border-b border-gray-600">Fecha Atraso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-600 text-center">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">Ejemplo 1</td>
                        <td class="px-6 py-4">123-456-7890</td>
                        <td class="px-6 py-4">123 Calle Ejemplo</td>
                        <td class="px-6 py-4">2023-12-31</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


    

</div>

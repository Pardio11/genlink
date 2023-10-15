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
                <tr class="border-b border-gray-600 text-center">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">ejemplo1@example.com</td>
                    <td class="px-6 py-4">123-456-7890</td>
                    <td class="px-6 py-4">123-456-7890</td>
                    <td>
                    <div class="flex justify-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded mr-2">Ver</button>
                    </div>
                </td>
                </tr>
            </tbody>
        </table>

    </div>

    

</div>

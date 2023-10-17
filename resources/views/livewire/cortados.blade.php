<div class="flex flex-row">

    @livewire('nav-admin')

    <div class="container">

        <div class="max-w-screen-lg mx-auto mb-16 mt-10">
            <div class="title flex items-center justify-center text-4xl">
                <i class="icon fas fa-cut text-red-500 text-orange-500 text-6xl mr-4"></i> SERVICIOS CORTADOS
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
                        <th class="px-6 py-3 border-b border-gray-600">Fecha Cortada</th>
                        <th class="px-6 py-3 border-b border-gray-600"></th>
                    </tr>
                </thead>
                <tbody>
                    @php($cont=0)
                    @foreach ($contratos as $c)

                    @if (!($c->activo))
                        @php($cont++)

                        <tr class="border-b border-gray-600 text-center">
                            <td class="px-6 py-4">{{$cont}}</td>
                            <td class="px-6 py-4">{{$c->cliente->user->name}}</td>
                            <td class="px-6 py-4">{{$c->cliente->telefono}}</td>
                            <td class="px-6 py-4">{{$c->cliente->direccion}}</td>
                            <td class="px-6 py-4">{{$this->obtenerFecha($c->cliente->pagos)}}</td>
                            <td>
                                <div class="flex justify-center">
                                    <button class="show-popup-button bg-blue-500 hover:bg-blue-700 text-white font-bold w-20 h-8 rounded mr-2">Activar</button>
                                </div>
                            </td>
                        </tr>
                    @endif
                        
                    @endforeach
                    
                </tbody>
            </table>
        </div>

    </div>



</div>

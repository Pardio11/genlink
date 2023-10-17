<div class="flex flex-row">

    @livewire('nav-admin')
    
    <div class="contanier">
        <div class="max-w-screen-lg mx-auto mb-16 mt-10" >
            <div class="title flex items-center justify-center text-4xl">
                <i class="icon fas fa-clipboard-list text-yellow-500 text-6xl mr-4"></i>INSTALACIONES PENDIENTES
            </div>
        </div>
    
        <div class="w-[75vw] mx-auto ml-6">
            <table class="min-w-full bg-white rounded shadow-md mb-16 mx-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-600">#</th>
                        <th class="px-6 py-3 border-b border-gray-600">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-600">Telefono</th>
                        <th class="px-6 py-3 border-b border-gray-600">Direccion</th>
                        <th class="px-6 py-3 border-b border-gray-600">Fecha Límite</th>
                        <th class="px-6 py-3 border-b border-gray-600">Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @php($cont=0)
                    @foreach ($instalacion as $i)

                    @if (!($i->realizado))

                    @php($cont++)

                    <tr class="border-b border-gray-600 text-center">
                        <td class="px-6 py-4">{{$cont}}</td>
                        <td class="px-6 py-4">{{$i->cliente->user->name}}</td>
                        <td class="px-6 py-4">{{$i->cliente->telefono}}</td>
                        <td class="px-6 py-4">{{$i->cliente->user->email}}</td>
                        <td class="px-6 py-4">{{$i->fecha_limite}}</td>
                        <td>
                          
                            <i  onclick="selectInstalacion({{ $i->id }})" class=" fas fa-clipboard-list text-yellow-500 px-6 py-4 text-3xl"  style="cursor: pointer;"></i>
                 
                        </td>
                    </tr>
                        
                    @endif
                    
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        
    </div>


    

</div>

<script>
    let selectedInstalacion = null; // Variable para almacenar la instalación seleccionada

    function selectInstalacion(instalacionId) {
        selectedInstalacion = instalacionId;
    }
</script>


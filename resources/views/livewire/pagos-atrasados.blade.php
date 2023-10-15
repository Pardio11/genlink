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
                        <th class="px-6 py-3 border-b border-gray-600">Fecha Atrasada</th>
                    </tr>
                </thead>
                <tbody>
                {{-- COMPARACION FECHA  --}}

                    @php($cont=0)
                    @foreach ($pagos as $p)
                        
                        @if ($this->compararFecha($p->fecha_limite))
                        @php($cont++)
                        <tr class="border-b border-gray-600 text-center">
                            <td class="px-6 py-4">{{$cont}}</td>
                            <td class="px-6 py-4">{{$p->cliente->user->name}}</td>
                            <td class="px-6 py-4">{{$p->cliente->telefono}}</td>
                            <td class="px-6 py-4">{{$p->cliente->direccion}}</td>
                            <td class="px-6 py-4">{{$p->fecha_limite}}</td>
                        </tr>
    
                        @endif
    
                    @endforeach

                {{-- COMPARACION FECHA --}}
                    
                </tbody>
            </table>
        </div>

    </div>


    

</div>

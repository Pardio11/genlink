<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha384-o3q2U7w5JC9eRa6A5h+ypSd1/u3HP7ZGqX5zCCglXp6WtsH+EG5KG5fNje86axtx" crossorigin="anonymous">

<div class="flex flex-col space-y-4 p-4">


    <h1 class="text-center text-4xl font-bold mb-11">
        <i class="fas fa-wallet text-blue-500"></i> Mis pagos
    </h1>
    @php
        $index = count(Auth::user()->cliente->pagos);
    @endphp


    @while ($index)
        @php
            $pago = Auth::user()->cliente->pagos[--$index];
        @endphp
        @if ($this->compararFecha($pago->fecha_limite))
            <div class="flex items-center">
                <div class="bg-[#282828] text-white flex-grow  flex items-center ">
                    
                    <div class="@if($this->pasoCorte($pago->fecha_limite)) bg-[#2999a8] @else bg-[#e6b516] @endif text-zinc-100 font-semibold  p-5  w-1/12 mr-10 text-center ">
                        {{ $this->obtenerMes($pago->fecha_limite) }}</div>
                    
                    
                        @isset($pago->fecha_pagado)


                        <p>Fecha de pago: <span class="text-gray-300 ml-1 text-sm">  {{ $pago->fecha_pagado }}</span></p>
                    
                        <p class="ml-7">Total: <span class="text-gray-100 ml-1 text-base"> ${{$this->calcularTotal($pago)}}</p>
                            <div class="ml-auto p-1 mr-5">
                                <button class="bg-blue-500 text-white rounded-[5px] p-2 mr-2">Facturar</button>
                                <button class="bg-blue-500 text-white rounded-[5px] p-2">Comprobante</button>
                            </div> 

                        @else


                            <p>Fecha de corte: <span class="text-gray-300 ml-1 text-sm">{{ $pago->fecha_limite }}</span></p>
                            @isset($pago->recargo)<p class="ml-7">Recargo: <span class="text-gray-300 ml-1 text-sm"> {{$pago->recargo->monto}}</p>@endisset
                            <p class="ml-7">Total: <span class="text-gray-100 ml-1 text-base"> ${{$this->calcularTotal($pago)}}</p>
                            @if(!$this->pasoCorte($pago->fecha_limite)) <div class="w-64 ml-6  text-center">  <span class="text-gray-300  text-xs"> *Tiene hasta el dia 12 para pagar, evite que cancelemos su servico</span></div>@endif
                            <div class="ml-auto  p-1 mr-5">
                            <a href="{{ url('/realizarPago/' . Auth::user()->cliente->id) }}"><button class="bg-blue-500 text-white rounded-[5px] w-32 p-2"  >Pagar</button></a>
                            </div>

                        @endisset
                    


                </div>
            </div>
        @else
            <div class="flex items-center">
                <div class="bg-[#282828] text-white flex-grow  flex items-center">
                    <div class=" @isset($pago->fecha_pagado) bg-[#2999a8] @else bg-[#d3472e] @endisset 
                        text-zinc-100 font-semibold p-5 w-1/12 mr-10 text-center">
                        {{ $this->obtenerMes($pago->fecha_limite) }}</div>
                    <p>Fecha de pago: <span class="text-gray-300 ml-1 text-sm"> @isset($pago->fecha_pagado) {{ $pago->fecha_pagado }} @else N/A @endisset</span></p>
                    
                    <p class="ml-7">Total: <span class="text-gray-100 ml-1 text-base"> ${{$this->calcularTotal($pago)}}</p>
                        @isset($pago->fecha_pagado)
                        <div class="ml-auto p-1 mr-5">
                            <button class="bg-blue-500 text-white rounded-[5px] p-2 mr-2">Facturar</button>
                            <button class="bg-blue-500 text-white rounded-[5px] p-2">Comprobante</button>
                        </div>
                         @else

                         @endisset
                        
                </div>
            </div>
        @endif
    @endwhile




    <div class="flex items-center justify-center ">

        <div class=" bg-white shadow-md rounded-md p-4">
            <div class="flex items-center space-x-4 justify-center w-52 h-20">
                <i class="fab fa-whatsapp text-green-500 text-4xl  "></i>
                <i class="fas fa-phone text-blue-500 text-3xl "></i>
                <i class="fas fa-envelope text-red-500 text-4xl ml-1"></i>
            </div>
        </div>
    </div>


</div>

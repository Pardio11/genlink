<x-app-layout>
    @can('reportes')
        
    
    @if (Auth::user()->cliente->instalacion == null)
        <div class="contrata ">
            <div class="bg-[#f3f3f3] ml-4 mt-9 w-[20vw] h-[70vh] flex flex-col justify-start items-center"
                style="border-radius: 15px;  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">


                <div class="w-[100%]  h-[45%]"
                    style="border-top-right-radius: 15px; border-top-left-radius: 15px;  
        background-image: url('../imagenes/antena.webp');
        background-size: cover;
        background-position: center
        ">

                </div>
                <div class="w-[80%] mt-10 text-[15px] text-black text-center">
                    <p>Solicita tu instalacion hoy, y disfruta del internet de GenLink<br><br>Costo: <span
                            class="text-[13px] text-[#8e8e8e]">$800</span></p>
                </div>
              

                <a href="{{ url('/asignar-instalacion/' . Auth::user()->cliente->id)}}" ><button class="bg-blue-500 text-white p-2 rounded-md mt-5 ">Contrata</button></a>
                <p class="text-[10px] text-[#8e8e8e] mx-10 mt-4 text-center">*Se instalara una antena y router para
                    contectar su hogar</p>
            </div>
        </div>
    @else
        @if (Auth::user()->cliente->instalacion->instalado == false)
            <div class="pendiente ">
                <div class="bg-[#f3f3f3] ml-4 mt-9 w-[20vw] h-[70vh] flex flex-col justify-start items-center"
                    style="border-radius: 15px;  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">


                    <div class="w-[100%]  h-[45%]"
                        style="border-top-right-radius: 15px; border-top-left-radius: 15px;  
    background-image: url('../imagenes/antena.webp');
    background-size: cover;
    background-position: center
    ">
                    </div>
                    <div class="w-[80%] mt-10 text-[15px] text-black text-center">
                        <p>Estamos trabajando para que tenga internet en su casa<br></p>
                    </div>

                    <p class="text-[13px] text-[#8e8e8e] mx-10 mt-4 text-center">*Se instalara una antena y router para
                        contectar su hogar.</p>
                </div>
            </div>
        @else
            @if (Auth::user()->cliente->contrato)
                @if (Auth::user()->cliente->contrato->activo == true)
                    <div class="activo ">
                        <div class="bg-[#f3f3f3] ml-4 mt-9 w-[20vw] h-[70vh] flex flex-col justify-start items-center"
                            style="border-radius: 15px;  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">


                            <div class="w-[100%]  h-[45%]"
                                style="border-top-right-radius: 15px; border-top-left-radius: 15px;  
                background-image: url('../imagenes/1.jpeg');
                background-size: cover;
                background-position: center
            ">

                            </div>
                            <div class="w-[80%] mt-10 text-[15px] text-black">
                                <p>Disfruta tu servicio de internet<br><br>Hasta: <span
                                        class="text-[13px] text-[#8e8e8e]">14/03/2020</span></p>
                            </div>

                            <img src="../imagenes/redes2.png" alt="" class="mt-5">
                            <p class="text-[13px] text-[#8e8e8e]">Activo</p>

                        </div>
                    </div>
                @else
                    <div class="inactivo ">
                        <div class="bg-[#f3f3f3] ml-4 mt-9 w-[20vw] h-[70vh] flex flex-col justify-start items-center"
                            style="border-radius: 15px;  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">


                            <div class="w-[100%]  h-[45%]"
                                style="border-top-right-radius: 15px; border-top-left-radius: 15px;  
   background-image: url('../imagenes/inactivo.webp');
   background-size: cover;
   background-position: center
   ">

                            </div>
                            <div class="w-[80%] mt-10 text-[15px] text-black">
                                <p>Plan vencido<br><br>Fecha de corte: <span
                                        class="text-[13px] text-[#8e8e8e]">14/03/2020</span></p>
                            </div>

                            <img src="../imagenes/inact.png" alt="" class="mt-5">
                            <p class="text-[13px] text-[#8e8e8e]">Inactivo</p>

                        </div>
                    </div>
                @endif
            @endif
        @endif

    @endif

    @endcan









</x-app-layout>
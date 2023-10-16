<div class="flex flex-row">
    
    
    
    
    
    

        <div class="izquierda w-[15%]  items-center pl-5">

            <div class=" left-4 transform  bg-white p-8 rounded-lg shadow-lg sticky top-40  z-30 w-[8vw] ">
                <div class="flex flex-col items-center space-y-4 w-6 text-4xl ">
                    <div>
                        <a href="mailto:correo@example.com" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:transform hover:-translate-y-1 transition-transform">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                    <div>
                        <a href="https://api.whatsapp.com/send?phone=123456789" target="_blank" rel="noopener noreferrer" class="text-green-500 hover:transform hover:-translate-y-1 transition-transform">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    <div>
                        <a href="tel:123456789" class="text-purple-500 hover:transform hover:-translate-y-1 transition-transform">
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="derecha w-[70%] ">
            <div class="bg-white p-4 rounded shadow-md w-1/2 mt-8 mx-auto">
                <h1 class="text-2xl font-bold text-center mb-4">Enviar Reporte <i class="fas fa-file-alt text-blue-500"></i></h1>
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="problema" class="block text-gray-700 text-sm font-bold mb-2">Problema:</label>
                        <select wire:model="asunto" type="text" id="asunto" name="asunto" class="w-full p-2 border rounded">
                            <option value="Sin Conexion">Sin Conexion</option>
                            <option value="Conexion Lent">Conexion Lenta</option>
                            <option value="Conexion Intermitente">Conexion Intermitente</option>
                            <option value="Problema Con Antena">Problema Con Antena</option>
                            <option value="Problemas Con Router">Problemas Con Router</option>
                            <option value="Otros">Otros</option>



                        </select>
                    </div>
        
                    <div class="mb-4">
                        <label for id="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                        <textarea wire:model="descripcion" id="descripcion" name="descripcion" rows="4" class="w-full p-2 border rounded"></textarea>
                    </div>
        
                    <button type="submit"  wire:click.prevent="agregarReporte({{Auth::user()->cliente->user->cliente_id}})" class="bg-blue-500 text-white py-2 px-4 rounded">Enviar</button>
                </form>
            </div>

            <div class="max-w-screen-lg mx-auto my-4">
                <table class="min-w-full bg-white rounded shadow-md mb-12 mx-auto">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-600">#</th>
                            <th class="px-6 py-3 border-b border-gray-600">Asunto</th>
                            <th class="px-6 py-3 border-b border-gray-600">Descripcion</th>
                            <th class="px-6 py-3 border-b border-gray-600">Fecha</th>
                            <th class="px-6 py-3 border-b border-gray-600">Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php($cont=0)
                        @isset (Auth::user()->cliente->reportes)
                        @foreach (Auth::user()->cliente->reportes as $r)

                            @php($cont++)

                            <tr class="border-b border-gray-600 text-center">
                                <td class="px-6 py-4">{{$cont}}</td>
                                <td class="px-6 py-4">{{$r->asunto}}</td>
                                <td class="px-6 py-4">{{$r->descripcion}}</td>
                                <td class="px-6 py-4">{{$r->fecha}}</td>
                                <td>
                                    @if ($r->resuelto)
                                        <i class="fas fa-check text-green-500 px-6 py-4 text-3xl" style="cursor: pointer;"></i>

                                    @else
                                        <i class="fas fa-times text-red-500 px-6 py-4 text-3xl" style="cursor: pointer;"></i>
                                    @endif
                                </td>
                            </tr>                  
                        @endforeach
                        @else
                        <h1>{{Auth::user()->cliente->reportes}}</h1>
                        @endisset

                    
                    </tbody>
                </table>
            </div>
        </div>


        
        
        
   
    
    
</div>

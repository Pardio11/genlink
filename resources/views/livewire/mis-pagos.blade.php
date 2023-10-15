<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-o3q2U7w5JC9eRa6A5h+ypSd1/u3HP7ZGqX5zCCglXp6WtsH+EG5KG5fNje86axtx" crossorigin="anonymous">

<div class="flex flex-col space-y-4 p-4">
    @foreach ( Auth::user()->cliente->pagos as $item)
        {{$item}}
    @endforeach
 
    <h1 class="text-center text-4xl font-bold mb-11">
        <i class="fas fa-wallet text-blue-500"></i> Mis pagos
    </h1>

    <div class="flex items-center">

        <div class="bg-[#282828] text-white flex-grow  flex items-center ">
            <div class="bg-[#00e0ff] text-blue-900 p-5  w-1/12 mr-10 text-center ">SEP</div>

            <p>Fecha de corte: <span class="text-gray-300 ml-3 text-sm">04/04/2023</span></p>
            <div class="ml-auto  p-1 mr-5">
                <button class="bg-blue-500 text-white rounded-[5px] w-32 p-2">Pagar</button>
            </div>
        </div>
    </div>



    
    <div class="flex items-center">

        <div class="bg-[#282828] text-white flex-grow  flex items-center">
            <div class="bg-[#00e0ff] text-blue-900 p-5 w-1/12 mr-10 text-center ">Ago</div>

            <p>Fecha de pago: <span class="text-gray-300 ml-3 text-sm">04/04/2023</span></p>
            <div class="ml-auto p-1 mr-5">
                <button class="bg-blue-500 text-white rounded-[5px] p-2 mr-2">Facturar</button>
                <button class="bg-blue-500 text-white rounded-[5px] p-2">Comprobante</button>
            </div>
        </div>
    </div>
      
    <div class="flex items-center">

        <div class="bg-[#282828] text-white flex-grow  flex items-center">
            <div class="bg-[#00e0ff] text-blue-900 p-5 w-1/12 mr-10 text-center ">Ago</div>

            <p>Fecha de pago: <span class="text-gray-300 ml-3 text-sm">04/04/2023</span></p>
            <div class="ml-auto p-1 mr-5">
                <button class="bg-blue-500 text-white rounded-[5px] p-2 mr-2">Facturar</button>
                <button class="bg-blue-500 text-white rounded-[5px] p-2">Comprobante</button>
            </div>
        </div>
    </div>
        
    <div class="flex items-center">

        <div class="bg-[#282828] text-white flex-grow  flex items-center">
            <div class="bg-[#00e0ff] text-blue-900 p-5 w-1/12 mr-10 text-center ">Ago</div>

            <p>Fecha de pago: <span class="text-gray-300 ml-3 text-sm">04/04/2023</span></p>
            <div class="ml-auto p-1 mr-5">
                <button class="bg-blue-500 text-white rounded-[5px] p-2 mr-2">Facturar</button>
                <button class="bg-blue-500 text-white rounded-[5px] p-2">Comprobante</button>
            </div>
        </div>
    </div>
      
    <div class="flex items-center">

        <div class="bg-[#282828] text-white flex-grow  flex items-center">
            <div class="bg-[#00e0ff] text-blue-900 p-5 w-1/12 mr-10 text-center ">Ago</div>

            <p>Fecha de pago: <span class="text-gray-300 ml-3 text-sm">04/04/2023</span></p>
            <div class="ml-auto p-1 mr-5">
                <button class="bg-blue-500 text-white rounded-[5px] p-2 mr-2">Facturar</button>
                <button class="bg-blue-500 text-white rounded-[5px] p-2">Comprobante</button>
            </div>
        </div>
    </div>
    
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

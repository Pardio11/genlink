<div class=" h-[90vh] bg-black flex flex-col justify-center items-center">
    <div class="container ">
        <div class="logoGen  ">
            <img src="{{ asset('genlinkLogo.png') }}" alt="Logo de GenLink" class="mx-auto w-auto h-36 ">
        </div>
        <h1 class="text-center text-white uppercase text-xl top-0">{{Auth::user()->cobrador->nombre}}</h1>
    </div>

    
    <div class="texto mt-10">

        <div class="w-[100%] text-white text-lg flex flex-col items-start">
            Dinero en caja: <span class="text-[#777]">${{$dineroCaja}}</span>
        </div>
        <div class="w-[100%] text-white text-lg flex flex-col items-start">
            Comisiones generadas: <span class="text-[#777]">${{$comision}}</span>
        </div>
    </div>
    
    

    <div class="w-[50%] flex left-0 mt-4">     
    </div>
    @if(session('error'))
        <div class="alert alert-danger mb-4">
           <span class="text-red-500">Error: {{ session('error') }}</span> 
        </div>
    @endif
    <form action="{{ route('realizarPago') }}" method="post" >
        @csrf
        @method('POST')
        <input type="text" name="numeroCliente" id="numeroCliente" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[30%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar cliente" >
        <div class="container flex row-auto justify-center mt-6">    
            <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Buscar
            </button>
        </div>
    </form>
        
</div>

<div class=" bg-black h-[90vh] ">
    <div class="container bg-black w-full ">
        
        <div class="logoGen pt-10">
            <img src="{{ asset('genlinkLogo.png') }}" alt="Logo de GenLink" class="mx-auto w-auto h-36">
        </div>
        <h1 class="text-center text-white uppercase text-lg">Abarrotes Doña Mari</h1>
    </div>

    <h2 class="text-start text-white uppercase text-base  mb-8 mt-10 ml-16">Mes a pagar: Noviembre</h2>
    
    <table class="min-w-[90%] bg-black rounded shadow-md mb-8 mx-auto text-gray-50 ">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="px-6 py-3 border-b border-gray-600">#</th>
                <th class="px-6 py-3 border-b border-gray-600">Plan</th>
                <th class="px-6 py-3 border-b border-gray-600">Recargo</th>
                <th class="px-6 py-3 border-b border-gray-600">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-600 text-center">
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">Básico</td>
                <td class="px-6 py-4">$50</td>
                <td class="px-6 py-4">$250</td>
            </tr>
        </tbody>
    </table>

    
    <div class="container flex row-auto justify-between">
        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ml-16">
          <option selected>Adelantar meses</option>
          @for ($i = 1; $i <= 12; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
      @endfor
        </select>
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
            <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
              <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
            </svg>
            Pagar
          </button>
    </div>
    
</div>

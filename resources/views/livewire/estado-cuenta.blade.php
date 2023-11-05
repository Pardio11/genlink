<div class="flex flex-row">

    @livewire('nav-admin')

    <div class="p-4 w-[75vw] mx-auto ">
        <div class="flex justify-between items-center  mb-9">
            <div class="calendar w-1/4 p-4 border bg-gray-300 shadow-md">
                <div class="relative mb-4">
                    <select wire:model="selectedYear" class="w-full bg-gray-400 text-white text-2xl font-bold p-2 rounded appearance-none focus:outline-none">
                        @foreach ($years as $year)
                            <option class="bg-white text-gray-800" value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-4 gap-4 pb-4">
                    @for ($month = 1; $month <= 12; $month++)
                        <button class="bg-gray-500 p-2 text-white rounded" wire:click="setSelectedMonth({{ $month }})">{{ $month }}</button>
                    @endfor
                </div>
            </div>
            <div class="data w-3/4 text-center">
                <div class="text-black text-2xl font-bold  p-2 mb-16 rounded">Reporte de Mes: {{$nameMonth}}</div>
                <div class="flex justify-between">
                    <div class="w-1/3">
                        Dinero: <span id="dineroEsperado" class="text-blue-500 font-semibold">${{$this->cajaRecaudado()}}</span>
                    </div>
                    <div class="w-1/3">
                        Dinero en caja: <span id="dineroEnCaja" class="text-green-600 font-semibold">${{$this->cajaCobrado()}}</span>
                    </div>
                    <div class="w-1/3">
                        Dinero pendiente: <span id="dineroPendiente" class="text-red-500">${{$this->cajaPendiente()}}</span>
                    </div>
                </div>
            </div>


        </div>
        <table class="min-w-full bg-white rounded shadow-md mb-16">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 border-b border-gray-600">Punto de venta</th>
                    <th class="px-6 py-3 border-b border-gray-600">Dinero en Caja </th>
                    <th class="px-6 py-3 border-b border-gray-600">Comision</th>
                    <th class="px-6 py-3 border-b border-gray-600">Recaudado</th>
                    <th class="px-6 py-3 border-b border-gray-600"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cajas as $caja)
                    <tr class="border-b border-gray-600 text-center">
                        <td class="px-6 py-4">{{$caja->cobrador->nombre}}</td>
                        <td class="px-6 py-4">${{$this->calcularCaja($caja)}}</td>
                        <td class="px-6 py-4">${{$this->calcularComision($caja)}}</td>
                        <td class="px-6 py-4"><div class="w-8 h-5 rounded-sm mx-auto {{ $caja->recaudado ? 'bg-green-600' : 'bg-red-500' }}"></div></td>
                        <td class="px-6 py-4"><button wire:click="recaudarCaja({{$caja->id}})" class="show-popup-button bg-gray-700 hover:bg-gray-600 text-white font-semibold w-20 h-8 rounded mr-2">Recaudar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

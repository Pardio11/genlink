<div>

    
<div class="bg-gray-800 h-screen w-64 text-white sticky top-0 z-30">
    <div class="p-4">
      
      
        <!-- Crear Cuenta -->
        <a href="{{ route('clientes') }}" :active="request()->routeIs('clientes')" class="flex items-center gap-4 py-5 border-b border-gray-700 ">
            <span class="text-xl">
                <i class="fas fa-user-plus"></i>
            </span>
            Clientes
        </a>

        <!-- Nuevo -->
        <a href="{{ route('agregar-cliente') }}" :active="request()->routeIs('agregar-cliente')" class="flex items-center gap-4 py-5 border-b border-gray-700 ">
            <span class="text-xl">
                <i class="fas fa-plus-circle"></i>
            </span>
            Nuevo
        </a>

        
        <!-- Reportes -->
        <a href="{{ route('reportes-admin') }}" :active="request()->routeIs('reportes-admin')" class="flex items-center gap-4 py-5 border-b border-gray-700 ">
            <span class="text-xl">
                <i class="fas fa-line-chart"></i>
            </span>
            Reportes
        </a>

        <!-- Pendientes -->
        <a href="{{ route('pendientes') }}" :active="request()->routeIs('pendientes')" class="flex items-center gap-4 py-5 border-b border-gray-700  ">
            <span class="text-xl">
                <i class="fas fa-clock"></i>
            </span>
            Pendientes
        </a>

        <!-- Pagos Atrasados -->
        <a href="{{ route('pagos-atrasados') }}" :active="request()->routeIs('pagos-atrasados')"class="flex items-center gap-4 py-5 border-b  border-gray-700 ">
            <span class="text-xl">
                <i class="fas fa-exclamation-circle"></i>
            </span>
            Pagos Atrasados
        </a>

        <!-- Servicios Cortados -->
        <a href="{{ route('cortados') }}" :active="request()->routeIs('cortados')" class="flex items-center gap-4 py-4 border-b border-gray-700 ">
            <span class="text-xl">
                <i class="fas fa-cut"></i>
            </span>
            Servicios Cortados
        </a>

        <!-- Estado de Cuenta -->
        <a href="{{ route('estado-cuenta') }}" :active="request()->routeIs('estado-cuenta')" class="flex items-center gap-4 py-5 border-b border-gray-700 ">
            <span class="text-xl">
                <i class="fas fa-file-invoice-dollar"></i>
            </span>
            Estado de Cuenta
        </a>

        <!-- Servicio Cancelado -->
        <a href="{{ route('cancelados') }}" :active="request()->routeIs('cancelados')" class="flex items-center gap-4 py-5 border-b border-gray-700 ">
            <span class="text-xl">
                <i class="fas fa-ban"></i>
            </span>
            Servicio Cancelado
        </a>
    </div>
    <!-- Agregar elementos adicionales aquí si es necesario -->
</div>


</div>

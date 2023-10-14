<div class="relative">
    <div class="fixed top-1/2 left-4 transform -translate-y-1/2 bg-white p-8 rounded-lg shadow-lg">
        <div class="flex flex-col items-center space-y-4 w-6 text-4xl">
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
    
    
    <div class="flex flex-col items-center my-4">
        <div class="bg-white p-4 rounded shadow-md w-1/3 mt-8">
            <h1 class="text-2xl font-bold text-center mb-4">Enviar Reporte <i class="fas fa-file-alt text-blue-500"></i></h1>
            <form action="tu_script_de_procesamiento.php" method="post">
                <div class="mb-4">
                    <label for="problema" class="block text-gray-700 text-sm font-bold mb-2">Problema:</label>
                    <select id="problema" name="problema" class="w-full p-2 border rounded">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for id="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="w-full p-2 border rounded"></textarea>
                </div>
    
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Enviar</button>
            </form>
        </div>
    </div>
    
    <div class="max-w-screen-md mx-auto my-4">
        <table class="min-w-full bg-white rounded shadow-md mb-12 mx-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 border-b border-gray-600">#</th>
                    <th class="px-6 py-3 border-b border-gray-600">Asunto</th>
                    <th class="px-6 py-3 border-b border-gray-600">Fecha</th>
                    <th class="px-6 py-3 border-b border-gray-600">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-600 text-center">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Ejemplo 1</td>
                    <td class="px-6 py-4">2023-12-31</td>
                    <td>
                        <i class="fas fa-check text-green-500 px-6 py-4 text-3xl" style="cursor: pointer;"></i>
                    </td>
                </tr>
                <tr class="border-b border-gray-600 text-center">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4">Ejemplo 1</td>
                    <td class="px-6 py-4">2023-12-31</td>
                    <td>
                        <i class="fas fa-times text-red-500 px-6 py-4 text-3xl" style="cursor: pointer;"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

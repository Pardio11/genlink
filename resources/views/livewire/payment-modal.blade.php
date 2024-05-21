<div>
    <!-- Modal -->
    @if ($showModal)
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex justify-center items-center">
        <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="flex justify-center items-center mb-4">
                    <i class="fas fa-exclamation-circle text-yellow-500 text-3xl mr-2"></i>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Confirmar Pago</h3>
                </div>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        ¿Estás seguro de realizar el pago para <span class="font-bold">Tadeo</span>
                        del mes de <span class="font-bold">{{ $selectedMonth }}</span>
                        por un monto total de <span class="font-bold">${{ $paymentAmount }}</span>?
                    </p>
                </div>
                <div class="flex justify-center items-center px-4 py-3 space-x-2">
                    <button wire:click="confirmPayment" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Confirmar Pago
                    </button>
                    <button wire:click="closeModal"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                        <i class="fas fa-times mr-2"></i> Cerrar
                    </button>
              
                </div>
            </div>
        </div>
    </div>
    @endif
          <!-- Modal de descarga de recibo -->
          @if ($showModal2)
          <div
              class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex justify-center items-center">
              <div class="relative p-5 border w-96 shadow-lg rounded-md bg-white">
                  <div class="mt-3 text-center">
                      <div class="flex justify-center items-center mb-4">
                          <i class="fas fa-exclamation-circle text-yellow-500 text-3xl mr-2"></i>
                          <h3 class="text-lg leading-6 font-medium text-gray-900">Descargar Recibo</h3>
                      </div>
                      <div class="mt-2 px-7 py-3">
                          <!-- Aquí puedes mostrar los detalles del pago -->
                      </div>
                      <div class="flex justify-center items-center px-4 py-3 space-x-2">
                          <!-- Botón para descargar el recibo -->
                          <button wire:click="downloadReceipt"
                              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                              <i class="fas fa-download mr-2"></i> Descargar Recibo
                          </button>
                          <!-- Botón para cerrar el modal -->
                          <button wire:click="closeModal"
                              class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                              <i class="fas fa-times mr-2"></i> Cerrar
                          </button>
                      </div>
                  </div>
              </div>
          </div>
          @endif
</div>
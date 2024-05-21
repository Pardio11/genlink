<?php

namespace App\Livewire;
use Dompdf\Dompdf;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
class PaymentModal extends Component
{

    public $showModal = false;
    public $showModal2 = false;

    public $isOpen = false;
    public $selectedMonth;
    public $paymentAmount="250";
    public $client;



    public function mount()
    {
        $this->listeners[] = 'openModal';
    }
    
    protected $listeners = ['openModal'];

    public function openModal($month)
    {
        $this->selectedMonth = $month;
        $this->showModal = true;
    }
    
    public function closeModal()
    {
        $this->showModal = false;
    }
    public function downloadReceipt()
    {
        // Renderizar el HTML desde la vista Blade
        $html = view('livewire.payment-receipt', [
            'selectedMonth' => $this->selectedMonth,
            'paymentAmount' => $this->paymentAmount,
        ])->render();
    
        // Crear una nueva instancia de Dompdf
        $dompdf = new Dompdf();
    
        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
    
        // Renderizar el PDF
        $dompdf->render();
    
        // Obtener el contenido del PDF como una cadena
        $pdfContent = $dompdf->output();
    
        // Descargar el PDF
        return response()->streamDownload(function () use ($pdfContent) {
            echo $pdfContent;
        }, 'documento.pdf');
    }

    public function confirmPayment(){
        $this->showModal = false;

        // Abre el segundo modal para descargar el recibo
        $this->showModal2 = true;    }

    public function render()
    {
        return view('livewire.payment-modal');
    }
}

<?php

namespace App\Livewire;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ConfirmPayment extends Component
{
    public function render()
    {
        return view('livewire.confirm-payment');
    }
    


    public function sendReceipt()
    {
        // Lógica para enviar el recibo por correo electrónico
        session()->flash('message', 'Enviando recibo por correo electrónico...');
        $this->closeModal();
    }
}

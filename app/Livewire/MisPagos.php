<?php

namespace App\Livewire;

use Carbon\Carbon;
use Facturapi\Facturapi;
use Livewire\Attributes\Layout;
use Livewire\Component;
use TCPDF;

#[Layout('layouts.app')]

class MisPagos extends Component
{



  public function generarFactura($plan, $cliente)
{

    // Convertir a flotante si son cadenas
    if($plan['recargo']!=null)
        $cobro = (int)$plan['tipo_servicio']['costo'] + (int)$plan['recargo']['monto'];
    else
        $cobro = (int)$plan['tipo_servicio']['costo'];
    $facturapi = new Facturapi(env('FACTURAPI_KEY'));
    $invoice = $facturapi->Invoices->create([
        "customer" => [
            "legal_name" => $cliente['name'],
            "email" => $cliente['email'],
            "tax_id" => "XAXX010101000",
            "tax_system" => "601",
            "address" => [
                "zip" => "85900",
            ]
        ],
        "items" => [
            [
                "quantity" => 1,
                "product" => [
                    "description" => $plan['tipo_servicio']['tipo'],
                    "product_key" => "60131324", 
                    "price" => $cobro,
                    "taxes" => [
                        [
                            "type" => "IVA",
                            "rate" => 0.16,
                        ]
                    ]
                ]
            ],
        ],
        "payment_form" => "28"
    ]);

    $zipStream = $facturapi->Invoices->download_zip($invoice->id);

    $tempPath = tempnam(sys_get_temp_dir(), 'factura') . '.zip';

    file_put_contents($tempPath, $zipStream);

    return response()->download($tempPath, "factura-{$invoice->id}.zip")->deleteFileAfterSend(true);
}

function generarComprobantePago($plan,$cliente) {
    if($plan['recargo']!=null)
        $cobro = (int)$plan['tipo_servicio']['costo'] + (int)$plan['recargo']['monto'];
    else
        $cobro = (int)$plan['tipo_servicio']['costo'];

    $pdf = new TCPDF();

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('GenLink');
    $pdf->SetTitle('Comprobante de Pago');
    $pdf->SetSubject('Comprobante de Pago para el Cliente');

    $pdf->AddPage();
    $date = $plan['fecha_pagado'];
    $clientName = $cliente['name'];
    $serviceType = $plan['tipo_servicio']['tipo'];
    $cost = number_format($plan['tipo_servicio']['costo'], 2);
    $clientAdreess = $cliente['cliente']['direccion'];
    $clientNumber = $cliente['cliente']['telefono'];

    
$html = <<<EOD
<style>
    body { font-family: Arial, sans-serif; }
    .receipt-container { background-color: #FFF; padding: 20px; }
    .header { text-align: center; color: #000; margin-bottom: 50px; }
    .header h1 { margin: 0; }
    .logo { text-align: left; }
    .logo img { width: 100px; /* Ajusta el tamaño de tu logo */ }
    .company-info { text-align: right; }
    .company-info p { margin: 0; }
    .meta-info { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
    .meta-info th, .meta-info td { text-align: left; padding: 5px; border: 1px solid #000; }
    .meta-info th { background-color: #EEE; }
    .content-table { border-collapse: collapse; width: 100%; }
    .content-table th, .content-table td { text-align: left; padding: 10px; border: 1px solid #000; }
    .content-table th { background-color: #EEE; }
    .footer { text-align: center; margin-top: 30px; }
    .footer p { margin: 0; }
</style>

<div class="receipt-container">
    <div class="header">
        <div class="logo">
            <img src="{{asset('genlinkLogo.png')}}" alt="LOGOTIPO"/>
        </div>
        <h1>RECIBO DE CAJA</h1>
        <div class="company-info">
            <p>Número de Recibo: 123</p>
            <p>Fecha de emisión: $date</p>
        </div>
    </div>
    <table class="meta-info">
        <tr>
            <th>Pagado a: GenLink</th>
            <td>Nombre del cliente: $clientName</td>
        </tr>
        <tr>
            <th>Nombre de la compañía: GenLink</th>
            <td>Dirección: $clientAdreess</td>
        </tr>
        <tr>
            <th>Teléfono: 4381092793</th>
            <td>$clientNumber </td>
        </tr>

        </table>
    <table class="content-table">
        <thead>
            <tr>
                <th>Tipo de servicio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Añade filas de artículos aquí -->
            <tr>
                <td>Descripción del artículo</td>
                <td>$serviceType</td>
                <td>"$ $cobro</td>
            </tr>
            <!-- Repite para más artículos -->
        </tbody>
    </table>
    <div class="footer">
        <p>Recibido por</p>
        <p>_____________________________</p>
        <p>Firma</p>
    </div>
</div>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

    

   // Guardar el PDF en una ubicación temporal en el servidor
   $nombreArchivo = 'comprobante_pago_' . date('YmdHis') . '.pdf';
   $pdf->Output(public_path($nombreArchivo), 'F'); // Cambiar 'I' a 'F' para guardar en el servidor

   // Retornar una respuesta de descarga al archivo guardado
   return response()->download(public_path($nombreArchivo))->deleteFileAfterSend(true);
}


// Datos de ejemplo para el comprobante de pago}

        public function descargarFacturaZip($invoiceId)
    {
     
        $facturapi = new Facturapi(env('FACTURAPI_KEY'));
      
  
        try {
            // Obtén el stream del archivo ZIP
            $zipStream = $facturapi->Invoices->download_zip($invoiceId);
            
            // Define el nombre del archivo que el usuario descargará
            $fileName = "factura-{$invoiceId}.zip";

            // Prepara la respuesta con el archivo ZIP
            return response()->streamDownload(function() use ($zipStream) {
                echo stream_get_contents($zipStream);
            }, $fileName);

        } catch (\Exception $e) {
            // Maneja la excepción como creas conveniente
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function compararFecha($fechaLimite)
    {
        $fechaActual = now();
        $fechaLimite = Carbon::createFromFormat('Y-m-d', $fechaLimite);

        if ($fechaActual->format('Y-m') > $fechaLimite->format('Y-m')) {
            return false;
        } else {
            return true;
        }
    }
    public function pasoCorte($fechaLimite)
    {
        $fechaActual = now();
        if ($fechaActual->gt($fechaLimite)) {
            return false;
        } else {
            return true;
        }
    }

    function obtenerMes($fecha)
    {
        $mes = date('M', strtotime($fecha));
        return $mes;
    }
    function calcularTotal($pago)
    {
        $total = 0;
        if ($pago->tipoServicio)
            $total += $pago->tipoServicio->costo;
        if ($pago->recargo)
            $total += $pago->recargo->monto;
        return $total;
    }
    public function render()
    {
        return view('livewire.mis-pagos');
    }
}

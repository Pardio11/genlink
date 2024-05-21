<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .details {
            margin-top: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Recibo de Pago</h1>
        <div class="details">
            <p><strong>Número de Contrato:</strong> {{ $contractNumber }}</p>
            <p><strong>Nombre:</strong> {{ $customerName }}</p>
            <p><strong>Fecha de Pago:</strong> {{ $paymentDate }}</p>
            <p><strong>Monto de Pago:</strong> ${{ $paymentAmount }}</p>
            <p><strong>Meses Pagados:</strong> {{ $paidMonths }}</p>
        </div>
        <div class="total">
            <p><strong>Total:</strong> ${{ $totalAmount }}</p>
        </div>
    </div>
</body>
</html>

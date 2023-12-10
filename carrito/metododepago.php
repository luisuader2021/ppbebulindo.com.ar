<?php include '../includes/head.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iKu1r2o2Q82ZleFzFGeCZsZxu73R8LAMlOqU" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;

            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e1eae2;
        }

        .formadepago {
            background-color: #E9FCD6;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 300px;
            width: 100%;
        }

        .metodopago {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .metodopago i {
            margin-right: 10px;
            font-size: 24px;
        }

        .titulopago {
            font-size: 18px;
        }

        .metodopago:last-child {
            border-bottom: none;
        }

        .metodopago:first-child {
        border-top: 1px solid #ccc; 
}
        h2 {
            text-align: center;
            margin: 20px 0;
            padding-top: 20px;
            padding-bottom: 10px;


        }
    </style>
</head>
<body>



<div class="formadepago">
    <h2>Métodos de Pago</h2>
    <div class="metodopago">
        <i class="fas fa-credit-card"></i>
        <div>
        <div class="titulopago">
            <p>Mercado Pago</p> </div>
            <a href="https://link.mercadopago.com.ar/bebulindo">Pagar con MercadoPago</a>
        </div>
    </div>
    <div class="metodopago">
        <i class="fas fa-university"></i>
        <div>  
            <div class="titulopago">
            <p>Transferencia Bancaria</p> </div>
            <p>Luis Antonio Vaccarezza</p>
            <p> CVU: 0000003100047651338690</p>
            <p> Alias: ElBebulindo.mp</p>
            <p>  CUIT/CUIL: 20287965045</p>
            <p> Mercado Pago</p>
        </div>
    </div>
    <div class="metodopago">
        <i class="fas fa-money-bill"></i>
        <div>
        <div class="titulopago">
            <p>Pago en Efectivo</p> </div>
            
        </div>
    </div>
</div>

</body>
</html>


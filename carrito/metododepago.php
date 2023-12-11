<?php include '../includes/head.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pago</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-GLhlTQ8iKu1r2o2Q82ZleFzFGeCZsZxu73R8LAMlOqU" crossorigin="anonymous">


    <style>
    body {
        font-family: 'Arial', sans-serif;
        font-size: 14px;


        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #e1eae2;
        align-items: flex-start
    }

    .formadepago {
        margin-top: 143px;
        background-color: #E9FCD6;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 400px;
        width: 100%;
    }

    .metodopago {
        display: flex;

        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .metodopago i {

        font-size: 24px;
        vertical-align: top;
        margin: 19px 10px 0 0;
        cursor: pointer;

    }

    .titulopago {
        font-size: 20px;
    }



    .metodopago {
        border-top: 1px solid #ccc8;
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



    <?php
// lectura del monto total a pagar
if (isset($_GET['monto'])) {
    // Lee el valor 
    $monto = $_GET['monto'];
    
    // Formatea el monto con el mismo formato que en JavaScript
    $montoArg = '' . number_format($monto, 2, ',', '.');

   }
?>


    <div class="formadepago">
        <h3 class="monto">Total a pagar: $
            <?echo $montoArg;?>
        </h3>
        <h2>Métodos de Pago</h2>
        <div class="metodopago">
            <i class="fas fa-credit-card"></i>
            <div>
                <div class="titulopago">
                    <p>Mercado Pago</p>
                </div>
                <a href="https://link.mercadopago.com.ar/bebulindo">Pagar con Link de MercadoPago</a>
            </div>
        </div>
        <div class="metodopago">
            <i class="fas fa-university"></i>
            <div>
                <div class="titulopago">
                    <p>Transferencia Bancaria</p>
                </div>
                <p>VACCAREZZA, LUIS ANTONIO - 20287965045</p>
                <p>GODOY, MARIA DEL CARMEN - 27294474825</p>
                <p>Nº de Cuenta: CA $ 001001544064</p>
                <p>CBU: 3860001003000015440645</p>
                <p>Alias: bebulindo.parana</p>
                <p>Banco Entre Rios</p>
            </div>
        </div>
        <div class="metodopago">
            <i class="fas fa-money-bill"></i>
            <div>
                <div class="titulopago">
                    <p>Efectivo</p>
                </div>
                <a
                    href="https://api.whatsapp.com/send?phone=5493436209824&text=Solicito%20pagar%20en%20efectivo%20la%20compra%20realizada.">Abonar
                    en Efectivo</a>
            </div>
        </div>

    </div>
    </div>
    </div>

</body>

</html>
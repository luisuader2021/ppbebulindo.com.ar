<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Función para calcular la cantidad total de artículos en el carrito
function calcularCantidadArticulos() {
    return count($_SESSION['carrito']);
}

// Función para calcular el monto total en el carrito
function calcularMontoTotal() {
    $montoTotal = 0;
    foreach ($_SESSION['carrito'] as $producto) {
        $montoTotal += $producto['precio'];
    }
    return $montoTotal;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Carrito</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .producto {
            margin-bottom: 20px;
        }
        #vaciar-carrito {
            margin-top: 20px;
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>Detalle del Carrito</h1>

    <?php
    // Mostrar el contenido del carrito
    if (!empty($_SESSION['carrito'])) {
        echo '<ul>';
        foreach ($_SESSION['carrito'] as $productoCarrito) {
            echo '<li>' . $productoCarrito['nombre'] . ' - $' . $productoCarrito['precio'] . ' - <a href="quitar_del_carrito.php?id=' . $productoCarrito['id'] . '">Quitar</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>El carrito está vacío</p>';
    }
    ?>

    <div id="vaciar-carrito" onclick="vaciarCarrito()">Vaciar Carrito</div>

    <script>
        function vaciarCarrito() {
            if (confirm('¿Estás seguro de que quieres vaciar el carrito?')) {
                window.location.href = 'vaciar_carrito.php';
            }
        }
    </script>

    <a href="index.php">Volver a la lista de productos</a>

</body>
</html>

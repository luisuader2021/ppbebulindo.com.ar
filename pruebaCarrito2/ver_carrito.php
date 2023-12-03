<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Carrito</title>
</head>
<body>
    <h2>Resumen del Carrito</h2>

    <?php
    session_start();

    // Verificar si hay datos en la sesión del carrito
    if (isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];

        // Mostrar detalles de cada elemento en el carrito
        foreach ($carrito as $item) {
            echo '<div>';
            echo '<p>ID: ' . $item['id'] . '</p>';
            echo '<p>Nombre: ' . $item['nombre'] . '</p>';
            echo '<p>Precio: $' . $item['monto'] . '</p>';
            echo '</div>';
        }

        // Mostrar el total del carrito
        $totalCarrito = array_sum(array_column($carrito, 'monto'));
        echo '<p>Total del Carrito: $' . number_format($totalCarrito, 2) . '</p>';
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>

    <p><a href="index.php">Volver a la Tienda</a></p>
</body>
</html>

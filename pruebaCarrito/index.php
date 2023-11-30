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
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }
        .producto {
            margin-bottom: 20px;
        }
        #carrito-info {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: #fff;
            color: #000;
            border-radius: 8px;
            padding: 10px;
            text-decoration: none;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <h1>Lista de Productos</h1>

    <?php
    // Mostrar lista de productos
    $productos = array(
    array('id' => 1, 'nombre' => 'Camiseta estampada', 'precio' => 12.99),
    array('id' => 2, 'nombre' => 'Vestido de princesa', 'precio' => 24.99),
    array('id' => 3, 'nombre' => 'Pantalones cortos de mezclilla', 'precio' => 18.99),
    array('id' => 4, 'nombre' => 'Conjunto de sudadera y pantalones', 'precio' => 29.99),
    array('id' => 5, 'nombre' => 'Camiseta de superhéroe', 'precio' => 15.99),
    array('id' => 6, 'nombre' => 'Falda de tutú', 'precio' => 20.99),
    array('id' => 7, 'nombre' => 'Chaqueta acolchada', 'precio' => 34.99),
    array('id' => 8, 'nombre' => 'Pijama de animales', 'precio' => 22.99),
    array('id' => 9, 'nombre' => 'Zapatillas deportivas', 'precio' => 26.99),
    array('id' => 10, 'nombre' => 'Gorro de lana', 'precio' => 8.99),
    array('id' => 11, 'nombre' => 'Vestido de lunares', 'precio' => 27.99),
    array('id' => 12, 'nombre' => 'Pantalones de chándal', 'precio' => 17.99),
    array('id' => 13, 'nombre' => 'Sudadera con capucha', 'precio' => 21.99),
    array('id' => 14, 'nombre' => 'Calcetines divertidos', 'precio' => 5.99),
    array('id' => 15, 'nombre' => 'Gafas de sol para niños', 'precio' => 9.99)
);

    foreach ($productos as $producto) {
        echo '<div class="producto">';
        echo '<h2>' . $producto['nombre'] . '</h2>';
        echo '<p>Precio: $' . $producto['precio'] . '</p>';

        // Verificar si el producto está en el carrito
        $enCarrito = in_array($producto['id'], array_column($_SESSION['carrito'], 'id'));

        // Mostrar el enlace adecuado (Agregar/Agregado) y el enlace para quitar
        if (!$enCarrito) {
            echo '<a href="agregar_al_carrito.php?id=' . $producto['id'] . '&nombre=' . urlencode($producto['nombre']) . '&precio=' . $producto['precio'] . '">Agregar al Carrito</a>';
        } else {
            echo '<p>Agregado al Carrito - <a href="quitar.php?id=' . $producto['id'] . '">Quitar</a></p>';
        }

        echo '</div>';
    }
    ?>

    <a id="carrito-info" href="mostrar_carrito.php" title="Ver Carrito">
        <?php
        $cantidadArticulos = calcularCantidadArticulos();
        $montoTotal = number_format(calcularMontoTotal(), 2);
        echo $cantidadArticulos > 0 ? "Productos: $cantidadArticulos<br>Monto: $$montoTotal" : 'Carrito Vacío';
        ?>
    </a>

</body>
</html>

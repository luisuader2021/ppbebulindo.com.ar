<?php
    session_start();

    // Inicializar el carrito en la sesión si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Construir un array con el estado de cada producto en el carrito
    $estadoCarrito = [];

    // Obtener todos los productos disponibles en la página
    $productos = [
        ['id' => 1, 'nombre' => 'Producto A', 'precio' => 25.99],
        ['id' => 2, 'nombre' => 'Producto B', 'precio' => 19.99],
        // Agrega más productos según sea necesario
    ];

    foreach ($productos as $producto) {
        $id = $producto['id'];
        $enCarrito = false;

        // Verificar si el producto está en el carrito
        foreach ($_SESSION['carrito'] as $carritoProducto) {
            if ($carritoProducto['id'] == $id) {
                $enCarrito = true;
                break;
            }
        }

        $estadoCarrito[] = [
            'id' => $id,
            'enCarrito' => $enCarrito
        ];
    }

    // Responder con el estado del carrito en formato JSON
    echo json_encode($estadoCarrito);
?>

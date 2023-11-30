<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Verificar si se proporciona un ID de producto válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productoId = $_GET['id'];
    $productoNombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $productoPrecio = isset($_GET['precio']) ? $_GET['precio'] : 0;

    // Verificar si el producto ya está en el carrito
    $productoExistente = array_filter($_SESSION['carrito'], function ($p) use ($productoId) {
        return $p['id'] == $productoId;
    });

    // Agregar el producto al carrito solo si no está presente
    if (empty($productoExistente)) {
        $producto = array(
            'id' => $productoId,
            'nombre' => $productoNombre,
            'precio' => $productoPrecio,
        );

        $_SESSION['carrito'][] = $producto;
    }
}

// Redireccionar de nuevo a la página principal
header('Location: index.php');
exit();
?>

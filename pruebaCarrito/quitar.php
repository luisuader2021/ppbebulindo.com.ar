<?php
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productoId = $_GET['id'];

    // Filtrar el carrito y mantener solo los productos que no coinciden con el ID a quitar
    $_SESSION['carrito'] = array_filter($_SESSION['carrito'], function ($p) use ($productoId) {
        return $p['id'] != $productoId;
    });
}

// Redireccionar de nuevo a la página del carrito
header('Location: index.php');
exit();
?>

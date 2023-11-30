<?php
session_start();

// Vaciar el carrito
$_SESSION['carrito'] = array();

// Redireccionar de nuevo a la página del carrito
header('Location: mostrar_carrito.php');
exit();
?>

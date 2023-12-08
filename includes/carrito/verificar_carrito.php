<?php
    session_start();

    // Inicializar el carrito en la sesión si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = ['',];
    }


    
    // Responder con el estado del carrito en formato JSON
    //echo json_encode($_SESSION['carrito']);
    echo json_encode(array_values($_SESSION['carrito']));
?>

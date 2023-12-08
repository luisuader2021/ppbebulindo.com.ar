<?php
   
    session_start();

    // Inicializar el carrito en la sesión si no existe
   if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

    // Función para agregar un artículo al carrito
    function agregarAlCarrito($id, $nombre, $monto) {
        $_SESSION['carrito'][] = ['id' => $id, 'nombre' => $nombre, 'monto' => $monto];
    }

    // Función para quitar un artículo del carrito
    function quitarDelCarrito($id) {
        foreach ($_SESSION['carrito'] as $key => $producto) {
            if ($producto['id'] == $id) {
                unset($_SESSION['carrito'][$key]);
                break;
            }
        }
    }




    // Verificar si se envió una solicitud AJAX
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
        // Verificar si la acción es agregar al carrito
        if ($_POST['accion'] === 'agregarAlCarrito') {
            $productoId = $_POST['productoId'];
            $productoNombre = $_POST['productoNombre'];
            $productoPrecio = $_POST['productoPrecio'];

            agregarAlCarrito($productoId, $productoNombre, $productoPrecio);
            echo json_encode(['mensaje' => 'Producto agregado al carrito']);
            exit;
        }
        // Verificar si la acción es quitar del carrito
        elseif ($_POST['accion'] === 'quitarDelCarrito') {
            $productoId = $_POST['productoId'];
            quitarDelCarrito($productoId);
            // Responder con un mensaje de éxito
            echo json_encode(['mensaje' => 'Producto quitado del carrito']);
            exit;
        }
    }

?>
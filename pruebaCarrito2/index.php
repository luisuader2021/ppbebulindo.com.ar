<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Tienda</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .mensaje-agregado {
            color: green;
        }
    </style>
</head>
<body>
    <h2>Tienda</h2>
<!--
    <?php
    session_start();

    // Inicializar el carrito en la sesión si no existe
    if (!isset($_SESSION['carrito'])) {
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

            // Responder con un mensaje de éxito
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
-->
    <!-- Producto 1 -->
    <div id="producto1">
        <h3>Producto A</h3>
        <p>Precio: $25.99</p>
        <button onclick="agregarAlCarrito(1, 'Producto A', 25.99)">Agregar al carrito</button>
        <button onclick="quitarDelCarrito(1)">Quitar del carrito</button>
        <div class="mensaje-agregado" style="display:none;">Producto agregado al carrito</div>
    </div>

    <!-- Producto 2 -->
    <div id="producto2">
        <h3>Producto B</h3>
        <p>Precio: $19.99</p>
        <button onclick="agregarAlCarrito(2, 'Producto B', 19.99)">Agregar al carrito</button>
        <button onclick="quitarDelCarrito(2)">Quitar del carrito</button>
        <div class="mensaje-agregado" style="display:none;">Producto agregado al carrito</div>
    </div>

    <p><a href="ver_carrito.php">Ver Carrito</a></p>

    <script>
        function agregarAlCarrito(id, nombre, monto) {
            // Realizar una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'modificar_carrito.php',
                data: {
                    accion: 'agregarAlCarrito',
                    productoId: id,
                    productoNombre: nombre,
                    productoPrecio: monto
                },
                success: function(response) {
                    // Mostrar mensaje de éxito
                    var mensaje = $('#producto' + id + ' .mensaje-agregado');
                    mensaje.show();
                    setTimeout(function() {
                        mensaje.hide();
                    }, 3000);  // Ocultar el mensaje después de 3 segundos
                },
                error: function(error) {
                    console.error('Error al agregar al carrito:', error);
                }
            });
        }

        function quitarDelCarrito(id) {
            // Realizar una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'modificar_carrito.php',
                data: {
                    accion: 'quitarDelCarrito',
                    productoId: id
                },
                success: function(response) {
                    // Mostrar mensaje de éxito
                    var mensaje = $('#producto' + id + ' .mensaje-agregado');
                    mensaje.text('Producto quitado del carrito');
                    mensaje.css('color', 'red');
                    mensaje.show();
                    setTimeout(function() {
                        mensaje.hide();
                    }, 3000);  // Ocultar el mensaje después de 3 segundos
                },
                error: function(error) {
                    console.error('Error al quitar del carrito:', error);
                }
            });
        }
    </script>
</body>
</html>

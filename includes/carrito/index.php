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
    <p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>lineas para probar que la página no recargó</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p><p>linea</p>
    <h2>Tienda</h2>

    <!-- Producto 1 -->
    <div id="producto1">
        <h3>Producto A</h3>
        <p>Precio: $25.99</p>
        <button onclick="agregarAlCarrito(1, 'Producto A', 25.99)">Agregar al carrito</button>
        <button style="display:none;" onclick="quitarDelCarrito(1)">Quitar del carrito</button>
        <div class="mensaje-agregado"style="display:none">Producto agregado al carrito</div>
    </div>

    <!-- Producto 2 -->
    <div id="producto2">
        <h3>Producto B</h3>
        <p>Precio: $19.99</p>
        <button onclick="agregarAlCarrito(2, 'Producto B', 19.99)">Agregar al carrito</button>
        <button style="display:none;" onclick="quitarDelCarrito(2)">Quitar del carrito</button>
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
                    actualizarBotonesCarrito();
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
                    actualizarBotonesCarrito();
                },
                error: function(error) {
                    console.error('Error al quitar del carrito:', error);
                }
            });
        }



 
        // Función para actualizar el estado de los botones
         function actualizarBotonesCarrito() {
            // Realizar una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'verificar_carrito.php',
                dataType: 'json',
                success: function(response) {
                     console.log(response);
                    // Actualizar los botones en función del estado del carrito
                    response.forEach(function(producto) {
                        var id = producto.id;
                        var botonAgregar = $('#producto' + id + ' button:first-of-type');
                        var botonQuitar = $('#producto' + id + ' button:last-of-type');

                        if (producto.enCarrito) {
                            // El producto está en el carrito
                            botonAgregar.hide();
                            botonQuitar.show();
                        } else {
                            // El producto no está en el carrito
                            botonAgregar.show();
                            botonQuitar.hide();
                        }
                    });

                    // Calcular la cantidad de productos y la suma total
                    var cantidadProductos = response.filter(function(producto) {
                        return producto.enCarrito;
                    }).length;

                    var sumaTotal = response.reduce(function(total, producto) {
                        return total + (producto.enCarrito ? producto.precio : 0);
                    }, 0);

                    // Actualizar la burbuja con la información
                    $('#info-carrito').text('Productos: ' + cantidadProductos + ' | Total: $' + sumaTotal.toFixed(2));
                },
                error: function(error) {
                    console.error('Error al actualizar botones del carrito:', error);
                }
            });
        }
$(document).ready(function() {
        // Llamar a la función al cargar la página para actualizar los botones
        actualizarBotonesCarrito();
    });


    </script>
    <div id="carrito-info" style="position: fixed; bottom: 10px; right: 10px; background-color: #007bff; color: #fff; padding: 10px; border-radius: 5px;">
    <span id="info-carrito">Productos: 0 | Total: $0.00</span>
</div>
</body>
</html>

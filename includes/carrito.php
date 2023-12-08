
<script>
 function agregarAlCarrito(id, nombre, monto) {
            // Realizar una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: '../../tienda/includes/carrito/modificar_carrito.php',
                data: {
                    accion: 'agregarAlCarrito',
                    productoId: id,
                    productoNombre: nombre,
                    productoPrecio: monto
                },
                success: function(response) {
                    actualizarBotonesCarrito(id);
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
                url: '../../tienda/includes/carrito/modificar_carrito.php',
                data: {
                    accion: 'quitarDelCarrito',
                    productoId: id
                },
                success: function(response) {
                    actualizarBotonesCarrito(id);
                },
                error: function(error) {
                    console.error('Error al quitar del carrito:', error);
                }
            });
        }



 
        // Función para actualizar el estado de los botones
         function actualizarBotonesCarrito(produc='0') {
            // Realizar una solicitud AJAX al servidor
            //$('.prod .agrega, .prod .quita').hide();
            if(produc!='0'){
              $('.prod.'+produc+' .agrega, .prod.'+produc+' .quita').hide();
              $('.prod.'+produc+' .espera').show();
            }
            $.ajax({
                type: 'POST',
                url: '../../tienda/includes/carrito/verificar_carrito.php',
                dataType: 'json',
                success: function(response) {    
                      console.dir(response);                
                     $('.prod').each(function() {
                      var idProducto = $(this).attr('class').split(' ')[0]; // Obtener el ID del producto del nombre de la clase
                      var botonAgrega = $(this).find('.agrega');
                      var botonQuita = $(this).find('.quita');

                      // Verificar si el producto está en el carrito
                      var estaEnCarrito = response.some(function(producto) {
                        return producto.id === idProducto;
                      });

                      // Mostrar el botón correspondiente
                      if (estaEnCarrito) {
                        botonAgrega.hide(); // Ocultar botón de agregar
                        botonQuita.show(); // Mostrar botón de quitar
                      } else {
                        botonAgrega.show();
                        botonQuita.hide();
                      }
                    
                    });

                    $('.prod.'+produc+' .espera').hide(); 
                   
                    // Calcular la cantidad de productos y la suma total
                    var cantidadProductos = response.length;
                    

                    var sumaTotal = response.reduce((acumulador, producto) => acumulador + parseFloat(producto.monto), 0);
                    if(sumaTotal>0){$('#info-carrito').show();}else{$('#info-carrito').hide();}
                    // Actualizar la burbuja con la información
                    $('#info-carrito').html('<p><b></b>' + cantidadProductos + '</p> <t>$' + sumaTotal.toFixed(0)+'</t>');
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
<div id="carrito-info">
    <a style="text-decoration: none; z-index: 2;" href="../../tienda/carrito" id="info-carrito"><b></b></a>
</div>
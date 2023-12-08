<?php include '../includes/head.php'; ?>
<?php include '../includes/conexion.php';?>
<?php

$busqueda = " AND venta = 0";   // productos en stock
$sinbus = 1;    // busqueda
$vueltas = 0;



// titulo  

echo "<h3> " . $titulo . " </h3><br>";



// listado de los articulos en ofertas


if (isset($_GET["str"]) and $_GET["str"] === "semanal") {
    $busqueda .= " AND cliente = 'oferta' 
    AND LOCATE('9',nro_temp) = 0 
    order by   nro_pren desc, tbase, nro ";
    $sinbus = 0;
    $titulo = "Ofertas de la Semana";
}


//funcion codigo-articulo
function codArt($msg)
{
  $length = 6;
  $string = substr(str_repeat(0, $length) . $msg, -$length); //completo con ceros hasta alcanzar 6
  $sumaimpar = ($string[0] + $string[2] + $string[4]) * 3;
  $sumapar = $string[1] + $string[3] + $string[5];
  $resto = ($sumapar + $sumaimpar) % 10;  //la unidades de sumar los impares por 3, mas los pares
  $string .= $resto;  //eso se agrega como caracter de verificacion
  $string = substr(str_repeat(0, $length) . dechex($string), -$length);  //convierto en hexa
  $coNum = array('102', '99', '116', '113', '104', '106', '97', '49', '108', '105', '112', '73', '98', '100', '101', '111');
  $salida = "";
  for ($i = 0; $i < strlen($string); $i++) {
    $salida .= chr($coNum[hexdec($string[$i])]);
  } //codifico las cifras hexa por otras del vector llave
  $salida2 = "FFFFFF";
  $salida2[0] = $salida[2];
  $salida2[1] = $salida[4];
  $salida2[2] = $salida[0];
  $salida2[3] = $salida[5];
  $salida2[4] = $salida[1];
  $salida2[5] = $salida[3];    //cambié el orden de las cifras
  return $salida2;
}



// consulta BD productos 

if ($sinbus === 0) {
  $consulta_prod = "SELECT * FROM tienda WHERE id_prod > 0" . $busqueda;
  $resultado_prod = mysqli_query($conexion, $consulta_prod) or die("<div class='nadaquever'>Algo ha ido mal en la consulta a la base de datos</div>");


  // muestra resultados   

  while ($producto = mysqli_fetch_array($resultado_prod)) {

    $palabra = "Comprar";
    include '../includes/whileprod.php';
  }
}

// si no hay nada para mostrar 

if ($sinbus === 1 or $vueltas === 0) {
  echo "<div class='nadaquever'>No hay productos que mostrar.</div>";
}
?>

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
                        botonAgrega.show(); // Mostrar botón de agregar
                        botonQuita.hide(); // Ocultar botón de quitar
                      }
                    
                    });

                    $('.prod.'+produc+' .espera').hide(); 
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
</body>

</html>
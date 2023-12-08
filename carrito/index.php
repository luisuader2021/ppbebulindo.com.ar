<?php include '../includes/head.php'; ?>
<?php include '../includes/conexion.php'; ?>


<?php

    session_start();

    // Verificar si hay datos en la sesión del carrito
    if (isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];


    
      $idList = array_column($carrito, 'id');
      $listaIDsStr = "('".implode("','", $idList)."')";
      

$busqueda = " AND venta = 0";    // productos en stock
$sinbus = 1;    // busqueda
$vueltas = 0;


$busqueda .= ' AND codbar IN '.$listaIDsStr;
$sinbus = 0;


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

                $descr = str_replace(array(' ','"'),array("%20",""), $producto[23]);

            $codbar=$producto[1];
            $bcodbar="";
            $j=1;
            $k=0;
            for($i=0;$i<13;$i++){
             if($codbar[$i]==="0" & $j){$k=$k+1;}else{$bcodbar.=$codbar[$i];$j=0;} }          
?>
             <div class='<? echo $producto[1]; ?> prod'>
                      <div class='d1'>
                        <a href='../../img/<? echo $producto[1]; ?>.jpg' class='d2'></a>
                        <img src='../../img/<? echo $producto[1]; ?>.jpg'/>
                        <div class='info li'><? echo $producto[23]; ?><br>                        
                          <div class='talle'><span>Talle: </span><? echo $producto[11]; ?></div>
                          <b><? echo $bcodbar; ?></b>
                          <div class='cod'>Art. <? echo $producto[22]; ?></div>                      
                          <button class="agrega" onclick="agregarAlCarrito(<?echo "'".$producto[1]."', '".$producto[23]."', ". $producto[26];?>)">Agregar</button>
                          <button class="quita"  onclick="quitarDelCarrito(<?echo "'".$producto[1]."'"?>)" >Quitar</button>
                          <div class="espera">...</div>            
                          <div class='precio'>$ <? echo $producto[26] ?></div>
                        </div>
                     </div>
                  </div> 
                  <?php
             $vueltas++;                
  }
}

// si no hay nada para mostrar 

if ($sinbus === 1 or $vueltas === 0) {
  echo "<div class='nadaquever'>No hay productos que mostrar.</div>";
}
















        // Mostrar el total del carrito
        $totalCarrito = array_sum(array_column($carrito, 'monto'));
        echo '<p>Total del Carrito: $' . number_format($totalCarrito, 2) . '</p>';
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>
<a href="javascript:history.back()">Volver</a>

<style>
    
    .prod{
        width: calc(50% - 4px);
    }

.prod .d1 .agrega, .prod .d1 .quita, .prod .d1 .espera {
    left: 0px;
    border-radius: 0 12px 0 0;
    width: auto;
    padding: 8px 10px 8px 35px!important;
    font-size: 13px;
}
.prod .d1 .cod {
    display: none;
}

.prod .d1 .info .precio {
    text-align: right;
    font-size: 20px;
    padding: 7px 0 0 0;
    line-height: 17px;
}



</style>


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
    <span id="info-carrito"><b></b></span>
</div>

<h3 class='titulito'>CARRITO DE COMPRAS</h3>

</body>

</html>
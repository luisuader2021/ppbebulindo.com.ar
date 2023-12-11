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
                        <a href='../../img/<? echo $producto[1]; ?>.jpg' class='d2'><d>QUITADO DEL CARRITO</d></a>
                        <img src='../../img/<? echo $producto[1]; ?>.jpg'/>
                        <div class='info li'><c><? echo $producto[23]; ?></c><br>                        
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


       
    } 
    ?>
    <p class="totalC"></p>


<a href="metododepago.php?monto=" class="finalizaC">Finalizar compra</a>


<a class="volver" href="javascript:history.back()">Volver</a>

<style>
    /*
    .prod{
        width: calc(50% - 4px);
    }*/

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
.prod{
    width: calc(50% - 4px);
    vertical-align: middle !important;
    clear: none !important;
    float: none !important;
    display: inline-block;
    zoom: 1 !important;
    box-sizing: border-box !important;
    font-family: "Times new roman";

}
/* en 49 y 30 estaba*/
@media screen and (min-width:600px) {
 .prod{width: calc(33% - 4px);}
}
@media screen and (min-width:1200px) {
 .prod{width: calc(25% - 4px);}
}
.prod .d2{
    
  display: flex;
  align-items: center;
    text-decoration:none ;
}
.prod .d2 d{
    margin: auto;
    background-color: #E4FED9EE;    
    padding: 4px;
    border-radius: 10px;
    border: 1px solid #45932F;
    color: #45932F;
    transition: 0.15s;
    font-size: 10px;
    font-weight: normal;
    text-decoration:none ;
}

.totalC{
    color: #45932F;
    padding: 20px 0;
    font-weight: bold;
    margin: 0;
}
.finalizaC{
    display: block;
    font-weight: bold;
    width: 200px;
    margin: 20px auto;
    background-color: rgba(50,50,50,0.05);
    background-image: url(../images/buy.png);
    background-size: 28px;
    background-position: 18px center;
    background-repeat: no-repeat;
    padding: 8px 16px 8px 41px!important;
    font-style: italic;
    font-size: 23px;
    border-radius: 12px;
    text-decoration: none;
    color: #45932F;
    border: none;
}
.volver{
    display: block;
    font-weight: bold;
    width: 200px;
    margin: 20px auto;
    background-color: rgba(50,50,50,0.05);
    background-image: url(../images/volver.png);
    background-size: 28px;
    background-position: 18px center;
    background-repeat: no-repeat;
    padding: 8px 16px 8px 41px!important;
    font-style: italic;
    font-size: 23px;
    border-radius: 12px;
    text-decoration: none;
    color: #45932F;
    border: none;
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
                    $('.prod.'+id).removeClass('transp');
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
                    $('.prod.'+id).addClass('transp');
            
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
                      var quitado = $(this).find('.d2 d');

                      // Verificar si el producto está en el carrito
                      var estaEnCarrito = response.some(function(producto) {
                        return producto.id === idProducto;

                      });

                      // Mostrar el botón correspondiente
                      if (estaEnCarrito) {
                        botonAgrega.hide(); // Ocultar botón de agregar
                        botonQuita.show(); // Mostrar botón de quitar
                        quitado.hide();
                      } else {
                        botonAgrega.show();
                        botonQuita.hide();
                        quitado.show();
                      }
                    
                    });

                    $('.prod.'+produc+' .espera').hide(); 
                   
                    // Calcular la cantidad de productos y la suma total
                    var cantidadProductos = response.length;
                    

                    var sumaTotal = response.reduce((acumulador, producto) => acumulador + parseFloat(producto.monto), 0);
                    if(sumaTotal>0){
                        $('#info-carrito').show();
                        $('.totalC').html("Total del carrito: " + sumaTotal.toLocaleString('es-AR', { style: 'currency', currency: 'ARS' }));
                        $('.finalizaC').attr('href','metododepago.php?monto='+sumaTotal);
                        $('.finalizaC').show();
                    }else{
                        $('#info-carrito').hide();
                        $('.totalC').html("Sin productos en el carrito");
                        $('.finalizaC').hide();
                    }
                    // Actualizar la burbuja con la información
                    $('#info-carrito').html('<p><b></b>' + cantidadProductos + '</p> <t>$' + sumaTotal.toLocaleString('es-AR', { maximumFractionDigits: 0 })+'</t>');
                   
                    
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
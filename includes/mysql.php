<?php
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
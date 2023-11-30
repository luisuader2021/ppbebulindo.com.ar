<?php include '../includes/head.php';?>
<?php include '../includes/conexion.php';?>
<?php
$busqueda= " AND venta = 0";
$sinbus=1;
$vueltas=0;






if(isset($_GET["str"]) and $_GET["str"] === "RemerasN" )
  {$busqueda.=" AND or_arr = '14' AND categ1 = 'N' AND tbase >=4 AND nro_pren = '1' 
AND LOCATE('9',nro_temp) = 0 
order by   nro ";
 $sinbus=0;  $titulo="REMERAS PARA NIÑOS";}


if(isset($_GET["str"]) and $_GET["str"] === "MusculosasN" )
  {$busqueda.=" AND or_arr = '15' AND categ1 = 'N' AND tbase >=4  AND nro_pren = '1' 
AND LOCATE('9',nro_temp) = 0 
order by   nro ";
 $sinbus=0;  $titulo="MUSCULOSAS PARA NIÑOS";}


if(isset($_GET["str"]) and $_GET["str"] === "BermudasN" )
  {$busqueda.=" AND or_aba = '27' AND categ1 = 'N' AND tbase >=4  AND nro_pren = '1' 
AND LOCATE('9',nro_temp) = 0 
order by   nro desc";
 $sinbus=0;  $titulo="BERMUDAS PARA NIÑOS";}







if(isset($_GET["str"]) and $_GET["str"] === "BodysB" )
  {$busqueda.=" AND or_arr = '12' AND categ1 = 'B' AND tbase >0  AND codigo <> 4003 AND nro_pren = '1'   
AND LOCATE('9',nro_temp) = 0 
order by  tbase desc, nro desc ";
 $sinbus=0;  $titulo="BODYS PARA BEBES";}



if(isset($_GET["str"]) and $_GET["str"] === "MusculosasB" )
  {$busqueda.=" AND or_arr = '15' AND categ1 = 'B' AND tbase >0 AND nro_pren = '1'   
AND LOCATE('9',nro_temp) = 0 
order by   nro ";
 $sinbus=0;  $titulo="MUSCULOSAS PARA BEBES";}



if(isset($_GET["str"]) and $_GET["str"] === "ShortsB" )
  {$busqueda.=" AND or_aba = '28' AND categ1 = 'B' AND tbase >0 AND nro_pren = '1'   
AND LOCATE('9',nro_temp) = 0 
order by   nro desc";
 $sinbus=0;  $titulo="SHORTS PARA BEBES";}









if(isset($_GET["str"]) and $_GET["str"] === "ConjuntosRN" )
  {$busqueda.=" AND or_arr = '11' AND categ1 = 'B' AND tbase = 0
   AND nro_pren > 1  AND LOCATE('9',nro_temp) = 0 
order by   nro desc";
 $sinbus=0;  $titulo="CONJUNTOS PARA RECIEN NACIDO";}



if(isset($_GET["str"]) and $_GET["str"] === "BodysRN" )
  {$busqueda.=" AND or_arr = '11' AND categ1 = 'B' AND tbase = 0 AND codigo <> 15
   AND nro_pren = 1  AND LOCATE('9',nro_temp) = 0 
order by   nro desc";
 $sinbus=0;  $titulo="BODYS MANGA LARGAS RN";}





if(isset($_GET["str"]) and $_GET["str"] === "ConjuntosBa" )
  {$busqueda.=" AND or_arr = '16' AND categ1 = 'B' AND ordEdad < '-1'
   AND nro_pren > 1  AND LOCATE('9',nro_temp) = 0 
order by   nro ";
 $sinbus=0;  $titulo="CONJUNTOS PARA PREMATUROS";}




if(isset($_GET["str"]) and $_GET["str"] === "ConjuntosBo" )
  {$busqueda.=" AND or_arr = '11' AND categ1 = 'B' AND ordEdad < '-1'
   AND nro_pren > 1  AND LOCATE('9',nro_temp) = 0 
order by   nro desc";
 $sinbus=0;  $titulo="CONJUNTOS PARA PREMATUROS";}




















echo "<h3> ".$titulo." </h3><br>";


function codArt($msg) {   
    $length = 6;
    $string = substr(str_repeat(0, $length).$msg, - $length); //completo con ceros hasta alcanzar 6
    $sumaimpar=($string[0]+$string[2]+$string[4])*3; 
    $sumapar=$string[1]+$string[3]+$string[5];  
    $resto=($sumapar+$sumaimpar)%10;  //la unidades de sumar los impares por 3, mas los pares
    $string.=$resto;  //eso se agrega como caracter de verificacion
    $string = substr(str_repeat(0, $length).dechex($string), - $length);  //convierto en hexa
    $coNum= array ( '102','99','116','113','104','106','97','49','108','105','112','73','98','100','101','111'); 
$salida="";
for($i=0;$i<strlen($string);$i++){$salida.=chr($coNum[hexdec($string[$i])]);} //codifico las cifras hexa por otras del vector llave
  $salida2="FFFFFF";
  $salida2[0]=$salida[2];
  $salida2[1]=$salida[4];
  $salida2[2]=$salida[0];
  $salida2[3]=$salida[5];
  $salida2[4]=$salida[1];
  $salida2[5]=$salida[3];    //cambié el orden de las cifras
  return $salida2;
 
}





if($sinbus===0){
$consulta_prod ="SELECT * FROM stock WHERE id_prod > 0".$busqueda;
$resultado_prod = mysqli_query( $conexion, $consulta_prod ) or die ( "<div class='nadaquever'>Algo ha ido mal en la consulta a la base de datos</div>");
 


while ($producto= mysqli_fetch_array( $resultado_prod))
  {

  $palabra="Comprar"; 
  include '../includes/whileprod.php';
  }

}



if($sinbus===1 or $vueltas===0 ) {
  echo "<div class='nadaquever'>No hay productos que mostrar.</div>";}





 ?>





</body>
</html>


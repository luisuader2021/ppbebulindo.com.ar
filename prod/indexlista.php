<?php include '../includes/head.php'; ?>
<?php include '../includes/conexion.php'; ?>

<?php
$busqueda = " AND venta = 0";    // productos en stock
$sinbus = 1;    // busqueda
$vueltas = 0;




// lista de los productos en el menu


// lista para prematuros

if (isset($_GET["str"]) and $_GET["str"] === "ConjuntosBa") {
  $busqueda .= " AND or_arr = '16' AND categ1 = 'B' AND ordEdad < '-1'
  AND nro_pren > 1  AND LOCATE('9',nro_temp) = 0 
  order by   nro ";
  $sinbus = 0;
  $titulo = "CONJUNTOS PARA PREMATUROS";
}


if (isset($_GET["str"]) and $_GET["str"] === "ConjuntosBo") {
  $busqueda .= " AND or_arr = '11' AND categ1 = 'B' AND ordEdad < '-1'
  AND nro_pren > 1  AND LOCATE('9',nro_temp) = 0 
  order by   nro desc";
  $sinbus = 0;
  $titulo = "CONJUNTOS PARA PREMATUROS";
}


// lista para recien nacido


if (isset($_GET["str"]) and $_GET["str"] === "ConjuntosRN") {
  $busqueda .= " AND or_arr = '11' AND categ1 = 'B' AND ordEdad = -1
AND nro_pren > 1  AND LOCATE('9',nro_temp) = 0 
order by   nro ";
  $sinbus = 0;
  $titulo = "CONJUNTOS PARA RECIEN NACIDO";
}


if (isset($_GET["str"]) and $_GET["str"] === "BodysRN") {
  $busqueda .= " AND or_arr = '11' AND categ1 = 'B' AND ordEdad = -1 
AND nro_pren = 1  AND LOCATE('9',nro_temp) = 0 
order by   nro desc";
  $sinbus = 0;
  $titulo = "BODYS MANGA LARGAS RN";
}


//lista bebés


if (isset($_GET["str"]) and $_GET["str"] === "BodysB") {
  $busqueda .= " AND or_arr = '12' AND categ1 = 'B' 
  AND tbase >0   AND nro_pren = '1'   
  AND LOCATE('9',nro_temp) = 0 
  order by  tbase desc, nro desc ";
  $sinbus = 0;
  $titulo = "BODYS PARA BEBES";
}


if (isset($_GET["str"]) and $_GET["str"] === "MusculosasB") {
  $busqueda .= " AND or_arr = '15' AND categ1 = 'B' 
  AND tbase >0 AND nro_pren = '1'   
  AND LOCATE('9',nro_temp) = 0 
  order by   nro ";
  $sinbus = 0;
  $titulo = "MUSCULOSAS PARA BEBES";
}


if (isset($_GET["str"]) and $_GET["str"] === "ShortsB") {
  $busqueda .= " AND or_aba = '28' AND categ1 = 'B' 
  AND tbase >0 AND nro_pren = '1'   
  AND LOCATE('9',nro_temp) = 0 
  order by   nro desc";
  $sinbus = 0;
  $titulo = "SHORTS PARA BEBES";
}



// lista niños 

if (isset($_GET["str"]) and $_GET["str"] === "RemerasN") {
  $busqueda .= " AND or_arr = '14' AND categ1 = 'N' 
  AND tbase >=4 AND nro_pren = '1' 
  AND LOCATE('9',nro_temp) = 0 
  order by   nro ";
  $sinbus = 0;
  $titulo = "REMERAS PARA NIÑOS";
}


if (isset($_GET["str"]) and $_GET["str"] === "MusculosasN") {
  $busqueda .= " AND or_arr = '15' AND categ1 = 'N' 
  AND tbase >=4  AND nro_pren = '1' 
  AND LOCATE('9',nro_temp) = 0 
  order by   nro ";
  $sinbus = 0;
  $titulo = "MUSCULOSAS PARA NIÑOS";
}


if (isset($_GET["str"]) and $_GET["str"] === "BermudasN") {
  $busqueda .= " AND or_aba = '27' AND categ1 = 'N' 
  AND tbase >=4  AND nro_pren = '1' 
  AND LOCATE('9',nro_temp) = 0 
  order by   nro desc";
  $sinbus = 0;
  $titulo = "BERMUDAS PARA NIÑOS";
}



// lista NEW nuevos ingresos

if (isset($_GET["str"]) and $_GET["str"] === "New") {
  $busqueda .= " AND codigo IN (102770, 102715, 102710)
  AND LOCATE('9',nro_temp) = 0 
  order by   tbase, codigo desc ";
  $sinbus = 0;
  $titulo = "Nuevos Ingresos";
}


// titulo

echo "<h3 class='titulito' > " .$titulo. " </h3><br>";



?>


<?php include '../includes/mysql.php'; ?>
<?php include '../includes/carrito.php'; ?>
<?php include '../includes/footer.php'; ?>


</body>

</html>
<?php include '../includes/head.php'; ?>
<?php include '../includes/conexion.php';?>
<?php

$busqueda = " AND venta = 0";   // productos en stock
$sinbus = 1;    // busqueda
$vueltas = 0;







// listado de los articulos en ofertas


if (isset($_GET["str"]) and $_GET["str"] === "semanal") {
    $busqueda .= " AND cliente = 'oferta' 
    AND LOCATE('9',nro_temp) = 0 
    order by   nro_pren desc, tbase, nro ";
    $sinbus = 0;
    $titulo = "Ofertas de la Semana";
}



// titulo  

echo "<h3 class='titulito' > " .$titulo. " </h3><br>";




?>

<?php include '../includes/mysql.php'; ?>
<?php include '../includes/carrito.php'; ?>
<?php include '../includes/footer.php'; ?>



</body>

</html>
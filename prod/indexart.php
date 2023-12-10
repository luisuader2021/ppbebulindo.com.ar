<?php include '../includes/head.php'; ?>
<?php include '../includes/conexion.php'; ?>


<?php
$busqueda = " AND venta = 0";    // productos en stock
$sinbus = 1;    // busqueda
$vueltas = 0;


// listado de los articulos coincidentes con..
// ingresar palabra en el buscador
// redireccionamos a una nueva pagina /art/...


if (isset($_GET["art"]) and strlen($_GET["art"]) > 1) {
  $busqueda .= " AND articulo LIKE '%" . $_GET["art"] . "%'order by cat desc, ordEdad";
  $sinbus = 0;
}



// titulo  

echo "<h3 class='titulito' >  Mostrando los artículos que contienen: ".$_GET["art"]. "</h3><br>";



?>


<?php include '../includes/mysql.php'; ?>
<?php include '../includes/carrito.php'; ?>
<?php include '../includes/footer.php'; ?>


</body>

</html>
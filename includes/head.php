<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<meta name="theme-color" content="#E9FCD6">
	<title>Bebulindo</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Andada+Pro&display=swap" rel="stylesheet">


 

<!--  favicon -->
<link rel="icon" type="image/png" href="../../tienda/images/icono.png">
<!--  íconos de la biblioteca Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<link rel="stylesheet" type="text/css" href="../../tienda/css/estilos.css?v=<?echo rand()?>"></link>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163385724-1"></script>

<meta property="og:image" content="http://bebulindo.com.ar/images/logoblog.jpg">


<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



<?php
 
if(!(isset($_GET["nc"]))) {?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-163385724-1');
</script>
 

<!-- Default Statcounter code for Bebulindo http://Bebulindo.com.ar -->
<script type="text/javascript">
var sc_project=12503626; 
var sc_invisible=1; 
var sc_security="cbe92d90"; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js" async></script>
<noscript><div class="statcounter"><a title="Web Analytics"
href="https://statcounter.com/" target="_blank"><img class="statcounter"
src="https://c.statcounter.com/12503626/0/cbe92d90/1/" alt="Web
Analytics"></a></div></noscript>
<!-- End of Statcounter Code -->


 <?php
}
//inicio carrito

session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Función para calcular la cantidad total de artículos en el carrito
function calcularCantidadArticulos() {
    return count($_SESSION['carrito']);
}

// Función para calcular el monto total en el carrito
function calcularMontoTotal() {
    $montoTotal = 0;
    foreach ($_SESSION['carrito'] as $producto) {
        $montoTotal += $producto['precio'];
    }
    return $montoTotal;
}

//fin carrito












 ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>

<script src="../../tienda/js/borrar.js?v=<?php echo(rand());?>" type="text/javascript"></script>



   <!-- implementación de la barra de búsqueda para filtrar por productos -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            // Manejar el evento de tecla "Enter" en el campo de búsqueda
            $('.search-input').on('keyup', function(event) {
                if (event.keyCode === 13) {
                    realizarBusqueda();
                }
            });

            // Manejar el evento de clic en el botón de búsqueda
            $('.search-button').on('click', function() {
                realizarBusqueda();
            });

            // Función para realizar la búsqueda y redirección
            function realizarBusqueda() {
                var searchTerm = $('.search-input').val().trim().toLowerCase();

                // Verificar que la palabra tenga más de tres letras
                if (searchTerm.length >= 3) {
                    // Realizar la redirección basada en la palabra clave ingresada
                    var newURL = "http://bebulindo.com.ar/art/" + searchTerm;
                    window.location.href = newURL;
                } else {
                    alert("Por favor, ingresa una palabra de al menos tres letras.");
                }
            }
        });
    </script>


</head>




<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0" nonce="z9bA3n3S"></script>


<!-- menu y buscador  -->
<div class="menu">
	<a href="https://bebulindo.com.ar/tienda/home/" class="logo"></a>
	<div class="mrp" ></div>
	<div class="search-container">
        <input type="text" class="search-input" placeholder="Buscar...">
        <button class="search-button"></button>
    </div>

</div>






<div class="esp1"></div>
<script>
    // JavaScript para cambiar el estilo al hacer scroll
    document.addEventListener('scroll', function() {
      var header = document.querySelector('.menu');
      var busqueda = document.querySelector('.search-container');
      var logo = document.querySelector('.menu .logo');
      var slogan=document.querySelector('.menu .mrp');
      var scrollPosition = window.scrollY;

      if (scrollPosition > 50) {
        header.style.height = '60px';
        busqueda.style.top = '9px';
        logo.style.height ='45px';
        logo.style.backgroundPosition = '0 -30px';
        slogan.style.display = 'none';
      } else {
        header.style.height = '123px';
        busqueda.style.top = '37px';
        logo.style.height ='106px';
        logo.style.backgroundPosition = '0 0';
        
      }
    });
  </script>
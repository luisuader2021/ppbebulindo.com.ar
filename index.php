    
<?php include 'includes/head.php';?>


</head>


<body>
    

     <!-- Botón para la buequeda   -->
  
   
    <script>
        // Función que redirige a la página seleccionada
        function redirigir() {
            // Obtener el valor seleccionado del menú desplegable
            var selectedValue = document.getElementById("categoria").value;

            // Redirigir a la página correspondiente
            if (selectedValue === "#") {
                // No hacer nada o redirigir a una página por defecto
            } else {
                //window.open(selectedValue + ".html", "_blank");
               //window.location.href = selectedValue + ".html"; // Puedes ajustar la extensión o la ruta según tus necesidades
               // Combina la URL base con el valor seleccionado
                 var newURL = "http://bebulindo.com.ar/ar/" + selectedValue;

                // Redirige a la nueva URL en la misma ventana o pestaña
                window.location.href = newURL;
              // window.open("http://bebulindo.com.ar/ar/" + selectedValue ); // página web + value
            }
        }
    </script>
</div>





<div class="menuhorizontal">
    <ul>
       <li class="dropdown">
        <a href="#" class="dropbtn">Prematuros</a>
        <div class="dropdown-content">
          <a href="http://bebulindo.com.ar/ar/remera">conjuntos</a>
          <a href="#">musculosas</a>
          <a href="#">bermudas</a>
        </div>
      </li>


      <li class="dropdown">
        <a href="#" class="dropbtn">Bebés</a>
        <div class="dropdown-content">
          <a href="http://bebulindo.com.ar/lista/BodysB">bodys</a>
          <a href="http://bebulindo.com.ar/lista/MusculosasB">musculosas</a>
          <a href="http://bebulindo.com.ar/lista/ShortsB">shorts</a>
        </div>
      </li>


      <li class="dropdown">
        <a href="#" class="dropbtn">Niños</a>
        <div class="dropdown-content">
          <a href="http://bebulindo.com.ar/lista/RemerasN">remeras</a>
          <a href="http://bebulindo.com.ar/lista/MusculosasN">musculosas</a>
          <a href="http://bebulindo.com.ar/lista/BermudasN">bermudas</a>
        </div>
      </li>


    </ul>
  </div>
<br>
<!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="images/pasador/imagen3.webp"/></div>
    <div class="swiper-slide"><img src="images/pasador/imagen2.webp"/></div>
    <div class="swiper-slide"><img src="images/pasador/imagen1.webp"/></div>    
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>
<script>
    
/*const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});*/

    var swiper = new Swiper('.swiper', {
  slidesPerView: 'auto',
  spaceBetween: 20,
  centeredSlides: false,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    loop: true,
  },
    // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  
});


</script>

<style>
    
    .swiper {
  width: 100%;
  
  
}

.swiper-wrapper{
    width: 100%;
    max-width:640px;
}


.swiper-button-next, .swiper-button-prev {
  color: #88A765; /* Cambia esto al color que desees */
}

/* Estilos personalizados para la paginación */
.swiper-pagination-bullet {
  background-color:#88A765; /* Cambia esto al color que desees */
}

.swiper-pagination-bullet-active {
  background-color: #789656; /* Cambia esto al color que desees */
}


</style>

<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
<div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>








<!-- Formulario con menú desplegable    style="  width: 180px; 
    height: 35px; "   -->

<form id="myForm">
    <a class="titbu"><b></b>Buscar Artículos que contengan: <br><br>

      
    <select id="categoria" name="Buscar" onchange="redirigir()">
    
        
        <option value="remera">remeras</option>
        <option value="musculosa">musculosas</option>
        <option value="short">shorts</option>
        <option value="bermuda">bermudas</option>
        <option value="buzo">buzos</option>
        <option value="campera">camperas</option>
        <option value="chaleco">chalecos</option>
        
   
    </select>

</a>

</form>



</body>



</html>
    <?php include '../includes/head.php'; ?>
 
    </head>

    </head>

    <body>

    <?php include '../includes/menuhori.php'; ?>
      

    <!-- Pasador de fotos -->
    <br>
      <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          
        <div class="swiper-slide"><img src="../images/pasador/imagen1.png" /></div>
        <div class="swiper-slide"><img src="../images/pasador/imagen2.png" /></div>
          <div class="swiper-slide"><img src="../images/pasador/imagen3.png" /></div>
          <div class="swiper-slide"><img src="../images/pasador/imagen4.png" /></div>
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

<br> <br>
<div class="titbebu">
      <h3>Nuestras ofertas y novedades</h3>

      </div>
      <br> <br>

  <!-- Contenedor que alberga las imágenes -->
  <div class="contenedor-imagenes">
    <!-- Primera imagen -->
    <a href="http://bebulindo.com.ar/oferta/semanal">
    <img class="imagen" src="../images/verano.png" alt="Imagen 1">
   </a>

    <!-- Segunda imagen-->
    <a href="http://bebulindo.com.ar/lista/New">
    <img class="imagen" src="../images/nuevo.jpg" alt="Imagen 2">
 </a> 
  </div>

      





    
  <?php include '../includes/footer.php'; ?>

    </body>



    </html>
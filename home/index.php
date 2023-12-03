    <?php include '../includes/head.php'; ?>

    </head>

    </head>

    <body>


      <!-- menu horizontal -->

      <div class="menuhorizontal">
        <ul>
          <li class="dropdown">
            <a href="#" class="dropbtn">Prematuros</a>
            <div class="dropdown-content">
              <a href="http://bebulindo.com.ar/lista/ConjuntosBa">conjuntos con batita</a>
              <a href="http://bebulindo.com.ar/lista/ConjuntosBo">conjuntos con body</a>

            </div>
          </li>


          <li class="dropdown">
            <a href="#" class="dropbtn">RN</a>
            <div class="dropdown-content">
              <a href="http://bebulindo.com.ar/lista/ConjuntosRN">conjuntos</a>
              <a href="http://bebulindo.com.ar/lista/BodysRN">bodys ml</a>
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
          <div class="swiper-slide"><img src="../images/pasador/imagen3.webp" /></div>
          <div class="swiper-slide"><img src="../images/pasador/imagen2.webp" /></div>
          <div class="swiper-slide"><img src="../images/pasador/imagen1.webp" /></div>
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

      

      <div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>
      <div style="width: 300px;height: 300px; border: 1px solid #000; margin: 50px;"></div>







      <!-- Footer  para  redes sociales e informacion contacto -->

      <footer>
        <div class="footer-content">
          <!-- Columna de redes sociales -->
          <div class="column">
            <h3>Redes Sociales</h3>

            <a href="https://www.facebook.com/bebulindo/" class="reds"><img width="50%" style="max-width: 35px" src="../../tienda/images/logof.png" /></a>
            <a class="tifbi" href="https://www.facebook.com/bebulindo/"><b></a>

            <a href="https://www.instagram.com/unbebulindo/" class="reds"><img width="50%" style="max-width: 35px" src="../../tienda/images/logoi.png" /></a>
            <a class="tifbi" href="https://www.instagram.com/unbebulindo/"><b></a>
          </div>

          <!-- Columna de información de contacto -->
          <div class="column">
            <h3>Contacto</h3>
            <p><i class="fas fa-phone"></i> <a href="https://wa.me/543436209824" target="_blank">+54 343 6209824</a></p>

            <p><i class="fas fa-envelope"></i> <a href="mailto:unbebulindo@gmail.com">unbebulindo@gmail.com</a></p>


          </div>

        </div>

        <!-- Derechos Reservados -->
        <div class="rights">
          <p>&copy; 2023 Bebulindo. Todos los derechos reservados.</p>
        </div>

      <!-- boton wsp siempre visible parte inferior derecha  -->

        <div class="whatsapp-icon">
          <a href="https://api.whatsapp.com/send?phone=5493436209824&text=Información">
            <img class="custom-icon" src="../../tienda/images/wsp.png" alt="Icono wsp">
          </a>
        </div>

      </footer>


    </body>



    </html>
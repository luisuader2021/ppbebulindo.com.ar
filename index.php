    
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
      <li><a href="#">Prematuros</a></li>
      <li><a href="#">Bebés</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Niños</a>
        <div class="dropdown-content">
          <a href="#">remeras</a>
          <a href="#">musculosas</a>
          <a href="#">shorts</a>
        </div>
      </li>
    </ul>
  </div>


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
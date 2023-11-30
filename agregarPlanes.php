<?php
// Iniciar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/eliminarUsuarios.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <title>Usuarios</title>
</head>
<!-- contenedor padre -->

<body class="contenedor_padre">
  <!-- version movil -->
  <a class="agregarUser" href="agregarUsuario.php">
    <img src="assets/asset/mas.svg" alt="" srcset="">
  </a>
  <!-- home -->
  <a href="admin.php" class="home">
    <img src="assets/asset/casa.svg" alt="" srcset="">Inicio
  </a>
  <!-- contenedor principal -->
  <main class="container">

    <!-- encabezado o header -->
    <header class="encabezado">
      <!-- boton del menu -->
      <div class="btn_menu">
        <button class="boton-circular" onclick="mostrarObjeto()" type="submit">
          <img src="assets/asset/menu-svgrepo-com.svg" alt="" srcset="" />
        </button>
      </div>

      <article class="perfilAdmin">
        <div class="column">
          <h4>Nombre completo:</h4>
          <p>
            <?php echo $nombre_usuario; ?>
          </p>
        </div>

        <div class="column">
          <h4>Contacto:</h4>
          <p>
            <?php echo $telefono_usuario; ?>
          </p>
        </div>

        <div class="column">
          <a href="php/cerrar.php"><button type="submit">Cerrar sesión</button></a>
        </div>
      </article>

      <!-- contenedor del logo y itulo -->
      <div id="ban">
        <article>
          <img src="assets/asset/logo.svg" alt="" srcset="" />
        </article>
        <h3>Agencia de viajes</h3>
      </div>
    </header>
    <section class="contenedorUsers">
    <h2>Agregar Plan</h2>
    <form id="agregarPlanForm" class="mi-formulario" enctype="multipart/form-data">
  <div class="form-group">
    <label for="destino">Destino:</label>
    <input type="text" name="destino" id="destino" required>
  </div>

  <div class="form-group">
    <label for="tipo_transporte">Tipo de transporte:</label>
    <input type="text" name="tipo_transporte" id="tipo_transporte" required>
  </div>

  <div class="form-group">
    <label for="fecha_salida">Fecha de salida:</label>
    <input type="date" name="fecha_salida" id="fecha_salida" required>
  </div>

  <div class="form-group">
    <label for="fecha_llegada">Fecha de llegada:</label>
    <input type="date" name="fecha_llegada" id="fecha_llegada" required>
  </div>

  <div class="form-group descripcion">
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>
  </div>

  <div class="form-group">
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" step="0.01" required>
  </div>

  <div class="form-group">
    <label for="cupos">Cupos:</label>
    <input type="number" name="cupos" id="cupos" step="1" required>
  </div>

  <div class="form-group">
    <label for="id_tplanes">ID del tipo de plan:</label>
    <input type="number" name="id_tplanes" id="id_tplanes" required>
  </div> <br>
   
    <input type="file" name="imagenn" id="imagen" class="input-imagen">
    <button type="submit" class="boton-agregar">Agregar Plan</button>
    
  </form>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
  $(document).ready(function() {
    // Handle form submission
    $("#agregarPlanForm").submit(function(event) {
      event.preventDefault();

      // Create a FormData object to send the form data (including the file)
      var formData = new FormData(this);

      // Send AJAX request to insert the data into the database
      $.ajax({
        url: "php/insertPlan.php", // Replace 'insertar_plan.php' with the actual filename for inserting data into the database
        type: "POST",
        data: formData,
        contentType: false, // Set contentType to false, as we are sending FormData
        processData: false, // Set processData to false, as we are sending FormData
        success: function(response) {
          // Handle the response from the server after the data is inserted (if needed)
          alert(response);
          // You can redirect or perform any other action after successful insertion.
        },
        error: function() {
          alert("Error al agregar el plan.");
        },
      });
    });
  });
</script>
    <footer class="pie">
      <div class="copyright">
        &copy; 2023 Isaias Caballero | isaiascaballerojajaja@gmail.com
      </div>
    </footer>
  </main>
  <script src="js/ventana_admin.js"></script>
  <script src="js/datos.js"></script>
</body>

</html>
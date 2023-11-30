<?php
      // Iniciar la sesión
      session_start();
      ?>
  <?php
   include("php/datos_users.php");
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/usuarios.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <title>Usuarios</title>
</head>
<!-- contenedor padre -->

<body class="contenedor_padre">
  <!-- version movil -->
  <a class="agregarUser" href="agregarUsuario.php">
      <img src="assets/asset/mas.svg" alt="" srcset="">
    </a>
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
      <form action=""></form>
      <?php
      include("php/usuarios.php");
      ?>
      


        </div>
       
    </section>

    <article id="mostrarDatos" style="display:none">
    <form action="">
    <button type="submit"><img id="cerrarDatos" onclick="cerrarDatos()" src="assets/asset/cerrar.svg" alt=""></button> 
    <p>Nombre: <span id="nombreUsuario"></span></p>
    <p>Apellido: <span id="apellidoUsuario"></span></p>
    <p>Correo: <span id="correoUsuario"></span></p>
    <p>Contraseña: <span id="contrasenaUsuario"></span></p>
    <p>Teléfono: <span id="telefonoUsuario"></span></p>
    </form>
    </article>

    <script>
        $(document).ready(function() {
          $('.usuario').submit(function(event) {
            event.preventDefault();

            var form_id = $(this).data('form'); // Obtener el identificador único del formulario

            $.ajax({
              url: 'php/traer.php', // Ruta a tu script PHP que procesará los datos
              type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
              data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
              success: function(respuesta) {
                var data = JSON.parse(respuesta);

              // Mostrar las variables en una etiqueta HTML
              $('#nombreUsuario').text(data.nombre);
              $('#apellidoUsuario').text(data.apellido);
              $('#correoUsuario').text(data.email);
              $('#contrasenaUsuario').text(data.contrasena);
              $('#telefonoUsuario').text(data.telefono);
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
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
      <form action=""></form>
      <?php
       include("php/editarusuarios.php");
      ?>
      </div>

    </section>

    <article id="mostrarDatos" style="display:none">
      <form action="php/eliminarUsuario.php" class="usuarioFinal" method="post">
        <button class="btn_cerrar" type="submit"><img id="cerrarDatos" onclick="cerrarDatos()" src="assets/asset/cerrar.svg" alt=""></button>
        <p>Nombre: <span id="nombreUsuario"></span></p>
        <p>Apellido: <span id="apellidoUsuario"></span></p>
        <p>Correo: <span id="correoUsuario"></span></p>
        <p>Contraseña: <span id="contrasenaUsuario"></span></p>
        <p>Teléfono: <span id="telefonoUsuario"></span></p>
        <input type="hidden" id="idUsuarioF" value="idUsuario" name="usuarioEliminar">
        <p><button type="submit" id="eliminarUsuarioFinal">Eliminar</button></p>
      </form>
    </article>
    <script>
      $(document).ready(function() {
        $('.usuario').submit(function(event) {
          event.preventDefault();

          var form_id = $(this).data('form'); // Obtener el identificador único del formulario

          $.ajax({
            url: 'php/traerD.php', // Ruta a tu script PHP que procesará los datos
            type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
            data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
            success: function(respuesta) {
              var data = JSON.parse(respuesta);

              // Mostrar las variables en una etiqueta HTML
              $('#idUsuario').text(data.id_usuario);
              $('#nombreUsuario').text(data.nombre);
              $('#apellidoUsuario').text(data.apellido);
              $('#correoUsuario').text(data.email);
              $('#contrasenaUsuario').text(data.contrasena);
              $('#telefonoUsuario').text(data.telefono);
              $('#idUsuarioF').val(data.id_usuario);
            },
          });

        });
      });


      $(document).ready(function() {
        $('.usuarioFinal').submit(function(event) {
          event.preventDefault();

          var idUsuario = $('#idUsuarioF').val(); // Obtener el valor del campo de texto

          $.ajax({
            url: $(this).attr('action'), // Ruta al archivo PHP especificada en el atributo "action" del formulario
            type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
            data: {
              usuarioEliminar: idUsuario
            }, // Enviar el ID del usuario como datos de la solicitud
            success: function(respuesta) {
              // Mostrar la respuesta en una alerta o en otro lugar de tu elección
              alert(respuesta);
            },
            error: function() {
              // Manejar el error en caso de que ocurra algún problema con la solicitud AJAX
              alert('Error al eliminar el usuario.');
            }
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
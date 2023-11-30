<?php
// Iniciar la sesión
session_start();
$rol = $_SESSION['id_rol'];
if ($rol != 1) {
            echo "<script>window.location='login.php';</script>";}
include('php/datos_users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/admin.css" />
  <title>Admin</title>
</head>
<!-- contenedor padre -->

<body class="contenedor_padre">
  <!-- version movil -->
  <!-- contenedor principal -->
  <main class="container">
     <!-- Botón de cierre de sesión -->
     <form action="php/logout.php" method="post">
        <button class="cerrar_sesion"  type="submit">Cerrar sesión</button>
    </form>
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
    <!-- contenedor de los botones -->
    <section class="informacion">
      <div>
        <h4>¿Qué deseas hacer?</h4>
      </div>
      <div class="contenedor_botones">
        <div class="botones">
          <button type="submit" onclick="agregarUsuarios()">
            <img src="assets/asset/person_add_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset="">
            <p>Agregar usuarios</p>
          </button>
          <button type="submit" onclick="eliminarUsuarios()">
            <img src="assets/asset/delete_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset="">
            <p>Eliminar usuarios</p>
          </button>
          <button type="submit" onclick="editarUsuarios()">
            <img src="assets/asset/manage_accounts_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset="">
            <p>Editar usuarios</p>
          </button>
          <button type="submit" onclick="agregarPlanes()">
            <img src="assets/asset/assignment_add_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset="">
            <p>Agregar planes</p>
          </button>
          <button type="submit" onclick="eliminarPlan()">
            <img src="assets/asset/scan_delete_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset="">
            <p>Eliminar plan</p>
          </button>
          <button type="submit" onclick="editarPlanes()">
            <img src="assets/asset/editar_plan.svg" alt="" srcset="">
            <p>Editar planes</p>
          </button>
          <button type="submit" onclick="abrirWhatsapp()">
            <img src="assets/asset/whatsapp.svg" alt="" srcset="">
            <p>Whatsapp</p>
          </button>
          <button type="submit" onclick="abrirFacebook()">
            <img src="assets/asset/facebook.svg" alt="" srcset="">
            <p>Facebook</p>
          </button>
          <button type="submit" onclick="abrirApple()">
            <img src="assets/asset/apple.svg" alt="" srcset="">
            <p>Apple</p>
          </button>
        </div>
      </div>
    </section>
    <footer class="pie">
      <div class="copyright">
        &copy; 2023 Isaias Caballero | isaiascaballerojajaja@gmail.com
      </div>
    </footer>
  </main>
  <!-- finaliza version movil -->
  <!-- los js -->
  <script src="js/ventana_admin.js"></script>
  <script src="js/admin_menu.js"></script>
</body>

</html>
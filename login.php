<?php
// Iniciar la sesión
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
include("php/verificaciones.php");
?>
<!-- contenedor padre -->
<body class="container_padre">
  <!-- boton de exit -->
  <a class="exit" href="index.php"><img src="assets/asset/exit.svg" alt=""></a>
  <!-- section o contenedor del login -->
  <section class="container">
    <!-- encabezado o header -->
    <header class="encabezado">
      <!-- articulo del logo -->
      <article>
        <!-- logotipo -->
        <img src="assets/asset/logo.svg" alt="" srcset="">
      </article>
      <h3>Bienvenido</h3>
     
    </header>
    <main class="container-2">

    <!-- formulario del login -->
      <form  class="form_login"  action="" method="post">
        <input type="text" name="correo" placeholder="Correo electronico">
        <input type="password" name="contraseña" placeholder="Contraseña">

        <button type="submit" name="iniciar_sesion" >Iniciar sesion</button>
        <p>No tienes cuenta? <a href="register.php">Crear una</a></p>
      </form>
    </main>
  </section>
  <!-- LOS JAVASCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
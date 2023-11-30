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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/AgregarUsuario.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
</head>
<?php
include("php/AgregarUsuario.php");
?>
<!-- contenedor padre -->
<body class="container_padre">
  <!-- boton de exit -->
  <a class="exit" href="usuarios.php"><img src="assets/asset/exit.svg" alt=""></a>
  <!-- section o contenedor del login -->
  <section class="container">
    <!-- encabezado o header -->
    <header class="encabezado">
      <!-- articulo del logo -->
      <article>
        <!-- logotipo -->
        <img src="assets/asset/logo.svg" alt="" srcset="">
      </article>
      <h3>Nuevo Usuario</h3>
     
    </header>
    <main class="container-2">

    <!-- formulario del login -->
      <form  class="form_login"  action="" method="post">
      <input type="text" name="nombre" placeholder="Nombre" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>">
      <input type="text" name="apellido" placeholder="Apellido" value="<?php echo isset($_POST['apellido']) ? htmlspecialchars($_POST['apellido']) : ''; ?>">
      <input type="text" name="telefono" placeholder="Telefono" value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>">
      <input type="text" name="correo" placeholder="Correo Electronico" value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <button type="submit" name="registrar" >Agregar</button> 
      </form>
    </main>
  </section>
  <!-- LOS JAVASCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
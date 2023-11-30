<?php
// Conexión a la base de datos
// $conexion = mysqli_connect("localhost", "root", "", "viajes");
$conexion = mysqli_connect("localhost", "c1601882_isa", "keGOtude02", "c1601882_isa");

if(isset($_POST["usuarioEliminar"])) {
  $id = $_POST["usuarioEliminar"];

  if (!empty($id)) {
    $sql = "DELETE FROM users WHERE id_usuario = '$id'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
      // El usuario se eliminó correctamente
      $response = "Usuario eliminado con éxito.";
    } else {
      // Error al eliminar el usuario
      $response = "Error al eliminar el usuario.";
    }
  } else {
    // El ID del usuario está vacío
    $response = "ID de usuario no válido.";
  }

  echo $response;
}
?>

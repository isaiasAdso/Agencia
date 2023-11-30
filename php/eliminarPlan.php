
<?php
// Conexión a la base de datos
include('models/data_base.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener el ID del plan a eliminar desde el formulario
  $id_plan = $_POST["id_plan"];

  // SQL query para eliminar el plan
  $sql = "DELETE FROM plan WHERE id_plan=$id_plan";

  if (mysqli_query($conexion, $sql)) {
    echo "Plan eliminado exitosamente.";
  } else {
    echo "Error al eliminar el plan: " . mysqli_error($conexion);
  }
}
?>
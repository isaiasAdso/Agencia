<?php
// Conexión a la base de datos
include('models/data_base.php');
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data and perform basic validation
  $destino = trim($_POST["destino"]);
  $tipo_transporte = trim($_POST["tipo_transporte"]);
  $fecha_salida = trim($_POST["fecha_salida"]);
  $fecha_llegada = trim($_POST["fecha_llegada"]);
  $descripcion = trim($_POST["descripcion"]);
  $precio = trim($_POST["precio"]);
  $cupos = trim($_POST["cupos"]);
  $id_tplanes = trim($_POST["id_tplanes"]);

  // Perform server-side validation
  $errors = array();

  if (empty($destino)) {
    $errors[] = "El destino es obligatorio.";
  }

  if (empty($tipo_transporte)) {
    $errors[] = "El tipo de transporte es obligatorio.";
  }

  if (empty($fecha_salida)) {
    $errors[] = "La fecha de salida es obligatoria.";
  }

  if (empty($fecha_llegada)) {
    $errors[] = "La fecha de llegada es obligatoria.";
  }


  if (empty($descripcion)) {
    $errors[] = "La descripción es obligatoria.";
  }

  if (empty($precio) || !is_numeric($precio) || $precio <= 0) {
    $errors[] = "El precio debe ser un número mayor que 0.";
  }

  if (empty($cupos)) {
    $errors[] = "El cupo debe ser obligatorio";
  }

  if ($cupos > 50 || $cupos <= 0) {
    $errors[] = "Ingresa una cantidad entre 1 a 50";
  }

  if (empty($id_tplanes) || !is_numeric($id_tplanes) || $id_tplanes <= 0) {
    $errors[] = "El ID del tipo de plan debe ser un número mayor que 0.";
  }

  if (isset($_FILES['imagenn']) && $_FILES['imagenn']['error'] === UPLOAD_ERR_OK) {
      $imagen = $_FILES['imagenn']['name'];
      $temp = $_FILES['imagenn']['tmp_name'];
    } else {
      $errors[] = "Selecciona la imagen";  
    } 
  // If there are no validation errors, proceed with inserting the data into the database
  if (empty($errors)) {
    $estado = "disponible";
    // SQL query to insert data into the "plan" table
    $sql = "INSERT INTO plan (destino, tipo_transporte, fecha_salida, fecha_llegada, descripcion, precio, cupos, id_tplanes, estado, imagen)
            VALUES ('$destino', '$tipo_transporte', '$fecha_salida', '$fecha_llegada', '$descripcion', '$precio', '$cupos', '$id_tplanes', '$estado', '$imagen')";

    // Execute the SQL query
    if (mysqli_query($conexion, $sql)) {
      echo "Plan agregado exitosamente.";
      move_uploaded_file($temp,'../image/' .$imagen);
    } else {
      echo "Error al agregar el plan: " . mysqli_error($conexion);
    }
  } else {
    // If there are validation errors, print them out
    echo implode("<br>", $errors);
  }
}
?>

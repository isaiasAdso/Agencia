<?php
// Verificar si se enviaron los datos del formulario de edición
if (isset($_POST['id_plan'])) {
    // Conexión a la base de datos
    include('models/data_base.php');

    // Obtener los datos del formulario de edición
    $id = $_POST['id_plan'];
    $destino = $_POST['destino'];
    $tipo_transporte = $_POST['tipo_transporte'];
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_llegada = $_POST['fecha_llegada'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $id_tplanes = $_POST['id_tplanes'];

    // SQL query preparada para actualizar los datos del plan en la base de datos
    $sql = "UPDATE plan SET destino=?, tipo_transporte=?, fecha_salida=?, fecha_llegada=?, descripcion=?, precio=?, id_tplanes=? WHERE id_plan=?";

    // Preparar la consulta SQL
    $stmt = mysqli_prepare($conexion, $sql);

    // Vincular parámetros
    mysqli_stmt_bind_param($stmt, "ssssssii", $destino, $tipo_transporte, $fecha_salida, $fecha_llegada, $descripcion, $precio, $id_tplanes, $id);

    // Ejecutar la consulta preparada
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>  window.location.href = '../editarPlan.php'; </script>";
    } else {
        echo "Error al actualizar el plan: " . mysqli_error($conexion);
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
}
?>

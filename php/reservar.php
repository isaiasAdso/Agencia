<?php
session_start();
// guardar_datos.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'models/data_base.php';

    // Recuperar los datos del formulario
    $id_usuario = $_POST['usuario_plan'];
    $id_plan = $_POST['id_plan'];
    $fecha_reserva = date("Y-m-d"); // Fecha de reserva actual
    $cantidad_personas = $_POST['cupo_plan'];
    $total_plan = $_POST['total_plan'];

    if($id_usuario == null){
        echo  "login";
        exit();
    }


    // Insertar los datos en la base de datos (consulta preparada)
    $query = "INSERT INTO reservas (id_usuario, id_plan, fecha_reserva, cantidad_personas, total) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "issii", $id_usuario, $id_plan, $fecha_reserva, $cantidad_personas, $total_plan);

    $xam = mysqli_query($conexion, "INSERT INTO reservas (id_usuario, id_plan, fecha_reserva, cantidad_personas, total) VALUES 
    ('$id_usuario', '$id_plan', '$fecha_reserva', '$cantidad_personas', '$total_plan')");
    
    if ($xam) {
        echo "Reserva realizada correctamente";
    } 

}

?>


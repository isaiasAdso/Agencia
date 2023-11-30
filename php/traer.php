<?php
// Conexión a la base de datos
// $conexion = mysqli_connect("localhost", "root", "", "viajes");
$conexion = mysqli_connect("localhost", "c1601882_isa", "keGOtude02", "c1601882_isa");


if(isset($_POST["domett"])){
    $id = $_POST["domett"];

    $sql = "SELECT * FROM users WHERE id_usuario = $id ";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        while ($datos = mysqli_fetch_assoc($resultado)) {
            $data = array(
                "nombre" => $datos["nombre"],
                "apellido" => $datos["apellido"],
                "email" => $datos["email"],
                "contrasena" => $datos["contrasena"],
                "telefono" => $datos["telefono"]
            );
            
            // Convertir el array a formato JSON
            $jsonData = json_encode($data);
            
            // Mostrar el JSON resultante
            echo $jsonData;
        }
    }
}


?>
<?php
// la base de datos
include('models/data_base.php');

// Insertar el usuario
if (isset($_POST['registrar'])) {
    // Obtener los valores del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $contraseña = htmlspecialchars($_POST['contraseña']);
    $correo = htmlspecialchars($_POST['correo']);
    $id = 2;

    // Verificación del nombre
    if (preg_match('/^[\p{L}\p{M}\'\-\s]+$/u', $nombre)) {
        // Verificación del apellido
        if (preg_match('/^[\p{L}\p{M}\'\-\s]+$/u', $apellido)) {
            // Verificación del número telefónico
            if (preg_match('/^\+?[1-9]\d{1,14}$/', $telefono)) {
                // Verificación del correo electrónico
                if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    // Verificación de la contraseña
                    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/u', $contraseña)) {
                        // Consulta para insertar el nuevo usuario en la tabla correspondiente
                        $consulta = "INSERT INTO users (nombre, apellido, email, telefono, contrasena, id_rol) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$contraseña', '$id')";

                        // Ejecutar la consulta
                        if (mysqli_query($conexion, $consulta)) {
                            // El usuario se registró exitosamente
                            echo "<script>alert('Usuario registrado correctamente');</script>";
                        } else {
                            echo "<script>alert('Error al registrar usuario');</script>";
                        }
                    } else {
                        echo "<script>alert('La contraseña debe tener al menos 8 caracteres, incluir al menos una letra minúscula, una letra mayúscula y un dígito');</script>";
                    }
                } else {
                    echo "<script>alert('El correo electrónico no es válido');</script>";
                }
            } else {
                echo"<script>alert('El número telefónico debe ser válido y no contener caracteres especiales');</script>";
            }
        } else {
            echo "<script>alert('El apellido debe contener solo letras y caracteres especiales (apóstrofe, guion y espacio)');</script>";
        }
    } else {
        echo "<script>alert('El nombre debe contener solo letras y caracteres especiales (apóstrofe, guion y espacio)');</script>";
    }
}

?>
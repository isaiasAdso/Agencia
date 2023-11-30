<?php
// Verificar si se recibieron los datos por AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Obtener el ID de reserva enviado por AJAX
    if (isset($_POST['id_reserva'])) {
        $idReserva = $_POST['id_reserva'];
        // 
        // $conexion = mysqli_connect("localhost", "root", "", "viajes");
        $conexion = mysqli_connect("localhost", "c1601882_isa", "keGOtude02", "c1601882_isa");
        
        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        // Escapar el ID de reserva para evitar inyección SQL
        $idReserva = mysqli_real_escape_string($conexion, $idReserva);

        // Agregar un mensaje de depuración para verificar el ID de reserva recibido
        echo "ID de reserva recibido: " . $idReserva;

        // Ejecutar la consulta SQL para eliminar el plan de la base de datos
        $sql = "DELETE FROM reservas WHERE id_reserva = '$idReserva'";
        if (mysqli_query($conexion, $sql)) {
            // Si llegas hasta aquí, la eliminación fue exitosa
           
        } else {
            echo "Error al eliminar el plan: " . mysqli_error($conexion);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    } else {
        // Si no se recibió el ID de reserva, devuelve un mensaje de error.
        echo "Error: No se recibió el ID de reserva.";
    }
} else {
    // Si la solicitud no es por AJAX, redirecciona o devuelve un mensaje de error.
    echo "Error: Acceso no autorizado.";
}
?>

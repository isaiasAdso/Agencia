<?php
// La base de datos
include('models/data_base.php');
// condicional si es true
if(isset($_SESSION['id_usuario'])){
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM users WHERE id_usuario = $id";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado)>0) {
    $fila = mysqli_fetch_assoc($resultado);
        $nombre_usuario = $fila['nombre'];
        $apellido_usuario = $fila['apellido'];
        $email_usuario = $fila['email'];
        $telefono_usuario = $fila['telefono'];
        $rol = $fila['id_rol'];
}else{
    echo "<script>alert('El usuario no existe');</script>";
}

}else{
    echo "por favor inicie session";
}
?>
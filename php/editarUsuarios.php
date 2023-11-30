<?php
// Conexión a la base de datos
include('models/data_base.php');

// Consulta SQL para obtener los usuarios
$sql = "SELECT * FROM users";
$result = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Generar la estructura HTML del contenedor
    echo '<div class="usuarios-contenedor">';
    
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        $nombre = $row["id_usuario"];
        
        // Mostrar la información del usuario con un atributo de datos para el ID del usuario
        echo '<form method="post" class="editar_user">';
        echo '<article>'.$row["id_usuario"] . '</article>';
        echo '<label>' . $row["nombre"] . '</label>';
        echo '<label>' . $row["telefono"] . '</label>';
        echo '<input type="hidden" name="id" value="'.$row["id_usuario"].'">'; 
        // ... agregar más campos según tu estructura de tabla
        echo '<button    type="submit" name="editar">Editar</button>';
        echo '</form>';    
              
    }
    
    echo '</div>'; // Cerrar el contenedor
} else {
    echo "No se encontraron usuarios.";
}




//Mostrar ventana para editar

if(isset($_POST['editar'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM users WHERE id_usuario = '$id'";
    $result = mysqli_query($conexion, $sql);
    $persona =$result->fetch_assoc();

    echo'
    <form  class="form_login"  action="" method="post">
    <input type="text" name="nombre" placeholder="Nombre" value="'.  $persona['nombre'].'">
    <input type="hidden" name="idUser" value="'.$persona['id_usuario'].'">
    <input type="text" name="apellido" placeholder="Apellido"  value="'.  $persona['apellido'].'">
    <input type="text" name="telefono" placeholder="Telefono"  value="'.  $persona['telefono'].'">
    <input type="text" name="correo" placeholder="Correo Electronico"  value="'.  $persona['email'].'">
    <input type="password" name="contraseña" placeholder="Contraseña" value="'.  $persona['contrasena'].'">
    <button type="submit" name="guardarCambios" >Guardar cambios</button> 
    </form>
    ';


}


if(isset($_POST['guardarCambios'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $id = $_POST['idUser'];
    $actualizarUser = $conexion->query("UPDATE users SET nombre = '$nombre',  apellido = '$apellido  ', telefono= '$telefono', email= '$correo', contrasena= '$contraseña' WHERE id_usuario = $id" );
    if($actualizarUser){
        echo 'Cambios guardados correctamente';
    }else{
        echo'Algo paso';
    }
}
//Validar si se guardan los cambios

// Cerrar conexión
$conexion->close();
?>
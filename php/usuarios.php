<?php
// Conexión a la base de datos
include('models/data_base.php');

// Consulta SQL para obtener los usuarios
$sql = "SELECT * FROM users";
$result = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Generar la estructura HTML del contenedor
    echo '<div class="usuarios-container">';
    
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        $nombre = $row["id_usuario"];
        
        // Mostrar la información del usuario con un atributo de datos para el ID del usuario
        echo '<form data-form = "'.$row["id_usuario"] .'" class="usuario">';
        echo '<article>'.$row["id_usuario"] . '</article>';
        echo '<label>' . $row["nombre"] . '</label>';
        echo '<label>' . $row["telefono"] . '</label>';
        echo '<input type="hidden" name="domett" value="'.$row["id_usuario"].'">'; 
       
        // ... agregar más campos según tu estructura de tabla
        echo '<button  onclick="mostrarDatos()"  type="submit" name="ver">Ver</button>';
        echo '</form>';    
              
    }
    
    echo '</div>'; // Cerrar el contenedor
} else {
    echo "No se encontraron usuarios.";
}
// Cerrar conexión
$conexion->close();
?>
<?php
if (isset($_POST['editar'])) {
    $id = $_POST['id_plan'];

    // Obtener la lista de planes desde la base de datos
    $sql = "SELECT * FROM plan WHERE id_plan = '$id'";
    $result = mysqli_query($conexion, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $tp = $row['id_tplanes'];
        if ($tp === '1') {
            $tipo = 'Premium';
            $color = '#ff7114';
        } else {
            $tipo = 'Estandar';
            $color = 'black';
        }
        echo '
        <form id="editarPlanForm" method="post" action="php/editarPlan.php">
            <input type="hidden" name="id_plan" value="' . $id . '">
            <label for="destino">Destino:</label>
            <input type="text" name="destino" id="destino" value="' . $row['destino'] . '" required /><br>

            <label for="tipo_transporte">Tipo de transporte:</label>
            <input type="text" name="tipo_transporte" id="tipo_transporte" value="' . $row['tipo_transporte'] . '" required /><br>

            <label for="fecha_salida">Fecha de salida:</label>
            <input type="date" name="fecha_salida" id="fecha_salida" value="' . $row['fecha_salida'] . '" required /><br>

            <label for="fecha_llegada">Fecha de llegada:</label>
            <input type="date" name="fecha_llegada" id="fecha_llegada" value="' . $row['fecha_llegada'] . '" required /><br>

           
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required>' . $row['descripcion'] . '</textarea><br>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" value="' . $row['precio'] . '" required /><br>

            <label for="id_tplanes">ID del tipo de plan:</label>
            <input type="number" name="id_tplanes" id="id_tplanes" value="' . $row['id_tplanes'] . '" required /><br>
            <button class="cancelar" type="submit"><a  href="editarPlan.php">Cancelar</a></button>
            <button type="submit" >Guardar Cambios</button>
        </form>
        ';
    }
}
?>

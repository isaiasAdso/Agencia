<?php
// Iniciar la sesión
session_start();
?>
<?php
include("php/datos_users.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/eliminarUsuarios.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Usuarios</title>
</head>
<!-- contenedor padre -->

<body class="contenedor_padre">
    <!-- version movil -->
    <a class="agregarUser" href="agregarUsuario.php">
        <img src="assets/asset/mas.svg" alt="" srcset="">
    </a>
    <!-- home -->
    <a href="admin.php" class="home">
        <img src="assets/asset/casa.svg" alt="" srcset="">Inicio
    </a>
    <!-- contenedor principal -->
    <main class="container">

        <!-- encabezado o header -->
        <header class="encabezado">
            <!-- boton del menu -->
            <div class="btn_menu">
                <button class="boton-circular" onclick="mostrarObjeto()" type="submit">
                    <img src="assets/asset/menu-svgrepo-com.svg" alt="" srcset="" />
                </button>
            </div>

            <article class="perfilAdmin">
                <div class="column">
                    <h4>Nombre completo:</h4>
                    <p>
                        <?php echo $nombre_usuario; ?>
                    </p>
                </div>

                <div class="column">
                    <h4>Contacto:</h4>
                    <p>
                        <?php echo $telefono_usuario; ?>
                    </p>
                </div>

                <div class="column">
                    <a href="php/cerrar.php"><button type="submit">Cerrar sesión</button></a>
                </div>
            </article>

            <!-- contenedor del logo y itulo -->
            <div id="ban">
                <article>
                    <img src="assets/asset/logo.svg" alt="" srcset="" />
                </article>
                <h3>Agencia de viajes</h3>
            </div>
        </header>
        <section class="contenedorUsers">

            <!-- ... Tu código para la estructura de la página ... -->
            <?php
            // Conexión a la base de datos
            include('models/data_base.php');

            // Obtener la lista de planes desde la base de datos
            $sql = "SELECT * FROM plan";
            $result = mysqli_query($conexion, $sql);
            ?>

            <h2>Lista de Planes</h2>

            <table class="tabla_edit">
        <tr>
            <th>ID</th>
            <th>Destino</th>
            <th>Tipo Transporte</th>
            <th>Fecha salida</th>
            <th>Fecha llegada</th>
            <th>Tipo plan</th>
            <th>Precio</th>
            <th>Editar</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) {
            $tp = $row['id_tplanes'];
            if ($tp === '1') {
                $tipo = 'Premium';
                $color = '#ff7114';
            } else {
                $tipo = 'Estandar';
                $color = 'black';
            }
            echo '
            <tr>
                <td>' . $row['id_plan'] . '</td>
                <td>' . $row['destino'] . '</td>
                <td>' . $row['tipo_transporte'] . '</td>
                <td>' . $row['fecha_salida'] . '</td>
                <td>' . $row['fecha_llegada'] . '</td>
                <td style="color: ' . $color . '">' . $tipo . '</td>
                <td>' . $row['precio'] . '</td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id_plan" value="' . $row['id_plan'] . '">
                        <button type="submit" name="editar" class="editar-btn">Editar</button>
                    </form>
                </td>
            </tr>
            ';
        }
        ?>
    </table>
            <?php require_once 'php/editPlan.php'; ?>

  


        </section>
        <script>
    function cancelarEdicion() {
        // Redirigir o hacer alguna acción cuando se cancele la edición
        window.location.href = 'pagina_origen.php'; // Cambiar 'pagina_origen.php' por la página de origen del formulario
    }
</script>


        <footer class="pie">
            <div class="copyright">
                &copy; 2023 Isaias Caballero | isaiascaballerojajaja@gmail.com
            </div>
        </footer>
    </main>
    <script src="js/ventana_admin.js"></script>
    <script src="js/datos.js"></script>
</body>

</html>
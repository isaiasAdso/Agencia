<?php
// Iniciar la sesión
session_start();
// include('php/datos_users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="assets/css/misviajes.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/asset/logo.svg" type="image/x-icon" />
    <title>Agencia</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>




    <!-- encabezado -->
    <header class="encabezado">
        <div class="Titulo">
            <!-- boton hamburguesa de menu-celular -->
            <div class="btn_menu">
                <button class="boton-circular" onclick="mostrarObjeto()" type="submit">
                    <img src="assets/asset/menu-svgrepo-com.svg" alt="" srcset="" />
                </button>
            </div>
            <article><img src="assets/asset/logo.svg" alt="" srcset="" /></article>

            <h2>Agencia de viajes </h2>
        </div>
        <div>
            <!-- buscador inteligente -->
            <div class="buscador">
                <input type="text" class="busqueda" placeholder="Buscar..." />
                <button class="boton">Buscar</button>
            </div>
        </div>
        <!-- login para movil -->
        <div class="login-movil">
            <div class="Login_register2">
                <div id="iniciar"><a href="login.php">Iniciar Sesion </a></div>
                <div id="registrar"><a href="register.php">Registrarse</a></div>
            </div>
        </div>
        <!-- iniciar sesion pc -->
        <div class="Login_register">
            <div id="iniciar"><a href="login.php">Iniciar sesion</a> </div>
            <div id="registrar"><a href="register.php">Registrarse</a> </div>
            <!-- boton de pc -->
            <label class="btn_cerrar1"><a href="php/cerrar.php">cerrar</a></label>
        </div>

    </header>
    <aside class="container-nav">
        <nav class="menu">
            <ul>
                <li><a href="index.php" class="enlace">Inicio</a></li>
                <li><a href="ofertas.php" class="enlace">Ofertas y destinos</a></li>
                <li><a href="misviajes.php" class="enlace">Mis viajes</a></li>
                <li><a href="#" class="enlace">Nosotros</a></li>
            </ul>
        </nav>
        <!-- boton movil -->
        <label class="btn_cerrar2"><a href="php/cerrar.php">cerrar</a></label>

    </aside>


    <main class="contenedor-padre">
    <?php
require_once 'models/data_base.php';

if (isset($_SESSION['id_usuario'])) {
    $fernanfloo = $_SESSION['id_usuario'];
    $xem = mysqli_query($conexion, "SELECT * FROM reservas WHERE id_usuario = '$fernanfloo'");

    // Variable para indicar si se encontraron reservas
    $reservasEncontradas = false;

    if ($xem) {
        while ($a = mysqli_fetch_assoc($xem)) {
            $reservasEncontradas = true; // Actualizamos la variable si hay al menos una reserva
            $id_plan = $a["id_plan"];
            $cantidad_cupos = $a["cantidad_personas"];
            $totalidad = $a["total"];
            $id_reserva = $a["id_reserva"];

            $xem_plan = mysqli_query($conexion, "SELECT * FROM plan WHERE id_plan = '$id_plan'");
            if ($xem_plan) {
                while ($plan = mysqli_fetch_assoc($xem_plan)) {
                    $destino_plan = $plan["destino"];
                    $transporte = $plan["tipo_transporte"];
                    $fecha_de_viaje = $plan["fecha_salida"];

                    // Aquí puedes hacer algo con los datos del plan...

                    ?>
                    <form class="ticket-container" id="formularioTicket">
                        <h3 class="ticket-title">Destino:</h3>
                        <p class="ticket-text"><?php echo $destino_plan; ?></p>

                        <h3 class="ticket-title">Fecha de viaje:</h3>
                        <p class="ticket-text"><?php echo $fecha_de_viaje; ?></p>

                        <h3 class="ticket-title">Cupos:</h3>
                        <p class="ticket-text"><?php echo $cantidad_cupos; ?></p>

                        <h4 class="ticket-title">Tipo de transporte:</h4>
                        <p class="ticket-text"><?php echo $transporte; ?></p>

                        <h3 class="ticket-total-title">TOTAL DE PAGO:</h3>
                        <p class="ticket-total-amount"><?php echo $totalidad; ?></p>
                        <input type="hidden" name="id_reserva" value="<?php echo $id_reserva; ?>">
                        <input class="cancelar_plan" type="button" value="x">
                    </form>

                    <script>
                        $(document).ready(function() {
                            // Manejar el evento clic del botón "Cancelar plan"
                            $(".cancelar_plan").click(function() {
                                // Obtener el ID de reserva del formulario
                                var idReserva = $(this).siblings('input[name="id_reserva"]').val();

                                // Objeto con los datos que quieres enviar al servidor
                                var formData = {
                                    id_reserva: idReserva
                                };

                                // Realizar la solicitud AJAX para eliminar el plan
                                $.ajax({
                                    type: "POST", // Puedes cambiar esto a "GET" u otros métodos según tus necesidades
                                    url: "php/cancelar.php", // Reemplaza esto con la URL del script en el servidor que eliminará el plan
                                    data: formData,
                                    success: function(response) {
                                        // Manejar la respuesta del servidor en caso de éxito
                                        console.log("Respuesta del servidor:", response);
                                        // Hacer algo con la respuesta si es necesario, como mostrar un mensaje de éxito
                                        alert("El plan ha sido cancelado exitosamente.");
                                        // O recargar la página para actualizar la información
                                        location.reload();
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        // Manejar errores de la solicitud AJAX
                                        console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
                                        // Mostrar un mensaje de error si es necesario
                                        alert("Error al cancelar el plan. Por favor, inténtalo de nuevo más tarde.");
                                    }
                                });
                            });
                        });
                    </script>
        <?php
                }
            }
        }

        // Si no se encontraron reservas, muestra un mensaje
        if (!$reservasEncontradas) {
            ?>
            <div class="alert alert-warning">No tienes reservas</div>
            <?php
        }
    } else {
        // Ocurrió un error en la consulta
        echo "Error al obtener las reservas del usuario";
    }
} else {
    // El usuario no ha iniciado sesión
    // Redireccionar a la página de inicio de sesión
    ?>
    <div class="iniciar">Por favor inicia sesión</div>
<?php
    // header("Location: login.php");
    // Asegura que el script se detenga después de la redirección
}
?>


    </main>
    <footer class="pie">
        <div class="copyright">
            &copy; 2023 Isaias Caballero | isaiascaballerojajaja@gmail.com
        </div>
    </footer>

    <?php
    // Verificar si el usuario ha iniciado sesión
    $mostrarLogin = true;
    if (isset($_SESSION['id_usuario'])) {
        $mostrarLogin = false;
    }
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.matchMedia("(max-width: 720px)").matches) {
                var encabezado = document.querySelector(".encabezado");
                var loginMovil = document.querySelector(".login-movil");
                var btn_cerrar2 = document.querySelector(".btn_cerrar2");

                encabezado.classList.toggle("logged-in", <?php echo $mostrarLogin ? 'false' : 'true'; ?>);
                loginMovil.style.display = <?php echo $mostrarLogin ? '"flex"' : '"none"'; ?>;
                btn_cerrar2.style.display = <?php echo $mostrarLogin ? '"none"' : '"flex"'; ?>;
            }

            if (window.matchMedia("(min-width: 721px)").matches) {
                const loginRegisterDivs = document.querySelectorAll(".Login_register > div");
                const btn_cerrar1 = document.querySelector(".btn_cerrar1");

                loginRegisterDivs.forEach(function(element) {
                    element.style.display = <?php echo $mostrarLogin ? '"flex"' : '"none"'; ?>;
                });
                btn_cerrar1.style.display = <?php echo $mostrarLogin ? '"none"' : '"flex"'; ?>;
            }
        });
    </script>


    <!-- los js -->
    <script src="js/menu.js"></script>
</body>

</html>
<?php
// Iniciar la sesión
session_start();
// include('php/datos_users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="assets/css/ofertas.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/asset/logo.svg" type="image/x-icon" />
    <title>Agencia</title>
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
        $xam = mysqli_query($conexion, "SELECT * FROM plan");
        if ($xam) {
            while ($e = mysqli_fetch_assoc($xam)) {
                date_default_timezone_set('america/bogota');
                $fecha_restante_plan = null;
                $hora_actual = date("Y-m-d");
                $fecha_salida_plan = $e["fecha_salida"];
                $id_plan = $e["id_plan"];

                if (strtotime($fecha_salida_plan) <= strtotime($hora_actual)) {
                    $xum = mysqli_query($conexion, "UPDATE plan SET estado = 'ocupado' WHERE id_plan = '$id_plan'");
                    continue;
                } else {
                    $diferencia = strtotime($fecha_salida_plan) - strtotime($hora_actual);

                    $dias_restantes = ceil($diferencia / (60 * 60 * 24)); // Redondeamos hacia arriba para obtener el día actual también

                    $fecha_restante_plan = $dias_restantes;
                }


                $total_disponible = 0;
                $cupos_disponibles = 0;
                $xem = mysqli_query($conexion, "SELECT * FROM reservas WHERE id_plan = '$id_plan'");
                if ($xem) {
                    while ($a = mysqli_fetch_assoc($xem)) {
                        $cupos_disponibles += $a["cantidad_personas"];
                    }
                    if ($cupos_disponibles == $e["cupos"]) {
                        $xum = mysqli_query($conexion, "UPDATE plan SET estado = 'ocupado' WHERE id_plan = '$id_plan'");
                        continue;
                    }
                    $total_disponible = $e["cupos"] - $cupos_disponibles;
                }
        ?>
                <form id="form_plan_<?php echo $e["id_plan"]; ?>" class="plan" onsubmit="enviarFormulario(event, <?php echo $e["id_plan"]; ?>)">
                    <input type="hidden" name="usuario_plan" value="<?php if (isset($_SESSION['id_usuario'])) {
                                                                        echo $_SESSION['id_usuario'];
                                                                    } ?>">
                    <input type="hidden" name="id_plan" value="<?php echo $e["id_plan"]; ?> ">
                    <input type="hidden" name="fecha_plan" value="<?php echo $hora_actual; ?> ">

                    <img src="image/<?php echo $e["imagen"]; ?>" alt="Planes" class="image_plan">
                    <div class="informacion">
                        <div class="contenedor_plan">
                            <h3 class="time"> Tiempo restante: <?php echo $fecha_restante_plan; ?> dias</h3>
                            <div>
                                <h5>Tipo de transporte:</h5>
                                <p class="ciudad"><?php echo $e["tipo_transporte"]; ?></p>
                                <p class="tipo_plan" style="
                                 background-color: <?php
                                                    if ($e["id_tplanes"] == 1) {
                                                        echo "goldenrod";
                                                    } else {
                                                        echo "gainsboro";
                                                    }
                                                    ?>;
                                                    color: <?php
                                                            if ($e["id_tplanes"] == 1) {
                                                                echo "white";
                                                            } else {
                                                                echo "black";
                                                            }
                                                            ?>;


                                "><?php
                                    if ($e["id_tplanes"] == 1) {
                                        echo "premium";
                                    } else {
                                        echo "estandar";
                                    }
                                    ?></p>
                            </div>
                        </div>
                        <h3 class="city"> Nos dirigimos a :</h3>
                        <p class="ciudad"><?php echo $e["destino"]; ?></p>
                        <h3> fecha de salida:</h3>
                        <p class="ciudad"> <?php echo $e["fecha_salida"]; ?> </p>
                        <h5 class="descripcion"> <?php echo $e["descripcion"]; ?> </h5>

                    </div>
                    <div class="reserva">
                        <h4 class="titulo_reserva">Deseas Reservar este viaje?</h4>
                        <p class="text">Precio por persona desde:</p>
                        <h4 class="precio"> $<?php echo $e["precio"]; ?></h4>
                        <p class="cupos_disponibles">
                            Cupos disponibles (<?php echo $total_disponible; ?>)
                        </p>
                        <p class="text">¿Cuantos cupos deseas reservar?</p>
                        <section>
                            <div>
                                <p class="cupos">1</p>
                                <span>
                                    <p class="sumar" id="<?php echo $total_disponible; ?>">+</p>
                                    <p class="restar">-</p>
                                </span>
                            </div>
                        </section>
                        <p class="text">TOTAL:</p>
                        <p class="total"><?php echo $e["precio"]; ?></p>
                        <?php
                        if (isset($_SESSION['id_usuario'])) {
                            $fernanfloo = $_SESSION['id_usuario'];
                            $xim = mysqli_query($conexion, "SELECT * FROM reservas WHERE id_usuario = '$fernanfloo' and id_plan = '$id_plan'");
                            if (mysqli_num_rows($xim) > 0) {
                        ?>
                                <p class="texto_reservado">Reservado</p>
                            <?php
                            } else {
                            ?>
                                <input class="reserva_btn" type="submit" name="enviar_name" value="Reservar">
                            <?php
                            }
                        } else {
                            ?>
                            <input class="reserva_btn" type="submit" name="enviar_name" value="Reservar">

                        <?php
                        }
                        ?>


                    </div>


                </form><br>
        <?php
            }
        }
        ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const formularios = document.querySelectorAll('.plan');

        // Agregar el evento "input" a cada formulario
        formularios.forEach(formulario => {
            const sumar_restar = formulario.querySelectorAll("section>div>span>p");
            const cupo = formulario.querySelector(".cupos");
            const cont_total = formulario.querySelector(".total");
            const cont_precios = formulario.querySelector(".precio");
            const precio = parseFloat(cont_total.textContent);
            cont_total.textContent = precio.toLocaleString('es-CO');
            cont_precios.textContent = "$" + precio.toLocaleString('es-CO');

            sumar_restar.forEach(element => {
                element.addEventListener("click", function(event) {
                    var valor = 0;
                    const num_cupos = parseFloat(cupo.textContent);
                    const max = event.target.id;
                    tipo = event.target.classList.value;
                    console.log(tipo);
                    if (tipo.includes("sumar")) {
                        valor = num_cupos + 1;
                        if (valor > max) {
                            return;
                        }
                    } else {
                        valor = num_cupos - 1;
                        if (valor == 0) {
                            return;
                        }
                    }
                    cupo.textContent = valor;
                    const numero = precio * valor;
                    let resultado = numero.toLocaleString('es-CO');

                    cont_total.textContent = "$" + resultado;
                });
            });
        });
    </script>

    <script>
        function enviarFormulario(event, id_plan) {
            var form = $(`#form_plan_${id_plan}`);
            var formData = form.serialize();
            var total = form.find(".total").text();
            var cupos = form.find(".cupos").text();

            // Puedes agregar aquí validaciones adicionales si es necesario antes de enviar los datos al servidor
            formData += `&total_plan=${total}`;
            formData += `&cupo_plan=${cupos}`;

            $.ajax({
                url: 'php/reservar.php',
                type: 'POST',
                data: formData,
                success: function(data) {
                    // Puedes manejar la respuesta del servidor aquí (por ejemplo, mostrar un mensaje de éxito o error)
                    if (data == "login") {
                        alert("No has iniciado sesión, inicia!!");
                        window.location = 'login.php?rer';
                        return;
                    }
                    alert(data);
                },
                error: function(error) {
                    // Maneja cualquier error de la solicitud aquí
                    console.error('Error:', error);
                }
            });
        }
    </script>


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
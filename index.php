<?php
// Iniciar la sesión
session_start();
// include('php/datos_users.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="assets/css/style.css" />
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
    <div class="redes-sociales">
      <h3>Visitanos:</h3>
      <label class="whatsapp" type="submit"><a href="#"><img src="assets/image/WhatsApp_icon.png" alt="" srcset="" /></a></label>
      <label class="facebook" type="submit"><a href="#"><img src="assets/image/logo-facebook-png.png" alt="" srcset="" /></a></label>
      <label class="instagram" type="submit"><a href="#"><img src="assets/image/instagram-png.png" alt="" srcset="" /></a></label>
    </div>

    <section class="Informacion">
      <div>
        <img src="assets/asset/calendario.svg" alt="" srcset="" />
        <h3>09 de mayo 2023</h3>
      </div>
      <section class="infGeneral">
        <div>
          <h2>Porque agendar su viaje con nosotros?</h2>
        </div>
        <label for="" class="label-agencias">
          <img src="assets/image/1-agencias.jpg" alt="" srcset="" />
        </label>
        <p>
          - Los viajes son una oportunidad para explorar el mundo, descubrir
          nuevas culturas y crear recuerdos inolvidables. <br /><br />
          - En nuestra empresa, creemos que viajar es una experiencia única e
          inigualable que enriquece el alma y el espíritu. <br /><br />
          - Es por eso que nos apasiona brindar a nuestros clientes las
          mejores opciones para que puedan explorar destinos de ensueño,
          disfrutar de la gastronomía local, conocer gente nueva y sumergirse
          en aventuras emocionantes. <br /><br />
          - Nos dedicamos a planificar cada detalle de tu viaje para que
          puedas relajarte y disfrutar de una experiencia única y
          personalizada. <br /><br />
          - Con nosotros, tus sueños de viajar se hacen realidad.
        </p>
        <p>
          Según un estudio publicado por la Asociación Americana de
          Psicología, planificar y disfrutar de un viaje puede tener
          beneficios significativos para nuestra salud mental y bienestar
          emocional. Los resultados del estudio mostraron que las personas que
          planifican y disfrutan de viajes tienen niveles más bajos de estrés,
          una mayor sensación de felicidad y satisfacción en la vida, y una
          mayor sensación de conexión con sus amigos y familiares. Además, los
          beneficios emocionales y psicológicos de los viajes pueden durar
          meses después del regreso a casa. En resumen, ¡viajar puede ser
          bueno para la mente y el alma!
        </p>
        <h3>VENTAJAS DE PLANIFICAR UN VIAJE:</h3>
        <h4>1. Alivio del estrés:</h4>
        <p>
          Planificar un viaje permite a las personas tomar un descanso de la
          rutina diaria y desconectarse de las preocupaciones diarias. Además,
          el simple hecho de tener un viaje en mente puede proporcionar una
          sensación de anticipación y emoción, lo que puede disminuir el
          estrés y la ansiedad.
        </p>
        <h4>2. Incrementa la felicidad:</h4>
        <p>
          Investigaciones han demostrado que las personas que planifican y
          disfrutan de viajes tienen niveles más altos de felicidad y
          satisfacción en la vida. Además, el hecho de tener recuerdos de
          viajes placenteros puede ayudar a generar sentimientos positivos y a
          mantener el estado de ánimo elevado.
        </p>
        <h4>3. Fortalecimiento de las relaciones interpersonales:</h4>
        <p>
          Viajar con amigos, familiares o seres queridos puede fortalecer los
          lazos emocionales y fomentar la comunicación y la comprensión entre
          ellos. Además, compartir experiencias inolvidables en un ambiente
          nuevo y diferente puede mejorar la relación y el entendimiento
          mutuo.
        </p>
        <h4>4. Ampliación de perspectivas y experiencias:</h4>
        <p>
          Al viajar, las personas tienen la oportunidad de sumergirse en
          culturas diferentes, probar alimentos nuevos, descubrir sitios
          históricos y apreciar la belleza natural. Todo esto puede ayudar a
          desarrollar la empatía, la comprensión y la apreciación por otras
          culturas y formas de vida.
        </p>
        <h4>5. Desarrollo personal:</h4>
        <p>
          Viajar puede ayudar a desarrollar habilidades importantes como la
          adaptabilidad, la resolución de problemas y la comunicación en
          situaciones nuevas e imprevistas. Además, el simple hecho de
          enfrentarse a nuevas experiencias y desafíos puede aumentar la
          autoconfianza y la autoestima de las personas.
        </p>
      </section>
    </section>
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
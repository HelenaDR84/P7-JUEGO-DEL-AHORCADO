<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once "../src/words.php";
require_once "../src/functions.php";

// Comprobar si se ha enviado una letra desde el formulario
if (isset($_POST['letra'])) {
  $letra = strtolower($_POST['letra']);
  $letra = trim($letra);

  $oculta = isset($_SESSION['oculta']) ? $_SESSION['oculta'] : '';
  $intentos = isset($_SESSION['intentos']) ? $_SESSION['intentos'] : '';
  $letras_usadas = isset($_SESSION['letras_usadas']) ? $_SESSION['letras_usadas'] : array();
}

// Verificar si el juego ha terminado
if ($intentos <= 0) {
  // Si el usuario ha perdido, mostramos un mensaje y reiniciamos el juego
  echo "¡Has perdido! La palabra era {$_SESSION['palabra']}.<br>";
  reiniciar_juego();
} elseif ($oculta == $_SESSION['palabra']) {
  // Si el usuario ha ganado, mostramos un mensaje y reiniciamos el juego
  echo "¡Has acertado! La palabra correcta era {$_SESSION['palabra']}.<br>";
  reiniciar_juego();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style.css" />
  <title>P7 JUEGO DEL AHORCADO</title>
</head>

<body>
  <header class="header">
    <div class="navbar">
      <a href="https://factoriaf5.org/">Inicio</a>
      <a href="#news">Otros juegos</a>
      <a href="https://github.com/HelenaDR84">Contacto</a>
      <a href="#about">Acerca de</a>
    </div>
  </header>
  <main style="
      min-height: 100vh; 
        background-image: url('./img/backg_5.jpeg');
        background-size: cover;
      ">
    <div>
      <h1>EL AHORCADO<br /> Backend Edition</h1>
    </div>
    <div id="start-container" class="start-container">
      <p class="how-to-play-text">
        REGLAS DEL JUEGO<br /><br />
        Dispones de entre 4 y 8 fallos (según tu elección) para resolver la
        palabra.<br /><br />
        En esta edición practicaremos nuestros conocimientos sobre los
        lenguajes de Backend.<br /><br />
        No están todos pero sí la mayoría.<br /><br />
        ¡A por todas y suerte!
      </p>
      <button id="jugar" class="play-button">Jugar</button>
    </div>
    <div class="main-container">
      <div class="word-container">
        <h2>
          Un lenguaje de programación backend es:
          <span id="hidden-word"><?php mostrar_palabra($palabra, $oculta); ?></span>
        </h2>
      </div>
      <?php include "../src/game.php"; ?>
      <form action="index.php" method="post">
        <input type="text" name="letra" id="letra" maxlength="1" pattern="[a-zA-Z]" title="Por favor, introduce solo una letra, no números ni símbolos." />
        <input type="submit" value="Enviar" class="" />
        <input type="reset" value="Borrar" />
        <input type="range" id="Intentos" min="4" max="8" value="5" oninput="actualizarOutput()" />
        <label for="Intentos">Número de intentos: </label>
        <output id="valorIntentos">4</output>
        <input type="hidden" name="palabra" value="<?php echo $oculta; ?>" />
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>" />
        <?php mostrar_boton(); ?>
      </form>
    </div>
  </main>
  <footer>
    <p>©2024.Todos los derechos reservados</p>
  </footer>
  <script src="./index.js"></script>
</body>

</html>
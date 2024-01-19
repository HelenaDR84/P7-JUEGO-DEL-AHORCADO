<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once "../src/words.php";
require_once "../src/game.php";
require_once "../src/functions.php";


// Definir una función que compruebe e incluya un archivo
function comprobar_incluir($archivo)
{
  // Comprobar si el archivo existe
  if (file_exists($archivo)) {
    // Si existe, incluirlo y mostrar un mensaje
    include $archivo;
    echo "El archivo $archivo se ha incluido correctamente.";
  } else {
    // Si no existe, mostrar un mensaje de error
    echo "El archivo $archivo no se ha encontrado.";
  }
}

//Comprobar si se ha enviado una letra desde el formulario
if (isset($_POST['letra'])) {
  // Obtener la letra enviada y convertirla a minúscula
  $letra = strtolower($_POST['letra']);
  // Eliminar los posibles espacios en blanco que haya introducido el usuario
  $letra = trim($letra);

  // Verificar si las variables de sesión existen antes de usarlas
  $oculta = isset($_SESSION['oculta']) ? $_SESSION['oculta'] : '';
  $intentos = isset($_SESSION['intentos']) ? $_SESSION['intentos'] : '';
  $letras_usadas = isset($_SESSION['letras_usadas']) ? $_SESSION['letras_usadas'] : array();
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

<body style="
      background-image: url('./img/background_3.jpeg');
      background-size: cover;
    ">
  <header>
    <div>
      <h1>EL AHORCADO<br /><br />Backend Edition</h1>
    </div>
  </header>

  <main>
    <button id="jugar" class="play-button">Jugar</button>
    <div class="main-container">
      <h2>
        Un lenguaje de programación backend es:
        <?php echo $oculta; ?>
      </h2>
      <div id="teclado">
        <button id="a" onclick="comprobarletra('A')">A</button>
        <button onclick="comprobarletra('B')">B</button>
        <button onclick="comprobarletra('C')">C</button>
        <button onclick="comprobarletra('D')">D</button>
        <button onclick="comprobarletra('E')">E</button>
        <button onclick="comprobarletra('F')">F</button>
        <button onclick="comprobarletra('G')">G</button>
        <button onclick="comprobarletra('H')">H</button>
        <button onclick="comprobarletra('I')">I</button>
        <button onclick="comprobarletra('J')">J</button>
        <button onclick="comprobarletra('K')">K</button>
        <button onclick="comprobarletra('L')">L</button>
        <button onclick="comprobarletra('M')">M</button>
        <button onclick="comprobarletra('N')">N</button>
        <button onclick="comprobarletra('Ñ')">Ñ</button>
        <button onclick="comprobarletra('O')">O</button>
        <button onclick="comprobarletra('P')">P</button>
        <button onclick="comprobarletra('Q')">Q</button>
        <button onclick="comprobarletra('R')">R</button>
        <button onclick="comprobarletra('S')">S</button>
        <button onclick="comprobarletra('T')">T</button>
        <button onclick="comprobarletra('U')">U</button>
        <button onclick="comprobarletra('V')">V</button>
        <button onclick="comprobarletra('W')">W</button>
        <button onclick="comprobarletra('X')">X</button>
        <button onclick="comprobarletra('Y')">Y</button>
        <button onclick="comprobarletra('Z')">Z</button>
        <button id="espacio" onclick="comprobarLetra(' ')">____</button>

      </div>
      <form action="index.php" method="post">
        <input type="text" name="letra" id="letra" maxlength="1" />
        <input type="submit" value="Enviar" />
        <input type="reset" value="Borrar" />
        <input type="range" id="Intentos" min="3" max="6" value="5" oninput="actualizarOutput()" />
        <label for="Intentos">Número de intentos: </label>
        <output id="valorIntentos">3</output>
        <input type="hidden" name="oculta" value="<?php echo $oculta; ?>" />
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>" />
        <input type="hidden" name="letras_usadas" value="<?php echo $letras_usadas; ?>" />
      </form>
    </div>
  </main>

  <footer>
    <p>©2024.Todos los derechos reservados</p>
  </footer>
  <script src="./index.js"></script>
</body>

</html>
<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Definir una función que muestre el botón de reiniciar el juego
function mostrar_boton() {
    // Mostrar un botón para reiniciar el juego
    echo "<button id='reiniciar'class= 'restart-button'>Reiniciar</button>";
  }
  
  // Definir una función que muestre la palabra oculta con espacios entre cada letra
  function mostrar_palabra($palabra, $oculta) {
    // Recorrer cada letra de la palabra
    for ($i = 0; $i < strlen($palabra); $i++) {
      // Si la letra está en la palabra oculta, mostrarla
      if ($oculta[$i] != "_") {
        echo $oculta[$i] . " ";
      } else {
        // Si no, mostrar un guión bajo
        echo "_ ";
      }
    }
    // Añadir un salto de línea
    echo "<br>";
  }
  
  // Definir una función que compruebe el resultado del juego
  function comprobar_resultado($palabra, $oculta, $intentos) {
    // Si la palabra oculta es igual a la palabra, el usuario ha ganado
    if ($oculta == $palabra) {
      echo "¡Has acertado! La parabra correcta era $palabra.<br>";
      // Mostrar el botón de reiniciar el juego
      mostrar_boton();
    } else {
      // Si no, mostrar el número de intentos que le quedan
      echo "Te quedan $intentos intentos.<br>";
      // Si el número de intentos es cero, el usuario ha perdido
      if ($intentos == 0) {
        echo "¡Has perdido! La palabra era $palabra.<br>";
        // Mostrar el botón de reiniciar el juego
        mostrar_boton();
      }
    }
  }
  
  // Definir una función que actualice la palabra oculta con la letra que ha introducido el usuario
  function actualizar_palabra($palabra, $oculta, $letra) {
    // Recorrer cada letra de la palabra
    for ($i = 0; $i < strlen($palabra); $i++) {
      // Si la letra coincide con la letra de la palabra, sustituir el guión bajo por la letra
      if ($palabra[$i] == $letra) {
        $oculta[$i] = $letra;
      }
    }
    // Devolver la palabra oculta actualizada
    return $oculta;
  }  

  // Agregamos la función para reiniciar el juego
function reiniciar_juego() {
  // Reiniciamos las variables de sesión
  $_SESSION['palabra'] = '';
  $_SESSION['oculta'] = '';
  $_SESSION['intentos'] = 0;
  $_SESSION['letras_usadas'] = array();

  // Redirigimos al usuario a la página de inicio o donde prefieras
  header('Location: index.php');
  exit();
}

?>
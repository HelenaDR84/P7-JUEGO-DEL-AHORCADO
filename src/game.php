<?php

// Iniciar una sesión para guardar los datos del juego en el servidor
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once "words.php";
require_once "functions.php";

// Inicializar las variables de sesión si no existen
if (!isset($_SESSION['oculta'])) {
    $_SESSION['oculta'] = '';  // o cualquier valor inicial que desees
}
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = '';  // o cualquier valor inicial que desees
}
if (!isset($_SESSION['letras_usadas'])) {
    $_SESSION['letras_usadas'] = array();
}


// Comprobar si se ha enviado una letra desde el formulario
if (isset($_POST['letra'])) {
  // Obtener la letra enviada y convertirla a minúscula
  $letra = strtolower($_POST['letra']);
  // Eliminar los posibles espacios en blanco que haya introducido el usuario
  $letra = trim($letra);
  // Obtener la palabra oculta, el número de intentos y el array de letras usadas desde la sesión
  $oculta = $_SESSION['oculta'];
  $intentos = $_SESSION['intentos'];
  $letras_usadas = $_SESSION['letras_usadas'];
  // Comprobar que el usuario solo introduce una letra del alfabeto
  if (!preg_match("/^[a-z]$/", $letra)) {
    // Si no, mostrar un mensaje de error y pedir que introduzca solo una letra
    echo "Por favor, introduce solo una letra.<br>";
  } else {
    // Si sí, comprobar si la letra ya ha sido usada antes
    if (in_array($letra, $letras_usadas)) {
      // Si sí, mostrar un mensaje de error y pedir que introduzca otra letra
      echo "Ya has usado esa letra. Por favor, introduce otra letra.<br>";
    } else {
      // Si no, añadir la letra al array de letras usadas
      $letras_usadas[] = $letra;
      // Comprobar si la letra está en la palabra
      if (strpos($palabra, $letra) !== false) {
        // Si está, actualizar la palabra oculta con la letra
        $oculta = actualizar_palabra($palabra, $oculta, $letra);
      } else {
        // Si no, restar uno al número de intentos
        $intentos--;
      }
    }
  }
  // Guardar la palabra oculta, el número de intentos y el array de letras usadas en la sesión
  $_SESSION['oculta'] = $oculta;
  $_SESSION['intentos'] = $intentos;
  $_SESSION['letras_usadas'] = $letras_usadas;
  // Redirigir al usuario a la página index.php
  header("Location: index.php");
}

// Mostrar la palabra oculta
mostrar_palabra($palabra, $oculta);

// Comprobar el resultado del juego
comprobar_resultado($palabra, $oculta, $intentos);

?>

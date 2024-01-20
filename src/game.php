<?php
// Verifica si la sesión no está iniciada y la inicia si es necesario
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once "functions.php";
require_once "words.php";

// Comprobar si se ha enviado una letra desde el formulario
if (isset($_POST['letra'])) {
  $letra = strtolower(trim($_POST['letra']));

  $oculta = isset($_SESSION['oculta']) ? $_SESSION['oculta'] : '';
  $intentos = isset($_SESSION['intentos']) ? $_SESSION['intentos'] : '';
  $letras_usadas = isset($_SESSION['letras_usadas']) ? $_SESSION['letras_usadas'] : array();

  // Comprobar que el usuario solo introduce una letra del alfabeto
  if (!preg_match("/^[a-z]$/", $letra)) {
    echo "Por favor, introduce solo una letra.<br>";
  } elseif (in_array($letra, $letras_usadas)) {
    echo "Ya has usado esa letra. Por favor, introduce otra letra.<br>";
  } else {
    $letras_usadas[] = $letra;
    if (strpos(strtolower($_SESSION['palabra']), $letra) !== false) {
      $oculta = actualizar_palabra(strtolower($_SESSION['palabra']), $oculta, $letra);
    } else {
      $intentos--;
    }

    // Actualiza las variables de sesión
    $_SESSION['oculta'] = $oculta;
    $_SESSION['intentos'] = $intentos;
    $_SESSION['letras_usadas'] = $letras_usadas;

    exit();
  }
}
?>
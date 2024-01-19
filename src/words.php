<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$palabras = array ("php", "python", "ruby", "javascript", "java", "perl", "rust");
;

$palabra = strtoupper($palabras[array_rand($palabras)]);
$oculta = str_repeat("_", strlen($palabra));
$intentos = 8;


$_SESSION['palabra'] = $palabra;
$_SESSION['oculta'] = $oculta;
$_SESSION['intentos'] = $intentos;
?>

echo "Un lenguaje de backend es ".$palabra."."
?>
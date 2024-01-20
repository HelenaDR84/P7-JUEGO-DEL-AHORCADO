<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$palabras = array ("php", "python", "ruby", "javascript", "java", "perl", "rust");
;

$palabra = $palabras[array_rand($palabras)]; // La palabra se mantiene en minúsculas
$oculta = str_repeat("_", strlen($palabra)); // La palabra oculta se inicializa con guiones bajos
$intentos = 8;


$_SESSION['palabra'] = $palabra;
$_SESSION['oculta'] = $oculta;
$_SESSION['intentos'] = $intentos;


// echo "Un lenguaje de backend es ".$palabra."."

?>


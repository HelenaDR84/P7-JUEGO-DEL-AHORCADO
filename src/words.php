<?php

$palabras = array ("php", "python", "ruby", "javascript", "java", "perl", "rust");
;

$palabra = $palabras[array_rand($palabras)];
$oculta = str_repeat("_", strlen($palabra));
$intentos = 8;

echo "Un lenguaje de backend es ".$palabra."."
?>
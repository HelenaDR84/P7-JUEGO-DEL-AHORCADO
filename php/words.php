<?php

$palabras = array ("php", "python", "ruby", "javascript", "java", "perl", "rust");
echo "Un lenguaje de backend es ".$palabras[2].".";

$palabra = $palabras[array_rand($palabras)];

?>
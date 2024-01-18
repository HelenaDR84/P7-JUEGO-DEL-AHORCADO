<?php
include "php/game.php";
include "php/functions.php";
include "php/words.php";


if (file_exists("php/game.php")) {
    include "php/game.php";
    echo "El archivo game.php se ha incluido correctamente.";
  } else {
    echo "El archivo game.php no se ha encontrado.";
  }
?>
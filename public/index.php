<?php
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

?>

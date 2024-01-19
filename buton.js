let botonJugar = document.getElementById("jugar");
// Obtener el elemento div por su clase
let mainContainer = document.getElementsByClassName("main-container")[0];
// Añadir un evento onclick al botón
botonJugar.onclick = function() {
  // Cambiar el estilo del div a display: block
  mainContainer.style.display = "block";
  // Ocultar el botón
  botonJugar.style.display = "none";
};
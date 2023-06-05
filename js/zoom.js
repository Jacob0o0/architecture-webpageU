var contenedores = document.getElementsByClassName("carousel-item");

for (var i = 0; i < contenedores.length; i++) {
  contenedores[i].addEventListener("mousemove", function(event) {
    var contenedor = event.currentTarget;
    var imagen = contenedor.querySelector("#imagen");

    zoomImagen(event, contenedor, imagen);
  });

  contenedores[i].addEventListener("mouseleave", function(event) {
    var contenedor = event.currentTarget;
    var imagen = contenedor.querySelector("#imagen");

    restablecerZoom(imagen);
  });

  contenedores[i].addEventListener("mouseenter", function(event) {
    var contenedor = event.currentTarget;
    contenedor.style.cursor = "zoom-in";
  });

  contenedores[i].addEventListener("mouseleave", function(event) {
    var contenedor = event.currentTarget;
    contenedor.style.cursor = "default";
  });
}

function zoomImagen(event, contenedor, imagen) {
  var boundingRect = contenedor.getBoundingClientRect();
  var offsetX = event.clientX - boundingRect.left;
  var offsetY = event.clientY - boundingRect.top;
  var centerX = boundingRect.width / 2;
  var centerY = boundingRect.height / 2;
  var moveX = (centerX - offsetX) / centerX;
  var moveY = (centerY - offsetY) / centerY;

  imagen.style.transformOrigin = offsetX + "px " + offsetY + "px";
  imagen.style.transition = "transform 0.4s ease"; // Agregar animación suave
  imagen.style.transform = "scale(2) translate(" + moveX + "px, " + moveY + "px)";
}

function restablecerZoom(imagen) {
  imagen.style.transformOrigin = "center";
  imagen.style.transition = "transform 0.4s ease"; // Agregar animación suave
  imagen.style.transform = "scale(1) translate(0, 0)";
}

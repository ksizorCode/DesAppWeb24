
// MUESTRA LA INFO EN DIFERENTES FORMATOS DE VISUALIZACIÓN:
function cambiarVista(boton, vista) {
  let galeria = document.querySelector('#catalogo');
  let botones = document.querySelectorAll('.bntVista button');

  // Eliminar la clase 'activo' de todos los botones dentro de '.bntVista'
  botones.forEach(function(boton) {
    boton.classList.remove('activo');
  });

  // Agregar la clase 'activo' solo al botón clicado
  boton.classList.add('activo');

  // Eliminar todas las clases actuales de la galería
  galeria.classList.remove('galeria');
  galeria.classList.remove('lista');
  galeria.classList.remove('ficha');
  galeria.classList.remove('tabla');
  galeria.classList.remove('reticula');

  // Agregar la clase correspondiente según la opción seleccionada
  galeria.classList.add(vista);

  // lanzar función para asignar valores al slider
  resetearSlider(vista);
}




// /* CAMBIO TAMAÑO */
// document.addEventListener("DOMContentLoaded", function() {
//     let slider = document.getElementById("slider");
//     let lista = document.getElementById("catalogo");
  
//     // Evento para escuchar el cambio en el slider
//     slider.addEventListener("input", function() {
//       // Cambiar el ancho de los elementos li según el valor del slider
//       let value = this.value;
//       let lis = lista.getElementsByTagName("li");
//       for (let i = 0; i < lis.length; i++) {
//         lis[i].style.maxWidth = value + "px";
//         lis[i].style.width = value + "px";
//       }
//     });
//   });


// CAMBIA EL TAMAÑO DE LOS LI RESULTADOS EN FUNCIÓN DEL VALOR que le llega como parámetro
function cambiarTamanoSlider(value) {
  let lista = document.getElementById("catalogo");
  let lis = lista.getElementsByTagName("li");
  for (let i = 0; i < lis.length; i++) {
   // lis[i].style.maxWidth = value + "%";
    lis[i].style.width = value + "%";
    lis[i].style.minWidth = value + "%";
  }

  document.querySelector('#textoVistaValue').innerHTML=value+'%';

}

// ESCUCHA EL CAMBIO DEL SLIDER y pasa el valor a otra función
document.addEventListener("DOMContentLoaded", function() {
  let slider = document.getElementById("slider");
  
  slider.addEventListener("input", function() {
    let value = this.value;
    cambiarTamanoSlider(value); // Llama a la función para cambiar el tamaño
  });
});

// Ejemplo de cómo llamar a la función cambiarTamañoSlider con un valor específico
// cambiarTamañoSlider(100); // Esto cambiará el tamaño a 100px

/*   *   *   *   *   *   *   *   *   *   *   *   *   */

function resetearSlider(vista) {
  let slider = document.getElementById("slider");
  let valor = 0;
  slider.style.opacity = "100%";
  slider.disabled = false; // Desactiva el input range


  switch (vista) {
      case "galeria":
          // valor = 285;
          valor = 24;
          slider.style.display = "inline-block";
          let txt="Selecciones una vista:";
          break;

      case "lista":
          valor = 100;
          slider.style.display = "inline-block";
          break;

      case "tabla":
          valor = 100;
          slider.style.display = "inline-block";
          break;

      case "ficha":
          valor = 33;
          slider.style.display = "inline-block";
          break;

      case "reticula":
          valor = 10;
          slider.disabled = true; // Desactiva el input range
          slider.style.opacity = "50%";
          break;

      default:
          valor = 100;
          slider.style.display = "none";
          break;
  }
  document.querySelector('#textoVista').innerHTML=vista;

  slider.value = valor;
  cambiarTamanoSlider(valor);

// Obtener el elemento input range
//var rangeInput = document.getElementById("rangeInput");

// Cambiar el valor del input range a 75
// rangeInput.value = 5;

}

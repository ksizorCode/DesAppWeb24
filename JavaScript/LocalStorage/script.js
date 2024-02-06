// Función para agregar dinero a la variable almacenada en LocalStorage
function agregarDinero(cantidad) {
  // Obtener el valor actual de "dinero" en LocalStorage
  var dineroActual = localStorage.getItem("dinero");

  // Convertir a número o establecer en 0 si es la primera vez
  dineroActual = dineroActual ? parseFloat(dineroActual) : 0;

  // Sumar  la cantidad proporcionada como parámetro
  dineroActual += cantidad;

  // Almacenar el nuevo valor de "dinero" en LocalStorage
  localStorage.setItem("dinero", dineroActual);

  // Opcional: Puedes mostrar el nuevo valor en la consola o realizar otras acciones
  alert("Dinero actualizado: " + dineroActual + "€");
}

function comprar(precio, producto) {
  // Obtener el valor actual de "dinero" en LocalStorage
  var dineroActual = localStorage.getItem("dinero");

  // Convertir a número o establecer en 0 si es la primera vez
  dineroActual = dineroActual ? parseFloat(dineroActual) : 0;

  // Restar el coste del producto a dinero
  if (dineroActual >= precio) {
    dineroActual -= precio;
    alert(
      "Has comprado " + producto + " y ahora tienes: " + dineroActual + "€"
    );
  } else {
    alert(
      "No puedes comprar " +
        producto +
        " porque tienes " +
        dineroActual +
        "€ y esto cuesta " +
        precio +
        "€"
    );
  }
  // Almacenar el nuevo valor de "dinero" en LocalStorage
  localStorage.setItem("dinero", dineroActual);
}

function llave() {
  localStorage.setItem("llave", true);
  alert("🗝️ Has cogido la llave roñosa que lleva años en el fondo del sofá. Llava las manos anda...");
}

function abrirCofre() {
  var llave = localStorage.getItem("llave");

  console.log(llave);

  if (llave) {
    alert(
      "🔓 Abriste el cofre que lleva años cerrado en el sótano, y sólo tienes facturas por pagar"
    );
  } else {
    alert("🔒 El cofre está cerrado y necesitas una llave para abrirlo");
  }
}

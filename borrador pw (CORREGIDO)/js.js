document.addEventListener("DOMContentLoaded", function() {
    const galeriaArboles = document.getElementById("galeriaArboles");
    const inputBusqueda = document.getElementById("inputBusqueda");

  
    // Función para buscar árboles por ID de sensor
    function buscarArboles() {
      const terminoBusqueda = inputBusqueda.value.trim();
      const arbolesFiltrados = arboles.filter(arbol => arbol.idSensor === terminoBusqueda);
      mostrarGaleriaArboles(arbolesFiltrados);
    }
  
    // Buscar árboles cuando se presione Enter en el campo de búsqueda
    inputBusqueda.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        buscarArboles();
      }
    });
  
    // Buscar árboles cuando se haga clic en el botón de búsqueda
    botonBusqueda.addEventListener("click", buscarArboles);
});

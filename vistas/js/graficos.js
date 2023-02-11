
(async () => {
  // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
  const respuestaRaw = await fetch("../API/datosPersona.php");
  // Decodificar como JSON
  const respuesta = await respuestaRaw.json();
  // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
  // Obtener una referencia al elemento canvas del DOM
  const $grafica = document.querySelector("#grafica");
  const etiquetas = respuesta.labels; // <- Aquí estamos pasando el valor traído usando AJAX
  // Podemos tener varios conjuntos de datos. Comencemos con uno
  const datosUsuarios = {
      label: "Usuarios registrados por sexo",
      // Pasar los datos igualmente desde PHP
      data: respuesta.cantidades, // <- Aquí estamos pasando el valor traído usando AJAX
      backgroundColor:['rgba(236, 8, 22, 0.61)','rgba(8, 1, 144, 0.61)'], // Color de fondo
      borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
      borderWidth: 1, // Ancho del borde
  };
  new Chart($grafica, {
      type: 'bar', // Tipo de gráfica
      data: {
          labels: etiquetas,
          datasets: [
            datosUsuarios,
              // Aquí más datos...
          ]
      },
      options: {
          maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                    backdropPadding: {
                        x: 10,
                        y: 4
                    },
                      beginAtZero: true
                  }
              }],
          },
      }
  });
})();
    
  




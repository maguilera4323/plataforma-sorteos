
(async () => {
  // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
  const respuestaRaw = await fetch("../API/usuariosPorSexo.php");
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
      type: 'doughnut', // Tipo de gráfica
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


(async () => {
    // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
    const respuestaRaw = await fetch("../API/usuariosPorMes.php");
    // Decodificar como JSON
    const respuesta = await respuestaRaw.json();
    // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica2");
    const etiquetas = respuesta.mes; // <- Aquí estamos pasando el valor traído usando AJAX
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const datosUsuarios = {
        label: "Usuarios registrados",
        // Pasar los datos igualmente desde PHP
        data: respuesta.cantidades, // <- Aquí estamos pasando el valor traído usando AJAX
        backgroundColor:['rgba(4, 144, 211, 0.64)'], // Color de fondo
        borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
        borderWidth: 1, // Ancho del borde
    };
    new Chart($grafica, {
        type: 'line', // Tipo de gráfica
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

  (async () => {
    // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
    const respuestaRaw = await fetch("../API/usuariosPorEdad.php");
    // Decodificar como JSON
    const respuesta = await respuestaRaw.json();
    // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica3");
    const etiquetas = respuesta.nombre_mes; // <- Aquí estamos pasando el valor traído usando AJAX
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const datosUsuarios = {
        label: "Usuarios registrados",
        // Pasar los datos igualmente desde PHP
        data: respuesta.cantidades, // <- Aquí estamos pasando el valor traído usando AJAX
        backgroundColor:['rgba(249, 148, 85, 0.96)','rgba(154, 116, 190, 0.96)','rgba(76, 193, 234, 0.96)',
        'rgba(233, 67, 69, 0.86)'], // Color de fondo
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
    
  (async () => {
    // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
    const respuestaRaw = await fetch("../API/usuariosPorSexo.php");
    // Decodificar como JSON
    const respuesta = await respuestaRaw.json();
    // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica4");
    const etiquetas = respuesta.labels; // <- Aquí estamos pasando el valor traído usando AJAX
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const datosUsuarios = {
        label: "Usuarios registrados",
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




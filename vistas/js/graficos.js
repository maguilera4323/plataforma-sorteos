// Obtener una referencia al elemento canvas del DOM
var ctx=document.getElementById('grafica')

var grafica=new Chart(ctx, {
    type: 'bar',
    data: {
      datasets: [{
        label: 'Usuario Registrados por Sexo',
        backgroundColor:['red','blue'],
        borderColor:['black'],
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  })
  
  let url='../API/datosPersona.php'
  fetch(url)
    .then(response=>response.json())
    .then(datos=>mostrar(datos))
    .catch(error=>console.log(error))
    
    const mostrar=(personas)=>{
        personas.forEach(element => {
            grafica.data['labels'].push(element.sexo)
            grafica.data['datasets'][0].data.push(element.total)
        });
    }
    ;
    
  




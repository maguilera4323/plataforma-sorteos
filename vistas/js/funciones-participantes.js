//funcion de carrusel
const carousel = document.querySelector(".carousel");
const carouselContainer = document.querySelector(".carousel__container");
const prevButton = document.querySelector(".carousel__button--prev");
const nextButton = document.querySelector(".carousel__button--next");

let counter = 0;
const size = carouselContainer.children[0].clientWidth;

carouselContainer.style.transform = `translateX(-${counter * size}px)`;

nextButton.addEventListener("click", () => {
  if (counter >= carouselContainer.children.length - 1) return;
  counter++;
  carouselContainer.style.transform = `translateX(-${counter * size}px)`;
});

prevButton.addEventListener("click", () => {
  if (counter <= 0) return;
  counter--;
  carouselContainer.style.transform = `translateX(-${counter * size}px)`;
});

setInterval(() => {
  if (counter >= carouselContainer.children.length - 1) {
    counter = 0;
  } else {
    counter++;
  }
  carouselContainer.style.transform = `translateX(-${counter * size}px)`;
}, 3000);



//funciones para cantidad de boletos comprados

function aumentar(){ 
    let valorActual = document.getElementById("cantidad").value;
    let nuevoValor = parseInt(valorActual) + 1;
  
    document.getElementById("cantidad").value = nuevoValor;
  
}

function disminuir(){ 
  let valorActual = document.getElementById("cantidad").value;

  //validacion que comprueba que no exista un valor menor de cero en el input
  if(valorActual>=1){
    let nuevoValor = parseInt(valorActual) - 1;
    document.getElementById("cantidad").value = nuevoValor;
  } 
  
}


//funcion para verificar que las contraseñas ingresadas durante el registro sean iguales
function validarContrasenas() {
  const password1 = document.getElementById('contrasena_autoregistro');
  const password2 = document.getElementById('conf_contrasena');
  const message = document.getElementById('message');

  password2.addEventListener('input', () => {
    if (password1.value === password2.value) {
      message.textContent = 'Contraseñas iguales';
      message.style.color = 'green';
      message.style.display = 'block';
    } else {
      message.textContent = 'Las contraseñas no coinciden';
      message.style.color = 'red';
      message.style.display = 'block';
    }
  });
}

validarContrasenas(); // llamada a la función


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
function decrementValue(){
    var value = parseInt(document.getElementById('cantidad').value, 10);
    value = isNaN(value) ? 1 : value;
    value--;
    document.getElementById('cantidad').value = value;
}


function incrementValue(){
    var value = parseInt(document.getElementById('cantidad').value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    document.getElementById('cantidad').value = value;
}
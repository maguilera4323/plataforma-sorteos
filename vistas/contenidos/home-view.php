<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>


<div class="container carousel">
  <div class="carousel__container">
    <img src="<?php echo SERVERURL?>vistas/assets/img/Diunsa.jpg" width="400" height="300" alt="Imagen 1">
    <img src="<?php echo SERVERURL?>vistas/assets/img/Pizza.jpg" width="400" height="300" alt="Imagen 2">
  </div>
  <button class="carousel__button carousel__button--prev">&#10094;</button>
  <button class="carousel__button carousel__button--next">&#10095;</button>
</div>

<br>

<a href="<?php echo SERVERURL?>compra-boleto/" class="btn btn-primary">COMPRAR</a>

<?php
	include "./vistas/inc/footer.php";
?>





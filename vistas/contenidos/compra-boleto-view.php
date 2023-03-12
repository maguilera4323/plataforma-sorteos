<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

  <form method="POST" >
    <section class="form-boleto">
        <div class='imagen-redonda'>
              <img src="../vistas/assets/img/Carrito.png" >
        </div>
        <label for="cantidad">Sorteo Numero: </label><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" class="cantidad"min="1" value="1" required>
        <button type="button" onclick="aumentar()" class="btn btn-outline-primary">+</button>
        <button type="button" onclick="disminuir()" class="btn btn-outline-primary">-</button>
        <br>
        <br>
        <div id="paypal-button-container"> </div>
    </section>
</form>
<br>






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
        <input type="number" id="cantidad" min="1" value="1" required>
        <br>
        <br>
            <div id="paypal-button-container"> </div>
    </section>
</form>
<br>

<?php
	include "./vistas/inc/footer.php";
?>




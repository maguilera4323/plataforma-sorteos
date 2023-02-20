<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>


<form method="POST" >
      <section class="form-boleto">
        <div class ='imagen-redonda'>
          <img src="<?php echo SERVERURL?>vistas/assets/img/Carrito.png" >
          </div>
          <label for="cantidad">Sorteo Numero: </label><br>
          <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="1" min="1" max="10" required>
                <input type="button" value="-" onclick="decrementValue()">
                <input type="button" value="+" onclick="incrementValue()">

          <button class="buttons" type="submit" name="Pagar">PAGAR</button>
        </section>

    </form>

<?php
	include "./vistas/inc/footer.php";
?>




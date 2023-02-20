<?php
	include "./vistas/inc/NavbarInicio.php";
?>

<div id="inicio">
    <section class="boton-inicio" style="background-image: url('../vistas/assets/img/Ganadores.jpg')">
            <a href="<?php echo SERVERURL?>login/"><button class= "button1" type="submit" >PARTICIPAR</button></a>
    </section>

<div class="container carousel">
    <div class="carousel__container">
        <img src="<?php echo SERVERURL?>vistas/assets/img/Diunsa.jpg" width="400" height="300" alt="Imagen 1">
        <img src="<?php echo SERVERURL?>vistas/assets/img/Pizza.jpg" width="400" height="300" alt="Imagen 2">
    </div>
    <button class="carousel__button carousel__button--prev">&#10094;</button>
    <button class="carousel__button carousel__button--next">&#10095;</button>
</div>

    <section class="botones-abajo">
        <div class="container">
            <h2>INFORMACION ADICIONAL</h2>

            <div class="cards">
                <div class="text-card">
                    <h3>¿Quienes somos?</h3>
                    <p>Lo que sea que vaya aqui :)</p>
                </div>


                <div class="text-card">
                    <h3>¿Quienes ganan los premios?</h3>
                    <p>Lo que sea que vaya aqui :)</p>
                </div>


                <div class="text-card">
                    <h3>¿Cuales son los premios?</h3>
                    <p>Lo que sea que vaya aqui :)</p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
	include "./vistas/inc/footer.php";
?>
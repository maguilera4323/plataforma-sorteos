<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<div class="main-contenedor">

    <h1 class="nombre-vista" style="justify-content:center;">Gráfica de líneas</h1>
    <div class="row graph">
        <div class="col">
            <canvas id="grafica"></canvas>
        </div>
        <div class="col">
            <canvas id="grafica2"></canvas>
        </div>
    </div>
    <br>
    <div class="row graph">
        <div class="col">
            <canvas id="grafica"></canvas>
        </div>
        <div class="col">
            <canvas id="grafica2"></canvas>
        </div>
    </div>
    

</div>






<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include ("./DatosTablas/obtenerDatos.php");
?>

<div class="container dashboard-contenedor">

<div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <a href="<?php echo SERVERURL?>usuarios/">
            <div class="card-body">
            <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->contarRegistros('usuarios');
                foreach ($resultado as $fila){
                    $cantidad_usuarios=$fila['contar_registros'];
                }
            ?>
                <h5 class="card-title text-center"> <?php echo $cantidad_usuarios;?> </h5>
                <h5 class="card-title text-center">Usuarios</h5>
                <h5 class="card-title text-center">Registrados</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <a href="<?php echo SERVERURL?>usuarios/">
            <div class="card-body">
            <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->contarRegistros('boletos');
                foreach ($resultado as $fila){
                    $cantidad_boletos=$fila['contar_registros'];
                }
            ?>
                <h5 class="card-title text-center"> <?php echo $cantidad_boletos;?> </h5>
                <h5 class="card-title text-center">Boletos</h5>
                <h5 class="card-title text-center">Registrados</h5>
            </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <a href="<?php echo SERVERURL?>sorteos/">
            <div class="card-body">
            <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->contarRegistros('sorteos');
                foreach ($resultado as $fila){
                    $cantidad_sorteos=$fila['contar_registros'];
                }
            ?>
                <h5 class="card-title text-center"> <?php echo $cantidad_sorteos;?> </h5>
                <h5 class="card-title text-center">Sorteos</h5>
                <h5 class="card-title text-center">Registrados</h5>
            </div>
        </a>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
        <a href="<?php echo SERVERURL?>premios/">
            <div class="card-body">
            <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->contarRegistros('premios');
                foreach ($resultado as $fila){
                    $cantidad_premios=$fila['contar_registros'];
                }
            ?>
                <h5 class="card-title text-center"> <?php echo $cantidad_premios;?> </h5>
                <h5 class="card-title text-center">Premios</h5>
                <h5 class="card-title text-center">Registrados</h5>
            </div>
        </a>
        </div>
    </div>
</div>
</div>

<!-- <div class="container grafica-contenedor">
    <canvas id="grafica">
</canvas> -->
</div>






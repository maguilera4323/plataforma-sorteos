<?php
require_once("./modelos/prueba.php");

$mensaje=new Prueba();
$datos=$mensaje->mostrarMensaje('mensaje',1);
foreach ($datos as $fila){
    $mensaje=$fila['mensaje'];
}

echo $mensaje;
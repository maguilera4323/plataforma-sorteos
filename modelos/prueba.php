<?php
require_once("./conexion.php");

class Prueba extends ConexionBD{
    public function mostrarMensaje($tabla,$indice){
        $this->getConexion();
        $sql="SELECT * FROM mensajes WHERE id_mensaje='$indice'";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

}
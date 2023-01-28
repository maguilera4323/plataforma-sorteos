<?php
require_once("./config/conexion.php");

class obtenerDatosPremios extends ConexionBD{

    public function datosPremios(){
        $this->getConexion();
        $sql="SELECT p.id_premio, p.id_sorteo, s.nombre_sorteo, p.nombre_premio, p.foto_premio from premios p
        inner join sorteos s on s.id_sorteo=p.id_sorteo";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
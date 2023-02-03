<?php
require_once("./config/conexion.php");

class obtenerDatosPremios extends ConexionBD{

    public function datosPremios(){
        $this->getConexion();
        $sql="SELECT p.id_premio, p.id_sorteo, p.id_empresa,s.nombre_sorteo, p.nombre_premio, p.cantidad_disponible,
        p.foto_premio,e.nombre_empresa from premios p
        inner join sorteos s on s.id_sorteo=p.id_sorteo
        inner join empresas e on e.id_empresa=p.id_empresa";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
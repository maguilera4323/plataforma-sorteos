<?php
require_once("./config/conexion.php");

class obtenerDatosSorteos extends ConexionBD{

    public function datosSorteos(){
        $this->getConexion();
        $sql="SELECT s.id_sorteo, s.id_empresa, e.nombre_empresa, s.nombre_sorteo, s.fecha_realizacion,
        s.cantidad_boletos,s.estado_sorteo from sorteos s
        inner join empresas e on e.id_empresa=s.id_empresa";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
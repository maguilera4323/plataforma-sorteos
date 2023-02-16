<?php
require_once("./config/conexion.php");

class obtenerDatosTablas extends ConexionBD{

    public function datosTablas($tabla){
        $this->getConexion();
        $sql="SELECT * FROM $tabla";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function contarRegistros($tabla){
        $this->getConexion();
        $sql="SELECT count(*) as contar_registros FROM $tabla";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function datosBitacora(){
        $this->getConexion();
        $sql="SELECT b.id_modulo, b.fecha, b.id_usuario, b.accion, b.descripcion, m.modulo, u.usuario 
        FROM bitacora b
        inner join modulos m on m.id_modulo=b.id_modulo
        inner join usuarios u on u.id_usuario=b.id_usuario
        order by fecha desc";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
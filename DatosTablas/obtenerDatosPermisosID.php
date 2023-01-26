<?php
require_once("./config/conexion.php");

class obtenerDatosPermisosID extends ConexionBD{

    public function datosPermisosID($id_rol,$id_mod){
        $this->getConexion();
        $sql="SELECT * FROM permisos where id_rol='$id_rol' and id_modulo='$id_mod'";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
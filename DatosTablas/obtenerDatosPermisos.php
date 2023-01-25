<?php
require_once("./config/conexion.php");

class obtenerDatosPermisos extends ConexionBD{

    public function datosPermisos(){
        $this->getConexion();
        $sql="SELECT r.rol, m.modulo,p.tipo_modulo, p.permiso_insercion, p.permiso_actualizacion,
        p.permiso_eliminacion, p.permiso_consulta,p.id_rol,p.id_modulo FROM permisos p
        inner join roles r on r.id_rol=p.id_rol
        inner join modulos m on m.id_modulo=p.id_modulo";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
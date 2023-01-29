<?php
require_once("./config/conexion.php");

class obtenerDatosEmpleados extends ConexionBD{

    public function datosEmpleados(){
        $this->getConexion();
        $sql="SELECT u.id_usuario, u.id_persona, u.id_rol, u.usuario, p.nombres, p.apellidos,
        u.estado,r.rol, u.correo_electronico from usuarios u
        inner join roles r on r.id_rol=u.id_rol
        inner join personas p on p.id_persona=u.id_persona";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function contarUsuarios(){
        $this->getConexion();
        $sql="SELECT id_usuario from usuarios";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
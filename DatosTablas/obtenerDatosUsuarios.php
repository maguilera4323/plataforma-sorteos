<?php
require_once("./config/conexion.php");

class obtenerDatosUsuarios extends ConexionBD{

    public function datosEmpleados(){
        $this->getConexion();
        $sql="SELECT u.id_usuario, u.id_persona, u.id_rol, u.usuario, p.nombres, p.apellidos, u.estado,r.rol, 
        u.correo_electronico,p.dni, p.telefono,p.sexo,p.direccion from usuarios u
        inner join roles r on r.id_rol=u.id_rol
        inner join personas p on p.id_persona=u.id_persona
        where u.id_rol!=3";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function datosParticipantes(){
        $this->getConexion();
        $sql="SELECT u.id_usuario, u.id_persona, u.id_rol, u.usuario, p.nombres, p.apellidos, u.estado,r.rol, 
        u.correo_electronico,p.dni, p.telefono,p.sexo,p.direccion from usuarios u
        inner join roles r on r.id_rol=u.id_rol
        inner join personas p on p.id_persona=u.id_persona
        where u.id_rol=3";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function contarUsuarios(){
        $this->getConexion();
        $sql="SELECT id_usuario from usuarios";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function datosPerfil($id){
        $this->getConexion();
        $sql="SELECT u.id_usuario, u.id_persona, u.id_rol, u.usuario, p.nombres, p.apellidos, u.estado,r.rol, 
        u.correo_electronico,p.dni, p.telefono,p.sexo,p.direccion from usuarios u
        inner join roles r on r.id_rol=u.id_rol
        inner join personas p on p.id_persona=u.id_persona
        where u.id_usuario='$id'";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
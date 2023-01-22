<?php
require_once("./config/conexion.php");

class obtenerDatosEmpleados extends ConexionBD{

    public function datosEmpleados(){
        $this->getConexion();
        $sql="SELECT e.id_empleado, e.id_rol, e.usuario,e.nombre_empleados,e.estado_empleado,r.rol, e.correo_electronico 
        from empleados e
        inner join roles r on r.id_rol=e.id_rol";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
<?php

if($peticionAjax){
	require_once "../config/conexion.php";
}else{
	require_once "./config/conexion.php";
}


class bitacora extends ConexionBD{
    private $datos;

    function getDatos() {
        return $this->datos;
    }

    function setDatos($datos) {
        $this->datos = $datos;
    }    

    public function guardar_bitacora($datos){
        $sql=ConexionBD::getConexion()->prepare("INSERT INTO bitacora(id_modulo, fecha, id_usuario, accion, descripcion)
        VALUES (?,?,?,?,?)" );
        $sql->bindParam(1,$datos['id_modulo']);
        $sql->bindParam(2,$datos['fecha']);
        $sql->bindParam(3,$datos['id_usuario']);
        $sql->bindParam(4,$datos['accion']);
        $sql->bindParam(5,$datos['descripcion']);
        $sql->execute();
        return $sql;
    }
}
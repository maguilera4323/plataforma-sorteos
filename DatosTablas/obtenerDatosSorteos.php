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

    public function boletosComprados($id){
        $this->getConexion();
        $sql="SELECT b.id_boleto, b.id_usuario, b.id_sorteo, u.usuario, s.nombre_sorteo,
        b.numero_boleto,b.fecha_compra from boletos b
        inner join usuarios u on u.id_usuario=b.id_usuario
        inner join sorteos s on s.id_sorteo=b.id_sorteo
        where b.id_sorteo='$id'
        order by b.numero_boleto desc";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
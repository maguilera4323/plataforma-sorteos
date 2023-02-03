<?php
require_once("./config/conexion.php");

class obtenerDatosSorteos extends ConexionBD{

    public function datosSorteos(){
        $this->getConexion();
        $sql="SELECT id_sorteo, nombre_sorteo, rango_inicial, rango_final, estado_sorteo from sorteos";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function boletosComprados($id){
        $this->getConexion();
        $sql="SELECT b.id_boleto, b.id_usuario, b.id_sorteo, p.nombres,p.apellidos, p.dni, s.nombre_sorteo,
        b.numero_boleto,b.fecha_compra, u.id_persona from boletos b
        inner join usuarios u on u.id_usuario=b.id_usuario
        inner join sorteos s on s.id_sorteo=b.id_sorteo
        inner join personas p on p.id_persona=u.id_persona
        where b.id_sorteo='$id'
        order by b.numero_boleto desc";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }
    
}
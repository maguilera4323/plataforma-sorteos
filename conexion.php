<?php

class ConexionBD{
    protected $manejador = "mysql";
    private static $servidor = "localhost";
    private static $usuario = "root";
    private static $pass = "";
    protected $db_name = "sistema_inventario";
    protected $conexion;

    protected function getConexion(){
        try{
            $parametros=array(PDO::ATTR_PERSISTENT=>true,PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
            $this->conexion=new PDO($this->manejador.":host=".self::$servidor.";dbname=".$this->db_name,self::$usuario,self::$pass,$parametros);
            /* echo 'Conectado exitosamente a la BD'; */
            return $this->conexion;
        }
        catch(PDOException $e){
            echo 'Error en la conexion a la BD :'.$e->getMessage();
        }
    }
}
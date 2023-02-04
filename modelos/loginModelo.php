<?php
require_once("./config/conexion.php");

class Usuario extends ConexionBD{

    public function obtenerContrasenaHash($user) {
		$this->getConexion();
        $sql="SELECT contrasena FROM usuarios WHERE usuario = '".$user. "' LIMIT 1";
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	}

    public function accesoUsuario($user,$password){
        $this->getConexion();
        $sql="SELECT u.id_usuario, u.usuario, u.estado,u.id_rol,r.rol FROM usuarios u
        inner join roles r on r.id_rol=u.id_rol
        WHERE usuario='$user' AND contrasena='$password' AND estado!=4";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
    }

    public function verificaUsuarioExistente($email) {
		$this->getConexion();
		$sql="SELECT * FROM usuarios WHERE BINARY correo_electronico = '".$email. "' LIMIT 1";
        $resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	}

  /*   public function verificarEstado($user) {
		$this->getConexion();
		$sql = "SELECT usuario, estado_usuario FROM usuarios WHERE usuario = '".$user. "' LIMIT 1";
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	} */

    /* public function intentosValidos() {
		$this->getConexion();
		$sql = "SELECT valor FROM parametros WHERE parametro = 'ADMIN_INTENTOS_INVALIDOS' LIMIT 1";
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	}

    public function bloquearUsuario($user) {
		$this->getConexion();
		$sql= ("UPDATE usuarios SET estado_usuario=3 WHERE usuario = '$user'");
		$resultado=$this->conexion->query($sql) or die ($sql);
        return $resultado;
	} */
}
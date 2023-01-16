<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
   session_start();
}
require_once ("./modelos/loginModelo.php");

class loginUsuarios extends Usuario{

    public function accesoSistema($datos){
        $usuario=$datos['usuario'];
        $contrasena=$datos['password'];
        $array=array();

        //se obtiene el hash de la contraseña para validar el inicio de sesion
		$recuperarHash=new Usuario();
		$hash_BD = $recuperarHash->obtenerContrasenaHash($usuario);
			foreach($hash_BD as $fila){
				$hash=$fila['contrasena'];
			}

      if (password_verify($contrasena, $hash)){
			$verificarDatos = new Usuario(); //se crea una instancia en el archivo modelo de Login
			$respuesta = $verificarDatos->accesoUsuario($usuario, $hash); //datos recibidos del archivo modelo de Login
			foreach ($respuesta as $fila) {
				$array['id'] = $fila['IdUsuario'];
				$array['nombre'] = $fila['NombreUsuario'];
				$array['usuario'] = $fila['usuario'];
         }

            if(isset($array['nombre'])){
                  // session_start();
                  //datos que se envian para uso del sistema
                        $_SESSION['id_login']=$array['id'];
                        $_SESSION['usuario_login']=$array['usuario'];
                        $_SESSION['nombre_usuario']=($array['nombre']);
                        $_SESSION['token_login']=md5(uniqid(mt_rand(),true));
                        return header("Location:".SERVERURL."home/");
                     die();
                  }
                
   }
}

    //funcion encargada de redirigir al login siempre que se detecte que no hay una sesion activa 
    public function forzarCierreSesionControlador(){
         session_unset();
         session_destroy();
         if(headers_sent()){
            return "<script> window.location.href='".SERVERURL."inicio/'; </script>";
         }else{
            return header("Location:".SERVERURL."inicio/");
         }
   }
}
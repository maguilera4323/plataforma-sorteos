<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
   session_start();
}
require_once ("./modelos/loginModelo.php");
require_once "./controladores/emailControlador.php";

class loginUsuarios extends Usuario{

    public function accesoSistema($datos){
        $usuario=ConexionBD::limpiar_cadena(strtoupper($datos['usuario']));
        $contrasena=ConexionBD::limpiar_cadena($datos['password']);
        $array=array();
        $hash='';

        //se obtiene el hash de la contraseña para validar el inicio de sesion
		$recuperarHash=new Usuario();
		$hash_BD = $recuperarHash->obtenerContrasenaHash($usuario);
			foreach($hash_BD as $fila){
				$hash=$fila['contrasena'];
			}

      if(password_verify($contrasena, $hash)){
			$verificarDatos = new Usuario(); //se crea una instancia en el archivo modelo de Login
			$respuesta = $verificarDatos->accesoUsuario($usuario, $hash); //datos recibidos del archivo modelo de Login
			foreach ($respuesta as $fila) {
				$array['id'] = $fila['id_usuario'];
				$array['usuario'] = $fila['usuario'];
            $array['estado'] = $fila['estado'];
            $array['id_rol'] = $fila['id_rol'];
            $array['rol'] = $fila['rol'];
         }
            //validacion en caso de encontrar un usuario en la base de datos
            if(isset($array['usuario'])){
               //validacion del estado del usuario
               //si es Activo puede ingresar al sistema, de no ser asi se vuelve a redirigir al login
               switch ($array['estado']){
						case 'Activo':
                     /* validacion para revisar si el usuario que busca ingresar al sistema
                     es un encargado del sistema o participante de los sorteos */
                        if($array['rol']=='PARTICIPANTE'){
                        //datos que se envian para uso del sistema
                        $_SESSION['id_login']=$array['id'];
                        $_SESSION['usuario_login']=$array['usuario'];
                        $_SESSION['estado']=$array['estado'];
                        $_SESSION['rol'] = $array['rol'];
                        $_SESSION['id_rol'] = $array['id_rol'];
                        $_SESSION['token_login']=md5(uniqid(mt_rand(),true));
                        return header("Location:".SERVERURL."home/");
                     }else{
                        //datos que se envian para uso del sistema
                        $_SESSION['id_login']=$array['id'];
                        $_SESSION['usuario_login']=$array['usuario'];
                        $_SESSION['estado']=$array['estado'];
                        $_SESSION['rol'] = $array['rol'];
                        $_SESSION['id_rol'] = $array['id_rol'];
                        $_SESSION['token_login']=md5(uniqid(mt_rand(),true));
                        return header("Location:".SERVERURL."dashboard/");
                     }
							break;
							case 'Inactivo':
								$_SESSION['respuesta'] = 'Usuario inactivo';
								return header("Location:".SERVERURL."login/");
							break;
							case 'Bloqueado':
								$_SESSION['respuesta'] = 'Usuario bloqueado';
								return header("Location:".SERVERURL."login/");
							break; 
						die();
					   }  
               }
            }else{
               //si no existe el usuario y la contraseña en la base de datos
               $_SESSION['respuesta'] = 'Datos incorrectos';
               return header("Location:".SERVERURL."login/");
               die();
               }
   }


   //función que se encarga de validar el usuario ingresado para la recuperacion de contraseña
		public function verificaUsuarioExistente($email){
			$correoEnviado=ConexionBD::limpiar_cadena($email);
			$array=array();

			$verificarUsuario = new Usuario(); //se crea una instancia en el archivo modelo de Login
			$respuesta = $verificarUsuario->verificaUsuarioExistente($correoEnviado);
			foreach ($respuesta as $fila) { 
				$array['usuario'] = $fila['usuario'];
				$array['estado'] = $fila['estado'];
			}

			//Se valida si el usuario no está inactivo para realizar la recuperacion de contraseña
			if (isset($array['usuario'])>0){
				//se revisa la existencia del usuario y el metodo de recuperacion seleccionado
						$_SESSION['usuario_rec']=$array['usuario'];
						$_SESSION['respuesta'] = 'Correo enviado';
						$agg_correo = new Correo(); 
      				$respuesta = $agg_correo->enviarCorreo($correoEnviado);
                  return "<script> window.location.href='".SERVERURL."recuperacion-clave/'; </script>";
					die();
			}else{
				$_SESSION['respuesta'] = 'Usuario no existe';
				return header("Location:".SERVERURL."recuperacion-clave/");
				die();
			}
		}



    //funcion encargada de redirigir al login siempre que se detecte que no hay una sesion activa
    //o que no esten identificados todos los datos de sesion que deberian estar 
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
<?php
	
	class vistasModelo{

		/*--------- Modelo obtener vistas ---------*/
		protected static function obtener_vistas_modelo($vistas){

			$listaBlanca=["home","empleados","empresas","sorteos","premios","usuarios","roles","modulos","permisos","salir"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vistas=="inicio" || $vistas=="index" || $vistas=="login" || $vistas=="recuperacion-clave"){
				switch($vistas){
					case 'inicio':
						$contenido="inicio";
					break;
					case 'index':
						$contenido="index";
					break;
					case 'login':
						$contenido="login";
					break;
					case 'recuperacion-clave':
						$contenido="recuperacion-clave";
					break;
				}

			}elseif($vistas=="inicio" || $vistas=="index" || $vistas=="login" || $vistas=="recuperacion-clave"){
				$contenido="inicio";

			}else{
				$contenido="404";				
			}
			return $contenido;
		}
	}
<?php
	
	class vistasModelo{

		/*--------- Modelo obtener vistas ---------*/
		protected static function obtener_vistas_modelo($vistas){

			$listaBlanca=["home","empleados","participantes","empresas","sorteos","boletos","premios","usuarios",
			"roles","modulos","permisos","salir","dashboard","configuracion"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vistas=="inicio" || $vistas=="index" || $vistas=="login" || $vistas=="recuperacion-clave" || $vistas=="registro"
			|| $vistas=="verifica-codigo" || $vistas=="cambio-contrasena"){
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
					case 'registro':
						$contenido="registro";
					break;
					case 'verifica-codigo':
						$contenido="verifica-codigo";
					break;
					case 'cambio-contrasena':
						$contenido="cambio-contrasena";
					break;
				}

			}elseif($vistas=="inicio" || $vistas=="index" || $vistas=="login" || $vistas=="recuperacion-clave" || $vistas=="registro"
			|| $vistas=="verifica-codigo" || $vistas=="cambio-contrasena"){
				$contenido="inicio";

			}else{
				$contenido="404";				
			}
			return $contenido;
		}
	}
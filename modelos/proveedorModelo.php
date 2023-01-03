<?php
	
	require_once "../config/conexion.php";

	class proveedorModelo extends ConexionBD{

		/*--------- Modelo agregar proveedor ------ESTE ES EL QUE INTERACTUA DIRECTO CON LA BD---*/
		protected function agregar_proveedor_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO proveedores(nom_proveedor,rtn_proveedor,
			tel_proveedor,correo_proveedor,dir_proveedor)
			VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['nombre']);
			$sql->bindParam(2,$datos['rtn']);
			$sql->bindParam(3,$datos['telefono']);
			$sql->bindParam(4,$datos['correo']);
			$sql->bindParam(5,$datos['direccion']);
			$sql->execute();
			return $sql;
			

											
		}

		
		
	}
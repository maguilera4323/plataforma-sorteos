<?php
	
	require_once "../config/conexion.php";

	class rolModelo extends ConexionBD{

		protected function agregarRolModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO roles(rol,descripcion,creado_por,fecha_creacion)
			VALUES(?,?,?,?)");

			$sql->bindParam(1,$datos['nom']);
			$sql->bindParam(2,$datos['desc']);
			$sql->bindParam(3,$datos['creado_por']);
			$sql->bindParam(4,$datos['fecha_creacion']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarRolModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE roles SET rol=?,descripcion=?,modificado_por=?,
			fecha_modificacion=? WHERE id_rol=?");

			$sql->bindParam(1,$dato['nom']);
			$sql->bindParam(2,$dato['desc']);	
			$sql->bindParam(3,$dato['modif_por']);
			$sql->bindParam(4,$dato['fecha_modif']);
			$sql->bindParam(5,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminarRolModelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM roles where id_rol=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

	}

<?php
	
	require_once "../config/conexion.php";

	class permisoModelo extends ConexionBD{

		protected function agregarPermisoModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO permisos(id_rol,id_modulo,tipo_modulo,permiso_insercion,
			permiso_actualizacion,permiso_eliminacion, permiso_consulta, creado_por,fecha_creacion)VALUES(?,?,?,?,?,?,?,?,?)");

			$sql->bindParam(1,$datos['rol']);
			$sql->bindParam(2,$datos['mod']);
			$sql->bindParam(3,$datos['tipo']);
			$sql->bindParam(4,$datos['ins']);
			$sql->bindParam(5,$datos['act']);
			$sql->bindParam(6,$datos['eli']);
			$sql->bindParam(7,$datos['cons']);
			$sql->bindParam(8,$datos['creado_por']);
			$sql->bindParam(9,$datos['fecha_creacion']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarPermisoModelo($dato,$id_rol,$id_mod){
			$sql=ConexionBD::getConexion()->prepare("UPDATE permisos SET permiso_insercion=?,permiso_actualizacion=?,
			permiso_eliminacion=?, permiso_consulta=?, modificado_por=?, fecha_modificacion=? WHERE id_rol=? and id_modulo=?");

			$sql->bindParam(1,$dato['ins']);
			$sql->bindParam(2,$dato['act']);
			$sql->bindParam(3,$dato['eli']);
			$sql->bindParam(4,$dato['cons']);
			$sql->bindParam(5,$dato['modif_por']);
			$sql->bindParam(6,$dato['fecha_modif']);
			$sql->bindParam(7,$id_rol);
			$sql->bindParam(8,$id_mod);
			$sql->execute();
			return $sql;
		}



		protected function eliminarPermisoModelo($id_rol,$id_mod){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM permisos where id_rol=? and id_modulo=?");
				
			$sql->bindParam(1,$id_rol);
			$sql->bindParam(2,$id_mod);
			$sql->execute();
			return $sql;
		}

	}

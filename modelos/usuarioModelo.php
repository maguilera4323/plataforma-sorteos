<?php
	
	require_once "../config/conexion.php";

	class usuarioModelo extends ConexionBD{

		protected function agregar_usuario_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO usuarios(usuario,nombre_usuario,estado_usuario,
			contrasena,id_rol,correo_electronico,foto_usuario,creado_por,fecha_creacion)
			VALUES(?,?,?,?,?,?,?,?,?)");

			$sql->bindParam(1,$datos['usuario']);
			$sql->bindParam(2,$datos['nom']);
			$sql->bindParam(3,$datos['est']);
			$sql->bindParam(4,$datos['cont']);
			$sql->bindParam(5,$datos['rol']);
			$sql->bindParam(6,$datos['correo']);
			$sql->bindParam(7,$datos['imagen']);
			$sql->bindParam(8,$datos['usuario']);
			$sql->bindParam(9,$datos['fecha_creacion']);
			$sql->execute();
			return $sql;								
		}

		protected function agregar_inv_insumo_modelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO inventario(cant_existencia)
			VALUES(?)");
			$sql->bindParam(1,$datos['cant']);
			$sql->execute();
			return $sql;						
		}




		protected function actualizar_insumo_modelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE insumos SET nom_insumo=?,categoria=?,cant_max=?,
			cant_min=?, unidad_medida=? WHERE id_insumo=?");

			$sql->bindParam(1,$dato['nombre']);
			$sql->bindParam(2,$dato['cat']);	
			$sql->bindParam(3,$dato['cant_max']);			
			$sql->bindParam(4,$dato['cant_min']);			
			$sql->bindParam(5,$dato['unid']);
			$sql->bindParam(6,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminar_insumo_modelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM insumos where id_insumo=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

		
		
	}
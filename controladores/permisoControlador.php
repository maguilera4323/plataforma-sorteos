<?php

if($peticionAjax){
	require_once "../modelos/permisoModelo.php";
}else{
	require_once "./modelos/permisoModelo.php";
}


class permisoControlador extends permisoModelo{

	
	public function agregarPermiso(){
		$rol=ConexionBD::limpiar_cadena(strtoupper($_POST['rol_nuevo']));
		$modulo=ConexionBD::limpiar_cadena(strtoupper($_POST['modulo_nuevo']));

		$query=ConexionBD::consultaComprobacion("SELECT tipo_modulo FROM modulos WHERE id_modulo='$modulo'");
		foreach ($query as $fila) {
			$tipo_modulo=$fila['tipo_modulo'];
		}

		//condicionales para agregar los valores de los permisos
		//si no recibieron ningún valor se dejan en cero, lo que indica que no fueron seleccionados
		//y por lo tanto el permiso no fue otorgado
		$insertar_permiso=(!isset($_POST['insertar_permiso'])) ? 0 : 1;
		$actualizar_permiso=(!isset($_POST['actualizar_permiso'])) ? 0 : 1;
		$eliminar_permiso=(!isset($_POST['eliminar_permiso'])) ? 0 : 1;
		$consultar_permiso=(!isset($_POST['consultar_permiso'])) ? 0 : 1;

		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_permiso_reg=[
				"rol"=>$rol,
				"mod"=>$modulo,
				"tipo"=>$tipo_modulo,
				"ins"=>$insertar_permiso,
				"act"=>$actualizar_permiso,
				"eli"=>$eliminar_permiso,
				"cons"=>$consultar_permiso,
				"fecha_creacion"=>$creacion,
				"creado_por"=>$creado_por
			];

			$agregar_permiso=permisoModelo::agregarPermisoModelo($datos_permiso_reg);

			if($agregar_permiso->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Permiso Registrado",
					"Texto"=>"Los datos del permiso han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de guardar el nuevo permiso",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarPermiso(){	
		//condicionales para actualizar los valores de los permisos
		//si no recibieron ningún valor se dejan en cero, lo que indica que no fueron seleccionados
		//y por lo tanto el permiso no fue otorgado
		$insertar_permiso=(!isset($_POST['insertar_permiso_act'])) ? 0 : 1;
		$actualizar_permiso=(!isset($_POST['actualizar_permiso_act'])) ? 0 : 1;
		$eliminar_permiso=(!isset($_POST['eliminar_permiso_act'])) ? 0 : 1;
		$consultar_permiso=(!isset($_POST['consultar_permiso_act'])) ? 0 : 1;

		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');
		$id_modulo_actualizar=ConexionBD::limpiar_cadena($_POST['modulo_id']);
		$id_rol_actualizar=ConexionBD::limpiar_cadena($_POST['modulo_id']);

					
		//arreglo enviado al modelo para ser usado en una sentencia INSERT
		$datos_permiso_act=[
			"ins"=>$insertar_permiso,
			"act"=>$actualizar_permiso,
			"eli"=>$eliminar_permiso,
			"cons"=>$consultar_permiso,
			"fecha_modif"=>$modificacion,
			"modif_por"=>$modif_por
		];

			$actualizar_permiso=permisoModelo::actualizarPermisoModelo($datos_permiso_act,$id_modulo_actualizar,$id_rol_actualizar);

			if($actualizar_permiso->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Permiso Actualizado",
					"Texto"=>"Los datos del permiso han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de actualizar la información del permiso",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarPermiso(){
			$id_rol=ConexionBD::limpiar_cadena(($_POST['id_rol_del']));
			$id_modulo=ConexionBD::limpiar_cadena(($_POST['id_mod_del']));
			$array=array();
			$valor='';
		
		$eliminarPermiso=permisoModelo::eliminarPermisoModelo($id_rol,$id_modulo);
			if($eliminarPermiso->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Permiso Eliminado",
					"Texto"=>"El permiso seleccionado fue eliminado",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un problema al momento de eliminar el permiso seleccionado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}

}


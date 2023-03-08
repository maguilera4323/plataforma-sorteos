<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['cantidad']) || isset($_POST['modulo_act']) || isset($_POST['id_mod_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/boletoControlador.php";
		$ins_boleto = new boletoControlador();

		if(isset($_POST['cantidad'])){
			//la variable cantidad_boletos es la que se recibe de la vista de boletos
			//esta variable será usada para la implementacion de un ciclo en el controlador
			$_SESSION['cantidad_boletos']=$_POST['cantidad'];
			echo $ins_boleto->agregarBoleto();
			die();			
		}

	}

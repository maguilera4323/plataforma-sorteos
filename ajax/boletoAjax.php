<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['cantidad']) || isset($_POST['modulo_act']) || isset($_POST['id_mod_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/boletoControlador.php";
		$ins_boleto = new boletoControlador();

		if(isset($_POST['cantidad']) ){
			echo $ins_boleto->agregarBoleto();
			die();
		}

	}

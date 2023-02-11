<?php

$conexion=mysqli_connect('localhost','root','','dbsorteo');
mysqli_set_charset($conexion, "utf8");
$valor=1;
$labels=array();
$cantidades=array();

$labels=['Masculino','Femenino'];

while($valor<3){
	$query="SELECT count(*) as contar_personas FROM personas where sexo=$valor";
	$resultado=mysqli_query($conexion,$query);

	while($fila=mysqli_fetch_array($resultado)){
		$cantidades[$valor-1]=$fila['contar_personas'];
	}
	$valor++;
}

$respuesta=[
	"labels"=>$labels,
	"cantidades"=>$cantidades,
];

echo json_encode($respuesta);

	
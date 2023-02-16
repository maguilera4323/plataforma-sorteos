<?php

$conexion=mysqli_connect('localhost','root','','dbsorteo');
mysqli_set_charset($conexion, "utf8");
$valor=1;
$labels=array();
$cantidades=array();

$labels=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre',
'Octubre','Noviembre','Diciembre'];

while($valor<4){
	$query="SELECT count(MONTH(fecha_creacion)) as contar_personas FROM usuarios where (MONTH(fecha_creacion))=$valor";
	$resultado=mysqli_query($conexion,$query);

	while($fila=mysqli_fetch_array($resultado)){
		$cantidades[$valor-1]=$fila['contar_personas'];
		$nombre_mes[$valor-1]=$labels[$valor-1];
	}
	$valor++;
}

$respuesta=[
	"cantidades"=>$cantidades,
	"mes"=>$nombre_mes,
];

echo json_encode($respuesta);

	
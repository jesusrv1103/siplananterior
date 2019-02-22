<?php
session_start();
require("../config.php");
require("../conexion.php");

$conn = new bd_conexion();
$conexion = $conn->conectar(1);
$medidas = $conexion->query("SELECT id_tipo_unidad, nombre FROM tipo_unidad_prog01 WHERE id_unidad = ".$_POST['unidad']) or die ($conexion->error);
$data = array();
while($medida = $medidas->fetch_array()){
	array_push($data,array($medida[0],$medida[1]));
}
$conexion->close();
unset($conexion);
unset($conn);

echo json_encode($data);
?>

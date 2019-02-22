<?php
session_start();
require("../config.php");
require("../conexion.php");

$conn = new bd_conexion();
$conexion = $conn->conectar(1);
$responsable = $conexion->query("SELECT u_responsable, titular FROM u_responsable WHERE id_u_responsable = ".$_POST['id_responsable']) or die ($conexion->error);
$data = $responsable->fetch_array();
$conexion->close();
unset($conexion);
unset($conn);

echo json_encode($data);
?>

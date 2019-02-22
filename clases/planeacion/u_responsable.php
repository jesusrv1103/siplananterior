<?php
session_start();
require("../config.php");
require("../conexion.php");



$conn = new bd_conexion();
$conexion = $conn -> conectar(1);
$consulta_u_responsables = $conexion->query("SELECT id_u_responsable,u_responsable FROM u_responsable WHERE id_dependencia = ".$_POST['dependencia']) or die ($conexion->error);
$u_responsables = array();
while($res_u_responsable = $consulta_u_responsables->fetch_array()){
    array_push($u_responsables,array($res_u_responsable[0],$res_u_responsable[1]));
}
$conexion->close();
unset($conexion);
unset($conn);

echo json_encode($u_responsables);
?>

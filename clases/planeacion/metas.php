<?php
session_start();
require("../config.php");
require("../conexion.php");
$conn = new bd_conexion();
$conexion = $conn->conectar(1);
$metas = $conexion->query("SELECT enero_m, febrero_m, marzo_m, abril_m, mayo_m, junio_m, julio_m, agosto_m, septiembre_m, octubre_m, noviembre_m, diciembre_m FROM metas WHERE id_accion = ".$_POST['id_actividad']) or die ($conexion->error);
$meta = $metas->fetch_array();
$conexion->close();
unset($conexion);
unset($conn);
$c = new bd_conexion();
$conect = $c->conectar(1);
$acciones = $conect->query("SELECT descripcion FROM acciones WHERE id_accion = ".$_POST['id_actividad']) or die($conect->error);
$accion = $acciones->fetch_array();
$conect->close();
unset($conect);
unset($c);
$data = array();
array_push($data, $accion[0]);
array_push($data, $meta[0]);
array_push($data, $meta[1]);
array_push($data, $meta[2]);
array_push($data, $meta[3]);
array_push($data, $meta[4]);
array_push($data, $meta[5]);
array_push($data, $meta[6]);
array_push($data, $meta[7]);
array_push($data, $meta[8]);
array_push($data, $meta[9]);
array_push($data, $meta[10]);
array_push($data, $meta[11]);
echo json_encode($data);
?>
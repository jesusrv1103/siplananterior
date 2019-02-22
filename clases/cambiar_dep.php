<?php
session_start();


if($_SESSION['id_perfil'] != 2){

    require("config.php");
    require ("conexion.php");
    $conexion = $conn->conectar(1);
    $consulta_dep = $conexion->query("SELECT id_dependencia,nombre,acronimo FROM dependencias WHERE id_dependencia = ".$_POST['dep']);
    $resultado = $consulta_dep->fetch_array();
    unset($consulta_dep);
    $conexion->close();
    unset($conexion);
    $_SESSION['id_dependencia'] = $resultado[0];
    $_SESSION["id_dependencia_v3"]= $resultado[0];
    $_SESSION['nombre_dependencia'] = $resultado[1];
    $_SESSION['nombre_dependencia_v3']  = $resultado[1];
    $_SESSION['acronimo_dependencia'] = $resultado[2];
    echo "realizado";
}
?>

<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
session_start();
require('config.php');
if($_SESSION['keyWord'] !== md5(KEYWORD)){
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("location:../index.php");
    die();
}
if(PHP_SAPI == 'cli') {
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    die("no se puede ejecutar en linea de comando");
}
if(!isset($_POST['usuario'])){
    header("location:../index.php");
    die();
}
function sql_injection($u){
    $patron = array('%', '   ', '*', '?', '<', '>',' ','!','\'','·','$','%', '&','/','(',')','=', '|', '@','#', '¢', '∞', '¬','÷','“','”','≠','.',',');
    for($x = 0; $x < strlen($u); $x++){
        $c = substr($u,$x,1);
        if(in_array($c,$patron)){
            return true;
        }
    }
    unset($patron);
    return false;
}
function ejecutarConsultas($consulta,$conn_bd,$l){
    $conexion = $conn_bd->conectar($l);
    $exQuery = $conexion->query($consulta) or die ($conexion->error);
    $conexion->close();
    unset($conexion);
    $resultado = $exQuery->fetch_array();
    return $resultado;
}

if(sql_injection($_POST['usuario'])){
    header("Location:../index.php?msg=1");
    die();
}
$clave = md5($_POST['password']);
require('conexion.php');
$consulta = "CALL login('".$_POST['usuario']."','".$clave."')";
$resultado = ejecutarConsultas($consulta,$conn,1);
unset($consulta);
if( $resultado[0] == '1'){
    unset($resultado);
    $consulta = "CALL usuario_habilitado('".$_POST['usuario']."','".$clave."')";
    $resultado = ejecutarConsultas($consulta,$conn,1);
    unset($consulta);
    if($resultado[0] == '1'){
        unset($resultado);
        $consulta = "CALL usuario_info('".$_POST['usuario']."','".$clave."')";
        $resultado = ejecutarConsultas($consulta,$conn,1);
        unset($consulta);
        $_SESSION['id_usuario'] = $resultado[0];
        $_SESSION['id_perfil'] = $resultado[1];
        $_SESSION['id_dependencia'] = $resultado[2];
        $_SESSION["id_dependencia_v3"]= $resultado[2];
        $_SESSION['nombre_usuario'] = $resultado[3];
        $_SESSION['nombre_dependencia'] = $resultado[4];
        $_SESSION['nombre_dependencia_v3']  = $resultado[4];
        $_SESSION['acronimo_dependencia'] = $resultado[5];
        $_SESSION['activeKey'] = md5(ACTIVEKEY);
        $_SESSION['ejercicio'] = 2019;

        unset($resultado);
         //guardar en el historial el acceso
        $consulta = "call historial_login(".$_SESSION['id_usuario'].",1,'".$_SERVER['REMOTE_ADDR']."')";
         ejecutarConsultas($consulta,$conn,2);
         //redireccionar al dashboards
         header("location:../main.php");
    }else{
        header("location:../index.php?msg=2");
        die();
    }
}else{
    header("location:../index.php?msg=1");
    die();
}

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
//clase usuarios

session_start();
require("config.php");
require("conexion.php");

class usuarios{
    function crear(){}
    function actualizar(){}
    function habilitar($v,$c){
        $conexion = $c->conectar(2);
        $conexion->query("UPDATE usuarios SET activo = 1 WHERE id_usuario = ".$_POST['id_usuario']);
        return "guardado";
        
    }
    function deshabilitar($v,$c){
        $conexion = $c->conectar(2);
        $conexion->query("UPDATE usuarios SET activo = 0 WHERE id_usuario = ".$_POST['id_usuario']);
        return "guardado";
    }
    function eliminar(){}
}

$conn = new bd_conexion();
$usuarios = new usuarios();

switch($_POST['accion']){
    case "habilitar":
        echo $usuarios->habilitar($_POST,$conn);
    break;
    case "inhabilitar":
        echo $usuarios->deshabilitar($_POST,$conn);
    break;    
}

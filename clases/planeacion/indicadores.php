<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
require("../config.php");
require("../conexion.php");
class indicadores {

  function agregar($vars,$c){

    switch( $vars['nivel_indicador'] ) {
      case "Fin":
      $nivel = 1;
      break;
      case "Propósito":
      $nivel = 2;
      break;
      case "Componente":
      $nivel = 3;
      break;
      case "Actividad":
      $nivel = 4;
      break;

    }
    $consulta = "call agregar_indicador(
      ".$nivel.",
      ".$vars['proyecto'].",
      ".$vars['componente'].",
      ".$vars['actividad'].",
      '".$vars['nombre']."',
      '".$vars['definicion']."',
      '".$vars['formula']."',
      ".$vars['tipo'].",
      ".$vars['dimension'].",
      ".$vars['frecuencia'].",
      ".$vars['sentido'].",
      '".$vars['u_medida']."',
      '".$vars['meta']."',
      '".$vars['linea_base']."',
      '".$vars['verifica']."',
      '".$vars['supuesto']."',
      '".$vars['var1']."',
      '".$vars['var2']."',
      '".$vars['var3']."',
      '".$vars['var4']."',
      '".$vars['var5']."',
      '".$vars['var6']."',
      ".$_SESSION['id_usuario'].",
      '".$_SERVER['REMOTE_ADDR']."')";
    $conexion = $c->conectar(2);
    if($conexion->query($consulta)){
      echo "guardado";
    } else{
      return $conexion->error;
    }
  }

  function delete($var, $c){
    $conect = $c->conectar(2);
    $proyecto = $conect->query("CALL delete_indicador(".$var['id_indicador'].", ".$var['id_proyecto'].")") or die ($conect->error);
    $conect->close();
    $estatus = $proyecto->fetch_array();
    if ($estatus[0] == 0) {
      return "borrado";
    }else{
      return "estatus";
    }
  }

  function update($var, $c){
    $conexion = $c->conectar(2);
    $sql = $conexion->query("CALL editar_indicador(
      ".$var['id_proyecto'].",
      ".$var['id_indicador'].",
      '".$var['nombre']."',
      '".$var['definicion']."',
      ".$var['metodo'].",
      ".$var['tipo'].",
      ".$var['dimension'].",
      ".$var['frecuencia'].",
      ".$var['sentido'].",
      '".$var['u_medida']."',
      '".$var['meta']."',
      '".$var['linea_base']."',
      '".$var['verifica']."',
      '".$var['supuesto']."',
      '".$var['var1']."',
      '".$var['var2']."',
      '".$var['var3']."',
      '".$var['var4']."',
      '".$var['var5']."'
    )") or die ($conexion->error);
    $conexion->close();
    return "actualizado";
  }
}

$indicador = new indicadores();
$conn = new bd_conexion();

switch($_POST['accion']){
  case 'agregar':
  echo $indicador->agregar($_POST,$conn);
  break;
  case 'borrar':
  echo $indicador->delete($_POST,$conn);
  break;
  case 'actualizar':
  echo $indicador->update($_POST,$conn);
  break;
}
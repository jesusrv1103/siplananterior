<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
require("../config.php");
require("../conexion.php");

class componentes {
  function guardar($var,$c){
    $conexion = $c->conectar(2);
    echo $var['cantidad'];
    $sql = "CALL agregar_componente (
     ".$var['proyecto'].",
     '".$var['nombre']."',
     ".$var['tipo_unidad_medida'].",
     ".$var['u_medida'].",
     ".$var['cantidad'].",
     ".$var['ponderacion'].",
     ".$var['u_responsable'].",
     ".$var['no_componente'].",
     ".$var['eje'].",
     ".$var['linea'].",
     ".$var['estrategia'].",
     ".$var['prog_pres'].",
     ".$var['cve_transversal'].",
     '".$var['ods_opciones']."'
   )";

   $conexion->query($sql) or die ($conexion->error);
   return "guardado";
 }

 function delete($var, $c){
  $conect = $c->conectar(2);
  $componente = $conect->query("CALL delete_componente(".$var['id_componente'].", ".$var['id_proyecto'].")") or die ($conect->error);
  $conect->close();
  $estatus = $componente->fetch_array();
  if ($estatus[0] == 0) {
    return "borrado";
  }else{
    return "estatus";
  }
}

function update($var, $c){
  $conexion = $c->conectar(2);
  $sql = "CALL editar_componente (
    '".$var['id_componente']."',
    ".$var['proyecto'].",
    '".$var['nombre']."',
    ".$var['tipo_unidad_medida'].",
    ".$var['u_medida'].",
    ".$var['cantidad'].",
    ".$var['ponderacion'].",
    ".$var['u_responsable'].",
    ".$var['no_componente'].",
    ".$var['eje'].",
    ".$var['linea'].",
    ".$var['estrategia'].",
    ".$var['prog_pres'].",
    ".$var['cve_transversal'].",
    '".$var['ods_opciones']."'
  )";

  $conexion->query($sql) or die ($conexion->error);
  echo "actualizado";
}
}

$conn = new bd_conexion();
$componente = new componentes();

switch($_POST['accion']){
  case "guardar":
    echo $componente->guardar($_POST,$conn);
  break;
  case "borrar":
    echo $componente->delete($_POST,$conn);
  break;
  case "actualizar":
    echo $componente->update($_POST,$conn);
  break;
}

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require("../config.php");
require("../conexion.php");

class actividades {
    function guardar($valores,$c){
        //Sacar ponderación de Componente
        /*
        $conect = $c->conectar(1);
        $comp = $conect->query("SELECT ponderacion FROM componentes WHERE id_proyecto=".$valores['id_proyecto']." and id_componente=".$valores['id_componente']) or die ($conect->error);
        $conect->close(); 
        $ponderacion = $comp->fetch_array();
        */
        //Sacar total de ponderación de actividades
        $conn = $c->conectar(1);
        $actividades = $conn->query("SELECT ponderacion FROM acciones WHERE id_proyecto=".$valores['id_proyecto']." and id_componente=".$valores['id_componente']) or die ($conect->error);
        $conn->close();
        $total = 0;
        while($pon = $actividades->fetch_array()){
            $total += $pon[0];
        }
        if (100 >= ($total + $valores['ponderacion'])) {
          $conexion = $c->conectar(2);
          $metas = (float)$valores['m1']+
          (float)$valores['m2'] +
          (float)$valores['m3'] +
          (float)$valores['m4'] +
          (float)$valores['m5'] +
          (float)$valores['m6'] +
          (float)$valores['m7'] +
          (float)$valores['m8'] +
          (float)$valores['m9'] +
          (float)$valores['m10'] +
          (float)$valores['m11'] +
          (float)$valores['m12'];
          if ($metas > 0) {
              $conexion->query("CALL agregar_actividad(
                ".$valores['id_componente'].",
                ".$valores['id_proyecto'].",
                ".$valores['id_dependencia'].",
                '".$valores['descripcion']."',
                ".$valores['id_tipo'].",
                ".$valores['unidad_medida'].",
                ".$valores['cantidad'].",
                ".$valores['ponderacion'].",
                ".$valores['no_accion'].",
                ".$valores['ped'].",
                '".$valores['descripcion_actividad']."',
                '".$valores['tipo_descripcion']."',
                ".$valores['per_gen'].",
                ".$valores['m1'].",
                ".$valores['m2'].",
                ".$valores['m3'].",
                ".$valores['m4'].",
                ".$valores['m5'].",
                ".$valores['m6'].",
                ".$valores['m7'].",
                ".$valores['m8'].",
                ".$valores['m9'].",
                ".$valores['m10'].",
                ".$valores['m11'].",
                ".$valores['m12']."
            )") or die ($conexion->error);
              return "guardado";
          }else{
            return "metas";
        }
          /*
          $conexion->query("INSERT INTO acciones (
            id_componente,
            id_proyecto,
            id_dependencia,
            descripcion,
            id_tipo,
            unidad_medida,
            cantidad,
            ponderacion,
            no_accion,
            ped,
            descripcion_actividad,
            tipo_descripcion, per_gen)
            VALUES (".$valores['id_componente'].",
            ".$valores['id_proyecto'].",
            ".$valores['id_dependencia'].",
            '".$valores['descripcion']."',
            ".$valores['id_tipo'].",
            ".$valores['unidad_medida'].",
            ".$valores['cantidad'].",
            ".$valores['ponderacion'].",
            ".$valores['no_accion'].",
            ".$valores['ped'].",
            '".$valores['descripcion_actividad']."',
            '".$valores['tipo_descripcion']."',
            ".$valores['per_gen']."
        )") or die ($conexion->error);
        */
    }else{
        return "ponderacion";
    }
}

function delete($valores, $c){
    $conect = $c->conectar(2);
    $proyecto = $conect->query("CALL delete_actividad(".$valores['id_accion'].", ".$valores['id_proyecto'].")") or die ($conect->error);
    $conect->close();
    $estatus = $proyecto->fetch_array();
    if ($estatus[0] == 0) {
        return "borrado";
    }else{
        return "estatus";
    }
}

function update($valores, $c){
    $conn = $c->conectar(1);
    $actividades = $conn->query("SELECT ponderacion FROM acciones WHERE id_proyecto=".$valores['id_proyecto']." and id_componente=".$valores['id_componente']." and id_accion != ".$valores['id_actividad']) or die ($conect->error);
    $conn->close();
    $total = 0;
    while($pon = $actividades->fetch_array()){
        $total += $pon[0];
    }
    $conexion = $c->conectar(2);
    $sql = "CALL editar_actividad(
        ".$valores['id_actividad'].",
        ".$valores['id_proyecto'].",
        '".$valores['descripcion']."',
        ".$valores['id_tipo'].",
        ".$valores['unidad_medida'].",
        ".$valores['cantidad'].",
        ".$valores['ponderacion'].",
        ".$valores['no_accion'].",
        ".$valores['ped'].",
        '".$valores['descripcion_actividad']."',
        '".$valores['tipo_descripcion']."',
        ".$valores['per_gen'].",
        ".$valores['m1'].",
        ".$valores['m2'].",
        ".$valores['m3'].",
        ".$valores['m4'].",
        ".$valores['m5'].",
        ".$valores['m6'].",
        ".$valores['m7'].",
        ".$valores['m8'].",
        ".$valores['m9'].",
        ".$valores['m10'].",
        ".$valores['m11'].",
        ".$valores['m12']."
    )";
    $conexion->query($sql) or die ($conexion->error);
    echo "guardado";
}

}

$conn = new bd_conexion();
$actividad = new actividades();

switch($_POST['accion']){
    case "guardar":
    echo $actividad->guardar($_POST,$conn);
    break;
    case "editar":
    echo $actividad->update($_POST,$conn);
    break;
    case "borrar":
    echo $actividad->delete($_POST, $conn);
    break;
}

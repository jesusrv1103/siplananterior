<?php
error_reporting(E_ALL);
ini_set('display_errors',1);


session_start();
require("../config.php");
require("../conexion.php");
require("../ws-sefin.php");
class programa_presupuestario{
    /*
    function guardar_ppp($variables,$c){
        extract($variables);
        $dependencia = $_SESSION['id_dependencia'];
        $conexion = $c->conectar(2);
        $consulta = "CALL guardar_ppp(
        $dependencia,
        $eje,
        $linea,
        $estrategia,
        $no_proyecto,
        '$nombre',
        $ponderacion,
        '$u_medida',
        $prog_anual,
        $p_semestral,
        $gvulnerable,
        $ben_h,
        $ben_m,
        '$diagnostico',
        $finalidad,
        $funcion,
        $subfuncion,
        '$objetivo',
        '$proposito',
        '$observaciones',
        '$u_responsable',
        '$titular',
        $pnd_eje,
        $pnd_objetivo,
        $pnd_estrategia,
        $pnd_linea,
        $prog_pres,
        ".$_SESSION['id_usuario'].",
        '".$_SERVER['REMOTE_ADDR']."'
        )";
        if( $conexion->query($consulta) ){
            return "guardado";
        }else{
            return "error".$conexion->error;
        }

    }
    function guardar_ppi($variables,$c){
        extract($variables);
        $dependencia = $_SESSION['id_dependencia'];
        $conexion = $c->conectar(2);
        $consulta = "CALL guardar_ppi(
        $dependencia,
        $eje,
        $linea,
        $estrategia,
        $no_proyecto,
        '$nombre',
        $ponderacion,
        '$u_medida',
        $prog_anual,
        $p_semestral,
        $gvulnerable,
        $ben_h,
        $ben_m,
        '$diagnostico',
        $finalidad,
        $funcion,
        $subfuncion,
        '$objetivo',
        '$proposito',
        '$observaciones',
        '$u_responsable',
        '$titular',
        $pnd_eje,
        $pnd_objetivo,
        $pnd_estrategia,
        $pnd_linea,
        $prog_pres,
        ".$_SESSION['id_usuario'].",
        '".$_SERVER['REMOTE_ADDR']."'
        )";
        if( $conexion->query($consulta) ){
            // consulta guardar istorial
            return "guardado";
        }else{
            return "error".$conexion->error;
        }

    }
    */

    function guardar($variables,$c){
        extract($variables);
        $dependencia = $_SESSION['id_dependencia'];
        $conexion = $c->conectar(2);
        $consulta = "CALL guardar_pp(
            $prioritario,
            $dependencia,
            $eje,
            $linea,
            $estrategia,
            $no_proyecto,
            '$nombre',
            $ponderacion,
            '$u_medida',
            $prog_anual,
            $p_semestral,
            $gvulnerable,
            $ben_h,
            $ben_m,
            '$diagnostico',
            $finalidad,
            $funcion,
            $subfuncion,
            '$objetivo',
            '$proposito',
            '$observaciones',
            '$u_responsable',
            '$titular',
            $pnd_eje,
            $pnd_objetivo,
            $pnd_estrategia,
            $pnd_linea,
            $prog_pres,
            ".$_SESSION['id_usuario'].",
            '".$_SERVER['REMOTE_ADDR']."'
        )";
        if( $conexion->query($consulta) ){
            // consulta guardar istorial
            return "guardado";
        }else{
            return "error".$conexion->error;
        }

    }
    function aprobar_dep($variables,$c){

    //------------------------------- Validación Marco Estrategico ------------------------------------------------------------------------ //    
        $conexion = $c->conectar(1);
        $consulta_marco_estrategico = $conexion->query("SELECT count(*) FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia']) or die ($conexion->error);
        $res_marco = $consulta_marco_estrategico->fetch_array(MYSQLI_NUM);
        if($res_marco[0] == 0){ return "0"; exit(); } // no tiene marco estrategico, por lo tanto no se puede aprobar
        $conexion->close();
        unset($conexion);
        unset($consulta_marco_estrategico);
        unset($res_marco);
        
    // ------------------------- Validación contar con elementos del proyecto --------------------------------------- //
        $conexion = $c->conectar(1);
        $contar_proyectos = $conexion->query(
          "SELECT
          (select count(*) FROM componentes WHERE id_proyecto = ".$variables['proyecto']."),
          (select count(*) FROM acciones WHERE id_proyecto = ".$variables['proyecto']."),
          (select count(*) FROM indicadores WHERE id_proyecto = ".$variables['proyecto']." AND nivel_indicador = 1 ),
          (select count(*) FROM indicadores WHERE id_proyecto = ".$variables['proyecto']." AND nivel_indicador = 2 )"
      ) or die ($conexion->error);
        $conexion->close();
        unset($conexion);
        $res_proyectos = $contar_proyectos->fetch_array();
        if($res_proyectos[0] == 0 ){ return "1"; } // no se encuentran componentes
        if($res_proyectos[1] == 0 ){ return "2"; } // no se encuentran actividades
        if($res_proyectos[2] == 0 ){ return "3"; } // el proyecto no tiene indicadores fin
        if($res_proyectos[3] == 0 ){ return "4"; } // el proyecto no tiene  indicadores proposito

    // ----------------------------------------------- Validación componente y actividades, su ponderacion y sus indicadores ------------------------------- //
        
        $conexion = $c->conectar(1);
        $consulta_ped = $conexion->query("SELECT id_estrategia FROM proyectos WHERE id_proyecto =".$variables['proyecto']) or die ($conexion->error);
        $res_ped = $consulta_ped->fetch_array();
        $ped =  $res_ped[0];
        $conexion->close();
        unset($conexion);
        unset($consulta_ped);
        unset($res_ped);

        $conexion = $c->conectar(1);
        $consultar_componentes = $conexion->query("SELECT id_componente, ponderacion, ped_estrategia FROM componentes WHERE id_proyecto = ".$variables['proyecto']) or die ($conexion->error);
        $conexion->close();
        unset($conexion);
        $suma_ponderacion_componentes = 0;
        $ped_igual = false;
        $ped_actividad_igual = false;
        while($res_componentes = $consultar_componentes->fetch_array(MYSQLI_NUM)) {
            $suma_ponderacion_componentes = $suma_ponderacion_componentes + (int)$res_componentes[1];
            if($res_componentes[2] == $ped){ $ped_igual = true; }
            $conexion= $c->conectar(1);
            $suma_ponderacion_actividades = 0;
            $consulta_actividad = $conexion->query("SELECT id_accion,ponderacion,ped FROM acciones WHERE id_componente = ".$res_componentes[0]) or die ($conexion->error);
            $conexion->close();
            unset($conexion);

        //checamos las actividades que conforman al componente
            while($res_actividades = $consulta_actividad->fetch_array(MYSQLI_NUM)){
                if($res_actividades[2] == $ped ){ $ped_actividad_igual = true; }
                $suma_ponderacion_actividades = $suma_ponderacion_actividades+$res_actividades[1];
                $conexion = $c->conectar(1);
            // se verifica que la actividad tenga indicadores, al menos 1
                $buscar_indicador_actividad = $conexion->query("SELECT count(*) FROM indicadores WHERE id_proyecto = ".$variables['proyecto']." AND id_componente = ".$res_componentes[0]." AND id_actividad = ".$res_actividades[0]." AND nivel_indicador = 4") or die ($conexion->error);
                $res_indicador_actividad = $buscar_indicador_actividad->fetch_array(MYSQLI_NUM);
            if($res_indicador_actividad[0] == 0){ return "5"; exit(); } // la actividad no tiene indicadores se rechaza
            $conexion->close();
            unset($conexion);
            unset($res_indicador_actividad);
            unset($buscar_indicador_actividad);

        }

        unset($res_actividades);
        unset($consulta_actividad);
        if($suma_ponderacion_actividades != 100){ return "6"; exit(); } // la ponderacion de las actividades no es 100%
        unset($suma_ponderacion_actividades);
        $conexion = $c->conectar(1);
        // se verifica que el componente tenga indicadores, al menos 1
        $buscar_indicador_componente = $conexion->query("SELECT count(*) FROM indicadores WHERE id_proyecto = ".$variables['proyecto']." AND id_componente = ".$res_componentes[0]." AND nivel_indicador = 3") or die ($conexion->error);
        $res_indicador_componente = $buscar_indicador_componente->fetch_array(MYSQLI_NUM);
        if($res_indicador_componente[0] == 0){ return "7"; exit(); } // la actividad no tiene componente, se rechaza
        $conexion->close();
        unset($conexion);
        unset($res_indicador_componente);
        unset($buscar_indicador_componente);

    }
     if(!$ped_actividad_igual){return "9"; exit();} //ninguna actividad le pega al ped
    if(!$ped_igual){return "10"; exit();} //ningun componente le pega al ped
    unset($res_componentes);
    unset($consultar_componentes);    
    if($suma_ponderacion_componentes != 100){ return "8"; exit(); } // la ponderacion de los componentes no es 100%

    //-------- se valida el proyecto por parte de la dependencia al no encontrar errores de logica y estrucutra del proyecto  -------------//
    $conexion = $c->conectar(2);
    if($conexion->query("UPDATE proyectos SET estatus = 1 WHERE id_proyecto = ".$variables['proyecto']." AND estatus = 0" )  ){
        return "guardado";
    }else{
        return "11";
        exit();
    }
}
function aprobar_coepla($variables,$c){
    //$conexion = $c->conectar(2);
    //if($conexion->query("UPDATE proyectos SET estatus = 2 WHERE id_proyecto = ".$variables['proyecto']." AND estatus = 1")){
        //return "guardado";
    // ===================================== Aqui va la funcion de web service para enviar a finanzas, porfavor checar ============ //
    $dependencia = ws_dependencia($variables['proyecto']);
    $unidad =ws_unidad($variables['proyecto']);
    $eje = ws_eje($variables['proyecto']);
    $linea = ws_linea($variables['proyecto']);
    $estrategia = ws_estrategia($variables['proyecto']);
    $proyecto = ws_proyecto($variables['proyecto']);
    $componente = ws_componente($variables['proyecto']);
    $actividad = ws_actividad($variables['proyecto']);
    if ($dependencia && $unidad && $eje && $linea &&
        $estrategia && $proyecto && $componente && $actividad) {
        $conexion = $c->conectar(2);
        $conexion->query("UPDATE proyectos SET estatus = 2 WHERE id_proyecto = ".$variables['proyecto']." AND estatus = 1");
        return "guardado";
        exit();
    }else{
        if (!$dependencia) { return "dependencia"; }
        if (!$unidad) { return "unidad"; }
        if (!$eje) { return "eje"; }
        if (!$linea) { return "linea"; }
        if (!$estrategia) { return "estrategia"; }
        if (!$proyecto) { return "proyecto"; }
        if (!$componente) { return "componente"; }
        if (!$actividad) { return "actividad"; }
        exit();
    }
}
function rechazar_proyecto($variables,$c){
 $conexion = $c->conectar(2);
 if($conexion->query("UPDATE proyectos SET estatus = 0 WHERE id_proyecto = ".$variables['proyecto'] )  ){
     $conexion->close();
     return "El programa ha sido rechazado";
 }else{
    return "error al intentar rechazar el programa";
    exit();
}   

}

function actualizar_pp($variables,$c){

    extract($variables);

    $conexion = $c->conectar(2);
    $conexion->query("CALL actualizar_pp(
        $id_proyecto,
        $no_proyecto,
        '$nombre',
        $prog_pres,
        '$u_responsable',
        '$titular',
        $eje,
        $linea,
        $estrategia,
        $pnd_eje,
        $pnd_objetivo,
        $pnd_estrategia,
        $pnd_linea,
        $ponderacion,
        '$proposito',
        '$diagnostico',
        $gvulnerable,
        $ben_h,
        $ben_m,
        '$u_medida',
        $prog_anual,
        $p_semestral,
        $finalidad,
        $funcion,
        $subfuncion,
        '$observaciones',
        '$objetivo',
        ".$_SESSION['id_dependencia'].",
        ".$_SESSION['id_usuario'].",
        '".$_SERVER['REMOTE_ADDR']."'
    )") or die ($conexion->error);
    return "Proyecto Presupuestario Actualizado";

}
function eliminar_proyecto($variables,$c){
 extract($variables);

        // revisamos el estatus para evitar un sql inyection
 $conexion = $c->conectar(1);
 $consulta_componentes = $conexion->query("SELECT count(*) FROM proyectos WHERE id_proyecto = ".$proyecto." AND estatus = 0 and id_dependencia = ".$_SESSION['id_dependencia']) or die ($conexion->error);
 $res_consulta_componentes = $consulta_componentes->fetch_array();
 $conexion->close();
 unset($conexion);
 if($res_consulta_componentes[0] != 1){ return "El proyecto aún cuenta con estatus de aprobado";}


        // revisamos que no tenga componentes
 $conexion = $c->conectar(1);
 $consulta_componentes = $conexion->query("SELECT count(*) FROM componentes WHERE id_proyecto = ".$proyecto) or die ($conexion->error);
 $res_consulta_componentes = $consulta_componentes->fetch_array();
 $conexion->close();
 unset($conexion);
 if($res_consulta_componentes[0] != 0){ return "El proyecto aún cuenta con Componentes, eliminelos primero";}

        // eliminamos los resultados de los indicadores
 $conexion = $c->conectar(1);
 $consulta_resultados_indicadores = $conexion->query("SELECT id_indicador FROM indicadores WHERE id_proyecto = ".$proyecto) or die ($conexion->error);
 $conexion->close();
 unset($conexion);
 while($res_indicadores = $consulta_resultados_indicadores->fetch_array()){
     $conexion = $c->conectar(2);
     $conexion->query("DELETE FROM resultados_indicadores WHERE id_indicador = ".$res_indicadores[0]);
     $conexion->close();
     unset($conexion);
 }

        //eliminamos los indicadores fin y proposito
 $conexion = $c->conectar(2);
 $conexion->query("DELETE FROM indicadores WHERE id_proyecto = ".$proyecto) or die ($conexion->error);
 $conexion->close();
 unset($conexion);

        //eliminamos el proyecto
 $conexion = $c->conectar(2);
 $conexion->query("DELETE FROM proyectos_ppp WHERE id_proyecto = ".$proyecto) or die ($conexion->error);
 $conexion->close();
 unset($conexion);
 $conexion = $c->conectar(2);
 $conexion->query("DELETE FROM proyectos_ppi WHERE id_proyecto = ".$proyecto) or die ($conexion->error);
 $conexion->close();
 unset($conexion);
 $conexion = $c->conectar(2);
 $conexion->query("DELETE FROM proyectos WHERE id_proyecto = ".$proyecto." AND id_dependencia = ".$_SESSION['id_dependencia']." AND estatus = 0") or die ($conexion->error);
 $conexion->close();
 unset($conexion);

 return "El proyecto ha sido eliminado";
}
}

$conn = new bd_conexion();
$pp = new programa_presupuestario();

switch($_POST['accion']){

    //case "guardar_ppp":
    //    echo $pp->guardar_ppp($_POST,$conn);
    //break;
    //case "guardar_ppi":
    //    echo $pp->guardar_ppi($_POST,$conn);
    //break;
    case "guardar":
    echo $pp->guardar($_POST,$conn);
    break;
    case "actualizar":
    echo $pp->actualizar_pp($_POST,$conn);
    break;
    case "aprobar_dep":
    echo $pp->aprobar_dep($_POST,$conn);
    break;
    case "aprobar_coepla":
    echo $pp->aprobar_coepla($_POST,$conn);
    break;
    case "rechazar_proyecto":
    echo $pp->rechazar_proyecto($_POST,$conn);
    break;
    case "eliminar":
    echo $pp->eliminar_proyecto($_POST,$conn);
    break;

    default:
    echo "funcion no disponible";
    break;    
}



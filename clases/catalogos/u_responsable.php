<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();
require("../config.php");
require("../conexion.php");
require("../ws-sefin.php");

class u_responsable {
    function guardar($var, $c){
        /*
        extract($vars);       
        $conexion = $c->conectar(1);
        $Q_num_unidades = $conexion->query("SELECT count(*) FROM u_responsable WHERE id_dependencia = ".$_SESSION['id_dependencia']);
        $R_num_unidades = $Q_num_unidades->fetch_array();
        $conexion->close();
        unset($coenxion);
        if($R_num_unidades[0] == 0){
            $num_unidad = 1;
        }else{
            $num_unidad = $R_num_unidades[0];
        }
        if($num_unidad < 10){ $num_unidad = "0".$num_unidad;}
        $cve_unidad = $_SESSION['id_dependencia'].$num_unidad;
        */
        $conexion = $c->conectar(2);
        $unidad = $conexion->query("CALL agregar_responsable(".$_SESSION['id_dependencia'].",'".$var['u_responsable']."', '".$var['titular']."')") or die ($conexion->error);
        $_id = $unidad->fetch_array();
        $conexion->close();
        //Agregar function de enviar a sefin.

        //return _get('unidadResponsable');

        $data = array("unidad" => (int)$_id[2],
            "depend" => $_id[1],
            "cveunr" => $_id[2],
            "descripcion" => $_id[3],
            "titular" => $_id[4],
            "idsiplan" => $_id[0]);

        $save = _rest('unidadResponsable', json_encode($data), 'save');
        $response = json_decode($save);
        if ($response->estatus = 1) {
            return "guardado";
        }else{
            return "estatus";
        }
    }

    function delete($var, $c){
        $conect = $c->conectar(2);
        $unidad = $conect->query("SELECT no_u_responsable FROM u_responsable WHERE id_u_responsable = ".$var['id_responsable']) or die ($conect->error);
        $proyecto = $conect->query("CALL delete_responsable(".$var['id_responsable'].")") or die ($conect->error);
        $conect->close();
        $estatus = $proyecto->fetch_array();
        if ($estatus[0] == 0) {
            $_id = $unidad->fetch_array();
            $data = array("unidad" => (int)$_id[0]);
            $delete = _rest('unidadResponsable', json_encode($data), "delete");
            $response = json_decode($delete);
            if ($response->estatus = 1) {
                return "borrado";
            }else{
                return "estatus";
            }
        }else{
            return "estatus";
        }
    }

    function update($var, $c){
        $conexion = $c->conectar(2);
        $update = $conexion->query("CALL editar_responsable(
            ".$var['id_responsable'].",
            '".$var['u_responsable']."',
            '".$var['titular']."'
        )") or die ($conexion->error);
        $_id = $update->fetch_array();
        $data = array("unidad" => (int)$_id[2],
            "depend" => (int)$_id[1],
            "cveunr" => $_id[2],
            "descripcion" => $_id[3],
            "titular" => $_id[4],
            "idsiplan" => (int)$_id[0]);

        $update = _rest('unidadResponsable', json_encode($data), "update");
        $response = json_decode($update);
        if ($response->estatus = 1) {
            return "guardado";
        }else{
            return "estatus";
        }
    }
}
$conn = new bd_conexion();
$unidad_responsable = new u_responsable();

switch($_POST['accion']){
    case "agregar":
    echo $unidad_responsable->guardar($_POST,$conn);
    break;
    case "borrar":
    echo $unidad_responsable->delete($_POST, $conn);
    break;
    case "actualizar":
    echo $unidad_responsable->update($_POST,$conn);
    break;
}

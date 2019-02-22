<?php
//actividades();
//componentes();
//proyectos();
//estrategias();
//lineas();
//ejes();
//unidades();
//dependencias();

function actividades(){
    $data = _get("actividad");
    foreach(json_decode($data) as $obj){
        $del = array(
            "sector" => $obj->sector,
            "depen" => $obj->depen,
            "unidad" => $obj->unidad,
            "eje" => $obj->eje,
            "linea" => $obj->linea,
            "estrategia" => $obj->estrategia,
            "proyecto" => $obj->proyecto,
            "componente" => $obj->componente,
            "accion" => $obj->accion);
        $delete = _rest('actividad', json_encode($del), 'delete');
        echo $delete;
    }
}

function componentes(){
    $data = _get("componente");
    foreach(json_decode($data) as $obj){
        $del = array(
            "sector" => $obj->sector,
            "depen" => $obj->depen,
            "unidad" => $obj->unidad,
            "eje" => $obj->eje,
            "linea" => $obj->linea,
            "estrategia" => $obj->estrategia,
            "proyecto" => $obj->proyecto,
            "componente" => $obj->componente);
        $delete = _rest('componente', json_encode($del), 'delete');
        echo $delete;
    }
}

function proyectos(){
    $data = _get("proyecto");
    foreach(json_decode($data) as $obj){
        $del = array(
            "sector" => $obj->sector,
            "depen" => $obj->depen,
            "unidad" => $obj->unidad,
            "eje" => $obj->eje,
            "linea" => $obj->linea,
            "estrategia" => $obj->estrategia,
            "proyecto" => $obj->proyecto);
        $delete = _rest('proyecto', json_encode($del), 'delete');
        echo $delete;
    }
}

function estrategias(){
    $data = _get("estrategia");
    foreach(json_decode($data) as $obj){
        $del = array(
            "sector" => $obj->sector,
            "depen" => $obj->depen,
            "unidad" => $obj->unidad,
            "eje" => $obj->eje,
            "linea" => $obj->linea,
            "estrategia" => $obj->estrategia);
        $delete = _rest('estrategia', json_encode($del), 'delete');
        echo $delete;
    }
}

function lineas(){
    $data = _get("linea");
    foreach(json_decode($data) as $obj){
        $del = array(
            "sector" => $obj->sector,
            "depen" => $obj->depen,
            "unidad" => $obj->unidad,
            "eje" => $obj->eje,
            "linea" => $obj->linea);
        $delete = _rest('linea', json_encode($del), 'delete');
        echo $delete;
    }
}

function ejes(){
    $data = _get("eje");
    foreach(json_decode($data) as $obj){
        $del = array(
            "sector" => $obj->sector,
            "depen" => $obj->depen,
            "unidad" => $obj->unidad,
            "eje" => $obj->eje);
        $delete = _rest('eje', json_encode($del), 'delete');
        echo $delete;
    }
}

function unidades(){
   $data = _get("unidad");
   foreach(json_decode($data) as $obj){
    $del = array(
        "sector" => $obj->sector,
        "depen" => $obj->depen,
        "unidad" => $obj->unidad);
    $delete = _rest('unidad', json_encode($del), 'delete');
    echo $delete;
} 
}

function dependencias(){
   $data = _get("dependencia");
   foreach(json_decode($data) as $obj){
    $del = array(
        "sector" => $obj->sector,
        "depen" => $obj->depen);
    $delete = _rest('dependencia', json_encode($del), 'delete');
    echo $delete;
} 
}
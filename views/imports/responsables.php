<?php

//insertAll();
//deleteAll();
//insertAll();

function delete($unidad){
	$data = array("unidad" => $unidad);
	$delete = _rest('unidadResponsable', json_encode($data), "delete");
	//$response = json_decode($delete);
	echo "         ".$delete;
}
// Insert All
function insertAll(){
	$conn = new bd_conexion();
	$conex = $conn->conectar(1);
	$acciones = $conex->query("SELECT * FROM u_responsable");
	$conex->close();
	unset($conex);
	while($unidad = $acciones->fetch_array()){
		$data = array("unidad" => (int)$unidad[2],
			"depend" => $unidad[1],
			"cveunr" => $unidad[2],
			"descripcion" => $unidad[3],
			"titular" => $unidad[4],
			"idsiplan" => $unidad[0]);
		$save = _rest('unidadResponsable', json_encode($data), 'save');
		echo $save ."\n";
	}
}
//Delete All
function deleteAll(){
	$conn = new bd_conexion();
	$conex = $conn->conectar(1);
	$acciones = $conex->query("SELECT no_u_responsable FROM u_responsable");
	$conex->close();
	unset($conex);
	while($unidad = $acciones->fetch_array()){
		$data = array("unidad" => $unidad[0]);
		$delete = _rest('unidadResponsable', json_encode($data), "delete");
		echo $delete ."\n";
	}
}
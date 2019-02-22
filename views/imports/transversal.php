<?php

//insertAll();
//deleteAll();
//insertAll();

// Insert All
update();
function insertAll(){
	$conn = new bd_conexion();
	$conex = $conn->conectar(1);
	$acciones = $conex->query("SELECT * FROM transversales");
	$conex->close();
	unset($conex);
	while($unidad = $acciones->fetch_array()){
		$data = array("transv" => (int)$unidad[0],
			"descripcion" => $unidad[1],
			"idsiplan" => (int)$unidad[0]);
		$save = _rest('transv', json_encode($data), 'save');
		echo $save ."\n";
	}
}
//Delete All
function deleteAll(){
	$conn = new bd_conexion();
	$conex = $conn->conectar(1);
	$acciones = $conex->query("SELECT id_transversal FROM transversales");
	$conex->close();
	unset($conex);
	while($unidad = $acciones->fetch_array()){
		$data = array("transv" => $unidad[0]);
		$delete = _rest('transv', json_encode($data), "delete");
		echo $delete ."\n";
	}
}

function update(){
	$data = array("transv" => 1,
		"descripcion" => "ODS -- Objetivos de Desarrollo Sostenible",
		"idsiplan" => 1);
	$delete = _rest('transv', json_encode($data), "update");
}
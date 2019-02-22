<?php
insertAll();
function insertAll(){
	deleteAll();
	$conn = new bd_conexion();
	$conex = $conn->conectar(1);
	$acciones = $conex->query("SELECT * FROM sectores");
	$conex->close();
	unset($conex);
	while($unidad = $acciones->fetch_array()){
		$data = array("sector" => (int)$unidad[0],
			"descripcion" => $unidad[1]);
		$save = _rest('sector', json_encode($data), 'save');
		echo $save ."\n";
	}
}
//Delete All
function deleteAll(){
	$conn = new bd_conexion();
	$conex = $conn->conectar(1);
	$acciones = $conex->query("SELECT * FROM sectores");
	$conex->close();
	unset($conex);
	while($unidad = $acciones->fetch_array()){
		$data = array("sector" => $unidad[0]);
		$delete = _rest('sector', json_encode($data), "delete");
		echo $delete ."\n";
	}
}
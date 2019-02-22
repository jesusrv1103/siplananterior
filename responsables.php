<?php

//delete(999);
insert();

function delete($unidad){
	$data = array("unidad" => $unidad);
	$delete = _rest('unidadResponsable', json_encode($data), "delete");
	//$response = json_decode($delete);
	echo $delete;
}

function insert(){
	$conex = $conn->conectar(1);
	$acciones = $conex->query("SELECT * FROM u_responsable");
	$conex->close();
	unset($conex);
	while($unidad = $acciones->fetch_array()){
		$data = array("unidad" => (int)$_id[2],
			"depend" => $_id[1],
			"cveunr" => $_id[2],
			"descripcion" => $_id[3],
			"titular" => $_id[4],
			"idsiplan" => $_id[0]);
		$save = _rest('unidadResponsable', json_encode($data), 'save');
		echo $save ."\n";
	}
}
<?php
function _rest($route,$data,$ope) {
	$headers = array('Content-Type: application/json','Content-Length: ' . strlen($data));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, "");
	curl_setopt($ch, CURLOPT_URL, "".$route);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //reresa datos
	if ($ope=="save"){
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	}
	if ($ope=="delete"){
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	}
	if ($ope=="update"){
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	}
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function _get($route) {
	$headers = array('Authorization: Basic ');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "".$route);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}


function ws_dependencia($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$dependencia = $conexion->query("SELECT
		s.id_sector,
		d.id_dependencia,
		d.nombre
		FROM dependencias d
		INNER JOIN proyectos p ON d.id_dependencia = p.id_dependencia
		INNER JOIN sectores s ON s.id_sector = d.id_sector
		WHERE p.estatus = 1 and p.id_proyecto= ". $id)or die ($conexion->error);
	while($dep = $dependencia->fetch_array()){
		$data = array("sector" => (int)$dep[0],
			"depen" => (int)$dep[1],
			"descripcion" => $dep[2]);
		$save = _rest('dependencia', json_encode($data), 'save');
		$response = json_decode($save);
		//echo "ws_dependencia: ".$save;
		if ($response->estado == 1 || $response->estado == 0) {
			$flag = $flag && true;
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function ws_unidad($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$unidades = $conexion->query("SELECT
		d.id_dependencia,
		u.u_responsable,
		s.id_sector,
		u.no_u_responsable
		FROM
		dependencias d
		INNER JOIN proyectos p ON d.id_dependencia = p.id_dependencia
		INNER JOIN sectores s ON s.id_sector = d.id_sector
		INNER JOIN componentes c ON p.id_proyecto = c.id_proyecto
		LEFT JOIN u_responsable u ON c.unidad_responsable = u.id_u_responsable
		WHERE
		p.estatus = 1 and p.id_proyecto = ".$id."
		GROUP BY
		d.id_dependencia,
		p.no_proyecto,
		c.no_componente
		ORDER BY
		d.id_dependencia ASC,
		p.no_proyecto ASC");
	while ($unidad = $unidades->fetch_array()) {
		$data = array("depen" => (int)$unidad[0],
			"descripcion" => $unidad[1],
			"sector" => (int)$unidad[2],
			"unidad" => (int)$unidad[3]);
		$save = _rest('unidad', json_encode($data), 'save');
		//echo "ws_unidad: ".$save;
		$response = json_decode($save);
		if ($response->estado == 1 || $response->estado == 3) {
			$flag = $flag && true;
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function ws_eje($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$ejes = $conexion->query("SELECT
		d.id_dependencia,
		e.eje as descripcion,
		SUBSTRING(e.eje,1,1) AS eje,
		s.id_sector,
		u.no_u_responsable
		FROM
		dependencias d
		INNER JOIN proyectos p ON d.id_dependencia = p.id_dependencia
		INNER JOIN sectores s ON s.id_sector = d.id_sector
		INNER JOIN componentes c ON p.id_proyecto = c.id_proyecto
		INNER JOIN eje e ON c.ped_eje = e.id_eje
		INNER JOIN u_responsable u ON c.unidad_responsable = u.id_u_responsable
		WHERE
		p.estatus  = 1 and p.id_proyecto =".$id."
		GROUP BY
		d.id_dependencia,
		p.no_proyecto,
		c.ped_eje,
		c.ped_linea,
		c.no_componente
		ORDER BY
		d.id_dependencia ASC,
		p.no_proyecto ASC");
	while ($eje = $ejes->fetch_array()) {
		$data = array("depen" => (int)$eje[0],
			"descripcion" => delNums($eje[1]),
			"eje" => (int)$eje[2],
			"sector" => (int)$eje[3],
			"unidad" => (int)$eje[4]);
		$save = _rest('eje', json_encode($data), 'save');
		//echo "ws_eje: ". $save;
		$response = json_decode($save);
		if ($response->estado == 1 || $response->estado == 3) {
			$flag = $flag && true;
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function ws_linea($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$lineas = $conexion->query("SELECT
		d.id_dependencia,
		l.nombre,
		SUBSTR(e.eje,1,1) AS id_eje,
		SUBSTRING(l.nombre,3,2) AS id_linea,
		s.id_sector,
		ur.no_u_responsable
		FROM
		dependencias d
		INNER JOIN proyectos p ON d.id_dependencia = p.id_dependencia
		INNER JOIN sectores s ON s.id_sector = d.id_sector
		INNER JOIN componentes c ON p.id_proyecto = c.id_proyecto
		INNER JOIN eje e ON c.ped_eje = e.id_eje
		INNER JOIN linea l ON c.ped_linea = l.id_linea
		INNER JOIN u_medida_prog01 um ON c.unidad_medida = um.id_unidad
		INNER JOIN u_responsable ur ON c.unidad_responsable = ur.id_u_responsable
		WHERE
		p.estatus = 1 and p.id_proyecto=".$id."
		GROUP BY
		d.id_dependencia,
		p.no_proyecto,
		c.no_componente,
		c.ped_eje,
		c.ped_linea
		ORDER BY
		d.id_dependencia ASC,
		id_componente ASC");
	while ($linea = $lineas->fetch_array()) {
		$data = array("depen" => (int)$linea[0],
			"descripcion" => delNums($linea[1]),
			"eje" => (int)$linea[2],
			"linea" => (int)$linea[3],
			"sector" => (int)$linea[4],
			"unidad" => (int)$linea[5]);
		$save = _rest('linea', json_encode($data), 'save');
		//echo "ws_linea: ". $save;
		$response = json_decode($save);
		if ($response->estado == 1 || $response->estado == 3) {
			$flag = $flag && true;
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function ws_estrategia($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$estrategias = $conexion->query("SELECT
		s.id_sector,
		d.id_dependencia,
		ur.no_u_responsable,
		SUBSTR(e.eje,1,1) AS id_eje,
		SUBSTRING(l.nombre,3,2) AS id_linea,
		SUBSTRING(es.nombre,5,2) AS id_estrategia,
		es.nombre,
		programas_presupuestarios.clave,
		es.id_estrategia
		FROM
		dependencias d
		INNER JOIN proyectos p ON d.id_dependencia = p.id_dependencia
		INNER JOIN sectores s ON s.id_sector = d.id_sector
		INNER JOIN componentes c ON p.id_proyecto = c.id_proyecto
		INNER JOIN eje e ON c.ped_eje = e.id_eje
		INNER JOIN linea l ON c.ped_linea = l.id_linea
		INNER JOIN acciones a ON c.id_componente = a.id_componente
		INNER JOIN estrategias es ON a.ped = es.id_estrategia
		INNER JOIN  u_responsable ur ON c.unidad_responsable = ur.id_u_responsable
		INNER JOIN programas_presupuestarios ON p.prog_pres = programas_presupuestarios.id
		WHERE
		p.estatus = 1 and p.id_proyecto= ".$id."
		GROUP BY
		c.unidad_responsable
		ORDER BY
		d.id_dependencia ASC,
		p.no_proyecto ASC,
		c.no_componente ASC,
		a.no_accion ASC
		");
	while ($estrategia = $estrategias->fetch_array()) {
		$data = array(
			"sector" => (int)$estrategia[0],
			"depen" => (int)$estrategia[1],
			"unidad" => (int)$estrategia[2],
			"eje" => (int)$estrategia[3],
			"linea" => (int)$estrategia[4],
			"estrategia" => (int)str_replace(".", "", $estrategia[5]),
			"descripcion" => delNums($estrategia[6]),
			"clave" => $estrategia[7],
			"id_estrategia" => (int)$estrategia[8],
		);
		$save = _rest('estrategia', json_encode($data), 'save');
		//echo "ws_estrategia: ". $save;
		$response = json_decode($save);
		if ($response->estado == 1 || $response->estado == 3) {
			$flag = $flag && true;
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function ws_proyecto($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$proyectos = $conexion->query("SELECT
		sectores.id_sector,
		dependencias.id_dependencia,
		u_responsable.no_u_responsable,
		SUBSTRING(linea.nombre,3,2) AS id_linea,
		SUBSTRING(eje.eje,1,1) AS id_eje,
		SUBSTRING(estrategias.nombre,5,2) AS id_estrategia,
		proyectos.no_proyecto AS no_proyecto,
		proyectos.nombre AS descripcion,
		finalidad.id_finalidad,
		grupo_vulnerable.id_vulnerable AS sector_poblacional,
		funcion.id_funf AS funcion,
		subfuncion.id_subf AS subfuncion,
		0 as inversion,
		proyectos.beneficiarios_h AS hombres,
		proyectos.beneficiarios_m AS mujeres,
		proyectos.proposito AS proposito,
		proyectos.cantidad,
		proyectos.objetivo as fin_objetivo,
		proyectos.objetivo as nombre_fin,
		proyectos.justificacion AS justificacion,
		proyectos.ponderacion,
		1 as validafin,
		1 as validacop,
		programas_presupuestarios.clave,
		proyectos.id_proyecto AS id_proyecto,
		u_responsable.u_responsable,
		u_responsable.titular,
		proyectos.pps AS no_pps,
		proyectos.clasificacion as tipopp
		FROM
		dependencias
		INNER JOIN proyectos ON dependencias.id_dependencia = proyectos.id_dependencia
		INNER JOIN sectores ON sectores.id_sector = dependencias.id_sector
		INNER JOIN grupo_vulnerable ON proyectos.g_vulnerable = grupo_vulnerable.id_vulnerable
		INNER JOIN programas_presupuestarios ON proyectos.prog_pres = programas_presupuestarios.id
		INNER JOIN finalidad ON proyectos.finalidad = finalidad.id_finalidad
		INNER JOIN subfuncion ON proyectos.subfuncion = subfuncion.id_subfuncion
		INNER JOIN funcion ON finalidad.id_finalidad = funcion.id_finalidad AND proyectos.funcion = funcion.id_funf
		INNER JOIN componentes ON proyectos.id_proyecto = componentes.id_proyecto
		INNER JOIN acciones ON componentes.id_componente = acciones.id_componente
		INNER JOIN eje ON componentes.ped_eje = eje.id_eje
		INNER JOIN linea ON componentes.ped_linea = linea.id_linea
		INNER JOIN estrategias ON acciones.ped = estrategias.id_estrategia
		inner join u_responsable on componentes.unidad_responsable = u_responsable.id_u_responsable
		WHERE
		proyectos.estatus = 1 and proyectos.id_proyecto =".$id."
		GROUP BY
		dependencias.id_dependencia,
		u_responsable.id_u_responsable,
		proyectos.no_proyecto,
		componentes.ped_eje,
		componentes.ped_linea,
		acciones.ped
		ORDER BY
		dependencias.id_dependencia ASC,
		proyectos.no_proyecto ASC");
	while ($proyecto = $proyectos->fetch_array()) {
		$data = array(
			"sector" => (int)$proyecto[0],
			"depen" => (int)$proyecto[1],
			"unidad" => (int)$proyecto[2],
			"linea" => (int)$proyecto[3],
			"eje" => (int)$proyecto[4],
			"estrategia" => (int)str_replace(".", "", $proyecto[5]),
			"proyecto" => (int)$proyecto[6],
			"descripcion" => $proyecto[7],
			"finalidad" => (int)$proyecto[8],
			"sector_poblacion" => (int)$proyecto[9],
			"id_funcion_f" => (int)$proyecto[10],
			"id_subf" => (int)$proyecto[11],
			"inversion" => (int)$proyecto[12],
			"beneficiarios_h" => (int)$proyecto[13],
			"beneficiarios_m" => (int)$proyecto[14],
			"proposito" => $proyecto[15],
			"cantidad" => (int)$proyecto[16],
			"fin_objetivo" => $proyecto[17],
			"nombre_fin" => $proyecto[18],
			"justificacion" => $proyecto[19],
			"ponder" => (int)$proyecto[20],
			"validafin" => (int)$proyecto[21],
			"validacop" => (int)$proyecto[22],
			"clave" => $proyecto[23],
			"id_proyecto" => (int)$proyecto[24],
			"uresponsable" => $proyecto[25],
			"titular" => $proyecto[26],
			"idpps" => (int)$proyecto[27],
			"tipopp" => (int)$proyecto[28]
		);
		$save = _rest('proyecto', json_encode($data), 'save');
		//echo "ws_proyecto: ". $save;
		$response = json_decode($save);
		if ($response->estado == 1) {
			$flag = $flag && true;
		}elseif($response->estado == 3){
			$update = _rest('proyecto', json_encode($data), 'update');
			$resUpdate = json_decode($update);
			if ($resUpdate->estado == 1) {
				$flag = $flag && true;
			}else{
				$flag = $flag && false;
			}
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function ws_componente($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$componentes = $conexion->query("SELECT
		sectores.id_sector,
		dependencias.id_dependencia,
		u_responsable.no_u_responsable,
		SUBSTR(eje.eje,1,1) AS id_eje,
		SUBSTRING(linea.nombre,3,2) AS id_linea,
		SUBSTRING(estrategias.nombre,5,2) AS id_estrategia,
		proyectos.no_proyecto AS no_proyecto,
		componentes.no_componente AS no_componente,
		componentes.descripcion AS descripcion_compon,
		u_medida_prog01.id_unidad AS u_medida,
		tipo_unidad_prog01.id_tipo_unidad AS tipo_medida,
		componentes.cantidad,
		0 as s11c_tipind,
		u_responsable.id_dependencia AS id_dep,
		componentes.ponderacion,
		1 as validacop,
		1 as validafin,
		programas_presupuestarios.clave,
		u_responsable.u_responsable,
		componentes.id_componente,
		transversales.id_trasversal,
		componentes.ods
		FROM
		dependencias
		INNER JOIN proyectos ON dependencias.id_dependencia = proyectos.id_dependencia
		INNER JOIN sectores ON sectores.id_sector = dependencias.id_sector
		INNER JOIN componentes ON proyectos.id_proyecto = componentes.id_proyecto
		INNER JOIN eje ON componentes.ped_eje = eje.id_eje
		INNER JOIN linea ON componentes.ped_linea = linea.id_linea
		INNER JOIN u_medida_prog01 ON componentes.unidad_medida = u_medida_prog01.id_unidad
		INNER JOIN tipo_unidad_prog01 ON componentes.id_tipo = tipo_unidad_prog01.id_tipo_unidad
		INNER JOIN programas_presupuestarios ON componentes.prog_pres = programas_presupuestarios.id
		INNER JOIN acciones ON componentes.id_componente = acciones.id_componente
		INNER JOIN estrategias ON acciones.ped = estrategias.id_estrategia
		INNER JOIN u_responsable ON componentes.unidad_responsable = u_responsable.id_u_responsable
		INNER JOIN transversales ON componentes.cve_trasversal = transversales.id_trasversal
		WHERE
		proyectos.estatus = 1 and proyectos.id_proyecto =".$id." 
		GROUP BY
		dependencias.id_dependencia,
		proyectos.no_proyecto,
		componentes.no_componente,
		componentes.ped_eje,
		componentes.ped_linea,
		acciones.ped
		ORDER BY
		dependencias.id_dependencia ASC,
		proyectos.id_proyecto ASC,
		componentes.no_componente ASC
		");
	while ($componente = $componentes->fetch_array()) {
		$data = array(
			"sector" => (int)$componente[0],
			"depen" => (int)$componente[1],
			"unidad" => (int)$componente[2],
			"eje" => (int)$componente[3],
			"linea" => (int)$componente[4],
			"estrategia" => (int)str_replace(".", "", $componente[5]),
			"proyecto" => (int)$componente[6],
			"componente" => (int)$componente[7],
			"descripcion" => $componente[8],
			"u_medida" => (int)$componente[9],
			"tipo_medida" => (int)$componente[10],
			"cantidad" => (int)$componente[11],
			"s11c_tipind" => (int)$componente[12],
			"id_dependencia" => (int)$componente[13],
			"ponderacion" => (int)$componente[14],
			"valicop" => (int)$componente[15],
			"valifin" => (int)$componente[16],
			"clave" => $componente[17],
			"u_responsable" => $componente[18],
			"id_componente" => (int)$componente[19],
			"transv" => (int)$componente[20],
			"ods" => $componente[21]
		);
		$save = _rest('componente', json_encode($data), 'save');
		//echo "ws_componente: ". $save;
		$response = json_decode($save);
		if ($response->estado == 1) {
			$flag = $flag && true;
		}elseif($response->estado == 3){
			$update = _rest('componente', json_encode($data), 'update');
			$resUpdate = json_decode($update);
			if ($resUpdate->estado == 1) {
				$flag = $flag && true;
			}else{
				$flag = $flag && false;
			}
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function ws_actividad($id){
	$flag = true;
	$c = new bd_conexion();
	$conexion = $c->conectar(1);
	$actividades = $conexion->query("SELECT
		sectores.id_sector,
		dependencias.id_dependencia,
		u_responsable.no_u_responsable,
		SUBSTR(eje.eje,1,1) AS id_eje,
		SUBSTRING(linea.nombre,3,2) AS id_linea,
		SUBSTRING(estrategias.nombre,5,2) AS id_estrategia,
		proyectos.no_proyecto as no_proyecto,
		componentes.no_componente,
		acciones.no_accion,
		acciones.descripcion,
		dependencias.id_dependencia as orgrec,
		0 as valicop,
		0 as valifin,
		acciones.id_accion,
		acciones.per_gen
		FROM
		dependencias
		INNER JOIN proyectos ON dependencias.id_dependencia = proyectos.id_dependencia
		INNER JOIN sectores ON sectores.id_sector = dependencias.id_sector
		INNER JOIN componentes ON proyectos.id_proyecto = componentes.id_proyecto
		INNER JOIN eje ON componentes.ped_eje = eje.id_eje
		INNER JOIN linea ON componentes.ped_linea = linea.id_linea
		INNER JOIN acciones ON componentes.id_componente = acciones.id_componente
		INNER JOIN estrategias ON acciones.ped = estrategias.id_estrategia
		INNER JOIN finalidad ON proyectos.finalidad = finalidad.id_finalidad
		INNER JOIN subfuncion ON proyectos.subfuncion = subfuncion.id_subfuncion
		INNER JOIN funcion ON finalidad.id_finalidad = funcion.id_finalidad AND proyectos.funcion = funcion.id_funf
		INNER JOIN u_responsable ON componentes.unidad_responsable = u_responsable.id_u_responsable
		INNER JOIN u_medida_prog01 ON acciones.unidad_medida = u_medida_prog01.id_unidad
		INNER JOIN tipo_unidad_prog01 ON acciones.id_tipo = tipo_unidad_prog01.id_tipo_unidad
		WHERE
		proyectos.estatus = 1 and proyectos.id_proyecto =".$id."
		ORDER BY
		dependencias.id_dependencia ASC,
		proyectos.no_proyecto ASC,
		componentes.no_componente ASC,
		acciones.no_accion ASC
		");
	while ($actividad = $actividades->fetch_array()) {
		$data = array(
			"sector" => (int)$actividad[0],
			"depen" => (int)$actividad[1],
			"unidad" => (int)$actividad[2],
			"eje" => (int)$actividad[3],
			"linea" => (int)$actividad[4],
			"estrategia" => (int)str_replace(".", "", $actividad[5]),
			"proyecto" => (int)$actividad[6],
			"componente" => (int)$actividad[7],
			"accion" => (int)$actividad[8],
			"descripcion" => $actividad[9],
			"orgrec" => (int)$actividad[10],
			"valicop" => (int)$actividad[11],
			"valifin" => (int)$actividad[12],
			"id_actividad" => (int)$actividad[13],
			"equidad" => (int)$actividad[14]
		);
		$save = _rest('actividad', json_encode($data), 'save');
		//echo "ws_actividad: ". $save;
		$response = json_decode($save);
		if ($response->estado == 1) {
			$flag = $flag && true;
		}elseif($response->estado == 3){
			$update = _rest('actividad', json_encode($data), 'update');
			$resUpdate = json_decode($update);
			if ($resUpdate->estado == 1) {
				$flag = $flag && true;
			}else{
				$flag = $flag && false;
			}
		}else{
			$flag = $flag && false;
		}
	}
	return $flag;
}

function delNums($line){
	$pos = stripos($line, " ");
	$size = strlen($line);
	return substr($line, $pos+1, $size);
}
?>
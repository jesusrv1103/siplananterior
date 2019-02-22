<?php session_start();

$tipo=$_GET['g'];

if ($tipo!="" and $_SESSION['id_dependencia_v3']!=""){
//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require_once ("libchart/classes/libchart.php");
//$c=new obras;
//$f=new funciones;





}

if ($tipo=="dep"){
$title="Dependencia";
}
if ($tipo=="sec"){
$title="Sectores";
}
if ($tipo=="reg"){
$title="Regiones";
}
if ($tipo=="mun"){
$title="Municipios";
}
if ($tipo=="eje"){
$title="Ejes";
}
if ($tipo=="fin"){
$title="Finalidad";
}
if ($tipo=="fun"){
$title="Funciones";
}
?>

  <link rel="stylesheet" href="../css/jquery-ui.css" />
 <script type="text/javascript" language="javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>

 <title> <?php echo "Grafica resumen por ".$title;?></title>
 
<div style="margin-left:20px; margin-right:20px;">
<h2>POA02 Resumen</h2>
<div id="cuadro_info" >
<ul id="botones">
       <li><a href="reporte_resumen_graf.php?g=<?php echo $tipo ?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
<hr>


<?php 
if ($tipo=="dep"){ 
$title="Grafica resumen por Dependencia";
$query="	SELECT dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector


where obras.status_obra>='3'
GROUP BY dependencias.id_dependencia";
$title2="POA de Inversi髇 Programada";
//$dat=acronimo
//$dat=
$graf="dep";
$titlebottom="DEPENDENCIAS";
}

if ($tipo=="sec"){ 
 $title="Grafica resumen por Sector";
$query="	SELECT dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo, sectores.id_sector, sectores.sector
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector


where obras.status_obra>='3'
 GROUP BY  sectores.id_sector";
 $title2="POA de Inversi髇 Programada";
//$dat=acronimo
//$dat=

$titlebottom="SECTORES";
}

if ($tipo=="reg"){ 
 $title="Grafica resumen por Regiones";
$query="	SELECT dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo,regiones.nombre, regiones.id_region
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector


 where obras.status_obra>='3' GROUP BY regiones.id_region";
 $title2="POA de Inversi髇 Programada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Regiones";
}

if ($tipo=="mun"){ 
 $title="Grafica resumen por Municipios";
$query="	SELECT dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo, municipios.nombre, municipios.id_municipio
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector


 where obras.status_obra>='3' GROUP BY obras.municipio order by municipios.nombre asc";
 $title2="POA de Inversi髇 Programada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Municipios";
}


if ($tipo=="eje"){ 
 $title="Grafica resumen por Ejes";
$query="	SELECT dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo, eje.id_eje, eje.eje

FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector


 where obras.status_obra>='3' GROUP BY eje.id_eje";
 $title2="POA de Inversi髇 Programada";
//$dat=acronimo
//$dat=

$titlebottom="Ejes";
}

if ($tipo=="fin"){ 
 $title="Grafica resumen por Finalidad";
 $query="SELECT
Sum(obras.federal) AS SumaDefederal,
Sum(obras.estatal) AS SumaDeestatal,
Sum(obras.municipal) AS SumaDemunicipal,
Sum(obras.participantes) AS SumaDeparticipantes,
Sum(obras.credito) AS SumaDecredito,
Sum(obras.otros) AS SumaDeotros,
Count(obras.id_dependencia) AS CuentaDeacronimo,
Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total,
finalidad.id_finalidad,
finalidad.nombre
FROM
obras
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN finalidad ON proyectos.finalidad = finalidad.id_finalidad
where obras.status_obra>='3'
GROUP BY finalidad.id_finalidad";
 $title2="POA de Inversi髇 Programada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Finalidad";
}


if ($tipo=="fun"){ 
 $title="Grafica resumen por Funci贸n";
$query=" SELECT

funcion.nombre,
funcion.id_funcion,
Count(obras.id_dependencia) AS CuentaDeacronimo,
Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total
FROM
obras
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN funcion ON proyectos.funcion = funcion.id_funf AND proyectos.finalidad = funcion.id_finalidad
where obras.status_obra>='3'
group BY funcion.id_funcion";
 $title2="POA de Inversi髇 Programada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Funciones";
}


    echo"<h4>".$title."</h4>";
	
	
 echo "<hr />";
 if ($tipo=="mun"){
$chart = new VerticalBarChart(4500,368); //1200,350 8400,2250
 }
elseif($tipo=="fun"){
$chart = new VerticalBarChart(1800,350);
}
else{
	 $chart = new VerticalBarChart(1200,350); //1200,350 8400,2250
	 }
	
	$dataSet = new XYDataSet();
	
	$consulta_obras = mysql_query($query,$siplan_data_conn) or die (mysql_error());
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

while($row = mysql_fetch_array($consulta_obras))

	{
	if ($tipo=="dep"){ 
	$dataSet->addPoint(new Point($row['acronimo'], (number_format($row['total'],2,".",""))));
	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
	}
	if ($tipo=="sec"){ 
	$dataSet->addPoint(new Point(html_entity_decode($row['sector']), (number_format($row['total'],2,".",""))));
	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
	}
		if ($tipo=="reg"){ 
	$dataSet->addPoint(new Point($row['id_region']." ".$row['nombre'], (number_format($row['total'],2,".",""))));
	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
	}
	
		if ($tipo=="mun"){ 
		//if ($row['id_finanzas']=="59" or $row['id_finanzas']=="60"){}else{
	$dataSet->addPoint(new Point($row['id_finanzas']." ".$row['nombre'], (number_format($row['total'],2,".",""))));
	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
		//}
	}
	
		if ($tipo=="eje"){ 
	$dataSet->addPoint(new Point($row['eje'], (number_format($row['total'],2,".",""))));
	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
	}
	
	
	
		if ($tipo=="fin"){ 
	$dataSet->addPoint(new Point(html_entity_decode($row['nombre']), (number_format($row['total'],2,".",""))));
	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
	}
	
	if ($tipo=="fun"){ 
	$dataSet->addPoint(new Point(html_entity_decode($row['nombre']), (number_format($row['total'],2,".",""	))));
	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
	}
	
	}
	//$dataSet->addPoint(new Point("Feb 2005", 120321));
	//$dataSet->addPoint(new Point("March 2005", 1442));
	//$dataSet->addPoint(new Point("April 2005", 711));
	$chart->setDataSet($dataSet);
	
	$chart->setTitle($title2);
$chart->render("tmp/".$tipo.".png");


?>

  <link rel="stylesheet" href="css/jquery-ui.css" />
 <script type="text/javascript" language="javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script><div align="center">

<img alt="Line chart"  src="tmp/<?php echo $tipo?>.png" style="border: 1px solid gray;"/>

</div> <div align="center"><b><?php echo $titlebottom; ?><b></div>

<div style="-webkit-transform: rotate(-90deg);
-moz-transform: rotate(-90deg);
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3); position:absolute; margin-left:-40px; margin-top:-220px;">INVERSION TOTAL</div>

 <div align="center" style="position:absolute; margin-left:50px; margin-top:-5px;"><b>TOTAL POA OBRAS: <?php echo $cp; ?><b></div>
 <div align="center" style="position:absolute; margin-left:300px; margin-top:-5px;"><b>Total de Inversi贸n: <?php echo number_format($tt,2); ?><b></div>
</br>
<br>
</br>

<?php //segunda parte aprobadas?>




<?php 
if ($tipo=="dep"){ 
// AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
$title="Grafica resumen por Dependencia";
$query="SELECT `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total`
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
GROUP BY `dependencias`.`acronimo` order by dependencias.id_dependencia" ;
 
 

 
$title2="POA de Inversi髇 Aprobada 2017";
//$dat=acronimo
//$dat=
$graf="dep";
$titlebottom="DEPENDENCIAS";
}

if ($tipo=="sec"){ 
 $title="Grafica resumen por Sector";
$query="SELECT `sectores`.`id_sector`, `sectores`.`sector`, SUM( `poa02_origen`.`monto` ) as total FROM `dependencias` AS `dependencias`, `obras` AS `obras`, `sectores` AS `sectores`, `poa02_origen` AS `poa02_origen`
 WHERE `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
or `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
 GROUP BY `sectores`.`id_sector`";
  $title2="POA de Inversi髇 Aprobada 2017";
//$dat=acronimo
//$dat=

$titlebottom="SECTORES";
}

if ($tipo=="reg"){ 
 $title="Grafica resumen por Regiones";
$query="sELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total`, `regiones`.`id_region`, `regiones`.`nombre` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `regiones` AS `regiones`, `municipios` AS `municipios`
 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `regiones`.`id_region` = `municipios`.`id_region` AND `municipios`.`id_finanzas` = `obras`.`municipio` 
 AND `poa02_origen`.`tipo` = 0 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `regiones`.`id_region` = `municipios`.`id_region` AND `municipios`.`id_finanzas` = `obras`.`municipio`
 AND `poa02_origen`.`tipo` = 0  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
group  by regiones.id_region";
 $title2="POA de Inversi髇 Aprobada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Regiones";
}

if ($tipo=="mun"){ 
 $title="Grafica resumen por Municipios";
$query="SELECT municipios.nombre, municipios.id_finanzas, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_finanzas = obras.municipio) ON regiones.id_region = municipios.id_region

 where obras.status_obra='4' GROUP BY obras.municipio order by municipios.nombre asc";
 $title2="POA de Inversi髇 Aprobada por Municipios";
//$dat=acronimo
//$dat=

$titlebottom="Municipios";
}


if ($tipo=="eje"){ 
 $title="Grafica resumen por Ejes";
$query="SELECT `eje`.`id_eje`, `eje`.`eje`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
FROM `eje` AS `eje`, `proyectos` AS `proyectos`, `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `eje`.`id_eje` = `proyectos`.`id_eje` AND `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR  `eje`.`id_eje` = `proyectos`.`id_eje` AND `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY `eje`.`id_eje` ORDER BY `eje`.`id_eje` ASC";
/*SELECT eje.id_eje, eje.eje, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = proyectos.id_dependencia) where obras.status_obra='4' GROUP BY eje.id_eje*/
 $title2="POA de Inversi髇 Aprobada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Ejes";
}

if ($tipo=="fin"){ 
 $title="Grafica resumen por Finalidad";
 $query="SELECT `finalidad`.`id_finalidad`, `finalidad`.`nombre`, `finalidad`.`descripcion`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
	   FROM `obras` AS `obras`, `proyectos` AS `proyectos`, `finalidad` AS `finalidad`, `poa02_origen` AS `poa02_origen`
	    WHERE `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `finalidad`.`id_finalidad` = `proyectos`.`finalidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
			OR `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `finalidad`.`id_finalidad` = `proyectos`.`finalidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		  GROUP BY `finalidad`.`id_finalidad` ORDER BY `finalidad`.`id_finalidad` ASC";
 $title2="POA de Inversi髇 Aprobada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Finalidad";
}


if ($tipo=="fun"){ 
 $title="Grafica resumen por Funci贸n";
$query="SELECT `funcion`.`id_funcion`, `funcion`.`nombre`, `funcion`.`descripcion`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
	   FROM `obras` AS `obras`, `proyectos` AS `proyectos`, `funcion` AS `funcion`, `poa02_origen` AS `poa02_origen`
	    WHERE `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `funcion`.`id_funcion` = `proyectos`.`funcion` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
	      AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
			OR `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `funcion`.`id_funcion` = `proyectos`.`funcion` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
	 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		  GROUP BY `funcion`.`id_funcion` ORDER BY `funcion`.`id_funcion` ASC";
 $title2="POA de Inversi髇 Aprobada 2017";
//$dat=acronimo
//$dat=

$titlebottom="Funciones";
}


  //echo"<h4>".$title."</h4>";
	
	
 
 if ($tipo=="mun"){
$chart = new VerticalBarChart(4500,368); //1200,350 8400,2250
 }
elseif($tipo=="fun"){
$chart = new VerticalBarChart(1800,350);
}
else{
	 $chart = new VerticalBarChart(1200,350); //1200,350 8400,2250
	 }
	
	$dataSet = new XYDataSet();
	
	$consulta_obras = mysql_query($query,$siplan_data_conn) or die (mysql_error());
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

while($row = mysql_fetch_array($consulta_obras))

	{
	if ($tipo=="dep")
	{ 
	

//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
$query1="SELECT `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."' 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."' 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 ";


//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
$query2="SELECT `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."'
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2
and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."'
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  ";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);

//especificar con acronimo

	
//	echo $row['CuentaDeacronimo']." ".$row['acronimo']." ".$row['total']."+".$rowres1['total']."-".$rowres2['total']."<br>";
	
	$dataSet->addPoint(new Point($row['acronimo'], (number_format((($row['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));



//	$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+(($row['total']+$rowres1['total'])-$rowres2['total']);
	}
	if ($tipo=="sec"){ 
	
	$query1="SELECT `sectores`.`id_sector`, `sectores`.`sector`, SUM( `poa02_origen`.`monto` ) as total FROM `dependencias` AS `dependencias`, `obras` AS `obras`, `sectores` AS `sectores`, `poa02_origen` AS `poa02_origen`
 WHERE `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
and dependencias.id_sector=".$row['id_sector']."
or `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
and dependencias.id_sector=".$row['id_sector']."
 GROUP BY `sectores`.`id_sector`";


$query2="SELECT `sectores`.`id_sector`, `sectores`.`sector`, SUM( `poa02_origen`.`monto` ) as total FROM `dependencias` AS `dependencias`, `obras` AS `obras`, `sectores` AS `sectores`, `poa02_origen` AS `poa02_origen`
 WHERE `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
and dependencias.id_sector=".$row['id_sector']."
or `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
and dependencias.id_sector=".$row['id_sector']."
 GROUP BY `sectores`.`id_sector` ";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);
	
 
	$dataSet->addPoint(new Point(html_entity_decode($row['sector']), (number_format((($row['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));
	//$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+(($row['total']+$rowres1['total'])-$rowres2['total']);
	}
		if ($tipo=="reg"){ 
		
		$query1="sELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total`, `regiones`.`id_region`, `regiones`.`nombre` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `regiones` AS `regiones`, `municipios` AS `municipios`
 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `regiones`.`id_region` = `municipios`.`id_region` AND `municipios`.`id_finanzas` = `obras`.`municipio` 
 AND `poa02_origen`.`tipo` = 1 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and regiones.id_region=".$row['id_region']."
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `regiones`.`id_region` = `municipios`.`id_region` AND `municipios`.`id_finanzas` = `obras`.`municipio`
 AND `poa02_origen`.`tipo` = 1  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 and regiones.id_region=".$row['id_region']."
group  by regiones.id_region";


$query2="sELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total`, `regiones`.`id_region`, `regiones`.`nombre` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `regiones` AS `regiones`, `municipios` AS `municipios`
 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `regiones`.`id_region` = `municipios`.`id_region` AND `municipios`.`id_finanzas` = `obras`.`municipio` 
 AND `poa02_origen`.`tipo` = 2 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and regiones.id_region=".$row['id_region']."
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `regiones`.`id_region` = `municipios`.`id_region` AND `municipios`.`id_finanzas` = `obras`.`municipio`
 AND `poa02_origen`.`tipo` = 2  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 and regiones.id_region=".$row['id_region']."
group  by regiones.id_region";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);
		
		
		
	$dataSet->addPoint(new Point($row['id_region']." ".$row['nombre'], (number_format((($row['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));
	//$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+(($row['total']+$rowres1['total'])-$rowres2['total']);
	}
	
		if ($tipo=="mun"){ 
		//if ($row['id_finanzas']=="59" or $row['id_finanzas']=="60"){}else{
	$dataSet->addPoint(new Point($row['id_finanzas']." ".$row['nombre'], (number_format($row['total'],2,".",""))));
	//$cp=$cp+$row['CuentaDeacronimo'];
	$tt=$tt+$row['total'];
		//}
	}
	
		if ($tipo=="eje"){ 
		


		$query1="SELECT `eje`.`id_eje`, `eje`.`eje`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
FROM `eje` AS `eje`, `proyectos` AS `proyectos`, `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `eje`.`id_eje` = `proyectos`.`id_eje` AND `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and proyectos.id_eje=".$row['id_eje']."
OR  `eje`.`id_eje` = `proyectos`.`id_eje` AND `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 and proyectos.id_eje=".$row['id_eje']."
GROUP BY `eje`.`id_eje` ORDER BY `eje`.`id_eje` ASC";


$query2="SELECT `eje`.`id_eje`, `eje`.`eje`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS total, `poa02_origen`.`tipo` 
FROM `eje` AS `eje`, `proyectos` AS `proyectos`, `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `eje`.`id_eje` = `proyectos`.`id_eje` AND `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and proyectos.id_eje=".$row['id_eje']."
OR  `eje`.`id_eje` = `proyectos`.`id_eje` AND `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 and proyectos.id_eje=".$row['id_eje']."
GROUP BY `eje`.`id_eje` ORDER BY `eje`.`id_eje` ASC";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);

	$dataSet->addPoint(new Point($row['eje'], (number_format((($row['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));
	//$cp=$cp+$row['CuentaDeacronimo'];
$tt=$tt+(($row['total']+$rowres1['total'])-$rowres2['total']);
	}
	
	
	
		if ($tipo=="fin"){ 
		
	$query1="SELECT `finalidad`.`id_finalidad`, `finalidad`.`nombre`, `finalidad`.`descripcion`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
	   FROM `obras` AS `obras`, `proyectos` AS `proyectos`, `finalidad` AS `finalidad`, `poa02_origen` AS `poa02_origen`
	    WHERE `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `finalidad`.`id_finalidad` = `proyectos`.`finalidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1 
	  	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `finalidad`.`id_finalidad` = ".$row['id_finalidad']."
			OR `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `finalidad`.`id_finalidad` = `proyectos`.`finalidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1 
	  	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `finalidad`.`id_finalidad` = ".$row['id_finalidad']."
		  GROUP BY `finalidad`.`id_finalidad` ORDER BY `finalidad`.`id_finalidad` ASC";


$query2="SELECT `finalidad`.`id_finalidad`, `finalidad`.`nombre`, `finalidad`.`descripcion`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
	   FROM `obras` AS `obras`, `proyectos` AS `proyectos`, `finalidad` AS `finalidad`, `poa02_origen` AS `poa02_origen`
	    WHERE `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `finalidad`.`id_finalidad` = `proyectos`.`finalidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2 
	   	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `finalidad`.`id_finalidad` = ".$row['id_finalidad']."
			OR `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `finalidad`.`id_finalidad` = `proyectos`.`finalidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2 
	   	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `finalidad`.`id_finalidad` = ".$row['id_finalidad']."
		  GROUP BY `finalidad`.`id_finalidad` ORDER BY `finalidad`.`id_finalidad` ASC";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);		
		
	$dataSet->addPoint(new Point(html_entity_decode($row['nombre']),  (number_format((($row['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));
	//$cp=$cp+$row['CuentaDeacronimo'];
$tt=$tt+(($row['total']+$rowres1['total'])-$rowres2['total']);
	}
	
	if ($tipo=="fun"){ 
	$query1="SELECT `funcion`.`id_funcion`, `funcion`.`nombre`, `funcion`.`descripcion`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
	   FROM `obras` AS `obras`, `proyectos` AS `proyectos`, `funcion` AS `funcion`, `poa02_origen` AS `poa02_origen`
	    WHERE `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `funcion`.`id_funcion` = `proyectos`.`funcion` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1 
	   	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `funcion`.`id_funcion` = ".$row['id_funcion']."
			OR `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `funcion`.`id_funcion` = `proyectos`.`funcion` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1 
	   	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `funcion`.`id_funcion` = ".$row['id_funcion']."
		  GROUP BY `funcion`.`id_funcion` ORDER BY `funcion`.`id_funcion` ASC";


$query2="SELECT `funcion`.`id_funcion`, `funcion`.`nombre`, `funcion`.`descripcion`, SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo` 
	   FROM `obras` AS `obras`, `proyectos` AS `proyectos`, `funcion` AS `funcion`, `poa02_origen` AS `poa02_origen`
	    WHERE `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `funcion`.`id_funcion` = `proyectos`.`funcion` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2 
	  	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `funcion`.`id_funcion` = ".$row['id_funcion']."
			OR `obras`.`id_proyecto` = `proyectos`.`id_proyecto` AND `funcion`.`id_funcion` = `proyectos`.`funcion` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	      AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2 
	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `funcion`.`id_funcion` = ".$row['id_funcion']."
		  GROUP BY `funcion`.`id_funcion` ORDER BY `funcion`.`id_funcion` ASC";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);		
		
	$dataSet->addPoint(new Point(html_entity_decode($row['nombre']),  (number_format((($row['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));
	//$cp=$cp+$row['CuentaDeacronimo'];
$tt=$tt+(($row['total']+$rowres1['total'])-$rowres2['total']);
	}
	
	}
	//$dataSet->addPoint(new Point("Feb 2005", 120321));
	//$dataSet->addPoint(new Point("March 2005", 1442));
	//$dataSet->addPoint(new Point("April 2005", 711));
	$chart->setDataSet($dataSet);
	
	$chart->setTitle($title2);
$chart->render("tmp/".$tipo."_ap.png");


?>


  <div align="center">

<img alt="Line chart"  src="tmp/<?php echo $tipo?>_ap.png" style="border: 1px solid gray;"/>

</div> <div align="center"><b><?php echo $titlebottom; ?><b></div>

<div style="-webkit-transform: rotate(-90deg);
-moz-transform: rotate(-90deg);
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3); position:absolute; margin-left:-40px; margin-top:-220px;">INVERSION TOTAL</div>

 <div align="center" style="position:absolute; margin-left:50px; margin-top:-5px;"><b>TOTAL POA OBRAS: <?php 
/*SELECT * 
FROM  `obras` 
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
WHERE status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0 
GROUP BY poa02_origen.id_obra*/ 
 
 //AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
 //AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
 $query3=mysql_query("SELECT obras.id_obra 
FROM  `obras` 
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
WHERE status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra",$siplan_data_conn);
$cp=$cp+mysql_num_rows($query3); echo $cp; ?><b></div>
 <div align="center" style="position:absolute; margin-left:300px; margin-top:-5px;"><b>Total de Inversi贸n Aprobada: <?php echo number_format($tt,2); ?><b></div>
</br>

</div></div>
</br>	

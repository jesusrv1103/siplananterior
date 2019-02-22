<?php session_start(); 
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
//$siplan_data_conn; conexion
class PDF extends FPDF
{
	
	
//Cabecera de página
function Header()
{
$this->SetMargins(3,3);
$this->SetFont('Arial','B',13);
////////////////Logos//////////////////////////////////////////////
$this->Image('logoupla.jpg',5,5,81,17);

$this->SetXY(3,3);
$this->MultiCell(292,5,"COORDINACIÓN ESTATAL DE PLANEACIÓN",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(292,5,"Dirección de Programación",0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(292,5,"Programa Operativo Anual de Inversión 2017",0,C,0); 
$this->SetFont('Arial','',10);







$this->SetFont('Arial','B',10);


$X=3;
$Y=35;
$this->SetXY($X,$Y);



$X=30;
$Y=30;


$this->SetXY($X,$Y);



	$this->Ln(5);
}

//Pie de página
function Footer()
{
	//Posición: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',7);
	//Número de página
	$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
	
	$this->SetY(-10);
	$this->Cell(50,5,'Fecha de Impresón: '.date('d/m/Y'),0,0,'C');
	
	
	//date('Y/m/d')
}
}


//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','Legal');  //$pdf=new PDF('L','mm','Legal');  oficio array(215.90,340) 21.59 x 35.56 es del tamaño legal
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

function limpiar($String){
$String = str_replace('á',"Á",$String);
$String = str_replace('í',"Í",$String);
$String = str_replace('é',"É",$String);
$String = str_replace('ó',"Ó",$String);
$String = str_replace('ú',"Ú",$String);
$String = str_replace("ñ","Ñ",$String);
$String = str_replace("ý","Ý",$String);

$String = str_replace('Á',"á",$String);
$String = str_replace('Í',"í",$String);
$String = str_replace('É',"é",$String);
$String = str_replace('Ó',"ó",$String);
$String = str_replace('Ú',"ú",$String);
$String = str_replace("Ñ","ñ",$String);
$String = str_replace("Ý","ý",$String);


return $String;
}

if($fecha!=""){


	}





$pdf->SetWidths(array(39,39,39,39,39,39,39,39,39));


$id_dependencia = $_SESSION['id_dependencia_v3'];






	  $query="SELECT * from municipios order by id_municipio asc ";
$consulta_obras = mysql_query($query,$siplan_data_conn) or die (mysql_error());



	   

function fechamesyr($fechav){
			
			if ($fechav!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechav);
    return mes($m)."-".$a;
	}else{
		return "No hay";
		}
			
}
		
		
		
		
		
		
		function mes($mes){
if ($mes=="01") $mes="Ene";
if ($mes=="02") $mes="Feb";
if ($mes=="03") $mes="Mar";
if ($mes=="04") $mes="Abr";
if ($mes=="05") $mes="May";
if ($mes=="06") $mes="Jun";
if ($mes=="07") $mes="Jul";
if ($mes=="08") $mes="Ago";
if ($mes=="09") $mes="Sep";
if ($mes=="10") $mes="Oct";
if ($mes=="11") $mes="Nov";
if ($mes=="12") $mes="Dic";
 return $mes;
}

	
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

//$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);
$ya=0;
while($row1 = mysql_fetch_array($consulta_obras))

	{ 
$pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Programada 2017",0,C,0); 
$pdf->SetXY($xx,$yy);
$ya=1;
}



		
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
	
	if (mysql_num_rows($consulta_obras)>=1){
	 $pdf->SetFont('Arial','B',10);
     $pdf->SetAligns(array(C,C,C,C,C));
	 $pdf->SetX(3);
	 $pdf->MultiCell(210,5,"NO.: ".$row1['id_municipio']."  MUNICIPIO: ".ucwords(utf8_decode(strtolower(limpiar($row1['nombre'])))),0,L,0);
	 
	  $pdf->SetX(3);
	// $pdf->Row(array("No. Oficio","Tipo","No. Obra","Importe X Obra","Total X Oficio"));
	 	$pdf->SetAligns(array(C,C,C,C,C,C,C,C,C));
$pdf->Row(array("DEPENDENCIA","NO. OBRAS","APORTE FEDERAL","APORTE ESTATAL","APORTE MUNICIPAL","PARTICIPANTES","CREDITOS","OTROS","TOTAL"));
	 }

	 
	 $consulta_obras1 = mysql_query("
	

SELECT dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo, municipios.nombre, municipios.id_municipio
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

where obras.municipio=".$row1['id_municipio']." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia" ,$siplan_data_conn) or die (mysql_error());

	$pdf->SetFont('Arial','',9);
	while($row = mysql_fetch_array($consulta_obras1))

	{
	
	
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
	$pdf->Row(array($row['acronimo'],number_format($row['CuentaDeacronimo']),"$ ".number_format($row['SumaDefederal'],2),"$ ".number_format($row['SumaDeestatal'],2),"$ ".number_format($row['SumaDemunicipal'],2),"$ ".number_format($row['SumaDeparticipantes'],2),"$ ".number_format($row['SumaDecredito'],2),"$ ".number_format($row['SumaDeotros'],2),"$ ".number_format($row['total'],2)));
		$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	
	}
	$pdf->SetFont('Arial','B',9);
	$pdf->Row(array("Total Por Municipio:",$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->Ln(8);
//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:
 ///final del while
if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}	}
	
	
	
	
	////---nuevo aprobadas------------//
	
	$pdf->AddPage();
$pdf->SetFont('Arial','',9);



if($fecha!=""){


	}





$pdf->SetWidths(array(39,39,39,39,39,39,39,39,39));


$id_dependencia = $_SESSION['id_dependencia_v3'];






	  $query="SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `municipios`.`id_municipio`, `municipios`.`nombre` 
	  FROM `municipios` AS `municipios`, `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
	  WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra`
	   AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
	   AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 		OR `municipios`.`id_municipio` = `obras`.`municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra`
	   AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
	   AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
	   GROUP BY `municipios`.`id_municipio` ORDER BY `municipios`.`id_municipio` ASC";
$consulta_obras = mysql_query($query,$siplan_data_conn) or die (mysql_error());



	   

	
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

//$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);
$ya=0;
while($row1 = mysql_fetch_array($consulta_obras))


	{ $pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada 2017",0,C,0); 
$pdf->SetXY($xx,$yy);
$ya=1;
}

		
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
	
	if (mysql_num_rows($consulta_obras)>=1){
	 $pdf->SetFont('Arial','B',10);
     $pdf->SetAligns(array(C,C,C,C,C));
	 $pdf->SetX(3);
	 $pdf->MultiCell(210,5,"NO.: ".$row1['id_municipio']."  MUNICIPIO: ".ucwords(utf8_decode(strtolower(limpiar($row1['nombre'])))),0,L,0);
	 
	  $pdf->SetX(3);
	// $pdf->Row(array("No. Oficio","Tipo","No. Obra","Importe X Obra","Total X Oficio"));
	 	$pdf->SetAligns(array(C,C,C,C,C,C,C,C,C));
$pdf->Row(array("DEPENDENCIA","NO. OBRAS","APORTE FEDERAL","APORTE ESTATAL","APORTE MUNICIPAL","PARTICIPANTES","CREDITOS","OTROS","TOTAL"));
	 }

	 
	 $consulta_obras1 = mysql_query("SELECT `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	 FROM `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	  WHERE `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  and obras.municipio=".$row1['id_municipio']." 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR  `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  and obras.municipio=".$row1['id_municipio']." 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
	
	 GROUP BY `obras`.`id_dependencia` ORDER BY `dependencias`.`id_dependencia` ASC" ,$siplan_data_conn) or die (mysql_error());


	$pdf->SetFont('Arial','',9);
	while($row = mysql_fetch_array($consulta_obras1))

	{
	
	
	
$sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$row['acronimo']."' AND `obras`.`municipio` = '".$row['municipio']."' 
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$row['acronimo']."' AND `obras`.`municipio` = '".$row['municipio']."' 
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY poa02_origen.s08c_origen");
	//$res_aporte_est= mysql_fetch_assoc($sac_aportes_est);
	
	$totals=0;
	$federal=0;
	$estatal=0;
	$municipal=0;
	$particip=0;
	$credito=0;
	$otros=0;
	$orige_n=0;
	while($res_aporte_eje = mysql_fetch_assoc($sac_aportes_eje))
	{ 
	  $orige_n= substr($res_aporte_eje['s08c_origen'],-4,4);
	 

		 if($orige_n=="3102"){

			 $particip= $particip + $res_aporte_eje['sumamonto'];

			}else{ 	 
		
	switch($orige_n)
	{
	  case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal + $res_aporte_eje['sumamonto'];
	  break;

	  case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal + $res_aporte_eje['sumamonto'];
	  break;
	  
	  case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal + $res_aporte_eje['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros +  $res_aporte_eje['sumamonto'];
	  break;  
	  
	}

	}
}
	
	////termina ejecuciones
	
	

	//sacar tipo ampliaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$row['municipio']."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$row['municipio']."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY  poa02_origen.s08c_origen
");
	//$res_aporte_est_amp= mysql_fetch_assoc($sac_aportes_est_amp);
	  $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{ 
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);
	  
	  
	

			 	 if($orige_n=="3102"){

			 $particip= $particip + $res_aporte_amp['sumamonto'];

			}else{	
		
	switch($orige_n)
	{
	case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal + $res_aporte_amp['sumamonto'];
	  break;

	   case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal + $res_aporte_amp['sumamonto'];
	  break;
	  
	  case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal + $res_aporte_amp['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros +  $res_aporte_amp['sumamonto'];
	  break;  
	  
	}

	}
	}
	
		
	////termina ampliaciones
	
	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$row['municipio']."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$row['municipio']."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY poa02_origen.s08c_origen
");
	//$res_aporte_est_can= mysql_fetch_assoc($sac_aportes_est_can);
	
	
	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{ 
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);
	 	 
	
		 

	 	 if($orige_n=="3102"){

			 $particip= $particip - $res_aporte_can['sumamonto'];

			}else{
	
	switch($orige_n)
	{
	case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal - $res_aporte_can['sumamonto'];
	  break;

	  case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal - $res_aporte_can['sumamonto'];
	  break;
	  
	 case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal - $res_aporte_can['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros -  $res_aporte_can['sumamonto'];
	  break;  
	  
	}

	}
}
		
	////termina cancelaciones
	
	//sacar cada uno de ellos con las cancelaciones y ampliaciones
//$federal= ($res_aporte_fed['sumamonto']+$res_aporte_fed_amp['sumamonto'])-($res_aporte_fed_can['sumamonto']);

//$estatal=($res_aporte_est['sumamonto']+$res_aporte_est_amp['sumamonto'])-($res_aporte_est_can['sumamonto']);
//$municipal=($res_aporte_mun['sumamonto']+$res_aporte_mun_amp['sumamonto'])-($res_aporte_mun_can['sumamonto']);
//$particip=0;//number_format($res_aporte['participantes'],2);
//$credito=0;//number_format($res_aporte['credito'],2);
//$otros=($res_aporte_otr['sumamonto']+$res_aporte_otr_amp['sumamonto'])-($res_aporte_otr_can['sumamonto']);
	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;

		

		
			$sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia` 
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$row['id_dependencia']." and obras.municipio=".$row['municipio']."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$row['id_dependencia']." and obras.municipio=".$row['municipio']."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra
");
	$res_cuenta= mysql_num_rows($sac_cuenta);		
	
	
	
	
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
	$pdf->Row(array($row['acronimo'],number_format($res_cuenta),"$ ".number_format($federal,2),"$ ".number_format($estatal,2),"$ ".number_format($municipal,2),"$ ".number_format($particip,2),"$ ".number_format($credito,2),"$ ".number_format($otros,2),"$ ".number_format($totals,2)));
		$tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	$cp=$cp+$res_cuenta;



	
	}
	$pdf->SetFont('Arial','B',9);
	$pdf->Row(array("Total Por Municipio:",$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->Ln(8);
//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:
 ///final del while
if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}	}
	///----------------------------------///
	

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Resumen Municipio.pdf','I');

?>

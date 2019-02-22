<?php session_start(); 
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
$pr=$_GET['g'];
//$siplan_data_conn;  conexion
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






	  $query="SELECT `programas_poa`.`id_programa_poa`, `programas_poa`.`clave`, `programas_poa`.`descripcion` FROM `programas_poa` AS `programas_poa`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa` WHERE `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` and `obras`.`status_obra`>=3 and programas_poa.id_programa_poa=".$pr." GROUP BY `programas_poa`.`id_programa_poa` ORDER BY `programas_poa`.`clave` ASC ";
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

	{  $pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Programada 2017",0,C,0); 
$pdf->SetXY($xx,$yy);
$ya=1;
}

		
	$tt1=0;
	$fd1=0;
	$st1=0;
	$mn1=0;
	$pt1=0;
	$cr1=0;
	$ot1=0;
	$cp1=0;
	
	if (mysql_num_rows($consulta_obras)>=1){
	 $pdf->SetFont('Arial','B',10);
     $pdf->SetAligns(array(C,C,C,C,C));
	 $pdf->SetX(3);
	 $pdf->MultiCell(210,5,"PROGRAMA: ".$row1['clave']." ".ucwords(strtolower(limpiar(utf8_decode($row1['descripcion'])))),0,L,0);
	 
	 
	
	 
	   $query2="SELECT `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` FROM `programas_poa` AS `programas_poa`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa` WHERE `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` and subprogramas_poa.id_programa_poa=".$row1['id_programa_poa']." and `obras`.`status_obra`>=3 GROUP BY `subprogramas_poa`.`id_subprograma_poa` ORDER BY `subprogramas_poa`.`clave` ASC ";
//$query2="SELECT `dependencias`.`acronimo`, SUM( `aportes`.`federal` ) AS `SumaDefederal`, SUM( `aportes`.`estatal` ) AS `SumaDeestatal`, SUM( `aportes`.`municipal` ) AS `SumaDemunicipal`, SUM( `aportes`.`participantes` ) AS `SumaDeparticipantes`, SUM( `aportes`.`credito` ) AS `SumaDecredito`, SUM( `aportes`.`otros` ) AS `SumaDeotros`, SUM( `aportes`.`federal` + `aportes`.`estatal` + `aportes`.`municipal` + `aportes`.`participantes` + `aportes`.`credito` + `aportes`.`otros` ) AS `total`, COUNT( `dependencias`.`acronimo` ) AS `CuentaDeacronimo`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion`, `programas_poa`.`clave`, `programas_poa`.`descripcion` FROM `obras` AS `obras`, `aportes` AS `aportes`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`, `programas_poa` AS `programas_poa` WHERE `obras`.`id_obra` = `aportes`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` GROUP BY `dependencias`.`acronimo`, `programas_poa`.`clave`";
//$query2="SELECT subprogramas_poa.id_subprograma_poa,subprogramas_poa.id_programa_poa, subprogramas_poa.clave, subprogramas_poa.descripcion from subprogramas_poa inner join obras on subprogramas_poa.id_subprograma_poa=obras.subprograma_poa where subprogramas_poa.id_programa_poa=".$row1['id_programa_poa']."  GROUP BY id_programa_poa ";

	$consulta_obras2 = mysql_query($query2,$siplan_data_conn) or die (mysql_error()); 
	
	while($row2 = mysql_fetch_array($consulta_obras2)){
 
//----


//-- 
 
  $pdf->SetX(3);
  $pdf->Ln(2);
  $pdf->SetFont('Arial','B',10);
	 $pdf->MultiCell(210,5,"SUBPROGRAMA: ".$row2['clave']." ".ucwords(strtolower(limpiar(utf8_decode($row2['descripcion'])))),0,L,0);
	 $pdf->SetX(3);
	 $pdf->SetFont('Arial','',9);
	// $pdf->Row(array("No. Oficio","Tipo","No. Obra","Importe X Obra","Total X Oficio"));
	 	$pdf->SetAligns(array(C,C,C,C,C,C,C,C,C));
$pdf->Row(array("DEPENDENCIA","NO. OBRAS","APORTE FEDERAL","APORTE ESTATAL","APORTE MUNICIPAL","PARTICIPANTES","CREDITOS","OTROS","TOTAL"));

/* $consulta_obras1 = mysql_query("SELECT dependencias.acronimo, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo, sectores.id_sector, sectores.sector
FROM sectores INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON sectores.id_sector = dependencias.id_sector where sectores.id_sector=".$row1['id_sector']."
 GROUP BY dependencias.acronimo, sectores.id_sector, sectores.sector" ,$siplan_data_conn) or die (mysql_error());
*/

$consulta_obras1 = mysql_query("SELECT 
	`subprogramas_poa`.`clave`,`subprogramas_poa`.`id_subprograma_poa`,	dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo ,`subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa

WHERE `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." and `obras`.`status_obra`>=3
 GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`,`subprogramas_poa`.`descripcion` order by obras.id_dependencia asc
" ,$siplan_data_conn) or die (mysql_error());
	$pdf->SetFont('Arial','',9);
		
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
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
		$tt1+=$tt;
	$fd1+=$fd;
	$st1+=$st;
	$mn1+=$mn;
	$pt1+=$pt;
	$cr1+=$cr;
	$ot1+=$ot;
	$cp1+=$cp;
	$pdf->SetFont('Arial','B',9);
	$pdf->Row(array("Total Por Subprograma:",$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$pdf->SetFont('Arial','I',10);

}
	 
	  
	 }

	 
	
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
//$pdf->SetXY(11, $newy);
//$pdf->Ln(8);
//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:
 if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}	

	$pdf->SetFont('Arial','B',9);
	$pdf->Row(array("Total Por Programa:",$cp1,"$ ".number_format($fd1,2),"$ ".number_format($st1,2),"$ ".number_format($mn1,2),"$ ".number_format($pt1,2),"$ ".number_format($cr1,2),"$ ".number_format($ot1,2),"$ ".number_format($tt1,2)));
	$pdf->SetFont('Arial','I',10);	
	$pdf->Ln(8);
	}
	

$consulta_obras2 = mysql_query($query2,$siplan_data_conn) or die (mysql_error()); 
	
	while($row2 = mysql_fetch_array($consulta_obras2)){
 
//----
	$pdf->AddPage();
	//$mun1=mysql_query("select * from origen where origen.s08c_origen='".$tipo."'");	
	//$row1=mysql_fetch_array($mun1);
$pdf->SetFont('Arial','',10);	
	$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,24);
$pdf->MultiCell(292,5,"Resumen de Inversión Programada 2017 ",0,C,0); 
	$pdf->SetXY($xx,$yy);
	$tipo=$_GET['g'];
	$pdf->Image('tmp/subp'.$row2['clave'].'.png',10,55,290,130);
}
///-----nuevo aprobados---------///


 $query="SELECT `programas_poa`.`id_programa_poa`, `programas_poa`.`clave`, `programas_poa`.`descripcion`, `obras`.`id_dependencia`, `obras`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`
	   FROM `obras` AS `obras`, `programas_poa` AS `programas_poa`, `poa02_origen` AS `poa02_origen` 
	   WHERE `obras`.`programa_poa` = `programas_poa`.`id_programa_poa` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	   AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	   AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and programas_poa.id_programa_poa=".$pr."
			OR `obras`.`programa_poa` = `programas_poa`.`id_programa_poa` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	   AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	   AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 and programas_poa.id_programa_poa=".$pr."
	  GROUP BY `programas_poa`.`id_programa_poa` ORDER BY `programas_poa`.`id_programa_poa` ASC";
$consulta_obras = mysql_query($query,$siplan_data_conn) or die (mysql_error());

if (mysql_num_rows($consulta_obras)>=1){

$pdf->AddPage();
$pdf->SetFont('Arial','',9);

}

if($fecha!=""){


	}





$pdf->SetWidths(array(39,39,39,39,39,39,39,39,39));


$id_dependencia = $_SESSION['id_dependencia_v3'];





	 
/*  SELECT `programas_poa`.`id_programa_poa`, `programas_poa`.`clave`, `programas_poa`.`descripcion` 
	  FROM `programas_poa` AS `programas_poa`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa` 
	  WHERE `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` 
	  and `obras`.`status_obra`=4 
	  GROUP BY `programas_poa`.`id_programa_poa` 
	  ORDER BY `programas_poa`.`clave` ASC */


	   

		
		
		
	

	
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

	{  $pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada 2017",0,C,0); 
$pdf->SetXY($xx,$yy);
$ya=1;
}

		
	$tt1=0;
	$fd1=0;
	$st1=0;
	$mn1=0;
	$pt1=0;
	$cr1=0;
	$ot1=0;
	$cp1=0;
	
	if (mysql_num_rows($consulta_obras)>=1){
	 $pdf->SetFont('Arial','B',10);
     $pdf->SetAligns(array(C,C,C,C,C));
	 $pdf->SetX(3);
	 $pdf->MultiCell(210,5,"PROGRAMA: ".$row1['clave']." ".ucwords(strtolower(limpiar(utf8_decode($row1['descripcion'])))),0,L,0);
	 
	 
	
	 
	   $query2="SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion`, `subprogramas_poa`.`id_programa_poa` FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `subprogramas_poa` AS `subprogramas_poa`
	    WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
	     AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `subprogramas_poa`.`id_programa_poa` = ".$row1['id_programa_poa']."
	  	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 		OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
	     AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `subprogramas_poa`.`id_programa_poa` = ".$row1['id_programa_poa']."
	   	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
	     GROUP BY `subprogramas_poa`.`id_subprograma_poa`
	    ORDER BY `subprogramas_poa`.`id_subprograma_poa` ASC";
	    /*
	   SELECT `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
	   FROM `programas_poa` AS `programas_poa`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa`
	    WHERE `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` 
	    and subprogramas_poa.id_programa_poa=".$row1['id_programa_poa']." and `obras`.`status_obra`=4 
	    GROUP BY `subprogramas_poa`.`id_subprograma_poa` ORDER BY `subprogramas_poa`.`clave` ASC */
//$query2="SELECT `dependencias`.`acronimo`, SUM( `aportes`.`federal` ) AS `SumaDefederal`, SUM( `aportes`.`estatal` ) AS `SumaDeestatal`, SUM( `aportes`.`municipal` ) AS `SumaDemunicipal`, SUM( `aportes`.`participantes` ) AS `SumaDeparticipantes`, SUM( `aportes`.`credito` ) AS `SumaDecredito`, SUM( `aportes`.`otros` ) AS `SumaDeotros`, SUM( `aportes`.`federal` + `aportes`.`estatal` + `aportes`.`municipal` + `aportes`.`participantes` + `aportes`.`credito` + `aportes`.`otros` ) AS `total`, COUNT( `dependencias`.`acronimo` ) AS `CuentaDeacronimo`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion`, `programas_poa`.`clave`, `programas_poa`.`descripcion` FROM `obras` AS `obras`, `aportes` AS `aportes`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`, `programas_poa` AS `programas_poa` WHERE `obras`.`id_obra` = `aportes`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` GROUP BY `dependencias`.`acronimo`, `programas_poa`.`clave`";
//$query2="SELECT subprogramas_poa.id_subprograma_poa,subprogramas_poa.id_programa_poa, subprogramas_poa.clave, subprogramas_poa.descripcion from subprogramas_poa inner join obras on subprogramas_poa.id_subprograma_poa=obras.subprograma_poa where subprogramas_poa.id_programa_poa=".$row1['id_programa_poa']."  GROUP BY id_programa_poa ";

	$consulta_obras2 = mysql_query($query2,$siplan_data_conn) or die (mysql_error()); 
	
	while($row2 = mysql_fetch_array($consulta_obras2)){
 
  $pdf->SetX(3);
  $pdf->Ln(2);
  $pdf->SetFont('Arial','B',10);
	 $pdf->MultiCell(210,5,"SUBPROGRAMA: ".$row2['clave']." ".ucwords(strtolower(limpiar(utf8_decode($row2['descripcion'])))),0,L,0);
	 $pdf->SetX(3);
	 $pdf->SetFont('Arial','',9);
	// $pdf->Row(array("No. Oficio","Tipo","No. Obra","Importe X Obra","Total X Oficio"));
	 	$pdf->SetAligns(array(C,C,C,C,C,C,C,C,C));
$pdf->Row(array("DEPENDENCIA","NO. OBRAS","APORTE FEDERAL","APORTE ESTATAL","APORTE MUNICIPAL","PARTICIPANTES","CREDITOS","OTROS","TOTAL"));

/* $consulta_obras1 = mysql_query("SELECT dependencias.acronimo, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo, sectores.id_sector, sectores.sector
FROM sectores INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON sectores.id_sector = dependencias.id_sector where sectores.id_sector=".$row1['id_sector']."
 GROUP BY dependencias.acronimo, sectores.id_sector, sectores.sector" ,$siplan_data_conn) or die (mysql_error());
*/

/*$consulta_obras1 = mysql_query("SELECT `dependencias`.`acronimo`, SUM( `aportes`.`federal` ) AS `SumaDefederal`, SUM( `aportes`.`estatal` ) AS `SumaDeestatal`, SUM( `aportes`.`municipal` ) AS `SumaDemunicipal`, SUM( `aportes`.`participantes` ) AS `SumaDeparticipantes`, SUM( `aportes`.`credito` ) AS `SumaDecredito`, SUM( `aportes`.`otros` ) AS `SumaDeotros`, SUM( `aportes`.`federal` + `aportes`.`estatal` + `aportes`.`municipal` + `aportes`.`participantes` + `aportes`.`credito` + `aportes`.`otros` ) AS `total`, 
COUNT( `dependencias`.`acronimo` ) AS `CuentaDeacronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion` FROM `obras` AS `obras`, `aportes` AS `aportes`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa` 
WHERE `obras`.`id_obra` = `aportes`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." and `obras`.`status_obra`=4 GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`,`subprogramas_poa`.`descripcion`" ,$siplan_data_conn) or die (mysql_error());
*/

//echo "SELECT `dependencias`.`acronimo`, COUNT( `dependencias`.`acronimo` ) AS `CuentaDeacronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion` FROM `obras` AS `obras`, `aportes` AS `aportes`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa` WHERE `obras`.`id_obra` = `aportes`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `subprogramas_poa`.`id_subprograma_poa` =".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = '4' GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`descripcion`, `subprogramas_poa`.`id_subprograma_poa`";
$consulta_obras1=mysql_query("SELECT `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, COUNT( `dependencias`.`acronimo` ) AS `CuentaDeacronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
FROM `dependencias` AS `dependencias`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa`, `poa02_origen` AS `poa02_origen`
 WHERE `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` =".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = '4' 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 OR `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` =".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = '4' 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`descripcion`, `subprogramas_poa`.`id_subprograma_poa`

",$siplan_data_conn) or die (mysql_error());	
/*ELECT dependencias.id_dependencia,`dependencias`.`acronimo`, COUNT( `dependencias`.`acronimo` ) AS `CuentaDeacronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion` 
FROM `obras` AS `obras`, `aportes` AS `aportes`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa` 
WHERE `obras`.`id_obra` = `aportes`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `subprogramas_poa`.`id_subprograma_poa` =".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = '4' 
GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`descripcion`, `subprogramas_poa`.`id_subprograma_poa`*/	
	
	$pdf->SetFont('Arial','',9);
		
		
		
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
	while($row = mysql_fetch_array($consulta_obras1))

	{
		
		
		
		
		
//SELECT poa02_origen.s08c_origen, poa02_origen.tipo, dependencias.acronimo, SUM(poa02_origen.monto) AS sumamonto, subprogramas_poa.id_subprograma_poa, subprogramas_poa.clave, subprogramas_poa.descripcion FROM obras AS obras, poa02_origen AS poa02_origen, dependencias AS dependencias, subprogramas_poa AS subprogramas_poa WHERE obras.id_obra = poa02_origen.id_obra AND dependencias.id_dependencia = obras.id_dependencia AND subprogramas_poa.id_subprograma_poa = obras.subprograma_poa GROUP BY poa02_origen.s08c_origen, poa02_origen.tipo, dependencias.acronimo, subprogramas_poa.id_subprograma_poa HAVING ( ( dependencias.acronimo = 'SEGOB' AND subprogramas_poa.id_subprograma_poa = 1 ) )

//SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa` WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` GROUP BY `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`		


//sacar tipo ejecucions buscar por dependecia y subprograma y mas el between

//QUTAR GROUP BY `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`
 	$sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=0
 	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
 	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=0
 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen");
//	$res_aporte_est= mysql_fetch_assoc($sac_aportes_est);
	
	
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
 	$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=1 
 	 	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
 	 	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=1 
 	 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen
 	 	
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
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  group by s08c_origen
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

$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;  

	/*	
		echo "SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion`, `subprogramas_poa`.`id_programa_poa`, `poa02_origen`.`id_obra`, `obras`.`id_dependencia` 
		FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `subprogramas_poa` AS `subprogramas_poa` 
		WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
		 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
		AND `poa02_origen`.`s07c_partid` BETWEEN '4000' AND '4999' 
		 and obras.id_dependencia=".$row['id_dependencia']."
		 AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']."
		OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
		 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
		AND `poa02_origen`.`s07c_partid` BETWEEN '6000' AND '6999' 
		 and obras.id_dependencia=".$row['id_dependencia']."
		 AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']."
		 GROUP BY `poa02_origen`.`id_obra` ORDER BY `subprogramas_poa`.`id_subprograma_poa` ASC";*/
		
	
			$sac_cuenta = mysql_query("SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion`, `subprogramas_poa`.`id_programa_poa`, `poa02_origen`.`id_obra`, `obras`.`id_dependencia` 
		FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `subprogramas_poa` AS `subprogramas_poa` 
		WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
		 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
		 and obras.id_dependencia=".$row['id_dependencia']."
		 AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']."
		OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
		 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
		 and obras.id_dependencia=".$row['id_dependencia']."
		 AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']."
		 GROUP BY `poa02_origen`.`id_obra` ORDER BY `subprogramas_poa`.`id_subprograma_poa` ASC");
		 
		 
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
		$tt1+=$tt;
	$fd1+=$fd;
	$st1+=$st;
	$mn1+=$mn;
	$pt1+=$pt;
	$cr1+=$cr;
	$ot1+=$ot;
	$cp1+=$cp;
	$pdf->SetFont('Arial','B',9);
	$pdf->Row(array("Total Por Subprograma:",$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$pdf->SetFont('Arial','I',10);

}
	 
	  
	 }

	 
	
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
//$pdf->SetXY(11, $newy);
//$pdf->Ln(8);
//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:
 if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}	

	$pdf->SetFont('Arial','B',9);
	$pdf->Row(array("Total Por Programa:",$cp1,"$ ".number_format($fd1,2),"$ ".number_format($st1,2),"$ ".number_format($mn1,2),"$ ".number_format($pt1,2),"$ ".number_format($cr1,2),"$ ".number_format($ot1,2),"$ ".number_format($tt1,2)));
	$pdf->SetFont('Arial','I',10);	
	$pdf->Ln(8);
	}



$consulta_obras2 = mysql_query($query2,$siplan_data_conn) or die (mysql_error()); 
	
	while($row2 = mysql_fetch_array($consulta_obras2)){
 
//----
if (file_exists('tmp/subap'.$row2['id_subprograma_poa'].'_ap.png')){
	$pdf->AddPage();
	//$mun1=mysql_query("select * from origen where origen.s08c_origen='".$tipo."'");	
	//$row1=mysql_fetch_array($mun1);
$pdf->SetFont('Arial','',10);	
	$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,24);
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada 2017 ",0,C,0); 
	$pdf->SetXY($xx,$yy);
	$tipo=$_GET['g'];

	
	$pdf->Image('tmp/subap'.$row2['id_subprograma_poa'].'_ap.png',10,55,290,130);
}
}
	
//----------------------------------//	

	

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Resumen por Programa.pdf','I');

?>

<?php session_start();  
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
//$siplan_data_conn;  conexion
class PDF extends FPDF
{
	

	
	 function Rotate($angle,$x=-1,$y=-1) { 

        if($x==-1) 
            $x=$this->x; 
        if($y==-1) 
            $y=$this->y; 
        if($this->angle!=0) 
            $this->_out('Q'); 
        $this->angle=$angle; 
        if($angle!=0) 

        { 
            $angle*=M_PI/180; 
            $c=cos($angle); 
            $s=sin($angle); 
            $cx=$x*$this->k; 
            $cy=($this->h-$y)*$this->k; 
             
            $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy)); 
        } 
    } 
	
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
$this->SetXY(3,24);
$tipo=$_GET['g'];
$tipor=$_GET['gg'];

if ($tipor!="" ){
	
}


if ($tipo!="map" and $tipo!=""  and $tipo!="59"){
	
}
elseif($tipo=="59" ){
 

}

elseif($tipo=="map" ){
$this->MultiCell(292,5,"Resumen de Inversión por Municipios 2017",0,C,0); 

}


if($tipo=="map" ){
	$this->Image('../imagenes/mapas/59.jpg',0,30,130,130);
	$this->Ln(5);
	
	}


$this->SetFont('Arial','B',5.5);

if ($tipo!="map" and $tipo!="" and $tipo!="59" or $tipor!=""){
$X=103;
$Y=35;
$this->SetXY($X,$Y);

$this->Cell(25,5,'DEPENDENCIA',1,0,'C');
$this->Cell(12,5,'NO. OBRAS',1,0,'C');
$this->Cell(22,5,'APORTE FEDERAL',1,0,'C');
$this->Cell(22,5,'APORTE ESTATAL',1,0,'C');
$this->Cell(22,5,'APORTE MUNICIPAL',1,0,'C');
$this->Cell(22,5,'PARTICIPANTES',1,0,'C');
$this->Cell(22,5,'CREDITOS ',1,0,'C');
$this->Cell(22,5,'OTROS',1,0,'C');
$this->Cell(22,5,'TOTAL',1,0,'C');


}elseif ( $tipo=="59"){
	$this->SetFont('Arial','B',8);
$X=103;
$Y=35;
$this->SetXY($X,$Y);





}elseif($tipo=="map" ){
	$this->SetFont('Arial','B',9);
	$X=105;
$Y=35;
$this->SetXY($X,$Y);

$this->Cell(12,5,'No.',1,0,'C');
$this->Cell(90,5,'Municipio',1,0,'C');
$this->Cell(40,5,'Total Programado',1,0,'C');
$this->Cell(40,5,'Total Aprobado',1,0,'C');

	
	}




	$this->Ln(5);
	if ($tipo!="map" and $tipo!=""){
		$X=103;
	$this->SetX($X);
}elseif($tipo=="map" ){
   $X=105;
	$this->SetX($X);	}
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
$pdf=new PDF('L');//,'mm','Legal');  //$pdf=new PDF('L','mm','Legal');  oficio array(215.90,340) 21.59 x 35.56 es del tamaño legal
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







$id_dependencia = $_SESSION['id_dependencia_v3'];

$tipo=$_GET['g'];
$tipor=$_GET['gg'];

	

if ($tipo!="map" and $tipo!="" and $tipo!="59"){
	


 $consulta_obras = mysql_query("SELECT dependencias.acronimo,dependencias.id_dependencia, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM (dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia)  where obras.municipio=".$tipo." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia" );// or die (mysql_error());
 
 

 
}

elseif($tipo=="59" ){
	$consulta_obras = mysql_query("SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd,  Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN obras  ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region where obras.status_obra>=3
 GROUP BY regiones.id_region" );
 
 
}

elseif($tipor!="" ){
	
	$consulta_obras = mysql_query("SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region where regiones.id_region=".$tipor." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia" );
 
}


elseif($tipo=="map" ){
	$consulta_obras = mysql_query("SELECT municipios.nombre, municipios.id_municipio, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total
FROM municipios INNER JOIN obras  ON municipios.id_municipio = obras.municipio where  obras.status_obra>=3 
GROUP BY obras.municipio order by municipios.id_municipio asc" );
}
	


	   

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

if ($tipo!="map" and $tipo!="" and $tipo!="59" or  $tipor!=""){
$result1a=mysql_query($consulta_obras);
$nn=mysql_num_rows($consulta_obras);
if ($tipor!=""){
	$pdf->Image('tmp/mar'.$tipor.'.png',2,40,109,90);
	}
else{
$pdf->Image('tmp/ma.png',2,40,109,90); //aqui -10,40,122,90

}

$X=103;
$Y=40;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(25,12,22,22,22,22,22,22,22));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
$pdf->SetFont('Arial','',7);

$ya=0;
while($row = mysql_fetch_array($consulta_obras))

	{
	$pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetFont('Arial','',9);
	$pdf->SetXY(3,24);
	$mun1=mysql_query("select * from municipios where id_municipio=".$tipo);	
	$row1=mysql_fetch_array($mun1);
	

if ($tipor==""){
$pdf->MultiCell(292,5,"Resumen de Inversión Programada por el Municipio de ".utf8_decode($row1['nombre'])."",0,C,0); 
}elseif($tipor!=""){
$mun1=mysql_query("select * from regiones where id_region=".$tipor);	
	$row1=mysql_fetch_array($mun1);
$pdf->MultiCell(292,5,"Resumen de Inversión Programada por Region ".$row1['id_region']." ".utf8_decode($row1['nombre']),0,C,0); 
	}

$pdf->SetFont('Arial','',7);	
$pdf->SetXY($xx,$yy);
$ya=1;
}

	
		
	
	$X=103;
	$pdf->SetX($X);
	
	$pdf->Row(array($row['acronimo'],number_format($row['CuentaDeacronimo']),"$ ".number_format($row['SumaDefederal'],2),"$ ".number_format($row['SumaDeestatal'],2),"$ ".number_format($row['SumaDemunicipal'],2),"$ ".number_format($row['SumaDeparticipantes'],2),"$ ".number_format($row['SumaDecredito'],2),"$ ".number_format($row['SumaDeotros'],2),"$ ".number_format($row['total'],2)));

if ($tipo!="map" and $tipo!="" and $tipo!="59" ){


  $quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total
        FROM (dependencias INNER JOIN (municipios INNER JOIN obras ON municipios.id_municipio = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia)
 INNER JOIN localidades ON (municipios.id_municipio = localidades.id_municipio) AND (obras.localidad = localidades.id_finanzas)
 WHERE obras.municipio=".$tipo." and dependencias.acronimo='".$row['acronimo']."' and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";




/*

 $quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total

FROM
obras
INNER JOIN dependencias ON dependencias.id_dependencia = obras.id_dependencia
INNER JOIN municipios ON municipios.id_municipio = obras.municipio
INNER JOIN localidades ON localidades.id_finanzas = obras.localidad

 WHERE obras.municipio=".$tipo." and dependencias.acronimo='".$row['acronimo']."' and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion"

*/



$nnam="Total Por Municipio:";
}
if($tipor!=""){
	 $quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total FROM (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN obras ON municipios.id_municipio = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) INNER JOIN localidades ON (localidades.id_finanzas = obras.localidad) AND (municipios.id_municipio = localidades.id_municipio) WHERE regiones.id_region=".$tipor." and dependencias.acronimo='".$row['acronimo']."' and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";
$nnam="Total Por Region:";
	}

$consulta_obrasm = mysql_query($quer);

$pdf->SetWidths(array(50));
$pdf->SetAligns(array(C));
$X=103;
$pdf->SetX($X);
$pdf->SetFont('Arial','B',6);
$pdf->Row(array("Grado de Marginación"));




$pdf->SetFont('Arial','',7);
while($rowm = mysql_fetch_array($consulta_obrasm))

	{

$pdf->SetWidths(array(25,25));
$pdf->SetAligns(array(C,C));
$X=103;
$pdf->SetX($X);
if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}
$pdf->Row(array($nam1,"$ ".number_format($rowm['total'],2)));
	}
$pdf->SetWidths(array(25,12,22,22,22,22,22,22,22));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
	
		$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	
	
	if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}
	}
	$X=103;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',6);
	$pdf->Row(array($nnam,$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);
	

}
elseif ($tipo=="59"){

$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);	
$pdf->MultiCell(292,5,"Resumen de Inversión Programada por Regiones",0,C,0);	
	
$result1a=mysql_query($consulta_obras);
$nn=mysql_num_rows($consulta_obras);
 //aqui -10,40,122,90
$X=103;
$Y=35;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(10,40,30));
$pdf->SetAligns(array(C,C,C));
$pdf->SetFont('Arial','B',8);
$g=1;

$pdf->Row(array("No.","Region","Total"));
$pdf->SetFont('Arial','',8);
$pdf->SetAligns(array(C,C,R));
while($row = mysql_fetch_array($consulta_obras))

	{
	
	
	$X=103;
	$pdf->SetX($X);
	
	$pdf->Row(array($row['id_region'],utf8_decode($row['nomreg']),"$ ".number_format($row['total'],2)));

$pdf->SetWidths(array(10,40,30));
$pdf->SetAligns(array(C,C,R));
	
		$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	$g=$g+1;

	}
	$X=103;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',8);
	$pdf->Row(array("","Total Por Region:","$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);
	

}

elseif($tipo=="map" ){
	$X=105;
$Y=40;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(12,90,40,40));
$pdf->SetAligns(array(C,L,R,R));
$pdf->SetFont('Arial','',8);
$totaedo=0;
$totaedo1=0;
while($row = mysql_fetch_array($consulta_obras))

	{
	
	$X=105;
	$pdf->SetX($X);
$query1="SELECT `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`tipo`, SUM( `poa02_origen`.`monto` ) as total
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 AND `poa02_origen`.`tipo` = 0 
 AND obras.municipio=".$row['id_municipio']." and  obras.status_obra='4'
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
 AND `poa02_origen`.`tipo` = 0 
 AND obras.municipio=".$row['id_municipio']." and  obras.status_obra='4'
	GROUP BY `obras`.`municipio` ORDER BY `obras`.`municipio` ASC";
 $consulta_obras1=mysql_query($query1,$siplan_data_conn);
    $resobras1 = mysql_fetch_assoc($consulta_obras1); 
    
   		$query1="SELECT `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`tipo`, SUM( `poa02_origen`.`monto` ) as total
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 AND `poa02_origen`.`tipo` = 1 
 AND obras.municipio=".$row['id_municipio']." and  obras.status_obra='4'
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
 AND `poa02_origen`.`tipo` = 1 
 AND obras.municipio=".$row['id_municipio']." and  obras.status_obra='4'
	GROUP BY `obras`.`municipio` ORDER BY `obras`.`municipio` ASC";


$query2="SELECT `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`tipo`, SUM( `poa02_origen`.`monto` ) as total
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 AND `poa02_origen`.`tipo` = 2 
 AND obras.municipio=".$row['id_municipio']." and  obras.status_obra='4'
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
 AND `poa02_origen`.`tipo` = 2 
 AND obras.municipio=".$row['id_municipio']." and  obras.status_obra='4'
	GROUP BY `obras`.`municipio` ORDER BY `obras`.`municipio` ASC";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_assoc($res1);
$rowres2=mysql_fetch_assoc($res2);
 
 
 
	$pdf->Row(array($row['id_municipio'],utf8_decode($row['nombre']),"$ ".number_format($row['total'],2),"$ ".number_format((($resobras1['total']+$rowres1['total'])-$rowres2['total']),2)));


	
		$totaedo=$totaedo+$row['total'];
	$totaedo1+=(($resobras1['total']+$rowres1['total'])-$rowres2['total']);
	
	}
	$X=105;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',8);
	$pdf->Row(array("","Total General","$ ".number_format($totaedo,2),"$ ".number_format($totaedo1,2)));
	
}
	

	if ($tipo!="map" and $tipo!="" and $tipo!="59" or  $tipor!=""  ) { //or
	if ($tipo!="map" and $tipo!="" and $tipo!="59"  ) {
	$pdf->Image('../imagenes/mapas/'.$tipo.'.jpg',30,125,70,80);
}


///segunda parte aprobado********************************

	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

	$pdf->AddPage();
	

if ($tipo!="map" and $tipo!="" and $tipo!="59"   ) {
$consulta_obras = mysql_query("SELECT `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	 FROM `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	  WHERE `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  and obras.municipio=".$tipo." 
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR  `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  and obras.municipio=".$tipo." 
	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
	 GROUP BY `obras`.`id_dependencia` ORDER BY `dependencias`.`id_dependencia` ASC" );// or die (mysql_error());
}
if (  $tipor!=""  ) { 
$consulta_obras = mysql_query("SELECT `regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
GROUP BY `obras`.`id_dependencia`");


}  
 

$result1a=mysql_query($consulta_obras);
$nn=mysql_num_rows($consulta_obras);

if ($tipor!=""){

	
	$pdf->Image('tmp/mar'.$tipor.'_ap.png',2,40,109,90);
	}
else{
$pdf->Image('tmp/ma_ap.png',2,40,109,90); //aqui -10,40,122,90

}

$X=103;
$Y=40;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(25,12,22,22,22,22,22,22,22));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
$pdf->SetFont('Arial','',7);
$ya=0;
while($row = mysql_fetch_array($consulta_obras))

	{
	
	$pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetFont('Arial','',9);
	$pdf->SetXY(3,24);
	$mun1=mysql_query("select * from municipios where id_municipio=".$tipo);	
	$row1=mysql_fetch_array($mun1);

if ($tipo!="map" and $tipo!="" and $tipo!="59"   ) {
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada por el Municipio de ".utf8_decode($row1['nombre'])."",0,C,0); 	
}
	
if (  $tipor!=""  ) { 
$mun1=mysql_query("select * from regiones where id_region=".$tipor);	
	$row1=mysql_fetch_array($mun1);
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada 	por Region ".$row1['id_region']." ".utf8_decode($row1['nombre']),0,C,0); 	
}

$pdf->SetFont('Arial','',7);	
$pdf->SetXY($xx,$yy);


$ya=1;
}
	$X=103;
	$pdf->SetX($X);
	
	if ($tipo!="map" and $tipo!="" and $tipo!="59"   ) {
	$sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia` 
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$row['id_dependencia']." and obras.municipio=".$tipo."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$row['id_dependencia']." and obras.municipio=".$tipo."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");
	$res_cuenta= mysql_num_rows($sac_cuenta);		
	
	


$sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$row['acronimo']."' AND `obras`.`municipio` = '".$tipo."' 
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$row['acronimo']."' AND `obras`.`municipio` = '".$tipo."' 
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY poa02_origen.s08c_origen ");

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
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$tipo."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$tipo."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY poa02_origen.s08c_origen 
");
	
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
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$tipo."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND `obras`.`municipio` = '".$tipo."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY poa02_origen.s08c_origen 
");

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
	
	
	
	

	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;   	
	$tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	$cp=$cp+$res_cuenta;
	$pdf->Row(array($row['acronimo'],number_format($res_cuenta),"$ ".number_format($federal,2),"$ ".number_format($estatal,2),"$ ".number_format($municipal,2),"$ ".number_format($particip,2),"$ ".number_format($credito,2),"$ ".number_format($otros,2),"$ ".number_format($totals,2)));

}

if (  $tipor!=""  ) { 
	
	
$sac_aportes_eje = mysql_query("SELECT poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 0 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `dependencias`.`acronimo` = '".$row['acronimo']."' 
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
AND `poa02_origen`.`tipo` = 0 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999   AND `dependencias`.`acronimo` = '".$row['acronimo']."' 
 GROUP BY poa02_origen.s08c_origen");

	
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
 	$sac_aportes_amp = mysql_query("SELECT poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`tipo` = 1 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `dependencias`.`acronimo` = '".$row['acronimo']."' 
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`tipo` = 1 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999   AND `dependencias`.`acronimo` = '".$row['acronimo']."' 
 GROUP BY poa02_origen.s08c_origen");

	 
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
 	$sac_aportes_can = mysql_query("SELECT poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`tipo` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `dependencias`.`acronimo` = '".$row['acronimo']."' 
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$tipor." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
  AND `poa02_origen`.`tipo` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999   AND `dependencias`.`acronimo` = '".$row['acronimo']."' 
 GROUP BY poa02_origen.s08c_origen ");

	
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
	//***
	 $sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia` 
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$row['id_dependencia']." and municipios.id_region=".$tipor."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$row['id_dependencia']." and municipios.id_region=".$tipor."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");


	$res_cuenta= mysql_num_rows($sac_cuenta);		
	
	
	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;   	
	$tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	$cp=$cp+$res_cuenta;
	$pdf->Row(array($row['acronimo']."",number_format($res_cuenta),"$ ".number_format($federal,2),"$ ".number_format($estatal,2),"$ ".number_format($municipal,2),"$ ".number_format($particip,2),"$ ".number_format($credito,2),"$ ".number_format($otros,2),"$ ".number_format($totals,2)));


}



if ($tipo!="map" and $tipo!="" and $tipo!="59" ){


 $quer="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total` 
	    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen` 
	    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$tipo." AND `obras`.`status_obra` = '4' 
	    and dependencias.acronimo='".$row['acronimo']."'
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$tipo." AND `obras`.`status_obra` = '4' 
	    and dependencias.acronimo='".$row['acronimo']."'
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
	    GROUP BY  `dependencias`.`id_dependencia`, `localidades`.`id_marginacion`";






$nnam="Total Por Municipio:";
}
if($tipor!=""){
	$quer="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total`, `regiones`.`nombre`, `regiones`.`id_region` 
    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen`, `regiones` AS `regiones`
    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$tipor."  and dependencias.acronimo='".$row['acronimo']."' AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
    AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999    
     OR `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$tipor."  and dependencias.acronimo='".$row['acronimo']."' AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
    AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	

$nnam="Total Por Region:";
	}

$consulta_obrasm = mysql_query($quer);

$pdf->SetWidths(array(50));
$pdf->SetAligns(array(C));
$X=103;
$pdf->SetX($X);
$pdf->SetFont('Arial','B',6);
$pdf->Row(array("Grado de Marginación"));


$pdf->SetFont('Arial','',7);
if ($tipo!="map" and $tipo!="" and $tipo!="59"   ) {
while($rowm = mysql_fetch_array($consulta_obrasm))

	{

$pdf->SetWidths(array(25,25));
$pdf->SetAligns(array(C,C));
$X=103;
$pdf->SetX($X);
if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}


 $querr1="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total`, `regiones`.`nombre`, `regiones`.`id_region` 
    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen`, `regiones` AS `regiones`
    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$tipor." and dependencias.acronimo='".$rowm['acronimo']."' AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1
    AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999    
     OR `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$tipor." and dependencias.acronimo='".$rowm['acronimo']."'  AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 1 
     AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
 $querr2="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total`, `regiones`.`nombre`, `regiones`.`id_region` 
    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen`, `regiones` AS `regiones`
    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$tipor." and dependencias.acronimo='".$rowm['acronimo']."' AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2
      AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999    
     OR `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$tipor." and dependencias.acronimo='".$rowm['acronimo']."'  AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 2 
    AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
	    
	$consulta_obrasmm1 = mysql_query($querr1);		    
	$consulta_obrasmm2 = mysql_query($querr2);	
	
$rowres1=mysql_fetch_array($consulta_obrasmm1);
$rowres2=mysql_fetch_array($consulta_obrasmm2);



$pdf->Row(array($nam1,"$ ".number_format((($rowm['total']+$rowres1['total'])-$rowres2['total']),2)));
	}}
	
	if ($tipor!=""   ) {
while($rowm = mysql_fetch_array($consulta_obrasm))

	{

$pdf->SetWidths(array(25,25));
$pdf->SetAligns(array(C,C));
$X=103;
$pdf->SetX($X);
if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}


 $querr1="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total` 
	    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen` 
	    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$tipor." and dependencias.acronimo='".$rowm['acronimo']."' AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		 AND `poa02_origen`.`tipo` = 1
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$tipor." and dependencias.acronimo='".$rowm['acronimo']."' AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		 AND `poa02_origen`.`tipo` = 1
	    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
 $querr2="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total` 
	    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen` 
	    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$tipor." and dependencias.acronimo='".$rowm['acronimo']."' AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	     AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		 AND `poa02_origen`.`tipo` = 2
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$tipor." and dependencias.acronimo='".$rowm['acronimo']."'
	     AND `obras`.`status_obra` = '4' 
	     AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	     AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		 AND `poa02_origen`.`tipo` = 2
	    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
	    
	$consulta_obrasmm1 = mysql_query($querr1);		    
	$consulta_obrasmm2 = mysql_query($querr2);	
	
$rowres1=mysql_fetch_array($consulta_obrasmm1);
$rowres2=mysql_fetch_array($consulta_obrasmm2);



$pdf->Row(array($nam1,"$ ".number_format((($rowm['total']+$rowres1['total'])-$rowres2['total']),2)));
	}}
$pdf->SetWidths(array(25,12,22,22,22,22,22,22,22));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
	
		$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	
	if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}
	}
	$X=103;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',6);
	$pdf->Row(array($nnam,$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);


if ($tipo!="map" and $tipo!="" and $tipo!="59"   ) {
$pdf->Image('../imagenes/mapas/'.$tipo.'.jpg',30,125,70,80);
}

}//else7

if ($tipo=="59"){
		
	$pdf->SetY(35);
	$pdf->AddPage();
	
	$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);	
$pdf->MultiCell(292,5,"Resumen de Inversión Programada por Regiones",0,C,0);
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	
	$pdf->Image('tmp/ma1.png',20,$gy,109,90);
	$pdf->Image('tmp/ma2.png',153,$gy,109,90);
	
	$pdf->Image('tmp/ma3.png',20,$gy+80,109,90);
	$pdf->Image('tmp/ma4.png',153,$gy+80,109,90);

	$pdf->AddPage();
	$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);	
$pdf->MultiCell(292,5,"Resumen de Inversión Programada por Regiones",0,C,0);
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	
	$pdf->Image('tmp/ma5.png',20,$gy+5,109,90);
	$pdf->Image('tmp/ma6.png',153,$gy+5,109,90);
	
	$pdf->Image('tmp/ma7.png',20,$gy+80,109,90);
	$pdf->Image('tmp/ma8.png',153,$gy+80,109,90);
	
	$pdf->AddPage();
	$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);	
$pdf->MultiCell(292,5,"Resumen de Inversión Programada por Regiones",0,C,0);
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	
	$pdf->Image('tmp/ma9.png',20,$gy+5,109,90);
	$pdf->Image('tmp/ma10.png',153,$gy+5,109,90);
	
	$pdf->Image('tmp/ma11.png',20,$gy+80,109,90);
	$pdf->Image('tmp/ma12.png',153,$gy+80,109,90);
	
///nueva parte
	$pdf->AddPage();
	$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);	
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada por Regiones",0,C,0);
		$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
		$consulta_obras = mysql_query("SELECT (regiones.nombre) as nomreg, `regiones`.`id_region`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
	   GROUP BY `regiones`.`id_region`" );
 
 $result1a=mysql_query($consulta_obras);
$nn=mysql_num_rows($consulta_obras);
 //aqui -10,40,122,90
$X=103;
$Y=35;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(10,40,30));
$pdf->SetAligns(array(C,C,C));
$pdf->SetFont('Arial','B',8);
$g=1;

$pdf->Row(array("No.","Region","Total"));
$pdf->SetFont('Arial','',8);
$pdf->SetAligns(array(C,C,R));
$graficas = array();
$contador1=0;

while($row = mysql_fetch_array($consulta_obras))

	{



 $sac_aportes_eje = mysql_query("SELECT (regiones.nombre) as nomreg, poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and  `regiones`.`id_region`=".$row['id_region']." and `poa02_origen`.`tipo` = 0 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  and  `regiones`.`id_region`=".$row['id_region']." and `poa02_origen`.`tipo` = 0 GROUP BY s08c_origen");
	   

	
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
 	$sac_aportes_amp = mysql_query("SELECT (regiones.nombre) as nomreg, poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and  `regiones`.`id_region`=".$row['id_region']." and `poa02_origen`.`tipo` = 1 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	 	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  and  `regiones`.`id_region`=".$row['id_region']." and `poa02_origen`.`tipo` = 1 GROUP BY s08c_origen");

	
	
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
 	$sac_aportes_can = mysql_query("SELECT (regiones.nombre) as nomreg, poa02_origen.s08c_origen, `regiones`.`id_region`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`,`dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and  `regiones`.`id_region`=".$row['id_region']." and `poa02_origen`.`tipo` = 2 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  and  `regiones`.`id_region`=".$row['id_region']." and `poa02_origen`.`tipo` = 2 GROUP BY s08c_origen");
	
	
	
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
	

	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;        	
    		
	
	
	$X=103;
	$pdf->SetX($X);
	///aqui mero
	$contador=$contador+1;
		$graficas[$contador] = $row['id_region'];
		
	
	
	$pdf->Row(array($row['id_region'],utf8_decode($row['nomreg']),"$ ".number_format($totals,2)));

$pdf->SetWidths(array(10,40,30));
$pdf->SetAligns(array(C,C,R));
	
		$tt=$tt+$totals;
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	$g=$g+1;

	}
	$X=103;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',8);
	$pdf->Row(array("","Total Por Region:","$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);
	
	
	$pdf->SetY(35);
	
	$pdf->AddPage();
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);
		

		
		//verificar cuales estan para graficar***
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada por Regiones",0,C,0);
if (in_array("1", $graficas)) {
  	$pdf->Image('tmp/ma1_ap.png',20,$gy,109,90);
  	foreach (array_keys($graficas, "1") as $key) {
			unset($graficas[$key]);
			}
  }
  if (in_array("2", $graficas)) {
	$pdf->Image('tmp/ma2_ap.png',153,$gy,109,90);
	foreach (array_keys($graficas, "2") as $key) {
			unset($graficas[$key]);
			}
}
	if (in_array("3", $graficas)) {
	$pdf->Image('tmp/ma3_ap.png',20,$gy+80,109,90);
		foreach (array_keys($graficas, "3") as $key) {
			unset($graficas[$key]);
			}
}
	if (in_array("4", $graficas)) {
	$pdf->Image('tmp/ma4_ap.png',153,$gy+80,109,90);
		foreach (array_keys($graficas, "4") as $key) {
			unset($graficas[$key]);
			}
}


	$pdf->AddPage();
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);	
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada por Regiones",0,C,0);

	if (in_array("5", $graficas)) {
	$pdf->Image('tmp/ma5_ap.png',20,$gy+5,109,90);
	
	foreach (array_keys($graficas, "5") as $key) {
			unset($graficas[$key]);
			}
}
	if (in_array("6", $graficas)) {
	$pdf->Image('tmp/ma6_ap.png',153,$gy+5,109,90);
		foreach (array_keys($graficas, "6") as $key) {
			unset($graficas[$key]);
			}
}
	if (in_array("7", $graficas)) {
	$pdf->Image('tmp/ma7_ap.png',20,$gy+80,109,90);
		foreach (array_keys($graficas, "7") as $key) {
			unset($graficas[$key]);
			}
}
	if (in_array("8", $graficas)) {
	$pdf->Image('tmp/ma8_ap.png',153,$gy+80,109,90);
		foreach (array_keys($graficas, "8") as $key) {
			unset($graficas[$key]);
			}
	}
	$pdf->AddPage();
	$gx=$pdf->GetX();
	$gy=$pdf->GetY();
	$pdf->SetFont('Arial','',9);
		$pdf->SetXY(3,24);	
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada por Regiones",0,C,0);
if (in_array("9", $graficas)) {
	$pdf->Image('tmp/ma9_ap.png',20,$gy+5,109,90);
		foreach (array_keys($graficas, "9") as $key) {
			unset($graficas[$key]);
			}
}
	if (in_array("10", $graficas)) {
	$pdf->Image('tmp/ma10_ap.png',153,$gy+5,109,90);
		foreach (array_keys($graficas, "10") as $key) {
			unset($graficas[$key]);
			}
}
if (in_array("11", $graficas)) {	
	$pdf->Image('tmp/ma11_ap.png',20,$gy+80,109,90);
		foreach (array_keys($graficas, "11") as $key) {
			unset($graficas[$key]);
			}
}
	if (in_array("12", $graficas)) {
	$pdf->Image('tmp/ma12_ap.png',153,$gy+80,109,90);
		foreach (array_keys($graficas, "12") as $key) {
			unset($graficas[$key]);
			}
	}
}
	

	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 100;
$pdf->SetXY($newx, $newy);

	
	$pdf->Output('Municipios.pdf','I');

 mysql_close($siplan_data_conn);
?>

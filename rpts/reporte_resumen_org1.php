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



if ($tipo!="org" and $tipo!=""){
/*	
	$mun1=mysql_query("select * from origen where origen.s08c_origen='".$tipo."'");	
	$row1=mysql_fetch_array($mun1);
$this->MultiCell(292,5,"Resumen de Inversión por Origen ".$row1['s08c_origen']." ".$row1['c08c_tipori']."",0,C,0); */
}elseif($tipo=="org" ){
$this->MultiCell(292,5,"Resumen de Inversión por Origenes 2017",0,C,0); 

}
//$this->SetXY(3,28);
//$this->MultiCell(292,5,"POA de Inversión por Dependencia",0,C,0); 




$this->SetFont('Arial','B',5.5);

if ($tipo!="org" and $tipo!=""){
$X=103;
$Y=35;
$this->SetXY($X,$Y);




}elseif($tipo=="org" ){
	$this->SetFont('Arial','B',9);
	$X=50;
$Y=30;
$this->SetXY($X,$Y);

$this->Cell(15,5,'No.',1,0,'C');
$this->Cell(100,5,'Origen',1,0,'C');
$this->Cell(40,5,'Total Programado',1,0,'C');
$this->Cell(40,5,'Total Aprobado',1,0,'C');

	
	}




	$this->Ln(5);
	if ($tipo!="org" and $tipo!=""){
		$X=103;
	$this->SetX($X);
}elseif($tipo=="org" ){
   $X=50;
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

	

if ($tipo!="org" and $tipo!=""){
$consulta_obras = mysql_query("SELECT dependencias.acronimo, municipios.nombre,origen.s08c_origen, origen.c08c_tipori, municipios.id_municipio, 
Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros,
Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total,
Count(dependencias.acronimo) AS CuentaDeacronimo
FROM obras
INNER JOIN origen ON origen.s08c_origen = obras.origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN dependencias ON dependencias.id_dependencia = obras.id_dependencia
INNER JOIN regiones ON municipios.id_region = regiones.id_region

where obras.origen=".$tipo." and obras.status_obra>=3 GROUP BY dependencias.id_dependencia" ,$siplan_data_conn);// or die (mysql_error());
}
elseif($tipo=="org" ){
	
	$consulta_obras = mysql_query("SELECT `s08c_origen`,c08c_tipori FROM origen AS `poa02_origen` GROUP BY `s08c_origen`" ,$siplan_data_conn);
	
	/*$consulta_obras = mysql_query("SELECT municipios.nombre,origen.s08c_origen, origen.c08c_tipori, municipios.id_municipio, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total
FROM  origen INNER JOIN (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_municipio = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) ON origen.s08c_origen = obras.origen GROUP BY obras.origen order by obras.origen asc" ,$siplan_data_conn);
*/
}
	//aqui
//	 $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']." and status_obra=".$_GET['s'] ,$siplan_data_conn)or die (mysql_error());
	 



	   

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

if ($tipo!="org" and $tipo!=""){
$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

$X=30;
$Y=35;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(40,25,25,25,27,25,25,25,25));
$pdf->SetAligns(array(C,C,C,C,C,C,C,C,C));
$pdf->SetFont('Arial','B',7);

$pdf->Row(array('DEPENDENCIA','NO. OBRAS','APORTE FEDERAL','APORTE ESTATAL','APORTE MUNICIPAL','PARTICIPANTES','CREDITOS','OTROS','TOTAL'));
$X=30;
$Y=40;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(40,25,25,25,27,25,25,25,25));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
$pdf->SetFont('Arial','',7);
$ya=0;
while($row = mysql_fetch_array($consulta_obras))

	{
	$pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
	$pdf->SetFont('Arial','',10);
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Programada 2016",0,C,0); 
$pdf->SetXY($xx,$yy);
$ya=1;
$pdf->SetFont('Arial','',7);
}

	
	$X=30;
	$pdf->SetX($X);
	
	$pdf->Row(array($row['acronimo'],number_format($row['CuentaDeacronimo']),"$ ".number_format($row['SumaDefederal'],2),"$ ".number_format($row['SumaDeestatal'],2),"$ ".number_format($row['SumaDemunicipal'],2),"$ ".number_format($row['SumaDeparticipantes'],2),"$ ".number_format($row['SumaDecredito'],2),"$ ".number_format($row['SumaDeotros'],2),"$ ".number_format($row['total'],2)));



/*$pdf->SetWidths(array(25,25));
$pdf->SetAligns(array(C,C));
$X=103;
$pdf->SetX($X);
$pdf->SetFont('Arial','B',6);
$pdf->Row(array("Nivel","Total"));*/

//$pdf->SetWidths(array(40,25,25,25,25,25,25,25,25));
//$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
	
	$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	
		///final del while
if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}}
	$X=30;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',7);
	$pdf->Row(array("Total Por Municipio:",$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);
	//$pdf->Image('tmp/ma.png',3,100,99,80);

}elseif($tipo=="org" ){
	$X=120;
$Y=35;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(15,100,40,40));
$pdf->SetAligns(array(C,L,R,R));
$pdf->SetFont('Arial','',8);
$totaedo=0;
$totaedo1=0;




$num_org = array();
$nom_org = array();



$cc="SELECT `s08c_origen`,c08c_tipori FROM origen  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
			 
		 }
  	
$cc="SELECT `s08c_origen`,c08c_tipori FROM origen61  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen62  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen63  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen69  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen71  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen74  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen75  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
  	
  	
  	$cc="SELECT `s08c_origen`,c08c_tipori FROM origen76  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen77  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen78  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }

 for ($i = 0; $i <= count($num_org); $i++) {
		 $totalprg=0;
		  $totalapd=0;
		  $totalamp=0;
		  $totalcan=0;
		  
		 
  	 $query="SELECT `obras`.`origen`, `obras`.`status_obra`, SUM( `obras`.`federal` + `obras`.`estatal` + `obras`.`municipal` + `obras`.`participantes` + `obras`.`credito` + `obras`.`otros` ) AS `total`
  	  FROM obras
  	   WHERE `obras`.`origen` = ".$num_org[$i]." AND `obras`.`status_obra` >= '3' ORDER BY `obras`.`origen` ASC";
  	$consulta_obras9=mysql_query($query,$siplan_data_conn);
  	$totprg=mysql_fetch_assoc($consulta_obras9);
  	$totalprg=$totprg['total'];


		$query1="SELECT SUM( `monto` ) AS `total` 
		FROM `poa02_origen` AS `poa02_origen` 
		WHERE ( `s08c_origen` = ".$num_org[$i]." AND ( `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 0 AND `s07c_partid` BETWEEN 4000 AND 4999 OR `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 0 AND `s07c_partid` BETWEEN 6000 AND 6999 ) )";
		 $consulta_obras1=mysql_query($query1,$siplan_data_conn);
		 $totapd=mysql_fetch_assoc($consulta_obras1);
		 $totalapd=$totapd['total'];
		 
		 $query2="SELECT SUM( `monto` ) AS `total` 
		FROM `poa02_origen` AS `poa02_origen` 
		WHERE ( `s08c_origen` = ".$num_org[$i]." AND ( `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 1 AND `s07c_partid` BETWEEN 4000 AND 4999 OR `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 1 AND `s07c_partid` BETWEEN 6000 AND 6999 ) )";
		 $consulta_obras2=mysql_query($query2,$siplan_data_conn);
		 $totamp=mysql_fetch_assoc($consulta_obras2);
		 $totalamp=$totamp['total'];
		 
		 $query3="SELECT SUM( `monto` ) AS `total` 
		FROM `poa02_origen` AS `poa02_origen` 
		WHERE ( `s08c_origen` = ".$num_org[$i]." AND ( `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 2 AND `s07c_partid` BETWEEN 4000 AND 4999 OR `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 2 AND `s07c_partid` BETWEEN 6000 AND 6999 ) )";
		 $consulta_obras3=mysql_query($query3,$siplan_data_conn);
		 $totcan=mysql_fetch_assoc($consulta_obras3);
		 $totalcan=$totcan['total'];

		$total_apro=(($totalapd+$totalamp)-$totalcan);


$X=50;
	$pdf->SetX($X);


	if ($totalprg!=0 or $total_apro!=0){
	$pdf->Row(array($num_org[$i],$nom_org[$i],"$ ".number_format($totalprg,2),"$ ".number_format($total_apro,2)));

 $totaedo1+=($total_apro);
	
		$totaedo=$totaedo+$totalprg;
	}
	
	
	
}
	$X=50;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',8);
	$pdf->Row(array("","Total General","$ ".number_format($totaedo,2),"$ ".number_format($totaedo1,2)));
	

}
	
	
	//$pdf->SetXY(23,135);
//$pdf->MultiCell(82,5,"TOTAL POA OBRAS: ".number_format($cp),0,L,0);
//$pdf->SetXY(105,135);

//$pdf->MultiCell(82,5,"Total de Inversión: $ ".number_format($tt,2),0,L,0);
//	$pdf->SetFont('Arial','B',9);
	
	//else
//	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 100;
$pdf->SetXY($newx, $newy);

if ($tipo!="org" and $tipo!=""){
	$pdf->AddPage();
	//$mun1=mysql_query("select * from origen where origen.s08c_origen='".$tipo."'");	
	//$row1=mysql_fetch_array($mun1);
$pdf->SetFont('Arial','',10);	
	$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,24);
$pdf->MultiCell(292,5,"Resumen de Inversión Programada 2016 ",0,C,0); 
	$pdf->SetXY($xx,$yy);
	$tipo=$_GET['g'];
	$pdf->Image('tmp/org'.$tipo.'.png',10,55,290,130);


$pdf->AddPage(); // deshabilit
}
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
	
	if ($tipo!="org" and $tipo!="")
	
	{
		
		
		// AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999   AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
$consulta_obras = mysql_query("SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`origen`,`dependencias`.`id_dependencia`,dependencias.acronimo, poa02_origen.s08c_origen
 FROM `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
 WHERE `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999  and poa02_origen.s08c_origen=".$tipo." 
	OR `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	and poa02_origen.s08c_origen=".$tipo."  
 GROUP BY dependencias.id_dependencia");


/*SELECT dependencias.acronimo, municipios.nombre,origen.s08c_origen, origen.c08c_tipori, municipios.id_municipio, 
Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros,
Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total,
Count(dependencias.acronimo) AS CuentaDeacronimo
FROM  origen INNER JOIN (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_municipio = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) ON origen.s08c_origen = obras.origen where obras.status_obra='4' and obras.origen=".$tipo." GROUP BY dependencias.id_dependencia" ,$siplan_data_conn);// or die (mysql_error());

*/



}

if ($tipo!="org" and $tipo!=""){
$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

$X=30;
$Y=35;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(40,25,25,25,27,25,25,25,25));
$pdf->SetAligns(array(C,C,C,C,C,C,C,C,C));
$pdf->SetFont('Arial','B',7);

$pdf->Row(array('DEPENDENCIA','NO. OBRAS','APORTE FEDERAL','APORTE ESTATAL','APORTE MUNICIPAL','PARTICIPANTES','CREDITOS','OTROS','TOTAL'));
$X=30;
$Y=40;
$ya=0;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(40,25,25,25,27,25,25,25,25));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
$pdf->SetFont('Arial','',7);
while($row = mysql_fetch_array($consulta_obras))

	{ $pp=$pdf->PageNo();
if ($pp==$pdf->PageNo() and $ya==0){
	$pdf->SetFont('Arial','',10);	
$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada 2016",0,C,0); 
$pdf->SetXY($xx,$yy);
$ya=1;
$pdf->SetFont('Arial','',7);
}

//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 1999  AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 1999 
	
		$sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$row['acronimo']."' AND poa02_origen.s08c_origen = ".$tipo."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$row['acronimo']."' AND poa02_origen.s08c_origen = ".$tipo."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen") or die (mysql_error());
//	$res_aporte_est= mysql_fetch_assoc($sac_aportes_est);s	
	
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
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND poa02_origen.s08c_origen = ".$tipo." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND poa02_origen.s08c_origen = ".$tipo." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen
") or die (mysql_error());
//	$res_aporte_est_amp= mysql_fetch_assoc($sac_aportes_est_amp);
	
	
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
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND poa02_origen.s08c_origen = ".$tipo." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$row['acronimo']."'  AND poa02_origen.s08c_origen = ".$tipo." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen
") or die (mysql_error());
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
	

	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;    
	
	//	AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999  AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
		 $sac_cuenta = mysql_query("SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`origen`, `poa02_origen`.`id_obra`, `obras`.`id_dependencia` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
   AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `obras`.`id_dependencia` = '".$row['id_dependencia']."' AND poa02_origen.s08c_origen = ".$tipo."
   OR `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
   AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `obras`.`id_dependencia` = '".$row['id_dependencia']."' AND poa02_origen.s08c_origen = ".$tipo."
	GROUP BY `poa02_origen`.`id_obra`");
	$res_cuenta= mysql_num_rows($sac_cuenta);	
	
	
	$X=30;
	$pdf->SetX($X);
	
	$pdf->Row(array($row['acronimo'],number_format($res_cuenta),"$ ".number_format($federal,2),"$ ".number_format($estatal,2),"$ ".number_format($municipal,2),"$ ".number_format($particip,2),"$ ".number_format($credito,2),"$ ".number_format($otros,2),"$ ".number_format($totals,2)));



/*$pdf->SetWidths(array(25,25));
$pdf->SetAligns(array(C,C));
$X=103;
$pdf->SetX($X);
$pdf->SetFont('Arial','B',6);
$pdf->Row(array("Nivel","Total"));*/

//$pdf->SetWidths(array(40,25,25,25,25,25,25,25,25));
//$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));
	
	$tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	$cp=$cp+$res_cuenta;
	
	if ($pp!=$pdf->PageNo() ){
$ya=0;	
	}
	}
	$X=30;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',7);
	$pdf->Row(array("Total Por Municipio:",$cp,"$ ".number_format($fd,2),"$ ".number_format($st,2),"$ ".number_format($mn,2),"$ ".number_format($pt,2),"$ ".number_format($cr,2),"$ ".number_format($ot,2),"$ ".number_format($tt,2)));
	$X=$pdf->GetX();
	$Y=$pdf->GetY();
	
	$pdf->Ln(5);
	//$pdf->Image('tmp/ma.png',3,100,99,80);

}


if ($tipo!="org" and $tipo!=""){
	$pdf->AddPage();
	
	

//	$mun1=mysql_query("select * from origen where origen.s08c_origen='".$tipo."'");	
//	$row1=mysql_fetch_array($mun1);
$pdf->SetFont('Arial','',10);	
	$xx=$pdf->GetX();
$yy=$pdf->GetY();
$pdf->SetXY(3,24);
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada 2016 ",0,C,0); 
	$pdf->SetXY($xx,$yy);
	$tipo=$_GET['g'];
	$pdf->Image('tmp/org'.$tipo.'_ap.png',10,55,290,130);
}

//	$this->AddPage();
	
//$pdf->RoundedRect(60, 200, 68, 46, 5, '13', 'DF');
	//$pdf->MultiCell(100,5,"Multicell",0,C,0);

//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Origenes.pdf','I');

?>

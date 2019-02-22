<?php session_start(); 
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
//
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



if($tipo=="prg" ){
$this->MultiCell(292,5,"Resumen de Inversión por Programa 2017",0,C,0); 

}





$this->SetFont('Arial','B',5.5);

if ($tipo!="prg" and $tipo!=""){
$X=103;
$Y=35;
$this->SetXY($X,$Y);




}elseif($tipo=="prg" ){
	$this->SetFont('Arial','B',9);
	$X=50;
$Y=30;
$this->SetXY($X,$Y);

$this->Cell(15,5,'Clave',1,0,'C');
$this->Cell(100,5,'Programa',1,0,'C');
$this->Cell(40,5,'Total Programado',1,0,'C');
$this->Cell(40,5,'Total Aprobado',1,0,'C');

	
	}




	$this->Ln(5);
	if($tipo=="prg" ){
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

	

if($tipo=="prg" ){
	$consulta_obras = mysql_query("SELECT `id_programa_poa`, `clave`, `descripcion` FROM `programas_poa` AS `programas_poa` ORDER BY `clave` ASC" ,$siplan_data_conn);
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

if($tipo=="prg" ){
	$X=120;
$Y=35;
$pdf->SetXY($X,$Y);
$pdf->SetWidths(array(15,100,40,40));
$pdf->SetAligns(array(C,L,R,R));
$pdf->SetFont('Arial','',8);
$totaedo=0;
$totaedo1=0;
while($row = mysql_fetch_array($consulta_obras))

	{
	
	$X=50;
	$pdf->SetX($X);
	
	
	
		$totalprg=0;
		  $totalapd=0;
		  $totalamp=0;
		  $totalcan=0;
		  
   
     	 $query="SELECT SUM( `obras`.`federal` + `obras`.`estatal` + `obras`.`municipal` + `obras`.`participantes` + `obras`.`credito` + `obras`.`otros` ) AS `total`, `obras`.`programa_poa` 
     	 FROM `obras` AS `obras`
     	 WHERE `obras`.`programa_poa` = ".$row['id_programa_poa']." AND `obras`.`status_obra` >= 3 
     	 ORDER BY `obras`.`programa_poa` ASC";
    $consulta_obras9=mysql_query($query,$siplan_data_conn);
  	$totprg=mysql_fetch_assoc($consulta_obras9);
  	$totalprg=$totprg['total'];

 $query1="SELECT `obras`.`programa_poa`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `obras`.`programa_poa` = ".$row['id_programa_poa']."   AND `poa02_origen`.`tipo` = 0 AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4' 
AND ( `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 OR `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 )
 ORDER BY `obras`.`programa_poa` ASC";
		 $consulta_obras1=mysql_query($query1,$siplan_data_conn);
		 $totapd=mysql_fetch_assoc($consulta_obras1);
		 $totalapd=$totapd['total'];
		 
		 $query2="SELECT `obras`.`programa_poa`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `obras`.`programa_poa` = ".$row['id_programa_poa']."   AND `poa02_origen`.`tipo` = 1 AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4' 
AND ( `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 OR `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 )
 ORDER BY `obras`.`programa_poa` ASC";
		 $consulta_obras2=mysql_query($query2,$siplan_data_conn);
		 $totamp=mysql_fetch_assoc($consulta_obras2);
		 $totalamp=$totamp['total'];
		 
		 $query3="SELECT `obras`.`programa_poa`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `obras`.`programa_poa` = ".$row['id_programa_poa']."   AND `poa02_origen`.`tipo` = 2 AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4' 
AND ( `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 OR `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 )
 ORDER BY `obras`.`programa_poa` ASC";
		 $consulta_obras3=mysql_query($query3,$siplan_data_conn);
		 $totcan=mysql_fetch_assoc($consulta_obras3);
		 $totalcan=$totcan['total'];

		$total_apro=(($totalapd+$totalamp)-$totalcan);

   
 
	if ($totalprg!=0 or $total_apro!=0 ){
	$pdf->Row(array($row['clave'],utf8_decode($row['descripcion']),"$ ".number_format($totalprg,2),"$ ".number_format($total_apro,2)));

 $totaedo1+=$total_apro;
	
		$totaedo=$totaedo+$totalprg;
	}
	
	}
	$X=50;
	$pdf->SetX($X);
	$pdf->SetFont('Arial','B',8);
	$pdf->Row(array("","Total General","$ ".number_format($totaedo,2),"$ ".number_format($totaedo1,2)));
	
}
	
	
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 100;
$pdf->SetXY($newx, $newy);





	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
	
	

	
	$pdf->Output('Programas_poa.pdf','I');

?>

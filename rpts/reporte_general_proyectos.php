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
$this->MultiCell(350,5,"COORDINACIÓN ESTATAL DE PLANEACIÓN",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(350,5,"Dirección de Planeación",0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(350,5,"Programas Presupuestarios 2018",0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(3,25);
$this->MultiCell(350,5,"Listado de Programas Presupuestarios",0,C,0); 





$this->SetFont('Arial','B',9);






$X=3;
$Y=35;
$this->SetXY($X,$Y);
$this->Cell(30,5,'Sector',1,0,'C');
$this->Cell(15,5,'Dep',1,0,'C');
$this->Cell(8,5,'Eje',1,0,'C');
$this->Cell(9,5,'Linea',1,0,'C');
$this->Cell(16,5,'Estrategia',1,0,'C');
//$this->Cell(25,5,'Clasificación',1,0,'C');
$this->Cell(10,5,'No',1,0,'C');
$this->Cell(158,5,'Programa',1,0,'C');
$this->Cell(20,5,'Estatus',1,0,'C');
$this->Cell(25,5,'U. Medida',1,0,'C');
$this->Cell(17,5,'Met. Anual',1,0,'C');
$this->Cell(16,5,'Met. Sem',1,0,'C');
$this->Cell(13,5,'Ben. H',1,0,'C');
$this->Cell(12,5,'Ben. M',1,0,'C');
//$this->Cell(22,5,'Inversión',1,0,'C');



$X=30;
$Y=35;


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
$pdf->SetFont('Arial','',6);

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





$pdf->SetWidths(array(30,15,8,9,16,10,158,20,25,17,16,13,12));
$pdf->SetAligns(array(L,C,C,C,C,C,L,C,L,C,C,C,C));

$id_dependencia = $_SESSION['id_dependencia_v3'];



	
	
	$consulta_obras = mysql_query("SELECT sectores.sector, (eje.eje) nom_eje, (linea.nombre) as nom_lin, (estrategias.nombre) as nom_est, dependencias.acronimo, clasificacion.clasificacion, proyectos.no_proyecto, (proyectos.nombre) as nom_proy, proyectos.unidad_medida, proyectos.anual_pr, proyectos.prog_sem, proyectos.beneficiarios_h, proyectos.beneficiarios_m, proyectos.inversion, proyectos.id_dependencia,proyectos.estatus, proyectos.cantidad
FROM clasificacion INNER JOIN (sectores INNER JOIN (((eje INNER JOIN (dependencias INNER JOIN proyectos ON dependencias.id_dependencia = proyectos.id_dependencia) ON eje.id_eje = proyectos.id_eje) INNER JOIN linea ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = linea.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea)) ON sectores.id_sector = dependencias.id_sector) ORDER BY  dependencias.id_dependencia, proyectos.no_proyecto ASC",$siplan_data_conn) or die (mysql_error());
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
	$statusA=0;
	$statusD=0;
	$statusU=0;
	$statusE=0;
	

$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_array($consulta_obras))

	{
		
		 switch ($row['estatus']){
		   case "0":
		   $statusA = $statusA+1; //"Sin Aprobar";
		    $status = "Sin Aprobar";
		  
		   break;
		   case "1":
		   $statusD = $statusD+1; // "Aprob. Dependencia";
		    $status =  "Aprob. Dependencia";
		 
		   break;
		   case "2":
		   $statusU = $statusU+1; //"Aprob. UPLA";
		    $status = "Aprob. COEPLA";
		  
		   break;   
		    case "3":
		   $statusE = $statusE+1; //"Con Oficio de Ejec.";
		    $status = "Con Oficio de Ejec.";
		 
		   break; 
	   }
	$pdf->Row(array(utf8_decode($row['sector']),utf8_decode($row['acronimo']),substr(utf8_decode($row['nom_eje']),0,2),substr(utf8_decode($row['nom_lin']),0,4), substr(utf8_decode($row['nom_est']),0,6),$row['no_proyecto'],utf8_decode($row['nom_proy']), $status,utf8_decode($row['unidad_medida']),number_format($row['cantidad']),number_format($row['prog_sem']),number_format($row['beneficiarios_h']),number_format($row['beneficiarios_m'])));
	
	}
	$pdf->SetFont('Arial','B',6);
	//$pdf->Row(array("","","","","","","","","","","Total",number_format($tt,2),number_format($fd,2),number_format($st,2),number_format($mn,2),number_format($pt,2),number_format($cr,2),number_format($ot,2),"","","","","","","",""));
	
	$pdf->SetFont('Arial','B',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->SetWidths(array(36,20));
$pdf->SetAligns(array(C,C));
$pdf->Row(array("Estatus","No."));
$pdf->SetFont('Arial','I',10);
$pdf->SetX(11);
$pdf->SetWidths(array(36,20));
$pdf->SetAligns(array(L,R));
$pdf->Row(array("Sin Aprobar",number_format($statusA)));

$pdf->SetX(11);
$pdf->SetWidths(array(36,20));
$pdf->SetAligns(array(L,R));
$pdf->Row(array("Aprob. Dependencia",number_format($statusD)));


$pdf->SetX(11);
$pdf->SetWidths(array(36,20));
$pdf->SetAligns(array(L,R));
$pdf->Row(array("Aprob. COEPLA",number_format($statusU)));

$pdf->SetX(11);
$pdf->SetWidths(array(36,20));
$pdf->SetAligns(array(L,R));
$pdf->Row(array("Total de Programas",number_format($nn)));




// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Listado de Programas Presupuestarios 2018.pdf','I');

?>

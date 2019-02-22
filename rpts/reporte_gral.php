<?php session_start();
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
$this->Image('../imagenes/logoupla.jpg',5,5,70,15);

$this->SetXY(3,3);
$this->MultiCell(292,5,"COORDINACIÓN ESTATAL DE PLANEACION",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(292,5,"Dirección de Programación",0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(292,5,html_entity_decode("Avance de Ejercicio Físico - Financiero 2018"),0,C,0); 
$this->SetFont('Arial','B',10);
$this->SetXY(3,23);
$this->MultiCell(30,5,"Dependencia",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(33,23);
$resultado_dep = mysql_query("SELECT * FROM dependencias WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']) or die (mysql_error());
$res_dep = mysql_fetch_array($resultado_dep);
$this->MultiCell(115,5,utf8_decode($res_dep['nombre']),0,L,0); 
$this->SetFont('Arial','B',10);
$this->SetXY(148,23);
$resultado_sec = mysql_query("SELECT * FROM sectores WHERE id_sector = ".$res_dep['id_sector']) or die (mysql_error());
$res_sec = mysql_fetch_array($resultado_sec);
$this->MultiCell(15,5,"Sector ",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(163,23);
$this->MultiCell(15,5,$res_sec['id_sector'],0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(178,23);
$this->MultiCell(118,5,utf8_decode($res_sec['sector']),0,L,0); 



$this->SetFont('Arial','B',10);
$X=3;
$Y=30;


$this->SetXY($X,$Y);
$this->Cell(16,5,'Clave',1,0,'C');
$this->Cell(17,5,'No. PP.',1,0,'C');
$this->Cell(169,5,'Descripción de la Obra.',1,0,'C');
$this->Cell(36,5,'Avance Financiero %',1,0,'C');
$this->Cell(29,5,'Avance Físico %',1,0,'C');
$this->Cell(23,5,'Estatus',1,0,'C');
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
$pdf=new PDF('L'); //pt mm cm PDF('L','mm','Legal');
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

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



$pdf->SetFont('Arial','',10);


$pdf->SetWidths(array(16,17,169,36,29,23));
$pdf->SetAligns(array(C,C,L,C,C,C));

$pos = strlen($query);
  $id_proyecto=$_GET['idproyecto'];


if($id_proyecto == 0) {
     
	  $consulta_obras = mysql_query("SELECT *,(obras.cantidad) as cant_pro FROM ((obras inner join detalle_oficio on obras.id_obra=detalle_oficio.id_poa02) inner join oficio_aprobacion on detalle_oficio.id_oficio=oficio_aprobacion.id_oficio) inner join proyectos on detalle_oficio.id_proyecto=proyectos.id_proyecto   WHERE status_obra = '4' and oficio_aprobacion.activo=1 and  oficio_aprobacion.tipo=0 and oficio_aprobacion.no_oficio!='' AND obras.id_dependencia =".$_SESSION['id_dependencia_v3']." GROUP BY detalle_oficio.id_detalle_of ORDER BY proyectos.no_proyecto, obras.obra ASC  ",$siplan_data_conn) or die (mysql_error());
	  
	 // $consulta_obras = mysql_query("SELECT * FROM (obras inner join detalle_oficio on obras.id_obra=detalle_oficio.id_poa02)inner join oficio_aprobacion on detalle_oficio.id_oficio=oficio_aprobacion.id_oficio  WHERE status_obra = '3' and oficio_aprobacion.tipo=0 and oficio_aprobacion.no_oficio!='' AND id_dependencia =".$_SESSION['id_dependencia']." GROUP BY detalle_oficio.id_detalle_of ",$siplan_data_conn) or die (mysql_error());
	  
	  
	 }else{
	  $consulta_obras = mysql_query("SELECT *,(obras.cantidad) as cant_pro FROM ((obras inner join detalle_oficio on obras.id_obra=detalle_oficio.id_poa02) inner join oficio_aprobacion on detalle_oficio.id_oficio=oficio_aprobacion.id_oficio) inner join proyectos on detalle_oficio.id_proyecto=proyectos.id_proyecto   WHERE status_obra = '4' and oficio_aprobacion.tipo=0 and oficio_aprobacion.activo=1 and  oficio_aprobacion.no_oficio!='' AND obras.id_proyecto = '$id_proyecto'  GROUP BY detalle_oficio.id_detalle_of ORDER BY proyectos.no_proyecto, obras.obra  ASC",$siplan_data_conn) or die (mysql_error());
	
	 	   //   $consulta_obras = mysql_query("SELECT * FROM (obras inner join detalle_oficio on obras.id_obra=detalle_oficio.id_poa02)inner join oficio_aprobacion on detalle_oficio.id_oficio=oficio_aprobacion.id_oficio  WHERE status_obra = '4' and oficio_aprobacion.tipo=0 and oficio_aprobacion.no_oficio!='' AND obras.id_proyecto = '$id_proyecto'  GROUP BY detalle_oficio.id_detalle_of",$siplan_data_conn) or die (mysql_error());
	      }
	


//$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_array($consulta_obras))

	{ /*$resw="SELECT * from obras";
	$ress=mysql_query($resw,$siplan_data_conn);
	$roew = mysql_fetch_array($ress);
	 $depp=$roew['nombre'];*/
	 
	 $cons_no_proyecto = mysql_query("SELECT * FROM proyectos WHERE id_proyecto = ".$row['id_proyecto'],$siplan_data_conn)or die(mysql_error());
	$res_pry = mysql_fetch_array($cons_no_proyecto);
	//porcentajes
	///porcentajes
	/* $sumar_aportes = mysql_query("select  (federal + estatal + municipal + participantes + credito + otros ) as totalp  from aportes where id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
	$sum_aporte= mysql_fetch_array($sumar_aportes);
	*/

	
	//echo "select  (fed + est + mun + part + cred + otr ) as totale  from ejercido where activo=1 and id_obra = ".$resobras['id_obra'];
	$sumar_ejercido = mysql_query("select  (fed + est + mun + part + cred + otr ) as totale  from ejercido where activo=1 and id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
	$ejercido=0;
	while($sum_ejercido = mysql_fetch_array($sumar_ejercido)){
	   	   $ejercido = $ejercido + $sum_ejercido['totale'];
	   	}
	   
	
	   	 $sumar_ejercido = mysql_query("select  sum(monto) as totale  from poa02_origen where tipo=0 and id_oficio!=0 and status_of=2 and id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
 	  $ejercidoss = mysql_fetch_array($sumar_ejercido);
    
     $sumar_ejercido_mas = mysql_query("select  sum(monto) as totale  from poa02_origen where tipo=1 and id_oficio!=0 and status_of=2 and id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
     $ejercido_mas = mysql_fetch_array($sumar_ejercido_mas);

     $sumar_ejercido_menos = mysql_query("select  sum(monto) as totale  from poa02_origen where tipo=2 and id_oficio!=0 and status_of=2 and id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
	  $ejercido_menos = mysql_fetch_array($sumar_ejercido_menos);



 $sum_aporte1=(($ejercidoss['totale']+$ejercido_mas['totale'])-$ejercido_menos['totale']);	   
	   
	   
	   $sumar_alcanzadas = mysql_query("select   SUM(m_alcanzadas) as m  from ejercido where activo=1 and id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
	  $sumalcanzada=0;
	$sum_alcanzadas= mysql_fetch_array($sumar_alcanzadas);
	$sumalcanzada=$sum_alcanzadas['m'];
//	echo $ejercido.'/'.$sum_aporte['totalp'].'|';
	
	if ($sum_aporte1==""){
	$aporte=0;
		}else{
	$aporte=$sum_aporte1;
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($ejercido==0 and $aporte==0){
	$tt=0;
	}elseif ($ejercido>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$tt=(($ejercido/$aporte)*100);}
	//echo "|".$sum_alcanzadas['m']."/".$resobras['cantidad'];
	
	//cantidad
	if ($row['cant_pro']==""){
	$cantidad=0;
		}else{
	$cantidad=$row['cant_pro'];
		}
		if ($sumalcanzada==0 and $cantidad==0){
	$ttca=0;
	}elseif ($sumalcanzada>=0.01 and $cantidad==0){
	
	$ttca=0;
	}else{$ttca=(($sumalcanzada/$cantidad)*100);}
	 
	 //////////porcentajes
	//porcentajes
	
	$sac_ejercido = mysql_query("select  * from ejercido where activo=1 and id_obra = ".$row['id_obra']." order by id_ejercido desc",$siplan_data_conn) or die (mysql_error());

$st_ejercido = mysql_fetch_array($sac_ejercido);
	   
	   $st_edo="";	
if ($st_ejercido['status_ejercido']==1){
$st_edo="Sin Iniciar";	
	}	   	

if ($st_ejercido['status_ejercido']==2){
$st_edo="En Ejecución";	
	}	   	


if ($st_ejercido['status_ejercido']==3){
$st_edo="Concluida";	
	}	   	


if ($st_ejercido['status_ejercido']==4){
$st_edo="Cancelada";	
	}	   
	
	$pdf->Row(array($row['obra'],$res_pry['no_proyecto'],ucwords((strtolower(utf8_decode($row['descripcion'])))),number_format($tt,2).' %' ,number_format($ttca,2).' %',$st_edo));
	
	}
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Avances Físico-Finaciero.pdf','I');

?>

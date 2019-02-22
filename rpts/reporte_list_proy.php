<?php session_start();
include("../seguridad/siplan_connection_db_2016.php");
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
$this->MultiCell(292,5,"Lista de Oficios",0,C,0); 
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

$X=30;
$Y=30;


$this->SetXY($X,$Y);



	$this->Ln(0);
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

//Creación del objeto de la clase heredada
$pdf=new PDF('L'); // PDF('L'); //pt mm cm('L','mm','Legal'); 
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

$pdf->SetFont('Arial','',10);


$pdf->SetWidths(array(40,60,40,70,70));


     
	  $consulta_obras = mysql_query( "SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']." and estatus='2' ORDER BY no_proyecto ASC",$siplan_data_conn) or die (mysql_error());
	  
	  $arreglo_ofi=array();
	  $c=0;
	while ($resReq1 = mysql_fetch_assoc($consulta_obras)) {
	

	$query="SELECT oficio_aprobacion.no_oficio,oficio_aprobacion.monto_total, oficio_aprobacion.tipo, obras.obra, detalle_oficio.monto, obras.id_proyecto, detalle_oficio.id_oficio
FROM obras INNER JOIN (oficio_aprobacion INNER JOIN detalle_oficio ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio) ON obras.id_obra = detalle_oficio.id_poa02
WHERE obras.id_proyecto=".$resReq1['id_proyecto']."  group by obras.obra, oficio_aprobacion.id_oficio desc ORDER BY oficio_aprobacion.tipo,  oficio_aprobacion.no_oficio, obras.obra ASC  ";
$res_proyectos1 = mysql_query($query,$siplan_data_conn) or die (mysql_error());
   $menos=0;
	 $mas=0;
	  $menosof=0;
	 $masof=0;
	 $tempof="";
	 $ofi="";
	 if (mysql_num_rows($res_proyectos1)>=1){
	 $pdf->SetFont('Arial','B',10);
     $pdf->SetAligns(array(C,C,C,C,C));
	 $pdf->SetX(3);
	 $pdf->MultiCell(210,5,"No. de Programa P: ".$resReq1['no_proyecto']."  Programa Presupuestario: ".utf8_decode(ucwords(strtolower(limpiar($resReq1['nombre'])))),0,C,0);
	  $pdf->SetX(3);
	 $pdf->Row(array("No. Oficio","Tipo","No. Obra","Importe X Obra","Total X Oficio"));
	 }
	 
	 $pdf->SetFont('Arial','I',10);
	 $pdf->SetAligns(array(C,L,C,R,C));
	 while ($row = mysql_fetch_assoc($res_proyectos1)) {
 $pdf->SetX(3);

	

	
	$ofi=$row['id_oficio'];
	$arreglo_ofi[$c]=$ofi;
	$c=$c+1;

	
   if ($row['tipo']==0){
	  $ttipo="Oficio de Ejecución";
	   $mas=$mas + $row['monto'];
	  }
	  elseif($row['tipo']==1){
	  $ttipo="Oficio de Ampliación";
	   $mas=$mas + $row['monto'];
	  }
	  elseif($row['tipo']==2){
	   $ttipo="Oficio de Cancelación";
	   $menos=$menos + $row['monto'];
	   $vm="-";
	  }
	 
		 
		 
		  if ($tempof!=$ofi)  {
 $tempof=$ofi;
  $cp=0;
 for($i=0;$i<=$c; $i++){

 //echo $i."_"."<br>";
 //echo $arreglo_ofi[$i]." = ".$ofi."<br>";
 if ($arreglo_ofi[$i]==$ofi){
 $cp=$cp+1;
 }
 }
 if ($cp==1){
 
    if ($row['tipo']==0){
	 
	    $masof=$masof + $row['monto_total'];
	  }
	  elseif($row['tipo']==1){
	
	    $masof=$masof + $row['monto_total'];
	  }
	  elseif($row['tipo']==2){
	  
	     $menosof=$menosof + $row['monto_total'];
		 $vmm="-";
	  }
	  
	   
	   $pdf->Row(array($row['no_oficio'],$ttipo,$row['obra'],$vm."$ ".number_format($row['monto'],2),$vmm."$ ".number_format($row['monto_total'],2)));
	   }
	   
	   
    }else {
  
		  
	
	$pdf->Row(array($row['no_oficio'],$ttipo,$row['obra'],$vm."$ ".number_format($row['monto'],2),""));
	} $vm="";
	$vmm="";
	
	}
	
	
	if (mysql_num_rows($res_proyectos1)>=1){
	$pdf->SetFont('Arial','B',10);
	 $pdf->SetX(3);
		$pdf->Row(array("","","Total","$ ".number_format($mas-$menos,2),"$ ".number_format($masof-$menosof,2)));

	
	 
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 2;
$pdf->SetXY(66, $newy);
$pdf->MultiCell(200,5, 'Total de Oficios: '.number_format(mysql_num_rows($res_proyectos1)),0,L,0); // the new x will be the previous x plus the width of multicell:
$pdf->Ln(7);
}
}

	
	$pdf->Output('Lista de Oficios','I');

?>

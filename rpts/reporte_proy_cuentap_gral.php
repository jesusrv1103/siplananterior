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
$this->MultiCell(292,5,"COORDINACIÓN ESTATAL DE PLANEACIÓN",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(292,5,"Dirección de Programación",0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(292,5,utf8_decode("Cuenta PÃºblica 2018"),0,C,0); 
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

$this->Cell(23,5,'No. PP',1,0,'C');
$this->Cell(104,5,'Programa Presupuestario',1,0,'C');
$this->Cell(30,5,'Unida de Medida',1,0,'C');

$this->Cell(39,5,'Programada Semestral',1,0,'C');
$this->Cell(32,5,'Programada Anual',1,0,'C');
$this->Cell(35,5,'Avance Semestral %',1,0,'C');
$this->Cell(28,5,'Avance Anual %',1,0,'C');
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
$pdf=new PDF('L'); // PDF('L'); //pt mm cm('L','mm','Legal'); 
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


$pdf->SetWidths(array(23,104,30,39,32,35,28));
$pdf->SetAligns(array(C,L,L,C,C,C,C));

$pos = strlen($query);
  $id_proyecto=$_GET['idproyecto'];



     
	  $consulta_obras = mysql_query( "SELECT * FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']." and estatus='2' ORDER BY no_proyecto ASC",$siplan_data_conn) or die (mysql_error());
	
	


//$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_array($consulta_obras))

	{ /*$resw="SELECT * from obras";
	$ress=mysql_query($resw,$siplan_data_conn);
	$roew = mysql_fetch_array($ress);
	 $depp=$roew['nombre'];*/
	 
	//-$cons_no_proyecto = mysql_query("SELECT * FROM proyectos WHERE id_proyecto = ".$row['id_proyecto'],$siplan_data_conn)or die(mysql_error());
	//-$res_pry = mysql_fetch_array($cons_no_proyecto);
	//porcentajes
	///porcentajes
	//- $sumar_aportes = mysql_query("select  (federal + estatal + municipal + participantes + credito + otros ) as totalp  from aportes where obra = ".$row['obra'],$siplan_data_conn) or die (mysql_error());
	//-$sum_aporte= mysql_fetch_array($sumar_aportes);
	

	
	//echo "select  (fed + est + mun + part + cred + otr ) as totale  from ejercido where activo=1 and id_obra = ".$resobras['id_obra'];
	//_$sumar_ejercido = mysql_query("select  (fed + est + mun + part + cred + otr ) as totale  from ejercido where activo=1 and id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
	$ejercido=0;
//_	while($sum_ejercido = mysql_fetch_array($sumar_ejercido)){
	//-   	   $ejercido = $ejercido + $sum_ejercido['totale'];
	  //_ 	}
	   
	   
	//_   $sumar_alcanzadas = mysql_query("select   SUM(m_alcanzadas) as m  from ejercido where activo=1 and id_obra = ".$row['id_obra'],$siplan_data_conn) or die (mysql_error());
	//_  $sumalcanzada=0;
	//_$sum_alcanzadas= mysql_fetch_array($sumar_alcanzadas);
	//_$sumalcanzada=$sum_alcanzadas['m'];
//	echo $ejercido.'/'.$sum_aporte['totalp'].'|';
	
	/*if ($sum_aporte['totalp']==""){
	$aporte=0;
		}else{
	$aporte=$sum_aporte['totalp'];
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
	//porcentajes*/
	
	  //sacar porcentajes
	$sumar_cantidad = mysql_query("select  sum(cantidad) as totalp  from proyectos where id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());
	$sac_cantidad= mysql_fetch_array($sumar_cantidad);
	
	
	$sumar_sem = mysql_query("select  sum(prog_sem) as totals  from proyectos where id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());
	$sac_sem= mysql_fetch_array($sumar_sem);
	


	$sac_malca=0;
		$sumar_malca = mysql_query("select  (alcanzadas) as totalsa from alcanzadas_proy  where activo=1 and id_proyecto = ".$row['id_proyecto']." order by fecha asc limit 1",$siplan_data_conn) or die (mysql_error());
	$sac_malca= mysql_fetch_array($sumar_malca);
	
	$alc_sem=$sac_malca['totalsa'];


$sac_malca_a=0;
		$masdos = mysql_query("select  (alcanzadas) as totalsa from alcanzadas_proy  where activo=1 and id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());

		if (mysql_num_rows($masdos)==2){
		$sumar_malca_a = mysql_query("select  (alcanzadas) as totalsa from alcanzadas_proy  where activo=1 and id_proyecto = ".$row['id_proyecto']." order by fecha desc limit 1",$siplan_data_conn) or die (mysql_error());
	$sac_malca_a= mysql_fetch_array($sumar_malca_a);
	
	$alc_anual=$sac_malca_a['totalsa'];	
	}else{
	$alc_anual=0;	
	}

//	$sumalcanzada=$sum_alcanzadas['m'];
	//evitar divison zero y datos invalidos para el %
	
	if ($sac_sem['totals']==""){
	$aporte=0;
		}else{
	$aporte=$sac_sem['totals'];
		}
		if ($alc_sem==0 and $aporte==0){
	$tt=0;
	}elseif ($alc_sem>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$tt=(($alc_sem/$aporte)*100);}
	
	//anual 
	if ($sac_cantidad['totalp']==""){
	$aporte_a=0;
		}else{
	$aporte_a=$sac_cantidad['totalp'];
		}
		if ($alc_anual==0 and $aporte_a==0){
	$ttca=0;
	}elseif ($alc_anual>=0.01 and $aporte_a==0){
	
	$ttca=0;
	}else{$ttca=(($alc_anual/$aporte_a)*100);}
		 
	
	$pdf->Row(array($row['no_proyecto'],utf8_decode(ucwords((strtolower(limpiar($row['nombre']))))),utf8_decode(ucwords((strtolower(limpiar($row['unidad_medida']))))),  number_format($row['prog_sem'],2), number_format($row['cantidad'],2), number_format($tt,2).' %', number_format($ttca,2).' %' ));
	
	}
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->MultiCell(200,5, 'Total de Proyectos: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Cuenta PÃºblica 2018.pdf','I');

?>

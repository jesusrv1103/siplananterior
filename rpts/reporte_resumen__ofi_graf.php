<?php session_start(); 
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");

require('fpdf/1fpdf.php');
//$siplan_data_conn; conexion
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
$this->Image('../imagenes/logoupla.jpg',5,5,81,17);

$this->SetXY(3,3);
$this->MultiCell(292,5,"COORDINACIÓN ESTATAL DE PLANEACIÓN",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(292,5,"Dirección de Programación",0,C,0); 
$this->SetXY(3,20);
$this->MultiCell(292,5,"Resumen de Oficios por Mes e Inversión Autorizados por la COEPLA",0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(3,22);


//$this->MultiCell(292,5,"Resumen de Oficios 2016",0,C,0); 

//$this->SetXY(3,28);
//$this->MultiCell(292,5,"POA de Inversión por Dependencia",0,C,0); 



$this->Image('tmp/oficios.png',62,30,300,105);

$this->SetFont('Arial','B',10);
$this->SetXY(3,127);
$this->MultiCell(292,5,strtoupper(""),0,C,0);
$this->SetY(98);
$this->SetX(10);
$this->Rotate(90); 
$this->Write(112,"Recursos $");
$this->Rotate(0); 

$X=3;
$Y=35;
$this->SetXY($X,$Y);



/*$this->SetFont('Arial','B',8);
$X=3;
$Y=125;
$this->SetXY($X,$Y);
$this->Cell(26,5,'Mes',1,0,'C');
$this->Cell(27,5,'Enero',1,0,'C');
$this->Cell(27,5,'Febrero',1,0,'C');
$this->Cell(27,5,'Marzo',1,0,'C');
$this->Cell(27,5,'Abril',1,0,'C');
$this->Cell(27,5,'Mayo',1,0,'C');
$this->Cell(27,5,'Junio',1,0,'C');
$this->Cell(27,5,'Julio',1,0,'C');
$this->Cell(27,5,'Agosto',1,0,'C');
$this->Cell(27,5,'Septiembre',1,0,'C');
$this->Cell(27,5,'Octubre',1,0,'C');
$this->Cell(27,5,'Noviembre',1,0,'C');
$this->Cell(27,5,'Diciembre',1,0,'C');

$X=3;
$Y=130;
$this->SetXY($X,$Y);
$this->Cell(26,5,'Recursos $',1,0,'C');
$this->Cell(27,5,'6,626,000,000.00',1,0,'C');
$this->Cell(27,5,'Febrero',1,0,'C');
$this->Cell(27,5,'Marzo',1,0,'C');
$this->Cell(27,5,'Abril',1,0,'C');
$this->Cell(27,5,'Mayo',1,0,'C');
$this->Cell(27,5,'Junio',1,0,'C');
$this->Cell(27,5,'Julio',1,0,'C');
$this->Cell(27,5,'Agosto',1,0,'C');
$this->Cell(27,5,'Septiembre',1,0,'C');
$this->Cell(27,5,'Octubre',1,0,'C');
$this->Cell(27,5,'Noviembre',1,0,'C');
$this->Cell(27,5,'Diciembre',1,0,'C');

$X=3;
$Y=135;
$this->SetXY($X,$Y);
$this->Cell(26,5,'No. Ofi.',1,0,'C');
$this->Cell(27,5,'6,626,000,000.00',1,0,'C');
$this->Cell(27,5,'Febrero',1,0,'C');
$this->Cell(27,5,'Marzo',1,0,'C');
$this->Cell(27,5,'Abril',1,0,'C');
$this->Cell(27,5,'Mayo',1,0,'C');
$this->Cell(27,5,'Junio',1,0,'C');
$this->Cell(27,5,'Julio',1,0,'C');
$this->Cell(27,5,'Agosto',1,0,'C');
$this->Cell(27,5,'Septiembre',1,0,'C');
$this->Cell(27,5,'Octubre',1,0,'C');
$this->Cell(27,5,'Noviembre',1,0,'C');
$this->Cell(27,5,'Diciembre',1,0,'C');

$X=30;
$Y=30;


$this->SetXY($X,$Y);


*/


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


$pdf->SetFont('Arial','B',7);




//--------------------------------------------temrina



$X=3;
$Y=45;
$pdf->SetXY($X,$Y);
	$totd=0;
$totof=0;	
$pdf->SetWidths(array(20,25,12));
//$pdf->SetWidths(array(25,25,25,25,25,25,25,25,25,25,25,25,25,25));
$pdf->SetAligns(array(C,C,C,C,C,C,C,C,C,C,C,C,C,C));

$mes=array("Mes","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Totales");

for ($q=0;$q<=13;$q++){
	
   $datom[$q]=$mes[$q];
			
	}

	$dato=array();
	for ($q=0;$q<=(13);$q++){
		if ($q==0){
			$dato[$q]="Recursos $";
			}else{
   $dato[$q]="$ ".number_format(trmes($q),2);
   
    if ($q==13){
  
   }else{  $totd=(trmes($q))+$totd;}
		}
			if ($q==13){
			 $dato[$q]="$".number_format(($totd),2);
			}
		
	}
	
	$oft=array();
	for ($q=0;$q<=(13);$q++){
		if ($q==0){
			$oft[$q]="No. Ofi.";
			}else{
   $oft[$q]=number_format(trof($q));
   if ($q==13){
  
   }else{ $totof=(trof($q))+$totof;}
		}
		
		if ($q==13){
			 $oft[$q]=number_format($totof);
			}
	}
		
	

for ($q=0;$q<=(13);$q++){
	$pdf->Row(array($datom[$q],$dato[$q],$oft[$q]));
	
}


function trmes($d){
$query="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2018-".$d."-01'
AND  '2018-".$d."-31' AND tipo =0";

$querya="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2018-".$d."-01'
AND  '2018-".$d."-31' AND tipo =1";

$queryc="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2018-".$d."-01'
AND  '2018-".$d."-31' AND tipo =2";

 $consulta_obras = mysql_query($query) or die (mysql_error());
 
  $consulta_obrasa = mysql_query($querya) or die (mysql_error());
  
   $consulta_obrasc = mysql_query($queryc) or die (mysql_error());
   $row1 = mysql_fetch_array($consulta_obras);
   $rowa = mysql_fetch_array($consulta_obrasa);
   $rowc = mysql_fetch_array($consulta_obrasc);
	$tr=(($row1['total']+$rowa['total'])-$rowc['total']);




return($tr);



		}
		
		function trof($d){
			
			$quer="SELECT oficio_aprobacion.fecha_oficio, oficio_aprobacion.no_oficio, oficio_aprobacion.tipo, oficio_aprobacion.monto_total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2018-".$d."-01'
AND  '2018-".$d."-31'";
$consulta_obra = mysql_query($quer) or die (mysql_error());
$num_of=mysql_num_rows($consulta_obra);
return($num_of);	
			}





	
	
	//$dato=array("Recursos $","$ ".number_format(trmes('01'),2),"$ ".number_format(trmes('02'),2),"$ ".number_format(trmes('03'),2),"$ ".number_format(trmes('04'),2),"$ ".number_format(trmes('05'),2),"$ ".number_format(trmes('06'),2),"$ ".number_format(trmes('07'),2),"$ ".number_format(trmes('08'),2),"$ ".number_format(trmes('09'),2),"$ ".number_format(trmes('10'),2),"$ ".number_format(trmes('11'),2),"$ ".number_format(trmes('12'),2),"tt");
	
//	$pdf->Row($dato);
//	$pdf->Row($oft);
	
	
	
	//$pdf->Row(array("No. Ofi.",number_format(trof('01')),number_format(trof('02')),number_format(trof('03')),number_format(trof('04')),number_format(trof('05')),number_format(trof('06')),number_format(trof('07')),number_format(trof('08')),number_format(trof('09')),number_format(trof('10')),number_format(trof('11')),number_format(trof('12')),"tt"));
	

	
	//}
/*	$pdf->SetXY(23,135);
$pdf->MultiCell(82,5,"TOTAL POA OBRAS: ".number_format($cp),0,L,0);
$pdf->SetXY(105,135);
$pdf->MultiCell(82,5,"Total de Inversión: $ ".number_format($tt,2),0,L,0);
	$pdf->SetFont('Arial','B',9);*/
	
	
/*	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);*/
//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Resumen Oficios.pdf','I');

?>

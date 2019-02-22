<?php session_start(); 

date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
include "libchart/classes/libchart.php";

require('fpdf/fpdf.php');
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
$this->MultiCell(292,5,"Resumen Oficios - Estado Financiero - Autorizado 2018",0,C,0); 
$this->SetFont('Arial','B',10);
$this->SetXY(3,23);
//


/*
$this->SetFont('Arial','B',10);
$X=3;
$Y=30;


$this->SetXY(3,30);
$this->MultiCell(28,5,"  Dependencia      ",1,C,0);
$this->SetXY(31,30);
$this->MultiCell(22,5,"No. Oficios        ",1,C,0);
$this->SetXY(53,30);
$this->MultiCell(37,5," Recurso Autorizado ",1,C,0);
$this->SetXY(90,30);
$this->MultiCell(38,5,"Recurso Autorizado Modificado",1,C,0);
$this->SetXY(128,30);
$this->MultiCell(38,5,"  Recurso con Oficio   ",1,C,0);
$this->SetXY(166,30);
$this->MultiCell(15,5,"Avance   %   ",1,C,0);
$this->SetXY(181,30);
$this->MultiCell(38,5,"Recurso por Aprobar  ",1,C,0);
$this->SetXY(219,30);
$this->MultiCell(37,5,"           Ejercido            ",1,C,0);
$this->SetXY(256,30);
$this->MultiCell(37,5," Recurso por Ejercer ",1,C,0);
*/


$X=3;
$Y=40;
/*
$this->SetXY($X,$Y);
$this->Cell(28,5,'Dependencia',1,0,'C');
$this->Cell(22,5,'No. Oficios',1,0,'C');
$this->Cell(40,5,'Recurso Autorizado',1,0,'C');
$this->Cell(40,5,'Rec. Aut. Modificado ',1,0,'C');
$this->Cell(40,5,'Total Ofc',1,0,'C');
$this->Cell(40,5,'X Aprob Ofc',1,0,'C');
$this->Cell(40,5,'Ejercido',1,0,'C');
$this->Cell(40,5,'ResXEjercer',1,0,'C');*/
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
$pdf=new PDF('L'); //pt mm cm PDF('L','mm','Legal');
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial','B',10);
$X=3;
$Y=30;


$pdf->SetXY(3,30);
$pdf->MultiCell(28,5,"  Dependencia	  ",1,C,0);
$pdf->SetXY(31,30);
$pdf->MultiCell(22,5,"No. Oficios        ",1,C,0);
$pdf->SetXY(53,30);
$pdf->MultiCell(37,5," Recurso Autorizado ",1,C,0);
$pdf->SetXY(90,30);
$pdf->MultiCell(38,5,"Recurso Autorizado Modificado",1,C,0);
$pdf->SetXY(128,30);
$pdf->MultiCell(38,5,"  Recurso con Oficio   ",1,C,0);
$pdf->SetXY(166,30);
$pdf->MultiCell(15,5,"Avance   %   ",1,C,0);
$pdf->SetXY(181,30);
$pdf->MultiCell(38,5,"Recurso Por Aprobar  ",1,C,0);
$pdf->SetXY(219,30);
$pdf->MultiCell(37,5,"           Ejercido            ",1,C,0);
$pdf->SetXY(256,30);
$pdf->MultiCell(37,5," Recurso por Ejercer ",1,C,0);










$pdf->SetFont('Arial','B',10);


 

$pdf->SetFont('Arial','',10);


$pdf->SetWidths(array(28,22,37,38,38,15,38,37,37));
$pdf->SetAligns(array(L,R,R,R,R,C,R,R,R));
$asignado_total = 0;
$ampliado_total = 0;
$reducido_total = 0;
$transAmpliado_total = 0;
$transReducido_total = 0;
$gran_total = 0;
$ejercido_total = 0;
$ttofi=0;
$tcu=0;
$tr=0;
$ttofi=0;
$pos = strlen($query);
  $id_proyecto=$_GET['idproyecto'];

$query="Select dependencias.id_dependencia,
dependencias.acronimo AS Dependencia,
Sum(estados_financieros.d02p_preasi) AS Asignado,
Sum(estados_financieros.d02p_acuamp) AS Ampliado,
Sum(estados_financieros.d02p_acured) AS Reducido,
Sum(estados_financieros.d02p_acutre) AS TrasnReducido,
Sum(estados_financieros.d02p_preasi+(estados_financieros.d02p_acuamp)+(estados_financieros.d02p_acutam)-(estados_financieros.d02p_acured)-(estados_financieros.d02p_acutre)) AS Total,
Sum(estados_financieros.d02p_gascom) AS Ejercido
From
dependencias
Inner Join estados_financieros ON dependencias.id_dependencia = estados_financieros.s02c_depend
where (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or (estados_financieros.s07c_partid BETWEEN 6000 and 6999) 
Group By
dependencias.acronimo
Order By
dependencias.id_dependencia Asc";

$consulta_obras = mysql_query($query) or die (mysql_error());
$totauto=0;
$totaltras=0;
//$row = mysql_fetch_array($consulta_obras);

        $chart = new HorizontalBarChart(1024, 768);
        $dataSet = new XYDataSet();




while($row = mysql_fetch_array($consulta_obras))

{ 
$asignado = $row['Asignado'];
$asignado_total = $asignado + $asignado_total;
$ampliado = $row['Ampliado'];
$ampliado_total = $ampliado + $ampliado_total;
$reducido = $row['Reducido'];
$reducido_total = $reducido - $reducido_total;
$tampliado = $row['TransAmpliado'];
$transAmpliado_total = $transAmpliado_total + $tampliado;
$treducido = $row['TrasnReducido'];
$transReducido_total = $transReducido_total + $treducido;
$total = $row['Total'];
$gran_total = $gran_total + $total;
$ejercido = $row['Ejercido'];
$ejercido_total = $ejercido_total + $ejercido;

$d=0;

if ((strlen(date('m')-1))==1){
	$d="0".(date('m')-1);
	
	}else{
		$d=(date('m')-1);
		}


   /*$querys="SELECT oficio_aprobacion.fecha_oficio, dependencias.acronimo, dependencias.id_dependencia, SUM( oficio_aprobacion.monto_total ) AS total
FROM oficio_aprobacion
INNER JOIN (
(
dependencias
INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia
)
INNER JOIN detalle_oficio ON obras.id_obra = detalle_oficio.id_poa02
) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio
where dependencias.id_dependencia=".$row['id_dependencia']." and oficio_aprobacion.tipo=0
GROUP BY dependencias.acronimo
ORDER BY dependencias.id_dependencia ASC ";*/

 $querys="SELECT  oficio_aprobacion.monto_total AS total
FROM oficio_aprobacion
INNER JOIN (
(
dependencias
INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia
)
INNER JOIN detalle_oficio ON obras.id_obra = detalle_oficio.id_poa02
) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio
where dependencias.id_dependencia=".$row['id_dependencia']." and oficio_aprobacion.tipo=0
GROUP BY oficio_aprobacion.id_oficio
ORDER BY dependencias.id_dependencia ASC";

$consulta_obras1 = mysql_query($querys) or die (mysql_error());
 $ofeje=0;

while($row1 = mysql_fetch_array($consulta_obras1))

{ $ofeje= $row1['total']+$ofeje; }
//-------------------------
  $querysa="SELECT  oficio_aprobacion.monto_total AS total
FROM oficio_aprobacion
INNER JOIN (
(
dependencias
INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia
)
INNER JOIN detalle_oficio ON obras.id_obra = detalle_oficio.id_poa02
) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio
where dependencias.id_dependencia=".$row['id_dependencia']." and oficio_aprobacion.tipo=1
GROUP BY oficio_aprobacion.id_oficio
ORDER BY dependencias.id_dependencia ASC";

$consulta_obras1a = mysql_query($querysa) or die (mysql_error());

 $ofejea=0;
//$totauto=0;
while($row1a = mysql_fetch_array($consulta_obras1a))

{ $ofejea= $row1a['total']+$ofejea; }
//--------------------------------
///-----------------------tras


/*
 

 $querytras="SELECT (poa02_origen.monto) as total FROM poa02_origen inner join obras on poa02_origen.id_obra=obras.id_obra 

where obras.id_dependencia=".$row['id_dependencia']." and poa02_origen.tipo=3

ORDER BY obras.id_dependencia ASC";



$consulta_obrastras = mysql_query($querytras) or die (mysql_error());



 $oftras=0;

//$totauto=0;

while($rowtras = mysql_fetch_array($consulta_obrastras))



{ 
 $oftras= $rowtras['total']+$oftras; }

*/
///--------tras




  $querysc="SELECT  oficio_aprobacion.monto_total AS total
FROM oficio_aprobacion
INNER JOIN (
(
dependencias
INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia
)
INNER JOIN detalle_oficio ON obras.id_obra = detalle_oficio.id_poa02
) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio
where dependencias.id_dependencia=".$row['id_dependencia']." and oficio_aprobacion.tipo=2
GROUP BY oficio_aprobacion.id_oficio
ORDER BY dependencias.id_dependencia ASC";

$consulta_obras1c = mysql_query($querysc) or die (mysql_error());


 $ofejec=0;
while($row1c = mysql_fetch_array($consulta_obras1c))

{ $ofejec= $row1c['total']+$ofejec; }


/*
if ($row['id_dependencia']==13){

echo $oftras."<br>";
echo $tr=(($ofeje+$ofejea+$oftras)-$ofejec); 
$oftras=0;
echo "<br>";
echo $tr=(($ofeje+$ofejea+$oftras)-$ofejec);

}*/


 $tr=(($ofeje+$ofejea)-$ofejec);

$ttofi=$tr+$ttofi;
/*echo "--------------------<br>";
echo "dep: ".$row['id_dependencia']."<br>";
	echo $ofeje."+<br>";
	echo $ofejea."+<br>";
	echo $ofejec."-<br>";
	echo "--------------------<br>";
	echo (($ofeje+$ofejea)-$$ofejec)."<br>";
	echo "--------------------<br>";*/
	










 $quer="SELECT dependencias.id_dependencia, dependencias.acronimo, oficio_aprobacion.fecha_oficio, oficio_aprobacion.no_oficio,oficio_aprobacion.tipo
FROM oficio_aprobacion
INNER JOIN (
(
dependencias
INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia
)
INNER JOIN detalle_oficio ON obras.id_obra = detalle_oficio.id_poa02
) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio
 WHERE  dependencias.id_dependencia=".$row['id_dependencia']." 
GROUP BY oficio_aprobacion.no_oficio";

/*$quer="SELECT oficio_aprobacion.no_oficio, obras.id_dependencia, oficio_aprobacion.fecha_oficio, obras.id_dependencia
FROM obras INNER JOIN (oficio_aprobacion INNER JOIN detalle_oficio ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio) ON obras.id_obra = detalle_oficio.id_poa02
 WHERE oficio_aprobacion.fecha_oficio

AND obras.id_dependencia=".$row['id_dependencia']." GROUP BY oficio_aprobacion.no_oficio";
 /*BETWEEN  '2013-01-01'
AND  '2013-".$d."-31'*/



$consulta_obr = mysql_query($quer) or die (mysql_error());
$rowc = mysql_fetch_array($consulta_obr);
$toff=mysql_num_rows($consulta_obr);

$tcu=$toff+$tcu;

$cons_auto="select sum(monto_oficio_aut) as monto_aut, id_dependencia from oficios_aut where  no_oficio_aut like 'DP-A-%' and id_dependencia=".$row['id_dependencia']."  group by id_dependencia";
$res_auto=mysql_query($cons_auto);
$row_auto=mysql_fetch_assoc($res_auto);
$totauto=$totauto+$row_auto['monto_aut'];

///-----------------------tras



 

 $querytras="SELECT (poa02_origen.monto) as total  FROM poa02_origen inner join obras on poa02_origen.id_obra=obras.id_obra 

where obras.id_dependencia=".$row['id_dependencia']." and poa02_origen.tipo=3

ORDER BY obras.id_dependencia ASC";



$consulta_obrastras = mysql_query($querytras) or die (mysql_error());



 $oftras=0;

//$totauto=0;

while($rowtras = mysql_fetch_array($consulta_obrastras))



{  $oftras= $rowtras['total']+$oftras;
 }

///--------tras


	$totaltras+=$oftras;

$pdf->Row(array($row['Dependencia'],number_format($toff),"$ ".number_format($row_auto['monto_aut'],2),"$ ".number_format($row['Total']+$oftras,2),"$ ".number_format($tr,2),number_format(($tr/($row['Total']+$oftras)*100),2),"$ ".number_format((($row['Total']+$oftras)-($tr)),2),"$ ".number_format($row['Ejercido'],2),"$ ".number_format(($row['Total']-$row['Ejercido']),2)));
 $dataSet->addPoint(new Point($row['Dependencia'], number_format(($tr/($row['Total']+$oftras)*100),2) ));
	
	}
	$pdf->SetFont('Arial','B',10);
	$pdf->Row(array("Totales",number_format($tcu),"$ ".number_format($totauto,2),"$ ".number_format($gran_total+$totaltras,2),"$ ".number_format($ttofi,2),number_format(($ttofi/($gran_total+$totaltras)*100),2),"$ ".number_format((($gran_total+$totaltras)-$ttofi),2),"$ ".number_format($ejercido_total,2),"$ ".number_format(($gran_total-$ejercido_total),2)));

//$pdf->header[0] = true;
$pdf->AddPage();	

	$chart->setDataSet($dataSet);
	//$chart->getPlot()->setGraphPadding(new Padding(50, 0,0, 0));
	$chart->setTitle("");
	$chart->render("tmp/avf.png");

	$pdf->Image('tmp/avf.png',35,25,240,0);
	

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Resumen Estado Financiero Oficios.pdf','I');

?>

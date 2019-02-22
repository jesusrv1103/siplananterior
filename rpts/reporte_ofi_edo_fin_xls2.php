<? session_start();
include("../seguridad/siplan_connection_db_2016.php");
require_once 'Spreadsheet/Excel/Writer.php';
include('magic/php_image_magician.php');

include "libchart/classes/libchart.php";

// Creamos un libro de excel que sirve como nuestro espacio de trabajo.
$libro = new Spreadsheet_Excel_Writer();

// Estableceremos nuestro formato Negrita para usarlo en el documento	
$negrita =& $libro->addFormat();
$negrita->setBold();
$negrita->setSize(15);
$negrita->setAlign('top');
$negrita->setAlign('center');
$negrita2=& $libro->addFormat();
$negrita2->setSize(12);
$negrita2->setAlign('top');
$negrita2->setAlign('center');
$negrita3=& $libro->addFormat();
$negrita3->setBold();
$negrita3->setSize(10);

$negrita4=& $libro->addFormat();
$negrita4->setBold();
$negrita4->setSize(10);
$negrita4->setAlign('vcenter');
$negrita4->setAlign('center');
$negrita4->setTextWrap();

$negrita8=& $libro->addFormat();
$negrita8->setBold();
$negrita8->setSize(10);
$negrita8->setAlign('vcenter');
$negrita8->setAlign('left');
$negrita8->setTextWrap();


$negrita9=& $libro->addFormat();
$negrita9->setBold();
$negrita9->setSize(11);
$negrita9->setAlign('vcenter');
$negrita9->setAlign('center');
$negrita9->setTextWrap();
$negrita9->setNumFormat('0.00');

$negrita91=& $libro->addFormat();
$negrita91->setBold();
$negrita91->setSize(11);
$negrita91->setAlign('vcenter');
$negrita91->setTextWrap();
$negrita91->setNumFormat('0.00%');


$negrita44=& $libro->addFormat();
$negrita44->setBold();
$negrita44->setSize(10);
$negrita44->setAlign('vcenter');
$negrita44->setAlign('center');
$negrita44->setTextWrap();
$negrita44->setNumFormat('0.00');

$negrita45=& $libro->addFormat();
$negrita45->setBold();
$negrita45->setSize(10);
$negrita45->setAlign('vcenter');
$negrita45->setTextWrap();
$negrita45->setNumFormat('0.00%');


$negrita10=& $libro->addFormat();
$negrita10->setBold();
$negrita10->setSize(11);
$negrita10->setAlign('vcenter');
$negrita10->setAlign('left');
$negrita10->setTextWrap();




$negrita7=& $libro->addFormat();

$negrita7->setSize(10);
$negrita7->setAlign('vcenter');
$negrita7->setAlign('left');
$negrita7->setTextWrap();

$negrita101=& $libro->addFormat();
$negrita101->setBold();
$negrita101->setSize(11);
$negrita101->setAlign('vcenter');
$negrita101->setAlign('center');
$negrita101->setTextWrap();
$negrita101->setFgColor('green');
$negrita101->setColor('white');

$negrita912=& $libro->addFormat();
$negrita912->setBold();
$negrita912->setSize(11);
$negrita912->setAlign('vcenter');
$negrita912->setAlign('center');
$negrita912->setTextWrap();
$negrita912->setNumFormat('0.00');
$negrita912->setFgColor('green');
$negrita912->setColor('white');

$negrita911=& $libro->addFormat();
$negrita911->setBold();
$negrita911->setSize(11);
$negrita911->setAlign('vcenter');
$negrita911->setTextWrap();
$negrita911->setNumFormat('0.00%');
$negrita911->setFgColor('green');
$negrita911->setColor('white');


$negrita5=& $libro->addFormat();
$negrita5->setBold();
$negrita5->setSize(10);
$negrita5->setAlign('top');
$negrita5->setAlign('center');
$negrita5->setTextWrap();
$negrita5->setFgColor('green');
$negrita5->setColor('white');
/*$negrita5->setBorder(2);
$negrita5->setBottomColor('white');
$negrita5->setTopColor ('white');
$negrita5->setLeftColor ('white');
$negrita5->setRightColor ('white');*/

$negrita6=& $libro->addFormat();
//$negrita6->setBold();

$negrita6->setSize(10);
$negrita6->setAlign('top');
$negrita6->setAlign('center');
$negrita6->setTextWrap();
$negrita6->setFgColor('white');
$negrita6->setTextWrap();
$negrita6->setBorder(1);
$negrita6->setBottomColor('black');
$negrita6->setLeftColor ('black');
$negrita6->setRightColor ('black');

//-------------------------------------hoja PED---------------------------------------------
// Necesitamos una hoja en la cual poner nuestros datos
$ped =& $libro->addWorksheet('Resumen Oficios');


// Verificamos que la hoja se haya generado correctamente
if (PEAR::isError($ped)) {
die($ped->getMessage());
}

$radius = 20;
$ped->setColumn(0,8,18);
// Este es el titulo
$ped->write(0, 0, "FiscalÃ­a General de Justicia del Estado de Zacatecas", $negrita);
$ped->mergeCells(0,0,0,8);
$ped->write(1, 0, "Coordinaci¨®n Estatal de Planeaci¨®n", $negrita2);
$ped->mergeCells(1,0,1,8);

$ped->write(2, 0, utf8_decode("DirecciÃ³n de ProgramaciÃ³n"),$negrita2);

$ped->write(3, 0, "Resumen Oficios - Estado Financiero - Autorizado 2018", $negrita2);
$ped->mergeCells(3,0,3,8);


$ped->mergeCells(2,0,2,8);

$ped->write(5, 0, "Dependencia", $negrita5);
//$ped->write(6, 0, "1, 2, 3, 4 y 5", $negrita6);//<------------------------------

$ped->write(5, 1, "No. Oficios", $negrita5);
$ped->write(5, 2, "Recurso Autorizado",$negrita5);
$ped->write(5, 3, "Recurso Autorizado Modificado",$negrita5);
$ped->write(5, 4, "Recurso con Oficio",$negrita5);
$ped->write(5, 5, "Avance %",$negrita5);
$ped->write(5, 6, "Recurso por Aprobar",$negrita5);
$ped->write(5, 7, "Ejercido",$negrita5);
$ped->write(5, 8, "Recurso por Ejercer",$negrita5);

//$ped->write(6, 1, "Plan Estatal de Desarrollo", $negrita6); //<------------------------------
//$ped->mergeCells(6,1,6,11);



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
//$row = mysql_fetch_array($consulta_obras);

  $chart = new HorizontalBarChart(1024, 768);
        $dataSet = new XYDataSet();

$i=6;
$j=0;
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


$tr=(($ofeje+$ofejea)-$ofejec);

$ttofi=$tr+$ttofi;



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




$ped->write($i, 0, $row['Dependencia'], $negrita6);
$ped->write($i, 1, number_format($toff), $negrita6);
$ped->write($i, 2, "$ ".number_format($row_auto['monto_aut'],2), $negrita6);
$ped->write($i, 3, "$ ".number_format($row['Total']+$oftras,2), $negrita6);
$ped->write($i, 4, "$ ".number_format($tr,2), $negrita6);
$ped->write($i, 5, number_format(($tr/($row['Total']+$oftras)*100),2), $negrita6);
$ped->write($i, 6, "$ ".number_format((($row['Total']+$oftras)-$tr),2), $negrita6);
$ped->write($i, 7, "$ ".number_format($row['Ejercido'],2), $negrita6);
$ped->write($i, 8, "$ ".number_format(($row['Total']-$row['Ejercido']),2), $negrita6);


$i+=1;

 $dataSet->addPoint(new Point($row['Dependencia'], number_format(($tr/($row['Total']+$oftras)*100),2) ));


}




$ped->write($i, 0, "Totales", $negrita4);
$ped->write($i, 1, number_format($tcu), $negrita4);
$ped->write($i, 2, "$ ".number_format($totauto,2), $negrita4);
$ped->write($i, 3, "$ ".number_format($gran_total+$totaltras,2), $negrita4);
$ped->write($i, 4, "$ ".number_format($ttofi,2), $negrita4);
$ped->write($i, 5, number_format(($ttofi/($gran_total+$totaltras)*100),2), $negrita4);
$ped->write($i, 6, "$ ".number_format((($gran_total+$totaltras)-$ttofi),2), $negrita4);
$ped->write($i, 7, "$ ".number_format($ejercido_total,2), $negrita4);
$ped->write($i, 8, "$ ".number_format(($gran_total-$ejercido_total),2), $negrita4);




 $chart->setDataSet($dataSet);
        //$chart->getPlot()->setGraphPadding(new Padding(50, 0,0, 0));
        $chart->setTitle("Resumen Oficios - Estado Financiero - Autorizado 2018");
        $chart->render("tmp/avf1.png");
 $magicianObj = new imageLib('tmp/avf1.png');
        $magicianObj -> saveImage('tmp/avf.bmp', 100);



$ped->insertBitmap(33,1,"tmp/avf.bmp",0,0,1,1);





//-----------------------------------termina hoja PED----------------------------------------------







//}	


// Generamos nuestro libro de excel
//-$ms_ac=mysql_fetch_array($sac_ac);
//echo $ms_ac['acuerdo']."aaaaaa";
$libro->send('Resumen Estado Financiero Oficios.xls');
$libro->close();
?>


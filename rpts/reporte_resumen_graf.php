<?php session_start(); 
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
//$siplan_data_conn; conexion
$tipo=$_GET['g'];
if ($tipo=="dep"){
$title="Dependencia";
}
if ($tipo=="sec"){
$title="Sectores";
}
if ($tipo=="reg"){
$title="Regiones";
}
if ($tipo=="mun"){
$title="Municipios";
}
if ($tipo=="eje"){
$title="Ejes";
}
if ($tipo=="fin"){
$title="Finalidad";
}
if ($tipo=="fun"){
$title="Funciones";
}
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


//$this->SetXY(3,28);
//$this->MultiCell(292,5,"POA de Inversión por Dependencia",0,C,0); 






$this->SetY(98);
$this->Rotate(90); 
$this->Write(10,"INVERSION TOTAL");
$this->Rotate(0); 

$X=3;
$Y=35;
$this->SetXY($X,$Y);





$X=30;
$Y=135;


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


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,140);
$pdf->MultiCell(292,5,strtoupper($title),0,C,0);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Programada por ".$title." 2017",0,C,0); 
$pdf->Image('tmp/'.$tipo.'.png',10,30,330,105);
$pdf->SetWidths(array(39,39,39,39,39,39,39,39,39));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));

$id_dependencia = $_SESSION['id_dependencia_v3'];




	$consulta_obras = mysql_query("
	SELECT dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector

where obras.status_obra>=3
GROUP BY dependencias.acronimo;
",$siplan_data_conn) or die (mysql_error());
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

$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_array($consulta_obras))

	{
	
	
	
	


	
		$tt=$tt+$row['total'];
	$fd=$fd+$row['SumaDefederal'];
	$st=$st+$row['SumaDeestatal'];
	$mn=$mn+$row['SumaDemunicipal'];
	$pt=$pt+$row['SumaDeparticipantes'];
	$cr=$cr+$row['SumaDecredito'];
	$ot=$ot+$row['SumaDeotros'];
	$cp=$cp+$row['CuentaDeacronimo'];
	
	}
	$pdf->SetXY(23,150);
$pdf->MultiCell(82,5,"TOTAL POA OBRAS: ".number_format($cp),0,L,0);
$pdf->SetXY(105,150);
$pdf->MultiCell(82,5,"Total de Inversión: $ ".number_format($tt,2),0,L,0);
	$pdf->SetFont('Arial','B',9);
	
	
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 15;
$pdf->SetXY(11, $newy);


///----grafica aprobada-------///
$pdf->AddPage();


$pdf->SetFont('Arial','',9);





if($fecha!=""){


	}


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,140);
$pdf->MultiCell(292,5,strtoupper($title),0,C,0);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(3,22);
$pdf->MultiCell(292,5,"Resumen de Inversión Aprobada por ".$title." 2017",0,C,0); 

$pdf->Image('tmp/'.$tipo.'_ap.png',10,30,330,105);
$pdf->SetWidths(array(39,39,39,39,39,39,39,39,39));
$pdf->SetAligns(array(C,C,R,R,R,R,R,R,R));

$id_dependencia = $_SESSION['id_dependencia_v3'];



//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
	$consulta_obras = mysql_query("SELECT `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total`
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY `dependencias`.`acronimo` order by dependencias.id_dependencia
",$siplan_data_conn) or die (mysql_error());
	//aqui
//	 $consulta_obras = mysql_query("SELECT * FROM obras WHERE id_dependencia= ".$_SESSION['id_dependencia_v3']." and status_obra=".$_GET['s'] ,$siplan_data_conn)or die (mysql_error());
	 



	   


		
		
		
		
		
		
		

	
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_array($consulta_obras))

	{
	
	
	
	// AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
$query1="SELECT `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."' 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."' 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
";

// AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
$query2="SELECT `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."' 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2
 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 and obras.status_obra='4' and dependencias.acronimo='".$row['acronimo']."' 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);

	
		$tt=$tt+(($row['total']+$rowres1['total'])-$rowres2['total']);
	
	
	}
	//AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
		$sac_cuenta = mysql_query("SELECT obras.id_obra 
FROM  `obras` 
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
WHERE status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR  status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");
	$res_cuenta= mysql_num_rows($sac_cuenta);		
			
	
	$pdf->SetXY(23,150);
$pdf->MultiCell(82,5,"TOTAL POA OBRAS: ".number_format($res_cuenta),0,L,0);
$pdf->SetXY(105,150);
$pdf->MultiCell(82,5,"Total de Inversión Aprobada: $ ".number_format($tt,2),0,L,0);
	$pdf->SetFont('Arial','B',9);
	
	
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 15;
$pdf->SetXY(11, $newy);
///----------------------------------////

//$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Grafica Inversión-Aprobado.pdf','I');

?>

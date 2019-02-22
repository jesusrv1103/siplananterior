<?php 

session_start(); 
$idproy=$_GET['p'];

if ($idproy!="" and $idproy!="0" and $_SESSION['id_dependencia_v3']!="" ){
//include('../copladez/obras/classes/c_obra.php');
//include('../copladez/obras/classes/c_funciones.php');
//$c=new obras;
//$f=new funciones;
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');


//$res=$c->abrir_obra($id_obra,$_SESSION['id_dependencia_v3']);

function fechames($fechav){
			
			if ($fechav!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechav);
    return $d."-".mes($m)."-".$a;
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



/*if ($res){

}else{
echo '<script type="text/javascript">';
echo 'alert ("Hubo errores");';
echo 'window.close();';
echo 'window.location="main.php?token=c9f0f895fb98ab9159f51fd0297e236d"; ';
echo '</script>';
}*/






//$siplan_data_conn; conexion
class PDF extends FPDF
{
	
	
//Cabecera de página
function Header()
{
$this->SetMargins(3,3);
$this->SetFont('Arial','B',13);
////////////////Logos//////////////////////////////////////////////
$this->Image('logoupla.jpg',5,5,40,10);

$this->SetXY(3,3);
$this->MultiCell(210,5,"COORDINACIÓN ESTATAL DE PLANEACIÓN",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(210,5,"Dirección de Programación",0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(210,5,"Programa Presupuestario de Inversión 2018",0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(3,22);
$this->MultiCell(210,5,"Resumen de Inversión Asignada a Obras por la Dependencia",0,C,0); 



  switch ($_GET['s']){
		   case 1:
		   $status = "Estatus: Sin Aprobar";
		  
		   break;
		   case 2:
		   $status = "Estatus: Aprob. Dependencia";
		 
		   break;
		   case 3:
		   $status = "Estatus: Aprob. COEPLA";
		  
		   break;   
		    case 4:
		   $status = "Estatus: Con Oficio de Ejec.";
		 
		   break; 
	   }
	   
	  


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
$pdf=new PDF('P','mm','letter');  //$pdf=new PDF('L','mm','Legal');  oficio array(215.90,340) 21.59 x 35.56 es del tamaño legal
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true,10);
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
	   

function fechamesyr($fechav){
			
			if ($fechav!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechav);
    return mes($m)."-".$a;
	}else{
		return "No hay";
		}
			
}

 $id_dependencia=$_SESSION['id_dependencia_v3'];
$idproy=$_GET['p'];
/*	   $consulta_obra = mysql_query("SELECT (dependencias.nombre) as nom_dep, sectores.id_sector, sectores.sector, (obras.descripcion) as nom_obra, (proyectos.nombre) as nom_proy, eje.eje, (linea.nombre) as nom_linea, (estrategias.nombre) as nom_estr, municipios.id_municipio, (municipios.nombre) as nom_mun, localidades.id_localidad, (localidades.nombre) as nom_loc, regiones.id_region, (regiones.nombre) as nom_reg, obras.ben_h, obras.ben_m, obras.cantidad, (unidad_medida_prog02.descripcion) as nom_med, obras.fecha_inicio, obras.fecha_fin, (programas_poa.clave) as cvprg, (programas_poa.descripcion) nom_ppoa, (subprogramas_poa.clave) as  cvsprg, (subprogramas_poa.descripcion) as sppoa, obras.obra, (componentes.descripcion) as nom_com,  (origen.c08c_tipori) as nom_origen,origen.s08c_origen, obras.modalidad, obras.retencion, aportes.federal, aportes.estatal, aportes.municipal, aportes.participantes, aportes.credito, aportes.otros, obras.programa, obras.otro_prog,proyectos.id_proyecto,componentes.id_componente,unidad_medida_prog02.id_unidad,subprogramas_poa.id_subprograma_poa,programas_poa.id_programa_poa, obras.ben_h, obras.ben_m, obras.
id_obra,obras.municipio, obras.localidad 
FROM origen INNER JOIN (((programas_poa INNER JOIN (subprogramas_poa INNER JOIN (unidad_medida_prog02  INNER JOIN ((componentes INNER JOIN (sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = proyectos.id_dependencia)) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) ON (proyectos.id_proyecto = componentes.id_proyecto) AND (componentes.id_componente = obras.id_componente)) INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio) ON (unidad_medida_prog02.id_unidad = obras.u_medida) AND (unidad_medida_prog02.id_unidad = obras.u_medida)) ON subprogramas_poa.id_subprograma_poa = obras.subprograma_poa) ON (programas_poa.id_programa_poa = subprogramas_poa.id_programa_poa) AND (programas_poa.id_programa_poa = obras.programa_poa)) INNER JOIN linea ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = linea.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea)) ON origen.s08c_origen = obras.origen INNER JOIN aportes ON obras.id_obra = aportes.id_obra where obras.id_obra=".$id_obra." and obras.id_dependencia=".$id_dependencia."  group by obras.id_obra"  );// or die (mysql_error());


//$res= mysql_fetch_array($consulta_obra);*/
	   
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,28);
$pdf->MultiCell(26,5,"Dependencia:",1,L,0); 
$pdf->SetFont('Arial','',10);
$pdf->SetXY(29,28);
$resultado_dep = mysql_query("SELECT * FROM dependencias WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']) or die (mysql_error());
$res_dep = mysql_fetch_array($resultado_dep);
$pdf->MultiCell(110,5,utf8_decode($res_dep['nombre']),1,L,0); 
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(139,28);
$pdf->MultiCell(15,5,"Sector:",1,L,0); 
$pdf->SetFont('Arial','',10);
$resultado_sec = mysql_query("SELECT * FROM sectores WHERE id_sector = ".$_SESSION['sector_dependencia_v3']) or die (mysql_error());
$res_sec = mysql_fetch_array($resultado_sec);
$pdf->SetXY(154,28);
$pdf->MultiCell(59,5,$res_sec['id_sector']." ".utf8_decode($res_sec['sector']),1,L,0);

$pdf->SetFont('Arial','B',10);

$X = $pdf->GetX();
$Y = $pdf->GetY();
$pdf->SetXY($X,$Y); //3,38
$pdf->MultiCell(20,5,"Programa:",1,L,0); 
$pdf->SetFont('Arial','',10);
$resultado_proy = mysql_query("SELECT * FROM proyectos WHERE id_proyecto = ".$_GET['p']) or die (mysql_error());
$res_proy = mysql_fetch_array($resultado_proy);
$pdf->SetXY(23,$Y);
$pdf->MultiCell(190,5,($res_proy['no_proyecto']." ".utf8_decode($res_proy['nombre'])),1,L,0); 

if ($_GET['s']!=""){
$pdf->SetFont('Arial','B',10);
$X = $pdf->GetX();
$Y = $pdf->GetY();
$pdf->SetXY($X,$Y);

$pdf->MultiCell(25,5,"Componente:",1,L,0);
$pdf->SetXY(28,$Y);
$pdf->SetFont('Arial','',10);
$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
 $resultado_comp = mysql_query("SELECT * FROM componentes WHERE id_proyecto = ".$_GET['p']." and no_componente=".$comp) or die (mysql_error());
$res_comp = mysql_fetch_array($resultado_comp);
$pdf->MultiCell(185,5,($res_comp['no_componente']." ".utf8_decode($res_comp['descripcion'])),1,L,0); 

$pdf->SetFont('Arial','B',10);
$X = $pdf->GetX();
$Y = $pdf->GetY();
$pdf->SetXY($X,$Y);
$pdf->MultiCell(20,5,"Actividad:",1,L,0); 

$pdf->SetXY(23,$Y);
$pdf->SetFont('Arial','',10);
 $resultado_accion = mysql_query("SELECT * FROM acciones WHERE id_componente = ".$res_comp['id_componente']." and no_accion='".$accion."'") or die (mysql_error());
$res_accion = mysql_fetch_array($resultado_accion);
$pdf->MultiCell(190,5,($res_accion['no_accion']." ".utf8_decode($res_accion['descripcion'])),1,L,0); 

}
		
		
		
		$pdf->Ln(10);
$X = $pdf->GetX();
$Y = $pdf->GetY();

$pdf->SetXY($X+13,$Y);

$pdf->SetFont('Arial','B',10);

$pdf->MultiCell(197,5,"Resumen de Inversión Asignada a Obras por la Dependencia",1,C,0);





$pdf->SetFont('Arial','B',10);
$pdf->SetXY($X,$Y);
$pdf->MultiCell(13,5,"No. de Obra",1,C,0);
$pdf->SetXY(16,$Y+5);
$pdf->MultiCell(45,5,"Descripción",1,C,0);
$pdf->SetXY(61,$Y+5);
$pdf->MultiCell(25,5,"Partida",1,C,0);
$pdf->SetXY(86,$Y+5);
$pdf->MultiCell(25,5,"Origen",1,C,0);
$pdf->SetXY(111,$Y+5);
$pdf->MultiCell(25,5,"Aprobación",1,C,0);
$pdf->SetXY(136,$Y+5);
$pdf->MultiCell(25,5,"Ampliaciones",1,C,0);
$pdf->SetXY(161,$Y+5);
$pdf->MultiCell(27,5,"Cancelaciones",1,C,0);
$pdf->SetXY(188,$Y+5);
$pdf->MultiCell(25,5,"Total",1,C,0);
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetY($Y+10);
$pdf->SetWidths(array(13,45,25,25,25,25,27,25));
$pdf->SetAligns(array(C,L,C,C,R,R,R,R));



 if ($_GET['s']==""){
 		  
	$resultado_part = mysql_query("SELECT obras.consxdep, obras.descripcion, poa02_origen.s07c_partid, poa02_origen.s08c_origen, poa02_origen.tipo, obras.id_proyecto,poa02_origen.monto,poa02_origen.id_obra, poa02_origen.s25c_accion,
poa02_origen.s11c_compon FROM poa02_origen INNER JOIN obras ON poa02_origen.id_obra = obras.id_obra
WHERE obras.id_proyecto=".$_GET['p']." and (poa02_origen.s07c_partid BETWEEN 4000 and 4999) or obras.id_proyecto=".$_GET['p']." and (poa02_origen.s07c_partid BETWEEN 6000 and 6999) group by obras.id_obra,poa02_origen.s07c_partid,poa02_origen.s08c_origen,  poa02_origen.s25c_accion   order by  obras.consxdep asc") or die (mysql_error());

 }elseif($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	 
	 
	// echo "SELECT obras.consxdep, obras.descripcion, poa02_origen.s07c_partid, poa02_origen.s08c_origen, poa02_origen.tipo, obras.id_proyecto,poa02_origen.monto,poa02_origen.id_obra FROM poa02_origen INNER JOIN obras ON poa02_origen.id_obra = obras.id_obra
//WHERE obras.id_proyecto=".$_GET['p']." and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion."  group by poa02_origen.id_obra";
//exit();


	 	$resultado_part = mysql_query("SELECT obras.consxdep, obras.descripcion, poa02_origen.s07c_partid, poa02_origen.s08c_origen, poa02_origen.tipo, obras.id_proyecto,poa02_origen.monto,poa02_origen.id_obra FROM poa02_origen INNER JOIN obras ON poa02_origen.id_obra = obras.id_obra
WHERE obras.id_proyecto=".$_GET['p']." and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and (poa02_origen.s07c_partid BETWEEN 4000 and 4999) or obras.id_proyecto=".$_GET['p']." and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and (poa02_origen.s07c_partid BETWEEN 6000 and 6999 )group by obras.id_obra, poa02_origen.s07c_partid, poa02_origen.s08c_origen order by obras.consxdep asc ") or die (mysql_error());
	 }

$ttc=0;
$tt=0;
$pdf->SetFont('Arial','',10);

while( $res_par = mysql_fetch_array($resultado_part)) {

	$idobraa=$res_par['id_obra'];

if($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];


$resultado_apro = mysql_query("SELECT (poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=0 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  (poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=1 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  (poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=2 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());
	
	
	
}else{	


$resultado_apro = mysql_query("SELECT (poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=0 and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  (poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=1 and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  (poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=2 and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

}



 $res_apro = mysql_fetch_array($resultado_apro);
 
 
 $res_amp = mysql_fetch_array($resultado_amp);
 
 
 $res_canc = mysql_fetch_array($resultado_canc);

 $tt=(($res_apro['aprob'])+($res_amp['amp']))-($res_canc['canc']);
 
	$pdf->Row(array($res_par['consxdep'],utf8_decode($res_par['descripcion']),$res_par['s07c_partid'],$res_par['s08c_origen'],"$".number_format($res_apro['aprob'],2),"$".number_format($res_amp['amp'],2),"$".number_format($res_canc['canc'],2),"$".number_format($tt,2) ));
$ttc=$tt+$ttc;

	}
$pdf->SetAligns(array(C,L,C,C,R,R,L,R));
	$pdf->Row(array("","","","","","","Total Inversión","$".number_format($ttc,2) ));




	$pdf->Ln(5); //15

$X = $pdf->GetX();
$Y = $pdf->GetY();
$pdf->SetFont('Arial','B',10);
$pdf->SetXY($X,$Y);
$pdf->MultiCell(210,5,"Resumen de Autorización de Recursos por parte de la SEFIN",1,C,0);

$Y = $pdf->GetY();
$pdf->SetXY($X,$Y);

$pdf->MultiCell(28,5,'  Pres. Asignado',1,C,0);
$X = $pdf->GetX();
$pdf->SetXY($X+28,$Y);
$pdf->MultiCell(28,5,'        Ampliación',1,C,0);
$pdf->SetXY($X+56,$Y);
$pdf->MultiCell(28,5,'Transferencia Ampliacion',1,C,0);
$pdf->SetXY($X+84,$Y);
$pdf->MultiCell(28,5,'         Reducción',1,C,0);
$pdf->SetXY($X+112,$Y);
$pdf->MultiCell(28,5,'Transferencia Reducción',1,C,0);
$pdf->SetXY($X+140,$Y);
$pdf->MultiCell(21,5,'          Partida',1,C,0);
$pdf->SetXY($X+161,$Y);
$pdf->MultiCell(21,5,'          Origen',1,C,0);
$pdf->SetXY($X+182,$Y);
$pdf->MultiCell(28,5,'      Presupuesto',1,C,0);


$pdf->SetWidths(array(28,28,28,28,28,21,21,28));
$pdf->SetAligns(array(R,R,R,R,R,C,C,R));
$pdf->SetFont('Arial','',10);

$sac_proy =mysql_query("SELECT * FROM proyectos WHERE id_proyecto = '$idproy'");// or die (mysql_error());
 $res_proy = mysql_fetch_array($sac_proy);
//echo "SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'";


if($_GET['s']==""){
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' and (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc");// or die (mysql_error());

 }elseif($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion' and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion' and (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc");// or die (mysql_error());
}
$totpresp=0;
$presp=0;

//echo $res_par['id_obra'];

	while( $res_par1 = mysql_fetch_array($consulta_estado_finaciero)) {
//echo $res_par['s07c_partid']."|".$res_par['s08c_origen'];
//$presp=(($res_par['d02p_preasi']+$res_par['d02p_acuamp']+$res_par['d02p_acutam'])-($res_par['d02p_acured']+$res_par['d02p_acutre']));
//if ($_GET['s']==""){
//echo "SELECT  SUM( transferencias.monto ) AS total FROM obras inner join transferencias on obras.id_obra = transferencias.id_obra
// where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." and obras.id_obra=".$res_par['id_obra'];

//echo $res_par['id_obra'];

if ($_GET['s']!=""){
//echo "SELECT  SUM( transferencias.monto ) AS total FROM obras inner join transferencias on obras.id_obra = transferencias.id_obra
// where partida_org='".$res_par1['s07c_partid']."' and org_org='".$res_par1['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." and obras.id_obra=".$idobraa;

 $consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM 

 obras

INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra

INNER JOIN transferencias ON poa02_origen.id_obra_origen = transferencias.id_obra_origen

 where partida_org='".$res_par1['s07c_partid']."' and org_org='".$res_par1['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." 

 and poa02_origen.s25c_accion='".$res_par1['s25c_accion']."'and poa02_origen.s11c_compon='".$res_par1['s11c_compon']."'and poa02_origen.s06c_proyec='".$res_par1['s06c_proyec']."' and tipo=3");

/*"SELECT  SUM( transferencias.monto ) AS total FROM obras inner join transferencias on obras.id_obra = transferencias.id_obra
 where partida_org='".$res_par1['s07c_partid']."' and org_org='".$res_par1['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." and obras.id_obra=".$idobraa);
*/
}else{

//echo "SELECT  SUM( transferencias.monto ) AS total FROM poa02_origen inner join transferencias on poa02_origen.id_obra = transferencias.id_obra
 //where partida_org='".$res_par1['s07c_partid']."' and org_org='".$res_par1['s08c_origen']."' and transferencias.id_proyecto='$idproy'";


//echo "SELECT  SUM( transferencias.monto ) AS total FROM poa02_origen inner join transferencias on poa02_origen.id_obra = transferencias.id_obra
// where partida_org='".$res_par1['s07c_partid']."' and org_org='".$res_par1['s08c_origen']."' and transferencias.id_proyecto='$idproy' and s25c_accion='".$res_par1['s25c_accion'].
//"' s11c_compon='".$res_par1['s11c_compon']."' s06c_proyec='".$res_par1['s06c_proyec']."'        ";


 $consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM poa02_origen inner join transferencias on poa02_origen.id_obra_origen = transferencias.id_obra_origen
 where partida_org='".$res_par1['s07c_partid']."' and org_org='".$res_par1['s08c_origen']."' and transferencias.id_proyecto='$idproy' and s25c_accion='".$res_par1['s25c_accion'].
"' and s11c_compon='".$res_par1['s11c_compon']."' and  s06c_proyec='".$res_par1['s06c_proyec']."'	");  
//$res_tras = mysql_fetch_array($consulta_tras);

//echo  $res_tras['total'];

}
$res_tras = mysql_fetch_array($consulta_tras);

// $res_tras['total'];

$presp=(($res_par1['d02p_preasi']+$res_par1['d02p_acuamp']+$res_par1['d02p_acutam'])-($res_par1['d02p_acured']+($res_par1['d02p_acutre']-$res_tras['total'])));



//$presp-=$res_tras['total'];


	$pdf->Row(array("$".number_format($res_par1['d02p_preasi'],2),"$".number_format($res_par1['d02p_acuamp'],2),"$".number_format($res_par1['d02p_acutam'],2),"$".number_format($res_par1['d02p_acured'],2),"$".number_format(($res_par1['d02p_acutre']-$res_tras['total']),2),$res_par1['s07c_partid'],$res_par1['s08c_origen'],"$".number_format($presp,2) ));



	$totpresp=$presp+$totpresp;

	}
$pdf->SetAligns(array(C,L,C,C,R,R,L,R));
	$pdf->Row(array("","","","","","","Total Presupuesto","$".number_format($totpresp,2) ));
$pdf->Ln(5);

$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$pdf->SetXY($currentx,$currenty);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(210,5,'Recurso disponible sin Asignar  	'.'$'.number_format($totpresp-$ttc,2),0,R,0);




$pdf->Ln(2); 
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx ;
$newy = $currenty+3 ;

$pdf->SetFont('Arial','B',10);
$pdf->SetXY($newx,$newy);
$pdf->MultiCell(210,5,"Resumen del Presupuesto",1,C,0);

$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$X = $currentx ;
$Y = $currenty ;
$pdf->SetXY($X,$Y);

$pdf->MultiCell(30,5,'Partida',1,C,0);
$pdf->SetXY($X+30,$Y);
$pdf->MultiCell(30,5,'Origen',1,C,0);
$pdf->SetXY($X+60,$Y);
$pdf->MultiCell(50,5,'Total Presupuesto',1,C,0);
$pdf->SetXY($X+110,$Y);
$pdf->MultiCell(50,5,'Total Asig. a obras x Dep',1,C,0);
$pdf->SetXY($X+160,$Y);
$pdf->MultiCell(50,5,'Disponible',1,C,0);

$pdf->SetWidths(array(30,30,50,50,50));
$pdf->SetAligns(array(C,C,R,R,R));
$pdf->SetFont('Arial','',10);

if($_GET['s']==""){
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'   and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'   and  (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc");// or die (mysql_error());

 }elseif($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion'  and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion'  and (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc ");// or die (mysql_error());
}

$totpresp=0;
$presp=0;
	while( $res_par = mysql_fetch_array($consulta_estado_finaciero)) {
//echo $res_par['s07c_partid']."|".$res_par['s08c_origen'];
$presp=(($res_par['d02p_preasi']+$res_par['d02p_acuamp']+$res_par['d02p_acutam'])-($res_par['d02p_acured']+$res_par['d02p_acutre']));

if ($_GET['s']!=""){
$consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM 

 obras

INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra

INNER JOIN transferencias ON poa02_origen.id_obra_origen = transferencias.id_obra_origen

 where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." 

 and poa02_origen.s25c_accion='".$res_par['s25c_accion']."'and poa02_origen.s11c_compon='".$res_par['s11c_compon']."'and poa02_origen.s06c_proyec='".$res_par['s06c_proyec']."' and tipo=3");


/*"SELECT  SUM( transferencias.monto ) AS total FROM obras inner join transferencias on obras.id_obra = transferencias.id_obra
 where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." and obras.id_obra=".$idobraa);
*/
}else{


 $consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM poa02_origen inner join transferencias on poa02_origen.id_obra_origen = transferencias.id_obra_origen
 where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and s25c_accion='".$res_par['s25c_accion'].
"' and s11c_compon='".$res_par['s11c_compon']."' and  s06c_proyec='".$res_par['s06c_proyec']."'       ");

}

$res_tras = mysql_fetch_array($consulta_tras);

//$presp=(($res_par['d02p_preasi']+$res_par['d02p_acuamp']+$res_par['d02p_acutam'])-(($res_par['d02p_acured']+$res_par['d02p_acutre'])-$res_tras['total']));


$presp+=$res_tras['total'];



	//$pdf->Row(array("$".number_format($res_par['d02p_preasi'],2),"$".number_format($res_par['d02p_acuamp'],2),"$".number_format($res_par['d02p_acutam'],2),"$".number_format($res_par['d02p_acured'],2),"$".number_format($res_par['d02p_acutre'],2),$res_par['s07c_partid'],$res_par['s08c_origen'],"$".number_format($presp,2) ));
	$totpresp=$presp+$totpresp;
	if($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	

$resultado_apro = mysql_query("SELECT sum(poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' AND poa02_origen.s11c_compon = '$comp' AND poa02_origen.s25c_accion= '$accion' and poa02_origen.tipo=0 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen'] ) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  sum(poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=1 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  sum(poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=2 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());
	
	
	
}else{	
$resultado_apro = mysql_query("SELECT sum(poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=0 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']." and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  sum(poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=1 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']." and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  sum(poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."'	 and poa02_origen.tipo=2 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']." and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

}



 $res_apro = mysql_fetch_array($resultado_apro);
 
 
 $res_amp = mysql_fetch_array($resultado_amp);
 
 
 $res_canc = mysql_fetch_array($resultado_canc);

 $tt=(($res_apro['aprob'])+($res_amp['amp']))-($res_canc['canc']);

	

	$pdf->Row(array($res_par['s07c_partid'],$res_par['s08c_origen'],"$".number_format($presp,2),"$".number_format($tt,2),"$".number_format($presp-$tt,2) ));
$tt=0;
	}


		
		
	




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
	
	$pdf->Output('Datos Obra.pdf','I');
}



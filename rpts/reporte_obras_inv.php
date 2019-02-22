<?php session_start(); 
$xl=$_POST['xls'];
if ($xl=="Exportar XLS"){
header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=pp_2018.xls");
header("Pragma: no-cache");
header("Expires: 0");
}
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");



$prin=$_POST['print'];
$xl=$_POST['xls'];

if ($prin=="Imprimir"){

require('fpdf/fpdf.php');
//$siplan_data_conn; conexion




class PDF extends FPDF
{
	
	
//Cabecera de página
function Header()
{$dep=$_POST['dependencia'];
$sec=$_POST['Sector'];
$reg=$_POST['Region'];
$mun=$_POST['mun'];
$eje=$_POST['Eje'];
$prg=$_POST['Programa'];
$tip=$_POST['Tipo'];
$this->SetMargins(3,3);
$this->SetFont('Arial','B',13);
////////////////Logos//////////////////////////////////////////////
$this->Image('logoupla.jpg',5,5,81,17);

$this->SetXY(3,3);
$this->MultiCell(292,5,"COORDINACIÓN ESTATAL DE PLANEACIÓN",0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(292,5,"Dirección de Programación",0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(292,5,"Programa Presupuestario de Inversión 2018",0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(3,22);
$this->MultiCell(292,5,"Reporte General",0,C,0); 


$this->SetFont('Arial','B',10);
$this->SetXY(3,28);
if ($dep!="0"){
$this->MultiCell(30,5,"Dependencia",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(28,28);

$resultado_dep = mysql_query("SELECT nombre FROM dependencias WHERE id_dependencia = ".$dep) ; // or die (mysql_error());
$res_dep = mysql_fetch_assoc($resultado_dep);
if ($dep!="0"){
$this->MultiCell(115,5,utf8_decode($res_dep['nombre']),0,L,0); 
} }

$this->SetFont('Arial','B',10);
$this->SetXY(143,28);

$resultado_sec = mysql_query("SELECT id_sector,sector FROM sectores WHERE id_sector = ".$sec) ; // or die (mysql_error());
$res_sec = mysql_fetch_assoc($resultado_sec);
if ($sec!="0"){
$this->MultiCell(13,5,"Sector ",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(156,28);

if ($sec!="0"){
$this->MultiCell(8,5,$res_sec['id_sector'],0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(164,28);
$this->MultiCell(60,5,utf8_decode($res_sec['sector']),0,L,0); 
} }
if ($reg!="0"){
$resultado_reg = mysql_query("SELECT id_region, nombre FROM regiones WHERE id_region = ".$reg) ; // or die (mysql_error());
$res_reg = mysql_fetch_assoc($resultado_reg);
$this->SetFont('Arial','B',10);
$this->SetXY(224,28);
$this->MultiCell(14,5,("Region"),0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(238,28);
if ($reg!="0"){
$this->MultiCell(6,5,($res_reg['id_region']),0,L,0); 
$this->SetXY(243,28);
$this->MultiCell(37,5,utf8_decode($res_reg['nombre']),0,L,0); 
}
}
if ($eje!="0"){
$resultado_eje = mysql_query("SELECT eje FROM eje WHERE id_eje = ".$eje) ; // or die (mysql_error());
$res_eje = mysql_fetch_assoc($resultado_eje);
$this->SetFont('Arial','B',10);
$this->SetXY(280,28);
$this->MultiCell(8,5,("Eje"),0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(288,28);
if ($eje!="0"){
$this->MultiCell(40,5,($res_eje['eje']),0,L,0); 
} 
}
if ($prg!="0"){
$this->SetFont('Arial','B',10);
$this->SetXY(143,33);
$this->MultiCell(19,5,("Programa"),0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(162,33);


$resultado_eje = mysql_query("SELECT * FROM programas_poa WHERE id_programa_poa = ".$prg) ; // or die (mysql_error());
$res_eje = mysql_fetch_assoc($resultado_eje);



$this->MultiCell(105,5,($res_eje['clave']." ".$res_eje['descripcion']),0,L,0); 
}

if ($tip!="0"){
$this->SetFont('Arial','B',10);
$this->SetXY(177,33);
$this->MultiCell(16,5,("Estado"),0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(193,33);

if ($tip==1){$tval="Sin Aprobar";}
if ($tip==2){$tval="Aprob. Dependencia";}
if ($tip==3){$tval="Aprob. COEPLA";}
if ($tip==4){$tval="Con Oficio de Ejec.";}
$this->MultiCell(35,5,($tval),0,L,0); 
}



if ($mun!="0"){
$resultado_mun = mysql_query("SELECT * FROM municipios WHERE id_municipio = ".$mun) ; // or die (mysql_error());
$res_mun = mysql_fetch_assoc($resultado_mun);
$this->SetFont('Arial','B',10);
$this->SetXY(230,33);
$this->MultiCell(20,5,("Municipio"),0,L,0); 
$this->SetFont('Arial','',10);
if ($mun!="0"){
$this->SetXY(250,33);
$this->MultiCell(103,5,utf8_decode($res_mun['nombre']),0,L,0); 
}
}

 /* switch ($_GET['s']){
		   case 1:
		   $status = "Estatus: Sin Aprobar";
		  
		   break;
		   case 2:
		   $status = "Estatus: Aprob. Dependencia";
		 
		   break;
		   case 3:
		   $status = "Estatus: Aprob. UPLA";
		  
		   break;   
		    case 4:
		   $status = "Estatus: Con Oficio de Ejec.";
		 
		   break; 
	   }*/

$this->SetXY(288,28);
$this->MultiCell(65,5,($status),0,L,0); 




$this->SetFont('Arial','B',5);




$this->SetXY(3,35);
$this->MultiCell(15,5,'',1,'L',0);

$this->SetXY(18,35);
$this->MultiCell(21,5,'',1,'L',0);
$this->SetXY(39,35);
$this->MultiCell(20,5,'',1,'L',0);
$this->SetXY(59,35);
$this->MultiCell(20,5,'',1,'L',0);
$this->SetXY(79,35);
$this->MultiCell(4,5,'',1,'L',0);
$this->SetXY(83,35);
$this->MultiCell(6,5,'',1,'L',0);
$this->SetXY(89,35);
$this->MultiCell(35,5,'',1,'L',0);
$this->SetXY(124,35);
$this->MultiCell(8,5,'CVE.',1,'C',0);
$this->SetXY(132,35);
$this->MultiCell(15,5,'',1,'L',0);
$this->SetXY(147,35);
$this->MultiCell(8,5,'CVE.',1,'C',0);
$this->SetXY(155,35);
$this->MultiCell(15,5,'',1,'L',0);
$this->SetXY(170,35);


$this->MultiCell(24,5,'FECHA DE: ',1,'C',0);
$this->SetXY(194,35);
$this->MultiCell(82,5,'ESTRUCTURA FINANCIERA 2018 (PESOS) PROGRAMADA',1,'C',0);


$this->SetXY(276,35);
$this->MultiCell(23,5,'METAS TOTALES',1,'C',0);

$this->SetXY(299,35);
$this->MultiCell(16,5,'BENEFICIARIOS',1,'C',0);

$this->SetXY(315,35);
$this->MultiCell(10,5,'PED',1,'C',0);
$this->SetXY(325,35);
$this->MultiCell(6,5,'',1,'L',0);
$this->SetXY(331,35);
$this->MultiCell(8,5,'Incl.',1,'C',0);
$this->SetXY(339,35);
$this->MultiCell(14,5,'Coordenadas',1,'C',0);



$X=3;
$Y=40;
$this->SetXY($X,$Y);

$this->Cell(15,5,'REGION',1,0,'C');

$this->Cell(21,5,'FONDO O MOD. DE INV.',1,0,'C');
$this->Cell(20,5,'PROG.',1,0,'C');
$this->Cell(20,5,'SUB PROG.',1,0,'C');
$this->Cell(4,5,'Prio.',1,0,'C');
$this->Cell(6,5,'TIPO',1,0,'C');
$this->Cell(35,5,'DESCRIPCIÓN DE LA OBRA O ACCIÓN',1,0,'C');
$this->Cell(8,5,'MPIO.',1,0,'C');
$this->Cell(15,5,'MUNICIPIO',1,0,'C');
$this->Cell(8,5,'LOC.',1,0,'C');
$this->Cell(15,5,'LOCALIDAD',1,0,'C');
$this->Cell(12,5,'FECHA INICIO',1,0,'C');
$this->Cell(12,5,'FECHA FIN',1,0,'C');
$this->Cell(12,5,'TOTAL',1,0,'C');
$this->Cell(12,5,'FEDERAL',1,0,'C');
$this->Cell(12,5,'ESTATAL',1,0,'C');
$this->Cell(12,5,'MUNICIPAL',1,0,'C');
$this->Cell(12,5,'PARTICIP.',1,0,'C');
$this->Cell(12,5,'CREDITO',1,0,'C');
$this->Cell(10,5,'OTROS',1,0,'C');
$this->Cell(13,5,'UNID. MEDIDA',1,0,'C');
$this->Cell(10,5,'CANTIDAD',1,0,'C');
$this->Cell(8,5,'HOMB.',1,0,'C');
$this->Cell(8,5,'MUJ.',1,0,'C');
$this->Cell(10,5,'EJ. LÍ. ES.',1,0,'C');
$this->Cell(6,5,'PROG',1,0,'C');
$this->Cell(8,5,'Social',1,0,'C');
$this->Cell(14,5,'Lat. , Lon.',1,0,'C');


$X=30;
$Y=40;


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





$pdf->SetWidths(array(15,21,20,20,4,6,35,8,15,8,15,12,12,12,12,12,12,12,12,10,13,10,8,8,10,6,8,14));
$pdf->SetAligns(array(L,L,L,L,C,C,L,C,L,C,L,C,C,C,C,C,C,C,C,C,L,C,C,C,C,C,C,C));

$id_dependencia = $_SESSION['id_dependencia_v3'];



  
     $dep=$_POST['dependencia'];
    $sec=$_POST['Sector'];
	$reg=$_POST['Region'];
	$eje=$_POST['Eje'];
	$mun=$_POST['mun'];
	$prg=$_POST['Programa'];
$tip=$_POST['Tipo'];

	
	$query="";
	
	
		//dependencias
  if ($dep!="0" ){
 $query=" obras.id_dependencia=".$dep;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($eje!="0"  ){
$query.=" and and proyectos.id_eje=".$eje;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){

if ($tip=="3"){
$query.=" and obras.status_obra>=".$tip;
}else{
$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

}


	//sectores
if ($sec!="0" ){
 $query=" dependencias.id_sector=".$sec;

if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

}


	//regiones
if ($reg!="0" ){
 $query=" regiones.id_region=".$reg;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}
	if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}


	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

}


	//eje acuerdos
if ($eje!="0"  ){
 $query=" proyectos.id_eje=".$eje;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}
	}
	
	//programas
if ($prg!="0"  ){
 $query=" programas_poa.id_programa_poa=".$prg;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;

}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}
	}
	
	//tipo de stayus
if ($tip!="0"  ){

if ($tip=="3"){ 
$query=" obras.status_obra>=".$tip;
}else{

 $query=" obras.status_obra=".$tip;
}

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

	}
	
		//municipio
if ($mun!=0){

 $query=" obras.municipio=".$mun;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

	}
  


if ($query=="" and $dep=="0" and $sec=="0" and 	$reg=="0" and $eje=="0" and $mun=="0" and $prg=="0" and $tip=="0") {



  $consulta_obras = mysql_query("SELECT
obras.tipo_obra,obras.prgs,obras.obra,obras.latitud,obras.longitud,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
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
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") ; // or die (mysql_error());

}

  
 elseif($query!=""  and $eje!="0"  ){
	  $consulta_obras = mysql_query("SELECT
obras.tipo_obra,obras.prgs,obras.obra,obras.latitud,obras.longitud,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
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
 where ".$query." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") ; // or die (mysql_error());
}



elseif ($query!="" and $eje=="0") {

  $consulta_obras = mysql_query("SELECT
obras.tipo_obra,obras.prgs,obras.obra,obras.latitud,obras.longitud,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
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
 where ".$query." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") ; // or die (mysql_error());

}
	   

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


$nn=mysql_num_rows($consulta_obras);




while($row = mysql_fetch_assoc($consulta_obras))

	{
	
	

		$totalp= $row['federal']+$row['estatal']+$row['municipal']+$row['participantes']+$row['credito']+$row['otros'];
 //termina suamr aportes programasdos
 
  //PED*
  $PED=substr($row['nom_estr'],0,6);
  $p1=="";
	$p2=="";
 //PED 
 


$ids = explode(',',$row['prgs']);

     

       if (in_array("0", $ids)) {

		$insc='Si';

}else{

	$insc='No Aplica';

	}
	if ($row['tipo_obra']==1){
	$tpo= "Obra";
	}elseif($row['tipo_obra']==2){
	$tpo= "Acción";
	}

	$pdf->Row(array( $row['id_region'].", ".utf8_decode($row['nom_reg']),$row['nom_origen'],$row['cvprg'].", ".utf8_decode($row['nom_ppoa']),$row['cvsprg'].", ".utf8_decode($row['sppoa']),$row['prioridad'],$tpo,utf8_decode($row['nom_obra']),$row['id_municipio'],utf8_decode($row['nom_muni']),$row['id_finanzas'],utf8_decode($row['nom_loc']),fechamesyr($row['fecha_inicio']),fechamesyr($row['fecha_fin']),number_format($totalp,2),number_format($row['federal'],2),number_format($row['estatal'],2),number_format($row['municipal'],2),number_format($row['participantes'],2),number_format($row['credito'],2),number_format($row['otros'],2),utf8_decode($row['nom_med']),$row['cantidad'],$row['ben_h'],$row['ben_m'],$PED,$row['no_proyecto'],$insc,$row['latitud'].",".$row['longitud']));
		$tt=$tt+$totalp;
	$fd=$fd+$row['federal'];
	$st=$st+$row['estatal'];
	$mn=$mn+$row['municipal'];
	$pt=$pt+$row['participantes'];
	$cr=$cr+$row['credito'];
	$ot=$ot+$row['otros'];
	
	}
	$pdf->SetFont('Arial','B',6);
	$pdf->Row(array("","","","","","","","","","","","","Total",number_format($tt,2),number_format($fd,2),number_format($st,2),number_format($mn,2),number_format($pt,2),number_format($cr,2),number_format($ot,2),"","","","","","","",""));
	
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

	
	$pdf->Output('pp_2018.pdf','I');
	 mysql_close($siplan_data_conn);
}
if ($xl=="Exportar XLS"){
?>

<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<style>
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{mso-footer-data:"&D&\0022Calibri\,Normal\0022&8&P\/&\#";
	margin:.39in .79in .39in .2in;
	mso-header-margin:0in;
	mso-footer-margin:.2in;
	mso-page-orientation:landscape;
	mso-horizontal-page-align:center;}
	
	tr
	{mso-height-source:auto;}
col
	{mso-width-source:auto;}
br
	{mso-data-placement:same-cell;}
.style23
	{mso-number-format:"_-* \#\,\#\#0\.00_-\;\\-* \#\,\#\#0\.00_-\;_-* \0022-\0022??_-\;_-\@_-";
	mso-style-name:Millares;
	mso-style-id:3;}
.style25
	{mso-number-format:"mm\/yy";
	mso-style-name:"Millares \[0\]_14-FORM-0212";}
.style0
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:Normal;
	mso-style-id:0;}
.style19
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal 2";}
.style20
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal 2 2";}
.style26
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal 6";}
.style27
	{mso-number-format:0%;
	mso-style-name:Porcentual;
	mso-style-id:5;}
.font28
	{color:yellow;
	font-size:6.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;}
.font40
	{color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;}
td
	{mso-style-parent:style0;
	padding:0px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:none;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:locked visible;
	white-space:nowrap;
	mso-rotate:0;}
.xl75
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl76
	{mso-style-parent:style0;
	vertical-align:middle;}
.xl77
	{mso-style-parent:style0;
	font-size:7.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl78
	{mso-style-parent:style0;
	font-size:7.0pt;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl79
	{mso-style-parent:style0;
	font-size:7.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl80
	{mso-style-parent:style0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl81
	{mso-style-parent:style0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl82
	{mso-style-parent:style0;
	font-size:9.0pt;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl83
	{mso-style-parent:style0;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl84
	{mso-style-parent:style0;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl85
	{mso-style-parent:style0;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;}
.xl86
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;}
.xl87
	{mso-style-parent:style0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;}
.xl88
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl89
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl90
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl91
	{mso-style-parent:style26;
	color:black;
	font-size:16.0pt;
	font-family:MetaPro-Bold, monospace;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	white-space:normal;}
.xl92
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl93
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl94
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:MetaPro-Bold, monospace;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl95
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	vertical-align:middle;}
.xl96
	{mso-style-parent:style0;
	mso-number-format:0;
	vertical-align:middle;}
.xl97
	{mso-style-parent:style0;
	font-size:12.0pt;
	font-family:MetaPro-Bold, monospace;
	mso-font-charset:0;
	vertical-align:middle;}
.xl98
	{mso-style-parent:style20;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl99
	{mso-style-parent:style19;
	font-weight:700;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl100
	{mso-style-parent:style19;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl101
	{mso-style-parent:style0;
	font-family:"Trebuchet MS", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl102
	{mso-style-parent:style20;
	font-size:16.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl103
	{mso-style-parent:style19;
	font-size:16.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl104
	{mso-style-parent:style0;
	font-size:12.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;}
.xl105
	{mso-style-parent:style20;
	font-size:12.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	white-space:normal;}
.xl106
	{mso-style-parent:style19;
	font-size:11.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;}
.xl107
	{mso-style-parent:style0;
	font-family:PetitaLight;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	vertical-align:middle;}
.xl108
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	white-space:normal;}
.xl109
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl110
	{mso-style-parent:style0;
	color:white;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	background:white;
	mso-pattern:black none;}
.xl111
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl112
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl113
	{mso-style-parent:style0;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl114
	{mso-style-parent:style23;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;}

.xl116
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl117
	{mso-style-parent:style20;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl118
	{mso-style-parent:style20;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl119
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl120
	{mso-style-parent:style20;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl121
	{mso-style-parent:style20;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl122
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl123
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl124
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl125
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl126
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl127
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl128
	{mso-style-parent:style0;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl129
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl130
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl131
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl132
	{mso-style-parent:style26;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl133
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl134
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl135
	{mso-style-parent:style26;
	color:black;
	font-size:14.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl136
	{mso-style-parent:style26;
	color:black;
	font-size:14.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl137
	{mso-style-parent:style26;
	color:black;
	font-size:14.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	white-space:normal;}
.xl138
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl139
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl140
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl141
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mmm\\-yyyy";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl142
	{mso-style-parent:style27;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:Percent;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl143
	{mso-style-parent:style23;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:Percent;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl144
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl145
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;}
.xl146
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;}
.xl147
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl148
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;}
.xl149
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl150
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl151
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl152
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl153
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl154
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl155
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl156
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl157
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl158
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl159
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl160
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl161
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl162
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl163
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl164
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl165
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl166
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl167
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl168
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl169
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;}
.xl170
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt hairline windowtext;}
.xl171
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl172
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl173
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl174
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl175
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	white-space:normal;}
.xl176
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl177
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl178
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl179
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border:.5pt hairline windowtext;}
.xl180
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;}
.xl181
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl182
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl183
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl184
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl185
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl186
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl187
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl188
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl189
	{mso-style-parent:style19;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl190
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000000000;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl191
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000000000;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl192
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl193
	{mso-style-parent:style0;
	font-family:PetitaLight;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl194
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000000000;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl195
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl196
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl197
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl198
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl199
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl200
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl201
	{mso-style-parent:style25;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_-* \#\,\#\#0\.00_-\;\\-* \#\,\#\#0\.00_-\;_-* \0022-\0022??_-\;_-\@_-";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	white-space:normal;}
.xl202
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl203
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl204
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl205
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl206
	{mso-style-parent:style0;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl207
	{mso-style-parent:style0;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;}
.xl208
	{mso-style-parent:style0;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl209
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl210
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl211
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl212
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl213
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;}
.xl214
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;}
.xl215
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl216
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl217
	{mso-style-parent:style0;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl218
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;}
.xl219
	{mso-style-parent:style20;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl220
	{mso-style-parent:style20;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl221
	{mso-style-parent:style20;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;}
.xl222
	{mso-style-parent:style19;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl223
	{mso-style-parent:style20;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl224
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl225
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl226
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl227
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl228
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl229
	{mso-style-parent:style19;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl230
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;}
.xl231
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;}
.xl232
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;}
.xl233
	{mso-style-parent:style26;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl234
	{mso-style-parent:style26;
	color:white;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl235
	{mso-style-parent:style26;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl236
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl237
	{mso-style-parent:style26;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl238
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl239
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl240
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl241
	{mso-style-parent:style26;
	color:black;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl242
	{mso-style-parent:style26;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
	
	.xl115
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-protection:unlocked visible;
	white-space:normal;}

-->
</style>

</head>

<body link=blue vlink=purple class=xl76>

<table border=0 cellpadding=0 cellspacing=0 width=3422 style='border-collapse:
 collapse;table-layout:fixed;width:2578pt'>
 
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=28 height=30 width=3422 style='border-right:.5pt solid black;
  height:22.5pt;width:2578pt' align=left valign=top><![if !vml]><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=28 height=30 class=xl206 width=3422 style='border-right:.5pt solid black;
    height:22.5pt;width:2578pt'><a name="Print_Area">GOBIERNO DEL ESTADO DE
    ZACATECAS</a></td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=28 height=30 class=xl203 style='border-right:.5pt solid black;
  height:22.5pt'>COORDINACIÓN ESTATAL DE PLANEACIÓN</td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=28 height=30 class=xl138 style='border-right:.5pt solid black;
  height:22.5pt'>Programa Presupuestario de Inversión 2018 </td>
 </tr>
 <?php   $dep=$_POST['dependencia'];
$sec=$_POST['Sector'];
$reg=$_POST['Region'];
$eje=$_POST['Eje'];
$prg=$_POST['Programa'];
$tip=$_POST['Tipo'];
$resultado_dep = mysql_query("SELECT * FROM dependencias WHERE id_dependencia = ".$dep) ; // or die (mysql_error());
$res_dep = mysql_fetch_assoc($resultado_dep);
if ($dep!="0"){
$dep1=$res_dep['nombre']; 
}

$resultado_sec = mysql_query("SELECT * FROM sectores WHERE id_sector = ".$sec) ; // or die (mysql_error());
$res_sec = mysql_fetch_assoc($resultado_sec);
if ($sec!="0"){
$sec1=$res_sec['id_sector']." ".$res_sec['sector']; 
}

$resultado_reg = mysql_query("SELECT * FROM regiones WHERE id_region = ".$reg) ; // or die (mysql_error());
$res_reg = mysql_fetch_assoc($resultado_reg);

if ($reg!="0"){
$reg1=$res_reg['id_region']." ".$res_reg['nombre']; 
}

$resultado_eje = mysql_query("SELECT * FROM eje WHERE id_eje = ".$eje) ; // or die (mysql_error());
$res_eje = mysql_fetch_assoc($resultado_eje);

if ($eje!="0"){
$eje1=$res_eje['eje'];
}


$resultado_mun = mysql_query("SELECT * FROM municipios WHERE id_municipio = ".$mun) ; // or die (mysql_error());
$res_mun = mysql_fetch_assoc($resultado_mun);

if ($mun!="0"){
$mun12=$res_mun['nombre'];
}




if ($tip==1){$tval="Sin Aprobar";}
if ($tip==2){$tval="Aprob. Dependencia";}
if ($tip==3){$tval="Aprob. COEPLA";}
if ($tip==4){$tval="Con Oficio de Ejec.";}


?>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl138 style='height:7.5pt'>&nbsp;</td>
  <td colspan=26 class=xl139 style='mso-ignore:colspan'></td>
  <td class=xl196 ></td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td height=30 class=xl197 style='height:22.5pt'>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl199 width=134 style='width:101pt'><?php if ($dep!="0"){ ?>Dependencia<?php } ?></td>
  <td class=xl81 style='border-top:none' width=60 style='width:45pt'><?php echo $dep1; ?></td>
  <td class=xl199 width=100 style='width:75pt'>&nbsp;</td>
  <td class=xl199 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl199 width=100 style='width:75pt'>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198><?php if ($sec!="0"){ ?>Sector<?php } ?></td>
  <td class=xl81 style='border-top:none'><?php echo $sec1; ?></td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198><?php if ($reg!="0"){ ?>Region<?php } ?></td>
  <td class=xl81 style='border-top:none'><?php echo $reg1; ?></td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198><?php if ($eje!="0"){ ?>Eje<?php } ?></td>
  <td class=xl81 style='border-top:none'><?php echo $eje1; ?></td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198><?php if ($prg!="0"){ ?>Programa<?php } ?></td>
  <td class=xl81 style='border-top:none'><?php 
  $resultado_eje = mysql_query("SELECT * FROM programas_poa WHERE id_programa_poa = ".$prg) ; // or die (mysql_error());
$res_eje = mysql_fetch_assoc($resultado_eje);

echo $res_eje['clave']." ".$res_eje['descripcion']; ?></td>
  <td class=xl198><?php if ($tip!="0"){ ?>Estado<?php } ?></td>
  <td class=xl81 style='border-top:none'><?php echo $tval; ?></td>
    <td class=xl198><?php if ($mun!="0"){ ?>Municipio<?php } ?></td>
  <td class=xl81 style='border-top:none'><?php echo $mun12; ?></td>
 </tr>
 
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl77 style='height:7.5pt;border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl75 style='border-top:none'></td>
  <td class=xl81 width=134 style='border-top:none;width:101pt'></td>
  <td class=xl75 width=60 style='border-top:none;width:45pt'>&nbsp;</td>
  <td class=xl75 width=100 style='border-top:none;width:75pt'></td>
  <td class=xl75 width=60 style='border-top:none;width:45pt'></td>
  <td class=xl75 width=100 style='border-top:none;width:75pt'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl75 style='border-top:none'></td>
  <td class=xl81 style='border-top:none'></td>
  <td class=xl78 style='border-top:none'></td>
  <td class=xl75 style='border-top:none'></td>
  <td class=xl81 style='border-top:none'></td>
  <td class=xl80 style='border-top:none'></td>
  <td class=xl75 style='border-top:none'></td>
  <td class=xl81 style='border-top:none'></td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl75 style='border-top:none'></td>
  <td class=xl81 style='border-top:none'></td>
  <td class=xl81 style='border-top:none'></td>
  <td class=xl75 style='border-top:none'></td>
  <td class=xl81 style='border-top:none'></td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
 

 </tr>
 <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
  <td rowspan=3 height=118 class=xl109 width=3422 style='height:88.5pt;
  border-top:none;width:53pt'>SECTOR</td>
  <td rowspan=3 class=xl202 width=70 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt'>REGIÓN</td>
  <td rowspan=3 class=xl109 width=98 style='border-top:none;width:74pt'>DEPENDENCIA</td>
  <td rowspan=3 class=xl109 width=156 style='border-top:none;width:117pt'>FONDO
  O MODALIDAD DE INVERSIÓN</td>
  <td rowspan=3 class=xl109 width=79 style='border-top:none;width:59pt'>PROGRAMA</td>
  <td rowspan=3 class=xl109 width=100 style='border-top:none;width:75pt'>SUBPROGRAMA</td>
   <td rowspan=3 class=xl109 width=134 style='border-top:none;width:101pt'><?php echo utf8_decode(PRIORIZACIÃ“N); ?></td>
       <td rowspan=3 class=xl109 width=134 style='border-top:none;width:101pt'>TIPO</td>
  <td rowspan=3 class=xl109 width=134 style='border-top:none;width:101pt'>DESCRIPCIÓN
  DE LA OBRA O ACCIÓN</td>
  <td rowspan=3 class=xl109 width=60 style='border-top:none;width:45pt'>CLAVE
  DEL MPIO.</td>
  <td rowspan=3 class=xl109 width=100 style='border-top:none;width:75pt'>MUNICIPIO</td>
  <td rowspan=3 class=xl109 width=60 style='border-top:none;width:45pt'>CLAVE
  DE LOC.</td>
  <td rowspan=3 class=xl109 width=100 style='border-top:none;width:75pt'>LOCALIDAD</td>

  <td colspan=2 class=xl213 style='border-left:none'>FECHA DE:<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=7 class=xl214 style='border-left:none'>ESTRUCTURA FINANCIERA 2018
  (PESOS) PROGRAMADA</td>

  <td colspan=2 class=xl109 width=120 style='border-left:none;width:90pt'>METAS
    TOTALES</td>

  <td colspan=2 class=xl109 width=120 style='border-left:none;width:90pt'>BENEFICIARIOS</td>
  <td class=xl109 width=95 style='border-top:none;border-left:none;width:71pt'>PED</td>
  <td rowspan=3 class=xl109 width=60 style='border-top:none;width:45pt'>NUMERO
  DEL PROGRAMA</td>
  <td rowspan=3 class=xl109 width=60 style='border-top:none;width:45pt'><?php echo utf8_decode("ESTRATEGIA DE LA INCLUSIÃ“N SOCIAL"); ?></td>
  <td class=xl214 style='border-left:none'>COORDENADAS GEOGRAFICAS</td>
 </tr>
 <tr class=xl110 height=47 style='mso-height-source:userset;height:35.25pt'>
  <td rowspan=2 height=80 class=xl209 width=70 style='height:60.0pt;border-top:
  none;width:53pt'>INICIO<span style='mso-spacerun:yes'>  </span><font
  class="font28">MMM-AAAA</font></td>
  <td rowspan=2 class=xl209 width=70 style='border-top:none;width:53pt'>TÉRMINO
  <font class="font28">MMM-AAAA</font></td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>TOTAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>FEDERAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>ESTATAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>MUNICIPAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>PARTICIPANTES</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>CRÉDITO</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>OTROS</td>
 
  
  <td rowspan=2 class=xl109 width=206 style='border-top:none;width:65pt'>UNIDAD
  DE MEDIDA</td>
  <td rowspan=2 class=xl109 width=60 style='border-top:none;width:45pt'>PROGRAMADAS</td>
 
  <td rowspan=2 class=xl109 width=120 style='border-top:none;width:45pt'>HOMBRES</td>
  <td rowspan=2 class=xl109 width=60 style='border-top:none;width:45pt'>MUJERES</td>
  <td rowspan=2 class=xl109 width=95 style='border-top:none;width:71pt'>EJE.
  LÍNEA ESTRATÉGICA. ESTRATEGIA</td>
  <td rowspan=2 class=xl215 width=80 style='border-bottom:1.0pt solid black;  border-top:none;width:60pt'>Latitud, Longitud</td>

 </tr>
 <tr class=xl110 height=33 style='mso-height-source:userset;height:24.75pt'>
 </tr>
 <?php
 

 
 
 
     $dep=$_POST['dependencia'];
    $sec=$_POST['Sector'];
	$reg=$_POST['Region'];
    $mun=$_POST['mun'];
	$eje=$_POST['Eje'];
	
	$prg=$_POST['Programa'];
$tip=$_POST['Tipo'];

	
	$query="";
	
	
				//dependencias
  if ($dep!="0" ){
 $query=" obras.id_dependencia=".$dep;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($eje!="0"  ){
$query.=" and and proyectos.id_eje=".$eje;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

}


	//sectores
if ($sec!="0" ){
 $query=" dependencias.id_sector=".$sec;

if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

}


	//regiones
if ($reg!="0" ){
 $query=" regiones.id_region=".$reg;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}
	if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}


	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

}


	//eje acuerdos
if ($eje!="0"  ){
 $query=" proyectos.id_eje=".$eje;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}
	}
	
	//programas
if ($prg!="0"  ){
 $query=" programas_poa.id_programa_poa=".$prg;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

	if ($tip!="0"  ){
if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and .status_obra=".$tip;
}}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}
	}
	
	//tipo de stayus
if ($tip!="0"  ){
if ($tip=="3"){ 
$query =" obras.status_obra>=".$tip;
}else{

 $query=" obras.status_obra=".$tip;
}
if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

if ($mun!="0"  ){
$query.=" and obras.municipio=".$mun;
}

	}
	
		//municipio
if ($mun!=0){

 $query=" obras.municipio=".$mun;

if ($sec!="0"  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0"  ){
$query.=" and regiones.id_region=".$reg;
}
	if ($dep!="0"  ){
$query.=" and obras.id_dependencia=".$dep;
}

	if ($prg!="0"  ){
$query.=" and programas_poa.id_programa_poa=".$prg;
}

if ($eje!="0"  ){
$query.=" and proyectos.id_eje=".$eje;
}

if ($tip!="0"  ){

if ($tip=="3"){ 
$query.=" and obras.status_obra>=".$tip;
}else{

$query.=" and obras.status_obra=".$tip;
}
}

	}
 
 
 
 if ($query=="" and $dep=="0" and $sec=="0" and 	$reg=="0" and $eje=="0" and $mun=="0" and $prg=="0" and $tip=="0") {

  $consulta_obras = mysql_query("
  SELECT
obras.tipo_obra,obras.prgs,obras.obra,obras.latitud,obras.longitud,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
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
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra;
") ; // or die (mysql_error());

}


 elseif($query!=""  and $eje!="0"  ){
	  $consulta_obras = mysql_query("
	  SELECT
obras.tipo_obra,obras.prgs,obras.obra,obras.latitud,obras.longitud,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
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
where ".$query." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") ; // or die (mysql_error());
}



elseif ($query!="" and $eje=="0") {

  $consulta_obras = mysql_query("
  SELECT
obras.tipo_obra,obras.prgs,obras.obra,obras.latitud,obras.longitud,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
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
where ".$query." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") ; // or die (mysql_error());

}
	   

	 
		  
		
		  
		  
		  
		  
		  $tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
		  
		  while($row=@mysql_fetch_assoc($consulta_obras)){
		  
	

 ?>
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl115 width=3422 style='height:12.75pt;width:53pt'><?php echo utf8_decode($row['sector']); ?></td>
  <td class=xl115 width=70 style='border-left:none;width:53pt'><?php echo $row['id_region']." ".utf8_decode($row['nom_reg']); ?></td>
  <td class=xl115 width=98 style='border-left:none;width:74pt'><?php echo $row['nom_dep']; ?></td>
  <td class=xl115 width=156 style='border-left:none;width:117pt'><?php echo $row['nom_origen']; ?></td>
  <td class=xl115 width=79 style='border-left:none;width:59pt'><?php echo $row['cvprg']." ".utf8_decode($row['nom_ppoa']); ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo $row['cvsprg']." ".utf8_decode($row['sppoa']); ?></td>
    <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $row['prioridad']; ?></td>
    
       <td class=xl140 width=60 style='border-left:none;width:45pt'><?php if ($row['tipo_obra']==1){
	echo "Obra";
	}elseif($row['tipo_obra']==2){
	echo "Acción";
	}?></td>
  <td class=xl115 width=134 style='border-left:none;width:101pt'><?php echo utf8_decode($row['nom_obra']); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $row['id_municipio']; ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo utf8_decode($row['nom_muni']); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $row['id_finanzas']; ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo utf8_decode($row['nom_loc']); ?></td>

  <td class=xl141 width=70 style='border-left:none;width:53pt'><?php echo $row['fecha_inicio']; ?></td>
  <td class=xl141 width=70 style='border-left:none;width:53pt'><?php echo $row['fecha_fin']; ?></td>
  <?php 	   

	$totalp= $row['federal']+$row['estatal']+$row['municipal']+$row['participantes']+$row['credito']+$row['otros'];
 //termina suamr aportes programasdos ?>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $totalp;?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $row['federal'];?> </td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $row['estatal']; ?> </td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $row['municipal']; ?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $row['participantes']; ?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $row['credito']; ?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $row['otros']; ?></td>
  

  <td class=xl115 width=206 style='border-left:none;width:65pt'><?php echo utf8_decode($row['nom_med']); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $row['cantidad']; ?></td>

  <td class=xl140 width=120 style='border-left:none;width:45pt'><?php echo $row['ben_h']; ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $row['ben_m'];?></td>
  <td class=xl115 width=95 style='border-left:none;width:71pt'><?php  $PED=substr($row['nom_estr'],0,5); echo $PED; ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $row['no_proyecto']; ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php $ids = explode(',',$row['prgs']);

     

       if (in_array("0", $ids)) {

		$insc='SI';

}else{

	$insc='NO APLICA';

	}  echo $insc;?></td>

    <td class=xl142 width=80 style='border-left:none;width:60pt'><?php if ($row['latitud']!="") { echo $row['latitud'].", ".$row['longitud']; } ?></td>

 </tr>
 
<?php
		$tt=$tt+$totalp;
	$fd=$fd+$row['federal'];
	$st=$st+$row['estatal'];
	$mn=$mn+$row['municipal'];
	$pt=$pt+$row['participantes'];
	$cr=$cr+$row['credito'];
	$ot=$ot+$row['otros'];  }
?>
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl115 width=3422 style='height:12.75pt;width:53pt'></td>
  <td class=xl115 width=70 style='border-left:none;width:53pt'></td>
  <td class=xl115 width=98 style='border-left:none;width:74pt'></td>
  <td class=xl115 width=156 style='border-left:none;width:117pt'></td>
  <td class=xl115 width=79 style='border-left:none;width:59pt'></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'></td>
  <td class=xl115 width=134 style='border-left:none;width:101pt'></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'></td>
    <td class=xl140 width=60 style='border-left:none;width:45pt'></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'></td>

  <td class=xl141 width=70 style='border-left:none;width:53pt'></td>
  <td class=xl141 width=70 style='border-left:none;width:53pt'>Total</td>

  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $tt;?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $fd;?> </td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $st; ?> </td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $mn; ?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $pt; ?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $cr; ?></td>
  <td class=xl201 width=90 style='border-left:none;width:68pt'><?php echo $ot; ?></td>
  

  <td class=xl115 width=206 style='border-left:none;width:65pt'></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'></td>

  <td class=xl140 width=120 style='border-left:none;width:45pt'></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'></td>
  <td class=xl115 width=95 style='border-left:none;width:71pt'></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'></td>

    <td class=xl142 width=80 style='border-left:none;width:60pt'></td>
  <td class=xl143 width=80 style='border-left:none;width:60pt'></td>
 </tr>
</table>

</body>

</html>
<?php }  mysql_close($siplan_data_conn);?>

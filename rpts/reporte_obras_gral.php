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
$this->MultiCell(30,5,"Dependencia",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(33,28);
$resultado_dep = mysql_query("SELECT * FROM dependencias WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']) or die (mysql_error());
$res_dep = mysql_fetch_assoc($resultado_dep);
$this->MultiCell(115,5,utf8_decode($res_dep['nombre']),0,L,0); 
$this->SetFont('Arial','B',10);
$this->SetXY(148,28);

$resultado_sec = mysql_query("SELECT * FROM sectores WHERE id_sector = ".$_SESSION['sector_dependencia_v3']) or die (mysql_error());
$res_sec = mysql_fetch_assoc($resultado_sec);
$this->MultiCell(15,5,"Sector ",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(160,28);
$this->MultiCell(10,5,$res_sec['id_sector'],0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(170,28);
$this->MultiCell(118,5,utf8_decode($res_sec['sector']),0,L,0); 

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
         	   $status = "Estatus: Para Oficio de Ejec.";
        		break;
			 case 5:   
		   $status = "Estatus: Con Oficio de Ejec.";
		    break;
	   }
	  if ($_GET['s']!="" and $_GET['i']!=""){
	  	$status = "Estatus: Aprob. COEPLA & Con Oficio de Ejec.";
	  	$this->SetXY(278,28);
$this->MultiCell(75,5,($status),0,L,0); 
	  	}else{
	   
$this->SetXY(288,28);
$this->MultiCell(65,5,($status),0,L,0); 
}



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



     $opds = array("61", "62", "63", "69", "71", "74", "75", "76","77","78");   
          if (in_array($_SESSION['id_dependencia_v3'], $opds)) {
			  
			  
			  //---------------------------------------------------------------------------
			  if ($_GET['p']=="0" or $_GET['p']=="" ){
	if ($_GET['s']!=""){
	
	if($_GET['i']=="4") {
	$consulta_obras = mysql_query("
	SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
(origen".$_SESSION['id_dependencia_v3'].".c08c_tipori) as nom_origen,
origen".$_SESSION['id_dependencia_v3'].".s08c_origen,
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
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
where  obras.id_dependencia=".$id_dependencia." and obras.status_obra>=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());
}else{
	$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
(origen".$_SESSION['id_dependencia_v3'].".c08c_tipori) as nom_origen,
origen".$_SESSION['id_dependencia_v3'].".s08c_origen,
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
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where  obras.id_dependencia=".$id_dependencia." and obras.status_obra=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());

	}

	 
	 
	}
	else{



	$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
(origen".$_SESSION['id_dependencia_v3'].".c08c_tipori) as nom_origen,
origen".$_SESSION['id_dependencia_v3'].".s08c_origen,
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
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector

where obras.id_dependencia=".$id_dependencia." 

ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());

   }
  }else{
  
  if ($_GET['s']!=""){
  
if($_GET['i']=="4") {
	
$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
(origen".$_SESSION['id_dependencia_v3'].".c08c_tipori) as nom_origen,
origen".$_SESSION['id_dependencia_v3'].".s08c_origen,
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
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where  obras.id_dependencia=".$id_dependencia. " and obras.id_proyecto=".$_GET['p']." and obras.status_obra>=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());
	
	
	}else{
	$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
(origen".$_SESSION['id_dependencia_v3'].".c08c_tipori) as nom_origen,
origen".$_SESSION['id_dependencia_v3'].".s08c_origen,
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
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where  obras.id_dependencia=".$id_dependencia. " and obras.id_proyecto=".$_GET['p']." and obras.status_obra=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());

	}  
  

	
  }else{
  
  
  $consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
(origen".$_SESSION['id_dependencia_v3'].".c08c_tipori) as nom_origen,
origen".$_SESSION['id_dependencia_v3'].".s08c_origen,
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
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
where  obras.id_dependencia=".$id_dependencia." and obras.id_proyecto=".$_GET['p']."  ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());

	}
	
	}
			  
			  
			  //----------------------------------------------------------------------------
			  
		  }else{




 if ($_GET['p']=="0" or $_GET['p']=="" ){
	if ($_GET['s']!=""){
	
	if($_GET['i']=="4") {
	$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
 where  obras.id_dependencia=".$id_dependencia." and obras.status_obra>=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());
}else{



	if ($_GET['s']==5) {

		$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs, 
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
  where  obras.id_dependencia=".$id_dependencia." and obras.status_obra=4 and poa02_origen.id_oficio>=1 and poa02_origen.status_of=2 GROUP BY obras.id_obra ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());



		}

	elseif($_GET['s']==4){

		$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
 where  obras.id_dependencia=".$id_dependencia." and obras.status_obra=4 and poa02_origen.id_oficio<=0 and poa02_origen.status_of=1 GROUP BY obras.id_obra ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());



		

		}

	else{




	$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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

where  obras.id_dependencia=".$id_dependencia." and obras.status_obra=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());
}
	}

	 
	 
	}
	else{



	$consulta_obras = mysql_query("
	SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
where obras.id_dependencia=".$id_dependencia." 

ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());

   
   }
  }else{
  
  if ($_GET['s']!=""){
  
if($_GET['i']=="4") {
	
$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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

where  obras.id_dependencia=".$id_dependencia. " and obras.id_proyecto=".$_GET['p']." and obras.status_obra>=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());
	
	
	}else{


if ($_GET['s']==5) {

		$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
 where  obras.id_dependencia=".$id_dependencia."  and obras.id_proyecto=".$_GET['p']."  and obras.status_obra=4 and poa02_origen.id_oficio>=1 and poa02_origen.status_of=2 GROUP BY obras.id_obra ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());



		}

	elseif($_GET['s']==4){

		$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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

  where  obras.id_dependencia=".$id_dependencia."  and obras.id_proyecto=".$_GET['p']."  and obras.status_obra=4 and poa02_origen.id_oficio<=0 and poa02_origen.status_of=1 GROUP BY obras.id_obra ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());



		

		}

		else{




	$consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
 where  obras.id_dependencia=".$id_dependencia. " and obras.id_proyecto=".$_GET['p']." and obras.status_obra=".$_GET['s']." ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());

	}  
}
  

	
  }else{
  
  
  $consulta_obras = mysql_query("SELECT  obras.tipo_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
where  obras.id_dependencia=".$id_dependencia." and obras.id_proyecto=".$_GET['p']."  ORDER BY obras.id_dependencia, proyectos.no_proyecto, obras.id_obra") or die (mysql_error());

	}
	
	}



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

$result1a=mysql_query($consulta_obras);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_assoc($consulta_obras))

	{
	
	
	
	

	$totalp= $row['federal']+$row['estatal']+$row['municipal']+$row['participantes']+$row['credito']+$row['otros'];
 //termina suamr aportes programasdos
 
  //PED*
  $PED=substr($row['nom_estr'],0,6);
  $p1=="";
	$p2=="";


			   
			   





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
	$pdf->Row(array("","","","","","","","","","","","","Total",number_format($tt,2),number_format($fd,2),number_format($st,2),number_format($mn,2),number_format($pt,2),number_format($cr,2),number_format($ot,2),"","","","","","","","",""));
	
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:


	
	$pdf->Output('Obras_PP_2018.pdf','I');
	mysql_close($siplan_data_conn);

?>

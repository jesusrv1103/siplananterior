<?php session_start();  
date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');
//$siplan_data_con n; conexion
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
$this->MultiCell(292,5,utf8_decode("COORDINACIÃ“N ESTATAL DE PLANEACIÃ“N"),0,C,0); 
$this->SetXY(3,9);
$this->MultiCell(292,5,utf8_decode("DirecciÃ³n de ProgramaciÃ³n"),0,C,0); 
$this->SetXY(3,17);
$this->MultiCell(292,5,"Programa Operativo Anual de Inversión 2017",0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(3,22);
if ($_GET['ap']=="1"){
	$this->MultiCell(292,5,"Resumen de Inversión Aprobada",0,C,0);
	}else{
$this->MultiCell(292,5,"Resumen de Inversión Programada",0,C,0); 
}

$this->SetFont('Arial','B',10);
$this->SetXY(3,28);
$this->MultiCell(30,5,"Dependencia",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(33,28);
$resultado_dep = mysql_query("SELECT * FROM dependencias WHERE acronimo = '".$_GET['dep']."'");// or die (mysql_error());
$res_dep = mysql_fetch_array($resultado_dep);
$this->MultiCell(115,5,utf8_decode($res_dep['nombre']),0,L,0); 
$this->SetFont('Arial','B',10);
$this->SetXY(148,28);

if($_GET['reg']!=""){
	$resultado_sec = mysql_query("SELECT * FROM regiones WHERE id_region = ".$_GET['reg']);// or die (mysql_error());
$res_sec = mysql_fetch_array($resultado_sec);
$this->MultiCell(25,5,"Region ",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(170,28);
$this->MultiCell(10,5,$res_sec['id_region'],0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(180,28);
$this->MultiCell(170,5,utf8_decode($res_sec['nombre']),0,L,0); 
	
	}
	

if($_GET['mp']!=""){
	
	

$resultado_sec = mysql_query("SELECT * FROM municipios WHERE id_municipio = ".$_GET['mp']);// or die (mysql_error());
$res_sec = mysql_fetch_array($resultado_sec);
$this->MultiCell(25,5,"Municipio ",0,L,0); 
$this->SetFont('Arial','',10);
$this->SetXY(170,28);
$this->MultiCell(10,5,$res_sec['id_municipio'],0,C,0); 
$this->SetFont('Arial','',10);
$this->SetXY(180,28);
$this->MultiCell(170,5,utf8_decode($res_sec['nombre']),0,L,0); 

}
  switch ($_GET['s']){
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
	   }

$this->SetXY(288,28);
$this->MultiCell(65,5,($status),0,L,0); 



$this->SetFont('Arial','B',5);

$this->SetXY(3,35);
$this->MultiCell(23,5,'',1,'C',0);

$this->SetXY(26,35);
$this->MultiCell(12,5,'',1,'C',0);

$this->SetXY(38,35);
$this->MultiCell(23,5,'',1,'C',0);

$this->SetXY(61,35);
$this->MultiCell(17,5,'',1,'C',0);

$this->SetXY(78,35);
$this->MultiCell(16,5,'',1,'C',0);

$this->SetXY(94,35);
$this->MultiCell(34,5,'',1,'C',0);

$this->SetXY(128,35);
$this->MultiCell(20,5,'',1,'C',0);

$this->SetXY(148,35);
$this->MultiCell(20,5,'',1,'C',0);

$this->SetXY(168,35);
if ($_GET['ap']=="1"){
$this->MultiCell(125,5,'ESTRUCTURA FINANCIERA 2017 (PESOS) APROBADA',1,'C',0);
}else{
$this->MultiCell(125,5,'ESTRUCTURA FINANCIERA 2017 (PESOS) PROGRAMADA',1,'C',0);	
	}
$this->SetXY(293,35);
$this->MultiCell(25,5,'METAS TOTALES',1,'C',0);
$this->SetXY(318,35);
$this->MultiCell(16,5,'BENEFICIARIOS',1,'C',0);
$this->SetXY(334,35);
$this->MultiCell(10,5,'PED',1,'C',0);
$this->SetXY(344,35);
$this->MultiCell(9,5,'GRAD.',1,'C',0);




$X=3;
$Y=40;
$this->SetXY($X,$Y);



$this->Cell(23,5,'SECTOR.',1,0,'C');
$this->Cell(12,5,'DEP.',1,0,'C');
$this->Cell(23,5,'FONDO O MOD. DE INV.',1,0,'C');
$this->Cell(17,5,'PRG.',1,0,'C');
$this->Cell(16,5,'SUPRG',1,0,'C');
$this->Cell(34,5,'DESCRIPCIÓN DE LA OBRA O ACCIÓN',1,0,'C');
$this->Cell(20,5,'MUNICIPIO',1,0,'C');
$this->Cell(20,5,'LOCALIDAD',1,0,'C');
$this->Cell(20,5,'TOTAL',1,0,'C');
$this->Cell(20,5,'FEDERAL',1,0,'C');
$this->Cell(20,5,'ESTATAL',1,0,'C');
$this->Cell(20,5,'MUNICIPAL',1,0,'C');
$this->Cell(15,5,'PARTICIP.',1,0,'C');
$this->Cell(15,5,'CREDITO',1,0,'C');
$this->Cell(15,5,'OTROS',1,0,'C');
$this->Cell(15,5,'MEDIDA',1,0,'C');
$this->Cell(10,5,'PROG.',1,0,'C');
$this->Cell(8,5,'HOMB.',1,0,'C');
$this->Cell(8,5,'MUJ.',1,0,'C');
$this->Cell(10,5,'E/LÍN/EST',1,0,'C');
$this->Cell(9,5,'MARGI.',1,0,'C');



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





$pdf->SetWidths(array(23,12,23,17,16,34,20,20,20,20,20,20,15,15,15,15,10,8,8,10,9));
$pdf->SetAligns(array(L,C,L,L,L,L,C,C,R,R,R,R,R,R,R,C,C,C,C,C,C));

$id_dependencia = $_SESSION['id_dependencia_v3'];

$ap=$_GET['ap'];
$reg=$_GET['reg'];

 if ($_GET['dep']!="" and $_GET['mp']!="" or $_GET['reg']  ){
	 
	
	$dp=$_GET['dep'];
	if ($ap=='1' and $dp!="mun" and $reg==""){
	  	   $consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
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
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
 where  `dependencias`.`acronimo` = '".$_GET['dep']."'  AND `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` = '4'
	  	     AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  	   GROUP BY `poa02_origen`.`id_obra` ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC");
	  	   
 	  	
	  }elseif($ap=='1' and $dp=="mun") {
	  	
	  	  $consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
localidades.id_marginacion,
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
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
 where  `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` = '4'
	  	     AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  	   GROUP BY `poa02_origen`.`id_obra` ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC");
	  	   
	  
	  
	  	}elseif($ap=='' and $dp=="mun") {
	  		
	  	 $consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
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
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
 where  `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` >= 3
	   ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC ");
	
	  		}
	  		
	  		
	  		elseif($ap=='' and $dp!="mun" and $dp!="reg" and $reg!="") {
	  		
	   $consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
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
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
 where dependencias.acronimo = '".$_GET['dep']."' AND regiones.id_region = ".$_GET['reg']." AND obras.status_obra >= 3
	  	 ORDER BY dependencias.id_dependencia ASC, proyectos.no_proyecto ASC, obras.id_obra ASC");
	   
			}	 
	  		
	  		elseif($ap=='' and $dp=="reg" and $reg!="") {
	  		
	     $consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_marginacion,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
 where regiones.id_region = ".$_GET['reg']." AND obras.status_obra >= 3
	  	 ORDER BY dependencias.id_dependencia ASC, proyectos.no_proyecto ASC, obras.id_obra ASC");
	   

	
	  		}	  	
	  		
	  		elseif($ap=='1' and $dp!="mun" and $dp!="reg" and $reg!="") {
				
	  		$consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
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
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
 where `dependencias`.`acronimo` = '".$_GET['dep']."' AND `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  		 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999  
          OR   `dependencias`.`acronimo` = '".$_GET['dep']."' AND `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  		 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  
          group by obras.id_obra
	  		 ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC");
	  		 
	  		
	  		}
	  		
	  		elseif($ap=='1' and $dp!="mun" and $dp=="reg" and $reg!="") {
				//   AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999   AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN 1000 AND 4999 
	  			$consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
localidades.id_marginacion,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
 where `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
               OR    `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	
               group by obras.id_obra	   
	  			  ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC");
	  			
	  		}	  	
	  		
	  	else {
	  		
	  
	   $consulta_obras=mysql_query("SELECT  obras.prgs,
obras.obra,
obras.id_obra,
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
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
localidades.id_marginacion,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
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
 where `dependencias`.`acronimo` = '".$_GET['dep']."' AND `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` >= 3 
	   ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC");
	
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
	


//$result1a=mysql_query($consulta_obras,$siplan_data_conn);
$nn=mysql_num_rows($consulta_obras);

while($row = mysql_fetch_array($consulta_obras))

	{
	
	
	
	
	   //sumar aporte programados
	   
	   if ($ap==1){
		   
		     $sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$row['id_obra']." AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$row['id_obra']." AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen"); 
	
	
	$totals=0;
	$federal=0;
	$estatal=0;
	$municipal=0;
	$particip=0;
	$credito=0;
	$otros=0;
	$orige_n=0;
	while($res_aporte_eje = mysql_fetch_assoc($sac_aportes_eje))
	{ 
	  $orige_n= substr($res_aporte_eje['s08c_origen'],-4,4);
	 	 
	

	 		 	 if($orige_n=="3102"){

			 $particip= $particip + $res_aporte_eje['sumamonto'];

			}else{ 	

	
	switch($orige_n)
	{
	  case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal + $res_aporte_eje['sumamonto'];
	  break;

	  case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal + $res_aporte_eje['sumamonto'];
	  break;
	  
	  case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal + $res_aporte_eje['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros +  $res_aporte_eje['sumamonto'];
	  break;  
	  
	}

	}
	}

	////termina ejecuciones***
	
	

	
	
		$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$row['id_obra']." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$row['id_obra']." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen");
	
	  $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{ 
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);
	  
	 
	

			 	 if($orige_n=="3102"){

			 $particip= $particip + $res_aporte_amp['sumamonto'];

			}else{ 
		
	switch($orige_n)
	{
	case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal + $res_aporte_amp['sumamonto'];
	  break;

	   case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal + $res_aporte_amp['sumamonto'];
	  break;
	  
	  case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal + $res_aporte_amp['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros +  $res_aporte_amp['sumamonto'];
	  break;  
	  
	}

	}
	}
		
	////termina ampliaciones
	
	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$row['id_obra']." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$row['id_obra']." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen");
	
	
	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{ 
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);
	 	 
	
	 if($orige_n=="3102"){

			 $particip= $particip - $res_aporte_can['sumamonto'];

			}else{
	
	switch($orige_n)
	{
	case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal - $res_aporte_can['sumamonto'];
	  break;

	  case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal - $res_aporte_can['sumamonto'];
	  break;
	  
	 case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal - $res_aporte_can['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros -  $res_aporte_can['sumamonto'];
	  break;  
	  
	}

	}
}
	$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;
		   
		   }
	   else{
	     $suma_prg=$row['federal']+$row['estatal']+$row['municipal']+$row['participantes']+$row['credito']+$row['otros'];
 	$totalp= number_format($suma_prg,2);
   }

 
  //PED*
  $PED=substr($row['nom_estr'],0,6);
  $p1=="";
	$p2=="";
 //PED 
  if ($row['programa']=='1'){
	  $p1='Si';
	   $p2='';}
	  if ($row['programa']=='2'){
	  $p2='Si';
	   $p1='';}
	 
	 
if ($ap==1){



	  $con_fondo="select HIGH_PRIORITY origen.c08c_tipori,origen.s08c_origen, poa02_origen.id_obra, poa02_origen.s08c_origen, poa02_origen.id_obra_origen   

				from poa02_origen inner join origen on poa02_origen.s08c_origen=origen.s08c_origen 

				where poa02_origen.id_obra=".$row['id_obra']." and  poa02_origen.s07c_partid BETWEEN 4000 AND 4999 and  poa02_origen.status_of = 2 AND poa02_origen.id_oficio != 0 

				or 	

				poa02_origen.id_obra=".$row['id_obra']." and  poa02_origen.s07c_partid BETWEEN 6000 AND 6999 and poa02_origen.status_of = 2 AND poa02_origen.id_oficio != 0 

				group by poa02_origen.s08c_origen 

				order by poa02_origen.id_obra_origen";

	

       $consulta_fondo=mysql_query($con_fondo) or die (mysql_error()); 

		$fondo="";

	    while ($re_fondo = mysql_fetch_assoc($consulta_fondo)) {

		$fondo.=$re_fondo['c08c_tipori'].", ";

		}

		$fondo=substr($fondo,0,(strlen($fondo)-2));






	$pdf->Row(array( utf8_decode($row['sector']),utf8_decode($row['nom_dep']),$fondo,utf8_decode($row['prgcv']." ".$row['prgdsc']),utf8_decode($row['subprgcv']." ".$row['subdsc']),utf8_decode($row['nom_obra']),utf8_decode($row['nom_mun']),utf8_decode($row['nom_loc']),number_format($totals,2),number_format($federal,2),number_format($estatal,2),number_format($municipal,2),number_format($particip,2),number_format($credito,2),number_format($otros,2),utf8_decode($row['nom_med']),$row['cantidad'],$row['ben_h'],$row['ben_m'],$PED,grado($row['id_marginacion']) ));
	
	
		$tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	
	}else{
	$pdf->Row(array( utf8_decode($row['sector']),utf8_decode($row['nom_dep']),$row['nom_origen'],utf8_decode($row['prgcv']." ".$row['prgdsc']),utf8_decode($row['subprgcv']." ".$row['subdsc']),utf8_decode($row['nom_obra']),utf8_decode($row['nom_mun']),utf8_decode($row['nom_loc']),$totalp,number_format($row['federal'],2),number_format($row['estatal'],2),number_format($row['municipal'],2),number_format($row['participantes'],2),number_format($row['credito'],2),number_format($row['otros'],2),utf8_decode($row['nom_med']),$row['cantidad'],$row['ben_h'],$row['ben_m'],$PED,grado($row['id_marginacion']) ));
		
		$tt=$tt+$suma_prg;
	$fd=$fd+$row['federal'];
	$st=$st+$row['estatal'];
	$mn=$mn+$row['municipal'];
	$pt=$pt+$row['participantes'];
	$cr=$cr+$row['credito'];
	$ot=$ot+$row['otros'];
		
		}
	
	
	}
	
	 
	$pdf->SetFont('Arial','B',6);
	$pdf->Row(array("","","","","","","","Total",number_format($tt,2),number_format($fd,2),number_format($st,2),number_format($mn,2),number_format($pt,2),number_format($cr,2),number_format($ot,2),"","","","","",""));
	
	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);
$pdf->MultiCell(200,5, 'Total de Obras: '.number_format($nn),0,L,0); // the new x will be the previous x plus the width of multicell:

function grado($gra){
		switch ($gra){
			
			case "1":
			return ("Muy Bajo");
			break;
			case "2":
			return ("Bajo");
			break;
			case "3":
			return ("Medio");
			break;
			case "4":
			return ("Alto");
			break;
			case "5":
			return ("Muy Alto");
			break;
			}
	}
// next cell should appear to the right and at the top of multicell
	//$pdf->SetFont('Arial','I',7);
	
//$pdf->Text(11,198,'Número de Obras: '.$nn);
	//$pdf->Output();
	
	$pdf->Output('Resumen-Inversión.pdf','I');
//cerrar conexion */
	
	 mysql_close($siplan_data_conn);
?>

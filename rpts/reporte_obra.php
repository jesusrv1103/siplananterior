<?php session_start(); 

$id_obra=$_GET['d'];

if ($id_obra!="" and $_SESSION['id_dependencia_v3']!=""){
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
$this->MultiCell(210,5,"Cedula de Información Básica",0,C,0); 



  
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
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,10);
$pdf->SetFont('Arial','',6);




	   $id_dependencia=$_SESSION['id_dependencia_v3'];
$id_obra=$_GET['d'];


if ($_SESSION['id_perfil_v3'] =="1" or $_SESSION['id_perfil_v3'] ==3 or $_SESSION['id_perfil_v3'] ==5){


 $opds = array("61", "62", "63", "69", "71", "74", "75", "76","77","78");
          if (in_array($_SESSION['id_dependencia_v3'], $opds)) {

$consulta_obra = mysql_query("SELECT  obras.tipo_obra,obras.prgs, obras.id_actividad,
componentes.id_componente,
obras.obra,obras.latitud,obras.longitud,
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
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector

 where obras.id_obra=".$id_obra." group by obras.id_obra"  );// or die (mysql_error());
}else{
$consulta_obra = mysql_query("SELECT  obras.tipo_obra,obras.prgs, obras.id_actividad,
componentes.id_componente,
obras.obra,obras.latitud,obras.longitud,
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

 where obras.id_obra=".$id_obra."  group by obras.id_obra"  );// or die (mysql_error());
}



}else{

 $opds = array("61", "62", "63", "69", "71", "74", "75", "76","77","78");
          if (in_array($_SESSION['id_dependencia_v3'], $opds)) {

	   $consulta_obra = mysql_query("
	   SELECT obras.tipo_obra, obras.prgs, obras.id_actividad,
componentes.id_componente,
obras.obra,obras.latitud,obras.longitud,
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
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector

 where obras.id_obra=".$id_obra." and obras.id_dependencia=".$id_dependencia."  group by obras.id_obra"  );// or die (mysql_error());
}else{
$consulta_obra = mysql_query("SELECT obras.tipo_obra, obras.prgs, obras.id_actividad,
componentes.id_componente,
obras.obra,obras.latitud,obras.longitud,
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

 where obras.id_obra=".$id_obra." and obras.id_dependencia=".$id_dependencia."  group by obras.id_obra"  );// or die (mysql_error());
}


}

$res= mysql_fetch_array($consulta_obra);
	   
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,28);
$pdf->MultiCell(28,5,"Dependencia:",0,L,0); 
$pdf->SetFont('Arial','',10);
$pdf->SetXY(31,28);
$pdf->MultiCell(110,5,utf8_decode($res['nom_dep']),0,L,0); 
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(141,28);
$pdf->MultiCell(15,5,"Sector:",0,L,0); 
$pdf->SetFont('Arial','',10);
$pdf->SetXY(156,28);
$pdf->MultiCell(57,5,$res['id_sector']." ".utf8_decode($res['sector']),0,L,0);

$pdf->Line(3, 38, 213, 38);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,38);
$pdf->MultiCell(28,5,"Clave de Obra:",0,L,0); 

$pdf->SetFont('Arial','',10);
$pdf->SetXY(31,38);
$pdf->MultiCell(38,5,$res['obra'],0,C,0); 
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(69,38);
$pdf->MultiCell(13,5,"Obra: ",0,C,0); 
$pdf->SetFont('Arial','',10);
$pdf->SetXY(82,38);
$pdf->MultiCell(132,5,utf8_decode($res['nom_obra']),0,L,0); 


$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(29,5,utf8_decode("PriorizaciÃ³n: "),0,L,0);

$currenty = $pdf->GetY();
$pdf->SetXY(26,$newy);
$newy = $currenty+2 ;
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(10,5,$res['prioridad'],0,L,0);

/*
$currenty = $pdf->GetY();
$newy = $currenty+2 ;

$pdf->SetXY(30,$newy);*/
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(36,45);
$pdf->MultiCell(29,5,utf8_decode("Tipo: "),0,L,0);
/*
$currenty = $pdf->GetY();
$pdf->SetXY(36,$newy);
$newy = $currenty+2 ;*/
$pdf->SetXY(46,45);
$pdf->SetFont('Arial','',10);
if ($res['tipo_obra']==1){
	$tpo= "Obra";
	}elseif($res['tipo_obra']==2){
	$tpo= "Acción";
	}
$pdf->MultiCell(13,5,$tpo,0,L,0);





$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(19,5,"Programa:",0,L,0); 
$pdf->SetFont('Arial','',10);
$pdf->SetXY(22,$newy);
$pdf->MultiCell(191,5,($res['no_proyecto']." ".utf8_decode($res['nom_proy'])),0,L,0); 



$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);
//$pdf->Line(3, 63, 213, 63);
$pdf->SetFont('Arial','B',10);

$pdf->SetXY(3,$newy);
$pdf->MultiCell(25,5,"Componente:",0,L,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(28,$newy);
$pdf->MultiCell(195,5,($res['no_componente']." ".utf8_decode($res['nom_com'])),0,L,0); 

$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);
//$pdf->Line(3, 63, 213, 63);
$pdf->SetFont('Arial','B',10);

$pdf->SetXY(3,$newy);
$pdf->MultiCell(25,5,"Actividad:",0,L,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(28,$newy);

			
	
$pdf->MultiCell(190,5,($res['no_accion']." ".utf8_decode($res['nom_act'])),0,L,0); 




$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(15,5,"Origen:",0,L,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(18,$newy);
$pdf->MultiCell(195,5,$res['s08c_origen']." ".($res['nom_origen']),0,L,0); 

$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(10,5,"Eje:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(13,$newy);
$pdf->MultiCell(70,5,($res['eje']),0,L,0);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(83,$newy);
$pdf->MultiCell(13,5,"Línea:",0,L,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(95,$newy);
     
   $res_consulta_cmp=mysql_query("select * from componentes where id_componente=".$res['id_componente']);
   $dat_consulta_cmp= mysql_fetch_assoc($res_consulta_cmp);
    

   $res_consulta_ln= mysql_query("select * from linea where id_linea=".$dat_consulta_cmp['ped_linea']);
    $dat_consulta_ln= mysql_fetch_assoc($res_consulta_ln);


    $linea=$dat_consulta_ln['nombre'];

$pdf->MultiCell(142,5,utf8_decode($linea),0,L,0);

$currenty = $pdf->GetY();
$newy = $currenty+2 ;

$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(21,5,"Estrategia:",0,L,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(24,$newy);

 $res_consulta_act= mysql_query("select * from acciones where id_accion=".$res['id_actividad']);

       $dat_consulta_act= mysql_fetch_assoc($res_consulta_act);

    

    $res_consulta_str=mysql_query("select * from estrategias where id_estrategia=".$dat_consulta_act['ped']);

     $dat_consulta_str= mysql_fetch_assoc($res_consulta_str);



 $estr=$dat_consulta_str['nombre'];


$pdf->MultiCell(189,5,utf8_decode($estr),0,L,0);

$currenty = $pdf->GetY();
$newy = $currenty+2 ;

$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(21,5,"Municipio:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(24,$newy);

			   
$pdf->MultiCell(60,5,$res['id_municipio']." ".utf8_decode($res['nom_muni']),0,L,0);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(84,$newy);
$pdf->MultiCell(20,5,"Localidad:",0,L,0);



$pdf->SetFont('Arial','',10);
$pdf->SetXY(104,$newy);
$pdf->MultiCell(109,5,$res['id_finanzas']." ".utf8_decode($res['nom_loc']),0,L,0);
$currenty = $pdf->GetY();
$newy = $currenty+2 ;

$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(16,5,"Región:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(17,$newy);
$pdf->MultiCell(45,5,$res['id_region']." ".utf8_decode($res['nom_reg']),0,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(57,$newy);
$pdf->MultiCell(21,5,"Modalidad:",0,L,0);
if ($res['modalidad']=='1'){
	  $v1='Administración';}
	  if ($res['modalidad']=='2'){
	  $v1='Contrato';}
	  if ($res['modalidad']=='3'){
	  $v1='Mixto';}

$pdf->SetFont('Arial','',10);
$pdf->SetXY(76,$newy);
$pdf->MultiCell(28,5,$v1,0,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(106,$newy);
$pdf->MultiCell(21,5,"Retención:",0,L,0);
if ($res['retencion']=='1'){
	  $r1='Ninguna';}
	  if ($res['retencion']=='2'){
	  $r1='Al millar';}
	  if ($res['retencion']=='3'){
	  $r1='5 al millar';}
	    if ($res['retencion']=='4'){
	  $r1='1 y 5 al millar';}
$pdf->SetFont('Arial','',10);
$pdf->SetXY(125,$newy);
$pdf->MultiCell(23,5,$r1,0,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(148,$newy);
$pdf->MultiCell(14,5,"Ben H:",0,L,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(160,$newy);
$pdf->MultiCell(18,5,number_format($res['ben_h']),0,L,0);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(182,$newy);
$pdf->MultiCell(14,5,"Ben M:",0,L,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(194,$newy);
$pdf->MultiCell(19,5,number_format($res['ben_m']),0,L,0);

$currenty = $pdf->GetY();
$newy = $currenty+2 ;

$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(19,5,"Cantidad:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(22,$newy);
$pdf->MultiCell(35,5,number_format($res['cantidad'],2),0,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(57,$newy);
$pdf->MultiCell(35,5,"Unidad de Medida:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(92,$newy);
$pdf->MultiCell(70,5,utf8_decode($res['nom_med']),0,L,0);


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(162,$newy);
$pdf->MultiCell(24,5,utf8_decode("MarginaciÃ³n:"),0,L,0);

$marg= mysql_query("select descripcion from marginacion inner join   localidades on marginacion.id_marginacion=localidades.id_marginacion where localidades.id_municipio=".$res['id_municipio']." and localidades.id_finanzas=".$res['id_finanzas']);
 $marg_t=mysql_fetch_array($marg);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(186,$newy);
$pdf->MultiCell(27,5,utf8_decode($marg_t['descripcion']),0,L,0);


$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(29,5,"Fecha de Inicio:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(32,$newy);
$pdf->MultiCell(24,5, fechames($res['fecha_inicio']),0,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(56,$newy);
$pdf->MultiCell(25,5,"Fecha de Fin:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(81,$newy);
$pdf->MultiCell(24,5,fechames($res['fecha_fin']),0,L,0);
$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(20,5,"Programa:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(23,$newy);
$pdf->MultiCell(190,5,($res['cvprg']." ".utf8_decode($res['nom_ppoa'])),0,L,0);
$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(27,5,"Subprograma:",0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(30,$newy);
$pdf->MultiCell(183,5,($res['cvsprg']." ".utf8_decode($res['sppoa'])),0,L,0);
$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);



$pdf->SetFont('Arial','B',10);

$pdf->SetXY(3,$newy);

$pdf->MultiCell(67,5,utf8_decode("Estrategia de la InclusiÃ³n Social:"),0,L,0);



$pdf->SetFont('Arial','',10);

$pdf->SetXY(60,$newy);

$ids = explode(',',$res['prgs']);

     

       if (in_array("0", $ids)) {

		$insc='Si';

}else{

	$insc='No Aplica';

	}

$pdf->MultiCell(193,5,($insc),0,L,0);

$currenty = $pdf->GetY();

$newy = $currenty+2 ;

$pdf->Line(3, $newy, 213, $newy);


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(47,5,utf8_decode("Coordenas GeogrÃ¡ficas:"),0,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(45,$newy);
$qcoor=mysql_query("select f_convertDDtoDMS(latitud, FALSE) AS lat1,
f_convertDDtoDMS(longitud, TRUE) AS long1 
from obras where id_obra=".$id_obra );
$resco=mysql_fetch_array($qcoor);
$pdf->MultiCell(193,5,($res['latitud'].",".utf8_decode($res['longitud']).utf8_decode(" (".$resco['lat1'].",".$resco['long1'].")")),0,L,0);
$currenty = $pdf->GetY();
$newy = $currenty+2 ;
$pdf->Line(3, $newy, 213, $newy);



$currenty = $pdf->GetY();
$newy = $currenty+5 ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(210,5,"Aportes Programado:",0,C,0);

$currenty = $pdf->GetY();
$newy = $currenty+3 ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(20,$newy);
$pdf->MultiCell(32,5,"Aporte Federal:",1,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(52,$newy);
$pdf->MultiCell(48,5,"$ ".number_format($res['federal'],2),1,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(100,$newy);
$pdf->MultiCell(43,5,"Aporte Participaciones:",1,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(143,$newy);
$pdf->MultiCell(48,5,"$ ".number_format($res['participantes'],2),1,L,0);
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(20,$newy);
$pdf->MultiCell(32,5,"Aporte Estatal:",1,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(52,$newy);
$pdf->MultiCell(48,5,"$ ".number_format($res['estatal'],2),1,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(100,$newy);
$pdf->MultiCell(43,5,"Aporte Crédito:",1,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(143,$newy);
$pdf->MultiCell(48,5,"$ ".number_format($res['credito'],2),1,L,0);
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(20,$newy);
$pdf->MultiCell(32,5,"Aporte Municipal:",1,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(52,$newy);
$pdf->MultiCell(48,5,"$ ".number_format($res['municipal'],2),1,L,0);

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(100,$newy);
$pdf->MultiCell(43,5,"Aporte Otros:",1,L,0);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(143,$newy);
$pdf->MultiCell(48,5,"$ ".number_format($res['otros'],2),1,L,0);

$currenty = $pdf->GetY();
$newy = $currenty+3 ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(210,5,"Total Programado: $ ".number_format(($res['federal']+$res['participantes']+$res['estatal']+$res['credito']+$res['municipal']+$res['otros']),2),0,C,0);

if ($_GET['i']=="1" and $_SESSION['id_dependencia_v3']!="" ){


$currenty = $pdf->GetY();

$newy = $currenty+5 ;

$pdf->SetFont('Arial','B',10);


$currenty = $pdf->GetY();
$newy = $currenty+5 ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(210,5,"Fuente del Recurso:",1,C,0);

$X=3;
$Y=196;
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetXY($X,$newy);

$pdf->Cell(19,5,'Pr/Co/Ac',1,0,'C');
$pdf->Cell(13,5,'Partida',1,0,'C');

$pdf->Cell(60,5,utf8_decode('DescripciÃ³n'),1,0,'C');
$pdf->Cell(13,5,'Origen',1,0,'C');
$pdf->Cell(60,5,utf8_decode('DescripciÃ³n'),1,0,'C');
$pdf->Cell(16,5,'Tipo Mov',1,0,'C');
$pdf->Cell(29,5,'Monto',1,0,'C');

$pdf->SetWidths(array(19,13,60,13,60,16,29));
$pdf->SetAligns(array(C,C,L,C,L,C,R));
$pdf->SetFont('Arial','',8);

  $opds = array("61", "62", "63", "69", "71", "74", "75", "76","77","78");
          if (in_array($_SESSION['id_dependencia_v3'], $opds)) {
$consulta_partidas = mysql_query("SELECT poa02_origen.id_obra, poa02_origen.s07c_partid, partida.c07c_descri, poa02_origen.s08c_origen, origen".$_SESSION['id_dependencia_v3'].".c08c_tipori, poa02_origen.monto,poa02_origen.tipo, poa02_origen.s06c_proyec,poa02_origen.s11c_compon,poa02_origen.s25c_accion
FROM origen".$_SESSION['id_dependencia_v3']." INNER JOIN (partida INNER JOIN poa02_origen ON partida.s07c_partid = poa02_origen.s07c_partid) ON origen".$_SESSION['id_dependencia_v3'].".s08c_origen = poa02_origen.s08c_origen where poa02_origen.id_obra=".$id_obra." and poa02_origen.tipo<=2" );// or die (mysql_error());
}else{
$consulta_partidas = mysql_query("SELECT poa02_origen.id_obra, poa02_origen.s07c_partid, partida.c07c_descri, poa02_origen.s08c_origen, origen.c08c_tipori, poa02_origen.monto,poa02_origen.tipo, poa02_origen.s06c_proyec,poa02_origen.s11c_compon,poa02_origen.s25c_accion
FROM origen INNER JOIN (partida INNER JOIN poa02_origen ON partida.s07c_partid = poa02_origen.s07c_partid) ON origen.s08c_origen = poa02_origen.s08c_origen where poa02_origen.id_obra=".$id_obra." and poa02_origen.tipo<=2" );// or die (mysql_error());	
}

$X=3;
$Y=201;		

$pdf->Ln(5);
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetXY($X,$newy);
$tto=0;
 $ttc=0;
		while( $res_par = mysql_fetch_array($consulta_partidas))

	{
if($res_par['tipo']=="0"){
	$tp="Ejecución";
	$tto=$res_par['monto']+$tto;	
	}
	
	if($res_par['tipo']=="1"){
	$tp="Ampliación";
	$tto=$res_par['monto']+$tto;	
	}
	
	if($res_par['tipo']=="2"){
	$tp="Cancelación";
	$ttc=$res_par['monto']+$ttc;	
	}

	
	$pdf->Row(array($res_par['s06c_proyec']."/".$res_par['s11c_compon']."/".$res_par['s25c_accion'],$res_par['s07c_partid'],$res_par['c07c_descri'],$res_par['s08c_origen'],$res_par['c08c_tipori'],$tp,"$ ".number_format($res_par['monto'],2) ));
	
	
	}
	
		$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY($currentx,$currenty);
	$pdf->SetAligns(array(C,C,L,C,L,C,R));
	$pdf->Row(array("","","","","","Total","$ ".number_format($tto-$ttc,2) ));







$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx ;
$newy = $currenty + 5;

$pdf->SetFont('Arial','B',10);
$pdf->SetXY($newx,$newy);

$pdf->MultiCell(210,5,"Detalle de Oficios:",1,C,0);

$X=3;
$Y=236;
$pdf->SetXY($newx,$newy+5);

$pdf->Cell(35,5,'No. Oficio',1,0,'C');

$pdf->Cell(65,5,'Tipo',1,0,'C');
$pdf->Cell(35,5,'Fecha del Oficio',1,0,'C');
$pdf->Cell(35,5,'Fecha de Activación',1,0,'C');
$pdf->Cell(40,5,'Monto Total',1,0,'C');

$consulta_ofic = mysql_query("SELECT
oficio_aprobacion.no_oficio,
obras.obra,
oficio_aprobacion.tipo,
obras.id_obra,
oficio_aprobacion.fecha_oficio,
oficio_aprobacion.fecha_activo,
oficio_aprobacion.monto_total,
oficio_aprobacion.activo,
oficio_aprobacion.estatus_sefin
FROM
oficio_aprobacion
INNER JOIN detalle_oficio ON detalle_oficio.id_oficio = oficio_aprobacion.id_oficio
INNER JOIN obras ON obras.id_proyecto = detalle_oficio.id_proyecto AND obras.id_obra = detalle_oficio.id_poa02 where obras.id_obra=".$id_obra ) or die (mysql_error());

$pdf->SetWidths(array(35,65,35,35,40));
$pdf->SetAligns(array(C,C,C,C,R));
$pdf->SetFont('Arial','',8);
$pdf->Ln(5);
$suma=0;
while($res_ofi = mysql_fetch_array($consulta_ofic))

	{
  if($res_ofi['tipo']=="0"){
	$tp="Ejecución";
		if ($res_ofi['activo']==1) {
		$suma=$res_ofi['monto_total']+$suma;
			}
	}
	
	if($res_ofi['tipo']=="1"){
	$tp="Ampliación";
		if ($res_ofi['activo']==1) {
		$suma=$res_ofi['monto_total']+$suma;
		}
	}
	
	if($res_ofi['tipo']=="2"){
	$tp="Cancelación";
		if ($res_ofi['activo']==1) {
		$suma=	($suma-$res_ofi['monto_total']);
			}
	}

	 if ($res_ofi['activo']==1) {	
	$pdf->Row(array($res_ofi['no_oficio'],$tp,fechames($res_ofi['fecha_oficio']),fechames($res_ofi['fecha_activo']), "$ ".number_format($res_ofi['monto_total'],2) ));
		}

	}


//$currentx = $pdf->GetX();
//$currenty = $pdf->GetY();
	$pdf->SetFont('Arial','B',10);
	//$pdf->SetXY($currentx,$currenty);
	$pdf->SetAligns(array(C,C,C,C,R));
	$pdf->Row(array("","","","Total","$ ".number_format($suma,2) ));


}

$consulta_tras =mysql_query("SELECT * FROM transferencias where id_obra='".$id_obra."' order by fecha_hora asc");

if (mysql_num_rows($consulta_tras)>=1){

$pdf->AddPage();
//--
$currenty = $pdf->GetY();
$newy = $currenty+3 ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->MultiCell(211,5,"Transferencias:",1,C,0);
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(3,$newy);
$pdf->Cell(70,5,"Origen",1,0,'C');
$pdf->Cell(30,5,"",1,C,0);
$pdf->Cell(70,5,"Destino",1,0,'C');
$pdf->Cell(41,5,"",1,C,0);
$X=3;
$Y=196;
$currenty = $pdf->GetY();
$newy = $currenty+5 ;
$pdf->SetXY($X,$newy);
$pdf->Cell(35,5,'Partida',1,0,'C');
$pdf->Cell(35,5,'Origen',1,0,'C');
$pdf->Cell(30,5,('Monto'),1,0,'C');
$pdf->Cell(35,5,'Partida',1,0,'C');
$pdf->Cell(35,5,('Origen'),1,0,'C');
$pdf->Cell(41,5,'Fecha',1,0,'C');
$pdf->SetWidths(array(35,35,30,35,35,41));
$pdf->SetAligns(array(C,C,R,C,C,L));
$pdf->SetFont('Arial','',8);
$pdf->Ln(5);
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetXY($X,$newy);
$consulta_tras =mysql_query("SELECT * FROM transferencias where id_obra='".$id_obra."' order by fecha_hora asc");
$tottras=0;
        while( $res_tras = mysql_fetch_array($consulta_tras)) {
//$pdf->Row(array($res_tras['partida_org'],$res_tras['org_org'],"$ ".number_format($res_tras['monto'],2),$res_tras['partida_dest'],$res_tras['org_dest'],$res_tras['fecha$
$pdf->Row(array($res_tras['partida_org'],$res_tras['org_org'],"$ ".number_format($res_tras['monto'],2),$res_tras['partida_dest'],$res_tras['org_dest'],$res_tras['fecha_hora'] ));
$tottras+=$res_tras['monto'];
}
$pdf->SetFont('Arial','',10);

 $pdf->Row(array("","Total","$ ".number_format($tottras,2),"","","" ));
}
//--

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







$id_dependencia = $_SESSION['id_dependencia_v3'];






	   

function fechamesyr($fechav){
			
			if ($fechav!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechav);
    return mes($m)."-".$a;
	}else{
		return "No hay";
		}
			
}
		
		
		
		
		
		
	
	
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;



	$pdf->SetFont('Arial','I',10);
	$currentx = $pdf->GetX();
$currenty = $pdf->GetY();
$newx = $currentx + 20;
$newy = $currenty + 5;
$pdf->SetXY(11, $newy);

	
	$pdf->Output('Datos Obra.pdf','I');
}
?>

<?php
include('../seguridad/siplan_connection_db_2016.php');
date_default_timezone_set('America/Mexico_City');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"res_narrativo_proyecto2018.xls\"" );
$id_dep = $_GET['idep'];
$consulta_proyectos = "SELECT  
d.nombre as dependencia,
p.id_proyecto as id_proyecto,
p.no_proyecto as num_proyecto,
p.nombre as nombre,
e.eje as eje,
l.nombre as linea,
s.nombre as estrategia
FROM proyectos  p
inner join dependencias d on(p.id_dependencia = d.id_dependencia)
inner join eje e on(p.id_eje = e.id_eje)
inner join linea l on(p.id_linea = l.id_linea)
inner join estrategias s on(p.id_estrategia = s.id_estrategia)
WHERE p.id_dependencia = ".$id_dep." ORDER BY p.no_proyecto";
$realiza_consulta = @mysql_query($consulta_proyectos,$siplan_data_conn);

while($r=mysql_fetch_array($realiza_consulta)){
	$id_proyecto = $r['id_proyecto'];
	$consulta_indicadores = "SELECT fin_objetivo,proposito_objetivo FROM indicadores_proyecto WHERE id_proyecto = ".$id_proyecto;
	$ex_indicadores_proyecto = mysql_query($consulta_indicadores,$siplan_data_conn) or die (mysql_error());
	$res_ind_pr = mysql_fetch_array($ex_indicadores_proyecto);
	
	$consulta_componentes ="SELECT descripcion from componentes Where id_proyecto = ".$id_proyecto;
	$ex_con_comp = @mysql_query($consulta_componentes,$siplan_data_conn);
	$rowspan_componentes = mysql_num_rows($ex_con_comp);
	$componentes = "";
	$vuelta = 1;
	while($c=mysql_fetch_array($ex_con_comp)){
		if($vuelta == 1){
			$componentes = $componentes."<tr>
   <td colspan='3' rowspan='".utf8_decode($rowspan_componentes)."'>Componentes</td>
   <td colspan='5'>".utf8_decode($c['descripcion'])."</td>
  </tr>";
			
		}else{$componentes = $componentes."<tr>
    <td colspan='5'>".utf8_decode($c['descripcion'])."</td>
  </tr>";}
		
	$vuelta=$vuelta+1;	
	}
  
  $consulta_actividades ="SELECT descripcion from acciones Where id_proyecto = ".$id_proyecto;
	$ex_act_comp = @mysql_query($consulta_actividades,$siplan_data_conn);
	$rowspan_actividades = mysql_num_rows($ex_act_comp);
	$actividades = "";
	$vuelta = 1;
	while($a=mysql_fetch_array($ex_act_comp)){
		if($vuelta == 1){
			$actividades = $actividades."<tr>
   <td colspan='3' rowspan='".$rowspan_actividades."'>Actividades</td>
   <td colspan='5'>".utf8_decode($a['descripcion'])."</td>
  </tr>";
			
		}else{$actividades = $actividades."<tr>
    <td colspan='5'>".utf8_decode($a['descripcion'])."</td>
  </tr>";}
		
	$vuelta=$vuelta+1;	
	}
  
  
print("<table width='100%' border='0' cellspacing='0' cellpadding='1'>
  <tr>
  <td colspan='8'><img src='http://siplan.zacatecas.gob.mx/imagenes/logoupla.png'></td>
 </tr>
 <tr>
  <td colspan='8'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='8'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='8'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='8'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='8'>&nbsp;</td>
 </tr>
  <td colspan='8' bgcolor='#99CC33'>Resumen Narrativo del Programa Presupuestario</td>
  </tr>
  <tr>
    <td colspan='8'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='8' bgcolor='#99CC33'>Datos del Programa Presupuestario</td>
  </tr>
  <tr>
    <td width='12%' bgcolor='#D6D6D6'>Dependencia</td>
    <td width='16%'>".utf8_decode($r['dependencia'])."</td>
    <td width='19%' bgcolor='#D6D6D6'>No. PP</td>
    <td width='5%'>".utf8_decode($r['num_proyecto'])."</td>
    <td width='11%' bgcolor='#D6D6D6'>Programa Presupuestario</td>
    <td colspan='3'>".utf8_decode($r['nombre'])."</td>
  </tr>
  <tr>
    <td colspan='8'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='8' bgcolor='#99CC33'>Alineaci&oacute;n PED</td>
  </tr>
  <tr>
    <td bgcolor='#D6D6D6'>Eje</td>
    <td>".utf8_decode($r['eje'])."</td>
    <td bgcolor='#D6D6D6'>Linea</td>
    <td colspan='2'>".utf8_decode($r['linea'])."</td>
    <td width='8%' bgcolor='#D6D6D6'>Estrategia</td>
    <td width='29%' colspan='2'>".utf8_decode($r['estrategia'])."</td>
  </tr>
  <tr>
    <td colspan='3' bgcolor='#99CC33'>Nivel</td>
    <td colspan='5' bgcolor='#99CC33'>Resumen Narrativo</td>
  </tr>
  <tr>
    <td colspan='3'>Fin</td>
    <td colspan='5'>".utf8_decode($res_ind_pr['fin_objetivo'])."</td>
  </tr>
  <tr>
    <td colspan='3'>Proposito</td>
    <td colspan='5'>".utf8_decode($res_ind_pr['proposito_objetivo'])."</td>
  </tr>".$componentes.$actividades."
  

</table><br>");
	
}
	
?>

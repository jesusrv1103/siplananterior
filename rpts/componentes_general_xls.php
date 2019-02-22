<?php
session_start();
require_once("../seguridad/siplan_connection_db_2016.php");
date_default_timezone_set('America/Mexico_City');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"componentesxProgramaPresupuestario2018.xls\"" );
$consulta_proyecto = "SELECT no_proyecto,nombre FROM proyectos WHERE id_proyecto = ".$_GET['id_proyecto'];
$ejecuta_consulta_proyecto = @mysql_query($consulta_proyecto,$siplan_data_conn);
$resultado_proyecto = mysql_fetch_array($ejecuta_consulta_proyecto); 
$inicio_html = "
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}
.titulo{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
.cabecera{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
table{
	border:solid 1px #666666;
}
td{
	border-right:solid 1px #666;
	border-bottom:solid 1px #666;
}

</style>
<title>Reporte General Actividades</title>
</head>
<body>
<table width='100%' cellspacing='1' cellpadding='4' style='border:0px;'>
  <tr>
    <td  valign='top' style='border:0px;'><span class='titulo'><b>Coordinaci&oacute;n Estatal de Planeaci&oacute;n<br>
      Direcci&oacute;n de Planeaci&oacute;n</b></span><br>
      <span class='cabecera'>
      <b>Dependencia:</b>&nbsp;".$_SESSION["id_dependencia_v3"]."&nbsp;".utf8_decode($_SESSION["nombre_dependencia_v3"])."<br>
      <b>Reporte:</b>&nbsp;Componentes del Programa Presupuestario </span></td>
  </tr>
</table>
<hr>
<p class='titulo'><b>Programa Presupuestario:</b>".$resultado_proyecto ['no_proyecto']."- ".utf8_decode($resultado_proyecto ['nombre'])."</span></p>";
$contenido = "";
$consulta_componentes = "SELECT
componente.id_componente as id,
componente.no_componente as num,
componente.descripcion as nombre,
componente.unidad_responsable as responsable,
u_medida.nombre as unidad,
t_medida.nombre as tipo,
componente.cantidad as cantidad,
componente.ponderacion as ponderacion
From componentes as componente
inner join u_medida_prog01 as u_medida on(componente.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(componente.id_tipo = t_medida.id_tipo_unidad)
Where id_proyecto = ".$_GET['id_proyecto'];
$execute_comp = @mysql_query($consulta_componentes,$siplan_data_conn);
while($res_componentes = mysql_fetch_array($execute_comp)){
$acciones_txt = "";
$consulta_acciones = @mysql_query("select no_accion,descripcion from acciones where id_componente = ".$res_componentes['id'],$siplan_data_conn);
while($res_acciones = mysql_fetch_array($consulta_acciones)){
	$acciones_txt = $acciones_txt."<tr><td colspan='6'>".$res_acciones['no_accion']." - ".utf8_decode($res_acciones['descripcion'])."</td></tr>";
}
$contenido =$contenido."<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='10%' bgcolor='#E3E9D1' >Componente</td>
    <td width='90%'> ".$res_componentes['num']." - ".utf8_decode($res_componentes['nombre'])."</td>
  </tr>
</table>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='14%' bgcolor='#E3E9D1'>Ponderaci&oacute;n</td>
    <td width='8%'>".$res_componentes['ponderacion']."</td>
    <td width='14%' bgcolor='#E3E9D1'>Unidad Responsable </td>
    <td width='64%'>".utf8_decode($res_componentes['responsable'])."</td>
  </tr>
</table>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='15%' bgcolor='#E3E9D1'>Unidad de Medida </td>
    <td width='27%'>".$res_componentes['unidad']."</td>
    <td width='10%' bgcolor='#E3E9D1'>Tipo de Medida </td>
    <td width='25%'>".$res_componentes['tipo']."</td>
    <td width='7%' bgcolor='#E3E9D1'>Cantidad</td>
    <td width='16%'>".$res_componentes['cantidad']."</td>
  </tr>
  <tr>
    <td colspan='6' bgcolor='#D4D0C8'><div align='center'><strong>Actividades</strong></div></td>
  </tr>
      ".$acciones_txt."
</table>
<p>&nbsp;</p>";
}
$full_html = $inicio_html.$contenido."</body></html>";
print($full_html);
?>

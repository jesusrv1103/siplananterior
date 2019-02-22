<?php
session_start();
require_once("../seguridad/siplan_connection_db_2016.php");
date_default_timezone_set('America/Mexico_City');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"accionesxproyecto2018.xls\"" );

$consulta_componente = "SELECT no_componente,descripcion,id_proyecto FROM componentes WHERE id_componente = ".$_GET['id_componente'];
$ejecuta_consulta_componente = @mysql_query($consulta_componente,$siplan_data_conn);
$resultado_componente = mysql_fetch_array($ejecuta_consulta_componente); 

$consulta_proyecto = "SELECT no_proyecto,nombre FROM proyectos WHERE id_proyecto = ".$resultado_componente['id_proyecto'];
$ejecuta_consulta_proyecto = @mysql_query($consulta_proyecto,$siplan_data_conn);
$resultado_proyecto = mysql_fetch_array($ejecuta_consulta_proyecto); 

$consulta_acciones = @mysql_query("SELECT 
accion.id_accion as id,
accion.no_accion as num,
accion.descripcion as nombre,
accion.ponderacion as ponderacion,
accion.cantidad as cantidad,
u_medida.nombre as unidad,
t_medida.nombre as tipo
FROM acciones as accion 
inner join u_medida_prog01 as u_medida on(accion.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(accion.id_tipo = t_medida.id_tipo_unidad)
where id_componente  =".$_GET['id_componente']." ORDER BY accion.no_accion ASC",$siplan_data_conn);

$inicio_html = "
<!doctype html>
<html>
<head>
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
<title>Reporte General Acciones</title>
</head>
<body>
<table width='100%' cellspacing='1' cellpadding='4' style='border:0px;'>
  <tr>
    <td width='71%' valign='top' style='border:0px;'><span class='titulo'><b>Coordinaci&oacute;n Estatal de Planeaci&oacute;n<br>
      Direcci&oacute;n de Planeaci&oacute;n</b></span><br>
      <span class='cabecera'>
      <b>Dependencia:</b>&nbsp;".$_SESSION["id_dependencia_v3"]."&nbsp;".utf8_decode($_SESSION["nombre_dependencia_v3"])."<br>
      <b>Reporte:</b>&nbsp;General Acciones </span></td>
  </tr>
</table>
<hr>
<p><span class='titulo'><b>Componente:</b> ".$resultado_componente['no_componente']."- ".utf8_decode($resultado_componente['descripcion'])."<br />
<b>Programa Presupuestario:</b>".$resultado_proyecto ['no_proyecto']."- ".utf8_decode($resultado_proyecto ['nombre'])."</span></p>";
$contenido="";
while ($res_accion=mysql_fetch_array($consulta_acciones)) {
	$id_accion = $res_accion['id'];
	
	$consulta_metas = @mysql_query("SELECT * FROM metas WHERE id_accion = ".$id_accion,$siplan_data_conn);
	$res_metas = mysql_fetch_array($consulta_metas);
	
	$consulta_resultados = @mysql_query("SELECT * FROM resultados WHERE id_accion = ".$id_accion,$siplan_data_conn);
	$res_resultados = mysql_fetch_array($consulta_resultados);

	
	$contenido=$contenido."<table width='100%'' border='0' cellspacing='0' cellpadding='2'>
  <tr>
    <td bgcolor='#ECF9F1'>Acci&oacute;n:</td>
    <td>".$res_accion['num']." - ".utf8_decode($res_accion['nombre'])."</td>
    <td bgcolor='#ECF9F1'>Ponderaci&oacute;n</td>
    <td>".$res_accion['ponderacion']."</td>
    <td bgcolor='#ECF9F1'>Cantidad</td>
    <td>".$res_accion['cantidad']."</td>
    <td bgcolor='#ECF9F1'>Unidad de Medida </td>
    <td>".$res_accion['unidad']."</td>
    <td bgcolor='#ECF9F1'>Tipo de Medida </td>
    <td>".$res_accion['tipo']."</td>
  </tr>
</table>
<table width='100%' border='0' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='20%' bgcolor='#ECF9F1'>Mes</td>
    <td width='6%' bgcolor='#ECF9F1'>Enero</td>
    <td width='7%' bgcolor='#ECF9F1'>Febrero</td>
    <td width='6%' bgcolor='#ECF9F1'>Marzo</td>
    <td width='6%' bgcolor='#ECF9F1'>Abril</td>
    <td width='6%' bgcolor='#ECF9F1'>Mayo</td>
    <td width='7%' bgcolor='#ECF9F1'>Junio</td>
    <td width='7%' bgcolor='#ECF9F1'>Julio</td>
    <td width='7%' bgcolor='#ECF9F1'>Agosto</td>
    <td width='7%' bgcolor='#ECF9F1'>Septiembre</td>
    <td width='7%' bgcolor='#ECF9F1'>Octubre</td>
    <td width='7%' bgcolor='#ECF9F1'>Noviembre</td>
    <td width='7%' bgcolor='#ECF9F1'>Diciembre</td>
  </tr>
  <tr>
    <td bgcolor='#ECF9F1'>Metas</td>
    <td>".$res_metas['enero_m']."</td>
    <td>".$res_metas['febrero_m']."</td>
    <td>".$res_metas['marzo_m']."</td>
    <td>".$res_metas['abril_m']."</td>
    <td>".$res_metas['mayo_m']."</td>
    <td>".$res_metas['junio_m']."</td>
    <td>".$res_metas['julio_m']."</td>
    <td>".$res_metas['agosto_m']."</td>
    <td>".$res_metas['septiembre_m']."</td>
    <td>".$res_metas['octubre_m']."</td>
    <td>".$res_metas['noviembre_m']."</td>
    <td>".$res_metas['diciembre_m']."</td>
  </tr>
  <tr>
    <td bgcolor='#ECF9F1'>Resultados</td>
    <td>".$res_resultados['enero_r']."</td>
    <td>".$res_resultados['febrero_r']."</td>
    <td>".$res_resultados['marzo_r']."</td>
    <td>".$res_resultados['abril_r']."</td>
    <td>".$res_resultados['mayo_r']."</td>
    <td>".$res_resultados['junio_r']."</td>
    <td>".$res_resultados['julio_r']."</td>
    <td>".$res_resultados['agosto_r']."</td>
    <td>".$res_resultados['septiembre_r']."</td>
    <td>".$res_resultados['octubre_r']."</td>
    <td>".$res_resultados['noviembre_r']."</td>
    <td>".$res_resultados['diciembre_r']."</td>
  </tr>
</table>
<p>&nbsp;<br></p>
";
mysql_free_result($consulta_metas);
unset($res_metas);
mysql_free_result($consulta_resultados);
unset($res_resultados);

}
$full_html = $inicio_html.$contenido."</body></html>";
print($full_html);


?>

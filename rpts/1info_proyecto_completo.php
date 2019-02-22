<?php
session_start();
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("dompdf_config.inc.php");
date_default_timezone_set('America/Mexico_City');
$consulta_proyecto = "SELECT
pr.id_proyecto as id,
pr.no_proyecto as num,
pr.nombre as nombre, 
eje.eje as eje,
linea.nombre as linea,
est.nombre as estrategia,
pr.estatus as estatus,

pr.inversion as inversion,
pr.ponderacion as ponderacion,
pr.unidad_medida as u_medida,
pr.cantidad as prog_anual,
pr.prog_sem as prog_sem,
vul.descripcion as vulnerable,
pr.beneficiarios_m as ben_m,
pr.beneficiarios_h as ben_h,
pr.justificacion as justificacion,
fin.nombre as n_finalidad,
fun.nombre as funcion,
sub.nombre as subfuncion,
pr.proposito as proposito,
pp.clave,
pp.descripcion as programa_presupuestal,
pr.observaciones as observacion
from
proyectos pr
inner join eje on (pr.id_eje = eje.id_eje)
inner join linea on (pr.id_linea = linea.id_linea)
inner join estrategias as est on(pr.id_estrategia = est.id_estrategia)

inner join grupo_vulnerable as vul on(pr.g_vulnerable = vul.id_vulnerable)
inner join finalidad as fin on(pr.finalidad = fin.id_finalidad)
inner join funcion as fun on(pr.funcion = fun.id_funf AND pr.finalidad = fun.id_finalidad)
inner join subfuncion as sub on(pr.subfuncion = sub.id_subfuncion)
left  join programas_presupuestarios as pp on (pr.prog_pres = pp.id)
where id_proyecto = ".$_GET['id_proyecto'];
$ex_con = @mysql_query($consulta_proyecto,$siplan_data_conn);
$res_proyecto = mysql_fetch_assoc($ex_con);
switch($res_proyecto['estatus']){
case 0:
$estatus = "Sin Aprobar";
break;
case 1:
$estatus = "Aprobado Dependencia";
break;
case 2:
$estatus = "Aprobado COEPLA";
break;
}
$consulta_indicador = @mysql_query("SELECT
ind_proy.fin_objetivo as fin_objetivo,
ind_proy.nombre_fin as fin_nombre,
ind_proy.metodo_fin as fin_metodo,
ind_proy.tipo_fin as id_tipo_fin,
tipo_ind_fin.tipo_indicador as tipo_indicador,
ind_proy.dimension_fin  as id_fin_dimension,
dim_fin.dimension as fin_dimension,
ind_proy.frecuencia_fin as id_fin_frecuencia,
frec_fin.frecuencia as fin_frecuencia,
ind_proy.sentido_fin as id_fin_sentido,
sen_fin.sentido as sentido_fin,
ind_proy.u_medida_fin as fin_u_medida,
ind_proy.meta_fin as fin_meta,
ind_proy.proposito_objetivo as proposito_objetivo,
ind_proy.proposito_nombre as proposito_nombre,
ind_proy.proposito_metodo as proposito_metodo,
ind_proy.proposito_tipo as id_proposito_tipo,
tipo_ind_pro.tipo_indicador as proposito_tipo,
ind_proy.proposito_dimension as id_proposito_dimension,
dim_pro.dimension as proposito_dimension,
ind_proy.proposito_frecuencia as id_proposito_frecuencia,
frec_pro.frecuencia as proposito_frecuencia,
ind_proy.proposito_sentido as id_proposito_sentido,
sen_pro.sentido as proposito_sentido,
ind_proy.proposito_unidad_medida as proposito_u_medida,
ind_proy.proposito_meta as proposito_meta,
ind_proy.medio_verifica_fin as medio_verifica_fin,
ind_proy.supuesto_fin as supuesto_fin,
ind_proy.medio_verifica_pro as medio_verifica_pro,
ind_proy.supuesto_pro as supuesto_pro  
from
indicadores_proyecto as ind_proy
inner join tipo_indicador as tipo_ind_fin on(ind_proy.tipo_fin = tipo_ind_fin.id_tipo_indicador)
inner join dimension_indicador as dim_fin on(ind_proy.dimension_fin = dim_fin.id_dimension)
inner join frecuencia_indicador as frec_fin on(ind_proy.frecuencia_fin = frec_fin.id_frecuencia)
inner join sentido_indicador as sen_fin on(ind_proy.sentido_fin = sen_fin.id_sentido)
inner join tipo_indicador as tipo_ind_pro on(ind_proy.proposito_tipo = tipo_ind_pro.id_tipo_indicador)
inner join dimension_indicador as dim_pro on(ind_proy.proposito_dimension = dim_pro.id_dimension)
inner join frecuencia_indicador as frec_pro on(ind_proy.proposito_frecuencia = frec_pro.id_frecuencia)
inner join sentido_indicador as sen_pro on(ind_proy.proposito_sentido = sen_pro.id_sentido)
where id_proyecto  = ".$_GET['id_proyecto'],$siplan_data_conn);
$res_indicador = mysql_fetch_assoc($consulta_indicador);
$fin_meta_ind = $res_indicador['fin_meta'];
$prop_meta_ind = $res_indicador['proposito_meta'];
$inicio_html = "
<!doctype html>
<html>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />

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
<title>Reporte General Proyectos</title>
</head>
<body>
<table width='100%' cellspacing='1' cellpadding='4' style='border:0px;'>
  <tr>
    <td width='29%' valign='middle' style='border:0px;'><img src='logoupla.png' width='309' height='66'></td>
    <td width='71%' valign='top' style='border:0px;'><span class='titulo'><b>Coordinaci&oacute;n Estatal de Planeaci&oacute;n<br>
      Direcci&oacute;n de Planeaci&oacute;n</b></span><br>
      <span class='cabecera'>
      <b>Dependencia:</b>&nbsp;".$_SESSION["id_dependencia_v3"]."&nbsp;".$_SESSION["nombre_dependencia_v3"]."<br>
      <b>Reporte:</b>&nbsp;General Programas Presupuestarios<br>
      <b> Programa Presupuestario 2018<br>
  </tr>
 < /table>
<hr>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='30%''>Programa Presupuestario</td>
    <td width='70%' colspan='3'> ".$res_proyecto['num']." - ".$res_proyecto['nombre']." </td>
  </tr>
  <tr>
    <td>Eje</td>
    <td colspan='3'>".$res_proyecto['eje']."</td>
  </tr>
  <tr>
    <td>Linea</td>
    <td colspan='3'>".$res_proyecto['linea']."</td>
  </tr>
  <tr>
    <td>Estrategia</td>
    <td colspan='3'>".$res_proyecto['estrategia']."</td>
  </tr>
  <tr>
    <td>Estatus</td>
    <td colspan='3'>".$estatus."</td>
  </tr>
  
  
  <tr>
    <td>Ponderación</td>
    <td colspan='3'>".$res_proyecto['ponderacion']."</td>
  </tr>
  <tr>
    <td>Unidad de Medida </td>
    <td colspan='3'>".$res_proyecto['u_medida']."</td>
  </tr>
  <tr>
    <td>Canitdad Anual </td>
    <td>".$res_proyecto['prog_anual']."</td>
    <td>Cantidad Semestral </td>
    <td>".$res_proyecto['prog_sem']."</td>
  </tr>
  <tr>
    <td>Sector Poblacional </td>
    <td colspan='3'>".$res_proyecto['vulnerable']."</td>
  </tr>
  <tr>
    <td>Beneficiarios Hombres </td>
    <td>".$res_proyecto['ben_h']."</td>
    <td>Beneficiarios Mujeres </td>
    <td>".$res_proyecto['ben_m']."</td>
  </tr>
  <tr>
    <td>Diagnóstico</td>
    <td colspan='3'>".$res_proyecto['justificacion']."</td>
  </tr>
  <tr>
    <td>Propósito</td>
    <td colspan='3'>".$res_proyecto['proposito']."</td>
  </tr>
  <tr>
    <td>Finalidad</td>
    <td colspan='3'>".$res_proyecto['n_finalidad']."<br>".$res_proyecto['d_finalidad']."</td>
  </tr>
  <tr>
    <td>Función</td>
    <td colspan='3'>".$res_proyecto['funcion']."</td>
  </tr>
  <tr>
    <td>Subfunción</td>
    <td colspan='3'>".$res_proyecto['subfuncion']."</td>
  </tr>
  <tr>
    <td>Clasificación Programática</td>
    <td colspan='3'>".$res_proyecto['clave']. " - ".$res_proyecto['programa_presupuestal']."</td>
  </tr>
  <tr>
    <td>Observaciones</td>
    <td colspan='3'>".$res_proyecto['observacion']."</td>
  </tr>
</table>
<hr>
<h3>Detalles del Indicador</h3>
<table width='100%' cellspacing='0' cellpadding='2' style='border:solid 1px #ccc;'>
  <tr bgcolor='#D2EECA'>
    <td colspan='5'><div align='center'><h3>Resultados</h3></div></td>
  </tr>
  <tr bgcolor='#E8EDE9'>
    <td rowspan='2'><b><div align='center'>NIVEL</div></b></td>
    <td rowspan='2'><b><div align='center'>OBJETIVOS</div></b></td>
    <td><b><div align='center'>INDICADORES</div></b></td>
    <td rowspan='2'><b><div align='center'>MEDIOS DE VERIFICACI&Oacute;N</div></b></td>
    <td rowspan='2'><b><div align='center'>SUPUESTOS</div></b></td>
  </tr>
  <tr bgcolor='#E8EDE9'>
    <td><b><span style='font-size: 9px;'>Denominaci&oacute;n-M&eacute;todo de c&aacute;lculo-Tipo-Dimensi&oacute;n-Frecuencia-Sentido-Meta anual</span></b></td>
  </tr>
  <tr>
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;'>Fin</td>
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;' valign='top'>".$res_indicador['fin_objetivo']."</td>
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;'>
    	<b>Nombre:</b><br>".$res_indicador['fin_nombre']."<br>
    	<b>M&eacute;todo de c&aacute;lculo:</b><br>".$res_indicador['fin_metodo']."<br>
    	<b>Tipo:</b>&nbsp;".$res_indicador['tipo_indicador']."<br>
    	<b>Dimensi&oacute;n:</b>&nbsp;".$res_indicador['fin_dimension']."<br>
    	<b>Frecuencia:</b>&nbsp;".$res_indicador['fin_frecuencia']." 
    		<br>
        <b>Sentido:</b>&nbsp;".$res_indicador['sentido_fin']."
    	
	<br>
      <b>  Unidad de Medida:</b>&nbsp;".$res_indicador['fin_u_medida']."<br>
        <b>Meta Anual:</b>&nbsp;&nbsp;".$fin_meta_ind."
    </td>
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;' valign='top'>".$res_indicador['medio_verifica_fin']."</td>
    <td style='border-bottom: solid 1px #ccc;' valign='top'>".$res_indicador['supuesto_fin']."</td>
  </tr>
  <tr>
    <td style='border-right:solid 1px #ccc;'>Prop&oacute;sito</td>
    <td style='border-right:solid 1px #ccc;' valign='top'>".$res_indicador['proposito_objetivo']."</td>
    <td style='border-right:solid 1px #ccc;' valign='top'><b>Nombre:</b><br>".$res_indicador['proposito_nombre']."<br>
    	<b>M&eacute;todo de c&aacute;lculo:</b><br>".$res_indicador['proposito_metodo']."<br>
    	<b>Tipo: </b>&nbsp;".$res_indicador['proposito_tipo']."<br>
    	<b>Dimensi&oacute;n:</b>&nbsp;".$res_indicador['proposito_dimension']."<br>
    	<b>Frecuencia:</b>&nbsp;".$res_indicador['proposito_frecuencia']."<br>
        <b>Sentido:</b>&nbsp;".$res_indicador['proposito_sentido']."<br>
        <b>Unidad de Medida:</b>&nbsp;".$res_indicador['proposito_u_medida']."<br>
        <b>Meta Anual:&nbsp;".$prop_meta_ind."</td>
    <td style='border-right:solid 1px #ccc;' valign='top'>".$res_indicador['medio_verifica_pro']."</td>
    <td valign='top'>".$res_indicador['supuesto_pro']."</td>
  </tr>
</table>
<hr>
<h3>Componentes y Actividades</h3>"; 
$contenido = "";
$consulta_componentes = "SELECT
componente.id_componente as id,
componente.no_componente as num,
componente.descripcion as nombre,
componente.unidad_responsable as responsable,
u_medida.nombre as unidad,
t_medida.nombre as tipo,
componente.cantidad as cantidad,
componente.ponderacion as ponderacion,
pp.clave as clave_presupuestal_com,
pp.descripcion as programa_presupuestal_com,
est.nombre as ped
From componentes as componente
inner join u_medida_prog01 as u_medida on(componente.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(componente.id_tipo = t_medida.id_tipo_unidad)
left  join programas_presupuestarios as pp on (componente.prog_pres = pp.id)
left join estrategias as est on (componente.ped_estrategia = est.id_estrategia)
Where id_proyecto = ".$_GET['id_proyecto'];
$execute_comp = @mysql_query($consulta_componentes,$siplan_data_conn);
while($res_componentes = mysql_fetch_array($execute_comp)){
$consulta_acciones = @mysql_query("SELECT 
accion.id_accion as id,
accion.no_accion as num,
accion.descripcion as nombre,
accion.ponderacion as ponderacion,
accion.cantidad as cantidad,
u_medida.nombre as unidad,
t_medida.nombre as tipo,
est.nombre as ped_ac
FROM acciones as accion 
inner join u_medida_prog01 as u_medida on(accion.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(accion.id_tipo = t_medida.id_tipo_unidad)
inner join estrategias as est on (accion.ped = est.id_estrategia)
where id_componente  =".$res_componentes['id']." ORDER BY accion.no_accion DESC",$siplan_data_conn);
$acciones_txt="";
while ($res_accion=mysql_fetch_array($consulta_acciones)) {
	$id_accion = $res_accion['id'];
	$consulta_metas = @mysql_query("SELECT * FROM metas WHERE id_accion = ".$id_accion,$siplan_data_conn);
	$res_metas = mysql_fetch_array($consulta_metas);
	$consulta_resultados = @mysql_query("SELECT * FROM resultados WHERE id_accion = ".$id_accion,$siplan_data_conn);
	$res_resultados = mysql_fetch_array($consulta_resultados);
	$acciones_txt=$acciones_txt."  

<table width='100%' border='1' cellspacing='0' cellpadding='2'>
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
<table width='100%'' border='1' cellspacing='0' cellpadding='2'>
  <tr>    
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
<table width='100%'' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='5%'bgcolor='#ECF9F1'>PED</td>
    <td width='5%'>".substr($res_accion['ped_ac'],0,5)."</td>
    <td width='10%'bgcolor='#ECF9F1'>Actividad</td>
    <td width='80%'>".$res_accion['num']." - ".$res_accion['nombre']."</td>
  </tr>
</table>
";
mysql_free_result($consulta_metas);
unset($res_metas);
mysql_free_result($consulta_resultados);
unset($res_resultados);
}
$contenido =$contenido."<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td colspan='6' bgcolor='#D4D0C8'><div align='center'><strong>Componente</strong></div></td>
  </tr>
</table>  
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='10%' bgcolor='#E3E9D1' >PED</td>
    <td width='10%'> ".substr($res_componentes['ped'],0,5)."</td>
    <td width='20%' bgcolor='#E3E9D1' >Clasificación Programática</td>
    <td width='50%'> ".$res_componentes['clave_presupuestal_com']." - ".$res_componentes['programa_presupuestal_com']."</td>
  </tr>
</table>  
<table width='100%' border='1' cellspacing='0' cellpadding='2'>  
  <tr>
    <td width='10%' bgcolor='#E3E9D1' >Componente</td>
    <td width='90%'> ".$res_componentes['num']." - ".$res_componentes['nombre']."</td>
  </tr>
</table>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='14%' bgcolor='#E3E9D1'>Ponderacion</td>
    <td width='8%'>".$res_componentes['ponderacion']."</td>
    <td width='14%' bgcolor='#E3E9D1'>Unidad Responsable </td>
    <td width='64%'>".$res_componentes['responsable']."</td>
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
<hr>";
}
$titutlo_pdf ="Reporte del Programa Presupuestario: ". $res_proyecto['num']." - ".$res_proyecto['nombre'];
$full_html = $inicio_html.$contenido."</table></body></html>";
$dompdf = new DOMPDF();
$dompdf->load_html($full_html);
$dompdf->set_paper("legal","landscape");
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$canvas->page_text(20, 585, "$titutlo_pdf: Pag {PAGE_NUM} de {PAGE_COUNT}",$font, 7, array(0,0,0));
$canvas->page_text(450, 585, "Fecha del reporte: ".date('d-m-Y | h:i:s a'),$font, 7, array(0,0,0));
$dompdf->stream($titutlo_pdf,array("Attachment" => 0));

?>

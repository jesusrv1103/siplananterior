<?php
session_start();
require_once("../seguridad/siplan_connection_db.php");
date_default_timezone_set('America/Mexico_City');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"indicadorxproyecto.xls\"" );
$consulta_proyecto = @mysql_query("SELECT nombre,no_proyecto FROM proyectos WHERE id_proyecto = ".$_GET['id_proyecto'],$siplan_data_conn);
$res_proyecto = mysql_fetch_array($consulta_proyecto);

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
$html = "
<!doctype html>
<html>
<head>
<meta charset='iso-8859-1'>
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
<title>Reporte Indicador de Proyecto</title>
</head>
<body>
<table width='100%' cellspacing='1' cellpadding='4' style='border:0px;'>
  <tr>
    <td width='71%' valign='top' style='border:0px;'><span class='titulo'><b>Coordinación Estatal de Planeación<br>
      Dirección de Programación</b></span><br>
      <span class='cabecera'>
      <b>Dependencia:</b>&nbsp;&nbsp;".$_SESSION["id_dependencia_v3"]." - ".$_SESSION["nombre_dependencia_v3"]."<br>
      <b>Reporte:</b>&nbsp;General Proyectos<br>
  </tr>
</table>
<hr>
<p><h3>Proyecto:&nbsp;&nbsp; ". $res_proyecto['no_proyecto']." - ".$res_proyecto['nombre']."</h3>
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
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;'><b>Fin</b></td>
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;'>".$res_indicador['fin_objetivo']."</td>
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;'>
    	<b>Nombre:</b><br>".$res_indicador['fin_nombre']."<br>
    	<b>M&eacute;todo de c&aacute;lculo:</b><br>".$res_indicador['fin_metodo']."<br>
    	<b>Tipo:</b>&nbsp;".$res_indicador['tipo_indicador']."<br>
    	<b>Dimensi&oacute;n:</b>&nbsp;".$res_indicador['fin_dimension']."<br>
    	<b>Frecuencia:</b>&nbsp;".$res_indicador['fin_frecuencia']."<br>
        <b>Sentido:</b>&nbsp;".$res_indicador['sentido_fin']."<br>
        <b>Unidad de Medida:</b>&nbsp;".$res_indicador['fin_u_medida']."<br>
        <b>Meta Anual:</b> &nbsp;".$res_indicador['fin_meta']."
    </td>
    <td style='border-bottom: solid 1px #ccc; border-right:solid 1px #ccc;'>".$res_indicador['medio_verifica_fin']."</td>
    <td style='border-bottom: solid 1px #ccc;'>".$res_indicador['supuesto_fin']."</td>
  </tr>
  <tr>
    <td style='border-right:solid 1px #ccc;'>Prop&oacute;sito</td>
    <td style='border-right:solid 1px #ccc;'>".$res_indicador['proposito_objetivo']."</td>
    <td style='border-right:solid 1px #ccc;'><b>Nombre:</b><br>".$res_indicador['proposito_nombre']."<br>
    	<b>M&eacute;todo de c&aacute;lculo:</b><br>".$res_indicador['proposito_metodo']."<br>
    	<b>Tipo: </b>&nbsp;
    		 
    		".$res_indicador['proposito_tipo']
    	."<br>
    	<b>Dimensi&oacute;n:</b>&nbsp;".
    	$res_indicador['proposito_dimension']
    		."<br>
    	<b>Frecuencia:</b>&nbsp; 
    	".$res_indicador['proposito_frecuencia']."<br>
        <b>Sentido: </b>&nbsp;
        ".$res_indicador['proposito_sentido']
    		."<br>
        <b>Unidad de Medida: </b>&nbsp;".$res_indicador['proposito_u_medida']."<br>
        <b>Meta Anual:</b>&nbsp;".$res_indicador['proposito_meta']."</td>
    <td style='border-right:solid 1px #ccc;'>".$res_indicador['medio_verifica_pro']."</td>
    <td>".$res_indicador['supuesto_pro']."</td>
  </tr>

</table>
	
";


$full_html = $html."</body></html>";
print($full_html);
?>

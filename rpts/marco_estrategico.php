<?php

require_once("../seguridad/siplan_connection_db_2016.php");
require_once("dompdf_config.inc.php");
date_default_timezone_set('America/Mexico_City');
session_start();


$consulta = mysql_query("SELECT * FROM marco_estrategico WHERE id_dependencia = ".$_SESSION["id_dependencia_v3"],$siplan_data_conn) or die (mysql_error());
$resultado = mysql_fetch_assoc($consulta,MYSQL_BOTH);

$inicio_html = "
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<style>
.titulo{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
}
.titulo{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
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
body{
	font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;
	font-size:12px;
}
</style>
<title>Reporte por Proyecto</title>
</head>
<body>
<table width='100%' cellspacing='1' cellpadding='4' style='border:0px;'>
  <tr>
    <td width='29%' valign='middle' style='border:0px;'><img src='logoupla.png' width='309' height='66'></td>
    <td width='71%' valign='top' style='border:0px;'><span class='titulo'><b>Coordinaci&oacute;n Estatal de Planeaci&oacute;n<br>
      Direcci&oacute;n de Planeaci&oacute;n</b></span><br>
      <span class='cabecera'>
      <b>Dependencia:</b>&nbsp;".($_SESSION["nombre_dependencia_v3"])."<br>
      <b>Reporte:</b>&nbsp;Marco Estrat&eacute;gico<br>
  </tr>
</table>
<hr>
<h3>Marco Estrat&eacute;gico PROGRAMAS PRESUPUESTARIOS 2018</h3>
<b>Misi&oacute;n:</b><br>
<div style='border:solid 1px #ccc;border-radius:4px 4px 4px 4px;text-align:justify;padding:2px 2px 2px 2px;'>".$resultado['mision']."</div><br><br>
<b>Visi&oacute;n:</b><br>
<div style='border:solid 1px #ccc;border-radius:4px 4px 4px 4px;text-align:justify;padding:2px 2px 2px 2px;'>".$resultado['vision']."</div><br><br>
<b>Objetivo Estrat&eacute;gico:</b><br>
<div style='border:solid 1px #ccc;border-radius:4px 4px 4px 4px;text-align:justify;padding:2px 2px 2px 2px;'>".($resultado['objetivo_estrategico'])."</div><br><br>
<b>Actividades Sustantivas:</b><br>
<div style='border:solid 1px #ccc;border-radius:4px;text-align:justify; padding:2px 2px 2px 2px;'>".($resultado['activ_sustantivas'])."</div><br><br>


</body>
</html>";
$full_html = $inicio_html;
//$dompdf->'UTF-8';
$dompdf = new DOMPDF();
$full_html = iconv('UTF-8','Windows-1252',$full_html);  //Windows-1250
$dompdf->load_html($full_html);
$dompdf->set_paper("letter", "portrait");
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$canvas->page_text(20, 750, "Marco Estratégico: Pag {PAGE_NUM} de {PAGE_COUNT}",$font, 7, array(0,0,0));
$canvas->page_text(450, 750, "Fecha del reporte: ".date('d-m-Y h:i:s A'),$font, 7, array(0,0,0));
$dompdf->stream("Marco Estratégico 2016.pdf",array("Attachment" => 0));
?>
0

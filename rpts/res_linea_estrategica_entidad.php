<?php
include('../seguridad/siplan_connection_db_2016.php');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"res_linea_estrategica_entidad.xls\"" );

$consulta_lineas = "SELECT  
e.eje as eje,
l.id_linea as id_linea,
l.id_eje as id_eje,
l.nombre as linea
FROM linea l
inner join eje e on(l.id_eje = e.id_eje) 
ORDER by e.id_eje";
$ex_con_lineas = mysql_query($consulta_lineas) or die (mysql_error());

while($r_l = mysql_fetch_array($ex_con_lineas)) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
  <td colspan='6'><img src='http://siplan.zacatecas.gob.mx/imagenes/logoupla.png'></td>
 </tr>
 <tr>
  <td colspan='6'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='6'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='6'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='6'>&nbsp;</td>
 </tr>
 <tr>
  <td colspan='6'>&nbsp;</td>
 </tr>
 <tr>
   <td colspan="6"><h2>Programa Operativo Anual</h2></td>
  </tr>
    <tr>
    <td colspan="6">Reporte de Proyectos</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#9BBB59">Eje: <?php echo $r_l['eje']; ?></td>
    <td colspan="3" bgcolor="#9BBB59">L&iacute;nea:<?php echo $r_l['linea']; ?></td>
  </tr>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  
  <tr bgcolor="#9BBB59">
  	<td style="border-bottom:solid 1px #C4D79B;">Subcomité Sectorial</td>
  	<td style="border-bottom:solid 1px #C4D79B;">Dependencia</td>
    <td style="border-bottom:solid 1px #C4D79B;">No. Proyecto</td>
    <td style="border-bottom:solid 1px #C4D79B;">Nombre del Proyecto</td>
    <td style="border-bottom:solid 1px #C4D79B;">Unidad de Medida</td>
    <td style="border-bottom:solid 1px #C4D79B;">Meta Anual</td>
  </tr>
  <?php 
  	$consulta_proyectos= "SELECT 
  	s.sector as sector,
  	d.nombre  as dependencia,
  	p.no_proyecto as num_proyecto,
  	p.nombre as proyecto,
	p.unidad_medida as u_med,
	p.cantidad as meta
	FROM proyectos p
	inner join dependencias d on(p.id_dependencia = d.id_dependencia)
	inner join sectores s on(d.id_sector = s.id_sector)
	WHERE p.id_eje = ".$r_l['id_eje']. " AND p.id_linea = ".$r_l['id_linea']." ORDER BY p.no_proyecto
  	";
    $ex_con_pro = mysql_query($consulta_proyectos,$siplan_data_conn) or die(mysql_error());
	$cont = 1;
	while($r_p=mysql_fetch_array($ex_con_pro)){
		$r2 = $cont%2;
	  if($r2==0){$fondo = "#FFFFFF";}else{$fondo = "#EBF1DE";}
   ?>
  <tr bgcolor="<?php echo $fondo;?>">
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['sector']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['dependencia']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['num_proyecto']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['proyecto']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['u_med']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['meta']; ?></td>
  </tr>
  
  <?php $cont = $cont+1;} ?>
  
</table>
<br>
<?php } ?>
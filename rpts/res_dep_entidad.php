<?php
include('../seguridad/siplan_connection_db_2016.php');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"res_proyectos_entidad.xls\"" );
$consulta_dep = "SELECT id_dependencia,nombre FROM dependencias ORDER by id_dependencia";
$ex_con_dep = mysql_query($consulta_dep) or die (mysql_error());
while($r_d = mysql_fetch_array($ex_con_dep)) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
 <tr>
   <td colspan="8"><h2>Programa Operativo Anual</h2></td>
  </tr>
    <tr>
    <td colspan="8">Reporte de Proyectos</td>
  </tr>
  <tr>
    <td colspan="8" bgcolor="#9BBB59">Dependencia o Entidad: <?php echo $r_d['nombre']; ?></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  
  <tr bgcolor="#9BBB59">
  	<td style="border-bottom:solid 1px #C4D79B;">Subcomité Sectorial</td>
    <td style="border-bottom:solid 1px #C4D79B;">No. Proyecto</td>
    <td style="border-bottom:solid 1px #C4D79B;">Nombre del Proyecto</td>
    <td style="border-bottom:solid 1px #C4D79B;">Eje</td>
    <td style="border-bottom:solid 1px #C4D79B;">L&iacute;nea Estrat&eacute;gica</td>
    <td style="border-bottom:solid 1px #C4D79B;">Estrategia</td>
    <td style="border-bottom:solid 1px #C4D79B;">Unidad de Medida</td>
    <td style="border-bottom:solid 1px #C4D79B;">Meta Anual</td>
  </tr>
  <?php 
  	$consulta_proyectos= "SELECT 
  	s.sector as sector,
  	p.no_proyecto as num_proyecto,
  	p.nombre as proyecto,
  	e.eje as eje,
	l.nombre as linea,
	es.nombre as estrategia,
	p.unidad_medida as u_med,
	p.cantidad as meta
	FROM proyectos p
	inner join dependencias d on(p.id_dependencia = d.id_dependencia)
	inner join sectores s on(d.id_sector = s.id_sector)
	inner join eje e on(p.id_eje = e.id_eje)
	inner join linea l on(p.id_linea = l.id_linea)
	inner join estrategias es on (p.id_estrategia = es.id_estrategia)
	WHERE p.id_dependencia = ".$r_d['id_dependencia']." ORDER BY p.no_proyecto
  	";
    $ex_con_pro = mysql_query($consulta_proyectos,$siplan_data_conn) or die(mysql_error());
	$cont = 1;
	while($r_p=mysql_fetch_array($ex_con_pro)){
		$r2 = $cont%2;
	  if($r2==0){$fondo = "#FFFFFF";}else{$fondo = "#EBF1DE";}
   ?>
  <tr bgcolor="<?php echo $fondo;?>">
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['sector']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['num_proyecto']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['proyecto']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['eje']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['linea']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['estrategia']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['u_med']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_p['meta']; ?></td>
  </tr>
  
  <?php $cont = $cont+1;} ?>
  
</table>
<br>
<?php } ?>
<?php
include('../seguridad/siplan_connection_db_2016.php');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"res_gabinete_Sectorial.xls\"" );
$sector_id = array(1,2,3,4);
$sector_nombre = array("Política Interna y Seguridad","Administración","Desarrollo Económico","Desarrollo Social");
for($x=0;$x<4;$x=$x+1){
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
    <td colspan="8" bgcolor="#9BBB59">Subcomit&eacute; Sectorial: <?php echo $sector_nombre[$x]; ?></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  
  <tr bgcolor="#9BBB59">
    <td style="border-bottom:solid 1px #C4D79B;">Dependencia o entidad</td>
    <td style="border-bottom:solid 1px #C4D79B;">No. Proyecto</td>
    <td style="border-bottom:solid 1px #C4D79B;">Nombre del Proyecto</td>
    <td style="border-bottom:solid 1px #C4D79B;">Eje</td>
    <td style="border-bottom:solid 1px #C4D79B;">L&iacute;nea Estrat&eacute;gica</td>
    <td style="border-bottom:solid 1px #C4D79B;">Estrategia</td>
    <td style="border-bottom:solid 1px #C4D79B;">Unidad de Medida</td>
    <td style="border-bottom:solid 1px #C4D79B;">Meta Anual</td>
   
  </tr>
  <?php 
  	$consulta_dependencias_sectores = "SELECT id_dependencia FROM dependencias WHERE id_sector = ".$sector_id[$x]." ORDER BY id_dependencia ASC";
    $ex_con_dep = mysql_query($consulta_dependencias_sectores,$siplan_data_conn);
	while($r_d=mysql_fetch_array($ex_con_dep)){
		$consulta_proyectos = "SELECT 
		d.nombre as dependencia,
		p.no_proyecto as num_proyecto,
		p.nombre as nombre,
		e.eje as eje,
		l.nombre as linea,
		es.nombre as estrategia,
		p.unidad_medida as u_med,
		p.cantidad as meta
		FROM proyectos p
		inner join dependencias d on(p.id_dependencia = d.id_dependencia)
		inner join eje e on(p.id_eje = e.id_eje)
		inner join linea l on(p.id_linea = l.id_linea)
		inner join estrategias es on (p.id_estrategia = es.id_estrategia)
		WHERE p.id_dependencia = ".$r_d['id_dependencia']." ORDER BY p.no_proyecto";
		$ex_con_pro = mysql_query($consulta_proyectos,$siplan_data_conn) or die (mysql_error());
		$cont = 1;
		while($r_d = mysql_fetch_array($ex_con_pro)){
		$r2 = $cont%2;
	  if($r2==0){$fondo = "#FFFFFF";}else{$fondo = "#EBF1DE";}
  
  
   ?>
  <tr bgcolor="<?php echo $fondo;?>">
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['dependencia']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['num_proyecto']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['nombre']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['eje']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['linea']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['estrategia']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['u_med']; ?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r_d['meta']; ?></td>
  </tr>
  
  <?php $cont = $cont+1;}} ?>
  
</table>
<br>
<?php } ?>
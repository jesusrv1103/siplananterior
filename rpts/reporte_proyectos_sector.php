<?php
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"proyectos_sector2018.xls\"" );
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#9BBB59">
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">No. PP</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Programa Presupuestario</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Descripci&oacute;n</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Sector</div></td>
  </tr>
  <?php
  include('../seguridad/siplan_connection_db_2016.php');
  $consulta_proyectos = "SELECT 
  p.no_proyecto as num,
  p.nombre as nombre,
  d.nombre as dependencia ,
  s.sector as sector 
  from proyectos p
  inner join dependencias d on(p.id_dependencia = d.id_dependencia)
  inner join sectores s on(d.id_sector = s.id_sector)
  order by d.id_dependencia,p.no_proyecto ASC
  ";
  $ex_con = mysql_query($consulta_proyectos,$siplan_data_conn)or die(mysql_error());
  $cont = 1;
  while($r=mysql_fetch_array($ex_con)){
  	$r2 = $cont%2;
	  if($r2==0){$fondo = "#FFFFFF";}else{$fondo = "#EBF1DE";}
  ?>
  
  <tr bgcolor="<?php echo $fondo;?>">
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['num']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['nombre']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['dependencia']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['sector']);?></td>
  </tr>
  <?php $cont = $cont+1; }?>
</table>

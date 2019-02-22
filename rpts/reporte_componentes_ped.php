<?php
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel; charset=UTF-8'"); 
header ("Content-Disposition: attachment; filename=\"accionesxproyecto2018.xls\"" );
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Reporte Componentes PED</title>
   </head>
   <body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#9BBB59">
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Dependencia</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">No. PP</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Programa Presupuestario</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">No. Componente</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Componente</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Eje</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">L&iacute;nea</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Estrat&eacute;gia</div></td>
  </tr>
  <?php
  include('../seguridad/siplan_connection_db_2016.php');
 
$consulta_proyectos = "SELECT 
  d.nombre as dependencia,
  p.no_proyecto as num_proyecto,
  p.nombre as proyecto,
  c.no_componente as num_componente,
  c.descripcion as componente,
  e.eje as eje,
  l.nombre as linea,
  es.nombre as estrategia
  from componentes c
  inner join proyectos p on(c.id_proyecto = p.id_proyecto)
  inner join dependencias d on(p.id_dependencia = d.id_dependencia)
  inner join eje e on(c.ped_eje = e.id_eje)
  inner join linea l on(c.ped_linea = l.id_linea)
  inner join estrategias es on(c.ped_estrategia = es.id_estrategia)
  order by d.id_dependencia,p.no_proyecto,c.no_componente ASC
  ";
  $ex_con = mysql_query($consulta_proyectos,$siplan_data_conn)or die(mysql_error());
  $cont = 1;
  while($r=mysql_fetch_array($ex_con)){
  	$r2 = $cont%2;
	  if($r2==0){$fondo = "#FFFFFF";}else{$fondo = "#EBF1DE";}
  ?>
  
  <tr bgcolor="<?php echo $fondo;?>">
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['dependencia']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r['num_proyecto'];?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['proyecto']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['num_componente']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['componente']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['eje']);?></td>
     <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['linea']);?></td>
      <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['estrategia']);?></td>
  </tr>
  <?php $cont = $cont+1; }?>
</table>
    </body>
</html>

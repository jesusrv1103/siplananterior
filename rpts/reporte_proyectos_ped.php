<?php
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"proyectos_ped2018.xls\"" );
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#9BBB59">
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Sector</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Descripci&oacute;n</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">No. PP</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Programa Presupuestario</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Eje</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">L&iacute;nea</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Estrat&eacute;gia</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Unidad de Medida</div></td>
    <td style="border-bottom:solid 1px #C4D79B;"><div align="center" style="color:#FFF;">Meta Anual</div></td>
  </tr>
  <?php
  include('../seguridad/siplan_connection_db_2016.php');
  $consulta_proyectos = "SELECT 
  p.no_proyecto as num,
  p.nombre as nombre,
  p.unidad_medida as umedida,
  p.cantidad as anualp,
  p.id_dependencia,
  d.nombre as dependencia ,
  e.eje as eje,
  l.nombre as linea,
  es.nombre as estrategia
  from proyectos p
  inner join dependencias d on(p.id_dependencia = d.id_dependencia)
  inner join eje e on(p.id_eje = e.id_eje)
  inner join linea l on(p.id_linea = l.id_linea)
  inner join estrategias es on(p.id_estrategia = es.id_estrategia)
  order by d.id_dependencia,p.no_proyecto ASC
  ";
  $ex_con = mysql_query($consulta_proyectos,$siplan_data_conn)or die(mysql_error());
  $cont = 1;
  while($r=mysql_fetch_array($ex_con)){
  	$r2 = $cont%2;
	  if($r2==0){$fondo = "#FFFFFF";}else{$fondo = "#EBF1DE";}
  ?>
  
  <tr bgcolor="<?php echo $fondo;?>">
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode(nomsec($r['id_dependencia']));?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['dependencia']);?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r['num'];?></td>
    <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['nombre']);?></td>
     <td style="border-bottom:solid 1px #C4D79B;"><?php echo $r['eje'];?></td>
     <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['linea']);?></td>
      <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['estrategia']);?></td>
     <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['umedida']);?></td>
     <td style="border-bottom:solid 1px #C4D79B;"><?php echo utf8_decode($r['anualp']);?></td>
  </tr>
  <?php $cont = $cont+1; }?>
</table>


<?php

	function nomsec($idd){
		

	$dat_q=mysql_query("select id_sector from dependencias where id_dependencia=".$idd);
	$dat_res=mysql_fetch_assoc($dat_q);

        $dat_q1=mysql_query("select sector from sectores where id_sector=".$dat_res['id_sector']);
        $dat_res1=mysql_fetch_assoc($dat_q1);
		
	return($dat_res1['sector']);
	}

 ?>

<?php
include('../seguridad/siplan_connection_db_2016.php');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"indicadores_fin2016.xls\"" );
$consulta = "select 
ip.id_proyecto as id_pr,
s.sector as sector,
d.nombre as dependencia,
d.id_dependencia as id_dep,
p.no_proyecto as num_proyecto,
p.nombre as proyecto,
ip.fin_objetivo as objetivo,
ip.nombre_fin as nombre,
ip.metodo_fin as metodo,
t.tipo_indicador as tipo,
di.dimension as dimension,
fr.frecuencia as frecuencia,
si.sentido as sentido,
ip.u_medida_fin as u_medida,
ip.meta_fin as meta,
ip.medio_verifica_fin as medio,
ip.supuesto_fin as supuesto
from
indicadores_proyecto ip
inner join proyectos p on(ip.id_proyecto = p.id_proyecto)
inner join dependencias d on(p.id_dependencia = d.id_dependencia)
inner join sectores s on(d.id_sector = s.id_sector)
inner join tipo_indicador t on(ip.tipo_fin = t.id_tipo_indicador)
inner join dimension_indicador di on(ip.dimension_fin = di.id_dimension)
inner join frecuencia_indicador fr on(ip.frecuencia_fin = fr.id_frecuencia)
inner join sentido_indicador si on(ip.sentido_fin = si.id_sentido)
order by d.id_dependencia,p.no_proyecto ASC
";
$ejecuta_consulta = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
$contador = 1;
?>
<table>
  <tr bgcolor="#669900">
    <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">SECTOR</div></td>
	<td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NUM DEPENDENCIA</div></td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">DEPENDENCIA</td>
	 <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NUM PROYECTO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NOMBRE PROYECTO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">OBJETIVOS</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NOMBRE</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">M&Eacute;TODO DE C&Aacute;LCULO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">TIPO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">DIMENSI&Oacute;N</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">FRECUENCIA</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">SENTIDO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">UNIDAD DE MEDIDA</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">META</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">SUPUESTO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">MEDIO DE VERIFICACION</td>
  </tr>
  <?php while($res_consulta = mysql_fetch_array($ejecuta_consulta)) { 
  	if($contador%2==0){echo "<tr bgcolor='#D8E4BC'>";}else{echo "<tr bgcolor='#EBF1DE'>";}
	$contador = $contador+1;
  	?>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['sector']));?></td>
	<td style="border-bottom: solid 1px #C4D79B;"><?php echo $res_consulta['id_dep'];?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['dependencia']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php echo $res_consulta['num_proyecto'];?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['proyecto']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['objetivo']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['nombre']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['metodo']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['tipo']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['dimension']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['frecuencia']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['sentido']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['u_medida']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['meta']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['medio']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['supuesto']));?></td>
  </tr>
  <?php } ?>
</table>

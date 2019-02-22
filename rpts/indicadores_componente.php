<?php
include('../seguridad/siplan_connection_db_2016.php');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"indicadores_componente2016.xls\"" );
$consulta = "select 
s.sector as sector,
dep.nombre as dependencia,
pr.no_proyecto as num_proyecto,
pr.nombre as proyecto,
comp.no_componente as num_comp,
comp.descripcion as componente,
indcomp.objetivo as objetivo,
indcomp.nombre as nombre,
indcomp.metodo_calculo as metodo,
t.tipo_indicador as tipo,
d.dimension as dimension,
f.frecuencia as frecuencia,
si.sentido as sentido,
indcomp.u_medida_indicador as u_medida,
indcomp.meta_anual as meta,
indcomp.supuesto as supuesto,
indcomp.medio_verifica as medio
from 
indicadores_componente as indcomp
inner join componentes comp on(indcomp.id_componente = comp.id_componente)
inner join proyectos pr on (pr.id_proyecto = comp.id_proyecto)
inner join dependencias dep on(dep.id_dependencia = pr.id_dependencia)
inner join sectores s on(s.id_sector = dep.id_sector)
inner join tipo_indicador t on(indcomp.tipo_indicador = t.id_tipo_indicador)
inner join dimension_indicador d on(indcomp.dimension = d.id_dimension)
inner join frecuencia_indicador f on(indcomp.frecuencia = f.id_frecuencia)
inner join sentido_indicador si on(indcomp.sentido = si.id_sentido)
order by dep.id_dependencia,pr.no_proyecto ASC
";
$ejecuta_consulta = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
$contador = 1;
?>
<table>
  <tr bgcolor="#669900">
    <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">SECTOR</div></td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">DEPENDENCIA</td>
	 <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NUM PROYECTO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NOMBRE PROYECTO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NUM COMP</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">COMPONENTE</td>
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
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['dependencia']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php echo $res_consulta['num_proyecto'];?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['proyecto']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php echo $res_consulta['num_comp'];?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['componente']));?></td>
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

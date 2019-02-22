<?php

include('../seguridad/siplan_connection_db_2016.php');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"indicadores_actividad2016.xls\"" );
$consulta = "select
s.sector as sector,
dep.nombre as dependencia,
pr.no_proyecto as num_proyecto,
pr.nombre as proyecto,
comp.no_componente as num_comp,
comp.descripcion as componente,
acc.no_accion as no_actividad,
indacc.nombre as indicador,
indacc.objetivo as actividad,
indacc.nombre as nomindicador,
indacc.metodo_calculo as metodo,
t.tipo_indicador as tipo,
d.dimension as dimension,
f.frecuencia as frecuencia,
si.sentido as sentido,
indacc.u_medida_indicador as u_medida,
indacc.meta_anual as meta,
indacc.supuesto as supuesto,
indacc.medio_verifica as medio
from
indicadores_accion indacc
inner join acciones acc on(indacc.id_accion = acc.id_accion)
inner join componentes comp on(acc.id_componente = comp.id_componente)
inner join proyectos pr on (pr.id_proyecto = comp.id_proyecto)
inner join dependencias dep on(dep.id_dependencia = pr.id_dependencia)
inner join sectores s on(s.id_sector = dep.id_sector)
inner join tipo_indicador t on(indacc.tipo_indicador = t.id_tipo_indicador)
inner join dimension_indicador d on(indacc.dimension = d.id_dimension)
inner join frecuencia_indicador f on(indacc.frecuencia = f.id_frecuencia)
inner join sentido_indicador si on(indacc.sentido = si.id_sentido)
order by dep.id_dependencia,pr.no_proyecto, comp.no_componente ASC
;

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
         <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NUM ACT</td>
   <!-- <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">INDICADOR</td> -->
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">ACTIVIDAD</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">NOMBRE INDICADOR</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">M&Eacute;TODO DE C&Aacute;LCULO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">TIPO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">DIMENSI&Oacute;N</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">FRECUENCIA</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">SENTIDO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">UNIDAD DE MEDIDA</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">META</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">SUPUESTO</td>
     <td style="border-bottom: solid 1px #C4D79B;"><div style="color:#ffffff;">MEDIO DE VERIFICACI&Oacute;N</td>
  </tr>
  <?php while($res_consulta = mysql_fetch_array($ejecuta_consulta)) { 
  	if($contador%2==0){echo "<tr bgcolor='#D8E4BC'>";}else{echo "<tr bgcolor='#EBF1DE'>";}
	$contador = $contador+1;
  	?>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['sector']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['dependencia']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['num_proyecto']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['proyecto']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['num_comp']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['componente']));?></td>
        <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['no_actividad']));?></td>
    <!-- <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['indicador']));?></td>-->
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['actividad']));?></td>
    <td style="border-bottom: solid 1px #C4D79B;"><?php print(utf8_decode($res_consulta['nomindicador']));?></td>
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
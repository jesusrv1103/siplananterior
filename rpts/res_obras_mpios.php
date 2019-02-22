<?php
include('../seguridad/siplan_connection_db_2016.php');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"obras_mpios.xls\"" );
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan='13'><img src='http://siplan.zacatecas.gob.mx/imagenes/logoupla.png'></td>
</tr>
<tr>
<td colspan='13'>&nbsp;</td>
</tr>
<tr>
<td colspan="13"><h2>Programa Operativo Anual 2017</h2></td>
</tr>
<tr>
<td colspan="13">Reporte de Obras por Municipios</td>
</tr>
<tr>
<td colspan='13'>&nbsp;</td>
</tr>
<tr>
<td>Oficio</td>
<td>Clave Obra</td>
<td>Monto del oficio</td>
<td>Monto de la Obra</td>
<td>Dependencia</td>
<td>Num. Proyecto</td>
<td>Municipio</td>
<td>Localidad</td>
<td>Unidad Medida</td>
<td>Cantidad</td>
<td>Descripicon</td>
<td>Ben h</td>
<td>Ben M</td>
</tr>




<?php 
$consulta_mpios = "SELECT id_municipio,id_finanzas from municipios order by id_finanzas";
$realizar_consulta = mysql_query($consulta_mpios,$siplan_data_conn) or die (mysql_error());

while($resultado_mpios = mysql_fetch_assoc($realizar_consulta)){
$consulta = "select 
oa.no_oficio as oficio,
poa.obra as obra,
oa.monto_total as monto_oficio,
sum(poaor.monto) as monto_obra,
d.acronimo as dep,
p.no_proyecto as num_proy,
m.id_municipio as id_mun,
m.nombre as mun,
poa.localidad as loc,
um.descripcion as  unidad_medida,
poa.cantidad,
poa.descripcion as descripcion,
poa.ben_h as benef_h,
poa.ben_m as benef_m
from 
oficio_aprobacion AS oa 
inner join detalle_oficio dof on(oa.id_oficio = dof.id_oficio)
inner join obras poa on (dof.id_poa02 = poa.id_obra)
inner join dependencias d on (poa.id_dependencia = d.id_dependencia)
inner join proyectos as p on (poa.id_proyecto = p.id_proyecto)
inner join municipios as m on(poa.municipio = m.id_finanzas)
inner join poa02_origen as poaor on (poa.obra = poaor.id_poa02)
INNER JOIN unidad_medida_prog02 um on(poa.u_medida = um.id_unidad)
WHERE oa.estatus_sefin = 1 and m.id_municipio = ".$resultado_mpios['id_municipio']." group by obra";

$ex_cons = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
while($res_cons = mysql_fetch_assoc($ex_cons)){
?>

<tr>
<td><?php echo $res_cons['oficio'];?></td>
<td><?php echo $res_cons['obra'];?></td>
<td><?php echo $res_cons['monto_oficio'];?></td>
<td><?php echo $res_cons['monto_obra'];?></td>
<td><?php echo $res_cons['dep'];?></td>
<td><?php echo $res_cons['num_proy'];?></td>
<td><?php print(utf8_decode($res_cons['mun']));?></td>
<td><?php  $consulta_loc = mysql_query("SELECT nombre FROM localidades where id_municipio = ".$res_cons['id_mun']." and id_finanzas = ".$res_cons['loc'],$siplan_data_conn) or die (mysql_error()); print(utf8_decode(mysql_result($consulta_loc,0)));   ?></td>
<td><?php print (utf8_decode($res_cons['unidad_medida']));?></td>
<td><?php echo $res_cons['cantidad'];?></td>
<td><?php print(utf8_decode($res_cons['descripcion']));?></td>
<td><?php echo $res_cons['benef_h'];?></td>
<td><?php echo $res_cons['benef_m'];?></td>
</tr>


<?php
}
mysql_free_result($ex_cons);
}
mysql_free_result($realizar_consulta);
mysql_close($siplan_data_conn);
?>
</table>

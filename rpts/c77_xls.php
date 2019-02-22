<?php
session_start();
if($_SESSION['id_perfil']=1){

require_once("../seguridad/siplan_connection_db.php");
date_default_timezone_set('America/Mexico_City');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"c77.xls\"" );
echo "
<table width='100%' border='1' cellspacing='0' cellpadding='0'>";
$consulta_c77 = "
select
dep.id_sector as sector,
dep.id_dependencia as dependencia,
edo_fin.s03c_objeti as obj,
edo_fin.s04c_progra as pro,
edo_fin.s05c_subpro as subpro,
pr.no_proyecto as proyecto,
poa02.s11c_compon as componente,
poa02.s25c_accion as accion,
ob.consxdep as obra,
ob.obra as upla,
o.no_oficio as oficio,
o.tipo as tipo,
o.fecha_oficio as f_of,
dof.monto as monto,
o.fecha_captura as f_cap
from detalle_oficio dof 
inner join oficio_aprobacion o on(dof.id_oficio = o.id_oficio)
inner join proyectos pr on(dof.id_proyecto = pr.id_proyecto)

inner join eje e on(e.id_eje = pr.id_eje)
inner join linea l on(l.id_linea = pr.id_linea)
inner join estrategias est on(est.id_estrategia = pr.id_estrategia)

inner join dependencias dep on(pr.id_dependencia = dep.id_dependencia) 
inner join obras ob on(ob.id_obra = dof.id_poa02)
inner join poa02_origen poa02 on(poa02.id_poa02 = ob.obra)
inner join estados_financieros edo_fin on(edo_fin.s01c_sector = dep.id_sector and
edo_fin.s02c_depend = dep.id_dependencia and 
edo_fin.s06c_proyec = poa02.s06c_proyec and
edo_fin.s07c_partid = poa02.s07c_partid and
edo_fin.s08c_origen = poa02.s08c_origen and
edo_fin.s11c_compon = poa02.s11c_compon and
edo_fin.s25c_accion = poa02.s25c_accion
)
where o.estatus_sefin = 0  group by o.no_oficio order by o.id_oficio ASC
";
$ex_consulta_c77 = mysql_query($consulta_c77,$siplan_data_conn) or die (mysql_error());
while($r77 = mysql_fetch_array($ex_consulta_c77)){
?>
<tr>
<td><?php echo $r77['sector']; ?></td>
<td><?php echo $r77['dependencia']; ?></td>
    <td><?php echo $r77['obj']; ?></td>
    <td><?php echo $r77['pro']; ?></td>
    <td><?php echo $r77['subpro']; ?></td>
<td><?php echo $r77['proyecto']; ?></td>
<td><?php echo $r77['componente']; ?></td>
<td><?php echo $r77['accion']; ?></td>
<td><?php echo $r77['obra']; ?></td>
<td><?php echo $r77['upla']; ?></td>
<td><?php echo $r77['oficio']; ?></td>
<td><?php echo $r77['tipo']; ?></td>
<td><?php 
$fof = $r77['f_of']; 
print(substr($fof,8,2)."/".substr($fof,5,2)."/".substr($fof,2,2));
?></td>
<td><?php echo $r77['monto']; ?></td>
<td>698</td>
<td><?php 
$fca = $r77['f_cap']; 
print(substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2));
?></td>
<td>698</td>
<td><?php 
print(substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2));
?></td>
</tr>
<?php } } ?>
</table>


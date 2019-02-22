<?php
session_start();
if($_SESSION['id_perfil']=1){

require_once("../seguridad/siplan_connection_db_2016.php");
date_default_timezone_set('America/Mexico_City');
header ("Expires: 0");  
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
header ("Content-type: application/x-msexcel");  
header ("Content-Disposition: attachment; filename=\"c76.xls\"" );
echo "
<table width='100%' border='1' cellspacing='0' cellpadding='0'>";
$consulta_c76="
select
dep.id_dependencia as dependencia,
o.no_oficio as oficio,
o.tipo as tipo,
o.fecha_oficio as f_of,
o.fecha_captura as f_cap
from detalle_oficio dof 
inner join oficio_aprobacion o on(dof.id_oficio = o.id_oficio)
inner join proyectos pr on(dof.id_proyecto = pr.id_proyecto)
inner join dependencias dep on(pr.id_dependencia = dep.id_dependencia) 
where o.estatus_sefin = 0  order by o.id_oficio ASC
";
$ex_consulta_c76 = mysql_query($consulta_c76,$siplan_data_conn) or die (mysql_error());
while($r76 = mysql_fetch_array($ex_consulta_c76)){
?>
<tr>
    <td><?php echo $r76['dependencia']; ?></td>
     <td><?php echo $r76['oficio']; ?></td>
         <td><?php echo $r76['tipo']; ?></td>
         <td><?php 
$fof = $r76['f_of']; 
print(substr($fof,8,2)."/".substr($fof,5,2)."/".substr($fof,2,2));
?></td>
<td>698</td>
<td><?php 
$fca = $r76['f_cap']; 
print(substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2));
?></td>
<td>698</td>
<td><?php 
print(substr($fca,8,2)."/".substr($fca,5,2)."/".substr($fca,2,2));
?></td>
</tr>
<?php }
echo "</table>";
}
?>

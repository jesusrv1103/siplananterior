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
header ("Content-Disposition: attachment; filename=\"c73.xls\"" );
$consulta_c73 = "
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
pr.nombre as desproy,
ob.descripcion as obra_desc,
mun.id_finanzas as municipio,
loc.id_finanzas as localidad,
ob.fecha_inicio as fecha_i,
ob.fecha_fin as fecha_fin,
ob.modalidad as modalidad,
ob.retencion as retencion,
ob.programa_poa as pro_poa,
ob.subprograma_poa as subpro_poa,
ob.u_medida as u_medida,
ob.cantidad as cantidad,
ob.ben_h as ben_h,
ob.ben_m as ben_m,
mun.id_reg_finanzas as region,
mar.descripcion as marginacion
from detalle_oficio dof 
inner join oficio_aprobacion o on(dof.id_oficio = o.id_oficio)
inner join proyectos pr on(dof.id_proyecto = pr.id_proyecto)
inner join eje eje on(eje.id_eje = pr.id_eje)
inner join linea lin on(lin.id_linea = pr.id_linea)
inner join estrategias estr on(estr.id_estrategia = pr.id_estrategia)
inner join dependencias dep on(pr.id_dependencia = dep.id_dependencia) 
inner join obras ob on(ob.id_obra = dof.id_poa02)
inner join municipios mun on(mun.id_municipio = ob.municipio)
inner join localidades loc on(loc.id_finanzas = ob.localidad and loc.id_municipio = ob.municipio)
inner join marginacion mar on(mar.id_marginacion = loc.id_marginacion)
inner join poa02_origen poa02 on(poa02.id_poa02 = ob.obra)
inner join estados_financieros edo_fin on(edo_fin.s01c_sector = dep.id_sector and
edo_fin.s02c_depend = dep.id_dependencia and 
edo_fin.s06c_proyec = poa02.s06c_proyec and
edo_fin.s07c_partid = poa02.s07c_partid and
edo_fin.s08c_origen = poa02.s08c_origen and
edo_fin.s11c_compon = poa02.s11c_compon and
edo_fin.s25c_accion = poa02.s25c_accion
)
where o.estatus_sefin = 0 group by ob.id_obra order by o.id_oficio ASC
";

echo "<table width='100%' border='1' cellspacing='0' cellpadding='0'>";
$ex_consulta_c73 = mysql_query($consulta_c73,$siplan_data_conn) or die (mysql_error());
while($r73 = mysql_fetch_array($ex_consulta_c73)){
	$f_i = $r73['fecha_i'];
	$f_f =$r73['fecha_fin'];
	
	$m_i = substr($f_i,5,2);
$m_i=substr($r73['fecha_i'],5,2);	
	switch($m_i) {
	case "01":
		$m_inicio = 1;
		break;
		case "02":
		$m_inicio = 2;
		break;
		case "03":
		$m_inicio = 3;
		break;
		case "04":
		$m_inicio = 4;
		break;
		case "05":
		$m_inicio = 5;
		break;
		case "06":
		$m_inicio = 6;
		break;
		case "07":
		$m_inicio = 7;
		break;
		case "08":
		$m_inicio = 8;
		break;
		case "09":
		$m_inicio = 9;
		break;
		case "10":
		$m_inicio = 10;
		break;
		case "11":
		$m_inicio = 11;
		break;
		case "12":
		$m_inicio = 12;
		break;
	}
	$a_i = substr($f_i,7,4);
	$a_f = substr($f_f,7,4);
	$m_f = substr($f_f,5,2);
$m_f=substr($r73['fecha_fin'],5,2);
	switch($m_f) {
	case "01":
		$m_fin = 1;
		break;
		case "02":
		$m_fin = 2;
		break;
		case "03":
		$m_fin = 3;
		break;
		case "04":
		$m_fin = 4;
		break;
		case "05":
		$m_fin = 5;
		break;
		case "06":
		$m_fin = 6;
		break;
		case "07":
		$m_fin = 7;
		break;
		case "08":
		$m_fin = 8;
		break;
		case "09":
		$m_fin = 9;
		break;
		case "10":
		$m_fin = 10;
		break;
		case "11":
		$m_fin = 11;
		break;
		case "12":
		$m_fin = 12;
		break;
	}
	
?>
<tr>
    <td><?php echo $r73['sector']; ?></td>
    <td><?php echo $r73['dependencia']; ?></td>
    <td><?php echo $r73['obj']; ?></td>
    <td><?php echo $r73['pro']; ?></td>
    <td><?php echo $r73['subpro']; ?></td>
    <td><?php echo $r73['proyecto']; ?></td>
    <td><?php echo $r73['componente']; ?></td>
    <td><?php echo $r73['accion']; ?></td>
    <td><?php echo $r73['obra']; ?></td>
    <td><?php echo $r73['upla']; ?></td>
    <td>0</td>
    <td>&nbsp;</td>
    <td><?php echo $r73['obra_desc']; ?></td>
    <td><?php echo $r73['municipio']; ?></td>
    <td><?php echo $r73['localidad']; ?></td>
    
 <td><?php echo   substr($r73['fecha_i'],0,4); //$a_i; ?></td>
    <td><?php echo  $m_inicio;  ?></td>
    <td><?php echo substr($r73['fecha_fin'],0,4); //$a_f; ?></td>
    <td><?php echo  $m_fin; ?></td>

    <td><?php echo $r73['modalidad']; ?></td>
    <td><?php echo $r73['retencion']; ?></td>
    <td><?php echo $r73['pro_poa']; ?></td>
    <td><?php echo $r73['subpro_poa']; ?></td>
    <td><?php echo $r73['u_medida']; ?></td>
     <td>1</td>
    <td><?php echo $r73['cantidad']; ?></td>
    <td><?php echo $r73['ben_h']; ?></td>
    <td><?php echo $r73['ben_m']; ?></td>
    <td>0</td>
    <td>1</td>
    <td><?php echo $r73['region']; ?></td>
    <td><?php echo $r73['marginacion']; ?></td>
    <td>1</td>
    <td>1</td>
    <td><?php  print(date('d/m/y')); ?></td>
    <td>0</td>
    <td>698</td>
    <td><?php  print(date('d/m/y')); ?></td>
    <td>698</td>
    <td><?php  print(date('d/m/y')); ?></td>
    </tr>
   <?php } 
echo "  
</table>";

}
?>

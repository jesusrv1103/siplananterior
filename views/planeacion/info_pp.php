          <?php
 $consulta_proyecto = "SELECT
pr.id_proyecto as id,
pr.no_proyecto as num,
pr.nombre as nombre, 

CASE pr.clasificacion
 WHEN 0 THEN ' Institucional'
 WHEN 1 THEN ' Prioritario'
END as prioritario,

eje.eje as eje,
linea.nombre as linea,
est.nombre as estrategia,
pr.estatus as estatus,
pr.inversion as inversion,
pr.ponderacion as ponderacion,
pr.unidad_medida as u_medida,
pr.cantidad as prog_anual,
pr.prog_sem as prog_sem,
vul.descripcion as vulnerable,
pr.beneficiarios_m as ben_m,
pr.beneficiarios_h as ben_h,
pr.justificacion as justificacion,
fin.nombre as n_finalidad,
fun.nombre as funcion,
sub.nombre as subfuncion,
pr.proposito as proposito,
pp.clave,
pp.descripcion as programa_presupuestal,
pr.observaciones as observacion,
pr.pps as no_pps
from
proyectos pr
inner join eje on (pr.id_eje = eje.id_eje)
inner join linea on (pr.id_linea = linea.id_linea)
inner join estrategias as est on(pr.id_estrategia = est.id_estrategia)
inner join grupo_vulnerable as vul on(pr.g_vulnerable = vul.id_vulnerable)
inner join finalidad as fin on(pr.finalidad = fin.id_finalidad)
inner join funcion as fun on(pr.funcion = fun.id_funf AND pr.finalidad = fun.id_finalidad)
inner join subfuncion as sub on(pr.subfuncion = sub.id_subfuncion)
left  join programas_presupuestarios as pp on (pr.prog_pres = pp.id)
where id_proyecto = ".$_GET['id_proyecto'];
$ex_con = @mysql_query($consulta_proyecto,$siplan_data_conn);
$res_proyecto = mysql_fetch_assoc($ex_con);
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>SIPLAN 2019<br><small> Información del Programa presupuestario</small></h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Programa Presupuestario | <small> <strong> <?php echo $res_proyecto['num']." - ".$res_proyecto['nombre']; ?>  </strong> </small></h3>
      </div>
      <div class="box-body">
        <a href="main.php?token=c4ca4238a0b923820dcc509a6f75849b" class="btn btn-success">
          <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Programas Presupuestarios</a>
          
          <a href="rpts/info_proyecto_completo.php?id_proyecto=<?php echo $_GET['id_proyecto']; ?>" target="_blank" class="btn btn-danger"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generar PDF</a>
    <a href="rpts/info_proyecto_completo_xls.php?id_proyecto=<?php echo $_GET['id_proyecto']; ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;Exportar XLS</a>
    <a href="rpts/reporte_mir.php?id_proyecto=<?php echo $_GET['id_proyecto']; ?>" target="_blank" class="btn bg-orange"><i class="fa fa-file-text" aria-hidden="true" ></i>&nbsp;Reporte MIR</a>
	<a href="rpts/reporte_mir_xls.php?id_proyecto=<?php echo $_GET['id_proyecto']; ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;Reporte MIR XLS</a>
          <hr>
<table width="100%"  align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #DFDFDF; border-radius:4px;">
<tr bgcolor="#EDEDED">
<td style="border-bottom:solid 1px #DFDFDF; border-right:solid 1px #DFDFDF; padding:6px 6px 6px 6px;"><span style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#464646;">Información</span></td>
</tr>
<tr bgcolor="#F8F8F8">
<td style="padding:5px 5px 5px 5px;">  	
<div id="container" class="ex_highlight_row">
<div id="demo">

<table width="100%" cellspacing="0" cellpadding="2" style="border:solid 1px #ccc;">
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td width="30%">Programa Presupuestario</td>
    <td width="70%" colspan="3"> <?php echo $res_proyecto['num']." - ".$res_proyecto['nombre']; ?> 
    &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;   
    <b>NG-PPS: <?php echo $res_proyecto['no_pps']?></b></td>
      
  </tr>
    <tr style="border:solid 1px #ccc;">
        <td>Clasificación de Programa</td>
        <td><?php echo $res_proyecto['prioritario']; ?> </td>
    </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Eje</td>
    <td colspan="3"><?php echo $res_proyecto['eje'];?></td>
  </tr>
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td>Linea</td>
    <td colspan="3"><?php echo $res_proyecto['linea'];?></td>
  </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Estrategia</td>
    <td colspan="3"><?php echo $res_proyecto['estrategia'];?></td>
  </tr>
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td>Estatus</td>
    <td colspan="3"><?php
switch($res_proyecto['estatus']){
case 0:
$estatus = "Sin Aprobar";
break;
case 1:
$estatus = "Aprobado Dependencia";
break;
case 2:
$estatus = "Aprobado COEPLA";
break;
}

 echo $estatus;?></td>
  </tr>


  <tr style="border:solid 1px #ccc;">
    <td>Ponderaci&oacute;n</td>
    <td colspan="3"><?php echo $res_proyecto['ponderacion'];?></td>
  </tr>
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td>Unidad de Medida </td>
    <td colspan="3"><?php echo $res_proyecto['u_medida'];?></td>
  </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Cantidad Anual </td>
    <td><?php echo number_format($res_proyecto['prog_anual']);?></td>
    <td bgcolor="#D2EECA">Cantidad Semestral </td>
    <td><?php echo number_format($res_proyecto['prog_sem']);?></td>
  </tr>
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td>Sector Poblacional </td>
    <td colspan="3"><?php echo $res_proyecto['vulnerable'];?></td>
  </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Beneficiarios Hombres </td>
    <td><?php echo $res_proyecto['ben_h'];?></td>
    <td bgcolor="#D2EECA">Beneficiarios Mujeres </td>
    <td><?php echo $res_proyecto['ben_m'];?></td>
  </tr>
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td>Diagn&oacute;stico</td>
    <td colspan="3"><?php echo $res_proyecto['justificacion'];?></td>
  </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Prop&oacute;sito</td>
    <td colspan="3"><?php echo $res_proyecto['proposito'];?></td>
  </tr>
  
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td>Finalidad</td>
    <td colspan="3"><?php echo $res_proyecto['n_finalidad']; ?></td>
  </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Funci&oacute;n</td>
    <td colspan="3"><?php echo $res_proyecto['funcion'];?></td>
  </tr>
  <tr bgcolor="#D2EECA" style="border:solid 1px #ccc;">
    <td>Subfunci&oacute;n</td>
    <td colspan="3"><?php echo $res_proyecto['subfuncion'];?></td>
  </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Clasificación Programática </td>
    <td colspan="3"><?php echo $res_proyecto['clave'];?> - <?php echo $res_proyecto['programa_presupuestal'];?></td>
  </tr>
  <tr style="border:solid 1px #ccc;">
    <td>Observaciones</td>
    <td colspan="3"><?php echo $res_proyecto['observacion'];?></td>
  </tr>
</table>

<hr>
	<h3>Componentes y Actividades</h3>
<?php	
$consulta_componentes = "SELECT
componente.id_componente as id,
componente.no_componente as num,
componente.descripcion as nombre,
componente.unidad_responsable as responsable,
componente.cve_trasversal as transversal,
componente.ods as ods,
u_medida.nombre as unidad,
t_medida.nombre as tipo,
componente.cantidad as cantidad,
componente.ponderacion as ponderacion,
pp.clave as clave_presupuestal_com,
pp.descripcion as programa_presupuestal_com,
est.nombre as ped,
dep.acronimo as dep,
u_resp.no_u_responsable as u1,
u_resp.u_responsable as u2

From componentes as componente
inner join u_medida_prog01 as u_medida on(componente.unidad_medida = u_medida.id_unidad)
inner join tipo_unidad_prog01 as t_medida on(componente.id_tipo = t_medida.id_tipo_unidad)
left  join programas_presupuestarios as pp on (componente.prog_pres = pp.id)
inner join estrategias as est on (componente.ped_estrategia = est.id_estrategia)
inner join u_responsable as u_resp on (componente.unidad_responsable = u_resp.id_u_responsable)
inner join dependencias as dep on (dep.id_dependencia = u_resp.id_dependencia)
Where id_proyecto = ".$_GET['id_proyecto']." order by componente.no_componente";
$execute_comp = mysql_query($consulta_componentes,$siplan_data_conn);
while($res_componentes = mysql_fetch_array($execute_comp)){
    $acciones_txt = "";
    $consulta_acciones = @mysql_query("SELECT
    accion.id_accion as id,
    accion.no_accion as num,
    accion.descripcion as nombre,
    accion.ponderacion as ponderacion,
    accion.cantidad as cantidad,
    accion.per_gen,
    u_medida.nombre as unidad,
    t_medida.nombre as tipo,
    est.nombre as ped_ac
    FROM acciones as accion
    inner join u_medida_prog01 as u_medida on(accion.unidad_medida = u_medida.id_unidad)
    inner join tipo_unidad_prog01 as t_medida on(accion.id_tipo = t_medida.id_tipo_unidad)
    inner join estrategias as est on (accion.ped = est.id_estrategia)

    where id_componente  =".$res_componentes['id']." ORDER BY accion.no_accion ASC",$siplan_data_conn);
    $acciones_txt="";
    while ($res_accion=mysql_fetch_array($consulta_acciones)) {
	$id_accion = $res_accion['id'];
	$consulta_metas = mysql_query("SELECT * FROM metas WHERE id_accion = ".$id_accion,$siplan_data_conn) or die (mysql_error());
	$res_metas = mysql_fetch_array($consulta_metas);
	$consulta_resultados = mysql_query("SELECT * FROM resultados WHERE id_accion = ".$id_accion,$siplan_data_conn) or die (mysql_error());
	$res_resultados = mysql_fetch_array($consulta_resultados);
	if ($res_accion['per_gen']==1){$perspg="Si";}else{$perspg="No";}
	$acciones_txt=$acciones_txt."<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
     <td width='5%'bgcolor='#ECF9F1'>Actividad</td>
    <td width='70%'>".(int)$res_accion['num']." - ".$res_accion['nombre']."</td>
    <td width='5%'bgcolor='#ECF9F1'>PED</td>
    <td width='5%'>".substr($res_accion['ped_ac'],0,6)."</td>
    
      <td width='15%'bgcolor='#ECF9F1'>Perspectiva de Género</td>
       <td width='3%'>".$perspg."</td>

  </tr>
  </table>
  <table width='100%' border='1' cellspacing='0' cellpadding='2'>  
    <td bgcolor='#ECF9F1'>Ponderaci&oacute;n</td>
    <td>".$res_accion['ponderacion']."</td>
    <td bgcolor='#ECF9F1'>Cantidad</td>
    <td>".$res_accion['cantidad']."</td>
    <td bgcolor='#ECF9F1'>Unidad de Medida </td>
    <td>".$res_accion['unidad']."</td>
    <td bgcolor='#ECF9F1'>Tipo de Medida </td>
    <td>".$res_accion['tipo']."</td>
  </tr>
</table>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='20%' bgcolor='#ECF9F1'>Mes</td>
    <td width='6%' bgcolor='#ECF9F1'>Enero</td>
    <td width='7%' bgcolor='#ECF9F1'>Febrero</td>
    <td width='6%' bgcolor='#ECF9F1'>Marzo</td>
    <td width='6%' bgcolor='#ECF9F1'>Abril</td>
    <td width='6%' bgcolor='#ECF9F1'>Mayo</td>
    <td width='7%' bgcolor='#ECF9F1'>Junio</td>
    <td width='7%' bgcolor='#ECF9F1'>Julio</td>
    <td width='7%' bgcolor='#ECF9F1'>Agosto</td>
    <td width='7%' bgcolor='#ECF9F1'>Septiembre</td>
    <td width='7%' bgcolor='#ECF9F1'>Octubre</td>
    <td width='7%' bgcolor='#ECF9F1'>Noviembre</td>
    <td width='7%' bgcolor='#ECF9F1'>Diciembre</td>
  </tr>
  <tr>
    <td bgcolor='#ECF9F1'>Metas</td>
    <td>".$res_metas['enero_m']."</td>
    <td>".$res_metas['febrero_m']."</td>
    <td>".$res_metas['marzo_m']."</td>
    <td>".$res_metas['abril_m']."</td>
    <td>".$res_metas['mayo_m']."</td>
    <td>".$res_metas['junio_m']."</td>
    <td>".$res_metas['julio_m']."</td>
    <td>".$res_metas['agosto_m']."</td>
    <td>".$res_metas['septiembre_m']."</td>
    <td>".$res_metas['octubre_m']."</td>
    <td>".$res_metas['noviembre_m']."</td>
    <td>".$res_metas['diciembre_m']."</td>
  </tr>
  <tr>
    <td bgcolor='#ECF9F1'>Resultados</td>
    <td>".$res_resultados['enero_r']."</td>
    <td>".$res_resultados['febrero_r']."</td>
    <td>".$res_resultados['marzo_r']."</td>
    <td>".$res_resultados['abril_r']."</td>
    <td>".$res_resultados['mayo_r']."</td>
    <td>".$res_resultados['junio_r']."</td>
    <td>".$res_resultados['julio_r']."</td>
    <td>".$res_resultados['agosto_r']."</td>
    <td>".$res_resultados['septiembre_r']."</td>
    <td>".$res_resultados['octubre_r']."</td>
    <td>".$res_resultados['noviembre_r']."</td>
    <td>".$res_resultados['diciembre_r']."</td>
  </tr>
</table>";
mysql_free_result($consulta_metas);
unset($res_metas);
mysql_free_result($consulta_resultados);
unset($res_resultados);
}

    $contenido="";
    $ods_texto = '';
   if( (int)$res_componentes['transversal'] == 1 || (int)$res_componentes['transversal'] == 3 || (int)$res_componentes['transversal'] == 5 || (int)$res_componentes['transversal'] == 7  ){
       $ods_opciones_arr = array(
 'Fin de la Pobreza',
 'Hambre Cero',
 'Salud y Bienestar',
 'Educación de Calidad',
 'Igualdad de Género',
 'Agua Limpia y Saneamiento',
 'Energía Asequible y no Contaminante',
 'Trabajo Decente y Crecimiento Económico',
 'Industria, Innovación e Infraestructura',
 'Reducción de las Desigualdades',
 'Ciudades y Comunidades Sostenibles',
 'Producción y Consumo Responsable',
 'Acción por el Clima',
'Vida Submarina',
 'Vida de Ecosistemas Terrestres',
 'Paz, Justicia e Instituciones Solidas',
 'Alianzas para lograr los objetivos');

       $ods_opciones_registradas = explode(",",$res_componentes['ods']);
       $ods_texto = "<b>Objetivos de Desarrollo Sostenible</b><br>";
       for ($x = 0; $x < count($ods_opciones_registradas); $x++){
           $index = $ods_opciones_registradas[$x] - 1;
           if($index >= 0){
           $ods_texto.= "&nbsp;&nbsp;".$ods_opciones_registradas[$x]." - ".$ods_opciones_arr[$index]."<br>";
           }
       }

       if((int)$res_componentes['transversal'] == 3){
           $ods_texto .= "<b>Prevención Social del Delito</b><br>";
        }

       if((int)$res_componentes['transversal'] == 5){
           $ods_texto .= "<b>Niñas, Niños y Adolescentes</b><br>";
        }

       if((int)$res_componentes['transversal'] == 7){
           $ods_texto .= "<b>Prevención Social del Delito</b><br>";
           $ods_texto .= "<b>Niñas, Niños y Adolescentes</b><br>";
        }
   }

if((int)$res_componentes['transversal'] == 2){
    $ods_texto = "<b>Prevención Social del Delito</b><br>";
}

if((int)$res_componentes['transversal'] == 4){
    $ods_texto = "<b>Niñas, Niños y Adolescentes</b><br>";
}

if((int)$res_componentes['transversal'] == 6){
    $ods_texto = "<b>Prevención Social del Delito</b><br>";
    $ods_texto .= "<b>Niñas, Niños y Adolescentes<br>";
}

$contenido =$contenido."<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td colspan='6' bgcolor='#D4D0C8'><div align='center'><strong>Componente</strong></div></td>
  </tr>
</table>  
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='10%' bgcolor='#E3E9D1' >Componente</td>
    <td width='90%'> ".(int)$res_componentes['num']." - ".$res_componentes['nombre']."</td>
  </tr>
</table>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>

  <tr>
    <td width='10%' bgcolor='#E3E9D1' >PED</td>
    <td width='10%'> ".substr($res_componentes['ped'],0,6)."</td>
    <td width='20%' bgcolor='#E3E9D1' >Clasificación Programática</td>
    <td width='50%'> ".$res_componentes['clave_presupuestal_com']." - ".$res_componentes['programa_presupuestal_com']."</td>
  </tr>
</table>  

<table width='100%' border='1' cellspacing='0' cellpadding='2'>
<tr>
    <td width='20%' bgcolor='#E3E9D1' >Transversalidad</td>
    <td width='80%'>".$ods_texto."</td>
</tr>
</table>

<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='14%' bgcolor='#E3E9D1'>Ponderacion</td>
    <td width='8%'>".$res_componentes['ponderacion']."</td>
    <td width='14%' bgcolor='#E3E9D1'>Unidad Responsable </td>
    <td width='64%'><b>".$res_componentes['dep']."</b>: ".$res_componentes['u1']." - ".$res_componentes['u2']."</td>
  </tr>
</table>
<table width='100%' border='1' cellspacing='0' cellpadding='2'>
  <tr>
    <td width='15%' bgcolor='#E3E9D1'>Unidad de Medida </td>
    <td width='27%'>".$res_componentes['unidad']."</td>
    <td width='10%' bgcolor='#E3E9D1'>Tipo de Medida </td>
    <td width='25%'>".$res_componentes['tipo']."</td>
    <td width='7%' bgcolor='#E3E9D1'>Cantidad</td>
    <td width='16%'>".$res_componentes['cantidad']."</td>
  </tr>
  <tr>
    <td colspan='6' bgcolor='#D4D0C8'><div align='center'><strong>Actividad</strong></div></td>
  </tr>
 </table>
      ".$acciones_txt."
<hr>";
echo $contenido;
}
?>
</div>
</div></td></tr></table></div>
<p>&nbsp;</p>

</div></div>

          
          
          
          
          
          
        </div>
      </div>
    </section>
</div>

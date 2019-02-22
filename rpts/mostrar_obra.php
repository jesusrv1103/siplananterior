<?php session_start();

$id_obra=$_GET['d'];

if ($id_obra!="" and $_SESSION['id_dependencia_v3']!=""){
	
		function mes($mes){
if ($mes=="01") $mes="Ene";
if ($mes=="02") $mes="Feb";
if ($mes=="03") $mes="Mar";
if ($mes=="04") $mes="Abr";
if ($mes=="05") $mes="May";
if ($mes=="06") $mes="Jun";
if ($mes=="07") $mes="Jul";
if ($mes=="08") $mes="Ago";
if ($mes=="09") $mes="Sep";
if ($mes=="10") $mes="Oct";
if ($mes=="11") $mes="Nov";
if ($mes=="12") $mes="Dic";
 return $mes;
}
	
		function fechames($fechav){
			
			if ($fechav!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechav);
    return $d."-".mes($m)."-".$a;
	}else{
		return "No hay";
		}
			
}



//include('../copladez/obras/classes/c_obra.php');
//include('../copladez/obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
//$c=new obras;
//$f=new funciones;
$id_dependencia=$_SESSION['id_dependencia_v3'];


     $opds = array("61", "62", "63", "69", "71", "74", "75", "76","77","78");
          if (in_array($_SESSION['id_dependencia_v3'], $opds)) {
$consulta_obra = mysql_query("
SELECT  obras.tipo_obra,obras.prgs, obras.id_actividad,
componentes.id_componente,
obras.obra,obras.latitud,
f_convertDDtoDMS(`obras.latitud`, FALSE) AS lat1,
obras.longitud,
f_convertDDtoDMS(obras.longitud, TRUE) AS long1,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen".$_SESSION['id_dependencia_v3'].".c08c_tipori) as nom_origen,
origen".$_SESSION['id_dependencia_v3'].".s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen".$_SESSION['id_dependencia_v3']." ON obras.origen = origen".$_SESSION['id_dependencia_v3']." .s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector

 where obras.id_obra=".$id_obra." and obras.id_dependencia=".$id_dependencia."  group by obras.id_obra"  );// or die (mysql_error());
}else{
$consulta_obra = mysql_query("SELECT  obras.tipo_obra,obras.prgs, obras.id_actividad,
componentes.id_componente,
f_convertDDtoDMS(obras.latitud, FALSE) AS lat1,
obras.longitud,
f_convertDDtoDMS(obras.longitud, TRUE) AS long1,
obras.obra,obras.latitud,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.nombre) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_muni,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as cvprg,
(programas_poa.descripcion) as nom_ppoa,
(subprogramas_poa.clave) as cvsprg,
(subprogramas_poa.descripcion) as sppoa,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector

 where obras.id_obra=".$id_obra." and obras.id_dependencia=".$id_dependencia."  group by obras.id_obra"  );// or die (mysql_error());
}

$res= mysql_fetch_array($consulta_obra);




if ($res){

}else{
echo '<script type="text/javascript">';
echo 'alert ("Hubo errores");';
echo 'window.close();';
echo 'window.location="main.php?token=c9f0f895fb98ab9159f51fd0297e236d"; ';
echo '</script>';
}


}

?>



  <link rel="stylesheet" href="../css/jquery-ui.css" />
 <script type="text/javascript" language="javascript" src="js/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>

 
 
<title>Cédula de Información Básica - Obra <?php echo $res['obra'];?></title>

<div style="margin-left:20px; margin-right:20px;">
<h2>Cédula de Información Básica</h2> <li><a href="reporte_obra.php?d=<?php echo $_GET['d']."" ?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
<div id="cuadro_info">

    
 <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td  colspan="2"><b>Dependencia:</b></td>
    <td  colspan="2"><?php echo $res['nom_dep'];?></td>
    <td colspan="2"><b>Sector:</b></td>
    <td colspan="2"><?php echo $res['id_sector'];?></td>
    <td colspan="2"><?php echo " ".($res['sector']);?></td>
   
  </tr>
</table>
   <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td  colspan="2"><b>Clave de la Obra:</b>  </td>
    <td  colspan="2"><?php echo $res['obra'];?></td>
    <td  colspan="2"><b>Obra:</b> </td>
    <td  colspan="4"><?php echo ($res['nom_obra']);?> <b> Priorización: </b><?php echo ($res['prioridad']);?> <b> Tipo: </b><?php if ($res['tipo_obra']==1){
	echo "Obra";
	}elseif($res['tipo_obra']==2){
	echo "Acción";
	}?></td>
  </tr>
</table>
      <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"> <b>Programa:	 </b>
	<td colspan="8"><?php echo ($res['no_proyecto']." ".$res['nom_proy']);?></td></td>
  </tr>
  <tr>
</table>
   <hr />
 <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"> <b>Componente: </b>
	<td colspan="8"><?php echo ($res['no_componente']." ".$res['nom_com']);?></td></td>
     </tr>
  <tr>
  </table>
   <hr />  
   <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"> <b>Actividad: </b>
	<td colspan="8"><?php

			
	 echo ($res['no_accion']." ".$res['nom_act']);?></td></td>
     </tr>
  <tr>
  </table>
   <hr />    
   <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"> <b>Origen:	 </b>
	<td colspan="8"><?php echo $res['s08c_origen']." ".($res['nom_origen']);?></td></td>
     </tr>
  <tr>
  </table>
   <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
    <td colspan="2"><b>Eje: </b></td>
    <td colspan="2"><?php echo ($res['eje']);?></td>
    <td colspan="2"><b>L&iacute;nea: </b></td>
      <td colspan="4"><?php 
$res_consulta_cmp=mysql_query("select * from componentes where id_componente=".$res['id_componente']);
   $dat_consulta_cmp= mysql_fetch_assoc($res_consulta_cmp);

    
   $res_consulta_ln= mysql_query("select * from linea where id_linea=".$dat_consulta_cmp['ped_linea']);
    $dat_consulta_ln= mysql_fetch_assoc($res_consulta_ln);
   
    $linea=$dat_consulta_ln['nombre'];

echo $linea; //($res['nom_linea']);

?></td>
 
  </tr>
</table>
   <hr />
   <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
    <td colspan="2" ><b>Estrategia:</b></td>
    <td colspan="8"><?php 
   $res_consulta_act= mysql_query("select * from acciones where id_accion=".$res['id_actividad']);
       $dat_consulta_act= mysql_fetch_assoc($res_consulta_act);

    $res_consulta_str=mysql_query("select * from estrategias where id_estrategia=".$dat_consulta_act['ped']);
     $dat_consulta_str= mysql_fetch_assoc($res_consulta_str);

 $estr=$dat_consulta_str['nombre'];

echo $estr; //($res['nom_estr']);

?></td>
   
  </tr>
  </table>
   <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td><b>Municipio: </b></td>


  <td ><?php
	
	 echo ($res['id_municipio']);?></td>
    <td ><?php echo ($res['nom_muni']);?></td>
 
     <td><b>Localidad: </b></td>
	  
    <td ><?php echo ($res['id_finanzas']);?></td>
    <td ><?php echo ($res['nom_loc']);?></td>
<td><b>Marginación:</b>
       <?php $marg= mysql_query("select descripcion from marginacion inner join  localidades on marginacion.id_marginacion=localidades.id_marginacion where localidades.id_municipio=".$res['id_municipio']." and localidades.id_finanzas=".$res['id_finanzas']);
                $marg_t=mysql_fetch_array($marg);
                echo $marg_t['descripcion'];
?>
        </td>


      <td><b>Regi&oacute;n: </b></td>
    <td ><?php echo ($res['id_region']);?></td>
    <td  colspan="2" ><?php echo ($res['nom_reg']);?></td>
  </tr>
</table>
      <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
  
    <?php if ($res['modalidad']=='1'){
	  $v1='Administraci&oacute;n';}
	  if ($res['modalidad']=='2'){
	  $v1='Contrato';}
	  if ($res['modalidad']=='3'){
	  $v1='Mixto';}
	  ?>
    
	   <?php if ($res['retencion']=='1'){
	  $r1='Ninguna';}
	  if ($res['retencion']=='2'){
	  $r1='Al millar';}
	  if ($res['retencion']=='3'){
	  $r1='5 al millar';}
	    if ($res['retencion']=='4'){
	  $r1='1 y 5 al millar';}
	  ?>
       
  <tr>
    <td><b>Modalidad: </b></td>
    <td colspan="2" ><?php echo ($v1);?></td>
     <td><b>Retenci&oacute;n: </b></td>
    <td colspan="2" ><?php echo ($r1);?></td>
     <td><b>Ben H: </b></td>
    <td ><?php echo number_format($res['ben_h']);?></td>
     <td><b>Ben M: </b></td>
    <td ><?php echo number_format($res['ben_m']);?></td>
  </tr>
</table>
     <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
      <tr>
    <td><b>Cantidad: </b></td>
    <td ><?php echo number_format($res['cantidad'],2);?></td>
      <td><b>Unidad de Medida: </b></td>
    <td colspan="3" ><?php echo ($res['nom_med']);?></td>
      <td><b>Fecha inicio: </b></td>
    <td ><?php echo fechames($res['fecha_inicio']);?></td>
      <td><b>Fecha fin: </b></td>
    <td ><?php echo fechames($res['fecha_fin']);?></td>
      </tr>
</table>
       <hr />
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
        <tr>
    <td colspan="2"><b>Programa: </b></td>
    <td colspan="3" ><?php echo ($res['cvprg']." ".$res['nom_ppoa']);?></td>
     <td colspan="2"><b>Subprograma: </b></td>
    <td colspan="3" ><?php echo ($res['cvsprg']." ".$res['sppoa']);?></td>
      </tr>
      </table>
 <hr />

      

       <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">

       <tr>

    <td colspan="2"><b>Estrategia de la Inclusión Social: </b><?php 

    

     $ids = explode(',',$res['prgs']);

     

       if (in_array("0", $ids)) {

		$insc='Si';

}else{

	$insc='No Aplica';

	}

	

    echo ($insc);

    ?></td>

    <td colspan="3" align="left"></td>

      <td colspan="2"></td>

    <td colspan="3" ></td>

      </tr>

</table>


       <hr />
       <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
          <tr>
			  
    <td colspan="2"><b>Coordenas Geográficas: </b></td>
     <td colspan="3" ><b> <a  style="text-decoration:none; color:#green" <?php echo 'href="https://maps.google.com/maps?&z=10&q='.$res['latitud'].'+'.$res['longitud'].'&ll='.$res['latitud']."+".$res['longitud'].'"';?> target="_blank"><?php echo ($res['latitud'].",".$res['longitud']);?></a> (<?php echo $res['lat1'].",".$res['long1']; ?>)</b></td>
      <td colspan="2"></td>
    <td colspan="3" ></td>
      </tr>
          
</table>

     <hr />


   
	
	 <h3><p>Aportes Programado</p></h3>

<table width="80%" align="center" border="1" cellspacing="0" cellpadding="2">
      <tr>
        <td width="15%"><b>Aporte Federal</b></td>
      <td >  <?php echo "$ ".number_format($res['federal'],2);?></td>
        <td width="21%"><b>Aporte Participaciones</b></td>
     <td>    <?php echo "$ ".number_format($res['participantes'],2);?></td>
      </tr>
      <tr>
        <td><b>Aporte Estatal</b></td>
    <td>   <?php echo "$ ".number_format($res['estatal'],2);?></td>
        <td><b>Aporte Cr&eacutedito</b></td>
	<td>	<?php echo "$ ".number_format($res['credito'],2);?></td>
      
      </tr>
      <tr>
        <td><b>Aporte Municipal</b></td>
      <td>  <?php echo "$ ".number_format($res['municipal'],2);?></td>
        <td><b>Aporte Otros</b></td>
      <td> <?php echo "$ ".number_format($res['otros'],2);?></td>
      </tr>
</table>
  <br>
   <div align="center" ><h3>Total Programado: <?php echo "$ ".number_format(($res['federal']+$res['estatal']+$res['participantes']+$res['credito']+$res['municipal']+$res['otros']),2); ?></h3> </div>
   <p>&nbsp;</p>
	    

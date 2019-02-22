<?php session_start();


$ap=$_GET['ap'];
$dp=$_GET['dep'];
$prg=$_GET['prg'];
$subprg=$_GET['subprg'];

if (  $subprg!="" and  $_SESSION['id_dependencia_v3']!="" or $prg!="" and  $_SESSION['id_dependencia_v3']!="") {
//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require_once ("libchart/classes/libchart.php");
}
//$c=new  obras;
//$f=new funciones;
?>
<?php

?>
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
</style>

<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
					  var oTable = $('#example9').dataTable( {
		"sDom": '"clear"&gt;',
		"iDisplayLength": -1,
        
		 "oLanguage": {
           "sLengthMenu": '',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
           
            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"
            
        },
		
		"bSort": false
		
   
		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/
		 
    });
	
	  
 
} );			
				
		/*		
				  var oTable = $('#example9').dataTable( {
		"sDom": '"clear"&gt;',
		"iDisplayLength": -1,
        
		 "oLanguage": {
           "sLengthMenu": '',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
           
            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"
            
        },
		
		"bSort": false
		
   */
		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/
		 
   // });
	
	  
 
//} );			
</script>


   <link rel="stylesheet" href="../css/jquery-ui.css" />
 
  <script type="text/javascript" language="javascript" src="../js/jquery-ui.js"></script>


<div id="obras"  style=" border-radius: 15px; background-color:white;	 -moz-border-radius: 5px 10px;    overflow:auto; width: 95%; height :450px; align:center;" >

<table  width="100%" cellpadding="0" cellspacing="0" border="0"  >
 <thead>
    <tr style="font-size:13px; background-color:#CCC;">
    <td rowspan="2" width="auto"><b>SECTOR</b></td>
    <td rowspan="2" width="auto"><b>DEP. </b></td>
    <td rowspan="2" width="auto"><b>FONDO O MOD. DE INV.</b></td>
     <td rowspan="2" width="auto"><b>PROG.</b></td>
      <td rowspan="2" width="auto"><b>SUBPROG.</b></td>
    <td rowspan="2" width="auto"><b>DESCRIPCIÓN</b></td>
    <td rowspan="2" width="auto"><b>MUN.</b></td>
    <td rowspan="2" width="auto"><b>LOC.</b></td>
    <td colspan="7" align="center" width="auto"><b>INVERSIÓN TOTAL <?php if ($ap==1){echo "APROBADA";}else{ echo "PROGRAMADA";}  ?></b></td>
    <td colspan="2" align="center" width="auto"><b>METAS TOTALES</b></td>
    <td colspan="2" align="center" width="auto"><b>BENEF.</b></td>
    <td width="80"><b>PED</b></td>
     <td width="80"><b>Grado de</b> </td>
  </tr>
  <tr style="font-size:13px; background-color:#CCC;">
    <td width="auto"><b>Total</b></td>
    <td width="auto"><b>Federal</b></td>
    <td width="auto"><b>Estatal</b></td>
    <td width="auto"><b>Municipal</b></td>
    <td width="auto"><b>Partic.</b></td>
    <td width="auto"><b>Créditos</b></td>
    <td width="auto"><b>Otros</b></td>
    <td width="auto"><b>MEDIDA</b></td>
    <td width="auto"><b>PROG.</b></td>
    <td width="auto"><b>H</b></td>
    <td width="auto"><b>M</b></td>
    <td width="auto"><b>E/L/E</b></td>
      <td width="auto"><b>Marginación</b></td>
  </tr>
  </thead>
  <tbody>
  <?php
  $tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;
	
	  if($ap=='1' and $dp!="prg" and $dp!="subprg" and $subprg!="") {
	 //ya 1
	  		  $con_o="SELECT `localidades`.`id_marginacion`, `obras`.`programa_poa`, `obras`.`subprograma_poa`, `obras`.`id_obra`, `obras`.`descripcion` AS `nom_obra`, `sectores`.`sector`, `dependencias`.`acronimo` AS `nom_dep`, `origen`.`c08c_tipori` AS `nom_origen`, `municipios`.`nombre` AS `nom_mun`, `localidades`.`nombre` AS `nom_loc`, `obras`.`federal`, `obras`.`estatal`, `obras`.`municipal`, `obras`.`participantes`, `obras`.`credito`, `obras`.`otros`, `unidad_medida_prog02`.`descripcion` AS `nom_med`, `obras`.`cantidad`, `obras`.`ben_h`, `obras`.`ben_m`, `estrategias`.`nombre` AS `nom_estr`, `dependencias`.`id_dependencia`, `proyectos`.`no_proyecto`, `subprogramas_poa`.`clave` AS `subprgcv`, `subprogramas_poa`.`descripcion` AS `subdsc`, `programas_poa`.`clave` AS `prgcv`, `programas_poa`.`descripcion` AS `prgdsc`, `regiones`.`id_region`, `regiones`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`
	  		 FROM obras
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
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
	  		  
	  		 WHERE 
	  		 `dependencias`.`acronimo` = '".$_GET['dep']."' AND obras.subprograma_poa = ".$_GET['subprg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	         AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
          OR  `dependencias`.`acronimo` = '".$_GET['dep']."' AND obras.subprograma_poa = ".$_GET['subprg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	         AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  
          group by obras.id_obra
	  		 ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";}
	  		 
	  elseif($ap=='1' and $dp!="prg" and $dp=="subprg" and $subprg!="") {
	  			  $con_o="SELECT `localidades`.`id_marginacion`, `obras`.`programa_poa`, `obras`.`subprograma_poa`, `obras`.`id_obra`, `obras`.`descripcion` AS `nom_obra`, `sectores`.`sector`, `dependencias`.`acronimo` AS `nom_dep`, `origen`.`c08c_tipori` AS `nom_origen`, `municipios`.`nombre` AS `nom_mun`, `localidades`.`nombre` AS `nom_loc`, `obras`.`federal`, `obras`.`estatal`, `obras`.`municipal`, `obras`.`participantes`, `obras`.`credito`, `obras`.`otros`, `unidad_medida_prog02`.`descripcion` AS `nom_med`, `obras`.`cantidad`, `obras`.`ben_h`, `obras`.`ben_m`, `estrategias`.`nombre` AS `nom_estr`, `dependencias`.`id_dependencia`, `proyectos`.`no_proyecto`, `subprogramas_poa`.`clave` AS `subprgcv`, `subprogramas_poa`.`descripcion` AS `subdsc`, `programas_poa`.`clave` AS `prgcv`, `programas_poa`.`descripcion` AS `prgdsc`, `regiones`.`id_region`, `regiones`.`nombre`, `poa02_origen`.`status_of`, `poa02_origen`.`id_oficio` 
	  			  FROM obras
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
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
	  			   WHERE  
	  			    obras.subprograma_poa = ".$_GET['subprg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
               OR  
	  			   obras.subprograma_poa = ".$_GET['subprg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	
               group by obras.id_obra	   
	  			  ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";	  }
	  			  
	  			  
	  			   elseif($ap=='1' and $dp=="prg" and $dp!="subprg" and $prg!="") {
	  			  $con_o="SELECT `localidades`.`id_marginacion`, `obras`.`programa_poa`, `obras`.`subprograma_poa`, `obras`.`id_obra`, `obras`.`descripcion` AS `nom_obra`, `sectores`.`sector`, `dependencias`.`acronimo` AS `nom_dep`, `origen`.`c08c_tipori` AS `nom_origen`, `municipios`.`nombre` AS `nom_mun`, `localidades`.`nombre` AS `nom_loc`, `obras`.`federal`, `obras`.`estatal`, `obras`.`municipal`, `obras`.`participantes`, `obras`.`credito`, `obras`.`otros`, `unidad_medida_prog02`.`descripcion` AS `nom_med`, `obras`.`cantidad`, `obras`.`ben_h`, `obras`.`ben_m`, `estrategias`.`nombre` AS `nom_estr`, `dependencias`.`id_dependencia`, `proyectos`.`no_proyecto`, `subprogramas_poa`.`clave` AS `subprgcv`, `subprogramas_poa`.`descripcion` AS `subdsc`, `programas_poa`.`clave` AS `prgcv`, `programas_poa`.`descripcion` AS `prgdsc`, `regiones`.`id_region`, `regiones`.`nombre`, `poa02_origen`.`status_of`, `poa02_origen`.`id_oficio` 
	  			  FROM obras
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
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
	  			   WHERE 
	  			    obras.programa_poa = ".$_GET['prg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
               OR   obras.programa_poa = ".$_GET['prg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	
               group by obras.id_obra	   
	  			  ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";	  }

	  		
elseif($ap=='' and $dp!="prg" and $dp!="subprg" and $subprg!="") {
	 //ya 		
	   $con_o="
	  	SELECT
obras.obra,
obras.id_obra,
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
sectores.id_sector,
obras.latitud,
obras.longitud
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
	  	
	  	
	  	
	  	 WHERE dependencias.acronimo = '".$_GET['dep']."' AND obras.subprograma_poa = ".$_GET['subprg']." AND obras.status_obra >= '3' 
	  	 ORDER BY dependencias.id_dependencia ASC, proyectos.no_proyecto ASC, obras.id_obra ASC";
	 		}	 
	  		
	  		elseif($ap=='' and $dp=="subprg" and $subprg!="") {
	  //ya		
	     $con_o="SELECT localidades.id_marginacion, obras.programa_poa, obras.subprograma_poa, obras.id_obra, obras.descripcion AS nom_obra, sectores.sector, dependencias.acronimo AS nom_dep, origen.c08c_tipori AS nom_origen, municipios.nombre AS nom_mun, localidades.nombre AS nom_loc, obras.federal, obras.estatal, obras.municipal, obras.participantes, obras.credito, obras.otros, unidad_medida_prog02.descripcion AS nom_med, obras.cantidad, obras.ben_h, obras.ben_m, estrategias.nombre AS nom_estr, dependencias.id_dependencia, proyectos.no_proyecto,(subprogramas_poa.clave) as subprgcv, (subprogramas_poa.descripcion) as subdsc, (programas_poa.clave) as prgcv, (programas_poa.descripcion) as prgdsc , regiones.id_region
	  	  FROM  obras
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
	  	 
	  	 WHERE
	  	 obras.subprograma_poa = ".$_GET['subprg']." AND obras.status_obra >= '3' 
	  	 ORDER BY dependencias.id_dependencia ASC, proyectos.no_proyecto ASC, obras.id_obra ASC";
	 	  		}	
	 	  		
	 	  		 		elseif($ap=='' and $dp=="prg" and $prg!="") {
	  //ya		
	     $con_o="SELECT localidades.id_marginacion, obras.programa_poa, obras.subprograma_poa, obras.id_obra, obras.descripcion AS nom_obra, sectores.sector, dependencias.acronimo AS nom_dep, origen.c08c_tipori AS nom_origen, municipios.nombre AS nom_mun, localidades.nombre AS nom_loc, obras.federal, obras.estatal, obras.municipal, obras.participantes, obras.credito, obras.otros, unidad_medida_prog02.descripcion AS nom_med, obras.cantidad, obras.ben_h, obras.ben_m, estrategias.nombre AS nom_estr, dependencias.id_dependencia, proyectos.no_proyecto,(subprogramas_poa.clave) as subprgcv, (subprogramas_poa.descripcion) as subdsc, (programas_poa.clave) as prgcv, (programas_poa.descripcion) as prgdsc , regiones.id_region
	  	  FROM obras
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
	  	 WHERE 
	  	 
	  	  obras.programa_poa = ".$_GET['prg']." AND obras.status_obra >= '3' 
	  	 ORDER BY dependencias.id_dependencia ASC, proyectos.no_proyecto ASC, obras.id_obra ASC";
	 	  		}	  	
	 	  		
	 	  		
	 	  		
	  		
	  		 
	
	
   
  
  $i=0;
  $tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	function grado($gra){
		switch ($gra){
			
			case "1":
			return ("Muy Bajo");
			break;
			case "2":
			return ("Bajo");
			break;
			case "3":
			return ("Medio");
			break;
			case "4":
			return ("Alto");
			break;
			case "5":
			return ("Muy Alto");
			break;
			}
	}
	$consulta_obr=mysql_query($con_o) or die (mysql_error()); //,$siplan_data_conn
//	echo var_dump($consulta_obr);
		
	    while ($resobr = mysql_fetch_assoc($consulta_obr)) {
	  //sumar aporte programados
	  
	  $suma_prg=$resobr['federal']+$resobr['estatal']+$resobr['municipal']+$resobr['participantes']+$resobr['credito']+$resobr['otros'];
 	$totalp= number_format($suma_prg,2);
 

 //termina suamr aportes programasdos
 $PED=substr($resobr['nom_estr'],0,5);
 
// switch ($resobr['status_obra']){
		/*   case 1:
		   $status = "Sin Aprobar";
		   $css_color = "gradeX";
		   break;
		   case 2:
		   $status = "Aprob. Dependencia";
		   $css_color = "gradeB";
		   break;
		   case 3:
		   $status = "Aprob. UPLA";*/
		   if ($i%2==0){
		   $css_color = "gradeA even";
		  // break;   
		//    case 4:
		//   $status = "Con Oficio de Ejec.";
		   }else{
		   $css_color = "gradeA odd";
		   }
		//   break; 
	//   }

  $con_fondo="select HIGH_PRIORITY origen.c08c_tipori,origen.s08c_origen, poa02_origen.id_obra, poa02_origen.s08c_origen, poa02_origen.id_obra_origen   

				from poa02_origen inner join origen on poa02_origen.s08c_origen=origen.s08c_origen 

				where poa02_origen.id_obra=".$resobr['id_obra']." and poa02_origen.status_of = 2 AND poa02_origen.id_oficio != 0 
				
				and ( `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 OR `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 )
				
				group by poa02_origen.s08c_origen 

				order by poa02_origen.id_obra_origen";

	

       $consulta_fondo=mysql_query($con_fondo) or die (mysql_error()); 

		$fondo="";

	    while ($re_fondo = mysql_fetch_assoc($consulta_fondo)) {

		$fondo.=$re_fondo['c08c_tipori'].", ";

		}

		$fondo=substr($fondo,0,(strlen($fondo)-2));
  ?>
  
 <tr  onclick="window.open('mostrar_obra_fuente.php?d=<?php echo $resobr['id_obra']; ?>','_blank')"   class=" <?php echo $css_color;  ?>"  style="font-size:12.3px" >
   <td align="justify"><?php echo $resobr['sector']; ?></td> 
    <td align="right"><?php echo ($resobr['nom_dep']); ?></td>
	<td abbr="right"><?php if($ap==1){

	 echo  $fondo; } else { echo $resobr['nom_origen']; }  ?></td>
	<td abbr="right"><?php echo $resobr['prgcv']." ".$resobr['prgdsc'];?></td>
	<td abbr="right"><?php echo $resobr['subprgcv'].", ".$resobr['subdsc'];?></td>
	
    <td abbr="right"><?php echo $resobr['nom_obra'];?></td>
    <td abbr="right"><?php echo $resobr['nom_mun'];?></td>
    <td abbr="right"><?php echo $resobr['nom_loc'];?></td>
    
    
   <?php   if ($ap==1) {
	   
	  
	  

	   $sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen"); 
	
	
	$totals=0;
	$federal=0;
	$estatal=0;
	$municipal=0;
	$particip=0;
	$credito=0;
	$otros=0;
	$orige_n=0;
	while($res_aporte_eje = mysql_fetch_assoc($sac_aportes_eje))
	{ 
	  $orige_n= substr($res_aporte_eje['s08c_origen'],-4,4);
	 	 
		
	switch($orige_n)
	{
	  case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal + $res_aporte_eje['sumamonto'];
	  break;

	  case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal + $res_aporte_eje['sumamonto'];
	  break;
	  
	  case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal + $res_aporte_eje['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros +  $res_aporte_eje['sumamonto'];
	  break;  
	  
	}

	}
	

	////termina ejecuciones***
	
	

	
	
		$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen");
	
	  $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{ 
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);
	  
	  
		
	switch($orige_n)
	{
	case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal + $res_aporte_amp['sumamonto'];
	  break;

	   case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal + $res_aporte_amp['sumamonto'];
	  break;
	  
	  case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal + $res_aporte_amp['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros +  $res_aporte_amp['sumamonto'];
	  break;  
	  
	}

	}
	
		
	////termina ampliaciones
	
	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen");
	
	
	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{ 
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);
	 	 
		
	switch($orige_n)
	{
	case ($orige_n >=1000 && $orige_n <=1999):
	  $estatal= $estatal - $res_aporte_can['sumamonto'];
	  break;

	  case ($orige_n >=2000 && $orige_n <=2999):
	  $federal= $federal - $res_aporte_can['sumamonto'];
	  break;
	  
	 case ($orige_n >=3000 && $orige_n <=3999):
	  $municipal= $municipal - $res_aporte_can['sumamonto'];
	  break;
	  
	  default:
	  $otros = $otros -  $res_aporte_can['sumamonto'];
	  break;  
	  
	}

	}
	$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;
	   
	   ?>
   
   
   
   
   
       <td abbr="right"><?php echo   number_format($totals,2);?></td>
     <td abbr="right"><?php echo number_format($federal,2);?></td>
    <td abbr="right"><?php echo number_format($estatal,2);?></td>
     <td abbr="right"><?php echo number_format($municipal,2);?></td>
      <td abbr="right"><?php echo number_format($particip,2);?></td>
       <td abbr="right"><?php echo number_format($credito,2);?></td>
        <td abbr="right"><?php echo number_format($otros,2);?></td>
   <?php } else { ?>
       <td abbr="right"><?php echo $totalp;?></td>
  <td abbr="right"><?php echo number_format($resobr['federal'],2);?></td>
    <td abbr="right"><?php echo number_format($resobr['estatal'],2);?></td>
     <td abbr="right"><?php echo number_format($resobr['municipal'],2);?></td>
      <td abbr="right"><?php echo number_format($resobr['participantes'],2);?></td>
       <td abbr="right"><?php echo number_format($resobr['credito'],2);?></td>
        <td abbr="right"><?php echo number_format( $resobr['otros'],2);?></td>
   <?php }  ?>
  
      
         <td abbr="right"><?php echo $resobr['nom_med'];?></td>
  <td abbr="right"><?php echo number_format($resobr['cantidad']);?></td>
    <td abbr="right"><?php echo number_format($resobr['ben_h']);?></td>
      <td abbr="right"><?php echo number_format($resobr['ben_m']);?></td>
        <td abbr="right"><?php echo $PED; ?></td>      
         <td abbr="justify"><?php echo grado($resobr['id_marginacion']); ?></td>        
    

	
	
 </tr>  
    <?php $i++;
	
	 if ($ap==1){
	$tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	}
	
	else{
		
		$tt=$tt+$suma_prg;
	$fd=$fd+$resobr['federal'];
	$st=$st+$resobr['estatal'];
	$mn=$mn+$resobr['municipal'];
	$pt=$pt+$resobr['participantes'];
	$cr=$cr+$resobr['credito'];
	$ot=$ot+$resobr['otros'];
		
		}
	 }  
	 	//cerrar conexion */
	
	 mysql_close($siplan_data_conn);
	  if ($css_color!="gradeA even"){
		   $css_color = "gradeA even";
		  // break;   
		//    case 4:
		//   $status = "Con Oficio de Ejec.";
		   }else{
		   $css_color = "gradeA odd";
		   }?>
    
    <tr  class=" <?php echo $css_color;  ?>"  style="font-size:12.3px" >
   <td align="justify"></td> 
    <td align="right"></td>
	<td abbr="right"></td>
    <td abbr="right"></td>
    <td abbr="right"></td>
      <td abbr="right"></td>
    <td abbr="right"></td>
    <td abbr="right">Total</td>
    <td abbr="right"><?php echo number_format($tt,2);?></td>
    <td abbr="right"><?php echo number_format($fd,2);?></td>
    <td abbr="right"><?php echo number_format($st,2);?></td>
     <td abbr="right"><?php echo number_format($mn,2);?></td>
      <td abbr="right"><?php echo number_format($pt,2);?></td>
       <td abbr="right"><?php echo number_format($cr,2);?></td>
        <td abbr="right"><?php echo number_format( $ot,2);?></td>
         <td abbr="right"></td>
  <td abbr="right"></td>
    <td abbr="right"></td>
      <td abbr="right"></td>
        <td abbr="right"></td>   
           <td abbr="right"></td>       
    </tbody>
    <tfoot>
     
  </tfoot>
  </table>

  
 </div> 

  




  


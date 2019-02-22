<?php
session_start();
$idProyecto = $_GET['id_proyecto'];
$pdf = (isset($_GET['pdf']))?$_GET['pdf']:true;// BANDERA PARA ELABORAR EL REPORTE EN PDF O EN HTML SEGÚN SEA EL VALOR
require_once("../seguridad/siplan_connection_db_2016.php");
date_default_timezone_set('America/Mexico_City');
$consulta = "SELECT  
proy.no_proyecto as id_proyecto,
proy.estatus as estatus,
proy.nombre as nombre,
CASE proy.clasificacion
WHEN 0 THEN 'Institucional'
WHEN 1 THEN 'Prioritario'
END as prioritario,
proy.uresponsable as u_responsable,
proy.titular as titular,
proy.id_eje as id_eje,
proy.objetivo as pr_objetivo,
eje.eje,
proy.id_linea as id_linea,
linea.nombre as linea,
proy.id_estrategia as id_estrategia,
estra.nombre as estrategia,
proy.pnd_eje as id_pnd_eje,
proy.pnd_objetivo as id_pnd_objetivo,
proy.pnd_estrategia as id_pnd_estrategia,
proy.pnd_linea_accion as id_pnd_linea,
pnd_ejes.pnd_eje as pnd_eje,
pnd_estrategias.pnd_estrategia as pnd_estrategia,
pnd_objetivos.pnd_objetivo as pnd_objetivo,
pnd_lineas_accion.linea_accion as pnd_linea,
proy.ponderacion as ponderacion,
proy.proposito as proposito,
proy.justificacion as justificacion,


proy.g_vulnerable as id_gvulnerable,
gpo.descripcion as vulnerable,
proy.beneficiarios_h as ben_h,
proy.beneficiarios_m as ben_m,
proy.inversion,
proy.unidad_medida,
proy.cantidad,
proy.prog_sem,
proy.finalidad as id_finalidad,
finalidad.nombre as finalidad,
proy.funcion as id_funcion,
funcion.nombre as funcion,
proy.subfuncion as id_subfuncion,
subf.nombre as subfuncion,
proy.observaciones,
proy.funcion,
(proy.finalidad) as fin,
pp.clave as clave_presupuestal_com,
pp.descripcion as programa_presupuestal_com,
proy.pps as pps
FROM 
proyectos proy
inner join eje on(proy.id_eje = eje.id_eje)
inner join linea on (proy.id_linea = linea.id_linea)
inner join estrategias estra on(proy.id_estrategia = estra.id_estrategia)

inner join grupo_vulnerable as gpo on(proy.g_vulnerable = gpo.id_vulnerable)
inner join finalidad on (proy.finalidad = finalidad.id_finalidad)
inner join funcion on(proy.funcion = funcion.id_funf AND proy.finalidad = funcion.id_finalidad)
inner join subfuncion as subf on (proy.subfuncion = subf.id_subfuncion)
inner join pnd_ejes on(proy.pnd_eje = pnd_ejes.id_pnd_eje)
inner join pnd_objetivos on(proy.pnd_objetivo = pnd_objetivos.id_pnd_objetivo)
inner join pnd_estrategias on(proy.pnd_estrategia = pnd_estrategias.id_pnd_estrategia)
inner join pnd_lineas_accion on(proy.pnd_linea_accion = pnd_lineas_accion.id_pnd_linea_accion)
inner join componentes on (proy.id_proyecto= componentes.id_proyecto)
inner join programas_presupuestarios as pp on (proy.prog_pres = pp.id)
where proy.id_proyecto = $idProyecto;";

$consulta = mysql_query($consulta,$siplan_data_conn) or die (mysql_error());
$resProyecto = mysql_fetch_object($consulta);

ob_start(); 
if(!$pdf)
{?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte MIR</title>
</head>
<?php } ?>
<style>
html, head, body
{
	font-size:9px;	
}
table
{
	width:100%;
	border-left: 0px solid #000000;
	border-right: 0px solid #000000;
}
.subtitulo
{
	color:#FFFFFF;
	/*font-family:"Courier New", Courier, monospace;	*/
	background:#999999;
	font-size:9px; !important;
	/*font-size:0.625em; */
}

.thead
{
	color:#FFFFFF;
	background:#003300;
	text-align:center;
	border: 4px solid #666666;
	font-size:9px; !important;
	/*font-size:0.625em; */
}

.titulo
{
	color:#000000;
	background:#999999;
	border: 1px solid #000;
	font-size:0.8em;
	font-size:10px; !important;
	text-align:center;
	
}




</style>

<page backtop="-15mm"; format="A4"; backbottom="5mm"; >
    <page_header>   
    </page_header>
    <page_footer>
     <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                 Documento generado el [[date_d]]/[[date_m]]/[[date_y]] a las [[date_h]]:[[date_i]] - Página[[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
</page>
<table>
       <tr>
           <td><img src="logoupla.png" width="230" height="43" /></td>
       </tr>
</table>
<table>
 <col style="width: 100%">
	<tr>
         <td class="subtitulo">Matriz de Indicadores para Resultados (MIR) -- Programa Presupuestario  2019</td>
    </tr>
</table>
<table>
 <col style="width: 100%">
        <tr class="thead">
             <td>DATOS DEL PROGRAMA PRESUPUESTARIO</td>
        </tr>   
</table>
<table cellspacing="0" width="100%">
 <col style="width: 30%">
 <col style="width: 50%">
 <col style="width: 20%">
 

	<thead>
    	<tr>
            <td colspan="9"><b>Datos del Programa Presupuestario</b></td>
        </tr>
    </thead>
    <tr><td><span style="color:red;">Número:</span> <?php echo $resProyecto->id_proyecto; ?>&nbsp; | &nbsp; <b>NG-PPs:<?php echo $resProyecto->pps; ?> </b></td>
        
        <td><span style="color:red;">Nombre:</span> <?php echo $resProyecto->nombre; ?></td>
       
        <td><span style="color:red;">Tipo:</span> <?php echo $resProyecto->prioritario; ?> </td>
  
    </tr>

    </table>
<table>
 <col style="width: 60%">
 <col style="width: 40%">    
    <tr>
        <td><span style="color:red;">Dependencia o Entidad Responsable:</span> <?php echo $resProyecto->u_responsable; ?></td>
        <td><span style="color:red;">Nombre del titular:</span> <?php echo $resProyecto->titular; ?></td>    
    </tr>
</table>
<table>
 <col style="width: 100%">
        <tr class="thead">
             <td>ALINEACIÓN</td>
        </tr>   
</table>
<table>
 <col style="width: 45%">
 <col style="width: 55%">
    <tr class="titulo">
    	<td>Plan Nacional de Desarrollo 2013-2019</td>
        <td>Plan Estatal de Desarrollo 2017-2021</td>
    </tr>   
</table>
<table cellspacing="0">
 <col style="width: 8%">
 <col style="width: 37%">
 <col style="width: 7%">  
 <col style="width: 16%">
 <col style="width: 6%">
 <col style="width: 28%">  
    <tr>
    	<td class="opcion">Eje de política Pública</td>
        <td><?php echo  $resProyecto->pnd_eje; ?></td>
        <td class="opcion">&nbsp;Eje</td>
        <td><?php echo  $resProyecto->eje; ?></td>
    </tr>
</table>

<table> 
 <col style="width: 5%">
 <col style="width: 40%">
 <col style="width: 33%">  
 <col style="width: 6%">
 <col style="width: 24%">  
    <tr>
    	<td class="opcion">Objetivo PND</td>
        <td><?php echo  $resProyecto->pnd_linea;?></td>
        <td>
            <table>
            <col style="width: 20%"> 
            <col style="width: 80%">
                <tr>
                    <td class="opcion">Línea Estratégica</td>
                    <td><?php echo  $resProyecto->linea; ?></td>
                </tr>
                <tr>
                    <td class="opcion">Estrategia</td>
                    <td><?php echo  $resProyecto->estrategia; ?></td>
                </tr>
            </table>
        </td>
          <?php  function latin1($txt) {
 $encoding = mb_detect_encoding($txt, 'ASCII,UTF-8,ISO-8859-1');
 if ($encoding == "UTF-8") {
     $txt = utf8_decode($txt);
 }
 return $txt;
}

function utf8($txt) {
 $encoding = mb_detect_encoding($txt, 'ASCII,UTF-8,ISO-8859-1');
 if ($encoding == "ISO-8859-1") {
     $txt = utf8_encode($txt);
 }
 return $txt;
}


function encoding ($txt) {
$encoding = mb_detect_encoding($txt, 'ASCII,UTF-8,ISO-8859-1');
//echo $encoding;
if ($encoding == "ISO-8859-1") {
$txt = utf8_encode($txt);
//$txt = utf8_decode($txt);
}
if ($encoding == "UTF-8") {
$txt = utf8_encode($txt);
//$txt = utf8_decode($txt); primero
}

if ($encoding == "ASCII") {
	
	$txt=limlatin($txt);
	//$txt = utf8_encode($txt);
//$txt = utf8_encode($txt);
//$txt = html_entity_decode($txt); 

}
return $txt;
}

function limlatin($String){

$String = str_replace('&Atilde;&sup3;',"ó",$String);
$String = str_replace('&Atilde;',"í",$String);
	$String = str_replace('Ã¡',"á",$String);

return $String;
}

function mia ($t){
$str = mb_convert_encoding($t,"UTF-8", "ISO-8859-1");	
	return ($str);
	
	}
?>
   

   </tr>     
</table>
<table>
 <col >
   <tr class="thead">
     <td style="width: 70%">CLASIFICACIÓN FUNCIONAL</td>
      <td style="width: 30%"> CLASIFICACIÓN PROGRAMÁTICA</td>
   </tr>
   
</table>
<table cellspacing="0">
 <col style="width: 7%">
 <col style="width: 23%">
 <col style="width: 7%"> 
 <col style="width: 13%"> 
 <col style="width: 7%">
 <col style="width: 13%">
 
    
    <tr> <?php 
	
	function sac_funcion($abb,$ab){
		
if ($ab!=0){
	
$sac_t = mysql_query("select * from funcion where id_finalidad=".$abb." and id_funf=".$ab) or die (mysql_error());
$sac_ti = mysql_fetch_array($sac_t);	
return ($sac_ti['nombre']);
}else{
return("0");
}
}?>
    	<td class="titulo">Finalidad</td>
        <td><span style="font-size:9px;"><?php echo  $resProyecto->finalidad; ?></span></td>
        <td class="titulo">Función</td>
        <td><span style="font-size:9px;"><?php  echo  sac_funcion($resProyecto->fin,$resProyecto->funcion); ?></span></td>
        <td class="titulo">Subfunción</td>
        <td><span style="font-size:9px;"><?php echo  $resProyecto->subfuncion; ?></span></td>  
        <td  style="width: 100%"><span style="font-size:9px;"><?php echo  $resProyecto->clave_presupuestal_com." - ".$resProyecto->programa_presupuestal_com; ?></span></td>
       
  </tr>
</table>
<table>
 <col style="width: 100%">
   <tr class="thead">
     	<td>RESULTADOS</td>
   </tr>
</table>
<table cellspacing="0" border="1" >
 <col style="width: 10%">
 <col style="width: 20%">
 <col style="width: 40%"> 
 <col style="width: 20%"> 
 <col style="width: 10%">
    <tr>
    	<td class="titulo">Nivel</td>
        <td class="titulo">Objetivos</td>
        <td>
        	<table cellspacing="0" cellpadding="0">
            <col style="width: 100%"> 
            	<tr>
                	<td class="titulo">Indicadores</td>
                </tr>
                <tr>
                    <td class="titulo">Denominación - Método de cálculo - Tipo - Dimensión-Frecuencia - Sentido - Meta Anual</td>
                </tr>
            </table>
        </td>
        <td class="titulo">Medios de Verificación</td>
        <td class="titulo">Supuestos</td>
    </tr>

    <?php
      $consulta_fin = "SELECT
      i.id_indicador as id_indicador,
      pr.objetivo as objetivo,
      i.nombre as nombre_indicador,
      i.definicion as definicion_indicador,
      i.metodo as metodo,
      ti.tipo_indicador as tipo_indicador,
      di.dimension as dimension_indicador,
      fi.frecuencia as frecuencia_indicador,
      si.sentido as sentido_indicador,
      i.u_medida as u_medida,
      i.meta as meta,
      i.medio_verificacion as medio,
      i.supuesto as supuesto,
      i.linea_base as linea_base
      from indicadores i
      inner join tipo_indicador ti on (i.tipo = ti.id_tipo_indicador)
      inner join dimension_indicador di on (i.dimension = di.id_dimension)
      inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
      inner join sentido_indicador si on (i.sentido = si.id_sentido)
      inner join proyectos pr on (i.id_proyecto = pr.id_proyecto)
      where i.id_proyecto = $idProyecto and i.nivel_indicador = 1
      ";
     $ex_consulta_fin = mysql_query($consulta_fin,$siplan_data_conn) or die (mysql_error());


      while($res_ind_fin = mysql_fetch_assoc($ex_consulta_fin)){ ?>
          <tr>
             <td>FIN</td>
             <td><?php echo $res_ind_fin['objetivo']; ?> </td>
              <td>
                <b>Nombre: </b><?php echo $res_ind_fin['nombre_indicador']; ?><br>
                <b>Definición: </b><?php echo $res_ind_fin['definicion_indicador']; ?><br>
                <b>Método: </b>
                  <?php
                      $consulta_variables_ind = "select var1,var2,var3,var4,var5,var6 from variables_indicadores where id_indicador = ".$res_ind_fin['id_indicador'];
                      $ex_con_var = mysql_query($consulta_variables_ind,$siplan_data_conn) or die (mysql_error());
                      $res_vars = mysql_fetch_array($ex_con_var);

                      switch($res_ind_fin['metodo']){
                         case(1):
                              echo "( ".$res_vars[0]." / ".$res_vars[1]." ) * 100";
                         break;
                        case(2):
                              echo "(".$res_vars[0]." * 100 ) / ".$res_vars[1];
                         break;
                        case(3):
                              echo $res_vars[0]."/".$res_vars[1];
                         break;
                        case(4):
                              echo $res_vars[0]." + ".$res_vars[1]." + ".$res_vars[2];
                         break;
                        case(5):
                              echo "{(".$res_vars[0]."/".$res_vars[1].") - 1} *100";
                         break;
                        case(6):
                              echo $res_vars[0];
                         break;
                        case(7):
                              echo "(".$res_vars[0]."/".$res_vars[1].") * 100,000";
                         break;
                        case(8):
                              echo "(".$res_vars[0]."/".$res_vars[1].")*10,000";
                         break;
                        case(9):
                              echo "(".$res_vars[0]."/".$res_vars[1].")*0.0001";
                         break;
                        case(10):
                              echo "( ". $res_vars[0]." + ".$res_vars[1]." + ".$res_vars[2]." + ".$res_vars[3].") / 4";
                         break;
                        case(11):
                              echo "(".$res_vars[0]."/(".$res_vars[1]."-1)) * 100";
                         break;

                      }
                  ?>
                  <br>
                <b>Tipo: </b><?php echo $res_ind_fin['tipo_indicador']; ?><br>
                <b>Dimensión: </b><?php echo $res_ind_fin['dimension_indicador']; ?><br>
                <b>Frecuencia: </b><?php echo $res_ind_fin['frecuencia_indicador']; ?><br>
                <b>Sentido: </b><?php echo $res_ind_fin['sentido_indicador']; ?><br>
                <b>Unidad de Medida: </b><?php echo $res_ind_fin['u_medida']; ?><br>
                <b>Meta Anual: </b><?php echo $res_ind_fin['meta']; ?><br>
                <b>L&iacute;nea Base: </b><?php echo $res_ind_fin['linea_base']; ?><br>
              </td>
              <td><?php echo $res_ind_fin['medio']; ?></td>
              <td> <?php echo $res_ind_fin['supuesto']; ?></td>


          </tr>

    <?php  }
       unset($res_ind_fin);
      unset($ex_consulta_fin);
    ?>

    <?php
    //Indicadores Proposito
      $consulta_pro = "SELECT
      i.id_indicador as id_indicador,
      pr.proposito as proposito,
      i.nombre as nombre_indicador,
      i.definicion as definicion_indicador,
      i.metodo as metodo,
      ti.tipo_indicador as tipo_indicador,
      di.dimension as dimension_indicador,
      fi.frecuencia as frecuencia_indicador,
      si.sentido as sentido_indicador,
      i.u_medida as u_medida,
      i.meta as meta,
      i.medio_verificacion as medio,
      i.supuesto as supuesto,
      i.linea_base as linea_base
      from indicadores i
      inner join tipo_indicador ti on (i.tipo = ti.id_tipo_indicador)
      inner join dimension_indicador di on (i.dimension = di.id_dimension)
      inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
      inner join sentido_indicador si on (i.sentido = si.id_sentido)
      inner join proyectos pr on (i.id_proyecto = pr.id_proyecto)
      where i.id_proyecto = $idProyecto and i.nivel_indicador = 2
      ";

     $ex_consulta_pro = mysql_query($consulta_pro,$siplan_data_conn) or die (mysql_error());


      while($res_ind_pro = mysql_fetch_assoc($ex_consulta_pro)){ ?>
          <tr>
             <td>PROPÓSITO</td>
             <td><?php echo $res_ind_pro['proposito']; ?> </td>
              <td>
                <b>Nombre: </b><?php echo $res_ind_pro['nombre_indicador']; ?><br>
                <b>Definición: </b><?php echo $res_ind_pro['definicion_indicador']; ?><br>
                <b>Método: </b>
                  <?php
                      $consulta_variables_pro = "select var1,var2,var3,var4,var5,var6 from variables_indicadores where id_indicador = ".$res_ind_pro['id_indicador'];
                      $ex_con_var_pro = mysql_query($consulta_variables_pro,$siplan_data_conn) or die (mysql_error());
                      $res_vars_pro = mysql_fetch_array($ex_con_var_pro);

                      switch($res_ind_pro['metodo']){
                         case(1):
                              echo "( ".$res_vars_pro[0]." / ".$res_vars_pro[1]." ) * 100";
                         break;
                        case(2):
                              echo "(".$res_vars_pro[0]." * 100 ) / ".$res_vars_pro[1];
                         break;
                        case(3):
                              echo $res_vars_pro[0]."/".$res_vars_pro[1];
                         break;
                        case(4):
                              echo $res_vars_pro[0]." + ".$res_vars_pro[1]." + ".$res_vars_pro[2];
                         break;
                        case(5):
                              echo "{(".$res_vars_pro[0]."/".$res_vars_pro[1].") - 1} *100";
                         break;
                        case(6):
                              echo $res_vars_pro[0];
                         break;
                        case(7):
                              echo "(".$res_vars_pro[0]."/".$res_vars_pro[1].") * 100,000";
                         break;
                        case(8):
                              echo "(".$res_vars_pro[0]."/".$res_vars_pro[1].")*10,000";
                         break;
                        case(9):
                              echo "(".$res_vars_pro[0]."/".$res_vars_pro[1].")*0.0001";
                         break;
                        case(10):
                              echo "( ". $res_vars_pro[0]." + ".$res_vars_pro[1]." + ".$res_vars_pro[2]." + ".$res_vars_pro[3].") / 4";
                         break;
                        case(11):
                              echo "(".$res_vars_pro[0]."/(".$res_vars_pro[1]."-1)) * 100";
                         break;

                      }
                  ?>
                  <br>
                <b>Tipo: </b><?php echo $res_ind_pro['tipo_indicador']; ?><br>
                <b>Dimensión: </b><?php echo $res_ind_pro['dimension_indicador']; ?><br>
                <b>Frecuencia: </b><?php echo $res_ind_pro['frecuencia_indicador']; ?><br>
                <b>Sentido: </b><?php echo $res_ind_pro['sentido_indicador']; ?><br>
                <b>Unidad de Medida: </b><?php echo $res_ind_pro['u_medida']; ?><br>
                <b>Meta Anual: </b><?php echo $res_ind_pro['meta']; ?><br>
                <b>L&iacute;nea Base: </b><?php echo utf8_decode($res_ind_pro['linea_base']); ?><br>
              </td>
              <td><?php echo $res_ind_pro['medio']; ?></td>
              <td> <?php echo $res_ind_pro['supuesto']; ?></td>


          </tr>

    <?php  }
    unset($res_ind_pro);
    unset($ex_consulta_pro);
    ?>

    <?php

    $consulta_componentes = mysql_query("SELECT id_componente FROM componentes WHERE id_proyecto = ".$_GET['id_proyecto']." ORDER BY no_componente ASC",$siplan_data_conn) or die (mysql_error);
    while($res_componentes = mysql_fetch_array($consulta_componentes)){
        $id_componente = $res_componentes[0];
         $consulta_comp = "SELECT
            i.id_indicador as id_indicador,
            i.id_componente as id_componente,
            comp.descripcion as componente,
            comp.no_componente as num_comp,
            i.nombre as nombre_indicador,
            i.definicion as definicion_indicador,
            i.metodo as metodo,
            ti.tipo_indicador as tipo_indicador,
            di.dimension as dimension_indicador,
            fi.frecuencia as frecuencia_indicador,
            si.sentido as sentido_indicador,
            i.u_medida as u_medida,
            i.meta as meta,
            i.medio_verificacion as medio,
            i.supuesto as supuesto,
            i.linea_base as linea_base,
            dep.acronimo as acronimo,
            ur.u_responsable as uresponsable
            from indicadores i
            inner join tipo_indicador ti on (i.tipo = ti.id_tipo_indicador)
            inner join dimension_indicador di on (i.dimension = di.id_dimension)
            inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
            inner join sentido_indicador si on (i.sentido = si.id_sentido)
            inner join componentes comp on (i.id_componente = comp.id_componente)
            inner join u_responsable ur on (comp.unidad_responsable = ur.id_u_responsable)
            inner join dependencias dep on (ur.id_dependencia = dep.id_dependencia)
            where i.id_proyecto = $idProyecto and i.id_componente = ".$id_componente." AND   i.nivel_indicador = 3 order by i.id_componente ASC";
            $ex_consulta_comp = mysql_query($consulta_comp,$siplan_data_conn) or die (mysql_error());
            while($res_ind_comp = mysql_fetch_assoc($ex_consulta_comp)){ ?>
          <tr>
             <td>COMPONENTE<br>
              <b>Resposnables:</b><br>
                 <?php echo $res_ind_comp['acronimo']; ?><br>
                 <?php echo $res_ind_comp['uresponsable']; ?><br>
              </td>
             <td><?php echo (int)$res_ind_comp['num_comp']." - ".$res_ind_comp['componente']; ?> </td>
              <td>
                <b>Nombre: </b><?php echo $res_ind_comp['nombre_indicador']; ?><br>
                <b>Definición: </b><?php echo $res_ind_comp['definicion_indicador']; ?><br>
                <b>Método: </b>
                  <?php
                      $consulta_variables_comp = "select var1,var2,var3,var4,var5,var6 from variables_indicadores where id_indicador = ".$res_ind_comp['id_indicador'];
                      $ex_con_var_comp = mysql_query($consulta_variables_comp,$siplan_data_conn) or die (mysql_error());
                      $res_vars_comp = mysql_fetch_array($ex_con_var_comp);

                      switch($res_ind_comp['metodo']){
                         case(1):
                              echo "( ".$res_vars_comp[0]." / ".$res_vars_comp[1]." ) * 100";
                         break;
                        case(2):
                              echo "(".$res_vars_comp[0]." * 100 ) / ".$res_vars_comp[1];
                         break;
                        case(3):
                              echo $res_vars_comp[0]."/".$res_vars_comp[1];
                         break;
                        case(4):
                              echo $res_vars_comp[0]." + ".$res_vars_comp[1]." + ".$res_vars_comp[2];
                         break;
                        case(5):
                              echo "{(".$res_vars_comp[0]."/".$res_vars_comp[1].") - 1} *100";
                         break;
                        case(6):
                              echo $res_vars_comp[0];
                         break;
                        case(7):
                              echo "(".$res_vars_comp[0]."/".$res_vars_comp[1].") * 100,000";
                         break;
                        case(8):
                              echo "(".$res_vars_comp[0]."/".$res_vars_comp[1].")*10,000";
                         break;
                        case(9):
                              echo "(".$res_vars_comp[0]."/".$res_vars_comp[1].")*0.0001";
                         break;
                        case(10):
                              echo "( ". $res_vars_comp[0]." + ".$res_vars_comp[1]." + ".$res_vars_comp[2]." + ".$res_vars_comp[3].") / 4";
                         break;
                        case(11):
                              echo "(".$res_vars_comp[0]."/(".$res_vars_comp[1]."-1)) * 100";
                         break;

                      }
                  ?>
                  <br>
                <b>Tipo: </b><?php echo $res_ind_comp['tipo_indicador']; ?><br>
                <b>Dimensión: </b><?php echo $res_ind_comp['dimension_indicador']; ?><br>
                <b>Frecuencia: </b><?php echo $res_ind_comp['frecuencia_indicador']; ?><br>
                <b>Sentido: </b><?php echo $res_ind_comp['sentido_indicador']; ?><br>
                <b>Unidad de Medida: </b><?php echo $res_ind_comp['u_medida']; ?><br>
                <b>Meta Anual: </b><?php echo $res_ind_comp['meta']; ?><br>
                <b>L&iacute;nea Base: </b><?php echo utf8_decode($res_ind_comp['linea_base']); ?><br>
              </td>
              <td><?php echo $res_ind_comp['medio']; ?></td>
              <td> <?php echo $res_ind_comp['supuesto']; ?></td>


          </tr>
        <?php }
           $consulta_actividad = mysql_query("SELECT id_accion FROM acciones WHERE id_componente = ".$id_componente) or die (mysql_error());
          while($actividad = mysql_fetch_array($consulta_actividad)){
              $consulta_act = "SELECT
      i.id_indicador as id_indicador,
      acc.descripcion as actividad,
      acc.no_accion as no_actividad,
      i.nombre as nombre_indicador,
      i.definicion as definicion_indicador,
      i.metodo as metodo,
      ti.tipo_indicador as tipo_indicador,
      di.dimension as dimension_indicador,
      fi.frecuencia as frecuencia_indicador,
      si.sentido as sentido_indicador,
      i.u_medida as u_medida,
      i.meta as meta,
      i.medio_verificacion as medio,
      i.supuesto as supuesto,
      i.linea_base as linea_base
      from indicadores i
      inner join tipo_indicador ti on (i.tipo = ti.id_tipo_indicador)
      inner join dimension_indicador di on (i.dimension = di.id_dimension)
      inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
      inner join sentido_indicador si on (i.sentido = si.id_sentido)
      inner join acciones acc on (i.id_actividad = acc.id_accion)
      where i.id_proyecto = $idProyecto and i.id_componente = ".$id_componente." and i.id_actividad = ".$actividad[0]." and i.nivel_indicador = 4";


     $ex_consulta_act = mysql_query($consulta_act,$siplan_data_conn) or die (mysql_error());


      while($res_ind_act = mysql_fetch_assoc($ex_consulta_act)){ ?>
          <tr>
             <td>ACTIVIDAD</td>
             <td><?php echo (int)$res_ind_act['no_actividad']." - ".$res_ind_act['actividad']; ?> </td>
              <td>
                <b>Nombre: </b><?php echo $res_ind_act['nombre_indicador']; ?><br>
                <b>Definición: </b><?php echo $res_ind_act['definicion_indicador']; ?><br>
                <b>Método: </b>
                  <?php
                      $consulta_variables_act = "select var1,var2,var3,var4,var5,var6 from variables_indicadores where id_indicador = ".$res_ind_act['id_indicador'];
                      $ex_con_var_act = mysql_query($consulta_variables_act,$siplan_data_conn) or die (mysql_error());
                      $res_vars_act = mysql_fetch_array($ex_con_var_act);

                      switch($res_ind_act['metodo']){
                         case(1):
                              echo "( ".$res_vars_act[0]." / ".$res_vars_act[1]." ) * 100";
                         break;
                        case(2):
                              echo "(".$res_vars_act[0]." * 100 ) / ".$res_vars_act[1];
                         break;
                        case(3):
                              echo $res_vars_act[0]."/".$res_vars_act[1];
                         break;
                        case(4):
                              echo $res_vars_act[0]." + ".$res_vars_act[1]." + ".$res_vars_act[2];
                         break;
                        case(5):
                              echo "{(".$res_vars_act[0]."/".$res_vars_act[1].") - 1} *100";
                         break;
                        case(6):
                              echo $res_vars_act[0];
                         break;
                        case(7):
                              echo "(".$res_vars_act[0]."/".$res_vars_act[1].") * 100,000";
                         break;
                        case(8):
                              echo "(".$res_vars_act[0]."/".$res_vars_act[1].")*10,000";
                         break;
                        case(9):
                              echo "(".$res_vars_act[0]."/".$res_vars_act[1].")*0.0001";
                         break;
                        case(10):
                              echo "( ". $res_vars_act[0]." + ".$res_vars_act[1]." + ".$res_vars_act[2]." + ".$res_vars_act[3].") / 4";
                         break;
                        case(11):
                              echo "(".$res_vars_act[0]."/(".$res_vars_act[1]."-1)) * 100";
                         break;

                      }
                  ?>
                  <br>
                <b>Tipo: </b><?php echo $res_ind_act['tipo_indicador']; ?><br>
                <b>Dimensión: </b><?php echo $res_ind_act['dimension_indicador']; ?><br>
                <b>Frecuencia: </b><?php echo $res_ind_act['frecuencia_indicador']; ?><br>
                <b>Sentido: </b><?php echo $res_ind_act['sentido_indicador']; ?><br>
                <b>Unidad de Medida: </b><?php echo $res_ind_act['u_medida']; ?><br>
                <b>Meta Anual: </b><?php echo $res_ind_act['meta']; ?><br>
                <b>L&iacute;nea Base: </b><?php echo utf8_decode($res_ind_act['linea_base']); ?><br>
              </td>
              <td><?php echo $res_ind_act['medio']; ?></td>
              <td> <?php echo $res_ind_act['supuesto']; ?></td>


          </tr>
      <?php
          }



      } }?>






</table>








<?php if(!$pdf)
{?>
</body>
</html>
<?php
}
	$salida = ob_get_contents();
	//ob_end_flush();
	$salida = ob_get_clean();
	if($pdf)
	{
		/*$dompdf = new DOMPDF();
		$dompdf->load_html(utf8_decode($salida));
		$dompdf->set_paper("legal","landscape");
		$dompdf->render();
		$canvas = $dompdf->get_canvas();
		$font = Font_Metrics::get_font("helvetica", "bold");
		$canvas->page_text(20, 585, "Reporte MIR Pag {PAGE_NUM} de {PAGE_COUNT}",$font, 7, array(0,0,0));
		$canvas->page_text(450, 585, "Fecha del reporte: ".date('d-m-Y | h:i:s a'),$font, 7, array(0,0,0));
		$dompdf->stream("sample.pdf",array("Attachment" => 0)); */
		//return $dompdf->output();
		

		require_once('html2pdf.class.php');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A4', 'es',true,"UTF-8", array(3,16,3,5)); //array(0,15,1,1));
			// $html2pdf = new HTML2PDF('L', 'A4', 'es');
			//  $html2pdf = new HTML2PDF('P', 'A4', 'es');
			//$html2pdf = new HTML2PDF('L', 'A4', 'es',true,"UTF-8", array(3,16,3,1)); 
			$html2pdf->pdf->SetDisplayMode('fullpage');
			//$html2pdf->pdf
			//$html2pdf->pdf->SetProtection(array('print'), 'spipu');
			//$html2pdf->createIndex();
			$html2pdf->writeHTML($salida, isset($_GET['vuehtml']));
			$html2pdf->Output('MIR2019.pdf');
		}
		catch(HTML2PDF_exception $e) 
		{
			echo $e;
			exit;
		}
	}
	else
	{
		echo $salida;
	}
?>

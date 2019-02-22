<?php

header('Content-type: application/vnd.ms-excel;charset=UTF-8');
header("Content-Disposition: attachment; filename=Reporte-MIR2018.xls");
header("Pragma: no-cache");
header("Expires: 0");
session_start();


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
left  join programas_presupuestarios as pp on (componentes.prog_pres = pp.id)
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
	font-size:10px;
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
	font-size:8px; !important;
	font-size:0.625em; 
}

.thead
{
	color:#FFFFFF;
	background:#003300;
	text-align:center;
	border: 4px solid #666666;
	font-size:8px; !important;
	font-size:0.625em; 
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

.opcion
{
	color:#B80734;
	font-size: 0.625em;
}

td
{
	font-size:0.5em;
	font-size:8px; !important
}
</style>


<table>
       <tr>
           <td><img src="http://coepla.zacatecas.gob.mx/wp-content/uploads/2018/02/logo-de-coepla.fw_-1.png"  /></td>
       </tr>
       <tr><td>&nbsp;</td></tr>
       <tr><td>&nbsp;</td></tr>
       <tr><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td></tr>
           <tr><td>&nbsp;</td></tr>
       <tr><td>&nbsp;</td></tr>
       <tr><td>&nbsp;</td></tr>
      <tr><td>&nbsp;</td></tr>
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
<table cellspacing="0">


	<thead>
    	<tr>
            <td colspan="9"><b>Datos del Programa Presupuestario</b></td>
        </tr>
    </thead>
    <tr>
         <td class="opcion" width="5%">N&uactue;mero:</td>
        <td width="4%"><?php echo utf8_decode($resProyecto->id_proyecto); ?>&nbsp; | &nbsp; <b>NG-PPs:<?php echo $resProyecto->pps; ?> </b></td>
    	<td class="opcion" width="5%">Nombre:</td>
        <td width="16%"><?php echo utf8_decode($resProyecto->nombre); ?></td>
        <td class="opcion" width="5%">Tipo:</td>
        <td width="16%"><?php echo utf8_decode($resProyecto->prioritario); ?></td>


    </tr>


    <tr>
    <td class="opcion" width="5%">Unidad Responsable</td>
        <td width="16%"><?php echo utf8_decode($resProyecto->u_responsable); ?></td>
        <td class="opcion" width="5%">Nombre del titular</td>
        <td width="29%"><?php echo utf8_decode($resProyecto->titular); ?></td>
    </tr>
</table>
<table>

        <tr class="thead">
             <td>ALINEACI&Oacute;N</td>
        </tr>   
</table>
<table>

    <tr class="titulo">
    	<td>Plan Nacional de Desarrollo 2013-2019</td>
        <td>Plan Estatal de Desarrollo 2017-2021</td>

    </tr>   
</table>
<table cellspacing="0">

    <tr>
    	<td class="opcion">Eje de pol&iacute;tica P&uacute;blica</td>
        <td><?php echo  utf8_decode($resProyecto->pnd_eje); ?></td>
        <td class="opcion">Eje</td>
        <td><?php echo  utf8_decode($resProyecto->eje); ?></td>

    </tr>
</table>
<table> 

    <tr>
    	<td class="opcion">Objetivo PND</td>
        <td><?php echo  utf8_decode($resProyecto->pnd_linea);?></td>
        <td>
            <table>
            <col style="width: 20%"> 
            <col style="width: 80%">
                <tr>
                    <td class="opcion">L&iacute;nea Estrat&eacute;gica</td>
                    <td><?php echo  utf8_decode($resProyecto->linea); ?></td>
                </tr>
                <tr>
                    <td class="opcion">Estrategia</td>
                    <td><?php echo  utf8_decode($resProyecto->estrategia); ?></td>
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
     <td style="width: 70%">CLASIFICACI&Oacute;N FUNCIONAL</td>
      <td style="width: 30%"> CLASIFICACI&Oacute;N PROGRAM&Aacute;TICA</td>
   </tr>

</table>
<table cellspacing="0">

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
        <td><?php echo  utf8_decode($resProyecto->finalidad); ?></td>
        <td class="titulo">Funci&oacute;n</td>
        <td><?php  echo  utf8_decode(sac_funcion($resProyecto->fin,$resProyecto->funcion)); ?></td>
        <td class="titulo">Subfunci&oacute;n</td>
        <td><?php echo  utf8_decode($resProyecto->subfuncion); ?></td>

        <td  style="width: 100%"><?php echo  utf8_decode($resProyecto->clave_presupuestal_com)." - ".utf8_decode($resProyecto->programa_presupuestal_com); ?></td>

  </tr>
</table>
<table>
 <col style="width: 100%">
   <tr class="thead">
     	<td>RESULTADOS</td>
   </tr>
</table>
<table cellspacing="0" border="1" >

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
                    <td class="titulo">Denominaci&oacute;n - M&eacute;todo de c&aacute;lculo - Tipo - Dimensi&oacute;n-Frecuencia - Sentido - Meta Anual</td>
                </tr>
            </table>
        </td>
        <td class="titulo">Medios de Verificaci&oacute;n</td>
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
      inner join tipo_indicador ti on (i.tipo= ti.id_tipo_indicador)
      inner join dimension_indicador di on (i.dimension= di.id_dimension)
      inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
      inner join sentido_indicador si on (i.sentido = si.id_sentido)
      inner join proyectos pr on (i.id_proyecto = pr.id_proyecto)
      where i.id_proyecto = $idProyecto and i.nivel_indicador = 1
      ";

     $ex_consulta_fin = mysql_query($consulta_fin,$siplan_data_conn) or die (mysql_error());


      while($res_ind_fin = mysql_fetch_assoc($ex_consulta_fin)){ ?>
          <tr>
             <td>FIN</td>
             <td><?php echo utf8_decode($res_ind_fin['objetivo']); ?> </td>
              <td>
                <b>Nombre: </b><?php echo utf8_decode($res_ind_fin['nombre_indicador']); ?><br>
                <b>Definici&oacute;n: </b><?php echo utf8_decode($res_ind_fin['definicion_indicador']); ?><br>
                <b>M&eacutye;todo: </b>
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
                <b>Tipo: </b><?php echo utf8_decode($res_ind_fin['tipo_indicador']); ?><br>
                <b>Dimensi&oacute;n: </b><?php echo utf8_decode($res_ind_fin['dimension_indicador']); ?><br>
                <b>Frecuencia: </b><?php echo utf8_decode($res_ind_fin['frecuencia_indicador']); ?><br>
                <b>Sentido: </b><?php echo utf8_decode($res_ind_fin['sentido_indicador']); ?><br>
                <b>Unidad de Medida: </b><?php echo utf8_decode($res_ind_fin['u_medida']); ?><br>
                <b>Meta Anual: </b><?php echo utf8_decode($res_ind_fin['meta']); ?><br>
                <b>L&iacute;nea Base: </b><?php echo utf8_decode($res_ind_fin['linea_base']); ?><br>
              </td>
              <td><?php echo utf8_decode($res_ind_fin['medio']); ?></td>
              <td> <?php echo utf8_decode($res_ind_fin['supuesto']); ?></td>


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
      inner join tipo_indicador ti on (i.tipo= ti.id_tipo_indicador)
      inner join dimension_indicador di on (i.dimension= di.id_dimension)
      inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
      inner join sentido_indicador si on (i.sentido = si.id_sentido)
      inner join proyectos pr on (i.id_proyecto = pr.id_proyecto)
      where i.id_proyecto = $idProyecto and i.nivel_indicador = 2
      ";

     $ex_consulta_pro = mysql_query($consulta_pro,$siplan_data_conn) or die (mysql_error());


      while($res_ind_pro = mysql_fetch_assoc($ex_consulta_pro)){ ?>
          <tr>
             <td>PROP&Oacute;SITO</td>
             <td><?php echo utf8_decode($res_ind_pro['proposito']); ?> </td>
              <td>
                <b>Nombre: </b><?php echo utf8_decode($res_ind_pro['nombre_indicador']); ?><br>
                <b>Definici&oacute;n: </b><?php echo utf8_decode($res_ind_pro['definicion_indicador']); ?><br>
                <b>M&eacute;todo: </b>
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
                <b>Tipo: </b><?php echo utf8_decode($res_ind_pro['tipo_indicador']); ?><br>
                <b>Dimensi&oacute;n: </b><?php echo utf8_decode($res_ind_pro['dimension_indicador']); ?><br>
                <b>Frecuencia: </b><?php echo utf8_decode($res_ind_pro['frecuencia_indicador']); ?><br>
                <b>Sentido: </b><?php echo utf8_decode($res_ind_pro['sentido_indicador']); ?><br>
                <b>Unidad de Medida: </b><?php echo utf8_decode($res_ind_pro['u_medida']); ?><br>
                <b>Meta Anual: </b><?php echo utf8_decode($res_ind_pro['meta']); ?><br>
                  <b>L&iacute;nea Base: </b><?php echo utf8_decode($res_ind_pro['linea_base']); ?><br>
              </td>
              <td><?php echo utf8_decode($res_ind_pro['medio']); ?></td>
              <td> <?php echo utf8_decode($res_ind_pro['supuesto']); ?></td>


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
            inner join tipo_indicador ti on (i.tipo= ti.id_tipo_indicador)
            inner join dimension_indicador di on (i.dimension= di.id_dimension)
            inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
            inner join sentido_indicador si on (i.sentido = si.id_sentido)
            inner join componentes comp on (i.id_componente = comp.id_componente)
            where i.id_proyecto = $idProyecto and i.id_componente = ".$id_componente." AND   i.nivel_indicador = 3 order by i.id_componente ASC";
            $ex_consulta_comp = mysql_query($consulta_comp,$siplan_data_conn) or die (mysql_error());
            while($res_ind_comp = mysql_fetch_assoc($ex_consulta_comp)){ ?>
          <tr>
             <td>COMPONENTE</td>
             <td><?php echo utf8_decode($res_ind_comp['componente']); ?> </td>
              <td>
                <b>Nombre: </b><?php echo utf8_decode($res_ind_comp['nombre_indicador']); ?><br>
                <b>Definici&ocaute;n: </b><?php echo utf8_decode($res_ind_comp['definicion_indicador']); ?><br>
                <b>M&eacute;todo: </b>
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
                <b>Tipo: </b><?php echo utf8_decode($res_ind_comp['tipo_indicador']); ?><br>
                <b>Dimensi&oacute;n: </b><?php echo utf8_decode($res_ind_comp['dimension_indicador']); ?><br>
                <b>Frecuencia: </b><?php echo utf8_decode($res_ind_comp['frecuencia_indicador']); ?><br>
                <b>Sentido: </b><?php echo utf8_decode($res_ind_comp['sentido_indicador']); ?><br>
                <b>Unidad de Medida: </b><?php echo utf8_decode($res_ind_comp['u_medida']); ?><br>
                <b>Meta Anual: </b><?php echo utf8_decode($res_ind_comp['meta']); ?><br>
                  <b>L&iacute;nea Base: </b><?php echo utf8_decode($res_ind_comp['linea_base']); ?><br>
              </td>
              <td><?php echo utf8_decode($res_ind_comp['medio']); ?></td>
              <td> <?php echo utf8_decode($res_ind_comp['supuesto']); ?></td>


          </tr>
        <?php }
           $consulta_actividad = mysql_query("SELECT id_accion FROM acciones WHERE id_componente = ".$id_componente) or die (mysql_error());
          while($actividad = mysql_fetch_array($consulta_actividad)){
              $consulta_act = "SELECT
      i.id_indicador as id_indicador,
      acc.descripcion as actividad,
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
      inner join tipo_indicador ti on (i.tipo= ti.id_tipo_indicador)
      inner join dimension_indicador di on (i.dimension= di.id_dimension)
      inner join frecuencia_indicador fi on (i.frecuencia = fi.id_frecuencia)
      inner join sentido_indicador si on (i.sentido = si.id_sentido)
      inner join acciones acc on (i.id_actividad = acc.id_accion)
      where i.id_proyecto = $idProyecto and i.id_componente = ".$id_componente." and i.id_actividad = ".$actividad[0]." and i.nivel_indicador = 4";


     $ex_consulta_act = mysql_query($consulta_act,$siplan_data_conn) or die (mysql_error());


      while($res_ind_act = mysql_fetch_assoc($ex_consulta_act)){ ?>
          <tr>
             <td>ACTIVIDAD</td>
             <td><?php echo $res_ind_act['actividad']; ?> </td>
              <td>
                <b>Nombre: </b><?php echo $res_ind_act['nombre_indicador']; ?><br>
                <b>Definici&oacute;n: </b><?php echo $res_ind_act['definicion_indicador']; ?><br>
                <b>M&eacute;todo: </b>
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
                <b>Tipo: </b><?php echo utf8_decode($res_ind_act['tipo_indicador']); ?><br>
                <b>Dimensi&oacute;n: </b><?php echo utf8_decode($res_ind_act['dimension_indicador']); ?><br>
                <b>Frecuencia: </b><?php echo utf8_decode($res_ind_act['frecuencia_indicador']); ?><br>
                <b>Sentido: </b><?php echo utf8_decode($res_ind_act['sentido_indicador']); ?><br>
                <b>Unidad de Medida: </b><?php echo utf8_decode($res_ind_act['u_medida']); ?><br>
                <b>Meta Anual: </b><?php echo utf8_decode($res_ind_act['meta']); ?><br>
                  <b>L&iacute;nea Base: </b><?php echo utf8_decode($res_ind_act['linea_base']); ?><br>
              </td>
              <td><?php echo utf8_decode($res_ind_act['medio']); ?></td>
              <td> <?php echo utf8_decode($res_ind_act['supuesto']); ?></td>


          </tr>
      <?php
          }



      } }?>






</table>








</body>
</html>

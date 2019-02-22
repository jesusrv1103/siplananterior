<?php

    session_start();
    require_once("../seguridad/siplan_connection_db_2016.php");
    date_default_timezone_set('America/Mexico_City');
    
    header ("Expires: 0");  
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
 
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache");  
    header ("Content-type: application/x-msexcel");  
    header ("Content-Disposition: attachment; filename=\"res_indicadores.xls\"" );

    if ($_SESSION['id_perfil_v3'] == 1) $ruta1 = "administrador/indicadores/formulas_indicadores2.php";  
      
    if ($_SESSION['id_perfil_v3'] == 2) $ruta1 = "capturista/indicadores/formulas_indicadores2.php";
     
    if ($_SESSION['id_perfil_v3'] == 3) $ruta1 = "planeacion/indicadores/formulas_indicadores2.php";  
      
    $id_proyecto     = $_GET['id_proyecto'];
    $nivel_indicador = $_GET['tipoind'];
    $ejercicio       = $_GET['ejercicioind'];
    
    if ($nivel_indicador == 1){
      $tipoindEtq = "Propósito";
      $tipoind = "proposito";
    } else {
      $tipoindEtq = "Fin";
      $tipoind = "fin";
    }
    
    $tabla1 = "indicadores_".$tipoind."_".$ejercicio;
    
    if ($ejercicio <> 2016){
      $proyectos = "proyectos_".$ejercicio;
    } else {
      $proyectos = "proyectos";  
    }
  
    $consulta = "
    SELECT
      p.no_proyecto as num_proyecto,
      p.nombre as proyecto,
      d.id_dependencia as num_dep,
      d.nombre as dependencia,
      s.id_sector as num_sector,
      s.sector as sector,
      ip.nombre_indicador as indicador,
      ip.metodo_calculo as metodo_calculo,
      ip.objetivo as objetivo,
      umi.u_medida as u_medida,
      ip.meta as meta,
      ti.tipo_indicador as tipo_indicador,
      ip.verificacion as verificacion,
      ip.supuesto as supuesto,
      sind.sentido as sentido,
      dimind.dimension as dimension,
      frei.frecuencia as frecuencia,
      frei.id_frecuencia as id_frecuencia
      
    FROM
      $tabla1 ip
      inner join $proyectos p on (ip.id_proyecto = p.id_proyecto)
      inner join dependencias d on(p.id_dependencia = d.id_dependencia)
      inner join sectores s on(s.id_sector = d.id_sector)
      inner join u_medida_indicadores umi on(ip.unidad_medida = umi.id_u_medida)
      inner join tipo_indicador ti on(ip.tipo = ti.id_tipo_indicador)
      inner join sentido_indicador sind on(ip.sentido = sind.id_sentido)
      inner join dimension_indicador dimind on (ip.dimension = dimind.id_dimension)
      inner join frecuencia_indicador frei on(ip.frecuencia =  frei.id_frecuencia)
      
    WHERE ip.id_proyecto = $id_proyecto";
   
    $ex_consulta = mysql_query($consulta,$siplan_data_conn);
    $res_consulta = mysql_fetch_assoc($ex_consulta);

?>
     
    <div class="wrap">
       <table width="100%"  align="center" cellpadding="0" cellspacing="0" border="1" style="border:solid 1px #fff; border-radius:4px;  background-color: #CED2C7">
        <tr bgcolor="#EDEDED">
          <td  colspan="4" style="border-bottom:solid 1px #fff; background-color: #00A859; color:#fff; border-right:solid 1px #fff; padding:6px 6px 6px 6px;">
            <span style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#fff;">
              <h3>Informaci&oacute;n del Indicador</h3>
            </span>
          </td>
        </tr>
        <tr>
          <td colspan="2"><b>Proyecto</b>&nbsp; <?php  echo $res_consulta['num_proyecto'];  ?> - <?php  echo utf8_decode($res_consulta['proyecto']); ?></td>
          <td colspan="2"><b>Dependencia</b>&nbsp; <?php  echo $res_consulta['num_dep'];  ?> - <?php  echo utf8_decode($res_consulta['dependencia']); ?>&nbsp;<br /> <b>Sector</b>&nbsp; <?php  echo$res_consulta['num_sector'];  ?> - <?php  echo utf8_decode($res_consulta['sector']); ?></td>
        </tr>
        <tr>
          <td colspan="2"><b>Nivel</b>&nbsp; <?php  echo $tipoindEtq ?><br /> <b>Nombre Indicador</b>&nbsp;<?php  echo utf8_decode($res_consulta['indicador']); ?></td>
          <td colspan="2"><b>Método de C&aacute;lculo</b>&nbsp;<?php  echo utf8_decode($res_consulta['metodo_calculo']); ?></td>
        </tr>
        <tr>  
          <td colspan="4"><b>Objetivo</b>&nbsp;<?php  echo utf8_decode($res_consulta['objetivo']); ?></td>
        </tr>
        <tr>  
          <td colspan="4">
            <b>Unidad de Medida:</b>&nbsp;<?php  echo utf8_decode($res_consulta['u_medida']); ?>&nbsp;&nbsp;<b>Meta:</b>&nbsp;<?php  echo utf8_decode($res_consulta['meta']); ?>
            &nbsp;&nbsp;<b>Tipo Indicador:</b>&nbsp;<?php  echo utf8_decode($res_consulta['tipo_indicador']); ?>
          </td>
        </tr>
        <tr>  
          <td colspan="4"><b>Medio de Verificación</b>&nbsp;<?php  echo utf8_decode($res_consulta['verificacion']); ?></td>
        </tr>
        <tr>  
          <td colspan="4"><b>Supuesto</b>&nbsp;<?php  echo utf8_decode($res_consulta['supuesto']); ?></td>
        </tr>
        <tr>  
          <td colspan="4">
            <b>Sentido:</b>&nbsp;<?php  echo utf8_decode($res_consulta['sentido']); ?>&nbsp;&nbsp;<b>Dimensión:</b>&nbsp;<?php  echo utf8_decode($res_consulta['dimension']); ?>
            &nbsp;&nbsp;<b>Frecuencia:</b>&nbsp;<?php  echo utf8_decode($res_consulta['frecuencia']); ?>
          </td>
        </tr>
        </table> 
         <br />
            <table class="table table-hover" style="width:50%;  background-color: #CED2C7" border='1'>  
              <tr style="width:50%;  background-color: #CED2C7"><th colspan="4"><h4>Historial de calificaciones del indicador</h4></th></tr>
              <tr>
                <th width="5%"  align="center" style="background-color:#00A859; color:#fff;">#</th>
                <th width="10%" align="center" style="background-color:#00A859; color:#fff;">Resultado</th>
                <th width="10%" align="center" style="background-color:#00A859; color:#fff;">Fecha</th>
                <th width="10%" align="center" style="background-color:#00A859; color:#fff;">Peri&oacute;do Evaluado</th>
              </tr>
                
                <?php 
                $consulta_resultados = "
                SELECT  RI.id_resultado, RI.resultado, RI.fecha, PI.periodo 
                FROM resultados_indicadores AS RI INNER JOIN periodos_indicadores AS PI ON RI.periodo_evaluado = PI.id_periodo
                WHERE id_proyecto = ".$id_proyecto." AND tipo = $nivel_indicador AND ejercicio = $ejercicio ORDER BY id_resultado DESC";
                $ex_cons_res = mysql_query($consulta_resultados,$siplan_data_conn);
                $counter = 0;
                
                while($res_resultados = mysql_fetch_assoc($ex_cons_res)){ 
                    $counter = $counter+1;?>      
              <tr >
                <td width="5%"  style="color:#000;" align="center"><?php echo $counter ?></td>
                <td width="10%" style="color:#000;" align="center"><span class="badge bg-red"><?php echo round($res_resultados['resultado'],2); ?></span></td>
                <td width="10%" style="color:#000;" align="center"><?php echo $res_resultados['fecha']; ?></td>
                <td width="10%" style="color:#000;" align="center"><?php echo $res_resultados['periodo']?></td>
                </tr>
                
                <?php  
                $consulta_formulas = "
                SELECT * FROM formulas WHERE id_proyecto = ".$id_proyecto." AND tipo_indicador = ".$nivel_indicador ." AND ejercicio = ".$ejercicio;
                $ex_form = mysql_query($consulta_formulas,$siplan_data_conn);
                $res_form = mysql_fetch_assoc($ex_form);
                
                $consulta_formulas2 = "
                SELECT * FROM variables_indicadores WHERE id_resultado=".$res_resultados['id_resultado'];
                $ex_form2 = mysql_query($consulta_formulas2,$siplan_data_conn);
                $res_form2 = mysql_fetch_assoc($ex_form2);
                
              if ($res_form2['id_variable']){ ?>
                     
              <tr>
                <td colspan="3">    
                <?php include_once($ruta1);?>
                </td> 
              </tr>
              <?php
              } 
     } ?>
   </table>
      </div>
  </table>


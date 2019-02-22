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

    $tipo_ind = $_GET['tipoind'];
    
    if ($tipo_ind == 1){
      $tind = "Pr&oacute;posito";
      $tb_n = "proposito";
    } else {
      $tind = "Fin";
      $tb_n = "fin";
    }
    
    $ejercicio = $_GET['annio'];
    $tb_ind = "indicadores_".$tb_n."_".$ejercicio;
    $tb_proyectos = "proyectos_".$ejercicio;
    
    if ($tb_proyectos = "proyectos_2016") $tb_proyectos = "proyectos";
    
    $query_proyectos = "
        SELECT 
        pr.no_proyecto as proyecto, 
        pr.nombre as n_proyecto, 
        ind.objetivo as objetivo, 
        ind.nombre_indicador as indicador, 
        ind.metodo_calculo as metodo,
        tind.tipo_indicador as tipo,
        dind.dimension as dimension,
        fi.frecuencia as frecuencia, 
        sind.sentido as sentido,
        um.u_medida as u_medida, 
        ind.meta as meta, 
        ind.supuesto as supuesto,
        ind.verificacion as verificacion,
        pr.id_proyecto 
        
        FROM $tb_proyectos pr
    
        inner join $tb_ind ind on(pr.id_proyecto = ind.id_proyecto) 
        inner join frecuencia_indicador fi        on(ind.frecuencia = fi.id_frecuencia) 
        inner join tipo_indicador tind            on(ind.tipo = tind.id_tipo_indicador) 
        inner join u_medida_indicadores um        on(um.id_u_medida = ind.unidad_medida) 
        inner join dimension_indicador dind       on(dind.id_dimension = ind.dimension)
        inner join sentido_indicador sind         on(sind.id_sentido = ind.sentido)
        
        WHERE pr.id_dependencia = ".$_SESSION['id_dependencia_v3']. "  ORDER BY pr.no_proyecto";
    
    $ex_pr = mysql_query($query_proyectos,$siplan_data_conn);
  
    
    while($r_pr = mysql_fetch_array($ex_pr)){
        
        
        $html_tables = $html_tables."
              <tr> 
                <td style='border:solid 1px #ccc;'>".$_SESSION['sector_dependencia_v3']."</th> 
                <td style='border:solid 1px #ccc;'>".$_SESSION['id_dependencia_v3']."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($_SESSION['nombre_dependencia_v3'])."</td>
                <td style='border:solid 1px #ccc;'>".$r_pr[0]."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[1])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[2])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[3])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[4])."</td> 
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[5])."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[6]."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[7]."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[8]."</td> 
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[9])."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[10]."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[11])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[12])."</td>";
                
     
     $queryT = "
            SELECT count(*) as total

            FROM  $tb_proyectos pr  
            right  join resultados_indicadores ri         on(ri.id_proyecto = pr.id_proyecto)
            inner join periodos_indicadores pi  on (ri.periodo_evaluado = pi.id_periodo)
            
            WHERE ri.tipo = '$tipo_ind' AND ri.ejercicio = '$ejercicio' AND ri.id_proyecto = ".$r_pr[13];
                        
     $query = "
            SELECT 
               
            ri.resultado as resultado,
            ri.fecha as fecha,
            pi.periodo as periodo

            FROM  $tb_proyectos pr  
            right  join resultados_indicadores ri         on(ri.id_proyecto = pr.id_proyecto)
            inner join periodos_indicadores pi  on (ri.periodo_evaluado = pi.id_periodo)
            
            WHERE ri.tipo = '$tipo_ind' AND ri.ejercicio = '$ejercicio' AND ri.id_proyecto = ".$r_pr[13];

        $tot = mysql_query($queryT,$siplan_data_conn);
        $row = mysql_fetch_object($tot);
        if ($row->total <> 0){
        $ex = mysql_query($query,$siplan_data_conn);
        while($res_q = mysql_fetch_assoc($ex)){
           if ($row->total >2){
            $html_tables = $html_tables."
              <tr> 
                <td style='border:solid 1px #ccc;'>".$_SESSION['sector_dependencia_v3']."</th> 
                <td style='border:solid 1px #ccc;'>".$_SESSION['id_dependencia_v3']."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($_SESSION['nombre_dependencia_v3'])."</td>
                <td style='border:solid 1px #ccc;'>".$r_pr[0]."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[1])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[2])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[3])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[4])."</td> 
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[5])."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[6]."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[7]."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[8]."</td> 
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[9])."</td> 
                <td style='border:solid 1px #ccc;'>".$r_pr[10]."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[11])."</td>
                <td style='border:solid 1px #ccc;'>".utf8_decode($r_pr[12])."</td>
                <td style='border:solid 1px #ccc;'>&nbsp;".number_format($res_q['resultado'],2)."</td>
                <td style='border:solid 1px #ccc;'>&nbsp;".$res_q['fecha']."</td>
                <td style='border:solid 1px #ccc;'>&nbsp;".$res_q['periodo']."</td>
              </tr>";
           } else {
              $html_tables = $html_tables."
              <td style='border:solid 1px #ccc;'>&nbsp;".number_format($res_q['resultado'],2)."</td>
                <td style='border:solid 1px #ccc;'>&nbsp;".$res_q['fecha']."</td>
                <td style='border:solid 1px #ccc;'>&nbsp;".$res_q['periodo']."</td>
              </tr>";
            
           }   
              
        }
        
        } else { 
          $html_tables = $html_tables."
              <td style='border:solid 1px #ccc;' colspan='3' align='center'><b>Sin evaluar</td>
          </tr>";
            
        }
  
    }

?>
    <h1>Resultados del Indicador</h1>
    <hr>
    <h4>Indicadores para el ejercicio:&nbsp;<b><?php echo $ejercicio ?></b></h4>
    <h4>Tipo Indicador:&nbsp;<b><?php echo $tind ?></b></h4>
          
    <table> 
      <tr> 
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Sector</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">num dep</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Dependencia</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">No Proyecto</td> 
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Proyecto</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Objetivos</td> 
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Indicador</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">M&eacute;todo de Calculo</td> 
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Tipo</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Dimensi&oacute;n</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Frecuencia</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Sentido</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">U. medida</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Meta</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Supuesto</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Medio Verificaci&oacute;n</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Resultado</td>
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Fecha Captura</td> 
        <td style="border:solid 1px #ccc;background-color:#a0e667;">Periodo Evaluado</td>
      </tr> 
      <tbody> 
      <?php echo $html_tables; ?>
      </tbody> 
    </table>
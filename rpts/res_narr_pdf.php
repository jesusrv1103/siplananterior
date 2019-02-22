<?php

$contendio_componente_acc = "";
$contenido = "";
session_start();
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("dompdf_config.inc.php");
date_default_timezone_set('America/Mexico_City');
$id_dep = $_GET['idep'];

 $consulta_proyectos = mysql_query("SELECT 
    id_proyecto,
    id_eje,
    id_linea,
    id_estrategia,
    no_proyecto,
    nombre,
    finalidad,
    funcion,
    subfuncion

        FROM proyectos WHERE id_dependencia = ".$id_dep ." order by no_proyecto ASC",$siplan_data_conn)or die (mysql_error()); 

$inicio_html = "
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<style>
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:10px;
}
.titulo{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color: #333;
}
.cabecera{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
table{
	border:solid 1px #666666;
}
td{
	border-right:solid 1px #666;
	border-bottom:solid 1px #666;
}
</style>
<title>Reporte General Actividades</title>
</head>
<body>
<table width='100%' cellspacing='1' cellpadding='4' style='border:0px;'>
  <tr>
    <td width='29%' valign='middle' style='border:0px;'><img src='logoupla.jpg' width='309' height='66'></td>
    <td width='71%' valign='top' style='border:0px;'><span class='titulo'><b>Coordinaci&oacute;n Estatal de Planeaci&oacute;n<br>
      Direcci&oacute;n de Planeaci&oacute;n</b></span><br>
      <span class='cabecera'>
      <b>Dependencia: </b>&nbsp;&nbsp;".$_SESSION["id_dependencia_v3"]."&nbsp; - &nbsp;".$_SESSION["nombre_dependencia_v3"]."<br>
      <b>Reporte:</b>&nbsp;Resumen Narrativo<br>
      <b>Fecha del reporte:</b>&nbsp;".date('d-m-Y H:i')."</span></td>
  </tr>
</table>
<hr>
<h2>Resumen Narrativo por dependencia</h2>
<table width='100%' cellspacing='0' cellpadding='2' style='border:1px solid #333;'>
<tr bgcolor='#FFFCFC'>
 <td>Nivel</td>
 <td>No.</td>
 <td>Nombre</td>
 <td>Eje</td>
 <td>L&iacute;nea</td>
 <td>Estrategia</td>
 <td>Objetivos</td>
</tr>
";

while($r_pro = mysql_fetch_assoc($consulta_proyectos)){
    $id_proyecto = $r_pro['id_proyecto'];
    $cons_eje = mysql_query("SELECT eje FROM eje where id_eje = ".$r_pro['id_eje'],$siplan_data_conn) or die (mysql_error());
    $cons_linea = mysql_query("SELECT nombre FROM linea where id_linea = ".$r_pro['id_linea'],$siplan_data_conn) or die (mysql_error());
    $cons_estrategia = mysql_query("SELECT nombre FROM estrategias where id_estrategia = ".$r_pro['id_estrategia'],$siplan_data_conn) or die (mysql_error());
    
    $cons_indicadores = mysql_query("SELECT nombre_fin,metodo_fin FROM indicadores_proyecto where id_proyecto = ".$id_proyecto,$siplan_data_conn) or die(mysql_error());
    $res_ind = mysql_fetch_assoc($cons_indicadores);
    $n_ind = $res_ind['nombre_fin'];
    $m_ind = $res_ind['metodo_fin'];
    unset($res_ind);
    mysql_free_result($cons_indicadores);
    
    $r_ind = "<b>Nombre:</b><br>".$n_ind."<br><b>M&eacute;todo:</b><br>".$m_ind;
   
    $contenido_tabla_pr = "<tr bgcolor='#DAF3E8'>
    <td>Programa Presupuestario</td>
     <td>".$r_pro['no_proyecto']."</td>
     <td>".$r_pro['nombre']."</td>
     <td>".mysql_result($cons_eje,0)."</td>
     <td>".mysql_result($cons_linea,0)."</td>
     <td>".mysql_result($cons_estrategia,0)."</td>
     <td>".$r_ind."</td>
     </tr>";
    mysql_free_result($cons_eje);
    mysql_free_result($cons_linea);
    mysql_free_result($cons_estrategia);
    
    $cons_comp = mysql_query("SELECT id_componente,descripcion,no_componente,ped_eje,ped_linea,ped_estrategia FROM componentes where id_proyecto = ".$id_proyecto,$siplan_data_conn)or die (mysql_error());
    $cont_comps = "";
    while($r_comp = mysql_fetch_assoc($cons_comp)){
        $cons_eje = mysql_query("SELECT eje FROM eje where id_eje = ".$r_comp['ped_eje'],$siplan_data_conn) or die (mysql_error());
        $cons_linea = mysql_query("SELECT nombre FROM linea where id_linea = ".$r_comp['ped_linea'],$siplan_data_conn) or die (mysql_error());
        $cons_estrategia = mysql_query("SELECT nombre FROM estrategias where id_estrategia = ".$r_comp['ped_estrategia'],$siplan_data_conn) or die (mysql_error());
        $id_comp = $r_comp['id_componente'];
        
        
    $cons_indicadores_c = mysql_query("SELECT nombre,metodo_calculo FROM indicadores_componente where id_componente = ".$id_comp,$siplan_data_conn) or die(mysql_error());
    $res_ind = mysql_fetch_assoc($cons_indicadores_c);
    $n_ind = $res_ind['nombre'];
    $m_ind = $res_ind['metodo_calculo'];
    unset($res_ind);
    mysql_free_result($cons_indicadores_c);
    $r_ind = "<b>Nombre:</b><br>".$n_ind."<br><b>M&eacute;todo:</b><br>".$m_ind;
        
        
        
        
        $cont_comps = "<tr bgcolor='#EBF3F0'><td>Componente</td>
        <td>".$r_comp['no_componente']."</td>
        <td>".$r_comp['descripcion']."</td>
        <td>".mysql_result($cons_eje,0)."</td>
     <td>".mysql_result($cons_linea,0)."</td>
     <td>".mysql_result($cons_estrategia,0)."</td>
        <td>".$r_ind."</td></tr>";
    unset($r_ind);    
       /* mysql_free_result($cons_eje);
    mysql_free_result($cons_linea);
    mysql_free_result($cons_estrategia);*/
        $cons_acc = mysql_query("SELECT id_accion,no_accion,descripcion,ped FROM acciones WHERE id_componente = ".$id_comp,$siplan_data_conn) or die (mysql_error());
        $cont_acc = "";
        while($r_acc = mysql_fetch_assoc($cons_acc)){
           
           
      /*  $accion_eje = mysql_query("SELECT eje FROM eje where id_eje = ".$r_acc['ped_eje'],$siplan_data_conn) or die (mysql_error());
        $accion_linea = mysql_query("SELECT nombre FROM linea where id_linea = ".$r_acc['ped_linea'],$siplan_data_conn) or die (mysql_error());
        */
        $accion_estrategia = mysql_query("SELECT nombre FROM estrategias where id_estrategia = ".$r_acc['ped'],$siplan_data_conn) or die (mysql_error()); 
        
        $id_accion = $r_acc['id_accion'];
            
     
            
            $cons_indicadores_a = mysql_query("SELECT nombre,metodo_calculo FROM indicadores_accion where id_accion = ".$id_accion,$siplan_data_conn) or die(mysql_error());
    $res_ind = mysql_fetch_assoc($cons_indicadores_a);
    $n_ind = $res_ind['nombre'];
    $m_ind = $res_ind['metodo_calculo'];
    unset($res_ind);
    mysql_free_result($cons_indicadores_a);
    $r_ind = "<b>Nombre:</b><br>".$n_ind."<br><b>M&eacute;todo:</b><br>".$m_ind;
            
            
            
            
            
            
            $cont_acc = $cont_acc."<tr><td>Actividad</td>
                    <td>".$r_acc['no_accion']."</td>
                        <td>".$r_acc['descripcion']."</td>
                            <td>".mysql_result($cons_eje,0)."</td>
                            <td>".mysql_result($cons_linea,0)."</td>
                            <td>".mysql_result($accion_estrategia,0)."</td>
                            <td>".$r_ind."</td></tr>";
        }
        $contendio_componente_acc = $contendio_componente_acc.$cont_comps.$cont_acc;
        unset($r_acc);
        mysql_free_result($cons_acc);
        
        mysql_free_result($cons_eje);
    mysql_free_result($cons_linea);
    mysql_free_result($cons_estrategia);
    }
    $contenido = $contenido.$contenido_tabla_pr.$contendio_componente_acc;
    $contendio_componente_acc = "";
    unset($r_comp);
    mysql_free_result($cons_comp);
    
}
unset($r_pro);
mysql_free_result($consulta_proyectos);


$full_html = utf8_decode($inicio_html.$contenido)."</table></body></html>";


$dompdf = new DOMPDF();
$dompdf->load_html($full_html);
$dompdf->set_paper("legal","landscape");
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$canvas->page_text(20, 585, "Resumen Narrativo: Pag {PAGE_NUM} de {PAGE_COUNT}",$font, 7, array(0,0,0));
$canvas->page_text(450, 585, "Fecha del reporte: ".date('d-m-Y | h:i:s a'),$font, 7, array(0,0,0));
$dompdf->stream("res_narrativo.pdf",array("Attachment" => 0));
?>

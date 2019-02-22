<?php session_start();

$tipo=$_GET['g'];

if ($tipo!="" and $_SESSION['id_dependencia_v3']!=""){

require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
//

?>
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
	
</style>
<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
 <link rel="stylesheet" href="../css/jquery-ui.css" />
<script  language="JavaScript" type="text/javascript">
 function mostrar_loc(str)
 {

 if (str=="")
   {
   document.getElementById("datos").innerHTML="";
   return;
   } 
 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("datos").innerHTML=xmlhttp.responseText;
     }
   }
   
 xmlhttp.open("GET","det_map.php?mp="+str,true);
 xmlhttp.send();
 }
 
 
 
 
 function objetoAjax(){
        var xmlhttp=false;
        try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
                try {
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                        xmlhttp = false;
                }
        }

        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
}

 
 
 </script>
<script type="text/javascript" charset="utf-8">



			$(document).ready(function() {
				$('#example1').dataTable({
				
				
				  "iDisplayLength": -1,
 
        "oLanguage": {
           "sLengthMenu": 'Mostrar <select>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
			'<option value="50">50</option>'+
			'<option value="100">100</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros por pagina',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sSearch": "Buscar",
            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"
            
        },
		
		
		
		
    });
			} );
</script>

<script type="text/javascript" src="../js/jquery.maphilight.js"></script><br>
<script type="text/javascript">//<![CDATA[
jQuery(document).ready(function($){$('#map').maphilight();});
//]]&gt;
</script>
<?php



}


?>



 <title>Resumen por Programa</title>
 
<div style="margin-left:20px; margin-right:20px;">
<h2>POA02 Resumen Programa</h2>
<div id="cuadro_info" style="width:1800px; height:2050px" >
<ul id="botones">
       <li><a href="reporte_resumen_prog1.php?g=<?php echo $tipo.$mn;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
<hr>


<?php 

if ($tipo=="prog"){ 
 $title="Resumen por Programa";


 $title2="POA de Inversión por Programas";


$titlebottom="Programas";
}


?>

  
	
 <div id="datos" style="margin-left:45%; position:absolute; width:50%;">

 </div>
<div  id="obras" style="margin-left:0px; position:absolute;  margin-top:0px; width:44%;  height: 1000px; overflow-y: scroll;" >
<div id="container" class="ex_highlight_row">

<table width="auto%"  cellpadding="0" cellspacing="0" border="0" class="display" id="example1">
 <thead>
    <tr  >
	   <td width="auto"><div align="center">Clave </div></td>    
	<td width="auto"><div align="center"> Programa</div></td>
    <td width="auto"><div align="right"> Total Programado</div></td>
    <td width="auto"><div align="right"> Total Aprobado</div></td>
    
  </tr>
  </thead>
  <tbody>
  <?php
  $totaedo=0;
  $totaedo1=0;

//$cc="SELECT `programas_poa`.`id_programa_poa`, `programas_poa`.`clave`, `programas_poa`.`descripcion` FROM `programas_poa` AS `programas_poa`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa` WHERE `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` and `obras`.`status_obra`>=3 GROUP BY `programas_poa`.`id_programa_poa` ORDER BY `programas_poa`.`clave` ASC ";//38
$cc="SELECT `id_programa_poa`, `clave`, `descripcion` FROM `programas_poa` AS `programas_poa` ORDER BY `clave` ASC";
    $consulta_cc=mysql_query($cc);
     while ($resw = mysql_fetch_assoc($consulta_cc)) {
			$totalprg=0;
		  $totalapd=0;
		  $totalamp=0;
		  $totalcan=0;
		  
   
     	 $query="SELECT Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, obras.programa_poa
FROM
obras
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
    	 WHERE obras.programa_poa= ".$resw['id_programa_poa']." AND obras.status_obra >= 3 
     	 ORDER BY obras.programa_poa ASC";
    $consulta_obras9=mysql_query($query,$siplan_data_conn);
  	$totprg=mysql_fetch_assoc($consulta_obras9);
  	$totalprg=$totprg['total'];

 $query1="SELECT `obras`.`programa_poa`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `obras`.`programa_poa` = ".$resw['id_programa_poa']."   AND `poa02_origen`.`tipo` = 0 AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4' 
AND ( `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 OR `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 )
 ORDER BY `obras`.`programa_poa` ASC";
		 $consulta_obras1=mysql_query($query1,$siplan_data_conn);
		 $totapd=mysql_fetch_assoc($consulta_obras1);
		 $totalapd=$totapd['total'];
		 
		 $query2="SELECT `obras`.`programa_poa`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `obras`.`programa_poa` = ".$resw['id_programa_poa']."   AND `poa02_origen`.`tipo` = 1 AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4' 
AND ( `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 OR `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 )
 ORDER BY `obras`.`programa_poa` ASC";
		 $consulta_obras2=mysql_query($query2,$siplan_data_conn);
		 $totamp=mysql_fetch_assoc($consulta_obras2);
		 $totalamp=$totamp['total'];
		 
		 $query3="SELECT `obras`.`programa_poa`, SUM( `poa02_origen`.`monto` ) AS `total` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `obras`.`programa_poa` = ".$resw['id_programa_poa']."   AND `poa02_origen`.`tipo` = 2 AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4' 
AND ( `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 OR `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 )
 ORDER BY `obras`.`programa_poa` ASC";
		 $consulta_obras3=mysql_query($query3,$siplan_data_conn);
		 $totcan=mysql_fetch_assoc($consulta_obras3);
		 $totalcan=$totcan['total'];

		$total_apro=(($totalapd+$totalamp)-$totalcan);
	
if ($totalprg!=0 or $total_apro!=0 ){
  ?>
 <tr onclick="$('#datos').load('det_prg.php?prg=<?php echo $resw['id_programa_poa']; $mn=$resw['id_programa_poa'];?>');"  style="cursor: pointer;"  >
   <td align="center"><?php echo $resw['clave']; ?></td> 
    <td><?php echo $resw['descripcion']; ?></td>    
	<td align="right"><?php echo "$ ".number_format($totalprg,2);

	?></td>
	<td align="right"><?php echo "$ ".number_format($total_apro,2); $totaedo1+=$total_apro; ?></td>   
	
 </tr>  
    <?php $totaedo=$totaedo+$totalprg; //}
}
     } ?>
     
     
     
     
    </tbody>
    <tfoot>
     <tr bgcolor="#CCCCCC">
	  
    <td width="30%"><div align="center"></div></td>    
    
	<td width="30%"><div align="center">Total General</div></td>
    <td width="30%"><div align="center"><?php echo "$ ".number_format($totaedo,2); ?></div></td>
      <td width="30%"><div align="center"><?php echo "$ ".number_format($totaedo1,2); ?></div></td>
	  </tr>
      <tr>
	  
    <td width="30%"><div align="center">Clave </div></td>    
	<td width="30%"><div align="center"> Origen</div></td>
    <td width="30%"><div align="center"> Total Programado</div></td>
    <td width="30%"><div align="center"> Total Aprobado</div></td>
	  </tr>
  </tfoot>
  </table>
  </div>
  
 </div> 


 <b></div>
</br>
</div></div>
</br>	

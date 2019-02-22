<?php session_start();

$tipo=$_GET['g'];

if ($tipo!="" and $_SESSION['id_dependencia_v3']!=""){

require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");

?>
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
			.ex_highlight #example1 tbody tr.even:hover, #example1 tbody tr.even td.highlighted {
	background-color: #ECFFB3;
}

.ex_highlight #example1 tbody tr.odd:hover, #example1 tbody tr.odd td.highlighted {
	background-color: #E6FF99;
}

.ex_highlight_row #example1 tr.even:hover {
	background-color: #ECFFB3;
}

.ex_highlight_row #example1 tr.even:hover td.sorting_1 {
	background-color: #DDFF75;
}

.ex_highlight_row #example1 tr.even:hover td.sorting_2 {
	background-color: #E7FF9E;
}

.ex_highlight_row #example1 tr.even:hover td.sorting_3 {
	background-color: #E2FF89;
}

.ex_highlight_row #example1 tr.odd:hover {
	background-color: #E6FF99;
}

.ex_highlight_row #example1 tr.odd:hover td.sorting_1 {
	background-color: #D6FF5C;
}

.ex_highlight_row #example1 tr.odd:hover td.sorting_2 {
	background-color: #E0FF84;
}

.ex_highlight_row #example1 tr.odd:hover td.sorting_3 {
	background-color: #DBFF70;
}
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



<?php if ($tipo=="org"){  ?>
 <title>Resumen por Origen </title>
 
<div style="margin-left:20px; margin-right:20px;">
<h2>POA02 Resumen Origen </h2>
<div id="cuadro_info" style="width:1800px; height:2050px" >
<ul id="botones">
       <li><a href="reporte_resumen_org1.php?g=<?php echo $tipo.$mn;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
<hr>

<?php 
}

?>


<?php 



if ($tipo=="org"){ 
 $title="Resumen por Origenes";


 $title2="POA de Inversión por Origenes";


$titlebottom="Origen";
}


  
 

?>

  
	
 <div id="datos" style="margin-left:45%; position:absolute; width:50%;">

 </div>
<div  id="obras" style="margin-left:0px; position:absolute;  margin-top:0px; width:44%;  height: 1000px; overflow-y: scroll;" >
<div id="container" class="ex_highlight_row">

<table width="auto%"  cellpadding="0" cellspacing="0" border="0" class="display" id="example1">
 <thead>
    <tr  >
	   <td width="auto"><div align="center">No. </div></td>    
	<td width="auto"><div align="center"> Origen</div></td>
	<?php if ($tipo=="org"){  ?>
    <td width="auto"><div align="right"> Total Programado</div></td>
    <td width="auto"><div align="right"> Total Aprobado</div></td>
    <?php }?>
   
  </tr>
  </thead>
  <tbody>
  <?php
  $totaedo=0;
  $totaedo1=0;
if ($tipo=="org"){

$num_org = array();
$nom_org = array();



$cc="SELECT `s08c_origen`,c08c_tipori FROM origen  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
			 
		 }
  	
$cc="SELECT `s08c_origen`,c08c_tipori FROM origen61  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen62  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen63  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen69  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen71  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen74  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen75  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
  	
  	
  	$cc="SELECT `s08c_origen`,c08c_tipori FROM origen76  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen77  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 
		 $cc="SELECT `s08c_origen`,c08c_tipori FROM origen78  GROUP BY `s08c_origen`";
    $consulta_cc=mysql_query($cc);
  	 	 while ($resw = mysql_fetch_assoc($consulta_cc)) {
			 
			 if (!in_array($resw['s08c_origen'],$num_org))
			 {
		$num_org[]=	$resw['s08c_origen'];
		$nom_org[] = $resw['c08c_tipori'];
	}
			 
		 }
		 

  	
  	
  	
  	
  	
  	
  	
     	 for ($i = 0; $i <= count($num_org); $i++) {
		 
		 $totalprg=0;
		  $totalapd=0;
		  $totalamp=0;
		  $totalcan=0;
		  
		 
  	 $query="SELECT `obras`.`origen`, `obras`.`status_obra`, SUM( obras.`federal` + obras.`estatal` + obras.`municipal` + obras.`participantes` + obras.`credito` + obras.`otros` ) AS `total` FROM `obras` AS `obras` WHERE  `obras`.`origen` = ".$num_org[$i]." AND `obras`.`status_obra` >= 3 ORDER BY `obras`.`origen` ASC";
  	$consulta_obras9=mysql_query($query,$siplan_data_conn);
  	$totprg=mysql_fetch_assoc($consulta_obras9);
  	$totalprg=$totprg['total'];
  	
  		$query1="SELECT SUM( `monto` ) AS `total` 
		FROM `poa02_origen` AS `poa02_origen` 
		WHERE ( `s08c_origen` = ".$num_org[$i]." AND ( `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 0 AND `s07c_partid` BETWEEN 4000 AND 4999 OR `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 0 AND `s07c_partid` BETWEEN 6000 AND 6999 ) )";
		 $consulta_obras1=mysql_query($query1,$siplan_data_conn);
		 $totapd=mysql_fetch_assoc($consulta_obras1);
		 $totalapd=$totapd['total'];
		 
		 $query2="SELECT SUM( `monto` ) AS `total` 
		FROM `poa02_origen` AS `poa02_origen` 
		WHERE ( `s08c_origen` = ".$num_org[$i]." AND ( `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 1 AND `s07c_partid` BETWEEN 4000 AND 4999 OR `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 1 AND `s07c_partid` BETWEEN 6000 AND 6999 ) )";
		 $consulta_obras2=mysql_query($query2,$siplan_data_conn);
		 $totamp=mysql_fetch_assoc($consulta_obras2);
		 $totalamp=$totamp['total'];
		 
		 $query3="SELECT SUM( `monto` ) AS `total` 
		FROM `poa02_origen` AS `poa02_origen` 
		WHERE ( `s08c_origen` = ".$num_org[$i]." AND ( `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 2 AND `s07c_partid` BETWEEN 4000 AND 4999 OR `id_oficio` != 0 AND `status_of` = 2 AND `tipo` = 2 AND `s07c_partid` BETWEEN 6000 AND 6999 ) )";
		 $consulta_obras3=mysql_query($query3,$siplan_data_conn);
		 $totcan=mysql_fetch_assoc($consulta_obras3);
		 $totalcan=$totcan['total'];

		$total_apro=(($totalapd+$totalamp)-$totalcan);  
  $consulta_obras=mysql_query($query,$siplan_data_conn);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
	
if ($totalprg!=0 or $total_apro!=0){
  ?>
 <tr onclick="$('#datos').load('det_org.php?mp=<?php echo $num_org[$i]; $mn=$num_org[$i];?>');"  style="cursor: pointer;"  >
   <td align="center"><?php echo $num_org[$i]; ?></td> 
    <td><?php echo $nom_org[$i]; ?></td>    
	<td align="right"><?php echo "$ ".number_format($totalprg,2); 

	?></td>

	<td align="right"><?php echo "$ ".number_format($total_apro,2); $totaedo1+=$total_apro; ?></td>   
	
 </tr>  
    <?php }  $totaedo=$totaedo+$totalprg; } }
    
}    ?>     
    </tbody>
    <tfoot>
     <tr bgcolor="#CCCCCC">
	  
    <td width="30%"><div align="center"></div></td>    
    
	<td width="30%"><div align="center">Total General</div></td>
    <td width="30%"><div align="center"><?php echo "$ ".number_format($totaedo,2); ?></div></td>
      <td width="30%"><div align="center"><?php echo "$ ".number_format($totaedo1,2); ?></div></td>
	  </tr>
      <tr>
	  
    <td width="30%"><div align="center">No. </div></td>    
	<td width="30%"><div align="center"> Origen</div></td>
<?php if ($tipo=="org"){  ?>
    <td width="auto"><div align="right"> Total Programado</div></td>
    <td width="auto"><div align="right"> Total Aprobado</div></td>
    <?php }?>
  
	  </tr>
  </tfoot>
  </table>
  </div>
  
 </div> 


 <b></div>
</br>
</div></div>
</br>	

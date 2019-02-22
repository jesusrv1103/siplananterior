<?php session_start();

$mp=$_GET['mp'];

if ( $mp!="" and $_SESSION['id_dependencia_v3']!=""){
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require_once ("libchart/classes/libchart.php");
}
//
?>
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
			.ex_highlight #example2 tbody tr.even:hover, #example2 tbody tr.even td.highlighted {
	background-color: #ECFFB3;
}

.ex_highlight #example2 tbody tr.odd:hover, #example2 tbody tr.odd td.highlighted {
	background-color: #E6FF99;
}

.ex_highlight_row #example2 tr.even:hover {
	background-color: #ECFFB3;
}

.ex_highlight_row #example2 tr.even:hover td.sorting_1 {
	background-color: #DDFF75;
}

.ex_highlight_row #example2 tr.even:hover td.sorting_2 {
	background-color: #E7FF9E;
}

.ex_highlight_row #example2 tr.even:hover td.sorting_3 {
	background-color: #E2FF89;
}

.ex_highlight_row #example2 tr.odd:hover {
	background-color: #E6FF99;
}

.ex_highlight_row #example2 tr.odd:hover td.sorting_1 {
	background-color: #D6FF5C;
}

.ex_highlight_row #example2 tr.odd:hover td.sorting_2 {
	background-color: #E0FF84;
}

.ex_highlight_row #example2 tr.odd:hover td.sorting_3 {
	background-color: #DBFF70;
}
</style>
<style type="text/css">
.porto {
display: inline;
float: left;
list-style: none outside none;

}
.porto li {
display: inline;
float: left;
float: left;
margin-left: 30px;
margin-right: 10px
}
.pop_m{
background: rgba(0, 0, 0, 0.5);/*semi transparencia*/
display: none;
height: 100%;
left: 0;
overflow: hidden;
position: fixed;
top: 0;
width: 100%;
z-index: 9999
}
.pop_contenido{
	margin-top: 100px; 
	z-index: 9999;
	
/*height: 300px;
left: 15%;
margin-left: -175px; 
margin-top: -150px; 
position: fixed;
top: 50%;
width: 80%;
z-index: 9999*/
}
.pop_m p{
color: #FFFFFF;
text-align: center;
text-shadow: 0 1px 0 #444444
}
.pop_contenido img{

}
a.cerrar{
color: #fff;
cursor: pointer;
display: inline;
float: right;
font-size: 1.em;
margin-right:40px;
}


</style>
<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
<script type="text/javascript" >
$(document).ready(function () {
$('.porto a').click(function (event) {
$(this).next('div').css({
display: 'block'
});
event.preventDefault();
});


$('.porto a.cerrar').click(function (event) {
$('div.pop_m').css({
display: 'none'
});
event.preventDefault();
});


$('.porto a.print').click(function (event) {

window.open($(this).attr("href"));


event.preventDefault();
});



});
</script>
<script type="text/javascript" charset="utf-8">



/*			$(document).ready(function() {
				$('#example2').dataTable({
//				"sDom": '"clear"&gt;',
				
				  "iDisplayLength": -1,
 
        "oLanguage": {
           "sLengthMenu": '',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
           
            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"
            
        }//,
		
	//	"bSort": false
		
    });
			} );*/
			

 
 $(document).ready(function() {
    /*
     * Insert a 'details' column to the table
     */
	
  
     
    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#example2').dataTable( {
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
    
    
    
     var oTable = $('#example3').dataTable( {
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
			
			
			
</script>




<?php 

  $query="SELECT dependencias.acronimo, municipios.nombre,origen.s08c_origen, origen.c08c_tipori, municipios.id_municipio, 
Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros,
Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total,
Count(dependencias.acronimo) AS CuentaDeacronimo
FROM obras
INNER JOIN origen ON origen.s08c_origen = obras.origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN dependencias ON dependencias.id_dependencia = obras.id_dependencia
INNER JOIN regiones ON municipios.id_region = regiones.id_region
 where obras.origen=".$mp." and obras.status_obra>=3 GROUP BY dependencias.id_dependencia";



$consulta_obras = mysql_query($query);//1,$siplan_data_conn);// or die (mysql_error());

$mun=mysql_query("select * from origen where s08c_origen=".$mp);//1,$siplan_data_conn);	
	$row=mysql_fetch_array($mun);
	


?>

 

<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<div align="center"><h4>Resumen de Inversi&oacute;n Programado de <?php echo $row['s08c_origen']." ".$row['c08c_tipori']; ?></h4></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example2">
 <thead>
    <tr    >
	   <td  width="auto"><div align="center">Dependencia</div></td>    
	<td  width="auto"><div align="center"> No. Obras</div></td>
    <td width="auto"><div align="center"> Aporte Federal</div></td>
	<td width="auto"><div align="center"> Aporte Estatal</div></td>
	<td width="auto"><div align="center"> Aporte Municipal</div></td>
	<td width="auto"><div align="center"> Aporte Participantes</div></td>
	<td width="auto"><div align="center"> Aporte Creditos</div></td>
	<td width="auto"><div align="center"> Aporte Otros</div></td>
	<td width="auto"><div align="center"> Total</div></td>
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
  $consulta_obras=mysql_query($query);//1$siplan_data_conn);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
   <td align="center" class="porto">
	
<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_<?php echo $resobras['acronimo'];?>').load('obras_org.php?dep=<?php echo $resobras['acronimo']."&org=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($resobras['CuentaDeacronimo']); ?>
    </b>
   </a>
<div class="pop_m">

<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Programadas Origen <?php echo $row['s08c_origen'];?> y la Dependencia <?php echo $resobras['acronimo']; ?></p>
<div class="pop_contenido">

<div id="datoss<?php echo "_".$resobras['acronimo']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_org.php?dep=<?php echo $resobras['acronimo']."&org=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>
    
    </td>       
	<td align="right"><?php echo "$".number_format($resobras['SumaDefederal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeestatal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDemunicipal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeparticipantes'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDecredito'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeotros'],2); ?></td>
	<td abbr="right"><?php echo "$".number_format($resobras['total'],2); ?></td>

	
	
 </tr>  
    <?php $tt=$tt+$resobras['total'];
	$fd=$fd+$resobras['SumaDefederal'];
	$st=$st+$resobras['SumaDeestatal'];
	$mn=$mn+$resobras['SumaDemunicipal'];
	$pt=$pt+$resobras['SumaDeparticipantes'];
	$cr=$cr+$resobras['SumaDecredito'];
	$ot=$ot+$resobras['SumaDeotros'];
	$cp=$cp+$resobras['CuentaDeacronimo']; } ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">
	    
    <td width="auto"><div align="center">Total:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_mp<?php echo $mp;?>').load('obras_org.php?dep=org<?php echo "&org=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cp); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Programadas Origen <?php echo $row['s08c_origen'];?> </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_mp".$mp; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_org.php?dep=org<?php echo "&org=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>



    
    </td>  

    <td width="auto"><div align="right"> <?php echo "$".number_format($fd,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($st,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($mn,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($pt,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($cr,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($ot,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div></div>
  
 </div> 
 
 <?php 
 $chart = new VerticalBarChart(900,350); //1200,350 8400,2250
	 


   $quer="SELECT dependencias.acronimo, municipios.nombre,origen.s08c_origen, origen.c08c_tipori, municipios.id_municipio, 
Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total
FROM obras
INNER JOIN origen ON origen.s08c_origen = obras.origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN dependencias ON dependencias.id_dependencia = obras.id_dependencia
INNER JOIN regiones ON municipios.id_region = regiones.id_region 
where obras.origen=".$mp." and obras.status_obra>=3 GROUP BY dependencias.id_dependencia ";

$consulta_obrasm = mysql_query($quer);


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

	{

?>
			
           
        
<?php
	$dataSet->addPoint(new Point( $rowm['acronimo'], (number_format($rowm['total'],2,".",""))));

	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle( "Origen ".$row['s08c_origen']." ".$row['c08c_tipori']);
$chart->render("tmp/org".$row['s08c_origen'].".png");


?>

            

	
   

<br />	
<img alt="Line chart"  src="tmp/org<?php  echo $row['s08c_origen'].".png?d=".rand();?> style="border: 1px solid gray;"/>

</br>


</br>
</br>
</br>
<?php 

   $query="SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`origen`,`dependencias`.`id_dependencia`,dependencias.acronimo, poa02_origen.s08c_origen
 FROM `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
 WHERE `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999  and poa02_origen.s08c_origen=".$mp." 
OR `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	and poa02_origen.s08c_origen=".$mp."  
 GROUP BY dependencias.id_dependencia";
	




$consulta_obras = mysql_query($query);

$mun=mysql_query("select * from origen where s08c_origen=".$mp);//1,$siplan_data_conn);	
	$row=mysql_fetch_array($mun);


?>

 

<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<div align="center"><h4>Resumen de Inversi&oacute;n Aprobada de <?php echo $row['s08c_origen']." ".$row['c08c_tipori']; ?></h4></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
 <thead>
    <tr    >
	   <td  width="auto"><div align="center">Dependencia</div></td>    
	<td  width="auto"><div align="center"> No. Obras</div></td>
    <td width="auto"><div align="center"> Aporte Federal</div></td>
	<td width="auto"><div align="center"> Aporte Estatal</div></td>
	<td width="auto"><div align="center"> Aporte Municipal</div></td>
	<td width="auto"><div align="center"> Aporte Participantes</div></td>
	<td width="auto"><div align="center"> Aporte Creditos</div></td>
	<td width="auto"><div align="center"> Aporte Otros</div></td>
	<td width="auto"><div align="center"> Total</div></td>
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
  $consulta_obras=mysql_query($query);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
    	
    	

	
    	$sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen ") or die (mysql_error());

	
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
	 
		 	 if($orige_n=="3102"){

			 $particip= $particip + $res_aporte_eje['sumamonto'];

			}else{ 
	 
		
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
}
	
	//sacar tipo ampliaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND poa02_origen.s08c_origen = ".$mp." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND poa02_origen.s08c_origen = ".$mp." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen
") or die (mysql_error());

	
	 $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{ 
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);
	  

	

			 	 if($orige_n=="3102"){

			 $particip= $particip + $res_aporte_amp['sumamonto'];

			}else{
	  
		
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
	}
	
		
	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND poa02_origen.s08c_origen = ".$mp." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND poa02_origen.s08c_origen = ".$mp." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen
") or die (mysql_error());
	//$res_aporte_est_can= mysql_fetch_assoc($sac_aportes_est_can);
	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{ 
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);
	
		 

	 	 if($orige_n=="3102"){

			 $particip= $particip - $res_aporte_can['sumamonto'];

			}else{
 	 
		
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
	
	}
	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;    
	
	
	
	 $sac_cuenta = mysql_query("SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`origen`, `poa02_origen`.`id_obra`, `obras`.`id_dependencia` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `obras`.`id_dependencia` = '".$resobras['id_dependencia']."' AND poa02_origen.s08c_origen = ".$mp."
   OR `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `obras`.`id_dependencia` = '".$resobras['id_dependencia']."' AND poa02_origen.s08c_origen = ".$mp."
	GROUP BY `poa02_origen`.`id_obra`");
	$res_cuenta= mysql_num_rows($sac_cuenta);	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 

     <td align="center" class="porto">
	
<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datossp_<?php echo $resobras['acronimo'];?>').load('obras_org.php?dep=<?php echo $resobras['acronimo']."&ap=1&org=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($res_cuenta); ?>
    </b>
   </a>
<div class="pop_m">

<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Aprobadas Origen <?php echo $row['s08c_origen'];?> y la Dependencia <?php echo $resobras['acronimo']; ?></p>
<div class="pop_contenido">

<div id="datossp<?php echo "_".$resobras['acronimo']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_org.php?dep=<?php echo $resobras['acronimo']."&ap=1&org=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>
    
    </td>         
	<td align="right"><?php echo "$".number_format($federal,2); ?></td>
	<td align="right"><?php echo "$".number_format($estatal,2); ?></td>
	<td align="right"><?php echo "$".number_format($municipal,2); ?></td>
	<td align="right"><?php echo "$".number_format($particip,2); ?></td>
	<td align="right"><?php echo "$".number_format($credito,2); ?></td>
	<td align="right"><?php echo "$".number_format($otros,2); ?></td>
	<td align="right"><?php echo "$".number_format($totals,2); ?></td>

	
	
 </tr>  
    <?php $tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	$cp=$cp+$res_cuenta; } ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">
	    
    <td width="auto"><div align="center">Total:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datossap_mp<?php echo $mp;?>').load('obras_org.php?dep=org<?php echo "&ap=1&org=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cp); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Aprobadas Origen <?php echo $row['s08c_origen'];?> </p>
<div class="pop_contenido">

<div id="datossap<?php echo "_mp".$mp; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_org.php?dep=org<?php echo "&ap=1&org=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>



    
    </td>  

    <td width="auto"><div align="right"> <?php echo "$".number_format($fd,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($st,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($mn,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($pt,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($cr,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($ot,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div></div>
  
 </div> 
 
 <?php 
 $chart = new VerticalBarChart(900,350); //1200,350 8400,2250
	 

  $quer="SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`origen`,dependencias.acronimo, poa02_origen.s08c_origen
 FROM `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
 WHERE `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999  and poa02_origen.s08c_origen=".$mp." 
	OR `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	and poa02_origen.s08c_origen=".$mp."  
 GROUP BY dependencias.id_dependencia";
  
  
  
$consulta_obrasm = mysql_query($quer);


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

	{
		
		$sac_0= mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$rowm['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$rowm['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999") or die (mysql_error());
	$res_0= mysql_fetch_assoc($sac_0);
	
	
	$sac_1= mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
	AND `dependencias`.`acronimo` = '".$rowm['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1
	AND `dependencias`.`acronimo` = '".$rowm['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999") or die (mysql_error());
	$res_1= mysql_fetch_assoc($sac_1);
	
	
	
	$sac_2= mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
	AND `dependencias`.`acronimo` = '".$rowm['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2
	AND `dependencias`.`acronimo` = '".$rowm['acronimo']."' AND poa02_origen.s08c_origen = ".$mp."
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
		AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999") or die (mysql_error());
	$res_2= mysql_fetch_assoc($sac_2);

?>
			
           
        
<?php
	$dataSet->addPoint(new Point( $rowm['acronimo'], (number_format((($res_0['sumamonto']+$res_1['sumamonto'])-$res_2['sumamonto']),2,".",""))));

	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle( "Aprobado Origen ".$row['s08c_origen']." ".$row['c08c_tipori']);
$chart->render("tmp/org".$row['s08c_origen']."_ap.png");


?>

            

	
   

<br />	
<img alt="Line chart"  src="tmp/org<?php  echo $row['s08c_origen']."_ap.png?d=".rand(); ?> style="border: 1px solid gray;"/>

</br>

<div style="margin-left:300px; margin-top:10px;"
<ul id="botones">
       <li><a href="reporte_resumen_org1.php?g=<?php echo $mp;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
</div>
</br>
		

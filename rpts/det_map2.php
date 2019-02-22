<?php session_start();
$mp=$_GET['mp']; 
if ( $mp!="" and $_SESSION['id_dependencia_v3']!=""){
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require_once ("libchart/classes/libchart.php");
}

?>
 <link rel="stylesheet" href="../css/jquery-ui.css" />
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
		
</style>

<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">



			$(document).ready(function() {
				$('#example4').dataTable({
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
		
    });
			} );
			
		
			
</script>

	
<?php 


   $query="SELECT programas_poa.id_programa_poa, programas_poa.descripcion, obras.municipio, poa02_origen.id_obra, poa02_origen.id_oficio, poa02_origen.status_of 
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND obras.municipio = ".$mp." 
 AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
 GROUP BY obras.programa_poa ORDER BY programas_poa.id_programa_poa ASC";
 
$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from municipios where id_finanzas=".$mp);	
	$row=mysql_fetch_assoc($mun);
	
?>


<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<?php if ($mp!="59"){
?>
<div align="center"><h3>Inversi&oacute;n de <?php echo $row['nombre']; ?> 2016</h3></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example4">
 <thead>
    <tr    >
	   <td  width="auto"><div align="center">Programa</div></td>    
	<td  width="auto"><div align="center"> No. Obras</div></td>

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

$valores=array[];
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {


	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['descripcion']; ?></td> 
    <td align="center">
	 

	<?php
	

	
			$sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia` 
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_finanzas` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_finanzas` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");
	$res_cuenta= mysql_num_rows($sac_cuenta);		 
	
	
	echo number_format($res_cuenta); ?>
    </b>



    
    </td>    
    <?php
    
	
$sac_aportes_eje = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 0 
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."' 
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
GROUP BY poa02_origen.s08c_origen");

	
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
	
		
	////termina ejecuciones
	
	

	//sacar tipo ampliaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_amp = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 1 
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."' 
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
GROUP BY poa02_origen.s08c_origen");
 	

	
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
 	$sac_aportes_can = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 2 
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."' 
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
GROUP BY poa02_origen.s08c_origen");
 	
 	
 	
 	
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

	<td align="right"><?php echo number_format($totals,2); ?></td>

	
	
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
 <td align="center" >
	<?php
		
	echo number_format($cp); ?>
    </b>
       
    </td>  
  
	<td width="auto"><div align="right"><?php echo number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div>
  <?php } ?>

  </div>
  
 </div> 
 
<?php mysql_close($siplan_data_conn); ?>
	

	
	<?php


 
if ( $_GET!="" and $_SESSION['id_dependencia_v3']!=""){
 $link=conectarse();
}



function conectarse()
{

if(!($link=@mysql_connect("10.221.12.2","usr_siplan_new","05dEfsipl#4N")))
{
echo "Error conectando a la base de datos.";
exit();
}
//if (!mysql_select_db("",$link)) //nombre de la base de datos --- 
if (!mysql_select_db("siplan2015",$link))
{
echo "Error seleccionando la base de datos.";
exit();	
}
return $link;
} //



 $consulta_munz = mysql_query("SELECT * FROM municipios where id_finanzas=".$_GET['mp'] );// or die (mysql_error());

			   $res_munz = mysql_fetch_array($consulta_munz);

 $mp=$res_munz['id_municipio'];

?>
 <link rel="stylesheet" href="../css/jquery-ui.css" />
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
		
</style>

<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">



			$(document).ready(function() {
				$('#example3').dataTable({
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
		
    });
			} );
			
		
			
</script>

	
<?php 


   $query="SELECT programas_poa.id_programa_poa, programas_poa.descripcion, obras.municipio, poa02_origen.id_obra, poa02_origen.id_oficio, poa02_origen.status_of 
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND obras.municipio = ".$mp." 
 AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
 GROUP BY obras.programa_poa ORDER BY programas_poa.id_programa_poa ASC";
 
$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from municipios where id_finanzas=".$mp);	
	$row=mysql_fetch_assoc($mun);
	
?>


<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<?php if ($mp!="59"){
?>
<div align="center"><h3>Inversi&oacute;n de <?php echo $row['nombre']; ?> 2015 </h3></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
 <thead>
    <tr    >
	   <td  width="auto"><div align="center">Programa</div></td>    
	<td  width="auto"><div align="center"> No. Obras</div></td>

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
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo utf8_encode($resobras['descripcion']); ?></td> 
    <td align="center">
	 


	<?php
	

	
			$sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia` 
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_finanzas` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_finanzas` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");
	$res_cuenta= mysql_num_rows($sac_cuenta);		 
	
	
	echo number_format($res_cuenta); ?>
    </b>



    
    </td>    
    <?php
    
	
$sac_aportes_eje = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 0 
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."' 
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
GROUP BY poa02_origen.s08c_origen");

	
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
	
		
	////termina ejecuciones
	
	

	//sacar tipo ampliaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_amp = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 1 
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."' 
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
GROUP BY poa02_origen.s08c_origen");
 	

	
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
 	$sac_aportes_can = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa 
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 2 
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."' 
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 ) 
GROUP BY poa02_origen.s08c_origen");
 	
 	
 	
 	
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

	<td align="right"><?php echo number_format($totals,2); ?></td>

	
	
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
 <td align="center" >
	<?php
		
	echo number_format($cp); ?>
    </b>
       
    </td>  
  
	<td width="auto"><div align="right"><?php echo number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div>
  <?php } ?>

  </div>
  
 </div> 
 
<?php mysql_close($siplan_data_conn); ?>
	

<br>
<div align="center">
<a style="  text-decoration:none; color:black; font-size: 1.em"   href="apro1516_xls.php?mp=<?php echo $mp; ?>"><b>Imprimir</b></a>

</div>

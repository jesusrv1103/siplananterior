
<?php session_start();

$mp=$_GET['prg'];

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
<script type="text/javascript" charset="utf-8" language="javascript" src="js/prog_rb.js"></script>




<?php 

 $query="SELECT Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, programas_poa.clave,programas_poa.id_programa_poa,programas_poa.descripcion
FROM
obras
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
  	 WHERE obras.programa_poa= ".$mp." AND obras.status_obra >= 3 
     	  
     	GROUP BY `programas_poa`.`id_programa_poa` ORDER BY `programas_poa`.`id_programa_poa` ASC";



$consulta_obras = mysql_query($query);//1,$siplan_data_conn);// or die (mysql_error());

$mun=mysql_query("select * from programas_poa where id_programa_poa=".$mp);//1,$siplan_data_conn);	
	$row=mysql_fetch_array($mun);
	


?>

 

<div  id="obras" >
<div id="demo">
<div align="center"><h4>Resumen de Inversi&oacute;n Programada  <?php echo $row['clave']." ".$row['descripcion']; ?></h4></div>

<?php
 $query2="SELECT `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` FROM `programas_poa` AS `programas_poa`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa` WHERE `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` and subprogramas_poa.id_programa_poa=".$row['id_programa_poa']." and `obras`.`status_obra`>=3 GROUP BY `subprogramas_poa`.`id_subprograma_poa` ORDER BY `subprogramas_poa`.`clave` ASC ";

	$consulta_obras2 = mysql_query($query2,$siplan_data_conn) or die (mysql_error()); 
	$c=0;
	$nn=mysql_num_rows($consulta_obras2);
	while($row2 = mysql_fetch_array($consulta_obras2)){
		$c=$c + 1;
?>
<div id="container" class="ex_highlight_row">
<div align="center"><h4>SubPrograma <?php echo $row2['clave']." ".$row2['descripcion']; ?></h4></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example<?php echo $c+1;?>" >
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
		$consulta_obras = mysql_query("SELECT 
	`subprogramas_poa`.`clave`,`subprogramas_poa`.`id_subprograma_poa`,	dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo ,`subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa

WHERE `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." and `obras`.`status_obra`>=3
 GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`,`subprogramas_poa`.`descripcion` order by obras.id_dependencia asc");


    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
   <td align="center" class="porto">
	
<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_<?php echo $resobras['acronimo'].$resobras['id_subprograma_poa'];?>').load('obras_prg.php?dep=<?php echo $resobras['acronimo']."&subprg=".$resobras['id_subprograma_poa'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($resobras['CuentaDeacronimo']); ?>
    </b>
   </a>
<div class="pop_m">

<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Subprograma <?php echo $resobras['clave']." ".$resobras['descripcion']; $nprg=$resobras['clave']." ".$resobras['descripcion']; $idsub=$resobras['id_subprograma_poa'];?>, Dependencia <?php echo $resobras['acronimo']; ?></p>
<div class="pop_contenido">

<div id="datoss<?php echo "_".$resobras['acronimo'].$resobras['id_subprograma_poa']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_prg.php?dep=<?php echo $resobras['acronimo']."&subprg=".$resobras['id_subprograma_poa'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
	$cp=$cp+$resobras['CuentaDeacronimo'];
	
	
	
	
	 } $ttt+=$tt;
	$fdt+=$fd;
	$stt+=$st;
	$mnt+=$mn;
	$ptt+=$pt;
	$crt+=$cr;
	$ott+=$ot;
	$cpt+=$cp; ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">
	    
    <td width="auto"><div align="center">Total por Subprograma:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_mp<?php echo $mp.$idsub;?>').load('obras_prg.php?dep=subprg<?php echo "&subprg=".$idsub;?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cp); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Subprograma <?php echo $nprg;?> </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_mp".$mp.$idsub; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_prg.php?dep=subprg<?php echo "&subprg=".$idsub;?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
	  <?php if ($nn==$c) {?>
	   <tr bgcolor="#CCCCCC">
	    
    <td width="auto"><div align="center">Total por Programa:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_mp<?php echo $row['clave'];?>').load('obras_prg.php?dep=prg<?php echo "&prg=".$mp;?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cpt); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Programa <?php echo $row['clave']." ".$row['descripcion'];?> </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_mp".$row['clave']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_prg.php?dep=prg<?php echo "&prg=".$mp;?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>



    
    </td>  

    <td width="auto"><div align="right"> <?php echo "$".number_format($fdt,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($stt,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($mnt,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($ptt,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($crt,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($ott,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($ttt,2) ?></div></td>
	  </tr>
	  <?php } ?>
  </tfoot>
  </table>
  </div></div>
  
 </div> 
 
 <?php 
 $chart = new VerticalBarChart(900,350); 
	 
  $quer="SELECT 
	`subprogramas_poa`.`clave`,`subprogramas_poa`.`id_subprograma_poa`,	dependencias.acronimo, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo ,`subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa

WHERE `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." and `obras`.`status_obra`>=3
 GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`,`subprogramas_poa`.`descripcion` order by obras.id_dependencia asc
  
  
  
  ";

$consulta_obrasm = mysql_query($quer);


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

	{

?>
			
           
        
<?php
	$dataSet->addPoint(new Point( $rowm['acronimo'], (number_format($rowm['total'],2,".",""))));
	
	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle( "SubPrograma ".$row2['clave']." ".$row2['descripcion']);
$chart->render("tmp/subp".$row2['clave'].".png");


?>

            

	
   

<br />	
<img alt="Line chart"  src="tmp/subp<?php  echo $row2['clave'].".png?d=".rand(); ?> style="border: 1px solid gray;"/>

</br>


</br>
</br>
</br>
<?php 
}
?>


 
 <?php
  $query="SELECT `programas_poa`.`id_programa_poa`, `programas_poa`.`clave`, `programas_poa`.`descripcion`, `poa02_origen`.`status_of`, `poa02_origen`.`id_obra` 
 FROM `programas_poa` AS `programas_poa`, `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
  WHERE `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
  AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = 4 AND `poa02_origen`.`id_oficio` != 0
  AND `programas_poa`.`id_programa_poa`=".$mp."
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
  AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0
  AND `programas_poa`.`id_programa_poa`=".$mp."
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
   GROUP BY `programas_poa`.`id_programa_poa` ORDER BY `programas_poa`.`id_programa_poa` ASC";
 



$consulta_obras = mysql_query($query);//1,$siplan_data_conn);// or die (mysql_error());

$mun=mysql_query("select * from programas_poa where id_programa_poa=".$mp);//1,$siplan_data_conn);	
	$row=mysql_fetch_array($mun);
 ?>

<div  id="obras" >
<div id="demo">
<div align="center"><h4>Resumen de Inversi&oacute;n Aprobada de <?php echo $row['clave']." ".$row['descripcion']; ?></h4></div>


<?php
  $query2="SELECT `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`id_obra`
  FROM `subprogramas_poa` AS `subprogramas_poa`, `obras` AS `obras`, `dependencias` AS `dependencias`, `programas_poa` AS `programas_poa`, `poa02_origen` AS `poa02_origen`
   WHERE `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `programas_poa`.`id_programa_poa` = `obras`.`programa_poa` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
   AND `subprogramas_poa`.`id_programa_poa` = ".$row['id_programa_poa']." AND `obras`.`status_obra` = 4 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
  GROUP BY `subprogramas_poa`.`id_subprograma_poa` ORDER BY  `subprogramas_poa`.`id_subprograma_poa` ASC";
 

	$consulta_obras2 = mysql_query($query2); 
	
	$nn=mysql_num_rows($consulta_obras2);
	while($row2 = mysql_fetch_array($consulta_obras2)){
		$c=$c + 1;
?>
<div id="container" class="ex_highlight_row">
<div align="center"><h4>SubPrograma <?php echo $row2['clave']." ".$row2['descripcion']; ?></h4></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example<?php echo $c+1;?>">
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
	
	
 

  
  $consulta_obras = mysql_query("SELECT `subprogramas_poa`.`id_subprograma_poa`, `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`, `obras`.`id_dependencia`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`id_obra`
  	 FROM `dependencias` AS `dependencias`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa`, `poa02_origen` AS `poa02_origen`
  	  WHERE `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
  	  AND `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = 4 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
		AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR  `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
  	  AND `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = 4 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	  
  	  GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`
  	 ORDER BY `obras`.`id_dependencia` ASC");
  	
  	
    while ($row = mysql_fetch_assoc($consulta_obras)) {
    	
    	
    	
$sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=0
 	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
 	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=0
 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen");
	//$res_aporte_est= mysql_fetch_assoc($sac_aportes_est);
	
	
	
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

	////termina ejecuciones
	
	

	//sacar tipo ampliaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=1 
 	 	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
 	 	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=1 
 	 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen
 	 	
 	");
	//$res_aporte_est_amp= mysql_fetch_assoc($sac_aportes_est_amp);
	
	
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
			
	////termina ampliaciones
	
	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$row['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  and poa02_origen.tipo=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 group by s08c_origen
 	");
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
	
		
	////termina cancelaciones
	
	//sacar cada uno de ellos con las cancelaciones y ampliaciones
	/*
$federal= ($res_aporte_fed['sumamonto']+$res_aporte_fed_amp['sumamonto'])-($res_aporte_fed_can['sumamonto']);

$estatal=($res_aporte_est['sumamonto']+$res_aporte_est_amp['sumamonto'])-($res_aporte_est_can['sumamonto']);
$municipal=($res_aporte_mun['sumamonto']+$res_aporte_mun_amp['sumamonto'])-($res_aporte_mun_can['sumamonto']);
$particip=0;//number_format($res_aporte['participantes'],2);
$credito=0;//number_format($res_aporte['credito'],2);
$otros=($res_aporte_otr['sumamonto']+$res_aporte_otr_amp['sumamonto'])-($res_aporte_otr_can['sumamonto']);*/
	/*$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;  
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;*/
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;  
	
$sac_cuenta = mysql_query("SELECT `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion`, `subprogramas_poa`.`id_programa_poa`, `poa02_origen`.`id_obra`, `obras`.`id_dependencia` 
		FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `subprogramas_poa` AS `subprogramas_poa` 
		WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
		 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
		 and obras.id_dependencia=".$row['id_dependencia']."
		 AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']."
		OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
		 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
		 and obras.id_dependencia=".$row['id_dependencia']."
		 AND subprogramas_poa.id_subprograma_poa = ".$row['id_subprograma_poa']."
		 GROUP BY `poa02_origen`.`id_obra` ORDER BY `subprogramas_poa`.`id_subprograma_poa` ASC");
		 
		 
	$res_cuenta= mysql_num_rows($sac_cuenta);		
		
  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $row['acronimo']; ?></td> 

     <td align="center" class="porto">
	
<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datossp_<?php echo $row['acronimo'].$row['id_subprograma_poa']."ap";?>').load('obras_prg.php?dep=<?php echo $row['acronimo']."&ap=1&subprg=".$row['id_subprograma_poa']; $nprg1=$row2['clave']." ".$row2['descripcion']; $idsub1=$row['id_subprograma_poa'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($res_cuenta); ?>
    </b>
   </a>
<div class="pop_m">

<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Aprobadas Subprograma <?php echo $nprg1;?>, Dependencia <?php echo $row['acronimo']; ?></p>
<div class="pop_contenido">

<div id="datossp<?php echo "_".$row['acronimo'].$idsub1."ap"; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_prg.php?dep=<?php echo $row['acronimo']."&ap=1&subprg=".$idsub1;?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
	$cp=$cp+$res_cuenta;
	 }
	
	$ttta+=$tt;
	$fdta+=$fd;
	$stta+=$st;
	$mnta+=$mn;
	$ptta+=$pt;
	$crta+=$cr;
	$otta+=$ot;
	$cpta+=$cp; ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">
	    
    <td width="auto"><div align="center">Total por Subprograma:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datossap_mp<?php echo $mp.$idsub1;?>').load('obras_prg.php?dep=subprg<?php echo "&ap=1&subprg=".$idsub1;?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cp); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Aprobadas Subprograma <?php echo $nprg1;?> </p>
<div class="pop_contenido">

<div id="datossap<?php echo "_mp".$mp.$idsub1; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_prg.php?dep=subprg<?php echo "&ap=1&subprg=".$idsub1;?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
	  
	   <?php 
	 //  echo $nn." == ".$c;
	   if (($nn*2)==$c) {?>
	   <tr bgcolor="#CCCCCC">
	    
    <td width="auto"><div align="center">Total por Programa:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_mp_ap<?php echo $mp;?>').load('obras_prg.php?dep=prg<?php echo "&ap=1&prg=".$mp;?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cpta); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<?php $mun=mysql_query("select * from programas_poa where id_programa_poa=".$mp);//1,$siplan_data_conn);	
	$row=mysql_fetch_array($mun); ?>
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Aprobadas Programa <?php echo $row['clave']." ".$row['descripcion'];?> </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_mp_ap".$mp; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res_prg.php?dep=prg<?php echo "&ap=1&prg=".$mp;?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>



    
    </td>  

    <td width="auto"><div align="right"> <?php echo "$".number_format($fdta,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($stta,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($mnta,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($ptta,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($crta,2) ?></div></td>
	<td width="auto"><div align="right"> <?php echo "$".number_format($otta,2) ?></div></td>
	<td width="auto"><div align="right"><?php echo "$".number_format($ttta,2) ?></div></td>
	  </tr>
	  <?php } ?>	
  </tfoot>
  </table>
  </div></div>
  
 </div> 
 
 <?php 
 $chart = new VerticalBarChart(900,350); 
	 


    $quer="SELECT `subprogramas_poa`.`id_subprograma_poa`, `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`, `obras`.`id_dependencia`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`id_obra`
  	 FROM `dependencias` AS `dependencias`, `obras` AS `obras`, `subprogramas_poa` AS `subprogramas_poa`, `poa02_origen` AS `poa02_origen`
  	  WHERE `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
  	  AND `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = 4 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR  `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
  	  AND `subprogramas_poa`.`id_subprograma_poa` = ".$row2['id_subprograma_poa']." AND `obras`.`status_obra` = 4 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	  
  	  GROUP BY `dependencias`.`acronimo`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`descripcion`
  	 ORDER BY `obras`.`id_dependencia` ASC";
  
 
$consulta_obrasm = mysql_query($quer);//,$siplan_data_conn);// or die (mysql_error());


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

	{
		
		$sac_0= mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$rowm['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$rowm['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
 	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 0 
 	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$rowm['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$rowm['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `poa02_origen`.`tipo` = 0 ") or die (mysql_error());
	$res_0= mysql_fetch_assoc($sac_0);
	
	$sac_1= mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$rowm['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$rowm['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
 	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 1 
 	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$rowm['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$rowm['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `poa02_origen`.`tipo` = 1 ") or die (mysql_error());
	$res_1= mysql_fetch_assoc($sac_1);
	
	
	$sac_2= mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `subprogramas_poa`.`id_subprograma_poa`, `subprogramas_poa`.`clave`, `subprogramas_poa`.`descripcion` 
 	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias`, `subprogramas_poa` AS `subprogramas_poa`
 	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	 and 4999 and dependencias.acronimo = '".$rowm['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$rowm['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
 	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 2 
 	OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `subprogramas_poa`.`id_subprograma_poa` = `obras`.`subprograma_poa`
 	and dependencias.acronimo = '".$rowm['acronimo']."' AND subprogramas_poa.id_subprograma_poa = ".$rowm['id_subprograma_poa']." and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `poa02_origen`.`tipo` = 2 ") or die (mysql_error());
	$res_2= mysql_fetch_assoc($sac_2);

?>
			
           
        
<?php
	$dataSet->addPoint(new Point( $rowm['acronimo'], (number_format((($res_0['sumamonto']+$res_1['sumamonto'])-$res_2['sumamonto']),2,".",""))));
	
	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle( "SubPrograma ".$row2['clave']." ".$row2['descripcion']);
$chart->render("tmp/subap".$row2['id_subprograma_poa']."_ap.png");


?>

            

	
   

<br />	
<img alt="Line chart"  src="tmp/subap<?php  echo $row2['id_subprograma_poa']."_ap.png?d=".rand(); ?> style="border: 1px solid gray;"/>
<?php }?>
</br>

<div style="margin-left:300px; margin-top:10px;"
<ul id="botones">
       <li><a href="reporte_resumen_prg1.php?g=<?php echo $mp;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
</div>
</br>
		

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




			

 
 $(document).ready(function() {
    /*
     * Insert a 'details' column to the table
     */
	
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="../imagenes/open.png">';
    nCloneTd.className = "center";
     
    $('#example2 thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );
     
    $('#example2 tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );
     
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
		
   
	
		 
    });
	
	  
    var oTable1 = $('#example3').dataTable( {
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
	
     
    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $('#example2 tbody td img').live('click', function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "../imagenes/open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "../imagenes/close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable1,oTable, nTr), 'details' );
        }
    } );
    
    
    ///----seguda aprobada----///
    
    
       /*
     * Insert a 'details' column to the table
     */
	
    var nCloneTh2 = document.createElement( 'th' );
    var nCloneTd2 = document.createElement( 'td' );
    nCloneTd2.innerHTML = '<img src="../imagenes/open.png">';
    nCloneTd2.className = "center";
     
    $('#example4 thead tr').each( function () {
        this.insertBefore( nCloneTh2, this.childNodes[0] );
    } );
     
    $('#example4 tbody tr').each( function () {
        this.insertBefore(  nCloneTd2.cloneNode( true ), this.childNodes[0] );
    } );
     
    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable2 = $('#example4').dataTable( {
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
	
	  
    var oTable3 = $('#example5').dataTable( {
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
	
     
    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $('#example4 tbody td img').live('click', function () {
        var nTr2 = $(this).parents('tr')[0];
        if ( oTable2.fnIsOpen(nTr2) )
        {
            /* This row is already open - close it */
            this.src = "../imagenes/open.png";
            oTable2.fnClose( nTr2 );
        }
        else
        {
            /* Open this row */
            this.src = "../imagenes/close.png";
            oTable2.fnOpen( nTr2, fnFormatDetails2(oTable3,oTable2, nTr2), 'details' );
        }
    } );    
    
    ///--------////
} );			
			
			
			
</script>


<?php 

if ($mp!="59"){

 
 $query="SELECT dependencias.acronimo, (dependencias.id_dependencia) as nd, Sum(obras.federal) AS SumaDefederal, Sum(obras.estatal) AS SumaDeestatal, Sum(obras.municipal) AS SumaDemunicipal, Sum(obras.participantes) AS SumaDeparticipantes, Sum(obras.credito) AS SumaDecredito, Sum(obras.otros) AS SumaDeotros, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM (dependencias INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia) where obras.municipio=".$mp." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia";
 
 
 
}
elseif($mp=="59") {
	$query="SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd,  Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN obras INNER JOIN ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region where obras.status_obra>=3
 GROUP BY regiones.id_region";
	
	}

$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from municipios where id_municipio=".$mp);	
	$row=mysql_fetch_assoc($mun);
	


?>

 

<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<?php if ($mp!="59"){
?>
<div align="center"><h3>Resumen de Inversi&oacute;n Programada de <?php echo $row['nombre']; ?></h3></div>

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
  $consulta_obras=mysql_query($query);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
    <td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_<?php echo $resobras['acronimo'];?>').load('obras.php?dep=<?php echo $resobras['acronimo']."&mp=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($resobras['CuentaDeacronimo']); ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Del Municipio de <?php echo $row['nombre'];?> y la Dependencia <?php echo $resobras['acronimo']; ?></p>
<div class="pop_contenido">

<div id="datoss<?php echo "_".$resobras['acronimo']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=<?php echo $resobras['acronimo']."&mp=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>



    
    </td>    
	<td align="right"><?php echo "$".number_format($resobras['SumaDefederal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeestatal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDemunicipal'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeparticipantes'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDecredito'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['SumaDeotros'],2); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['total'],2); ?></td>

	
	
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
	 <td width="auto"><div align="center"></div></td>     
    <td width="auto"><div align="center">Total:</div></td>    
  <td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_mp<?php echo $mp;?>').load('obras.php?dep=mun<?php echo "&mp=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cp); ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Del Municipio de <?php echo $row['nombre'];?> </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_mp".$mp; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=mun<?php echo "&mp=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
  </div>
  <?php }
elseif($mp=="59") {
?>
<div align="center"><h3>Resumen de Inversi&oacute;n Programada por Regiones</h3></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
 <thead>
    <tr    >
	<td  width="auto"><div align="center">No.</div></td>  
    <td width="auto"><div align="center"> Region</div></td>  
	<td width="auto"><div align="right"> Total</div></td>
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
 <tr  onclick="$('#datos').load('det_mapr.php?mp=<?php echo $resobras['id_region']; ?>');" style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['id_region']; ?></td> 
    <td align="center"><?php echo $resobras['nomreg']; ?></td>    
	
	<td align="right"><?php echo "$".number_format($resobras['total'],2); ?></td>

	
	
 </tr>  
    <?php $tt=$tt+$resobras['total'];
	 } ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">
	 
	<td width="auto"><div align="center"></div></td>
     <td width="auto"><div align="center">Total:</div></td> 
   	<td width="auto"><div align="right"><?php echo "$".number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div>
  <?php }?>
  </div>
  
 </div> 
 
 <?php 
  if($mp!="59") {
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250
	 


		  $quer="SELECT Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, localidades.id_marginacion
		FROM (localidades INNER JOIN obras  ON localidades.id_finanzas = obras.localidad) INNER JOIN municipios ON (municipios.id_municipio = obras.municipio) 
AND (localidades.id_municipio = municipios.id_municipio) where obras.municipio=".$mp." and obras.status_obra>=3 GROUP BY localidades.id_marginacion";

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_assoc($consulta_obrasm))

	{
	if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}
?>
			
           
        
<?php
	$dataSet->addPoint(new Point( $nam1, (number_format($rowm['total'],2,".",""))));

	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle("Grado de Marginación");
$chart->render("tmp/ma.png");
}

 if($mp=="59") {
	 $regg=mysql_query("select * from regiones");	

	 $rre=1;
		while($rowrr = mysql_fetch_assoc($regg)){
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250
	


 $quer="SELECT Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total, localidades.id_marginacion
FROM regiones INNER JOIN ((localidades INNER JOIN obras  ON localidades.id_finanzas = obras.localidad) INNER JOIN municipios ON (localidades.id_municipio = municipios.id_municipio) AND (obras.municipio = municipios.id_municipio)) ON regiones.id_region = municipios.id_region where regiones.id_region=".$rowrr['id_region']." and obras.status_obra>=3 GROUP BY localidades.id_marginacion";

;

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_assoc($consulta_obrasm))

	{
	if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}
?>
			
           
        
<?php
	$dataSet->addPoint(new Point( $nam1, (number_format($rowm['total'],2,".",""))));

	}
	$chart->setDataSet($dataSet);
	
	
	$chart->setTitle("Grado de Marginación Region ".$rowrr['id_region']." ".$rowrr['nombre']);
	
$chart->render("tmp/ma".$rre.".png");
$rre=$rre+1;
echo '<img alt="Line chart"  src="tmp/ma'.($rre-1).'.png" style="border: 1px solid gray;"/>';
 }

}if($mp!="59") {
 
 	
	    $quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total 
	FROM (dependencias INNER JOIN (municipios INNER JOIN obras ON municipios.id_municipio = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia)
 INNER JOIN localidades ON (municipios.id_municipio = localidades.id_municipio) AND (obras.localidad = localidades.id_finanzas)
 WHERE obras.municipio=".$mp." and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";
	
	

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());


$nc=mysql_num_rows($consulta_obrasm);
}
?>
<script>


</script> 
            
<script type="text/javascript" charset="utf-8">

function fnFormatDetails ( oTable1,oTable, nTr )
{
 
   
    var sOut = '<table cellpadding="5"  cellspacing="0" border="0" style="padding-left:50px; ">';
	sOut += '<tr bgcolor="#008000" style="color:white;"><td colspan="2" align="center">Grado de Marginaci&oacute;n</td></tr>';
		
		var nc = "<?php echo $nc; ?>" ;

		for (var i=0;i<nc;i++)
{ 
	 var aData = oTable1.fnGetData( i );
	 var aData1 = oTable.fnGetData( nTr );
    
	
	if (aData[0]==aData1[1]){
	
	if (aData[1]=="1")	{
    sOut += '<tr ><td>Muy Bajo</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="2")	{
    sOut += '<tr><td>Bajo</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="3")	{
    sOut += '<tr><td>Medio</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="4")	{
    sOut += '<tr><td>Alto</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="5")	{
    sOut += '<tr><td>Muy Alto</td><td>'+aData[2]+'</td></tr>';
	}
	
	}
}
	
   
    sOut += '</table>';

    return sOut;
}
</script>

	
    <?php

	
		if($mp!="59") {
?>

<table style="display:none;" width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
 <thead>
    <tr     >
	   <td  width="auto"><div align="center">Dependencia</div></td>    
	<td  width="auto"><div align="center">marginacion</div></td>
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
  $consulta_obras=mysql_query($quer);
    while ($resobras = mysql_fetch_assoc($consulta_obrasm)) {
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
    <td align="right"><?php echo ($resobras['id_marginacion']); ?></td>
	<td align="right"><?php echo "$".number_format($resobras['total'],2); ?></td>

	
	
 </tr>  
    <?php  } ?>
    </tbody>
    <tfoot>
     
  </tfoot>
  </table>
  <?php ?>

<br />	
<?php echo '<img alt="Line chart"  src="tmp/ma.png?d='.rand().'" style="border: 1px solid gray;"/>'; ?>
 <?php 
	}?>
</br>
<a href="mostrar_mapa.php?g=map">Atras</a>
<div style="margin-left:150px; margin-top:-0px;"
<ul id="botones">
       <li><a href="reporte_resumen_map.php?g=<?php echo $mp;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
</div>
</br>
</br>
</br>
</br>

	
<?php 

if ($mp!="59"){

 
 $query="SELECT `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	 FROM `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	  WHERE `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  and obras.municipio=".$mp." 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR  `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  and obras.municipio=".$mp." 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
	GROUP BY `obras`.`id_dependencia` ORDER BY `dependencias`.`id_dependencia` ASC";
 
 
 

 
 
 
}
elseif($mp=="59") {
	$query="SELECT (regiones.nombre) as nomreg, `regiones`.`id_region`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
	   GROUP BY `regiones`.`id_region`";
	
	
	
	
	}

$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from municipios where id_municipio=".$mp);	
	$row=mysql_fetch_assoc($mun);
	


?>

 

<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">
<?php if ($mp!="59"){
?>
<div align="center"><h3>Resumen de Inversi&oacute;n Aprobada de <?php echo $row['nombre']; ?></h3></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example4">
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
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
    <td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_ap<?php echo $resobras['acronimo'];?>').load('obras.php?ap=1&dep=<?php echo $resobras['acronimo']."&mp=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php

	
			$sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia` 
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$resobras['id_dependencia']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.id_dependencia=".$resobras['id_dependencia']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");
	$res_cuenta= mysql_num_rows($sac_cuenta);		 
	
	
	echo number_format($res_cuenta); ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Del Municipio de <?php echo $row['nombre'];?> y la Dependencia <?php echo $resobras['acronimo']; ?></p>
<div class="pop_contenido">

<div id="datoss<?php echo "_ap".$resobras['acronimo']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=<?php echo $resobras['acronimo']."&ap=1&mp=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
</div>
</div>



    
    </td>    
    <?php
    
	
$sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
	FROM `obras` AS `obras`,`poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
	WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' AND `obras`.`municipio` = '".$mp."' 
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
	OR  `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 0 
	AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' AND `obras`.`municipio` = '".$mp."' 
	and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen");
	
	
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
 	$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND `obras`.`municipio` = '".$mp."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 1 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND `obras`.`municipio` = '".$mp."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen
");
	
	
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
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`, `dependencias`.`acronimo`, SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND `obras`.`municipio` = '".$mp."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `poa02_origen`.`tipo` = 2 
AND `dependencias`.`acronimo` = '".$resobras['acronimo']."'  AND `obras`.`municipio` = '".$mp."' and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2   
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen
");
	
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
	

	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;    
    
     ?>
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
	 <td width="auto"><div align="center"></div></td>     
    <td width="auto"><div align="center">Total:</div></td>    
 <td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_apm<?php echo $mp;?>').load('obras.php?ap=1&dep=mun<?php echo "&mp=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php
		
	echo number_format($cp); ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Del Municipio de <?php echo $row['nombre'];?> </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_apm".$mp; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=mun<?php echo "&ap=1&mp=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
  </div>
  <?php }
elseif($mp=="59") {
?>
<div align="center"><h3>Resumen de Inversi&oacute;n Aprobada por Regiones</h3></div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example5">
 <thead>
    <tr    >
	<td  width="auto"><div align="center">No.</div></td>  
    <td width="auto"><div align="center"> Region</div></td>  
	<td width="auto"><div align="right"> Total</div></td>
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
    	
    	//aquiiii
    	
  

 $sac_aportes_eje = mysql_query("SELECT (regiones.nombre) as nomreg, poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and  `regiones`.`id_region`=".$resobras['id_region']." and `poa02_origen`.`tipo` = 0 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  and  `regiones`.`id_region`=".$resobras['id_region']." and `poa02_origen`.`tipo` = 0 GROUP BY s08c_origen");
	   


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
 	$sac_aportes_amp = mysql_query("SELECT (regiones.nombre) as nomreg, poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and  `regiones`.`id_region`=".$resobras['id_region']." and `poa02_origen`.`tipo` = 1 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  and  `regiones`.`id_region`=".$resobras['id_region']." and `poa02_origen`.`tipo` = 1 GROUP BY s08c_origen");


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
 	$sac_aportes_can = mysql_query("SELECT (regiones.nombre) as nomreg, poa02_origen.s08c_origen, `regiones`.`id_region`, SUM( `poa02_origen`.`monto` ) AS `sumamonto`,`dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 and  `regiones`.`id_region`=".$resobras['id_region']." and `poa02_origen`.`tipo` = 2 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	  AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  and  `regiones`.`id_region`=".$resobras['id_region']." and `poa02_origen`.`tipo` = 2 GROUP BY s08c_origen");
	
	
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
	
	

		
	////termina cancelaciones
	

	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;        	
    	
    	
	

  ?>
 <tr  onclick="$('#datos').load('det_mapr.php?ap=1&mp=<?php echo $resobras['id_region']; ?>');" style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['id_region']; ?></td> 
    <td align="center"><?php echo $resobras['nomreg']; ?></td>    
	
	<td align="right"><?php echo "$".number_format($totals,2); ?></td>

	
	
 </tr>  
    <?php $tt=$tt+$totals;
	 } ?>
    </tbody>
    <tfoot>
      <tr bgcolor="#999999">
	 
	<td width="auto"><div align="center"></div></td>
     <td width="auto"><div align="center">Total:</div></td> 
   	<td width="auto"><div align="right"><?php echo "$".number_format($tt,2) ?></div></td>
	  </tr>
  </tfoot>
  </table>
  </div>
  <?php }?>
  </div>
  
 </div> 
 
 <?php 
  if($mp!="59") {
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250
	 


		  $quer="SELECT `localidades`.`id_marginacion`,`obras`.`id_dependencia`, SUM( `poa02_origen`.`monto` ) AS `total`, `poa02_origen`.`tipo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
		 FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `poa02_origen` AS `poa02_origen` 
		 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
		 AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
		 AND `poa02_origen`.`tipo` = 0 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR  `localidades`.`id_finanzas` = `obras`.`localidad` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
		 AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
		 AND `poa02_origen`.`tipo` = 0 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
		 GROUP BY `localidades`.`id_marginacion` ORDER BY `localidades`.`id_marginacion` ASC";
		 
		 
		 
		 
	
$consulta_obrasm = mysql_query($quer);// or die (mysql_error());


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_assoc($consulta_obrasm))

	{
	if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}
?>
			
           
        
<?php


 $quer1="SELECT `localidades`.`id_marginacion`, SUM( `poa02_origen`.`monto` ) AS `total`, `poa02_origen`.`tipo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
		 FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `poa02_origen` AS `poa02_origen` 
		 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
		 AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
		 AND `poa02_origen`.`tipo` = 1 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR  `localidades`.`id_finanzas` = `obras`.`localidad` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
		 AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4'  
		 AND `poa02_origen`.`tipo` = 1 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
		 GROUP BY `localidades`.`id_marginacion` ORDER BY `localidades`.`id_marginacion` ASC";
		 
		 
		  $quer2="SELECT `localidades`.`id_marginacion`, SUM( `poa02_origen`.`monto` ) AS `total`, `poa02_origen`.`tipo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
		 FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `poa02_origen` AS `poa02_origen` 
		 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
		 AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
		 AND `poa02_origen`.`tipo` = 2 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
OR  `localidades`.`id_finanzas` = `obras`.`localidad` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
		 AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4'  
		 AND `poa02_origen`.`tipo` = 2 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
		 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
		 GROUP BY `localidades`.`id_marginacion` ORDER BY `localidades`.`id_marginacion` ASC";

$res1=mysql_query($quer1);
$res2=mysql_query($quer2);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);



	$dataSet->addPoint(new Point( $nam1, (number_format((($rowm['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));

	
	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle("Grado de Marginación");
$chart->render("tmp/ma_ap.png");
}

 if($mp=="59") {
	 $regg=mysql_query("SELECT (regiones.nombre) as nomreg, `regiones`.`id_region`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`, `municipios`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	FROM `municipios` AS `municipios`, `regiones` AS `regiones`, `obras` AS `obras`, `dependencias` AS `dependencias`, `poa02_origen` AS `poa02_origen`
	 WHERE `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
	OR `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `obras`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2
 	AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
	   GROUP BY `regiones`.`id_region`");	

	 $rre=1;
		while($rowrr = mysql_fetch_assoc($regg)){
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250
	


 $quer="SELECT `localidades`.`id_marginacion`,`regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$rowrr['id_region']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 0
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$rowrr['id_region']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `poa02_origen`.`tipo` = 0
 GROUP BY `localidades`.`id_marginacion`";

 


 

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());


	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_assoc($consulta_obrasm))

	{
	if($rowm['id_marginacion']=="1"){
		$nam1="Muy Bajo";
}
if($rowm['id_marginacion']=="2"){
		$nam1="Bajo";
}
if($rowm['id_marginacion']=="3"){
		$nam1="Medio";
}
if($rowm['id_marginacion']=="4"){
		$nam1="Alto";
}
if($rowm['id_marginacion']=="5"){
		$nam1="Muy Alto";
}
?>
			
           
        
<?php

  $quer1="
SELECT `localidades`.`id_marginacion`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$rowm['id_region']." and localidades.id_marginacion=".$rowm['id_marginacion']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 1
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$rowm['id_region']." and localidades.id_marginacion=".$rowm['id_marginacion']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `poa02_origen`.`tipo` = 1
 GROUP BY `localidades`.`id_marginacion`";


  $quer2="SELECT `localidades`.`id_marginacion`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$rowm['id_region']." and localidades.id_marginacion=".$rowm['id_marginacion']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 2
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$rowm['id_region']." and localidades.id_marginacion=".$rowm['id_marginacion']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 AND `poa02_origen`.`tipo` = 2
 GROUP BY `localidades`.`id_marginacion`";

 $res1=mysql_query($quer1);
$res2=mysql_query($quer2);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2);


	$dataSet->addPoint(new Point( $nam1, (number_format((($rowm['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));
	
	}
	$chart->setDataSet($dataSet);
	
	
	$chart->setTitle("Grado de Marginación Region ".$rowrr['id_region']." ".$rowrr['nomreg']);
	
$chart->render("tmp/ma".$rowrr['id_region']."_ap.png");
$rre=$rre+1;
echo '<img alt="Line chart"  src="tmp/ma'.$rowrr['id_region'].'_ap.png" style="border: 1px solid gray;"/>';
 }

}if($mp!="59") {
 
 
	    $quer="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total` 
	    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen` 
	    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
            AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		 AND `poa02_origen`.`tipo` = 0
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
            AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		 AND `poa02_origen`.`tipo` = 0
	    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
	  

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());


$nc=mysql_num_rows($consulta_obrasm);
}
?>
<script>


</script> 
            
<script type="text/javascript" charset="utf-8">

function fnFormatDetails2 ( oTable3,oTable2, nTr2 )
{
 
   
    var sOut = '<table cellpadding="5"  cellspacing="0" border="0" style="padding-left:50px; ">';
	sOut += '<tr bgcolor="#008000" style="color:white;"><td colspan="2" align="center">Grado de Marginaci&oacute;n</td></tr>';
		
		var nc = "<?php echo $nc; ?>" ;
	
		for (var i=0;i<nc;i++)
{ 
	 var aData = oTable3.fnGetData( i );
	 var aData1 = oTable2.fnGetData( nTr2 );
    
	
	if (aData[0]==aData1[1]){
	
	if (aData[1]=="1")	{
    sOut += '<tr ><td>Muy Bajo</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="2")	{
    sOut += '<tr><td>Bajo</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="3")	{
    sOut += '<tr><td>Medio</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="4")	{
    sOut += '<tr><td>Alto</td><td>'+aData[2]+'</td></tr>';
	}
	else if (aData[1]=="5")	{
    sOut += '<tr><td>Muy Alto</td><td>'+aData[2]+'</td></tr>';
	}
	
	}
}
	
   
    sOut += '</table>';

    return sOut;
}
</script>

	
    <?php

	
		if($mp!="59") {
?>

<table style="display:none;" width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example5">
 <thead>
    <tr     >
	   <td  width="auto"><div align="center">Dependencia</div></td>    
	<td  width="auto"><div align="center">marginacion</div></td>
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
  $consulta_obras=mysql_query($quer);
    while ($resobras = mysql_fetch_assoc($consulta_obrasm)) {
	
	
 $querr1="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total` 
	    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen` 
	    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		 AND `poa02_origen`.`tipo` = 1 and dependencias.acronimo='".$resobras['acronimo']."' and localidades.id_marginacion=".$resobras['id_marginacion']."
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		 AND `poa02_origen`.`tipo` = 1 and dependencias.acronimo='".$resobras['acronimo']."' and localidades.id_marginacion=".$resobras['id_marginacion']."
	    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
  $querr2="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total` 
	    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, poa02_origen` AS `poa02_origen` 
	    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		 AND `poa02_origen`.`tipo` = 2 and dependencias.acronimo='".$resobras['acronimo']."' and localidades.id_marginacion=".$resobras['id_marginacion']."
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp."
	     AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	    AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		 AND `poa02_origen`.`tipo` = 2 and dependencias.acronimo='".$resobras['acronimo']."' and localidades.id_marginacion=".$resobras['id_marginacion']."
	    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
	    
	$consulta_obrasmm1 = mysql_query($querr1);		    
	$consulta_obrasmm2 = mysql_query($querr2);	
	
$rowres1=mysql_fetch_array($consulta_obrasmm1);
$rowres2=mysql_fetch_array($consulta_obrasmm2);

	
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
    <td align="right"><?php echo ($resobras['id_marginacion']); ?></td>
	<td align="right"><?php 

	echo "$ ".number_format((($resobras['total']+$rowres1['total'])-$rowres2['total']),2); ?></td>

	
	
 </tr>  
    <?php  } ?>
    </tbody>
    <tfoot>
     
  </tfoot>
  </table>
  <?php ?>

<br />	
<?php echo '<img alt="Line chart"  src="tmp/ma_ap.png?d='.rand().'" style="border: 1px solid gray;"/>'; ?>
 <?php 
	}?>
</br>
<a href="mostrar_mapa.php?g=map">Atras</a>
<div style="margin-left:150px; margin-top:-0px;"
<ul id="botones">
       <li><a href="reporte_resumen_map.php?g=<?php echo $mp;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
</div>	
	
<?php mysql_close($siplan_data_conn); ?>
	

<?php
 include ("rpts/libchart/classes/libchart.php");	
//include("seguridad/siplan_data_conn.php");
?>

 
 <style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>

 
 <script type="text/javascript" charset="utf-8">



			$(document).ready(function() {
				$('#example1').dataTable({
				
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


<div style="margin-left:20px; margin-right:20px; margin-bottom:20px; ">
<h2>Resumen Oficios</h2>
<div id="cuadro_info" style="width:100%;" >
<ul id="botones">
       <li><a href="rpts/reporte_resumen__ofi_graf.php" target="_blank"><img src="imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>



<?php 
$tr=0;
$titlebottom="";
 echo"<h4>".$title."</h4>";
 echo "<hr />";
	$chart = new VerticalBarChart(1000,350);
	$dataSet = new XYDataSet();
//	$consulta_obras = mysql_query($query,$siplan_data_conn) or die (mysql_error());
	$tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

	$num_of=0;

$mes=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
for ($q=1;$q<=(12);$q++){

	if(strlen($q)==1){
		$d="0".$q;
		}elseif(strlen($q)==2){
			$d=$q;
		}

$query="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2017-".$d."-01'
AND  '2017-".$d."-31' AND tipo =0";

$querya="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2016-".$d."-01'
AND  '2016-".$d."-31' AND tipo =1";

$queryc="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2017-".$d."-01'
AND  '2017-".$d."-31' AND tipo =2";

 $consulta_obras = mysql_query($query) or die (mysql_error());
 
  $consulta_obrasa = mysql_query($querya) or die (mysql_error());
  
   $consulta_obrasc = mysql_query($queryc) or die (mysql_error());
   $row1 = mysql_fetch_array($consulta_obras);
   $rowa = mysql_fetch_array($consulta_obrasa);
   $rowc = mysql_fetch_array($consulta_obrasc);
	$tr=(($row1['total']+$rowa['total'])-$rowc['total']);

//$consulta_obras = mysql_query($query,$siplan_data_conn) or die (mysql_error());
//while($row = mysql_fetch_array($consulta_obras))

	//{
//	$dataSet->addPoint(new Point($row['id_region']." ".$row['nombre'], ($row['total'])));
//	$cp=$cp+$row['CuentaDeacronimo'];
//	$tt=$tt+$row['total'];
		//}
	$dataSet->addPoint(new Point($mes[($q-1	)], number_format($tr,2)));
	//}
	}
  /*  $dataSet->addPoint(new Point("Febrero", 1442));
	$dataSet->addPoint(new Point("Marzo", 711));
	$dataSet->addPoint(new Point("Abril", 711));
	$dataSet->addPoint(new Point("Mayo", 711));
	$dataSet->addPoint(new Point("Junio", 711));
	$dataSet->addPoint(new Point("Julio", 711));
	$dataSet->addPoint(new Point("Agosto", 711));
	$dataSet->addPoint(new Point("Septiembre", 711));
	$dataSet->addPoint(new Point("Octubre", 711));
	$dataSet->addPoint(new Point("Noviembre", 711));
	$dataSet->addPoint(new Point("Diciembre", 711));*/
	$chart->setDataSet($dataSet);
	
	$chart->setTitle("Resumen Oficios");
$chart->render("rpts/tmp/oficios.png");
?>

 <link rel="stylesheet" href="css/jquery-ui.css" />
<table width="100%" border="0" >
  <tr>
    <td>

<div  id="obras" style="position:relative; " >
<div id="container" class="ex_highlight_row">
<div id="datos">
<table width="auto" style="font-weight:bold"  cellpadding="0" cellspacing="0" border="0" class="display" id="example1" >
 <thead>
    <tr  >
	   <td width="auto"><div align="center">Mes </div></td>    
	<td width="auto"><div align="center"> Recursos $</div></td>
    <td width="auto"><div align="right"> No. Ofi.</div></td>
  </tr>
  </thead>
  <tbody>
  <?php
 
  ?>
 <tr  >
 
   <?php 
	
	$tot=0;
	$totof=0;
	for ($q=1;$q<=(12);$q++){
   
   //-----------suma de recuross
   
   	$tr=0;
	if(strlen($q)==1){
		$d="0".$q;
		}elseif(strlen($q)==2){
			$d=$q;
		}

$query="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2017-".$d."-01'
AND  '2017-".$d."-31' AND tipo =0";

$querya="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2017-".$d."-01'
AND  '2017-".$d."-31' AND tipo =1";

$queryc="SELECT SUM(oficio_aprobacion.monto_total) AS total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2017-".$d."-01'
AND  '2017-".$d."-31' AND tipo =2";

 $consulta_obras = mysql_query($query) or die (mysql_error());
 
  $consulta_obrasa = mysql_query($querya) or die (mysql_error());
  
   $consulta_obrasc = mysql_query($queryc) or die (mysql_error());
   $row1 = mysql_fetch_array($consulta_obras);
   $rowa = mysql_fetch_array($consulta_obrasa);
   $rowc = mysql_fetch_array($consulta_obrasc);
	
/*	echo $row1['total']."+<br>";
	echo $rowa['total']."+<br>";
	echo $rowc['total']."-<br>";
	echo "--------------------<br>";
	echo (($row1['total']+$rowa['total'])-$rowc['total'])."<br>";
	echo "--------------------<br>";
	*/
	$tr=(($row1['total']+$rowa['total'])-$rowc['total']);
   //--------------------suma de recusors
    
	
	//------sumad eoficio--------------
	if(strlen($q)==1){
		$d="0".$q;
		}elseif(strlen($q)==2){
			$d=$q;
		}



$quer="SELECT oficio_aprobacion.fecha_oficio, oficio_aprobacion.no_oficio, oficio_aprobacion.tipo, oficio_aprobacion.monto_total
FROM oficio_aprobacion
WHERE fecha_oficio
BETWEEN  '2017-".$d."-01'
AND  '2017-".$d."-31'";//AND tipo =0";
$consulta_obra = mysql_query($quer,$siplan_data_conn) or die (mysql_error());
$num_of=mysql_num_rows($consulta_obra);
?>
 
 
	
    
   <td align="center"><?php echo $mes[($q-1)];?></td> 
    <td align="center"> <?php echo "$".number_format($tr,2); ?></td>    
	<td align="center"><?php echo number_format($num_of); ?></td>

	<?php  ?>
	
 </tr>  
 <?php $tot= $tr+$tot;
	 
	$totof= $num_of+$totof; }?>
   
     
    </tbody>
    <tfoot>
     <tr bgcolor="#CCCCCC">
	  
    
	<td width="30%"><div align="center">Total General</div></td>
    <td width="30%"><div align="center"><?php echo number_format($tot,2);?></div></td> 
    <td width="30%"><div align="center"><?php echo number_format($totof);?></div></td>
	  </tr>
      <tr>
	  
  <td width="auto"><div align="center">Mes </div></td>    
	<td width="auto"><div align="center"> Recursos $</div></td>
    <td width="auto"><div align="right"> No. Ofi.</div></td>
	  </tr>
  </tfoot>
  </table>
  </div></div>
  
 </div> </td>
    <td><div align="right">
<img alt="Line chart"  src="rpts/tmp/oficios.png" style="border: 1px solid gray;"/>

</div> <div align="center"><b><?php echo $titlebottom; ?><b></div>

<div style="-webkit-transform: rotate(-90deg);
-moz-transform: rotate(-90deg);
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3); position:absolute; margin-left:10px; margin-top:-220px;">Recursos $</div>

</td>
  </tr>
</table>












</br>
</div></div>
</br>	

<?php session_start();
 
$mp=$_GET['mp'];


if ( $mp!="" and $_SESSION['id_dependencia_v3']!=""){
//include('obras/cl asses/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require_once ("libchart/classes/libchart.php");
}
//$c=new obras;
//$f=new funciones;
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
		
   
		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/
		 
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
		
   
		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/
		 
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
    
    
    
    //parte dos
    
	
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
		
   
		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/
		 
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
		
   
		/*"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]*/
		 
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
    
     
} );			
			
			
			
</script>




<?php 


$query="SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region where regiones.id_region=".$mp." and obras.status_obra>=3
 GROUP BY dependencias.id_dependencia";


	
	

$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from regiones where id_region=".$mp);	
	$row=mysql_fetch_array($mun);
	
/*switch($_SESSION["id_perfil_v3"]){
	case 1:
	echo "<link href='../administrador/stylo.css' rel='stylesheet' type='text/css' media='all'>";
	break;

	case 2:
	echo "<link href='../capturista/stylo.css' rel='stylesheet' type='text/css' media='all'>";
	break;
	
	case 3:
	echo "<link href='../copladez/stylo.css' rel='stylesheet' type='text/css' media='all'>";
	break;
}*/

?>

 

<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">

<div align="center"><h3>Resumen de Inversi&oacute;n Programada Region <?php echo $row['id_region']." de ".$row['nombre']; ?></h3></div>
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
	
<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_<?php echo $resobras['acronimo'];?>').load('obras.php?dep=<?php echo $resobras['acronimo']."&reg=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($resobras['CuentaDeacronimo']); ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras de la Region  <?php echo $row['id_region']." de ".$row['nombre'];?> </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_".$resobras['acronimo']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=<?php echo $resobras['acronimo']."&reg=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
	 <td width="auto"><div align="center"></div></td>     
    <td width="auto"><div align="center">Total:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datoss_mp<?php echo $mp;?>').load('obras.php?dep=reg<?php echo "&reg=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cp); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras de la Region  <?php echo $row['id_region']." de ".$row['nombre'];?>  </p>
<div class="pop_contenido">

<div id="datoss<?php echo "_mp".$mp; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=reg<?php echo "&reg=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
 

  </div>
  
 </div> 
 
 <?php 
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250
	 
/*	 $quer="SELECT municipios.id_municipio, localidades.id_marginacion, COUNT( municipios.id_municipio ) AS total
FROM municipios
INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio
WHERE municipios.id_municipio =".$mp." group by localidades.id_marginacion";*/

 $quer="SELECT Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, localidades.id_marginacion
FROM regiones INNER JOIN ((localidades INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON localidades.id_finanzas = obras.localidad) INNER JOIN municipios ON (localidades.id_municipio = municipios.id_municipio) AND (obras.municipio = municipios.id_municipio)) ON regiones.id_region = municipios.id_region where regiones.id_region=".$mp." and obras.status_obra>=3 GROUP BY localidades.id_marginacion";

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());

//$rowm = mysql_fetch_array($consulta_obrams);
	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

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
	/*}elseif($row['id_marginacion']=="2"){
	$dataSet->addPoint(new Point("Bajo", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="3"){
	$dataSet->addPoint(new Point("Medio", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="4"){
	$dataSet->addPoint(new Point("Alto", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="5"){
	$dataSet->addPoint(new Point("Muy Alto", (number_format($rowm['total'],2,".",""))));
	}*/
	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle("Grado de Marginación Region ".$row['id_region']." ".$row['nombre']);
$chart->render("tmp/mar".$mp.".png");

    $quer="SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total FROM (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_municipio = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) INNER JOIN localidades ON (localidades.id_finanzas = obras.localidad) AND (municipios.id_municipio = localidades.id_municipio) WHERE regiones.id_region=".$mp." and obras.status_obra>=3 GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());

//$rowm = mysql_fetch_array($consulta_obrams);
$nc=mysql_num_rows($consulta_obrasm);
?>
<script>

//var variablejs = "<?php echo $nc; ?>" ;
//document.write("VariableJS = " + variablejs);
</script> 
            
<script type="text/javascript" charset="utf-8">

function fnFormatDetails ( oTable1,oTable, nTr )
{
 
   
    var sOut = '<table cellpadding="5"  cellspacing="0" border="0" style="padding-left:50px; ">';
	sOut += '<tr bgcolor="#008000" style="color:white;"><td colspan="2" align="center">Grado de Marginaci&oacute;n</td></tr>';
		
		var nc = "<?php echo $nc; ?>" ;
	//	sOut += '<tr ><td>Nivel</td><td>Total</td></tr>';
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
	//while($rowm = mysql_fetch_array($consulta_obrasm))

	//{
?>

<table style="display:none;"  width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example3">
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
	<td abbr="right"><?php echo "$".number_format($resobras['total'],2); ?></td>

	
	
 </tr>  
    <?php  } ?>
    </tbody>
    <tfoot>
     
  </tfoot>
  </table>
  <?php //}?>

<br />	


<br />	
<img alt="Line chart"  src="tmp/<?php echo "mar".$mp; ?>.png" style="border: 1px solid gray;"/>
 
</br>
<a href="mostrar_mapa.php?g=map">Atras</a>
<div style="margin-left:150px; margin-top:-0px;"
<ul id="botones">
       <li><a href="reporte_resumen_map.php?gg=<?php echo $mp;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
</div>
</br>
</br>
</br>
</br>
</br>
<?php 
//segunda parte aprobado

 $query="SELECT `regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
GROUP BY `obras`.`id_dependencia`";


/*SELECT `localidades`.`id_marginacion`,`regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
 AND `poa02_origen`.`s07c_partid` BETWEEN '4000' AND '4999' 
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
 AND `poa02_origen`.`s07c_partid` BETWEEN '6000' AND '6999' 
 GROUP BY `obras`.`id_dependencia`";
*/

/*SELECT regiones.id_region, (regiones.nombre) as nomreg, dependencias.acronimo, (dependencias.id_dependencia) as nd, Sum(aportes.federal) AS SumaDefederal, Sum(aportes.estatal) AS SumaDeestatal, Sum(aportes.municipal) AS SumaDemunicipal, Sum(aportes.participantes) AS SumaDeparticipantes, Sum(aportes.credito) AS SumaDecredito, Sum(aportes.otros) AS SumaDeotros, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, Count(dependencias.acronimo) AS CuentaDeacronimo
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region where regiones.id_region=".$mp." and obras.status_obra='4'
 GROUP BY dependencias.id_dependencia";
*/

	
	

$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from regiones where id_region=".$mp);	
	$row=mysql_fetch_array($mun);
	


?>

 
<div  id="obras" >
<div id="container" class="ex_highlight_row">
<div id="demo">

<div align="center"><h3>Resumen de Inversi&oacute;n Aprobada de <?php echo $row['id_region']." ".$row['nombre']; ?></h3></div>
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
    	
    	
    	
$sac_aportes_eje = mysql_query("SELECT poa02_origen.s08c_origen,`regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
  AND `poa02_origen`.`tipo` = 0 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' 
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`tipo` = 0 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999   AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' 
 GROUP BY poa02_origen.s08c_origen");
	//$res_aporte_est= mysql_fetch_assoc($sac_aportes_est); GROUP BY `obras`.`id_dependencia`
	
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
 	$sac_aportes_amp = mysql_query("SELECT poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`tipo` = 1 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' 
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`tipo` = 1 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999   AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' 
 GROUP BY s08c_origen");
	//$res_aporte_est_amp= mysql_fetch_assoc($sac_aportes_est_amp); GROUP BY `obras`.`id_dependencia`
	
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
 	$sac_aportes_can = mysql_query("SELECT poa02_origen.s08c_origen, `regiones`.`id_region`,SUM( `poa02_origen`.`monto` ) AS `sumamonto`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`,  `dependencias`.`acronimo`, `dependencias`.`id_dependencia` 
FROM `municipios` AS `municipios`, `obras` AS `obras`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
  AND `poa02_origen`.`tipo` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' 
 OR `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
AND `regiones`.`id_region` = ".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `obras`.`status_obra` = '4'
 AND `poa02_origen`.`tipo` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999   AND `dependencias`.`acronimo` = '".$resobras['acronimo']."' 
 GROUP BY s08c_origen");
	//$res_aporte_est_can= mysql_fetch_assoc($sac_aportes_est_can);  GROUP BY `obras`.`id_dependencia`
	
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
//$federal= ($res_aporte_fed['sumamonto']+$res_aporte_fed_amp['sumamonto'])-($res_aporte_fed_can['sumamonto']);

//$estatal=($res_aporte_est['sumamonto']+$res_aporte_est_amp['sumamonto'])-($res_aporte_est_can['sumamonto']);
//$municipal=($res_aporte_mun['sumamonto']+$res_aporte_mun_amp['sumamonto'])-($res_aporte_mun_can['sumamonto']);
//$particip=0;//number_format($res_aporte['participantes'],2);
//$credito=0;//number_format($res_aporte['credito'],2);
//$otros=($res_aporte_otr['sumamonto']+$res_aporte_otr_amp['sumamonto'])-($res_aporte_otr_can['sumamonto']);
	
$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;       	
    		 $sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia`, `regiones`.`id_region` 
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios`, `regiones` AS `regiones`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `regiones`.`id_region` = `municipios`.`id_region` 
	 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  AND `obras`.`status_obra` = '4'
	  and obras.id_dependencia=".$resobras['id_dependencia']." and regiones.id_region=".$mp." 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` AND `regiones`.`id_region` = `municipios`.`id_region` 
	 AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  AND `obras`.`status_obra` = '4'
	  and obras.id_dependencia=".$resobras['id_dependencia']." and regiones.id_region=".$mp." 
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
	 GROUP BY `poa02_origen`.`id_obra`");
	$res_cuenta= mysql_num_rows($sac_cuenta);		
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
  
    
     <td align="center" class="porto">
	
<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datossr_<?php echo $resobras['acronimo'];?>').load('obras.php?dep=<?php echo $resobras['acronimo']."&ap=1&reg=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($res_cuenta); ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Aprobadas de la Region  <?php echo $row['id_region']." de ".$row['nombre'];?> </p>
<div class="pop_contenido">

<div id="datossr<?php echo "_".$resobras['acronimo']; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=<?php echo $resobras['acronimo']."&ap=1&reg=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
	 <td width="auto"><div align="center"></div></td>     
    <td width="auto"><div align="center">Total:</div></td>    
<td align="center" class="porto">
	 

<a href="#"  style="text-decoration:none; color:#000"	onclick="$('#datossr_mp<?php echo $mp;?>').load('obras.php?dep=reg<?php echo "&ap=1&reg=".$_GET['mp'];?>');"  style="cursor: pointer;"  ><b>
	<?php echo number_format($cp); //abajo ?>
    </b>
   </a>
<div class="pop_m">
<p style="margin-top:70px; position:absolute; margin-left:30%;font-size:1.5em"><?php ?> Obras Aprobadas de la Region  <?php echo $row['id_region']." de ".$row['nombre'];?>  </p>
<div class="pop_contenido">

<div id="datossr<?php echo "_mp".$mp; ?>">
</div>

<a class="print"  style="  text-decoration:none; color:white;

font-size: 1.em" target="_blank"  href="reporte_obras_gral_res.php?dep=reg<?php echo "&ap=1&reg=".$_GET['mp'];?>">Imprimir</a><a class="cerrar">Cerrar</a> 
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
 

  </div>
  
 </div> 
 
 <?php 
 $chart = new VerticalBarChart(410,310); //1200,350 8400,2250
	 
/*	 $quer="SELECT municipios.id_municipio, localidades.id_marginacion, COUNT( municipios.id_municipio ) AS total
FROM municipios
INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio
WHERE municipios.id_municipio =".$mp." group by localidades.id_marginacion";*/

/* $quer="SELECT `localidades`.`id_marginacion`,`regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
 AND `poa02_origen`.`s07c_partid` BETWEEN '4000' AND '4999' AND 
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
 AND `poa02_origen`.`s07c_partid` BETWEEN '6000' AND '6999' 
 GROUP BY `localidades`.`id_marginacion`";*/
 
 /*SELECT Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total, localidades.id_marginacion
FROM regiones INNER JOIN ((localidades INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON localidades.id_finanzas = obras.localidad) INNER JOIN municipios ON (localidades.id_municipio = municipios.id_municipio) AND (obras.municipio = municipios.id_municipio)) ON regiones.id_region = municipios.id_region where regiones.id_region=".$mp." and obras.status_obra='4' GROUP BY localidades.id_marginacion";
*/
$quer="SELECT `localidades`.`id_marginacion`,`regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 0 
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`tipo` = 0 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
 GROUP BY `localidades`.`id_marginacion`";
$consulta_obrasm = mysql_query($quer);// or die (mysql_error());

//$rowm = mysql_fetch_array($consulta_obrams);
	$dataSet = new XYDataSet();
	while($rowm = mysql_fetch_array($consulta_obrasm))

	{
		
$quer="";	
 
 
 $quer1="SELECT `localidades`.`id_marginacion`,`regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 1 
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`tipo` = 1 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
 GROUP BY `localidades`.`id_marginacion`";
		 
		 
		  $quer2="SELECT `localidades`.`id_marginacion`,`regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total` FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen` 
 WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 AND `poa02_origen`.`tipo` = 2 
 OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
 AND `regiones`.`id_region` = ".$mp." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`tipo` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 
 GROUP BY `localidades`.`id_marginacion`";

$res1=mysql_query($quer1);
$res2=mysql_query($quer2);
$rowres1=mysql_fetch_array($res1);
$rowres2=mysql_fetch_array($res2); 
 	
		
		
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
	$dataSet->addPoint(new Point( $nam1, (number_format((($rowm['total']+$rowres1['total'])-$rowres2['total']),2,".",""))));
	/*}elseif($row['id_marginacion']=="2"){
	$dataSet->addPoint(new Point("Bajo", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="3"){
	$dataSet->addPoint(new Point("Medio", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="4"){
	$dataSet->addPoint(new Point("Alto", (number_format($rowm['total'],2,".",""))));
	}elseif($row['id_marginacion']=="5"){
	$dataSet->addPoint(new Point("Muy Alto", (number_format($rowm['total'],2,".",""))));
	}*/
	}
	$chart->setDataSet($dataSet);
	
	$chart->setTitle("Grado de Marginación Region ".$row['id_region']." ".$row['nombre']);
$chart->render("tmp/mar".$mp."_ap.png");


     $quer="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total`, `regiones`.`nombre`, `regiones`.`id_region` 
    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen`, `regiones` AS `regiones`
    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$mp."  AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
      AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999    
     OR `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `regiones`.`id_region` = `municipios`.`id_region` 
    AND `regiones`.`id_region` =".$mp."  AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`tipo` = 0 
      AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999 
    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
    
    /*SELECT `localidades`.`id_marginacion`, `regiones`.`id_region`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, SUM( `poa02_origen`.`monto` ) AS `total`, `dependencias`.`id_dependencia`, `dependencias`.`acronimo`
     FROM `localidades` AS `localidades`, `obras` AS `obras`, `municipios` AS `municipios`, `regiones` AS `regiones`, `poa02_origen` AS `poa02_origen`, `dependencias` AS `dependencias` 
    WHERE `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
    AND `regiones`.`id_region` =".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
    AND `obras`.`status_obra` = '4' AND `poa02_origen`.`tipo` = 0 
    AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
     AND `poa02_origen`.`s07c_partid` BETWEEN '4000' AND '4999'
     OR `localidades`.`id_finanzas` = `obras`.`localidad` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `regiones`.`id_region` = `municipios`.`id_region` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` 
    AND `regiones`.`id_region` =".$mp." AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
    AND `obras`.`status_obra` = '4' AND `poa02_origen`.`tipo` = 0 
    AND mid( `poa02_origen`.`s08c_origen`, 3, 4 ) BETWEEN '1000' AND '4999' 
     AND `poa02_origen`.`s07c_partid` BETWEEN '4000' AND '4999'
    GROUP BY `localidades`.`id_marginacion`";
*/    
    
   /* SELECT localidades.id_marginacion, dependencias.acronimo, (dependencias.id_dependencia) AS nd, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total 
    FROM (regiones INNER JOIN (dependencias INNER JOIN (municipios INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON municipios.id_municipio = obras.municipio) ON dependencias.id_dependencia = obras.id_dependencia) ON regiones.id_region = municipios.id_region) INNER JOIN localidades ON (localidades.id_finanzas = obras.localidad) AND (municipios.id_municipio = localidades.id_municipio)
     WHERE regiones.id_region=".$mp." and obras.status_obra='4'
      GROUP BY  dependencias.id_dependencia, localidades.id_marginacion";*/

$consulta_obrasm = mysql_query($quer);// or die (mysql_error());

//$rowm = mysql_fetch_array($consulta_obrams);
$nc=mysql_num_rows($consulta_obrasm);
?>
<script>

//var variablejs = "<?php echo $nc; ?>" ;
//document.write("VariableJS = " + variablejs);
</script> 
            
<script type="text/javascript" charset="utf-8">

function fnFormatDetails2 ( oTable3,oTable2, nTr2 )
{
 
   
    var sOut = '<table cellpadding="5"  cellspacing="0" border="0" style="padding-left:50px; ">';
	sOut += '<tr bgcolor="#008000" style="color:white;"><td colspan="2" align="center">Grado de Marginaci&oacute;n</td></tr>';
		
		var nc = "<?php echo $nc; ?>" ;
	//	sOut += '<tr ><td>Nivel</td><td>Total</td></tr>';
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
	//while($rowm = mysql_fetch_array($consulta_obrasm))

	//{
?>

<table style="display:none;"  width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example5">
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
	    AND `obras`.`municipio` = ".$mp." and dependencias.acronimo='".$resobras['acronimo']."' AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		 AND `poa02_origen`.`tipo` = 1
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." and dependencias.acronimo='".$resobras['acronimo']."' AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
		AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		 AND `poa02_origen`.`tipo` = 1
	    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
 $querr2="SELECT `localidades`.`id_marginacion`, `dependencias`.`acronimo`, `dependencias`.`id_dependencia` AS `nd`, SUM( `poa02_origen`.`monto` ) AS `total` 
	    FROM `municipios` AS `municipios`, `obras` AS `obras`, `dependencias` AS `dependencias`, `localidades` AS `localidades`, `poa02_origen` AS `poa02_origen` 
	    WHERE `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." and dependencias.acronimo='".$resobras['acronimo']."' AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
		 AND `poa02_origen`.`tipo` = 2
		OR  `municipios`.`id_municipio` = `obras`.`municipio` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `localidades`.`id_municipio` = `municipios`.`id_municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `poa02_origen`.`id_obra` = `obras`.`id_obra` 
	    AND `obras`.`municipio` = ".$mp." and dependencias.acronimo='".$resobras['acronimo']."'
	     AND `obras`.`status_obra` = '4' 
	    AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
		AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
		 AND `poa02_origen`.`tipo` = 2
	    GROUP BY `localidades`.`id_marginacion`, `dependencias`.`id_dependencia`";
	    
	    
	$consulta_obrasmm1 = mysql_query($querr1);		    
	$consulta_obrasmm2 = mysql_query($querr2);	
	
$rowres1=mysql_fetch_array($consulta_obrasmm1);
$rowres2=mysql_fetch_array($consulta_obrasmm2);
	

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $resobras['acronimo']; ?></td> 
    <td align="right"><?php echo ($resobras['id_marginacion']); ?></td>
	<td abbr="right"><?php echo "$".number_format((($resobras['total']+$rowres1['total'])-$rowres2['total']),2); ?></td>

	
	
 </tr>  
    <?php  } ?>
    </tbody>
    <tfoot>
     
  </tfoot>
  </table>
  <?php //}?>

<br />	


<br />	
<img alt="Line chart"  src="tmp/<?php echo "mar".$mp; ?>_ap.png" style="border: 1px solid gray;"/>
  <?php //}
  
  mysql_close($siplan_data_conn);
?>
</br>
<a href="mostrar_mapa.php?g=map">Atras</a>
<div style="margin-left:150px; margin-top:-0px;"
<ul id="botones">
       <li><a href="reporte_resumen_map.php?gg=<?php echo $mp;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
    
</ul>
</div>
	 <?php //}
  
  mysql_close($siplan_data_conn);
?>

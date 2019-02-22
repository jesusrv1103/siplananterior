<?php

header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Cuenta_PÃºblica_2018.xls");
header("Pragma: no-cache");
header("Expires: 0");
session_start();
include("../seguridad/siplan_connection_db_2016.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<style>
<!--tr
	{mso-height-source:auto;}
col
	{mso-width-source:auto;}
br
	{mso-data-placement:same-cell;}
.style62 
	{mso-number-format:"mm\/yy";
	mso-style-name:"Millares \[0\]_14-FORM-0212";}
.style0
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:Normal;
	mso-style-id:0;}
.style20
	{mso-number-format:0%;
	mso-style-name:Porcentual;
	mso-style-id:5;}
td
	{mso-style-parent:style0;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	color:windowtext;
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Arial;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:none;
	mso-background-source:auto;
	mso-pattern:auto;
	mso-protection:locked visible;
	white-space:nowrap;
	mso-rotate:0;}
.xl66
	{mso-style-parent:style62;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_-* \#\,\#\#0\.00_-\;\\-* \#\,\#\#0\.00_-\;_-* \0022-\0022??_-\;_-\@_-";
	text-align:center;
	vertical-align:middle;
	white-space:normal;}
.xl67
	{mso-style-parent:style62;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl68
	{mso-style-parent:style62;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;}
.xl69
	{mso-style-parent:style62;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl70
	{mso-style-parent:style62;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl71
	{mso-style-parent:style62;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl72
	{mso-style-parent:style62;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl73
	{mso-style-parent:style62;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:left;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl74
	{mso-style-parent:style62;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_-* \#\,\#\#0\.00_-\;\\-* \#\,\#\#0\.00_-\;_-* \0022-\0022??_-\;_-\@_-";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	white-space:normal;}
.xl75
	{mso-style-parent:style20;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:Percent;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl76
	{mso-style-parent:style62;
	color:white;
	font-size:8.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_-* \#\,\#\#0\.00_-\;\\-* \#\,\#\#0\.00_-\;_-* \0022-\0022??_-\;_-\@_-";
	text-align:center;
	vertical-align:middle;
	background:white;
	mso-pattern:black none;
	white-space:normal;}
.xl77
	{mso-style-parent:style62;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl78
	{mso-style-parent:style62;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;}
.xl79
	{mso-style-parent:style62;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl80
	{mso-style-parent:style62;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl81
	{mso-style-parent:style62;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl82
	{mso-style-parent:style62;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl83
	{mso-style-parent:style62;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;}
	
-->
</style>

</head>

<body link=blue vlink=purple class=xl76>

<table border=0 cellpadding=0 cellspacing=0 width=1089 style='border-collapse:
 collapse;table-layout:fixed;width:817pt'>

 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=14 height=30 class=xl67 width=1089 style='border-right:.5pt solid black;
  height:22.5pt;width:817pt'>GOBIERNO DEL ESTADO DE ZACATECAS</td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=14 height=30 class=xl69 style='border-right:.5pt solid black;
  height:22.5pt'>COORDINACIÓN ESTATAL DE PLANEACIÓN</td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=14 height=30 class=xl79 style='border-right:.5pt solid black;
  height:22.5pt'>Cuenta P&uacute;blica 2018</td>
 </tr>
 <tr class=xl76 height=38 style='mso-height-source:userset;height:28.5pt'>
  <td rowspan=3 height=118 class=xl77 width=34 style='height:88.5pt;border-top:
  none;width:26pt'>EJE</td>
  <td rowspan=3 class=xl77 width=71 style='border-top:none;width:53pt'>LÍNEA</td>
  <td rowspan=3 class=xl77 width=83 style='border-top:none;width:62pt'>ESTRATEGIA</td>
  <td rowspan=3 class=xl77 width=95 style='border-top:none;width:71pt'>DEPENDENCIA</td>
  <td rowspan=3 class=xl77 width=47 style='border-top:none;width:35pt'>NO. PP</td>
  <td rowspan=3 class=xl77 width=240 style='border-top:none;width:180pt'>PROGRAMA PRESUPUESTARIO</td>
  <td rowspan=3 class=xl77 width=77 style='border-top:none;width:58pt'>META</td>
  <td rowspan=3 class=xl77 width=54 style='border-top:none;width:41pt'>PROGRAMADA
  SEMESTRAL</td>
  <td rowspan=3 class=xl77 width=52 style='border-top:none;width:39pt'>ALCANZADA
  SEMESTRAL</td>
  <td rowspan=3 class=xl77 width=65 style='border-top:none;width:49pt'>PROGRAMADA
  ANUAL</td>
  <td rowspan=3 class=xl77 width=51 style='border-top:none;width:38pt'>ALCANZADA
  ANUAL</td>
  <td colspan=2 class=xl78 style='border-left:none'>AVANCE %</td>
  <td rowspan=3 class=xl77 width=135 style='border-top:none;width:101pt'>OBSERVACIONES</td>
 </tr>
 <tr class=xl76 height=47 style='mso-height-source:userset;height:35.25pt'>
  <td rowspan=2 height=80 class=xl77 width=44 style='height:60.0pt;border-top:
  none;width:33pt'>SEMESTRAL</td>
  <td rowspan=2 class=xl77 width=41 style='border-top:none;width:31pt'>ANUAL</td>
 </tr>
 <tr class=xl76 height=33 style='mso-height-source:userset;height:24.75pt'>
 </tr>
 <tr height=34 style='height:50.5pt'>

 <?php
 
  
 

 if ($_POST['dependencia']!=""){
 $dep="WHERE proyectos.estatus='2' and  proyectos.id_dependencia =".$_POST['dependencia'];
 }elseif($_SESSION['id_dependencia_v3']!="" and $_POST['dependencia']==""){
  $dep="WHERE proyectos.estatus='2' and  proyectos.id_dependencia =".$_SESSION['id_dependencia_v3'];
 }
 if($_SESSION['id_dependencia_v3']!="" and $_POST['dependencia']=="0"){
  $dep="WHERE proyectos.estatus='2'";
 }


     
	  $consulta_obras = mysql_query("SELECT * ,(dependencias.nombre) as nombre_d,(linea.nombre) as nombre_pr,(estrategias.nombre) as nombre_spr, (proyectos.nombre) as nombre_p
FROM dependencias INNER JOIN (((eje INNER JOIN linea ON eje.id_eje = linea.id_eje) INNER JOIN proyectos ON (linea.id_linea = proyectos.id_linea) AND (eje.id_eje = proyectos.id_eje)) INNER JOIN estrategias ON (estrategias.id_estrategia = proyectos.id_estrategia) AND (linea.id_linea = estrategias.id_linea)) ON dependencias.id_dependencia = proyectos.id_dependencia ".$dep." ORDER BY  dependencias.id_dependencia, proyectos.no_proyecto ASC  ",$siplan_data_conn) or die (mysql_error());
	  

	  
	
		  
		  while($row=@mysql_fetch_array($consulta_obras)){
		  
		 //sacar porcentajes
	$sumar_cantidad = mysql_query("select  sum(cantidad) as totalp  from proyectos where id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());
	$sac_cantidad= mysql_fetch_array($sumar_cantidad);
	
	
	$sumar_sem = mysql_query("select  sum(prog_sem) as totals  from proyectos where id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());
	$sac_sem= mysql_fetch_array($sumar_sem);
	

	$sac_malca=0;
		$sumar_malca = mysql_query("select  (alcanzadas) as totalsa from alcanzadas_proy  where activo=1 and id_proyecto = ".$row['id_proyecto']." order by fecha asc limit 1",$siplan_data_conn) or die (mysql_error());
	$sac_malca= mysql_fetch_array($sumar_malca);
	
	$alc_sem=$sac_malca['totalsa'];


$sac_malca_a=0;
		$masdos = mysql_query("select  (alcanzadas) as totalsa from alcanzadas_proy  where activo=1 and id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());

		if (mysql_num_rows($masdos)==2){
		$sumar_malca_a = mysql_query("select  (alcanzadas) as totalsa from alcanzadas_proy  where activo=1 and id_proyecto = ".$row['id_proyecto']." order by fecha desc limit 1",$siplan_data_conn) or die (mysql_error());
	$sac_malca_a= mysql_fetch_array($sumar_malca_a);
	
	$alc_anual=$sac_malca_a['totalsa'];	
	}else{
	$alc_anual=0;	
	}

//	$sumalcanzada=$sum_alcanzadas['m'];
	//evitar divison zero y datos invalidos para el %
	
	if ($sac_sem['totals']==""){
	$aporte=0;
		}else{
	$aporte=$sac_sem['totals'];
		}
		if ($alc_sem==0 and $aporte==0){
	$tt=0;
	}elseif ($alc_sem>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$tt=(($alc_sem/$aporte)*100);}
	
	//anual 
	if ($sac_cantidad['totalp']==""){
	$aporte_a=0;
		}else{
	$aporte_a=$sac_cantidad['totalp'];
		}
		if ($alc_anual==0 and $aporte_a==0){
	$ttca=0;
	}elseif ($alc_anual>=0.01 and $aporte_a==0){
	
	$ttca=0;
	}else{$ttca=(($alc_anual/$aporte_a)*100);}
		 
	// $sac_dat = mysql_query("select  *  from alcanzadas_proy where  activo=1 and id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());

	 

		 if ($_SESSION['id_perfil_v3']== "3" and $_POST['dependencia']!=""  ){

			  $sac_dat = mysql_query("select  *  from alcanzadas_proy where fecha like '2018%' and activo=1 and id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());

			}else{

			 $sac_dat = mysql_query("select  *  from alcanzadas_proy where  activo=1 and id_proyecto = ".$row['id_proyecto'],$siplan_data_conn) or die (mysql_error());	

				}


	$obs=""; 
	 while ($res_obs = mysql_fetch_array($sac_dat)) {
	
 $obs.=$res_obs['obs'].' ';
 }
// $obs=rtrim($obs,' ');
// $obs=str_replace(' ', ', ',$obs);
		

  
 ?>
 

 <td height=17 class=xl71 width=42 style='height:25.75pt;border-top:none;
  width:32pt'><?php echo substr($row['eje'],0,1); ?></td>
  <td class=xl71 width=53 style='width:40pt'><?php echo  substr($row['nombre_pr'],2,2);?></td>
  <td class=xl72 width=92 style='border-top:none;width:69pt'><?php  
   if (substr($row['nombre_spr'],5,1)==" "){
	echo substr($row['nombre_spr'],4,1).' ';
	}else{
	echo	substr($ms_sp['nombre'],5,1).' ';}  ?></td>
  <td class=xl72 width=158 style='border-top:none;width:119pt'><?php echo utf8_decode($row['nombre_d']); ?></td>
  <td class=xl71 width=66 style='border-top:none;width:50pt'><?php echo $row['no_proyecto']; ?></td>
  <td class=xl73 width=420 style='border-top:none;width:315pt'><?php echo utf8_decode($row['nombre_p']); ?></td>
  <td class=xl73 width=69 style='border-top:none;width:52pt'><?php echo utf8_decode($row['unidad_medida']); ?></td>
  <td class=xl74 width=94 style='border-top:none;width:71pt'><?php echo number_format($row['prog_sem'],2); ?></td>
  <td class=xl74 width=91 style='border-top:none;width:68pt'><?php echo number_format($sac_malca['totalsa'],2); ?></td>
  <td class=xl74 width=95 style='border-top:none;width:71pt'><?php echo number_format($row['cantidad'],2); ?></td>
  <td class=xl74 width=90 style='border-top:none;width:68pt'><?php echo number_format($sac_malca_a['totalsa'],2); ?></td>
  <td class=xl75 width=77 style='width:58pt'><?php echo number_format($tt,2).' %'; ?></td>
  <td class=xl75 width=72 style='width:54pt'><?php echo number_format($ttca,2).' %'; ?></td>
  <td class=xl73 width=237 style='border-top:none;width:178pt'><?php echo utf8_decode($obs); ?></td>
 </tr>
 
  
 <?php
		  }
?>
 
</body>

</html>

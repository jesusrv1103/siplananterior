<?php session_start();
if ($_SESSION['id_dependencia_v3']!=""){
	date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");


header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Estado_Financiero.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<div class="wrap">
<h2>Informaci&oacute;n del Estado Financiero de su Dependencia</h2>



      <table width="97%" align="center" cellpadding="1" cellspacing="0">
        <tr bgcolor="#C2DDA6">
          <td width="2%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Proy</td>
          <td width="3%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Comp</td>
          <td width="2%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Act</td>
          <td width="3%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Partida</td>
          <td width="5%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Origen</td>
          <td width="21%" rowspan="2" style="border:solid 1px #B0D38D;">Desc Origen</td>
          <td colspan="10" style="border:solid 1px #B0D38D;">Presupuesto</td>
        </tr>
        <tr bgcolor="#C2DDA6">
          <td width="9%" style="border:solid 1px #B0D38D;">Asignado</td>
          <td width="9%" style="border:solid 1px #B0D38D;">Acomulado Ampliado</td>
          <td width="9%" style="border:solid 1px #B0D38D;">Acomulado Reducido</td>
          <td width="11%" style="border:solid 1px #B0D38D;">Acomulado transferido ampliado</td>
          <td width="10%" style="border:solid 1px #B0D38D;">Acomulado transferido reducido</td>
          <td width="8%" style="border:solid 1px #B0D38D;">Total</td>
           <td width="8%" style="border:solid 1px #B0D38D;">No. Obras</td>
            <td width="8%" style="border:solid 1px #B0D38D;">Inversi&oacute;n con Oficio</td>
          <td width="8%" style="border:solid 1px #B0D38D;">Comprometido ante SEFIN</td>
          <td width="8%" style="border:solid 1px #B0D38D;">Pagado</td>
        </tr>
   <?php

  $opds = array("61", "62", "63", "69", "71", "74", "75", "76","77","78");   

          if (in_array($_SESSION['id_dependencia_v3'], $opds)) {

			  $ddp=$_SESSION['id_dependencia_v3'];

		  }else{

			  $ddp="";

			  

			  }


 $consulta_edo_fin = "SELECT 
ef.s06c_proyec as proyecto,
ef.s11c_compon as componente,
ef.s25c_accion as actividad,
ef.s07c_partid as partida,
ef.s08c_origen as origen,
o.c08c_tipori as tipo_origen,
ef.d02p_preasi as asignado,
ef.d02p_acuamp as acuamp,
ef.d02p_acured as reducido,
ef.d02p_acutam as atam,
ef.d02p_acutre as atre,
ef.d02p_gascom as ejecutado,
ef.d02p_pagado as pagado

FROM estados_financieros ef
inner join origen".$ddp." o on(ef.s08c_origen = o.s08c_origen)
where s02c_depend = ".$_SESSION['id_dependencia_v3'];
   $ex_con = mysql_query($consulta_edo_fin) or die (mysql_error());
   $n = 1;
   while ($r_con = mysql_fetch_array($ex_con)){
	   $r=$n%2;
	   if($r==0){$v = "#DDFFDD";}else{$v = "#EEFFEE";}
	   $asignado = $r_con['asignado'];
	   $acuamp = $r_con['acuamp'];
	   $reducido = $r_con['reducido'];
	   $atam = $r_con['atam'];
	   $atre = $r_con['atre'];
	   $total = $asignado + $acuamp + $atam - $atre - $reducido;
	   
	  // $total_of=0;
	 /* $con_ofi_eje="SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`s07c_partid`, `poa02_origen`.`s25c_accion`, `poa02_origen`.`s11c_compon`, `poa02_origen`.`s06c_proyec`,
	 `poa02_origen`.`id_obra`, 
	 SUM(`oficio_aprobacion`.`monto_total`) AS `total_ofc`, `oficio_aprobacion`.`tipo`, 
	 COUNT(`poa02_origen`.`id_obra`) AS `total_obras` 
	 FROM `poa02_origen` inner join  `oficio_aprobacion` on  `poa02_origen`.`id_oficio` = `oficio_aprobacion`.`id_oficio` 
	 WHERE `oficio_aprobacion`.`tipo` = 0 
	 and s06c_proyec='".$r_con['proyecto']."'  
	 and s11c_compon='".$r_con['componente']."'  
	 and s25c_accion='".$r_con['actividad']."'  
	 and s07c_partid='".$r_con['partida']."'  
	 and s08c_origen='".$r_con['origen']."' 
	 GROUP BY `poa02_origen`.`id_obra`";*/

	  $con_ofi_eje="SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`s07c_partid`, `poa02_origen`.`s25c_accion`, `poa02_origen`.`s11c_compon`, `poa02_origen`.`s06c_proyec`,
	 `poa02_origen`.`id_obra`, 
	 SUM(`poa02_origen`.`monto`) AS `total_ofc`, `oficio_aprobacion`.`tipo`,  `obras`.`id_dependencia`
	 FROM `poa02_origen` inner join  `oficio_aprobacion` on  `poa02_origen`.`id_oficio` = `oficio_aprobacion`.`id_oficio` 
	inner join obras  on `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	 WHERE `oficio_aprobacion`.`tipo` = 0 
	 and s06c_proyec='".$r_con['proyecto']."'  
	 and s11c_compon='".$r_con['componente']."'  
	 and s25c_accion='".$r_con['actividad']."'  
	 and s07c_partid='".$r_con['partida']."'  
	 and s08c_origen='".$r_con['origen']."'
	and obras.id_dependencia=".$_SESSION['id_dependencia_v3'];
	// GROUP BY `poa02_origen`.`id_obra`";
	 

	 $cont_q="SELECT poa02_origen.id_obra,  `obras`.`id_dependencia` FROM `poa02_origen` inner join  `oficio_aprobacion` on  `poa02_origen`.`id_oficio` = `oficio_aprobacion`.`id_oficio`  
	inner join obras  on `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	  WHERE `poa02_origen`.`tipo` in (0,1)
	   and poa02_origen.s06c_proyec='".$r_con['proyecto']."'  
	 and poa02_origen.s11c_compon='".$r_con['componente']."'  
	 and poa02_origen.s25c_accion='".$r_con['actividad']."'  
	 and poa02_origen.s07c_partid='".$r_con['partida']."'  
	 and poa02_origen.s08c_origen='".$r_con['origen']."' 
	and obras.id_dependencia=".$_SESSION['id_dependencia_v3']."    
	  group by id_obra";
	 
	 
	  $con_ofi_amp="SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`s07c_partid`, `poa02_origen`.`s25c_accion`, `poa02_origen`.`s11c_compon`, `poa02_origen`.`s06c_proyec`,
	 `poa02_origen`.`id_obra`, 
	 SUM(`poa02_origen`.`monto`) AS `total_ofc`, `oficio_aprobacion`.`tipo`,  `obras`.`id_dependencia`
	 FROM `poa02_origen` inner join  `oficio_aprobacion` on  `poa02_origen`.`id_oficio` = `oficio_aprobacion`.`id_oficio` 
	inner join obras  on `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	 WHERE `oficio_aprobacion`.`tipo` = 1 
	 and s06c_proyec='".$r_con['proyecto']."'  
	 and s11c_compon='".$r_con['componente']."'  
	 and s25c_accion='".$r_con['actividad']."'  
	 and s07c_partid='".$r_con['partida']."'  
	 and s08c_origen='".$r_con['origen']."' 
	and obras.id_dependencia=".$_SESSION['id_dependencia_v3'];
//	 GROUP BY `poa02_origen`.`id_obra`";
	 
	 
$con_ofi_tras="SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`s07c_partid`, `poa02_origen`.`s25c_accion`, `poa02_origen`.`s11c_compon`, `poa02_origen`.`s06c_proyec`,

	 `poa02_origen`.`id_obra`, 

 SUM(`poa02_origen`.`monto`) AS `total_tras`

	 FROM obras

INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra

INNER JOIN transferencias ON poa02_origen.id_obra_origen = transferencias.id_obra_origen

	 	 WHERE `poa02_origen`.`tipo` = 3 

	 and s06c_proyec='".$r_con['proyecto']."'  

	 and s11c_compon='".$r_con['componente']."'  

	 and s25c_accion='".$r_con['actividad']."'  

	 and partida_org='".$r_con['partida']."'  

	 and org_org='".$r_con['origen']."'

	and obras.id_dependencia=".$_SESSION['id_dependencia_v3'];

	  $con_ofi_can="SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`s07c_partid`, `poa02_origen`.`s25c_accion`, `poa02_origen`.`s11c_compon`, `poa02_origen`.`s06c_proyec`,
	 `poa02_origen`.`id_obra`, 
	 SUM(`poa02_origen`.`monto`) AS `total_ofc`, `oficio_aprobacion`.`tipo`,  `obras`.`id_dependencia`
	 FROM `poa02_origen` inner join  `oficio_aprobacion` on  `poa02_origen`.`id_oficio` = `oficio_aprobacion`.`id_oficio` 
	inner join obras  on `obras`.`id_obra` = `poa02_origen`.`id_obra` 
	 WHERE `oficio_aprobacion`.`tipo` = 2 
	 and s06c_proyec='".$r_con['proyecto']."'  
	 and s11c_compon='".$r_con['componente']."'  
	 and s25c_accion='".$r_con['actividad']."'  
	 and s07c_partid='".$r_con['partida']."'  
	 and s08c_origen='".$r_con['origen']."'
	and obras.id_dependencia=".$_SESSION['id_dependencia_v3'];
	//GROUP BY `poa02_origen`.`id_obra`";
	 
	   $dat_eje=mysql_query($con_ofi_eje);
	   $dat_amp=mysql_query($con_ofi_amp);
	   $dat_can=mysql_query($con_ofi_can);
  $dat_tras=mysql_query($con_ofi_tras);


	  $dat_cq=mysql_query($cont_q);
	   
	   $res_eje = mysql_fetch_array($dat_eje);
	   $res_amp = mysql_fetch_array($dat_amp);
	   $res_can = mysql_fetch_array($dat_can);
$res_tras = mysql_fetch_array($dat_tras);
	  $obr_tot = mysql_num_rows($dat_cq);	   

	  // echo $res_eje['total_ofc']."+".$res_amp['total_ofc']."-".$res_can['total_ofc']."<br>";
	   $total_of=(($res_eje['total_ofc']+$res_amp['total_ofc'])-$res_can['total_ofc']);
	 
	   
	   
	   ?>
        <tr bgcolor="<?php echo $v;?>"  onmouseover='this.bgColor="#97B030"' onmouseout='this.bgColor="<?php echo $v;?>"' >
          <td align="center"><?php echo $r_con['proyecto'];?></td>
          <td align="center"><?php echo $r_con['componente'];?></td>
          <td align="center"><?php echo $r_con['actividad'];?></td>
          <td align="center"><?php echo $r_con['partida'];?></td>
          <td align="center"><?php echo $r_con['origen'];?></td>
          <td><?php echo $r_con['tipo_origen'];?></td>
          <td><?php print("$".number_format($asignado,2));?></td>
          <td><?php print("$".number_format($acuamp,2));?></td>
          <td><?php print("$".number_format($reducido,2));?></td>
          <td><?php print("$".number_format($atam,2));?></td>
          <td><?php print("$".number_format(($atre-$res_tras['total_tras']),2));?></td>
          <td><?php print("$".number_format(($total+$res_tras['total_tras']),2));?></td>
          <td><?php print(number_format($obr_tot)); ?></td>
          <td><?php print("$".number_format($total_of,2));  ?></td>
          <td><?php print("$".number_format($r_con['ejecutado'],2));?></td>
          <td><?php print("$".number_format($r_con['pagado'],2));?></td>
        </tr>
 <?php $n=$n+1;}  ?>
      </table>
    <br />

    
   
</div>

<p>&nbsp;</p>

<?php }?>

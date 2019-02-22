<?php session_start();
if ($_SESSION['id_dependencia_v3']!=""){
	date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db.php");
require_once("../seguridad/logout.php");


header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Inversiones_Oficio_mun_FISE_PAPPE.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<div class="wrap">
<h2>Inversiones Con Oficio de Ejecuci&oacute;n por Municipio de FISE y PAPPE</h2>



      <table width="97%" align="center" cellpadding="1" cellspacing="0">
        <tr bgcolor="#C2DDA6">
          <td width="10%" rowspan="2" align="center" style="border:solid 1px #B0D38D;">Municipio</td>
          <td colspan="3" style="border:solid 1px #B0D38D;" align="center">Autorizado por Municipio</td>
           <td colspan="3" style="border:solid 1px #B0D38D;" align="center">Inversi&oacute;n con Oficio de ejecuci&oacute;n</td>
             <td style="border:solid 1px #B0D38D;" align="center"></td>
            <td colspan="3" style="border:solid 1px #B0D38D;" align="center">Inversi&oacute;n sin Oficio de ejecuci&oacute;n</td>
               
        </tr>
        <tr bgcolor="#C2DDA6">
          <td width="9%" style="border:solid 1px #B0D38D;" align="center">Federal</td>
          <td width="9%" style="border:solid 1px #B0D38D;" align="center">Estatal</td>
          <td width="9%" style="border:solid 1px #B0D38D;" align="center">Total General</td>
            <td width="9%" style="border:solid 1px #B0D38D;" align="center">Federal</td>
          <td width="9%" style="border:solid 1px #B0D38D;" align="center">Estatal</td>
          <td width="9%" style="border:solid 1px #B0D38D;" align="center">Total General</td>
              <td width="9%" style="border:solid 1px #B0D38D;" align="center">No. Obras</td>
                <td width="9%" style="border:solid 1px #B0D38D;" align="center">Federal</td>
          <td width="9%" style="border:solid 1px #B0D38D;" align="center">Estatal</td>
          <td width="9%" style="border:solid 1px #B0D38D;" align="center">Total General</td>
       
        </tr>
   <?php $consulta_fise = "SELECT municipios.id_municipio, municipios.nombre, fise_aut.aut_federal, fise_aut.aut_estatal 
	FROM municipios inner join fise_aut on municipios.id_municipio = fise_aut.id_municipio ORDER BY municipios.nombre ASC";
   $ex_con = mysql_query($consulta_fise,$siplan_data_conn) or die (mysql_error());
   $n = 1;
   
   while ($r_con = mysql_fetch_array($ex_con)){
	   $r=$n%2;
	   if($r==0){$v = "#DDFFDD";}else{$v = "#EEFFEE";}
	
	   $con_ofi_eje="SELECT `municipios`.`id_municipio`, `poa02_origen`.`s08c_origen`,
	   SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	   FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
	   WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
	   AND `poa02_origen`.`status_of` = 2 
	   AND `poa02_origen`.`id_oficio` != 0
	   AND `municipios`.`id_municipio` = ".$r_con['id_municipio']."
	   AND `poa02_origen`.`tipo` = 0
	   AND obras.id_dependencia=12
	   AND ( `poa02_origen`.`s08c_origen` = 142103
	    OR `poa02_origen`.`s08c_origen` = 142546  ) 
	  GROUP BY `poa02_origen`.`s08c_origen` ";
	 
	 
	 
	  $con_ofi_amp="SELECT `municipios`.`id_municipio`, `poa02_origen`.`s08c_origen`,
	   SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	   FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
	   WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
	   AND `poa02_origen`.`status_of` = 2 
	   AND `poa02_origen`.`id_oficio` != 0
	   AND `municipios`.`id_municipio` = ".$r_con['id_municipio']."
	   AND `poa02_origen`.`tipo` = 1
	    AND obras.id_dependencia=12
	   AND ( `poa02_origen`.`s08c_origen` = 142103
	    OR `poa02_origen`.`s08c_origen` = 142546  ) 
	  GROUP BY `poa02_origen`.`s08c_origen` ";
	 
	 
 	  $con_ofi_can="SELECT `municipios`.`id_municipio`, `poa02_origen`.`s08c_origen`,
	   SUM( `poa02_origen`.`monto` ) as total, `poa02_origen`.`tipo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	   FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
	   WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
	   AND `poa02_origen`.`status_of` = 2 
	   AND `poa02_origen`.`id_oficio` != 0
	   AND `municipios`.`id_municipio` = ".$r_con['id_municipio']."
	   AND `poa02_origen`.`tipo` = 2
	   AND obras.id_dependencia = 12
	   AND ( `poa02_origen`.`s08c_origen` = '142103' OR `poa02_origen`.`s08c_origen` = '142546'  ) 
	  GROUP BY `poa02_origen`.`s08c_origen` ";
	 
	   $dat_eje=mysql_query($con_ofi_eje,$siplan_data_conn);

	   $estatal_of=0;
	  $federal_of=0;

	while ($res_eje = mysql_fetch_array($dat_eje)){

	   if ($res_eje['s08c_origen']=="142103"){

		    $total_of=($res_eje['total']);

		     $estatal_of+=$total_of;

		   }

	   if($res_eje['s08c_origen']=="142546"){

	       $total_of=($res_eje['total']);

		     $federal_of+=$total_of;

		   }   }

		   
		
 $dat_amp=mysql_query($con_ofi_amp,$siplan_data_conn);
	   

		   while ($res_amp = mysql_fetch_array($dat_amp)){

		   if ($res_amp['s08c_origen']=="142103"){

		    $total_of=($res_amp['total']);

		     $estatal_of+=$total_of;

		   }
;

	   if($res_amp['s08c_origen']=="142546"){

			  $total_of=($res_amp['total']);

		     $federal_of+=$total_of;

		   }

}

		  
 
           $dat_can=mysql_query($con_ofi_can,$siplan_data_conn);

		   while ($res_can = mysql_fetch_array($dat_can)){

		   if ($res_can['s08c_origen']=="142103"){

		      $total_of=($res_can['total']);

		     $estatal_of=($estatal_of-$total_of);

		   }

	   if($res_can['s08c_origen']=="142546"){

		     $total_of=($res_can['total']);

		    $federal_of=($federal_of-$total_of);

		   }

		 

	

	

}

$con_obras="SELECT `municipios`.`id_municipio`, `poa02_origen`.`s08c_origen`,
	   `poa02_origen`.`tipo`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of` 
	   FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios` 
	   WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio` 
	   AND `poa02_origen`.`status_of` = 2 
	   AND `poa02_origen`.`id_oficio` != 0
	   AND `municipios`.`id_municipio` =  ".$r_con['id_municipio']."
	   AND `poa02_origen`.`tipo` = 0
	   AND obras.id_dependencia=12
	   AND ( `poa02_origen`.`s08c_origen` = 142103
	    OR `poa02_origen`.`s08c_origen` = 142546  ) 
GROUP BY  `poa02_origen`.`id_obra";

			$dat_obras=mysql_query($con_obras,$siplan_data_conn);

		   $res_obras = mysql_num_rows($dat_obras);
		   
		   
		   




	     $total_of_federal+=$federal_of;
		   $total_of_estatal+=$estatal_of;
	   
	   ?>
        <tr bgcolor="<?php echo $v;?>"  onmouseover='this.bgColor="#97B030"' onmouseout='this.bgColor="<?php echo $v;?>"' >
          <td align="left"><?php echo utf8_decode($r_con['nombre']);?></td>
          <td align="right"><?php echo number_format($r_con['aut_federal'],2);?></td>
          <td align="right"><?php echo number_format($r_con['aut_estatal'],2);?></td>
          <td align="right"><?php echo number_format($r_con['aut_estatal']+$r_con['aut_federal'],2);?></td>
          <td align="right"><?php echo number_format($federal_of,2);?></td>
          <td align="right"><?php echo number_format($estatal_of,2);?></td>
          <td align="right"><?php echo number_format($federal_of+$estatal_of,2);?></td>
            <td align="center"><?php echo number_format($res_obras);?></td>
          <td align="right"><?php echo number_format($r_con['aut_federal']-$federal_of,2);?></td>
          <td align="right"><?php echo number_format($r_con['aut_estatal']-$estatal_of,2);?></td>
          <td align="right"><?php echo number_format(($r_con['aut_estatal']+$r_con['aut_federal'])-($federal_of+$estatal_of),2);?></td>
          
         
        </tr>
        
 <?php 
 $fise_est+=$r_con['aut_estatal'];
 $fise_fed+=$r_con['aut_federal'];
 
 $total_obrass+=$res_obras;
 $total_fsin+=($r_con['aut_federal']-$federal_of);
 $total_esin+=($r_con['aut_estatal']-$estatal_of);
 $total_sin+=(($r_con['aut_estatal']+$r_con['aut_federal'])-($federal_of+$estatal_of));
 
 $n=$n+1;}  ?>
   <tr bgcolor="<?php echo $v;?>"  onmouseover='this.bgColor="#97B030"' onmouseout='this.bgColor="<?php echo $v;?>"' >
          <td align="left">Totales:</td>
          <td align="right"><?php echo number_format( $fise_fed,2);?></td>
          <td align="right"><?php echo number_format( $fise_est,2);?></td>
          <td align="right"><?php echo number_format($fise_fed+$fise_est,2);?></td>
          <td align="right"><?php echo number_format( $total_of_federal,2);?></td>
          <td align="right"><?php echo number_format( $total_of_estatal,2);?></td>
          <td align="right"><?php echo number_format($total_of_federal+$total_of_estatal,2);?></td>
          <td align="center"><?php echo number_format($total_obrass);?></td>
          <td align="right"><?php echo number_format($total_fsin,2);?></td>
          <td align="right"><?php echo number_format($total_esin,2);?></td>
          <td align="right"><?php echo number_format($total_sin,2);?></td>
        </tr>
 
      </table>
    <br />

    
   
</div>

<p>&nbsp;</p>

<?php }?>

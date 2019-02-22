<?php session_start();
if($_GET['ido']!="" and  $_SESSION['id_dependencia_v3']!=""){
	//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");

 echo $con_o="SELECT oficio_fis_his from oficios_his where id_oficios_his=".$_GET['ido'];
	
	  
  $consulta_obr=mysql_query($con_o);
  
  $resobr = mysql_fetch_array($consulta_obr);
  
  //echo "<title>".$resobr['nom_pdf']."</title>";
  		header("Content-type: application/pdf");
  //  header("Content-Disposition: attachment; filename=".$data['nom_pdf']);    
   echo $resobr['oficio_fis_his']; 
}

?>

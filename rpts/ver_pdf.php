<?php session_start();



/*
echo '<pre>' ;
var_dump($_POST);
echo '</pre>' ;

echo '<pre>' ;
var_dump($_FILES);
echo '</pre>' ;
echo $_FILES["archivo"]["tmp_name"].$_FILES["archivo"]["size"].$_FILES["archivo"]["name"]."hola-";*/


// echo json_encode(array(
  //          'error' => true,
    //       'msg'   => $_FILES["archivo"]["tmp_name"].$_FILES["archivo"]["size"].$_FILES["archivo"]["name"]."hola-"
      //         ));
        //        exit();

if($_GET['idg']!="" and  $_SESSION['id_dependencia_v3']!=""){
	//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");

 $con_o="SELECT * from pdf where id_pdf=".$_GET['idg'];
	  
	  
  $consulta_obr=mysql_query($con_o);
  
  $resobr = mysql_fetch_array($consulta_obr);
  
  //echo "<title>".$resobr['nom_pdf']."</title>";
  		header("Content-type: application/pdf");
  //  header("Content-Disposition: attachment; filename=".$data['nom_pdf']);    
   echo $resobr['archivo_pdf']; 
}

?>
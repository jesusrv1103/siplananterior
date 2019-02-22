<? session_start();
include("../seguridad/siplan_connection_db_2016.php");
require_once 'Spreadsheet/Excel/Writer.php';

// Creamos un libro de excel que sirve como nuestro espacio de trabajo.
$libro = new Spreadsheet_Excel_Writer();

// Estableceremos nuestro formato Negrita para usarlo en el documento	
$negrita =& $libro->addFormat();
$negrita->setBold();
$negrita->setSize(15);
$negrita->setAlign('top');
$negrita->setAlign('center');
$negrita2=& $libro->addFormat();
$negrita2->setSize(12);
$negrita2->setAlign('top');
$negrita2->setAlign('center');
$negrita3=& $libro->addFormat();
$negrita3->setBold();
$negrita3->setSize(10);

$negrita4=& $libro->addFormat();
$negrita4->setBold();
$negrita4->setSize(10);
$negrita4->setAlign('vcenter');
$negrita4->setAlign('center');
$negrita4->setTextWrap();

$negrita8=& $libro->addFormat();
$negrita8->setBold();
$negrita8->setSize(10);
$negrita8->setAlign('vcenter');
$negrita8->setAlign('left');
$negrita8->setTextWrap();


$negrita9=& $libro->addFormat();
$negrita9->setBold();
$negrita9->setSize(11);
$negrita9->setAlign('vcenter');
$negrita9->setAlign('center');
$negrita9->setTextWrap();
$negrita9->setNumFormat('0.00');

$negrita91=& $libro->addFormat();
$negrita91->setBold();
$negrita91->setSize(11);
$negrita91->setAlign('vcenter');
$negrita91->setTextWrap();
$negrita91->setNumFormat('0.00%');


$negrita44=& $libro->addFormat();
$negrita44->setBold();
$negrita44->setSize(10);
$negrita44->setAlign('vcenter');
$negrita44->setAlign('center');
$negrita44->setTextWrap();
$negrita44->setNumFormat('0.00');

$negrita45=& $libro->addFormat();
$negrita45->setBold();
$negrita45->setSize(10);
$negrita45->setAlign('vcenter');
$negrita45->setTextWrap();
$negrita45->setNumFormat('0.00%');


$negrita10=& $libro->addFormat();
$negrita10->setBold();
$negrita10->setSize(11);
$negrita10->setAlign('vcenter');
$negrita10->setAlign('left');
$negrita10->setTextWrap();




$negrita7=& $libro->addFormat();

$negrita7->setSize(10);
$negrita7->setAlign('vcenter');
$negrita7->setAlign('left');
$negrita7->setTextWrap();

$negrita101=& $libro->addFormat();
$negrita101->setBold();
$negrita101->setSize(11);
$negrita101->setAlign('vcenter');
$negrita101->setAlign('center');
$negrita101->setTextWrap();
$negrita101->setFgColor('green');
$negrita101->setColor('white');

$negrita912=& $libro->addFormat();
$negrita912->setBold();
$negrita912->setSize(11);
$negrita912->setAlign('vcenter');
$negrita912->setAlign('center');
$negrita912->setTextWrap();
$negrita912->setNumFormat('0.00');
$negrita912->setFgColor('green');
$negrita912->setColor('white');

$negrita911=& $libro->addFormat();
$negrita911->setBold();
$negrita911->setSize(11);
$negrita911->setAlign('vcenter');
$negrita911->setTextWrap();
$negrita911->setNumFormat('0.00%');
$negrita911->setFgColor('green');
$negrita911->setColor('white');


$negrita5=& $libro->addFormat();
$negrita5->setBold();
$negrita5->setSize(10);
$negrita5->setAlign('top');
$negrita5->setAlign('center');
$negrita5->setTextWrap();
$negrita5->setFgColor('green');
$negrita5->setColor('white');
/*$negrita5->setBorder(2);
$negrita5->setBottomColor('white');
$negrita5->setTopColor ('white');
$negrita5->setLeftColor ('white');
$negrita5->setRightColor ('white');*/

$negrita6=& $libro->addFormat();
//$negrita6->setBold();

$negrita6->setSize(10);
$negrita6->setAlign('top');
$negrita6->setAlign('center');
$negrita6->setTextWrap();
$negrita6->setFgColor('white');
$negrita6->setTextWrap();
/*$negrita6->setBorder(1);
$negrita6->setBottomColor('black');
$negrita6->setLeftColor ('black');
$negrita6->setRightColor ('black');
*/

//-------------------------------------hoja PED---------------------------------------------
// Necesitamos una hoja en la cual poner nuestros datos
$ped =& $libro->addWorksheet('P.E.D');


// Verificamos que la hoja se haya generado correctamente
if (PEAR::isError($ped)) {
die($ped->getMessage());
}
// Este es el titulo
$ped->write(0, 0, "FiscalÃ­a General de Justicia del Estado de Zacatecas", $negrita);
$ped->mergeCells(0,0,0,11);
$ped->write(1, 0, "Coordinación Estatal de Planeación ", $negrita2);
$ped->mergeCells(1,0,1,11);

$ped->write(2, 0, "Avance de Gestión Financiera del 1 de Enero al 30 de Junio del Ejercicio Fiscal 2018 ", $negrita2);

$ped->mergeCells(2,0,2,11);


$ped->write(5, 0, "Eje", $negrita5);
$ped->write(6, 0, "1, 2, 3, 4 y 5", $negrita6);//<------------------------------
;
$ped->write(5, 1, "Descripción", $negrita5);
$ped->mergeCells(5,1,5,11);

$ped->write(6, 1, "Plan Estatal de Desarrollo", $negrita6); //<------------------------------
$ped->mergeCells(6,1,6,11);

$ped->write(8, 0, "Línea", $negrita5);
$ped->write(9, 0, "", $negrita6);//<------------------------------
$ped->write(8, 1, "Descripción", $negrita5);
$ped->mergeCells(8,1,8,11);
$ped->write(9, 1, "", $negrita6); //<------------------------------
$ped->mergeCells(9,1,9,11);

$ped->write(11, 0, "Estrategia", $negrita5);
$ped->write(12, 0, "", $negrita6);//<------------------------------
$ped->mergeCells(12,0,14,0);
$ped->write(11, 1, "Descripción", $negrita5);
$ped->mergeCells(11,1,11,11);
$ped->write(12, 1, "", $negrita6); //<------------------------------
$ped->mergeCells(12,1,14,11);

$ped->write(16, 0, "Objetivos", $negrita4);
$ped->mergeCells(16,0,18,5);

//$ped->write(16, 1, "Dependencia", $negrita4);
//$ped->mergeCells(16,1,17,5);

//$ped->write(18, 1, "Proyecto", $negrita4);
//$ped->mergeCells(18,1,18,5);

$ped->write(16, 6, "Información Programática", $negrita4);
$ped->mergeCells(16,6,16,11);
$ped->write(17,6, "Unidad de Medida", $negrita4);
$ped->mergeCells(17,6,18,6);

$ped->write(17, 7, "Meta Proyectada", $negrita4);
$ped->mergeCells(17,7,17,8);
$ped->write(18, 7, "Anual", $negrita4);
$ped->write(18, 8, "Semestral", $negrita4);

$ped->write(17, 9, "Real", $negrita4);
$ped->write(18, 9, "Obtenida", $negrita4);

$ped->write(17, 10, "% de Avance Respecto a:", $negrita4);
$ped->mergeCells(17,10,17,11);
$ped->write(18, 10, "Meta Anual", $negrita4);
$ped->write(18, 11, "Meta Semestral", $negrita4);


 $sac_ac = mysql_query("select  * from eje",$siplan_data_conn) or die (mysql_error());

$i=19;
while( $res_ac= mysql_fetch_array($sac_ac)){
//$ped->setColumn($i,0,10);
$ped->setRow($i,30);

$ped->write($i, 0, substr($res_ac['eje'],3), $negrita7); //<-----------------------------------
$ped->mergeCells($i,0,$i,5);
$i=$i+1;
}



//-----------------------------------termina hoja PED----------------------------------------------



if ($_POST['Eje']==0){
$sac_ac=mysql_query("SELECT * from eje order by id_eje asc",$siplan_data_conn) or die (mysql_error());
}
if ($_POST['Eje']!=0){
$sac_ac=mysql_query("SELECT * from eje where eje.id_eje=".$_POST['Eje'],$siplan_data_conn) or die (mysql_error());
}

while($ms_ac=mysql_fetch_array($sac_ac)){
if ($_POST['Eje']!=0){
$nnom="Eje ".$ms_ac['eje'];
}else{
$nnom="Ejes 1, 2, 3, 4, 5";
}
//-------------------------------------hoja EJE1---------------------------------------------
// Necesitamos una hoja en la cual poner nuestros datos
$eje =& $libro->addWorksheet('Eje '.substr($ms_ac['eje'],0,1));
//SELECT acuerdos.id_acuerdo, acuerdos.acuerdo, programas.id_programa, programas.nombre, subprogramas.id_subprograma, subprogramas.nombre
//FROM (acuerdos INNER JOIN programas ON acuerdos.id_acuerdo = programas.id_acuerdo) INNER JOIN subprogramas ON programas.id_programa = subprogramas.id_programa;


// Verificamos que la hoja se haya generado correctamente
if (PEAR::isError($eje)) {
die($eje->getMessage());
}
// Este es el titulo
$eje->write(0, 0, "FiscalÃ­a General de Justicia del Estado de Zacatecas", $negrita);
$eje->mergeCells(0,0,0,11);
$eje->write(1, 0, "Unidad de Planeación ", $negrita2);
$eje->mergeCells(1,0,1,11);
$eje->write(2, 0, "Avance de Gestión Financiera del 1 de Enero al 30 de Junio del Ejercicio Fiscal 2018 ", $negrita2);
$eje->mergeCells(2,0,2,11);

$eje->write(5, 0, "Eje", $negrita5);
$eje->write(6, 0, substr($ms_ac['eje'],0,1), $negrita6);//<------------------------------aqui
;
$eje->write(5, 1, "Descripción", $negrita5);
$eje->mergeCells(5,1,5,11);

$eje->write(6, 1, substr($ms_ac['eje'],3), $negrita6); //<------------------------------ aqui
$eje->mergeCells(6,1,6,11);
$sac_p=mysql_query("SELECT * from linea  where id_eje=".$ms_ac['id_eje']." order by id_linea",$siplan_data_conn) or die (mysql_error());

while ($ms_p = mysql_fetch_array($sac_p)) {
	
 $obs.=substr($ms_p['nombre'],2,2).' ';  //cmb
 }
 $obs=rtrim($obs,' ');
 $obs=str_replace(' ', ', ',$obs);

$eje->write(8, 0, "Línea", $negrita5);
$eje->write(9, 0, $obs, $negrita6);//<------------------------------aqui
$eje->write(8, 1, "Descripción", $negrita5);
$eje->mergeCells(8,1,8,11);
$eje->write(9, 1, "", $negrita6); //<------------------------------
$eje->mergeCells(9,1,9,11);

$eje->write(11, 0, "Estrategia", $negrita5);
$eje->write(12, 0, "", $negrita6);//<------------------------------
$eje->mergeCells(12,0,14,0);
$eje->write(11, 1, "Descripción", $negrita5);
$eje->mergeCells(11,1,11,11);
$eje->write(12, 1, "", $negrita6); //<------------------------------
$eje->mergeCells(12,1,14,11);

$eje->write(16, 0, "Objetivos", $negrita4);
$eje->mergeCells(16,0,18,5);

/*$eje->write(16, 1, "Dependencia", $negrita4);
$eje->mergeCells(16,1,17,5);

$eje->write(18, 1, "Proyecto", $negrita4);
$eje->mergeCells(18,1,18,5);*/

$eje->write(16, 6, "Información Programática", $negrita4);
$eje->mergeCells(16,6,16,11);
$eje->write(17,6, "Unidad de Medida", $negrita4);
$eje->mergeCells(17,6,18,6);

$eje->write(17, 7, "Meta Proyectada", $negrita4);
$eje->mergeCells(17,7,17,8);
$eje->write(18, 7, "Anual", $negrita4);
$eje->write(18, 8, "Semestral", $negrita4);

$eje->write(17, 9, "Real", $negrita4);
$eje->write(18, 9, "Obtenida", $negrita4);

$eje->write(17, 10, "% de Avance Respecto a:", $negrita4);
$eje->mergeCells(17,10,17,11);
$eje->write(18, 10, "Meta Anual", $negrita4);
$eje->write(18, 11, "Meta Semestral", $negrita4);



$sac_prr = mysql_query("select  * from linea where id_eje=".$ms_ac['id_eje']." order by id_linea",$siplan_data_conn) or die (mysql_error());

$i=19;
while( $res_ac= mysql_fetch_array($sac_prr)){
//$ped->setColumn($i,0,10);
$eje->setRow($i,30);

$eje->write($i, 0, utf8_decode(substr($res_ac['nombre'],4)), $negrita7); //<-----------------------------------
$eje->mergeCells($i,0,$i,5);
$i=$i+1;
}


//-----------------------------------termina hoja EJE1----------------------------------------------


$sac_pr=mysql_query("SELECT * from linea  where id_eje=".$ms_ac['id_eje']." order by id_linea",$siplan_data_conn) or die (mysql_error());

while($ms_pr=mysql_fetch_array($sac_pr)){
//-------------------------------------hoja línea 1.1---------------------------------------------
// Necesitamos una hoja en la cual poner nuestros datos
$linea =& $libro->addWorksheet('línea '.substr($ms_pr['nombre'],0,4));  //cmb


// Verificamos que la hoja se haya generado correctamente
if (PEAR::isError($linea)) {
die($linea->getMessage());
}
// Este es el titulo
$linea->write(0, 0, "FiscalÃ­a General de Justicia del Estado de Zacatecas", $negrita);
$linea->mergeCells(0,0,0,11);
$linea->write(1, 0, "Unidad de Planeación ", $negrita2);
$linea->mergeCells(1,0,1,11);
$linea->write(2, 0, "Avance de Gestión Financiera del 1 de Enero al 30 de Junio del Ejercicio Fiscal 2018", $negrita2);
$linea->mergeCells(2,0,2,11);
$sac_ac1=mysql_query("SELECT * from eje where id_eje=".$ms_pr['id_eje']." order by id_eje",$siplan_data_conn) or die (mysql_error());
$ms_ac1=mysql_fetch_array($sac_ac1);

$linea->write(5, 0, "Eje", $negrita5);
$linea->write(6, 0, substr($ms_ac1['eje'],0,1), $negrita6);//<------------------------------

$linea->write(5, 1, "Descripción", $negrita5);
$linea->mergeCells(5,1,5,11);


$linea->write(6, 1, substr($ms_ac1['eje'],3), $negrita6); //<------------------------------
$linea->mergeCells(6,1,6,11);

$linea->write(8, 0, "Línea", $negrita5);
$linea->write(9, 0, substr($ms_pr['nombre'],2,2), $negrita6);//<------------------------------ cmb
$linea->write(8, 1, "Descripción", $negrita5);
$linea->mergeCells(8,1,8,11);
$linea->write(9, 1, utf8_decode(substr($ms_pr['nombre'],4)), $negrita6); //<------------------------------
$linea->mergeCells(9,1,9,11);

$sac_sp=mysql_query("SELECT * from estrategias  where id_linea=".$ms_pr['id_linea']." order by id_linea",$siplan_data_conn) or die (mysql_error());
$obs1="";
while ($ms_sp = mysql_fetch_array($sac_sp)) {
	
	
	if (substr($ms_sp['nombre'],5,1)==" "){
	$obs1.=substr($ms_sp['nombre'],4,1).' ';
	}else{
		$obs1.=substr($ms_sp['nombre'],5,1).' ';}
	
 //$obs1.=substr($ms_sp['nombre'],5,1).' '; //1.2.3 cmb
 }
 $obs1=rtrim($obs1,' ');
 $obs1=str_replace(' ', ', ',$obs1);

$linea->write(11, 0, "Estrategia", $negrita5);
$linea->write(12, 0, $obs1, $negrita6);//<------------------------------
$linea->mergeCells(12,0,14,0);
$linea->write(11, 1, "Descripción", $negrita5);
$linea->mergeCells(11,1,11,11);

$linea->write(12, 1, "", $negrita6); //<------------------------------
$linea->mergeCells(12,1,14,11);

/*$linea->write(16, 0, "No. de Proy.", $negrita4);
$linea->mergeCells(16,0,18,0);*/

$linea->write(16, 0, "Objetivos", $negrita4);
$linea->mergeCells(16,0,18,5);

/*$linea->write(16, 1, "Dependencia", $negrita4);
$linea->mergeCells(16,1,17,5);

$linea->write(18, 1, "Proyecto", $negrita4);
$linea->mergeCells(18,1,18,5);*/

$linea->write(16, 6, "Información Programática", $negrita4);
$linea->mergeCells(16,6,16,11);
$linea->write(17,6, "Unidad de Medida", $negrita4);
$linea->mergeCells(17,6,18,6);

$linea->write(17, 7, "Meta Proyectada", $negrita4);
$linea->mergeCells(17,7,17,8);
$linea->write(18, 7, "Anual", $negrita4);
$linea->write(18, 8, "Semestral", $negrita4);

$linea->write(17, 9, "Real", $negrita4);
$linea->write(18, 9, "Obtenida", $negrita4);

$linea->write(17, 10, "% de Avance Respecto a:", $negrita4);
$linea->mergeCells(17,10,17,11);
$linea->write(18, 10, "Meta Anual", $negrita4);
$linea->write(18, 11, "Meta Semestral", $negrita4);



$sac_sprr = mysql_query("SELECT * from estrategias  where id_linea=".$ms_pr['id_linea']." order by id_linea",$siplan_data_conn) or die (mysql_error());

$i=19;
while( $res_sac= mysql_fetch_array($sac_sprr)){
//$ped->setColumn($i,0,10);
$linea->setRow($i,40);

$linea->write($i, 0, utf8_decode(substr($res_sac['nombre'],6)), $negrita7); //<-----------------------------------
$linea->mergeCells($i,0,$i,5);
$i=$i+1;
}


/*$linea->write(19, 1, "---Dependencia-----", $negrita4); //<-----------------------------------
$linea->mergeCells(19,1,19,5);

$linea->write(19, 6, "--1--", $negrita4);
$linea->write(19, 7, "--2--", $negrita4);
$linea->write(19, 8, "---3-", $negrita4);
$linea->write(19, 9, "---4-", $negrita4);
$linea->write(19, 10, "---5-", $negrita4);
$linea->write(19, 11, "---6-", $negrita4);



$linea->write(20, 0, "--numproy--", $negrita4);
$linea->write(20, 1, "Proyecto", $negrita4); //<-----------------------------------
$linea->mergeCells(20,1,20,5);
$linea->write(20, 6, "--1--", $negrita4);
$linea->write(20, 7, "--2--", $negrita4);
$linea->write(20, 8, "---3-", $negrita4);
$linea->write(20, 9, "---4-", $negrita4);
$linea->write(20, 10, "---5-", $negrita4);
$linea->write(20, 11, "---6-", $negrita4);



$linea->write(21, 0, "Total", $negrita5); //<-----------------------------------
$linea->mergeCells(21,0,21,5);
$linea->write(21, 6, "--1--", $negrita5);
$linea->write(21, 7, "--2--", $negrita5);
$linea->write(21, 8, "---3-", $negrita5);
$linea->write(21, 9, "---4-", $negrita5);
$linea->write(21, 10, "---5-", $negrita5);
$linea->write(21, 11, "---6-", $negrita5);*/

//-----------------------------------termina hoja línea 1.1----------------------------------------------

//echo "SELECT * from subprogramas  where id_programa=".$ms_pr['id_programa']." order by id_programa";

$sac_subpr=mysql_query("SELECT * from estrategias  where id_linea=".$ms_pr['id_linea']." order by id_linea",$siplan_data_conn) or die (mysql_error());

while($ms_subpr=mysql_fetch_array($sac_subpr)){
//-------------------------------------hoja Estrategia---------------------------------------------
// Necesitamos una hoja en la cual poner nuestros datos
$estra =& $libro->addWorksheet('Estrategia '.substr($ms_subpr['nombre'],0,6));


// Necesitamos una hoja en la cual poner nuestros datos
//$estra =& $libro->addWorksheet('Estrategia 1.1.1');


// Verificamos que la hoja se haya generado correctamente
if (PEAR::isError($estra)) {
die($estra->getMessage());
}
// Este es el titulo
$estra->write(0, 0, "FiscalÃ­a General de Justicia del Estado de Zacatecas", $negrita);
$estra->mergeCells(0,0,0,11);
$estra->write(1, 0, "Unidad de Planeación ", $negrita2);
$estra->mergeCells(1,0,1,11);
$estra->write(2, 0, "Avance de Gestión Financiera del 1 de Enero al 30 de Junio del Ejercicio Fiscal 2018", $negrita2);
$estra->mergeCells(2,0,2,11);
$sac_ac2=mysql_query("SELECT * from eje where id_eje=".$ms_pr['id_eje']." order by id_eje",$siplan_data_conn) or die (mysql_error());
$ms_ac2=mysql_fetch_array($sac_ac2);

$estra->write(5, 0, "Eje", $negrita5);
$estra->write(6, 0, substr($ms_ac2['eje'],0,1), $negrita6);//<------------------------------
;
$estra->write(5, 1, "Descripción", $negrita5);
$estra->mergeCells(5,1,5,11);

$estra->write(6, 1, substr($ms_ac2['eje'],3), $negrita6); //<------------------------------
$estra->mergeCells(6,1,6,11);

$estra->write(8, 0, "Línea", $negrita5);
$estra->write(9, 0, substr($ms_pr['nombre'],2,2), $negrita6);//<------------------------------cmb
$estra->write(8, 1, "Descripción", $negrita5);
$estra->mergeCells(8,1,8,11);
$estra->write(9, 1, utf8_decode(substr($ms_pr['nombre'],4)), $negrita6); //<------------------------------
$estra->mergeCells(9,1,9,11);
if (substr($ms_subpr['nombre'],5,1)==" "){
	$stret=substr($ms_subpr['nombre'],4,1);
	}else{
		$stret=substr($ms_subpr['nombre'],5,1);}
$estra->write(11, 0, "Estrategia", $negrita5);
$estra->write(12, 0, $stret  , $negrita6);//<------------------------------cmb
$estra->mergeCells(12,0,14,0);
$estra->write(11, 1, "Descripción", $negrita5);
$estra->mergeCells(11,1,11,11);
$estra->writeString(12, 1,  substr(utf8_decode($ms_subpr['nombre']),6), $negrita6); //<------------------------------
$estra->mergeCells(12,1,14,11);

$estra->write(16, 0, "No. de Proy.", $negrita4);
$estra->mergeCells(16,0,18,0);

$estra->write(16, 1, "Dependencia", $negrita4);
$estra->mergeCells(16,1,17,5);

$estra->write(18, 1, "Proyecto", $negrita4);
$estra->mergeCells(18,1,18,5);

$estra->write(16, 6, "Información Programática", $negrita4);
$estra->mergeCells(16,6,16,11);
$estra->write(17,6, "Unidad de Medida", $negrita4);
$estra->mergeCells(17,6,18,6);

$estra->write(17, 7, "Meta Proyectada", $negrita4);
$estra->mergeCells(17,7,17,8);
$estra->write(18, 7, "Anual", $negrita4);
$estra->write(18, 8, "Semestral", $negrita4);

$estra->write(17, 9, "Real", $negrita4);
$estra->write(18, 9, "Obtenida", $negrita4);

$estra->write(17, 10, "% de Avance Respecto a:", $negrita4);
$estra->mergeCells(17,10,17,11);
$estra->write(18, 10, "Meta Anual", $negrita4);
$estra->write(18, 11, "Meta Semestral", $negrita4);
$x=19;
//$sac_dep_sub=mysql_query("SELECT *, (dependencias.nombre) as nom_dep, (proyectos.nombre) as nom_pro FROM dependencias INNER JOIN (proyectos INNER JOIN alcanzadas_proy ON proyectos.id_proyecto = alcanzadas_proy.id_proyecto) ON dependencias.id_dependencia = proyectos.id_dependencia WHERE  proyectos.estatus=2 and proyectos.id_subprograma=".$ms_subpr['id_subprograma']."  group by proyectos.id_proyecto ORDER BY proyectos.id_dependencia, proyectos.no_proyecto",$siplan_data_conn) or die (mysql_error());


//echo "SELECT *, (dependencias.nombre) as nom_dep, (proyectos.nombre) as nom_pro FROM dependencias INNER JOIN proyectos ON dependencias.id_dependencia = proyectos.id_dependencia WHERE  proyectos.estatus=2 and proyectos.id_subprograma=".$ms_subpr['id_subprograma']."  group by proyectos.id_proyecto ORDER BY proyectos.id_dependencia, proyectos.no_proyecto";


$sac_dep_sub1=mysql_query("SELECT *, (dependencias.nombre) as nom_dep, (proyectos.nombre) as nom_pro FROM dependencias INNER JOIN proyectos ON dependencias.id_dependencia = proyectos.id_dependencia WHERE  proyectos.estatus=2 and proyectos.id_estrategia=".$ms_subpr['id_estrategia']."  GROUP BY proyectos.id_dependencia ORDER BY proyectos.id_dependencia, proyectos.no_proyecto",$siplan_data_conn) or die (mysql_error());
$tanual=0;
$tsem=0;
$tsalca=0;
$ttal=0;
$ttant=0;

$tsem=0;

$aporte=0;
$tsalca=0;

$alca=0;
$salca=0;
while($ms_dep_sub1=mysql_fetch_array($sac_dep_sub1))
{



$estra->write($x, 1, utf8_decode($ms_dep_sub1['nom_dep']), $negrita10); //<-----------------------------------
$estra->mergeCells($x,1,$x,5);

//$sac_dep_sub=mysql_query("SELECT * FROM proyectos WHERE proyectos.id_subprograma=".$ms_subpr['id_subprograma']."  group by proyectos.id_proyecto ORDER BY proyectos.id_dependencia, proyectos.no_proyecto",$siplan_data_conn) or die (mysql_error());

	

$anual=0;
$sem=0;
$salca=0;
$alca=0;



$sumadep_anual=mysql_query("select sum(cantidad) as ttanual from proyectos where estatus=2 and id_dependencia=".$ms_dep_sub1['id_dependencia']." and id_estrategia=".$ms_dep_sub1['id_estrategia'],$siplan_data_conn) or die (mysql_error());
$anual1=mysql_fetch_array($sumadep_anual);
$anual=$anual1['ttanual'];

$sumadep_sem=mysql_query("select sum(prog_sem) as ttsem from proyectos where estatus=2 and id_dependencia=".$ms_dep_sub1['id_dependencia']." and id_estrategia=".$ms_dep_sub1['id_estrategia'],$siplan_data_conn) or die (mysql_error());
$sem1=mysql_fetch_array($sumadep_sem);
$sem=$sem1['ttsem'];

$suma_alca=mysql_query("select sum(alcanzadas_proy.alcanzadas) as alca FROM estrategias INNER JOIN (dependencias INNER JOIN (proyectos INNER JOIN alcanzadas_proy ON proyectos.id_proyecto = alcanzadas_proy.id_proyecto) ON dependencias.id_dependencia = proyectos.id_dependencia) ON estrategias.id_estrategia = proyectos.id_estrategia where proyectos.estatus=2 and alcanzadas_proy.activo=1  and dependencias.id_dependencia=".$ms_dep_sub1['id_dependencia']." and estrategias.id_estrategia=".$ms_dep_sub1['id_estrategia'],$siplan_data_conn) or die (mysql_error());
$salca1=mysql_fetch_array($suma_alca);
$salca=$salca1['alca'];







$estra->write($x, 6, "", $negrita9);
//$estra->write($x, 7, number_format($anual,2), $negrita9);
$estra->writeNumber($x,7, $anual, $negrita9);

$estra->writeNumber($x, 8, $sem, $negrita9);
$estra->writeNumber($x, 9, $salca, $negrita9);

if ($anual1['ttanual']==""){
	$aporte=0;
		}else{
	$aporte=$anual1['ttanual'];
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($salca==0 and $aporte==0){
	$tt=0;
	}elseif ($salca>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$ttat=(($salca/$aporte));}
	
$estra->writeNumber($x, 10,$ttat , $negrita91);

if ($sem1['ttsem']==""){
	$aporte=0;
		}else{
	$aporte=$sem1['ttsem'];
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($salca==0 and $aporte==0){
	$tt=0;
	}elseif ($salca>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$tt=(($salca/$aporte));}
$estra->writeNumber($x, 11,$tt, $negrita91);
$tanual=$tanual+$anual;
$tsem=$tsem+$sem;
$tsalca=$tsalca+$salca;

////aqui subconsulta
$sac_dep_sub=mysql_query("SELECT *, (proyectos.nombre) as nom_pro FROM proyectos WHERE  proyectos.estatus=2 and proyectos.id_estrategia=".$ms_subpr['id_estrategia']." and proyectos.id_dependencia=".$ms_dep_sub1['id_dependencia']."  GROUP BY proyectos.id_proyecto ORDER BY proyectos.id_dependencia, proyectos.no_proyecto",$siplan_data_conn) or die (mysql_error());
while($ms_dep_sub=mysql_fetch_array($sac_dep_sub))
{

$ms_alca=mysql_query("select sum(alcanzadas) as alcan from  alcanzadas_proy where activo=1 and id_proyecto=".$ms_dep_sub['id_proyecto'],$siplan_data_conn) or die (mysql_error());
$alca1=mysql_fetch_array($ms_alca);
$alca=$alca1['alcan'];




$estra->write($x+1, 0, $ms_dep_sub['no_proyecto'], $negrita4);
$estra->write($x+1, 1, utf8_decode($ms_dep_sub['nom_pro']), $negrita8); //<-----------------------------------
$estra->mergeCells($x+1,1,$x+1,5);
$estra->write($x+1, 6, utf8_decode($ms_dep_sub['unidad_medida']), $negrita4);
$estra->writeNumber($x+1, 7,$ms_dep_sub['cantidad'], $negrita44);
$estra->writeNumber($x+1, 8,$ms_dep_sub['prog_sem'], $negrita44);
$estra->writeNumber($x+1, 9,$alca, $negrita44);

if ($ms_dep_sub['cantidad']==""){
	$aporte=0;
		}else{
	$aporte=$ms_dep_sub['cantidad'];
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($alca==0 and $aporte==0){
	$tt=0;
	}elseif ($alca>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$ttann=(($alca/$aporte));}

$estra->writeNumber($x+1, 10, $ttann, $negrita45);

if ($ms_dep_sub['prog_sem']==""){
	$aporte=0;
		}else{
	$aporte=$ms_dep_sub['prog_sem'];
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($alca==0 and $aporte==0){
	$tt=0;
	}elseif ($alca>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$tta=(($alca/$aporte));}
$estra->writeNumber($x+1, 11, $tta, $negrita45);

/*$estra->write(20, 0, "", $negrita4);
$estra->write(20, 1, "", $negrita4); 
$estra->mergeCells(20,1,20,5);
$estra->write(20, 6, "", $negrita4);
$estra->write(20, 7, "", $negrita4);
$estra->write(20, 8, "", $negrita4);
$estra->write(20, 9, "", $negrita4);
$estra->write(20, 10, "", $negrita4);
$estra->write(20, 11, "", $negrita4);*/



$estra->setRow($x,30);

$estra->setColumn(6,6,25);
$estra->setColumn(1,5,15);
$estra->setColumn(7,7,16);
$estra->setColumn(8,8,16);
$estra->setColumn(9,9,16);
$estra->setColumn(10,10,12);
$estra->setColumn(11,11,12);
//:setColumn

$x=$x+1;	
}
$estra->setRow($x,30);
$x=$x+3;	
}
$estra->write($x+2, 0, "Total", $negrita101); //<-----------------------------------
$estra->mergeCells($x+2,0,$x+2,5);
$estra->write($x+2, 6, "", $negrita101);
$estra->writeNumber($x+2, 7, $tanual, $negrita912);
$estra->writeNumber($x+2, 8, $tsem, $negrita912);
$estra->writeNumber($x+2, 9, $tsalca, $negrita912);

if ($tanual==""){
	$aporte=0;
		}else{
	$aporte=$tanual;
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($tsalca==0 and $aporte==0){
	$tt=0;
	}elseif ($tsalca>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$ttant=(($tsalca/$aporte));}

$estra->writeNumber($x+2, 10, $ttant, $negrita911);


if ($tsem==""){
	$aporte=0;
		}else{
	$aporte=$tsem;
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($tsalca==0 and $aporte==0){
	$tt=0;
	}elseif ($tsalca>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$ttal=(($tsalca/$aporte));}
$estra->writeNumber($x+2, 11, $ttal, $negrita911);

//-----------------------------------termina hoja Estrategia----------------------------------------------
}
}

}	


// Generamos nuestro libro de excel
$ms_ac=mysql_fetch_array($sac_ac);
//echo $ms_ac['acuerdo']."aaaaaa";
$libro->send($nnom.'.xls');
$libro->close();
?>


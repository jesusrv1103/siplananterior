<?php session_start(); 

$id_obra=$_GET['d'];
$id_oficio=$_GET['o'];

if ($id_obra!="" and $id_oficio=$_GET['o'] and $_SESSION['id_dependencia_v3']!=""){

date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
require('fpdf/fpdf.php');



//$siplan_data_conn; conexion
class PDF extends FPDF
{
    
    function Justify($text, $w, $h)
{
    $tab_paragraphe = explode("\n", $text);
    $nb_paragraphe = count($tab_paragraphe);
    $j = 0;

    while ($j<$nb_paragraphe) {

        $paragraphe = $tab_paragraphe[$j];
        $tab_mot = explode(' ', $paragraphe);
        $nb_mot = count($tab_mot);

        // Handle strings longer than paragraph width
        $k=0;
        $l=0;
        while ($k<$nb_mot) {

            $len_mot = strlen ($tab_mot[$k]);
            if ($len_mot<($w-5) )
            {
                $tab_mot2[$l] = $tab_mot[$k];
                $l++;    
            } else {
                $m=0;
                $chaine_lettre='';
                while ($m<$len_mot) {

                    $lettre = substr($tab_mot[$k], $m, 1);
                    $len_chaine_lettre = $this->GetStringWidth($chaine_lettre.$lettre);

                    if ($len_chaine_lettre>($w-7)) {
                        $tab_mot2[$l] = $chaine_lettre . '-';
                        $chaine_lettre = $lettre;
                        $l++;
                    } else {
                        $chaine_lettre .= $lettre;
                    }
                    $m++;
                }
                if ($chaine_lettre) {
                    $tab_mot2[$l] = $chaine_lettre;
                    $l++;
                }

            }
            $k++;
        }

        // Justified lines
        $nb_mot = count($tab_mot2);
        $i=0;
        $ligne = '';
        while ($i<$nb_mot) {

            $mot = $tab_mot2[$i];
            $len_ligne = $this->GetStringWidth($ligne . ' ' . $mot);

            if ($len_ligne>($w-5)) {

                $len_ligne = $this->GetStringWidth($ligne);
                $nb_carac = strlen ($ligne);
                $ecart = (($w-2) - $len_ligne) / $nb_carac;
                $this->_out(sprintf('BT %.3F Tc ET',$ecart*$this->k));
                $this->MultiCell($w,$h,$ligne);
                $ligne = $mot;

            } else {

                if ($ligne)
                {
                    $ligne .= ' ' . $mot;
                } else {
                    $ligne = $mot;
                }

            }
            $i++;
        }

        // Last line
        $this->_out('BT 0 Tc ET');
        $this->MultiCell($w,$h,$ligne);
        $tab_mot = '';
        $tab_mot2 = '';
        $j++;
    }
}
    
    function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
     
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF){
                $this->PutLink($this->HREF,$e);
            }
            else{
                $this->Write(5,$e);
                //$this->Justify($e,200,4);
         
            //$this->MultiCell(200,5,$e,1,J,0);    
            }
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
        
       
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}
    
	
	
//Cabecera de página
function Header()
{ 
    $id_obra=$_GET['d'];
$id_oficio=$_GET['o'];
$this->SetMargins(3,3);
$this->SetFont('Arial','BI',11);

////////////////Logos//////////////////////////////////////////////
$this->Image('logoupla.jpg',8,5,40,10);
$this->Image('esc.jpg',187,6,20,19);
  
$dat_his=mysql_query("select * from oficios_his where id_obra=".$id_obra." and id_oficio=".$id_oficio);
$res_his=mysql_fetch_assoc($dat_his);
$this->SetXY(3,8);
$this->MultiCell(210,5,("COORDINACIÓN ESTATAL DE PLANEACIÓN"),0,C,0); 
$this->SetXY(3,13);
$this->MultiCell(210,5,("DIRECCIÓN DE PROGRAMACIÓN"),0,C,0); 
$this->SetXY(3,18);
$this->MultiCell(210,5,("DEPARTAMENTO DE PROGRAMACIÓN SECTORIAL Y OPERATIVA"),0,C,0); 
$this->SetFont('Arial','B',10);
$this->SetXY(8,28);
$this->MultiCell(201,5,"No. de Oficio: ".$res_his['no_oficio_his'],0,R,0); 
$this->SetFont('Arial','',10);
$this->SetXY(8,33);
$this->MultiCell(201,5,"Zacatecas, Zacatecas. A ".fecha_larga($res_his['fecha_his']),0,R,0); 
$this->SetXY(7,43);
$this->SetFont('Arial','B',10);
$this->MultiCell(200,5,utf8_decode($res_his['dirigido_de_his']),0,L,0); 
$this->SetXY(7,48);
$this->MultiCell(200,5,utf8_decode($res_his['cargo_de_his']),0,L,0);
$this->SetXY(7,53);
$this->MultiCell(200,5,"P R E S E N T E",0,L,0);
    //cambios si no hay atn
$Y1=$this->GetY();
    
    if ($res_his['dirigido_para_his']!=""){
$Y1=$Y1+2.5; //5
$this->SetXY(8,$Y1);
$this->MultiCell(201,5,"AT'N: ".utf8_decode($res_his['dirigido_para_his']),0,R,0); 
$Y1=$Y1+5;
$this->SetXY(8,$Y1);
$this->MultiCell(201,5,utf8_decode($res_his['cargo_para_his']),0,R,0); 

    }
    $this->SetFont('Arial','',10);
//$Y1=$Y1+10;

  if ($res_his['dirigido_para_his']!=""){ 
$Y1=$Y1+7.5; //10
}else{
$Y1=$Y1+5; //10	
	}
$this->SetXY(8,$Y1);
    
    

    $this->SetXY(7,$Y1);
    $this->SetLeftMargin(7);
     $this->SetRightMargin(7);
$this->WriteHTML(utf8_decode($res_his['texto_his']));
    
    
    $this->Ln();
//$this->MultiCell(200,5,utf8_decode($res_his['texto_his']),0,J,0); 


  
}

//Pie de página
function Footer()
{
$id_obra=$_GET['d'];
$id_oficio=$_GET['o'];
$dat_his=mysql_query("select * from oficios_his where id_obra=".$id_obra." and id_oficio=".$id_oficio);
$res_his=mysql_fetch_assoc($dat_his);
	//Posición: a 1,5 cm del final
	$this->SetY(-55); //25 23
	
	$this->SetX(8);

        $this->SetFont('Arial','B',10);
        $this->MultiCell(200,5,"A T E N T A M E N T E",0,C,0); 
        $this->Ln();
	$this->Ln(3);
	$this->Ln(2);
        $this->SetX(65.5);
        $this->MultiCell(87,5,utf8_decode($res_his['attm_his']),0,C,0); 
        $this->Ln(2);
        $this->SetX(7);
        $this->SetFont('Arial','',7);
        $this->MultiCell(200,3, utf8_decode($res_his['ccp1_his']),0,L,0); 
        $this->SetX(27);
        $this->MultiCell(180,3, utf8_decode($res_his['ccp2_his']),0,L,0);  
        $this->SetX(27);
        $this->MultiCell(180,3, utf8_decode($res_his['cpp3_his']),0,L,0);   
        $this->SetX(27);
        $this->MultiCell(180,3, utf8_decode($res_his['ccp4_his']),0,L,0); 
        $this->SetX(7);
        $this->MultiCell(180,3, utf8_decode($res_his['ccp_abrv_his']),0,L,0); 


}






}

    function fecha_formato($fecha){
    $yr=substr($fecha,0,4);
     $mo=substr($fecha,5,2);
    $dia=substr($fecha,8,2);
        return($dia."/".$mo."/".$yr);
    }
function fecha_larga($fecha){
    
    $yr=substr($fecha,0,4);
     $mo=substr($fecha,5,2);
    $dia=substr($fecha,8,2);
    
    
    switch($mo){
    case 1:
        $mes="Enero";
    break;
    
    case 2:
        $mes="Febrero";
    break;
    
    case 3:
        $mes="Marzo";
    break;
    
    case 4:
        $mes="Abril";
    break;    
    
    case 5:
        $mes="Mayo";
    break; 
    
    case 6:
        $mes="Junio";
    break;    
    
    case 7:
        $mes="Julio";
    break;
        
    case 8:
        $mes="Agosto";
    break;
        
    case 9:
        $mes="Septiembre";
    break;
        
    case 10:
        $mes="Octubre";
    break;
        
    case 11:
        $mes="Noviembre";
    break;
        
    case 12:
        $mes="Diciembre";
    break;
    
    }
    
    return ($dia." de ".$mes." del ".$yr);

}
    
//Creación del objeto de la clase heredada
$pdf=new PDF('P','mm','Legal');  //$pdf=new PDF('L','mm','Legal');  oficio array(215.90,340) 21.59 x 35.56 es del tamaño legal
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$X=8;
$newy  = $pdf->GetY();
$newy=$newy+3;
$pdf->SetXY($X,$newy);

	$dat_his=mysql_query("select * from oficios_his where id_obra=".$id_obra." and id_oficio=".$id_oficio);
$res_his=mysql_fetch_assoc($dat_his);
	$pdf->SetWidths(array(41,159));
	$pdf->SetAligns(array(J,L));
	$pdf->SetFont('Arial','',10);
	$pdf->SetFont1(array(B));
	$pdf->Row(array(("Capítulo:"),$res_his['capitulo_his']));
	$pdf->SetX($X);
   $pdf->SetFont('Arial','',9);
    //$pdf->SetFonttm(array(9));
    
function limpiar($String){
$String = str_replace('á',"Á",$String);
$String = str_replace('í',"Í",$String);
$String = str_replace('é',"É",$String);
$String = str_replace('ó',"Ó",$String);
$String = str_replace('ú',"Ú",$String);
$String = str_replace("ñ","Ñ",$String);
$String = str_replace("ý","Ý",$String);
$String = str_replace("ü","Ü",$String);
return $String;
}
  
    $pdf->SetFonttm(array(10,8.5));
    $pdf->SetAligns(array(L,J));  
    $pdf->SetFont1(array(B,B));

/*
if (strlen(limpiar(utf8_decode(strtoupper($res_his['nom_obra_his']) )))==79 or strlen(limpiar(utf8_decode(strtoupper($res_his['nom_obra_his']) )))==80)

	{
	$pdf->Row(array("Nombre de la Obra:",(limpiar(strtoupper(utf8_decode($res_his['nom_obra_his']))."  " ))));
}else{

 $pdf->Row(array("Nombre de la Obra:",(limpiar(strtoupper(utf8_decode($res_his['nom_obra_his'])) ))));
}
*/

       $pdf->Row(array("Nombre de la Obra:",limpiar(utf8_decode(strtoupper($res_his['nom_obra_his']) ))));
       $pdf->SetFonttm(array());

    $pdf->SetFont('Arial','',10);
	$pdf->SetWidths(array(41,28,20,38,28,45));
	$pdf->SetAligns(array(J,J,L,L,L,L));
	$pdf->SetX($X);
	$pdf->SetFont1(array(B,"",B,"",B));
	$pdf->Row(array(("Número de la Obra:"),$res_his['no_obra_his'],"Programa:",utf8_decode($res_his['prog_his']) ,"Subprograma:",utf8_decode($res_his['subprog_his'])));
	$pdf->SetWidths(array(41,70,20,69));
	$pdf->SetAligns(array(J,L,J,L));
	$pdf->SetX($X);
	$pdf->SetFont1(array(B,"",B,B));
	$pdf->Row(array("Localidad:",utf8_decode($res_his['loc_his']),"Municipio:",limpiar(strtoupper(utf8_decode($res_his['mun_his']))) ));
	$pdf->SetWidths(array(41,28,20,111));
	$pdf->SetAligns(array(J,J,J,J,J,J));
	$pdf->SetX($X);
	$pdf->SetFont1(array(B,"",B,"",B),"");
	$pdf->Row(array(("Grado de Marginación:"),utf8_decode($res_his['margi_his']),"Sector:",utf8_decode($res_his['sector_his'])));
	$pdf->SetWidths(array(200));
	$pdf->SetAligns(array(J));
	$pdf->SetX($X);
	//$pdf->Row(array(""));
    $pdf->Ln();
	$pdf->SetWidths(array(69,58,73));
	$pdf->SetAligns(array(C,C,C));
	$pdf->SetX($X);
	$pdf->SetAligns(array(C,C,C));
	$pdf->SetFont1(array(B,B,B));
	$pdf->Row(array("Metas","Beneficiarios","Programación"));
	$pdf->SetWidths(array(41,28,29,29,33,40));
	$pdf->SetAligns(array(C,C,C,C,C,C));
	$pdf->SetFont1(array(B,B,B,B,B,B));
	$pdf->SetX($X);
	$pdf->Row(array("Unidad de Medida","Cantidad","Hombres:","Mujeres:" ,"Fecha de Inicio",("Fecha de Término")));
	$pdf->SetWidths(array(41,28,29,29,33,40));
	$pdf->SetAligns(array(C,C,C,C,C,C));
	$pdf->SetFont1(array(""));
	$pdf->SetX($X);
	$pdf->Row(array(utf8_decode($res_his['medida_his']),number_format($res_his['cantidad'],2),number_format($res_his['ben_h_his']),number_format($res_his['ben_m_his']) ,fecha_formato($res_his['fecha_ini_his']),fecha_formato($res_his['fecha_fin_his'])));
	$pdf->SetWidths(array(25,175));
	$pdf->SetAligns(array(J,L));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
	$pdf->Row(array("Eje:",utf8_decode($res_his['eje_his'])));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
	$pdf->Row(array(("Línea:"),utf8_decode($res_his['linea_his'])));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
	$pdf->Row(array("Estrategia:",utf8_decode($res_his['estrategia_his'])));
    $pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
	$pdf->Row(array("Proyecto:",utf8_decode($res_his['proy_his'])));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
	$pdf->SetWidths(array(45,155));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
	$pdf->SetAligns(array(J,J));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
	$pdf->Row(array(("Modalidad de Ejecución:"),utf8_decode($res_his['modalidad_his'])));
	$pdf->SetWidths(array(200));
	$pdf->SetAligns(array(C));
	$pdf->SetFont1(array("B"));
	$pdf->SetX($X);
//$pdf->Row(array("Estructura Financiera"));
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(200,5,"Estructura Financiera",0,C,0); 
	$pdf->SetWidths(array(55,55,40,30,20,));
	$pdf->SetAligns(array(C,C,C,C,C));
	$pdf->SetFont1(array(B,B,B,B,B));
	$pdf->SetX($X);
	
		$pdf->SetFont('Arial','',9);
    if ($res_his['ley_fed']!="" and $res_his['ley_est']!="" and $res_his['ley_mun']!=""){
		
		   $pdf->Row(array(utf8_decode($res_his['ley_fed'])."",utf8_decode($res_his['ley_est'])."",utf8_decode($res_his['ley_mun'])."","Participaciones" ,"Otros"));
		}

		
			elseif ($res_his['ley_fed']!="" and $res_his['ley_est']!=""){

		   $pdf->Row(array("".utf8_decode($res_his['ley_fed'])."",utf8_decode($res_his['ley_est'])."","Municipal","Participaciones" ,"Otros"));

		} 

		

		elseif ($res_his['ley_fed']!="" and $res_his['ley_mun']!=""){

		   $pdf->Row(array("".utf8_decode($res_his['ley_fed'])."","Estatal"."",utf8_decode($res_his['ley_mun'])."","Participaciones" ,"Otros"));

		} 

		

		
		elseif ($res_his['ley_est']!="" and $res_his['ley_mun']!=""){

		   $pdf->Row(array(""."Federal", utf8_decode($res_his['ley_est'])."",utf8_decode($res_his['ley_mun'])."","Participaciones" ,"Otros"));

		} 









		elseif ($res_his['ley_fed']!=""){
		   $pdf->Row(array("".utf8_decode($res_his['ley_fed'])."","Estatal"."","Municipal","Participaciones" ,"Otros"));
		} 
		
		elseif ($res_his['ley_est']!=""){
			   $pdf->Row(array("Federal","".utf8_decode($res_his['ley_est'])."","Municipal","Participaciones" ,"Otros"));
		}
		elseif ($res_his['ley_mun']!=""){

			   $pdf->Row(array("Federal",""."Estatal"."","".utf8_decode($res_his['ley_mun'])."","Participaciones" ,"Otros"));

		}


			else{
    
    $pdf->Row(array("Federal ","Estatal ","Municipal","Participaciones" ,"Otros"));
}
    
    	$pdf->SetFont('Arial','',10);
	$pdf->SetFont1(array(""));
	$pdf->SetX($X);
	$pdf->Row(array("$".number_format($res_his['fed_his'],2),"$".number_format($res_his['est_his'],2),"$".number_format($res_his['muni_his'],2),"$".number_format($res_his['part_his'],2) ,"$".number_format($res_his['otros_his'],2)));
	$pdf->SetWidths(array(150,50));
	$pdf->SetAligns(array(C,C));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX($X);
    $pdf->SetFont('Arial','',9);
	$pdf->Row(array("Gastos Indirectos",""));
    $pdf->SetFont('Arial','',10);
	$pdf->SetWidths(array(55,55,40,50));
	$pdf->SetAligns(array(C,C,C,J,J));
	$pdf->SetFont1(array(""));
	$pdf->SetX($X);
	$pdf->Row(array("$".number_format($res_his['fed_ind_his'],2),"$".number_format($res_his['est_ind_his'],2),"$".number_format($res_his['mun_ind_his'],2),""));
	$pdf->SetWidths(array(40,50)); //150
	$pdf->SetAligns(array(R,R));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX(118); //$X
	$pdf->Row(array("Suma ($):","$".number_format($res_his['suma_his'],2)));
	$pdf->SetFont1(array(B,""));
	$pdf->SetX(118);
	$pdf->Row(array("Suma Indirectos($):","$".number_format($res_his['suma_ind_his'],2)));
	$pdf->SetFont1(array(B,B));
	$pdf->SetX(118);
	$pdf->Row(array("Total:","$".number_format($res_his['total_his'],2)));
	
	$pdf->SetFont('Arial','',10);
$X=7;
$newy  = $pdf->GetY();
$newy=$newy+3;
$pdf->SetXY($X,$newy);
$Y1=$newy;
$Y1=$Y1+0;
$pdf->SetXY($X,$Y1);
//$pdf->MultiCell(202,5,utf8_decode($res_his['texto2_his']),0,J,0); 
$pdf->WriteHTML(utf8_decode($res_his['texto2_his']));
$newy  = $pdf->GetY();
$newy=$newy+3;
$pdf->SetXY($X,$newy);
$pdf->MultiCell(202,5,utf8_decode($res_his['texto3_his']),0,J,0); 
$newy  = $pdf->GetY();
$newy=$newy+3;
$pdf->SetXY($X,$newy);
$pdf->MultiCell(202,5,utf8_decode($res_his['texto4_his']),0,J,0); 
/*
$newy  = $pdf->GetY();
$newy=$newy+3;
$pdf->SetXY($X,$newy);
$Y1=$newy;
$Y1=$Y1+22;
$pdf->SetXY($X,$Y1);
$pdf->MultiCell(200,5,"A T E N T A M E N T E",0,C,0); 

$pdf->SetXY(65.5,$Y1+15);
$pdf->MultiCell(85,5,utf8_decode($res_his['attm_his']),0,C,0); 


*/
/*$pdf->SetFont('Arial','',7);
$currenty = $pdf->GetY();
$newy = $currenty ;
$pdf->SetXY(3,$newy+10);
$pdf->MultiCell(210,3,"Copia para.-         Lic. Miguel A. Alonso Reyes.- Gobernador del Estado.- Para su superior conocimiento.
											                  Ing. Fernando Enrique Soto Acosta.- Secretario de Finanzas del Estado.- Para su conocimiento.
											                  C.P. Guillermo Huizar Carranza.- Secretario de Funcion Publica.- Para su conocimiento.
											                  C.P. Raúl Brito Berúmen.- Auditor Superior del Estado.- Para su conocimiento.
L'EHU/I'JVR/I'GIMM",1,L,0); */
	
	
	







	

    $c_find=mysql_query("select oficio_fis_his from oficios_his where id_oficios_his=".$res_his['id_oficios_his']." and oficio_fis_his=''");

	
    
    if (mysql_num_rows($c_find)==1){
                
        $pdf->Output('tmp/oficio'.$res_his['id_oficios_his'].'.pdf','F'); //I web f save
                $archivo='tmp/oficio'.$res_his['id_oficios_his'].'.pdf';
        
        if (file_exists($archivo)) {
        
            
                $tamanio=filesize($archivo);
                     
                $fp = fopen($archivo, 'r+b');
                $data = fread($fp, $tamanio);
                fclose($fp);
                 $data = addslashes($data);
        
       
        mysql_query("update oficios_his set oficio_fis_his='".$data."' where id_oficios_his=".$res_his['id_oficios_his']);
            unlink($archivo);
        }
        
        
        }



	   
    $pdf->Output('Oficio.pdf','I'); //I web f save

}
?>

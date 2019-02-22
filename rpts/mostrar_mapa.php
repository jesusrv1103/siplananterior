<?php session_start();

$tipo=$_GET['g'];

if ($tipo!="" and $_SESSION['id_dependencia_v3']!=""){
//include('obras/classes/c_obra.php');
//include('obras/classes/c_funciones.php');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");

//$c=new obras;
//$f=new funciones;
?>
 <style type="text/css" title="currentStyle">
			@import "../media/css/demo_page.css";
			@import "../media/css/demo_table.css";
			.ex_highlight #example1 tbody tr.even:hover, #example1 tbody tr.even td.highlighted {
	background-color: #ECFFB3;
}

.ex_highlight #example1 tbody tr.odd:hover, #example1 tbody tr.odd td.highlighted {
	background-color: #E6FF99;
}

.ex_highlight_row #example1 tr.even:hover {
	background-color: #ECFFB3;
}

.ex_highlight_row #example1 tr.even:hover td.sorting_1 {
	background-color: #DDFF75;
}

.ex_highlight_row #example1 tr.even:hover td.sorting_2 {
	background-color: #E7FF9E;
}

.ex_highlight_row #example1 tr.even:hover td.sorting_3 {
	background-color: #E2FF89;
}

.ex_highlight_row #example1 tr.odd:hover {
	background-color: #E6FF99;
}

.ex_highlight_row #example1 tr.odd:hover td.sorting_1 {
	background-color: #D6FF5C;
}

.ex_highlight_row #example1 tr.odd:hover td.sorting_2 {
	background-color: #E0FF84;
}

.ex_highlight_row #example1 tr.odd:hover td.sorting_3 {
	background-color: #DBFF70;
}
</style>
 <link rel="stylesheet" href="../css/jquery-ui.css" />
 <script type="text/javascript" src="map/plugin/jquery.1.7.2.min.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>


<script type="text/javascript" charset="utf-8">



			$(document).ready(function() {
				$('#example1').dataTable({
				
				
				  "iDisplayLength": -1,
 
        "oLanguage": {
           "sLengthMenu": 'Mostrar <select>'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
			'<option value="50">50</option>'+
			'<option value="100">100</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros por pagina',
            "sZeroRecords": "No se encontro nada",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sSearch": "Buscar",
            "sInfoFiltered": "(filtrado de _MAX_ registros totales)"
            
        },
		
		
		
		
    });
			} );
</script>

<?php



}


?>


 <title>Map resumen por Municipios</title>

<div style="margin-left:20px; margin-right:20px;">
<h2>POA02 Resumen</h2>
<div id="cuadro_info" style="width:1800px; height:2050px" >
<ul id="botones">
       <li><a href="reporte_resumen_map.php?g=<?php echo $tipo.$mn;?>" target="_blank"><img src="../imagenes/printer24x24.png" width="24" height="24" align="middle">Imprimir</a></li>
     

</ul>
<hr>


<?php 

if ($tipo=="map"){  
 $title="Mapa resumen por Municipios";
 
/*  anterior
$query="SELECT municipios.nombre, municipios.id_municipio, Sum(aportes.federal+aportes.estatal+aportes.municipal+aportes.participantes+aportes.credito+aportes.otros) AS total
FROM regiones INNER JOIN (municipios INNER JOIN (dependencias INNER JOIN (obras INNER JOIN aportes ON obras.id_obra = aportes.id_obra) ON dependencias.id_dependencia = obras.id_dependencia) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region where  obras.status_obra>=3 GROUP BY obras.municipio order by municipios.nombre asc";
*/

$query="SELECT municipios.nombre, municipios.id_municipio, Sum(obras.federal+obras.estatal+obras.municipal+obras.participantes+obras.credito+obras.otros) AS total
FROM municipios INNER JOIN obras  ON municipios.id_municipio = obras.municipio where  obras.status_obra>=3 
GROUP BY obras.municipio order by municipios.id_municipio asc";

 $title2="POA de Inversión por Municipios";
//$dat=acronimo
//$dat=

$titlebottom="Municipios";
}


?>

  
  
  <link rel="stylesheet" media="all" type="text/css" href="map/css/map.css"/>

   <script type="text/javascript" src="map/plugin/imageMapster/src/redist/when.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/core.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/graphics.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/mapimage.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/mapdata.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/areadata.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/areacorners.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/scale.js"></script>
    <script type="text/javascript" src="map/plugin/imageMapster/src/tooltip.js"></script>
    <script type="text/javascript" src="map/js/map.js"></script>
	
  <div align="left" >


<div id="imageMap" style="display: block;   position: absolute; padding: 0px; width="602" height="769" background-position: initial initial; background-repeat: initial initial; margin-left:200px">
<img id="image" src="map/img/zacatecas.png" width="602" height="769" alt="Planets" usemap="#planetmap" >
</div>
<map name="planetmap">
  <area onclick="$('#datos').load('det_map.php?mp=1');" municipio="Apozol" shape="poly" coords="168,697,190,700,198,701,207,704,216,707,220,697,222,687,223,679,198,679,168,679" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=2');" municipio="Apulco" href="#" shape="poly" coords="280,666,273,676,273,691,285,707,293,684,293,671,279,668">
  <area onclick="$('#datos').load('det_map.php?mp=3');" municipio="Atolinga" shape="poly" coords="163,605,158,605,136,631,136,633,141,638,140,656,138,659,138,668,146,669,146,664,144,660,144,649,154,639,163,621" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=4');" municipio="<?php echo ("Benito Juárez"); ?>" shape="poly" coords="146,695,144,688,142,678,142,675,145,672,132,670,122,681,112,691,110,695,109,702,109,708,109,711,117,709,122,709,127,709,129,709" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=5');" municipio="Calera" shape="poly" coords="276,412,298,410,299,395,261,399,261,434,267,434" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=6');" municipio="<?php echo ("Cañitas de Felipe Pescador");?>" shape="poly" coords="244,309,313,313,314,296,302,276,294,262,263,263,262,272,259,274,258,292,245,303" href="#">
  <area  municipio="<?php echo ("Concepción del Oro");?>" href="#" shape="poly" coords="505,65,501,67,514,147,564,149,563,132,560,129,560,115,565,108,547,93,531,65" onclick="$('#datos').load('det_map.php?mp=7');">
  <area onclick="$('#datos').load('det_map.php?mp=8');" municipio="<?php echo ("Cuauhtémoc"); ?>" shape="poly" coords="365,497,359,498,357,503,365,521,373,517,377,527,384,528,394,512" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=9');" municipio="Chalchihuites" shape="poly" coords="99,322,85,312,85,294,76,281,72,283,70,295,42,317,40,336,96,341,98,331" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=10');" municipio="Fresnillo" shape="poly" coords="314,395,315,337,310,330,311,315,242,311,236,319,215,319,210,321,182,322,172,332,161,353,173,391,182,419,207,
  420,219,408,234,395,235,383,250,376,252,361,272,359,278,364,293,364,294,377,301,382,300,393,309,394" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=11');" municipio="<?php echo ("Trinidad García de la Cadena"); ?>" shape="poly" coords="144,713,137,722,137,730,142,741,151,743,154,734,158,732,158,716,154,713" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=12');" municipio="Genaro Codina" shape="poly" coords="282,480,283,503,310,508,312,531,320,531,335,517,336,488,315,485" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=13');" municipio="General Enrique Estrada" shape="poly" coords="299,392,300,382,293,376,293,366,278,365,272,360,254,362,252,377,237,383,237,393,260,396" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=14');" municipio="General Francisco R. Murguia" href="#" shape="poly" coords="366,218,346,183,333,165,320,148,262,140,194,134,193,157,190,170,
  189,179,188,184,195,187,198,192,199,197,227,213,237,215,242,212,250,216,262,210,278,224,281,238,292,246,321,244">
  <area onclick="$('#datos').load('det_map.php?mp=15');" municipio="<?php echo ("EL Plateado de Joaquín Amaro"); ?>" shape="poly" coords="218,576,208,579,207,587,201,594,199,610,205,611,210,613,214,608,228,607,228,592,233,588,232,580" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=16');" municipio="<?php echo ("General Pánfilo Natera"); ?>" shape="poly" coords="380,446,366,461,379,467,384,471,390,477,394,481,410,472,395,458" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=17');" municipio="Guadalupe" " shape="poly" coords="334,400,334,416,339,425,338,430,336,437,311,437,310,457,306,462,306,482,325,485,325,476,337,468,338,448,
  347,440,362,435,374,443,374,448,379,445,356,407,356,402,345,400" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=18');" municipio="Huanusco" " shape="poly" coords="254,609,223,610,222,614,219,624,219,637,236,637,249,627,255,627,256,618" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=19');" municipio="Jalpa" shape="poly" coords="212,639,207,650,206,655,210,658,209,665,193,665,191,670,193,676,206,677,224,677,223,668,226,666,226,650,230,648,230,639" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=20');" municipio="Jerez" shape="poly" coords="234,397,222,407,207,421,199,480,206,478,218,484,228,483,234,484,243,474,248,474,254,467,257,442,258,425,258,398" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=21');" municipio="<?php echo ("Jiménez del Teul"); ?>" shape="poly" coords="39,339,38,365,28,375,27,394,56,388,72,384,84,382,96,379,96,370,110,357,115,350,116,348,113,346,110,344,83,343" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=22');" municipio="Juan Aldama" shape="poly" coords="192,134,191,157,186,184,166,192,165,180,157,170,154,157,154,154,160,145,160,137,166,135,173,133,180,133" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=23');" municipio="Juchipila" shape="poly" coords="168,699,168,706,166,711,178,712,190,717,199,715,217,719,217,709,200,703" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=24');" municipio="Loreto" shape="poly" coords="395,514,386,529,392,535,406,539,406,551,409,553,434,553,439,549,439,542,437,538,432,536,425,534,420,533,417,533,404,520" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=25');" municipio="Luis Moya" shape="poly" coords="337,488,337,513,350,502,356,502,357,497,361,496,363,496,363,485,358,480,347,484" href="#">
  <area municipio="Mazapil" href="#" shape="poly" coords="498,69,490,75,461,72,463,60,431,65,414,54,400,51,370,28,364,2,289,9,289,22,320,76,320,147,335,166,347,182,353,193,362,209,382,245,438,250,463,252,478,258,505,237,508,222,527,210,562,151,511,149" onclick="$('#datos').load('det_map.php?mp=26');">
  <area municipio="Melchor Ocampo" href="#" shape="poly" coords="367,2,404,16,427,24,444,54,464,55,463,58,433,64,421,56,412,52,402,51,392,42,372,28,367,5" onclick="$('#datos').load('det_map.php?mp=27');">
  <area onclick="$('#datos').load('det_map.php?mp=28');" municipio="Mezquital del Oro" shape="poly" coords="165,713,161,716,161,732,156,736,153,744,160,745,166,747,175,753,184,760,184,740,189,732,190,720,178,714" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=29');" municipio="Miguel Auza" shape="poly" coords="164,193,164,181,156,172,152,157,144,162,134,162,124,180,113,190,113,193,127,212,136,213,141,207,150,208" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=30');" municipio="Momax" shape="poly" coords="183,589,171,600,172,607,180,607,187,610,198,611,198,608,199,604,199,599,200,595" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=31');" municipio="Monte Escobedo" shape="poly" coords="123,470,113,478,128,491,120,504,117,517,114,526,115,543,117,554,117,564,126,571,135,564,143,564,149,
  547,158,540,158,530,166,526,166,520,157,515,157,504,162,498,165,492,170,489,168,483,168,478,158,484,139,484,132,478" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=32');" municipio="Morelos" shape="poly" coords="275,414,267,435,296,435,299,424,299,419,297,417,297,412" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=33');" municipio="Moyahua de Estrada" shape="poly" coords="199,717,191,720,190,732,186,740,185,761,192,760,199,762,207,764,215,767,220,765,220,734,217,728,218,721" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=34');" municipio="<?php echo ("Nochistlán de Mejía"); ?>" shape="poly" coords="254,629,249,629,236,639,231,640,231,649,227,652,227,667,223,671,225,675,223,684,222,689,220,699,218,707,217,718,219,727,228,724,246,725,261,714,264,719,268,718,270,715,271,710,277,704,270,695,268,689,268,677,275,667,270,663,269,657,266,652,270,639,264,633" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=35');" municipio="Noria de Ángeles" shape="poly" coords="402,498,396,511,400,515,410,524,417,531,432,534,433,526,437,517,438,506,419,500" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=36');" municipio="Ojocaliente" shape="poly" coords="363,461,349,465,340,469,328,477,327,485,336,486,357,477,365,483,366,496,394,510,400,497,394,483,381,470" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=37');" municipio="<?php echo ("Pánuco"); ?>" shape="poly" coords="298,395,298,410,300,418,300,424,318,424,331,415,333,400,312,399,308,395" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=38');" municipio="Pinos" shape="poly" coords="484,477,485,487,475,516,464,543,464,550,458,560,455,579,454,585,452,589,456,596,463,596,485,618,520,568,508,514,525,500,513,477" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=39');" municipio="<?php echo ('Río Grande');?>" shape="poly" coords="292,260,292,248,280,240,277,226,261,212,250,218,242,214,237,217,231,216,225,214,199,199,195,190,191,187,187,186,
  183,188,179,190,173,191,166,194,152,209,159,217,159,225,174,241,185,241,190,237,196,242,195,269,228,295,233,302,241,302,254,291,255,273,259,269,259,261" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=40');" municipio="<?php echo ("Saín Alto"); ?>" shape="poly" coords="243,304,234,304,228,295,196,270,195,244,192,240,188,244,176,243,169,237,162,279,159,284,159,296,173,306,184,320,211,320,216,317,237,317,242,310" href="#">
  <area municipio="EL Salvador" href="#" shape="poly" coords="565,110,562,116,562,129,565,132,566,147,575,139,593,131,604,110,599,108,593,108,589,106,581,110,577,112" onclick="$('#datos').load('det_map.php?mp=41');">
  <area onclick="$('#datos').load('det_map.php?mp=42');" municipio="Sombrerete" shape="poly" coords="167,235,160,227,159,218,153,210,144,209,138,215,130,214,113,193,109,201,95,212,94,221,80,226,87,239,84,252,84,255,97,272,93,284,85,278,80,281,89,293,88,311,104,322,100,341,113,341,121,346,161,352,173,330,181,321,171,307,162,301,157,298,157,284,160,277" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=43');" municipio="<?php echo ("Susticacán"); ?>" shape="poly" coords="182,421,170,477,197,479,205,422" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=44');" municipio="Tabasco" shape="poly" coords="236,580,236,588,231,592,231,606,256,607,256,599,265,587" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=45');" municipio="<?php echo ("Tepechitlán"); ?>" shape="poly" coords="156,640,146,650,145,659,148,663,148,669,167,677,191,677,190,671,192,664,181,663,168,647" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=46');" municipio="Tepetongo" shape="poly" coords="171,478,172,489,169,493,175,502,186,509,194,515,200,519,201,526,206,525,211,527,227,485,220,487,204,481,195,480" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=47');" municipio="<?php echo ("Teúl de González Ortega"); ?>" shape="poly" coords="109,713,100,724,103,733,113,727,121,727,121,733,125,740,141,740,136,731,136,721,145,711,155,711,159,
  714,165,707,167,700,152,699,144,697,128,711" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=48');" municipio="<?php echo ("Tlaltenango de Sanchez Román"); ?>" shape="poly" coords="211,615,199,612,191,612,186,612,179,610,171,608,169,605,166,605,164,608,165,621,161,629,157,639,164,642,171,646,
  181,659,190,661,201,663,207,663,208,660,204,656,206,648,210,638,217,637,217,624,221,611,215,610" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=49');" municipio="<?php echo ("Valparaíso"); ?>" shape="poly" coords="27,395,25,467,3,537,34,524,47,521,62,521,70,494,62,488,64,452,64,444,81,447,98,450,94,476,84,483,88,492,80,503,83,511,79,522,
  81,545,101,479,112,476,124,468,141,481,156,482,168,476,180,420,160,354,119,348,117,353,98,370,96,380" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=50');" municipio="Vetagrande" shape="poly" coords="333,417,320,425,302,426,299,431,297,436,334,435,338,426" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=51');" municipio="Villa de Cos" href="#" shape="poly" coords="476,259,463,254,382,247,367,220,321,245,294,247,294,261,314,296,314,296,313,314,312,331,317,338,315,397,358,399,361,
  390,358,366,355,364,350,360,352,353,359,353,366,331,367,327,378,327,381,337,389,337,408,317,425,298,438,286,448,284,454,276,457,268">
  <area onclick="$('#datos').load('det_map.php?mp=52');" municipio="<?php echo ("Villa García"); ?>" shape="poly" coords="441,544,441,550,435,555,412,555,407,553,403,557,409,569,422,576,436,591,450,597,454,596,450,591,454,580,455,573,
  456,560,460,553,462,550,462,543" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=53');" municipio="<?php echo ("Villa González Ortega"); ?>" shape="poly" coords="412,474,397,482,402,497,413,497,419,497,432,501,429,497" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=54');" municipio="Villa Hidalgo" shape="poly" coords="477,478,467,498,454,498,450,506,441,506,440,518,436,525,435,535,440,536,442,542,463,542,483,490,483,479" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=55');" municipio="Villanueva" shape="poly" coords="257,469,251,476,245,476,237,486,230,487,215,528,225,536,226,545,210,562,220,569,220,575,235,580,247,583,266,587,290,554,287,542,294,533,311,532,309,511,282,505,280,481" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=56');" municipio="Zacatecas" shape="poly" coords="259,436,257,466,281,478,304,481,304,462,309,456,309,438" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=57');" municipio="Trancoso" shape="poly" coords="365,438,351,442,342,450,342,455,341,466,359,459,365,460,374,450,374,444,371,442" href="#">
  <area onclick="$('#datos').load('det_map.php?mp=58');" municipio="<?php echo ("Santa María de la Paz"); ?>" shape="poly" coords="148,671,144,675,148,695,167,698,168,679" href="#">
</map>



</div>
<div  id="obras" style="margin-left:720px; width:30%;" >
<div id="container" class="ex_highlight_row">
<div id="datos">
<table width="auto%"  cellpadding="0" cellspacing="0" border="0" class="display" id="example1">
 <thead>
    <tr  >
	   <td width="auto"><div align="center">No. </div></td>    
	<td width="auto"><div align="center"> Municipio</div></td>
    <td width="auto"><div align="right"> Total Programado</div></td>
     <td width="auto"><div align="right"> Total Aprobado</div></td>
  </tr>
  </thead>
  <tbody>
  <?php
  $totaedo=0;
  $totaedo1=0;
  $consulta_obras=mysql_query($query);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
	

  ?>
 <tr  onClick="$('#datos').load('det_map.php?mp=<?php echo $resobras['id_municipio']; $mn=$resobras['id_municipio'];?>');"  style="cursor: pointer;"   id="?page_id=389"  >
   <td align="center"><?php echo $resobras['id_municipio']; ?></td> 
    <td><?php echo ($resobras['nombre']); ?></td>    
	<td align="right"><?php echo "$ ".number_format($resobras['total'],2); //bgcolor="#f3f3f3" onmouseover='this.bgColor="#97B030"' onmouseout='this.bgColor="#f3f3f3"'

	?></td>

	<?php  $query1="SELECT `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`tipo`, SUM( `poa02_origen`.`monto` ) as total
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 AND `poa02_origen`.`tipo` = 0 
 AND obras.municipio=".$resobras['id_municipio']." and  obras.status_obra='4'
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
 AND `poa02_origen`.`tipo` = 0 
 AND obras.municipio=".$resobras['id_municipio']." and  obras.status_obra='4'
	GROUP BY `obras`.`municipio` ORDER BY `obras`.`municipio` ASC";
 $consulta_obras1=mysql_query($query1,$siplan_data_conn);
    $resobras1 = mysql_fetch_assoc($consulta_obras1); 
    
   	 $query1="SELECT `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`tipo`, SUM( `poa02_origen`.`monto` ) as total
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 AND `poa02_origen`.`tipo` = 1 
 AND obras.municipio=".$resobras['id_municipio']." and  obras.status_obra='4'
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
 AND `poa02_origen`.`tipo` = 1 
 AND obras.municipio=".$resobras['id_municipio']." and  obras.status_obra='4'
	GROUP BY `obras`.`municipio` ORDER BY `obras`.`municipio` ASC";


 $query2="SELECT `obras`.`municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `poa02_origen`.`tipo`, SUM( `poa02_origen`.`monto` ) as total
	FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`
	 WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
 AND `poa02_origen`.`tipo` = 2 
 AND obras.municipio=".$resobras['id_municipio']." and  obras.status_obra='4'
 OR `obras`.`id_obra` = `poa02_origen`.`id_obra`
	AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
 AND `poa02_origen`.`tipo` = 2 
 AND obras.municipio=".$resobras['id_municipio']." and  obras.status_obra='4'
	GROUP BY `obras`.`municipio` ORDER BY `obras`.`municipio` ASC";

$res1=mysql_query($query1,$siplan_data_conn);
$res2=mysql_query($query2,$siplan_data_conn);
$rowres1=mysql_fetch_assoc($res1);
$rowres2=mysql_fetch_assoc($res2);
 
 ?>
	<td align="right"><?php echo "$ ".number_format((($resobras1['total']+$rowres1['total'])-$rowres2['total']),2); $totaedo1+=(($resobras1['total']+$rowres1['total'])-$rowres2['total']); ?></td>   
	
 </tr>  
    <?php $totaedo=$resobras['total']+$totaedo; } 
	  mysql_close($siplan_data_conn);
	 ?>
     
    </tbody>
    <tfoot>
     <tr bgcolor="#CCCCCC">
	  
    <td width="30%"><div align="center"></div></td>    
	<td width="30%"><div align="center">Total General</div></td>
    <td width="30%"><div align="center"><?php echo "$ ".number_format($totaedo,2); ?></div></td>
    <td width="30%"><div align="center"><?php echo "$ ".number_format($totaedo1,2); ?></div></td>
	  </tr>
      <tr>
	  
    <td width="30%"><div align="center">No. </div></td>    
	<td width="30%"><div align="center"> Municipio</div></td>
    <td width="30%"><div align="center"> Total Programado</div></td>
    <td width="30%"><div align="center"> Total Aprobado</div></td>
	  </tr>
  </tfoot>
  </table>
  </div></div>
  
 </div> 


 <b></div>
</br>
</div></div>
</br>	

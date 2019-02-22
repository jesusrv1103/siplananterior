<?php session_start(); 
$idproy=$_GET['p'];


header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Resumen_de_Inversión_Asignada_a_Obras_por_la_Dependencia.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ( $idproy!="" and $idproy!="0" and $_SESSION['id_dependencia_v3']!=""){
	date_default_timezone_set('America/Mexico_City');
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<style>
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{mso-footer-data:"&D&\0022Calibri\,Normal\0022&8&P\/&\#";
	margin:.39in .79in .39in .2in;
	mso-header-margin:0in;
	mso-footer-margin:.2in;
	mso-page-orientation:landscape;
	mso-horizontal-page-align:center;}
	
	tr
	{mso-height-source:auto;}
col
	{mso-width-source:auto;}
br
	{mso-data-placement:same-cell;}
.style23
	{mso-number-format:"_-* \#\,\#\#0\.00_-\;\\-* \#\,\#\#0\.00_-\;_-* \0022-\0022??_-\;_-\@_-";
	mso-style-name:Millares;
	mso-style-id:3;}
.style25
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
.style19
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
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal 2";}
.style20
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
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal 2 2";}
.style26
	{mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	mso-background-source:auto;
	mso-pattern:auto;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal 6";}
.style27
	{mso-number-format:0%;
	mso-style-name:Porcentual;
	mso-style-id:5;}
.font28
	{color:yellow;
	font-size:6.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;}
.font40
	{color:black;
	font-size:14.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;}
td
	{mso-style-parent:style0;
	padding:0px;
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
.xl75
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl76
	{mso-style-parent:style0;
	vertical-align:middle;}
.xl77
	{mso-style-parent:style0;
	font-size:7.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl78
	{mso-style-parent:style0;
	font-size:7.0pt;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl79
	{mso-style-parent:style0;
	font-size:7.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl80
	{mso-style-parent:style0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl81
	{mso-style-parent:style0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl82
	{mso-style-parent:style0;
	font-size:9.0pt;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl83
	{mso-style-parent:style0;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl84
	{mso-style-parent:style0;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl85
	{mso-style-parent:style0;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;}
.xl86
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;}
.xl87
	{mso-style-parent:style0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;}
.xl88
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl89
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl90
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl91
	{mso-style-parent:style26;
	color:black;
	font-size:16.0pt;
	font-family:MetaPro-Bold, monospace;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;sum
	white-space:normal;}
.xl92
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl93
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl94
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:MetaPro-Bold, monospace;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl95
	{mso-style-parent:style0;
	font-family:PetitaMedium;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	vertical-align:middle;}
.xl96
	{mso-style-parent:style0;
	mso-number-format:0;
	vertical-align:middle;}
.xl97
	{mso-style-parent:style0;
	font-size:12.0pt;
	font-family:MetaPro-Bold, monospace;
	mso-font-charset:0;
	vertical-align:middle;}
.xl98
	{mso-style-parent:style20;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl99
	{mso-style-parent:style19;
	font-weight:700;
	font-family:"Times New Roman", serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl100
	{mso-style-parent:style19;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl101
	{mso-style-parent:style0;
	font-family:"Trebuchet MS", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl102
	{mso-style-parent:style20;
	font-size:16.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl103
	{mso-style-parent:style19;
	font-size:16.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl104
	{mso-style-parent:style0;
	font-size:12.0pt;
	font-weight:700;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;}
.xl105
	{mso-style-parent:style20;
	font-size:12.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	white-space:normal;}
.xl106
	{mso-style-parent:style19;
	font-size:11.0pt;
	font-family:"Humanst521 BT", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;}
.xl107
	{mso-style-parent:style0;
	font-family:PetitaLight;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	vertical-align:middle;}
.xl108
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	white-space:normal;}
.xl109
	{mso-style-parent:style0;
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
.xl110
	{mso-style-parent:style0;
	color:white;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	background:white;
	mso-pattern:black none;}
.xl111
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl112
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl113
	{mso-style-parent:style0;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl114
	{mso-style-parent:style23;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;}

.xl116
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl117
	{mso-style-parent:style20;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl118
	{mso-style-parent:style20;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl119
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl120
	{mso-style-parent:style20;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl121
	{mso-style-parent:style20;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl122
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl123
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl124
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl125
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl126
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	background:#4F6228;
	mso-pattern:black none;}
.xl127
	{mso-style-parent:style0;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl128
	{mso-style-parent:style0;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl129
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl130
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl131
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl132
	{mso-style-parent:style26;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl133
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl134
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl135
	{mso-style-parent:style26;
	color:black;
	font-size:14.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	white-space:normal;}
.xl136
	{mso-style-parent:style26;
	color:black;
	font-size:14.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl137
	{mso-style-parent:style26;
	color:black;
	font-size:14.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	white-space:normal;}
.xl138
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl139
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl140
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl141
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mmm\\-yyyy";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl142
	{mso-style-parent:style27;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:Percent;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl143
	{mso-style-parent:style23;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:Percent;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl144
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl145
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;}
.xl146
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;}
.xl147
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl148
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;}
.xl149
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl150
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl151
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl152
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;}
.xl153
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl154
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl155
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl156
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl157
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl158
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl159
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl160
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl161
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl162
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl163
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl164
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl165
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl166
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl167
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl168
	{mso-style-parent:style20;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl169
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;}
.xl170
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt hairline windowtext;}
.xl171
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl172
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border:.5pt hairline windowtext;
	white-space:normal;}
.xl173
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl174
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl175
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	white-space:normal;}
.xl176
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl177
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:00;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt hairline windowtext;

	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl178
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt hairline windowtext;
	white-space:normal;}
.xl179
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border:.5pt hairline windowtext;}
.xl180
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;}
.xl181
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl182
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl183
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl184
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl185
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl186
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl187
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl188
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;}
.xl189
	{mso-style-parent:style19;
	font-family:Arial, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl190
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000000000;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl191
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000000000;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;}
.xl192
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl193
	{mso-style-parent:style0;
	font-family:PetitaLight;
	mso-generic-font-family:auto;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl194
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:000000000;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;}
.xl195
	{mso-style-parent:style0;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl196
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;}
.xl197
	{mso-style-parent:style0;
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
.xl198
	{mso-style-parent:style0;
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
.xl199
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	white-space:normal;}
.xl200
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;}
.xl201
	{mso-style-parent:style25;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"_-* \#\,\#\#0\.00_-\;\\-* \#\,\#\#0\.00_-\;_-* \0022-\0022??_-\;_-\@_-";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	white-space:normal;}
.xl202
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl203
	{mso-style-parent:style0;
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
.xl204
	{mso-style-parent:style0;
	font-size:16.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;}
.xl205
	{mso-style-parent:style0;
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
.xl206
	{mso-style-parent:style0;
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
.xl207
	{mso-style-parent:style0;
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
.xl208
	{mso-style-parent:style0;
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
.xl209
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl210
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl211
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl212
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl213
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:"mm\/yy";
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;}
.xl214
	{mso-style-parent:style0;
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
.xl215
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl216
	{mso-style-parent:style0;
	color:white;
	font-size:8.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#4F6228;
	mso-pattern:black none;
	mso-protection:unlocked visible;
	white-space:normal;}
.xl217
	{mso-style-parent:style0;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl218
	{mso-style-parent:style0;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;}
.xl219
	{mso-style-parent:style20;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl220
	{mso-style-parent:style20;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl221
	{mso-style-parent:style20;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;}
.xl222
	{mso-style-parent:style19;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl223
	{mso-style-parent:style20;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl224
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl225
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl226
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl227
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt hairline windowtext;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl228
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	mso-number-format:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl229
	{mso-style-parent:style19;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl230
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	background:#00B050;
	mso-pattern:black none;}
.xl231
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:none;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;}
.xl232
	{mso-style-parent:style0;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;}
.xl233
	{mso-style-parent:style26;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl234
	{mso-style-parent:style26;
	color:white;
	font-size:11.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl235
	{mso-style-parent:style26;
	color:white;
	font-size:12.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl236
	{mso-style-parent:style26;
	color:black;
	font-size:12.0pt;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	background:#4F6228;
	mso-pattern:black none;
	white-space:normal;}
.xl237
	{mso-style-parent:style26;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-family:"Century Gothic", sans-serif;
	mso-font-charset:0;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	background:#00B050;
	mso-pattern:black none;
	white-space:normal;}
.xl238
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl239
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:.5pt hairline windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:none;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl240
	{mso-style-parent:style26;
	color:black;
	font-size:11.0pt;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:justify;
	vertical-align:middle;
	border-top:none;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt hairline windowtext;
	border-left:.5pt solid windowtext;
	white-space:normal;}
.xl241
	{mso-style-parent:style26;
	color:black;
	font-size:18.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
.xl242
	{mso-style-parent:style26;
	font-size:14.0pt;
	font-weight:700;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	text-align:right;
	vertical-align:middle;
	white-space:normal;}
	
	.xl115
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"\@";
	text-align:center;
	vertical-align:middle;
	border-top:.5pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:.5pt solid windowtext;
	border-left:none;
	mso-protection:unlocked visible;
	white-space:normal;}

-->
</style>

</head>

<body link=blue vlink=purple class=xl76>

<table border=0 cellpadding=0 cellspacing=0 width=422 style='border-collapse:
 collapse;table-layout:fixed;width:578pt'>
 
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
    <td colspan=8 height=30 class=xl206 width=3422 style='border-right:.5pt solid black;
    height:22.5pt;width:578pt'><a name="Print_Area">GOBIERNO DEL ESTADO DE
    ZACATECAS</a></td>
   </tr>
 

 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=8 height=30 class=xl203 style='border-right:.5pt solid black;
  height:22.5pt'>COORDINACIÓN ESTATAL DE PLANEACIÓN</td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=8 height=30 class=xl138 style='border-right:.5pt solid black;
  height:22.5pt'>Resumen de Inversión Asignada a Obras por la Dependencia</td>
 </tr>
 <?php 





?>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  
  <td colspan=8 class=xl139 style='mso-ignore:colspan; border-left::none;border-left-style:none; border-right:.5pt solid windowtext;'>&nbsp;</td>
  
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <?php $resultado_dep = mysql_query("SELECT * FROM dependencias WHERE id_dependencia = ".$_SESSION['id_dependencia_v3']) or die (mysql_error());
$res_dep = mysql_fetch_array($resultado_dep);?>
  <td height=30 colspan="5" class=xl197 style='height:22.5pt; '>Dependencia: <?php echo utf8_decode($res_dep['nombre']); ?></td>
    <?php  $resultado_sec = mysql_query("SELECT * FROM sectores WHERE id_sector = ".$_SESSION['sector_dependencia_v3']) or die (mysql_error());
$res_sec = mysql_fetch_array($resultado_sec);?>
  <td height=30 colspan="3" class=xl197 style='height:22.5pt; border-left::none;border-left-style:none; border-right:.5pt solid windowtext;'>Sector: <?php echo $res_sec['id_sector']." ".utf8_decode($res_sec['sector']);  ?></td>
  </tr>
 
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
 <?php $resultado_proy = mysql_query("SELECT * FROM proyectos WHERE id_proyecto = ".$_GET['p']) or die (mysql_error());
$res_proy = mysql_fetch_array($resultado_proy); ?>
  <td  height=10 colspan="8" class=xl197 style='height:22.5pt;border-top:none; text-align:left; border-left::none;border-left-style:none; border-right:.5pt solid windowtext;'>Proyecto: <?php echo $res_proy['no_proyecto']." ".utf8_decode($res_proy['nombre']); ?></td>
   </tr>
   
   <?php if($_GET['s']!=""){ ?>
   <tr height=10 style='mso-height-source:userset;height:7.5pt'>
 <?php 

	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	
 $resultado_comp = mysql_query("SELECT * FROM componentes WHERE id_proyecto = ".$_GET['p']." and no_componente=".$comp) or die (mysql_error());
$res_comp = mysql_fetch_array($resultado_comp); ?>
  <td  height=10 colspan="8" class=xl197 style='height:22.5pt;border-top:none; text-align:left; border-left::none;border-left-style:none; border-right:.5pt solid windowtext;'>Componente: <?php echo $res_comp['no_componente']." ".utf8_decode($res_comp['descripcion']); ?></td>
  </tr>
    <tr height=10 style='mso-height-source:userset;height:7.5pt'>
 <?php $resultado_accion = mysql_query("SELECT * FROM acciones WHERE id_componente = ".$res_comp['id_componente']) or die (mysql_error());
$res_accion = mysql_fetch_array($resultado_accion); ?>
  <td  height=10 colspan="8" class=xl197 style='height:22.5pt;border-top:none; text-align:left; border-left::none;border-left-style:none; border-right:.5pt solid windowtext;'>Accion: <?php echo $res_accion['no_accion']." ".utf8_decode($res_accion['descripcion']); ?></td>
  </tr>
  <?php }?>
  
  <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 colspan="8" class=xl109 style='height:28.5pt;
  border-top:none;width:53pt'>Resumen de Inversi&oacute;n Asignada a Obras por la Dependencia</td>
  </tr>
 <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 class=xl109 width=3422 style='height:58.5pt;
  border-top:none;width:53pt'>No. de Obra</td>
   <td class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt'>Descripci&oacute;n</td>
   <td class=xl109 width=3422 style='border-top:none;width:74pt'>Partida</td>
   <td class=xl109 width=3422 style='border-top:none;width:117pt'>Origen</td>
   <td class=xl109 width=3422 style='border-top:none;width:59pt'>Aprobaci&oacute;n</td>
   <td class=xl109 width=3422 style='border-top:none;width:75pt'>Ampliaciones</td>
   <td class=xl109 width=3422 style='border-top:none;width:101pt'>Cancelaciones</td>
   <td class=xl109 width=3422 style='border-top:none;width:45pt'>Total</td>

  </tr>
 <?php
 

 
 
 if ($_GET['s']==""){
	 

		  
	$resultado_part = mysql_query("SELECT obras.consxdep, obras.descripcion, poa02_origen.s07c_partid, poa02_origen.s08c_origen, poa02_origen.tipo, obras.id_proyecto,poa02_origen.monto,poa02_origen.id_obra , poa02_origen.s25c_accion,
poa02_origen.s11c_compon FROM poa02_origen INNER JOIN obras ON poa02_origen.id_obra = obras.id_obra
WHERE obras.id_proyecto=".$_GET['p']." and (poa02_origen.s07c_partid BETWEEN 4000 and 4999) or obras.id_proyecto=".$_GET['p']." and  (poa02_origen.s07c_partid BETWEEN 6000 and 6999) group by obras.id_obra,poa02_origen.s07c_partid,poa02_origen.s08c_origen, poa02_origen.s25c_accion order by obras.consxdep asc") or die (mysql_error());

 }elseif($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	 
	 
	// echo "SELECT obras.consxdep, obras.descripcion, poa02_origen.s07c_partid, poa02_origen.s08c_origen, poa02_origen.tipo, obras.id_proyecto,poa02_origen.monto,poa02_origen.id_obra FROM poa02_origen INNER JOIN obras ON poa02_origen.id_obra = obras.id_obra
//WHERE obras.id_proyecto=".$_GET['p']." and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion."  group by poa02_origen.id_obra";
//exit();


	 	$resultado_part = mysql_query("SELECT obras.consxdep, obras.descripcion, poa02_origen.s07c_partid, poa02_origen.s08c_origen, poa02_origen.tipo, obras.id_proyecto,poa02_origen.monto,poa02_origen.id_obra FROM poa02_origen INNER JOIN obras ON poa02_origen.id_obra = obras.id_obra
WHERE obras.id_proyecto=".$_GET['p']." and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and (poa02_origen.s07c_partid BETWEEN 4000 and 4999) or obras.id_proyecto=".$_GET['p']." and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and (poa02_origen.s07c_partid BETWEEN 6000 and 6999) group by obras.id_obra,poa02_origen.s07c_partid,poa02_origen.s08c_origen order by obras.consxdep asc ") or die (mysql_error());
	 }

$ttc=0;
$tt=0;
 


  
		  
		  while($res_par=@mysql_fetch_array($resultado_part)){

$idobraa=$res_par['id_obra'];

if($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	

$resultado_apro = mysql_query("SELECT (poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=0 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  (poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=1 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  (poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=2 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());
	
	
	
}else{	


$resultado_apro = mysql_query("SELECT (poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=0 and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  (poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=1 and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  (poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_obra=".$res_par['id_obra']." and poa02_origen.tipo=2 and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

}

 $res_apro = mysql_fetch_array($resultado_apro);
 
 $res_amp = mysql_fetch_array($resultado_amp);
 
 $res_canc = mysql_fetch_array($resultado_canc);

 $tt=(($res_apro['aprob'])+($res_amp['amp']))-($res_canc['canc']);
		  
		 
  
 ?>
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl140 width=3422 style='height:12.75pt;width:53pt'><?php echo $res_par['consxdep']; ?></td>
  <td class=xl115 width=3422 style='border-left:none;width:53pt'><?php echo utf8_decode($res_par['descripcion']); ?></td>
  <td class=xl140 width=3422 style='border-left:none;width:74pt'><?php echo $res_par['s07c_partid']; ?></td>
  <td class=xl140 width=3422 style='border-left:none;width:117pt'><?php echo $res_par['s08c_origen']; ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:59pt'><?php echo "$".number_format($res_apro['aprob'],2); ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:75pt'><?php echo "$".number_format($res_amp['amp'],2); ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:101pt'><?php echo "$".number_format($res_canc['canc'],2); ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:45pt'><?php echo "$".number_format($tt,2); ?></td>
  </tr>
 
<?php
$ttc=$tt+$ttc;
	 }
?>
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl115 width=3422 style='height:12.75pt;width:53pt'></td>
  <td class=xl115 width=3422 style='border-left:none;width:53pt'></td>
  <td class=xl115 width=3422 style='border-left:none;width:74pt'></td>
  <td class=xl115 width=3422 style='border-left:none;width:117pt'></td>
  <td class=xl115 width=3422 style='border-left:none;width:59pt'></td>
  <td class=xl115 width=3422 style='border-left:none;width:75pt'></td>
  <td class=xl115 width=3422 style='border-left:.5pt solid windowtext;width:101pt'>Total Inversión</td>
  <td class=xl201 width=3422 style='border-left:none;width:45pt'><?php echo "$".number_format($ttc,2)?></td>
  </tr>
  <tr height=17 style='height:12.75pt'>
  <td height=17 5 width=3422 style='height:12.75pt;width:53pt'></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  </tr>
    <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 5 width=3422 style='height:12.75pt;width:53pt'></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  </tr>
  <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 colspan="8" class=xl109 style='height:28.5pt;
  border-top:none;width:53pt'>Resumen de Autorización de Recursos por parte de la SEFIN</td>
  </tr>
 <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 class=xl109 width=3422 style='height:58.5pt;
  border-top:none;width:53pt'> Pres. Asignado</td>
   <td class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt'>Ampliación</td>
   <td class=xl109 width=3422 style='border-top:none;width:74pt'>Transferencia Ampliacion</td>
   <td class=xl109 width=3422 style='border-top:none;width:117pt'>Reducción</td>
   <td class=xl109 width=3422 style='border-top:none;width:59pt'>Transferencia Reducción</td>
   <td class=xl109 width=3422 style='border-top:none;width:75pt'>Partida</td>
   <td class=xl109 width=3422 style='border-top:none;width:101pt'>Origen</td>
   <td class=xl109 width=3422 style='border-top:none;width:45pt'>Presupuesto</td>

  </tr>
 <?php
 
 $idproy=$_GET['p'];
$id_dependencia= $_SESSION['id_dependencia_v3'];
 $sac_proy =mysql_query("SELECT * FROM proyectos WHERE id_proyecto = '$idproy'");// or die (mysql_error());
 $res_proy = mysql_fetch_array($sac_proy);
//echo "SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'";


if($_GET['s']==""){
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'  and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'  and (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc");// or die (mysql_error());

 }elseif($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion'  and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion'  and (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc ");// or die (mysql_error());
}
$totpresp=0;
$presp=0;
	while( $res_par = mysql_fetch_array($consulta_estado_finaciero)) {
//echo $res_par['s07c_partid']."|".$res_par['s08c_origen'];
//$presp=(($res_par['d02p_preasi']+$res_par['d02p_acuamp']+$res_par['d02p_acutam'])-($res_par['d02p_acured']+$res_par['d02p_acutre']));
	
	
if ($_GET['s']!=""){
		  
$consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM obras inner join transferencias on obras.id_obra = transferencias.id_obra
 where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." and obras.id_obra=".$idobraa);
}else{

 $consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM poa02_origen inner join transferencias on poa02_origen.id_obra_origen = transferencias.id_obra_origen
 where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and s25c_accion='".$res_par['s25c_accion'].
"' and s11c_compon='".$res_par['s11c_compon']."' and  s06c_proyec='".$res_par['s06c_proyec']."'	");
//$res_tras = mysql_fetch_array($consulta_tras);

}

$res_tras = mysql_fetch_array($consulta_tras);

$presp+=$res_tras['total'];
		  
$presp=(($res_par['d02p_preasi']+$res_par['d02p_acuamp']+$res_par['d02p_acutam'])-($res_par['d02p_acured']+($res_par['d02p_acutre']-$res_tras['total'])));

		 
  
 ?>
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl201 width=3422 style='height:12.75pt;width:53pt'><?php echo number_format($res_par['d02p_preasi'],2) ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($res_par['d02p_acuamp'],2); ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:74pt'><?php echo number_format($res_par['d02p_acutam'],2); ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:117pt'><?php echo number_format($res_par['d02p_acured'],2); ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:59pt'><?php echo number_format(($res_par['d02p_acutre']-$res_tras['total']),2); ?></td>
  <td class=xl140 width=3422 style='border-left:none;width:75pt'><?php echo $res_par['s07c_partid']; ?></td>
  <td class=xl140 width=3422 style='border-left:none;width:101pt'><?php echo $res_par['s08c_origen']; ?></td>
  <td class=xl201 width=3422 style='border-left:none;width:45pt'><?php echo number_format($presp,2); ?></td>
  </tr>
 
<?php

	$totpresp=$presp+$totpresp;

	}
?>
 <tr class=xl144 height=17 style='height:12.75pt'>
<td  width=3422 ></td>
<td  width=3422 ></td>
<td  width=3422 ></td>
<td  width=3422 ></td>
<td  width=3422 ></td>
<td  width=3422 ></td>
  <td class=xl115 width=3422 style='border-left:.5pt solid windowtext;width:101pt'>Total Presupuesto</td>
  <td class=xl201 width=3422 style='border-left:none;width:45pt'><?php echo number_format($totpresp,2)?></td>
  </tr>
  <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 5 width=3422 style='height:12.75pt;width:53pt'></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  </tr>
    <tr class=xl144 height=17 style='height:12.75pt'>
    <td height=17 5 width=3422 style='height:12.75pt;width:53pt'></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  </tr>
   <tr class=xl144 height=17 style='height:12.75pt'>
 <td  width=3422 ></td>
<td  width=3422 ></td>
<td  width=3422 ></td>
<td  width=3422 ></td>
 <td  width=3422 ></td>
<td  width=3422 ></td>
  <td class=xl115 width=3422 style='border-left:.5pt solid windowtext;width:101pt'>Recurso disponible sin Asignar	</td>
   <td class=xl201 width=3422 style='border-left:.5pt solid windowtext;width:101pt'><?php echo number_format($totpresp-$ttc,2); ?></td>

  </tr>
    <tr class=xl144 height=17 style='height:12.75pt'>
   <td height=17 5 width=3422 style='height:12.75pt;width:53pt'></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  <td  width=3422></td>
  <td  width=3422 ></td>
  </tr>
  <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 colspan="8" class=xl109 style='height:28.5pt;
  border-top:none;width:53pt'>Resumen del Presupuesto</td>
  </tr>
 <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 class=xl109 width=3422 style='height:58.5pt;
  border-top:none;width:53pt'>Partida</td>
   <td class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt'>Origen</td>
   <td colspan="2" class=xl109 width=3422 style='border-top:none;width:74pt'>Total Presupuesto</td>
   <td colspan="2" class=xl109 width=3422 style='border-top:none;width:117pt'>Total Asig. a obras x Dep</td>
   <td colspan="2" class=xl109 width=3422 style='border-top:none;width:59pt'>Disponible</td>
 

  </tr>
 <?php
 

 if($_GET['s']==""){
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'  and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or  s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."'  and  (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc");// or die (mysql_error());

 }elseif($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	
$consulta_estado_finaciero =mysql_query("SELECT * FROM estados_financieros WHERE s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion'  and  (estados_financieros.s07c_partid BETWEEN 4000 and 4999) or  s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion'  and s02c_depend = '$id_dependencia' AND s06c_proyec = '".$res_proy['no_proyecto']."' AND s11c_compon = '$comp' AND s25c_accion= '$accion'  and  (estados_financieros.s07c_partid BETWEEN 6000 and 6999) order by estados_financieros.s07c_partid asc");// or die (mysql_error());
}

$totpresp=0;
$presp=0;
	while( $res_par = mysql_fetch_array($consulta_estado_finaciero)) {
//echo $res_par['s07c_partid']."|".$res_par['s08c_origen'];
$presp=(($res_par['d02p_preasi']+$res_par['d02p_acuamp']+$res_par['d02p_acutam'])-($res_par['d02p_acured']+$res_par['d02p_acutre']));

//echo $res_par['id_obra'];
if ($_GET['s']!=""){
$consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM obras inner join transferencias on obras.id_obra = transferencias.id_obra
 where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and obras.id_dependencia=".$id_dependencia." and obras.id_obra=".$idobraa);
}else{

 $consulta_tras =mysql_query("SELECT  SUM( transferencias.monto ) AS total FROM poa02_origen inner join transferencias on poa02_origen.id_obra_origen = transferencias.id_obra_origen
 where partida_org='".$res_par['s07c_partid']."' and org_org='".$res_par['s08c_origen']."' and transferencias.id_proyecto='$idproy' and s25c_accion='".$res_par['s25c_accion'].
"' and s11c_compon='".$res_par['s11c_compon']."' and  s06c_proyec='".$res_par['s06c_proyec']."'	");
//$res_tras = mysql_fetch_array($consulta_tras);


}


$res_tras = mysql_fetch_array($consulta_tras);

$presp+=$res_tras['total'];

	//$pdf->Row(array("$".number_format($res_par['d02p_preasi'],2),"$".number_format($res_par['d02p_acuamp'],2),"$".number_format($res_par['d02p_acutam'],2),"$".number_format($res_par['d02p_acured'],2),"$".number_format($res_par['d02p_acutre'],2),$res_par['s07c_partid'],$res_par['s08c_origen'],"$".number_format($presp,2) ));
	$totpresp=$presp+$totpresp;
	if($_GET['s']!=""){
	 	$compacc = explode("-", $_GET['s']);
	$comp = $compacc[0];
	$accion = $compacc[1];
	

$resultado_apro = mysql_query("SELECT sum(poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' AND poa02_origen.s11c_compon = '$comp' AND poa02_origen.s25c_accion= '$accion' and poa02_origen.tipo=0 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen'] ) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  sum(poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=1 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  sum(poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=2 and poa02_origen.s11c_compon=".$comp." and poa02_origen.s25c_accion=".$accion." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());
	
	
	
}else{	
$resultado_apro = mysql_query("SELECT sum(poa02_origen.monto) as aprob  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=0 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']." and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_amp = mysql_query("SELECT  sum(poa02_origen.monto) as amp  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."' and poa02_origen.tipo=1 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']." and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

$resultado_canc = mysql_query("SELECT  sum(poa02_origen.monto) as canc  FROM poa02_origen WHERE poa02_origen.id_proyecto = '".$_GET['p']."'	 and poa02_origen.tipo=2 and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']." and poa02_origen.s11c_compon=".$res_par['s11c_compon']." and poa02_origen.s25c_accion=".$res_par['s25c_accion']." and poa02_origen.s07c_partid=".$res_par['s07c_partid']." and poa02_origen.s08c_origen=".$res_par['s08c_origen']) or die (mysql_error());

}



 $res_apro = mysql_fetch_array($resultado_apro);
 
 
 $res_amp = mysql_fetch_array($resultado_amp);
 
 
 $res_canc = mysql_fetch_array($resultado_canc);

 $tt=(($res_apro['aprob'])+($res_amp['amp']))-($res_canc['canc']);

	

	

	
 
		  
		 
  
 ?>
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl140 width=3422 style='height:12.75pt;width:53pt'><?php echo $res_par['s07c_partid']; ?></td>
  <td class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo $res_par['s08c_origen']; ?></td>
  <td  colspan="2" class=xl201 width=3422 style='border-left:none;width:75pt'><?php echo number_format($presp,2); ?></td>
  <td  colspan="2" class=xl201 width=3422 style='border-left:none;width:101pt'><?php echo number_format($tt,2); ?></td>
  <td  colspan="2" class=xl201 width=3422 style='border-left:none;width:45pt'><?php echo number_format($presp-$tt,2); ?></td>
  </tr>
 
<?php
$tt=0;
	}
?>
 

  
 
 
 
</table>

</body>

</html>

<?php }?>

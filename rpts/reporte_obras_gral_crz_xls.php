<?php session_start(); 
$mp=$_GET['mp'];
$ap=$_GET['ap'];
$dp=$_GET['dep'];
$reg=$_GET['reg'];



header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Resumen_de_Inversión_por_obras.xls");
header("Pragma: no-cache");
header("Expires: 0");

if ( $mp!="" and $mp!="0" and $_SESSION['id_dependencia_v3']!=""){
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
	text-align:left;
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

<table border=0 cellpadding=0 cellspacing=0 width=auto style='border-collapse:
 collapse;table-layout:fixed;width:578pt'>
 
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
    <td colspan=20 height=30 class=xl206 width=3422 style='border-right:.5pt solid black;
    height:22.5pt;width:578pt'><a name="Print_Area">GOBIERNO DEL ESTADO DE
    ZACATECAS</a></td>
   </tr>
 

 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=20 height=30 class=xl203 style='border-right:.5pt solid black;
  height:22.5pt'>COORDINACIÓN ESTATAL DE PLANEACIÓN</td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=20 height=30 class=xl138 style='border-right:.5pt solid black;
   <?php 


?>
  height:22.5pt'>Resumen de Inversión <?php if ($ap==1){echo "Aprobada";}else{ echo "Programada";}  ?> </td>
 </tr> 
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td colspan=20  height=17 5 width=3422 style='border-right:.5pt solid black;height:12.75pt;width:53pt'></td>
  </tr> <tr class=xl144 height=17 style='height:12.75pt'>
  <td colspan=20  height=17 5 width=3422 style='border-right:.5pt solid black;height:12.75pt;width:53pt'></td>
   </tr>
  
  <?php if ($dp!="mun"){?>
   <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 colspan="20" class=xl109 style='border-right:.5pt solid black;height:28.5pt;
   <?php
   $resultado_dep = mysql_query("SELECT * FROM dependencias WHERE acronimo = '".$_GET['dep']."'");// or die (mysql_error());
$res_dep = mysql_fetch_array($resultado_dep);

   ?>
  border-top:none;width:53pt'>Dependencia: <?php echo utf8_decode($res_dep['nombre']); ?></td>
  </tr>
 <?php }?>
  <?php if ($mp!=""){?>
   <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
   <td height=118 colspan="20" class=xl109 style='border-right:.5pt solid black;height:28.5pt;
   <?php
$resultado_sec = mysql_query("SELECT * FROM municipios WHERE id_municipio = ".$_GET['mp']);// or die (mysql_error());
$res_sec = mysql_fetch_array($resultado_sec);

   ?>
  border-top:none;width:53pt'>Municipio: <?php echo $res_sec['id_municipio']." ".$res_sec['nombre']; ?></td>
  </tr>
   <?php }?>
  <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt'  rowspan="2" width="auto"><b>SECTOR</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' rowspan="2" width="auto"><b>DEP. </b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' rowspan="2" width="auto"><b>FONDO O MOD. DE INV.</b></td>
     <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' rowspan="2" width="auto"><b>PROG.</b></td>
      <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' rowspan="2" width="auto"><b>SUBPROG.</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' rowspan="2" width="auto"><b>DESCRIPCIÓN</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' rowspan="2" width="auto"><b>MUN.</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' rowspan="2" width="auto"><b>LOC.</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' colspan="7" align="center" width="auto"><b>INVERSIÓN TOTAL <?php if ($ap==1){echo "APROBADA";}else{ echo "PROGRAMADA";}  ?></b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' colspan="2" align="center" width="auto"><b>METAS TOTALES</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' colspan="2" align="center" width="auto"><b>BENEF.</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="80"><b>PED</b></td>
   
  </tr>
  <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>Total</b></td>
    <td class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>Federal</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>Estatal</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>Municipal</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>Partic.</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>Créditos</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>Otros</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>MEDIDA</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>PROG.</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>H</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>M</b></td>
    <td  class=xl202 width=3422 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt' width="auto"><b>E/L/E</b></td>
   
  </tr>
 
 
  <?php
  $tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	$cp=0;

	  
	  if ($ap=='1' and $dp!="mun" and $reg==""){
	  	  $con_o="SELECT obras.id_obra,  obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where  `dependencias`.`acronimo` = '".$_GET['dep']."'  AND `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` = '4'
	  	     AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2  and obras.prgs like '0%'
	  	   GROUP BY `poa02_origen`.`id_obra` ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";
	  	   
 	  	  
	  }elseif($ap=='1' and $dp=="mun") {
	  	
	  	 $con_o="SELECT obras.id_obra, obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
localidades.id_marginacion,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where  `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` = '4'
	  	     AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2  and obras.prgs like '0%'
	  	   GROUP BY `poa02_origen`.`id_obra` ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";
	  	    
	  	    
	  	   /* *** */
	  
	  
	  	}elseif($ap=='' and $dp=="mun") {
	  		
	  	 $con_o="SELECT obras.id_obra, obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where  `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` >= 3  and obras.prgs like '0%'
	   ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC ";
	
	  		}
	  		
	  		
elseif($ap=='' and $dp!="mun" and $dp!="reg" and $reg!="") {
	  		
	   $con_o="SELECT obras.id_obra, obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where dependencias.acronimo = '".$_GET['dep']."' AND regiones.id_region = ".$_GET['reg']." AND obras.status_obra >= 3  and obras.prgs like '0%'
	  	 ORDER BY dependencias.id_dependencia ASC, proyectos.no_proyecto ASC, obras.id_obra ASC";
	   
	
	  		}	 
	  		
	  		elseif($ap=='' and $dp=="reg" and $reg!="") {
	  		
	     $con_o="SELECT  obras.id_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_marginacion,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where regiones.id_region = ".$_GET['reg']." AND obras.status_obra >= 3  and obras.prgs like '0%'
	  	 ORDER BY dependencias.id_dependencia ASC, proyectos.no_proyecto ASC, obras.id_obra ASC";
	   

	
	  		}	  	
	  		
	  		elseif($ap=='1' and $dp!="mun" and $dp!="reg" and $reg!="") {
	  		  $con_o="SELECT obras.id_obra, obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
localidades.id_marginacion,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where `dependencias`.`acronimo` = '".$_GET['dep']."' AND `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  		 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999    and obras.prgs like '0%'
          OR   `dependencias`.`acronimo` = '".$_GET['dep']."' AND `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  		 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999    and obras.prgs like '0%'
          group by obras.id_obra
	  		 ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";
	  		 
	 
	  		}
	  		
	  		elseif($ap=='1' and $dp!="mun" and $dp=="reg" and $reg!="") {
	  			  $con_o="SELECT obras.id_obra,obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
localidades.id_marginacion,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999  and obras.prgs like '0%'
               OR    `regiones`.`id_region` = ".$_GET['reg']." AND `obras`.`status_obra` = '4' AND `poa02_origen`.`status_of` = 2 AND `poa02_origen`.`id_oficio` != 0 
  		           AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999	  and obras.prgs like '0%'
               group by obras.id_obra	   
	  			  ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";
	  			  
	  			  
	  
	  			
	  		}
	  	else {
	  			  
	   $con_o="SELECT  obras.id_obra, obras.prgs,
obras.obra,
(obras.descripcion) as nom_obra,
obras.prioridad,
(dependencias.acronimo) as nom_dep,
proyectos.no_proyecto,
(proyectos.nombre) as nom_proy,
(componentes.descripcion) as nom_com,
componentes.no_componente,
eje.eje,
(linea.nombre) as nom_linea,
(estrategias.nombre) as nom_estr,
componentes.descripcion,
(acciones.descripcion)as nom_act,
acciones.no_accion,
(origen.c08c_tipori) as nom_origen,
origen.s08c_origen,
(municipios.nombre) as nom_mun,
municipios.id_municipio,
(regiones.nombre) as nom_reg,
regiones.id_region,
(localidades.nombre) as nom_loc,
localidades.id_finanzas,
localidades.id_marginacion,
(unidad_medida_prog02.descripcion) as nom_med,
obras.modalidad,
obras.retencion,
obras.ben_h,
obras.ben_m,
obras.cantidad,
obras.fecha_inicio,
obras.fecha_fin,
(programas_poa.clave) as prgcv,
(programas_poa.descripcion) as prgdsc,
(subprogramas_poa.clave) as subprgcv,
(subprogramas_poa.descripcion) as subdsc,
obras.federal,
obras.estatal,
obras.municipal,
obras.participantes,
obras.credito,
obras.otros,
sectores.sector,
sectores.id_sector,
obras.latitud,
obras.longitud
FROM
obras
INNER JOIN dependencias ON obras.id_dependencia = dependencias.id_dependencia
INNER JOIN proyectos ON obras.id_proyecto = proyectos.id_proyecto
INNER JOIN eje ON proyectos.id_eje = eje.id_eje
INNER JOIN linea ON proyectos.id_linea = linea.id_linea
INNER JOIN estrategias ON proyectos.id_estrategia = estrategias.id_estrategia
INNER JOIN componentes ON obras.id_componente = componentes.id_componente
INNER JOIN acciones ON acciones.id_accion = obras.id_actividad
INNER JOIN origen ON obras.origen = origen.s08c_origen
INNER JOIN municipios ON obras.municipio = municipios.id_municipio
INNER JOIN regiones ON municipios.id_region = regiones.id_region
INNER JOIN localidades ON obras.municipio = localidades.id_municipio AND obras.localidad = localidades.id_finanzas
INNER JOIN unidad_medida_prog02 ON obras.u_medida = unidad_medida_prog02.id_unidad
INNER JOIN programas_poa ON obras.programa_poa = programas_poa.id_programa_poa
INNER JOIN subprogramas_poa ON obras.subprograma_poa = subprogramas_poa.id_subprograma_poa
INNER JOIN sectores ON dependencias.id_sector = sectores.id_sector
 where `dependencias`.`acronimo` = '".$_GET['dep']."' AND `obras`.`municipio` = ".$_GET['mp']." AND `obras`.`status_obra` >= 3   and obras.prgs like '0%'
	   ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC";
		  }
	  
	 
	
   
  
  $i=0;
  $tt=0;
	$fd=0;
	$st=0;
	$mn=0;
	$pt=0;
	$cr=0;
	$ot=0;
	function grado($gra){
		switch ($gra){
			
			case "1":
			return ("Muy Bajo");
			break;
			case "2":
			return ("Bajo");
			break;
			case "3":
			return ("Medio");
			break;
			case "4":
			return ("Alto");
			break;
			case "5":
			return ("Muy Alto");
			break;
			}
	}
	$consulta_obr=mysql_query($con_o) or die (mysql_error()); //,$siplan_data_conn
//	echo var_dump($consulta_obr);
		
	    while ($resobr = mysql_fetch_assoc($consulta_obr)) {
	  //sumar aporte programados
	  
	  $suma_prg=$resobr['federal']+$resobr['estatal']+$resobr['municipal']+$resobr['participantes']+$resobr['credito']+$resobr['otros'];
 	$totalp= number_format($suma_prg,2);
 

 //termina suamr aportes programasdos
 $PED=substr($resobr['nom_estr'],0,6);
 
// switch ($resobr['status_obra']){
		/*   case 1:
		   $status = "Sin Aprobar";
		   $css_color = "gradeX";
		   break;
		   case 2:
		   $status = "Aprob. Dependencia";
		   $css_color = "gradeB";
		   break;
		   case 3:
		   $status = "Aprob. UPLA";*/
		   if ($i%2==0){
		   $css_color = "gradeA even";
		  // break;   
		//    case 4:
		//   $status = "Con Oficio de Ejec.";
		   }else{
		   $css_color = "gradeA odd";
		   }
		//   break; 
	//   }
	
  $con_fondo="select HIGH_PRIORITY origen.c08c_tipori,origen.s08c_origen, poa02_origen.id_obra, poa02_origen.s08c_origen, poa02_origen.id_obra_origen   

				from poa02_origen inner join origen on poa02_origen.s08c_origen=origen.s08c_origen 

				where poa02_origen.id_obra=".$resobr['id_obra']." and  poa02_origen.s07c_partid BETWEEN 4000 AND 4999 and  poa02_origen.status_of = 2 AND poa02_origen.id_oficio != 0 

				or 	

				poa02_origen.id_obra=".$resobr['id_obra']." and  poa02_origen.s07c_partid BETWEEN 6000 AND 6999 and poa02_origen.status_of = 2 AND poa02_origen.id_oficio != 0 

				group by poa02_origen.s08c_origen 

				order by poa02_origen.id_obra_origen";

	

       $consulta_fondo=mysql_query($con_fondo) or die (mysql_error()); 

		$fondo="";

	    while ($re_fondo = mysql_fetch_assoc($consulta_fondo)) {

		$fondo.=$re_fondo['c08c_tipori'].", ";

		}

		$fondo=substr($fondo,0,(strlen($fondo)-2));



  ?>
  
  <tr  class=xl144 height=17 style='height:12.75pt' >
   <td class=xl140 width=3422 style='height:12.75pt;width:53pt'><?php echo utf8_decode($resobr['sector']); ?></td> 
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt' ><?php echo ($resobr['nom_dep']); ?></td>
	<td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php if($ap==1){

	 echo  $fondo; } else { echo $resobr['nom_origen'];}   ?></td>
	<td class=xl140 width=3422 style='border-left:none;width:74pt'><?php echo utf8_decode($resobr['prgcv']." ".$resobr['prgdsc']);?></td>
	<td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo utf8_decode($resobr['subprgcv'].", ".$resobr['subdsc']);?></td>
	
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo utf8_decode($resobr['nom_obra']);?></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo utf8_decode($resobr['nom_mun']);?></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo utf8_decode($resobr['nom_loc']);?></td>

   
   <?php if ($ap==1) {
	   
	  
	  

	   $sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen"); 
	
	
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
	

	if ($orige_n=="2103"){
		 $estatal= $estatal + $res_aporte_eje['sumamonto'];
		}elseif($orige_n=="3102"){

			 $particip= $particip + $res_aporte_eje['sumamonto'];

			}
		else{ 	 
		
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
	

	////termina ejecuciones***
	
	

	
	
		$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen");
	
	  $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{ 
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);
	  
	  
	if ($orige_n=="2103"){
		 $estatal= $estatal + $res_aporte_amp['sumamonto'];
		}elseif($orige_n=="3102"){

			 $particip= $particip + $res_aporte_amp['sumamonto'];

			}

		else{
		
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
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$resobr['id_obra']." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen");
	
	
	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{ 
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);
	 	

	if ($orige_n=="2103"){
		 $estatal= $estatal - $res_aporte_can['sumamonto'];
		}elseif($orige_n=="3102"){

			 $particip= $particip - $res_aporte_can['sumamonto'];

			}

		else{ 
		
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
	$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;
	   
	   ?>
   
   
   
   
   
       <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo   number_format($totals,2);?></td>
     <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($federal,2);?></td>
    <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($estatal,2);?></td>
     <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($municipal,2);?></td>
      <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($particip,2);?></td>
       <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($credito,2);?></td>
        <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($otros,2);?></td>
   <?php } else { ?>
       <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo $totalp;?></td>
  <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['federal'],2);?></td>
    <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['estatal'],2);?></td>
     <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['municipal'],2);?></td>
      <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['participantes'],2);?></td>
       <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['credito'],2);?></td>
        <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format( $resobr['otros'],2);?></td>
   <?php }  ?>
  
      
         <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo utf8_decode($resobr['nom_med']);?></td>
  <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['cantidad']);?></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['ben_h']);?></td>
      <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo number_format($resobr['ben_m']);?></td>
        <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'><?php echo $PED; ?></td>      
         
    

	
	
 </tr>  
    <?php $i++;
	
	 if ($ap==1){
	$tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	}
	
	else{
		
		$tt=$tt+$suma_prg;
	$fd=$fd+$resobr['federal'];
	$st=$st+$resobr['estatal'];
	$mn=$mn+$resobr['municipal'];
	$pt=$pt+$resobr['participantes'];
	$cr=$cr+$resobr['credito'];
	$ot=$ot+$resobr['otros'];
		
		}
	 }  
	 	//cerrar conexion */
	
	 mysql_close($siplan_data_conn);
	  if ($css_color!="gradeA even"){
		   $css_color = "gradeA even";
		  // break;   
		//    case 4:
		//   $status = "Con Oficio de Ejec.";
		   }else{
		   $css_color = "gradeA odd";
		   }?>
    
    <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt' >
   <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td> 
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
	<td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
      <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'>Total</td>
    <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($tt,2);?></td>
    <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($fd,2);?></td>
    <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($st,2);?></td>
     <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($mn,2);?></td>
      <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($pt,2);?></td>
       <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format($cr,2);?></td>
        <td height=17 class=xl201 width=3422 style='border-left:none;width:53pt'><?php echo number_format( $ot,2);?></td>
         <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
  <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
    <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
      <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>
        <td height=17 class=xl140 width=3422 style='border-left:none;width:53pt'></td>   
                  
 
 
 
 
 

  </tr>
 
</table>

</body>

</html>

<?php }?>

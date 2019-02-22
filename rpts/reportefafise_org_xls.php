<?php 

header('Content-type: application/vnd.ms-excel;');
header("Content-Disposition: attachment; filename=reporte_por_origen.xls");
header("Pragma: no-cache");
header("Expires: 0");
session_start();
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
	vertical-align:middle;
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
	.xl66
		
	{mso-style-parent:style0;
	font-size:8.0pt;
	font-family:"Arial Narrow", sans-serif;
	mso-font-charset:0;
	mso-number-format:"\0022$\0022\#\,\#\#0\.00";
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

<table border=0 cellpadding=0 cellspacing=0 width=3422 style='border-collapse:
 collapse;table-layout:fixed;width:2578pt'>
 
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=39 height=30 width=3422 style='border-right:.5pt solid black;
  height:22.5pt;width:2578pt' align=left valign=top><![if !vml]><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=39 height=30 class=xl206 width=3422 style='border-right:.5pt solid black;
    height:22.5pt;width:2578pt'><a name="Print_Area">GOBIERNO DEL ESTADO DE
    ZACATECAS</a></td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=39 height=30 class=xl203 style='border-right:.5pt solid black;
  height:22.5pt'>COORDINACIÓN ESTATAL DE PLANEACIÓN</td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=39 height=30 class=xl138 style='border-right:.5pt solid black;
  height:22.5pt'>Avance Físico - Financiero 2018</td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl138 style='height:7.5pt'>&nbsp;</td>
  <td colspan=37 class=xl139 style='mso-ignore:colspan'></td>
  <td class=xl196>&nbsp;</td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td height=30 class=xl197 style='height:22.5pt'>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl199 width=134 style='width:101pt'>&nbsp;</td>
  <td class=xl199 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl199 width=100 style='width:75pt'>&nbsp;</td>
  <td class=xl199 width=60 style='width:45pt'>&nbsp;</td>
  <td class=xl199 width=100 style='width:75pt'>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl198>&nbsp;</td>
  <td class=xl200></td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl77 style='height:7.5pt;border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl75 width=134 style='border-top:none;width:101pt'>&nbsp;</td>
  <td class=xl75 width=60 style='border-top:none;width:45pt'>&nbsp;</td>
  <td class=xl75 width=100 style='border-top:none;width:75pt'>&nbsp;</td>
  <td class=xl75 width=60 style='border-top:none;width:45pt'>&nbsp;</td>
  <td class=xl75 width=100 style='border-top:none;width:75pt'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl79 style='border-top:none'>&nbsp;</td>
  <td class=xl80 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
  <td class=xl82 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
  <td class=xl81 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr class=xl110 height=38 style='mso-height-source:userset;height:28.5pt'>
  <td rowspan=3 height=118 class=xl109 width=3422 style='height:88.5pt;
  border-top:none;width:53pt'>SECTOR</td>
  <td rowspan=3 class=xl202 width=70 style='border-bottom:1.0pt solid black;
  border-top:none;width:53pt'>REGIÓN</td>
  <td rowspan=3 class=xl109 width=98 style='border-top:none;width:74pt'>DEPENDENCIA</td>
  <td rowspan=3 class=xl109 width=156 style='border-top:none;width:117pt'>FONDO
  O MODALIDAD DE INVERSIÓN</td>
  <td rowspan=3 class=xl109 width=79 style='border-top:none;width:59pt'>PROGRAMA</td>
  <td rowspan=3 class=xl109 width=100 style='border-top:none;width:75pt'>SUBPROGRAMA</td>
  <td rowspan=3 class=xl109 width=134 style='border-top:none;width:101pt'>DESCRIPCIÓN
  DE LA OBRA O ACCIÓN</td>
  <td rowspan=3 class=xl109 width=60 style='border-top:none;width:45pt'>CLAVE
  DEL MPIO.</td>
  <td rowspan=3 class=xl109 width=100 style='border-top:none;width:75pt'>MUNICIPIO</td>
  <td rowspan=3 class=xl109 width=60 style='border-top:none;width:45pt'>CLAVE
  DE LOC.</td>
  <td rowspan=3 class=xl109 width=100 style='border-top:none;width:75pt'>LOCALIDAD</td>
  <td rowspan=3 class=xl109 width=90 style='border-top:none;width:68pt'>NÚMERO
  DE OBRA O ACCIÓN</td>
  <td rowspan=3 class=xl109 width=90 style='border-top:none;width:68pt'>NÚMERO DE OFICIOS</td>
  <td colspan=2 class=xl213 style='border-left:none'>FECHA DE:<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=9 class=xl214 style='border-left:none'>ESTRUCTURA FINANCIERA 2018
  (PESOS) APROBADA</td>
  <td colspan=7 class=xl214 style='border-left:none'>ESTRUCTURA FINANCIERA 2018
  (PESOS) EJERCIDA</td>
  <td colspan=2 class=xl214 style='border-left:none'>AVANCE %</td>
  <td colspan=3 class=xl109 width=206 style='border-left:none;width:155pt'>METAS
  TOTALES</td>
  <td colspan=2 class=xl109 width=120 style='border-left:none;width:90pt'>BENEFICIARIOS</td>
  <td class=xl109 width=95 style='border-top:none;border-left:none;width:71pt'>PED</td>
  <td rowspan=3 class=xl109 width=60 style='border-top:none;width:45pt'>NUMERO
  DEL PROYECTO</td>
  <td rowspan=3 class=xl109 width=174 style='border-top:none;width:131pt'>OBSERVACIONES</td>
 </tr>
 <tr class=xl110 height=47 style='mso-height-source:userset;height:35.25pt'>
  <td rowspan=2 height=80 class=xl209 width=70 style='height:60.0pt;border-top:
  none;width:53pt'>INICIO<span style='mso-spacerun:yes'>  </span><font
  class="font28">MMM-AAAA</font></td>
  <td rowspan=2 class=xl209 width=70 style='border-top:none;width:53pt'>TÉRMINO
  <font class="font28">MMM-AAAA</font></td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>TOTAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>FEDERAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>ESTATAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>MUNICIPAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>PARTICIPANTES</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>CRÉDITO</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>OTROS</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>AMPLIACI&Oacute;N</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>CANCELACI&Oacute;N</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>TOTAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>FEDERAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>ESTATAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>MUNICIPAL</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>PARTICIPANTES</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>CRÉDITO</td>
  <td rowspan=2 class=xl109 width=90 style='border-top:none;width:68pt'>OTROS</td>
  <td rowspan=2 class=xl215 width=80 style='border-bottom:1.0pt solid black;
  border-top:none;width:60pt'>FINANCIERO</td>
  <td rowspan=2 class=xl215 width=80 style='border-bottom:1.0pt solid black;
  border-top:none;width:60pt'>FÍSICO</td>
  <td rowspan=2 class=xl109 width=206 style='border-top:none;width:65pt'>UNIDAD
  DE MEDIDA</td>
  <td rowspan=2 class=xl109 width=60 style='border-top:none;width:45pt'>PROGRAMADAS</td>
  <td rowspan=2 class=xl109 width=60 style='border-top:none;width:45pt'>ALCANZADAS</td>
  <td rowspan=2 class=xl109 width=120 style='border-top:none;width:45pt'>HOMBRES</td>
  <td rowspan=2 class=xl109 width=60 style='border-top:none;width:45pt'>MUJERES</td>
  <td rowspan=2 class=xl109 width=95 style='border-top:none;width:71pt'>EJE.
  LÍNEA ESTRATÉGICA. ESTRATEGIA</td>
 </tr>
 <tr class=xl110 height=33 style='mso-height-source:userset;height:24.75pt'>
 </tr>
 <?php
 

 
 
     $dep=$_POST['dependencia'];
     $sec=$_POST['Sector'];
	 $reg=$_POST['Region'];
	 $eje=$_POST['Eje'];
	 $org=$_POST['origen'];

	$query2="";
	if ($org!="" and $org!=0){
		$query2=" and poa02_origen.s08c_origen=".$org;
		}else{
			$query2="";
			}
	
	
	
		//dependencias
  if ($dep!="0" and $dep!=""  ){
 $query=" and dependencias.id_dependencia=".$dep;

if ($sec!="0" and $sec!="" ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0" and $reg!=""  ){
$query.=" and municipios.id_region=".$reg;
}
	if ($eje!="0" and $eje!=""  ){
$query.=" and proyectos.id_eje=".$eje;
}
if ($org!="0" and $org!=""  ){
$query.=" and poa02_origen.s08c_origen=".$org;
}


}



	//sectores
if ($sec!="0" and $sec!=""  ){
 $query=" and dependencias.id_sector=".$sec;

if ($dep!="0" and $dep!=""  ){
$query.=" and dependencias.id_dependencia=".$dep;
}
	if ($reg!="0" and $reg!=""  ){
$query.=" and municipios.id_region=".$reg;
}
	if ($eje!="0" and $eje!=""  ){
$query.=" and proyectos.id_eje=".$eje;
}

if ($org!="0" and $org!=""  ){
$query.=" and poa02_origen.s08c_origen=".$org;
} 
	}


	//regiones
if ($reg!="0" and $reg!="" ){
 $query=" and municipios.id_region=".$reg;

if ($sec!="0" and $sec!=""  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($dep!="0" and $dep!="" ){
$query.=" and dependencias.id_dependencia=".$dep;
}
	if ($eje!="0" and $eje!=""  ){
$query.=" and proyectos.id_eje=".$eje;
}

if ($org!="0" and $org!=""  ){
$query.=" and poa02_origen.s08c_origen=".$org;
} 
}


	//eje acuerdos
if ($eje!="0" and $eje!="" ){
 $query=" and proyectos.id_eje=".$eje;

if ($sec!="0" and $sec!=""  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0" and $reg!=""  ){
$query.=" and municipios.id_region=".$reg;
}
	if ($dep!="0" and $dep!=""  ){
$query.=" and dependencias.id_dependencia=".$dep;
}

if ($org!="0" and $org!=""  ){
$query.=" and poa02_origen.s08c_origen=".$org;
} 
	}
	
	
		//origens
if ($org!="0" and $org!="" ){
	$query=" and poa02_origen.s08c_origen=".$org;


if ($sec!="0" and $sec!=""  ){
$query.=" and dependencias.id_sector=".$sec;
}
	if ($reg!="0" and $reg!=""  ){
$query.=" and municipios.id_region=".$reg;
}
	if ($dep!="0" and $dep!=""  ){
$query.=" and dependencias.id_dependencia=".$dep;
}

if ($eje!="0" and $eje!=""  ){
 $query.=" and proyectos.id_eje=".$eje;
} 
	}


 $consulta_origenes="SELECT
dependencias.id_dependencia,
dependencias.id_sector,
dependencias.acronimo,
poa02_origen.monto,
poa02_origen.s08c_origen,
poa02_origen.tipo,
poa02_origen.id_oficio,
poa02_origen.status_of,
obras.id_obra,
obras.municipio,
obras.localidad,
obras.obra,
obras.ben_h,
obras.ben_m,
obras.programa_poa,
obras.subprograma_poa,
obras.descripcion,
obras.fecha_inicio,
obras.fecha_fin,
obras.u_medida,
(obras.cantidad) as cant_pro,
municipios.nombre,
municipios.id_region,
proyectos.id_eje,
proyectos.id_estrategia,
proyectos.no_proyecto
FROM
dependencias
INNER JOIN obras ON dependencias.id_dependencia = obras.id_dependencia
INNER JOIN proyectos ON proyectos.id_proyecto = obras.id_proyecto
INNER JOIN poa02_origen ON obras.id_obra = poa02_origen.id_obra
INNER JOIN municipios ON municipios.id_municipio = obras.municipio where
poa02_origen.id_oficio != 0 
AND poa02_origen.status_of = 2 
AND poa02_origen.tipo = 0  ".$query."
GROUP BY obras.id_obra ORDER BY obras.municipio ASC, obras.localidad ASC";


	// echo "SELECT *,(obras.cantidad) as cant_pro FROM oficio_aprobacion INNER JOIN ((sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON dependencias.id_dependencia = proyectos.id_dependencia) INNER JOIN obras ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = obras.id_dependencia)) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) INNER JOIN detalle_oficio ON (proyectos.id_proyecto = detalle_oficio.id_proyecto) AND (obras.id_obra = detalle_oficio.id_poa02)) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio WHERE obras.status_obra ='4' AND oficio_aprobacion.tipo=0 AND oficio_aprobacion.no_oficio !='' ".$query." GROUP BY detalle_oficio.id_detalle_of ORDER BY dependencias.id_dependencia, proyectos.no_proyecto, obras.obra";
		      
		    //  echo "SELECT *,(obras.cantidad) as cant_pro FROM oficio_aprobacion INNER JOIN ((sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON dependencias.id_dependencia = proyectos.id_dependencia) INNER JOIN obras ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = obras.id_dependencia)) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) INNER JOIN detalle_oficio ON (proyectos.id_proyecto = detalle_oficio.id_proyecto) AND (obras.id_obra = detalle_oficio.id_poa02)) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio WHERE obras.status_obra ='4' AND oficio_aprobacion.tipo=0 AND oficio_aprobacion.no_oficio !='' ".$query." GROUP BY detalle_oficio.id_detalle_of ORDER BY dependencias.id_dependencia, proyectos.no_proyecto, obras.obra";
	  //$consulta_obras = mysql_query("SELECT *,(obras.cantidad) as cant_pro FROM oficio_aprobacion INNER JOIN ((sectores INNER JOIN (regiones INNER JOIN (municipios INNER JOIN ((dependencias INNER JOIN (eje INNER JOIN proyectos ON eje.id_eje = proyectos.id_eje) ON dependencias.id_dependencia = proyectos.id_dependencia) INNER JOIN obras ON (proyectos.id_proyecto = obras.id_proyecto) AND (dependencias.id_dependencia = obras.id_dependencia)) ON municipios.id_municipio = obras.municipio) ON regiones.id_region = municipios.id_region) ON sectores.id_sector = dependencias.id_sector) INNER JOIN detalle_oficio ON (proyectos.id_proyecto = detalle_oficio.id_proyecto) AND (obras.id_obra = detalle_oficio.id_poa02)) ON oficio_aprobacion.id_oficio = detalle_oficio.id_oficio WHERE obras.status_obra ='4' AND oficio_aprobacion.tipo=0 AND oficio_aprobacion.no_oficio !='' ".$query." GROUP BY detalle_oficio.id_detalle_of ORDER BY dependencias.id_dependencia, proyectos.no_proyecto, obras.obra",$siplan_data_conn) ; 
	   /*ELECT `localidades`.`id_marginacion`, `obras`.`programa_poa`, `obras`.`subprograma_poa`, `obras`.`id_obra`, `obras`.`descripcion` AS `nom_obra`, `sectores`.`sector`, `dependencias`.`acronimo` AS `nom_dep`, `origen`.`c08c_tipori` AS `nom_origen`, `municipios`.`nombre` AS `nom_mun`, `localidades`.`nombre` AS `nom_loc`, `aportes`.`federal`, `aportes`.`estatal`, `aportes`.`municipal`, `aportes`.`participantes`, `aportes`.`credito`, `aportes`.`otros`, `unidad_medida_prog02`.`descripcion` AS `nom_med`, `obras`.`cantidad`, `obras`.`ben_h`, `obras`.`ben_m`, `estrategias`.`nombre` AS `nom_estr`, `dependencias`.`id_dependencia`, `proyectos`.`no_proyecto`, `subprogramas_poa`.`clave` AS `subprgcv`, `subprogramas_poa`.`descripcion` AS `subdsc`, `programas_poa`.`clave` AS `prgcv`, `programas_poa`.`descripcion` AS `prgdsc`, `regiones`.`id_region`, `regiones`.`nombre`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`
	  		 FROM `siplan`.`aportes` AS `aportes`, `siplan`.`obras` AS `obras`, `siplan`.`unidad_medida_prog02` AS `unidad_medida_prog02`, `siplan`.`sectores` AS `sectores`, `siplan`.`dependencias` AS `dependencias`, `siplan`.`origen` AS `origen`, `siplan`.`municipios` AS `municipios`, `siplan`.`localidades` AS `localidades`, `siplan`.`estrategias` AS `estrategias`, `siplan`.`proyectos` AS `proyectos`, `siplan`.`programas_poa` AS `programas_poa`, `siplan`.`subprogramas_poa` AS `subprogramas_poa`, `siplan`.`regiones` AS `regiones`, `siplan`.`poa02_origen` AS `poa02_origen` 
	  		 WHERE `aportes`.`id_obra` = `obras`.`id_obra` AND `unidad_medida_prog02`.`id_unidad` = `obras`.`u_medida` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `origen`.`s08c_origen` = `obras`.`origen` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `estrategias`.`id_estrategia` = `proyectos`.`id_estrategia` AND `proyectos`.`id_proyecto` = `obras`.`id_proyecto` AND `proyectos`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`programa_poa` = `programas_poa`.`id_programa_poa` AND `obras`.`subprograma_poa` = `subprogramas_poa`.`id_subprograma_poa` AND `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`id_obra` = `poa02_origen`.`id_obra`
	  		  AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  		 AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999  
          OR  `aportes`.`id_obra` = `obras`.`id_obra` AND `unidad_medida_prog02`.`id_unidad` = `obras`.`u_medida` AND `sectores`.`id_sector` = `dependencias`.`id_sector` AND `dependencias`.`id_dependencia` = `obras`.`id_dependencia` AND `origen`.`s08c_origen` = `obras`.`origen` AND `municipios`.`id_municipio` = `localidades`.`id_municipio` AND `municipios`.`id_municipio` = `obras`.`municipio` AND `localidades`.`id_finanzas` = `obras`.`localidad` AND `estrategias`.`id_estrategia` = `proyectos`.`id_estrategia` AND `proyectos`.`id_proyecto` = `obras`.`id_proyecto` AND `proyectos`.`id_dependencia` = `dependencias`.`id_dependencia` AND `obras`.`programa_poa` = `programas_poa`.`id_programa_poa` AND `obras`.`subprograma_poa` = `subprogramas_poa`.`id_subprograma_poa` AND `municipios`.`id_region` = `regiones`.`id_region` AND `obras`.`id_obra` = `poa02_origen`.`id_obra`
	  		AND `obras`.`status_obra` = '4' AND `poa02_origen`.`id_oficio` != 0 AND `poa02_origen`.`status_of` = 2 
	  		 AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999  
          group by obras.id_obra
	  		 ORDER BY `dependencias`.`id_dependencia` ASC, `proyectos`.`no_proyecto` ASC, `obras`.`id_obra` ASC*/
	 $consulta_obras = mysql_query($consulta_origenes) ; 
		  
		  while($row=@mysql_fetch_array($consulta_obras)){
			
			  //saco sector
  $sac_sec = mysql_query("SELECT sector FROM sectores WHERE id_sector = ".$row['id_sector']);
  $res_sec=mysql_fetch_array($sac_sec);
  $sector=$res_sec['sector'];
  //termina sector
   
 //regiones  
   $sac_reg = mysql_query("SELECT * FROM regiones WHERE id_region = ".$row['id_region']) ;
  $res_reg=mysql_fetch_array($sac_reg);
  if (strlen($res_reg['id_region'])==1){
  $region=('0'.$res_reg['id_region'].','.$res_reg['nombre']);
  }else{
   $region=($res_reg['id_region'].','.$res_reg['nombre']);
  }
  //termina regiones
  
  //dependencia acronimo
  $acronimo=$row['acronimo'];
  //termina dependecia
 
 //fondo o modalidad d einversion
  $sac_fondo = mysql_query("SELECT c08c_tipori FROM origen WHERE s08c_origen = ".$row['s08c_origen']) ;
  $res_fondo=mysql_fetch_array($sac_fondo);
  $fondo=$res_fondo['c08c_tipori'];
 // termina fondeo
 
 //programa poa
 $sac_poa = mysql_query("SELECT * FROM programas_poa WHERE id_programa_poa = ".$row['programa_poa']) ;
  $res_poa=mysql_fetch_array($sac_poa);
  $poa=($res_poa['clave'].','.$res_poa['descripcion']);
 //terminna poa
 
 //subprograma poa
 
 $sac_subpoa = mysql_query("SELECT * FROM subprogramas_poa WHERE id_subprograma_poa = ".$row['subprograma_poa']) ;
  $res_subpoa=mysql_fetch_array($sac_subpoa);
  $subpoa=($res_subpoa['clave'].','.$res_subpoa['descripcion']);
 //subterminna poa
 
 //descripcion obra
  $nom_obras=$row['descripcion'];
 //termina descripcion obra
 
 //clave municipio
 $cve_mun=$row['municipio'];
 // termina clave municipio
 
  //nombre municipio
  $consulta_mun = mysql_query("SELECT nombre FROM municipios WHERE id_municipio=".$row['municipio'] ) ;
   $res_mun = mysql_fetch_array($consulta_mun);
 $nom_mun=$res_mun['nombre'];
 // termina nombre municipio
  
  //clave localidad
 //  $sac_loc = mysql_query("SELECT * FROM localidades WHERE id_localidad = ".$row['localidad'],$siplan_data_conn) ;
  //$res_loc=mysql_fetch_array($sac_loc);
   //$cve_loc=$res_loc['id_localidad'];  
   
   //echo "SELECT localidades.nombre, localidades.id_finanzas
//FROM municipios INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio WHERE municipios.id_municipio=".$res_mun['id_municipio']." and localidades.id_finanzas=".$row['localidad'] ;
    $consulta_loc = mysql_query("SELECT localidades.nombre, localidades.id_finanzas
FROM municipios INNER JOIN localidades ON municipios.id_municipio = localidades.id_municipio WHERE municipios.id_municipio=".$row['municipio']." and localidades.id_finanzas=".$row['localidad'] ) ;
			   $res_loc = mysql_fetch_array($consulta_loc);
			    $cve_loc=$res_loc['id_finanzas'];  
  // termina clave localidad
  
   //nombre localidad
 $nom_loc=$res_loc['nombre'];
 // termina nombre localidad
 
  //numero de obra 
 $num_obra=$row['obra'];
 // termina numero de obra
 
 //oficio de aprobacion 
 $num_oficio="";
   $consultar_ofi = mysql_query("SELECT * FROM detalle_oficio  WHERE id_poa02 = ".$row['id_obra']."") ;
	 
	  while ($rep_ofi = mysql_fetch_array($consultar_ofi)) {
	   
  $consultar_aproba = mysql_query("SELECT * FROM oficio_aprobacion  WHERE id_oficio = ".$rep_ofi['id_oficio']." and oficio_aprobacion.activo=1") ;
	
	  while ($rep_aproba = mysql_fetch_array($consultar_aproba)) {


 $num_oficio.=$rep_aproba['no_oficio'].' ';
 }}
 $num_oficio=rtrim($num_oficio,' ');
 $num_oficio=str_replace(' ', ', ',$num_oficio);
 // termina oficio de aprobacion 
 
 //fecha  inicio  
 $fecha_inicio=substr($row['fecha_inicio'],5,2).'-'.substr($row['fecha_inicio'],0,4);
 // termina fecha inicio 
 
  //fecha fin 
 $fecha_fin=substr($row['fecha_fin'],5,2).'-'.substr($row['fecha_fin'],0,4);
 // termina fecha fin 
 
 //sumar aporte programados
 $sumar_poa02 = mysql_query("select  sum(monto) as total  from poa02_origen where id_poa02 = ".$row['obra'].$query2."  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 AND poa02_origen.tipo = 0") ;
	$sum_aporte= mysql_fetch_array($sumar_poa02);
	
	 $sumar_add = mysql_query("select  sum(monto) as total  from poa02_origen where id_poa02 = ".$row['obra'].$query2."  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 AND poa02_origen.tipo = 1") ;
	$sum_aporte_add= mysql_fetch_array($sumar_add);
	
	 $sumar_rest = mysql_query("select  sum(monto) as total  from poa02_origen where id_poa02 = ".$row['obra'].$query2." AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 AND poa02_origen.tipo = 2") ;
	$sum_aporte_rest= mysql_fetch_array($sumar_rest);
	
	$totalp1=0;
	$totalp= number_format(($sum_aporte['total']+$sum_aporte_add['total'])-($sum_aporte_rest['total']),2);
	$totalp1=($sum_aporte['total']+$sum_aporte_add['total'])-($sum_aporte_rest['total']);
	
	
 //sacar tipo eje  
 /*$sac_aportes_est = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 1000 and 1999 and id_poa02= ".$row['obra']." and tipo=0",$siplan_data_conn) ;
	$res_aporte_est= mysql_fetch_array($sac_aportes_est);
	
	 $sac_aportes_fed = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 2000 and 2999 and id_poa02= ".$row['obra']." and tipo=0",$siplan_data_conn) ;
	$res_aporte_fed= mysql_fetch_array($sac_aportes_fed);
	
	
	 $sac_aportes_mun = mysql_query("select sum(monto) as total   from poa02_origen where mid(s08c_origen,3,4) between 3000 and 3999 and id_poa02= ".$row['obra']." and tipo=0",$siplan_data_conn) ;
	$res_aporte_mun= mysql_fetch_array($sac_aportes_mun);
	
	
	$sac_aportes_otr = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 4000 and 4999 and id_poa02= ".$row['obra']." and tipo=0",$siplan_data_conn) ;
	$res_aporte_otr= mysql_fetch_array($sac_aportes_otr);*/
	
	
	   $sac_aportes_eje = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$row['id_obra'].$query2."  AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$row['id_obra'].$query2." AND `poa02_origen`.`tipo` = 0 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen",$siplan_data_conn) ;
	
	$ampli=0;

	$cance=0;

	$ejecu=0;	

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
			$ejecu += $res_aporte_eje['sumamonto'];	 	 

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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//sacar tipo amplia  
	
	/* $sac_aportes_est_amp = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 1000 and 1999 and id_poa02= ".$row['obra']." and tipo=1",$siplan_data_conn) ;
	$res_aporte_est_amp= mysql_fetch_array($sac_aportes_est_amp);
	
	 $sac_aportes_fed_amp = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 2000 and 2999 and id_poa02= ".$row['obra']." and tipo=1",$siplan_data_conn) ;
	$res_aporte_fed_amp= mysql_fetch_array($sac_aportes_fed_amp);
	
	
	 $sac_aportes_mun_amp = mysql_query("select sum(monto) as total   from poa02_origen where mid(s08c_origen,3,4) between 3000 and 3999 and id_poa02= ".$row['obra']." and tipo=1",$siplan_data_conn) ;
	$res_aporte_mun_amp= mysql_fetch_array($sac_aportes_mun_amp);
	
	
	$sac_aportes_otr_amp = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 4000 and 4999 and id_poa02= ".$row['obra']." and tipo=1",$siplan_data_conn) ;
	$res_aporte_otr_amp= mysql_fetch_array($sac_aportes_otr_amp);
	
	
	//sacar tipo cancelacion   
	 $sac_aportes_est_can = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 1000 and 1999 and id_poa02= ".$row['obra']." and tipo=2",$siplan_data_conn) ;
	$res_aporte_est_can= mysql_fetch_array($sac_aportes_est_can);
	
	 $sac_aportes_fed_can = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 2000 and 2999 and id_poa02= ".$row['obra']." and tipo=2",$siplan_data_conn) ;
	$res_aporte_fed_can= mysql_fetch_array($sac_aportes_fed_can);
	
	
	 $sac_aportes_mun_can = mysql_query("select sum(monto) as total   from poa02_origen where mid(s08c_origen,3,4) between 3000 and 3999 and id_poa02= ".$row['obra']." and tipo=2",$siplan_data_conn) ;
	$res_aporte_mun_can= mysql_fetch_array($sac_aportes_mun_can);
	
	
	$sac_aportes_otr_can = mysql_query("select sum(monto) as total  from poa02_origen where mid(s08c_origen,3,4) between 4000 and 4999 and id_poa02= ".$row['obra']." and tipo=2",$siplan_data_conn) ;
	$res_aporte_otr_can= mysql_fetch_array($sac_aportes_otr_can);*/
	
	
		

	
	
		$sac_aportes_amp = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$row['id_obra'].$query2." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$row['id_obra'].$query2." AND `poa02_origen`.`tipo` = 1 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen",$siplan_data_conn) ;
	
	  $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{ 
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);
	  
		  $ampli += $res_aporte_amp['sumamonto'];
/*
	  	if ($orige_n=="2103"){
		 $estatal= $estatal + $res_aporte_amp['sumamonto'];
		
		} elseif($orige_n=="3102"){

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
}*/

	}
	
		
	////termina ampliaciones
	
	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT `poa02_origen`.`s08c_origen`, `poa02_origen`.`tipo`,  SUM( `poa02_origen`.`monto` ) AS `sumamonto` 
FROM poa02_origen 
WHERE poa02_origen.id_obra=".$row['id_obra'].$query2." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR poa02_origen.id_obra=".$row['id_obra'].$query2." AND `poa02_origen`.`tipo` = 2 and poa02_origen.id_oficio!=0 and poa02_origen.status_of=2  
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999 GROUP BY s08c_origen",$siplan_data_conn) ;
	
	
	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{ 
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);

	   $cance += $res_aporte_can['sumamonto'];
	 	 /*
	 	 	if ($orige_n=="2103"){
		 $estatal= $estatal - $res_aporte_can['sumamonto'];
		
		} elseif($orige_n=="3102"){

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

}*/
	}
	$totals=(($federal+$estatal+$municipal+$particip+$credito+$otros+$ampli)-($cance));
	
	
	
	
	
//	$federal= number_format(($res_aporte_fed['total']+$res_aporte_fed_amp['total'])-($res_aporte_fed_can['total']),2);

//$estatal=number_format(($res_aporte_est['total']+$res_aporte_est_amp['total'])-($res_aporte_est_can['total']),2);
//$municipal=number_format(($res_aporte_mun['total']+$res_aporte_mun_amp['total'])-($res_aporte_mun_can['total']),2);
//$particip=0;//number_format($res_aporte['participantes'],2);
//$credito=0;//number_format($res_aporte['credito'],2);
//$otros=number_format(($res_aporte_otr['total']+$res_aporte_otr_amp['total'])-($res_aporte_otr_can['total']),2);
 //sacar aportes
 
 //sacar ejercito
 $sumar_ejercido = mysql_query("select  (fed + est + mun + part + cred + otr ) as totale  from ejercido where activo=1 and id_obra = ".$row['id_obra'],$siplan_data_conn) ;
	$ejercido=0;
	while($sum_ejercido = mysql_fetch_array($sumar_ejercido)){
	   	   $ejercido = $ejercido + $sum_ejercido['totale'];
	   	}
	   $totale=number_format($ejercido,2);
	   
	 
	 
	 $sac_ejercido = mysql_query("select  sum(fed) as fed from ejercido where activo=1 and id_obra = ".$row['id_obra']) ;
	$res_ejercido= mysql_fetch_array($sac_ejercido);

$fed= number_format($res_ejercido['fed'],2);

	 $sac_ejercido1 = mysql_query("select  sum(est) as est from ejercido where activo=1 and id_obra = ".$row['id_obra']) ;
	$res_ejercido1= mysql_fetch_array($sac_ejercido1);

$est=number_format($res_ejercido1['est'],2);


	 $sac_ejercido2 = mysql_query("select  sum(mun) as mun from ejercido where activo=1 and id_obra = ".$row['id_obra']) ;
	$res_ejercido2= mysql_fetch_array($sac_ejercido2);

$mun=number_format($res_ejercido2['mun'],2);


	 $sac_ejercido3 = mysql_query("select  sum(part) as part from ejercido where activo=1 and id_obra = ".$row['id_obra']) ;
	$res_ejercido3= mysql_fetch_array($sac_ejercido3);
$part=number_format($res_ejercido3['part'],2);


	 $sac_ejercido4 = mysql_query("select  sum(cred) as cred from ejercido where activo=1 and id_obra = ".$row['id_obra']) ;
	$res_ejercido4= mysql_fetch_array($sac_ejercido4);

$cred=number_format($res_ejercido4['cred'],2);


	 $sac_ejercido5 = mysql_query("select  sum(otr) as otr from ejercido where activo=1 and id_obra = ".$row['id_obra']) ;
	$res_ejercido5= mysql_fetch_array($sac_ejercido5);
$otr=number_format($res_ejercido5['otr'],2);


  // termina ejercido
  
  //avance financiero
  
  	if ($totalp1==""){
	$aporte=0;
		}else{
	$aporte=$totalp1;
		}
	//echo $ejercido.'/'.$aporte.'|';
	
	if ($ejercido==0 and $aporte==0){
	$tt=0;
	}elseif ($ejercido>=0.01 and $aporte==0){
	
	$tt=0;
	}else{$tt=(($ejercido/$aporte)*100);}
	
	$financiero=number_format($tt,2).'%';
  //termina avance financiero

  //avance fisico

     $sumar_alcanzadas = mysql_query("select   SUM(m_alcanzadas) as m  from ejercido where activo=1 and id_obra = ".$row['id_obra']) ;
	  $sumalcanzada=0;
	$sum_alcanzadas= mysql_fetch_array($sumar_alcanzadas);
	
	$sumalcanzada=$sum_alcanzadas['m'];
	if ($row['cant_pro']==""){
	$cantidad=0;
		}else{
	$cantidad=$row['cant_pro'];
		}
		if ($sumalcanzada==0 and $cantidad==0){
	$ttca=0;
	}elseif ($sumalcanzada>=0.01 and $cantidad==0){
	
	$ttca=0;
	}else{$ttca=(($sumalcanzada/$cantidad)*100);}
  
  $fisico=number_format($ttca,2).'%';
  
  //termina fisico

 //unida de medidad
 //echo "select  * from unidad_medida_prog02 where  id_unidad = ".$row['u_medida'];
  $sac_medida = mysql_query("select  * from unidad_medida_prog02 where  id_unidad = ".$row['u_medida']) ;
	$res_medida= mysql_fetch_array($sac_medida);
	$medida=$res_medida['descripcion'];
 //termian medidad
 
 //programdas
 $programadas=$row['cant_pro'];
 //termina programdas
 
 
  //programdas
  if ($sum_alcanzadas['m']==""){
  $alcanzadas=0;
  }elseif($sum_alcanzadas['m']!=""){
  $alcanzadas=$sum_alcanzadas['m'];}
 
 //termina programdas
 
  //hombres
 $hombres=number_format($row['ben_h']);
 //termina hombres
 
  //mujeres
 $mujeres=number_format($row['ben_m']);
 //termina mujeres
 

  //PED*
//echo "hol".$row['id_subprograma_poa';
 $sac_ped = mysql_query("select  * from estrategias  where  id_estrategia= ".$row['id_estrategia']) ;
$res_ped= mysql_fetch_array($sac_ped);
	$PED=substr($res_ped['nombre'],0,5);
	
 //PED
 
  //proyecto
 $num_proy=$row['no_proyecto'];
 //termina proyecto
 
  //obs
 
 //echo "select  * from ejercido where activo=1 and id_obra = ".$row['id_obra'];
   $sac_obs = mysql_query("select  * from ejercido where activo=1 and id_obra = ".$row['id_obra']." order by fecha desc",$siplan_data_conn) ;
	$obs=""; 
//	 while ($res_obs = mysql_fetch_array($sac_obs)) {

$res_obs = mysql_fetch_array($sac_obs);
 $obs=$res_obs['obs'];
	
// $obs.=$res_obs['obs'].' ';
// }
 //$obs=rtrim($obs,' ');
 //$obs=str_replace(' ', ', ',$obs);
 //termina obs
 
 if ($org!="" and $org!=0){
 
 if ($row['s08c_origen']==$org){
	 
	 if ($num_oficio!=""){
  
 ?>
 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl115 width=3422 style='height:12.75pt;width:53pt'><?php echo strtoupper(utf8_decode(limpiar($sector))); ?></td>
  <td class=xl115 width=70 style='border-left:none;width:53pt'><?php echo encoding($region); ?></td>
  <td class=xl115 width=98 style='border-left:none;width:74pt'><?php echo $acronimo; ?></td>
  <td class=xl115 width=156 style='border-left:none;width:117pt'><?php echo utf8_decode($fondo); ?></td>
  <td class=xl115 width=79 style='border-left:none;width:59pt'><?php echo encoding($poa); ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo encoding($subpoa); ?></td>
  <td class=xl115 width=134 style='border-left:none;width:101pt'><?php echo encoding($nom_obras); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $cve_mun; ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo encoding($nom_mun); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $cve_loc; ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo encoding($nom_loc); ?></td>
  <td class=xl115 width=90 style='border-left:none;width:68pt'><?php echo $num_obra; ?></td>
  <td class=xl115 width=90 style='border-left:none;width:68pt'><?php echo $num_oficio; ?></td>
  <td class=xl141 width=70 style='border-left:none;width:53pt'><?php echo $fecha_inicio; ?></td>
  <td class=xl141 width=70 style='border-left:none;width:53pt'><?php echo $fecha_fin; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$totalp; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$federal; ?> </td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$estatal; ?> </td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$municipal; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$particip; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$credito; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$otros; ?></td>
   <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$ampli; ?></td>
    <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$cance; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$totale; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$fed; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$est; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$mun; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$part; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$cred; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$otr; ?></td>
  <td class=xl142 width=80 style='border-left:none;width:60pt'><?php echo $financiero; ?></td>
  <td class=xl143 width=80 style='border-left:none;width:60pt'><?php echo $fisico; ?></td>
  <td class=xl115 width=206 style='border-left:none;width:65pt'><?php echo encoding($medida); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo number_format($programadas,2); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo number_format($alcanzadas,2); ?></td>
  <td class=xl140 width=120 style='border-left:none;width:45pt'><?php echo $hombres; ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $mujeres; ?></td>
  <td class=xl115 width=95 style='border-left:none;width:71pt'><?php echo $PED; ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $num_proy; ?></td>
  <td class=xl115 width=174 style='border-left:none;width:131pt'><?php echo (encoding($obs)); ?></td>
 </tr>
 
<?php

}
}

}else{
	 if ($num_oficio!=""){
	?>
	 <tr class=xl144 height=17 style='height:12.75pt'>
  <td height=17 class=xl115 width=3422 style='height:12.75pt;width:53pt'><?php echo strtoupper(utf8_decode(limpiar($sector))); ?></td>
  <td class=xl115 width=70 style='border-left:none;width:53pt'><?php echo encoding($region); ?></td>
  <td class=xl115 width=98 style='border-left:none;width:74pt'><?php echo $acronimo; ?></td>
  <td class=xl115 width=156 style='border-left:none;width:117pt'><?php echo utf8_decode($fondo); ?></td>
  <td class=xl115 width=79 style='border-left:none;width:59pt'><?php echo encoding($poa); ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo encoding($subpoa); ?></td>
  <td class=xl115 width=134 style='border-left:none;width:101pt'><?php echo encoding($nom_obras); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $cve_mun; ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo encoding($nom_mun); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $cve_loc; ?></td>
  <td class=xl115 width=100 style='border-left:none;width:75pt'><?php echo encoding($nom_loc); ?></td>
  <td class=xl115 width=90 style='border-left:none;width:68pt'><?php echo $num_obra; ?></td>
  <td class=xl115 width=90 style='border-left:none;width:68pt'><?php echo $num_oficio; ?></td>
  <td class=xl141 width=70 style='border-left:none;width:53pt'><?php echo $fecha_inicio; ?></td>
  <td class=xl141 width=70 style='border-left:none;width:53pt'><?php echo $fecha_fin; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$totalp; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$federal; ?> </td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$estatal; ?> </td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$municipal; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$particip; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$credito; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$otros; ?></td>
   <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$ampli; ?></td>
    <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$cance; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$totale; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$fed; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$est; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$mun; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$part; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$cred; ?></td>
  <td class=xl66 width=90 style='border-left:none;width:68pt'><?php echo "$".$otr; ?></td>
  <td class=xl142 width=80 style='border-left:none;width:60pt'><?php echo $financiero; ?></td>
  <td class=xl143 width=80 style='border-left:none;width:60pt'><?php echo $fisico; ?></td>
  <td class=xl115 width=206 style='border-left:none;width:65pt'><?php echo encoding($medida); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo number_format($programadas,2); ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo number_format($alcanzadas,2); ?></td>
  <td class=xl140 width=120 style='border-left:none;width:45pt'><?php echo $hombres; ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $mujeres; ?></td>
  <td class=xl115 width=95 style='border-left:none;width:71pt'><?php echo $PED; ?></td>
  <td class=xl140 width=60 style='border-left:none;width:45pt'><?php echo $num_proy; ?></td>
  <td class=xl115 width=174 style='border-left:none;width:131pt'><?php echo (encoding($obs)); ?></td>
 </tr>
	
	
	
	
	<?php
}
}


		  }






function encoding ($txt) {
$encoding = mb_detect_encoding($txt, 'ASCII,UTF-8,ISO-8859-1');

if ($encoding == "ISO-8859-1") {
$txt = utf8_decode($txt);
}

if ($encoding == "UTF-8") {
$txt = utf8_decode($txt);
}

if ($encoding == "ASCII") {
$txt = $txt;//html_entity_decode($txt);
}

return limpiar($txt);

}



function limpiar($String){
$String = str_replace('á',"Á",$String);
$String = str_replace('í',"Í",$String);
$String = str_replace('é',"É",$String);
$String = str_replace('ó',"Ó",$String);
$String = str_replace('ú',"Ú",$String);
$String = str_replace("ñ","Ñ",$String);
$String = str_replace("ý","Ý",$String);

$String = str_replace('Ã¡',"Ã",$String);
$String = str_replace('Ã­',"Ã",$String);
$String = str_replace('Ã©',"Ã‰",$String);
$String = str_replace('Ã³',"Ã“",$String);
$String = str_replace('Ãº',"Ãš",$String);
$String = str_replace("Ã±","Ã‘",$String);
$String = str_replace("Ã½","Ã",$String);




/*
$String = str_replace('Á',"á",$String);
$String = str_replace('Í',"í",$String);
$String = str_replace('É',"é",$String);
$String = str_replace('Ó',"ó",$String);
$String = str_replace('Ú',"ú",$String);
$String = str_replace("Ñ","ñ",$String);
$String = str_replace("Ý","ý",$String);
*/

return strtoupper($String);
}
?>
</table>

</body>

</html>

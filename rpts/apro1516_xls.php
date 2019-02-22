<?php session_start();
header('Content-type: application/vnd.ms-excel;');
header("Content-Disposition: attachment; filename=MUN_".$_GET['mp']."_INVERSION_2015_2016.xls");
header("Pragma: no-cache");
header("Expires: 0");

$mp=$_GET['mp'];

$sinAcento=array('A','E','I','O','U','A','E','I','O','U','O');
$conAcento=array('Á','É','Í','Ó','Ú','á','é','í','ó','ú','ó');

if ( $mp!="" and $_SESSION['id_dependencia_v3']!=""){
require_once("../seguridad/deniedacces.php");
require_once("../seguridad/siplan_connection_db_2016.php");
require_once("../seguridad/logout.php");
}

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


<?php


 $consulta_munz = mysql_query("SELECT * FROM municipios where id_finanzas=".$_GET['mp'] );// or die (mysql_error());



                           $res_munz = mysql_fetch_array($consulta_munz);



 $mp=$res_munz['id_municipio'];


   $query="SELECT programas_poa.id_programa_poa, programas_poa.descripcion, obras.municipio, poa02_origen.id_obra, poa02_origen.id_oficio, poa02_origen.status_of
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND obras.municipio = ".$mp."
 AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
 GROUP BY obras.programa_poa ORDER BY programas_poa.id_programa_poa ASC";

$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from municipios where id_municipio=".$mp);
	$row=mysql_fetch_assoc($mun);

?>








<body link=blue vlink=purple class=xl76>

<table border=0 cellpadding=0 cellspacing=0 width=3422 style='border-collapse:
 collapse;table-layout:fixed;width:2878pt'>

 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=40 height=30 width=3422 style='border-right:.5pt solid black;
  height:22.5pt;width:2578pt' align=left valign=top><![if !vml]><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=3 height=30 class=xl206 width=3422 style='border-right:.5pt solid black;
    height:22.5pt;width:2578pt'><a name="Print_Area">GOBIERNO DEL ESTADO DE
    ZACATECAS</a></td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=3 height=30 class=xl203 style='border-right:.5pt solid black;
  height:22.5pt'>COORDINACIÓN ESTATAL DE PLANEACI�N</td>
 </tr>
<tr><td></td></tr>
<tr><td></td></tr>

 <tr height=30 style='mso-height-source:userset;height:22.5pt'>
  <td colspan=3 height=30 class=xl138 style='border-right:.5pt solid black;
  height:22.5pt'>Inversi&oacute;n de <?php echo utf8_decode($row['nombre']); ?> 2016</td>
 </tr>

    <tr    >
	   <td  width="200px"><div align="center">Programa</div></td>
	<td  width="200px"><div align="center"> No. Obras</div></td>

	<td width="200px"><div align="center"> Total</div></td>
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
  $consulta_obras=mysql_query($query);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
			$descripcion=$resobras['descripcion'];
			$programa=strtoupper($descripcion);
			$programita= str_replace($conAcento,$sinAcento,$programa);


  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo utf8_decode($programita); ?></td>
    <td align="center">



	<?php



			$sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia`
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios`
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio`
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_municipio`
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");
	$res_cuenta= mysql_num_rows($sac_cuenta);


	echo number_format($res_cuenta); ?>
    </b>




    </td>
    <?php


$sac_aportes_eje = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 0
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."'
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
GROUP BY poa02_origen.s08c_origen");


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


	////termina ejecuciones



	//sacar tipo ampliaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_amp = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 1
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."'
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
GROUP BY poa02_origen.s08c_origen");



	  $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);



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



	////termina ampliaciones

	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 2
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."'
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
GROUP BY poa02_origen.s08c_origen");




	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);


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




$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;

     ?>

	<td align="right"><?php echo number_format($totals,2); ?></td>



 </tr>
    <?php $tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	$cp=$cp+$res_cuenta; } ?>

      <tr bgcolor="#999999">

    <td width="200px"><div align="center">Total:</div></td>
 <td align="center" >
	<?php

	echo number_format($cp); ?>
    </b>

    </td>

	<td width="200px"><div align="right"><?php echo number_format($tt,2) ?></div></td>
	  </tr>


  <?php// } ?>



<?php mysql_close($siplan_data_conn); ?>



	<?php



if ( $_GET!="" and $_SESSION['id_dependencia_v3']!=""){
 $link=conectarse();
}



function conectarse()
{

if(!($link=@mysql_connect("10.221.12.2","usr_siplan_new","05dEfsipl#4N")))
{
echo "Error conectando a la base de datos.";
exit();
}
//if (!mysql_select_db("",$link)) //nombre de la base de datos ---
if (!mysql_select_db("siplan2015",$link))
{
echo "Error seleccionando la base de datos.";
exit();
}
return $link;
} //


/*
 $consulta_munz = mysql_query("SELECT * FROM municipios where id_finanzas=".$_GET['mp'] );// or die (mysql_error());

			   $res_munz = mysql_fetch_array($consulta_munz);

 $mp=$res_munz['id_municipio'];*/



$mp=$_GET['mp'];

?>



<?php


   $query="SELECT programas_poa.id_programa_poa, programas_poa.descripcion, obras.municipio, poa02_origen.id_obra, poa02_origen.id_oficio, poa02_origen.status_of
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND obras.municipio = ".$mp."
 AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2 AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
 GROUP BY obras.programa_poa ORDER BY programas_poa.id_programa_poa ASC";

$consulta_obras = mysql_query($query);// or die (mysql_error());

$mun=mysql_query("select * from municipios where id_finanzas=".$mp);
	$row=mysql_fetch_assoc($mun);

?>


<?php if ($mp!="59"){
?>
<tr><td></td></tr>
<tr><td></td></tr>

   <td  width="200px"><div align="center">Inversi&oacute;n de <?php echo $row['nombre']; ?> 2015 </td>


    <tr    >
	   <td  width="200px"><div align="center">Programa</div></td>
	<td  width="200px"><div align="center"> No. Obras</div></td>

	<td width="200px"><div align="center"> Total</div></td>
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
  $consulta_obras=mysql_query($query);
    while ($resobras = mysql_fetch_assoc($consulta_obras)) {
			$descripcion=utf8_encode($resobras['descripcion']);
			$programita= str_replace($conAcento,$sinAcento,$descripcion);
			$programa=strtoupper($programita);

  ?>
 <tr   style="cursor: pointer;" >
   <td align="justify"><?php echo $programa; ?></td>
    <td align="center">



	<?php



			$sac_cuenta = mysql_query("SELECT `municipios`.`id_municipio`, `poa02_origen`.`id_obra`, `poa02_origen`.`id_oficio`, `poa02_origen`.`status_of`, `obras`.`id_dependencia`
			FROM `obras` AS `obras`, `poa02_origen` AS `poa02_origen`, `municipios` AS `municipios`
			WHERE `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_finanzas`
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 4000 AND 4999
OR `obras`.`id_obra` = `poa02_origen`.`id_obra` AND `obras`.`municipio` = `municipios`.`id_finanzas`
AND obras.status_obra =4
AND poa02_origen.status_of =2
and poa02_origen.id_oficio!=0  and obras.programa_poa=".$resobras['id_programa_poa']." and obras.municipio=".$mp."
AND `poa02_origen`.`s07c_partid` BETWEEN 6000 AND 6999
GROUP BY poa02_origen.id_obra");
	$res_cuenta= mysql_num_rows($sac_cuenta);


	echo number_format($res_cuenta); ?>
    </b>




    </td>
    <?php


$sac_aportes_eje = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 0
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."'
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
GROUP BY poa02_origen.s08c_origen");


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


	////termina ejecuciones



	//sacar tipo ampliaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_amp = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 1
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."'
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
GROUP BY poa02_origen.s08c_origen");



	  $orige_n=0;
	while($res_aporte_amp = mysql_fetch_assoc($sac_aportes_amp))
	{
	  $orige_n= substr($res_aporte_amp['s08c_origen'],-4,4);



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



	////termina ampliaciones

	//sacar tipo cancelaciones buscar por dependecia y subprograma y mas el between
 	$sac_aportes_can = mysql_query("SELECT poa02_origen.s08c_origen, poa02_origen.tipo, programas_poa.id_programa_poa, SUM( poa02_origen.monto ) AS sumamonto
 FROM obras AS obras, poa02_origen AS poa02_origen, programas_poa AS programas_poa
 WHERE obras.id_obra = poa02_origen.id_obra AND programas_poa.id_programa_poa = obras.programa_poa AND poa02_origen.tipo = 2
 AND programas_poa.id_programa_poa = '".$resobras['id_programa_poa']."' AND obras.municipio = '".$mp."'
  AND poa02_origen.id_oficio != 0 AND poa02_origen.status_of = 2
  AND ( poa02_origen.s07c_partid BETWEEN 4000 AND 4999 OR poa02_origen.s07c_partid BETWEEN 6000 AND 6999 )
GROUP BY poa02_origen.s08c_origen");




	  $orige_n=0;
	while($res_aporte_can = mysql_fetch_assoc($sac_aportes_can))
	{
	  $orige_n= substr($res_aporte_can['s08c_origen'],-4,4);


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




$totals=$federal+$estatal+$municipal+$particip+$credito+$otros;

     ?>

	<td align="right"><?php echo number_format($totals,2); ?></td>



 </tr>
    <?php $tt=$tt+$totals;
	$fd=$fd+$federal;
	$st=$st+$estatal;
	$mn=$mn+$municipal;
	$pt=$pt+$particip;
	$cr=$cr+$credito;
	$ot=$ot+$otros;
	$cp=$cp+$res_cuenta; } ?>

      <tr bgcolor="#999999">

    <td width="200px"><div align="center">Total:</div></td>
 <td align="center" >
	<?php

	echo number_format($cp); ?>
    </b>

    </td>

	<td width="200px"><div align="right"><?php echo number_format($tt,2) ?></div></td>
	  </tr>


  <?php } ?>



<?php mysql_close($siplan_data_conn); ?>

</table>

</body>

</html>

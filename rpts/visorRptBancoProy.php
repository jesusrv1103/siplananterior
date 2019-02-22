

<html>
  <head>
    <title> Reporte Proyectos siplan 2013 </title>
  </head>

  <body oncontextmenu="return false" onkeydown="return false">
 <?php
      //$linkFrame = "http://localhost:8080/birtrep2013v2/frameset?__report=bancoProyectos.rptdesign";  
	  //$linkFrame = "http://siplanrep.zacatecas.gob.mx/birtrep/frameset?__report=birtrep2013v2/bancoProyectos.rptdesign&idDependencia=".$idDependencia."&anio=".$anio;
	  
	  $linkFrame = "http://siplanrep.zacatecas.gob.mx/birtrep/frameset?__report=birtrep2013v2/bancoProyectos.rptdesign";
  ?>
      <iframe src="<?php echo $linkFrame?>"
            width="800" height="600" scrolling="auto" frameborder="1" transparency>
    </iframe>
  </body>
</html>

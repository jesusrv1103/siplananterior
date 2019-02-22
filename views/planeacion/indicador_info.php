<?php
$consulta_indicador = "
SELECT  
CASE i.nivel_indicador
    WHEN 1 THEN 'Fin'
    WHEN 2 THEN 'Fin'
    WHEN 3 THEN 'Fin'
    WHEN 4 THEN 'Fin'
END,
i.id_proyecto,
p.nombre,
p.objetivo,
i.id_componente,
i.id_actividad,
i.nombre,
i.definicion,
i.metodo,
ti.tipo_indicador,
d.dimension,
f.frecuencia,
s.sentido,
i.u_medida,
i.meta,
i.linea_base,
i.medio_verificacion,
i.supuesto,
i.frecuencia
FROM indicadores i 
inner join tipo_indicador ti on (i.tipo = ti.id_tipo_indicador)
inner join dimension_indicador d on (i.dimension = d.id_dimension)
inner join frecuencia_indicador f on (i.frecuencia = f.id_frecuencia)
inner join sentido_indicador s on (i.sentido = s.id_sentido)
inner join proyectos p on (i.id_proyecto = p.id_proyecto)
WHERE i.id_indicador = ".$_GET['id_indicador'];
$conexion = $conn->conectar(1);
$ex_consulta = $conexion->query($consulta_indicador) or die ($conexion->error);
$res_indicador = $ex_consulta->fetch_array(MYSQLI_NUM);
$conexion->close();

function metodoCalculo($id_indicador,$formula,$conn,$regresar){
    $conexion = $conn->conectar(1);
    $consulta_nombre_variables = $conexion->query("SELECT * FROM variables_indicadores WHERE id_indicador = ".$id_indicador) or die ($conexion->error);
    $res_nombre_variables = $consulta_nombre_variables->fetch_array(MYSQLI_NUM);
    $conexion->close();
    switch($formula){
        case 1:
            $metodo = "( ".$res_nombre_variables[1]." / ".$res_nombre_variables[2]." ) * 100";
        break;
        case 2:
            $metodo = "( ".$res_nombre_variables[1]." * 100 ) / ".$res_nombre_variables[2];
        break;
        case 3:
            $metodo = $res_nombre_variables[1]." / ".$res_nombre_variables[2];
        break;
        case 4:
            $metodo = $res_nombre_variables[1]." + ".$res_nombre_variables[2]." + ".$res_nombre_variables[3];
        break;
        case 5:
            $metodo = "{ ( ".$res_nombre_variables[1]." / ".$res_nombre_variables[2]." ) -1 } * 100";
        break;
        case 6:
            $metodo = $res_nombre_variables[1];
        break;
        case 7:
            $metodo = "( ".$res_nombre_variables[1]." / ".$res_nombre_variables[2]." ) * 100,000";
        break;
        case 8:
            $metodo = "( ".$res_nombre_variables[1]." / ".$res_nombre_variables[2]." ) * 10,000";
        break;
        case 9:
            $metodo = "( ".$res_nombre_variables[1]." / ".$res_nombre_variables[2]." ) * 0.0001";
        break;
        case 10:
            $metodo = "( ".$res_nombre_variables[1]." + ".$res_nombre_variables[2]." + ".$res_nombre_variables[3]." + ".$res_nombre_variables[4]." ) / 4";
        break;
        case 11:
            $metodo = "( ".$res_nombre_variables[1]." / (".$res_nombre_variables[2]." - 1 )  ) * 100";
        break;
        case 12:
            $metodo = "( ".$res_nombre_variables[1]." - ".$res_nombre_variables[2]." ) / ".$res_nombre_variables[2];
        break;
        case 13:
            $metodo = $res_nombre_variables[1]." / ( ".$res_nombre_variables[2]."  * 0.001)";
        break;
        case 14:
             $metodo = $res_nombre_variables[1]." / ( ".$res_nombre_variables[2]."  * 0.0001)";
        break;
        case 15:
            $metodo = "( ".$res_nombre_variables[1]." /".$res_nombre_variables[2]." ) * 1000";
        break;    
    }
    if($regresar == "formulas"){
        return $metodo;
    }
    if($regresar == "variables"){
        return $res_nombre_variables;
    }
}


?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>SIPLAN 2019<br><small> Información del Indicador</small></h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Indiciador <?php echo $res_indicador[0]; ?> | <small> <strong> <?php echo $res_indicador[2]; ?>  </strong> </small></h3>
   
      </div>
      <div class="box-body">
        <button class="btn btn-success" onclick="goBack();">
          <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Indicadores <?php echo $res_indicador[0]; ?></button>
          <a href="#" target="_blank" class="btn btn-danger"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generar PDF</a>
    <a href="#" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;Exportar XLS</a>
          <hr>
           <div class="row">
              <div class="col-md-12"><b>Programa Presupuetsario: </b><?php echo $res_indicador[2];?> </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-md-12"><b>Objetivos: </b><?php echo $res_indicador[3];?> </div>
          </div>
          <hr>
          <h4>Indicador</h4>
          <table class="table table-bordered">
              <thead>
                <th>Nombre</th>
                <th>Definición</th>  
                <th>Método de Cálculo</th>
                <th>Tipo</th>  
                <th>Dimensión</th>  
                <th>Frecuencia</th>  
                <th>Sentido</th>  
              </thead>  
              <tbody>
                <tr>
                    <td><?php echo $res_indicador[6]; ?></td>
                    <td><?php echo $res_indicador[7]; ?></td>    
                    <td><?php
                       
                        echo metodoCalculo($_GET['id_indicador'],$res_indicador[8],$conn,"formulas");
   
                        ?></td>
                    <td><?php echo $res_indicador[9]; ?></td>
                    <td><?php echo $res_indicador[10]; ?></td>
                    <td><?php echo $res_indicador[11]; ?></td>
                    <td><?php echo $res_indicador[12]; ?></td>

                  </tr>
              </tbody>
          </table>
          <div><b>Medio de Verificación: &nbsp;</b><?php echo $res_indicador[16]; ?></div>
          <div><b>Supuesto: &nbsp;</b><?php echo $res_indicador[17]; ?></div>
          <hr>
          <div><b>Unidad de medida: &nbsp;</b></div>
          <div><b>Meta: &nbsp;</b></div>
          <div><b>Línea Base: &nbsp;</b></div>
          <div class="row">
            <div class="col-md-7"> 
                Tabla de Resultados
              <table class="table table-bordered">
                <thead>
                    <th> Variable/Periodo </th>
                    <?php
                      switch($res_indicador[18]){
                          case 1:
                           
                              ?>
                        <th>Ene</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Abr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Ago</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dic</th>
                    <?php
                          break;
                    case 2:
                              
                              ?>
                        <th>Ene-Feb</th>
                        <th>Mar-Abr</th>
                        <th>May-Jun</th>
                        <th>Jul-Ago</th>
                        <th>Sep-Oct</th>
                        <th>Nov-Dic</th>
                       
                    <?php
                          break; 
                      case 3:
                              
                              ?>
                        <th>Ene-Feb-Mar</th>
                        <th>Abr-May-Jun</th>
                        <th>Jul-Ago-Sep</th>
                        <th>Oct-Nov-Dic</th>
               
                    <?php
                          break;       
                    case 4:
                             
                              ?>
                        <th>Ene-Jun</th>
                        <th>Jul-Dic</th>

                    <?php
                          break;
                    case 5:
                              
                              ?>
                        <th>Ene-Dic</th>

                    <?php
                          break; 
                        
                    case 6:
                              
                              ?>
                        <th>Año 1</th>
                        <th>Año 2</th>
                    <?php
                          break;
                      }
                    ?>
                </thead>
           
                    <?php 
                        $conexion = $conn->conectar(1);
                        $consulta_resultados = $conexion->query("SELECT id_resultado_indicador,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6 FROM resultados_indicadores WHERE id_indicador = ".$_GET['id_indicador']);
                        //$resultados_indicadores = $consulta_resultados->fetch_array(MYSQLI_NUM);
                        $res_var1 = "";
                        $res_var2 = "";
                        $res_var3 = "";
                        $res_var4 = "";
                        $res_var5 = "";
                        $res_var6 = "";
                        while($resultados_indicadores = $consulta_resultados->fetch_array(MYSQLI_NUM) ) {
                            $res_var1.="<td>".$resultados_indicadores[1]."</td>";
                            $res_var2.="<td>".$resultados_indicadores[2]."</td>";
                            $res_var3.="<td>".$resultados_indicadores[3]."</td>";
                            $res_var4.="<td>".$resultados_indicadores[4]."</td>";
                            $res_var5.="<td>".$resultados_indicadores[5]."</td>";
                            $res_var6.="<td>".$resultados_indicadores[6]."</td>";
                            
                        }
                     
                        $res_var_arr = array($res_var1,$res_var2,$res_var3,$res_var4,$res_var5,$res_var6);    
                        $num_variables = metodoCalculo($_GET['id_indicador'],$res_indicador[8],$conn,"variables"); 
                        $y=1;
                        for($x=1;$x<count($num_variables);$x++){
                            if(strlen($num_variables[$x]) > 2) {
                              echo "<tr>";
                              echo "<td>".$num_variables[$x]."</td>";
                              echo $res_var_arr[$x-1];    
                              echo "</tr>";
                            }
                        }
                    ?>
                
              </table>
            </div>
            <div class="col-md-5"> Grafico</div>  
          </div>
          
</div>
</div>
    </section>
</div>
<script>
function goBack(){
    console.log("called");
    window.history.back();
}
</script>
<?php

$con = $conn->conectar(1);
$sql = "SELECT c.id_proyecto, c.descripcion, c.id_tipo, c.unidad_medida, c.cantidad, c.ponderacion, r.id_dependencia, c.unidad_responsable, c.no_componente, c.ped_eje, c.ped_linea, c.ped_estrategia, c.estatus, c.prog_pres, c.cve_trasversal, c.ods FROM componentes c INNER JOIN u_responsable r ON (c.unidad_responsable = r.id_u_responsable) WHERE id_componente = ".$_GET['id_componente'];
$sql = $con->query($sql);
$con->close();
unset($con);
$componente = $sql->fetch_array();

$conex = $conn->conectar(1);
//Sacar total de ponderacion de actividades del componente
$componentes = $conex->query("SELECT ponderacion FROM componentes WHERE id_proyecto=".$_GET['id_proyecto']);
$conex->close();
unset($conex);
$total = 0;
while($medida = $componentes->fetch_array()){
  $total += $medida[0];
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>SIPLAN 2019<br><small> Editar Componente</small></h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Editar Componente | <small> <strong> Proyecto: </strong> </small></h3>
      </div>
      <div class="box-body">
        <a href="main.php?token=<?php echo md5(7); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>" class="btn-sm btn-success">
          <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Componentes</a>
          <hr>
          <h4><span class="text text-success">Editar Componente</span></h4>
          <form id="componente_form" name="componente_form" method="post" role="form" onsubmit="return guardar();">
            <div class="form-group">
              <div class="row">
                <div class="col-md-1">
                  <label>Núm</label>
                  <input type="number" id="no_componente" class="form-control" min="1" max="100" required value="<?php echo number_format($componente[8]); ?>">
                </div>
                <div class="col-md-9">
                  <label>Descripción</label>
                  <input type="text" id="nombre" class="form-control" required value="<?php echo $componente[1]; ?>">
                </div>
                <div class="col-md-2">
                  <label>Ponderación</label>
                  <input type="number" id="ponderacion" class="form-control" required placeholder="Menor o igual a <?php echo ((100 - $total) + $componente[5]); ?>" step="0.1"
                  min="1" max="<?php echo ((100 - $total) + $componente[5]); ?>"  value="<?php echo $componente[5]; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Unidad de Medida</label>
                  <select   class="form-control" id="u_medida" onchange="getTMedidas(this.value);" required>
                    <option value="">-Seleccione-</option>
                    <?php
                    $conexion = $conn->conectar(1);
                    $consulta_u_medida = $conexion->query("SELECT * FROM u_medida_prog01");
                    $conexion->close();
                    unset($conexion);
                    while($uMedida = $consulta_u_medida->fetch_array()){
                     echo "<option value='".$uMedida[0]."'>".$uMedida[0]." - ".$uMedida[1]."</option>";
                   }
                   ?>
                 </select>
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                 <label>Tipo de Medida</label>
                 <select  required class="form-control" id="tipo_unidad_medida">
                   <option value="">-Seleccione-</option>
                 </select>
               </div></div>
               <div class="col-md-3">
                 <div class="form-group">
                  <label>Cantidad</label>
                  <input type="number" id="cantidad" class="form-control" required value="<?php echo $componente[4]; ?>">
                </div>
              </div>
            </div>
            <div class="row">
             <div class="col-md-4">
               <label>Dependencia Responsable</label>
               <?php
               $conexion = $conn->conectar(1);
               $consulta_ppp = $conexion->query("SELECT clasificacion FROM proyectos WHERE id_proyecto = ".$_GET['id_proyecto']);
               $res_proyecto_ppp = $consulta_ppp->fetch_array();
               unset($consulta_ppp);
               $conexion->close();
               unset($conexion);
               if($res_proyecto_ppp[0] == 1){
                ?>
                <div class="form-group" >
                  <select class="form-control" id="dep_responsable" onchange="carga_unidades_responsables(this.value);" required>
                    <option value=''>-Seleccione-</option>
                    <?php
                    $conexion = $conn->conectar(1);
                    $consulta_deps = $conexion->query("SELECT id_dependencia,nombre FROM dependencias");
                    $conexion->close();
                    unset($conexion);
                    while($resDep = $consulta_deps->fetch_array()){
                      echo "<option value='".$resDep[0]."'>".$resDep[0]."-".$resDep[1]."</option>";
                    }
                    ?>
                  </select>
                </div>
                <?php    }else{
                  ?><div class="form-group" >
                    <select class="form-control" id="dep_responsable" onchange="carga_unidades_responsables(this.value);" required>
                      <option value=''>-Seleccione-</option>
                      <option value="<?php echo $_SESSION['id_dependencia'];?>"><?php echo $_SESSION['id_dependencia']." - ".$_SESSION['nombre_dependencia'];  ?></option>
                    </select>
                  </div>
                  <?php    }


                  ?>
                </div>
                <div class="col-md-4">
                  <div class="form-group" >
                    <label>Unidad Responsable</label>
                    <select class="form-control" id="u_responsable" required>
                      <option>-Seleccione-</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <!-- btn add unidad responsable -->
                </div>
              </div>

              <h4>Alineación PED</h4>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Eje</label>
                    <select id="eje" class="form-control" required onchange="agregalinea(this.value);">
                      <option value=""> - Seleccione -</option>
                      <?php
                      $conexion = $conn->conectar(1);
                      $cosnulta_eje = $conexion->query("SELECT e.id_eje,e.eje from eje e inner join proyectos p on (e.id_eje = p.id_eje) WHERE p.id_proyecto = ".$_GET['id_proyecto']) or die ($conexion->error);
                      $conexion->close();
                      $resEje = $cosnulta_eje->fetch_array();
                      echo "<option value='".$resEje[0]."'>".$resEje[1]."</option>";
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Línea</label>
                    <select class="form-control" id="linea" onchange="agregaestrategia(this.value);" required>
                      <option>-Seleccione-</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Estrategia</label>
                    <select class="form-control" id="estrategia" required>
                      <option>-Seleccione-</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Clasificación Programática</label>
                    <select name='prog_pres' id='prog_pres' class="form-control" required>
                      <option value="">-Seleccione-</option>
                      <?php
                      $conexion = $conn->conectar(1);
                      $con_tot_prog = $conexion->query("SELECT * FROM programas_presupuestarios") or die ($conexion->error);

                      while($rpp = $con_tot_prog->fetch_assoc()){
                        switch($rpp['id']){
                          case 1:
                          echo " <option disabled='disabled' style='background-color:#ccc;'>Subsidios: Sector Social y Privado o Entidades Federativas y Municipios </option>";
                          break;
                          case 3:
                          echo " <option disabled='disabled' style='background-color:#ccc;'>Desempeño de las Funciones </option>";
                          break;
                          case 11:
                          echo " <option disabled='disabled' style='background-color:#ccc;'>Administrativos y de Apoyo </option>";
                          break;
                          case 14:
                          echo " <option disabled='disabled' style='background-color:#ccc;'>Compromisos </option>";
                          break;
                          case 16:
                          echo " <option disabled='disabled' style='background-color:#ccc;'>Obligaciones </option>";
                          break;
                          case 20:
                          echo " <option disabled='disabled' style='background-color:#ccc;'>Programas de Gasto Federalizado (Gobierno Federal) </option>";
                          break;
                        }
                        echo " <option value='".$rpp['id']."'> ".$rpp['clave']." - ".$rpp['descripcion']." </option>";
                      }
                      ?>
                    </select>

                  </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                        <label> Transversalidad</label><br>
                            <input type="checkbox" value="1"  id="ods" onclick="carga_ods();"> Objetivos de Desarrollo Sostenible. <br>
                            <input type="checkbox" value="2"  id="psd"> Prevención Social del Delito <br>
                            <input type="checkbox" value="4"  id="nna"> Niñas, Niños y Adolescentes <br>
                        </div>
                        <div class="col-md-8" id="ods_opciones">

                            <?php if( $componente[14] == 1 || $componente[14] == 3 || $componente[14] == 5 || $componente[14] == 7 ) {
                              $ods = explode(",",$componente[15]);
                            ?>
                             <strong>Opciones ODS</strong>
<hr>
<div class="row">
    <div class="col-md-6">
        <input type="checkbox" value="1" id="ods_1" <?php if (in_array("1",$ods)){echo "checked";} ?> >&nbsp;<b>1</b> - Fin de la Pobreza<br>
        <input type="checkbox" value="2" id="ods_2" <?php if (in_array("2",$ods)){echo "checked";} ?>>&nbsp;<b>2</b> - Hambre Cero<br>
        <input type="checkbox" value="3" id="ods_3" <?php if (in_array("3",$ods)){echo "checked";} ?>>&nbsp;<b>3</b> - Salud y Bienestar<br>
        <input type="checkbox" value="4" id="ods_4" <?php if (in_array("4",$ods)){echo "checked";} ?>>&nbsp;<b>4</b> - Educación de Calidad<br>
        <input type="checkbox" value="5" id="ods_5" <?php if (in_array("5",$ods)){echo "checked";} ?> >&nbsp;<b>5</b> -  Igualdad de Género<br>
        <input type="checkbox" value="6" id="ods_6" <?php if (in_array("6",$ods)){echo "checked";} ?>>&nbsp;<b>6</b> - Agua limpia y saneamiento<br>
        <input type="checkbox" value="7" id="ods_7" <?php if (in_array("7",$ods)){echo "checked";} ?>>&nbsp;<b>7</b> - Energia Asequible y no contaminante<br>
        <input type="checkbox" value="8" id="ods_8" <?php if (in_array("8",$ods)){echo "checked";} ?>>&nbsp;<b>8</b> - Trabajo Decente y Crecimiento Económico<br>
        <input type="checkbox" value="9" id="ods_9" <?php if (in_array("9",$ods)){echo "checked";} ?> >&nbsp;<b>9</b> - Industria, Innovación e Infraestructura
    </div>
    <div class="col-md-6">
        <input type="checkbox" value="10" id="ods_10" <?php if (in_array("10",$ods)){echo "checked";} ?>>&nbsp;<b>10</b> - Reducción de las Desigualdades<br>
        <input type="checkbox" value="11" id="ods_11" <?php if (in_array("11",$ods)){echo "checked";} ?>>&nbsp;<b>11</b> - Ciudades y Comunidades Sostenibles<br>
        <input type="checkbox" value="12" id="ods_12" <?php if (in_array("12",$ods)){echo "checked";} ?>>&nbsp;<b>12</b> - Producción y Consumo Responsable<br>
        <input type="checkbox" value="13" id="ods_13" <?php if (in_array("13",$ods)){echo "checked";} ?>>&nbsp;<b>13</b> - Acción por el Clima<br>
        <input type="checkbox" value="14" id="ods_14" <?php if (in_array("14",$ods)){echo "checked";} ?>>&nbsp;<b>14</b> - Vida Submarina<br>
        <input type="checkbox" value="15" id="ods_15" <?php if (in_array("15",$ods)){echo "checked";} ?>>&nbsp;<b>15</b> - Vida de Ecosistemas Terrestres<br>
        <input type="checkbox" value="16" id="ods_16" <?php if (in_array("16",$ods)){echo "checked";} ?>>&nbsp;<b>16</b> - Paz, Justicia e Instituciones Sólidads<br>
        <input type="checkbox" value="17" id="ods_17" <?php if (in_array("17",$ods)){echo "checked";} ?>>&nbsp;<b>17</b> - Alianzas para lograr los objetivos
    </div>
</div>

                            <?php } ?>

                        </div>
                    </div>

                </div>
              </div>

              <button type="submit" class="btn btn-success"> Guardar </button>
              <button type="button" onclick="window.history.back();" class="btn btn-danger"> Cancelar </button>
            </form>
          </div>
        </div>
      </section>
    </div>

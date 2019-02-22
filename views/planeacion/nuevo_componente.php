<?php
$conexion = $conn->conectar(1);
$consulta_componentes = $conexion->query("SELECT * FROM componentes WHERE id_proyecto = ".$_GET['id_proyecto']);
$i=0;
$porcentaje = 0;
$numproyectos[$i] = 0;
while($res_componente = $consulta_componentes->fetch_array()){
  $numcomponentes[$i] = $res_componente['no_componente'];
  $i = $i+1;
  $porcentaje = $porcentaje + $res_componente['ponderacion'];
}
if(!isset($numcomponentes)){$numcomponentes = array(0);}
$totalcomponentes = count($numcomponentes);
$ponderacionmax = 100 - $porcentaje;
$conexion->close();
unset($conexion);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>SIPLAN 2019<br><small> Nuevo Componente</small></h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Nuevo Componente | <small> <strong> Proyecto: </strong> </small></h3>
      </div>
      <div class="box-body">
        <a href="main.php?token=<?php echo md5(7); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>" class="btn-sm btn-success">
          <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Componentes</a>
          <hr>
          <h4><span class="text text-success">Agregar Componente</span></h4>
          <form id="componente_form" name="componente_form" method="post" role="form" onsubmit="return guardar();">
            <div class="form-group">
              <div class="row">
                <div class="col-md-1">
                  <label>Núm</label>
                  <input type="number" id="no_componente" class="form-control" min="1" max="100" required>
                </div>
                <div class="col-md-9">
                  <label>Descripción</label>
                  <input type="text" id="nombre" class="form-control" required>
                </div>
                <div class="col-md-2">
                  <label>Ponderación</label>
                  <input type="number" id="ponderacion" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Unidad de Medida</label>
                  <select   class="form-control" id="u_medida" onchange="agregar_tipo_unidad(this.value);" required>
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
                  <input type="number" id="cantidad" class="form-control" required>
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
                  <select  id="u_responsable" class="form-control" required>
                    <option value="">-Seleccione</option>
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
                    <input type="checkbox"  value="1"  id="ods" onclick="carga_ods();"> Objetivos de Desarrollo Sostenible. <br>
                    <input type="checkbox" value="2"   id="psd"> Prevención Social del Delito <br>
                    <input type="checkbox"  value="4"  id="nna"> Niñas, Niños y Adolescentes <br>
                </div>
                <div class="col-md-8" id="ods_opciones"></div>
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

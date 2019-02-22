<?php

//Obtener actividad
$con = $conn->conectar(1);
$sql = $con->query("SELECT * FROM acciones WHERE id_accion = ".$_GET['id_actividad']);
$con->close();
unset($con);
$actividad = $sql->fetch_array();

$conex = $conn->conectar(1);
//Sacar total de ponderacion de actividades del componente
$acciones = $conex->query("SELECT ponderacion FROM acciones WHERE id_componente=".$_GET['id_componente']);
$conex->close();
unset($conex);
$total = 0;
while($medida = $acciones->fetch_array()){
  $total += $medida[0];
}

$co = $conn->conectar(1);
$query = $co->query("SELECT * FROM metas where id_accion = ". $_GET['id_actividad']);
$co->close();
unset($co);
$meta = $query->fetch_array();
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>SIPLAN 2019<br><small> Editar Actividad</small></h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Editar Actividad | <small> <strong> Proyecto: </strong> </small></h3>
      </div>
      <div class="box-body">
        <a href="main.php?token=<?php echo md5(10); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>" class="btn-sm btn-success">
          <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Actividades</a>
          <hr>
          <h4><span class="text text-success">Editar Actividad</span></h4>
          <form id="actividad_form" name="actividad_form" method="post" role="form" onsubmit="return guardar();">
            <div class="row">
              <div class="form-group">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                  <input type="checkbox" class="minimal-red" size="4" class="form-control" id="prespectiva">
                  &nbsp;Perspectiva de Género
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-2">
                  <label>Núm</label>
                  <input type="number" id="num" class="form-control" required min="1" max="99" value="<?php echo (int)$actividad[10]; ?>">
                </div>
                <div class="col-md-10">
                  <label>Nombre de Actividad</label>
                  <input type="text" id="nombre" class="form-control" required value="<?php echo $actividad[4]; ?>">
                </div>
                <div class="col-md-12">
                  <label>Descripción de Actividad</label>
                  <textarea id="descripcion" class="form-control" required rows="2"><?php echo $actividad[12]; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-7">
                  <div class="col-md-4">
                    <label>Tipo de Actividad</label>
                    <select  required class="form-control" id="tipo_descripcion">
                      <option value="">-Seleccione-</option>
                      <option value="Insumo">Insumo</option>
                      <option value="Producto">Producto</option>
                      <option value="Mecanismo">Mecanismo</option>
                      <option value="Control">Control</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Unidad de Medida</label>
                    <select  required class="form-control" id="u_medida" onchange="getTMedidas(this.value);">
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
                  <div class="col-md-4">
                    <label>Tipo de Medida</label>
                    <select  required class="form-control" id="tipo_med">
                      <option value="">-Seleccione-</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>Cantidad</label>
                    <input type="number" id="cantidad" class="form-control" required step="0.1" value="<?php echo $actividad[7]; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>Ponderación</label>
                    <input type="number" id="ponderacion" class="form-control" required placeholder="Menor o igual a <?php echo ((100 - $total) + $actividad[8]); ?>" step="0.1"
                    min="1" max="<?php echo ((100 - $total) + $actividad[8]); ?>" value="<?php echo $actividad[8]; ?>">
                  </div>
                </div>               
                <div class="col-md-5">
                  <h4>Relación con el PED 2016 - 2021</h4>
                  <?php
                  $conexion = $conn->conectar(1);
                  $cosnulta_eje = $conexion->query("SELECT e.id_eje, e.eje from eje e inner join proyectos p on (e.id_eje = p.id_eje) WHERE p.id_proyecto = ".$_GET['id_proyecto']) or die ($conexion->error);
                  $conexion->close();
                  $resEje = $cosnulta_eje->fetch_array();
                  echo "<h5>Eje: <b>$resEje[1]</b></h5>";
                  ?>
                  <?php
                  $conexion = $conn->conectar(1);
                  $cosnulta_linea = $conexion->query("SELECT l.id_linea, l.nombre from linea l inner join proyectos p on (l.id_linea = p.id_linea) WHERE p.id_proyecto = ".$_GET['id_proyecto']) or die ($conexion->error);
                  $conexion->close();
                  $resLin = $cosnulta_linea->fetch_array();
                  echo "<h5>Linea: <b>$resLin[1]</b></h5>";
                  ?>
                  <div class="col-md-2">
                    <h5>Estrategia: </h5>
                  </div>
                  <div class="col-md-10">
                    <select  required class="form-control" id="ped">
                      <option value="">-Seleccione-</option>
                      <?php
                      $conexion = $conn->conectar(1);
                      $estrategias = $conexion->query("SELECT id_estrategia, nombre FROM estrategias where id_linea = $resLin[0]");
                      $conexion->close();
                      unset($conexion);
                      while($est = $estrategias->fetch_array()){
                        echo "<option value='".$est[0]."'>".$est[1]."</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <h3 align="center">Metas</h3>
            <div class="row">
              <div class="col-md-12">
                <table width="100%" cellpadding="1" cellspacing="0" style="border-radius: 5px;">
                  <tbody><tr bgcolor="#99CC66">
                    <td>Enero</td>
                    <td>Febrero</td>
                    <td>Marzo</td>
                    <td>Abril</td>
                  </tr>
                  <tr bgcolor="#DFFFBF">
                    <td><input name="m1" type="number" id="m1" class="form-control" step="0.1" value="<?php echo $meta[2]; ?>"></td>
                    <td><input name="m2" type="number" id="m2" class="form-control" step="0.1" value="<?php echo $meta[3]; ?>"></td>
                    <td><input name="m3" type="number" id="m3" class="form-control" step="0.1" value="<?php echo $meta[4]; ?>"></td>
                    <td><input name="m4" type="number" id="m4" class="form-control" step="0.1" value="<?php echo $meta[5]; ?>"></td>
                  </tr>
                  <tr bgcolor="#99CC66">
                    <td>Mayo</td>
                    <td>Junio</td>
                    <td>Julio</td>
                    <td>Agosto</td>
                  </tr>
                  <tr bgcolor="#DFFFBF">
                    <td><input name="m5" type="number" id="m5" class="form-control" step="0.1" value="<?php echo $meta[6]; ?>"></td>
                    <td><input name="m6" type="number" id="m6" class="form-control" step="0.1" value="<?php echo $meta[7]; ?>"></td>
                    <td><input name="m7" type="number" id="m7" class="form-control" step="0.1" value="<?php echo $meta[8]; ?>"></td>
                    <td><input name="m8" type="number" id="m8" class="form-control" step="0.1" value="<?php echo $meta[9]; ?>"></td>
                  </tr>
                  <tr bgcolor="#99CC66">
                    <td>Septiembre</td>
                    <td>Octubre</td>
                    <td>Noviembre</td>
                    <td>Diciembre</td>
                  </tr>
                  <tr bgcolor="#DFFFBF">
                    <td><input name="m9" type="number" id="m9" class="form-control" step="0.1" value="<?php echo $meta[10]; ?>"></td>
                    <td><input name="m10" type="number" id="m10" class="form-control" step="0.1" value="<?php echo $meta[11]; ?>"></td>
                    <td><input name="m11" type="number" id="m11" class="form-control" step="0.1" value="<?php echo $meta[12]; ?>"></td>
                    <td><input name="m12" type="number" id="m12" class="form-control" step="0.1" value="<?php echo $meta[13]; ?>"></td>
                  </tr>
                </tbody></table>
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success"> Guardar </button>
            <button type="button" onclick="window.history.back();" class="btn btn-danger"> Cancelar </button>
          </form>
        </div>
      </div>
    </section>
  </div>

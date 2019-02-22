<div class="content-wrapper">
  <!-- -->
  <section class="content-header">
    <h1>SIPLAN 2019<br>
      <small> Actividades</small>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Listado de Actividades - <small><?php echo $_SESSION['nombre_dependencia']; ?> 
        </small>
      </h3>
    </div>
    <div class="box-body">
      <ul class="nav nav-pills">
        <li>
          <button onclick="window.location.href='main.php?token=<?php echo md5(7); ?>&id_proyecto=<?php echo $_GET['id_proyecto'];?>'" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp; Lista de Componentes
          </button>
        </li>
        <?php
        $conex = $conn->conectar(1);
        $acciones = $conex->query("SELECT ponderacion FROM acciones");
        $conex->close();
        unset($conex);
        $total = 0;
        while($medida = $acciones->fetch_array()){
          $total += $medida[0];
        }
        if (100 > $total) {
          ?>
          <li>
            <button  class="btn btn-success" onclick="window.location.href='main.php?token=<?php echo md5(11); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>'"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Actividad</button>
          </li>
          <?php
        }else{
          ?>
          <li>
            <button  class="btn btn-success" onclick="" disabled><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Actividad</button>
          </li>
          <?php
        }
        ?>
        <li>
          <button class="btn bg-navy" onclick="window.open('rpts/general_proyectos.php')"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</button>
        </li>
        <li>
          <button class="btn bg-olive" onclick="window.open('rpts/general_proyectos_xls.php');"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</button>
        </li>
      </ul>
      <hr>
      <table id="example1" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th><small>No.</small></th>
            <th><small>Descripción</small></th>
            <th><small>Unidad de Medida</small></th>
            <th><small>Cantidad</small></th>
            <th><small>Indicadores</small></th>
            <th><small>Candelarización</small></th>
            <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
            <th><small>Editar</small></th>
            <th><small>Eliminar</small></th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $conexion =$conn->conectar(1);
          $actividades = $conexion->query("SELECT
            a.id_accion,
            a.no_accion,
            a.descripcion,
            m.nombre,
            a.cantidad,
            a.ponderacion
            FROM
            acciones a
            INNER JOIN u_medida_prog01 m ON(a.unidad_medida = m.id_unidad)
            WHERE id_proyecto = ".$_GET['id_proyecto']." and id_componente = ".$_GET['id_componente']) or die ($conexion->error);
          $conexion->close();
          unset($conexion);
          while ($actividad = $actividades->fetch_array()) { ?>
          <tr>
            <td><?php echo $actividad[1]; ?></td>
            <td><?php echo $actividad[2]; ?></td>
            <td><?php echo $actividad[3]; ?></td>
            <td><?php echo number_format($actividad[4]); ?></td>
            <td><a class="text text-navy" href="main.php?token=<?php echo md5(12); ?>&id_proyecto=<?php  echo $_GET['id_proyecto']; ?>&id_componente=<?php  echo $_GET['id_componente']; ?>&id_actividad=<?php echo $actividad[0]; ?>&tipo=Actividad"> <i class="fa fa-line-chart" aria-hidden="true"></i> </a></td>
            <td><a class="text text-navy" data-toggle="modal" href="#mMetas" data-id = "<?php echo $actividad[0]; ?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a></td>
            <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
            <td><a class="text text-orange" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="window.location.href='main.php?token=<?php echo md5(13); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>&id_actividad=<?php echo $actividad[0]; ?>'"></i></a></td>
            <td><a class="text text-danger" href="#" onclick="borrar(<?php echo $actividad[0] ?>);"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            <?php } ?>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot>
         <tr>
           <th><small>No.</small></th>
           <th><small>Descripción</small></th>
           <th><small>Unidad de Medida</small></th>
           <th><small>Cantidad</small></th>
           <th><small>Indicadores</small></th>
           <th><small>Candelarización</small></th>7
           <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
           <th><small>Editar</small></th>
           <th><small>Eliminar</small></th>
           <?php } ?>
         </tr>
       </tfoot>
     </table>
   </div>
 </div>
</section>
</div>
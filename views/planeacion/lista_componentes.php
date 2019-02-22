<div class="content-wrapper">
  <section class="content-header">
    <h1>SIPLAN 2019<br>
      <small> Componentes</small>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Listado de Componentes - <small><?php echo $_SESSION['nombre_dependencia']; ?></small></h3>
      </div>
      <div class="box-body">
        <ul class="nav nav-pills">
          <li>
            <button onclick="window.location.href='main.php?token=<?php echo(md5(1));?>'" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp; Programas Presupuestarios </button></li>

            <?php
            $conex = $conn->conectar(1);
            $acciones = $conex->query("SELECT ponderacion FROM componentes WHERE id_proyecto=".$_GET['id_proyecto']);
            $conex->close();
            unset($conex);
            $total = 0;
            while($medida = $acciones->fetch_array()){
              $total += $medida[0];
            }
            if ($total >= 100) {
              ?>
              <li>
                <button  class="btn btn-success" onclick="" disabled><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Componente</button>
              </li>
              <?php
            }else{
              ?>
              <li>
                <button  class="btn btn-success" onclick="window.location.href='main.php?token=<?php echo md5(8); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>'"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Componente</button>
              </li>
              <?php
            }
            ?>
            <li><button class="btn bg-navy" onclick="window.open('rpts/general_proyectos.php')"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</button></li>
            <li><button class="btn bg-olive" onclick="window.open('rpts/general_proyectos_xls.php');"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</button></li>
          </ul>
          <hr>
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th><small>No.</small></th>
                <th><small>Nombre</small></th>
                <th><small>Ponderación</small></th>
                <th><small>Indicadores</small></th>
                <th><small>Actividades</small></th>
                <th><small>Info.</small></th>
                <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
                <th><small>Editar</small></th>
                <th><small>Eliminar</small></th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $conexion =$conn->conectar(1);
              $consulta_componentes = $conexion->query("SELECT
                id_componente,
                no_componente,
                descripcion,
                ponderacion
                FROM
                componentes
                WHERE id_proyecto = ".$_GET['id_proyecto']." ORDER BY no_componente ASC") or die ($conexion->error);

               $Query_estatus_pr = $conexion->query("SELECT estatus FROM proyectos WHERE id_proyecto = ".$_GET['id_proyecto']) or die ($conexion->error);
               $estatus_pr = $Query_estatus_pr->fetch_array(MYSQLI_NUM);

              unset($Query_estatus_pr);

              $conexion->close();
              unset($conexion);

              while ($rescomponentes = $consulta_componentes->fetch_array()) { ?>

              <tr>
                <td><?php echo (int)$rescomponentes[1]; ?></td>
                <td><?php echo $rescomponentes[2]; ?></td>
                <td><?php echo $rescomponentes[3]; ?> %</td>
                <td><a class="text text-navy" href="main.php?token=<?php echo md5(9); ?>&id_proyecto=<?php  echo $_GET['id_proyecto']; ?>&id_componente=<?php  echo $rescomponentes[0]; ?>"> <i class="fa fa-line-chart" aria-hidden="true"></i> </a></td>
                <td><a class="text text-navy" href="main.php?token=<?php echo md5(10); ?>&id_proyecto=<?php echo $_GET['id_proyecto'];?>&id_componente=<?php echo $rescomponentes[0]; ?>"> <i class="fa fa-list-alt" aria-hidden="true"></i>  </a></td>
                <td><a class="text text-navy" href="#"> <i class="fa fa-info-circle" aria-hidden="true"></i>  </a></td>
                <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>

                  <?php if($_SESSION['id_perfil'] == 2 and $estatus_pr[0] == 0) { ?>
                <td><a class="text text-orange" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="window.location.href='main.php?token=<?php echo md5(16); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $rescomponentes[0]; ?>'"></i></a> </td>
                <td><a class="text text-danger" href="#" onclick="borrar(<?php echo $rescomponentes[0] ?>);"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  <?php } ?>

                        <?php if($_SESSION['id_perfil'] == 2 and $estatus_pr[0] != 0) { ?>
                <td><a class="text text-gray"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td><a class="text text-gray"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  <?php } ?>

                    <?php if( ($_SESSION['id_perfil'] == 1 or $_SESSION['id_perfil'] == 3 ) and $estatus_pr[0] == 0) { ?>
                <td><a class="text text-gray"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td><a class="text text-gray"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  <?php } ?>



                              <?php if( ($_SESSION['id_perfil'] == 1 or $_SESSION['id_perfil'] == 3 ) and $estatus_pr[0] != 0) { ?>
                <td><a class="text text-orange" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="window.location.href='main.php?token=<?php echo md5(16); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $rescomponentes[0]; ?>'"></i></a></td>
                <td><a class="text text-danger" href="#" onclick="borrar(<?php echo $rescomponentes[0] ?>);"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  <?php } ?>



                <?php } ?>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
             <tr>
              <th><small>No.</small></th>
              <th><small>Nombre</small></th>
              <th><small>Ponderación</small></th>
              <th><small>Indicadores</small></th>
              <th><small>Actividades</small></th>
              <th><small>Info.</small></th>
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

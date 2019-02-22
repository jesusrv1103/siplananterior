<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIPLAN 2019<br>
      <small> Programas Presupuestarios - Indicadores Fin y Propósito</small>
    </h1>
  </section>
  <section class="content">


    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Indicadores Componente</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive ">

            <ul class="nav nav-pills">
              <li><button onclick="nuevo_indicador_componente();" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Indicador </button></li>
              <li><button class="btn btn-success" onclick="window.location.href='main.php?token=8f14e45fceea167a5a36dedd4bea2543&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>'">Regresar a Lista de Componentes</button></li>
            </ul>
            <hr>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Indicador</th>
                  <th>Meta</th>
                  <th>U. Medida</th>
                  <th>Sentido</th>
                  <th>Info</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $prog = $conn->conectar(1);
                $_prog = $prog->query("SELECT estatus FROM proyectos WHERE id_proyecto =".$_GET['id_proyecto'])or die($prog->error);
                $prog->close();
                unset($prog);
                $data_prog = $_prog->fetch_array();

                $conexion = $conn->conectar(1);
                $indicadores_fin_query = $conexion->query("SELECT
                  i.id_indicador,
                  i.nombre,
                  i.meta,
                  i.u_medida,
                  s.sentido
                  FROM indicadores i 
                  INNER JOIN sentido_indicador s
                  ON i.sentido = s.id_sentido 
                  WHERE i.id_proyecto = ".$_GET['id_proyecto']." AND id_componente = ".$_GET['id_componente']." AND i.nivel_indicador = 3 ") or die($conexion->error);
                $conexion->close();
                unset($conexion);
                $contador = 0;
                while($res_indicador_fin = $indicadores_fin_query->fetch_array()){
                  $contador++;
                  ?>
                  <tr>
                    <td><?php echo $contador;?></td>
                    <td><?php echo $res_indicador_fin[1]; ?></td>
                    <td><?php echo $res_indicador_fin[2]; ?></td>
                    <td><?php echo $res_indicador_fin[3]; ?></td>
                    <td><?php echo $res_indicador_fin[4]; ?></td>

                    <td><a class="text text-navy" href="main.php?token=<?php echo md5(18); ?>&id_indicador=<?php echo $res_indicador_fin[0]; ?>"> <i class="fa fa-info-circle" aria-hidden="true"></i>  </a></td>
                    
                    <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 3) {  ?>
                    <td><a class="text text-orange" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="window.location.href='main.php?token=<?php echo md5(15); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>&id_indicador=<?php echo $res_indicador_fin[0]; ?>&tipo=Componente'"></i></a></td>
                    <td>
                      <a class="text text-danger" href="#" onclick="borrar(<?php echo $res_indicador_fin[0] ?>);">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                    <?php  }elseif($_SESSION['id_perfil'] == 2 && $data_prog[0] == 0){ ?>
                    <td><a class="text text-orange" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" onclick="window.location.href='main.php?token=<?php echo md5(15); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>&id_indicador=<?php echo $res_indicador_fin[0]; ?>&tipo=Componente'"></i></a></td>
                    <td>
                      <a class="text text-danger" href="#" onclick="borrar(<?php echo $res_indicador_fin[0] ?>);">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                    <?php }else{ ?>
                    <td><a class="text text-gray" href="#" style="pointer-events: none; cursor: default;"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a></td>
                    <td>
                      <a class="text text-gray" href="#" style="pointer-events: none; cursor: default;">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </td>
                    <?php } ?>
                  </tr>
                  <?php } unset($contador); ?>
                </tbody>

                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Indicador</th>
                    <th>Meta</th>
                    <th>U. Medida</th>
                    <th>Sentido</th>
                    <th>Info</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </tfoot>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>





    </section>
  </div>
  <script>
    function nuevo_indicador_componente(){
      location.href = "main.php?token=<?php echo md5(6); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>&tipo=Componente";
    }


  </script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIPLAN 2019<br>
      <small> Unidades Responsables</small>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Listado de Unidades Responsables | <small><?php echo $_SESSION['nombre_dependencia']; ?></small></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="nav nav-pills">
          <li>
            <button class="btn btn-success" data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Unidad Responsable </button></li>
            <li><button class="btn bg-navy" onclick="window.open('rpts/general_proyectos.php')"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</button></li>
            <li><button class="btn bg-olive" onclick="window.open('rpts/general_proyectos_xls.php');"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</button></li>
          </ul>
          <hr>
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th><small>No.</small></th>
                <th><small>Clave</small></th>
                <th><small>Unidad Responsable</small></th>
                <th><small>Titular</small></th>
                <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
                <th><small>Editar</small></th>
                <th><small>Eliminar</small></th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <?php
            $conexion = $conn->conectar(1);
            $query_unidades = $conexion->query("SELECT * FROM u_responsable WHERE id_dependencia = ".$_SESSION['id_dependencia']." ORDER BY no_u_responsable ASC") or die($conexion->error);
            $contador = 1;
            while($res_unidades = $query_unidades->fetch_array()){
              ?>
              <tr>
               <td><?php echo $contador; ?></td>
               <td><?php echo $res_unidades[2]; ?></td>
               <td><?php echo $res_unidades[3]; ?></td>
               <td><?php echo $res_unidades[4]; ?></td>
               <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
               <td><a class="text text-orange" data-toggle="modal" href="#mResponsable" data-id = "<?php echo $res_unidades[0]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

               <td><a class="text text-danger" href="#" onclick="borrar(<?php echo $res_unidades[0] ?>);"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
               <?php $contador++; } ?>
             </tr>
             <?php    }
             ?>
             <tfoot>
                <tr>
                <th><small>No.</small></th>
                <th><small>Clave</small></th>
                <th><small>Unidad Responsable</small></th>
                <th><small>Titular</small></th>
                <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
                <th><small>Editar</small></th>
                <th><small>Eliminar</small></th>
                <?php } ?>
              </tr>
           </tfoot>
         </table>
       </div></div>
     </section>
   </div>

   <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agregar Unidad Responsable</h4>
          </div>
          <div class="modal-body">
            <form role="form" onsubmit="return guardar_uresponsable();">
              <div class="form-group">
                <label>Unidad Responsable</label>
                <input name="u_responsable" type="text" id="u_responsable" value="" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Titular</label>
                <input name="titular" type="text" id="titular" value="" s class="form-control" required />
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" onclick="guardar_u_responsable();">Guardar Cambios</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal inmodal" id="mResponsable" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
            <h4 class="modal-title" align="center">Editar Unidad Responsable</h4>
          </div>
          <div class="modal-body">
            <form role="form" onsubmit="return update();">
              <div class="form-group">
                <label>Unidad Responsable</label>
                <input name="uresponsable" type="text" id="uresponsable" value="" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Titular</label>
                <input name="utitular" type="text" id="utitular" value="" s class="form-control" required />
              </div>
              <input type="hidden" id="id_responsable">
            </form>
            <br>
            <button type="button" class="btn btn-primary btn-block" onclick="update();">Guardar</button>
          </div>
        </div>
      </div>
    </div>
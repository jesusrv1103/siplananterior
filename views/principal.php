<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SIPLAN 2019
        <small>Bienvenido</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">


      <!-- /.row -->
    <div class="row">
     <div class="col-md-6">
<?php
        $conexion = $conn->conectar(1);
  $consulta_programas = $conexion->query("
  SELECT
  (select count(*) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia'].") as totales,
  (select count(*) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia']." and estatus = 1) as aprobados,
  (select count(*) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia']." and estatus = 2) as coepla,
  (select count(*) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia']." and estatus = 0) as sin_aprobar
  ") or die ($conexion->error);
   $contados = $consulta_programas->fetch_array();
        $conexion->close();
         unset($conexion);
?>
<h4>Programas Presupuestarios</h4>
            <ul class="list-group">
           <li class="list-group-item"><span class="badge"><?php echo $contados[0]; ?></span> Programas Presupuestarios de la Dependencia: </li>
            <li class="list-group-item"><span class="badge bg-yellow"><?php echo $contados[2]; ?></span> Aprobados por la COEPLA: </li>
            <li class="list-group-item"><span class="badge bg-green"><?php echo $contados[1]; ?></span> Aprobados por la Dependencia: </li>
            <li class="list-group-item"><span class="badge bg-red"><?php echo $contados[3]; ?></span> Sin Aprobar: </li></ul>
           <small> Información de Programas Presupuestarios para el ejercicio 2019.</small><hr>

     </div>
    <div class="col-md-6">
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Avisos Importantes</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              $conexion = $conn->conectar(1);
              $consulta_uresponsables = $conexion->query("select count(*) FROM u_responsable WHERE id_dependencia = ".$_SESSION['id_dependencia']) or die($conexion-error);
              $res_u_responsables = $consulta_uresponsables->fetch_array();
              $conexion->close();
             unset($conexion);
              if($res_u_responsables[0] == 0){
              ?>

                 <div class="callout callout-danger">
                <h4>Atención</h4>

                <p>No se tienen agregadas unidades responsables de la dependencia. Vaya a "Catalogo->Unidades Responsables" para agregarlas.</p>
              </div>

             <?php  }

                $conexion = $conn->conectar(1);
              $consulta_me = $conexion->query("select count(*) FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia']) or die($conexion-error);
              $res_u_me = $consulta_me->fetch_array();
              $conexion->close();
             unset($conexion);
              if($res_u_me[0] == 0){

                ?>


                 <div class="callout callout-warning">
                <h4>Atención</h4>

                <p>Para aprobar el/los proyecto(s) es necesario tener capturado su Marco Estrategico, esto lo puede hacer  en "Planeación->Programas Presupuestarios->Marco Estratégico". </p>
              </div>

             <?php  } ?>
                <hr>
                <div><button class="btn bg-maroon" onclick="showAyuda();"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> | &nbsp;Documento de Ayuda SIPLAN 2019</button></div>
                <br>
                <div><button class="btn bg-maroon" onclick="showModal();"><i class="fa fa-window-restore" aria-hidden="true"></i> | &nbsp;Proceso de Captura SIPLAN 2019</button></div>
                <br>
                <div><button class="btn bg-maroon" onclick="showModal2();"><i class="fa fa-window-restore" aria-hidden="true"></i> | &nbsp;Proceso General Programas Presupuestarios</button></div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    <!-- /.content -->




    </div>


      </section>
    <!-- /.content -->
  </div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span class="text-red">&times;</span></button>
        <h4 class="modal-title">Proceso de Captura</h4>
      </div>
      <div class="modal-body">
        <img src="img/proceso_2019.png" width="100%" class="img-responsive">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span class="text-red">&times;</span></button>
        <h4 class="modal-title">Proceso de Captura</h4>
      </div>
      <div class="modal-body">
        <img src="img/Proceso_General_Programas_Presupuestarios.png" width="100%" class="img-responsive">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<script>
function showModal(){
    $('#myModal').modal();
}
 
function showModal2(){
    $('#myModal2').modal();
}    
function showAyuda(){
    window.open("documentos/SIPLAN_2019.pdf", '_blank');
}    
</script>
<?php
$conexion = $conn->conectar(1);
$consulta_marco = $conexion->query("SELECT HIGH_PRIORITY count(*) FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia']." AND ejercicio = ".$_SESSION['ejercicio']);
$res_marco = $consulta_marco->fetch_array();
$conexion->close();
unset($conexion);
unset($consulta_marco);
if($res_marco[0]==0){
  echo "<script type='text/javascript'>
  alert('Para aprobar sus Programas Presupuestarios primero debe completar el Marco Estrat\u00e9gico');
  </script>";
}
?>
<script type="text/JavaScript">
  function eliminar_proyecto(a){
   r=confirm("\u00bf Desea eliminar el Programa Presupuestario?");
   if(r){
    location.href="main.php?token=<?php echo md5(27); ?>&id_proyecto="+a;
  }

}
function ponderacion_full(){
  alert("Ponderaci\u00f3n completa, elimine o edite otro(s) Programa(s) Presupuestario(s)")
}
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIPLAN 2019<br>
      <small> Programas Presupuestarios</small>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Listado de Programas Presupuestarios - <small><?php echo $_SESSION['nombre_dependencia']; ?></small></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="nav nav-pills">
          <li>
            <button onclick="window.location.href='main.php?token=<?php echo(md5(2));?>'" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>&nbsp;Marco Estrategico </button></li>
            <?php
            $conulta_pondera_proyectos = "SELECT HIGH_PRIORITY sum(ponderacion) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia'];
            $conexion = $conn->conectar(1);
            $EjecutarConsulta = $conexion->query($conulta_pondera_proyectos);
            $res_pondera = $EjecutarConsulta->fetch_array();
            $conexion->close();
            unset($conexion);
            unset($EjecutarConsulta);
            if($res_pondera[0] >= 100){
              ?>
              <li><button  onclick="ponderacion_full();" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Programa Presupuestario</button></li>
              <?php
            }else{
              ?>
              <li><button class="btn btn-success" onclick="window.location.href='main.php?token=<?php echo md5(4); ?>'"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Programa Presupuestario</button></li>
              <?php } unset($res_pondera); ?>


              <li><button class="btn bg-navy" onclick="window.open('rpts/general_proyectos.php')"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</button></li>
              <li><button class="btn bg-olive" onclick="window.open('rpts/general_proyectos_xls.php');"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</button></li>
            </ul>
            <hr>
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th><small>No.</small></th>
                  <th><small>Nombre</small></th>
                  <th><small>PPP</small></th>
                  <th><small>Estatus</small></th>
                  <th><small>Ponderación</small></th>
                  <th><small>Indicadores</small></th>
                  <th><small>Componentes</small></th> 
                  <th><small>Info.</small></th>
                  <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
                  <th><small>Aprobar</small></th>
                  <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 3) {  ?>
                  <th><small>Rechazar</small></th>
                  <?php } ?>
                  <th><small>Editar</small></th>
                  <?php // <th><small>Eliminar</small></th>  ?>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $conexion =$conn->conectar(1);
                $consulta_proyectos = $conexion->query("SELECT HIGH_PRIORITY
                  pr.id_proyecto as id_proyecto,
                  pr.no_proyecto as no_proyecto,
                  pr.nombre as nombre,
                  pr.clasificacion as clasificacion,
                  pr.ponderacion as ponderacion,
                  pr.estatus as estatus,
                  pr.ponderacion
                  FROM
                  proyectos as pr
                  WHERE pr.id_dependencia =".$_SESSION['id_dependencia']);
                $conexion->close();
                unset($conexion);

                while ($resproyectos = $consulta_proyectos->fetch_assoc()) { ?>

                <tr>
                  <td><?php echo $resproyectos['no_proyecto']; ?></td>
                  <td><?php echo $resproyectos['nombre']; ?></td>
                  <td><?php if($resproyectos['clasificacion'] == 1){echo '<span class="text text-success">  <i class="fa fa-check-circle" aria-hidden="true"></i> </span>'; }else{ echo "-"; }  ?></td>
                  <td>
                    <?php switch ($resproyectos['estatus']){
                     case 0:
                     echo '<span class="text text-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Sin aprobar</span>';
                     break;
                     case 1:
                     echo '<span class="text text-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Aprob. Dep.</span>';
                     break;
                     case 2:
                     echo '<span class="text text-success"><i class="fa fa-check-circle" aria-hidden="true"></i>Aprob. COEPLA</sapn>';
                     break;
                     case 3:
                     echo "Inactivo";
                     break;
                   } ?>
                 </td>
                 <td><?php echo $resproyectos['ponderacion']; ?> %</td>
                 <td><a class="text text-navy" href="main.php?token=<?php echo md5(5); ?>&id_proyecto=<?php  echo $resproyectos['id_proyecto']; ?>"> <i class="fa fa-line-chart" aria-hidden="true"></i> </a></td>
                 <td><a class="text text-navy" href="main.php?token=<?php echo md5(7); ?>&id_proyecto=<?php  echo $resproyectos['id_proyecto']; ?>"> <i class="fa fa-list-alt" aria-hidden="true"></i>  </a></td>
                 <td><a class="text text-navy" href="main.php?token=<?php echo md5(17); ?>&id_proyecto=<?php  echo $resproyectos['id_proyecto']; ?>"> <i class="fa fa-info-circle" aria-hidden="true"></i>  </a></td>
                 <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>

                 <?php
                     // ===== Dependencia estatus no aprobado ===//
                 if( $_SESSION['id_perfil'] == 2 and $resproyectos['estatus'] == 0  ) {  ?>
                 <td><a class="text text-success" href="javascript:aprobar_proyecto(<?php echo $resproyectos['id_proyecto']; ?>,0)"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
                 <td><a class="text text-orange" href="main.php?token=<?php echo md5(14); ?>&id_proyecto=<?php echo $resproyectos['id_proyecto']; ?>
                  "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

                  <?php
                     /*  <td><a class="text text-danger" href="javascript:eliminar_proyecto(<?php echo $resproyectos['id_proyecto']; ?>);"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                   */  } ?>

                   <?php
                            // ===== Dependencia estatus aprobado dep ===//
                   if( $_SESSION['id_perfil'] == 2 and $resproyectos['estatus'] != 0  ) {  ?>
                   <td><a class="text text-gray"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
                   <td><a class="text text-gray"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

                   <?php /*<td><a class="text text-gray"><i class="fa fa-trash" aria-hidden="true"></i></a></td> */
                 } ?>

                 <?php if( ($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 3 ) and $resproyectos['estatus'] == 0  ) {  ?>
                 <td><a class="text text-gray"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
                 <td><span class="text text-gray"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></td>
                 <td><a class="text text-gray"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

                     <?php //<td><a class="text text-gray"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                   } ?>

                   <?php if( ($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 3  ) and $resproyectos['estatus'] != 0  ) {  
                    if($resproyectos['estatus'] == 2){?>
                    <td><a class="text text-gray"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
                    <?php }else{ ?>
                    <td><a class="text text-success" href="javascript:aprobar_proyecto(<?php echo $resproyectos['id_proyecto']; ?>,1)"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
                    <?php } ?>
                    <td><a class="text text-red" href="javascript:rechazar_proyecto(<?php echo $resproyectos['id_proyecto']; ?>)"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                    <td><a class="text text-orange" href="main.php?token=<?php echo md5(14); ?>&id_proyecto=<?php echo $resproyectos['id_proyecto']; ?>
                      "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>



                     <?php //<td><a class="text text-gray"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                   } ?>







                   <?php } ?>
                 </tr>
                 <?php } ?>
               </tbody>
               <tfoot>
                <tr>
                  <th><small>No.</small></th>
                  <th><small>Nombre</small></th>
                  <th><small>PPP</small></th>
                  <th><small>Estatus</small></th>
                  <th><small>Ponderación</small></th>
                  <th><small>Indicadores</small></th>
                  <th><small>Componentes</small></th> 
                  <th><small>Info.</small></th>
                  <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
                  <th><small>Aprobar</small></th>
                  <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 3) {  ?>
                  <th><small>Rechazar</small></th>
                  <?php } ?>
                  <th><small>Editar</small></th>
                  <?php /* <th><small>Eliminar</small></th> */ ?>
                  <?php } ?>
                </tr>


              </tfoot>
            </table>
          </div></div>
        </section>
      </div>

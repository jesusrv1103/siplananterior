<div class="content-wrapper">
  <!-- -->
  <section class="content-header">
    <h1>SIPLAN 2019<br>
      <small> Programas Presupuestarios</small>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
      <?php if($_SESSION['id_perfil'] == 2) { ?>
          <h3 class="box-title">Reporte Programas Presupuestarios - <small><?php echo $_SESSION['nombre_dependencia']; ?></small></h3>
      <?php }else { ?>
           <h3 class="box-title">Reporte Programas Presupuestarios</h3>
      <?php } ?>

    </div>
    <div class="box-body">
           <?php if($_SESSION['id_perfil'] == 2) { ?>

           <hr>
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th><small>Sector</small></th>
                  <th><small>Dependencia</small></th>
                  <th><small>PED</small></th>
                  <th><small>PPP</small></th>
                  <th><small>Num</small></th>
                  <th><small>Programa</small></th>
                  <th><small>Estatus</small></th>
                 <th><small>U.Medida</small></th>
                 <th><small>Meta Anual</small></th>
                 <th><small>Meta Sem</small></th>
                 <th><small>Ben. M</small></th>
                    <th><small>Ben. H</small></th>
                     <th><small>Info.</small></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $conexion =$conn->conectar(1);
                $consulta_proyectos = $conexion->query("SELECT
                  pr.id_proyecto as id_proyecto,
                  se.sector as sector,
                  dep.acronimo as dependencia,
                  est.nombre as ped,
                  pr.clasificacion as ppp,
                  pr.no_proyecto as no_proyecto,
                  pr.nombre as nombre,
                  pr.estatus as estatus,
                  pr.unidad_medida as u_medida,
                  pr.cantidad as anual,
                  pr.prog_sem as semestral,
                  pr.beneficiarios_h as ben_h,
                  pr.beneficiarios_m as ben_m
                  FROM
                  proyectos as pr
                  inner join dependencias dep on (pr.id_dependencia = dep.id_dependencia)
                  inner join sectores se on (dep.id_sector = se.id_sector)
                  inner join estrategias est on (pr.id_estrategia = est.id_estrategia)
                  WHERE pr.id_dependencia =".$_SESSION['id_dependencia']." order by pr.no_proyecto ASC") or die ($conexion->error);
                $conexion->close();
                unset($conexion);

                while ($resproyectos = $consulta_proyectos->fetch_assoc()) { ?>

                <tr>
                  <td><?php echo $resproyectos['sector']; ?></td>
                  <td><?php echo $resproyectos['dependencia']; ?></td>
                   <td><?php
                            $ped_num = explode(" ",$resproyectos['ped']);
                            echo $ped_num[0];
                            unset($ped_num);
                       ?></td>
                  <td><?php if($resproyectos['ppp'] == 1){echo '<span class="text text-success">  <i class="fa fa-check-circle" aria-hidden="true"></i> </span>'; }else{ echo "-"; }  ?></td>
                 <td><?php echo $resproyectos['no_proyecto']; ?></td>
                 <td><?php echo $resproyectos['nombre']; ?></td>
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

                <td><?php echo $resproyectos['u_medida']; ?></td>
                <td><?php echo number_format($resproyectos['anual']); ?></td>
                <td><?php echo number_format($resproyectos['semestral']); ?></td>
                <td><?php echo number_format($resproyectos['ben_m']); ?></td>
                <td><?php echo number_format($resproyectos['ben_h']); ?></td>




                 <td><a class="text text-navy" href="main.php?token=<?php echo md5(17); ?>&id_proyecto=<?php  echo $resproyectos['id_proyecto']; ?>"> <i class="fa fa-info-circle" aria-hidden="true"></i>  </a></td>

                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                   <th><small>Sector</small></th>
                  <th><small>Dependencia</small></th>
                  <th><small>PED</small></th>
                  <th><small>PPP</small></th>
                  <th><small>Num</small></th>
                  <th><small>Programa</small></th>
                  <th><small>Estatus</small></th>
                 <th><small>U.Medida</small></th>
                 <th><small>Meta Anual</small></th>
                 <th><small>Meta Sem</small></th>
                 <th><small>Ben. M</small></th>
                    <th><small>Ben. H</small></th>
                     <th><small>Info.</small></th>


              </tfoot>
            </table>

           <?php }else{?>

         <hr>
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th><small>Sector</small></th>
                  <th><small>Dependencia</small></th>
                  <th><small>PED</small></th>
                  <th><small>PPP</small></th>
                  <th><small>Num</small></th>
                  <th><small>Programa</small></th>
                  <th><small>Estatus</small></th>
                 <th><small>U.Medida</small></th>
                 <th><small>Meta Anual</small></th>
                 <th><small>Meta Sem</small></th>
                 <th><small>Ben. M</small></th>
                    <th><small>Ben. H</small></th>
                     <th><small>Info.</small></th>

                </tr>
              </thead>
              <tbody>
                <?php
                $conexion =$conn->conectar(1);
                $consulta_proyectos = $conexion->query("SELECT
                  pr.id_proyecto as id_proyecto,
                  se.sector as sector,
                  dep.acronimo as dependencia,
                  est.nombre as ped,
                  pr.clasificacion as ppp,
                  pr.no_proyecto as no_proyecto,
                  pr.nombre as nombre,
                  pr.estatus as estatus,
                  pr.unidad_medida as u_medida,
                  pr.cantidad as anual,
                  pr.prog_sem as semestral,
                  pr.beneficiarios_h as ben_h,
                  pr.beneficiarios_m as ben_m
                  FROM
                  proyectos as pr
                  inner join dependencias dep on (pr.id_dependencia = dep.id_dependencia)
                  inner join sectores se on (dep.id_sector = se.id_sector)
                  inner join estrategias est on (pr.id_estrategia = est.id_estrategia)
                  order by dep.id_dependencia ASC") or die ($conexion->error);
                $conexion->close();
                unset($conexion);

                while ($resproyectos = $consulta_proyectos->fetch_assoc()) { ?>

                <tr>
                  <td><?php echo $resproyectos['sector']; ?></td>
                  <td><?php echo $resproyectos['dependencia']; ?></td>
                   <td><?php
                            $ped_num = explode(" ",$resproyectos['ped']);
                            echo $ped_num[0];
                            unset($ped_num);
                       ?></td>
                  <td><?php if($resproyectos['ppp'] == 1){echo '<span class="text text-success">  <i class="fa fa-check-circle" aria-hidden="true"></i> </span>'; }else{ echo "-"; }  ?></td>
                 <td><?php echo $resproyectos['no_proyecto']; ?></td>
                 <td><?php echo $resproyectos['nombre']; ?></td>
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

                <td><?php echo $resproyectos['u_medida']; ?></td>
                <td><?php echo number_format($resproyectos['anual']); ?></td>
                <td><?php echo number_format($resproyectos['semestral']); ?></td>
                <td><?php echo number_format($resproyectos['ben_m']); ?></td>
                <td><?php echo number_format($resproyectos['ben_h']); ?></td>




                 <td><a class="text text-navy" href="main.php?token=<?php echo md5(17); ?>&id_proyecto=<?php  echo $resproyectos['id_proyecto']; ?>"> <i class="fa fa-info-circle" aria-hidden="true"></i>  </a></td>

                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                   <th><small>Sector</small></th>
                  <th><small>Dependencia</small></th>
                  <th><small>PED</small></th>
                  <th><small>PPP</small></th>
                  <th><small>Num</small></th>
                  <th><small>Programa</small></th>
                  <th><small>Estatus</small></th>
                 <th><small>U.Medida</small></th>
                 <th><small>Meta Anual</small></th>
                 <th><small>Meta Sem</small></th>
                 <th><small>Ben. M</small></th>
                    <th><small>Ben. H</small></th>
                     <th><small>Info.</small></th>


              </tfoot>
            </table>
           <?php } ?>
    </div>
      </div>
    </section>
</div>

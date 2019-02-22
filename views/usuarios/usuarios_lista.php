<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIPLAN 2019<br>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Listado de Usuarios</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="nav nav-pills">
          <li>
            <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Nuevo Usuario</button></li>
            </ul>
            <hr>
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th><small>Nombre</small></th>
                  <th><small>Dependencia</small></th>
                  <th><small>Usuario</small></th>
                   <th><small>Perfil</small></th>    
                  <th><small>Activo</small></th>
                  <th><small>Editar</small></th>
                </tr>
              </thead>
              <tbody>
                <?php
                   $conexion = $conn->conectar(1);
                   $consulta = "SELECT 
                   u.id_usuario,
                   u.nombre,
                   dep.acronimo,
                   u.usuario,
                   p.perfil,
                   u.activo
                   FROM usuarios u
                   inner join dependencias dep on (u.id_dependencia = dep.id_dependencia)
                   inner join perfiles p on (u.id_perfil = p.id_perfil)
                   order by dep.id_dependencia ASC, id_usuario ASC
                   ";
                   $ex_consulta = $conexion->query($consulta) or die ($conexion->error);
                  while($res = $ex_consulta->fetch_array(MYSQLI_NUM)){
                ?>
                  <tr>
                      <td><?php echo $res[1]; ?></td>
                      <td><?php echo $res[2]; ?></td>
                      <td><?php echo $res[3]; ?></td>
                      <td><?php echo $res[4]; ?></td>
                      <td><?php if($res[5] == 1){?><input type="checkbox" checked onchange="inhabilitar(<?php echo $res[0]; ?>)"> <?php }else{ ?><input type="checkbox" onchange="habilitar(<?php echo $res[0]; ?>)"> <?php } ?></td>
                      <td><a href="#<?php echo $res[0]; ?>"><span class="glyphicon glyphicon-pencil text-green"></span></a></td>
                  </tr>
                <?php } ?>  
    
              </tbody>
              <tfoot>
               <tr>
                  <th><small>Nombre</small></th>
                  <th><small>Dependencia</small></th>
                  <th><small>Usuario</small></th>
                   <th><small>Perfil</small></th>  
                  <th><small>Activo</small></th>
                  <th><small>Editar</small></th>
                </tr>


              </tfoot>
            </table>
          </div></div>
        </section>
      </div>

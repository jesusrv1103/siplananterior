<div class="content-wrapper">
  <!-- -->
  <section class="content-header">
    <h1>SIPLAN 2019<br>
      <small> Metas</small>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">Metas - <small><?php echo $_SESSION['nombre_dependencia']; ?> 
        </small>
      </h3>
    </div>
    <div class="box-body">

      <table id="example1" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th><small>No.</small></th>
            <th><small>Descripción</small></th>
            <th><small>Unidad de Medida</small></th>
            <th><small>Cantidad</small></th>
            <th><small>Candelarización</small></th>
            <th><small>Editar</small></th>
            <th><small>Eliminar</small></th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $actividad[1]; ?></td>
            <td><?php echo $actividad[2]; ?></td>
            <td><?php echo $actividad[3]; ?></td>
            <td></td>
            <td>
              <a class="text text-navy" > <i class="fa fa-list-alt" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        </tbody>
        <tfoot>
         <tr>
          <th><small>No.</small></th>
          <th><small>Descripción</small></th>
          <th><small>Unidad de Medida</small></th>
          <th><small>Cantidad</small></th>
          <th><small>Candelarización</small></th>
          <th><small>Editar</small></th>
          <th><small>Eliminar</small></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
</section>
</div>
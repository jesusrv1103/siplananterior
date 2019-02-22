<?php
// sesion seguridad
$consulta_marco = "SELECT * FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia'];
$res_consulta = mysql_query($consulta_marco,$siplan_data_conn) or die (mysql_error());
$info_consulta = mysql_fetch_array($res_consulta);
$encontrado = mysql_num_rows($res_consulta);
?>
<script type="text/javascript">
function regresar() {
alert("no se realizaron cambios");
window.location = "main.php?token=<?php echo md5(1); ?>";
}
function guardar(){
document.marco_estrategico.submit();
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
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Marco Estratégico - <small><?php echo $_SESSION['nombre_dependencia'];?></small></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <ul class="nav nav-pills">
<li><button class="btn btn-success" onclick="window.location.href='main.php?token=<?php echo md5(1); ?>';"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Programas Presupuestarios</button></li>
<li><button class="btn bg-navy" onclick="window.open('rpts/marco_estrategico.php');"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</button></li>
</ul>
<hr>
<form id="marco_estrategico" name="marco_estrategico" method="post" action="main.php?token=<?php echo md5(3); ?>" role="form">
<div class="form-group">
<label>Misi&oacute;n:</label>
<textarea class="form-control" name="mision"  rows="5" id="mision" required><?php echo $info_consulta["mision"]; ?></textarea>
</div>
<div class="form-group">
<label>Visi&oacute;n:</label>
<textarea class="form-control" name="vision"  rows="5" id="vision" required><?php echo $info_consulta["vision"]; ?></textarea>
</div>
<div class="form-group">
<label>Objetivo Estrat&eacute;gico:</label>
<textarea class="form-control" name="objetivo"  rows="5"  id="objetivo" required><?php echo $info_consulta["objetivo_estrategico"]; ?></textarea>
    </div>
<div class="form-group">
<label>Actividades Sustantivas:</label>
<textarea name="actividades" class="form-control" rows="5"  id="actividades" required><?php echo $info_consulta["activ_sustantivas"]; ?></textarea>
</div>
<input type="hidden" name="accion" id="accion" value="<?php  if ($info_consulta["id_dependencia"]!="") { echo "1";}else { echo "0";}?>" />

</form>

<ul class="nav nav-pills">
<li><button onclick="guardar();" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar</button></li>
<li><button onclick="regresar();" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</button></li>
</ul>

<i class="icon-dropbox"></i>
            </div>
 </div>
    </section>
    </div>

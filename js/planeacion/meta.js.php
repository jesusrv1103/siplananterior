<div class="modal inmodal" id="mMetas" tabindex="-1" role="dialog"  aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content animated fadeIn">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
<h2 id="actividad" align="center"></h2>
<h4 class="modal-title" align="center">Metas</h4>
</div>
<div class="modal-body">
<table width="100%" border="0" cellpadding="3" cellspacing="0">
<tr bgcolor = "#cccccc">
<td width="28%">Mes</td>
<td width="37%">Meta</td>
<td width="35%">Resultado</td>
</tr>
<tr bgcolor="#99CC66">
<td>Enero</td>
<td id="m1"></td>
<td>0</td>
</tr>
<tr bgcolor = "#DFFFBF">
<td>Febrero</td>
<td id="m2"></td>
<td>0</td>
</tr>
<tr bgcolor="#99CC66">
<td>Marzo</td>
<td id="m3"></td>
<td>0</td>
</tr>
<tr bgcolor = "#DFFFBF">
<td>Abril</td>
<td id="m4"></td>
<td>0</td>
</tr>
<tr bgcolor="#99CC66">
<td>Mayo</td>
<td id="m5"></td>
<td>0</td>
</tr>
<tr bgcolor = "#DFFFBF">
<td>Junio</td>
<td id="m6"></td>
<td>0</td>
</tr>
<tr bgcolor="#99CC66">
<td>Julio</td>
<td id="m7"></td>
<td>0</td>
</tr>
<tr bgcolor = "#DFFFBF">
<td>Agosto</td>
<td id="m8"></td>
<td>0</td>
</tr>
<tr bgcolor="#99CC66">
<td >Septiembre</td>
<td id="m9"></td>
<td>0</td>
</tr>
<tr bgcolor = "#DFFFBF">
<td>Octubre</td>
<td id="m10"></td>
<td>0</td>
</tr>
<tr bgcolor="#99CC66">
<td>Noviembre</td>
<td id="m11"></td>
<td>0</td>
</tr>
<tr bgcolor = "#DFFFBF">
<td>Diciembre</td>
<td id="m12"></td>
<td>0</td>
</tr>
</table>
<br>
<button type="button" class="btn btn-default btn-block" id="reset" data-dismiss="modal">Salir</button>
</div>
</div>
</div>
</div>
<?php echo "<script type='text/javascript'>"; ?>
$('#mMetas').on('shown.bs.modal', function (e) {
  //alert($(e.relatedTarget).data('id'));
  $.ajax({
    method: "POST",
    url: "clases/planeacion/metas.php",
    data: {
      id_actividad: $(e.relatedTarget).data('id')
    }
  }).done(function(msg) {
    var meta = JSON.parse(msg);
    document.getElementById('actividad').innerHTML = meta[0];
    document.getElementById('m1').innerHTML = meta[1];
    document.getElementById('m2').innerHTML = meta[2];
    document.getElementById('m3').innerHTML = meta[3];
    document.getElementById('m4').innerHTML = meta[4];
    document.getElementById('m5').innerHTML = meta[5];
    document.getElementById('m6').innerHTML = meta[6];
    document.getElementById('m7').innerHTML = meta[7];
    document.getElementById('m8').innerHTML = meta[8];
    document.getElementById('m9').innerHTML = meta[9];
    document.getElementById('m10').innerHTML = meta[10];
    document.getElementById('m11').innerHTML = meta[11];
    document.getElementById('m12').innerHTML = meta[12];
  });
});
<?php echo "</script>"; ?>
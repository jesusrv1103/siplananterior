$("#formula option[value='<?php echo $indicador[7];?>']").prop("selected", true);

$("#tipo option[value='<?php echo $indicador[8];?>']").prop("selected", true);

$("#dimension option[value='<?php echo $indicador[9];?>']").prop("selected", true);

$("#frecuencia option[value='<?php echo $indicador[10];?>']").prop("selected", true);

$("#sentido option[value='<?php echo $indicador[11];?>']").prop("selected", true);

variables($('#formula').val());
vars();
function vars(){
  <?php 
  $conn = $conn->conectar(1);
  $query = $conn->query("SELECT * FROM variables_indicadores WHERE id_indicador = ".$_GET['id_indicador']);
  $conn->close();
  unset($conn);
  $var = $query->fetch_array();
  ?>
  var v = <?php echo $indicador[7]; ?>;
  if (v == 1 || v == 2 || v == 3 || v == 5 || v == 7 || v == 8 || v == 9 || v == 11 || v == 13 || v == 14 || v == 15){
    $('#var1').val('<?php echo $var[1]; ?>');
    $('#var2').val('<?php echo $var[2]; ?>');
  }
  if (v == 4 || v == 12){
    $('#var1').val('<?php echo $var[1]; ?>');
    $('#var2').val('<?php echo $var[2]; ?>');
    $('#var3').val('<?php echo $var[3]; ?>');
  }

  if (v == 6){
    $('#var1').val('<?php echo $var[1]; ?>');
  }

  if (v == 10){
    $('#var1').val('<?php echo $var[1]; ?>');
    $('#var2').val('<?php echo $var[2]; ?>');
    $('#var3').val('<?php echo $var[3]; ?>');
    $('#var4').val('<?php echo $var[4]; ?>');
  }
}

function variables(v){
  'use strict';
  if (v == 1 || v == 2 || v == 3 || v == 5 || v == 7 || v == 8 || v == 9 || v == 11 ||  v == 13 || v == 14 || v == 15){
    document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required>";
  }

  if (v == 4 || v == 12){
    document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required><label for='var3'>Nombre de variable 3:</label><input type='text' id='var3' name='var3' class='form-control'  required>";
  }

  if (v == 6){
    document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required>";
  }

  if (v == 10){
    document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required><label for='var3'>Nombre de variable 3:</label><input type='text' id='var3' name='var3' class='form-control'  required><label for='var4'>Nombre de variable 4:</label><input type='text' id='var4' name='var4' class='form-control'  required>";
  }

}

function guardar(){
  if(document.getElementById('var2')){ v2 = $('#var2').val(); }else{ v2 = ' '; }
  if(document.getElementById('var3')){ v3 = $('#var3').val(); }else{ v3 = ' '; }
  if(document.getElementById('var4')){ v4 = $('#var4').val(); }else{ v4 = ' '; }
  $.ajax({
    method: "POST",
    url: "clases/planeacion/indicadores.php",
    data: {
      accion: 'actualizar',
      id_proyecto: <?php echo $_GET['id_proyecto']; ?>,
      id_indicador: <?php echo $_GET['id_indicador']; ?>,
      nombre: $('#nombre').val(),
      definicion: $('#definicion').val(),
      metodo: $('#formula').val(),
      tipo: $('#tipo').val(),
      dimension: $('#dimension').val(),
      frecuencia: $('#frecuencia').val(),
      sentido: $('#sentido').val(),
      u_medida: $('#u_medida').val(),
      meta: $('#meta').val(),
      linea_base: $('#linea_base').val(),
      verifica: $('#verifica').val(),
      supuesto: $('#supuesto').val(),
      var1: $('#var1').val(),
      var2: v2,
      var3: v3,
      var4: v4,
      var5: ' ',
      var6: ' '
    }
  }).done(function( msg ) {
    console.log(msg);
    if (msg=="actualizado") {
      alert('Indicador actualizado correctamente');
    }else{
      alert('Error al actualizar Indicador');
    }
    <?php 
    if (isset($_GET['id_proyecto'])) {
      if (isset($_GET['id_componente'])) {
        if (isset($_GET['id_actividad'])) {
          echo "location.href = 'main.php?token=".md5(12)."&id_proyecto=".$_GET['id_proyecto']."&id_componente=".$_GET['id_componente']."&id_actividad=".$_GET['id_actividad']."'";
        }else{
          echo "location.href = 'main.php?token=".md5(9)."&id_proyecto=".$_GET['id_proyecto']."&id_componente=".$_GET['id_componente']."'";
        }
      }else{
        echo "location.href = 'main.php?token=".md5(5)."&id_proyecto=".$_GET['id_proyecto']."'";
      }
    }
    ?>
  });

  return false;
}

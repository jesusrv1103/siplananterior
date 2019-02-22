<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.min.js?v1.0"></script>
<script src="js/fastclick.js"></script>
<script src="js/adminlte.min.js?v2.0"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<?php
//------- nuevo prog pres ----//

if( isset($_GET['token']) ){
  switch($_GET['token']){
    case md5(1):
    ?>
    <script src="js/jquery.dataTables.min.js?v=1.1"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
    <?php
    echo '<script type="text/javascript">';
    require("js/planeacion/lista_pp.js.php");
    echo '</script>';
    break;

    case md5(4):
    echo '<script src="js/icheck.min.js?v.1.0"></script>';
    echo '<script type="text/javascript">';
    require("js/planeacion/nuevo_pp.js.php");
    echo '</script>';
    break;
    case md5(5):
    echo '<script type="text/javascript">';
    require("js/planeacion/lista_indicadores.js.php");
    echo '</script>';
    break;
    case md5(6):
    echo '<script type="text/javascript">';
    require("js/planeacion/nuevo_indicador.js.php");
    echo '</script>';
    break;
    case md5(7):
    echo '<script type="text/javascript">';
    require("js/planeacion/lista_componentes.js.php");
    echo '</script>';
    break;
    case md5(8):
    echo '<script src="js/icheck.min.js?v.1.0"></script>';
    echo '<script type="text/javascript">';
    require("js/planeacion/nuevo_componente.js.php");
    echo '</script>';
    break;
    case md5(9):
    echo '<script type="text/javascript">';
    require("js/planeacion/lista_indicadores.js.php");
    echo '</script>';
    break;
    case md5(10):
    echo '<script type="text/javascript">';
    require("js/planeacion/lista_actividades.js.php");
    echo '</script>';
    require("js/planeacion/meta.js.php");
    break;
    case md5(11):
    echo '<script src="js/icheck.min.js?v.1.0"></script>';
    echo '<script type="text/javascript">';
    require("js/planeacion/nueva_actividad.js.php");
    echo '</script>';
    break;
    case md5(12):
    echo '<script type="text/javascript">';
    require("js/planeacion/lista_indicadores.js.php");
    echo '</script>';
    break;
      case md5(13):
          echo '<script src="js/icheck.min.js?v.1.0"></script>';
    echo '<script type="text/javascript">';
    require("js/planeacion/editar_actividad.js.php");
    echo '</script>';
    break;
      case md5(14):      
    echo '<script src="js/icheck.min.js?v.1.0"></script>';
    echo '<script type="text/javascript">';
    require("js/planeacion/editar_pp.js.php");
    echo '</script>';
    break;
    case md5(15):
    echo '<script type="text/javascript">';
    require("js/planeacion/editar_indicador.js.php");
    echo '</script>';
    break;
    case md5(16):
    echo '<script src="js/icheck.min.js?v.1.0"></script>';
    echo '<script type="text/javascript">';
    require("js/planeacion/editar_componente.js.php");
    echo '</script>';
    break;
    case md5(14):
    echo '<script type="text/javascript">';
    require("js/planeacion/editar_pp.js.php");
    echo '</script>';
    break  ;
    case md5(40):
    echo '<script type="text/javascript">';
    require("js/catalogos/nueva_u_responsable.js.php");
    echo '</script>';
    echo '<script type="text/javascript">';
    require("js/catalogos/lista_responsables.js.php");
    echo '</script>';
    break  ;
       case md5(60):
    ?>
    <script src="js/jquery.dataTables.min.js?v=1.1"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
    <?php
    echo '<script type="text/javascript">';
    require("js/planeacion/lista_pp.js.php");
    echo '</script>';
    break;
    case md5(901):
    echo '<script type="text/javascript" src="js/usuarios/lista_usuarios.js">';
    echo '</script>';
    ?>
   <script src="js/jquery.dataTables.min.js?v=1.1"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $('#example1').DataTable({
           'paging'      : true,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : false,
          'info'        : false,
          'autoWidth'   : false
        })
      })
    </script>
    <?php    
    break  ;      
  }

}else{
    
  ?>  
<script>
$("#myModal").modal(); 
</script>    
    <?php
}

?>

<?php if($_SESSION['id_perfil'] != 2){ ?>
<script type="text/javascript">
  function cambiar_dep(dependencia){
    if(dependencia != 0){

      $.ajax({
        method: "POST",
        url: "clases/cambiar_dep.php",
        data: { dep: dependencia }
      })
      .done(function( msg ) {
        console.log(msg);
        location.reload();
      });
        }//end if


    } //end function
  </script>
  <?php
}
?>

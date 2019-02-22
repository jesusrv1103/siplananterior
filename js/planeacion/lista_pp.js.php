
function aprobar_proyecto(v,e){
    if(e == 0){

        var aprobar = 'aprobar_dep';
        if(!confirm("El programa se va a aprobar, una vez aprobado no se podrá editar, ¿Desea Continuar?")){
            return false;
        }

    }
    <?php if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 3) { ?>   
        if(e == 1){ var aprobar = 'aprobar_coepla';

        if(!confirm("El programa se va a aprobar y será enviado automatiacmente a Finanzas para su presupuestación ¿Desea Continuar?")){
            return false;
        }

    }
    console.log(aprobar);
    <?php } ?>
    $.ajax({
        method: "POST",
        url: "clases/planeacion/prog_pres.php",
        data: {
            accion: aprobar,
            proyecto: v,
        }
    })
    .done(function( msg ) {
        console.log(msg);
        switch(msg){
            case "0":
            alert( 'No se puede aprobar. No tiene Marco Estratégico' );
            break;
            case "1":
            alert( 'No se puede aprobar. No tiene Componentes  registrados' );
            break;
            case "2":
            alert( 'No se puede aprobar. No tiene Actividades registradas' );
            break;
            case "3":
            alert( 'No se puede aprobar. No tiene Indicadores Fin registrados' );
            break;
            case "4":
            alert( 'No se puede aprobar. No tiene Indicadores Propósito registrados' );
            break;
            case "5":
            alert( 'No se puede aprobar. La actividad no tiene indicadores' );
            break;
            case "6":
            alert( 'No se puede aprobar. Ponderación de actividades no esta al 100%' );
            break;
            case "7":
            alert( 'No se puede aprobar. El componente no tiene indicadores' );
            break;
            case "8":
            alert( 'No se puede aprobar. Ponderación de componentes no esta al 100%' );
            break;
            case "9":
            alert( 'Ocurrió un error al intentar guardar, ningun compnente alineado al PED del Programa.' );
            break;
            case "10":
            alert( 'Ocurrió un error al intentar guardar, ninguna actividad alineada al PED del Programa.' );
            break;
            case "dependencia":
                alert("Ocurrió un error al intentar guardar, error en dependencia");
                location.reload();
                break;
            case "unidad":
                alert("Ocurrió un error al intentar guardar, error en unidades");
                location.reload();
                break;
            case "eje": 
                alert("Ocurrió un error al intentar guardar, error en ejes");
                location.reload();
                break;
            case "linea":
                alert("Ocurrió un error al intentar guardar, error en lineas");
                location.reload();
                break;
            case "estrategia":
                alert("Ocurrió un error al intentar guardar, error en estrategias");
                location.reload();
                break;
            case "proyecto":
                alert("Ocurrió un error al intentar guardar, error en programa");
                location.reload();
                break;
            case "componente":
                alert("Ocurrió un error al intentar guardar, error en componentes");
                location.reload();
                break;
            case "actividad": 
                alert("Ocurrió un error al intentar guardar, error en actividades");
                location.reload();
                break;
            default:
                alert('El programa ha sido aprobado');
                location.reload();
                break;
        }

    });

}


function eliminar_proyecto(p){

 if (confirm('La información del proyecto se eliminará de forma permanente, ¿desea continuar?')) {

    $.ajax({
        method: "POST",
        url: "clases/planeacion/prog_pres.php",
        data: {
            accion: "eliminar",
            proyecto: p,
        }
    })
    .done(function( msg ) {
       console.log( msg );
       alert(msg);
       location.reload();
   });



} else {
    // Do nothing!
}


}

<?php if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 3) { ?>

    function rechazar_proyecto(p){
        $.ajax({
            method: "POST",
            url: "clases/planeacion/prog_pres.php",
            data: {
                accion: "rechazar_proyecto",
                proyecto: p,
            }
        })
        .done(function( msg ) {
           console.log( msg );
           alert(msg);
           location.reload();
       });
    }

    <?php } ?>

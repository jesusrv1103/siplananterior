function guardar_u_responsable(){
         $.ajax({
            method: "POST",
            url: "clases/catalogos/u_responsable.php",
            data: {
                accion: "agregar",
                 u_responsable: $('#u_responsable').val(),
                 titular: $('#titular').val(),
            }
 })
        .done(function( msg ) {
            console.log(msg);
            alert( 'Se ha guardado correctamente la unidad responsable' );
            location.reload(true);
        });
   return false;
}


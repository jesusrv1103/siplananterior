function habilitar(v) {
    $.ajax({
        method: "POST",
        url: "clases/usuarios.php",
        data: {
            accion: 'habilitar',
            id_usuario: v,
        }
    }).done(function (msg) {
        console.log(msg);
    });
}

function inhabilitar(v) {
    console.log("inhabilitar llamado: "+v);
    $.ajax({
        method: "POST",
        url: "clases/usuarios.php",
        data: {
            accion: 'inhabilitar',
            id_usuario: v,
        }
    }).done(function (msg) {
        console.log(msg);
    });
}
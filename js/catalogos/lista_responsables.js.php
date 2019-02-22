
$('#mResponsable').on('shown.bs.modal', function (e) {
	console.log($(e.relatedTarget).data('id'));
	$.ajax({
		method: "POST",
		url: "clases/catalogos/get_responsable.php",
		data: {
			id_responsable: $(e.relatedTarget).data('id')
		}
	}).done(function(msg) {
		var responsable = JSON.parse(msg);
		console.log(responsable);
		$('#uresponsable').val(responsable[0]);
		$('#utitular').val(responsable[1]);
		$('#id_responsable').val($(e.relatedTarget).data('id'));
	});
});

function update(){
	$.ajax({
		method: "POST",
		url: "clases/catalogos/u_responsable.php",
		data: {
			accion: "actualizar",
			id_responsable: $('#id_responsable').val(),
			u_responsable: $('#uresponsable').val(),
			titular: $('#utitular').val()
		}
	}).done(function(msg) {
		console.log(msg);
		if (msg="guardado") {
			alert('Unidad Responsable actualizada correctamente');
		}else{
			alert('Error al actualizar Unidad Responsable');
		}
		location.reload(true);
	});
}

function borrar(id){
	console.log(id);
	if (window.confirm("¿Desea eliminar Unidad Responsable?") == true){
		$.ajax({
			method: "POST",
			url: "clases/catalogos/u_responsable.php",
			data: {
				accion: 'borrar',
				id_responsable: id
			}
		}).done(function(msg) {
			console.log(msg);
			if (msg == "borrado") {
				alert('Unidad Responsable eliminada correctamente');
				location.href = 'main.php?token=d645920e395fedad7bbbed0eca3fe2e0';
			}else if(msg == "estatus"){
				alert("Unidad Responsable no se pudo eliminar");
			}
		});
	}
}
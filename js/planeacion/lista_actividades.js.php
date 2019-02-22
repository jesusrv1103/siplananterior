function borrar(id){
	console.log(id);
	if (window.confirm("¿Desea eliminar la actividad?") == true){
		$.ajax({
			method: "POST",
			url: "clases/planeacion/actividades.php",
			data: {
				accion: 'borrar',
				id_accion: id,
				id_proyecto: <?php echo $_GET['id_proyecto'] ?>
			}
		}).done(function(msg) {
			console.log(msg);
			if (msg == "borrado") {
				alert('Actividad eliminada correctamente');
				location.href = 'main.php?token=d3d9446802a44259755d38e6d163e820&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>';
			}else if(msg == "estatus"){
				alert("Activiad no se pudo eliminar");
			}
		});
	}
}
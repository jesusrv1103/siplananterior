function borrar(id){
	console.log(id);
	if (window.confirm("¿Desea eliminar el componente?") == true){
		$.ajax({
			method: "POST",
			url: "clases/planeacion/componentes.php",
			data: {
				accion: 'borrar',
				id_componente: id,
				id_proyecto: <?php echo $_GET['id_proyecto'] ?>
			}
		}).done(function(msg) {
			console.log(msg);
			if (msg == "borrado") {
				alert('Componente eliminado correctamente');
				location.href = 'main.php?token=8f14e45fceea167a5a36dedd4bea2543&id_proyecto=<?php echo $_GET['id_proyecto']; ?>';
			}else if(msg == "estatus"){
				alert("Componente no se pudo eliminar");
			}
		});
	}
}
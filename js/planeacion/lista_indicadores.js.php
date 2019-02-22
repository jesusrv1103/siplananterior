function borrar(id){
	console.log(id);
	if (window.confirm("¿Desea eliminar indicador?") == true){
		$.ajax({
			method: "POST",
			url: "clases/planeacion/indicadores.php",
			data: {
				accion: 'borrar',
				id_indicador: id,
				id_proyecto: <?php echo $_GET['id_proyecto'] ?>
			}
		}).done(function(msg) {
			console.log(msg);
			if (msg == "borrado") {
				alert('Indicador eliminado correctamente');
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
			}else if(msg == "estatus"){
				alert("Indicador no se pudo eliminar");
			}
		});
	}
}
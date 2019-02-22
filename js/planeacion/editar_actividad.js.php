<?php if ($actividad[14] == '1') { ?>
	document.getElementById('prespectiva').checked = true;
	<?php }else{ ?>
		document.getElementById('prespectiva').checked = false;
		<?php }?>
		$("#tipo_descripcion option[value='<?php echo $actividad[13];?>']").prop("selected", true);
		$("#u_medida option[value='<?php echo $actividad[6];?>']").prop("selected", true);
		getTMedidas(<?php echo $actividad[6];?>);
		$("#ped option[value='<?php echo $actividad[11];?>']").prop("selected", true);
		function getTMedidas(medida){
			'use strict';
			if(medida == ''){return false;};
			document.getElementById('tipo_med').length = 0;
			document.getElementById('tipo_med').options[0] = new Option('-Seleccione-', '');
			$.ajax({
				method: "POST",
				url: "clases/planeacion/tipo_medidas.php",
				data: {
					unidad: medida
				}
			}).done(function( msg ) { 
				var unidades_responsables = JSON.parse(msg);
				for(var x = 0; x < unidades_responsables.length; x++){
					document.getElementById('tipo_med').options[x+1] = new Option(unidades_responsables[x][1], unidades_responsables[x][0]);
				}
				if (unidades_responsables.length > 0) {
					document.getElementById("tipo_med").disabled=false; 
				}
				if (medida == <?php echo $actividad[6];?>) {
					$("#tipo_med option[value='<?php echo $actividad[5];?>']").prop("selected", true);
				}
			});
		}

		function validar(){
			if (!numero()) {alert("Número de actividad ya existe");return false;}
			if(parseFloat($('#num').val()) > 100 ){alert('Número debe ser menor a 100'); return false;}
			if($('#nombre').val().length < 10 ){alert('Nombre de actividad muy corto'); return false;}
			if($('#descripcion').val().length < 30 ){alert('Descripción de actividad muy corta'); return false;}
			if(parseFloat($('#ponderacion').val()) > <?php echo ((100 - $total) + $actividad[8]); ?> ){alert('Ponderación debe ser menor o igual a '+<?php echo ((100 - $total) + $actividad[8]); ?>); return false;}
			if(!$.isNumeric($('#m1').val())){$('#m1').val(0);}
			if(!$.isNumeric($('#m2').val())){$('#m2').val(0);}
			if(!$.isNumeric($('#m3').val())){$('#m3').val(0);}
			if(!$.isNumeric($('#m4').val())){$('#m4').val(0);}
			if(!$.isNumeric($('#m5').val())){$('#m5').val(0);}
			if(!$.isNumeric($('#m6').val())){$('#m6').val(0);}
			if(!$.isNumeric($('#m7').val())){$('#m7').val(0);}
			if(!$.isNumeric($('#m8').val())){$('#m8').val(0);}
			if(!$.isNumeric($('#m9').val())){$('#m9').val(0);}
			if(!$.isNumeric($('#m10').val())){$('#m10').val(0);}
			if(!$.isNumeric($('#m11').val())){$('#m11').val(0);}
			if(!$.isNumeric($('#m12').val())){$('#m12').val(0);}
			if (!(parseFloat($('#m1').val())+
				parseFloat($('#m2').val())+
				parseFloat($('#m3').val())+
				parseFloat($('#m4').val())+
				parseFloat($('#m5').val())+
				parseFloat($('#m6').val())+
				parseFloat($('#m7').val())+
				parseFloat($('#m8').val())+
				parseFloat($('#m9').val())+
				parseFloat($('#m10').val())+
				parseFloat($('#m11').val())+
				parseFloat($('#m12').val())) > 0) {alert("Debe tener al menos 1 meta al año en cualquier mes");return false;}
				return true; 
		}

		function numero(){
			<?php 
			$conexion = $conn->conectar(1);
			$actividades = $conexion->query("SELECT no_accion FROM acciones WHERE id_proyecto = ".$_GET['id_proyecto']." and id_componente=".$_GET['id_componente']." and id_accion != ".$_GET['id_actividad']);
			$conexion->close();
			unset($conexion);
			while($act = $actividades->fetch_array()){ ?>
				if (<?php echo (int)$act[0]; ?> == parseInt($('#num').val())) {
					return false;
				}
				<?php } ?>
				return true;
			}

			function guardar(){
				var validado = validar();
				if(document.getElementById("prespectiva").checked){var prespectiva = 1; }else{var prespectiva = 0;}
				if(validado){
					validado = false;
					$.ajax({
						method: "POST",
						url: "clases/planeacion/actividades.php",
						data: {
							accion: 'editar',
							id_componente : <?php echo $_GET['id_componente']; ?>,
							id_actividad: <?php echo $_GET['id_actividad']; ?>,
							id_proyecto: <?php echo $_GET['id_proyecto']; ?>,
							descripcion: $('#nombre').val(),
							id_tipo: $('#tipo_med').val(),
							unidad_medida: $('#u_medida').val(),
							cantidad: $('#cantidad').val(),
							ponderacion: $('#ponderacion').val(),
							no_accion: $('#num').val(),
							ped: $('#ped').val(),
							descripcion_actividad: $('#descripcion').val(),
							tipo_descripcion: $('#tipo_descripcion').val(),
							per_gen: prespectiva,
							m1: $('#m1').val(),
							m2: $('#m2').val(),
							m3: $('#m3').val(),
							m4: $('#m4').val(),
							m5: $('#m5').val(),
							m6: $('#m6').val(),
							m7: $('#m7').val(),
							m8: $('#m8').val(),
							m9: $('#m9').val(),
							m10: $('#m10').val(),
							m11: $('#m11').val(),
							m12: $('#m12').val()
						}
					}).done(function(msg) {
						console.log(msg);
						if (msg == "ponderacion") {
							alert('Ponderación mayor a la permitida');
						}else if(msg == "guardado"){
							alert('Se ha actualizado correctamente la actividad');
							location.href = 'main.php?token=d3d9446802a44259755d38e6d163e820&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&id_componente=<?php echo $_GET['id_componente']; ?>';
						}else if(msg=="metas"){
							alert("Debe tener al menos 1 meta al año en cualquier mes");
						}
					});

				}
				return false;
			}
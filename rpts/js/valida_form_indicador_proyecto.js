function valida(){
	if(document.getElementById('fin_objetivo').value == ""){
		alert("el objetivo del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('fin_nombre').value == ""){
		alert("el nombre de indicador del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('fin_metodo').value == ""){
		alert("el metodo de indicador del fin esta vac\u00edo");
		return false();
	}
	
	if(document.getElementById('fin_tipo').value=="0"){
		alert("Sleccione el tipo de indicador para el Fin");
		return false();
	}
		if(document.getElementById('fin_dimension').value=="0"){
		alert("Sleccione la dimensi\u00f3n de indicador para el Fin");
		return false();
	}
		if(document.getElementById('fin_frecuencia').value=="0"){
		alert("Sleccione la frecuencia de indicador para el Fin");
		return false();
	}
		if(document.getElementById('fin_sentido').value=="0"){
		alert("Sleccione el sentido de indicador para el Fin");
		return false();
	}
	if(document.getElementById('fin_u_medida').value == ""){
		alert("el la unidad de medida del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('fin_meta').value == ""){
		alert("la meta de indicador del fin esta vac\u00edo");
		return false();
	}
	
	if(document.getElementById('fin_verifica').value == ""){
		alert("los medios de indicador del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('fin_supuesto').value == ""){
		alert("el supuesto de indicador del fin esta vac\u00edo");
		return false();
	}
	
	
	if(document.getElementById('pro_objetivo').value == ""){
		alert("el objetivo del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('pro_nombre').value == ""){
		alert("el nombre de indicador del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('pro_metodo').value == ""){
		alert("el metodo de indicador del fin esta vac\u00edo");
		return false();
	}
	
	if(document.getElementById('pro_tipo').value=="0"){
		alert("Sleccione el tipo de indicador para el Fin");
		return false();
	}
		if(document.getElementById('pro_dimension').value=="0"){
		alert("Sleccione la dimensi\u00f3n de indicador para el Fin");
		return false();
	}
		if(document.getElementById('pro_frecuencia').value=="0"){
		alert("Sleccione la frecuencia de indicador para el Fin");
		return false();
	}
		if(document.getElementById('pro_sentido').value=="0"){
		alert("Sleccione el sentido de indicador para el Fin");
		return false();
	}
	if(document.getElementById('pro_u_medida').value == ""){
		alert("el la unidad de medida del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('pro_meta').value == ""){
		alert("la meta de indicador del fin esta vac\u00edo");
		return false();
	}
	
	if(document.getElementById('pro_verifica').value == ""){
		alert("los medios de indicador del fin esta vac\u00edo");
		return false();
	}
	if(document.getElementById('pro_supuesto').value == ""){
		alert("el supuesto de indicador del fin esta vac\u00edo");
		return false();
	}
	
	document.indicador.submit();
}

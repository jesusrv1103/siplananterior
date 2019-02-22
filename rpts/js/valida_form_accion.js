function valida(){
   	   
   	    if (document.getElementById('no_accion').value == ""){
		 alert("falta el n\u00famero de acci\u00f3n");
		 return false();
	   }
   	    
   	      if (document.getElementById('no_accion').value == 0){
		 alert(" el n\u00famero de acci\u00f3n no puede ser 0");
		 document.getElementById('no_accion').value = "";
		 return false();
	   }
   	    
   	    
   	   var  elemento1 = document.getElementById('no_accion').value;
       var  vuelta1 = elemento1.length;
       for(x=0;  x < vuelta1; x=x+1){
    	var t_val = elemento1.charAt(x);
    	if(isNaN(t_val)){
    		alert("El n\u00famero de acci\u00f3n debe ser entero"); 
    		document.getElementById('no_accion').value = "";
    		var elemento1 = "";
    		return false();
    	}
    }
   	   
   	   
   	    var no_acciones = new Array(<?php  for($x=0;$x<$totalacciones;$x=$x+1){ echo $numacciones[$x].",";}  echo "0"; ?>);
        for(x=0;x<no_acciones.length;x++){
        if(document.getElementById('no_accion').value == no_acciones[x]){
            alert("este n\u00famero de acci\u00f3n ya existe porfavor borre la accion o seleccione otro n\u00famero");
            document.getElementById('no_accion').value = "";
            return false();
        }
    }
	 if (document.getElementById('descripcion').value == ""){
		 alert("falta la descripci\u00f3n de la acci\u00f3n");
		 return false();
	 }

	 if (document.getElementById('u_medida').value == 0){
		 alert("falta la unidad de medida");
		 return false();
	 }
	 	   
	 	 if (document.getElementById('tipo_medida').value == 0){
		 alert("falta el tipo de medida");
		 return false();
	 }
	 	   
	 	 if (document.getElementById('cantidad').value == ""){
		 alert("falta la cantidad ");
		 return false();
	    }
	 	   
	 var  elemento2 = document.getElementById('cantidad').value;
       var  vuelta2 = elemento2.length;
       var punto = 0;
       for(x=0;  x < vuelta2; x=x+1){
    	var t_val = elemento2.charAt(x);
    	if(isNaN(t_val)){
    		if(t_val!="."){
    			
    		alert("El n\u00famero de acci\u00f3n no debe contener texto"); 
    		document.getElementById('no_accion').value = "";
    		var elemento1 = "";
    		return false();
    		}
    		if(t_val=="."){
    			 punto = punto+1;
    		}if(punto>1){alert("solo se puede poner una separaci\u00f3n decimal en la cantidad"); return false()}
    	}
    }   
	 	   
	 	   
	 	if (document.getElementById('ponderacion').value == ""){
		 alert("falta la ponderaci\u00f3n");
		 return false();
	   }
	 	   
       var  elemento3 = document.getElementById('ponderacion').value;
       var  vuelta3 = elemento3.length;
       for(x=0;  x < vuelta3; x=x+1){
    	var t_val = elemento3.charAt(x);
    	if(isNaN(t_val)){
    		alert("La ponderaci\u00f3n debe ser entero"); 
    		document.getElementById('ponderacion').value = "";
    		var elemento3 = "";
    		return false();
    	}
    }
	 	   
	  if (document.getElementById('ponderacion').value > <?php echo $ponderacionmax; ?>){
		 alert("se ha sobrepasado la ponderaci\u00f3n");
		 return false();
	 }
document.accion.submit();
   }
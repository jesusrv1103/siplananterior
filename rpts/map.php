<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- Dependencies: JQuery and GMaps API should be loaded first -->
	<script src="js/jquery-2.1.1.min.js"></script>
	
	<!-- CSS and JS for our code -->
	 <style type="text/css" title="currentStyle">
		 
	.gllpMap	{ width: 900px; height: 400px; }

		 </style>
	<script src="js/jquery-gmaps-latlon-picker.js"></script>
	<script>
		
		
	$(document).ready(function(){	
	
		  var reg = /^-?([0-8]?[0-9]|90)\.[0-9]{1,25}$/;
		  var er_dom = /^([0-9.-]{1,25})$/
			 			 
		   $("#lat").keyup(function(){
			      var latitude = document.getElementById('lat').value;
			      			   
			       if(!er_dom.test($(this).val()) ){
					   document.getElementById('lat').value="";
				   }
			     			      
			      if (latitude.length==9){      
			   if(reg.test($(this).val()) ){				   
								}else {
				 document.getElementById('lat').value="";
			     return false;
			}
			
		}
    })
    
      var reg1 = /^-?([0-1]?[0-8]?[0-9]|180)\.[0-9]{1,25}$/;
		  var er_dom1 = /^([0-9.-]{1,25})$/
    
       $("#lon").keyup(function(){
			      var longitud = document.getElementById('lon').value;
			      			   
			       if(!er_dom1.test($(this).val()) ){
					   document.getElementById('lon').value="";
				   }
			     			      
			      if (longitud.length==11){      
			   if(reg1.test($(this).val()) ){				   
								}else {
				 document.getElementById('lon').value="";
			     return false;
			}
			
		}
    })
    
   
  
  });
 
</script>

</head>
<body>

<form name="ma" id="ma">
		</div>

	<fieldset class="gllpLatlonPicker">
		<input type="text" class="gllpSearchField">
		<input type="button" class="gllpSearchButton" value="Buscar Ubicación">
		
		<div class="gllpMap"></div>
		
		Latitud:
			<input type="text" name="lat" id="lat" maxlength="9"  class="gllpLatitude gllpUpdateText"  class="gllpUpdateButton" value=""/>
		 Longitud:
			<input type="text" name="lon" id="lon"   maxlength="11" class="gllpLongitude gllpUpdateText" class="gllpUpdateButton" value=""/>
		<input type="hidden" class="gllpZoom" value="8"/>
		<input type="button" class="gllpUpdateButton" value="Actualizar Ubicación">
	
		<br/>
	</fieldset>

	
</form>

</body>
</html>


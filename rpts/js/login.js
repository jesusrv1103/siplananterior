// JavaScript Document
//creado por José Martín Gamboa Murillo
function validar(){
  if(document.getElementById('usuario').value == ""){
	  alert("Ingrese su usuario");
	  document.getElementById('usuario').focus();
	  return false();  
  }
  if(document.getElementById('clave').value == ""){
	  alert("Ingrese su clave");
	  document.getElementById('clave').focus();
	  return false();
  }
 
  
  var  elemento1 = document.getElementById('usuario').value;
    var  vuelta1 = elemento1.length;
   for(x=0;  x < vuelta1; x=x+1){
    	var t_val = elemento1.charAt(x);
    	if(t_val == " " || t_val =="%"  || t_val =="."){
    		alert("el nombre de usuario tieen caracteres no validos"); 
    		document.getElementById('usuario').value = "";
    		var elemento1 = "";
    		return false();
    	}
    }
  
  
  
  document.logon.submit();
}
function contacto(){
	document.getElementById("informacion").innerHTML = "<p>Extensiones de cont&aacute;cto para soporte T&eacute;cnico:<br><ul><li>M.I.A. Miguel Alberto Bernal Murillo<br>ext. 10501<br>miguel.bernal@zacatecas.gob.mx</li><li>T.S.U. Jos&eacute; Mart&iacute;n Gamboa Murillo<br>ext. 10502<br>martin.gamboa@zacatecas.gob.mx</li></ul></p>";
	document.getElementById("icon").innerHTML ="<img src='imagenes/Contact-256.png' width='71' height='52'>";
	
}
function ayuda(){
	document.getElementById("informacion").innerHTML = "<p>Para ver la ayuda solo da <a href='ayuda' target='blank'><b>clic aqu&iacute;.</b></a> Se mostrar&aacute; una nueva p&aacute;gina que es un manual de uso t&eacute;cnico con las funciones b&aacute;sicas del sistema.</p>";
	document.getElementById("icon").innerHTML ="<img src='imagenes/ayuda01.fw.png' width='71' height='83'>";
}
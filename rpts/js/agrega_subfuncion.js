/**
 * @author José Martín Gamboa Murillo
 */

function agregasubfuncion(idfuncion){

    document.getElementById('subfuncion').length=0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-','0');
    var idfinalidad = document.getElementById('id_finalidad').value;
    var clave_subfondo = idfinalidad+idfuncion;
    switch(clave_subfondo){
    	case "11":
			document.getElementById('subfuncion').options[1]=new Option ('Legislación','1');
			document.getElementById('subfuncion').options[2]=new Option ('Fiscalización','2');
		break;
		case "12":
			document.getElementById('subfuncion').options[1]=new Option ('Impartición de Justicia','3');
			document.getElementById('subfuncion').options[2]=new Option ('Procuración de Justicia','4');
			document.getElementById('subfuncion').options[3]=new Option ('Reclusión y Readaptación Social','5');
			document.getElementById('subfuncion').options[4]=new Option ('Derechos Humanos','6');
		break;
		case "13":
			document.getElementById('subfuncion').options[1]=new Option ('Presidencia / Gubernamental','7');
			document.getElementById('subfuncion').options[2]=new Option ('Política Interior','8');
			document.getElementById('subfuncion').options[3]=new Option ('Preservación y Cuidado del Patrimonio','9');
			document.getElementById('subfuncion').options[4]=new Option ('Función Pública','10');
			document.getElementById('subfuncion').options[5]=new Option ('Asuntos Jurídicos','11');
			document.getElementById('subfuncion').options[6]=new Option ('Organización del Procesos Electorales','12');
			document.getElementById('subfuncion').options[7]=new Option ('Población','13');
			document.getElementById('subfuncion').options[8]=new Option ('Territorio','14');
			document.getElementById('subfuncion').options[9]=new Option ('Otros','15');
		break;
		case "14":
			document.getElementById('subfuncion').options[1]=new Option ('Relaciones Exteriores','16');
		break;
		case "15":
			document.getElementById('subfuncion').options[1]=new Option ('Asuntos Financieros','17');
			document.getElementById('subfuncion').options[2]=new Option ('Asuntos Hacendarios','18');
		break;
		case "16":
			document.getElementById('subfuncion').options[1]=new Option ('Defensa','19');
			document.getElementById('subfuncion').options[2]=new Option ('Marina','20');
			document.getElementById('subfuncion').options[3]=new Option ('Inteligencia para la Preservación de la Seguridad Nacional','21');
		break;
		case "17":
			document.getElementById('subfuncion').options[1]=new Option ('Policía','22');
			document.getElementById('subfuncion').options[2]=new Option ('Protección Civil','23');
			document.getElementById('subfuncion').options[3]=new Option ('Otros Asuntos de Orden Público y Seguridad','24');
			document.getElementById('subfuncion').options[4]=new Option ('Sistema Nacional de Seguridad Pública','25');
		break;
		case "19":
			document.getElementById('subfuncion').options[1]=new Option ('Servicios Registrales, Administrativos y Patrimoniales','26');
			document.getElementById('subfuncion').options[2]=new Option ('Servicios Estadistícos','27');
			document.getElementById('subfuncion').options[3]=new Option ('Servicios de Comunicación y Medios','28');
			document.getElementById('subfuncion').options[4]=new Option ('Acceso a la Información Pública Gubernamental','29');
			document.getElementById('subfuncion').options[5]=new Option ('Otros','30');
		break;
		case "210":
		document.getElementById('subfuncion').options[1]=new Option ('Ordenaci&oacute;n de Desechos','31');
		document.getElementById('subfuncion').options[2]=new Option ('Adminstraci&oacute;n del Agua','32');
		document.getElementById('subfuncion').options[3]=new Option ('Ordenaci&oacute;n de Aguas Residuales, Drenajes y Alcantarillado','33');
		document.getElementById('subfuncion').options[4]=new Option ('Reducci&oacute;n de la Contaminaci&oacute;n','34');
		document.getElementById('subfuncion').options[5]=new Option ('Protecci&oacute;n de la Diversidad Biol&oacute;gica y del Paisaje','35');
			document.getElementById('subfuncion').options[1]=new Option ('Otros de Protecci&oacute;n Ambiental','36');
		break;
		case "211":
			document.getElementById('subfuncion').options[1]=new Option ('Urbanización','37');
			document.getElementById('subfuncion').options[2]=new Option ('Desarrollo Cominitario','38');
			document.getElementById('subfuncion').options[3]=new Option ('Abastecimiento de Agua','39');
			document.getElementById('subfuncion').options[4]=new Option ('Alumbrado Público','40');
			document.getElementById('subfuncion').options[5]=new Option ('Vivienda','41');
			document.getElementById('subfuncion').options[6]=new Option ('Servicios Comunales','42');
			document.getElementById('subfuncion').options[7]=new Option ('Desarrollo Regional','43');
		break;
		case "212":
			document.getElementById('subfuncion').options[1]=new Option ('Prestación de Servicios de Salud a la Comunidad','44');
			document.getElementById('subfuncion').options[2]=new Option ('Prestación de Servicios de Salud a la Persona','45');
			document.getElementById('subfuncion').options[3]=new Option ('Generación de Recursos para la Salud','46');
			document.getElementById('subfuncion').options[4]=new Option ('Rectoría del Sistema de Salud','47');
			document.getElementById('subfuncion').options[5]=new Option ('Protección Social en Salud','48');
		break;
		case "213":
			document.getElementById('subfuncion').options[1]=new Option ('Deporte y Recreación','49');
			document.getElementById('subfuncion').options[2]=new Option ('Cultura','50');
			document.getElementById('subfuncion').options[3]=new Option ('Radio, Televisión y Editoriales','51');
			document.getElementById('subfuncion').options[4]=new Option ('Asuntos Religiosos y Otras Manifestaciones Sociales','52');
		break;
		case "214":
			document.getElementById('subfuncion').options[1]=new Option ('Educación Superior','55');
			document.getElementById('subfuncion').options[2]=new Option ('Postgrado','56');
			document.getElementById('subfuncion').options[3]=new Option ('Educación para Adultos','57');
			document.getElementById('subfuncion').options[4]=new Option ('Otros Servicios Educativos y Actividades Inherentes','58');
		break;
		case "215":
		    document.getElementById('subfuncion').options[1]=new Option ('Enfermedad e Incapacidad','59');
		    document.getElementById('subfuncion').options[2]=new Option ('Edad Avanzada','60');
		    document.getElementById('subfuncion').options[3]=new Option ('Familia e Hijos','61');
		    document.getElementById('subfuncion').options[4]=new Option ('Desempleo','62');
		    document.getElementById('subfuncion').options[5]=new Option ('Alimentaci&oacute;n y Nutrici&oacute;n','63');
		    document.getElementById('subfuncion').options[6]=new Option ('Apoyo Social para la Vivienda','64');
		    document.getElementById('subfuncion').options[7]=new Option ('Indigenas','65');
		    document.getElementById('subfuncion').options[8]=new Option ('Otros Grupos Vulnerables','66');
		    document.getElementById('subfuncion').options[9]=new Option ('Otros de Seguridad Social y Asistencia Social','67');
		break;
		case "216":
		document.getElementById('subfuncion').options[1]=new Option ('Otros Asuntos Sociales','68');
		break;
		case "317":
		document.getElementById('subfuncion').options[1]=new Option ('Asuntos Econ&oacute;micos y Comerciales en General','69');
		document.getElementById('subfuncion').options[2]=new Option ('Asuntos Laborales Generales','70');
		break;
		case "318":
		document.getElementById('subfuncion').options[1]=new Option ('Agropecuaria','71');
		document.getElementById('subfuncion').options[2]=new Option ('Silvicultura','72');
		document.getElementById('subfuncion').options[3]=new Option ('Acuacultura, Pezca y Caza','73');
		document.getElementById('subfuncion').options[4]=new Option ('Agroindustrial','74');
		document.getElementById('subfuncion').options[5]=new Option ('Hidroagr&iacute;cola','75');
		document.getElementById('subfuncion').options[6]=new Option ('Apoyo Financiero a la Banca y Seguro Agropecuario','76');
		break;
		case "319":
		document.getElementById('subfuncion').options[1]=new Option ('Carb&oacute;n y Otros Combustibles Minerales S&oacute;lidos','77');
		document.getElementById('subfuncion').options[2]=new Option ('Petr&oacute;leo y Gas Natural (Hidricarburos)','78');
		document.getElementById('subfuncion').options[3]=new Option ('Combustibles Nucleares','79');
		document.getElementById('subfuncion').options[4]=new Option ('Otros Combutibles','80');
		document.getElementById('subfuncion').options[5]=new Option ('Electricidad','81');
		document.getElementById('subfuncion').options[6]=new Option ('Energ&iacute;a no El&eacute;ctrica','82');
		break;
		case "320":
		document.getElementById('subfuncion').options[1]=new Option ('Extracci&oacute;n de Recursos Minerales excepto los Combustibles Minerales','83');
		document.getElementById('subfuncion').options[2]=new Option ('Manufacturas ','84');
		document.getElementById('subfuncion').options[3]=new Option ('Contrucci&oacute;n','85');
		break;
		case "321":
		document.getElementById('subfuncion').options[1]=new Option ('Transporte por Carretera','86');
		document.getElementById('subfuncion').options[2]=new Option ('Transporte por Agua y Puertos','87');
		document.getElementById('subfuncion').options[3]=new Option ('Transporte por Ferrocarril','88');
		document.getElementById('subfuncion').options[4]=new Option ('Transporte A&eacute;reo','89');
		document.getElementById('subfuncion').options[5]=new Option ('Transporte por Oleoductos y Gasoducto y Otros Sistemas de Transporte','90');
		document.getElementById('subfuncion').options[6]=new Option ('Otros Relacionados con Transporte','91');
		break;
		case "322":
		document.getElementById('subfuncion').options[1]=new Option ('Comunicaciones','92');
		break;
		case "323":
		document.getElementById('subfuncion').options[1]=new Option ('Turismo','93');
		document.getElementById('subfuncion').options[2]=new Option ('Hoteles y Restaurantes','94');
		break;
		case "324":
		document.getElementById('subfuncion').options[1]=new Option ('Investigaci&oacute;n Cient&iacute;fica','95');
		document.getElementById('subfuncion').options[2]=new Option ('Desarrollo Tecnol&oacute;gico','96');
		document.getElementById('subfuncion').options[3]=new Option ('Servicios Cient&iacute;ficos y Tecnol&oacute;gicos','97');
		document.getElementById('subfuncion').options[4]=new Option ('Innovaci&oacute;n','98');
		break;
		case "325":
		document.getElementById('subfuncion').options[1]=new Option ('Comercio, Distribuci&oacute;n, Almacenamiento y Dep&oacute;sito','99');
		document.getElementById('subfuncion').options[2]=new Option ('Otras Indutrias','100');
		document.getElementById('subfuncion').options[3]=new Option ('Otros Asuntos Econ&oacute;micos','101');
		break;
		case "426":
		document.getElementById('subfuncion').options[1]=new Option ('Deuda P&uacute;blica Interna','102');
		document.getElementById('subfuncion').options[2]=new Option ('Deuda P&uacute;blica Externa','103');
		break;
		case "427":
		document.getElementById('subfuncion').options[1]=new Option ('Transferencia entre Diferentes Niveles y Órdenes de Gobierno','104');
		document.getElementById('subfuncion').options[2]=new Option ('Participaciones entre Diferentes Niveles y Órdenes de Gobierno','105');
		document.getElementById('subfuncion').options[3]=new Option ('Aportaciones entre Diferentes Órdenes de Gobierno','106');
		break;
		case "428":
		document.getElementById('subfuncion').options[1]=new Option ('Saneamiento del Sistema Financiero','107');
		document.getElementById('subfuncion').options[2]=new Option ('Apoyos IPAB','108');
		document.getElementById('subfuncion').options[3]=new Option ('Banca de Desarrollo','109');
		document.getElementById('subfuncion').options[4]=new Option ('Apoyo a los Programas de reestructura en unidades de inversi&oacute;n (UDIS)','110');
		break;
		case "429":
		document.getElementById('subfuncion').options[1]=new Option ('Adeudos de Ejercicios Fiscales Anteriores','111');
		break;
    }
}

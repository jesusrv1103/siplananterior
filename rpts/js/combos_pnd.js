function llena_combo_objetivo(pnd_eje){
	 var id_pnd_eje = pnd_eje;
	 
	  if(id_pnd_eje==6){
     	 document.getElementById('pnd_objetivo').options[0] = new Option('No aplica','37');
     	 document.getElementById('pnd_estrategia').options[0] = new Option('No aplica','131');
     	 document.getElementById('pnd_linea').options[0] = new Option('No aplica','815');
     	 return false();
     }
	 
	 
	 
	 
	 document.getElementById('pnd_objetivo').length=0;
     document.getElementById('pnd_objetivo').options[0] = new Option('-Seleccione-','0');
     document.getElementById('pnd_estrategia').length=0;
     document.getElementById('pnd_estrategia').options[0] = new Option('-Seleccione-','0');
     document.getElementById('pnd_linea').length=0;
     document.getElementById('pnd_linea').options[0] = new Option('-Seleccione-','0');
     
    
     
     
    switch(id_pnd_eje){
 case"1":
document.getElementById('pnd_objetivo').options[1]=new Option('1.1. Promover y fortalecer la gobernabilidad democrática....','1');
document.getElementById('pnd_objetivo').options[2]=new Option('1.2. Garantizar la Seguridad Nacional....','2');
document.getElementById('pnd_objetivo').options[3]=new Option('1.3. Mejorar las condiciones de seguridad pública....','3');
document.getElementById('pnd_objetivo').options[4]=new Option('1.4. Garantizar un Sistema de Justicia Penal eficaz, expedito, i...','4');
document.getElementById('pnd_objetivo').options[5]=new Option('1.5. Garantizar el respeto y protección de los derechos h...','5');
document.getElementById('pnd_objetivo').options[6]=new Option('1.6. Salvaguardar a la población, a sus bienes y a su en...','6');
document.getElementById('pnd_objetivo').options[7]=new Option('1.A...','7');
break;
case"2":
document.getElementById('pnd_objetivo').options[1]=new Option('2.1. Garantizar el ejercicio efectivo de los derechos sociales p...','8');
document.getElementById('pnd_objetivo').options[2]=new Option('2.2. Transitar hacia una sociedad equitativa e incluyente....','9');
document.getElementById('pnd_objetivo').options[3]=new Option('2.3. Asegurar el acceso a los servicios de salud....','10');
document.getElementById('pnd_objetivo').options[4]=new Option('2.4. Ampliar el acceso a la seguridad social....','11');
document.getElementById('pnd_objetivo').options[5]=new Option('2.5. Proveer un entorno adecuado para el desarrollo de una vida ...','12');
document.getElementById('pnd_objetivo').options[6]=new Option('2.A...','13');
break;
case"3":
document.getElementById('pnd_objetivo').options[1]=new Option('3.1. Desarrollar el potencial humano de los mexicanos con educac...','14');
document.getElementById('pnd_objetivo').options[2]=new Option('3.2. Garantizar la inclusión y la equidad en el Sistema E...','15');
document.getElementById('pnd_objetivo').options[3]=new Option('3.3. Ampliar el acceso a la cultura como un medio para la formac...','16');
document.getElementById('pnd_objetivo').options[4]=new Option('3.4. Promover el deporte de manera incluyente para fomentar una ...','17');
document.getElementById('pnd_objetivo').options[5]=new Option('3.5. Hacer del desarrollo científico, tecnológico ...','18');
document.getElementById('pnd_objetivo').options[6]=new Option('3.A...','19');
break;
case"4":
document.getElementById('pnd_objetivo').options[1]=new Option('4.1. Mantener la estabilidad macroeconómica del paí...','20');
document.getElementById('pnd_objetivo').options[2]=new Option('4.2. Democratizar el acceso al financiamiento de proyectos con p...','21');
document.getElementById('pnd_objetivo').options[3]=new Option('4.3. Promover el empleo de calidad....','22');
document.getElementById('pnd_objetivo').options[4]=new Option('4.4. Impulsar y orientar un crecimiento verde incluyente y facil...','23');
document.getElementById('pnd_objetivo').options[5]=new Option('4.5. Democratizar el acceso a servicios de telecomunicaciones....','24');
document.getElementById('pnd_objetivo').options[6]=new Option('4.6. Abastecer de energía al país con precios comp...','25');
document.getElementById('pnd_objetivo').options[7]=new Option('4.7. Garantizar reglas claras que incentiven el desarrollo de un...','26');
document.getElementById('pnd_objetivo').options[8]=new Option('4.8. Desarrollar los sectores estratégicos del paí...','27');
document.getElementById('pnd_objetivo').options[9]=new Option('4.9. Contar con una infraestructura de transporte que se refleje...','28');
document.getElementById('pnd_objetivo').options[10]=new Option('4.10. Construir un sector agropecuario y pesquero productivo que...','29');
document.getElementById('pnd_objetivo').options[11]=new Option('4.11. Aprovechar el potencial turístico de México ...','30');
document.getElementById('pnd_objetivo').options[12]=new Option('4.A...','31');
break;
case"5":
document.getElementById('pnd_objetivo').options[1]=new Option('5.1. Ampliar y fortalecer la presencia de México en el mu...','32');
document.getElementById('pnd_objetivo').options[2]=new Option('5.2. Promover el valor de México en el mundo mediante la ...','33');
document.getElementById('pnd_objetivo').options[3]=new Option('5.3. Reafirmar el compromiso del país con el libre comerc...','34');
document.getElementById('pnd_objetivo').options[4]=new Option('5.4. Velar por los intereses de los mexicanos en el extranjero y...','35');
document.getElementById('pnd_objetivo').options[5]=new Option('5.A...','36');
break;

  }
}

function llena_combo_estrategia_pnd(objetivo_pnd){
	var id_pnd_objetivo = objetivo_pnd;
	 document.getElementById('pnd_estrategia').length=0;
     document.getElementById('pnd_estrategia').options[0] = new Option('-Seleccione-','0');
     document.getElementById('pnd_linea').length=0;
     document.getElementById('pnd_linea').options[0] = new Option('-Seleccione-','0');
     switch(id_pnd_objetivo){
     	case "1":
document.getElementById('pnd_estrategia').options['1']=new Option('1.1.1. Contribuir al desarrollo de la democracia.','1');
document.getElementById('pnd_estrategia').options['2']=new Option('1.1.2. Fortalecer la relación con el Honorable Congreso d','2');
document.getElementById('pnd_estrategia').options['3']=new Option('1.1.3. Impulsar un federalismo articulado mediante una coordinac','3');
document.getElementById('pnd_estrategia').options['4']=new Option('1.1.4. Prevenir y gestionar conflictos sociales a través ','4');
document.getElementById('pnd_estrategia').options['5']=new Option('1.1.5. Promover una nueva política de medios para la equi','5');
break;
case "2":
document.getElementById('pnd_estrategia').options['1']=new Option('1.2.1. Preservar la integridad, estabilidad y permanencia del Es','6');
document.getElementById('pnd_estrategia').options['2']=new Option('1.2.2. Preservar la paz, la independencia y soberanía de ','7');
document.getElementById('pnd_estrategia').options['3']=new Option('1.2.3. Fortalecer la inteligencia del Estado Mexicano para ident','8');
document.getElementById('pnd_estrategia').options['4']=new Option('1.2.4. Fortalecer las capacidades de respuesta operativa de las ','9');
document.getElementById('pnd_estrategia').options['5']=new Option('1.2.5. Modernizar los procesos, sistemas y la infraestructura in','10');
break;
case "3":
document.getElementById('pnd_estrategia').options['1']=new Option('1.3.1. Aplicar, evaluar y dar seguimiento del Programa Nacional ','11');
document.getElementById('pnd_estrategia').options['2']=new Option('1.3.2. Promover la transformación institucional y fortale','12');
break;
case "4":
document.getElementById('pnd_estrategia').options['1']=new Option('1.4.1. Abatir la impunidad.','13');
document.getElementById('pnd_estrategia').options['2']=new Option('1.4.2. Lograr una procuración de justicia efectiva.','14');
document.getElementById('pnd_estrategia').options['3']=new Option('1.4.3. Combatir la corrupción y transparentar la acci&oac','15');
break;
case "5":
document.getElementById('pnd_estrategia').options['1']=new Option('1.5.1. Instrumentar una política de Estado en derechos hu','16');
document.getElementById('pnd_estrategia').options['2']=new Option('1.5.2. Hacer frente a la violencia contra los niños, ni&n','17');
document.getElementById('pnd_estrategia').options['3']=new Option('1.5.3. Proporcionar servicios integrales a las víctimas u','18');
document.getElementById('pnd_estrategia').options['4']=new Option('1.5.4. Establecer una política de igualdad y no discrimin','19');
break;
case "6":
document.getElementById('pnd_estrategia').options['1']=new Option('1.6.1. Política estratégica para la prevenci&oacut','20');
document.getElementById('pnd_estrategia').options['2']=new Option('1.6.2. Gestión de emergencias y atención eficaz de','21');
break;
case "7":
document.getElementById('pnd_estrategia').options['1']=new Option('1.I. Democratizar la productividad','22');
document.getElementById('pnd_estrategia').options['2']=new Option('1.II. Gobierno Cercano y Moderno','23');
document.getElementById('pnd_estrategia').options['3']=new Option('1.III. Perspectiva de Género','24');
break;
case "8":
document.getElementById('pnd_estrategia').options['1']=new Option('2.1.1. Asegurar una alimentación y nutrición adecu','25');
document.getElementById('pnd_estrategia').options['2']=new Option('2.1.2. Fortalecer el desarrollo de capacidades en los hogares co','26');
document.getElementById('pnd_estrategia').options['3']=new Option('2.1.3. Garantizar y acreditar fehacientemente la identidad de la','27');
break;
case "9":
document.getElementById('pnd_estrategia').options['1']=new Option('2.2.1. Generar esquemas de desarrollo comunitario a travé','28');
document.getElementById('pnd_estrategia').options['2']=new Option('2.2.2. Articular políticas que atiendan de manera espec&i','29');
document.getElementById('pnd_estrategia').options['3']=new Option('2.2.3. Fomentar el bienestar de los pueblos y comunidades ind&ia','30');
document.getElementById('pnd_estrategia').options['4']=new Option('2.2.4. Proteger los derechos de las personas con discapacidad y ','31');
break;
case "10":
document.getElementById('pnd_estrategia').options['1']=new Option('2.3.1. Avanzar en la construcción de un Sistema Nacional ','32');
document.getElementById('pnd_estrategia').options['2']=new Option('2.3.2. Hacer de las acciones de protección, promoci&oacut','33');
document.getElementById('pnd_estrategia').options['3']=new Option('2.3.3. Mejorar la atención de la salud a la poblaci&oacut','34');
document.getElementById('pnd_estrategia').options['4']=new Option('2.3.4. Garantizar el acceso efectivo a servicios de salud de cal','35');
document.getElementById('pnd_estrategia').options['5']=new Option('2.3.5. Promover la cooperación internacional en salud.','36');
break;
case "11":
document.getElementById('pnd_estrategia').options['1']=new Option('2.4.1. Proteger a la sociedad ante eventualidades que afecten el','37');
document.getElementById('pnd_estrategia').options['2']=new Option('2.4.2. Promover la cobertura universal de servicios de seguridad','38');
document.getElementById('pnd_estrategia').options['3']=new Option('2.4.3. Instrumentar una gestión financiera de los organis','39');
break;
case "12":
document.getElementById('pnd_estrategia').options['1']=new Option('2.5.1. Transitar hacia un Modelo de Desarrollo Urbano Sustentabl','40');
document.getElementById('pnd_estrategia').options['2']=new Option('2.5.2. Reducir de manera responsable el rezago de vivienda a tra','41');
document.getElementById('pnd_estrategia').options['3']=new Option('2.5.3. Lograr una mayor y mejor coordinación interinstitu','42');
break;
case "13":
document.getElementById('pnd_estrategia').options['1']=new Option('2.I. Democratizar la productividad','43');
document.getElementById('pnd_estrategia').options['2']=new Option('2.II Gobierno Cercano y Moderno','44');
document.getElementById('pnd_estrategia').options['3']=new Option('2.III Perspectiva de Género','45');
break;
case "14":
document.getElementById('pnd_estrategia').options['1']=new Option('3.1.1. Establecer un sistema de profesionalización docent','46');
document.getElementById('pnd_estrategia').options['2']=new Option('3.1.2. Modernizar la infraestructura y el equipamiento de los ce','47');
document.getElementById('pnd_estrategia').options['3']=new Option('3.1.3. Garantizar que los planes y programas de estudio sean per','48');
document.getElementById('pnd_estrategia').options['4']=new Option('3.1.4. Promover la incorporación de las nuevas tecnolog&i','49');
document.getElementById('pnd_estrategia').options['5']=new Option('3.1.5. Disminuir el abandono escolar, mejorar la eficiencia term','50');
document.getElementById('pnd_estrategia').options['6']=new Option('3.1.6. Impulsar un Sistema Nacional de Evaluación que ord','51');
break;
case "15":
document.getElementById('pnd_estrategia').options['1']=new Option('3.2.1. Ampliar las oportunidades de acceso a la educación','52');
document.getElementById('pnd_estrategia').options['2']=new Option('3.2.2. Ampliar los apoyos a niños y jóvenes en sit','53');
document.getElementById('pnd_estrategia').options['3']=new Option('3.2.3. Crear nuevos servicios educativos, ampliar los existentes','54');
break;
case "16":
document.getElementById('pnd_estrategia').options['1']=new Option('3.3.1. Situar a la cultura entre los servicios básicos br','55');
document.getElementById('pnd_estrategia').options['2']=new Option('3.3.2. Asegurar las condiciones para que la infraestructura cult','56');
document.getElementById('pnd_estrategia').options['3']=new Option('3.3.3. Proteger y preservar el patrimonio cultural nacional.','57');
document.getElementById('pnd_estrategia').options['4']=new Option('3.3.4. Fomentar el desarrollo cultural del país a trav&ea','58');
document.getElementById('pnd_estrategia').options['5']=new Option('3.3.5. Posibilitar el acceso universal a la cultura mediante el ','59');
break;
case "17":
document.getElementById('pnd_estrategia').options['1']=new Option('3.4.1. Crear un programa de infraestructura deportiva.','60');
document.getElementById('pnd_estrategia').options['2']=new Option('3.4.2. Diseñar programas de actividad física y dep','61');
break;
case "18":
document.getElementById('pnd_estrategia').options['1']=new Option('3.5.1. Contribuir a que la inversión nacional en investig','62');
document.getElementById('pnd_estrategia').options['2']=new Option('3.5.2. Contribuir a la formación y fortalecimiento del ca','63');
document.getElementById('pnd_estrategia').options['3']=new Option('3.5.3. Impulsar el desarrollo de las vocaciones y capacidades ci','64');
document.getElementById('pnd_estrategia').options['4']=new Option('3.5.4. Contribuir a la transferencia y aprovechamiento del conoc','65');
document.getElementById('pnd_estrategia').options['5']=new Option('3.5.5. Contribuir al fortalecimiento de la infraestructura cient','66');
break;
case "19":
document.getElementById('pnd_estrategia').options['1']=new Option('3.I. Democratizar la Productividad','67');
document.getElementById('pnd_estrategia').options['2']=new Option('3.II Gobierno Cercano y Moderno','68');
document.getElementById('pnd_estrategia').options['3']=new Option('3.III Perspectiva de Género','69');
break;
case "20":
document.getElementById('pnd_estrategia').options['1']=new Option('4.1.1. Proteger las finanzas públicas ante riesgos del en','70');
document.getElementById('pnd_estrategia').options['2']=new Option('4.1.2. Fortalecer los ingresos del sector público.','71');
document.getElementById('pnd_estrategia').options['3']=new Option('4.1.3. Promover un ejercicio eficiente de los recursos presupues','72');
break;
case "21":
document.getElementById('pnd_estrategia').options['1']=new Option('4.2.1. Promover el financiamiento a través de institucion','73');
document.getElementById('pnd_estrategia').options['2']=new Option('4.2.2. Ampliar la cobertura del sistema financiero hacia un mayo','74');
document.getElementById('pnd_estrategia').options['3']=new Option('4.2.3 Mantener la estabilidad que permita el desarrollo ordenado','75');
document.getElementById('pnd_estrategia').options['4']=new Option('4.2.4 Ampliar el acceso al crédito y a otros servicios fi','76');
document.getElementById('pnd_estrategia').options['5']=new Option('4.2.5 Promover la participación del sector privado en el ','77');
break;
case "22":
document.getElementById('pnd_estrategia').options['1']=new Option('4.3.1 Procurar el equilibrio entre los factores de la producci&o','78');
document.getElementById('pnd_estrategia').options['2']=new Option('4.3.2 Promover el trabajo digno o decente.','79');
document.getElementById('pnd_estrategia').options['3']=new Option('4.3.3 Promover el incremento de la productividad con beneficios ','80');
document.getElementById('pnd_estrategia').options['4']=new Option('4.3.4 Perfeccionar los sistemas y procedimientos de protecci&oac','81');
break;
case "23":
document.getElementById('pnd_estrategia').options['1']=new Option('4.4.1 implementar una política integralo de desarrollo qu','82');
document.getElementById('pnd_estrategia').options['2']=new Option('4.4.2 Implementar un manejo sustentable del agua, haciendo posib','83');
document.getElementById('pnd_estrategia').options['3']=new Option('4.4.3 Fortalecer la política nacional de cambio clim&aacu','84');
document.getElementById('pnd_estrategia').options['4']=new Option('4.4.4 Proteger el patrimonio natural','85');
break;
case "24":
document.getElementById('pnd_estrategia').options['1']=new Option('4.5.1 Impulsar el desarrollo e innovación tecnológ','86');
break;
case "25":
document.getElementById('pnd_estrategia').options['1']=new Option('4.6.1 Asegurar el abastecimiento de petróleo crudo, gas n','87');
document.getElementById('pnd_estrategia').options['2']=new Option('4.6.2 Asegurar el abastecimiento racional de energía el&e','88');
break;
case "26":
document.getElementById('pnd_estrategia').options['1']=new Option('4.7.1 Apuntalar la competencia en el mercado interno','89');
document.getElementById('pnd_estrategia').options['2']=new Option('4.7.2 Implementar una mejora reguladora integral','90');
document.getElementById('pnd_estrategia').options['3']=new Option('4.7.3 Fortalecer el sistema de normalización y evaluaci&o','91');
document.getElementById('pnd_estrategia').options['4']=new Option('4.7.4 Promover mayores niveles de inversión a travé','92');
document.getElementById('pnd_estrategia').options['5']=new Option('4.7.5 Proteger los derechos del consumidor, mejorar la informaci','93');
break;
case "27":
document.getElementById('pnd_estrategia').options['1']=new Option('4.8.1 Reactivar una política de fomento económico ','94');
document.getElementById('pnd_estrategia').options['2']=new Option('4.8.2 Promover mayores niveles de inversión y competitivi','95');
document.getElementById('pnd_estrategia').options['3']=new Option('4.8.3 Orientar y hacer más eficiente el gasto públ','96');
document.getElementById('pnd_estrategia').options['4']=new Option('4.8.4 Impulsar a los emprendedores y fortalecer a las micro, peq','97');
document.getElementById('pnd_estrategia').options['5']=new Option('4.8.5 Fomentar la economía social','98');
break;
case "28":
document.getElementById('pnd_estrategia').options['1']=new Option('4.9.1 modernizar, ampliar y conservar la infraestructura de los ','99');
break;
case "29":
document.getElementById('pnd_estrategia').options['1']=new Option('4.10.1 Impulsar la productividad en el sector agroalimentario me','100');
document.getElementById('pnd_estrategia').options['2']=new Option('4.10.2 Impulsar modelos de asociación que generen econom&','101');
document.getElementById('pnd_estrategia').options['3']=new Option('4.10.3 Promover mayor certidumbre en la actividad agroalimentari','102');
document.getElementById('pnd_estrategia').options['4']=new Option('4.10.4 Impulsar el aprovechamiento sustentable de los recursos n','103');
document.getElementById('pnd_estrategia').options['5']=new Option('4.10.5 Modernizar el marco normativo e institucional para impuls','104');
break;
case "30":
document.getElementById('pnd_estrategia').options['1']=new Option('4.11.1 Impulsar el ordenamiento y la transformación del s','105');
document.getElementById('pnd_estrategia').options['2']=new Option('4.11.2 Impulsar la innovación de la oferta y elevar la co','106');
document.getElementById('pnd_estrategia').options['3']=new Option('4.11.3 Fomentar un mayor flujo de inversiones y financiamiento e','107');
document.getElementById('pnd_estrategia').options['4']=new Option('4.11.4 Impulsar la sustentabilidad y que los ingresos generados ','108');
break;
case "31":
document.getElementById('pnd_estrategia').options['1']=new Option('4.I Democratizar la Productividad','109');
document.getElementById('pnd_estrategia').options['2']=new Option('4.II. Gobierno Cernano y Moderno','110');
document.getElementById('pnd_estrategia').options['3']=new Option('4.III Perspectiva de Género','111');
break;
case "32":
document.getElementById('pnd_estrategia').options['1']=new Option('5.1.1 Consolidar la relación con Estados Unidos y Canad&a','112');
document.getElementById('pnd_estrategia').options['2']=new Option('5.1.2 Consolidar la posición de México como un act','113');
document.getElementById('pnd_estrategia').options['3']=new Option('5.1.3 Consolidar las relaciones con los países europeos s','114');
document.getElementById('pnd_estrategia').options['4']=new Option('5.1.4 Consolidar a Asia-Pacífico como región clave','115');
document.getElementById('pnd_estrategia').options['5']=new Option('5.1.5 Aprovechar las oportunidades que presenta el sistema inter','116');
document.getElementById('pnd_estrategia').options['6']=new Option('5.1.6 Consolidar el papel de México como un actor respons','117');
document.getElementById('pnd_estrategia').options['7']=new Option('5.1.7 Impulsar una vigorosa política de cooperació','118');
break;
case "33":
document.getElementById('pnd_estrategia').options['1']=new Option('5.2.1 Consolidar la red de representaciones de México en ','119');
document.getElementById('pnd_estrategia').options['2']=new Option('5.2.2 Definir agendas en materia de diplomacia pública y ','120');
break;
case "34":
document.getElementById('pnd_estrategia').options['1']=new Option('5.3.1 Impulsar y profundizar la política de apertura come','121');
break;
case "35":
document.getElementById('pnd_estrategia').options['1']=new Option('5.4.1 Ofrecer asistencia y protección consular a todos aq','123');
document.getElementById('pnd_estrategia').options['2']=new Option('5.4.2 Crear mecanismos para la reinserción de las persona','124');
document.getElementById('pnd_estrategia').options['3']=new Option('5.4.3 Facilitar la movilidad internacional de personas en benefi','125');
document.getElementById('pnd_estrategia').options['4']=new Option('5.4.4 Diseñar mecanismos de coordinación interinst','126');
document.getElementById('pnd_estrategia').options['5']=new Option('5.4.5 Garantizar los derechos de las personas migrantes, solicit','127');
break;
case "36":
document.getElementById('pnd_estrategia').options['1']=new Option('5.I. Democratizar la Productividad','128');
document.getElementById('pnd_estrategia').options['2']=new Option('5.II Gobierno Cercano y Moderno','129');
document.getElementById('pnd_estrategia').options['3']=new Option('5.III Perspectiva de Género','130');
break;

     }
}


function llena_combo_lineas_pnd(estrategia_pnd){
	var id_pnd_estrategia = estrategia_pnd;
	 document.getElementById('pnd_linea').length=0;
     document.getElementById('pnd_linea').options[0] = new Option('-Seleccione-','0');
    switch(id_pnd_estrategia){
    	case "1":
document.getElementById('pnd_linea').options['1']=new Option('1.1.1.1 Impulsar el respeto a los derechos políticos ...','1');
document.getElementById('pnd_linea').options['2']=new Option('1.1.1.1 Impulsar el respeto a los derechos políticos ...','2');
document.getElementById('pnd_linea').options['3']=new Option('1.1.1.2 Alentar acciones que promuevan la construcció...','3');
document.getElementById('pnd_linea').options['4']=new Option('1.1.1.3 Difundir campañas que contribuyan al fortalec...','4');
document.getElementById('pnd_linea').options['5']=new Option('1.1.1.4 Mantener una relación de colaboración,...','5');
document.getElementById('pnd_linea').options['6']=new Option('1.1.1.5 Coordinar con gobiernos estatales la instrumentaci&o...','6');
document.getElementById('pnd_linea').options['7']=new Option('1.1.1.6 Emitir lineamientos para el impulso y la conformaci&...','7');
document.getElementById('pnd_linea').options['8']=new Option('1.1.1.7 Promover convenios de colaboración para el fo...','8');
break;
case "2":
document.getElementById('pnd_linea').options['1']=new Option('1.1.2.1 Establecer mecanismos de enlace y diálogo per...','9');
document.getElementById('pnd_linea').options['2']=new Option('1.1.2.2 Construir una agenda legislativa nacional incluyente...','10');
document.getElementById('pnd_linea').options['3']=new Option('1.1.2.3 Promover consensos y acuerdos con el Poder Legislati...','11');
document.getElementById('pnd_linea').options['4']=new Option('1.1.2.4 Diseñar, promover y construir acuerdos con or...','12');
break;
case "3":
document.getElementById('pnd_linea').options['1']=new Option('1.1.3.1 Impulsar la inclusión y participación ...','13');
document.getElementById('pnd_linea').options['2']=new Option('1.1.3.2 Promover la firma de Convenios únicos de Coor...','14');
document.getElementById('pnd_linea').options['3']=new Option('1.1.3.3 Diseñar e implementar un programa que dirija ...','15');
document.getElementById('pnd_linea').options['4']=new Option('1.1.3.4 Impulsar, mediante estudios e investigaciones, estra...','16');
document.getElementById('pnd_linea').options['5']=new Option('1.1.3.5 Promover el desarrollo de capacidades institucionale...','17');
break;
case "4":
document.getElementById('pnd_linea').options['1']=new Option('1.1.4.1 Establecer acciones coordinadas para la identificaci...','18');
document.getElementById('pnd_linea').options['2']=new Option('1.1.4.2 Promover la resolución de conflictos mediante...','19');
document.getElementById('pnd_linea').options['3']=new Option('1.1.4.3 Garantizar a los ciudadanos mexicanos el ejercicio d...','20');
document.getElementById('pnd_linea').options['4']=new Option('1.1.4.4 Garantizar y promover el respeto a los principios y ...','21');
document.getElementById('pnd_linea').options['5']=new Option('1.1.4.5 Impulsar un Acuerdo Nacional para el Bienestar, el R...','22');
break;
case "5":
document.getElementById('pnd_linea').options['1']=new Option('1.1.5.1 Promover una regulación de los contenidos de ...','23');
document.getElementById('pnd_linea').options['2']=new Option('1.1.5.2 Establecer una estrategia de comunicación coo...','24');
document.getElementById('pnd_linea').options['3']=new Option('1.1.5.3 Utilizar los medios de comunicación como agen...','25');
document.getElementById('pnd_linea').options['4']=new Option('1.1.5.4 Vigilar que las transmisiones cumplan con las dispos...','26');
document.getElementById('pnd_linea').options['5']=new Option('1.1.5.5 Generar políticas públicas que permita...','27');
break;
case "6":
document.getElementById('pnd_linea').options['1']=new Option('1.2.1.1 Impulsar la creación de instancias de coordin...','28');
document.getElementById('pnd_linea').options['2']=new Option('1.2.1.2 Impulsar mecanismos de concertación de accion...','29');
document.getElementById('pnd_linea').options['3']=new Option('1.2.1.3 Promover esquemas de coordinación y cooperaci...','30');
document.getElementById('pnd_linea').options['4']=new Option('1.2.1.4 Impulsar el desarrollo del marco jurídico en ...','31');
document.getElementById('pnd_linea').options['5']=new Option('1.2.1.5 Establecer canales adecuados de comunicación ...','32');
document.getElementById('pnd_linea').options['6']=new Option('1.2.1.6 Fortalecer a la inteligencia civil como un ór...','33');
break;
case "7":
document.getElementById('pnd_linea').options['1']=new Option('1.2.2.1 Impulsar la creación de instrumentos jur&iacu...','34');
document.getElementById('pnd_linea').options['2']=new Option('1.2.2.2 Adecuar la División Territorial Militar, Nava...','35');
document.getElementById('pnd_linea').options['3']=new Option('1.2.2.3 Fortalecer las actividades militares en los á...','36');
document.getElementById('pnd_linea').options['4']=new Option('1.2.2.4 Desarrollar operaciones coordinadas en los puntos ne...','37');
document.getElementById('pnd_linea').options['5']=new Option('1.2.2.5 Impulsar la coordinación con entidades paraes...','38');
document.getElementById('pnd_linea').options['6']=new Option('1.2.2.6 Coadyuvar con las instancias de seguridad púb...','39');
document.getElementById('pnd_linea').options['7']=new Option('1.2.2.7 Impulsar y participar en mecanismos o iniciativas de...','40');
break;
case "8":
document.getElementById('pnd_linea').options['1']=new Option('1.2.3.1 Integrar una agenda de Seguridad Nacional que identi...','41');
document.getElementById('pnd_linea').options['2']=new Option('1.2.3.2 Impulsar la creación de instrumentos jur&iacu...','42');
document.getElementById('pnd_linea').options['3']=new Option('1.2.3.3 Impulsar, mediante la realización de estudios...','43');
document.getElementById('pnd_linea').options['4']=new Option('1.2.3.4 Diseñar y operar un Sistema Nacional de Intel...','44');
document.getElementById('pnd_linea').options['5']=new Option('1.2.3.5 Fortalecer el Sistema de Inteligencia Militar y el S...','45');
document.getElementById('pnd_linea').options['6']=new Option('1.2.3.6 Promover, con las instancias de la Administraci&oacu...','46');
document.getElementById('pnd_linea').options['7']=new Option('1.2.3.7 Coadyuvar en la identificación, prevenci&oacu...','47');
document.getElementById('pnd_linea').options['8']=new Option('1.2.3.8 Diseñar e impulsar una estrategia de segurida...','48');
document.getElementById('pnd_linea').options['9']=new Option('1.2.3.9 Establecer un Sistema de Vigilancia Aérea, Ma...','49');
document.getElementById('pnd_linea').options['10']=new Option('1.2.3.10 Fortalecer la seguridad de nuestras fronteras....','50');
break;
case "9":
document.getElementById('pnd_linea').options['1']=new Option('1.2.4.1 Fortalecer las capacidades de las Fuerzas Armadas co...','51');
document.getElementById('pnd_linea').options['2']=new Option('1.2.4.2 Contribuir en la atención de necesidades soci...','52');
document.getElementById('pnd_linea').options['3']=new Option('1.2.4.3 Fortalecer el Sistema de Búsqueda y Rescate M...','53');
document.getElementById('pnd_linea').options['4']=new Option('1.2.4.4 Fortalecer el Sistema de Mando y Control de la Armad...','54');
document.getElementById('pnd_linea').options['5']=new Option('1.2.4.5 Continuar con el programa de sustitución de b...','55');
document.getElementById('pnd_linea').options['6']=new Option('1.2.4.6 Fortalecer la capacidad de apoyo aéreo a las ...','56');
break;
case "10":
document.getElementById('pnd_linea').options['1']=new Option('1.2.5.1 Realizar cambios sustantivos en el Sistema Educativo...','57');
document.getElementById('pnd_linea').options['2']=new Option('1.2.5.2 Construir y adecuar la infraestructura, instalacione...','58');
document.getElementById('pnd_linea').options['3']=new Option('1.2.5.3 Fortalecer el marco legal en materia de protecci&oac...','59');
document.getElementById('pnd_linea').options['4']=new Option('1.2.5.4 Mejorar la seguridad social de los integrantes de la...','60');
document.getElementById('pnd_linea').options['5']=new Option('1.2.5.5 Impulsar reformas legales que fortalezcan el desarro...','61');
document.getElementById('pnd_linea').options['6']=new Option('1.2.5.6 Fortalecer y modernizar el Servicio de Policí...','62');
break;
case "11":
document.getElementById('pnd_linea').options['1']=new Option('1.3.1.1 Coordinar la estrategia nacional para reducir los &i...','63');
document.getElementById('pnd_linea').options['2']=new Option('1.3.1.2 Aplicar una campaña de comunicación en...','64');
document.getElementById('pnd_linea').options['3']=new Option('1.3.1.3 Dar seguimiento y evaluación de las acciones ...','65');
document.getElementById('pnd_linea').options['4']=new Option('1.3.1.4 Crear y desarrollar instrumentos validados y de proc...','66');
document.getElementById('pnd_linea').options['5']=new Option('1.3.1.5 Implementar y dar seguimiento a mecanismos de preven...','67');
document.getElementById('pnd_linea').options['6']=new Option('1.3.1.6 Garantizar condiciones para la existencia de mayor s...','68');
break;
case "12":
document.getElementById('pnd_linea').options['1']=new Option('1.3.2.1 Reorganizar la Policía Federal hacia un esque...','69');
document.getElementById('pnd_linea').options['2']=new Option('1.3.2.2 Establecer una coordinación efectiva entre in...','70');
document.getElementById('pnd_linea').options['3']=new Option('1.3.2.3 Generar información y comunicaciones oportuna...','71');
document.getElementById('pnd_linea').options['4']=new Option('1.3.2.4 Orientar la planeación en seguridad hacia un ...','72');
document.getElementById('pnd_linea').options['5']=new Option('1.3.2.5 Promover en el Sistema Penitenciario Nacional la rei...','73');
break;
case "13":
document.getElementById('pnd_linea').options['1']=new Option('1.4.1.1 Proponer las reformas legales en las áreas qu...','74');
document.getElementById('pnd_linea').options['2']=new Option('1.4.1.2 Diseñar y ejecutar las adecuaciones normativa...','75');
document.getElementById('pnd_linea').options['3']=new Option('1.4.1.3 Consolidar los procesos de formación, capacit...','76');
document.getElementById('pnd_linea').options['4']=new Option('1.4.1.4 Rediseñar y actualizar los protocolos de actu...','77');
document.getElementById('pnd_linea').options['5']=new Option('1.4.1.5 Capacitar a los operadores del Sistema de Justicia P...','78');
document.getElementById('pnd_linea').options['6']=new Option('1.4.1.6 Implantar un Nuevo Modelo de Operación Insitu...','79');
document.getElementById('pnd_linea').options['7']=new Option('1.4.1.7 Implementar un sistema de información institu...','80');
document.getElementById('pnd_linea').options['8']=new Option('1.4.1.8 Rediseñar el servicio de carrera de los opera...','81');
document.getElementById('pnd_linea').options['9']=new Option('1.4.1.9 Proporcionar asistencia y representación efic...','82');
break;
case "14":
document.getElementById('pnd_linea').options['1']=new Option('1.4.2.1 Proponer las reformas constitucionales y legales que...','83');
document.getElementById('pnd_linea').options['2']=new Option('1.4.2.2 Establecer un programa en materia de desarrollo tecn...','84');
document.getElementById('pnd_linea').options['3']=new Option('1.4.2.3 Coadyuvar en la definición de una nueva pol&i...','85');
document.getElementById('pnd_linea').options['4']=new Option('1.4.2.4 Desarrollar un nuevo esquema de despliegue regional,...','86');
document.getElementById('pnd_linea').options['5']=new Option('1.4.2.5 Robustecer el papel de la Procuraduría Genera...','87');
document.getElementById('pnd_linea').options['6']=new Option('1.4.2.6 Mejorar la calidad de la investigación de hec...','88');
break;
case "15":
document.getElementById('pnd_linea').options['1']=new Option('1.4.3.1 Promover la creación de un organismo aut&oacu...','89');
document.getElementById('pnd_linea').options['2']=new Option('1.4.3.2 Desarrollar criterios de selección evaluaci&...','90');
document.getElementById('pnd_linea').options['3']=new Option('1.4.3.3 Mejorar los procesos de vigilancia en relació...','91');
document.getElementById('pnd_linea').options['4']=new Option('1.4.3.4 Transparentar la actuación ministerial ante l...','92');
document.getElementById('pnd_linea').options['5']=new Option('1.4.3.5 Fortalecer los mecanismos de coordinación ent...','93');
break;
case "16":
document.getElementById('pnd_linea').options['1']=new Option('1.5.1.1 Establecer un programa dirigido a la promoció...','94');
document.getElementById('pnd_linea').options['2']=new Option('1.5.1.2 Promover la implementación de los principios ...','95');
document.getElementById('pnd_linea').options['3']=new Option('1.5.1.3 Promover mecanismos de coordinación con las d...','96');
document.getElementById('pnd_linea').options['4']=new Option('1.5.1.4 Establecer mecanismos de colaboración para pr...','97');
document.getElementById('pnd_linea').options['5']=new Option('1.5.1.5 Promover adecuaciones al ordenamiento jurídic...','98');
document.getElementById('pnd_linea').options['6']=new Option('1.5.1.6 Generar información que favorezca la localiza...','99');
document.getElementById('pnd_linea').options['7']=new Option('1.5.1.7 Actualizar, sensibilizar y estandarizar los niveles ...','100');
document.getElementById('pnd_linea').options['8']=new Option('1.5.1.8 Promover acciones para la difusión del conoci...','101');
document.getElementById('pnd_linea').options['9']=new Option('1.5.1.9 Promover los protocolos de respeto a los derechos hu...','102');
document.getElementById('pnd_linea').options['10']=new Option('1.5.1.10 Dar cumplimiento a las recomendaciones y sentencias...','103');
document.getElementById('pnd_linea').options['11']=new Option('1.5.1.11 Impulsar la inclusión de los derechos humanm...','104');
document.getElementById('pnd_linea').options['12']=new Option('1.5.1.12 Fortalecer los mecanismos de protección de d...','105');
break;
case "17":
document.getElementById('pnd_linea').options['1']=new Option('1.5.2.1 Prohibir y sancionar efectivamente todas las formas ...','106');
document.getElementById('pnd_linea').options['2']=new Option('1.5.2.2 Priorizar la prevención de la violencia contr...','107');
document.getElementById('pnd_linea').options['3']=new Option('1.5.2.3 Crear sistemas de denuncia accesibles y adecuados pa...','108');
document.getElementById('pnd_linea').options['4']=new Option('1.5.2.4 Promover la recopilación de datos de todas la...','109');
break;
case "18":
document.getElementById('pnd_linea').options['1']=new Option('1.5.3.1 Coadyuvar en el funcionamiento del Sistema Nacional ...','110');
document.getElementById('pnd_linea').options['2']=new Option('1.5.3.2 Promover el cumplimiento de la obligación de ...','111');
document.getElementById('pnd_linea').options['3']=new Option('1.5.3.3 Fortalecer el establecimiento en todo el país...','112');
document.getElementById('pnd_linea').options['4']=new Option('1.5.3.4 Establecer mecanismos que permitan al órgano ...','113');
document.getElementById('pnd_linea').options['5']=new Option('1.5.3.5 Promover la participación y establecer mecani...','114');
break;
case "19":
document.getElementById('pnd_linea').options['1']=new Option('1.5.4.1 Promover la armonización del marco jurí...','115');
document.getElementById('pnd_linea').options['2']=new Option('1.5.4.2 Promover acciones afirmativas dirigidas a generar co...','116');
document.getElementById('pnd_linea').options['3']=new Option('1.5.4.3 Fortalacer los mecanismos competentes para prevenir ...','117');
document.getElementById('pnd_linea').options['4']=new Option('1.5.4.4 Promover acciones concertadas dirigidas a propiciar ...','118');
document.getElementById('pnd_linea').options['5']=new Option('1.5.4.5 Promover el enfoque de derechos humanos y no discrim...','119');
document.getElementById('pnd_linea').options['6']=new Option('1.5.4.6 Promover una legislación acorde a la Convenci...','120');
break;
case "20":
document.getElementById('pnd_linea').options['1']=new Option('1.6.1.1 Promover y consolidar la elaboración de un At...','121');
document.getElementById('pnd_linea').options['2']=new Option('1.6.1.2 Impulsar la Gestión Integral del Riesgo como ...','122');
document.getElementById('pnd_linea').options['3']=new Option('1.6.1.3 Fomentar la cultura de protección civil y la ...','123');
document.getElementById('pnd_linea').options['4']=new Option('1.6.1.4 Fortalecer los instrumentos financieros de gesti&oac...','124');
document.getElementById('pnd_linea').options['5']=new Option('1.6.1.5 Promover los estudios y mecanismos tendientes a la t...','125');
document.getElementById('pnd_linea').options['6']=new Option('1.6.1.6 Fomentar, desarrollar y promover Normas Oficiales Me...','126');
document.getElementById('pnd_linea').options['7']=new Option('1.6.1.7 Promover el fortalecimiento de las normas existentes...','127');
break;
case "21":
document.getElementById('pnd_linea').options['1']=new Option('1.6.2.1 Fortalecer la capacidad logística y de operac...','128');
document.getElementById('pnd_linea').options['2']=new Option('1.6.2.2 Fortalecer las capacidades de las Fuerzas Armadas pa...','129');
document.getElementById('pnd_linea').options['3']=new Option('1.6.2.3 Coordinar los esfuerzos de los gobiernos federal, es...','130');
break;
case "22":
document.getElementById('pnd_linea').options['1']=new Option('1.I.1 Impulsar la correcta implementación de las estr...','131');
break;
case "23":
document.getElementById('pnd_linea').options['1']=new Option('1.II.1 Estrechar desde la Oficina de la Presidencia, la Secr...','132');
document.getElementById('pnd_linea').options['2']=new Option('1.II.2 Evaluar y retroalimentar las acciones de las fuerzas ...','133');
document.getElementById('pnd_linea').options['3']=new Option('1.II.3 Impulsar la congruencia y consistencia del orden norm...','134');
document.getElementById('pnd_linea').options['4']=new Option('1.II.4 Promover la eficiencia en el Sistema de Justicia Form...','135');
document.getElementById('pnd_linea').options['5']=new Option('1.II.5 Colaborar en la promoción de acciones para una...','136');
document.getElementById('pnd_linea').options['6']=new Option('1.II.6 Fortalecer la investigación y el desarrollo ci...','137');
document.getElementById('pnd_linea').options['7']=new Option('1.II.7 Difundir, con apego a los principios de legalidad, ce...','138');
document.getElementById('pnd_linea').options['8']=new Option('1.II.8 Promover el respeto a los derechos humanos y la relac...','139');
document.getElementById('pnd_linea').options['9']=new Option('1.II.9 Fortalecer las políticas en materia de federal...','140');
break;
case "24":
document.getElementById('pnd_linea').options['1']=new Option('1.III.1 Fomentar la participación y representaci&oacu...','141');
document.getElementById('pnd_linea').options['2']=new Option('1.III.2 Establecer medidas especiales orientadas a la erradi...','142');
document.getElementById('pnd_linea').options['3']=new Option('1.III.3 Garantizar el cumplimiento de los acuerdos generales...','143');
document.getElementById('pnd_linea').options['4']=new Option('1.III.4 Fortalecer el Banco Nacional de Datos e Informaci&oa...','144');
document.getElementById('pnd_linea').options['5']=new Option('1.III.5 Simplificar los procesos y mejorar la coordinaci&oac...','145');
document.getElementById('pnd_linea').options['6']=new Option('1.III.6 Acelerar la aplicación cabal de las ór...','146');
document.getElementById('pnd_linea').options['7']=new Option('1.III.7 Promover la armonización de protocolos de inv...','147');
document.getElementById('pnd_linea').options['8']=new Option('1.III.8 Propiciar la tipificación del delito de trata...','148');
document.getElementById('pnd_linea').options['9']=new Option('1.III.9 Llevar a cabo campañas nacionales de sensibil...','149');
document.getElementById('pnd_linea').options['10']=new Option('1.III.10 Capacitar a los funcionarios encargados de hacer cu...','150');
document.getElementById('pnd_linea').options['11']=new Option('1.III.11 Promover el enfoque de género en las actuaci...','151');
document.getElementById('pnd_linea').options['12']=new Option('1.III.12 Incorporar acciones específicas para garanti...','152');
break;
case "25":
document.getElementById('pnd_linea').options['1']=new Option('2.1.1.1 Combatir la carencia alimentaria de la poblaci&oacut...','153');
document.getElementById('pnd_linea').options['2']=new Option('2.1.1.2 Propiciar un ingreso mínimo necesario para qu...','154');
document.getElementById('pnd_linea').options['3']=new Option('2.1.1.3 Facilitar el acceso a productos alimenticios b&aacut...','155');
document.getElementById('pnd_linea').options['4']=new Option('2.1.1.4 Incorporar componentes de carácter productivo...','156');
document.getElementById('pnd_linea').options['5']=new Option('2.1.1.5 Adecuar el marco jurídico para fortalecer la ...','157');
break;
case "26":
document.getElementById('pnd_linea').options['1']=new Option('2.1.2.1 Propiciar que los niños, niñas y j&oac...','158');
document.getElementById('pnd_linea').options['2']=new Option('2.1.2.2 Fomentar el acceso efectivo de las familias, princip...','159');
document.getElementById('pnd_linea').options['3']=new Option('2.1.2.3 Otorgar los beneficios del Sistema de Protecci&oacut...','160');
document.getElementById('pnd_linea').options['4']=new Option('2.1.2.4 Brindar capacitación a la población pa...','161');
document.getElementById('pnd_linea').options['5']=new Option('2.1.2.5 Contribuir al mejor desempeño escolar a trav&...','162');
document.getElementById('pnd_linea').options['6']=new Option('2.1.2.6 Promover acciones de desarrollo infantil temprano...','163');
break;
case "27":
document.getElementById('pnd_linea').options['1']=new Option('2.1.3.1 Impulsar la modernización de los Registros Ci...','164');
document.getElementById('pnd_linea').options['2']=new Option('2.1.3.2 Fortalecer el uso y adopción de la Clave &uac...','165');
document.getElementById('pnd_linea').options['3']=new Option('2.1.3.3 Consolidar el Sistema Nacional de Identificaci&oacut...','166');
document.getElementById('pnd_linea').options['4']=new Option('2.1.3.4 Adecuar el marco normativo en materia de poblaci&oac...','167');
break;
case "28":
document.getElementById('pnd_linea').options['1']=new Option('2.2.1.1 Fortalecer a los actores sociales que promuevan el d...','168');
document.getElementById('pnd_linea').options['2']=new Option('2.2.1.2 Potenciar la inversión conjunta de la socieda...','169');
document.getElementById('pnd_linea').options['3']=new Option('2.2.1.3 Fortalecer el capital y cohesión social media...','170');
break;
case "29":
document.getElementById('pnd_linea').options['1']=new Option('2.2.2.1 Promover el desarrollo integral de los niños ...','171');
document.getElementById('pnd_linea').options['2']=new Option('2.2.2.2 Fomentar el desarrollo personal y profesional de los...','172');
document.getElementById('pnd_linea').options['3']=new Option('2.2.2.3 Fortalecer la protección de los derechos de l...','173');
break;
case "30":
document.getElementById('pnd_linea').options['1']=new Option('2.2.3.1 Desarrollar mecanismos para que la acción p&u...','174');
document.getElementById('pnd_linea').options['2']=new Option('2.2.3.2 Impulsar la armonización del marco jurí...','175');
document.getElementById('pnd_linea').options['3']=new Option('2.2.3.3 Fomentar la participación de las comunidades ...','176');
document.getElementById('pnd_linea').options['4']=new Option('2.2.3.4 Promover el desarrollo económico de los puebl...','177');
document.getElementById('pnd_linea').options['5']=new Option('2.2.3.5 Asegurar el ejercicio de los derechos de los pueblos...','178');
document.getElementById('pnd_linea').options['6']=new Option('2.2.3.6 Impulsar políticas para el aprovechamiento su...','179');
document.getElementById('pnd_linea').options['7']=new Option('2.2.3.7 Impulsar acciones que garanticen los derechos humano...','180');
break;
case "31":
document.getElementById('pnd_linea').options['1']=new Option('2.2.4.1 Establecer esquemas de atención integral para...','181');
document.getElementById('pnd_linea').options['2']=new Option('2.2.4.2 Diseñar y ejecutar estrategias para increment...','182');
document.getElementById('pnd_linea').options['3']=new Option('2.2.4.3 Asegurar la construcción y adecuación ...','183');
break;
case "32":
document.getElementById('pnd_linea').options['1']=new Option('2.3.1.1 Garantizar el acceso y la calidad de los servicios d...','184');
document.getElementById('pnd_linea').options['2']=new Option('2.3.1.2 Fortalecer la rectoría de la autoridad sanita...','185');
document.getElementById('pnd_linea').options['3']=new Option('2.3.1.3 Desarrollar los instrumentos necesarios para lograr ...','186');
document.getElementById('pnd_linea').options['4']=new Option('2.3.1.4 Fomentar el proceso de planeación estrat&eacu...','187');
document.getElementById('pnd_linea').options['5']=new Option('2.3.1.5 Contribuir a la consolidación de los instrume...','188');
break;
case "33":
document.getElementById('pnd_linea').options['1']=new Option('2.3.2.1 Garantizar la oportunidad, calidad, seguridad y efic...','189');
document.getElementById('pnd_linea').options['2']=new Option('2.3.2.2 Reducir la carga de morbilidad y mortalidad de enfer...','190');
document.getElementById('pnd_linea').options['3']=new Option('2.3.2.3 Instrumentar acciones para la prevención y co...','191');
document.getElementById('pnd_linea').options['4']=new Option('2.3.2.4 Reducir la prevalencia en el consumo de alcohol, tab...','192');
document.getElementById('pnd_linea').options['5']=new Option('2.3.2.5 Controlar las enfermedades de transmisión sex...','193');
document.getElementById('pnd_linea').options['6']=new Option('2.3.2.6 Fortalecer programas de detección oportuna de...','194');
document.getElementById('pnd_linea').options['7']=new Option('2.3.2.7 Privilegiar acciones de regulación y vigilanc...','195');
document.getElementById('pnd_linea').options['8']=new Option('2.3.2.8 Coordinar actividades con los sectores productivos p...','196');
break;
case "34":
document.getElementById('pnd_linea').options['1']=new Option('2.3.3.1 Asegurar un enfoque integral y la participació...','197');
document.getElementById('pnd_linea').options['2']=new Option('2.3.3.2 Intensificar la capacitación y supervisi&oacu...','198');
document.getElementById('pnd_linea').options['3']=new Option('2.3.3.3 Llevar a cabo campañas de vacunación, ...','199');
document.getElementById('pnd_linea').options['4']=new Option('2.3.3.4 Impulsar el enfoque intercultural de salud en el dis...','200');
document.getElementById('pnd_linea').options['5']=new Option('2.3.3.5 Implementar acciones regulatorias que permitan evita...','201');
document.getElementById('pnd_linea').options['6']=new Option('2.3.3.6 Fomentar el desarrollo de infraestructura y la puest...','202');
document.getElementById('pnd_linea').options['7']=new Option('2.3.3.7 Impulsar acciones para la prevención y promoc...','203');
document.getElementById('pnd_linea').options['8']=new Option('2.3.3.8 Fortalecer los mecanismos de anticipación y r...','204');
break;
case "35":
document.getElementById('pnd_linea').options['1']=new Option('2.3.4.1 Preparar el sistema para que el usuario seleccione a...','205');
document.getElementById('pnd_linea').options['2']=new Option('2.3.4.2 Consolidar la regulación efectiva de los proc...','206');
document.getElementById('pnd_linea').options['3']=new Option('2.3.4.3 Instrumentar mecanismos que permitan homologar la ca...','207');
document.getElementById('pnd_linea').options['4']=new Option('2.3.4.4 Mejorar la calidad en la formación de los rec...','208');
document.getElementById('pnd_linea').options['5']=new Option('2.3.4.5 Garantizar medicamentos de calidad, eficaces y segur...','209');
document.getElementById('pnd_linea').options['6']=new Option('2.3.4.6 Implementar programas orientados a elevar la satisfa...','210');
document.getElementById('pnd_linea').options['7']=new Option('2.3.4.7 Desarrollar y fortalecer la infraestructura de los s...','211');
break;
case "36":
document.getElementById('pnd_linea').options['1']=new Option('2.3.5.1 Fortalecer la vigilancia epidemiológica para ...','212');
document.getElementById('pnd_linea').options['2']=new Option('2.3.5.2 Cumplir con los tratados internacionales en materia ...','213');
document.getElementById('pnd_linea').options['3']=new Option('2.3.5.3 Impulsar nuevos esquemas de cooperación inter...','214');
break;
case "37":
document.getElementById('pnd_linea').options['1']=new Option('2.4.1.1 Fomentar políticas de empleo y fortalecer los...','215');
document.getElementById('pnd_linea').options['2']=new Option('2.4.1.2 Instrumentar el Seguro de Vida para Mujeres Jefas de...','216');
document.getElementById('pnd_linea').options['3']=new Option('2.4.1.3 Promover la inclusión financiera en materia d...','217');
document.getElementById('pnd_linea').options['4']=new Option('2.4.1.4 Apoyar a la población afectada por emergencia...','218');
break;
case "38":
document.getElementById('pnd_linea').options['1']=new Option('2.4.2.1 Facilitar la portabilidad de derechos entre los dive...','219');
document.getElementById('pnd_linea').options['2']=new Option('2.4.2.2 Promover la eficiencia y calidad al ofrecer derechos...','220');
break;
case "39":
document.getElementById('pnd_linea').options['1']=new Option('2.4.3.1 Reordenar los procesos que permitan el seguimiento d...','221');
document.getElementById('pnd_linea').options['2']=new Option('2.4.3.2 Racionalizar y optimizar el gasto operativo, y privi...','222');
document.getElementById('pnd_linea').options['3']=new Option('2.4.3.3 Incrementar los mecanismos de verificación y ...','223');
document.getElementById('pnd_linea').options['4']=new Option('2.4.3.4 Determinar y vigilar los costos de atención d...','224');
document.getElementById('pnd_linea').options['5']=new Option('2.4.3.5 Implementar programas de distribución de medi...','225');
document.getElementById('pnd_linea').options['6']=new Option('2.4.3.6 Promover esquemas innovadores de financiamiento p&ua...','226');
document.getElementById('pnd_linea').options['7']=new Option('2.4.3.7 Impulsar la sustentabilidad de los sistemas de pensi...','227');
document.getElementById('pnd_linea').options['8']=new Option('2.4.3.8 Diseñar una estrategia integral para el patri...','228');
break;
case "40":
document.getElementById('pnd_linea').options['1']=new Option('2.5.1.1 Fomentar ciudades más compactas, con mayor de...','229');
document.getElementById('pnd_linea').options['2']=new Option('2.5.1.2 Inhibir el crecimiento de las manchas urbanas hacia ...','230');
document.getElementById('pnd_linea').options['3']=new Option('2.5.1.3 Promover reformas a la legislación en materia...','231');
document.getElementById('pnd_linea').options['4']=new Option('2.5.1.4 Revertir el abandono e incidir positivamente en la p...','232');
document.getElementById('pnd_linea').options['5']=new Option('2.5.1.5 Mejorar las condiciones habitacionales y su entorno,...','233');
document.getElementById('pnd_linea').options['6']=new Option('2.5.1.6 Adecuar normas e impulsar acciones de renovaci&oacut...','234');
document.getElementById('pnd_linea').options['7']=new Option('2.5.1.7 Fomentar una movilidad urbana sustentable con apoyo ...','235');
document.getElementById('pnd_linea').options['8']=new Option('2.5.1.8 Propiciar la modernización de catastros y de ...','236');
break;
case "41":
document.getElementById('pnd_linea').options['1']=new Option('2.5.2.1 Desarrollar y promover vivienda digna que favorezca ...','237');
document.getElementById('pnd_linea').options['2']=new Option('2.5.2.2 Desarrollar un nuevo modelo de atención de ne...','238');
document.getElementById('pnd_linea').options['3']=new Option('2.5.2.3 Fortalecer el mercado secundario de vivienda, incent...','239');
document.getElementById('pnd_linea').options['4']=new Option('2.5.2.4 Incentivar la oferta y demanda de vivienda en renta ...','240');
document.getElementById('pnd_linea').options['5']=new Option('2.5.2.5 Fortalecer el papel de la banca privada, la Banca de...','241');
document.getElementById('pnd_linea').options['6']=new Option('2.5.2.6 Desarrollar los instrumentos administrativos y contr...','242');
document.getElementById('pnd_linea').options['7']=new Option('2.5.2.7 Fomentar la nueva vivienda sustentable desde las dim...','243');
document.getElementById('pnd_linea').options['8']=new Option('2.5.2.8 Dotar con servicios básicos, calidad en la vi...','244');
document.getElementById('pnd_linea').options['9']=new Option('2.5.2.9 Establecer políticas de reubicación de...','245');
break;
case "42":
document.getElementById('pnd_linea').options['1']=new Option('2.5.3.1 Consolidar una política unificada y congruent...','246');
document.getElementById('pnd_linea').options['2']=new Option('2.5.3.2 Fortalecer las instancias e instrumentos de coordina...','247');
document.getElementById('pnd_linea').options['3']=new Option('2.5.3.3 Promover la adecuación de la legislació...','248');
break;
case "43":
document.getElementById('pnd_linea').options['1']=new Option('2.I.1 Promover el uso eficiente del territorio nacional a tr...','249');
document.getElementById('pnd_linea').options['2']=new Option('2.I.2 Reducir la informalidad y generar empleos mejor remune...','250');
document.getElementById('pnd_linea').options['3']=new Option('2.I.3 Fomentar la generación de fuentes de ingreso so...','251');
break;
case "44":
document.getElementById('pnd_linea').options['1']=new Option('2.II.1 Desarrollar políticas públicas con base...','252');
document.getElementById('pnd_linea').options['2']=new Option('2.II.2 Incorporar la participación social desde el di...','253');
document.getElementById('pnd_linea').options['3']=new Option('2.II.3 Optimizar el gasto operativo y los costos de atenci&o...','254');
document.getElementById('pnd_linea').options['4']=new Option('2.II.4 Evaluar y rendir cuentas de los programas y recursos ...','255');
document.getElementById('pnd_linea').options['5']=new Option('2.II.5 Integrar un padrón con identificación &...','256');
document.getElementById('pnd_linea').options['6']=new Option('2.II.6 Diseñar e integrar sistemas funcionales, escal...','257');
document.getElementById('pnd_linea').options['7']=new Option('2.II.7 Identificar y corregir riesgos operativos crít...','258');
break;
case "45":
document.getElementById('pnd_linea').options['1']=new Option('2.III.1 Promover la igualdad de oportunidades entre mujeres ...','259');
document.getElementById('pnd_linea').options['2']=new Option('2.III.2 Desarrollar y fortalecer esquemas de apoyo y atenci&...','260');
document.getElementById('pnd_linea').options['3']=new Option('2.III.3 Fomentar políticas dirigidas a los hombres qu...','261');
document.getElementById('pnd_linea').options['4']=new Option('2.III.4 Prevenir y atender la violencia contra las mujeres, ...','262');
document.getElementById('pnd_linea').options['5']=new Option('2.III.5 Diseñar, aplicar y promover políticas ...','263');
document.getElementById('pnd_linea').options['6']=new Option('2.III.6 Evaluar los esquemas de atención de los progr...','264');
break;
case "46":
document.getElementById('pnd_linea').options['1']=new Option('3.1.1.1 Estimular el desarrollo profesional de los maestros,...','265');
document.getElementById('pnd_linea').options['2']=new Option('3.1.1.2 Robustecer los programas de formación para do...','266');
document.getElementById('pnd_linea').options['3']=new Option('3.1.1.3 Impulsar la capacitación permanente de los do...','267');
document.getElementById('pnd_linea').options['4']=new Option('3.1.1.4 Fortalecer el proceso de reclutamiento de directores...','268');
document.getElementById('pnd_linea').options['5']=new Option('3.1.1.5 Incentivar a las instituciones de formación i...','269');
document.getElementById('pnd_linea').options['6']=new Option('3.1.1.6 Estimular los programas institucionales de mejoramie...','270');
document.getElementById('pnd_linea').options['7']=new Option('3.1.1.7 Constituir el Servicio de Asistencia Técnica ...','271');
document.getElementById('pnd_linea').options['8']=new Option('3.1.1.8 Mejorar la supervisión escolar, reforzando su...','272');
break;
case "47":
document.getElementById('pnd_linea').options['1']=new Option('3.1.2.1 Promover la mejora de la infraestructura de los plan...','273');
document.getElementById('pnd_linea').options['2']=new Option('3.1.2.2 Asegurar que los planteles educativos dispongan de i...','274');
document.getElementById('pnd_linea').options['3']=new Option('3.1.2.3 Modernizar el equipamiento de talleres, laboratorios...','275');
document.getElementById('pnd_linea').options['4']=new Option('3.1.2.4 Incentivar la planeación de las adecuaciones ...','276');
break;
case "48":
document.getElementById('pnd_linea').options['1']=new Option('3.1.3.1 Definir estándares curriculares que describan...','277');
document.getElementById('pnd_linea').options['2']=new Option('3.1.3.2 Instrumentar una política nacional de desarro...','278');
document.getElementById('pnd_linea').options['3']=new Option('3.1.3.3 Ampliar paulatinamente la duración de la jorn...','279');
document.getElementById('pnd_linea').options['4']=new Option('3.1.3.4 Incentivar el establecimiento de escuelas de tiempo ...','280');
document.getElementById('pnd_linea').options['5']=new Option('3.1.3.5 Fortalecer dentro de los planes y programas de estud...','281');
document.getElementById('pnd_linea').options['6']=new Option('3.1.3.6 Impulsar a través de los planes y programas d...','282');
document.getElementById('pnd_linea').options['7']=new Option('3.1.3.7 Reformar el esquema de evaluación y certifica...','283');
document.getElementById('pnd_linea').options['8']=new Option('3.1.3.8 Fomentar desde la educación básica los...','284');
document.getElementById('pnd_linea').options['9']=new Option('3.1.3.9 Fortalecer la educación para el trabajo, dand...','285');
document.getElementById('pnd_linea').options['10']=new Option('3.1.3.10 Impulsar programas de posgrado conjuntos con instit...','286');
document.getElementById('pnd_linea').options['11']=new Option('3.1.3.11 Crear un programa de estadías de estudiantes...','287');
break;
case "49":
document.getElementById('pnd_linea').options['1']=new Option('3.1.4.1 Desarrollar una política nacional de inform&a...','288');
document.getElementById('pnd_linea').options['2']=new Option('3.1.4.2 Ampliar la dotación de equipos de cómp...','289');
document.getElementById('pnd_linea').options['3']=new Option('3.1.4.3 Intensificar el uso de herramientas de innovaci&oacu...','290');
break;
case "50":
document.getElementById('pnd_linea').options['1']=new Option('3.1.5.1 Ampliar la operación de los sistemas de apoyo...','291');
document.getElementById('pnd_linea').options['2']=new Option('3.1.5.2 Implementar un programa de alerta temprana para iden...','292');
document.getElementById('pnd_linea').options['3']=new Option('3.1.5.3 Establecer programas remediales de apoyo a estudiant...','293');
document.getElementById('pnd_linea').options['4']=new Option('3.1.5.4 Definir mecanismos que faciliten a los estudiantes t...','294');
break;
case "51":
document.getElementById('pnd_linea').options['1']=new Option('3.1.6.1 Garantizar el establecimiento de vínculos for...','295');
break;
case "52":
document.getElementById('pnd_linea').options['1']=new Option('3.2.1.1 Establecer un marco regulatorio con las obligaciones...','296');
document.getElementById('pnd_linea').options['2']=new Option('3.2.1.2 Fortalecer la capacidad de los maestros y las escuel...','297');
document.getElementById('pnd_linea').options['3']=new Option('3.2.1.3 Definir, alentar y promover las prácticas inc...','298');
document.getElementById('pnd_linea').options['4']=new Option('3.2.1.4 Desarrollar la capacidad de la supervisión es...','299');
document.getElementById('pnd_linea').options['5']=new Option('3.2.1.5 Fomentar la ampliación de la cobertura del pr...','300');
document.getElementById('pnd_linea').options['6']=new Option('3.2.1.6 Impulsar el desarrollo de los servicios educativos d...','301');
document.getElementById('pnd_linea').options['7']=new Option('3.2.1.7 Robustecer la educación indígena, la d...','302');
document.getElementById('pnd_linea').options['8']=new Option('3.2.1.8 Impulsar políticas públicas para refor...','303');
document.getElementById('pnd_linea').options['9']=new Option('3.2.1.9 Fortalecer los servicios que presta el Instituto Nac...','304');
document.getElementById('pnd_linea').options['10']=new Option('3.2.1.10 Establecer alianzas con instituciones de educaci&oa...','305');
document.getElementById('pnd_linea').options['11']=new Option('3.2.1.11 Ampliar las oportunidades educativas para atender a...','306');
document.getElementById('pnd_linea').options['12']=new Option('3.2.1.12 Adecuar la infraestructura, el equipamiento y las c...','307');
document.getElementById('pnd_linea').options['13']=new Option('3.2.1.13 Garantizar el derecho de los pueblos indígen...','308');
break;
case "53":
document.getElementById('pnd_linea').options['1']=new Option('3.2.2.1 Propiciar la creación de un sistema nacional ...','309');
document.getElementById('pnd_linea').options['2']=new Option('3.2.2.2 Aumentar la proporción de jóvenes en s...','310');
document.getElementById('pnd_linea').options['3']=new Option('3.2.2.3 Diversificar las modalidades de becas para apoyar a ...','311');
document.getElementById('pnd_linea').options['4']=new Option('3.2.2.4 Promover que en las escuelas de todo el país ...','312');
document.getElementById('pnd_linea').options['5']=new Option('3.2.2.5 Fomentar un ambiente de sana convivencia e inculcar ...','313');
break;
case "54":
document.getElementById('pnd_linea').options['1']=new Option('3.2.3.1 Incrementar de manera sostenida la cobertura en educ...','314');
document.getElementById('pnd_linea').options['2']=new Option('3.2.3.2 Ampliar la oferta educativa de las diferentes modali...','315');
document.getElementById('pnd_linea').options['3']=new Option('3.2.3.3 Asegurar la suficiencia financiera de los programas ...','316');
document.getElementById('pnd_linea').options['4']=new Option('3.2.3.4 Impulsar la diversificación de la oferta educ...','317');
document.getElementById('pnd_linea').options['5']=new Option('3.2.3.5 Fomentar la creación de nuevas opciones educa...','318');
break;
case "55":
document.getElementById('pnd_linea').options['1']=new Option('3.3.1.1 Incluir a la cultura como un componente de las accio...','319');
document.getElementById('pnd_linea').options['2']=new Option('3.3.1.2 Vincular las acciones culturales con el programa de ...','320');
document.getElementById('pnd_linea').options['3']=new Option('3.3.1.3 Impulsar un federalismo cultural que fortalezca a la...','321');
document.getElementById('pnd_linea').options['4']=new Option('3.3.1.4 Diseñar un programa nacional que promueva la ...','322');
document.getElementById('pnd_linea').options['5']=new Option('3.3.1.5 Organizar un programa nacional de grupos artí...','323');
break;
case "56":
document.getElementById('pnd_linea').options['1']=new Option('3.3.2.1 Realizar un trabajo intensivo de evaluación, ...','324');
document.getElementById('pnd_linea').options['2']=new Option('3.3.2.2 Generar nuevas modalidades de espacios multifunciona...','325');
document.getElementById('pnd_linea').options['3']=new Option('3.3.2.3 Dotar a la infraestructura cultural, creada en a&nti...','326');
break;
case "57":
document.getElementById('pnd_linea').options['1']=new Option('3.3.3.1 Promover un amplio programa de rescate y rehabilitac...','327');
document.getElementById('pnd_linea').options['2']=new Option('3.3.3.2 Impulsar la participación de los organismos c...','328');
document.getElementById('pnd_linea').options['3']=new Option('3.3.3.3 Fomentar la exploración y el rescate de sitio...','329');
document.getElementById('pnd_linea').options['4']=new Option('3.3.3.4 Reconocer, valorar, promover y difundir las culturas...','330');
break;
case "58":
document.getElementById('pnd_linea').options['1']=new Option('3.3.4.1 Incentivar la creación de industrias cultural...','331');
document.getElementById('pnd_linea').options['2']=new Option('3.3.4.2 Impulsar el desarrollo de la industria cinematogr&aa...','332');
document.getElementById('pnd_linea').options['3']=new Option('3.3.4.3 Estimular la producción artesanal y favorecer...','333');
document.getElementById('pnd_linea').options['4']=new Option('3.3.4.4 Armonizar la conservación y protección...','334');
break;
case "59":
document.getElementById('pnd_linea').options['1']=new Option('3.3.5.1 Definir una política nacional de digitalizaci...','335');
document.getElementById('pnd_linea').options['2']=new Option('3.3.5.2 Estimular la creatividad en el campo de las aplicaci...','336');
document.getElementById('pnd_linea').options['3']=new Option('3.3.5.3 Crear plataformas digitales que favorezcan la oferta...','337');
document.getElementById('pnd_linea').options['4']=new Option('3.3.5.4 Estimular la creación de proyectos vinculados...','338');
document.getElementById('pnd_linea').options['5']=new Option('3.3.5.5 Equipar a la infraestructura cultural del paí...','339');
document.getElementById('pnd_linea').options['6']=new Option('3.3.5.6 Utilizar las nuevas tecnologías, particularme...','340');
break;
case "60":
document.getElementById('pnd_linea').options['1']=new Option('3.4.1.1 Contar con información confiable, suficiente ...','341');
document.getElementById('pnd_linea').options['2']=new Option('3.4.1.2 Definir con certeza las necesidades de adecuaci&oacu...','342');
document.getElementById('pnd_linea').options['3']=new Option('3.4.1.3 Recuperar espacios existentes y brindar la adecuada ...','343');
document.getElementById('pnd_linea').options['4']=new Option('3.4.1.4 Promover que todas las acciones de los miembros del ...','344');
document.getElementById('pnd_linea').options['5']=new Option('3.4.1.5 Poner en operación el sistema de evaluaci&oac...','345');
break;
case "61":
document.getElementById('pnd_linea').options['1']=new Option('3.4.2.1 Crear un programa de actividad física y depor...','346');
document.getElementById('pnd_linea').options['2']=new Option('3.4.2.2 Facilitar la práctica deportiva sin fines sel...','347');
document.getElementById('pnd_linea').options['3']=new Option('3.4.2.3 Estructurar con claridad dos grandes vertientes para...','348');
document.getElementById('pnd_linea').options['4']=new Option('3.4.2.4 Facilitar el acceso a la población con talent...','349');
document.getElementById('pnd_linea').options['5']=new Option('3.4.2.5 Llevar a cabo competencias deportivas y favorecer la...','350');
break;
case "62":
document.getElementById('pnd_linea').options['1']=new Option('3.5.1.1 Impulsar la articulación de los esfuerzos que...','351');
document.getElementById('pnd_linea').options['2']=new Option('3.5.1.2 Incrementar el gasto público en CTI de forma ...','352');
document.getElementById('pnd_linea').options['3']=new Option('3.5.1.3 Promover la inversión en CTI que realizan las...','353');
document.getElementById('pnd_linea').options['4']=new Option('3.5.1.4 Incentivar la inversión del sector productivo...','354');
document.getElementById('pnd_linea').options['5']=new Option('3.5.1.5 Fomentar el aprovechamiento de las fuentes de financ...','355');
break;
case "63":
document.getElementById('pnd_linea').options['1']=new Option('3.5.2.1 Incrementar el número de becas de posgrado ot...','356');
document.getElementById('pnd_linea').options['2']=new Option('3.5.2.2 Fortalecer el Sistema Nacional de Investigadores (SN...','357');
document.getElementById('pnd_linea').options['3']=new Option('3.5.2.3 Fomentar la calidad de la formación impartida...','358');
document.getElementById('pnd_linea').options['4']=new Option('3.5.2.4 Apoyar a los grupos de investigación existent...','359');
document.getElementById('pnd_linea').options['5']=new Option('3.5.2.5 Ampliar la cooperación internacional en temas...','360');
document.getElementById('pnd_linea').options['6']=new Option('3.5.2.6 Promover la participación de estudiantes e in...','361');
document.getElementById('pnd_linea').options['7']=new Option('3.5.2.7 Incentivar la participación de México ...','362');
break;
case "64":
document.getElementById('pnd_linea').options['1']=new Option('3.5.3.1 Diseñar políticas públicas dife...','363');
document.getElementById('pnd_linea').options['2']=new Option('3.5.3.2 Fomentar la formación de recursos humanos de ...','364');
document.getElementById('pnd_linea').options['3']=new Option('3.5.3.3 Apoyar al establecimiento de ecosistemas cient&iacut...','365');
document.getElementById('pnd_linea').options['4']=new Option('3.5.3.4 Incrementar la inversión en CTI a nivel estat...','366');
break;
case "65":
document.getElementById('pnd_linea').options['1']=new Option('3.5.4.1 Apoyar los proyectos científicos y tecnol&oac...','367');
document.getElementById('pnd_linea').options['2']=new Option('3.5.4.2 Promover la vinculación entre las institucion...','368');
document.getElementById('pnd_linea').options['3']=new Option('3.5.4.3 Desarrollar programas específicos de fomento ...','369');
document.getElementById('pnd_linea').options['4']=new Option('3.5.4.4 Promover el desarrollo emprendedor de las institucio...','370');
document.getElementById('pnd_linea').options['5']=new Option('3.5.4.5 Incentivar, impulsar y simplificar el registro de la...','371');
document.getElementById('pnd_linea').options['6']=new Option('3.5.4.6 Propiciar la generación de pequeñas em...','372');
document.getElementById('pnd_linea').options['7']=new Option('3.5.4.7 Impulsar el registro de patentes para incentivar la ...','373');
break;
case "66":
document.getElementById('pnd_linea').options['1']=new Option('3.5.5.1 Apoyar el incremento de infraestructura en el sistem...','374');
document.getElementById('pnd_linea').options['2']=new Option('3.5.5.2 Fortalecer la infraestructura de las instituciones p...','375');
document.getElementById('pnd_linea').options['3']=new Option('3.5.5.3 Extender y mejorar los canales de comunicació...','376');
document.getElementById('pnd_linea').options['4']=new Option('3.5.5.4 Gestionar los convenios y acuerdos necesarios para f...','377');
break;
case "67":
document.getElementById('pnd_linea').options['1']=new Option('3.I.1 Enfocar el esfuerzo educativo y de capacitación...','378');
document.getElementById('pnd_linea').options['2']=new Option('3.I.2 Coordinar los esfuerzos de política social y at...','379');
document.getElementById('pnd_linea').options['3']=new Option('3.I.3 Ampliar y mejorar la colaboración y coordinaci&...','380');
document.getElementById('pnd_linea').options['4']=new Option('3.I.4 Diseñar e impulsar, junto con los distintos &oa...','381');
document.getElementById('pnd_linea').options['5']=new Option('3.I.5 Ampliar la jornada escolar para ofrecer más y m...','382');
document.getElementById('pnd_linea').options['6']=new Option('3.I.6 Fomentar la adquisición de capacidades bá...','383');
document.getElementById('pnd_linea').options['7']=new Option('3.I.7 Fomentar la certificación de competencias labor...','384');
document.getElementById('pnd_linea').options['8']=new Option('3.I.8 Apoyar los programas de becas dirigidos a favorecer la...','385');
document.getElementById('pnd_linea').options['9']=new Option('3.I.9 Fortalecer las capacidades institucionales de vinculac...','386');
document.getElementById('pnd_linea').options['10']=new Option('3.I.10 Impulsar el establecimiento de consejos institucional...','387');
document.getElementById('pnd_linea').options['11']=new Option('3.I.11 Incrementar la inversión pública y prom...','388');
document.getElementById('pnd_linea').options['12']=new Option('3.I.12 Establecer un sistema de seguimiento de egresados del...','389');
document.getElementById('pnd_linea').options['13']=new Option('3.I.13 Impulsar la creación de carreras, licenciatura...','390');
break;
case "68":
document.getElementById('pnd_linea').options['1']=new Option('3.II.1 Operar un Sistema de Información y Gesti&oacut...','391');
document.getElementById('pnd_linea').options['2']=new Option('3.II.2 Conformar un Sistema Nacional de Planeación qu...','392');
document.getElementById('pnd_linea').options['3']=new Option('3.II.3 Avanzar en la conformación de un Sistema Integ...','393');
document.getElementById('pnd_linea').options['4']=new Option('3.II.4 Fortalecer los mecanismos, instrumentos y prác...','394');
document.getElementById('pnd_linea').options['5']=new Option('3.II.5 Actualizar el marco normativo general que rige la vid...','395');
document.getElementById('pnd_linea').options['6']=new Option('3.II.6 Definir estándares de gestión escolar p...','396');
document.getElementById('pnd_linea').options['7']=new Option('3.II.7 Actualizar la normatividad para el ingreso y permanen...','397');
document.getElementById('pnd_linea').options['8']=new Option('3.II.8 Revisar de manera integral en los ámbitos fede...','398');
document.getElementById('pnd_linea').options['9']=new Option('3.II.9 Contar con un sistema único para el control es...','399');
break;
case "69":
document.getElementById('pnd_linea').options['1']=new Option('3.III.1 Impulsar en todos los niveles, particularmente en la...','400');
document.getElementById('pnd_linea').options['2']=new Option('3.III.2 Fomentar que los planes de estudio de todos los nive...','401');
document.getElementById('pnd_linea').options['3']=new Option('3.III.3 Incentivar la participación de las mujeres en...','402');
document.getElementById('pnd_linea').options['4']=new Option('3.III.4 Fortalecer los mecanismos de seguimiento para impuls...','403');
document.getElementById('pnd_linea').options['5']=new Option('3.III.5 Robustecer la participación de las niñ...','404');
document.getElementById('pnd_linea').options['6']=new Option('3.III.6 Promover la participación equitativa de las m...','405');
break;
case "70":
document.getElementById('pnd_linea').options['1']=new Option('4.1.1.1 Diseñar una política hacendaria integr...','406');
document.getElementById('pnd_linea').options['2']=new Option('4.1.1.2 Reducir la vulnerabilidad de las finanzas púb...','407');
document.getElementById('pnd_linea').options['3']=new Option('4.1.1.3 Fortalecer y, en su caso, establecer fondos o instru...','408');
document.getElementById('pnd_linea').options['4']=new Option('4.1.1.4 Administrar la deuda pública para propiciar d...','409');
document.getElementById('pnd_linea').options['5']=new Option('4.1.1.5 Fomentar la adecuación del marco normativo en...','410');
document.getElementById('pnd_linea').options['6']=new Option('4.1.1.6 Promover un saneamiento de las finanzas de las entid...','411');
document.getElementById('pnd_linea').options['7']=new Option('4.1.1.7 Desincorporar del Gobierno Federal las entidades par...','412');
break;
case "71":
document.getElementById('pnd_linea').options['1']=new Option('4.1.2.1 Incrementar la capacidad financiera del Estado Mexic...','413');
document.getElementById('pnd_linea').options['2']=new Option('4.1.2.2 Hacer más equitativa la estructura impositiva...','414');
document.getElementById('pnd_linea').options['3']=new Option('4.1.2.3 Adecuar el marco legal en materia fiscal de manera e...','415');
document.getElementById('pnd_linea').options['4']=new Option('4.1.2.4 Revisar el marco del federalismo fiscal para fortale...','416');
document.getElementById('pnd_linea').options['5']=new Option('4.1.2.5 Promover una nueva cultura contributiva respecto de ...','417');
break;
case "72":
document.getElementById('pnd_linea').options['1']=new Option('4.1.3.1 Consolidar un Sistema de Evaluación del Desem...','418');
document.getElementById('pnd_linea').options['2']=new Option('4.1.3.2 Modernizar el sistema de contabilidad gubernamental....','419');
document.getElementById('pnd_linea').options['3']=new Option('4.1.3.3 Moderar el gasto en servicios personales al tiempo q...','420');
document.getElementById('pnd_linea').options['4']=new Option('4.1.3.4 Procurar la contención de erogaciones corresp...','421');
break;
case "73":
document.getElementById('pnd_linea').options['1']=new Option('4.2.1.1 Realizar las reformas necesarias al marco legal y re...','422');
document.getElementById('pnd_linea').options['2']=new Option('4.2.1.2 Fomentar la entrada de nuevos participantes en el si...','423');
document.getElementById('pnd_linea').options['3']=new Option('4.2.1.3 Promover la competencia efectiva entre los participa...','424');
document.getElementById('pnd_linea').options['4']=new Option('4.2.1.4 Facilitar la transferencia de garantías credi...','425');
document.getElementById('pnd_linea').options['5']=new Option('4.2.1.5 Incentivar la portabilidad de operaciones entre inst...','426');
document.getElementById('pnd_linea').options['6']=new Option('4.2.1.6 Favorecer la coordinación entre autoridades p...','427');
document.getElementById('pnd_linea').options['7']=new Option('4.2.1.7 Promover que las autoridades del sector financiero r...','428');
break;
case "74":
document.getElementById('pnd_linea').options['1']=new Option('4.2.2.1 Robustecer la relación entre la Banca de Desa...','429');
document.getElementById('pnd_linea').options['2']=new Option('4.2.2.2 Fortalecer la incorporación de educació...','430');
document.getElementById('pnd_linea').options['3']=new Option('4.2.2.3 Fortalecer el sistema de garantías para aumen...','431');
document.getElementById('pnd_linea').options['4']=new Option('4.2.2.4 Promover el acceso y uso responsable de productos y ...','432');
break;
case "75":
document.getElementById('pnd_linea').options['1']=new Option('4.2.3.1 Mantener un seguimiento continuo al desarrollo de po...','433');
document.getElementById('pnd_linea').options['2']=new Option('4.2.3.2 Establecer y perfeccionar las normas prudenciales y ...','434');
break;
case "76":
document.getElementById('pnd_linea').options['1']=new Option('4.2.4.1 Redefinir el mandato de la Banca de Desarrollo para ...','435');
document.getElementById('pnd_linea').options['2']=new Option('4.2.4.2 Desarrollar capacidades técnicas, dotar de fl...','436');
document.getElementById('pnd_linea').options['3']=new Option('4.2.4.3 Promover la participación de la banca comerci...','437');
document.getElementById('pnd_linea').options['4']=new Option('4.2.4.4 Gestionar eficientemente el capital dentro y entre l...','438');
break;
case "77":
document.getElementById('pnd_linea').options['1']=new Option('4.2.5.1 Apoyar el desarrollo de infraestructura con una visi...','439');
document.getElementById('pnd_linea').options['2']=new Option('4.2.5.2 Fomentar el desarrollo de relaciones de largo plazo ...','440');
document.getElementById('pnd_linea').options['3']=new Option('4.2.5.3 Priorizar los proyectos con base en su rentabilidad ...','441');
document.getElementById('pnd_linea').options['4']=new Option('4.2.5.4 Consolidar instrumentos de financiamiento flexibles ...','442');
document.getElementById('pnd_linea').options['5']=new Option('4.2.5.5 Complementar el financiamiento de proyectos con alta...','443');
document.getElementById('pnd_linea').options['6']=new Option('4.2.5.6 Promover el desarrollo del mercado de capitales para...','444');
break;
case "78":
document.getElementById('pnd_linea').options['1']=new Option('4.3.1.1 Privilegiar la conciliación para evitar confl...','445');
document.getElementById('pnd_linea').options['2']=new Option('4.3.1.2 Mejorar la conciliación, procuración e...','446');
document.getElementById('pnd_linea').options['3']=new Option('4.3.1.3 Garantizar certeza jurídica para todas las pa...','447');
break;
case "79":
document.getElementById('pnd_linea').options['1']=new Option('4.3.2.1 Impulsar acciones para la adopción de una cul...','448');
document.getElementById('pnd_linea').options['2']=new Option('4.3.2.2 Promover el respeto de los derechos humanos, laboral...','449');
document.getElementById('pnd_linea').options['3']=new Option('4.3.2.3 Fomentar la recuperación del poder adquisitiv...','450');
document.getElementById('pnd_linea').options['4']=new Option('4.3.2.4 Contribuir a la erradicación del trabajo infa...','451');
break;
case "80":
document.getElementById('pnd_linea').options['1']=new Option('4.3.3.1 Fortalecer los mecanismos de consejería, vinc...','452');
document.getElementById('pnd_linea').options['2']=new Option('4.3.3.2 Consolidar las políticas activas de capacitac...','453');
document.getElementById('pnd_linea').options['3']=new Option('4.3.3.3 Impulsar, de manera focalizada, el autoempleo en la ...','454');
document.getElementById('pnd_linea').options['4']=new Option('4.3.3.4 Fomentar el incremento de la productividad laboral c...','455');
document.getElementById('pnd_linea').options['5']=new Option('4.3.3.5 Promover la pertinencia educativa, la generaci&oacut...','456');
break;
case "81":
document.getElementById('pnd_linea').options['1']=new Option('4.3.4.1 Tutelar los derechos laborales individuales y colect...','457');
document.getElementById('pnd_linea').options['2']=new Option('4.3.4.2 Otorgar créditos accesibles y sostenibles a l...','458');
document.getElementById('pnd_linea').options['3']=new Option('4.3.4.3 Diseñar el proyecto del Seguro de Desempleo y...','459');
document.getElementById('pnd_linea').options['4']=new Option('4.3.4.4 Fortalecer y ampliar la cobertura inspectiva en mate...','460');
document.getElementById('pnd_linea').options['5']=new Option('4.3.4.5 Promover la participación de las organizacion...','461');
document.getElementById('pnd_linea').options['6']=new Option('4.3.4.6 Promover la protección de los derechos de los...','462');
break;
case "82":
document.getElementById('pnd_linea').options['1']=new Option('4.4.1.1 Alinear y coordinar programas federales, e inducir a...','463');
document.getElementById('pnd_linea').options['2']=new Option('4.4.1.2 Actualizar y alinear la legislación ambiental...','464');
document.getElementById('pnd_linea').options['3']=new Option('4.4.1.3 Promover el uso y consumo de productos amigables con...','465');
document.getElementById('pnd_linea').options['4']=new Option('4.4.1.4 Establecer una política fiscal que fomente la...','466');
document.getElementById('pnd_linea').options['5']=new Option('4.4.1.5 Promover esquemas de financiamiento e inversiones de...','467');
document.getElementById('pnd_linea').options['6']=new Option('4.4.1.6 Impulsar la planeación integral del territori...','468');
document.getElementById('pnd_linea').options['7']=new Option('4.4.1.7 Impulsar una política en mares y costas que p...','469');
document.getElementById('pnd_linea').options['8']=new Option('4.4.1.8 Orientar y fortalecer los sistemas de informaci&oacu...','470');
document.getElementById('pnd_linea').options['9']=new Option('4.4.1.9 Colaborar con organizaciones de la sociedad civil en...','471');
break;
case "83":
document.getElementById('pnd_linea').options['1']=new Option('4.4.2.1 Asegurar agua suficiente y de calidad adecuada para ...','472');
document.getElementById('pnd_linea').options['2']=new Option('4.4.2.2 Ordenar el uso y aprovechamiento del agua en cuencas...','473');
document.getElementById('pnd_linea').options['3']=new Option('4.4.2.3 Incrementar la cobertura y mejorar la calidad de los...','474');
document.getElementById('pnd_linea').options['4']=new Option('4.4.2.4 Sanear las aguas residuales con un enfoque integral ...','475');
document.getElementById('pnd_linea').options['5']=new Option('4.4.2.5 Fortalecer el desarrollo y la capacidad técni...','476');
document.getElementById('pnd_linea').options['6']=new Option('4.4.2.6 Fortalecer el marco jurídico para el sector d...','477');
document.getElementById('pnd_linea').options['7']=new Option('4.4.2.7 Reducir los riesgos de fenómenos meteorol&oac...','478');
document.getElementById('pnd_linea').options['8']=new Option('4.4.2.8 Rehabilitar y ampliar la infraestructura hidroagr&ia...','479');
break;
case "84":
document.getElementById('pnd_linea').options['1']=new Option('4.4.3.1 Ampliar la cobertura de infraestructura y programas ...','480');
document.getElementById('pnd_linea').options['2']=new Option('4.4.3.2 Desarrollar las instituciones e instrumentos de pol&...','481');
document.getElementById('pnd_linea').options['3']=new Option('4.4.3.3 Acelerar el tránsito hacia un desarrollo bajo...','482');
document.getElementById('pnd_linea').options['4']=new Option('4.4.3.4 Promover el uso de sistemas y tecnologías ava...','483');
document.getElementById('pnd_linea').options['5']=new Option('4.4.3.5 Impulsar y fortalecer la cooperación regional...','484');
document.getElementById('pnd_linea').options['6']=new Option('4.4.3.6 Lograr un manejo integral de residuos sólidos...','485');
document.getElementById('pnd_linea').options['7']=new Option('4.4.3.7 Realizar investigación científica y te...','486');
document.getElementById('pnd_linea').options['8']=new Option('4.4.3.8 Lograr el ordenamiento ecológico del territor...','487');
document.getElementById('pnd_linea').options['9']=new Option('4.4.3.9 Continuar con la incorporación de criterios d...','488');
document.getElementById('pnd_linea').options['10']=new Option('4.4.3.10 Contribuir a mejorar la calidad del aire, y reducir...','489');
document.getElementById('pnd_linea').options['11']=new Option('4.4.3.11 Lograr un mejor monitoreo de la calidad del aire me...','490');
break;
case "85":
document.getElementById('pnd_linea').options['1']=new Option('4.4.4.1 Promover la generación de recursos y benefici...','491');
document.getElementById('pnd_linea').options['2']=new Option('4.4.4.2 Impulsar e incentivar la incorporación de sup...','492');
document.getElementById('pnd_linea').options['3']=new Option('4.4.4.3 Promover el consumo de bienes y servicios ambientale...','493');
document.getElementById('pnd_linea').options['4']=new Option('4.4.4.4 Fortalecer el capital social y las capacidades de ge...','494');
document.getElementById('pnd_linea').options['5']=new Option('4.4.4.5 Incrementar la superficie del territorio nacional ba...','495');
document.getElementById('pnd_linea').options['6']=new Option('4.4.4.6 Focalizar los programas de conservación de la...','496');
document.getElementById('pnd_linea').options['7']=new Option('4.4.4.7 Promover el conocimiento y la conservación de...','497');
document.getElementById('pnd_linea').options['8']=new Option('4.4.4.8 Fortalecer los mecanismos e instrumentos para preven...','498');
document.getElementById('pnd_linea').options['9']=new Option('4.4.4.9 Mejorar los esquemas e instrumentos de reforestaci&o...','499');
document.getElementById('pnd_linea').options['10']=new Option('4.4.4.10 Recuperar los ecosistemas y zonas deterioradas para...','500');
document.getElementById('pnd_linea').options['11']=new Option('4.4.4.11 Recuperar los ecosistemas y zonas deterioradas para...','501');
break;
case "86":
document.getElementById('pnd_linea').options['1']=new Option('4.5.1.1 Crear una red nacional de centros comunitarios de ca...','502');
document.getElementById('pnd_linea').options['2']=new Option('4.5.1.2 Promover mayor oferta de los servicios de telecomuni...','503');
document.getElementById('pnd_linea').options['3']=new Option('4.5.1.3 Crear un programa de banda ancha que establezca los ...','504');
document.getElementById('pnd_linea').options['4']=new Option('4.5.1.4 Continuar y ampliar la Campaña Nacional de In...','505');
document.getElementById('pnd_linea').options['5']=new Option('4.5.1.5 Crear un programa de trabajo para dar cabal cumplimi...','506');
document.getElementById('pnd_linea').options['6']=new Option('4.5.1.6 Aumentar el uso del Internet mediante el desarrollo ...','507');
document.getElementById('pnd_linea').options['7']=new Option('4.5.1.7 Promover la competencia en la televisión abie...','508');
document.getElementById('pnd_linea').options['8']=new Option('4.5.1.8 Fomentar el uso óptimo de las bandas de 700 M...','509');
document.getElementById('pnd_linea').options['9']=new Option('4.5.1.9 Impulsar la adecuación del marco regulatorio ...','510');
document.getElementById('pnd_linea').options['10']=new Option('4.5.1.10 Promover participaciones público-privadas en...','511');
document.getElementById('pnd_linea').options['11']=new Option('4.5.1.11 Desarrollar e implementar un sistema espacial de al...','512');
document.getElementById('pnd_linea').options['12']=new Option('4.5.1.12 Desarrollar e implementar la infraestructura espaci...','513');
document.getElementById('pnd_linea').options['13']=new Option('4.5.1.13 Contribuir a la modernización del transporte...','514');
break;
case "87":
document.getElementById('pnd_linea').options['1']=new Option('4.6.1.1 Promover la modificación del marco institucio...','515');
document.getElementById('pnd_linea').options['2']=new Option('4.6.1.2 Fortalecer la capacidad de ejecución de Petr&...','516');
document.getElementById('pnd_linea').options['3']=new Option('4.6.1.3 Incrementar las reservas y tasas de restitució...','517');
document.getElementById('pnd_linea').options['4']=new Option('4.6.1.4 Elevar el índice de recuperación y la ...','518');
document.getElementById('pnd_linea').options['5']=new Option('4.6.1.5 Fortalecer el mercado de gas natural mediante el inc...','519');
document.getElementById('pnd_linea').options['6']=new Option('4.6.1.6 Incrementar la capacidad y rentabilidad de las activ...','520');
document.getElementById('pnd_linea').options['7']=new Option('4.6.1.7 Promover el desarrollo de una industria petroqu&iacu...','521');
break;
case "88":
document.getElementById('pnd_linea').options['1']=new Option('4.6.2.1 Impulsar la reducción de costos en la generac...','522');
document.getElementById('pnd_linea').options['2']=new Option('4.6.2.2 Homologar las condiciones de suministro de energ&iac...','523');
document.getElementById('pnd_linea').options['3']=new Option('4.6.2.3 Diversificar la composición del parque de gen...','524');
document.getElementById('pnd_linea').options['4']=new Option('4.6.2.4 Modernizar la red de transmisión y distribuci...','525');
document.getElementById('pnd_linea').options['5']=new Option('4.6.2.5 Promover el uso eficiente de la energía, as&i...','526');
document.getElementById('pnd_linea').options['6']=new Option('4.6.2.6 Promover la formación de nuevos recursos huma...','527');
break;
case "89":
document.getElementById('pnd_linea').options['1']=new Option('4.7.1.1 Aplicar eficazmente la legislación en materia...','528');
document.getElementById('pnd_linea').options['2']=new Option('4.7.1.2 Impulsar marcos regulatorios que favorezcan la compe...','529');
document.getElementById('pnd_linea').options['3']=new Option('4.7.1.3 Desarrollar las normas que fortalezcan la calidad de...','530');
break;
case "90":
document.getElementById('pnd_linea').options['1']=new Option('4.7.2.1 Fortalecer la convergencia de la Federación c...','531');
document.getElementById('pnd_linea').options['2']=new Option('4.7.2.2 Consolidar mecanismos que fomenten la cooperaci&oacu...','532');
break;
case "91":
document.getElementById('pnd_linea').options['1']=new Option('4.7.3.1 Mejorar el sistema para emitir de forma eficiente no...','533');
document.getElementById('pnd_linea').options['2']=new Option('4.7.3.2 Construir un mecanismo autosostenible de elaboraci&o...','534');
document.getElementById('pnd_linea').options['3']=new Option('4.7.3.3 Impulsar conjuntamente con los sectores productivos ...','535');
document.getElementById('pnd_linea').options['4']=new Option('4.7.3.4 Transformar las normas, y su evaluación, de b...','536');
document.getElementById('pnd_linea').options['5']=new Option('4.7.3.5 Desarrollar eficazmente los mecanismos, sistemas e i...','537');
document.getElementById('pnd_linea').options['6']=new Option('4.7.3.6 Promover las reformas legales que permitan la eficaz...','538');
break;
case "92":
document.getElementById('pnd_linea').options['1']=new Option('4.7.4.1 Mejorar el régimen jurídico aplicable ...','539');
document.getElementById('pnd_linea').options['2']=new Option('4.7.4.2 Identificar inhibidores u obstáculos, sectori...','540');
document.getElementById('pnd_linea').options['3']=new Option('4.7.4.3 Fortalecer los instrumentos estadísticos en m...','541');
document.getElementById('pnd_linea').options['4']=new Option('4.7.4.4 Diseñar e implementar una estrategia integral...','542');
break;
case "93":
document.getElementById('pnd_linea').options['1']=new Option('4.7.5.1 Modernizar los sistemas de atención y procura...','543');
document.getElementById('pnd_linea').options['2']=new Option('4.7.5.2 Desarrollar el Sistema Nacional de Protección...','544');
document.getElementById('pnd_linea').options['3']=new Option('4.7.5.3 Fortalecer la Red inteligente de Atención al ...','545');
document.getElementById('pnd_linea').options['4']=new Option('4.7.5.4 Establecer el Acuerdo Nacional para la Protecci&oacu...','546');
break;
case "94":
document.getElementById('pnd_linea').options['1']=new Option('4.8.1.1 Implementar una política de fomento econ&oacu...','547');
document.getElementById('pnd_linea').options['2']=new Option('4.8.1.2 Articular, bajo una óptica transversal, secto...','548');
break;
case "95":
document.getElementById('pnd_linea').options['1']=new Option('4.8.2.1 Fomentar el incremento de la inversión en el ...','549');
document.getElementById('pnd_linea').options['2']=new Option('4.8.2.2 Procurar el aumento del financiamiento en el sector ...','550');
document.getElementById('pnd_linea').options['3']=new Option('4.8.2.3 Asesorar a las pequeñas y medianas empresas e...','551');
break;
case "96":
document.getElementById('pnd_linea').options['1']=new Option('4.8.3.1 Promover las contrataciones del sector públic...','552');
document.getElementById('pnd_linea').options['2']=new Option('4.8.3.2 Implementar esquemas de compras públicas estr...','553');
document.getElementById('pnd_linea').options['3']=new Option('4.8.3.3 Promover la innovación a través de la ...','554');
document.getElementById('pnd_linea').options['4']=new Option('4.8.3.4 Incrementar el aprovechamiento de las reservas de co...','555');
document.getElementById('pnd_linea').options['5']=new Option('4.8.3.5 Desarrollar un sistema de compensaciones industriale...','556');
document.getElementById('pnd_linea').options['6']=new Option('4.8.3.6 Fortalecer los mecanismos para asegurar que las comp...','557');
break;
case "97":
document.getElementById('pnd_linea').options['1']=new Option('4.8.4.1 Apoyar la inserción exitosa de las micro, peq...','558');
document.getElementById('pnd_linea').options['2']=new Option('4.8.4.2 Impulsar la actividad emprendedora mediante la gener...','559');
document.getElementById('pnd_linea').options['3']=new Option('4.8.4.3 Diseñar e implementar un sistema de informaci...','560');
document.getElementById('pnd_linea').options['4']=new Option('4.8.4.4 Impulsar programas que desarrollen capacidades inten...','561');
document.getElementById('pnd_linea').options['5']=new Option('4.8.4.5 Mejorar los servicios de asesoría técn...','562');
document.getElementById('pnd_linea').options['6']=new Option('4.8.4.6 Facilitar el acceso a financiamiento y capital para ...','563');
document.getElementById('pnd_linea').options['7']=new Option('4.8.4.7 Crear vocaciones emprendedoras desde temprana edad p...','564');
document.getElementById('pnd_linea').options['8']=new Option('4.8.4.8 Apoyar el escalamiento empresarial de las micro, peq...','565');
document.getElementById('pnd_linea').options['9']=new Option('4.8.4.9 Incrementar la participación de micro, peque&...','566');
document.getElementById('pnd_linea').options['10']=new Option('4.8.4.10 Fomentar los proyectos de los emprendedores sociale...','567');
document.getElementById('pnd_linea').options['11']=new Option('4.8.4.11 Impulsar la creación de ocupaciones a trav&e...','568');
document.getElementById('pnd_linea').options['12']=new Option('4.8.4.12 Fomentar la creación y sostenibilidad de las...','569');
break;
case "98":
document.getElementById('pnd_linea').options['1']=new Option('4.8.5.1 Realizar la promoción, visibilización,...','570');
document.getElementById('pnd_linea').options['2']=new Option('4.8.5.2 Fortalecer las capacidades técnicas, administ...','571');
break;
case "99":
document.getElementById('pnd_linea').options['1']=new Option('4.9.1.1 Fomentar que la construcción de nueva infraes...','572');
document.getElementById('pnd_linea').options['2']=new Option('4.9.1.2 Evaluar las necesidades de infraestructura a largo p...','573');
document.getElementById('pnd_linea').options['3']=new Option('4.9.1.3 Consolidar y/o modernizar los ejes troncales transve...','574');
document.getElementById('pnd_linea').options['4']=new Option('4.9.1.4 Mejorar y modernizar la red de caminos rurales y ali...','575');
document.getElementById('pnd_linea').options['5']=new Option('4.9.1.5 Conservar y mantener en buenas condiciones los camin...','576');
document.getElementById('pnd_linea').options['6']=new Option('4.9.1.6 Modernizar las carreteras interestatales. (SECTOR CA...','577');
document.getElementById('pnd_linea').options['7']=new Option('4.9.1.7 Llevar a cabo la construcción de libramientos...','578');
document.getElementById('pnd_linea').options['8']=new Option('4.9.1.8 Ampliar y construir tramos carreteros mediante nuevo...','579');
document.getElementById('pnd_linea').options['9']=new Option('4.9.1.9 Realizar obras de conexión y accesos a nodos ...','580');
document.getElementById('pnd_linea').options['10']=new Option('4.9.1.10 Garantizar una mayor seguridad en las vías d...','581');
document.getElementById('pnd_linea').options['11']=new Option('4.9.1.11 Construir nuevos tramos ferroviarios, libramientos,...','582');
document.getElementById('pnd_linea').options['12']=new Option('4.9.1.12 Vigilar los programas de conservación y mode...','583');
document.getElementById('pnd_linea').options['13']=new Option('4.9.1.13 Promover el establecimiento de un programa integral...','584');
document.getElementById('pnd_linea').options['14']=new Option('4.9.1.14 Mejorar la movilidad de las ciudades mediante siste...','585');
document.getElementById('pnd_linea').options['15']=new Option('4.9.1.15 Fomentar el uso del transporte público masiv...','586');
document.getElementById('pnd_linea').options['16']=new Option('4.9.1.16 Fomentar el desarrollo de puertos marítimos ...','587');
document.getElementById('pnd_linea').options['17']=new Option('4.9.1.17 Mejorar la conectividad ferroviaria y carretera del...','588');
document.getElementById('pnd_linea').options['18']=new Option('4.9.1.18 Generar condiciones que permitan la logístic...','589');
document.getElementById('pnd_linea').options['19']=new Option('4.9.1.19 Ampliar la capacidad instalada de los puertos, prin...','590');
document.getElementById('pnd_linea').options['20']=new Option('4.9.1.20 Reducir los tiempos para el tránsito de carg...','591');
document.getElementById('pnd_linea').options['21']=new Option('4.9.1.21 Agilizar la tramitología aduanal y fiscal en...','592');
document.getElementById('pnd_linea').options['22']=new Option('4.9.1.22 Incentivar el relanzamiento de la marina mercante m...','593');
document.getElementById('pnd_linea').options['23']=new Option('4.9.1.23 Fomentar el desarrollo del cabotaje y el transporte...','594');
document.getElementById('pnd_linea').options['24']=new Option('4.9.1.24 Dar una respuesta de largo plazo a la demanda creci...','595');
document.getElementById('pnd_linea').options['25']=new Option('4.9.1.25 Desarrollar los aeropuertos regionales y mejorar su...','596');
document.getElementById('pnd_linea').options['26']=new Option('4.9.1.26 Supervisar el desempeño de las aerolí...','597');
document.getElementById('pnd_linea').options['27']=new Option('4.9.1.27 Promover la certificación de aeropuertos con...','598');
document.getElementById('pnd_linea').options['28']=new Option('4.9.1.28 Continuar con el programa de formalizacón de...','599');
document.getElementById('pnd_linea').options['29']=new Option('4.9.1.29 Continuar con la elaboración de normas b&aac...','600');
document.getElementById('pnd_linea').options['30']=new Option('4.9.1.30 Dar certidumbre a la inversión en el sector ...','601');
break;
case "100":
document.getElementById('pnd_linea').options['1']=new Option('4.10.1.1 Orientar la investigación y desarrollo tecno...','602');
document.getElementById('pnd_linea').options['2']=new Option('4.10.1.2 Desarrollar las capacidades productivas con visi&oa...','603');
document.getElementById('pnd_linea').options['3']=new Option('4.10.1.3 Impulsar la capitalización de las unidades p...','604');
document.getElementById('pnd_linea').options['4']=new Option('4.10.1.4 Fomentar el financiamiento oportuno y competitivo....','605');
document.getElementById('pnd_linea').options['5']=new Option('4.10.1.5 Impulsar una política comercial con enfoque ...','606');
document.getElementById('pnd_linea').options['6']=new Option('4.10.1.6 Apoyar la producción y el ingreso de los cam...','607');
document.getElementById('pnd_linea').options['7']=new Option('4.10.1.7 Fomentar la productividad en el sector agroalimenta...','608');
document.getElementById('pnd_linea').options['8']=new Option('4.10.1.8 Impulsar la competitividad logística para mi...','609');
document.getElementById('pnd_linea').options['9']=new Option('4.10.1.9 Promover el desarrollo de las capacidades productiv...','610');
break;
case "101":
document.getElementById('pnd_linea').options['1']=new Option('4.10.1.1 Promover el desarrollo de conglomerados productivos...','611');
document.getElementById('pnd_linea').options['2']=new Option('4.10.1.2 Instrumentar nuevos modelos de agronegocios que gen...','612');
document.getElementById('pnd_linea').options['3']=new Option('4.10.1.3 Impulsar, en coordinación con los diversos &...','613');
break;
case "102":
document.getElementById('pnd_linea').options['1']=new Option('4.10.3.1 Diseñar y establecer un mecanismo integral d...','614');
document.getElementById('pnd_linea').options['2']=new Option('4.10.3.2 Priorizar y fortalecer la sanidad e inocuidad agroa...','615');
break;
case "103":
document.getElementById('pnd_linea').options['1']=new Option('4.10.4.1 Promover la tecnificación del riego y optimi...','616');
document.getElementById('pnd_linea').options['2']=new Option('4.10.4.2 Impulsar prácticas sustentables en las activ...','617');
document.getElementById('pnd_linea').options['3']=new Option('4.10.4.3 Establecer instrumentos para rescatar, preservar y ...','618');
document.getElementById('pnd_linea').options['4']=new Option('4.10.4.4 Aprovechar el desarrollo de la biotecnología...','619');
break;
case "104":
document.getElementById('pnd_linea').options['1']=new Option('4.10.5.1 Realizar una reingeniería organizacional y o...','620');
document.getElementById('pnd_linea').options['2']=new Option('4.10.5.2 Reorientar los programas para transitar de los subs...','621');
document.getElementById('pnd_linea').options['3']=new Option('4.10.5.3 Desregular, reorientar y simplificar el marco norma...','622');
document.getElementById('pnd_linea').options['4']=new Option('4.10.5.4 Fortalecer la coordinación interinstituciona...','623');
break;
case "105":
document.getElementById('pnd_linea').options['1']=new Option('4.11.1.1 Actualizar el marco normativo e institucional del s...','624');
document.getElementById('pnd_linea').options['2']=new Option('4.11.1.2 Promover la concurrencia de las acciones gubernamen...','625');
document.getElementById('pnd_linea').options['3']=new Option('4.11.1.3 Alinear la política turística de las ...','626');
document.getElementById('pnd_linea').options['4']=new Option('4.11.1.4 Impulsar la transversalidad presupuestal y program&...','627');
break;
case "106":
document.getElementById('pnd_linea').options['1']=new Option('4.11.2.1 Fortalecer la investigación y generaci&oacut...','628');
document.getElementById('pnd_linea').options['2']=new Option('4.11.2.2 Fortalecer la infraestructura y la calidad de los s...','629');
document.getElementById('pnd_linea').options['3']=new Option('4.11.2.3 Diversificar e innovar la oferta de productos y con...','630');
document.getElementById('pnd_linea').options['4']=new Option('4.11.2.4 Posicionar adicionalmente a México como un d...','631');
document.getElementById('pnd_linea').options['5']=new Option('4.11.2.5 Concretar un Sistema Nacional de Certificació...','632');
document.getElementById('pnd_linea').options['6']=new Option('4.11.2.6 Desarrollar agendas de competitividad por destinos....','633');
document.getElementById('pnd_linea').options['7']=new Option('4.11.2.7 Fomentar la colaboración y coordinació...','634');
document.getElementById('pnd_linea').options['8']=new Option('4.11.2.8 Imprimir en el Programa Nacional de Infraestructura...','635');
break;
case "107":
document.getElementById('pnd_linea').options['1']=new Option('4.11.3.1 Fomentar y promover esquemas de financiamiento al s...','636');
document.getElementById('pnd_linea').options['2']=new Option('4.11.3.2 Incentivar las inversiones turísticas de las...','637');
document.getElementById('pnd_linea').options['3']=new Option('4.11.3.3 Promover en todas las dependencias gubernamentales ...','638');
document.getElementById('pnd_linea').options['4']=new Option('4.11.3.4 Elaborar un plan de conservación, consolidac...','639');
document.getElementById('pnd_linea').options['5']=new Option('4.11.3.5 Diseñar una estrategia integral de promoci&o...','640');
document.getElementById('pnd_linea').options['6']=new Option('4.11.3.6 Detonar el crecimiento del mercado interno a trav&e...','641');
break;
case "108":
document.getElementById('pnd_linea').options['1']=new Option('4.11.4.1 Crear instrumentos para que el turismo sea una indu...','642');
document.getElementById('pnd_linea').options['2']=new Option('4.11.4.2 Impulsar el cuidado y preservación del patri...','643');
document.getElementById('pnd_linea').options['3']=new Option('4.11.4.3 Convertir al turismo en fuente de bienestar social....','644');
document.getElementById('pnd_linea').options['4']=new Option('4.11.4.4 Crear programas para hacer accesible el turismo a t...','645');
document.getElementById('pnd_linea').options['5']=new Option('4.11.4.5 Promover el ordenamiento territorial, así co...','646');
break;
case "109":
document.getElementById('pnd_linea').options['1']=new Option('4.I.1 Promover el desarrollo de productos financieros adecua...','647');
document.getElementById('pnd_linea').options['2']=new Option('4.I.2 Fomentar el acceso a crédito y servicios financ...','648');
document.getElementById('pnd_linea').options['3']=new Option('4.I.3 Garantizar el acceso a la energía eléctr...','649');
document.getElementById('pnd_linea').options['4']=new Option('4.I.4 Aumentar la cobertura de banda ancha en todo el pa&iac...','650');
document.getElementById('pnd_linea').options['5']=new Option('4.I.5 Impulsar la economía digital y fomentar el desa...','651');
document.getElementById('pnd_linea').options['6']=new Option('4.I.6 Fomentar y ampliar la inclusión laboral, partic...','652');
document.getElementById('pnd_linea').options['7']=new Option('4.I.7 Promover permanentemente la mejora regulatoria que red...','653');
document.getElementById('pnd_linea').options['8']=new Option('4.I.8 Propiciar la disminución de los costos que enfr...','654');
document.getElementById('pnd_linea').options['9']=new Option('4.I.9 Desarrollar una infraestructura logística que i...','655');
document.getElementById('pnd_linea').options['10']=new Option('4.I.10 Promover políticas de desarrollo productivo ac...','656');
document.getElementById('pnd_linea').options['11']=new Option('4.I.11 Impulsar el desarrollo de la región Sur-Surest...','657');
document.getElementById('pnd_linea').options['12']=new Option('4.I.12 Revisar los programas gubernamentales para que no gen...','658');
break;
case "110":
document.getElementById('pnd_linea').options['1']=new Option('4.II.1 Modernizar la Administración Pública Fe...','659');
document.getElementById('pnd_linea').options['2']=new Option('4.II.2 Simplificar las disposiciones fiscales para mejorar e...','660');
document.getElementById('pnd_linea').options['3']=new Option('4.II.3 Fortalecer y modernizar el Registro Público de...','661');
document.getElementById('pnd_linea').options['4']=new Option('4.II.4 Garantizar la continuidad de la política de me...','662');
document.getElementById('pnd_linea').options['5']=new Option('4.II.5 Modernizar, formal e instrumentalmente, los esquemas ...','663');
document.getElementById('pnd_linea').options['6']=new Option('4.II.6 Realizar un eficaz combate a las prácticas com...','664');
document.getElementById('pnd_linea').options['7']=new Option('4.II.7 Mejorar el sistema para emitir de forma eficiente nor...','665');
document.getElementById('pnd_linea').options['8']=new Option('4.II.8 Fortalecer las Normas Oficiales Mexicanas relacionada...','666');
document.getElementById('pnd_linea').options['9']=new Option('4.II.9 Combatir y castigar el delito ambiental, fortaleciend...','667');
break;
case "111":
document.getElementById('pnd_linea').options['1']=new Option('4.III.1 Promover la inclusión de mujeres en los secto...','668');
document.getElementById('pnd_linea').options['2']=new Option('4.III.2 Desarrollar productos financieros que consideren la ...','669');
document.getElementById('pnd_linea').options['3']=new Option('4.III.3 Fortalecer la educación financiera de las muj...','670');
document.getElementById('pnd_linea').options['4']=new Option('4.III.4 Impulsar el empoderamiento económico de las m...','671');
document.getElementById('pnd_linea').options['5']=new Option('4.III.5 Fomentar los esfuerzos de capacitación labora...','672');
document.getElementById('pnd_linea').options['6']=new Option('4.III.6 Impulsar la participación de las mujeres en e...','673');
document.getElementById('pnd_linea').options['7']=new Option('4.III.7 Desarrollar mecanismos de evaluación sobre el...','674');
break;
case "112":
document.getElementById('pnd_linea').options['1']=new Option('5.1.1.1 Ampliar y profundizar el diálogo bilateral co...','675');
document.getElementById('pnd_linea').options['2']=new Option('5.1.1.2 Impulsar la modernización integral de la zona...','676');
document.getElementById('pnd_linea').options['3']=new Option('5.1.1.3 Reforzar las labores de atención a las comuni...','677');
document.getElementById('pnd_linea').options['4']=new Option('5.1.1.4 Consolidar la visión de responsabilidad compa...','678');
document.getElementById('pnd_linea').options['5']=new Option('5.1.1.5 Fortalecer la relación bilateral con Canad&aa...','679');
document.getElementById('pnd_linea').options['6']=new Option('5.1.1.6 Apoyar los mecanismos y programas que prevén ...','680');
document.getElementById('pnd_linea').options['7']=new Option('5.1.1.7 Poner énfasis en el valor estratégico ...','681');
document.getElementById('pnd_linea').options['8']=new Option('5.1.1.8 Impulsar el diálogo político y t&eacut...','682');
break;
case "113":
document.getElementById('pnd_linea').options['1']=new Option('5.1.2.1 Fortalecer las relaciones diplomáticas con to...','683');
document.getElementById('pnd_linea').options['2']=new Option('5.1.2.2 Apoyar, especialmente en el marco del Proyecto Mesoa...','684');
document.getElementById('pnd_linea').options['3']=new Option('5.1.2.3 Promover el desarrollo integral de la frontera sur c...','685');
document.getElementById('pnd_linea').options['4']=new Option('5.1.2.4 Identificar nuevas oportunidades de intercambio come...','686');
document.getElementById('pnd_linea').options['5']=new Option('5.1.2.5 Ampliar la cooperación frente a retos compart...','687');
document.getElementById('pnd_linea').options['6']=new Option('5.1.2.6 Fortalecer alianzas con países estraté...','688');
break;
case "114":
document.getElementById('pnd_linea').options['1']=new Option('5.1.3.1 Fortalecer el diálogo político con tod...','689');
document.getElementById('pnd_linea').options['2']=new Option('5.1.3.2 Profundizar las asociaciones estratégicas con...','690');
document.getElementById('pnd_linea').options['3']=new Option('5.1.3.3 Aprovechar la coyuntura económica actual para...','691');
document.getElementById('pnd_linea').options['4']=new Option('5.1.3.4 Ampliar los intercambios en el marco del tratado de ...','692');
document.getElementById('pnd_linea').options['5']=new Option('5.1.3.5 Impulsar la cooperación desde una perspectiva...','693');
document.getElementById('pnd_linea').options['6']=new Option('5.1.3.6 Consolidar a México como socio clave de la Un...','694');
document.getElementById('pnd_linea').options['7']=new Option('5.1.3.7 Promover un papel más activo de las represent...','695');
document.getElementById('pnd_linea').options['8']=new Option('5.1.3.8 Profundizar los acuerdos comerciales existentes y ex...','696');
break;
case "115":
document.getElementById('pnd_linea').options['1']=new Option('5.1.4.1 Incrementar la presencia de México en la regi...','697');
document.getElementById('pnd_linea').options['2']=new Option('5.1.4.2 Fortalecer la participación de México ...','698');
document.getElementById('pnd_linea').options['3']=new Option('5.1.4.3 Identificar coincidencias en los temas centrales de ...','699');
document.getElementById('pnd_linea').options['4']=new Option('5.1.4.4 Promover el acercamiento de los sectores empresarial...','700');
document.getElementById('pnd_linea').options['5']=new Option('5.1.4.5 Apoyar la negociación del Acuerdo Estrat&eacu...','701');
document.getElementById('pnd_linea').options['6']=new Option('5.1.4.6 Emprender una activa política de promoci&oacu...','702');
document.getElementById('pnd_linea').options['7']=new Option('5.1.4.7 Potenciar el diálogo con el resto de los pa&i...','703');
break;
case "116":
document.getElementById('pnd_linea').options['1']=new Option('5.1.5.1 Ampliar la presencia de México en Medio Orien...','704');
document.getElementById('pnd_linea').options['2']=new Option('5.1.5.2 Impulsar el diálogo con países de espe...','705');
document.getElementById('pnd_linea').options['3']=new Option('5.1.5.3 Promover la cooperación para el desarrollo en...','706');
document.getElementById('pnd_linea').options['4']=new Option('5.1.5.4 Aprovechar el reciente acercamiento entre los pa&iac...','707');
document.getElementById('pnd_linea').options['5']=new Option('5.1.5.5 Impulsar proyectos de inversión mutuamente be...','708');
document.getElementById('pnd_linea').options['6']=new Option('5.1.5.6 Emprender una política activa de promoci&oacu...','709');
document.getElementById('pnd_linea').options['7']=new Option('5.1.5.7 Apoyar, a través de la cooperación ins...','710');
document.getElementById('pnd_linea').options['8']=new Option('5.1.5.8 Vigorizar la agenda de trabajo en las representacion...','711');
break;
case "117":
document.getElementById('pnd_linea').options['1']=new Option('5.1.6.1 Impulsar firmemente la agenda de derechos humanos en...','712');
document.getElementById('pnd_linea').options['2']=new Option('5.1.6.2 Promover los intereses de México en foros y o...','713');
document.getElementById('pnd_linea').options['3']=new Option('5.1.6.3 Contribuir activamente en la definición e ins...','714');
document.getElementById('pnd_linea').options['4']=new Option('5.1.6.4 Participar en los procesos de deliberación de...','715');
document.getElementById('pnd_linea').options['5']=new Option('5.1.6.5 Impulsar la reforma del sistema de Naciones Unidas....','716');
document.getElementById('pnd_linea').options['6']=new Option('5.1.6.6 Reforzar la participación de México an...','717');
document.getElementById('pnd_linea').options['7']=new Option('5.1.6.7 Consensuar posiciones compartidas en foros regionale...','718');
document.getElementById('pnd_linea').options['8']=new Option('5.1.6.8 Ampliar la presencia de funcionarios mexicanos en lo...','719');
break;
case "118":
document.getElementById('pnd_linea').options['1']=new Option('5.1.7.1 Impulsar proyectos de cooperación internacion...','720');
document.getElementById('pnd_linea').options['2']=new Option('5.1.7.2 Centrar la cooperación en sectores claves par...','721');
document.getElementById('pnd_linea').options['3']=new Option('5.1.7.3 Ampliar la política de cooperación int...','722');
document.getElementById('pnd_linea').options['4']=new Option('5.1.7.4 Coordinar las capacidades y recursos de las dependen...','723');
document.getElementById('pnd_linea').options['5']=new Option('5.1.7.5 Ejecutar programas y proyectos financiados por el Fo...','724');
document.getElementById('pnd_linea').options['6']=new Option('5.1.7.6 Establecer el Registro Nacional de Informació...','725');
document.getElementById('pnd_linea').options['7']=new Option('5.1.7.7 Ampliar la oferta de becas como parte integral de la...','726');
document.getElementById('pnd_linea').options['8']=new Option('5.1.7.8 Hacer un uso más eficiente de nuestra membres...','727');
break;
case "119":
document.getElementById('pnd_linea').options['1']=new Option('5.2.1.1 Promover, en países y sectores prioritarios, ...','728');
document.getElementById('pnd_linea').options['2']=new Option('5.2.1.2 Reforzar el papel de la Secretaría de Relacio...','729');
document.getElementById('pnd_linea').options['3']=new Option('5.2.1.3 Difundir los contenidos culturales y la imagen de M&...','730');
document.getElementById('pnd_linea').options['4']=new Option('5.2.1.4 Desarrollar y coordinar una estrategia integral de p...','731');
document.getElementById('pnd_linea').options['5']=new Option('5.2.1.5 Apoyar las labores de diplomacia parlamentaria como ...','732');
document.getElementById('pnd_linea').options['6']=new Option('5.2.1.6 Fortalecer el Servicio Exterior Mexicano y las repre...','733');
document.getElementById('pnd_linea').options['7']=new Option('5.2.1.7 Expandir la presencia diplomática de Mé...','734');
break;
case "120":
document.getElementById('pnd_linea').options['1']=new Option('5.2.2.1 Impulsar la imagen de México en el exterior m...','735');
document.getElementById('pnd_linea').options['2']=new Option('5.2.2.2 Promover que los mexicanos en el exterior contribuya...','736');
document.getElementById('pnd_linea').options['3']=new Option('5.2.2.3 Emplear la cultura como instrumento para la proyecci...','737');
document.getElementById('pnd_linea').options['4']=new Option('5.2.2.4 Aprovechar los bienes culturales, entre ellos la len...','738');
document.getElementById('pnd_linea').options['5']=new Option('5.2.2.5 Impulsar los vínculos de los sectores cultura...','739');
break;
case "121":
document.getElementById('pnd_linea').options['1']=new Option('5.3.1.1 Incrementar la cobertura de preferencias para produc...','740');
document.getElementById('pnd_linea').options['2']=new Option('5.3.1.2 Propiciar el libre tránsito de bienes, servic...','741');
document.getElementById('pnd_linea').options['3']=new Option('5.3.1.3 Impulsar iniciativas con países afines en des...','742');
document.getElementById('pnd_linea').options['4']=new Option('5.3.1.4 Profundizar la apertura comercial con el objetivo de...','743');
document.getElementById('pnd_linea').options['5']=new Option('5.3.1.5 Negociar y actualizar acuerdos para la promoci&oacut...','744');
document.getElementById('pnd_linea').options['6']=new Option('5.3.1.6 Participar activamente en los foros y organismos int...','745');
document.getElementById('pnd_linea').options['7']=new Option('5.3.1.7 Reforzar la participación de México en...','746');
document.getElementById('pnd_linea').options['8']=new Option('5.3.1.8 Fortalecer la cooperación con otras oficinas ...','747');
document.getElementById('pnd_linea').options['9']=new Option('5.3.1.9 Defender los intereses comerciales de México ...','748');
document.getElementById('pnd_linea').options['10']=new Option('5.3.1.10 Difundir las condiciones de México en el ext...','749');
document.getElementById('pnd_linea').options['11']=new Option('5.3.1.11 Promover la calidad de bienes y servicios en el ext...','750');
document.getElementById('pnd_linea').options['12']=new Option('5.3.1.12 Impulsar mecanismos que favorezcan la internacional...','751');
document.getElementById('pnd_linea').options['13']=new Option('5.3.1.13 Implementar estrategias y acciones para que los pro...','752');
break;
case "122":
document.getElementById('pnd_linea').options['1']=new Option('5.3.2.1 Integrar a México en los nuevos bloques de co...','753');
document.getElementById('pnd_linea').options['2']=new Option('5.3.2.2 Profundizar nuestra integración con Amé...','754');
document.getElementById('pnd_linea').options['3']=new Option('5.3.2.3 Vigorizar la presencia de México en los mecan...','755');
document.getElementById('pnd_linea').options['4']=new Option('5.3.2.4 Impulsar activamente el Acuerdo Estratégico T...','756');
document.getElementById('pnd_linea').options['5']=new Option('5.3.2.5 Consolidar el Proyecto de Integración y Desar...','757');
document.getElementById('pnd_linea').options['6']=new Option('5.3.2.6 Profundizar la integración comercial con Am&e...','758');
document.getElementById('pnd_linea').options['7']=new Option('5.3.2.7 Promover nuevas oportunidades de intercambio comerci...','759');
document.getElementById('pnd_linea').options['8']=new Option('5.3.2.8 Integrar la conformación de un directorio de ...','760');
document.getElementById('pnd_linea').options['9']=new Option('5.3.2.9 Fortalecer la presencia de México en á...','761');
document.getElementById('pnd_linea').options['10']=new Option('5.3.2.10 Diversificar las exportaciones a través de l...','762');
break;
case "123":
document.getElementById('pnd_linea').options['1']=new Option('5.4.1.1 Velar por el cabal respeto de los derechos de los me...','763');
document.getElementById('pnd_linea').options['2']=new Option('5.4.1.2 Promover una mejor inserción de nuestros conn...','764');
document.getElementById('pnd_linea').options['3']=new Option('5.4.1.3 Desarrollar proyectos a nivel comunitario en á...','765');
document.getElementById('pnd_linea').options['4']=new Option('5.4.1.4 Fortalecer la relación estrecha con las comun...','766');
document.getElementById('pnd_linea').options['5']=new Option('5.4.1.5 Facilitar el libre tránsito de los mexicanos ...','767');
document.getElementById('pnd_linea').options['6']=new Option('5.4.1.6 Fomentar una mayor vinculación entre las comu...','768');
document.getElementById('pnd_linea').options['7']=new Option('5.4.1.7 Apoyar al sector empresarial en sus intercambios y a...','769');
document.getElementById('pnd_linea').options['8']=new Option('5.4.1.8 Construir acuerdos y convenios de cooperación...','770');
document.getElementById('pnd_linea').options['9']=new Option('5.4.1.9 Impulsar una posición común y presenta...','771');
document.getElementById('pnd_linea').options['10']=new Option('5.4.1.10 Activar una estrategia de promoción y empode...','772');
break;
case "124":
document.getElementById('pnd_linea').options['1']=new Option('5.4.2.1 Revisar los acuerdos de repatriación de mexic...','773');
document.getElementById('pnd_linea').options['2']=new Option('5.4.2.2 Fortalecer los programas de repatriación, a f...','774');
document.getElementById('pnd_linea').options['3']=new Option('5.4.2.3 Establecer mecanismos de control que permitan la rep...','775');
document.getElementById('pnd_linea').options['4']=new Option('5.4.2.4 Crear y fortalecer programas de certificación...','776');
break;
case "125":
document.getElementById('pnd_linea').options['1']=new Option('5.4.3.1 Diseñar mecanismos de facilitación mig...','777');
document.getElementById('pnd_linea').options['2']=new Option('5.4.3.2 Facilitar la movilidad transfronteriza de personas y...','778');
document.getElementById('pnd_linea').options['3']=new Option('5.4.3.3 Simplificar los procesos para la gestión migr...','779');
break;
case "126":
document.getElementById('pnd_linea').options['1']=new Option('5.4.4.1 Elaborar un programa en materia de migración ...','780');
document.getElementById('pnd_linea').options['2']=new Option('5.4.4.2 Promover una alianza intergubernamental entre M&eacu...','781');
document.getElementById('pnd_linea').options['3']=new Option('5.4.4.3 Crear un sistema nacional de información y es...','782');
document.getElementById('pnd_linea').options['4']=new Option('5.4.4.4 Impulsar acciones dirigidas a reducir las condicione...','783');
document.getElementById('pnd_linea').options['5']=new Option('5.4.4.5 Impulsar la creación de regímenes migr...','784');
document.getElementById('pnd_linea').options['6']=new Option('5.4.4.6 Promover acciones dirigidas a impulsar el potencial ...','785');
document.getElementById('pnd_linea').options['7']=new Option('5.4.4.7 Fortalecer los vínculos políticos, eco...','786');
document.getElementById('pnd_linea').options['8']=new Option('5.4.4.8 Diseñar y ejecutar programas de atenció...','787');
break;
case "127":
document.getElementById('pnd_linea').options['1']=new Option('5.4.5.1 Implementar una política en materia de refugi...','788');
document.getElementById('pnd_linea').options['2']=new Option('5.4.5.2 Establecer mecanismos y acuerdos interinstitucionale...','789');
document.getElementById('pnd_linea').options['3']=new Option('5.4.5.3 Propiciar esquemas de trabajo entre las personas mig...','790');
document.getElementById('pnd_linea').options['4']=new Option('5.4.5.4 Promover la convivencia armónica entre la pob...','791');
document.getElementById('pnd_linea').options['5']=new Option('5.4.5.5 Implementar una estrategia intersectorial dirigida a...','792');
document.getElementById('pnd_linea').options['6']=new Option('5.4.5.6 Promover la profesionalización, sensibilizaci...','793');
document.getElementById('pnd_linea').options['7']=new Option('5.4.5.7 Fortalecer mecanismos para investigar y sancionar a ...','794');
document.getElementById('pnd_linea').options['8']=new Option('5.4.5.8 Crear un sistema nacional único de datos para...','795');
break;
case "128":
document.getElementById('pnd_linea').options['1']=new Option('5.I.1 Dedicar atención especial a temas relacionados ...','796');
document.getElementById('pnd_linea').options['2']=new Option('5.I.2 Fortalecer la alianza estratégica de Canad&aacu...','797');
document.getElementById('pnd_linea').options['3']=new Option('5.I.3 Lograr una plataforma estratégica para el forta...','798');
document.getElementById('pnd_linea').options['4']=new Option('5.I.4 Facilitar el comercio exterior impulsando la moderniza...','799');
document.getElementById('pnd_linea').options['5']=new Option('5.I.5 Profundizar la política de desregulación...','800');
document.getElementById('pnd_linea').options['6']=new Option('5.I.6 Diversificar los destinos de las exportaciones de bien...','801');
document.getElementById('pnd_linea').options['7']=new Option('5.I.7 Privilegiar las industrias de alto valor agregado en l...','802');
document.getElementById('pnd_linea').options['8']=new Option('5.I.8 Apoyar al sector productivo mexicano en coordinaci&oac...','803');
break;
case "129":
document.getElementById('pnd_linea').options['1']=new Option('5.II.1 Modernizar los sistemas y reducir los tiempos de gest...','804');
document.getElementById('pnd_linea').options['2']=new Option('5.II.2 Facilitar el acceso a trámites y servicios de ...','805');
document.getElementById('pnd_linea').options['3']=new Option('5.II.3 Generar una administración eficaz de las front...','806');
document.getElementById('pnd_linea').options['4']=new Option('5.II.4 Dotar de infraestructura los puntos fronterizos, prom...','807');
document.getElementById('pnd_linea').options['5']=new Option('5.II.5 Fomentar la transparencia y la simplificación ...','808');
document.getElementById('pnd_linea').options['6']=new Option('5.II.6 Ampliar y profundizar el diálogo con el sector...','809');
document.getElementById('pnd_linea').options['7']=new Option('5.II.7 Fomentar la protección y promoción de l...','810');
break;
case "130":
document.getElementById('pnd_linea').options['1']=new Option('5.III.1 Promover y dar seguimiento al cumplimiento de los co...','811');
document.getElementById('pnd_linea').options['2']=new Option('5.III.2 Armonizar la normatividad vigente con los tratados i...','812');
document.getElementById('pnd_linea').options['3']=new Option('5.III.3 Evaluar los efectos de las políticas migrator...','813');
document.getElementById('pnd_linea').options['4']=new Option('5.III.4 Implementar una estrategia intersectorial dirigida a...','814');
break;

    }
}
	
	

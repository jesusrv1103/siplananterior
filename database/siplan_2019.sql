CREATE DATABASE  IF NOT EXISTS `siplan2019` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `siplan2019`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: siplan2019
-- ------------------------------------------------------
-- Server version	5.7.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acciones`
--

DROP TABLE IF EXISTS `acciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acciones` (
  `id_accion` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_componente` smallint(6) NOT NULL,
  `id_proyecto` smallint(6) NOT NULL,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `descripcion` text NOT NULL,
  `id_tipo` smallint(6) NOT NULL,
  `unidad_medida` smallint(6) NOT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `demanda` tinyint(1) DEFAULT NULL,
  `no_accion` tinyint(4) unsigned zerofill DEFAULT NULL,
  `ped` tinyint(4) NOT NULL,
  `descripcion_actividad` text NOT NULL,
  `tipo_descripcion` varchar(45) NOT NULL,
  `per_gen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_accion`),
  KEY `accion_componente_idx` (`id_componente`),
  KEY `accion_proyecto_idx` (`id_proyecto`),
  KEY `accion_dependencia_idx` (`id_dependencia`),
  KEY `accion_u_medida_idx` (`unidad_medida`),
  KEY `accion_tipo_medida_idx` (`id_tipo`),
  CONSTRAINT `accion_componente` FOREIGN KEY (`id_componente`) REFERENCES `componentes` (`id_componente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_dependencia` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_tipo_medida` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_unidad_prog01` (`id_tipo_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accion_u_medida` FOREIGN KEY (`unidad_medida`) REFERENCES `u_medida_prog01` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=753 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acciones`
--

LOCK TABLES `acciones` WRITE;
/*!40000 ALTER TABLE `acciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `acciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componentes`
--

DROP TABLE IF EXISTS `componentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componentes` (
  `id_componente` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_proyecto` smallint(6) NOT NULL,
  `descripcion` text NOT NULL,
  `id_tipo` smallint(6) NOT NULL,
  `unidad_medida` smallint(6) NOT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `unidad_responsable` smallint(6) NOT NULL,
  `no_componente` tinyint(2) unsigned zerofill NOT NULL,
  `ped_eje` tinyint(4) NOT NULL,
  `ped_linea` tinyint(4) NOT NULL,
  `ped_estrategia` smallint(6) NOT NULL,
  `estatus` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `prog_pres` tinyint(4) NOT NULL,
  `cve_trasversal` smallint(3) unsigned zerofill NOT NULL DEFAULT '000',
  `ods` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_componente`),
  KEY `componente_tipo_idx` (`id_tipo`),
  KEY `componente_unidad_idx` (`unidad_medida`),
  KEY `componente_proyecto_idx` (`id_proyecto`,`prog_pres`),
  KEY `componente_u_responsable_idx` (`unidad_responsable`),
  KEY `componente_ped_eje_idx` (`ped_eje`),
  KEY `componente_ped_linea_idx` (`ped_linea`),
  KEY `componente_prog_pres_idx` (`prog_pres`),
  KEY `componente_cve_transversal_idx` (`cve_trasversal`),
  KEY `componente_estrategia_idx` (`ped_estrategia`),
  CONSTRAINT `componente_estrategia` FOREIGN KEY (`ped_estrategia`) REFERENCES `estrategias` (`id_estrategia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_linea` FOREIGN KEY (`ped_linea`) REFERENCES `linea` (`id_linea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_ped_eje` FOREIGN KEY (`ped_eje`) REFERENCES `eje` (`id_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_prog_pres` FOREIGN KEY (`prog_pres`) REFERENCES `programas_presupuestarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_unidad_prog01` (`id_tipo_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_tipo_unidad` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_unidad_prog01` (`id_tipo_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_transversal` FOREIGN KEY (`cve_trasversal`) REFERENCES `transversales` (`id_trasversal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_u_responsable` FOREIGN KEY (`unidad_responsable`) REFERENCES `u_responsable` (`id_u_responsable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `componente_unidad` FOREIGN KEY (`unidad_medida`) REFERENCES `u_medida_prog01` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componentes`
--

LOCK TABLES `componentes` WRITE;
/*!40000 ALTER TABLE `componentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `componentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencias`
--

DROP TABLE IF EXISTS `dependencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencias` (
  `id_dependencia` tinyint(3) unsigned NOT NULL COMMENT 'Identificador de la Dependencia',
  `id_sector` tinyint(4) unsigned NOT NULL COMMENT 'Identificador del Sector al que pertenece la dependencia, relacionado con la tabla sectores',
  `nombre` varchar(128) NOT NULL COMMENT 'Nombre de la dependencia',
  `acronimo` varchar(16) NOT NULL COMMENT 'Acronimo de la dependencia',
  `nom_titular` varchar(200) NOT NULL,
  `cargo_titular` varchar(200) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`id_dependencia`),
  KEY `dep_sector_idx` (`id_sector`),
  CONSTRAINT `dep_sector` FOREIGN KEY (`id_sector`) REFERENCES `sectores` (`id_sector`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Catalogo dependencias dependencias';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencias`
--

LOCK TABLES `dependencias` WRITE;
/*!40000 ALTER TABLE `dependencias` DISABLE KEYS */;
INSERT INTO `dependencias` VALUES (1,2,'Jefatura de Oficina del C. Gobernador','JEFATURA','LIC. VÍCTOR MANUEL RENTERÍA LÓPEZ','JEFE DE OFICINA DEL C. GOBERNADOR','DEP'),(2,1,'Secretaría General de Gobierno','SEGOB','LIC. JEHÚ EDUÍ SALAS DÁVILA','SECRETARIO GENERAL DE GOBIERNO','DEP'),(3,2,'Secretaría de Finanzas','SEFIN','M. EN F. JORGE MIRANDA CASTRO','SECRETARIO DE FINANZAS','DEP'),(4,1,'Secretaría de Seguridad Pública','SSP','ING. ISMAEL CAMBEROS HERNÁNDEZ','SECRETARIO DE SEGURIDAD PÚBLICA','DEP'),(5,2,'Secretaría de Administración','SAD','L.C. JORGE ALEJANDRO ESCOBEDO ARMENGOL','SECRETARIO DE ADMINISTRACIÓN','DEP'),(6,2,'Secretaría de la Función Pública','SFP','DRA. PAULA REY ORTIZ MEDINA','SECRETARIA DE LA FUNCIÓN PÚBLICA','DEP'),(7,3,'Secretaría de Economía ','SEZAC','ING. CARLOS FERNANDO BÁRCENA POUS','SECRETARIO DE ECONOMÍA','DEP'),(8,3,'Secretaría de Turismo','SECTURZ','LIC. EDUARDO YARTO APONTE','SECRETARIO DE TURISMO','DEP'),(9,3,'Secretaría de Obras Públicas','SECOP','ING. JORGE LUIS PEDROZA OCHOA','SECRETARIO DE OBRAS PÚBLICAS','DEP'),(10,4,'Secretaría de Educación','SEDUZAC','DRA. GEMA ALEJANDRINA MERCADO SÁNCHEZ','SECRETARIA DE EDUCACIÓN','DEP'),(11,4,'Secretaría de Desarrollo Social ','SEDESOL','LIC. ANA CECILIA TAPIA GONZÁLEZ','SECRETARIA DE DESARROLLO SOCIAL','DEP'),(12,4,'Secretaría de Salud','SSALUD','DR. GILBERTO BREÑA CANTÚ','SECRETARIO DE SALUD DEL ESTADO','DEP'),(13,4,'Secretaría de Desarrollo Urbano, Vivienda y Ordenamiento Territorial','SEDUVOT','ARQ. MARÍA GUADALUPE LÓPEZ MARCHANT','SECRETARIA DE DESARROLLO URBANO, VIVIENDA Y ORDENAMIENTO TERRITORIAL','DEP'),(14,3,'Secretaría del Agua y Medio Ambiente ','SAMA','M. EN C. LUIS FERNANDO MALDONADO MORENO','SECRETARIO DEL AGUA Y MEDIO AMBIENTE ','DEP'),(15,3,'Secretaría del Campo','SECAMPO','LAE. ADOLFO BONILLA GÓMEZ','SECRETARIO DEL CAMPO','DEP'),(16,4,'Secretaría de las Mujeres ','SEMUJER','DRA. ADRIANA GUADALUPE RIVERO GARZA','SECRETARIA DE LAS MUJERES','DEP'),(17,4,'Secretaría del Zacatecano Migrante','SEZAMI','L.C. JOSÉ JUAN ESTRADA HERNÁNDEZ','SECRETARIO DEL ZACATECANO MIGRANTE','DEP'),(18,1,'Coordinación General Jurídica','CGJ','NO DEFINIDO','COORDINADOR GENERAL JURÍDICO','DEP'),(19,2,'Coordinación Estatal de Planeación','COEPLA','ING. MARCO VINICIO FLORES GUERRERO','COORDINADOR ESTATAL DE PLANEACIÓN','DEP'),(20,1,'Procuraduria General de Justicia del Estado','PGJE','DR. FRANCISCO JOSÉ MURILLO RUISECO','PROCURADOR GENERAL DE JUSTICIA DEL ESTADO','DEP'),(61,4,'Sistema Estatal para el Desarrollo Integral de la Familia ','SDIF','MTRA. YADIRA GALVÁN SÁNCHEZ','DIRECTORA GENERAL DEL SISTEMA DIF','OPD'),(62,3,'Consejo Estatal de Desarrollo Económico','CEDEZ','LIC. FERNANDO LÓPEZ DEL BOSQUE','DIRECTOR GENERAL DEL CONSEJO ESTATAL DE DESARROLLO ECONÓMICO \r\n','OPD'),(63,3,'Consejo Zacatecano de Ciencia, Tecnología e Innovación ','COZCYT','DR. AGUSTÍN ENCISO MUÑOZ','DIRECTOR GENERAL DEL CONSEJO ZACATECANO DE CIENCIA Y TECNOLOGÍA','OPD'),(64,4,'Servicios de Salud de Zacatecas','SSZ','DR. GILBERTO BREÑA CANTÚ','DIRECTOR GENERAL DE LOS SERVICIOS DE SALUD DE ZACATECAS','OPD'),(65,4,'Regimen Estatal de Protección Social en Salud','REPSS','DR. JESÚS GERARDO LÓPEZ LONGORIA','DIRECTOR GENERAL DEL RÉGIMEN ESTATAL DE PROTECCIÓN SOCIAL EN SALUD','OPD'),(67,4,'Instituto Regional del Patrimonio Mundial','UNESCO','','','OPD'),(68,1,'Instituto de la Defensoría Pública','IDP','','','OPD'),(69,4,'Instituto de Cultura Física y Deporte del Estado de Zacatecas','INCUFIDEZ','C.P. ADOLFO MÁRQUEZ VERA','DIRECTOR DEL INSTITUTO DE CULTURA FÍSICA Y DEPORTE DEL ESTADO DE ZACATECAS','OPD'),(70,4,'Sistema Zacatecano de Radio y Televisión','SIZART','','','OPD'),(71,4,'Patronato Estatal de promotores Voluntarios','VOL','LIC. MARIANA GONZALEZ ESCOBEDO','DIRECTORA GENERAL DEL PATRONATO ESTATAL DE PROMOTORES VOLUNTARIOS','OPD'),(72,4,'Instituto Zacatecano de Educación para Adultos','IZEA',' ','','ODE'),(73,4,'Instituto de Capacitación para el Trabajo','ICATEZ','','','ODE'),(74,4,'Instituto Zacatecano de Cultura \"Ramón López Velarde\"','IZC','MTRO. ALFONSO VAZQUEZ SOSA','DIRECTOR GENERAL DEL INSTITUTO ZACATECANO DE CULTURA ','OPD'),(75,3,'Instituto Zacatecano de Construcción de Escuelas','INZACE','ARQ. FRANCISCO CARRILLO PASILLAS','DIRECTOR GENERAL DEL INSTITUTO ZACATECANO PARA LA CONSTRUCCIÓN DE ESCUELAS','OPD'),(76,4,'Junta de Protección y Conservación de Monumentos y Zonas Típicas del Estado de Zacatecas','JPCMCZT','ING. RAFAEL SÁNCHEZ PREZA','PRESIDENTE DE LA JUNTA DE PROTECCION Y CONSERVACION DE MONUMENTOS Y ZONAS TIPICAS','OPD'),(77,4,'Instituto de la Juventud del Estado de Zacatecas','INJUZAC','MBA. ALEJANDRINA VARELA LUNA','DIRECTORA GENERAL DEL INSTITUTO DE LA JUVENTUD DEL ESTADO DE ZACATECAS','OPD'),(78,4,'Instituto para la Atención e Inclusión de las Personas Con Discapacidad en el Estado de Zacatecas','INCLUSIÓN','LIC. MARÍA DE LOURDES RODARTE DÍAZ','DIRECTORA DEL INSTITUTO DE LA ATENCIÓN E INCLUSIÓN DE LAS PERSONAS CON DISCAPACIDAD ','OPD'),(79,4,'Universidad Politécnica de Zacatecas','UPZ','','','ODE'),(80,4,'Universidad Politécnica del Sur de Zacatecas','UPSZ','','','ODE'),(81,4,'Instituto Tecnológico Superior de Nochistlán','ITSN','','','ODE'),(82,4,'Instituto Tecnológico Superior de Fresnillo','ITSF','','','ODE'),(83,4,'Instituto Tecnológico Superior de Tlaltenango','ITSZS','','','ODE'),(84,4,'Instituto Tecnológico Superior de Loreto','ITSL','','','ODE'),(85,4,'Instituto Tecnológico Superior de Río Grande','ITSZN','','','ODE'),(86,4,'Instituto Tecnológico Superior de Jerez','ITSJ','','','ODE'),(87,4,'Instituto Tecnológico Superior de Sombrerete','ITSZO','','','ODE'),(88,4,'Escuela de Conservación y Restauración de Zacatecas \"Refugio Reyes\"','EECRZ','','','ODE'),(89,4,'Colegio de Bachilleres del Estado de Zacatecas','COBAEZ','','','ODE'),(90,4,'Colegio de Educación Profesional Técnica de Zacatecas','CONALEP','','','ODE'),(91,4,'Colegio de Estudios Científicos y Tecnológicos del Estado de Zacatecas','CECYTEZ','','','ODE'),(92,2,'Instituto de Selección y Capacitación del Estado de Zacatecas','INSELCAP','MTRO. SIMITRIO QUEZADA MARTINEZ','DIRECTOR GENERAL DEL INSTITUTO DE SELECCIÓN Y CAPACITACIÓN','OPD'),(93,4,'Universidad Tecnológica del Estado de Zacatecas','UTEZ','','','ODE'),(96,2,'Secretaría Ejecutiva del Sistema Estatal Anticorrupción de Zacatecas','SESEAZ','','','OPD');
/*!40000 ALTER TABLE `dependencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimension_indicador`
--

DROP TABLE IF EXISTS `dimension_indicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dimension_indicador` (
  `id_dimension` tinyint(4) NOT NULL AUTO_INCREMENT,
  `dimension` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_dimension`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimension_indicador`
--

LOCK TABLES `dimension_indicador` WRITE;
/*!40000 ALTER TABLE `dimension_indicador` DISABLE KEYS */;
INSERT INTO `dimension_indicador` VALUES (1,'Eficiencia'),(2,'Eficacia'),(3,'Calidad'),(4,'Economía');
/*!40000 ALTER TABLE `dimension_indicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eje`
--

DROP TABLE IF EXISTS `eje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eje` (
  `id_eje` tinyint(1) NOT NULL,
  `eje` varchar(45) NOT NULL,
  PRIMARY KEY (`id_eje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eje`
--

LOCK TABLES `eje` WRITE;
/*!40000 ALTER TABLE `eje` DISABLE KEYS */;
INSERT INTO `eje` VALUES (1,'1. Gobierno Abierto y de Resultados'),(2,'2. Seguridad Humana'),(3,'3. Competitividad y Prosperidad'),(4,'4. Medio Ambiente y Desarrollo Territorial');
/*!40000 ALTER TABLE `eje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estrategias`
--

DROP TABLE IF EXISTS `estrategias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estrategias` (
  `id_estrategia` smallint(3) NOT NULL,
  `id_linea` tinyint(2) NOT NULL,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id_estrategia`),
  KEY `estrategias_linea_idx` (`id_linea`),
  CONSTRAINT `estrategias_linea` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estrategias`
--

LOCK TABLES `estrategias` WRITE;
/*!40000 ALTER TABLE `estrategias` DISABLE KEYS */;
INSERT INTO `estrategias` VALUES (1,1,'1.1.1 Fomentar la participación e involucramiento de la sociedad en los asuntos públicos'),(2,1,'1.1.2 Fortalecer la colaboración entre los poderes del Estado y órdenes de gobierno, a fin de garantizar la gobernanza democrática'),(3,1,'1.1.3 Implementar la participación social en la evaluación de la gestión pública'),(4,1,'1.1.4 Fomentar la legalidad y certeza jurídica en la acción gubernamental'),(5,2,'1.2.1 Implementar la planeación estratégica del Gobierno del Estado para una gestión transparente basada en resultados y con perspectiva de género'),(6,2,'1.2.2 Ejercer finanzas públicas honestas, trasparentes, eficientes y eficaces'),(7,2,'1.2.3 Optimizar el funcionamiento de la capacidad institucional de la Administración Pública Estatal'),(8,2,'1.2.4 Profesionalización, actualización y evaluación de los servidores públicos'),(9,3,'1.3.1 Implementar un modelo de Gobernanza Electrónica'),(10,3,'1.3.2 Ampliar la red de infraestructura de telecomunicaciones en el territorio estatal'),(11,4,'1.4.1 Fortalecer la capacidad institucional para garantizar el acceso a la información, la rendición de cuentas y la transparencia proactiva'),(12,4,'1.4.2 Incentivar la participación ciudadana en el aprovechamiento de los medios de transparencia y acceso a la información'),(13,5,'1.5.1 Implementar y consolidar el Sistema Estatal Anticorrupción'),(14,5,'1.5.2 Fortalecer a las instituciones para la prevención y el combate a la corrupción'),(15,6,'1.6.1 Fortalecer las capacidades institucionales de los Municipios'),(16,6,'1.6.2 Impulsar la colaboración regional y territorial'),(17,6,'1.6.3 Promover la insersión municipal en el ámbito internacional'),(18,7,'1.7.1 Fortalecer la colaboración con organismos internacionales promotores del desarrollo'),(19,7,'1.7.2 Fortalecer la promoción integral del Estado en el ámbito internacional'),(20,8,'2.1.1 Institucionalizar el enfoque de derechos humanos'),(21,8,'2.1.2 Promover la cultura de derechos humanos'),(22,8,'2.1.3 Garantizar el goce y ejercicio de los derechos humanos de las niñas, niños, adolescentes, jóvenes, mujeres y adultos mayores'),(23,9,'2.2.1 Implementar programas de reducción de la pobreza en todas sus dimensiones'),(24,9,'2.2.2 Impulsar la inversión pública para ampliar la infraestructura social'),(25,9,'2.2.3 Implementar el Sistema Estatal de Evaluación de la Política Social'),(26,9,'2.2.4 Impulsar la economía social'),(27,10,'2.3.1 Promover redes de intercambio social'),(28,10,'2.3.2 Reducir las brechas de marginación'),(29,10,'2.3.3 Convivencia social para el progreso de nuestras comunidades'),(30,11,'2.4.1 Garantizar que las y los zacatecanos tengan acceso efectivo a los servicios de salud'),(31,11,'2.4.2 Garantizar el acceso integral a la salud de la mujer'),(32,11,'2.4.3 Mejorar la calidad, eficiencia y coordinación sectorial en la prestación de servicios de salud'),(33,11,'2.4.4 Promover la cultura de la prevención y detección oportuna de enfermedades'),(34,11,'2.4.5 Fortalecer las acciones orientadas a la inocuidad y sanidad alimentaria'),(35,12,'2.5.1 Fortalecer la infraestructura y los mecanismos de actuación y colaboración de las funciones de seguridad pública'),(36,12,'2.5.2 Impulsar la prevención de la violencia y delincuencia en el Estado'),(37,12,'2.5.3 Promover la readaptación y reinsersión social de indiviudos'),(38,13,'2.6.1 Consolidar el nuevo sistema de justicia penal'),(39,13,'2.6.2 Promover el acceso inclusivo a la justicia'),(40,13,'2.6.3 Fortalecer el acceso a la justicia para las mujeres'),(41,14,'2.7.1 Institucionalizar la perspectiva de género en la administración pública estatal y municipal'),(42,14,'2.7.2 Fortalecer el acceso a las mujeres a una vida libre de violencia'),(43,14,'2.7.3 Promover la participación plena y efectiva de las mujeres y la igualdad de oportunidades en todos los ambitos de la vida política, económica y pública'),(44,15,'2.8.1 Fomentar el desarrollo integral de los jóvenes para insertarlos en todos los ámbitos productivo, social y cultural'),(45,15,'2.8.2 Desorrollar mecanismos de coordinación y evaluación de acciones transisntitucionales a favor de la juventud'),(46,16,'2.9.1 Impulsar la inclusión de hombres y mujeres con discapacidad al desarrollo cultural, académico, productivo y social en el Estado'),(47,16,'2.9.2 Incrementar el diseño y la accesibilidad universal'),(48,16,'2.9.3 Instalar centros de rehabilitación y centros geriátricos en los municipios del Estado'),(49,16,'2.9.4 Impulsar el derecho al cuidado'),(50,17,'2.10.1 Impulsar la protección y ejercicio pleno de los derechos de los migrantes'),(51,17,'2.10.2 Fortalecer los programas y mecanismos de cooperación con la comunidad migrante para promover su reinserción económica y social'),(52,17,'2.10.3 Promover la inversión productiva de las remesas'),(53,18,'2.11.1 Desarrollar el deporte de alto rendimiento'),(54,18,'2.11.2 Incrementar las actividades físicas y deportivas'),(55,18,'2.11.3 Incentivar el uso de la infraestructura deportiva como espacio de convivencia para contribuir a la cohesión social e integración familiar'),(56,19,'3.1.1 Implementar un nuevo modelo de enseñanza-aprendizaje para formar estudiantes responsables de su entorno, innovadores y dinámicos.'),(57,19,'3.1.2 Fortalecer la gestión administrativa de la educación'),(58,19,'3.1.3 Ampliar la infraestructura física educativa pertinente y de calidad para dignificar la vida escolar'),(59,19,'3.1.4 Incrementar la inclusión, el acceso y la permanencia de la población en el sistema educativo'),(60,19,'3.1.5 Disminuir el rezago educativo en la población de 15 años y más'),(61,20,'3.2.1 Fomentar la formación de recursos humanos con perfil científico-tecnológico en el Estado'),(62,20,'3.2.2 Impulsar el emprendimiento de empresas de innovación tecnológica en la entidad'),(63,20,'3.2.3 Fortalecer el parque científico tecnológico y su vinculación con la economía zacatecana'),(64,20,'3.2.4 Promover la apropiación social y la divulgación de la ciencia, tecnología e innovación en la sociedad zacatecana'),(65,20,'3.2.5 Fortalecer el sector de tecnologías de la información, industrial y de servicios, a través de certificaciones internacionales en tecnologías de información'),(66,21,'3.3.1 Estimular la inversión local en sectores estratégicos'),(67,21,'3.3.2 Estimular la inversión nacional y extranjera'),(68,21,'3.3.3 Fortalecer las instituciones y agencias de promoción de inversiones y las incubadoras de proyectos'),(69,22,'3.4.1 Fomentar la formación de habilidades laborales óptimas entre la población económicamente activa'),(70,22,'3.4.2 Vincular al sector educativo de la entidad (público y privado) con el sector productivo'),(71,22,'3.4.3 Potenciar de manera interinstitucional el talento para la creación de autoempleo'),(72,22,'3.4.4 Impulsar estrategias para la reducción del desempleo y el subempleo (subocupación)'),(73,22,'3.4.5 Aumentar la formalización de la economía, con un carácter social y distributivo'),(74,23,'3.5.1 Incrementar la conectividad intra e inter estatal para la prestación de servicios y el intercambio comercial'),(75,23,'3.5.2 Crear infraestructura tecnológica y productiva para el impulso industrial, comercial y de servicios'),(76,24,'3.6.1 Fortalecer y diversificar la agricultura sostenible'),(77,24,'3.6.2 Incrementar la productividad en la ganadería, silvicultura y pesca'),(78,24,'3.6.3 Impulsar alianzas estratégicas para promover la agroindustria'),(79,24,'3.6.4 Garantizar la sostenibilidad del recurso hídrico en el sector'),(80,25,'3.7.1 Ampliar el uso de la tecnología y la innovación en el sector industrial y empresarial'),(81,25,'3.7.2 Fortalecer el acceso a los esquemas de financiamiento para MIPyMES'),(82,25,'3.7.3 Fomentar la industrialización de procesos que proporcionen valor agregado a productos locales'),(83,25,'3.7.4 Fomentar el emprendimiento mediante asesoría y mecanismos de financiamiento'),(84,25,'3.7.5 Promover el encadenamiento de las MIPYMES a los sectores estratégicos'),(85,25,'3.7.6 Apertura de nuevos mercados nacionales e internacionales y cadenas de valor para los productos locales'),(86,26,'3.8.1 Promover la inversión del sector minero, privilegiando la que tenga una visión y manejo sustentable.'),(87,26,'3.8.2 Fortalecer la cadena de valor del sector minero y su productividad'),(88,26,'3.8.3 Ampliar y diversificar las actividades económicas y productivas en los distritos mineros que permitan su desarrollo sostenible.'),(89,26,'3.8.4 Implementar vínculos con el sector educativo estatal para la formación de profesionistas y técnicos de alto desempeño en el sector minero'),(90,27,'3.9.1 Ampliar la oferta turística, la profesionalización y capacitación del sector'),(91,27,'3.9.2 Incrementar la inversión y aprovechar la infraestructura con potencial turístico en áreas potenciales del sector'),(92,28,'3.10.1 Proteger, crear, preservar y difundir la cultura y el patrimonio cultural tanto material como inmaterial de la entidad'),(93,28,'3.10.2 Incrementar la formación de docentes, talentos, artistas y artesanos'),(94,28,'3.10.3 Construir y rehabilitar espacios dignos y apropiados para el acceso y difusión de las manifestaciones artísticas y populares'),(95,28,'3.10.4 Desarrollar la industria cultural y creativa'),(96,29,'4.1.1 Promover el uso sostenible de los ecosistemas del Estado'),(97,29,'4.1.2 Fomentar la rehabilitación de ecosistemas degradados'),(98,29,'4.1.3 Impulsar mecanismos para la protección y conservación de ecosistemas'),(99,30,'4.2.1 Gestión integrada del agua'),(100,30,'4.2.2 Incrementar la seguridad hídrica'),(101,30,'4.2.3 Fortalecer el abastecimiento de agua y el acceso a los servicios de agua potable'),(102,30,'4.2.4 Fortalecer el saneamiento y reuso del agua'),(103,30,'4.2.5 Fortalecer la cultura del cuidado del agua'),(104,31,'4.3.1 Diseñar programas encaminados a la mitigación y adaptación de los efectos negativos del cambio climático'),(105,31,'4.3.2 Fomentar la educación, el desarrollo e investigación científica y transferencia de tecnología para hacer frente al cambio climático.'),(106,31,'4.3.3 Adoptar el compromiso contraido en el Convenio Marco de la Naciones Unidas sobre Cambio Climático'),(107,32,'4.4.1 Aprovechar el potencial de la entidad en la generación de energías alternativas'),(108,32,'4.4.2 Impulsar la participación de instituciones de educación en la investigación, capacitación, desarrollo y uso de tecnologías en energías renovables'),(109,32,'4.4.3 Establecer un marco institucional para fomentar el uso masivo de energías alternativas'),(110,33,'4.5.1 Prevención y gestión integral de los residuos solidos a nivel municipal y regional'),(111,33,'4.5.2 Promover el manejo integral de los diferentes tipos de residuos generados en la entidad'),(112,33,'4.5.3 Desarrollo de capacidades locales en materia de gestión integral de residuos'),(113,33,'4.5.4 Disposición final de residuos solidos en cumplimiento de la normatividad ambiental'),(114,33,'4.5.5 Aprovechamiento y valorización de los residuos solidos'),(115,33,'4.5.6 Participación social en el manejo de residuos'),(116,34,'4.6.1 Identificar las amenazas que pueden tener consecuencias desastrosas y determinar formas de prevención.'),(117,34,'4.6.2 Impulsar la prevención como mecanismo para mitigar y reducir oportunamente el impacto de los desastres a los que está expuesta la población'),(118,34,'4.6.3 Fortalecer los protocolos de atención inmediata ante situaciones de desastre'),(119,35,'4.7.1 Impulsar el desarrollo territorial equilibrado'),(120,35,'4.7.2 Implementar una política de desarrollo urbano integral y sostenible'),(121,35,'4.7.3 Consolidar el desarrollo metropolitano'),(122,35,'4.7.4 Impulsar la regularización de la tenencia de la tierra en predios urbanos y fraccionamientos rurales.'),(123,35,'4.7.5 Modernización catastral y registral'),(124,35,'4.7.6 Ampliar y complementar el equipamiento urbano para el desarrollo de ciudades sustentables y modernas'),(125,36,'4.8.1 Promover la construcción de vivienda ordenada y sustentable'),(126,36,'4.8.2 Promover programas de apoyos para el mejoramiento de vivienda'),(127,37,'4.9.1 Impulsar el dinamismo del transporte a través de Planes Integrales de Movilidad'),(128,37,'4.9.2 Modernizar y dar mantenimiento a la infraestructura vial en la entidad'),(129,37,'4.9.3 Proponer nuevas alternativas de movilidad urbana');
/*!40000 ALTER TABLE `estrategias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id_evento` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `evento` varchar(128) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Acceso al Sistema'),(2,'Salir del Sistema'),(3,'Agregar Marco Estrategico'),(4,'Actualizar Marco Estrategico'),(5,'Agregar Programa Presupuestario Institucional'),(6,'Agregar Programa Presupuestario Prioritario'),(7,'Actualizar Programa Presupuestario Institucional'),(8,'Actualizar Programa Presupuestario Prioritario'),(9,'Eliminar Programa Presupuestario Institucional'),(10,'Eliminar Programa Presupuestario Prioritario'),(11,'Aprobar Programa Presupuestario Institucional'),(12,'Aprobar Programa Presupuestario Prioritario'),(13,'Desaprobar Programa Presupuetsario Institucional'),(14,'Desaprobar Programa Presupuestario Prioritario'),(15,'Agregar Indicador Programa Presupuestario'),(16,'Actualizar Indicador Programa Presupuestario'),(17,'Eliminar Indicador Programa Presupuestario'),(18,'Agregar Componente'),(19,'Actualizar Componente'),(20,'Eliminar Componente'),(21,'Agregar IndicadorComponente'),(22,'Actualizar Indicador Componente'),(23,'Eliminar Indicador Componente'),(24,'Agregar Actividad'),(25,'Actualizar Actividad'),(26,'Eliminar Actividad'),(27,'Agregar Indicador Actividad'),(28,'Actualizar Indicador Actividad'),(29,'Eliminar Indicador Actividad');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finalidad`
--

DROP TABLE IF EXISTS `finalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finalidad` (
  `id_finalidad` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_finalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finalidad`
--

LOCK TABLES `finalidad` WRITE;
/*!40000 ALTER TABLE `finalidad` DISABLE KEYS */;
INSERT INTO `finalidad` VALUES (1,'Gobierno','Comprende las acciones propias de la gestión gubernamental, tales como la administración de asuntos de carácter legislativo, procuración e impartición de justicia, asuntos militares y seguridad nacional, asuntos con el exterior, asuntos hacendarios, política interior, organización de los procesos electorales, regulación y normatividad aplicable a los particulares y al propio sector público y la administración interna del secto'),(2,'Desarrollo Social','Incluye los programas, actividades y proyectos relacionados con la prestación de servicios en beneficio de la población con el fin de favorecer el acceso a mejores niveles de bienestar, tales como: servicios educativos, recreación, cultura y otras manifestaciones sociales, salud, protección social, vivienda, servicios urbanos y rurales básicos, así como protección ambiental.'),(3,'Desarrollo Económico','Comprende los programas, actividades y proyectos relacionados con la promoción del desarrollo económico y fomento a la producción y comercialización agropecuaria, agroindustrial, acuacultura, pesca, desarrollo hidroagrícola y fomento forestal, así como la producción y prestación de bienes y servicios públicos, en forma complementaria a los bienes y servicios que ofrecen los particulares.'),(4,'Otras Funciones no Clasificadas en Funciones Anteriores','Comprende los pagos de compromisos inherentes a la contratación de Deuda; las transferencias, participaciones y aportaciones entre diferentes niveles y órdenes de gobierno que no se pueden registrar en clasificaciones anteriores, así como aquellas actividades no susceptibles de etiquetar en las funciones existentes.');
/*!40000 ALTER TABLE `finalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulas`
--

DROP TABLE IF EXISTS `formulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formulas` (
  `id_formula` tinyint(4) NOT NULL AUTO_INCREMENT,
  `formula` varchar(64) NOT NULL,
  PRIMARY KEY (`id_formula`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulas`
--

LOCK TABLES `formulas` WRITE;
/*!40000 ALTER TABLE `formulas` DISABLE KEYS */;
INSERT INTO `formulas` VALUES (1,'( var1 / var2 ) * 100'),(2,'( var1 * 100 ) / var2'),(3,'var1 / var2'),(4,'var1 + var2 + var3'),(5,'{ ( var1 / var2 ) - 1 } * 100'),(6,'var1'),(7,'( var1 / var2 ) * 100,000'),(8,'( var1 / var2 ) * 10,000'),(9,'( var1 / var2 ) * 0.0001'),(10,'( var1 + var2 + var3 + var4 ) / 4'),(11,'( var1 / ( var2 - 1 ) ) * 100'),(12,'( var1 - var2) / var2'),(13,'var1 /  (var2 * 0.001)'),(14,'var1 /  (var2 * 0.0001)'),(15,'( var1 / var2 ) * 1000');
/*!40000 ALTER TABLE `formulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frecuencia_indicador`
--

DROP TABLE IF EXISTS `frecuencia_indicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frecuencia_indicador` (
  `id_frecuencia` tinyint(4) NOT NULL AUTO_INCREMENT,
  `frecuencia` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_frecuencia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frecuencia_indicador`
--

LOCK TABLES `frecuencia_indicador` WRITE;
/*!40000 ALTER TABLE `frecuencia_indicador` DISABLE KEYS */;
INSERT INTO `frecuencia_indicador` VALUES (1,'Mensual'),(2,'Bimestral'),(3,'Trimestral'),(4,'Semestral'),(5,'Anual'),(6,'Bienal');
/*!40000 ALTER TABLE `frecuencia_indicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcion`
--

DROP TABLE IF EXISTS `funcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcion` (
  `id_funcion` tinyint(2) NOT NULL AUTO_INCREMENT,
  `id_finalidad` tinyint(1) NOT NULL,
  `id_funf` smallint(6) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(1500) DEFAULT NULL,
  PRIMARY KEY (`id_funcion`),
  KEY `funcion_finalidad_idx` (`id_finalidad`),
  KEY `fun_fun_fin` (`id_funf`),
  CONSTRAINT `funcion_finalidad` FOREIGN KEY (`id_finalidad`) REFERENCES `finalidad` (`id_finalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcion`
--

LOCK TABLES `funcion` WRITE;
/*!40000 ALTER TABLE `funcion` DISABLE KEYS */;
INSERT INTO `funcion` VALUES (1,1,1,'Legislación','Comprende las acciones relativas a la iniciativa, revisión, elaboración, aprobación, emisión y difusión de leyes, decretos, reglamentos y acuerdos; así como la fiscalización de la cuenta pública, entre otras.'),(2,1,2,'Justicia','Comprende la Administración de la Procuración e Impartición de la Justicia, como las acciones de las fases de investigación, acopio de pruebas e indicios, hasta la imposición, ejecución y cumplimiento de resoluciones de carácter penal, civil, familiar, administrativo, laboral, electoral; del conocimiento y calificación de las infracciones e imposición de sanciones en contra de quienes presuntamente han violado la Ley o disputen un derecho, exijan su reconocimiento o en su caso impongan obligaciones. Así como las acciones orientadas a la persecución oficiosa o a petición de parte ofendida, de las conductas que transgreden las disposiciones legales, las acciones de representación de los intereses sociales en juicios y procedimientos que se realizan ante las instancias de justicia correspondientes. Incluye la administración de los centros de reclusión y readaptación social. Así como los programas, actividades y proyectos relacionados con los derechos humanos, entre otros.'),(3,1,3,'Coordinación de la Política de Gobierno ','Comprende las acciones enfocadas a la formulación y establecimiento de las directrices, lineamientos de acción y estrategias de gobierno.'),(4,1,4,'Relaciones Exteriores','Incluye la planeación, formulación, diseño, e implantación de la política exterior en los ámbitos bilaterales y multilaterales, así como la promoción de la cooperación internacional y la ejecución de acciones culturales de igual tipo.'),(5,1,5,'Asuntos Financieros y Hacendarios','Comprende el diseño y ejecución de los asuntos relativos a cubrir todas las acciones inherentes a los asuntos financieros y hacendarios.'),(6,1,6,'Seguridad Nacional','Comprende los programas, actividades y proyectos relacionados con la planificación y operación del Ejército, la Marina y la Fuerza Aérea de México, así como la administración de los asuntos militares y servicios inherentes a la Defensa Nacional. Incluye también la ayuda militar al exterior y los programas de investigación y desarrollo relacionados con la defensa.'),(7,1,7,'Asuntos de Orden Público y de Seguridad Interior ','Comprende los programas, actividades y proyectos relacionados con el orden y seguridad pública, así como las acciones que realizan los gobiernos Federal, Estatal y Municipal, para la investigación y prevención de conductas delictivas; también su participación en programas conjuntos de reclutamiento, capacitación, entrenamiento, equipamiento y ejecución de acciones coordinadas, al igual que el de orientación, difusión, auxilio y protección civil para prevención de desastres, entre otras. Comprende los servicios de policía, servicios de protección contra incendios y la investigación y desarrollo relacionados con el orden público y la seguridad.'),(9,1,8,'Otros Servicios Generales ','Este grupo comprende servicios que no están vinculados a una función concreta y que generalmente son de cometido de oficinas centrales a los diversos niveles del gobierno, tales como los servicios generales de personal, planificación y estadísticas. También comprende los servicios vinculados a una determinada función que son de cometido de dichas oficinas centrales. Por ejemplo, se incluye aquí la recopilación de estadísticas de la industria, el medio ambiente, la salud o la educación por un organismo estadístico central.'),(10,2,1,'Protección Ambiental','Comprende los esfuerzos y programas, actividades y proyectos encaminados a promover y fomentar la protección e investigación y desarrollo de los recursos naturales y preservación del medio ambiente. Considera la ordenación de aguas residuales y desechos, reducción de la contaminación, protección de la diversidad biológica y del paisaje e investigación y desarrollo relacionados con la protección del medio ambiente.'),(11,2,2,'Vivienda y Servicios a la Comunidad ','Comprende la administración, gestión o apoyo de programas, actividades y proyectos relacionados con la formulación, administración, coordinación, ejecución y vigilancia de políticas relacionadas con la urbanización, desarrollos comunitarios, abastecimiento de agua, alumbrado público y servicios comunitarios, investigación y desarrollo relacionados con la vivienda y los servicios comunitarios, así como la producción y difusión de información general, documentación técnica y estadísticas relacionadas con la vivienda y los servicios comunitarios.'),(12,2,3,'Salud','Comprende los programas, actividades y proyectos relacionados con la prestación de servicios colectivos y personales de salud, entre ellos los servicios para pacientes externos, servicios médicos y hospitalarios generales y especializados, servicios odontológicos, servicios paramédicos, servicios hospitalarios generales y especializados, servicios médicos y centros de maternidad, servicios de residencias de la tercera edad y de convalecencia y otros servicios de salud; así como productos, útiles y equipo médicos, productos farmacéuticos, aparatos y equipos terapéuticos y la investigación y desarrollo relacionados con la salud.'),(13,2,4,'Recreación, Cultura y otras Manifestaciones Sociales ','Comprende los programas, actividades y proyectos relacionados con la promoción, fomento y prestación de servicios culturales, recreativos y deportivos, otras manifestaciones sociales, servicios de radio, televisión y editoriales, actividades recreativas y la investigación y desarrollo relacionados con el esparcimiento, la cultura y otras manifestaciones sociales.'),(14,2,5,'Educacíon','Comprende la prestación de los servicios educativos en todos los niveles, en general a los programas, actividades y proyectos relacionadas con la educación preescolar, primaria, secundaria, media superior, técnica, superior y postgrado, servicios auxiliares de la educación, investigación y desarrollo relacionados con la misma y otras no clasificadas en los conceptos anteriores.'),(15,2,6,'Protección Social','Comprende los programas, actividades y proyectos relacionados con la protección social que desarrollan los entes públicos en materia de incapacidad económica o laboral, edad avanzada, personas en situación económica extrema, familia e hijos, desempleo, vivienda, exclusión social, y de investigación y desarrollo relacionados con la protección social. Comprende las prestaciones económicas y sociales, los beneficios en efectivo o en especie, tanto a la población asegurada como a la no asegurada. Incluyen también los gastos en servicios y transferencias a personas y familias y los gastos en servicios proporcionados a distintas agrupaciones.'),(16,2,7,'Otros Asuntos Sociales ','Comprende otros asuntos sociales no comprendidos en las funciones anteriores.'),(17,3,1,'Asuntos Económicos, Comerciales y Laborales en General ','Comprende la administración de asuntos y servicios económicos, comerciales y laborales en general, inclusive asuntos comerciales exteriores; gestión o apoyo de programas laborales y de instituciones que se ocupan de patentes, marcas comerciales, derechos de autor, inscripción de empresas, pronósticos meteorológicos, pesas y medidas, levantamientos hidrológicos, levantamientos geodésicos, etc.; reglamentación o apoyo de actividades económicas y comerciales generales, tales como el comercio de exportación e importación en su conjunto, mercados de productos básicos y de valores de capital, controles generales de los ingresos, actividades de fomento del comercio en general, reglamentación general de monopolios y otras restricciones al comercio y al acceso al mercado, etc. Así como de la formulación, ejecución y aplicación de políticas económicas, comerciales y laborales.'),(18,3,2,'Agropecuaria, Silviculta, Pesca y Caza','Comprende los programas, actividades y proyectos relacionados con el fomento a la producción, y comercialización agropecuaria, silvicultura, pesca y caza, agroindustria, desarrollo hidroagrícola y fomento forestal.'),(19,3,3,'Combustible y Energía','Comprende los programas, actividades y proyectos relacionados con la producción y comercialización de combustibles y energía, tales como el petróleo y gas natural, carbón y otros combustibles minerales sólidos, combustibles nucleares y otros, electricidad y la energía no eléctrica.'),(20,3,4,'Minería, Manufacturas y Construcción ','Comprende los programas, actividades y proyectos relacionados con la administración de asuntos y servicios relacionados con la minería, los recursos minerales (excepto combustibles minerales), manufacturas y construcción; la conservación, descubrimiento, aprovechamiento y explotación racionalizada de recursos minerales; desarrollo, ampliación o mejoramiento de las manufacturas; supervisión, reglamentación, producción y difusión de información para actividades de minería, manufactura y construcción.'),(21,3,5,'Trasnporte ','Comprende la administración de asuntos y servicios relacionados con la explotación, la utilización, la construcción y el mantenimiento de sistemas e instalaciones del transporte por carretera, ferroviario, aéreo, agua, oleoductos y gasoductos y otros sistemas. Así como su supervisión y reglamentación.'),(22,3,6,'Comunicaciones ','Comprende los programas, actividades y proyectos relacionados con la administración de asuntos y servicios relacionados con la construcción, la ampliación, el mejoramiento, la explotación y el mantenimiento de sistemas de comunicaciones, telecomunicaciones y postal.'),(23,3,7,'Turismo ','Comprende la administración, fomento y desarrollo de asuntos y servicios de turismo; enlace con las industrias del transporte, los hoteles y los restaurantes y otras industrias que se benefician con la presencia de turistas, la explotación de oficinas de turismo en el país y en el exterior; organización de campañas publicitarias, inclusive la producción y difusión de literatura de promoción, entre otras.'),(24,3,8,'Ciencia, Tecnología e Innovación','Comprende los programas de investigación aplicada que consiste en investigaciones originales realizadas a fin de adquirir nuevos conocimientos pero orientadas primordialmente a un fin u objetivo práctico concreto. El desarrollo experimental que consiste en trabajos sistemáticos, basados en conocimientos existentes logrados a partir de la investigación y la experiencia práctica, que están orientados a producir nuevos materiales, productos y dispositivos; instalar nuevos procesos, sistemas y servicios o a perfeccionar los que ya se han producido o instalado, relacionados con asuntos económicos.'),(25,3,9,'Otras Industrias y otros Asuntos Económicos','Comprende el comercio, distribución, almacenamiento y depósito y otras industrias no incluidas en funciones anteriores. Incluye las actividades y prestación de servicios relacionadas con asuntos económicos no consideradas en las funciones anteriores.'),(26,4,1,'Transacciones de la Deuda Pública / Costo Financiero de la Deuda ','Comprende los pagos de compromisos que por concepto de intereses, comisiones, amortización y otras erogaciones derivadas de la contratación de deuda pública. Se refiere al pago de la deuda pública contratada y documentada, tanto con instituciones internas como externas. Así como pago de intereses y gastos por concepto de suscripción y emisión de empréstitos gubernamentales.'),(27,4,2,'Trasferencias, Participaciones y Aportaciones entre diferentes Niveles y Órdenes de Gobierno ','Transferencias, participaciones y aportaciones entre diferentes niveles y órdenes de gobierno que son de carácter general y no están asignadas a una función determinada.'),(28,4,3,'Saneamiento del Sistema Financiero','Comprende el apoyo financiero a las operaciones y programas para atender la problemática de pago de los deudores del Sistema Bancario Nacional e impulsar el saneamiento financiero.'),(29,4,4,'Adeudos de Ejercicios Fiscales Anteriores','Comprende los pagos que realiza el Gobierno Federal derivados del gasto devengado no pagado de ejercicios fiscales anteriores.');
/*!40000 ALTER TABLE `funcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_vulnerable`
--

DROP TABLE IF EXISTS `grupo_vulnerable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo_vulnerable` (
  `id_vulnerable` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_vulnerable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_vulnerable`
--

LOCK TABLES `grupo_vulnerable` WRITE;
/*!40000 ALTER TABLE `grupo_vulnerable` DISABLE KEYS */;
INSERT INTO `grupo_vulnerable` VALUES (1,'No Aplica'),(2,'Adultos'),(3,'Adultos Mayores'),(4,'Capacidades Diferentes'),(5,'Jovenes'),(6,'Madres Solteras'),(7,'Migrantes'),(8,'Niños'),(9,'Mujeres');
/*!40000 ALTER TABLE `grupo_vulnerable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial` (
  `id_usuario` smallint(5) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `evento` smallint(5) unsigned NOT NULL,
  `ipaddress` varchar(15) NOT NULL,
  `identificador` smallint(6) DEFAULT NULL,
  KEY `historial_usuario_idx` (`id_usuario`),
  KEY `historial_evento_idx` (`evento`),
  CONSTRAINT `historial_evento` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `historial_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicadores`
--

DROP TABLE IF EXISTS `indicadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicadores` (
  `id_indicador` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_indicador` tinyint(1) unsigned NOT NULL,
  `id_proyecto` smallint(6) NOT NULL,
  `id_componente` smallint(6) DEFAULT '0',
  `id_actividad` smallint(6) DEFAULT '0',
  `nombre` varchar(256) NOT NULL,
  `definicion` text NOT NULL,
  `metodo` tinyint(4) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `dimension` tinyint(4) NOT NULL,
  `frecuencia` tinyint(4) NOT NULL,
  `sentido` tinyint(4) NOT NULL,
  `u_medida` varchar(256) NOT NULL,
  `meta` varchar(16) NOT NULL,
  `linea_base` varchar(16) DEFAULT '0.000',
  `medio_verificacion` text NOT NULL,
  `supuesto` text NOT NULL,
  PRIMARY KEY (`id_indicador`),
  KEY `indicador_formula_idx` (`metodo`),
  KEY `indicador_tipo_idx` (`tipo`),
  KEY `indicador_dimension_idx` (`dimension`),
  KEY `indicador_frecuencia_idx` (`frecuencia`),
  KEY `indicador_sentido_idx` (`sentido`),
  CONSTRAINT `indicador_dimension` FOREIGN KEY (`dimension`) REFERENCES `dimension_indicador` (`id_dimension`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_formula` FOREIGN KEY (`metodo`) REFERENCES `formulas` (`id_formula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_frecuencia` FOREIGN KEY (`frecuencia`) REFERENCES `frecuencia_indicador` (`id_frecuencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_sentido` FOREIGN KEY (`sentido`) REFERENCES `sentido_indicador` (`id_sentido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `indicador_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_indicador` (`id_tipo_indicador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=809 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicadores`
--

LOCK TABLES `indicadores` WRITE;
/*!40000 ALTER TABLE `indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linea`
--

DROP TABLE IF EXISTS `linea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linea` (
  `id_linea` tinyint(2) NOT NULL,
  `id_eje` tinyint(1) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`id_linea`),
  KEY `linea_eje_idx` (`id_eje`),
  CONSTRAINT `linea_eje` FOREIGN KEY (`id_eje`) REFERENCES `eje` (`id_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linea`
--

LOCK TABLES `linea` WRITE;
/*!40000 ALTER TABLE `linea` DISABLE KEYS */;
INSERT INTO `linea` VALUES (1,1,'1.1 Democracia y participación ciudadana'),(2,1,'1.2 Gestión pública basada en resultados'),(3,1,'1.3 Gobernanza electrónica'),(4,1,'1.4 Transparencia y rendición de cuentas'),(5,1,'1.5 Combate a la corrupción'),(6,1,'1.6 Fortalecimiento municipal'),(7,1,'1.7 Colaboración internacional'),(8,2,'2.1 Derechos Humanos'),(9,2,'2.2 Pobreza y desigualdad'),(10,2,'2.3 Cohesión social'),(11,2,'2.4 Salud y bienestar'),(12,2,'2.5 Seguridad Pública'),(13,2,'2.6 Acceso a la Justicia para Todos'),(14,2,'2.7 Igualdad sustantiva entre mujeres y hombres'),(15,2,'2.8 Oportunidades para las y los jóvenes'),(16,2,'2.9 Gobierno promotor de la inclusión de las personas con discapacidad'),(17,2,'2.10 Vinculación con las y los zacatecanos radicados en otras latitudes'),(18,2,'2.11 Cultura física y deporte'),(19,3,'3.1 Educación de Calidad'),(20,3,'3.2 Innovación, Ciencia y Tecnología'),(21,3,'3.3 Inversión Local, Nacional y Extranjera'),(22,3,'3.4 Empleo'),(23,3,'3.5 Infraestructura y equipamiento'),(24,3,'3.6 Productividad en el Sector Agropecuario'),(25,3,'3.7 Productividad en los sectores industrial y de servicios'),(26,3,'3.8 Minería Sostenible'),(27,3,'3.9 Turismo'),(28,3,'3.10 Cultura y Economía Creativa'),(29,4,'4.1 Recursos Naturales'),(30,4,'4.2 Agua'),(31,4,'4.3 Cambio Climático'),(32,4,'4.4 Energías renovables'),(33,4,'4.5 Manejo de residuos'),(34,4,'4.6 Riesgos, vulnerabilidad y prevención de desastres'),(35,4,'4.7 Desarrollo territorial y urbano'),(36,4,'4.8 Vivienda digna y sustentable'),(37,4,'4.9 Movilidad');
/*!40000 ALTER TABLE `linea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marco_estrategico`
--

DROP TABLE IF EXISTS `marco_estrategico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marco_estrategico` (
  `id_dependencia` smallint(6) NOT NULL DEFAULT '0',
  `res_poa` text,
  `activ_sustantivas` text,
  `mision` text,
  `vision` text,
  `objetivo_estrategico` text,
  `perspec_anual` text,
  `firmas_validacion` text,
  `ejercicio` varchar(4) NOT NULL,
  `completo` char(1) DEFAULT '0',
  PRIMARY KEY (`id_dependencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marco_estrategico`
--

LOCK TABLES `marco_estrategico` WRITE;
/*!40000 ALTER TABLE `marco_estrategico` DISABLE KEYS */;
/*!40000 ALTER TABLE `marco_estrategico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metas` (
  `id_meta` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_accion` int(11) NOT NULL,
  `enero_m` varchar(45) DEFAULT NULL COMMENT '	',
  `febrero_m` varchar(45) DEFAULT NULL,
  `marzo_m` varchar(45) DEFAULT NULL,
  `abril_m` varchar(45) DEFAULT NULL,
  `mayo_m` varchar(45) DEFAULT NULL,
  `junio_m` varchar(45) DEFAULT NULL,
  `julio_m` varchar(45) DEFAULT NULL,
  `agosto_m` varchar(45) DEFAULT NULL,
  `septiembre_m` varchar(45) DEFAULT NULL,
  `octubre_m` varchar(45) DEFAULT NULL,
  `noviembre_m` varchar(45) DEFAULT NULL,
  `diciembre_m` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_meta`),
  UNIQUE KEY `id_accion_UNIQUE` (`id_accion`)
) ENGINE=InnoDB AUTO_INCREMENT=753 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metas`
--

LOCK TABLES `metas` WRITE;
/*!40000 ALTER TABLE `metas` DISABLE KEYS */;
/*!40000 ALTER TABLE `metas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ods`
--

DROP TABLE IF EXISTS `ods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ods` (
  `id_ods` tinyint(2) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ods`
--

LOCK TABLES `ods` WRITE;
/*!40000 ALTER TABLE `ods` DISABLE KEYS */;
INSERT INTO `ods` VALUES (1,'Fin de la Pobreza'),(2,'Hambre Cero'),(3,'Salud y Bienestar'),(4,'Educación de Calidad'),(5,'Igualdad de Género'),(6,'Agua Limpia y Saneamiento'),(7,'Energía Asequible y no Contaminante'),(8,'Trabajo Decente y Crecimiento Económico'),(9,'Industria, Innovación e Infraestructura'),(10,'Reducción de las Desigualdades'),(11,'Ciudades y Comunidades Sostenibles'),(12,'Producción y Consumo Responsable'),(13,'Acción por el Clima'),(14,'Vida Submarina'),(15,'Vida de Ecosistemas Terrestres'),(16,'Paz, Justicia e Instituciones Solidas'),(17,'Alianzas para lograr los objetivos');
/*!40000 ALTER TABLE `ods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id_perfil` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Catalogo perfiles';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'Administrador'),(2,'Capturista'),(3,'Planeación'),(4,'Presupuestal'),(5,'Consulta'),(8,'Movil'),(9,'Consulta Dependencia');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos_evaluacion`
--

DROP TABLE IF EXISTS `periodos_evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodos_evaluacion` (
  `id_periodo_evaluacion` tinyint(4) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_periodo_evaluacion`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos_evaluacion`
--

LOCK TABLES `periodos_evaluacion` WRITE;
/*!40000 ALTER TABLE `periodos_evaluacion` DISABLE KEYS */;
INSERT INTO `periodos_evaluacion` VALUES (1,'Ene'),(2,'Feb'),(3,'Mar'),(4,'Abr'),(5,'May'),(6,'Jun'),(7,'Jul'),(8,'Ago'),(9,'Sep'),(10,'Oct'),(11,'Nov'),(12,'Dic'),(13,'Ene-Feb'),(14,'Mar-Abr'),(15,'May-Jun'),(16,'Jul-Ago'),(17,'Sep-Oct'),(18,'Nov-Dic'),(19,'Ene-Feb-Mar'),(20,'Abr-May-Jun'),(21,'Jul-Ago-Sep'),(22,'Oct-Nov-Dic'),(23,'Ene-Jun'),(24,'Jul-Dic'),(25,'Anual'),(26,'Año 1'),(27,'Año 2');
/*!40000 ALTER TABLE `periodos_evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pnd_ejes`
--

DROP TABLE IF EXISTS `pnd_ejes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pnd_ejes` (
  `id_pnd_eje` tinyint(1) NOT NULL,
  `pnd_eje` varchar(128) NOT NULL,
  PRIMARY KEY (`id_pnd_eje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pnd_ejes`
--

LOCK TABLES `pnd_ejes` WRITE;
/*!40000 ALTER TABLE `pnd_ejes` DISABLE KEYS */;
INSERT INTO `pnd_ejes` VALUES (1,'I. México en Paz'),(2,'II. México Incluyente'),(3,'III. México con Educación de Calidad'),(4,'IV. México Próspero'),(5,'V. México con Responsabilidad Global'),(6,'No Aplica');
/*!40000 ALTER TABLE `pnd_ejes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pnd_estrategias`
--

DROP TABLE IF EXISTS `pnd_estrategias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pnd_estrategias` (
  `id_pnd_estrategia` smallint(3) NOT NULL AUTO_INCREMENT,
  `pnd_estrategia` text NOT NULL,
  `id_pnd_objetivo` tinyint(2) NOT NULL,
  `id_pnd_eje` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pnd_estrategia`),
  KEY `id_pnd_objetivo` (`id_pnd_objetivo`),
  KEY `id_pnd_eje` (`id_pnd_eje`),
  CONSTRAINT `pnd_estrategia_eje` FOREIGN KEY (`id_pnd_eje`) REFERENCES `pnd_ejes` (`id_pnd_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pnd_estrategia_objetivo` FOREIGN KEY (`id_pnd_objetivo`) REFERENCES `pnd_objetivos` (`id_pnd_objetivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pnd_estrategias`
--

LOCK TABLES `pnd_estrategias` WRITE;
/*!40000 ALTER TABLE `pnd_estrategias` DISABLE KEYS */;
INSERT INTO `pnd_estrategias` VALUES (1,'1.1.1. Contribuir al desarrollo de la democracia.',1,1),(2,'1.1.2. Fortalecer la relación con el Honorable Congreso de la Unión y el Poder Judicial, e impulsar la construcción de acuerdos políticos para las reformas que el país requiere.',1,1),(3,'1.1.3. Impulsar un federalismo articulado mediante una coordinación eficaz y una mayor corresponsabilidad de los tres órdenes de gobierno.',1,1),(4,'1.1.4. Prevenir y gestionar conflictos sociales a través del diálogo Constructivo.',1,1),(5,'1.1.5. Promover una nueva política de medios para la equidad, la libertad y su desarrollo ordenado.',1,1),(6,'1.2.1. Preservar la integridad, estabilidad y permanencia del Estado Mexicano.',2,1),(7,'1.2.2. Preservar la paz, la independencia y soberanía de la nación.',2,1),(8,'1.2.3. Fortalecer la inteligencia del Estado Mexicano para identificar, prevenir y contrarrestar riesgos y amenazas a la Seguridad Nacional.',2,1),(9,'1.2.4. Fortalecer las capacidades de respuesta operativa de las Fuerzas Armadas.',2,1),(10,'1.2.5. Modernizar los procesos, sistemas y la infraestructura institucional de las Fuerzas Armadas.',2,1),(11,'1.3.1. Aplicar, evaluar y dar seguimiento del Programa Nacional para la Prevención Social de la Violencia y la Delincuencia.',3,1),(12,'1.3.2. Promover la transformación institucional y fortalecer las capacidades de las fuerzas de seguridad.',3,1),(13,'1.4.1. Abatir la impunidad.',4,1),(14,'1.4.2. Lograr una procuración de justicia efectiva.',4,1),(15,'1.4.3. Combatir la corrupción y transparentar la acción pública en materia de justicia para recuperar la confianza ciudadana.',4,1),(16,'1.5.1. Instrumentar una política de Estado en derechos humanos.',5,1),(17,'1.5.2. Hacer frente a la violencia contra los niños, niñas y adolescentes en todas sus formas, sobre la base de una coordinación eficiente que asegure la participación de todos los sectores responsables de su prevención, atención, monitoreo y evaluación.',5,1),(18,'1.5.3. Proporcionar servicios integrales a las víctimas u ofendidos de Delitos.',5,1),(19,'1.5.4. Establecer una política de igualdad y no discriminación.',5,1),(20,'1.6.1. Política estratégica para la prevención de desastres.',6,1),(21,'1.6.2. Gestión de emergencias y atención eficaz de desastres.',6,1),(22,'1.I. Democratizar la productividad',7,1),(23,'1.II. Gobierno Cercano y Moderno',7,1),(24,'1.III. Perspectiva de Género',7,1),(25,'2.1.1. Asegurar una alimentación y nutrición adecuada de los mexicanos, en particular para aquellos en extrema pobreza o con carencia alimentaria severa.',8,2),(26,'2.1.2. Fortalecer el desarrollo de capacidades en los hogares con carencias para contribuir a mejorar su calidad de vida e incrementar su capacidad productiva.',8,2),(27,'2.1.3. Garantizar y acreditar fehacientemente la identidad de las personas.',8,2),(28,'2.2.1. Generar esquemas de desarrollo comunitario a través de procesos de participación social.',9,2),(29,'2.2.2. Articular políticas que atiendan de manera específica cada etapa del ciclo de vida de la población.',9,2),(30,'2.2.3. Fomentar el bienestar de los pueblos y comunidades indígenas, fortaleciendo su proceso de desarrollo social y económico, respetando las manifestaciones de su cultura y el ejercicio de sus derechos.',9,2),(31,'2.2.4. Proteger los derechos de las personas con discapacidad y contribuir a su desarrollo integral e inclusión plena.',9,2),(32,'2.3.1. Avanzar en la construcción de un Sistema Nacional de Salud Universal.',10,2),(33,'2.3.2. Hacer de las acciones de protección, promoción y prevención un eje prioritario para el mejoramiento de la salud.',10,2),(34,'2.3.3. Mejorar la atención de la salud a la población en situación de vulnerabilidad.',10,2),(35,'2.3.4. Garantizar el acceso efectivo a servicios de salud de calidad.',10,2),(36,'2.3.5. Promover la cooperación internacional en salud.',10,2),(37,'2.4.1. Proteger a la sociedad ante eventualidades que afecten el ejercicio pleno de sus derechos sociales.',11,2),(38,'2.4.2. Promover la cobertura universal de servicios de seguridad social en la población.',11,2),(39,'2.4.3. Instrumentar una gestión financiera de los organismos de seguridad social que garantice la sustentabilidad del Sistema de Seguridad Social en el mediano y largo plazos.',11,2),(40,'2.5.1. Transitar hacia un Modelo de Desarrollo Urbano Sustentable e Inteligente que procure vivienda digna para los mexicanos.',12,2),(41,'2.5.2. Reducir de manera responsable el rezago de vivienda a través del mejoramiento y ampliación de la vivienda existente y el fomento de la adquisición de vivienda nueva.',12,2),(42,'2.5.3. Lograr una mayor y mejor coordinación interinstitucional que garantice la concurrencia y corresponsabilidad de los tres órdenes de gobierno, para el ordenamiento sustentable del territorio, así como para el impulso al desarrollo regional, urbano, metropolitano y de vivienda.',12,2),(43,'2.I. Democratizar la productividad',13,2),(44,'2.II Gobierno Cercano y Moderno',13,2),(45,'2.III Perspectiva de Género',13,2),(46,'3.1.1. Establecer un sistema de profesionalización docente que promueva la formación, selección, actualización y evaluación del personal docente y de apoyo técnico-pedagógico.',14,3),(47,'3.1.2. Modernizar la infraestructura y el equipamiento de los centros educativos.',14,3),(48,'3.1.3. Garantizar que los planes y programas de estudio sean pertinentes y contribuyan a que los estudiantes puedan avanzar exitosamente en su trayectoria educativa, al tiempo que desarrollen aprendizajes significativos y competencias que les sirvan a lo largo de la vida.',14,3),(49,'3.1.4. Promover la incorporación de las nuevas tecnologías de la información y comunicación en el proceso de enseñanza-aprendizaje.',14,3),(50,'3.1.5. Disminuir el abandono escolar, mejorar la eficiencia terminal en cada nivel educativo y aumentar las tasas de transición entre un nivel y otro.',14,3),(51,'3.1.6. Impulsar un Sistema Nacional de Evaluación que ordene, articule y racionalice los elementos y ejercicios de medición y evaluación de la educación.',14,3),(52,'3.2.1. Ampliar las oportunidades de acceso a la educación en todas las regiones y sectores de la población.',15,3),(53,'3.2.2. Ampliar los apoyos a niños y jóvenes en situación de desventaja ovulnerabilidad.',15,3),(54,'3.2.3. Crear nuevos servicios educativos, ampliar los existentes y aprovechar la capacidad instalada de los planteles.',15,3),(55,'3.3.1. Situar a la cultura entre los servicios básicos brindados a la población como forma de favorecer la cohesión social.',16,3),(56,'3.3.2. Asegurar las condiciones para que la infraestructura cultural permita disponer de espacios adecuados para la difusión de la cultura en todo el país.',16,3),(57,'3.3.3. Proteger y preservar el patrimonio cultural nacional.',16,3),(58,'3.3.4. Fomentar el desarrollo cultural del país a través del apoyo a industrias culturales y vinculando la inversión en cultura con otras actividades productivas.',16,3),(59,'3.3.5. Posibilitar el acceso universal a la cultura mediante el uso de las tecnologías de la información y la comunicación, y del establecimiento de una Agenda Digital de Cultura en el marco de la Estrategia Digital Nacional.',16,3),(60,'3.4.1. Crear un programa de infraestructura deportiva.',17,3),(61,'3.4.2. Diseñar programas de actividad física y deporte diferenciados para atender las diversas necesidades de la población.',17,3),(62,'3.5.1. Contribuir a que la inversión nacional en investigación científica y desarrollo tecnológico crezca anualmente y alcance un nivel de 1% del PIB.',18,3),(63,'3.5.2. Contribuir a la formación y fortalecimiento del capital humano de alto nivel.',18,3),(64,'3.5.3. Impulsar el desarrollo de las vocaciones y capacidades científicas, tecnológicas y de innovación locales, para fortalecer el desarrollo regional sustentable e incluyente.',18,3),(65,'3.5.4. Contribuir a la transferencia y aprovechamiento del conocimiento, vinculando a las instituciones de educación superior y los centros de investigación con los sectores público, social y privado.',18,3),(66,'3.5.5. Contribuir al fortalecimiento de la infraestructura científica y tecnológica del país.',18,3),(67,'3.I. Democratizar la Productividad',19,3),(68,'3.II Gobierno Cercano y Moderno',19,3),(69,'3.III Perspectiva de Género',19,3),(70,'4.1.1. Proteger las finanzas públicas ante riesgos del entorno macroeconómico.',20,4),(71,'4.1.2. Fortalecer los ingresos del sector público.',20,4),(72,'4.1.3. Promover un ejercicio eficiente de los recursos presupuestarios disponibles, que permita generar ahorros para fortalecer los programas prioritarios de las dependencias y entidades.',20,4),(73,'4.2.1. Promover el financiamiento a través de instituciones financieras y del mercado de valores.',21,4),(74,'4.2.2. Ampliar la cobertura del sistema financiero hacia un mayor número de personas y empresas en México, en particular para los segmentos de la población actualmente excluidos.',21,4),(75,'4.2.3 Mantener la estabilidad que permita el desarrollo ordenado del sistema financiero, incluyendo los sectores de aseguramiento y ahorro para el retiro',21,4),(76,'4.2.4 Ampliar el acceso al crédito y a otros servicios financieros, a través de la Banca de Desarrollo, a actores económicos en sectores estratégicos Prioritarios con dificultades para disponer de los mismos, con especial énfasis en áreas prioritarias para el desarrollo nacional, como la infraestructura, las pequeñas y medianas empresas, además de la innovación y la creación de patentes, completando mercados y fomentando la participación del sector privado sin desplazarlo.',21,4),(77,'4.2.5 Promover la participación del sector privado en el desarrollo de infraestructura, articulando la participación de los gobiernos estatales y municipales para impulsar proyectos de alto beneficio social, que contribuyan a incrementar la cobertura y calidad de la infraestructura necesaria para elevar la productividad de la economía.',21,4),(78,'4.3.1 Procurar el equilibrio entre los factores de la producción para preservar la paz laboral',22,4),(79,'4.3.2 Promover el trabajo digno o decente.',22,4),(80,'4.3.3 Promover el incremento de la productividad con beneficios compartidos, la empleabilidad y la capacitación en el trabajo',22,4),(81,'4.3.4 Perfeccionar los sistemas y procedimientos de protección de los derechos del trabajador',22,4),(82,'4.4.1 implementar una política integralo de desarrollo que vincule la sustentabilidad ambiental con costos y beneficios para la sociedad',23,4),(83,'4.4.2 Implementar un manejo sustentable del agua, haciendo posible que todos los mexicanos tengan acceso a ese recurso',23,4),(84,'4.4.3 Fortalecer la política nacional de cambio climático y cuidado al medio ambiente para transitar hacia una economía competitiva, sustentable, resiliente y de bajo carbono.',23,4),(85,'4.4.4 Proteger el patrimonio natural',23,4),(86,'4.5.1 Impulsar el desarrollo e innovación tecnológica de las telecomunicaciones que amplíe la cobertura y accesibilidad para impulsar mejores servicios y promover la competencia, buscando la reducción de costos y la eficiencia de las comunicaciones.',24,4),(87,'4.6.1 Asegurar el abastecimiento de petróleo crudo, gas natural y petrolíferos que demanda el país.',25,4),(88,'4.6.2 Asegurar el abastecimiento racional de energía eléctrica a lo largo del país',25,4),(89,'4.7.1 Apuntalar la competencia en el mercado interno',26,4),(90,'4.7.2 Implementar una mejora reguladora integral',26,4),(91,'4.7.3 Fortalecer el sistema de normalización y evaluación de conformidad con las normas',26,4),(92,'4.7.4 Promover mayores niveles de inversión a través de un regulación apropiada y una promoción eficiente',26,4),(93,'4.7.5 Proteger los derechos del consumidor, mejorar la información de mercados y garantizar el derecho a la realización de operaciones comerciales claras y Seguras.',26,4),(94,'4.8.1 Reactivar una política de fomento económico enfocada en incrementar la productividad de los sectores dinámicos y tradicionales de la economía mexicana, de manera regional y sectorialmente equilibrada',27,4),(95,'4.8.2 Promover mayores niveles de inversión y competitividad en el sector minero',27,4),(96,'4.8.3 Orientar y hacer más eficiente el gasto público para fortalecer el mercado interno',27,4),(97,'4.8.4 Impulsar a los emprendedores y fortalecer a las micro, pequeñas y medianas empresas',27,4),(98,'4.8.5 Fomentar la economía social',27,4),(99,'4.9.1 modernizar, ampliar y conservar la infraestructura de los diferentes modos de transporte, así como mejorar su conectividad bajo criterios estratégicos y de eficiencia',28,4),(100,'4.10.1 Impulsar la productividad en el sector agroalimentario mediante la inversión en el desarrollo de capital físico, humano y tecnológico',29,4),(101,'4.10.2 Impulsar modelos de asociación que generen economías de escala y mayor valor agregado de los productores del sector agroalimentario.',29,4),(102,'4.10.3 Promover mayor certidumbre en la actividad agroalimentaria mediante mecanismos de administración de riesgos.',29,4),(103,'4.10.4 Impulsar el aprovechamiento sustentable de los recursos naturales del país',29,4),(104,'4.10.5 Modernizar el marco normativo e institucional para impulsar un sector agroalimentario productivo y competitivo.',29,4),(105,'4.11.1 Impulsar el ordenamiento y la transformación del sector turístico.',30,4),(106,'4.11.2 Impulsar la innovación de la oferta y elevar la competitividad del sector Turístico.',30,4),(107,'4.11.3 Fomentar un mayor flujo de inversiones y financiamiento en el sector turismo y la promoción eficaz de los destinos turísticos.',30,4),(108,'4.11.4 Impulsar la sustentabilidad y que los ingresos generados por el turismo sean fuente de bienestar social.',30,4),(109,'4.I Democratizar la Productividad',31,4),(110,'4.II. Gobierno Cernano y Moderno',31,4),(111,'4.III Perspectiva de Género',31,4),(112,'5.1.1 Consolidar la relación con Estados Unidos y Canadá a partir de una visión integral y de largo plazo que promueva la competitividad y la convergencia en la región, sobre la base de las complementariedades existentes.',32,5),(113,'5.1.2 Consolidar la posición de México como un actor regional relevante, mediante la profundización de los procesos de integración en marcha y la ampliación del diálogo y la cooperación con los países de América Latina y el Caribe.',32,5),(114,'5.1.3 Consolidar las relaciones con los países europeos sobre la base de valores y objetivos comunes, a fin de ampliar los vínculos políticos, comerciales y de cooperación.',32,5),(115,'5.1.4 Consolidar a Asia-Pacífico como región clave en la diversificación de los vínculos económicos de México con el exterior y participar activamente en los foros regionales.',32,5),(116,'5.1.5 Aprovechar las oportunidades que presenta el sistema internacional actual para fortalecer los lazos comerciales y políticos con los países de Medio Oriente y áfrica.',32,5),(117,'5.1.6 Consolidar el papel de México como un actor responsable, activo y comprometido en el ámbito multilateral, impulsando de manera prioritaria temas estratégicos de beneficio global y compatibles con el interés Nacional.',32,5),(118,'5.1.7 Impulsar una vigorosa política de cooperación internacional que contribuya tanto al desarrollo de México como al desarrollo y estabilidad de otros países, como un elemento esencial del papel de México como actor global Responsable.',32,5),(119,'5.2.1 Consolidar la red de representaciones de México en el exterior, como un instrumento eficaz de difusión y promoción económica, turística y cultural coordinada y eficiente que derive en beneficios cuantificables para el país.',33,5),(120,'5.2.2 Definir agendas en materia de diplomacia pública y cultural que permitan mejorar la imagen de México en el exterior, lo cual incrementará los flujos de comercio, inversión y turismo para elevar y democratizar la productividad a nivel regional y sectorial.',33,5),(121,'5.3.1 Impulsar y profundizar la política de apertura comercial para incentivar la participación de México en la economía global.',34,5),(122,'5.3.2 Fomentar la integración regional de México, estableciendo acuerdos económicos estratégicos y profundizando los ya existentes.',34,5),(123,'5.4.1 Ofrecer asistencia y protección consular a todos aquellos mexicanos que lo requieran.',35,5),(124,'5.4.2 Crear mecanismos para la reinserción de las personas migrantes de retorno y fortalecer los programas de repatriación.',35,5),(125,'5.4.3 Facilitar la movilidad internacional de personas en beneficio del desarrollo Nacional.',35,5),(126,'5.4.4 Diseñar mecanismos de coordinación interinstitucional y multisectorial, para el diseño, implementación, seguimiento y evaluación de la política pública en materia migratoria.',35,5),(127,'5.4.5 Garantizar los derechos de las personas migrantes, solicitantes de refugio, refugiadas y beneficiarias de protección complementaria.',35,5),(128,'5.I. Democratizar la Productividad',36,5),(129,'5.II Gobierno Cercano y Moderno',36,5),(130,'5.III Perspectiva de Género',36,5),(131,'No Aplica',37,6);
/*!40000 ALTER TABLE `pnd_estrategias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pnd_lineas_accion`
--

DROP TABLE IF EXISTS `pnd_lineas_accion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pnd_lineas_accion` (
  `id_pnd_linea_accion` smallint(3) NOT NULL AUTO_INCREMENT,
  `linea_accion` text,
  `id_pnd_eje` tinyint(1) DEFAULT NULL,
  `id_pnd_objetivo` tinyint(2) DEFAULT NULL,
  `id_pnd_estrategia` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`id_pnd_linea_accion`),
  KEY `id_pnd_eje` (`id_pnd_eje`),
  KEY `id_pnd_objetivo` (`id_pnd_objetivo`),
  KEY `id_pnd_estrategia` (`id_pnd_estrategia`),
  CONSTRAINT `pnd_linea_eje` FOREIGN KEY (`id_pnd_eje`) REFERENCES `pnd_ejes` (`id_pnd_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pnd_linea_estrategias` FOREIGN KEY (`id_pnd_estrategia`) REFERENCES `pnd_estrategias` (`id_pnd_estrategia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pnd_linea_objetivo` FOREIGN KEY (`id_pnd_objetivo`) REFERENCES `pnd_objetivos` (`id_pnd_objetivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=816 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pnd_lineas_accion`
--

LOCK TABLES `pnd_lineas_accion` WRITE;
/*!40000 ALTER TABLE `pnd_lineas_accion` DISABLE KEYS */;
INSERT INTO `pnd_lineas_accion` VALUES (1,'1.1.1.1 Impulsar el respeto a los derechos políticos de los ciudadanos, para fortalecer la democracia y contribuir a su desarrollo',1,1,1),(2,'1.1.1.1 Impulsar el respeto a los derechos políticos de los ciudadanos, para fortalecer la democracia y contribuir a su desarrollo',1,1,1),(3,'1.1.1.2 Alentar acciones que promuevan la construcción de la ciudadanía como un eje de la relación entre el Estado y la sociedad',1,1,1),(4,'1.1.1.3 Difundir campañas que contribuyan al fortalecimiento de los valores y principios democráticos',1,1,1),(5,'1.1.1.4 Mantener una relación de colaboración, respeto y comunicación con los Poderes de la Unión',1,1,1),(6,'1.1.1.5 Coordinar con gobiernos estatales la instrumentación de acciones para el fortalecimiento y promoción de los derechos humanos',1,1,1),(7,'1.1.1.6 Emitir lineamientos para el impulso y la conformación, organización y funcionamiento de los mecanismos de participación ciudadana de las dependencias y entidades de la Administración Pública Federal',1,1,1),(8,'1.1.1.7 Promover convenios de colaboración para el fomento y la promoción de la cultura cívica entre los tres órdenes de gobierno',1,1,1),(9,'1.1.2.1 Establecer mecanismos de enlace y diálogo permanentes con los Poderes Legislativo y Judicial, así como con las organizaciones políticas nacionales para consolidar una relación respetuosa y eficaz.',1,1,2),(10,'1.1.2.2 Construir una agenda legislativa nacional incluyente que refleje los temas que son del interés de los diversos grupos y organizaciones de la sociedad.',1,1,2),(11,'1.1.2.3 Promover consensos y acuerdos con el Poder Legislativo Federal, con sus Cámaras y con los grupos parlamentarios que las integran, para impulsar la agenda legislativa.',1,1,2),(12,'1.1.2.4 Diseñar, promover y construir acuerdos con organizaciones políticas que puedan derivar en proyectos legislativos, para impulsar las reformas que el país requiere y dar seguimiento a su cumplimiento.',1,1,2),(13,'1.1.3.1 Impulsar la inclusión y participación efectiva de los gobiernos estatales y municipales en las distintas instancias de acuerdo y toma de decisiones de las políticas públicas nacionales, como el Sistema Nacional de Coordinación Fiscal, el Sistema Nacional de Salud y el Sistema Nacional de Desarrollo Social, entre otros.',1,1,3),(14,'1.1.3.2 Promover la firma de Convenios únicos de Coordinación para el Desarrollo, que definan con claridad la articulación de esfuerzos entre los distintos órdenes de gobierno.',1,1,3),(15,'1.1.3.3 Diseñar e implementar un programa que dirija las acciones a favor de la descentralización y el fortalecimiento institucional de los gobiernos estatales y municipales.',1,1,3),(16,'1.1.3.4 Impulsar, mediante estudios e investigaciones, estrategias e iniciativas de ley que clarifiquen los ámbitos competenciales y de responsabilidad de cada orden de gobierno y sustenten la redistribución de competencias de la Federación hacia las entidades federativas y los municipios.',1,1,3),(17,'1.1.3.5 Promover el desarrollo de capacidades institucionales y modelos de gestión para lograr administraciones públicas estatales y municipales efectivas.',1,1,3),(18,'1.1.4.1 Establecer acciones coordinadas para la identificación y monitoreo de posibles conflictos sociales, fijando criterios y mecanismos para el seguimiento de variables y el mapeo de actores y conflictos.',1,1,4),(19,'1.1.4.2 Promover la resolución de conflictos mediante el diálogo abierto y constructivo, y atender oportunamente las demandas legítimas de la sociedad.',1,1,4),(20,'1.1.4.3 Garantizar a los ciudadanos mexicanos el ejercicio de su libertad de creencia, como parte de la paz social.',1,1,4),(21,'1.1.4.4 Garantizar y promover el respeto a los principios y prácticas de la laicidad del Estado, reconociendo la pluralidad religiosa para alcanzar la paz social.',1,1,4),(22,'1.1.4.5 Impulsar un Acuerdo Nacional para el Bienestar, el Respeto y el Progreso de los Pueblos Indígenas de México, que contemple los instrumentos necesarios para su implementación.',1,1,4),(23,'1.1.5.1 Promover una regulación de los contenidos de campañas publicitarias públicas y privadas, a fin de propiciar el pleno respeto de las libertades y derechos de las personas.',1,1,5),(24,'1.1.5.2 Establecer una estrategia de comunicación coordinada en materia de seguridad pública, que refleje la profesionalidad de los cuerpos de seguridad, así como un mensaje claro y consistente en la materia.',1,1,5),(25,'1.1.5.3 Utilizar los medios de comunicación como agentes que contribuyan a eliminar la discriminación y confrontación social, por medio de campañas que transmitan contenidos que fomenten la inclusión social y laboral, de manera que enaltezcan los valores de las comunidades indígenas y el derecho a la igualdad de las personas con discapacidad en la sociedad.',1,1,5),(26,'1.1.5.4 Vigilar que las transmisiones cumplan con las disposiciones de la Ley Federal de Radio y Televisión, sus respectivos reglamentos y títulos de concesión, e imponer las sanciones que correspondan por su incumplimiento.',1,1,5),(27,'1.1.5.5 Generar políticas públicas que permitan la inclusión de los pueblos indígenas en los medios de comunicación, y considerarlos en el desarrollo de los Lineamientos Generales para las Campañas de Comunicación Social de las dependencias y entidades de la Administración Pública Federal.',1,1,5),(28,'1.2.1.1 Impulsar la creación de instancias de coordinación interinstitucional para la generación de estudios, investigaciones y proyectos, que den sustento a la definición de la Política General de Seguridad Nacional que identifique las vocaciones y fortalezas nacionales, así como los intereses estratégicos de México en el entorno global.',1,2,6),(29,'1.2.1.2 Impulsar mecanismos de concertación de acciones nacionales que permitan la construcción y desarrollo de las condiciones que mantengan vigente el proyecto nacional, a fin de generar una posición estratégica del país en el ámbito global.',1,2,6),(30,'1.2.1.3 Promover esquemas de coordinación y cooperación nacional e internacional que permitan un cumplimiento eficiente y eficaz de las tareas de Seguridad Nacional, con pleno respeto a la soberaía nacional, al Pacto Federal, así como a los derechos humanos',1,2,6),(31,'1.2.1.4 Impulsar el desarrollo del marco jurídico en materia de Seguridad Nacional, que fortalezca las capacidades de las instituciones del Estado y de su personal con funciones relacionadas con la preservación de la integridad, estabilidad y permanencia del Estado Mexicano, en el marco de un Estado democrático y de Derecho.',1,2,6),(32,'1.2.1.5 Establecer canales adecuados de comunicación con la ciudadanía que permitan su participación corresponsable en la preservación de la Seguridad Nacional, así como promover la difusión de una Cultura de Seguridad Nacional.',1,2,6),(33,'1.2.1.6 Fortalecer a la inteligencia civil como un órgano de fusión de las inteligencias especializadas del Estado Mexicano.',1,2,6),(34,'1.2.2.1 Impulsar la creación de instrumentos jurídicos que fortalezcan el sustento legal a la actuación de las Fuerzas Armadas en actividades de defensa exterior y seguridad interior.',1,2,7),(35,'1.2.2.2 Adecuar la División Territorial Militar, Naval y Aérea a la situación política, económica, social y militar que prevalezca en el país, para mantener presencia en todo el territorio nacional.',1,2,7),(36,'1.2.2.3 Fortalecer las actividades militares en los ámbitos terrestre, aéreo y marítimo en el territorio y Zonas Marinas Mexicanas, para garantizar la integridad, estabilidad y permanencia del Estado Mexicano.',1,2,7),(37,'1.2.2.4 Desarrollar operaciones coordinadas en los puntos neurálgicos del país, en coadyuvancia con las fuerzas policiacas, cuando el mando supremo lo ordene.',1,2,7),(38,'1.2.2.5 Impulsar la coordinación con entidades paraestatales responsables de instalaciones estratégicas nacionales, para determinar prioridades y situación particular de cada instalación.',1,2,7),(39,'1.2.2.6 Coadyuvar con las instancias de seguridad pública de los tres ámbitos de gobierno para reducir la violencia hasta la total consolidación y reestructuración de las policías.',1,2,7),(40,'1.2.2.7 Impulsar y participar en mecanismos o iniciativas de Seguridad Nacional e Internacional en los principales foros regionales y globales, para contribuir a garantizar la paz y la seguridad en México.',1,2,7),(41,'1.2.3.1 Integrar una agenda de Seguridad Nacional que identifique las amenazas y riesgos de carácter nacional e internacional, que pretendan atentar en contra de los objetivos e intereses nacionales estratégicos, así como generar los esquemas estratégicos de prevención y de reacción, con base en sus causas estructurales.',1,2,8),(42,'1.2.3.2 Impulsar la creación de instrumentos jurídicos que fortalezcan el sustento legal, así como las capacidades legítimas de las autoridades federales civiles y militares en actividades de inteligencia.',1,2,8),(43,'1.2.3.3 Impulsar, mediante la realización de estudios e investigaciones, iniciativas de ley que den sustento a las actividades de inteligencia civil, militar y naval, para fortalecer la cuarta dimensión de operaciones de seguridad: ciberespacio y ciberseguridad.',1,2,8),(44,'1.2.3.4 Diseñar y operar un Sistema Nacional de Inteligencia Civil, que permita contar oportunamente con información para la producción eficiente y oportuna de inteligencia estratégica para la Seguridad Nacional; así como, en su caso, diseñar e implementar sistemas de interconexión de bases de datos nacionales para el acceso legítimo a información útil que eficiente el ejercicio de las atribuciones de las autoridades del país.',1,2,8),(45,'1.2.3.5 Fortalecer el Sistema de Inteligencia Militar y el Sistema de Inteligencia Naval, para integrarlos con diversas dependencias de la Administración Pública Federal.',1,2,8),(46,'1.2.3.6 Promover, con las instancias de la Administración Pública Federal y las Fuerzas Armadas, una doctrina de inteligencia que unifique los procedimientos de inteligencia de las instancias de Seguridad Nacional del Estado Mexicano.',1,2,8),(47,'1.2.3.7 Coadyuvar en la identificación, prevención, desactivación y contención de riesgos y amenazas a la Seguridad Nacional.',1,2,8),(48,'1.2.3.8 Diseñar e impulsar una estrategia de seguridad de la información, a efecto de garantizar la integridad, confidencialidad y disponibilidad de la información de las personas e instituciones públicas y privadas en México.',1,2,8),(49,'1.2.3.9 Establecer un Sistema de Vigilancia Aérea, Marítima y Terrestre que contemple el uso de medios electrónicos en áreas estratégicas.',1,2,8),(50,'1.2.3.10 Fortalecer la seguridad de nuestras fronteras.',1,2,8),(51,'1.2.4.1 Fortalecer las capacidades de las Fuerzas Armadas con infraestructura, tecnología de punta y modernización de los pertrechos castrenses.',1,2,9),(52,'1.2.4.2 Contribuir en la atención de necesidades sociales prioritarias, obras de infraestructura, procesos sustentables y el fortalecimiento de la identidad nacional.',1,2,9),(53,'1.2.4.3 Fortalecer el Sistema de Búsqueda y Rescate Marítimo.',1,2,9),(54,'1.2.4.4 Fortalecer el Sistema de Mando y Control de la Armada de México.',1,2,9),(55,'1.2.4.5 Continuar con el programa de sustitución de buques y construcción de unidades de superficie.',1,2,9),(56,'1.2.4.6 Fortalecer la capacidad de apoyo aéreo a las operaciones de la Armada de México.',1,2,9),(57,'1.2.5.1 Realizar cambios sustantivos en el Sistema Educativo Militar y Sistema Educativo Naval, para alcanzar la excelencia académica y fortalecer el adiestramiento, la doctrina militar, la investigación científica y el desarrollo tecnológico.',1,2,10),(58,'1.2.5.2 Construir y adecuar la infraestructura, instalaciones y equipamiento militares y navales, procurando que, en su caso, se promueva el desarrollo de la industria nacional (por ejemplo, la industria naval).',1,2,10),(59,'1.2.5.3 Fortalecer el marco legal en materia de protección marítima y portuaria.',1,2,10),(60,'1.2.5.4 Mejorar la seguridad social de los integrantes de las Fuerzas Armadas, a través de acciones que eleven la moral y la calidad de vida del personal militar y naval.',1,2,10),(61,'1.2.5.5 Impulsar reformas legales que fortalezcan el desarrollo y bienestar social de las Fuerzas Armadas.',1,2,10),(62,'1.2.5.6 Fortalecer y modernizar el Servicio de Policía Naval.',1,2,10),(63,'1.3.1.1 Coordinar la estrategia nacional para reducir los índices de violencia, a partir de las causas y en función de las variables que propician las conductas antisociales, así como de la suma de los esfuerzos de organizaciones sociales, participación ciudadana, sector académico y de especialistas.',1,3,11),(64,'1.3.1.2 Aplicar una campaña de comunicación en materia de prevención del delito y combate a la inseguridad.',1,3,11),(65,'1.3.1.3 Dar seguimiento y evaluación de las acciones de la Comisión Intersecretarial para la Prevención Social de la Violencia y la Delincuencia.',1,3,11),(66,'1.3.1.4 Crear y desarrollar instrumentos validados y de procedimientos para la prevención y detección temprana de actos y condiciones que puedan auspiciar la comisión de delitos que afecten el funcionamiento del sistema social.',1,3,11),(67,'1.3.1.5 Implementar y dar seguimiento a mecanismos de prevención y detección de actos, omisiones y operaciones que pudieran favorecer la comisión de los delitos de lavado de dinero y financiamiento al terrorismo, a través de la recepción, análisis y diseminación de los reportes de operaciones que emitan las instituciones financieras y demás personas obligadas a ello.',1,3,11),(68,'1.3.1.6 Garantizar condiciones para la existencia de mayor seguridad y justicia para los pueblos indígenas, mediante el diseño de una estrategia integral que contemple la seguridad de los habitantes de las zonas en que exis te delincuencia organizada; el servicio de traductores y defensores de oficio que hablen lenguas autóctonas, que estén capacitados en los ámbitos de administración y procuración de justicia, y que garanticen a los procesados el respeto a los derechos humanos.',1,3,11),(69,'1.3.2.1 Reorganizar la Policía Federal hacia un esquema de proximidad y cercanía',1,3,12),(70,'1.3.2.2 Establecer una coordinación efectiva entre instancias y órdenes de gobierno en materia de seguridad',1,3,12),(71,'1.3.2.3 Generar información y comunicaciones oportunas y de calidad para mejorar la seguridad',1,3,12),(72,'1.3.2.4 Orientar la planeación en seguridad hacia un enfoque de resultados, transparente y sujeto a la rendición de cuentas',1,3,12),(73,'1.3.2.5 Promover en el Sistema Penitenciario Nacional la reinserción social efectiva',1,3,12),(74,'1.4.1.1 Proponer las reformas legales en las áreas que contribuyan a la efectiva implementación del Sistema de Justicia Penal Acusatorio',1,4,13),(75,'1.4.1.2 Diseñar y ejecutar las adecuaciones normativas y orgánicas en el área de competencia de la Procuraduría General de la República, para investigar y perseguir el delito con mayor eficacia',1,4,13),(76,'1.4.1.3 Consolidar los procesos de formación, capacitación, actualización especialización y desarrollo de los agentes del Ministerio Público Federal, peritos profesionales y técnicos, policías federales, intérpretes, traductores, especialistas en justicia restaurativa y demás operadores del sistema',1,4,13),(77,'1.4.1.4 Rediseñar y actualizar los protocolos de actuación para el personal sustantivo',1,4,13),(78,'1.4.1.5 Capacitar a los operadores del Sistema de Justicia Penal en materia de derechos humanos',1,4,13),(79,'1.4.1.6 Implantar un Nuevo Modelo de Operación Insitucional en seguridad pública y procuración de justicia, que genere mayor capacidad de probar los delitos',1,4,13),(80,'1.4.1.7 Implementar un sistema de información institucional único, que permita la integración de las diferentes bases de datos existentes',1,4,13),(81,'1.4.1.8 Rediseñar el servicio de carrera de los operadores del Sistema de Justicia Penal',1,4,13),(82,'1.4.1.9 Proporcionar asistencia y representación eficaz a las víctimas con perspectiva de derechos humanos',1,4,13),(83,'1.4.2.1 Proponer las reformas constitucionales y legales que permitan la expedición de un Código de Procedimientos Penales único y una Ley General Penal',1,4,14),(84,'1.4.2.2 Establecer un programa en materia de desarrollo tecnológico que dote de infraestructura de vanguardia a la Procuraduría General de la República',1,4,14),(85,'1.4.2.3 Coadyuvar en la definición de una nueva política de tratados, a fin de suscribir la firma de instrumentos internacionales que reporten mayores beneficios al país en materia de procuración de justicia',1,4,14),(86,'1.4.2.4 Desarrollar un nuevo esquema de despliegue regional, así como de especializaciñon en el combate a delitos',1,4,14),(87,'1.4.2.5 Robustecer el papel de la Procuraduría General de la República como representante de la Federación y garante de la constitucionalidad de normas generales y actos de autoridad en los procesos constitucionales',1,4,14),(88,'1.4.2.6 Mejorar la calidad de la investigación de hechos delictivos para generar evidencias sólidas que, a su vez, cuenten con soporte científico y sustento legal',1,4,14),(89,'1.4.3.1 Promover la creación de un organismo autónomo especializado encargado de aplicar la legislación sobre responsabilidades administrativas de los servidores públicos tratándose de actos de corrupción, así como de coadyuvar en la persecución de los delitos relacionados con dichos actos',1,4,15),(90,'1.4.3.2 Desarrollar criterios de selección  evaluación del desempeño y competencias profesionales',1,4,15),(91,'1.4.3.3 Mejorar los procesos de vigilancia en relación con la actuación del personal',1,4,15),(92,'1.4.3.4 Transparentar la actuación ministerial ante la ciudadanía y robustecer los mecanismos de vinculación ',1,4,15),(93,'1.4.3.5 Fortalecer los mecanismos de coordinación entre las diferentes instancias y autoridades de la Administración Pública Federal responsables del combate a la corrupción, en el marco del cumplimiento a los compromisos internacionales firmados por México',1,4,15),(94,'1.5.1.1 Establecer un programa dirigido a la promoción y defensa de los derechos humanos, incluyendo los derechos civiles, políticos, económicos, sociales, culturales y ambientales',1,5,16),(95,'1.5.1.2 Promover la implementación de los principios constitucionales en materia de reconocimiento y protección de derechos humanos',1,5,16),(96,'1.5.1.3 Promover mecanismos de coordinación con las dependencis y entidades de la Administración Pública Federal, para lograr mayor incidencia en las políticas públicas de derechos humanos',1,5,16),(97,'1.5.1.4 Establecer mecanismos de colaboración para promover políticas de derechos humanos con todas las autoridades del país',1,5,16),(98,'1.5.1.5 Promover adecuaciones al ordenamiento jurídico nacional, para fortalecer el marco de protección y defensa de los derechos humanos',1,5,16),(99,'1.5.1.6 Generar información que favorezca la localización de personas desaparecidas',1,5,16),(100,'1.5.1.7 Actualizar, sensibilizar y estandarizar los niveles de conocimiento y práctica de los servidores públicos federales en materia de derechos humanos',1,5,16),(101,'1.5.1.8 Promover acciones para la difusión del conocimiento y práctica de los derechos humanos',1,5,16),(102,'1.5.1.9 Promover los protocolos de respeto a los derechos humanos en la actuación de las Fuerzas Armadas y las policías de todo el país',1,5,16),(103,'1.5.1.10 Dar cumplimiento a las recomendaciones y sentencias de los organismos nacionales e internacionales de derechos humanos y promover una política pública de prevención a violaciones de derechos humanos',1,5,16),(104,'1.5.1.11 Impulsar la inclusión de los derechos humanmos en los contenidos educativos a nivel nacional',1,5,16),(105,'1.5.1.12 Fortalecer los mecanismos de protección de defensores de derechos humanos y de periodistas',1,5,16),(106,'1.5.2.1 Prohibir y sancionar efectivamente todas las formas de violencia contra los niños, niñas y adolescentes, así como asegurar que los niños y las niñas que la han sufrido no sean victimizados en el marco de los proceso de justicia y atención institucional',1,5,17),(107,'1.5.2.2 Priorizar la prevención de la violencia contra los niños, niñas y adolescentes, abordando sus causas subyacentes y factores de riesgo integralmente',1,5,17),(108,'1.5.2.3 Crear sistemas de denuncia accesibles y adecuados para que los niños, niñas y adolescentes, sus representantes u otras personas, denuncias de manera segura y confidencial toda forma de violencia',1,5,17),(109,'1.5.2.4 Promover la recopilación de datos de todas las formas de violencia contra los niños, niñas y adolescentes, que asegure un monitoreo, evaluación y retroalimentación sistemática',1,5,17),(110,'1.5.3.1 Coadyuvar en el funcionamiento del Sistema Nacional de Atención a Víctimas en el marco de la Ley General de Víctimas',1,5,18),(111,'1.5.3.2 Promover el cumplimiento de la obligación de reparación del daño a las víctimas del delito y de violaciones de derechos humanos',1,5,18),(112,'1.5.3.3 Fortalecer el establecimiento en todo el país de los medios alternativos de solución de controversias',1,5,18),(113,'1.5.3.4 Establecer mecanismos que permitan al órgano de asistencia jurídica federal de atención víctimas, proporcionar sus servicios en forma estandarizada, organizada y coordinada',1,5,18),(114,'1.5.3.5 Promover la participación y establecer mecanismos de coordinación con instituciones públicas y privadas que intervienen en la prestación de servicios a víctimas directas e indirectas',1,5,18),(115,'1.5.4.1 Promover la armonización del marco jurídico de conformidad con los prinicipios constitucionales de igualdad y no discriminación',1,5,19),(116,'1.5.4.2 Promover acciones afirmativas dirigidas a generar condiciones de igualdad y a evitar la discrimininación de personas o grupos',1,5,19),(117,'1.5.4.3 Fortalacer los mecanismos competentes para prevenir y sancionar la discriminación',1,5,19),(118,'1.5.4.4 Promover acciones concertadas dirigidas a propiciar un cambio cultural en materia de igualdad y no discriminación',1,5,19),(119,'1.5.4.5 Promover el enfoque de derechos humanos y no discriminación en las actuaciones de las dependencias y entidades de la Administración Pública Federal',1,5,19),(120,'1.5.4.6 Promover una legislación acorde a la Convención sobre los Derechos de las Personas con Discapacidad',1,5,19),(121,'1.6.1.1 Promover y consolidar la elaboración de un Atlas Nacional de Riesgos a nivel federal, estatal y municipal, asegurando su homogeneidad',1,6,20),(122,'1.6.1.2 Impulsar la Gestión Integral del Riesgo como una política integral en los tres órdenes de gobierno, con la participación de los sectores privado y social',1,6,20),(123,'1.6.1.3 Fomentar la cultura de protección civil y la autoprotección',1,6,20),(124,'1.6.1.4 Fortalecer los instrumentos financieros de gestión del riesgo, privilegiando la prevención y fortaleciendo la atención y reconstrucción en casos de emergencias y desastres',1,6,20),(125,'1.6.1.5 Promover los estudios y mecanismos tendientes a la transferencia de riesgos',1,6,20),(126,'1.6.1.6 Fomentar, desarrollar y promover Normas Oficiales Mexicanas para la consolidación del Sistema Nacional de Protección Civil',1,6,20),(127,'1.6.1.7 Promover el fortalecimiento de las normas existentes en materia de asentamientos humanos en zonas de riesgo, para prevenir la ocurrencia de daños tanto humanos como materiales evitables',1,6,20),(128,'1.6.2.1 Fortalecer la capacidad logística y de operación del Sistema Nacional de Protección Civil en la atención de emergencias y desastres naturales',1,6,21),(129,'1.6.2.2 Fortalecer las capacidades de las Fuerzas Armadas para proporcionar apoyo a la población civil en casos de desastres naturales',1,6,21),(130,'1.6.2.3 Coordinar los esfuerzos de los gobiernos federal, estatal y municipal en el caso de emergencias y desastres naturales',1,6,21),(131,'1.I.1 Impulsar la correcta implementación de las estrategias para la construcción de un México en Paz, con el objetivo de reducir el impacto de la inseguridad en los costos de operación de las empresas y productores del país.',1,7,22),(132,'1.II.1 Estrechar desde la Oficina de la Presidencia, la Secretaría de Gobernación y demás instancias competentes, la vinculación con las organizaciones de la sociedad civil y promover la participación ciudadana en la gestión pública.',1,7,23),(133,'1.II.2 Evaluar y retroalimentar las acciones de las fuerzas de seguridad con indicadores claros, medibles y transparentes.',1,7,23),(134,'1.II.3 Impulsar la congruencia y consistencia del orden normativo mexicano en sus distintos niveles, así como un sistema jurídico efectivo y eficiente que garantice certidumbre jurídica.',1,7,23),(135,'1.II.4 Promover la eficiencia en el Sistema de Justicia Formal y Alternativa.',1,7,23),(136,'1.II.5 Colaborar en la promoción de acciones para una mayor eficacia de la justicia en los estados y el Distrito Federal.',1,7,23),(137,'1.II.6 Fortalecer la investigación y el desarrollo científico para sustentar mejor las acusaciones haciendo uso de las tecnologías de la información y la comunicación.',1,7,23),(138,'1.II.7 Difundir, con apego a los principios de legalidad, certeza jurídica y respeto a los derechos humanos, la información pública gubernamental.',1,7,23),(139,'1.II.8 Promover el respeto a los derechos humanos y la relación con los organismos nacionales e internacionales en la materia.',1,7,23),(140,'1.II.9 Fortalecer las políticas en materia de federalismo, descentralización y desarrollo de las entidades federativas y municipios del país.',1,7,23),(141,'1.III.1 Fomentar la participación y representación política equilibrada entre mujeres y hombres.',1,7,24),(142,'1.III.2 Establecer medidas especiales orientadas a la erradicación de la violencia de género en las dependencias y entidades de la Administración Pública Federal, entidades federativas y municipios.',1,7,24),(143,'1.III.3 Garantizar el cumplimiento de los acuerdos generales emanados del Sistema Nacional para Prevenir, Atender, Sancionar y Erradicar la Violencia contra las Mujeres, mediante una coordinación eficaz entre los diversos órdenes de gobierno.',1,7,24),(144,'1.III.4 Fortalecer el Banco Nacional de Datos e Información sobre Violencia contra las Mujeres, con la participación de las entidades federativas.',1,7,24),(145,'1.III.5 Simplificar los procesos y mejorar la coordinación en los planos federal, estatal y municipal, para prevenir, atender, sancionar y erradicar la violencia contra la mujer.',1,7,24),(146,'1.III.6 Acelerar la aplicación cabal de las órdenes de protección para las mujeres que se enfrentan a riesgos.',1,7,24),(147,'1.III.7 Promover la armonización de protocolos de investigación policial de homicidios de mujeres.',1,7,24),(148,'1.III.8 Propiciar la tipificación del delito de trata de personas y su armonización con el marco legal vigente.',1,7,24),(149,'1.III.9 Llevar a cabo campañas nacionales de sensibilización sobre los riesgos y consecuencias de la trata de personas orientadas a mujeres, así como sobre la discriminación de género y los tipos y modalidades de violencias contra las mujeres.',1,7,24),(150,'1.III.10 Capacitar a los funcionarios encargados de hacer cumplir la Ley de Migración y su Reglamento y demás disposiciones legales aplicables, sobre las causas, consecuencias e incidencia de la trata de mujeres y las diferentes formas de explotación, así como en la atención a las víctimas de estos delitos.',1,7,24),(151,'1.III.11 Promover el enfoque de género en las actuaciones de las dependencias y entidades de la Administración Pública Federal.',1,7,24),(152,'1.III.12 Incorporar acciones específicas para garantizar la seguridad e integridad de las mujeres.',1,7,24),(153,'2.1.1.1 Combatir la carencia alimentaria de la población a través de políticas públicas coordinadas y concurrentes, priorizando la atención de las familias en extrema pobreza',2,8,25),(154,'2.1.1.2 Propiciar un ingreso mínimo necesario para que las familias tenga acceso a suficientes alimentos inocuos y nutritivos',2,8,25),(155,'2.1.1.3 Facilitar el acceso a productos alimenticios básicos y complementarios a un precio adecuado',2,8,25),(156,'2.1.1.4 Incorporar componentes de carácter productivo a las acciones y programas sociales, con objeto de mejorar los ingresos de los mexicanos, proveerles empleo y garantizar el acceso a los alimentos indispensables para el ejercicio de sus derechos',2,8,25),(157,'2.1.1.5 Adecuar el marco jurídico para fortalecer la seguridad alimentaria y el derecho a la alimentación',2,8,25),(158,'2.1.2.1 Propiciar que los niños, niñas y jóvenes de las familias con carencias tengan acceso a la educación básica y media superior de calidad, y no abandonen sus estudios por falta de recursos',2,8,26),(159,'2.1.2.2 Fomentar el acceso efectivo de las familias, principalmente aquellas en pobreza extrema, a sus derechos sociales, mediante políticas públicas coordinadas y concurrentes',2,8,26),(160,'2.1.2.3 Otorgar los beneficios del Sistema de Protección Social en Salud',2,8,26),(161,'2.1.2.4 Brindar capacitación a la población para fomentar el autocuidado de la salud, priorizando la educación alimentaria nutricional y la prevención de enfermedades',2,8,26),(162,'2.1.2.5 Contribuir al mejor desempeño escolar a través de la nutrición y buen estado de salud de niños y jóvenes',2,8,26),(163,'2.1.2.6 Promover acciones de desarrollo infantil temprano',2,8,26),(164,'2.1.3.1 Impulsar la modernización de los Registros Civiles, toda vez que constituyen un portal de derechos cuando es gratuito y oportuno',2,8,27),(165,'2.1.3.2 Fortalecer el uso y adopción de la Clave única de Registro Poblacional, estableciendo esquemas de depuración y actualización permanente de su base de datos',2,8,27),(166,'2.1.3.3 Consolidar el Sistema Nacional de Identificación Personal como facultad exclusiva del Estado y expedir el documento que acredite la persolidad de la población establecida por la legislación en la materia',2,8,27),(167,'2.1.3.4 Adecuar el marco normativo en materia de población para que refleje a realidad demográfica del país',2,8,27),(168,'2.2.1.1 Fortalecer a los actores sociales que promuevan el desarrollan social de los grupos en situación de vulnerabilidad y rezago',2,9,28),(169,'2.2.1.2 Potenciar la inversión conjunta de la sociedad organizada y los tres órdenes de gobierno, invirtiendo en proyectos de infraestructura social básica, complementaria y productiva',2,9,28),(170,'2.2.1.3 Fortalecer el capital y cohesión social mediante la organización y participación de las comunidades, prmooviendo la confianza y la corresponsabilidad',2,9,28),(171,'2.2.2.1 Promover el desarrollo integral de los niños y niñas, particularmente en materia de salud, alimentación y educación, a través de la implementación de acciones coordinadas entre los tres órdenes de gobierno y la sociedad civil',2,9,29),(172,'2.2.2.2 Fomentar el desarrollo personal y profesional de los jóvenes del país, para que participen activamente en el desarrollo del mismo y puedan cumplir sus expectativas laborales, sociales y culturales',2,9,29),(173,'2.2.2.3 Fortalecer la protección de los derechos de las personas adultas mayores, para garantizar su calidad de vida en materia de salud, alimentación, empleo, vivienda, bienestar emocional y seguridad social',2,9,29),(174,'2.2.3.1 Desarrollar mecanismos para que la acción pública dirigida a la antención de la población indígena sea culturalmente pertinente',2,9,30),(175,'2.2.3.2 Impulsar la armonización del marco jurídico nacional en materia de derechos indígenas, así como el reconocimiento y protección de su patrimonio y riqueza cultural, con el objetivo de asegurar el ejercicio de los derechos de las comunidades y pueblos indígenas',2,9,30),(176,'2.2.3.3 Fomentar la participación de las comunidades y pueblos indígenas en la planeación y gestión de su propio desarrollo comunitario, asegurando el respeto a sus derechos y formas de vida',2,9,30),(177,'2.2.3.4 Promover el desarrollo económico de los pueblos y comunidades indígenas, a través de la implementación de acciones orientadas a la capacitación, desarrollo de proyectos productivos y la comercialización de los productos generados que vaya en líneacon su cultura y valores',2,9,30),(178,'2.2.3.5 Asegurar el ejercicio de los derechos de los pueblos y comunidades indígenas en materia de alimentación, salud, educación e infraestructura básica',2,9,30),(179,'2.2.3.6 Impulsar políticas para el aprovechamiento sustentable y sostenible de los recursos naturales existentes en las regiones indígenas y para la conservación del medio ambiente y la biodiversidad, aprovechando sus conocimientos tradicionales',2,9,30),(180,'2.2.3.7 Impulsar acciones que garanticen los derechos humanos y condiciones de seguridad de los grupos indígenas que realizan migraciones temporales en el territorio nacional',2,9,30),(181,'2.2.4.1 Establecer esquemas de atención integral para las personas con discapacidad, a través de acciones que fomenten la detección de discapacidades, estimulación temprana y su rehabilitación',2,9,31),(182,'2.2.4.2 Diseñar y ejecutar estrategias para incrementar la inclusión productiva de las personas con discapacidad, mediante esquemas de capacitación laboral y de vinculación con el sector productivo',2,9,31),(183,'2.2.4.3 Asegurar la construcción y adecuación del espacio público y privado, para garantizar el derecho a la accesibilidad',2,9,31),(184,'2.3.1.1 Garantizar el acceso y la calidad de los servicios de salud a los mexicanos, con independencia de su condición social o laboral',2,10,32),(185,'2.3.1.2 Fortalecer la rectoría de la autoridad sanitaria',2,10,32),(186,'2.3.1.3 Desarrollar los instrumentos necesarios para lograr una integración funcional y efectiva de las distintas instituciones que integran el Sistema Nacional de Salud',2,10,32),(187,'2.3.1.4 Fomentar el proceso de planeación estratégica interinstitucional, e implantar un proceso de información y evaluación acorde con ésta',2,10,32),(188,'2.3.1.5 Contribuir a la consolidación de los instrumentos y políticas necesarias para una integración efectiva del Sistema Nacional de Salud',2,10,32),(189,'2.3.2.1 Garantizar la oportunidad, calidad, seguridad y eficacia de los insumos y servicios para la salud.',2,10,33),(190,'2.3.2.2 Reducir la carga de morbilidad y mortalidad de enfermedades crónicas no transmisibles, principalmente diabetes e hipertensión.',2,10,33),(191,'2.3.2.3 Instrumentar acciones para la prevención y control del sobrepeso, obesidad y diabetes.',2,10,33),(192,'2.3.2.4 Reducir la prevalencia en el consumo de alcohol, tabaco y drogas ilícitas.',2,10,33),(193,'2.3.2.5 Controlar las enfermedades de transmisión sexual, y promover una salud sexual y reproductiva satisfactoria y responsable.',2,10,33),(194,'2.3.2.6 Fortalecer programas de detección oportuna de cáncer de mama, de cáncer cérvico-uterino y de cáncer de próstata.',2,10,33),(195,'2.3.2.7 Privilegiar acciones de regulación y vigilancia de bienes y servicios para la reducción de riesgos sanitarios, así como acciones que fortalezcan el Sistema Federal Sanitario en general.',2,10,33),(196,'2.3.2.8 Coordinar actividades con los sectores productivos para el desarrollo de políticas de detección, prevención y fomento sanitario en el ámbito laboral.',2,10,33),(197,'2.3.3.1 Asegurar un enfoque integral y la participación de todos los actores, a fin de reducir la mortalidad infantil y materna.',2,10,34),(198,'2.3.3.2 Intensificar la capacitación y supervisión de la calidad de la atención materna y perinatal.',2,10,34),(199,'2.3.3.3 Llevar a cabo campañas de vacunación, prevención, diagnóstico y tratamiento oportuno de las enfermedades, así como una estrategia integral para el combate a epidemias y la desnutrición.',2,10,34),(200,'2.3.3.4 Impulsar el enfoque intercultural de salud en el diseño y operación de programas y acciones dirigidos a la población.',2,10,34),(201,'2.3.3.5 Implementar acciones regulatorias que permitan evitar riesgos sanitarios en aquellas personas en situación de vulnerabilidad.',2,10,34),(202,'2.3.3.6 Fomentar el desarrollo de infraestructura y la puesta en marcha de unidades médicas móviles y su equipamiento en zonas de población vulnerable.',2,10,34),(203,'2.3.3.7 Impulsar acciones para la prevención y promoción de la salud de los migrantes.',2,10,34),(204,'2.3.3.8 Fortalecer los mecanismos de anticipación y respuesta ante enfermedades emergentes y desastres.',2,10,34),(205,'2.3.4.1 Preparar el sistema para que el usuario seleccione a su prestador de servicios de salud.',2,10,35),(206,'2.3.4.2 Consolidar la regulación efectiva de los procesos y establecimientos de atención médica, mediante la distribución y coordinación de competencias entre la Federación y las entidades federativas.',2,10,35),(207,'2.3.4.3 Instrumentar mecanismos que permitan homologar la calidad técnica e interpersonal de los servicios de salud.',2,10,35),(208,'2.3.4.4 Mejorar la calidad en la formación de los recursos humanos y alinearla con las necesidades demográficas y epidemiológicas de la población.',2,10,35),(209,'2.3.4.5 Garantizar medicamentos de calidad, eficaces y seguros.',2,10,35),(210,'2.3.4.6 Implementar programas orientados a elevar la satisfacción de los usuarios en las unidades operativas públicas.',2,10,35),(211,'2.3.4.7 Desarrollar y fortalecer la infraestructura de los sistemas de salud y seguridad social públicos.',2,10,35),(212,'2.3.5.1 Fortalecer la vigilancia epidemiológica para proteger la salud global en un contexto de emergencia epidemiológica.',2,10,36),(213,'2.3.5.2 Cumplir con los tratados internacionales en materia de salud en el marco de los derechos humanos.',2,10,36),(214,'2.3.5.3 Impulsar nuevos esquemas de cooperación internacional en salud pública que permitan fortalecer capacidades locales y regionales.',2,10,36),(215,'2.4.1.1 Fomentar políticas de empleo y fortalecer los programas de transferencias para proteger el poder adquisitivo y el ingreso.',2,11,37),(216,'2.4.1.2 Instrumentar el Seguro de Vida para Mujeres Jefas de Familia.',2,11,37),(217,'2.4.1.3 Promover la inclusión financiera en materia de aseguramiento de los distintos riesgos que enfrentan los mexicanos a lo largo del ciclo de vida.',2,11,37),(218,'2.4.1.4 Apoyar a la población afectada por emergencias u otras situaciones adversas, mediante la responsabilidad compartida entre la sociedad y el Estado.',2,11,37),(219,'2.4.2.1 Facilitar la portabilidad de derechos entre los diversos subsistemas que existen tanto a nivel federal como en las entidades federativas y municipios.',2,11,38),(220,'2.4.2.2 Promover la eficiencia y calidad al ofrecer derechos de protección social a la población, independientemente de la condición laboral y tomando en cuenta a las personas adultas mayores.',2,11,38),(221,'2.4.3.1 Reordenar los procesos que permitan el seguimiento del ejercicio de recursos con apego fiel al logro de resultados.',2,11,39),(222,'2.4.3.2 Racionalizar y optimizar el gasto operativo, y privilegiar el gasto de inversión de carácter estratégico y/o prioritario.',2,11,39),(223,'2.4.3.3 Incrementar los mecanismos de verificación y supervisión del entero de aportaciones y cuotas.',2,11,39),(224,'2.4.3.4 Determinar y vigilar los costos de atención de los seguros, servicios y prestaciones que impactan la sustentabilidad financiera de los organismos públicos.',2,11,39),(225,'2.4.3.5 Implementar programas de distribución de medicinas que alineen los incentivos de las instituciones de salud pública, los proveedores de medicamentos y los ciudadanos usuarios.',2,11,39),(226,'2.4.3.6 Promover esquemas innovadores de financiamiento público-privado para impulsar la sostenibilidad financiera de los organismos públicos.',2,11,39),(227,'2.4.3.7 Impulsar la sustentabilidad de los sistemas de pensiones, considerando transiciones hacia esquemas de contribución definida.',2,11,39),(228,'2.4.3.8 Diseñar una estrategia integral para el patrimonio inmobiliario propiedad de los institutos públicos.',2,11,39),(229,'2.5.1.1 Fomentar ciudades más compactas, con mayor densidad de población y actividad económica, orientando el desarrollo mediante la política pública, el financiamiento y los apoyos a la vivienda.',2,12,40),(230,'2.5.1.2 Inhibir el crecimiento de las manchas urbanas hacia zonas inadecuadas.',2,12,40),(231,'2.5.1.3 Promover reformas a la legislación en materia de planeación urbana, uso eficiente del suelo y zonificación.',2,12,40),(232,'2.5.1.4 Revertir el abandono e incidir positivamente en la plusvalía habitacional, por medio de intervenciones para rehabilitar el entorno y mejorar la calidad de vida en desarrollos y unidades habitacionales que así lo necesiten.',2,12,40),(233,'2.5.1.5 Mejorar las condiciones habitacionales y su entorno, en coordinación con los gobiernos locales.',2,12,40),(234,'2.5.1.6 Adecuar normas e impulsar acciones de renovación urbana, ampliación y mejoramiento de la vivienda del parque habitacional existente.',2,12,40),(235,'2.5.1.7 Fomentar una movilidad urbana sustentable con apoyo de proyectos de transporte público y masivo, y que promueva el uso de transporte no motorizado.',2,12,40),(236,'2.5.1.8 Propiciar la modernización de catastros y de registros públicos de la propiedad, así como la incorporación y regularización de propiedades no registradas.',2,12,40),(237,'2.5.2.1 Desarrollar y promover vivienda digna que favorezca el bienestar de las familias.',2,12,41),(238,'2.5.2.2 Desarrollar un nuevo modelo de atención de necesidades de vivienda para distintos segmentos de la población, y la atención a la población no cubierta por la seguridad social, incentivando su inserción a la economía formal.',2,12,41),(239,'2.5.2.3 Fortalecer el mercado secundario de vivienda, incentivando el mercado de renta, que eleve la plusvalía de viviendas desocupadas y contribuya a una oferta más diversa y flexible.',2,12,41),(240,'2.5.2.4 Incentivar la oferta y demanda de vivienda en renta adecuada a las necesidades personales y familiares.',2,12,41),(241,'2.5.2.5 Fortalecer el papel de la banca privada, la Banca de Desarrollo, las instituciones públicas hipotecarias, microfinancieras y ejecutores sociales de vivienda, en el otorgamiento de financiamiento para construir, adquirir y mejorar la vivienda.',2,12,41),(242,'2.5.2.6 Desarrollar los instrumentos administrativos y contributivos que permitan preservar la calidad de la vivienda y su entorno, así como la plusvalía habitacional de los desarrollos que se financien.',2,12,41),(243,'2.5.2.7 Fomentar la nueva vivienda sustentable desde las dimensiones económica, ecológica y social, procurando en particular la adecuada ubicación de los desarrollos habitacionales.',2,12,41),(244,'2.5.2.8 Dotar con servicios básicos, calidad en la vivienda e infraestructura social comunitaria a las localidades ubicadas en las Zonas de Atención Prioritaria con alta y muy alta marginación.',2,12,41),(245,'2.5.2.9 Establecer políticas de reubicación de población en zonas de riesgo, y apoyar esquemas de Suelo Servido.',2,12,41),(246,'2.5.3.1 Consolidar una política unificada y congruente de ordenamiento territorial, desarrollo regional urbano y vivienda, bajo la coordinación de la Secretaría de Desarrollo Agrario, Territorial y Urbano (SEDATU) y que presida, además, la Comisión Intersecretarial en la materia.',2,12,42),(247,'2.5.3.2 Fortalecer las instancias e instrumentos de coordinación y cooperación entre los tres órdenes de gobierno y los sectores de la sociedad, con el fin de conjugar esfuerzos en materia de ordenamiento territorial y vivienda.',2,12,42),(248,'2.5.3.3 Promover la adecuación de la legislación en la materia para que responda a los objetivos de la Nueva Política de Vivienda.',2,12,42),(249,'2.I.1 Promover el uso eficiente del territorio nacional a través de programas que otorguen certidumbre jurídica a la tenencia de la tierra, reduzcan la fragmentación de los predios agrícolas y promuevan el ordenamiento territorial en zonas urbanas, así como el desarrollo de ciudades más competitivas.',2,13,43),(250,'2.I.2 Reducir la informalidad y generar empleos mejor remunerados, a través de políticas de seguridad social que disminuyan los costos que enfrentan las empresas al contratar a trabajadores formales.',2,13,43),(251,'2.I.3 Fomentar la generación de fuentes de ingreso sostenibles, poniendo énfasis en la participación de la mujer en la producción en comunidades con altos niveles de marginación.',2,13,43),(252,'2.II.1 Desarrollar políticas públicas con base en evidencia y cuya planeación utilice los mejores insumos de información y evaluación, así como las mejores prácticas a nivel internacional.',2,13,44),(253,'2.II.2 Incorporar la participación social desde el diseño y ejecución hasta la evaluación y retroalimentación de los programas sociales.',2,13,44),(254,'2.II.3 Optimizar el gasto operativo y los costos de atención, privilegiando el gasto de inversión de carácter estratégico y/o prioritario.',2,13,44),(255,'2.II.4 Evaluar y rendir cuentas de los programas y recursos públicos invertidos, mediante la participación de instituciones académicas y de investigación y a través del fortalecimiento de las contralorías sociales comunitarias.',2,13,44),(256,'2.II.5 Integrar un padrón con identificación única de beneficiarios de programas sociales, haciendo uso de las nuevas tecnologías de la información.',2,13,44),(257,'2.II.6 Diseñar e integrar sistemas funcionales, escalables e interconectados, para hacer más eficientes las transacciones de los organismos públicos de seguridad social.',2,13,44),(258,'2.II.7 Identificar y corregir riesgos operativos críticos con un soporte tecnológico adecuado.',2,13,44),(259,'2.III.1 Promover la igualdad de oportunidades entre mujeres y hombres para ejercer sus derechos, reduciendo la brecha en materia de acceso y permanencia laboral.',2,13,45),(260,'2.III.2 Desarrollar y fortalecer esquemas de apoyo y atención que ayuden a las mujeres a mejorar sus condiciones de acceso a la seguridad social y su bienestar económico.',2,13,45),(261,'2.III.3 Fomentar políticas dirigidas a los hombres que favorezcan su participación en el trabajo doméstico y de cuidados, así como sus derechos en el ámbito familiar.',2,13,45),(262,'2.III.4 Prevenir y atender la violencia contra las mujeres, con la coordinación de las diversas instituciones gubernamentales y sociales involucradas en esa materia.',2,13,45),(263,'2.III.5 Diseñar, aplicar y promover políticas y servicios de apoyo a la familia, incluyendo servicios asequibles, accesibles y de calidad, para el cuidado de infantes y otros familiares que requieren atención.',2,13,45),(264,'2.III.6 Evaluar los esquemas de atención de los programas sociales para determinar los mecanismos más efectivos que reduzcan las brechas de género, logrando una política social equitativa entre mujeres y hombres.',2,13,45),(265,'3.1.1.1 Estimular el desarrollo profesional de los maestros, centrado en la escuela y en el aprendizaje de los alumnos, en el marco del Servicio Profesional Docente.',3,14,46),(266,'3.1.1.2 Robustecer los programas de formación para docentes y directivos.',3,14,46),(267,'3.1.1.3 Impulsar la capacitación permanente de los docentes para mejorar la comprensión del modelo educativo, las prácticas pedagógicas y el manejo de las tecnologías de la información con fines educativos.',3,14,46),(268,'3.1.1.4 Fortalecer el proceso de reclutamiento de directores y docentes de los planteles públicos de educación básica y media superior, mediante concurso de selección.',3,14,46),(269,'3.1.1.5 Incentivar a las instituciones de formación inicial docente que emprendan procesos de mejora.',3,14,46),(270,'3.1.1.6 Estimular los programas institucionales de mejoramiento del profesorado, del desempeño docente y de investigación, incluyendo una perspectiva de las implicaciones del cambio demográfico.',3,14,46),(271,'3.1.1.7 Constituir el Servicio de Asistencia Técnica a la Escuela, para acompañar y asesorar a cada plantel educativo de acuerdo con sus necesidades específicas.',3,14,46),(272,'3.1.1.8 Mejorar la supervisión escolar, reforzando su capacidad para apoyar, retroalimentar y evaluar el trabajo pedagógico de los docentes.',3,14,46),(273,'3.1.2.1 Promover la mejora de la infraestructura de los planteles educativos más rezagados.',3,14,47),(274,'3.1.2.2 Asegurar que los planteles educativos dispongan de instalaciones eléctricas e hidrosanitarias adecuadas.',3,14,47),(275,'3.1.2.3 Modernizar el equipamiento de talleres, laboratorios e instalaciones para realizar actividades físicas, que permitan cumplir adecuadamente con los planes y programas de estudio.',3,14,47),(276,'3.1.2.4 Incentivar la planeación de las adecuaciones a la infraestructura educativa, considerando las implicaciones de las tendencias demográficas.',3,14,47),(277,'3.1.3.1 Definir estándares curriculares que describan con claridad lo que deben aprender los alumnos del Sistema Educativo, y que tomen en cuenta las diversas realidades del entorno escolar, incluyendo los derivados de la transición demográfica.',3,14,48),(278,'3.1.3.2 Instrumentar una política nacional de desarrollo de materiales educativos de apoyo para el trabajo didáctico en las aulas.',3,14,48),(279,'3.1.3.3 Ampliar paulatinamente la duración de la jornada escolar, para incrementar las posibilidades de formación integral de los educandos, especialmente los que habitan en contextos desfavorecidos o violentos.',3,14,48),(280,'3.1.3.4 Incentivar el establecimiento de escuelas de tiempo completo y fomentar este modelo pedagógico como un factor de innovación educativa.',3,14,48),(281,'3.1.3.5 Fortalecer dentro de los planes y programas de estudio, la enseñanza sobre derechos humanos en la educación básica y media superior.',3,14,48),(282,'3.1.3.6 Impulsar a través de los planes y programas de estudio de la educación media superior y superior, la construcción de una cultura emprendedora.',3,14,48),(283,'3.1.3.7 Reformar el esquema de evaluación y certificación de la calidad de los planes y programas educativos en educación media superior y superior.',3,14,48),(284,'3.1.3.8 Fomentar desde la educación básica los conocimientos, las habilidades y las aptitudes que estimulen la investigación y la innovación científica y tecnológica.',3,14,48),(285,'3.1.3.9 Fortalecer la educación para el trabajo, dando prioridad al desarrollo de programas educativos flexibles y con salidas laterales o intermedias, como las carreras técnicas y vocacionales.',3,14,48),(286,'3.1.3.10 Impulsar programas de posgrado conjuntos con instituciones extranjeras de educación superior en áreas prioritarias para el país.',3,14,48),(287,'3.1.3.11 Crear un programa de estadías de estudiantes y profesores en instituciones extranjeras de educación superior.',3,14,48),(288,'3.1.4.1 Desarrollar una política nacional de informática educativa, enfocada a que los estudiantes desarrollen sus capacidades para aprender a aprender mediante el uso de las tecnologías de la información y la comunicación.',3,14,49),(289,'3.1.4.2 Ampliar la dotación de equipos de cómputo y garantizar conectividad en los planteles educativos.',3,14,49),(290,'3.1.4.3 Intensificar el uso de herramientas de innovación tecnológica en todos los niveles del Sistema Educativo.',3,14,49),(291,'3.1.5.1 Ampliar la operación de los sistemas de apoyo tutorial, con el fin de reducir los niveles de deserción de los estudiantes y favorecer la conclusión oportuna de sus estudios.',3,14,50),(292,'3.1.5.2 Implementar un programa de alerta temprana para identificar a los niños y jóvenes en riesgo de desertar.',3,14,50),(293,'3.1.5.3 Establecer programas remediales de apoyo a estudiantes de nuevo ingreso que presenten carencias académicas y que fortalezcan el desarrollo de hábitos de estudio entre los estudiantes.',3,14,50),(294,'3.1.5.4 Definir mecanismos que faciliten a los estudiantes transitar entre opciones, modalidades y servicios educativos.',3,14,50),(295,'3.1.6.1 Garantizar el establecimiento de vínculos formales de interacción entre las instancias que generan las evaluaciones y las áreas responsables del diseño e implementación de la política educativa.',3,14,51),(296,'3.2.1.1 Establecer un marco regulatorio con las obligaciones y responsabilidades propias de la educación inclusiva.',3,15,52),(297,'3.2.1.2 Fortalecer la capacidad de los maestros y las escuelas para trabajar con alumnos de todos los sectores de la población.',3,15,52),(298,'3.2.1.3 Definir, alentar y promover las prácticas inclusivas en la escuela y en el aula.',3,15,52),(299,'3.2.1.4 Desarrollar la capacidad de la supervisión escolar y del Servicio de Asistencia Técnica a la escuela, para favorecer la inclusión educativa.',3,15,52),(300,'3.2.1.5 Fomentar la ampliación de la cobertura del programa de becas de educación media superior y superior.',3,15,52),(301,'3.2.1.6 Impulsar el desarrollo de los servicios educativos destinados a la población en riesgo de exclusión.',3,15,52),(302,'3.2.1.7 Robustecer la educación indígena, la destinada a niños migrantes, la telesecundaria, así como los servicios educativos que presta el Consejo Nacional de Fomento Educativo (CONAFE).',3,15,52),(303,'3.2.1.8 Impulsar políticas públicas para reforzar la enseñanza en lenguas indígenas en todos los niveles educativos, poniendo énfasis en regiones con lenguas en riesgo de desaparición.',3,15,52),(304,'3.2.1.9 Fortalecer los servicios que presta el Instituto Nacional para la Educación de los Adultos (INEA).',3,15,52),(305,'3.2.1.10 Establecer alianzas con instituciones de educación superior y organizaciones sociales, con el fin de disminuir el analfabetismo y el rezago educativo.',3,15,52),(306,'3.2.1.11 Ampliar las oportunidades educativas para atender a los grupos con necesidades especiales.',3,15,52),(307,'3.2.1.12 Adecuar la infraestructura, el equipamiento y las condiciones de accesibilidad de los planteles, para favorecer la atención de los jóvenes con discapacidad.',3,15,52),(308,'3.2.1.13 Garantizar el derecho de los pueblos indígenas a recibir educación de calidad en su lengua materna y con pleno respeto a sus culturas.',3,15,52),(309,'3.2.2.1 Propiciar la creación de un sistema nacional de becas para ordenar y hacer viables los esfuerzos dirigidos a universalizar los apoyos entre los jóvenes provenientes de familias de bajos recursos.',3,15,53),(310,'3.2.2.2 Aumentar la proporción de jóvenes en situación de desventaja que transitan de la secundaria a la educación media superior y de ésta a nivel superior, con el apoyo de los programas de becas.',3,15,53),(311,'3.2.2.3 Diversificar las modalidades de becas para apoyar a los estudiantes con necesidades especiales y en situación de vulnerabilidad.',3,15,53),(312,'3.2.2.4 Promover que en las escuelas de todo el país existan ambientes seguros para el estudio.',3,15,53),(313,'3.2.2.5 Fomentar un ambiente de sana convivencia e inculcar la prevención de situaciones de acoso escolar.',3,15,53),(314,'3.2.3.1 Incrementar de manera sostenida la cobertura en educación media superior y superior, hasta alcanzar al menos 80% en media superior y 40% en superior.',3,15,54),(315,'3.2.3.2 Ampliar la oferta educativa de las diferentes modalidades, incluyendo la mixta y la no escolarizada.',3,15,54),(316,'3.2.3.3 Asegurar la suficiencia financiera de los programas destinados al mejoramiento de la calidad e incremento de la cobertura, con especial énfasis en las regiones con mayor rezago educativo.',3,15,54),(317,'3.2.3.4 Impulsar la diversificación de la oferta educativa en la educación media superior y superior de conformidad con los requerimientos del desarrollo local, estatal y regional.',3,15,54),(318,'3.2.3.5 Fomentar la creación de nuevas opciones educativas, a la vanguardia del conocimiento científico y tecnológico.',3,15,54),(319,'3.3.1.1 Incluir a la cultura como un componente de las acciones y estrategias de prevención social.',3,16,55),(320,'3.3.1.2 Vincular las acciones culturales con el programa de rescate de espacios públicos.',3,16,55),(321,'3.3.1.3 Impulsar un federalismo cultural que fortalezca a las entidades federativas y municipios, para que asuman una mayor corresponsabilidad en la planeación cultural.',3,16,55),(322,'3.3.1.4 Diseñar un programa nacional que promueva la lectura.',3,16,55),(323,'3.3.1.5 Organizar un programa nacional de grupos artísticos comunitarios para la inclusión de niños y jóvenes.',3,16,55),(324,'3.3.2.1 Realizar un trabajo intensivo de evaluación, mantenimiento y actualización de la infraestructura y los espacios culturales existentes en todo el territorio nacional.',3,16,56),(325,'3.3.2.2 Generar nuevas modalidades de espacios multifuncionales y comunitarios, para el desarrollo de actividades culturales en zonas y municipios con mayores índices de marginación y necesidad de fortalecimiento del tejido social.',3,16,56),(326,'3.3.2.3 Dotar a la infraestructura cultural, creada en años recientes, de mecanismos ágiles de operación y gestión.',3,16,56),(327,'3.3.3.1 Promover un amplio programa de rescate y rehabilitación de los centros históricos del país.',3,16,57),(328,'3.3.3.2 Impulsar la participación de los organismos culturales en la elaboración de los programas de desarrollo urbano y medio ambiente.',3,16,57),(329,'3.3.3.3 Fomentar la exploración y el rescate de sitios arqueológicos que trazarán un nuevo mapa de la herencia y el pasado prehispánicos del país.',3,16,57),(330,'3.3.3.4 Reconocer, valorar, promover y difundir las culturas indígenas vivas en todas sus expresiones y como parte esencial de la identidad y la cultura nacionales.',3,16,57),(331,'3.3.4.1 Incentivar la creación de industrias culturales y apoyar las ya creadas a través de los programas de MIPYMES.',3,16,58),(332,'3.3.4.2 Impulsar el desarrollo de la industria cinematográfica nacional de producciones nacionales y extranjeras realizadas en territorio nacional.',3,16,58),(333,'3.3.4.3 Estimular la producción artesanal y favorecer su organización a través de pequeñas y medianas empresas.',3,16,58),(334,'3.3.4.4 Armonizar la conservación y protección del patrimonio cultural con una vinculación más eficaz entre la cultura y la promoción turística que detone el empleo y el desarrollo regional.',3,16,58),(335,'3.3.5.1 Definir una política nacional de digitalización, preservación digital y accesibilidad en línea del patrimonio cultural de México, así como del empleo de los sistemas y dispositivos tecnológicos en la difusión del arte y la cultura.',3,16,59),(336,'3.3.5.2 Estimular la creatividad en el campo de las aplicaciones y desarrollos tecnológicos, basados en la digitalización, la presentación y la comunicación del patrimonio cultural y las manifestaciones artísticas.',3,16,59),(337,'3.3.5.3 Crear plataformas digitales que favorezcan la oferta más amplia posible de contenidos culturales, especialmente para niños y jóvenes.',3,16,59),(338,'3.3.5.4 Estimular la creación de proyectos vinculados a la ciencia, la tecnología y el arte, que ofrezcan contenidos para nuevas plataformas.',3,16,59),(339,'3.3.5.5 Equipar a la infraestructura cultural del país con espacios y medios de acceso público a las tecnologías de la información y la comunicación.',3,16,59),(340,'3.3.5.6 Utilizar las nuevas tecnologías, particularmente en lo referente a transmisiones masivas de eventos artísticos.',3,16,59),(341,'3.4.1.1 Contar con información confiable, suficiente y validada, de las instalaciones existentes a nivel municipal, estatal y federal, para conocer el estado físico y operativo de las mismas.',3,17,60),(342,'3.4.1.2 Definir con certeza las necesidades de adecuación, remodelación y óptima operación de las instalaciones deportivas, incluyendo las escolares.',3,17,60),(343,'3.4.1.3 Recuperar espacios existentes y brindar la adecuada respuesta a las necesidades futuras que requieren los programas deportivos.',3,17,60),(344,'3.4.1.4 Promover que todas las acciones de los miembros del Sistema Nacional de Cultura Física y Deporte se fundamenten en la planeación de largo plazo.',3,17,60),(345,'3.4.1.5 Poner en operación el sistema de evaluación en materia deportiva que garantice la eficiencia de los recursos financieros invertidos en el deporte nacional.',3,17,60),(346,'3.4.2.1 Crear un programa de actividad física y deporte tendiente a disminuir los índices de sobrepeso y obesidad.',3,17,61),(347,'3.4.2.2 Facilitar la práctica deportiva sin fines selectivos, con un enfoque que promueva la adquisición de valores para el trabajo en equipo, respeto a las reglas y obtención del éxito mediante el esfuerzo individual y colectivo.',3,17,61),(348,'3.4.2.3 Estructurar con claridad dos grandes vertientes para la práctica de actividades deportivas: deporte social y deporte de representación.',3,17,61),(349,'3.4.2.4 Facilitar el acceso a la población con talentos específicos al deporte estrictamente selectivo.',3,17,61),(350,'3.4.2.5 Llevar a cabo competencias deportivas y favorecer la participación de la población en competencias municipales, estatales, nacionales e internacionales.',3,17,61),(351,'3.5.1.1 Impulsar la articulación de los esfuerzos que realizan los sectores público, privado y social, para incrementar la inversión en Ciencia, Tecnología e Innovación (CTI) y lograr una mayor eficacia y eficiencia en su aplicación.',3,18,62),(352,'3.5.1.2 Incrementar el gasto público en CTI de forma sostenida.',3,18,62),(353,'3.5.1.3 Promover la inversión en CTI que realizan las instituciones públicas de educación superior.',3,18,62),(354,'3.5.1.4 Incentivar la inversión del sector productivo en investigación científica y desarrollo tecnológico.',3,18,62),(355,'3.5.1.5 Fomentar el aprovechamiento de las fuentes de financiamiento internacionales para CTI.',3,18,62),(356,'3.5.2.1 Incrementar el número de becas de posgrado otorgadas por el Gobierno Federal, mediante la consolidación de los programas vigentes y la incorporación de nuevas modalidades educativas.',3,18,63),(357,'3.5.2.2 Fortalecer el Sistema Nacional de Investigadores (SNI), incrementando el número de científicos y tecnólogos incorporados y promoviendo la descentralización.',3,18,63),(358,'3.5.2.3 Fomentar la calidad de la formación impartida por los programas de posgrado, mediante su acreditación en el Programa Nacional de Posgrados de Calidad (PNPC), incluyendo nuevas modalidades de posgrado que incidan en la transformación positiva de la sociedad y el conocimiento.',3,18,63),(359,'3.5.2.4 Apoyar a los grupos de investigación existentes y fomentar la creación de nuevos en áreas estratégicas o emergentes.',3,18,63),(360,'3.5.2.5 Ampliar la cooperación internacional en temas de investigación científica y desarrollo tecnológico, con el fin de tener información sobre experiencias exitosas, así como promover la aplicación de los logros científicos y tecnológicos nacionales.',3,18,63),(361,'3.5.2.6 Promover la participación de estudiantes e investigadores mexicanos en la comunidad global del conocimiento.',3,18,63),(362,'3.5.2.7 Incentivar la participación de México en foros y organismos internacionales.',3,18,63),(363,'3.5.3.1 Diseñar políticas públicas diferenciadas que permitan impulsar el progreso científico y tecnológico en regiones y entidades federativas, con base en sus vocaciones económicas y capacidades locales.',3,18,64),(364,'3.5.3.2 Fomentar la formación de recursos humanos de alto nivel, asociados a las necesidades de desarrollo de las entidades federativas de acuerdo con sus vocaciones.',3,18,64),(365,'3.5.3.3 Apoyar al establecimiento de ecosistemas científico-tecnológicos que favorezcan el desarrollo regional.',3,18,64),(366,'3.5.3.4 Incrementar la inversión en CTI a nivel estatal y regional con la concurrencia de los diferentes ámbitos de gobierno y sectores de la sociedad.',3,18,64),(367,'3.5.4.1 Apoyar los proyectos científicos y tecnológicos evaluados conforme a estándares internacionales.',3,18,65),(368,'3.5.4.2 Promover la vinculación entre las instituciones de educación superior y centros de investigación con los sectores público, social y privado.',3,18,65),(369,'3.5.4.3 Desarrollar programas específicos de fomento a la vinculación y la creación de unidades sustentables de vinculación y transferencia de conocimiento.',3,18,65),(370,'3.5.4.4 Promover el desarrollo emprendedor de las instituciones de educación superior y los centros de investigación, con el fin de fomentar la innovación tecnológica y el autoempleo entre los jóvenes.',3,18,65),(371,'3.5.4.5 Incentivar, impulsar y simplificar el registro de la propiedad intelectual entre las instituciones de educación superior, centros de investigación y la comunidad científica.',3,18,65),(372,'3.5.4.6 Propiciar la generación de pequeñas empresas de alta tecnología.',3,18,65),(373,'3.5.4.7 Impulsar el registro de patentes para incentivar la innovación.',3,18,65),(374,'3.5.5.1 Apoyar el incremento de infraestructura en el sistema de centros públicos de investigación.',3,18,66),(375,'3.5.5.2 Fortalecer la infraestructura de las instituciones públicas de investigación científica y tecnológica, a nivel estatal y regional.',3,18,66),(376,'3.5.5.3 Extender y mejorar los canales de comunicación y difusión de la investigación científica y tecnológica, con el fin de sumar esfuerzos y recursos en el desarrollo de proyectos.',3,18,66),(377,'3.5.5.4 Gestionar los convenios y acuerdos necesarios para favorecer el préstamo y uso de infraestructura entre instituciones e investigadores, con el fin de aprovechar al máximo la capacidad disponible.',3,18,66),(378,'3.I.1 Enfocar el esfuerzo educativo y de capacitación para el trabajo, con el propósito de incrementar la calidad del capital humano y vincularlo estrechamente con el sector productivo',3,19,67),(379,'3.I.2 Coordinar los esfuerzos de política social y atención educativa a la población más pobre, para crear condiciones que mejoren el ingreso, la retención y el aprovechamiento escolar de los alumnos de familias de escasos recursos económicos.',3,19,67),(380,'3.I.3 Ampliar y mejorar la colaboración y coordinación entre todas las instancias de gobierno, para llevar educación técnica y superior en diversas modalidades a localidades sin oferta educativa de este tipo y a zonas geográficas de alta y muy alta marginación.',3,19,67),(381,'3.I.4 Diseñar e impulsar, junto con los distintos órdenes de gobierno y la sociedad civil, la puesta en marcha de actividades dirigidas a la creación y fortalecimiento de la infraestructura tecnológica adecuada para el aprendizaje a través de plataformas digitales.',3,19,67),(382,'3.I.5 Ampliar la jornada escolar para ofrecer más y mejor tiempo educativo a los alumnos que más lo requieren.',3,19,67),(383,'3.I.6 Fomentar la adquisición de capacidades básicas, incluyendo el manejo de otros idiomas, para incorporarse a un mercado laboral competitivo a nivel global.',3,19,67),(384,'3.I.7 Fomentar la certificación de competencias laborales.',3,19,67),(385,'3.I.8 Apoyar los programas de becas dirigidos a favorecer la transición al primer empleo de los egresados de educación media superior con formación tecnológica o profesional técnica, incluyendo carreras técnicas, vocacionales y programas de aprendizaje laboral.',3,19,67),(386,'3.I.9 Fortalecer las capacidades institucionales de vinculación de los planteles de nivel medio superior y superior con el sector productivo, y alentar la revisión permanente de la oferta educativa.',3,19,67),(387,'3.I.10 Impulsar el establecimiento de consejos institucionales de vinculación.',3,19,67),(388,'3.I.11 Incrementar la inversión pública y promover la inversión privada en actividades de innovación y desarrollo en centros de investigación y empresas, particularmente en la creación y expansión de empresas de alta tecnología.',3,19,67),(389,'3.I.12 Establecer un sistema de seguimiento de egresados del nivel medio superior y superior, y realizar estudios de detección de necesidades de los sectores empleadores.',3,19,67),(390,'3.I.13 Impulsar la creación de carreras, licenciaturas y posgrados con pertinencia local, regional y nacional.',3,19,67),(391,'3.II.1 Operar un Sistema de Información y Gestión Educativa que permita a la autoridad tener en una sola plataforma datos para la planeación, administración y evaluación del Sistema Educativo, y facilite la transparencia y rendición de cuentas.',3,19,68),(392,'3.II.2 Conformar un Sistema Nacional de Planeación que promueva un mejor desarrollo del Sistema Educativo.',3,19,68),(393,'3.II.3 Avanzar en la conformación de un Sistema Integral de Evaluación, equitativo, amplio y adecuado a las necesidades y contextos regionales del país.',3,19,68),(394,'3.II.4 Fortalecer los mecanismos, instrumentos y prácticas de evaluación y acreditación de la calidad de la educación media superior y superior, tanto de los programas escolarizados como de los programas de educación mixta y no escolarizada.',3,19,68),(395,'3.II.5 Actualizar el marco normativo general que rige la vida de las escuelas de educación básica, con el fin de que las autoridades educativas estatales dispongan de los parámetros necesarios para regular el quehacer de los planteles, y se establezcan con claridad deberes y derechos de los maestros, los padres de familia y los alumnos.',3,19,68),(396,'3.II.6 Definir estándares de gestión escolar para mejorar el desempeño de los planteles educativos.',3,19,68),(397,'3.II.7 Actualizar la normatividad para el ingreso y permanencia de los centros escolares particulares a los subsistemas educativos, así como la relacionada al ejercicio profesional y reconocimiento de validez oficial de estudios.',3,19,68),(398,'3.II.8 Revisar de manera integral en los ámbitos federal y estatal, los regímenes de reconocimiento de estudios que imparten las instituciones particulares, a fin de que las reglas para el otorgamiento del reconocimiento de validez oficial de estudios establezcan criterios sólidos y uniformes de calidad académica.',3,19,68),(399,'3.II.9 Contar con un sistema único para el control escolar, basado en la utilización de tecnologías de la información y registros estandarizados.',3,19,68),(400,'3.III.1 Impulsar en todos los niveles, particularmente en la educación media superior y superior, el acceso y permanencia de las mujeres en el Sistema Educativo, así como la conclusión oportuna de sus estudios.',3,19,69),(401,'3.III.2 Fomentar que los planes de estudio de todos los niveles incorporen una perspectiva de género, para inculcar desde una temprana edad la igualdad entre mujeres y hombres.',3,19,69),(402,'3.III.3 Incentivar la participación de las mujeres en todas las áreas del conocimiento, en particular en las relacionadas a las ciencias y la investigación.',3,19,69),(403,'3.III.4 Fortalecer los mecanismos de seguimiento para impulsar a través de la educación la participación de las mujeres en la fuerza laboral.',3,19,69),(404,'3.III.5 Robustecer la participación de las niñas y mujeres en actividades deportivas, para mejorar su salud y su desarrollo humano.',3,19,69),(405,'3.III.6 Promover la participación equitativa de las mujeres en actividades culturales.',3,19,69),(406,'4.1.1.1 Diseñar una política hacendaria integral que permita al gobierno mantener un nivel adecuado de gasto ante diversos escenarios macroeconómicos y que garantice la viabilidad de las finanzas públicas.',4,20,70),(407,'4.1.1.2 Reducir la vulnerabilidad de las finanzas públicas federales ante caídas inesperadas del precio del petróleo y disminuir su dependencia estructural de ingresos de fuentes no renovables.',4,20,70),(408,'4.1.1.3 Fortalecer y, en su caso, establecer fondos o instrumentos financieros de transferencia de riesgos para mitigar el impacto fiscal de choques externos, incluyendo los desastres naturales.',4,20,70),(409,'4.1.1.4 Administrar la deuda pública para propiciar de forma permanente el acceso a diversas fuentes de financiamiento a largo plazo y bajo costo.',4,20,70),(410,'4.1.1.5 Fomentar la adecuación del marco normativo en las materias de responsabilidad hacendaria y deuda pública de las entidades federativas y los municipios, para que fortalezcan sus haciendas públicas.',4,20,70),(411,'4.1.1.6 Promover un saneamiento de las finanzas de las entidades paraestatales.',4,20,70),(412,'4.1.1.7 Desincorporar del Gobierno Federal las entidades paraestatales que ya no satisfacen el objeto para el que fueron creadas o en los casos en que éste puede ser atendido de manera más eficiente por otras instancias.',4,20,70),(413,'4.1.2.1 Incrementar la capacidad financiera del Estado Mexicano con ingresos estables y de carácter permanente.',4,20,71),(414,'4.1.2.2 Hacer más equitativa la estructura impositiva para mejorar la distribución de la carga fiscal.',4,20,71),(415,'4.1.2.3 Adecuar el marco legal en materia fiscal de manera eficiente y equitativa para que sirva como palanca del desarrollo.',4,20,71),(416,'4.1.2.4 Revisar el marco del federalismo fiscal para fortalecer las finanzas públicas de las entidades federativas y municipios.',4,20,71),(417,'4.1.2.5 Promover una nueva cultura contributiva respecto de los derechos y garantías de los contribuyentes.',4,20,71),(418,'4.1.3.1 Consolidar un Sistema de Evaluación del Desempeño y Presupuesto basado en Resultados.',4,20,72),(419,'4.1.3.2 Modernizar el sistema de contabilidad gubernamental.',4,20,72),(420,'4.1.3.3 Moderar el gasto en servicios personales al tiempo que se fomente el buen desempeño de los empleados gubernamentales.',4,20,72),(421,'4.1.3.4 Procurar la contención de erogaciones correspondientes a gastos de operación.',4,20,72),(422,'4.2.1.1 Realizar las reformas necesarias al marco legal y regulatorio del sistema financiero para democratizar el crédito.',4,21,73),(423,'4.2.1.2 Fomentar la entrada de nuevos participantes en el sistema financiero mexicano.',4,21,73),(424,'4.2.1.3 Promover la competencia efectiva entre los participantes del sector financiero.',4,21,73),(425,'4.2.1.4 Facilitar la transferencia de garantías crediticias en caso de refinanciamiento de préstamos.',4,21,73),(426,'4.2.1.5 Incentivar la portabilidad de operaciones entre instituciones, de manera que se facilite la movilidad de los clientes de las instituciones financieras.',4,21,73),(427,'4.2.1.6 Favorecer la coordinación entre autoridades para propiciar la estabilidad del sistema financiero.',4,21,73),(428,'4.2.1.7 Promover que las autoridades del sector financiero realicen una regulación efectiva y expedita del mismo, y que presten servicios a los usuarios del sector en forma oportuna y de acuerdo con tiempos previamente establecidos.',4,21,73),(429,'4.2.2.1 Robustecer la relación entre la Banca de Desarrollo y la banca social y otros prestadores de servicios financieros, para multiplicar el crédito a las empresas pequeñas y medianas.',4,21,74),(430,'4.2.2.2 Fortalecer la incorporación de educación financiera en los programas de educación básica y media.',4,21,74),(431,'4.2.2.3 Fortalecer el sistema de garantías para aumentar los préstamos y mejorar sus condiciones.',4,21,74),(432,'4.2.2.4 Promover el acceso y uso responsable de productos y servicios financieros.',4,21,74),(433,'4.2.3.1 Mantener un seguimiento continuo al desarrollo de políticas, estándares y mejores prácticas en el entorno internacional',4,21,75),(434,'4.2.3.2 Establecer y perfeccionar las normas prudenciales y mecanismos para evitar desequilibrios y fomentar el crecimiento económico del país.',4,21,75),(435,'4.2.4.1 Redefinir el mandato de la Banca de Desarrollo para propiciar el fomento de la actividad económica, a través de la inducción del crédito y otros servicios financieros en poblaciones con proyectos viables y necesidades atendibles que de otra forma quedarían excluidos.',4,21,76),(436,'4.2.4.2 Desarrollar capacidades técnicas, dotar de flexibilidad a la estructura organizacional y fortalecer los recursos humanos para fomentar la creación y promoción de productos y políticas adecuadas a las necesidades de los usuarios, permitiendo a las entidades de fomento incrementar su margen de acción.',4,21,76),(437,'4.2.4.3 Promover la participación de la banca comercial y de otros intermediarios regulados, en el financiamiento de sectores estratégicos.',4,21,76),(438,'4.2.4.4 Gestionar eficientemente el capital dentro y entre las diversas instituciones de la Banca de Desarrollo, para fomentar el desarrollo económico.',4,21,76),(439,'4.2.5.1 Apoyar el desarrollo de infraestructura con una visión de largo plazo basada en tres ejes rectores: i) desarrollo regional equilibrado, ii) desarrollo urbano y iii) conectividad logística.',4,21,77),(440,'4.2.5.2 Fomentar el desarrollo de relaciones de largo plazo entre instancias del sector público y del privado, para la prestación de servicios al sector público o al usuario final, en los que se utilice infraestructura provista total o parcialmente por el sector privado.',4,21,77),(441,'4.2.5.3 Priorizar los proyectos con base en su rentabilidad social y alineación al Sistema Nacional de Planeación Democrática.',4,21,77),(442,'4.2.5.4 Consolidar instrumentos de financiamiento flexibles para proyectos de infraestructura, que contribuyan a otorgar el mayor impulso posible al desarrollo de la infraestructura nacional.',4,21,77),(443,'4.2.5.5 Complementar el financiamiento de proyectos con alta rentabilidad social en los que el mercado no participa en términos de riesgo y plazo',4,21,77),(444,'4.2.5.6 Promover el desarrollo del mercado de capitales para el financiamiento de infraestructura.',4,21,77),(445,'4.3.1.1 Privilegiar la conciliación para evitar conflictos laborales.',4,22,78),(446,'4.3.1.2 Mejorar la conciliación, procuración e impartición de justicia laboral.',4,22,78),(447,'4.3.1.3 Garantizar certeza jurídica para todas las partes en las resoluciones laborales.',4,22,78),(448,'4.3.2.1 Impulsar acciones para la adopción de una cultura de trabajo digno o decente.',4,22,79),(449,'4.3.2.2 Promover el respeto de los derechos humanos, laborales y de seguridad social.',4,22,79),(450,'4.3.2.3 Fomentar la recuperación del poder adquisitivo del salario vinculado al aumento de la productividad.',4,22,79),(451,'4.3.2.4 Contribuir a la erradicación del trabajo infantil.',4,22,79),(452,'4.3.3.1 Fortalecer los mecanismos de consejería, vinculación y colocación laboral.',4,22,80),(453,'4.3.3.2 Consolidar las políticas activas de capacitación para el trabajo y en el trabajo.',4,22,80),(454,'4.3.3.3 Impulsar, de manera focalizada, el autoempleo en la formalidad.',4,22,80),(455,'4.3.3.4 Fomentar el incremento de la productividad laboral con beneficios compartidos entre empleadores y empleados.',4,22,80),(456,'4.3.3.5 Promover la pertinencia educativa, la generación de competencias y la empleabilidad.',4,22,80),(457,'4.3.4.1 Tutelar los derechos laborales individuales y colectivos, así como promover las negociaciones contractuales entre los factores de la producción.',4,22,81),(458,'4.3.4.2 Otorgar créditos accesibles y sostenibles a los trabajadores formales.',4,22,81),(459,'4.3.4.3 Diseñar el proyecto del Seguro de Desempleo y coordinar su implementación.',4,22,81),(460,'4.3.4.4 Fortalecer y ampliar la cobertura inspectiva en materia laboral.',4,22,81),(461,'4.3.4.5 Promover la participación de las organizaciones de trabajadores y empleadores para mejorar las condiciones de seguridad y salud en los centros de trabajo.',4,22,81),(462,'4.3.4.6 Promover la protección de los derechos de los trabajadores mexicanos en el extranjero.',4,22,81),(463,'4.4.1.1 Alinear y coordinar programas federales, e inducir a los estatales y municipales para facilitar un crecimiento verde incluyente con un enfoque transversal.',4,23,82),(464,'4.4.1.2 Actualizar y alinear la legislación ambiental para lograr una eficaz regulación de las acciones que contribuyen a la preservación y restauración del medio ambiente y los recursos naturales.',4,23,82),(465,'4.4.1.3 Promover el uso y consumo de productos amigables con el medio ambiente y de tecnologías limpias, eficientes y de bajo carbono.',4,23,82),(466,'4.4.1.4 Establecer una política fiscal que fomente la rentabilidad y competitividad ambiental de nuestros productos y servicios.',4,23,82),(467,'4.4.1.5 Promover esquemas de financiamiento e inversiones de diversas fuentes que multipliquen los recursos para la protección ambiental y de recursos naturales.',4,23,82),(468,'4.4.1.6 Impulsar la planeación integral del territorio, considerando el ordenamiento ecológico y el ordenamiento territorial para lograr un desarrollo regional y urbano sustentable.',4,23,82),(469,'4.4.1.7 Impulsar una política en mares y costas que promueva oportunidades económicas, fomente la competitividad, la coordinación y enfrente los efectos del cambio climático protegiendo los bienes y servicios ambientales.',4,23,82),(470,'4.4.1.8 Orientar y fortalecer los sistemas de información para monitorear y evaluar el desempeño de la política ambiental.',4,23,82),(471,'4.4.1.9 Colaborar con organizaciones de la sociedad civil en materia de ordenamiento ecológico, desarrollo económico y aprovechamiento sustentable de los recursos naturales.',4,23,82),(472,'4.4.2.1 Asegurar agua suficiente y de calidad adecuada para garantizar el consumo humano y la seguridad alimentaria.',4,23,83),(473,'4.4.2.2 Ordenar el uso y aprovechamiento del agua en cuencas y acuíferos afectados por déficit y sobreexplotación, propiciando la sustentabilidad sin limitar el desarrollo.',4,23,83),(474,'4.4.2.3 Incrementar la cobertura y mejorar la calidad de los servicios de agua potable, alcantarillado y saneamiento.',4,23,83),(475,'4.4.2.4 Sanear las aguas residuales con un enfoque integral de cuenca que incorpore a los ecosistemas costeros y marinos.',4,23,83),(476,'4.4.2.5 Fortalecer el desarrollo y la capacidad técnica y financiera de los organismos operadores para la prestación de mejores servicios.',4,23,83),(477,'4.4.2.6 Fortalecer el marco jurídico para el sector de agua potable, alcantarillado y saneamiento.',4,23,83),(478,'4.4.2.7 Reducir los riesgos de fenómenos meteorológicos e hidrometeorológicos por inundaciones y atender sus efectos.',4,23,83),(479,'4.4.2.8 Rehabilitar y ampliar la infraestructura hidroagrícola.',4,23,83),(480,'4.4.3.1 Ampliar la cobertura de infraestructura y programas ambientales que protejan la salud pública y garanticen la conservación de los ecosistemas y recursos naturales.',4,23,84),(481,'4.4.3.2 Desarrollar las instituciones e instrumentos de política del Sistema Nacional de Cambio Climático.',4,23,84),(482,'4.4.3.3 Acelerar el tránsito hacia un desarrollo bajo en carbono en los sectores productivos primarios, industriales y de la construcción, así como en los servicios urbanos, turísticos y de transporte.',4,23,84),(483,'4.4.3.4 Promover el uso de sistemas y tecnologías avanzados, de alta eficiencia energética y de baja o nula generación de contaminantes o compuestos de efecto invernadero.',4,23,84),(484,'4.4.3.5 Impulsar y fortalecer la cooperación regional e internacional en materia de cambio climático, biodiversidad y medio ambiente.',4,23,84),(485,'4.4.3.6 Lograr un manejo integral de residuos sólidos, de manejo especial y peligrosos, que incluya el aprovechamiento de los materiales que resulten y minimice los riesgos a la población y al medio ambiente.',4,23,84),(486,'4.4.3.7 Realizar investigación científica y tecnológica, generar información y desarrollar sistemas de información para diseñar políticas ambientales y de mitigación y adaptación al cambio climático.',4,23,84),(487,'4.4.3.8 Lograr el ordenamiento ecológico del territorio en las regiones y circunscripciones políticas prioritarias y estratégicas, en especial en las zonas de mayor vulnerabilidad climática.',4,23,84),(488,'4.4.3.9 Continuar con la incorporación de criterios de sustentabilidad y educación ambiental en el Sistema Educativo Nacional, y fortalecer la formación ambiental en sectores estratégicos.',4,23,84),(489,'4.4.3.10 Contribuir a mejorar la calidad del aire, y reducir emisiones de compuestos de efecto invernadero mediante combustibles más eficientes, programas de movilidad sustentable y la eliminación de los apoyos ineficientes a los usuarios de los combustibles fósiles.',4,23,84),(490,'4.4.3.11 Lograr un mejor monitoreo de la calidad del aire mediante una mayor calidad de los sistemas de monitoreo existentes y una mejor cobertura de ciudades.',4,23,84),(491,'4.4.4.1 Promover la generación de recursos y beneficios a través de la conservación, restauración y aprovechamiento del patrimonio natural, con instrumentos económicos, financieros y de política pública innovadores.',4,23,85),(492,'4.4.4.2 Impulsar e incentivar la incorporación de superficies con aprovechamiento forestal, maderable y no maderable.',4,23,85),(493,'4.4.4.3 Promover el consumo de bienes y servicios ambientales, aprovechando los esquemas de certificación y generando la demanda para ellos, tanto a nivel gubernamental como de la población en general.',4,23,85),(494,'4.4.4.4 Fortalecer el capital social y las capacidades de gestión de ejidos y comunidades en zonas forestales y de alto valor para la conservación de la biodiversidad.',4,23,85),(495,'4.4.4.5 Incrementar la superficie del territorio nacional bajo modalidades de conservación, buenas prácticas productivas y manejo regulado del patrimonio natural.',4,23,85),(496,'4.4.4.6 Focalizar los programas de conservación de la biodiversidad y aprovechamiento sustentable de los recursos naturales, para generar beneficios en comunidades con población de alta vulnerabilidad social y ambiental.',4,23,85),(497,'4.4.4.7 Promover el conocimiento y la conservación de la biodiversidad, así como fomentar el trato humano a los animales.',4,23,85),(498,'4.4.4.8 Fortalecer los mecanismos e instrumentos para prevenir y controlar los incendios forestales.',4,23,85),(499,'4.4.4.9 Mejorar los esquemas e instrumentos de reforestación, así como sus indicadores para lograr una mayor supervivencia de plantas.',4,23,85),(500,'4.4.4.10 Recuperar los ecosistemas y zonas deterioradas para mejorar la calidad del ambiente',4,23,85),(501,'4.4.4.11 Recuperar los ecosistemas y zonas deterioradas para mejorar la calidad del ambiente y la provisión de servicios ambientales de los ecosistemas',4,23,85),(502,'4.5.1.1 Crear una red nacional de centros comunitarios de capacitación y educación digital.',4,24,86),(503,'4.5.1.2 Promover mayor oferta de los servicios de telecomunicaciones, así como la inversión privada en el sector, con el que se puedan ofrecer servicios electrónicos avanzados que mejoren el valor agregado de las actividades productivas.',4,24,86),(504,'4.5.1.3 Crear un programa de banda ancha que establezca los sitios a conectar cada año, así como la estrategia para conectar a las instituciones de investigación, educación, salud y gobierno que así lo requieran, en las zonas metropolitanas que cuentan con puntos de presencia del servicio de la Red Nacional de Impulso a la Banda Ancha (Red NIBA).',4,24,86),(505,'4.5.1.4 Continuar y ampliar la Campaña Nacional de Inclusión Digital.',4,24,86),(506,'4.5.1.5 Crear un programa de trabajo para dar cabal cumplimiento a la política para la transición a la Televisión Digital Terrestre.',4,24,86),(507,'4.5.1.6 Aumentar el uso del Internet mediante el desarrollo de nuevas redes de fibra óptica que permitan extender la cobertura a lo largo del territorio nacional.',4,24,86),(508,'4.5.1.7 Promover la competencia en la televisión abierta.',4,24,86),(509,'4.5.1.8 Fomentar el uso óptimo de las bandas de 700 MHz y 2.5 GHz bajo principios de acceso universal, no discriminatorio, compartido y continuo.',4,24,86),(510,'4.5.1.9 Impulsar la adecuación del marco regulatorio del Servicio Postal Mexicano para fomentar su eficiencia y sinergias con otras dependencias.',4,24,86),(511,'4.5.1.10 Promover participaciones público-privadas en el despliegue, en el desarrollo y en el uso eficiente de la infraestructura de conectividad en el país.',4,24,86),(512,'4.5.1.11 Desarrollar e implementar un sistema espacial de alerta temprana que ayude en la prevención, mitigación y respuesta rápida a emergencias y desastres naturales.',4,24,86),(513,'4.5.1.12 Desarrollar e implementar la infraestructura espacial de banda ancha, incorporando nuevas tecnologías satelitales y propiciando la construcción de capacidades nacionales para las siguientes generaciones satelitales.',4,24,86),(514,'4.5.1.13 Contribuir a la modernización del transporte terrestre, aéreo y marítimo, a través de la implementación de un sistema espacial basado en tecnología satelital de navegación global.',4,24,86),(515,'4.6.1.1 Promover la modificación del marco institucional para ampliar la capacidad del Estado Mexicano en la exploración y producción de hidrocarburos, incluidos los de yacimientos no convencionales como los lutita.',4,24,87),(516,'4.6.1.2 Fortalecer la capacidad de ejecución de Petróleos Mexicanos.',4,25,87),(517,'4.6.1.3 Incrementar las reservas y tasas de restitución de hidrocarburos.',4,25,87),(518,'4.6.1.4 Elevar el índice de recuperación y la obtención de petróleo crudo y gas natural.',4,25,87),(519,'4.6.1.5 Fortalecer el mercado de gas natural mediante el incremento de la producción y el robustecimiento en la infraestructura de importación, transporte y distribución, para asegurar el abastecimiento de energía en óptimas condiciones de seguridad, calidad y precio.',4,25,87),(520,'4.6.1.6 Incrementar la capacidad y rentabilidad de las actividades de refinación, y reforzar la infraestructura para el suministro de petrolíferos en el mercado nacional.',4,25,87),(521,'4.6.1.7 Promover el desarrollo de una industria petroquímica rentable y eficiente',4,25,87),(522,'4.6.2.1 Impulsar la reducción de costos en la generación de energía eléctrica para que disminuyan las tarifas que pagan las empresas y las familias mexicanas.',4,25,88),(523,'4.6.2.2 Homologar las condiciones de suministro de energía eléctrica en el país.',4,25,88),(524,'4.6.2.3 Diversificar la composición del parque de generación de electricidad considerando las expectativas de precios de los energéticos a mediano y largo plazos.',4,25,88),(525,'4.6.2.4 Modernizar la red de transmisión y distribución de electricidad.',4,25,88),(526,'4.6.2.5 Promover el uso eficiente de la energía, así como el aprovechamiento de fuentes renovables, mediante la adopción de nuevas tecnologías y la implementación de mejores prácticas.',4,25,88),(527,'4.6.2.6 Promover la formación de nuevos recursos humanos en el sector, incluyendo los que se especialicen en la energía nuclear.',4,25,88),(528,'4.7.1.1 Aplicar eficazmente la legislación en materia de competencia económica para prevenir y eliminar las prácticas monopólicas y las concentraciones que atenten contra la competencia.',4,26,89),(529,'4.7.1.2 Impulsar marcos regulatorios que favorezcan la competencia y la eficiencia de los mercados.',4,26,89),(530,'4.7.1.3 Desarrollar las normas que fortalezcan la calidad de los productos nacionales, y promover la confianza de los consumidores en los mismos.',4,26,89),(531,'4.7.2.1 Fortalecer la convergencia de la Federación con los otros órdenes de gobierno, para impulsar una agenda común de mejora regulatoria que incluya políticas de revisión normativa, de simplificación y homologación nacional de trámites, así como medidas para facilitar la creación y escalamiento de empresas, fomentando el uso de herramientas electrónicas.',4,26,90),(532,'4.7.2.2 Consolidar mecanismos que fomenten la cooperación regulatoria entre países.',4,26,90),(533,'4.7.3.1 Mejorar el sistema para emitir de forma eficiente normas que incidan en el desempeño de los sectores productivos e impulsen a su vez un mayor contenido tecnológico.',4,26,91),(534,'4.7.3.2 Construir un mecanismo autosostenible de elaboración de normas y la evaluación de su cumplimiento.',4,26,91),(535,'4.7.3.3 Impulsar conjuntamente con los sectores productivos del país, el reconocimiento de la sociedad de los sellos NOM y NMX como expresión de la calidad de los productos.',4,26,91),(536,'4.7.3.4 Transformar las normas, y su evaluación, de barreras técnicas al comercio, a instrumentos de apertura de mercado en otros países, apalancadas en los tratados de libre comercio, a través de la armonización, evaluación de la conformidad y reconocimiento mutuo.',4,26,91),(537,'4.7.3.5 Desarrollar eficazmente los mecanismos, sistemas e incentivos que promuevan la evaluación de la conformidad de los productos y servicios nacionales con dichas normas.',4,26,91),(538,'4.7.3.6 Promover las reformas legales que permitan la eficaz vigilancia y sanción del incumplimiento de las normas, para garantizar la competencia legítima en los mercados.',4,26,91),(539,'4.7.4.1 Mejorar el régimen jurídico aplicable a la inversión extranjera, así como revisar la vigencia y racionalidad de barreras existentes a la inversión en sectores relevantes.',4,26,92),(540,'4.7.4.2 Identificar inhibidores u obstáculos, sectoriales o transversales que afectan negativamente el clima de inversión.',4,26,92),(541,'4.7.4.3 Fortalecer los instrumentos estadísticos en materia de inversión extranjera.',4,26,92),(542,'4.7.4.4 Diseñar e implementar una estrategia integral transversal, con el fin de atraer inversiones, generar empleo, incrementar el contenido nacional en las exportaciones y posicionar a México como un país altamente competitivo.',4,26,92),(543,'4.7.5.1 Modernizar los sistemas de atención y procuración de justicia respecto a los derechos del consumidor.',4,26,93),(544,'4.7.5.2 Desarrollar el Sistema Nacional de Protección al Consumidor, que integre y coordine las acciones de los gobiernos, poderes y sociedad civil, para que el ciudadano cuente con los elementos necesarios y haga valer sus derechos en cualquier circunstancia.',4,26,93),(545,'4.7.5.3 Fortalecer la Red inteligente de Atención al Consumidor como un medio para que el Estado responda eficientemente a las demandas de la población.',4,26,93),(546,'4.7.5.4 Establecer el Acuerdo Nacional para la Protección de los Derechos de los Consumidores, buscando una mayor participación y compromiso de los actores económicos en torno a las relaciones comerciales',4,26,93),(547,'4.8.1.1 Implementar una política de fomento económico que contemple el diseño y desarrollo de agendas sectoriales y regionales, el desarrollo de capital humano innovador, el impulso de sectores estratégicos de alto valor, el desarrollo y la promoción de cadenas de valor en sectores estratégicos y el apoyo a la innovación y el desarrollo tecnológico.',4,27,94),(548,'4.8.1.2 Articular, bajo una óptica transversal, sectorial y/o regional, el diseño, ejecución y seguimiento de proyectos orientados a fortalecer la competitividad del país, por parte de los tres órdenes de gobierno, iniciativa privada y otros sectores de la sociedad.',4,27,94),(549,'4.8.2.1 Fomentar el incremento de la inversión en el sector minero.',4,27,95),(550,'4.8.2.2 Procurar el aumento del financiamiento en el sector minero y su cadena de valor.',4,27,95),(551,'4.8.2.3 Asesorar a las pequeñas y medianas empresas en las etapas de exploración, explotación y comercialización en la minería.',4,27,95),(552,'4.8.3.1 Promover las contrataciones del sector público como herramienta para operar programas de desarrollo de proveedores, enfocados a incrementar la participación de empresas nacionales en la cadena de valor y mejorar las condiciones de compra para las dependencias y entidades.',4,27,96),(553,'4.8.3.2 Implementar esquemas de compras públicas estratégicas que busquen atraer inversión y transferencia de tecnologías.',4,27,96),(554,'4.8.3.3 Promover la innovación a través de la demanda de bienes y servicios del gobierno.',4,27,96),(555,'4.8.3.4 Incrementar el aprovechamiento de las reservas de compras negociadas en los tratados de libre comercio.',4,27,96),(556,'4.8.3.5 Desarrollar un sistema de compensaciones industriales para compras estratégicas de gobierno.',4,27,96),(557,'4.8.3.6 Fortalecer los mecanismos para asegurar que las compras de gobierno privilegien productos certificados conforme a las Normas Oficiales Mexicanas.',4,27,96),(558,'4.8.4.1 Apoyar la inserción exitosa de las micro, pequeñas y medianas empresas a las cadenas de valor de los sectores estratégicos de mayor dinamismo, con más potencial de crecimiento y generación de empleo, de común acuerdo con los gobiernos de las entidades federativas del país',4,27,97),(559,'4.8.4.2 Impulsar la actividad emprendedora mediante la generación de un entorno educativo, de financiamiento, protección legal y competencia adecuados.',4,27,97),(560,'4.8.4.3 Diseñar e implementar un sistema de información, seguimiento, evaluación y difusión del impacto de emprendedores y micro, pequeñas y medianas empresas.',4,27,97),(561,'4.8.4.4 Impulsar programas que desarrollen capacidades intensivas en tecnologías de la información y la comunicación, así como la innovación para promover la creación de ecosistemas de alto valor agregado de las micro, pequeñas y medianas empresas.',4,27,97),(562,'4.8.4.5 Mejorar los servicios de asesoría técnica para generar una cultura empresarial.',4,27,97),(563,'4.8.4.6 Facilitar el acceso a financiamiento y capital para emprendedores y micro, pequeñas y medianas empresas.',4,27,97),(564,'4.8.4.7 Crear vocaciones emprendedoras desde temprana edad para aumentar la masa crítica de emprendedores.',4,27,97),(565,'4.8.4.8 Apoyar el escalamiento empresarial de las micro, pequeñas y medianas empresas mexicanas.',4,27,97),(566,'4.8.4.9 Incrementar la participación de micro, pequeñas y medianas empresas en encadenamientos productivos, así como su capacidad exportadora.',4,27,97),(567,'4.8.4.10 Fomentar los proyectos de los emprendedores sociales, verdes y de alto impacto.',4,27,97),(568,'4.8.4.11 Impulsar la creación de ocupaciones a través del desarrollo de proyectos de emprendedores.',4,27,97),(569,'4.8.4.12 Fomentar la creación y sostenibilidad de las empresas pequeñas formales.',4,27,97),(570,'4.8.5.1 Realizar la promoción, visibilización, desarrollo y cooperación regional e intersectorial de las empresas de la economía social, para mitigar las diferentes formas de exclusión económica y productiva.',4,27,98),(571,'4.8.5.2 Fortalecer las capacidades técnicas, administrativas, financieras y gerenciales de las empresas de la economía social.',4,27,98),(572,'4.9.1.1 Fomentar que la construcción de nueva infraestructura favorezca la integración logística y aumente la competitividad derivada de una mayor interconectividad.',4,28,99),(573,'4.9.1.2 Evaluar las necesidades de infraestructura a largo plazo para el desarrollo de la economía, considerando el desarrollo regional, las tendencias demográficas, las vocaciones económicas y la conectividad internacional, entre otros.',4,28,99),(574,'4.9.1.3 Consolidar y/o modernizar los ejes troncales transversales y longitudinales estratégicos, y concluir aquellos que se encuentren pendientes. (SECTOR CARRETERO)',4,28,99),(575,'4.9.1.4 Mejorar y modernizar la red de caminos rurales y alimentadores. (SECTOR CARRETERO)',4,28,99),(576,'4.9.1.5 Conservar y mantener en buenas condiciones los caminos rurales de las zonas más marginadas del país, a través del Programa de Empleo Temporal (PET) (SECTOR CARRETERO)',4,28,99),(577,'4.9.1.6 Modernizar las carreteras interestatales. (SECTOR CARRETERO)Ã?',4,28,99),(578,'4.9.1.7 Llevar a cabo la construcción de libramientos, incluyendo entronques, distribuidores y accesos. (SECTOR CARRETERO)',4,28,99),(579,'4.9.1.8 Ampliar y construir tramos carreteros mediante nuevos esquemas de financiamiento. (SECTOR CARRETERO)',4,28,99),(580,'4.9.1.9 Realizar obras de conexión y accesos a nodos logísticos que favorezcan el tránsito intermodal. (SECTOR CARRETERO)',4,28,99),(581,'4.9.1.10 Garantizar una mayor seguridad en las vías de comunicación, a través de mejores condiciones físicas de la red y sistemas inteligentes de transporte. (SECTOR CARRETERO)',4,28,99),(582,'4.9.1.11 Construir nuevos tramos ferroviarios, libramientos, acortamientos y relocalización de vías férreas que permitan conectar nodos del Sistema Nacional de Plataformas Logísticas. (SECTOR FERROVIARIO)',4,28,99),(583,'4.9.1.12 Vigilar los programas de conservación y modernización de vías férreas y puentes, para mantener en condiciones adecuadas de operación la infraestructura sobre la que circulan los trenes. (SECTOR FERROVIARIO)',4,28,99),(584,'4.9.1.13 Promover el establecimiento de un programa integral de seguridad estratégica ferroviaria. (SECTOR FERROVIARIO)',4,28,99),(585,'4.9.1.14 Mejorar la movilidad de las ciudades mediante sistemas de transporte urbano masivo, congruentes con el desarrollo urbano sustentable, aprovechando las tecnologías para optimizar el desplazamiento de las personas. (TRANSPORTE URBANO MASIVO)',4,28,99),(586,'4.9.1.15 Fomentar el uso del transporte público masivo mediante medidas complementarias de transporte peatonal, de utilización de bicicletas y racionalización del uso del automóvil. (TRANSPORTE URBANO MASIVO)',4,28,99),(587,'4.9.1.16 Fomentar el desarrollo de puertos marítimos estratégicos de clase internacional, que potencien la ubicación geográfica privilegiada de México, impulsen las exportaciones, el comercio internacional y el mercado interno. (SECTOR MARITIMO PORTUARIO)',4,28,99),(588,'4.9.1.17 Mejorar la conectividad ferroviaria y carretera del sistema portuario. (SECTOR MARITIMO PORTUARIO)',4,28,99),(589,'4.9.1.18 Generar condiciones que permitan la logística ágil y moderna en los nodos portuarios, que apoye el crecimiento de la demanda, la competitividad y la diversificación del comercio exterior y de la economía. (SECTOR MARITIMO PORTUARIO)',4,28,99),(590,'4.9.1.19 Ampliar la capacidad instalada de los puertos, principalmente en aquellos con problemas de saturación o con una situación logística privilegiada. (SECTOR MARITIMO PORTUARIO)',4,28,99),(591,'4.9.1.20 Reducir los tiempos para el tránsito de carga en las terminales especializadas. (SECTOR MARITIMO PORTUARIO)',4,28,99),(592,'4.9.1.21 Agilizar la tramitología aduanal y fiscal en los puertos del país, incorporando para ello tecnologías de punta. (SECTOR MARITIMO PORTUARIO)',4,28,99),(593,'4.9.1.22 Incentivar el relanzamiento de la marina mercante mexicana. (SECTOR MARITIMO PORTUARIO)',4,28,99),(594,'4.9.1.23 Fomentar el desarrollo del cabotaje y el transporte marítimo de corta distancia, para impulsar como vía alterna a la terrestre el tránsito de mercancías. (SECTOR MARITIMO PORTUARIO)',4,28,99),(595,'4.9.1.24 Dar una respuesta de largo plazo a la demanda creciente de servicios aeroportuarios en el Valle de México y centro del país (SECTOR AEROPORTUARIO)',4,28,99),(596,'4.9.1.25 Desarrollar los aeropuertos regionales y mejorar su interconexión a través de la modernización de la Red de Aeropuertos y Servicios Auxiliares, bajo esquemas que garanticen su operación y conservación eficiente, así como su rentabilidad operativa. (SECTOR AEROPORTUARIO)',4,28,99),(597,'4.9.1.26 Supervisar el desempeño de las aerolíneas nacionales para garantizar altos estándares de seguridad, eficiencia y calidad en sus servicios. (SECTOR AEROPORTUARIO)',4,28,99),(598,'4.9.1.27 Promover la certificación de aeropuertos con base en estándares internacionales, así como la capacitación de pilotos y controladores aéreos. (SECTOR AEROPORTUARIO)',4,28,99),(599,'4.9.1.28 Continuar con el programa de formalizacón de nuevos convenios bilaterales aéreos para incrementar la penetración de la aviación nacionale en los mercados mundiales. (SECTOR AEROPORTUARIO)',4,28,99),(600,'4.9.1.29 Continuar con la elaboración de normas básicas de seguridad y actualizar la reglamentación en temas de seguridad. (SECTOR AEROPORTUARIO)',4,28,99),(601,'4.9.1.30 Dar certidumbre a la inversión en el sector aeronáutico y aeroportuario. (SECTOR AEROPORTUARIO)',4,28,99),(602,'4.10.1.1 Orientar la investigación y desarrollo tecnológico hacia la generación de innovaciones que aplicadas al sector agroalimentario eleven la productividad y competitividad.',4,29,100),(603,'4.10.1.2 Desarrollar las capacidades productivas con visión empresarial.',4,29,100),(604,'4.10.1.3 Impulsar la capitalización de las unidades productivas, la modernización de la infraestructura y el equipamiento agroindustrial y pesquero.',4,29,100),(605,'4.10.1.4 Fomentar el financiamiento oportuno y competitivo.',4,29,100),(606,'4.10.1.5 Impulsar una política comercial con enfoque de agronegocios y la planeación del balance de demanda y oferta, para garantizar un abasto oportuno, a precios competitivos, coadyuvando a la seguridad alimentaria.',4,29,100),(607,'4.10.1.6 Apoyar la producción y el ingreso de los campesinos y pequeños productores agropecuarios y pesqueros de las zonas rurales más pobres, generando alternativas para que se incorporen a la economía de manera más productiva.',4,29,100),(608,'4.10.1.7 Fomentar la productividad en el sector agroalimentario, con un énfasis en proyectos productivos sostenibles, el desarrollo de capacidades técnicas, productivas y comerciales, así como la integración de circuitos locales de producción, comercialización, inversión, financiamiento y ahorro.',4,29,100),(609,'4.10.1.8 Impulsar la competitividad logística para minimizar las pérdidas poscosecha de alimentos durante el almacenamiento y transporte.',4,29,100),(610,'4.10.1.9 Promover el desarrollo de las capacidades productivas y creativas de jóvenes, mujeres y pequeños productores.',4,29,100),(611,'4.10.1.1 Promover el desarrollo de conglomerados productivos y comerciales (clústeres de agronegocios) que articulen a los pequeños productores con empresas integradoras, así como de agroparques.',4,29,101),(612,'4.10.1.2 Instrumentar nuevos modelos de agronegocios que generen valor agregado a lo largo de la cadena productiva y mejoren el ingreso de los productores',4,29,101),(613,'4.10.1.3 Impulsar, en coordinación con los diversos órdenes de gobierno, proyectos productivos, rentables y de impacto regional.',4,29,101),(614,'4.10.3.1 Diseñar y establecer un mecanismo integral de aseguramiento frente a los riesgos climáticos y de mercado, que comprenda los diferentes eslabones de la cadena de valor, desde la producción hasta la comercialización, fomentando la inclusión financiera y la gestión eficiente de riesgos.',4,29,102),(615,'4.10.3.2 Priorizar y fortalecer la sanidad e inocuidad agroalimentaria para proteger la salud de la población, así como la calidad de los productos para elevar la competitividad del sector.',4,29,102),(616,'4.10.4.1 Promover la tecnificación del riego y optimizar el uso del agua.',4,29,103),(617,'4.10.4.2 Impulsar prácticas sustentables en las actividades agrícola, pecuaria, pesquera y acuícola.',4,29,103),(618,'4.10.4.3 Establecer instrumentos para rescatar, preservar y potenciar los recursos genéticos.',4,29,103),(619,'4.10.4.4 Aprovechar el desarrollo de la biotecnología, cuidando el medio ambiente y la salud humana.',4,29,103),(620,'4.10.5.1 Realizar una reingeniería organizacional y operativa.',4,29,104),(621,'4.10.5.2 Reorientar los programas para transitar de los subsidios ineficientes a los incentivos a la productividad y a la inversión.',4,29,104),(622,'4.10.5.3 Desregular, reorientar y simplificar el marco normativo del sector agroalimentario.',4,29,104),(623,'4.10.5.4 Fortalecer la coordinación interinstitucional para construir un nuevo rostro del campo.',4,29,104),(624,'4.11.1.1 Actualizar el marco normativo e institucional del sector turístico.',4,30,105),(625,'4.11.1.2 Promover la concurrencia de las acciones gubernamentales de las entidades federativas en materia de turismo, con las del Gobierno Federal.',4,30,105),(626,'4.11.1.3 Alinear la política turística de las entidades federativas a la Política Nacional Turística.',4,30,105),(627,'4.11.1.4 Impulsar la transversalidad presupuestal y programática de las acciones gubernamentales, coordinándolas hacia los objetivos de la Política Nacional Turística.',4,30,105),(628,'4.11.2.1 Fortalecer la investigación y generación del conocimiento turístico.',4,30,106),(629,'4.11.2.2 Fortalecer la infraestructura y la calidad de los servicios y los productos turísticos.',4,30,106),(630,'4.11.2.3 Diversificar e innovar la oferta de productos y consolidar destinos.',4,30,106),(631,'4.11.2.4 Posicionar adicionalmente a México como un destino atractivo en segmentos poco desarrollados, además del de sol y playa, como el turismo cultural, ecoturismo y aventura, salud, deportes, de lujo, de negocios y reuniones, cruceros, religioso, entre otros.',4,30,106),(632,'4.11.2.5 Concretar un Sistema Nacional de Certificación para asegurar la calidad.',4,30,106),(633,'4.11.2.6 Desarrollar agendas de competitividad por destinos.',4,30,106),(634,'4.11.2.7 Fomentar la colaboración y coordinación con el sector privado, gobiernos locales y prestadores de servicios.',4,30,106),(635,'4.11.2.8 Imprimir en el Programa Nacional de Infraestructura un claro enfoque turístico.',4,30,106),(636,'4.11.3.1 Fomentar y promover esquemas de financiamiento al sector con la Banca de Desarrollo.',4,30,107),(637,'4.11.3.2 Incentivar las inversiones turísticas de las micro, pequeñas y medianas empresas.',4,30,107),(638,'4.11.3.3 Promover en todas las dependencias gubernamentales de los tres órdenes de gobierno los esquemas de simplificación y agilización de trámites para la inversión.',4,30,107),(639,'4.11.3.4 Elaborar un plan de conservación, consolidación y replanteamiento de los Centros Integralmente Planeados (CIP), así como la potenciación de las reservas territoriales con potencial turístico en manos del Estado.',4,30,107),(640,'4.11.3.5 Diseñar una estrategia integral de promoción turística internacional para proyectar una imagen de confiabilidad y modernidad.',4,30,107),(641,'4.11.3.6 Detonar el crecimiento del mercado interno a través del desarrollo de nuevos productos turísticos, para consolidarlo como el principal mercado nacional.',4,30,107),(642,'4.11.4.1 Crear instrumentos para que el turismo sea una industria limpia, consolidando el modelo turístico basado en criterios de sustentabilidad social, económica y ambiental.',4,30,108),(643,'4.11.4.2 Impulsar el cuidado y preservación del patrimonio cultural, histórico y natural del país.',4,30,108),(644,'4.11.4.3 Convertir al turismo en fuente de bienestar social.',4,30,108),(645,'4.11.4.4 Crear programas para hacer accesible el turismo a todos los mexicanos.',4,30,108),(646,'4.11.4.5 Promover el ordenamiento territorial, así como la seguridad integral y protección civil.',4,30,108),(647,'4.I.1 Promover el desarrollo de productos financieros adecuados, modelos innovadores y uso de nuevas tecnologías para el acceso al financiamiento de las micro, pequeñas y medianas empresas.',4,31,109),(648,'4.I.2 Fomentar el acceso a crédito y servicios financieros del sector privado, con un énfasis en aquellos sectores con el mayor potencial de crecimiento e impacto en la productividad, como el campo y las pequeñas y medianas empresas.',4,31,109),(649,'4.I.3 Garantizar el acceso a la energía eléctrica de calidad y con el menor costo de largo plazo.',4,31,109),(650,'4.I.4 Aumentar la cobertura de banda ancha en todo el país, incluyendo zonas de escasos recursos, además de incrementar el número de usuarios del Internet y de los demás servicios de comunicaciones, buscando sistemáticamente una reducción de costos.',4,31,109),(651,'4.I.5 Impulsar la economía digital y fomentar el desarrollo de habilidades en el uso de tecnologías',4,31,109),(652,'4.I.6 Fomentar y ampliar la inclusión laboral, particularmente hacia los jóvenes, las mujeres y los grupos en situación de vulnerabilidad para incrementar su productividad.',4,31,109),(653,'4.I.7 Promover permanentemente la mejora regulatoria que reduzca los costos de operación de las empresas, aumente la competencia y amplíe el acceso a insumos a precios competitivos.',4,31,109),(654,'4.I.8 Propiciar la disminución de los costos que enfrentan las empresas al contratar a trabajadores formales.',4,31,109),(655,'4.I.9 Desarrollar una infraestructura logística que integre a todas las regiones del país con los mercados nacionales e internacionales, de forma que las empresas y actividades productivas puedan expandirse en todo el territorio nacional.',4,31,109),(656,'4.I.10 Promover políticas de desarrollo productivo acordes a las vocaciones productivas de cada región.',4,31,109),(657,'4.I.11 Impulsar el desarrollo de la región Sur-Sureste mediante una política integral que fortalezca los fundamentos de su economía, aumente su productividad y la vincule efectivamente con el resto del país.',4,31,109),(658,'4.I.12 Revisar los programas gubernamentales para que no generen distorsiones que inhiban el crecimiento de las empresas productivas.',4,31,109),(659,'4.II.1 Modernizar la Administración Pública Federal con base en el uso de tecnologías de la información y la comunicación.',4,31,110),(660,'4.II.2 Simplificar las disposiciones fiscales para mejorar el cumplimiento voluntario de las obligaciones fiscales y facilitar la incorporación de un mayor número de contribuyentes al padrón fiscal.',4,31,110),(661,'4.II.3 Fortalecer y modernizar el Registro Público de Comercio y promover la modernización de los registros públicos de la propiedad en las entidades federativas.',4,31,110),(662,'4.II.4 Garantizar la continuidad de la política de mejora regulatoria en el gobierno y dotar de una adecuada coordinación a las decisiones tomadas tanto por las diversas instancias de la Administración como por otros órganos administrativos constitucionales autónomos a nivel nacional.',4,31,110),(663,'4.II.5 Modernizar, formal e instrumentalmente, los esquemas de gestión de la propiedad industrial, con el fin de garantizar la seguridad jurídica y la protección del Estado a las invenciones y a los signos distintivos.',4,31,110),(664,'4.II.6 Realizar un eficaz combate a las prácticas comerciales desleales o ilegales.',4,31,110),(665,'4.II.7 Mejorar el sistema para emitir de forma eficiente normas que incidan en el horizonte de los sectores productivos e impulsen a su vez un mayor contenido tecnológico.',4,31,110),(666,'4.II.8 Fortalecer las Normas Oficiales Mexicanas relacionadas con las denominaciones de origen.',4,31,110),(667,'4.II.9 Combatir y castigar el delito ambiental, fortaleciendo los sistemas de prevención, investigación, vigilancia, inspección y sanción.',4,31,110),(668,'4.III.1 Promover la inclusión de mujeres en los sectores económicos a través del financiamiento para las iniciativas productivas.',4,31,111),(669,'4.III.2 Desarrollar productos financieros que consideren la perspectiva de género.',4,31,111),(670,'4.III.3 Fortalecer la educación financiera de las mujeres para una adecuada integración al sistema financiero.',4,31,111),(671,'4.III.4 Impulsar el empoderamiento económico de las mujeres a través de la remoción de obstáculos que impiden su plena participación en las actividades económicas remuneradas.',4,31,111),(672,'4.III.5 Fomentar los esfuerzos de capacitación laboral que ayuden a las mujeres a integrarse efectivamente en los sectores con mayor potencial productivo.',4,31,111),(673,'4.III.6 Impulsar la participación de las mujeres en el sector emprendedor a través de la asistencia técnica.',4,31,111),(674,'4.III.7 Desarrollar mecanismos de evaluación sobre el uso efectivo de recursos públicos destinados a promover y hacer vigente la igualdad de oportunidades entre mujeres y hombres.',4,31,111),(675,'5.1.1.1 Ampliar y profundizar el diálogo bilateral con Estados Unidos, con base en una agenda que refleje la diversidad, la complejidad y el potencial de la relación.',5,32,112),(676,'5.1.1.2 Impulsar la modernización integral de la zona fronteriza como un instrumento para dinamizar los intercambios bilaterales.',5,32,112),(677,'5.1.1.3 Reforzar las labores de atención a las comunidades mexicanas en Estados Unidos, promoviendo su bienestar y la observancia plena de sus derechos.',5,32,112),(678,'5.1.1.4 Consolidar la visión de responsabilidad compartida en materia de seguridad, con énfasis en aspectos preventivos y en el desarrollo social.',5,32,112),(679,'5.1.1.5 Fortalecer la relación bilateral con Canadá, aumentando la cooperación en temas prioritarios como migración, turismo, educación, productividad, innovación y desarrollo tecnológico, e impulsando el intercambio comercial entre ambos.',5,32,112),(680,'5.1.1.6 Apoyar los mecanismos y programas que prevén la participación de la sociedad civil, el sector privado y los gobiernos locales en la relación con Canadá.',5,32,112),(681,'5.1.1.7 Poner énfasis en el valor estratégico de la relación con Canadá desde una perspectiva tanto bilateral como regional.',5,32,112),(682,'5.1.1.8 Impulsar el diálogo político y técnico con los países de América del Norte, de manera que su participación en foros multilaterales especializados derive en beneficios regionales.',5,32,112),(683,'5.1.2.1 Fortalecer las relaciones diplomáticas con todos los países de la región, así como la participación en organismos regionales y subregionales como un medio para promover la unidad en torno a valores y principios compartidos.',5,32,113),(684,'5.1.2.2 Apoyar, especialmente en el marco del Proyecto Mesoamérica, los esfuerzos de desarrollo de las naciones de América Central y del Caribe, mediante una renovada estrategia de cooperación internacional que reduzca el costo de hacer negocios a través de la promoción de bienes públicos regionales así como de proyectos de infraestructura, interconexión eléctrica y telecomunicaciones.',5,32,113),(685,'5.1.2.3 Promover el desarrollo integral de la frontera sur como un catalizador del desarrollo regional en todos los ámbitos.',5,32,113),(686,'5.1.2.4 Identificar nuevas oportunidades de intercambio comercial y turístico que amplíen y dinamicen las relaciones económicas de México con la región latinoamericana y caribeña.',5,32,113),(687,'5.1.2.5 Ampliar la cooperación frente a retos compartidos como seguridad, migración y desastres naturales.',5,32,113),(688,'5.1.2.6 Fortalecer alianzas con países estratégicos, y mantener un papel activo en foros regionales y subregionales en temas prioritarios para México como energía, comercio, derechos humanos y fortalecimiento del derecho internacional.',5,32,113),(689,'5.1.3.1 Fortalecer el diálogo político con todos los países europeos, procurando ampliar los puntos de coincidencia en asuntos multilaterales.',5,32,114),(690,'5.1.3.2 Profundizar las asociaciones estratégicas con socios clave, a fin de expandir los intercambios y la cooperación.',5,32,114),(691,'5.1.3.3 Aprovechar la coyuntura económica actual para identificar nuevas oportunidades de intercambio, inversión y cooperación.',5,32,114),(692,'5.1.3.4 Ampliar los intercambios en el marco del tratado de libre comercio entre México y la Unión Europea, promoviendo la inversión recíproca y el comercio.',5,32,114),(693,'5.1.3.5 Impulsar la cooperación desde una perspectiva integral, especialmente en los ámbitos cultural, educativo, científico y tecnológico.',5,32,114),(694,'5.1.3.6 Consolidar a México como socio clave de la Unión Europea en la región latinoamericana, dando cabal contenido a los principios y objetivos de la Asociación Estratégica.',5,32,114),(695,'5.1.3.7 Promover un papel más activo de las representaciones diplomáticas, priorizando la inversión en tecnología avanzada y la cooperación en innovación.',5,32,114),(696,'5.1.3.8 Profundizar los acuerdos comerciales existentes y explorar la conveniencia y, en su caso, celebración de acuerdos comerciales internacionales con los países europeos que no son parte de la Unión Europea.',5,32,114),(697,'5.1.4.1 Incrementar la presencia de México en la región a fin de ampliar y profundizar las relaciones diplomáticas, comerciales y de cooperación con países que por su peso económico y proyección internacional constituyan socios relevantes.',5,32,115),(698,'5.1.4.2 Fortalecer la participación de México en foros regionales, destacando el Foro de Cooperación Económica Asia-Pacífico (APEC), la Asociación de Naciones del Sudeste Asiático (ANSEA), el Foro de Cooperación América Latina-Asia del Este (FOCALAE) y el Consejo de Cooperación Económica del Pacífico (PECC).',5,32,115),(699,'5.1.4.3 Identificar coincidencias en los temas centrales de la agenda internacional: cooperación para el desarrollo, combate al cambio climático, migración, entre otros.',5,32,115),(700,'5.1.4.4 Promover el acercamiento de los sectores empresarial y académico de México con sus contrapartes en los países de la región.',5,32,115),(701,'5.1.4.5 Apoyar la negociación del Acuerdo Estratégico Transpacífico de Asociación Económica y la expansión de intercambios.',5,32,115),(702,'5.1.4.6 Emprender una activa política de promoción y difusión que contribuya a un mejor conocimiento de México en la región.',5,32,115),(703,'5.1.4.7 Potenciar el diálogo con el resto de los países de la región, de forma tal que permita explorar mayores vínculos de cooperación e innovación tecnológica.',5,32,115),(704,'5.1.5.1 Ampliar la presencia de México en Medio Oriente y áfrica como medio para alcanzar el potencial existente en materia política, económica y cultural.',5,32,116),(705,'5.1.5.2 Impulsar el diálogo con países de especial relevancia en ambas regiones en virtud de su peso económico, su actividad diplomática o su influencia cultural.',5,32,116),(706,'5.1.5.3 Promover la cooperación para el desarrollo en temas de interés recíproco, como el sector energético y la seguridad alimentaria, y la concertación en temas globales como la seguridad, la prevención de conflictos y el desarme.',5,32,116),(707,'5.1.5.4 Aprovechar el reciente acercamiento entre los países de Medio Oriente y de América Latina para consolidar las relaciones comerciales y el intercambio cultural.',5,32,116),(708,'5.1.5.5 Impulsar proyectos de inversión mutuamente benéficos, aprovechando los fondos soberanos existentes en los países del Golfo Pérsico.',5,32,116),(709,'5.1.5.6 Emprender una política activa de promoción y difusión que contribuya a un mejor conocimiento de México en la región.',5,32,116),(710,'5.1.5.7 Apoyar, a través de la cooperación institucional, los procesos de democratización en marcha en diversos países de Medio Oriente y el norte de áfrica.',5,32,116),(711,'5.1.5.8 Vigorizar la agenda de trabajo en las representaciones diplomáticas de México en el continente africano, para impulsar la cooperación, el diálogo y los intercambios comerciales.',5,32,116),(712,'5.1.6.1 Impulsar firmemente la agenda de derechos humanos en los foros multilaterales y contribuir, mediante la interacción con los organismos internacionales correspondientes, a su fortalecimiento en el ámbito interno.',5,32,117),(713,'5.1.6.2 Promover los intereses de México en foros y organismos multilaterales, y aprovechar la pertenencia a dichos foros y organismos como un instrumento para impulsar el desarrollo de México.',5,32,117),(714,'5.1.6.3 Contribuir activamente en la definición e instrumentación de la agenda global de desarrollo de las Naciones Unidas, que entrará en vigor cuando concluya el periodo de vigencia de los Objetivos de Desarrollo del Milenio, en 2015.',5,32,117),(715,'5.1.6.4 Participar en los procesos de deliberación de la comunidad global dirigidos a codificar los regímenes jurídicos internacionales en temas como la seguridad alimentaria, la migración, las drogas, el cambio climático y la delincuencia organizada transnacional.',5,32,117),(716,'5.1.6.5 Impulsar la reforma del sistema de Naciones Unidas.',5,32,117),(717,'5.1.6.6 Reforzar la participación de México ante foros y organismos comerciales, de inversión y de propiedad intelectual.',5,32,117),(718,'5.1.6.7 Consensuar posiciones compartidas en foros regionales y globales en las áreas de interés para México.',5,32,117),(719,'5.1.6.8 Ampliar la presencia de funcionarios mexicanos en los organismos internacionales, fortaleciendo el capital humano en las instituciones multilaterales.',5,32,117),(720,'5.1.7.1 Impulsar proyectos de cooperación internacional que contribuyan a la prosperidad y estabilidad de regiones estratégicas.',5,32,118),(721,'5.1.7.2 Centrar la cooperación en sectores claves para nuestro desarrollo en función de la demanda externa, el interés nacional y las capacidades mexicanas, privilegiando la calidad por encima de la cantidad de proyectos.',5,32,118),(722,'5.1.7.3 Ampliar la política de cooperación internacional de México, asegurando que la Agencia Mexicana de Cooperación Internacional para el Desarrollo cumpla cabalmente su papel de coordinador y ejecutor de la cooperación internacional que provee el Estado Mexicano.',5,32,118),(723,'5.1.7.4 Coordinar las capacidades y recursos de las dependencias y los órganos del Gobierno de la República, con el fin de incrementar los alcances de la cooperación internacional que México otorga.',5,32,118),(724,'5.1.7.5 Ejecutar programas y proyectos financiados por el Fondo de Cooperación Internacional para el Desarrollo, así como por alianzas público-privadas.',5,32,118),(725,'5.1.7.6 Establecer el Registro Nacional de Información de Cooperación Internacional.',5,32,118),(726,'5.1.7.7 Ampliar la oferta de becas como parte integral de la política de cooperación internacional.',5,32,118),(727,'5.1.7.8 Hacer un uso más eficiente de nuestra membresía en organismos internacionales especializados que beneficien las acciones de cooperación de y hacia México.',5,32,118),(728,'5.2.1.1 Promover, en países y sectores prioritarios, un renovado interés para convertir a México en país clave para el comercio, inversiones y turismo.',5,33,119),(729,'5.2.1.2 Reforzar el papel de la Secretaría de Relaciones Exteriores en materia de promoción económica y turística, uniendo esfuerzos con ProMéxico, la Secretaría de Economía, el Consejo de Promoción Turística y la Secretaría de Turismo, para evitar duplicidades y lograr mayor eficiencia en la promoción de la inversión, las exportaciones y el turismo.',5,33,119),(730,'5.2.1.3 Difundir los contenidos culturales y la imagen de México mediante actividades de gran impacto, así como a través de los portales digitales de promoción.',5,33,119),(731,'5.2.1.4 Desarrollar y coordinar una estrategia integral de promoción de México en el exterior, con la colaboración de otras dependencias y de actores locales influyentes, incluyendo a los no gubernamentales.',5,33,119),(732,'5.2.1.5 Apoyar las labores de diplomacia parlamentaria como mecanismo coadyuvante en la promoción de los intereses nacionales.',5,33,119),(733,'5.2.1.6 Fortalecer el Servicio Exterior Mexicano y las representaciones de México en el exterior.',5,33,119),(734,'5.2.1.7 Expandir la presencia diplomática de México en las regiones económicamente más dinámicas.',5,33,119),(735,'5.2.2.1 Impulsar la imagen de México en el exterior mediante una amplia estrategia de diplomacia pública y cultural.',5,33,120),(736,'5.2.2.2 Promover que los mexicanos en el exterior contribuyan a la promoción de la imagen de México.',5,33,120),(737,'5.2.2.3 Emplear la cultura como instrumento para la proyección de México en el mundo, con base en las fortalezas del país.',5,33,120),(738,'5.2.2.4 Aprovechar los bienes culturales, entre ellos la lengua española y los productos de las industrias creativas, como instrumentos de intercambio diplomático, diálogo y cooperación.',5,33,120),(739,'5.2.2.5 Impulsar los vínculos de los sectores cultural, científico y educativo mexicano con sus similares en Latinoamérica y otras regiones del mundo.',5,33,120),(740,'5.3.1.1 Incrementar la cobertura de preferencias para productos mexicanos dentro de los acuerdos comerciales y de complementación económica vigentes, que correspondan a las necesidades de oportunidad que demandan los sectores productivos.',5,34,121),(741,'5.3.1.2 Propiciar el libre tránsito de bienes, servicios, capitales y personas.',5,34,121),(742,'5.3.1.3 Impulsar iniciativas con países afines en desarrollo y convencidos del libre comercio, como un generador del crecimiento, inversión, innovación y desarrollo tecnológico.',5,34,121),(743,'5.3.1.4 Profundizar la apertura comercial con el objetivo de impulsar el comercio transfronterizo de servicios, brindar certidumbre jurídica a los inversionistas, eliminar la incongruencia arancelaria, corregir su dispersión y simplificar la tarifa, a manera de instrumento de política industrial, cuidando el impacto en las cadenas productivas.',5,34,121),(744,'5.3.1.5 Negociar y actualizar acuerdos para la promoción y protección recíproca de las inversiones, como una herramienta para incrementar los flujos de capitales hacia México y proteger las inversiones de mexicanos en el exterior.',5,34,121),(745,'5.3.1.6 Participar activamente en los foros y organismos internacionales, a fin de reducir las barreras arancelarias y no arancelarias al comercio de bienes y servicios, aumentar el fomento de políticas que mejoren el bienestar económico y social de las personas e impulsar la profundización de las relaciones comerciales con nuestros socios comerciales.',5,34,121),(746,'5.3.1.7 Reforzar la participación de México en la Organización Mundial del Comercio (OMC) y colocarlo como un actor estratégico para el avance y consecución de las negociaciones dentro de dicho foro.',5,34,121),(747,'5.3.1.8 Fortalecer la cooperación con otras oficinas de propiedad industrial y mantener la asistencia técnica a países de economías emergentes.',5,34,121),(748,'5.3.1.9 Defender los intereses comerciales de México y de los productores e inversionistas nacionales frente a prácticas proteccionistas o violatorias de los compromisos internacionales por parte de nuestros socios comerciales.',5,34,121),(749,'5.3.1.10 Difundir las condiciones de México en el exterior para atraer mayores niveles de inversión extranjera.',5,34,121),(750,'5.3.1.11 Promover la calidad de bienes y servicios en el exterior para fomentar las exportaciones.',5,34,121),(751,'5.3.1.12 Impulsar mecanismos que favorezcan la internacionalización de las empresas mexicanas.',5,34,121),(752,'5.3.1.13 Implementar estrategias y acciones para que los productos nacionales tengan presencia en los mercados de otros países, a través de la participación en los foros internacionales de normalización.',5,34,121),(753,'5.3.2.1 Integrar a México en los nuevos bloques de comercio regional, a efecto de actualizar los tratados de libre comercio existentes y aprovechar el acceso a nuevos mercados en expansión como la región Asia-Pacífico y América Latina.',5,34,122),(754,'5.3.2.2 Profundizar nuestra integración con América del Norte, al pasar de la integración comercial a una integración productiva mediante la generación de cadenas de valor regionales.',5,34,122),(755,'5.3.2.3 Vigorizar la presencia de México en los mecanismos de integración económica de Asia-Pacífico, para establecer una relación firme y constructiva con la región.',5,34,122),(756,'5.3.2.4 Impulsar activamente el Acuerdo Estratégico Transpacífico de Asociación Económica, como estrategia fundamental para incorporar a la economía mexicana en la dinámica de los grandes mercados internacionales.',5,34,122),(757,'5.3.2.5 Consolidar el Proyecto de Integración y Desarrollo en Mesoamérica, para reducir los costos de hacer negocios en la región y hacerla más atractiva para la inversión.',5,34,122),(758,'5.3.2.6 Profundizar la integración comercial con América Latina mediante los acuerdos comerciales en vigor, iniciativas de negociación comercial en curso y la participación en iniciativas comerciales de vanguardia, como la Alianza del Pacífico, a fin de consolidar y profundizar el acceso preferencial de productos mexicanos a los países cocelebrantes (Chile, Colombia y Perú) y la integración de cadenas de valor entre los mismos, además de un incremento en la competitividad, así como mayores flujos de inversión hacia los países de esa región.',5,34,122),(759,'5.3.2.7 Promover nuevas oportunidades de intercambio comercial e integración económica con la Unión Europea.',5,34,122),(760,'5.3.2.8 Integrar la conformación de un directorio de exportadores y el diseño de campañas de promoción, con objeto de aprovechar de manera óptima los tratados de libre comercio y los acuerdos de complementación económica celebrados.',5,34,122),(761,'5.3.2.9 Fortalecer la presencia de México en áfrica mediante el impulso de acuerdos económicos y comerciales, para establecer una relación constructiva y permanente con la región.',5,34,122),(762,'5.3.2.10 Diversificar las exportaciones a través de la negociación o actualización de acuerdos comerciales con Europa o países de América.',5,34,122),(763,'5.4.1.1 Velar por el cabal respeto de los derechos de los mexicanos, dondequiera que se encuentren.',5,35,123),(764,'5.4.1.2 Promover una mejor inserción de nuestros connacionales en sus comunidades y contribuir al mejoramiento de su calidad de vida.',5,35,123),(765,'5.4.1.3 Desarrollar proyectos a nivel comunitario en áreas como educación, salud, cultura y negocios.',5,35,123),(766,'5.4.1.4 Fortalecer la relación estrecha con las comunidades de origen mexicano, y promover una mejor vinculación de los migrantes con sus comunidades de origen y sus familias.',5,35,123),(767,'5.4.1.5 Facilitar el libre tránsito de los mexicanos en el exterior.',5,35,123),(768,'5.4.1.6 Fomentar una mayor vinculación entre las comunidades mexicanas en el extranjero con sus poblaciones de origen y sus familias.',5,35,123),(769,'5.4.1.7 Apoyar al sector empresarial en sus intercambios y actividades internacionales.',5,35,123),(770,'5.4.1.8 Construir acuerdos y convenios de cooperación, a fin de actuar en coordinación con países expulsores de migrantes, como Guatemala, El Salvador, Honduras y Nicaragua, y así brindar una atención integral al fenómeno migratorio.',5,35,123),(771,'5.4.1.9 Impulsar una posición común y presentar iniciativas conjuntas sobre los retos en materia de migración en los foros internacionales pertinentes.',5,35,123),(772,'5.4.1.10 Activar una estrategia de promoción y empoderamiento de los migrantes mexicanos, a través de los consulados de México en Estados Unidos.',5,35,123),(773,'5.4.2.1 Revisar los acuerdos de repatriación de mexicanos, para garantizar que se respeten sus derechos y la correcta aplicación de los protocolos en la materia.',5,35,124),(774,'5.4.2.2 Fortalecer los programas de repatriación, a fin de salvaguardar la integridad física y emocional de las personas mexicanas repatriadas, así como para protegerlas de violaciones a sus derechos humanos.',5,35,124),(775,'5.4.2.3 Establecer mecanismos de control que permitan la repatriación controlada de connacionales e identificar aquellos con antecedentes delictivos procedentes del exterior.',5,35,124),(776,'5.4.2.4 Crear y fortalecer programas de certificación de habilidades y reinserción laboral, social y cultural, para las personas migrantes de retorno a sus comunidades de origen.',5,35,124),(777,'5.4.3.1 Diseñar mecanismos de facilitación migratoria para afianzar la posición de México como destino turístico y de negocio.',5,35,125),(778,'5.4.3.2 Facilitar la movilidad transfronteriza de personas y mercancías para dinamizar la economía regional.',5,35,125),(779,'5.4.3.3 Simplificar los procesos para la gestión migratoria de las personas que arriban o radican en México.',5,35,125),(780,'5.4.4.1 Elaborar un programa en materia de migración de carácter transversal e intersectorial, como el instrumento programático para el diseño, implementación, seguimiento y evaluación de la política y la gestión migratoria.',5,35,126),(781,'5.4.4.2 Promover una alianza intergubernamental entre México y los países de Centroamérica, para facilitar la movilidad de personas de manera regular, garantizar la seguridad humana y fomentar el desarrollo regional.',5,35,126),(782,'5.4.4.3 Crear un sistema nacional de información y estadística que apoye la formulación y evaluación de la política y la gestión migratoria.',5,35,126),(783,'5.4.4.4 Impulsar acciones dirigidas a reducir las condiciones de pobreza, violencia y desigualdad, para garantizar los derechos humanos de las personas migrantes, solicitantes de refugio, refugiadas y beneficiarias de protección complementaria.',5,35,126),(784,'5.4.4.5 Impulsar la creación de regímenes migratorios legales, seguros y ordenados.',5,35,126),(785,'5.4.4.6 Promover acciones dirigidas a impulsar el potencial de desarrollo que ofrece la migración.',5,35,126),(786,'5.4.4.7 Fortalecer los vínculos políticos, económicos, sociales y culturales con la comunidad mexicana en el exterior.',5,35,126),(787,'5.4.4.8 Diseñar y ejecutar programas de atención especial a grupos vulnerables de migrantes, como niñas, niños y adolescentes, mujeres embarazadas, víctimas de delitos graves cometidos en territorio nacional, personas con discapacidad y adultos mayores.',5,35,126),(788,'5.4.5.1 Implementar una política en materia de refugiados y protección complementaria.',5,35,127),(789,'5.4.5.2 Establecer mecanismos y acuerdos interinstitucionales para garantizar el acceso al derecho a la identidad de las personas migrantes y sus familiares.',5,35,127),(790,'5.4.5.3 Propiciar esquemas de trabajo entre las personas migrantes, que garanticen sus derechos así como el acceso a servicios de seguridad social y a la justicia en materia laboral.',5,35,127),(791,'5.4.5.4 Promover la convivencia armónica entre la población extranjera y nacional, combatir la discriminación y fomentar los vínculos con sus comunidades de origen.',5,35,127),(792,'5.4.5.5 Implementar una estrategia intersectorial dirigida a la atención y protección de migrantes víctimas de tráfico, trata y secuestro, con acciones diferenciadas por género, edad y etnia.',5,35,127),(793,'5.4.5.6 Promover la profesionalización, sensibilización, capacitación y evaluación del personal que labora en las instituciones involucradas en la atención de migrantes y sus familiares.',5,35,127),(794,'5.4.5.7 Fortalecer mecanismos para investigar y sancionar a los funcionarios públicos involucrados en las violaciones a derechos humanos y la comisión de delitos como la trata, extorsión y secuestro de migrantes.',5,35,127),(795,'5.4.5.8 Crear un sistema nacional único de datos para la búsqueda e identificación de las personas migrantes desaparecidas.',5,35,127),(796,'5.I.1 Dedicar atención especial a temas relacionados con la competitividad regional, como la infraestructura, el capital humano y los mercados laborales, para generar empleos a ambos lados de nuestras fronteras.',5,36,128),(797,'5.I.2 Fortalecer la alianza estratégica de Canadá, Estados Unidos y México, mediante el mejoramiento de las logísticas de transporte, la facilitación fronteriza, la homologación de normas en sectores productivos y la creación de nuevas cadenas de valor global, para competir estratégicamente con otras regiones del mundo.',5,36,128),(798,'5.I.3 Lograr una plataforma estratégica para el fortalecimiento de encadenamientos productivos, economías de escala y mayor eficiencia entre sus miembros.',5,36,128),(799,'5.I.4 Facilitar el comercio exterior impulsando la modernización de las aduanas, la inversión en infraestructura, la actualización e incorporación de mejores prácticas y procesos en materia aduanal.',5,36,128),(800,'5.I.5 Profundizar la política de desregulación y simplificación de los programas de comercio exterior, con el objetivo de reducir los costos asociados.',5,36,128),(801,'5.I.6 Diversificar los destinos de las exportaciones de bienes y servicios hacia mercados en la región Asia-Pacífico, privilegiando la incorporación de insumos nacionales y el fortalecimiento de nuestra integración productiva en América del Norte.',5,36,128),(802,'5.I.7 Privilegiar las industrias de alto valor agregado en la estrategia de promoción del país.',5,36,128),(803,'5.I.8 Apoyar al sector productivo mexicano en coordinación con otras dependencias como la Secretaría de Economía; la Secretaría de Agricultura, Ganadería, Desarrollo Rural, Pesca y Alimentación; la Secretaría de Comunicaciones y Transportes, la Secretaría de Turismo y la Secretaría de Energía.',5,36,128),(804,'5.II.1 Modernizar los sistemas y reducir los tiempos de gestión en las representaciones de México en el exterior, para atender de manera eficaz las necesidades de los connacionales.',5,36,129),(805,'5.II.2 Facilitar el acceso a trámites y servicios de diferentes áreas de la Administración Pública Federal a migrantes en el exterior.',5,36,129),(806,'5.II.3 Generar una administración eficaz de las fronteras a fin de garantizar el ingreso documentado, el respeto a los derechos y libertades de los migrantes, a través de la presencia territorial de las autoridades migratorias, aduaneras y de seguridad.',5,36,129),(807,'5.II.4 Dotar de infraestructura los puntos fronterizos, promoviendo el uso de tecnología no intrusiva para la gestión ordenada de los flujos de personas y bienes.',5,36,129),(808,'5.II.5 Fomentar la transparencia y la simplificación de los trámites relacionados con el comercio exterior, así como con la expedición de documentos migratorios, para erradicar la corrupción en todas las instancias gubernamentales.',5,36,129),(809,'5.II.6 Ampliar y profundizar el diálogo con el sector privado, organismos del sector social y organizaciones de la sociedad civil.',5,36,129),(810,'5.II.7 Fomentar la protección y promoción de los derechos humanos sobre la base de los compromisos internacionales adquiridos por México.',5,36,129),(811,'5.III.1 Promover y dar seguimiento al cumplimiento de los compromisos internacionales en materia de género.',5,36,130),(812,'5.III.2 Armonizar la normatividad vigente con los tratados internacionales en materia de derechos de las mujeres.',5,36,130),(813,'5.III.3 Evaluar los efectos de las políticas migratorias sobre la población femenil en las comunidades expulsoras de migrantes.',5,36,130),(814,'5.III.4 Implementar una estrategia intersectorial dirigida a la atención y protección de las mujeres migrantes que son víctimas de tráfico, trata y secuestro.',5,36,130),(815,'No Aplica',6,37,131);
/*!40000 ALTER TABLE `pnd_lineas_accion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pnd_objetivos`
--

DROP TABLE IF EXISTS `pnd_objetivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pnd_objetivos` (
  `id_pnd_objetivo` tinyint(2) NOT NULL AUTO_INCREMENT,
  `pnd_objetivo` text NOT NULL,
  `id_pnd_eje` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pnd_objetivo`),
  KEY `id_pnd_eje` (`id_pnd_eje`),
  CONSTRAINT `pnd_objetivo_eje` FOREIGN KEY (`id_pnd_eje`) REFERENCES `pnd_ejes` (`id_pnd_eje`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pnd_objetivos`
--

LOCK TABLES `pnd_objetivos` WRITE;
/*!40000 ALTER TABLE `pnd_objetivos` DISABLE KEYS */;
INSERT INTO `pnd_objetivos` VALUES (1,'1.1. Promover y fortalecer la gobernabilidad democrática.',1),(2,'1.2. Garantizar la Seguridad Nacional.',1),(3,'1.3. Mejorar las condiciones de seguridad pública.',1),(4,'1.4. Garantizar un Sistema de Justicia Penal eficaz, expedito, imparcial y transparente.',1),(5,'1.5. Garantizar el respeto y protección de los derechos humanos y la erradicación de la discriminación.',1),(6,'1.6. Salvaguardar a la población, a sus bienes y a su  entorno ante un desastre de origen natural o humano.',1),(7,'1.A',1),(8,'2.1. Garantizar el ejercicio efectivo de los derechos sociales para toda la población.',2),(9,'2.2. Transitar hacia una sociedad equitativa e incluyente.',2),(10,'2.3. Asegurar el acceso a los servicios de salud.',2),(11,'2.4. Ampliar el acceso a la seguridad social.',2),(12,'2.5. Proveer un entorno adecuado para el desarrollo de una vida digna.',2),(13,'2.A',2),(14,'3.1. Desarrollar el potencial humano de los mexicanos con educación de calidad.',3),(15,'3.2. Garantizar la inclusión y la equidad en el Sistema Educativo.',3),(16,'3.3. Ampliar el acceso a la cultura como un medio para la formación integral de los ciudadanos.',3),(17,'3.4. Promover el deporte de manera incluyente para fomentar una cultura de salud.',3),(18,'3.5. Hacer del desarrollo científico, tecnológico y la innovación pilares para el progreso económico y social sostenible.',3),(19,'3.A',3),(20,'4.1. Mantener la estabilidad macroeconómica del país.',4),(21,'4.2. Democratizar el acceso al financiamiento de proyectos con potencial de crecimiento.',4),(22,'4.3. Promover el empleo de calidad.',4),(23,'4.4. Impulsar y orientar un crecimiento verde incluyente y facilitador que preserve nuestro patrimonio natural al mismo tiempo que genere riqueza, competitividad y empleo.',4),(24,'4.5. Democratizar el acceso a servicios de telecomunicaciones.',4),(25,'4.6. Abastecer de energía al país con precios competitivos, calidad y eficiencia a lo largo de la cadena productiva.',4),(26,'4.7. Garantizar reglas claras que incentiven el desarrollo de un mercado interno competitivo.',4),(27,'4.8. Desarrollar los sectores estratégicos del país.',4),(28,'4.9. Contar con una infraestructura de transporte que se refleje en menores costos para realizar la actividad económica.',4),(29,'4.10. Construir un sector agropecuario y pesquero productivo que garantice la seguridad alimentaria del país.',4),(30,'4.11. Aprovechar el potencial turístico de México para generar una mayor derrama económica en el país.',4),(31,'4.A',4),(32,'5.1. Ampliar y fortalecer la presencia de México en el mundo.',5),(33,'5.2. Promover el valor de México en el mundo mediante la difusión económica, turística y cultural.',5),(34,'5.3. Reafirmar el compromiso del país con el libre comercio, la movilidad de capitales y la integración productiva.',5),(35,'5.4. Velar por los intereses de los mexicanos en el extranjero y proteger los derechos de los extranjeros en el territorio nacional.',5),(36,'5.A',5),(37,'No Aplica',6);
/*!40000 ALTER TABLE `pnd_objetivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programas_presupuestarios`
--

DROP TABLE IF EXISTS `programas_presupuestarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programas_presupuestarios` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `clave` char(1) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave_UNIQUE` (`clave`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programas_presupuestarios`
--

LOCK TABLES `programas_presupuestarios` WRITE;
/*!40000 ALTER TABLE `programas_presupuestarios` DISABLE KEYS */;
INSERT INTO `programas_presupuestarios` VALUES (1,'S','Sujetos a Reglas de Operación '),(2,'U','Otros Subsidios '),(3,'E','Prestación de Servicios Públicos '),(4,'B','Provisión de Bienes Públicos '),(5,'P','Planeación, seguimiento y evaluación de políticas públicas '),(6,'F','Promoción y fomento '),(7,'G','Regulación y supervisión '),(8,'A','Funciones de las Fuerzas Armadas (Únicamente Gobierno Federal) '),(9,'R','Específicos '),(10,'K','Proyectos de Inversión '),(11,'M','Apoyo al proceso presupuestario y para mejorar la eficiencia institucional '),(12,'O','Apoyo a la función pública y al mejoramiento de la gestión '),(13,'W','Operaciones ajenas '),(14,'L','Obligaciones de cumplimiento de resolución jurisdiccional '),(15,'N','Desastres Naturales '),(16,'J','Pensiones y jubilaciones '),(17,'T','Aportaciones a la seguridad social '),(18,'Y','Aportaciones a fondos de estabilización '),(19,'Z','Aportaciones a fondos de inversión y reestructura de pensiones '),(20,'I','Gasto Federalizado '),(21,'C','Participaciones a entidades federativas y municipios '),(22,'D','Costo financiero, deuda o apoyos a deudores y ahorradores de la banca '),(23,'H','Adeudos de ejercicios fiscales anteriores ');
/*!40000 ALTER TABLE `programas_presupuestarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `id_proyecto` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `id_eje` tinyint(1) NOT NULL,
  `id_linea` tinyint(2) NOT NULL,
  `id_estrategia` smallint(3) NOT NULL,
  `estatus` char(1) NOT NULL DEFAULT '0',
  `grado` tinyint(4) NOT NULL,
  `no_proyecto` smallint(6) NOT NULL,
  `nombre` text NOT NULL,
  `clasificacion` tinyint(1) DEFAULT NULL,
  `inversion` double DEFAULT NULL,
  `ponderacion` float DEFAULT NULL,
  `unidad_medida` varchar(128) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `prog_sem` float DEFAULT NULL,
  `g_vulnerable` tinyint(2) DEFAULT NULL,
  `beneficiarios_h` int(11) DEFAULT NULL,
  `beneficiarios_m` int(11) DEFAULT NULL,
  `justificacion` text,
  `finalidad` tinyint(1) DEFAULT NULL,
  `funcion` tinyint(2) DEFAULT NULL,
  `subfuncion` smallint(3) DEFAULT NULL,
  `objetivo` text,
  `proposito` text,
  `observaciones` text,
  `anual_pr` varchar(4) DEFAULT '2019',
  `uresponsable` varchar(256) DEFAULT NULL,
  `titular` varchar(256) DEFAULT NULL,
  `pnd_eje` tinyint(1) DEFAULT NULL,
  `pnd_objetivo` tinyint(2) DEFAULT NULL,
  `pnd_estrategia` smallint(3) DEFAULT NULL,
  `pnd_linea_accion` smallint(3) DEFAULT NULL,
  `prog_pres` tinyint(2) DEFAULT NULL,
  `pps` mediumint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_proyecto`),
  KEY `fk_proyecto_dep_idx` (`id_dependencia`),
  CONSTRAINT `fk_proyecto_dep` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='Programas Presupuestarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos_ppi`
--

DROP TABLE IF EXISTS `proyectos_ppi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos_ppi` (
  `id_proyecto_ppi` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_proyecto` smallint(6) NOT NULL,
  `nom_proyecto_ppi` text NOT NULL,
  PRIMARY KEY (`id_proyecto_ppi`),
  KEY `fk_proyectos_ppi_proyectos1` (`id_proyecto`),
  CONSTRAINT `fk_proyectos_ppi_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos_ppi`
--

LOCK TABLES `proyectos_ppi` WRITE;
/*!40000 ALTER TABLE `proyectos_ppi` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_ppi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos_ppp`
--

DROP TABLE IF EXISTS `proyectos_ppp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos_ppp` (
  `id_proyecto_ppp` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_proyecto` smallint(6) NOT NULL,
  `nom_proyecto_ppp` varchar(45) NOT NULL,
  PRIMARY KEY (`id_proyecto_ppp`),
  KEY `fk_proyectos_ppp_proyectos1` (`id_proyecto`),
  CONSTRAINT `fk_proyectos_ppp_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos_ppp`
--

LOCK TABLES `proyectos_ppp` WRITE;
/*!40000 ALTER TABLE `proyectos_ppp` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_ppp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultados`
--

DROP TABLE IF EXISTS `resultados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultados` (
  `id_resultado` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_accion` smallint(6) NOT NULL,
  `enero_r` varchar(45) DEFAULT '0',
  `febrero_r` varchar(45) DEFAULT '0',
  `marzo_r` varchar(45) DEFAULT '0',
  `abril_r` varchar(45) DEFAULT '0',
  `mayo_r` varchar(45) DEFAULT '0',
  `junio_r` varchar(45) DEFAULT '0',
  `julio_r` varchar(45) DEFAULT '0',
  `agosto_r` varchar(45) DEFAULT '0',
  `septiembre_r` varchar(45) DEFAULT '0',
  `octubre_r` varchar(45) DEFAULT '0',
  `noviembre_r` varchar(45) DEFAULT '0',
  `diciembre_r` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id_resultado`),
  UNIQUE KEY `id_accion_UNIQUE` (`id_accion`),
  CONSTRAINT `resultado_accion` FOREIGN KEY (`id_accion`) REFERENCES `acciones` (`id_accion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=753 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultados`
--

LOCK TABLES `resultados` WRITE;
/*!40000 ALTER TABLE `resultados` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultados_indicadores`
--

DROP TABLE IF EXISTS `resultados_indicadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultados_indicadores` (
  `id_resultado_indicador` int(11) NOT NULL AUTO_INCREMENT,
  `id_indicador` int(11) NOT NULL,
  `periodo_evaluacion` tinyint(4) NOT NULL,
  `resultado_var1` varchar(8) NOT NULL,
  `resultado_var2` varchar(8) DEFAULT NULL,
  `resultado_var3` varchar(8) DEFAULT NULL,
  `resultado_var4` varchar(8) DEFAULT NULL,
  `resultado_var5` varchar(8) DEFAULT NULL,
  `resultado_var6` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_resultado_indicador`),
  KEY `result_indiocador_idx` (`id_indicador`),
  CONSTRAINT `result_indiocador` FOREIGN KEY (`id_indicador`) REFERENCES `indicadores` (`id_indicador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2636 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultados_indicadores`
--

LOCK TABLES `resultados_indicadores` WRITE;
/*!40000 ALTER TABLE `resultados_indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultados_indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sectores`
--

DROP TABLE IF EXISTS `sectores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sectores` (
  `id_sector` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `sector` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sector`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Catalogo Sectores de las dependencias';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectores`
--

LOCK TABLES `sectores` WRITE;
/*!40000 ALTER TABLE `sectores` DISABLE KEYS */;
INSERT INTO `sectores` VALUES (1,'Política Interna y Seguridad'),(2,'Administración'),(3,'Desarrollo Económico'),(4,'Desarrollo Social');
/*!40000 ALTER TABLE `sectores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sentido_indicador`
--

DROP TABLE IF EXISTS `sentido_indicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sentido_indicador` (
  `id_sentido` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sentido` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_sentido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sentido_indicador`
--

LOCK TABLES `sentido_indicador` WRITE;
/*!40000 ALTER TABLE `sentido_indicador` DISABLE KEYS */;
INSERT INTO `sentido_indicador` VALUES (1,'Incremento'),(2,'Decremento'),(3,'Constante');
/*!40000 ALTER TABLE `sentido_indicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subfuncion`
--

DROP TABLE IF EXISTS `subfuncion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subfuncion` (
  `id_subfuncion` smallint(3) NOT NULL AUTO_INCREMENT,
  `id_finalidad` tinyint(1) NOT NULL,
  `id_funcion_f` smallint(6) NOT NULL,
  `id_subf` smallint(6) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  PRIMARY KEY (`id_subfuncion`),
  KEY `subf_fun_f` (`id_funcion_f`),
  KEY `subf_finalidad_idx` (`id_finalidad`),
  CONSTRAINT `subf_finalidad` FOREIGN KEY (`id_finalidad`) REFERENCES `finalidad` (`id_finalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subf_funcion_f` FOREIGN KEY (`id_funcion_f`) REFERENCES `funcion` (`id_funf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subfuncion`
--

LOCK TABLES `subfuncion` WRITE;
/*!40000 ALTER TABLE `subfuncion` DISABLE KEYS */;
INSERT INTO `subfuncion` VALUES (1,1,1,1,'Legislación'),(2,1,1,2,'Fiscalización'),(3,1,2,1,'Impartición de Justicia'),(4,1,2,2,'Procuración de Justicia'),(5,1,2,3,'Reclusión y Readaptación Social'),(6,1,2,4,'Derechos Humanos'),(7,1,3,1,'Presidencia / Gubernamental'),(8,1,3,2,'Política Interior'),(9,1,3,3,'Preservación y Cuidado del Patrimonio'),(10,1,3,4,'Función Pública'),(11,1,3,5,'Asuntos Jurídicos'),(12,1,3,6,'Organización del Procesos Electorales'),(13,1,3,7,'Población'),(14,1,3,8,'Territorio'),(15,1,3,9,'Otros'),(16,1,4,1,'Relaciones Exteriores'),(17,1,5,1,'Asuntos Financieros'),(18,1,5,2,'Asuntos Hacendarios'),(19,1,6,1,'Defensa'),(20,1,6,2,'Marina'),(21,1,6,3,'Inteligencia para la Preservación de la Seguridad Nacional'),(22,1,7,1,'Policía'),(23,1,7,2,'Protección Civil'),(24,1,7,3,'Otros Asuntos de Orden Público y Seguridad'),(25,1,7,4,'Sistema Nacional de Seguridad Pública'),(26,1,8,1,'Servicios Registrales, Administrativos y Patrimoniales'),(27,1,8,2,'Servicios Estadistícos'),(28,1,8,3,'Servicios de Comunicación y Medios'),(29,1,8,4,'Acceso a la Información Pública Gubernamental'),(30,1,8,5,'Otros'),(31,2,1,1,'Ordenación de Desechos'),(32,2,1,2,'Adminstración del Agua'),(33,2,1,3,'Ordenación de Aguas Residuales, Drenajes y Alcantarillado'),(34,2,1,4,'Reducción de la Contaminación'),(35,2,1,5,'Protección de la Diversidad Biológica y del Paisaje'),(36,2,1,6,'Otros de Protección Ambiental'),(37,2,2,1,'Urbanización'),(38,2,2,2,'Desarrollo Cominitario'),(39,2,2,3,'Abastecimiento de Agua'),(40,2,2,4,'Alumbrado Público'),(41,2,2,5,'Vivienda'),(42,2,2,6,'Servicios Comunales'),(43,2,2,7,'Desarrollo Regional'),(44,2,3,1,'Prestación de Servicios de Salud a la Comunidad'),(45,2,3,2,'Prestación de Servicios de Salud a la Persona'),(46,2,3,3,'Generación de Recursos para la Salud'),(47,2,3,4,'Rectoría del Sistema de Salud'),(48,2,3,5,'Protección Social en Salud'),(49,2,4,1,'Deporte y Recreación'),(50,2,4,2,'Cultura'),(51,2,4,3,'Radio, Televisión y Editoriales'),(52,2,4,4,'Asuntos Religiosos y Otras Manifestaciones Sociales'),(53,2,5,1,'Educación Básica'),(54,2,5,2,'Educación Media Superios'),(55,2,5,3,'Educación Superior'),(56,2,5,4,'Postgrado'),(57,2,5,5,'Educación para Adultos'),(58,2,5,6,'Otros Servicios Educativos y Actividades Inherentes'),(59,2,6,1,'Enfermedad e Incapacidad'),(60,2,6,2,'Edad Avanzada'),(61,2,6,3,'Familia e Hijos'),(62,2,6,4,'Desempleo'),(63,2,6,5,'Alimentación y Nutrición'),(64,2,6,6,'Apoyo Social para la Vivienda'),(65,2,6,7,'Indigenas'),(66,2,6,8,'Otros Grupos Vulnerables'),(67,2,6,9,'Otros de Seguridad Social y Asistencia Social'),(68,2,7,1,'Otros Asuntos Sociales'),(69,3,1,1,'Asuntos Económicos y Comerciales en General'),(70,3,1,2,'Asuntos Laborales Generales'),(71,3,2,1,'Agropecuaria'),(72,3,2,2,'Silvicultura'),(73,3,2,3,'Acuacultura, Pezca y Caza'),(74,3,2,4,'Agroindustrial'),(75,3,2,5,'Hidroagrícola'),(76,3,2,6,'Apoyo Financiero a la Banca y Seguro Agropecuario'),(77,3,3,1,'Carbón y Otros Combustibles Minerales Sólidos'),(78,3,3,2,'Petróleo y Gas Natural (Hidricarburos)'),(79,3,3,3,'Combustibles Nucleares'),(80,3,3,4,'Otros Combutibles'),(81,3,3,5,'Electricidad'),(82,3,3,6,'Energía no Eléctrica'),(83,3,4,1,'Extracción de Recursos Minerales excepto los Combustibles Minerales'),(84,3,4,2,'Manufacturas '),(85,3,4,3,'Contrucción'),(86,3,5,1,'Transporte por Carretera'),(87,3,5,2,'Transporte por Agua y Puertos'),(88,3,5,3,'Transporte por Ferrocarril'),(89,3,5,4,'Transporte Aéreo'),(90,3,5,5,'Transporte por Oleoductos y Gasoducto y Otros Sistemas de Transporte'),(91,3,5,6,'Otros Relacionados con Transporte'),(92,3,6,1,'Comunicaciones'),(93,3,7,1,'Turismo'),(94,3,7,2,'Hoteles y Restaurantes'),(95,3,8,1,'Investigación Científica'),(96,3,8,2,'Desarrollo Tecnológico'),(97,3,8,3,'Servicios Científicos y Tecnológicos'),(98,3,8,4,'Innovación'),(99,3,9,1,'Comercio, Distribución, Almacenamiento y Depósito'),(100,3,9,2,'Otras Indutrias'),(101,3,9,3,'Otros Asuntos Económicos'),(102,4,1,1,'Deuda Pública Interna'),(103,4,1,2,'Deuda Pública Externa'),(104,4,2,1,'Transferencia entre Diferentes Niveles y Ã?rdenes de Gobierno'),(105,4,2,2,'Participaciones entre Diferentes Niveles y Ã?rdenes de Gobierno'),(106,4,2,3,'Aportaciones entre Diferentes Ã?rdenes de Gobierno'),(107,4,3,1,'Saneamiento del Sistema Financiero'),(108,4,3,2,'Apoyos IPAB'),(109,4,3,3,'Banca de Desarrollo'),(110,4,3,4,'Apoyo a los Programas de reestructura en unidades de inversión (UDIS)'),(111,4,4,1,'Adeudos de Ejercicios Fiscales Anteriores');
/*!40000 ALTER TABLE `subfuncion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_indicador`
--

DROP TABLE IF EXISTS `tipo_indicador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_indicador` (
  `id_tipo_indicador` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipo_indicador` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_indicador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_indicador`
--

LOCK TABLES `tipo_indicador` WRITE;
/*!40000 ALTER TABLE `tipo_indicador` DISABLE KEYS */;
INSERT INTO `tipo_indicador` VALUES (1,'Impacto'),(2,'Proceso'),(3,'Producto'),(4,'Gestión');
/*!40000 ALTER TABLE `tipo_indicador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_unidad_prog01`
--

DROP TABLE IF EXISTS `tipo_unidad_prog01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_unidad_prog01` (
  `id_tipo_unidad` smallint(6) NOT NULL,
  `id_tipo` smallint(6) DEFAULT NULL,
  `id_unidad` smallint(6) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_unidad`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_unidad` (`id_unidad`),
  CONSTRAINT `tipo_unidad_medida` FOREIGN KEY (`id_unidad`) REFERENCES `u_medida_prog01` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_unidad_prog01`
--

LOCK TABLES `tipo_unidad_prog01` WRITE;
/*!40000 ALTER TABLE `tipo_unidad_prog01` DISABLE KEYS */;
INSERT INTO `tipo_unidad_prog01` VALUES (1,1,1,'Constituir'),(2,2,1,'Inscribir'),(3,3,1,'Verificar'),(4,1,2,'Realizar'),(5,1,3,'Presidir'),(6,2,3,'Programar'),(7,3,3,'Realizar'),(8,1,4,'Concertar'),(9,1,5,'Atender'),(10,1,6,'Alfabetizar'),(11,1,7,'Capacitar'),(12,1,8,'Atender'),(13,2,8,'Coordinar'),(14,3,8,'Beneficiar'),(15,4,8,'Evaluar'),(16,5,8,'Inscribir'),(17,1,9,'Presentar'),(18,2,9,'Revisar'),(19,3,9,'Realizar'),(20,1,10,'Otorgar'),(21,1,11,'Dotar'),(22,1,12,'Producir'),(23,1,13,'Otorgar'),(24,1,14,'Comprar'),(25,2,14,'Distribuir'),(26,1,15,'Administrar'),(27,2,15,'Ordenar'),(28,1,16,'Verificar'),(29,1,17,'Conservar'),(30,1,18,'Brindar'),(31,1,19,'Controlar'),(32,2,19,'Registrar'),(33,1,20,'Protocolizar'),(34,1,21,'Realizar'),(35,1,22,'Realizar'),(36,1,23,'Equipar'),(37,2,23,'Construir'),(38,3,23,'Reparar'),(39,1,24,'Realizar'),(40,1,25,'Integrar'),(41,1,26,'Realizar'),(42,1,27,'Realizar'),(43,1,28,'Atender'),(44,1,29,'Actualizar'),(45,1,30,'Autorizar'),(46,2,30,'Pagar'),(47,3,30,'Registrar'),(48,4,30,'Otorgar'),(49,1,31,'Actualizar'),(50,2,31,'Ampliar'),(51,3,31,'Conservar'),(52,4,31,'Supervisar'),(53,1,32,'Administrar'),(54,1,33,'Inventariar'),(55,2,33,'Revisar'),(56,1,34,'Conservar'),(57,2,34,'Instalar'),(58,3,34,'Modernizar'),(59,4,34,'Operar'),(60,5,34,'Supervisar'),(61,1,35,'Realizar'),(62,1,36,'Construir'),(63,2,36,'Rehabilitar'),(64,1,37,'Comprar'),(65,2,37,'Inspeccionar'),(66,3,37,'Producir'),(67,4,37,'Transportar'),(68,1,38,'Supervisar'),(69,1,39,'Coordinar'),(70,2,39,'Programar'),(71,3,39,'Realizar'),(72,4,39,'Supervisar'),(73,1,40,'Asesorar'),(74,2,40,'Orientar'),(75,3,40,'Registrar'),(76,4,40,'Supervisar'),(77,1,41,'Realizar'),(78,2,41,'Asistir'),(79,3,41,'Preparar'),(80,4,41,'Programar'),(81,1,42,'Imprimir'),(82,1,43,'Otorgar'),(83,1,44,'Conservar'),(84,2,44,'Equipar'),(85,3,44,'Operar'),(86,4,44,'Supervisar'),(87,1,45,'Asesorar'),(88,2,45,'Controlar'),(89,3,45,'Detectar'),(90,4,45,'Proporcionar'),(91,5,45,'Atender'),(92,6,45,'Ingresar'),(93,7,45,'Realizar'),(94,8,45,'Registrar'),(95,9,45,'Revisar'),(96,1,46,'Editar'),(97,2,46,'Elaborar'),(98,3,46,'Publicar'),(99,4,46,'Supervisar'),(100,1,47,'Controlar'),(101,2,47,'Tramitar'),(102,1,48,'Coordinar'),(103,2,48,'Realizar'),(104,1,49,'Atender'),(105,2,49,'Controlar'),(106,3,49,'Equipar'),(107,4,49,'Operar'),(108,5,49,'Rehabilitar'),(109,6,49,'Supervisar'),(110,1,50,'Expedir'),(111,1,51,'Detectar'),(112,2,51,'Realizar'),(113,1,52,'Otorgar'),(114,1,53,'Equipar'),(115,2,53,'Operar'),(116,3,53,'Rehabilitar'),(117,4,53,'Supervisar'),(118,1,54,'Supervisar'),(119,1,55,'Integrar'),(120,1,56,'Realizar'),(121,1,57,'Asesorar'),(122,2,57,'Registrar'),(123,1,58,'Asesorar'),(124,2,58,'Beneficiar'),(125,3,58,'Capacitar'),(126,4,58,'Organizar'),(127,5,58,'Supervisar'),(128,6,58,'Activar'),(129,7,58,'Certificar'),(130,1,59,'Otorgar'),(131,1,60,'Dirigir'),(132,2,60,'Participar'),(133,3,60,'Programar'),(134,4,60,'Realizar'),(135,1,61,'Impartir'),(136,2,61,'Organizar'),(137,3,61,'Promover'),(138,4,61,'Supervisar'),(139,1,62,'Coordinar'),(140,2,62,'Promocionar'),(141,3,62,'Realizar'),(142,1,63,'Controlar'),(143,2,63,'Apoyar'),(144,1,64,'Otorgar'),(145,2,64,'Atender'),(146,3,64,'Diagnosticar'),(147,4,64,'Promover'),(148,1,65,'Controlar'),(149,2,65,'Equipar'),(150,3,65,'Operar'),(151,4,65,'Rehabilitar'),(152,1,66,'Firmar'),(153,2,66,'Modificar'),(154,3,66,'Realizar'),(155,1,67,'Atender'),(156,1,68,'Analizar'),(157,2,68,'Autorizar'),(158,3,68,'Participar'),(159,1,69,'Realizar'),(160,2,69,'Publicar'),(161,1,70,'Crear'),(162,2,70,'Ejecutar'),(163,1,71,'Otorgar'),(164,2,71,'Expedir'),(165,1,72,'Promover'),(166,2,72,'Recuperar'),(167,3,72,'Tramitar'),(168,1,73,'Controlar'),(169,2,73,'Vigilar'),(170,1,74,'Elaborar'),(171,1,75,'Aplicar'),(172,1,76,'Coordinar'),(173,2,76,'Difundir'),(174,3,76,'Financiar'),(175,4,76,'Participar'),(176,5,76,'Implementar'),(177,1,77,'Integrar'),(178,2,77,'Organizar'),(179,1,78,'Registrar'),(180,1,79,'Coordinar'),(181,1,80,'Contestar'),(182,1,81,'Tramitar'),(183,1,82,'Asesorar'),(184,2,82,'Capacitar'),(185,3,82,'Coordinar'),(186,4,82,'Evaluar'),(187,5,82,'Supervisar'),(188,1,83,'Realizar'),(189,1,84,'Determinar'),(190,2,84,'Presentar'),(191,3,84,'Realizar'),(192,1,85,'Determinar'),(193,2,85,'Presentar'),(194,3,85,'Realizar'),(195,1,86,'Controlar'),(196,1,87,'Autorizar'),(197,2,87,'Elaborar'),(198,1,88,'Capacitar'),(199,1,89,'Dictaminar'),(200,2,89,'Distribuir'),(201,3,89,'Expedir'),(202,4,89,'Revisar'),(203,5,89,'Tramitar'),(204,6,89,'Validar'),(205,7,89,'Actualizar'),(206,8,89,'Elaborar'),(207,9,89,'Inscribir'),(208,10,89,'Publicar'),(209,1,90,'Aplicar'),(210,2,90,'Controlar'),(211,1,91,'Otorgar'),(212,1,92,'Ampliar'),(213,2,92,'Conservar'),(214,3,92,'Supervisar'),(215,4,92,'Equipar'),(216,1,93,'Atender'),(217,2,93,'Supervisar'),(218,1,94,'Comercializar'),(219,2,94,'Conservar'),(220,3,94,'Distribuir'),(221,4,94,'Imprimir'),(222,1,95,'Asesorar'),(223,2,95,'Atender'),(224,3,95,'Registrar'),(225,1,96,'Organizar'),(226,2,96,'Registrar'),(227,3,96,'Supervisar'),(228,1,97,'Otorgar'),(229,2,97,'Promover'),(230,1,98,'Asesorar'),(231,2,98,'Registrar'),(232,3,98,'Supervisar'),(233,1,99,'Aplicar'),(234,2,99,'Elaborar'),(235,1,100,'Asesorar'),(236,2,100,'Becar'),(237,3,100,'Capacitar'),(238,4,100,'Contratar'),(239,1,101,'Conservar'),(240,2,101,'Ensamblar'),(241,3,101,'Modernizar'),(242,4,101,'Reparar'),(243,1,102,'Operar'),(244,2,102,'Mantener'),(245,1,103,'Inscribir'),(246,2,103,'Otorgar'),(247,3,103,'Regularizar'),(248,1,104,'Ampliar'),(249,2,104,'Atender'),(250,3,104,'Rehabilitar'),(251,4,104,'Supervisar'),(252,5,104,'Construir'),(253,6,104,'Certificar'),(254,1,105,'Controlar'),(255,2,105,'Preservar'),(256,3,105,'Reforestar'),(257,1,106,'Atender'),(258,1,107,'Ampliar'),(259,2,107,'Rehabilitar'),(260,3,107,'Equipar'),(261,4,107,'Supervisar'),(262,1,108,'Ampliar'),(263,2,108,'Rehabilitar'),(264,3,108,'Equipar'),(265,4,108,'Instalar'),(266,1,109,'Ampliar'),(267,1,110,'Otorgar'),(268,1,111,'Evaluar'),(269,2,111,'Presentar'),(270,3,111,'Realizar'),(271,1,112,'Realizar'),(272,2,112,'Analizar'),(273,1,113,'Coordinar'),(274,2,113,'Participar'),(275,3,113,'Promover'),(276,4,113,'Realizar'),(277,5,113,'Supervisar'),(278,6,113,'Transmitir'),(279,1,114,'Aplicar'),(280,1,115,'Actualizar'),(281,2,115,'Archivar'),(282,3,115,'Tramitar'),(283,4,115,'Integrar'),(284,1,116,'Realizar'),(285,2,116,'Instalar'),(286,1,117,'Beneficiar'),(287,2,117,'Afiliar'),(288,1,118,'Organizar'),(289,2,118,'Realizar'),(290,1,119,'Identificar'),(291,2,119,'Verificar'),(292,1,120,'Controlar'),(293,2,120,'Coordinar'),(294,3,120,'Financiar'),(295,1,121,'Editar'),(296,2,121,'Publicar'),(297,1,122,'Elaborar'),(298,1,123,'Coordinar'),(299,1,124,'Distribuir'),(300,1,125,'Coordinar'),(301,1,126,'Equipar'),(302,2,126,'Operar'),(303,3,126,'Rehabilitar'),(304,4,126,'Supervisar'),(305,1,127,'Asesorar'),(306,2,127,'Capacitar'),(307,3,127,'Organizar'),(308,1,128,'Registrar'),(309,1,129,'Adquirir'),(310,2,129,'Conservar'),(311,1,130,'Instalar'),(312,1,131,'Transmitir'),(313,1,131,'Producir'),(314,1,132,'Transmitir'),(315,2,132,'Supervisar'),(316,1,133,'Coordinar'),(317,1,134,'Controlar'),(318,1,135,'Reparar'),(319,2,135,'Supervisar'),(320,1,136,'Equipar'),(321,2,136,'Modernizar'),(322,3,136,'Operar'),(323,4,136,'Rehabilitar'),(324,5,136,'Supervisar'),(325,1,137,'Conservar'),(326,2,137,'Estudiar'),(327,1,138,'Difundir'),(328,2,138,'Evaluar'),(329,3,138,'Analizar'),(330,4,138,'Elaborar'),(331,5,138,'Generar'),(332,1,139,'Elaborar'),(333,1,140,'Realizar'),(334,2,140,'Supervisar'),(335,1,141,'Programar'),(336,2,141,'Realizar'),(337,1,142,'Presentar'),(338,2,142,'Realizar'),(339,3,142,'Supervisar'),(340,1,143,'Difundir'),(341,2,143,'Realizar'),(342,1,144,'Supervisar'),(343,1,145,'Atender'),(344,2,145,'Examinar'),(345,3,145,'Promover'),(346,1,146,'Almacenar'),(347,2,146,'Ampliar'),(348,3,146,'Comercializar'),(349,4,146,'Distribuir'),(350,5,146,'Procesar'),(351,1,147,'Construir'),(352,1,148,'Ampliar'),(353,2,148,'Conservar'),(354,3,148,'Construir'),(355,4,148,'Supervisar'),(356,1,149,'Equipar'),(357,2,149,'Modernizar'),(358,3,149,'Supervisar'),(359,1,150,'Integrar'),(360,1,151,'Proponer'),(361,2,151,'Publicar'),(362,3,151,'Reformar'),(363,1,152,'Editar'),(364,1,153,'Otorgar'),(365,2,153,'Distribuir'),(366,3,153,'Supervisar'),(367,1,154,'Aprobar'),(368,2,154,'Convocar'),(369,1,155,'Almacenar'),(370,2,155,'Distribuir'),(371,1,156,'Legalizar'),(372,2,156,'Relotificar'),(373,3,156,'Urbanizar'),(374,1,157,'Realizar'),(375,1,158,'Elaborar'),(376,1,159,'Controlar'),(377,1,160,'Conservar'),(378,2,160,'Operar'),(379,3,160,'Supervisar'),(380,1,161,'Promover'),(381,2,161,'Comercializar'),(382,1,162,'Realizar'),(383,1,163,'Entregar'),(384,2,163,'Distribuir'),(385,1,164,'Distribuir'),(386,2,164,'Instalar'),(387,2,165,'Surtir'),(388,1,166,'Distribuir'),(389,1,167,'Conservar'),(390,2,167,'Equipar'),(391,1,168,'Controlar'),(392,1,169,'Mantener'),(393,2,169,'Supervisar'),(394,1,170,'Captar'),(395,2,170,'Conducir'),(396,3,170,'Conservar'),(397,4,170,'Cuantificar'),(398,1,171,'Instalar'),(399,1,172,'Conservar'),(400,2,172,'Equipar'),(401,3,172,'Modernizar'),(402,4,172,'Operar'),(403,1,173,'Realizar'),(404,1,174,'Disminuir'),(405,1,174,'Identificar'),(406,2,174,'Evitar'),(407,1,175,'Examinar'),(408,2,175,'Realizar'),(409,3,175,'Detectar'),(410,4,175,'Monitorear'),(411,5,175,'Tomar'),(412,1,176,'Atender'),(413,1,177,'Atender'),(414,2,177,'Organizar'),(415,3,177,'Orientar'),(416,4,177,'Proteger'),(417,5,177,'Rehabilitar'),(418,6,177,'Afiliar'),(419,1,178,'Elaborar'),(420,1,179,'Realizar'),(421,1,180,'Remodelar'),(422,2,180,'Supervisar'),(423,3,180,'Realizar'),(424,1,181,'Ampliar'),(425,2,181,'Construir'),(426,3,181,'Equipar'),(427,4,181,'Remodelar'),(428,1,182,'Comprar'),(429,2,182,'Distribuir'),(430,1,183,'Coordinar'),(431,2,183,'Vigilar'),(432,3,183,'Realizar'),(433,1,184,'Atender'),(434,1,185,'Conjuntar'),(435,2,185,'Promover'),(436,1,185,'Controlar'),(437,1,187,'Orientar'),(438,1,188,'Actualizar'),(439,2,188,'Verificar'),(440,1,189,'Realizar'),(441,2,189,'Radicar'),(442,1,190,'Supervisar'),(443,1,191,'Controlar'),(444,2,191,'Elaborar'),(445,3,191,'Distribuir'),(446,1,192,'Beneficiar'),(447,1,193,'Atender'),(448,1,194,'Coordinar'),(449,1,195,'Realizar'),(450,1,196,'Alquilar'),(451,2,196,'Exhibir'),(452,3,196,'Promocionar'),(453,4,196,'Reproducir'),(454,1,197,'Otorgar'),(455,2,197,'Registrar'),(456,1,198,'Atender'),(457,2,198,'Beneficiar'),(458,3,198,'Inscribir'),(459,4,198,'Capacitar'),(460,5,198,'Certificar'),(461,6,198,'Ingresar'),(462,7,198,'Afiliar'),(463,1,199,'Atender'),(464,1,200,'Mantener'),(465,2,200,'Reparar'),(466,1,201,'Distribuir'),(467,2,201,'Registrar'),(468,3,201,'Reponer'),(469,1,202,'Coordinar'),(470,2,202,'Evaluar'),(471,3,202,'Integrar'),(472,1,203,'Conservar'),(473,2,203,'Elaborar'),(474,1,204,'Ampliar'),(475,2,204,'Conservar'),(476,3,204,'Instalar'),(477,4,204,'Modernizar'),(478,5,204,'Operar'),(479,1,205,'Impartir'),(480,2,205,'Promover'),(481,1,206,'Otorgar'),(482,2,206,'Asistir'),(483,1,207,'Capacitar'),(484,1,208,'Contratar'),(485,1,209,'Ampliar'),(486,2,209,'Explotar'),(487,3,209,'Mantener'),(488,4,209,'Supervisar'),(489,1,210,'Registrar'),(490,1,211,'Conservar'),(491,2,211,'Reparar'),(492,3,211,'Supervisar'),(493,1,212,'Controlar'),(494,2,212,'Presentar'),(495,1,213,'Controlar'),(496,2,213,'Gestionar'),(497,3,213,'Realizar'),(498,4,213,'Establecer'),(499,1,214,'Analizar'),(500,2,214,'Diseñar'),(501,3,214,'Mejorar'),(502,4,214,'Promover'),(503,5,214,'Registrar'),(504,6,214,'Comercializar'),(505,1,215,'Apoyar'),(506,1,216,'Coordinar'),(507,2,216,'Elaborar'),(508,3,216,'Operar'),(509,4,216,'Registrar'),(510,5,216,'Supervisar'),(511,6,216,'Implementar'),(512,1,217,'Elaborar'),(513,2,217,'Revisar'),(514,3,217,'Procesar'),(515,1,218,'Implementar'),(516,2,218,'Autorizar'),(517,3,218,'Revisar'),(518,1,219,'Atender'),(519,1,220,'Realizar'),(520,1,221,'Autorizar'),(521,2,221,'Elaborar'),(522,3,221,'Supervisar'),(523,1,222,'Difundir'),(524,1,223,'Presentar'),(525,1,224,'Distribuir'),(526,1,225,'Surtir'),(527,1,226,'Equipar'),(528,2,226,'Operar'),(529,4,226,'Supervisar'),(530,1,227,'Equipar'),(531,2,227,'Operar'),(532,3,227,'Rehabilitar'),(533,4,227,'Supervisar'),(534,1,228,'Presentar'),(535,2,228,'Realizar'),(536,1,229,'Realizar'),(537,2,229,'Transmitir'),(538,1,230,'Presentar'),(539,2,230,'Realizar'),(540,3,230,'Monitorear'),(541,1,231,'Declarar'),(542,2,231,'Registrar'),(543,3,231,'Vigilar'),(544,1,232,'Lograr'),(545,2,232,'Obtener'),(546,1,233,'Participar'),(547,2,233,'Planear'),(548,3,233,'Convocar'),(549,4,233,'Efectuar'),(550,1,234,'Conservar'),(551,1,235,'Contratar'),(552,1,236,'Mantener'),(553,2,236,'Instalar'),(554,1,237,'Realizar'),(555,2,237,'Organizar'),(556,1,238,'Realizar'),(557,1,239,'Coordinar'),(558,2,239,'Realizar'),(559,1,240,'Colocar'),(560,1,241,'Ejecutar'),(561,2,241,'Programar'),(562,1,242,'Coordinar'),(563,2,242,'Desarrollar'),(564,3,242,'Diseñar'),(565,4,242,'Operar'),(566,5,242,'Actualizar'),(567,1,243,'Equipar'),(568,2,243,'Instalar'),(569,1,244,'Atender'),(570,1,245,'Analizar'),(571,2,245,'Recibir'),(572,1,246,'Difundir'),(573,2,246,'Realizar'),(574,3,246,'Divulgar'),(575,1,247,'Integrar'),(576,1,248,'Impartir'),(577,2,248,'Realizar'),(578,1,249,'Realizar'),(579,1,250,'Realizar'),(580,1,252,'Conservar'),(581,1,252,'Construir'),(582,2,252,'Rehabilitar'),(583,1,253,'Seleccionar'),(584,2,253,'Evaluar'),(585,3,253,'Supervisar'),(586,1,254,'Conservar'),(587,1,255,'Vigilar'),(588,1,256,'Proporcionar'),(589,1,257,'Reparar'),(590,2,257,'Supervisar'),(591,1,258,'Almacenar'),(592,2,258,'Comercializar'),(593,3,258,'Procesar'),(594,1,259,'Atender'),(595,1,260,'Realizar'),(596,1,261,'Aplicar'),(597,2,261,'Controlar'),(598,1,262,'Distribuir'),(599,1,263,'Informar'),(600,2,263,'Registrar'),(601,1,264,'Equipar'),(602,2,264,'Instalar'),(603,3,264,'Rehabilitar'),(604,4,264,'Atender'),(605,1,265,'Certificar'),(606,2,265,'Equipar'),(607,3,265,'Constuir'),(608,1,266,'Confeccionar'),(609,1,266,'Entregar'),(610,1,267,'Atender'),(611,1,268,'Aplicar'),(612,2,268,'Producir'),(613,1,269,'Asegurar'),(614,2,269,'Reparar'),(615,3,269,'Verificar'),(616,1,270,'Atender'),(617,1,271,'Realizar'),(618,1,272,'Conservar'),(619,2,272,'Reforestar'),(620,3,272,'Supervisar'),(621,1,273,'Programar'),(622,2,273,'Realizar'),(623,3,273,'Encalar'),(624,4,273,'Rociar'),(625,5,273,'Dictaminar'),(626,1,274,'Sistematizar'),(627,1,275,'Implementar'),(629,1,276,'Instalar'),(630,2,276,'Supervisar'),(631,1,277,'Construir'),(632,2,277,'Supervisar'),(633,3,277,'Operar'),(634,1,278,'Construir'),(635,1,279,'Construir'),(636,1,280,'Operar'),(637,1,281,'Realizar'),(638,1,282,'Realizar'),(639,1,283,'Inicar'),(640,1,284,'Realizar'),(641,1,285,'Realizar'),(642,1,286,'Realizar'),(643,1,287,'Emitir');
/*!40000 ALTER TABLE `tipo_unidad_prog01` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transversales`
--

DROP TABLE IF EXISTS `transversales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transversales` (
  `id_trasversal` smallint(3) unsigned zerofill NOT NULL,
  `nom_trasversal` tinytext NOT NULL,
  PRIMARY KEY (`id_trasversal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transversales`
--

LOCK TABLES `transversales` WRITE;
/*!40000 ALTER TABLE `transversales` DISABLE KEYS */;
INSERT INTO `transversales` VALUES (000,'NINGUNO'),(001,'ODS -- Objetivos de Desarrollo Sostenible'),(002,'PSD -- Prevención Social del Delito'),(003,'ODS,PSD'),(004,'NNA -- Niñas, Niños y Adolecentes'),(005,'ODS,NNA'),(006,'PSD,NNA'),(007,'ODS,PSD,NNA');
/*!40000 ALTER TABLE `transversales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_medida_indicadores`
--

DROP TABLE IF EXISTS `u_medida_indicadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_medida_indicadores` (
  `id_u_medida` int(11) NOT NULL AUTO_INCREMENT,
  `u_medida` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_u_medida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_medida_indicadores`
--

LOCK TABLES `u_medida_indicadores` WRITE;
/*!40000 ALTER TABLE `u_medida_indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_medida_indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_medida_prog01`
--

DROP TABLE IF EXISTS `u_medida_prog01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_medida_prog01` (
  `id_unidad` smallint(6) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_medida_prog01`
--

LOCK TABLES `u_medida_prog01` WRITE;
/*!40000 ALTER TABLE `u_medida_prog01` DISABLE KEYS */;
INSERT INTO `u_medida_prog01` VALUES (1,'Acta'),(2,'Actividad'),(3,'Acto'),(4,'Acuerdo'),(5,'Adolescente'),(6,'Adulto'),(7,'Agente'),(8,'Alumno'),(9,'Análisis'),(10,'Anteojos'),(11,'Anticonceptivo'),(12,'Anuncio'),(13,'Apoyo'),(14,'Arbol'),(15,'Archivo'),(16,'Área'),(17,'Arroyo'),(18,'Asesoría'),(19,'Asistencia'),(20,'Asociación'),(21,'Audiencia'),(22,'Auditoria'),(23,'Aula'),(24,'Avalúo'),(25,'Averiguación Previa'),(26,'Baciloscopia'),(27,'Balance'),(28,'Brote'),(29,'Banco de Datos'),(30,'Beca'),(31,'Biblioteca'),(32,'Bien Inmueble'),(33,'Bien Mueble'),(34,'Bodega'),(35,'Boletín'),(36,'Bordo'),(37,'Cabeza de Ganado'),(38,'Cama'),(39,'Campaña'),(40,'Campesino'),(41,'Capacitación'),(42,'Cartel'),(43,'Cartilla'),(44,'Caseta'),(45,'Caso'),(46,'Catálogo'),(47,'Catastro'),(48,'Celebración'),(49,'Centro'),(50,'Certificación'),(51,'Citología'),(52,'Clave'),(53,'Clínica'),(54,'Colmena'),(55,'Comité'),(56,'Compra'),(57,'Comunero'),(58,'Comunidad'),(59,'Concesión'),(60,'Concurso'),(61,'Conferencia'),(62,'Congreso'),(63,'Consejo'),(64,'Consulta'),(65,'Consultorio'),(66,'Contrato'),(67,'Contribuyente'),(68,'Convenio'),(69,'Convocatoria'),(70,'Coordinación'),(71,'Credencial'),(72,'Crédito'),(73,'Cría'),(74,'Cronograma'),(75,'Cuestionario'),(76,'Curso'),(77,'Comité'),(78,'Defunción'),(79,'Delegación'),(80,'Demanda'),(81,'Denuncia'),(82,'Dependencia'),(83,'Detección'),(84,'Diagnostico'),(85,'Dictamen'),(86,'Direccion'),(87,'Diseño'),(88,'Docente'),(89,'Documento'),(90,'Dosis'),(91,'Dotacion'),(92,'Edificio'),(93,'Egreso Hospitalario'),(94,'Ejemplar'),(95,'Ejidatario'),(96,'Ejido'),(97,'Empleo'),(98,'Empresa'),(99,'Encuesta'),(100,'Entrenador'),(101,'Equipo'),(102,'Equipo Médico'),(103,'Escritura'),(104,'Escuela'),(105,'Especie'),(106,'Esquema Básico'),(107,'Establecimiento'),(108,'Estacion'),(109,'Estanque'),(110,'Estímulo'),(111,'Estudio'),(112,'Evaluación'),(113,'Evento'),(114,'Examen'),(115,'Expediente'),(116,'Exposición'),(117,'Familia'),(118,'Festival'),(119,'Ficha'),(120,'Flujo'),(121,'Folleto'),(122,'Formato'),(123,'Foro'),(124,'Frasco'),(125,'Función'),(126,'Granja'),(127,'Grupo'),(128,'Habitante'),(129,'Hectarea'),(130,'Hisopos'),(131,'Hora/ televisión'),(132,'Hora/Clase'),(133,'Hora/Hombre'),(134,'Hora/Máquina'),(135,'Horno'),(136,'Hospital'),(137,'Humedales'),(138,'Informe'),(139,'Infracción'),(140,'Inspección'),(141,'Inventario'),(142,'Investigación'),(143,'Jornada'),(144,'Jornal'),(145,'Juicio'),(146,'Kilogramo'),(147,'Kilómetro Cuadrado'),(148,'Kilómetro Lineal'),(149,'Laboratorio'),(150,'Legajo'),(151,'Ley'),(152,'Libro'),(153,'Licencia'),(154,'Licitación'),(155,'Litro'),(156,'Lote'),(157,'Mantenimiento'),(158,'Mapa'),(159,'Maquila'),(160,'Máquina'),(161,'Marca'),(162,'Mastografía'),(163,'Material'),(164,'Material de Difusión'),(165,'Medicamento'),(166,'Mensaje'),(167,'Mercado'),(168,'Mesabanco'),(169,'Metro Cuadrado'),(170,'Metro Cúbico'),(171,'Módulo'),(172,'Molino'),(173,'Monitoreo'),(174,'Mortalidad'),(175,'Muestra'),(176,'Nacimiento'),(177,'Niño (a)'),(178,'Nómina'),(179,'Notificación'),(180,'Obra'),(181,'Oficina'),(182,'Olla Solar'),(183,'Operativo'),(184,'Organismo'),(185,'Organización'),(186,'Paciente'),(187,'Padre de familia'),(188,'Padrón'),(189,'Pago'),(190,'Panteón'),(191,'Paquete'),(192,'Participante'),(193,'Parto'),(194,'Patronato'),(195,'Pedido'),(196,'Película'),(197,'Permiso'),(198,'Persona'),(199,'Petición'),(200,'Pieza'),(201,'Placa'),(202,'Plan'),(203,'Plano'),(204,'Planta'),(205,'Plática'),(206,'Plaza'),(207,'Poblacion'),(208,'Póliza'),(209,'Pozo'),(210,'Predio'),(211,'Presa'),(212,'Presupuesto'),(213,'Proceso'),(214,'Producto'),(215,'Productor'),(216,'Programa'),(217,'Propuesta'),(218,'Protocolo'),(219,'Proveedor'),(220,'Proyección'),(221,'Proyecto'),(222,'Publicacion'),(223,'Queja'),(224,'Ración'),(225,'Receta'),(226,'Reclusorio'),(227,'Refugio'),(228,'Registro'),(229,'Reportaje'),(230,'Reporte'),(231,'Reserva Territorial'),(232,'Resultado Deportivo'),(233,'Reunión'),(234,'Río'),(235,'Seguro'),(236,'Semáforo'),(237,'Semana'),(238,'Seminario'),(239,'Sesión'),(240,'Señal'),(241,'Simulacro'),(242,'Sistema'),(243,'Sitio'),(244,'Solicitante'),(245,'Solicitud'),(246,'Spot'),(247,'Subsistema'),(248,'Taller'),(249,'Tamiz'),(250,'Tamiz Auditivo'),(251,'Tanque'),(252,'Techo'),(253,'Técnico'),(254,'Teleaula'),(255,'Teleclase'),(256,'Teleconsulta'),(257,'Termo'),(258,'Tonelada'),(259,'Trabajador'),(260,'Trámite'),(261,'Tratamiento'),(262,'Tríptico'),(263,'Turista'),(264,'Unidad'),(265,'Unidad Médica'),(266,'Uniforme'),(267,'Usuario'),(268,'Vacuna'),(269,'Vehículo'),(270,'Victima'),(271,'Visita'),(272,'Vivero'),(273,'Vivienda'),(274,'Volumen'),(275,'Programa Educativo'),(276,'Huerto'),(277,'Comedor'),(278,'Cuarto Adicional'),(279,'Baño'),(280,'Kiosco'),(281,'Revisión'),(282,'Declaración Patrimonial'),(283,'Cédula'),(284,'Acta'),(285,'Verificación'),(286,'Seguimiento'),(287,'Resolución');
/*!40000 ALTER TABLE `u_medida_prog01` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_responsable`
--

DROP TABLE IF EXISTS `u_responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_responsable` (
  `id_u_responsable` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `no_u_responsable` smallint(4) unsigned zerofill NOT NULL,
  `u_responsable` text NOT NULL,
  `titular` text,
  PRIMARY KEY (`id_u_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_responsable`
--

LOCK TABLES `u_responsable` WRITE;
/*!40000 ALTER TABLE `u_responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_medida_prog02`
--

DROP TABLE IF EXISTS `unidad_medida_prog02`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_medida_prog02` (
  `id_unidad` smallint(6) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_medida_prog02`
--

LOCK TABLES `unidad_medida_prog02` WRITE;
/*!40000 ALTER TABLE `unidad_medida_prog02` DISABLE KEYS */;
INSERT INTO `unidad_medida_prog02` VALUES (1,'Agrupación'),(2,'Albergue'),(3,'Alumno'),(4,'Análisis'),(5,'Anexo'),(6,'Antena'),(7,'Apoyo '),(8,'Asesoría'),(9,'Auditoria'),(10,'Aula'),(11,'Ave'),(12,'Baño ecológico'),(13,'Beca'),(14,'Biblioteca'),(15,'Biodigestor'),(16,'Bodega'),(17,'Bordo'),(18,'Cabeza'),(19,'Canal '),(20,'Cancha'),(21,'Capacitación'),(22,'Caseta'),(23,'Celda solar'),(24,'Centro'),(25,'Centro de Salud'),(26,'Certificado'),(27,'Clínica'),(28,'Cocina'),(29,'Colmena'),(30,'Consulta'),(31,'Convenio'),(32,'Convocatoria'),(33,'Crédito'),(34,'Curso'),(35,'Desayuno'),(36,'Despensa'),(37,'Documento'),(38,'Empresa'),(39,'Equipo'),(40,'Escuela'),(41,'Estanque'),(42,'Estímulo'),(43,'Estudio'),(44,'Evaluación'),(45,'Evento'),(46,'Fosa Séptica'),(47,'Granja'),(48,'Hectárea'),(49,'Hospital'),(50,'Huerto'),(51,'Industria'),(52,'Informe'),(53,'Investigación'),(54,'Jardín'),(55,'Kilómetro'),(56,'Laboratorio'),(57,'Letrina'),(58,'Luminaria'),(59,'Maestro'),(60,'Metro'),(61,'Metro Cuadrado'),(62,'Metro Cúbico'),(63,'Módulo'),(64,'Nave Industrial'),(65,'Negocio'),(66,'Obra'),(67,'Paquete'),(68,'Panadería'),(69,'Participante'),(70,'Persona'),(71,'Pieza'),(72,'Placa'),(73,'Planta de Luz'),(74,'Planta de Tratamiento'),(75,'Planta Potabilizador'),(76,'Plaza'),(77,'Poste'),(78,'Pozo'),(79,'Ración '),(80,'Sanitario'),(81,'Sistema'),(82,'Subestación'),(83,'Supervisión'),(84,'Taller'),(85,'Tanque'),(86,'Tienda'),(87,'Tonelada'),(88,'Tortillería'),(89,'Unidad Médica'),(90,'Unidad Pecuaria'),(91,'Usuario'),(92,'Vehículo'),(93,'Visita'),(94,'Vivero'),(95,'Vivienda'),(96,'Proceso'),(97,'Reunión'),(98,'Campaña'),(99,'Cría'),(100,'Concurso'),(101,'Escritura'),(102,'Pago'),(103,'Registro'),(104,'Expediente'),(105,'Servicios Sanitarios'),(106,'Habitación'),(107,'Cisterna'),(108,'Cuarto Adicional'),(109,'Estufa Ecológica'),(110,'Planta Solar'),(111,'Olla Ecológica'),(112,'Actividad'),(113,'Proyección'),(114,'Publicación'),(115,'Filtro de Agua'),(116,'Fogón'),(117,'Calentador Solar'),(118,'Aportación'),(119,'Recaudación'),(120,'Notificación'),(121,'Verificación'),(122,'Tinaco'),(123,'Taza Ecológica'),(124,'Planta de Beneficio'),(125,'Focos Led'),(126,'Comedor');
/*!40000 ALTER TABLE `unidad_medida_prog02` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `activo` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `id_perfil` tinyint(3) unsigned NOT NULL,
  `id_dependencia` tinyint(3) unsigned NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `area` varchar(128) DEFAULT NULL,
  `cargo` varchar(128) DEFAULT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `tel_oficina` varchar(128) DEFAULT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `tel_cel` varchar(45) DEFAULT NULL,
  `extraordinario` tinyint(4) DEFAULT '0',
  `trim_habilitado` tinyint(3) unsigned DEFAULT NULL,
  `permisos` tinyint(3) unsigned DEFAULT '0',
  `f_captura_prog01` date DEFAULT NULL,
  `i_captura_prog01` date DEFAULT NULL,
  `siglas_usu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `usuario_perfil_idx` (`id_perfil`),
  KEY `usuario_dep_idx` (`id_dependencia`),
  CONSTRAINT `usuario_dep` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variables_indicadores`
--

DROP TABLE IF EXISTS `variables_indicadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variables_indicadores` (
  `id_indicador` int(11) NOT NULL,
  `var1` varchar(256) NOT NULL,
  `var2` varchar(256) DEFAULT NULL,
  `var3` varchar(256) DEFAULT NULL,
  `var4` varchar(256) DEFAULT NULL,
  `var5` varchar(256) DEFAULT NULL,
  `var6` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_indicador`),
  CONSTRAINT `var_indicador` FOREIGN KEY (`id_indicador`) REFERENCES `indicadores` (`id_indicador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variables_indicadores`
--

LOCK TABLES `variables_indicadores` WRITE;
/*!40000 ALTER TABLE `variables_indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `variables_indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'siplan2019'
--

--
-- Dumping routines for database 'siplan2019'
--
/*!50003 DROP FUNCTION IF EXISTS `add_indicador_anual` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE FUNCTION `add_indicador_anual`(in_id_indicador smallint) RETURNS tinyint(1)
    DETERMINISTIC
begin
  insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,25,'0','0','0','0','0','0');
    return true;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `add_indicador_bienal` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE FUNCTION `add_indicador_bienal`(in_id_indicador smallint) RETURNS tinyint(1)
    DETERMINISTIC
begin
  insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values 
     (in_id_indicador,26,'0','0','0','0','0','0'),
    (in_id_indicador,27,'0','0','0','0','0','0');
    
    return true;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `add_indicador_bimestral` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE FUNCTION `add_indicador_bimestral`(in_id_indicador smallint) RETURNS tinyint(1)
    DETERMINISTIC
begin
  insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,13,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,14,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,15,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,16,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,17,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,18,'0','0','0','0','0','0');
    return true;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `add_indicador_mes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE FUNCTION `add_indicador_mes`(in_id_indicador smallint) RETURNS tinyint(1)
    DETERMINISTIC
begin
	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,1,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,2,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,3,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,4,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,5,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,6,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,7,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,8,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,9,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,10,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,11,'0','0','0','0','0','0');
    	insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,12,'0','0','0','0','0','0');
    return true;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `add_indicador_semestral` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE FUNCTION `add_indicador_semestral`(in_id_indicador smallint) RETURNS tinyint(1)
    DETERMINISTIC
begin
  insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,23,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,24,'0','0','0','0','0','0');
    return true;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `add_indicador_trimestral` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE FUNCTION `add_indicador_trimestral`(in_id_indicador smallint) RETURNS tinyint(1)
    DETERMINISTIC
begin
  insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,19,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,20,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,21,'0','0','0','0','0','0');
    insert into resultados_indicadores (id_indicador,periodo_evaluacion,resultado_var1,resultado_var2,resultado_var3,resultado_var4,resultado_var5,resultado_var6) 
    values (in_id_indicador,22,'0','0','0','0','0','0');
    return true;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `actualizar_pp` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `actualizar_pp`(
in p_id_proyecto smallint(6),
in p_no_proyecto smallint(6), 
in p_nombre text, 
in p_prog_pres tinyint(2),
in p_uresponsable varchar(128),
in p_titular varchar(256),
in p_eje tinyint(1),
in p_linea tinyint(2),
in p_estrategia smallint(3),
in p_pnd_eje tinyint(1),
in p_pnd_objetivo tinyint(2),
in p_pnd_estrategia smallint(3),
in p_pnd_linea smallint(3),
in p_ponderacion float,
in p_proposito text,
in p_diagnostico text,
in p_gvulnerable tinyint(2),
in p_ben_h int(11),
in p_ben_m int(11),
in p_u_medida varchar(128),
in p_prog_anual float,
in p_p_semestral float,
in p_finalidad tinyint(1),
in p_funcion tinyint(2),
in p_subfuncion smallint(3),
in p_observaciones text,
in p_objetivo text,
in p_dependencia int(11),
in h_usuario smallint,
in h_ip varchar(10))
begin

UPDATE proyectos SET
id_eje = p_eje, 
id_linea = p_linea, 
id_estrategia = p_estrategia, 
no_proyecto = p_no_proyecto, 
nombre = p_nombre, 
ponderacion = p_ponderacion, 
unidad_medida = p_u_medida,
cantidad = p_prog_anual ,  
prog_sem = p_p_semestral, 
g_vulnerable = p_gvulnerable, 
beneficiarios_h = p_ben_h, 
beneficiarios_m = p_ben_m, 
justificacion = p_diagnostico,  
finalidad = p_finalidad, 
funcion = p_funcion, 
subfuncion = p_subfuncion, 
objetivo = p_objetivo,
proposito = p_proposito, 
observaciones = p_observaciones, 
uresponsable = p_uresponsable, 
titular = p_titular, 
pnd_eje = p_pnd_eje, 
pnd_objetivo = p_pnd_objetivo, 
pnd_estrategia = p_pnd_estrategia, 
pnd_linea_accion = p_pnd_linea, 
prog_pres = p_prog_pres
WHERE
id_proyecto = p_id_proyecto;



insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (h_usuario,curdate(),curtime(),7,h_ip,p_id_proyecto);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregar_actividad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `agregar_actividad`(in componente SMALLINT(6), in proyecto SMALLINT(6), in dependencia TINYINT(3), in idescripcion TEXT, in tipo SMALLINT(6), in iunidad_medida SMALLINT(6), in icantidad BIGINT(20), in iponderacion FLOAT, in ino_accion TINYINT(4), in iped TINYINT(4), in idescripcion_actividad TEXT, in itipo_descripcion VARCHAR(45), in iper_gen TINYINT(1), in m1 VARCHAR(45), in m2 VARCHAR(45), in m3 VARCHAR(45), in m4 VARCHAR(45), in m5 VARCHAR(45), in m6 VARCHAR(45), in m7 VARCHAR(45), in m8 VARCHAR(45), in m9 VARCHAR(45), in m10 VARCHAR(45), in m11 VARCHAR(45), in m12 VARCHAR(45))
begin
                        INSERT INTO acciones (id_componente, id_proyecto, id_dependencia, descripcion, id_tipo, unidad_medida, cantidad, ponderacion, no_accion, ped, descripcion_actividad, tipo_descripcion, per_gen) VALUES (componente, proyecto, dependencia, idescripcion, tipo, iunidad_medida, icantidad, iponderacion, ino_accion, iped, idescripcion_actividad, itipo_descripcion, iper_gen);
                        set @id = last_insert_id();
                        INSERT INTO metas (id_accion, enero_m, febrero_m, marzo_m, abril_m, mayo_m, junio_m, julio_m, agosto_m, septiembre_m, octubre_m, noviembre_m, diciembre_m) values (@id, m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12);
                        INSERT INTO resultados (id_accion) VALUES (@id);
                        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregar_componente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `agregar_componente`(
in proyecto SMALLINT(6),
in idescripcion TEXT,
in tipo SMALLINT(6),
in medida SMALLINT(6),
in icantidad BIGINT(20),
in iponderacion FLOAT,
in responsable SMALLINT(6),
in num TINYINT(2),
in eje TINYINT(4),
in linea TINYINT(4),
in estrategia SMALLINT(6),
in prog TINYINT(4),
in trasversal SMALLINT(3),
in i_ods varchar (128))
BEGIN
INSERT INTO componentes (
            id_proyecto,
            descripcion,
            id_tipo,
            unidad_medida,
            cantidad,
            ponderacion,
            unidad_responsable,
            no_componente,
            ped_eje,
            ped_linea,
            ped_estrategia,
            estatus,
            prog_pres,
            cve_trasversal,
            ods
            )
            VALUES (proyecto,
            idescripcion,
            tipo,
            medida,
            icantidad,
            iponderacion,
            responsable,
            num,
            eje,
            linea,
            estrategia,
            0,
            prog,
            trasversal,
            i_ods
            );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregar_indicador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `agregar_indicador`( in i_nivel_indicador tinyint, in i_proyecto smallint, in i_componente smallint, in i_actividad smallint, in i_nombre varchar(256), in idefinicion text,
                in i_metodo tinyint, in i_tipo tinyint, in i_dimension tinyint, in i_frecuencia tinyint, in i_sentido tinyint, in i_u_medida varchar(256), in i_meta varchar(16), in i_linea varchar(16),
                in i_medio text, in i_supuesto text, in i_var1 varchar(256), in i_var2 varchar(256), in i_var3 varchar(256), in i_var4 varchar(256), in i_var5 varchar(256), in i_var6 varchar(256),
                in i_usuario smallint, in i_ip varchar(10) )
begin
            insert into indicadores 
                (nivel_indicador, id_proyecto, id_componente, id_actividad, nombre, definicion, metodo, tipo, dimension, frecuencia, sentido, u_medida, meta, linea_base, medio_verificacion, supuesto) 
                values
                (i_nivel_indicador, i_proyecto, i_componente, i_actividad, i_nombre, idefinicion, i_metodo, i_tipo, i_dimension, i_frecuencia, i_sentido, i_u_medida, i_meta, i_linea, i_medio, i_supuesto);
                set @insertado = last_insert_id();

                insert into variables_indicadores (id_indicador,var1,var2,var3,var4,var5,var6) values (@insertado,i_var1,i_var2,i_var3,i_var4,i_var5,i_var6);
                    select i_frecuencia,
                    case 
                    when i_frecuencia = 1 then add_indicador_mes(@insertado)
                    when i_frecuencia = 2 then add_indicador_bimestral(@insertado)
                    when i_frecuencia = 3 then add_indicador_trimestral(@insertado)
                    when i_frecuencia = 4 then add_indicador_semestral(@insertado)
                    when i_frecuencia = 5 then add_indicador_anual(@insertado)
                     when i_frecuencia = 5 then add_indicador_bienal(@insertado)
                    end;
                    insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (i_usuario,curdate(),curtime(),15,i_ip,@insertado);
                        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `agregar_responsable` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `agregar_responsable`(in dependencia TINYINT(3), in responsable TEXT, in ititular TEXT)
BEGIN
        SET @num = (SELECT count(*) FROM u_responsable WHERE id_dependencia = dependencia) + 1;
        IF(@num < 10) THEN
        SET @num = CONCAT('0', @num);
        END IF;
        IF(dependencia < 10) THEN
        SET @dep = CONCAT('0', dependencia);
        ELSE
        SET @dep = dependencia;
        END IF;
        SET @nu = CONCAT(@dep, @num);
        INSERT INTO u_responsable (id_dependencia, no_u_responsable, u_responsable, titular) VALUES(dependencia, @nu, responsable, ititular);
        SELECT * FROM u_responsable where id_u_responsable = last_insert_id();
        END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `contar_indicadores_pp` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `contar_indicadores_pp`(in id_proyecto int(11))
begin
            set @c_indicadores_fin = (select count(*) from indicadores_fin WHERE id_pp = id_proyecto);
            set @c_indicadores_proposito = (select count(*) from indicadores_proposito WHERE id_pp = id_proyecto);
            select (@c_indicadores_fin + @c_indicadores_proposito);
            end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_actividad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `delete_actividad`(in accion SMALLINT(6), in proyecto SMALLINT(6))
begin
                        set @estatus = (SELECT estatus FROM proyectos WHERE id_proyecto = proyecto);
                        set @indicadores = (SELECT count(*) FROM indicadores WHERE id_actividad = accion AND nivel_indicador = 4);

    -- Verificar estatus del proyecto
    IF(@estatus != 1 AND @estatus != 2 AND @indicadores = 0) THEN
        -- Eliminar metas asociadas a la actividad
        DELETE FROM metas WHERE id_accion = accion;
        DELETE FROM resultados WHERE id_accion = accion;
        -- Eliminar Actividad
        DELETE FROM acciones WHERE id_accion = accion;
        
        END IF;
        select count(*) from acciones WHERE id_accion = accion;
        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_componente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `delete_componente`(in componente SMALLINT(6), in proyecto SMALLINT(6))
begin
	set @estatus = (SELECT estatus FROM proyectos WHERE id_proyecto = proyecto);
    IF(@estatus != 1 AND @estatus != 2) THEN
		SET @act = (SELECT COUNT(*) FROM acciones WHERE id_componente = componente);
		SET @ind = (SELECT COUNT(*) FROM indicadores WHERE id_componente = componente AND nivel_indicador = 3);
			IF(@ind = 0 AND @act = 0) THEN
			DELETE FROM componentes WHERE id_componente = componente;
            END IF;
	END IF;
select count(*) from componentes WHERE id_componente = componente;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_indicador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `delete_indicador`(in indicador SMALLINT(6), in proyecto SMALLINT(6))
begin
    set @estatus = (SELECT estatus FROM proyectos WHERE id_proyecto = proyecto);
    -- Verificar estatus del proyecto
    IF(@estatus != 1 AND @estatus != 2) THEN
        -- Eliminar metas asociadas a la actividad
        DELETE FROM variables_indicadores WHERE id_indicador = indicador;
        DELETE FROM resultados_indicadores WHERE id_indicador = indicador;
        -- select count(*) from variables_indicadores where id_indicador = indicador;
        SET @var = (SELECT count(*) FROM variables_indicadores WHERE id_indicador = indicador);
        SET @res = (SELECT count(*) FROM resultados_indicadores WHERE id_indicador = indicador);
        IF(@var = 0 AND @res = 0) THEN
        DELETE FROM indicadores where id_indicador = indicador and id_proyecto = proyecto;
        END IF;
        END IF;
        select count(*) from indicadores where id_indicador = indicador;
        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_responsable` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `delete_responsable`(in responsable SMALLINT(6))
begin
        set @comp = (SELECT count(*) FROM componentes WHERE unidad_responsable = responsable);
        IF(@comp = 0) THEN
        DELETE FROM u_responsable WHERE id_u_responsable = responsable;
        END IF;
        select count(*) from u_responsable where id_u_responsable = responsable;
        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `editar_actividad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `editar_actividad`(in id_actividad SMALLINT(6), in proyecto SMALLINT(6), in descripcion TEXT, in id_tipo SMALLINT(6), in unidad_medida SMALLINT(6), in cantidad BIGINT(20), in ponderacion FLOAT, in no_accion TINYINT(4), in ped TINYINT(4), in descripcion_actividad TEXT, in tipo_descripcion VARCHAR(45), in per_gen TINYINT(1), in m1 VARCHAR(45), in m2 VARCHAR(45), in m3 VARCHAR(45), in m4 VARCHAR(45), in m5 VARCHAR(45), in m6 VARCHAR(45), in m7 VARCHAR(45), in m8 VARCHAR(45), in m9 VARCHAR(45), in m10 VARCHAR(45), in m11 VARCHAR(45), in m12 VARCHAR(45))
begin
        set @estatus = (select estatus FROM proyectos where id_proyecto = proyecto);
    -- Verificar estatus del proyecto
    
    UPDATE acciones SET descripcion = descripcion, id_tipo = id_tipo, unidad_medida = unidad_medida, cantidad = cantidad, ponderacion = ponderacion, no_accion = no_accion, ped = ped, descripcion_actividad = descripcion_actividad, tipo_descripcion = tipo_descripcion, per_gen = per_gen WHERE id_accion = id_actividad;
    UPDATE metas SET enero_m = m1, febrero_m = m2 , marzo_m = m3, abril_m =  m4, mayo_m = m5, junio_m = m6, julio_m = m7, agosto_m = m8, septiembre_m = m9, octubre_m = m10, noviembre_m = m11, diciembre_m = m12 WHERE id_accion = id_actividad;
  
    end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `editar_componente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `editar_componente`(
in componente SMALLINT(6),
in proyecto SMALLINT(6),
in idescripcion TEXT,
in tipo SMALLINT(6),
in medida SMALLINT(6),
in icantidad BIGINT(20),
in iponderacion FLOAT,
in responsable SMALLINT(6),
in num TINYINT(2),
in eje TINYINT(4),
in linea TINYINT(4),
in estrategia SMALLINT(6),
in prog TINYINT(4),
in trasversal SMALLINT(3),
in i_ods varchar(128)
)
BEGIN
 set @estatus = (select estatus FROM proyectos where id_proyecto = proyecto);
    -- Verificar estatus del proyecto
    IF(@estatus != 1 and @estatus != 2) THEN
    UPDATE componentes SET 
            descripcion = idescripcion,
            id_tipo = tipo,
            unidad_medida = medida,
            cantidad = icantidad,
            ponderacion = iponderacion,
            unidad_responsable = responsable,
            no_componente = num,
            ped_eje = eje,
            ped_linea = linea,
            ped_estrategia = estrategia,
            prog_pres = prog,
            cve_trasversal = trasversal,
            ods = i_ods
            WHERE id_componente = componente;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `editar_indicador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `editar_indicador`(in iproyecto SMALLINT(6), in indicador INT(11), in inombre VARCHAR(256), in idefinicion TEXT, in imetodo TINYINT(4), in itipo TINYINT(4), in idimension TINYINT(4), in ifrecuencia TINYINT(4), in isentido TINYINT(4), in iu_medida VARCHAR(256), in imeta VARCHAR(16), in ilinea_base VARCHAR(16), in imedio_verificacion TEXT, in isupuesto TEXT, in ivar1 VARCHAR(256), in ivar2 VARCHAR(256), in ivar3 VARCHAR(256), in ivar4 VARCHAR(256), in ivar5 VARCHAR(256))
BEGIN
        -- SET @estatus = (SELECT estatus FROM proyectos WHERE id_proyecto = iproyecto);
        -- IF(@estatus != 1 and @estatus != 2) THEN
        UPDATE indicadores SET nombre = inombre, definicion = idefinicion, metodo = imetodo, tipo = itipo, dimension = idimension, frecuencia = ifrecuencia, sentido = isentido, u_medida = iu_medida, meta = imeta, linea_base = ilinea_base, medio_verificacion = imedio_verificacion, supuesto = isupuesto WHERE id_indicador = indicador;
        UPDATE variables_indicadores SET var1 = ivar1, var2 = ivar2, var3 = ivar3, var4 = ivar4, var5 = ivar5 WHERE id_indicador = indicador;
        -- END IF;
        END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `editar_responsable` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `editar_responsable`(
            in iresponsable SMALLINT(6),
            in iu_responsable text,
            in ititular TEXT)
begin
		set @comp = (SELECT count(*) FROM componentes WHERE unidad_responsable = iresponsable);
        IF(@comp > 0) THEN
			SET @estatus = (SELECT count(*) FROM componentes c INNER JOIN proyectos p ON c.id_proyecto = p.id_proyecto INNER JOIN u_responsable r ON c.unidad_responsable = r.id_u_responsable WHERE c.unidad_responsable = iresponsable AND p.estatus = 2);
			IF(@estatus  = 0) THEN
				UPDATE u_responsable SET u_responsable = iu_responsable, titular = ititular WHERE id_u_responsable = iresponsable;
            END IF;
		ELSE
			UPDATE u_responsable SET u_responsable = iu_responsable, titular = ititular WHERE id_u_responsable = iresponsable;
        END IF;
        SELECT * FROM u_responsable WHERE id_u_responsable = iresponsable;
        END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `guardar_pp` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `guardar_pp`(
 in _clasificacion smallint(1),
 in p_dependencia smallint,
 in p_eje tinyint(1),
 in p_linea tinyint(2),
 in p_estrategia smallint(3),
 in p_no_proyecto smallint(6),
 in p_nombre text, 
 in p_ponderacion float,
 in p_u_medida varchar(128),
 in p_prog_anual float,
 in p_p_semestral float,
 in p_gvulnerable tinyint(2),
 in p_ben_h int(11),
 in p_ben_m int(11),
 in p_diagnostico text,
 in p_finalidad tinyint(1),
 in p_funcion tinyint(2),
 in p_subfuncion smallint(3), 
 in p_objetivo text, 
 in p_proposito text,
 in p_observaciones text,
 in p_uresponsable varchar(128),
 in p_titular varchar(256),
 in p_pnd_eje tinyint(1),
 in p_pnd_objetivo tinyint(2),
 in p_pnd_estrategia smallint(3),
 in p_pnd_linea smallint(3),
 in p_prog_pres tinyint(2),
 in h_usuario smallint,
 in h_ip varchar(10)
 )
begin
-- Insertamos la info en la tabla general de proyectos

IF(_clasificacion = 1) THEN
	-- SET @id = (SELECT MAX(pps) FROM proyectos WHERE pps >= 1 and pps < 30)+1;
	SET @app = (SELECT count(id_proyecto) FROM proyectos WHERE pps >= 1 and pps < 30);
	IF(@app > 0) THEN
		SET @id = (SELECT MAX(pps) FROM proyectos WHERE pps >= 1 and pps < 30)+1;
	ELSE
		SET @id = 1;
	END IF;
ELSE
	SET @app = (SELECT count(id_proyecto) FROM proyectos WHERE pps >= 31);
	IF(@app > 0) THEN
		SET @id = (SELECT MAX(pps) FROM proyectos WHERE pps >= 31)+1;
	ELSE
		SET @id = 31;
	END IF;
END IF;
INSERT INTO proyectos (
  id_dependencia,
  id_eje, 
  id_linea, 
  id_estrategia,
  estatus, 
  grado, 
  no_proyecto, 
  nombre, 
  clasificacion, 
  inversion, 
  ponderacion, 
  unidad_medida,
  cantidad, 
  prog_sem,
  g_vulnerable, 
  beneficiarios_h, 
  beneficiarios_m, 
  justificacion,  
  finalidad, 
  funcion, 
  subfuncion, 
  objetivo, 
  proposito, 
  observaciones, 
  anual_pr, 
  uresponsable, 
  titular, 
  pnd_eje, 
  pnd_objetivo, 
  pnd_estrategia, 
  pnd_linea_accion, 
  prog_pres,
  pps
)
VALUES (
p_dependencia,
p_eje,
p_linea,
p_estrategia,
0,
0,
p_no_proyecto,
p_nombre,
_clasificacion,
0,
p_ponderacion,
p_u_medida,
p_prog_anual,
p_p_semestral, 
p_gvulnerable,
p_ben_h,
p_ben_m,
p_diagnostico,
p_finalidad,
p_funcion,
p_subfuncion,
p_objetivo,
p_proposito,
p_observaciones,
2019,
p_uresponsable,
p_titular,
p_pnd_eje,
p_pnd_objetivo,
p_pnd_estrategia,
p_pnd_linea,
p_prog_pres, @id);
-- insertamos informacion en la tabla de proyectos prioritarios

    insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (h_usuario,curdate(),curtime(),6,h_ip,@insertado);

        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `guardar_ppi` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `guardar_ppi`(
 in p_dependencia smallint,
 in p_eje tinyint(1),
 in p_linea tinyint(2),
 in p_estrategia smallint(3),
 in p_no_proyecto smallint(6),
 in p_nombre text, 
 in p_ponderacion float,
 in p_u_medida varchar(128),
 in p_prog_anual float,
 in p_p_semestral float,
 in p_gvulnerable tinyint(2),
 in p_ben_h int(11),
 in p_ben_m int(11),
 in p_diagnostico text,
 in p_finalidad tinyint(1),
 in p_funcion tinyint(2),
 in p_subfuncion smallint(3), 
 in p_objetivo text, 
 in p_proposito text,
 in p_observaciones text,
 in p_uresponsable varchar(128),
 in p_titular varchar(256),
 in p_pnd_eje tinyint(1),
 in p_pnd_objetivo tinyint(2),
 in p_pnd_estrategia smallint(3),
 in p_pnd_linea smallint(3),
 in p_prog_pres tinyint(2),
 in h_usuario smallint,
 in h_ip varchar(10)
 )
begin
-- Insertamos la info en la tabla general de proyectos
INSERT INTO proyectos (
  
  id_dependencia,
  id_eje, 
  id_linea, 
  id_estrategia,
  estatus, 
  grado, 
  no_proyecto, 
  nombre, 
  clasificacion, 
  inversion, 
  ponderacion, 
  unidad_medida,
  cantidad, 
  prog_sem,
  g_vulnerable, 
  beneficiarios_h, 
  beneficiarios_m, 
  justificacion,  
  finalidad, 
  funcion, 
  subfuncion, 
  objetivo, 
  proposito, 
  observaciones, 
  anual_pr, 
  uresponsable, 
  titular, 
  pnd_eje, 
  pnd_objetivo, 
  pnd_estrategia, 
  pnd_linea_accion, 
  prog_pres
  
)
VALUES (
p_dependencia,
p_eje,
p_linea,
p_estrategia,
0,
0,
p_no_proyecto,
p_nombre,
0,
0,
p_ponderacion,
p_u_medida,
p_prog_anual,
p_p_semestral, 
p_gvulnerable,
p_ben_h,
p_ben_m,
p_diagnostico,
p_finalidad,
p_funcion,
p_subfuncion,
p_objetivo,
p_proposito,
p_observaciones,
2019,
p_uresponsable,
p_titular,
p_pnd_eje,
p_pnd_objetivo,
p_pnd_estrategia,
p_pnd_linea,
p_prog_pres);
-- insertamos informacion en la tabla de proyectos prioritarios
set @insertado = last_insert_id();
insert into proyectos_ppi (id_proyecto,nom_proyecto_ppi) values (@insertado,p_nombre);
    insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (h_usuario,curdate(),curtime(),6,h_ip,@insertado);

        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `guardar_ppp` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `guardar_ppp`(
 in p_dependencia smallint,
 in p_eje tinyint(1),
 in p_linea tinyint(2),
 in p_estrategia smallint(3),
 in p_no_proyecto smallint(6),
 in p_nombre text, 
 in p_ponderacion float,
 in p_u_medida varchar(128),
 in p_prog_anual float,
 in p_p_semestral float,
 in p_gvulnerable tinyint(2),
 in p_ben_h int(11),
 in p_ben_m int(11),
 in p_diagnostico text,
 in p_finalidad tinyint(1),
 in p_funcion tinyint(2),
 in p_subfuncion smallint(3), 
 in p_objetivo text, 
 in p_proposito text,
 in p_observaciones text,
 in p_uresponsable varchar(128),
 in p_titular varchar(256),
 in p_pnd_eje tinyint(1),
 in p_pnd_objetivo tinyint(2),
 in p_pnd_estrategia smallint(3),
 in p_pnd_linea smallint(3),
 in p_prog_pres tinyint(2),
 in h_usuario smallint,
 in h_ip varchar(10)
 )
begin
-- Insertamos la info en la tabla general de proyectos
INSERT INTO proyectos (
  
  id_dependencia,
  id_eje, 
  id_linea, 
  id_estrategia,
  estatus, 
  grado, 
  no_proyecto, 
  nombre, 
  clasificacion, 
  inversion, 
  ponderacion, 
  unidad_medida,
  cantidad, 
  prog_sem,
  g_vulnerable, 
  beneficiarios_h, 
  beneficiarios_m, 
  justificacion,  
  finalidad, 
  funcion, 
  subfuncion, 
  objetivo, 
  proposito, 
  observaciones, 
  anual_pr, 
  uresponsable, 
  titular, 
  pnd_eje, 
  pnd_objetivo, 
  pnd_estrategia, 
  pnd_linea_accion, 
  prog_pres
  
)
VALUES (
p_dependencia,
p_eje,
p_linea,
p_estrategia,
0,
0,
p_no_proyecto,
p_nombre,
1,
0,
p_ponderacion,
p_u_medida,
p_prog_anual,
p_p_semestral, 
p_gvulnerable,
p_ben_h,
p_ben_m,
p_diagnostico,
p_finalidad,
p_funcion,
p_subfuncion,
p_objetivo,
p_proposito,
p_observaciones,
2019,
p_uresponsable,
p_titular,
p_pnd_eje,
p_pnd_objetivo,
p_pnd_estrategia,
p_pnd_linea,
p_prog_pres);
-- insertamos informacion en la tabla de proyectos prioritarios
set @insertado = last_insert_id();
insert into proyectos_ppp (id_proyecto,nom_proyecto_ppp) values (@insertado,p_nombre);
    insert into historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (h_usuario,curdate(),curtime(),6,h_ip,@insertado);

        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `guarda_indicador_fin` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `guarda_indicador_fin`(
                            in i_id_pp int(11),
                            in i_nombre varchar(256),
                            in i_objetivo text,
                            in i_metodo text,
                            in i_tipo tinyint,
                            in i_dimension tinyint,
                            in i_frecuencia tinyint,
                            in i_sentido tinyint,
                            in i_u_medida varchar(256),
                            in i_meta varchar(16),
                            in i_medio text,
                            in i_supuesto text,
                            in i_linea varchar(45)
                            )
begin
                        INSERT INTO indicadores_fin
                        (
                          id_pp,
                          nombre,
                          objetivo,
                          metodo,
                          tipo,
                          dimension,
                          frecuencia,
                          sentido,
                          u_medida,
                          meta,
                          medio_verificacion,
                          supuesto,
                          linea_base
                          )
                        VALUES
                        (i_id_pp,
                            i_nombre,
                            i_objetivo,
                            i_metodo,
                            i_tipo,
                            i_dimension,
                            i_frecuencia,
                            i_sentido,
                            i_u_medida,
                            i_meta,
                            i_medio,
                            i_supuesto,
                            i_linea);
                        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `historial_login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `historial_login`(in u smallint, in e smallint,in i varchar(15) )
begin
                INSERT INTO historial (id_usuario,fecha,hora,evento,ipaddress,identificador) values (u, curdate(), curtime(), e, i, 0);
                select true;
                end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `login`(in u varchar(16),in c varchar(32))
begin
    SELECT COUNT(*) FROM usuarios WHERE usuario = u and password = c;
    end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usuario_habilitado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `usuario_habilitado`(in u varchar(16),in c varchar(32))
begin
        SELECT activo FROM usuarios WHERE usuario = u and password = c;
        end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usuario_info` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `usuario_info`(in u varchar(16),in c varchar(32))
begin
            SELECT
            us.id_usuario,
            us.id_perfil,
            us.id_dependencia,
            us.nombre,
            dep.nombre,
            dep.acronimo
            FROM
            usuarios us
            inner join dependencias dep on (us.id_dependencia = dep.id_dependencia)
            WHERE us.usuario = u and password = c;
            end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-26 14:08:49

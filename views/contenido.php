<?php

if(isset($_GET['token'])){

    switch($_GET['token']){
        /* --------- Programas Presupuestarios -------------------- */
        /* =========================================================*/
        case md5(1):
        require('views/planeacion/lista_pp.php');
        break;
        case md5(2):
        require('views/planeacion/marco_estrategico.php');
        break;
        case md5(3):
        require('clases/planeacion/marco_estrategico_guarda.php');
        break;
        case md5(4):
        require('views/planeacion/nuevo_pp.php');
        break;
        case md5(5):
        require('views/planeacion/lista_indicadores_pp.php');
        break;
        case md5(6):
        require('views/planeacion/nuevo_indicador_pp.php');
        break;
        case md5(7):
        require('views/planeacion/lista_componentes.php');
        break;
        case md5(8):
        require('views/planeacion/nuevo_componente.php');
        break;
        case md5(9):
        require('views/planeacion/lista_indicadores_componente.php');
        break;
        case md5(10):
        require('views/planeacion/lista_actividades.php');
        break;
        case md5(11):
        require('views/planeacion/nueva_actividad.php');
        break;
        case md5(12):
        require('views/planeacion/lista_indicadores_actividad.php');
        break; 
        case md5(13):
        require('views/planeacion/editar_actividad.php');
        break;     
        case md5(14):
        require('views/planeacion/editar_pp.php');
        break;
        case md5(15):
        require('views/planeacion/editar_indicador.php');
        break;
        case md5(16):
        require('views/planeacion/editar_componente.php');
        break;
        case md5(17):
        require('views/planeacion/info_pp.php');
        break;
        case md5(18):
        require('views/planeacion/indicador_info.php');
        break;
        /*============= Catálogos 40-59================*/
        case md5(40):
        require('views/catalogos/unidades_responsables.php');
        break;
        /*============= Reportes 60-89================*/
        case md5(60):
        require('views/reportes/prog_pres.php');
        break;

        /*============= Administracion de usuarios ============= */
        case md5(900):
        require('views/usuarios/perfil_usuario.php');
        break;
        case md5(901):
        require('views/usuarios/usuarios_lista.php');
        break;    
        //Listado de programas que estan en SEFIN
        case md5(902):
        require('views/administracion/sefin.php');
        break;
        
        /*Ejecutar WS-SEFIN */
        //case md5(1000):
        //require('views/imports/aprobar.php');
        //break;
        

        /*============ Cualquier otro sitio llamado que no existe ==============*/
        default:
        require('views/principal.php');
        break;
    }
}else{
    require('views/principal.php');
}

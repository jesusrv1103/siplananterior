<?php
session_start();
require('config.php');
if($_SESSION['keyWord'] !== md5(KEYWORD)){
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    die("no has iniciao ssion");
}

if($_SESSION['activeKey'] !== md5(ACTIVEKEY)){
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    die("no has iniciao ssion");
}

if(PHP_SAPI == 'cli') {
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    die("no se puede ejecutar en linea de comando");
}


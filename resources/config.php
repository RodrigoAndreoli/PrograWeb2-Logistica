<?php

    //Se setea la zona horaria
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_ALL,"spanish");
     
    //Se generan constantes con paths
    $TEMPLATES_PATH=$_SERVER['DOCUMENT_ROOT'].'/resources/templates';
    $LIBRARY_PATH=$_SERVER['DOCUMENT_ROOT'].'/resources/library';
    $DB_PATH=$_SERVER['DOCUMENT_ROOT'].'/resources/db';
    
    //Se importan CSS y JS
    require_once($TEMPLATES_PATH.'/cssHead.php');
    require_once($TEMPLATES_PATH.'/jsHead.php');

    //Se conecta a la DB y se importa el controlador
    require_once($DB_PATH.'/conexion.php');
    require_once($DB_PATH.'/control.php');

    //Se importa la clase Sesion
    require_once($LIBRARY_PATH.'/sesion.php');

?>
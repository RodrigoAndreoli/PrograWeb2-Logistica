<?php

    $host="localhost";
    $dbname="logistica";
    $user="root";
    $pass=""; 
    $conexion = new mysqli($host,$user,$pass,$dbname);
	mysqli_set_charset($conexion, "utf8"); 
    if( $conexion->connect_errno)
    {
        printf("Fallo la conexion: %s\n", $conexion->connect_errno);
        exit();
    }

?>
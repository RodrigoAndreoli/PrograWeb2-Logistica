<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();

    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    $obj = new controlDB();
    $nomb = $_POST['nombre'];
    $pass = $_POST['pass'];
    $doc = $_POST['num_doc'];
    $tipo = $_POST['tipo_doc'];
    $rol = $_POST['rol'];
    $fecha = $_POST['fecha_nacimiento'];
    $clave_md5 = md5($pass);
    $cod = $_POST['cod'];   
    switch($funcion) {
        case 'modificar':
                $sql = "UPDATE Usuario
                    SET nombre = '$nomb',
                        password = '$clave_md5',
                        num_doc = '$doc',
                        tipo_doc = '$tipo',
                        rol = '$rol',
                        fecha_nacimiento = '$fecha'
                    WHERE idUsuario = '$cod'";
                break;
        case 'eliminar':
                $sql = "DELETE
                    FROM Usuario
                    WHERE idUsuario='$id'";
                break;
        case 'insertar':
                $sql = "INSERT INTO Usuario (nombre,password,num_doc,tipo_doc,rol,fecha_nacimiento)
                    VALUES('$nomb','$clave_md5','$doc','$tipo','$rol','$fecha')";
                break;
    }
    $obj -> insertar($sql);
    header("Location: usuarios.php"); 
?>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    //Al eliminar no me interesan los campos nombre y password y demas. Para evitar errores se pone un if
    if($funcion!="eliminar"){
        $nomb = $_POST['nombre'];
        $pass = $_POST['pass'];
        $doc = $_POST['num_doc'];
        $tipo = $_POST['tipo_doc'];
        $rol = $_POST['rol'];
        $fecha = $_POST['fecha_nacimiento'];
        $clave_md5 = md5($pass);
        $cod = $_POST['cod'];    
    }
    
    //Instancia de control
    $obj = new controlDB();
    
    //Modificar value del input hidden
    if($funcion == "modificar"){
        $sql = "UPDATE usuario 
            SET nombre = '$nomb', 
            password = '$clave_md5', 
            num_doc = '$doc', 
            tipo_doc = '$tipo', 
            rol = '$rol', 
            fecha_nacimiento = '$fecha' 
            WHERE idUsuario = '$cod'";
    }
    
    //Eliminar de usuarios.php
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM usuario 
            WHERE idUsuario='$id'";
    } else {
       $sql = "INSERT INTO usuario(nombre,password,num_doc,tipo_doc,rol,fecha_nacimiento)
       VALUES('$nomb','$clave_md5','$doc','$tipo','$rol','$fecha')";
    }  
    $obj -> insertar($sql);
    header("Location: usuarios.php"); 
?>
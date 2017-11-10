<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];

    //Al eliminar no me interesan los campos nombre y password y demas. Para evitar errores se pone un if
    if($funcion!="eliminar"){
        $num_doc = $_POST['num_doc'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];
        $nombre = $_POST['nombre'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $tipo_licencia = $_POST['tipo_licencia'];
        $clave_md5 = md5($pass);
        $cod = $_POST['cod'];    
    }

//    //Instancia de validacion
//    $vobj = new controlDB();
//
//    if($vobj -> validstring($nomb)) {
//        if($vobj -> validint($doc)) {
//            if($vobj -> validstring($tipo)) {
//                if($vobj -> validstring($rol)) {
//                    $obj = new controlDB();
//                }
//            }
//        }
//    }


    //Modificar value del input hidden
    if($funcion == "modificar"){
        $sql = "UPDATE Usuario 
            SET num_doc = '$num_doc',
                pass = '$clave_md5',
                rol = '$rol',
                nombre = '$nombre',
                fecha_nacimiento = '$fecha_nacimiento',
                tipo_licencia = '$tipo_licencia'
            WHERE idUsuario = '$cod'";
    }
    
    //Eliminar de usuarios.php
    else if($funcion == "eliminar"){
		$sql = "DELETE
            FROM Usuario 
            WHERE idUsuario='$id'";
    } else {
       $sql = "INSERT INTO Usuario(num_doc, pass, rol, nombre, fecha_nacimiento, tipo_licencia)
       VALUES('$num_doc', '$clave_md5', '$rol', '$nombre', '$fecha_nacimiento', '$tipo_licencia')";
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    //Instancia de control
    $obj = new controlDB();
    $obj -> insertar($sql);
    header("Location: vista_usuarios.php");

?>
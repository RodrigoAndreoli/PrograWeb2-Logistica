<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    

    //Al eliminar no me interesan los campos nombre y password y demas. Para evitar errores se pone un if
    if($funcion!="eliminar"){
        $nomb = $_POST['nombre'];
        $pass = $_POST['pass'];
        $doc = $_POST['num_doc'];
        $tipo = $_POST['tipo_doc'];
        $rol = $_POST['rol'];
        $fecha = $_POST['fecha_nacimiento'];
		$tplicencia = $_POST['tp_licencia'];
		$nrolicencia = $_POST['nro_licencia'];
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
        $sql = "UPDATE usuario 
            SET nombre = '$nomb', 
            password = '$clave_md5', 
            num_doc = $doc, 
            tipo_doc = '$tipo', 
            rol = '$rol', 
            fecha_nacimiento = '$fecha' 
            WHERE idUsuario = '$cod'";
    }
    
    //Eliminar de usuarios.php
    else if($funcion == "eliminar"){
        $id = $_REQUEST['id'];
		$sql = "DELETE
            FROM usuario 
            WHERE idUsuario='$id'";
    } else {
		if ($nrolicencia=='') $nrolicencia = 0;
       $sql = "INSERT INTO usuario(nombre,password,num_doc,tipo_doc,rol,fecha_nacimiento,tipo_licencia,nro_licencia)
       VALUES('$nomb','$clave_md5',$doc,'$tipo','$rol','$fecha','$tplicencia','$nrolicencia')";
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    //Instancia de control
    $obj = new controlDB();
    $obj -> insertar($sql);
    header("Location: vista_usuarios.php");

?>
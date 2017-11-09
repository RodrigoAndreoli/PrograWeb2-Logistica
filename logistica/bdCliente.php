<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/resources/log/creaLog.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];

    if($funcion!="eliminar"){
        $obj = new controlDB();
        $cuit = $_POST['cuit'];
        $razon = $_POST['razon'];
        $dom_numero = $_POST['dom_numero'];
        $dom_calle = $_POST['dom_calle'];
        $dom_cp = $_POST['dom_cp'];
        $dom_piso = $_POST['dom_piso'];
        $telefono = $_POST['telefono'];   
        $cod = $_POST['cod'];
    }

    $obj = new controlDB();

    if($funcion == "modificar"){
        $sql = "UPDATE Cliente
            SET cuit = '$cuit',
            razon = '$razon',
            dom_numero = '$dom_numero',
            dom_calle = '$dom_calle',
            dom_cp = '$dom_cp',
            dom_piso = '$dom_piso',
            telefono = '$telefono'
            WHERE idCliente = '$cod'";
    }
        
        
    else if($funcion == "eliminar"){
            $sql = "DELETE
                FROM Cliente 
                WHERE idCliente='$id'";
    } else {
        $sql = "INSERT INTO Cliente (cuit,razon,dom_numero,dom_calle,dom_cp,dom_piso,telefono)
            VALUES('$cuit','$razon','$dom_numero','$dom_calle','$dom_cp','$dom_piso','$telefono')";
    }
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
    
    $obj -> insertar($sql);
    header("Location: vista_clientes.php");

?>
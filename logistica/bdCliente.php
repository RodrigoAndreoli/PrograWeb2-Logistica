<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    $obj = new controlDB();
    $cuit = $_POST['cuit'];
    $razon = $_POST['razon'];
    $dom_numero = $_POST['dom_numero'];
    $dom_calle = $_POST['dom_calle'];
    $dom_cp = $_POST['dom_cp'];
    $dom_piso = $_POST['dom_piso'];
    $telefono = $_POST['telefono'];   
    $cod = $_POST['cod'];
    switch($funcion) {
        case 'modificar':
            $sql = "UPDATE Cliente
                SET cuit = '$cuit',
                    razon = '$razon',
                    dom_numero = '$dom_numero',
                    dom_calle = '$dom_calle',
                    dom_cp = '$dom_cp',
                    dom_piso = '$dom_piso',
                    telefono = '$telefono'
                WHERE idCliente = '$cod'";
            break;
        case 'eliminar':
            $sql = "DELETE
                FROM Cliente 
                WHERE idCliente='$id'";
            break;
        case 'insertar':
            $sql = "INSERT INTO Cliente (cuit,razon,dom_numero,dom_calle,dom_cp,dom_piso,telefono)
                VALUES('$cuit','$razon','$dom_numero','$dom_calle','$dom_cp','$dom_piso','$telefono')";
            break;
    }
    $obj -> insertar($sql);
    header("Location: clientes.php"); 
?>
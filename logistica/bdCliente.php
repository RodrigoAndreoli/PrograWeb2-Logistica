<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    //Al eliminar no me interesan los campos nombre y password y demas. Para evitar errores se pone un if
    if($funcion!="eliminar"){
        $cuit = $_POST['cuit'];
        $razon = $_POST['razon'];
        $dom_numero = $_POST['dom_numero'];
        $dom_calle = $_POST['dom_calle'];
        $dom_cp = $_POST['dom_cp'];
        $dom_piso = $_POST['dom_piso'];
        $telefono = $_POST['telefono'];   
        $cod = $_POST['cod'];  
    }
    
    //Instancia de control
    $obj = new controlDB();
    
    //Modificar value del input hidden
    if($funcion == "modificar"){
        $sql = "UPDATE cliente 
            SET cuit = '$cuit', 
            razon = '$razon', 
            dom_numero = '$dom_numero', 
            dom_calle = '$dom_calle', 
            dom_cp = '$dom_cp',
            dom_piso = '$dom_piso',
            telefono = '$telefono'  
            WHERE idCliente = '$cod'";
    }
    
    //Eliminar de usuarios.php
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM cliente 
            WHERE idCliente='$id'";
    } else {
       $sql = "INSERT INTO cliente(cuit,razon,dom_numero,dom_calle,dom_cp,dom_piso,telefono)
       VALUES('$cuit','$razon','$dom_numero','$dom_calle','$dom_cp','$dom_piso','$telefono')";
    }  
    $obj -> insertar($sql);
    header("Location: clientes.php"); 
?>
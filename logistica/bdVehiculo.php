<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    //Capturas los input hidden, request captura tanto get como post
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
    
    //Al eliminar no me interesan los campos nombre y password y demas. Para evitar errores se pone un if
    if($funcion!="eliminar"){
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $tipo_vehi = $_POST['tipo_vehi'];
        $patente = $_POST['patente'];
        $num_chasis = $_POST['num_chasis'];
        $num_motor = $_POST['num_motor'];
        $anio = $_POST['anio'];
        $kilometros = $_POST['kilometros'];   
        $cod = $_POST['cod'];  
    }
    
    //Instancia de control
    $obj = new controlDB();
    
    //Modificar value del input hidden
    if($funcion == "modificar"){
        $sql = "UPDATE vehiculo 
            SET marca = '$marca', 
            modelo = '$modelo', 
            tipo_vehiculo = '$tipo_vehi', 
            patente = '$patente', 
            nro_chasis = '$num_chasis',
            km = '$kilometros',
            anio = '$anio', 
            nro_motor = '$num_motor' 
            WHERE idVehiculo = '$cod'";
    }
    
    //Eliminar de usuarios.php
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM vehiculo 
            WHERE idVehiculo='$id'";
    } else {
       $sql = "INSERT INTO vehiculo(marca,modelo,tipo_vehiculo,patente,nro_chasis,km,anio,nro_motor)
       VALUES('$marca','$modelo','$tipo_vehi','$patente','$num_chasis','$kilometros','$anio','$num_motor')";
    }  
    $obj -> insertar($sql);
    header("Location: vehiculo.php"); 
?>
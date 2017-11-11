<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
 
    if($funcion!="eliminar"){
        $fkClienteP = $_POST['fkClienteP'];
        $fkAdministradorP = $_POST['fkAdministradorP'];
        $tiempo_estimado = $_POST['tiempo_estimado'];
        $km_estimado = $_POST['km_estimado'];
        $combustible_estimado = $_POST['combustible_estimado'];
        $costo_real = $_POST['costo_real'];
        $aceptado = $_POST['aceptado'];
        $cod = $_POST['cod'];
    }
    
    //Instancia de control
    $obj = new controlDB();
    
    //Modificar value del input hidden
    if($funcion == "modificar"){
        $sql = "UPDATE presupuesto 
            SET tiempo_estimado = '$tiempo_estimado',
                km_estimado = '$km_estimado',
                combustible_estimado = '$combustible_estimado',
                costo_real = '$costo_real',
                aceptado = '$aceptado'
            WHERE idPresupuesto = '$cod'";
           // print_r($sql);
    }
    
    //Eliminar de usuarios.php
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM Presupuesto 
            WHERE idPresupuesto='$id'";
    } else {
       $sql = "INSERT INTO Presupuesto(fkClienteP, fkAdministradorP, tiempo_estimado, km_estimado, combustible_estimado, costo_real, aceptado)
       VALUES('$fkClienteP', '$fkAdministradorP', '$tiempo_estimado', '$km_estimado', '$combustible_estimado', '$costo_real', '$aceptado')";
    }  
	
	// escribe en el log
	$log = new creaLog();
	$log->escribir($sql);
	
    $obj -> insertar($sql);
    header("Location: vista_presupuestos.php");
?>
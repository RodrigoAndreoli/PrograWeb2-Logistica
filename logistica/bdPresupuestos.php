<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    $miSession = new Sesion();
    $miSession -> iniciarSesion();
    $funcion = $_REQUEST['funcion'];
    $id = $_REQUEST['id'];
 
    if($funcion!="eliminar"){
        $tiempo = $_POST['tiempo_estimado'];
        $estado = $_POST['estado'];
        $aceptado = $_POST['aceptado'];
        $costo_real = $_POST['costo_real'];
        $km_previstos = $_POST['km_previstos'];
        $combustible = $_POST['combustible_previsto']; 
        $idCliente = $_POST['idCliente'];
        $idUsuario = $_POST['idUsuario'];
        $idViaje = $_POST['idViaje'];
    }
    
    //Instancia de control
    $obj = new controlDB();
    
    //Modificar value del input hidden
    if($funcion == "modificar"){
        $sql = "UPDATE presupuesto 
            SET tiempo_estimado = '$tiempo', 
            estado = '$estado', 
            aceptado = '$aceptado', 
            costo_real = '$costo_real', 
            km_previstos = '$km_previstos', 
            combustible_previsto = '$combustible',
            idCliente = '$idCliente',
            idUsuario = '$idUsuario',
            idViaje = '$idViaje'
            WHERE idPresupuesto = '$cod'";
    }
    
    //Eliminar de usuarios.php
    else if($funcion == "eliminar"){
        $sql = "DELETE
            FROM presupuesto 
            WHERE idPresupuesto='$id'";
    } else {
       $sql = "INSERT INTO presupuesto(tiempo_estimado,estado,aceptado,costo_real,km_previstos,combustible_previsto,idCliente,idUsuario,idViaje)
       VALUES('$tiempo','$estado','$aceptado','$costo_real','$km_previstos','$combustible','$idCliente','$idUsuario','$idViaje')";
    }  
    $obj -> insertar($sql);
    header("Location: presupuestos.php");
?>
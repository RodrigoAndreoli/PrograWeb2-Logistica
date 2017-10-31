<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/conexion.php');
    
    $sql="select patente,km from vehiculo";

    $resultado=$conexion->query($sql);
   // print_r($resultado);
    $dataTable=array(array("patente","km"));
    //print_r($resultado);
    while($fila=mysqli_fetch_assoc($resultado)){
        $dataTable[]=array($fila['patente'],(int)$fila['km']);
    }

    mysqli_close($conexion);
    echo json_encode($dataTable);
?>
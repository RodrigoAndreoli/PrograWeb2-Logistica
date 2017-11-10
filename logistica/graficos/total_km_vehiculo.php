<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/conexion.php');
    
    $sql="SELECT V.patente Patente, V.km Km 
        FROM Vehiculo V";

    $resultado=$conexion->query($sql);
    // print_r($resultado);
    $dataTable=array(array("Patente","Km"));
    //print_r($resultado);
    while($fila=mysqli_fetch_assoc($resultado)){
        $dataTable[]=array($fila['Patente'],(int)$fila['Km']);
    }

    mysqli_close($conexion);
    echo json_encode($dataTable);
?>
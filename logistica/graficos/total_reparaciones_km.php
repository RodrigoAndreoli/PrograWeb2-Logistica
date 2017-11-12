<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/conexion.php');
    
    $sql="SELECT COUNT(*) Reparaciones, SUM(v.km) Kilometros 
    FROM Mantenimiento m join Vehiculo v on v.idVehiculo=m.fkVehiculoM
    GROUP BY v.idVehiculo;";

    $resultado=$conexion->query($sql);
   // print_r($resultado);
    $dataTable=array(array("Reparaciones","Kilometros"));
    //print_r($resultado);
    while($fila=mysqli_fetch_assoc($resultado)){
        $dataTable[]=array($fila['Reparaciones'],(int)$fila['Kilometros']);
    }

    mysqli_close($conexion);
    echo json_encode($dataTable);
?>
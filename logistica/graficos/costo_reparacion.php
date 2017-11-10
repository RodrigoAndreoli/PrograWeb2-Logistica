<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/conexion.php');
    
    $sql="SELECT M.idVehiculo IdVehiculo, V.patente Patente, SUM(M.costo) Costo
            FROM Mantenimiento M
            JOIN Vehiculo V ON V.idVehiculo = M.idVehiculo
            GROUP BY IdVehiculo";

    $resultado=$conexion->query($sql);
    // print_r($resultado);
    $dataTable=array(array("Patente","Costo"));

    while($fila=mysqli_fetch_assoc($resultado)){
        $dataTable[]=array($fila['Patente'],(int)$fila['Costo']);
    }

    mysqli_close($conexion);
    echo json_encode($dataTable);
?>
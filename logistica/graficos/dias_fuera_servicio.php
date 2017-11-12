<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/conexion.php');
    
    $sql="SELECT SUM(DATEDIFF(M.fecha_salida, M.fecha_entrada)) Dias, M.fkVehiculoM IdVehiculo, V.patente Patente
        FROM Mantenimiento M
        JOIN Vehiculo V ON V.idVehiculo = M.fkVehiculoM
        GROUP BY m.fkVehiculoM
        ORDER BY Dias";

    $resultado=$conexion->query($sql);
   // print_r($resultado);
    $dataTable=array(array("Patente","Dias"));
    //print_r($resultado);
    while($fila=mysqli_fetch_assoc($resultado)){
        $dataTable[]=array($fila['Patente'],(int)$fila['Dias']);
    }

    mysqli_close($conexion);
    echo json_encode($dataTable);
?>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/resources/db/conexion.php');
    
    $sql="SELECT sum(datediff(m.fecha_salida,m.fecha_entrada)) as dias,m.idVehiculo,v.patente FROM mantenimiento m
    join vehiculo v on v.idVehiculo = m.idVehiculo
    GROUP by idVehiculo order by dias";

    $resultado=$conexion->query($sql);
   // print_r($resultado);
    $dataTable=array(array("patente","dias"));
    //print_r($resultado);
    while($fila=mysqli_fetch_assoc($resultado)){
        $dataTable[]=array($fila['patente'],(int)$fila['dias']);
    }

    mysqli_close($conexion);
    echo json_encode($dataTable);
?>
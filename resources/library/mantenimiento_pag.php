<?php
       
    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])) {
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }    
    $empezar_desde = ($pag-1) * $tamagno_paginas;
    $datos = $obj -> consultar("SELECT M.idMantenimiento, U.nombre, M.externo, V.patente, M.fecha_entrada, M.fecha_salida, M.repuestos, M.costo 
        FROM Mantenimiento M
        JOIN Usuario U ON M.fkMecanicoM = U.idUsuario
        JOIN Vehiculo V ON M.fkVehiculoM = V.idVehiculo
        ORDER BY M.fecha_entrada");

    $num_filas = count($obj->consultar("SELECT *
        FROM Mantenimiento"));
    $total_paginas = ceil($num_filas/$tamagno_paginas); 
    $sql_limite=$obj -> consultar("SELECT *
        FROM Mantenimiento");
?>
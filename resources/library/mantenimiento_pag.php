<?php
       
    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])) {
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }    
    $empezar_desde = ($pag-1) * $tamagno_paginas;
    $datos = $obj -> consultar("SELECT m.idMantenimiento,m.tipo_vehiculo, m.fecha_entrada, m.repuestos, m.costo, m.km_unidad, u.nombre, m.externo,v.patente
        FROM mantenimiento AS m 
        JOIN usuario AS u ON u.idUsuario = m.idMecanico
        JOIN vehiculo AS v ON v.idVehiculo=m.idVehiculo
        ORDER BY m.fecha_entrada");

    $num_filas = count($obj->consultar("SELECT *
        FROM mantenimiento"));
    $total_paginas = ceil($num_filas/$tamagno_paginas); 
    $sql_limite=$obj -> consultar("SELECT *
        FROM mantenimiento");
?>
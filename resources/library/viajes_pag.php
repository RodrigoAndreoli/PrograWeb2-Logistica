<?php
    $idUsuario = $_SESSION['idUsuario'];

    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])) {
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }    
    $empezar_desde = ($pag-1) * $tamagno_paginas;

    $datos = $obj -> consultar("SELECT V.idViaje VViaje, V.fkPresupuestoV fkPresupuesto, V.fecha Fecha, V.origen Origen, V.destino Destino, V.tipo_carga Carga, V.tiempo_total Tiempo, V.combustible_total Combustible, V.km_total Km
        FROM Viaje V
        ORDER BY V.idViaje
        LIMIT $empezar_desde, $tamagno_paginas
    ");


    $cons = $obj -> consultar("SELECT T.fkViajeT TViaje
        FROM Vehiculo_Chofer_viaje T
        ORDER BY T.fkViajeT
    ");

    $asignar = array(); 
    foreach($cons as $a){
        $asignar[] = $a['TViaje'];
    }

    $datos2 = $obj -> consultar("SELECT fkViajeT, fkChoferT, fkAcompanianteT, fkCamionT, fkAcopladoT
                                 FROM Vehiculo_Chofer_viaje");
    $asignarChofer = array(); 
    $asignarAcompaniante = array();
    foreach($datos2 as $a){
        $asignarChofer[] = $a['fkChoferT'];
        $asignarAcompaniante[] = $a['fkAcompanianteT'];
    }

    $datos3 = $obj -> consultar("SELECT V.fecha fecha, V.origen origen, V.destino destino, V.tipo_carga carga, V.tiempo_total tiempo, V.combustible_total combustible, V.km_total km
                                 FROM Vehiculo_Chofer_viaje T join viaje V on T.fkViajeT = V.idViaje
                                 WHERE T.fkAcompanianteT = '$idUsuario' || T.fkChoferT = '$idUsuario'");


    $num_filas = count($obj -> consultar("SELECT *
        FROM viaje
    "));
    $total_paginas = ceil($num_filas/$tamagno_paginas); 
    $sql_limite=$obj -> consultar("SELECT *
        FROM Viaje
    ");

?>
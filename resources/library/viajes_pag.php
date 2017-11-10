<?php

    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])) {
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }    
    $empezar_desde = ($pag-1) * $tamagno_paginas;

    $datos = $obj -> consultar("SELECT V.idViaje VViaje, V.idCliente Cliente, V.fecha Fecha, V.origen Origen, V.destino Destino, V.tipo_carga Carga, V.tiempo Tiempo, V.combustible Combustible, V.km_totales Km
        FROM Viaje V
        ORDER BY V.idViaje
        LIMIT $empezar_desde, $tamagno_paginas
    ");

    $cons = $obj -> consultar("SELECT T.idViaje TViaje
        FROM Vehiculo_Chofer_viaje T
        ORDER BY T.idViaje
    ");

    $asignar = array(); 
    foreach($cons as $a){
        $asignar[] = $a['TViaje'];
    }

    $num_filas = count($obj -> consultar("SELECT *
        FROM viaje
    "));
    $total_paginas = ceil($num_filas/$tamagno_paginas); 
    $sql_limite=$obj -> consultar("SELECT *
        FROM Viaje
    ");

?>
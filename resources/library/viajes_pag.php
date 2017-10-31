<?php
    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])) {
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }    
    $empezar_desde = ($pag-1) * $tamagno_paginas;

    $datos = $obj -> consultar("SELECT v.idViaje,v.idCliente,v.fecha,v.origen,v.destino,v.tipo_carga,v.tiempo,v.combustible,v.km_totales, v.latitud,v.longitud
		FROM viaje v 
        LIMIT $empezar_desde, $tamagno_paginas");


    $num_filas = count($obj->consultar("SELECT *
        FROM viaje"));
    $total_paginas = ceil($num_filas/$tamagno_paginas); 
    $sql_limite=$obj -> consultar("SELECT *
        FROM viaje");     
?>
<?php

    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])) {
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }    
    $empezar_desde = ($pag-1) * $tamagno_paginas;

    $datos = $obj -> consultar("SELECT *
        FROM Reporte
        ORDER BY tiempo
        LIMIT $empezar_desde, $tamagno_paginas");

    $num_filas = count($obj -> consultar("SELECT *
        FROM Reporte"));
    $total_paginas = ceil($num_filas/$tamagno_paginas); 
    $sql_limite=$obj -> consultar("SELECT *
        FROM Reporte");

?>
<?php

    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])){
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }

    $empezar_desde = ($pag-1) * $tamagno_paginas;
    
    $datos = $obj -> consultar("SELECT C.razon, P.idPresupuesto, P.aceptado, P.tiempo_estimado, P.km_estimado, P.combustible_estimado, P.costo_real
        FROM Presupuesto P 
        JOIN Cliente C ON P.fkClienteP = C.idCliente
        ORDER BY P.aceptado, C.razon LIMIT $empezar_desde, $tamagno_paginas");

    $datos2 = $obj -> consultar("SELECT idPresupuesto
        FROM Presupuesto
        WHERE aceptado = 'No'");

    if($datos2 != null) {
        $asignar = array(); 
        foreach($datos2 as $v){
            $asignar[] = $v['idPresupuesto'];
        }    
    }

    $num_filas = count($obj->consultar("SELECT *
        FROM Presupuesto"));
    $total_paginas = ceil($num_filas/$tamagno_paginas);
    $sql_limite=$obj -> consultar("SELECT * 
    FROM Presupuesto");
?>
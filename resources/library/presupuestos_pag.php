<?php

    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])){
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }

    $empezar_desde = ($pag-1) * $tamagno_paginas;
    
    $datos = $obj -> consultar("
	SELECT c.razon, u.nombre, p.idPresupuesto,p.idCliente,p.tiempo_estimado,p.estado,p.aceptado,p.costo_real,p.km_previstos,p.combustible_previsto,v.destino, v.origen
    FROM presupuesto p JOIN cliente c on c.idCliente=p.idCliente JOIN
    usuario u on u.idUsuario=p.idUsuario join viaje v on v.idViaje=p.idViaje
    ORDER BY u.nombre LIMIT $empezar_desde, $tamagno_paginas");


    $num_filas = count($obj->consultar("SELECT * FROM presupuesto"));
    $total_paginas = ceil($num_filas/$tamagno_paginas);
    $sql_limite=$obj -> consultar("SELECT * FROM presupuesto");

?>
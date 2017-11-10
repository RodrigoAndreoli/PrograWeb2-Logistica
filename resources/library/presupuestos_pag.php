<?php

    $tamagno_paginas = 6;
    if(isset($_GET['pagina'])){
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }

    $empezar_desde = ($pag-1) * $tamagno_paginas;
    
    $datos = $obj -> consultar("
	SELECT c.razon, u.nombre, p.idPresupuesto,p.aceptado,p.tiempo_estimado,p.km_estimado,p.combustible_estimado,p.costo_real
    FROM presupuesto p JOIN cliente c on c.idCliente=p.fkClienteP JOIN usuario u on u.idUsuario=p.fkAdministradorP 
    ORDER BY u.nombre LIMIT $empezar_desde, $tamagno_paginas");


    $num_filas = count($obj->consultar("SELECT * FROM presupuesto"));
    $total_paginas = ceil($num_filas/$tamagno_paginas);
    $sql_limite=$obj -> consultar("SELECT * FROM presupuesto");

?>
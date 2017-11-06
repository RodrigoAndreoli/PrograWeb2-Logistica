<?php
    /*$tamagno_paginas = 6;
    if(isset($_GET['pagina'])) {
        $pag = $_GET['pagina'];
    } else {
        $pag = 1;
    }    
    $empezar_desde = ($pag-1) * $tamagno_paginas;*/

    $datos = $obj -> consultar("SELECT idUsuario,nombre FROM usuario WHERE rol='chofer'");
    $datos2 = $obj -> consultar("SELECT idVehiculo,marca FROM vehiculo"   ) ;


    /*$num_filas = count($obj->consultar("SELECT *
        FROM viaje"));
    $total_paginas = ceil($num_filas/$tamagno_paginas); 
    $sql_limite=$obj -> consultar("SELECT *
        FROM viaje");     */
?>
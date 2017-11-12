<?php
        $idUsuario = $_SESSION['idUsuario'];
        /*-------------Paginacion-------------------*/
        $tamagno_paginas = 6; //Cuantos registros x pag
        if(isset($_GET['pagina'])) {
            $pag = $_GET['pagina'];
        } else {
            $pag = 1; //Pagina actual
        }    
        $empezar_desde = ($pag-1) * $tamagno_paginas;//es registro donde empieza
        //Consulta, variable el objeto y la funcion de la clase
        $datos4 = $obj -> consultar("SELECT V.fecha fecha, V.origen origen, V.destino destino, V.tipo_carga carga, V.tiempo_total tiempo, V.combustible_total combustible, V.km_total km
                             FROM Vehiculo_Chofer_viaje T join viaje V on T.fkViajeT = V.idViaje
                             WHERE T.fkChoferT = '$idUsuario' order by fecha LIMIT $empezar_desde, $tamagno_paginas");
        //print_r($datos); se utiliza en la vista

        /*-------------Paginacion-------------------*/
        $num_filas = count($obj->consultar("SELECT *
            FROM Viaje v join vehiculo_chofer_viaje vcv on vcv.fkViajeT = v.idViaje
            where vcv.fkChoferT = '$idUsuario'"));
        $total_paginas = ceil($num_filas/$tamagno_paginas); //CEIL: Redondea paginas
        $sql_limite=$obj -> consultar("SELECT *
            FROM Viaje"); 

?>
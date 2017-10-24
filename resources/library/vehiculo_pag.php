<?php
        /*-------------Paginacion-------------------*/
        $tamagno_paginas = 7; //Cuantos registros x pag
        if(isset($_GET['pagina'])) {
            $pag = $_GET['pagina'];
        } else {
            $pag = 1; //Pagina actual
        }    
        $empezar_desde = ($pag-1) * $tamagno_paginas;
        //Consulta, variable el objeto y la funcion de la clase
        $datos = $obj -> consultar("SELECT *
            FROM vehiculo
            ORDER BY marca
            LIMIT $empezar_desde, $tamagno_paginas");
        //print_r($datos);

        /*-------------Paginacion-------------------*/
        $num_filas = count($obj->consultar("SELECT *
            FROM vehiculo"));
        $total_paginas = ceil($num_filas/$tamagno_paginas); //CEIL: Redondea paginas
        $sql_limite=$obj -> consultar("SELECT *
            FROM vehiculo"); 

?>
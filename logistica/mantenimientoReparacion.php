<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mantenimiento</title>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='chofer'){
            $miSession -> permisos();
        }
        
        $obj = new controlDB();
        
        /*-------------Paginacion-------------------*/
        $tamagno_paginas = 6; //Cuantos registros x pag
        if(isset($_GET['pagina'])) {
            $pag = $_GET['pagina'];
        } else {
            $pag = 1; //Pagina actual
        }    
        $empezar_desde = ($pag-1) * $tamagno_paginas;
        $datos = $obj -> consultar("SELECT m.tipo_vehiculo, m.fecha_entrada, m.repuestos, m.costo, m.km_unidad, u.nombre, m.externo 
            FROM mantenimiento AS m 
            JOIN usuario AS u ON u.idUsuario = m.idMecanico 
            ORDER BY m.fecha_entrada");
        //print_r($datos);
        /*-------------Paginacion-------------------*/
        $num_filas = count($obj->consultar("SELECT *
            FROM mantenimiento"));
        $total_paginas = ceil($num_filas/$tamagno_paginas); //CEIL: Redondea paginas
        $sql_limite=$obj -> consultar("SELECT *
            FROM mantenimiento");
    ?>
</head>

<body>
    <!-- HEADER -->
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/templates/header.php');
    ?>
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
            require_once($_SERVER['DOCUMENT_ROOT'].'/resources/templates/sidebar.php');        
        ?>
        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h1>Zona de Mantenimiento</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th  class="text-center">Mecanico</th>
                                                <th  class="text-center">Tipo Vehiculo</th>
                                                <th  class="text-center">Km</th>
                                                <th  class="text-center">Fecha entrada</th>
                                                <th  class="text-center">Repuestos</th>
                                                <th  class="text-center">Service externo</th>
                                                <th  class="text-center">Costo</th>
                                                <th  class="text-center">Operacion</th>
                                            </thead>
                                            <?php foreach($datos as $td){ ?>
                                            <tr>
                                                <td><?php echo $td['nombre'];?></td>
                                                <td><?php echo $td['tipo_vehiculo'];?></td>
                                                <td><?php echo $td['km_unidad'];?></td>
                                                <td><?php echo $td['fecha_entrada'];?></td>
                                                <td><?php echo $td['repuestos'];?></td>
                                                <td><?php echo $td['externo'];?></td>
                                                <td><?php echo $td['costo'];?></td>
                                                <td class="text-center">
                                                    <a href="#">
                                                        <button class="btn btn-info">Editar</button>
                                                    </a>
                                                    <a href="#"> 
                                                        <button class="btn btn-danger">Eliminar</button>
                                                    </a>
                                            </td>
                                        </tr>
                                    <?php } ?>   
                                    </table>    
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php
                                    for($i = 1; $i <= $total_paginas; $i++){
                                    echo "<ul class='pagination'>
                                        <li><a href='?pagina=".$i."'>".$i."</a></li>
                                    </ul>";}
                                ?>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-primary">Nuevo registro</a>
                            </div>
                        </div>
                        <div class="row">
                            <a href="#" class="btn btn-link" target="_blank" >Exportar a PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
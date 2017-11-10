<!DOCTYPE html>
<html lang="es">
    
<head>
    <title>Service</title>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!="Mecanico" && $_SESSION['rol']!="Administrador"){
        $miSession -> permisos();}
        if($_SESSION['rol']=='Chofer'){
                $miSession -> permisos();
            } 
    
        $obj = new controlDB();
        if($_POST){
            $buscar=trim($_POST['buscar']);   
        }
        if(empty($buscar)){
            $buscar="";
        } else {
            $datos = $obj -> consultar("SELECT V.idVehiculo, V.marca, V.patente, V.km, M.cambio_aceite, M.filtro_aire, M.direccion
                FROM Mantenimiento M
                JOIN Vehiculo V ON M.fkVehiculoM = V.idVehiculo 
                WHERE V.patente LIKE '%".$buscar."%'
                GROUP BY V.idVehiculo, V.patente, V.km, M.cambio_aceite, M.filtro_aire, M.direccion");
        }
        $patentes = $obj -> consultar("SELECT V.idVehiculo, V.marca, V.patente, V.km, M.cambio_aceite, M.filtro_aire, M.direccion
                FROM Mantenimiento M
                JOIN Vehiculo V ON M.fkVehiculoM = V.idVehiculo
                GROUP BY V.idVehiculo, V.patente, V.km, M.cambio_aceite, M.filtro_aire, M.direccion");

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
                                    <h1>Zona de Service</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>           
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="row">
                                <form action="service.php" method="post" class="form-inline" id="formu" name="formu">
                                    <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <select name="buscar" class="form-control" id="patente">
                                        <option selected disabled>Seleccione una patente:</option> 
                                        <?php foreach($patentes as $pat){ ?>
                                        <option value="<?php echo $pat['patente']?>"><?php echo $pat['patente']?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <input type="submit" value="buscar" class="btn btn-info">
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div class="table-responsive container-fluid">
                                <table class="table table-condensed table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Patente</th>
                                            <th>Km</th>
                                            <th>Cambio de aceite</th>
                                            <th>Cambio filtro de aire</th>
                                            <th>Direccion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        if(isset($datos)){
                                            foreach($datos as $td){ ?>
                                        <tr>   
                                            <td><?php echo $td['patente']?></td>
                                            <td><?php echo $td['km']?></td>
                                            <td><?php echo $td['cambio_aceite']?></td>
                                            <td><?php echo $td['filtro_aire']?></td>
                                            <td><?php echo $td['direccion']?></td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
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
            $buscarModelo=trim($_POST['buscarModelo']);   
        }
        if(empty($buscarModelo)){
            $buscarModelo="";
        } else {
            $datos = $obj -> consultar("SELECT V.idVehiculo, V.marca, V.patente, V.km, s.service, s.fecha, s.km_service,v.modelo
                FROM service s
                JOIN Vehiculo V ON s.fkVehiculoS = V.idVehiculo 
                WHERE v.modelo LIKE '%".$buscarModelo."%'
                ORDER BY V.idvehiculo,s.fecha");
            
            $kilometros = $obj -> consultar("SELECT s.fkVehiculoS,v.km,v.patente,v.modelo FROM vehiculo v join service s on s.fkVehiculoS=v.idVehiculo
            WHERE v.modelo LIKE '%".$buscarModelo."%'
            GROUP by s.fkVehiculoS");
            
            $recomendacion = $obj -> consultar("SELECT v.modelo FROM vehiculo v join service s on s.fkVehiculoS=v.idVehiculo WHERE v.modelo LIKE '%".$buscarModelo."%' GROUP by v.modelo");
        }
        $modelos = $obj -> consultar("SELECT v.modelo,v.marca FROM service s join vehiculo v on v.idVehiculo=s.fkVehiculoS GROUP by v.modelo,v.marca");

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
                    <div class="col-lg-12">
                        <div class="container  text-center">
                            <div class="row">
                                <div class="col">
                                    <h1>Calendario de service</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                                <div class="col">
                                    <p class="text-muted">Selecionar modelo a buscar, para ver los datos</p>
                                </div>
                        </div>           
                        <div class="col-lg-8 col-lg-offset-2">
                            <!--BUSCADOR-->
                            <div class="row  text-center">
                                <form action="service.php" method="post" class="form-inline" id="formu" name="formu">
                                    <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <select name="buscarModelo" class="form-control" id="modelo">
                                        <option selected disabled>Seleccione modelo:</option> 
                                        <?php foreach($modelos as $modelo){ ?>
                                        <option value="<?php echo $modelo['modelo']?>"><?php echo $modelo['marca'] . ' ' . $modelo['modelo']?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <input type="submit" value="buscar" class="btn btn-info">
                                    </div>
                                    </div>
                                </form>
                            </div>
                            
                            <br>
                            <?php if(!empty($buscarModelo)) { ?>
                                <div class="table-responsive container-fluid">
                                <table class="table table-condensed table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Patente</th>
                                            <th>Fecha</th>
                                            <th>Km</th>
                                            <th>Service</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        if(isset($datos)){
                                            foreach($datos as $td){ ?>
                                        <tr>   
                                            <td><?php echo $td['patente']?></td>
                                            <td>
                                                <?php 
                                                    echo $td['fecha'];
                                                   
                                                ?>    
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $td['km_service'];
                                                    
                                                ?>
                                            </td>    
                                            <td>
                                                <?php 
                                                    echo $td['service'];
                                                ?>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                    
                                </table>
                                <br>
                                <hr>    
                                <!--modal-->
                                <div class="row text-center">
                                    <div class="col">
                                        <p>
                                            <?php include_once('modal/modalServiceKm.php');include_once('modal/modalService.php');?>
                                        </p>
                                    </div>
                                </div>
                                <!--modal-->
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <?php if($_SESSION["rol"]=='Mecanico'){?>  
                                <a href="registrarService.php" class="btn btn-primary">Nuevo Service</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</body>
</html>
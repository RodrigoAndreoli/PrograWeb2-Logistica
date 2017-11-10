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
        }
        else{
            $datos = $obj -> consultar("SELECT v.idVehiculo,v.patente,m.km_unidad,m.cambio_aceite,m.filtro_aire,m.direccion,v.marca FROM mantenimiento m join vehiculo v on v.idVehiculo = m.idVehiculo WHERE v.patente like '%".$buscar."%' GROUP by v.idVehiculo,v.patente,m.km_unidad,m.cambio_aceite,m.filtro_aire,m.direccion");
        }
        $patentes = $obj -> consultar("SELECT v.idVehiculo,v.patente,m.km_unidad,m.cambio_aceite,m.filtro_aire,m.direccion,v.marca FROM mantenimiento m join vehiculo v on v.idVehiculo = m.idVehiculo GROUP by v.idVehiculo,v.patente,m.km_unidad,m.cambio_aceite,m.filtro_aire,m.direccion");

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
                                <form action="service.php" method="post" class="form-inline">
                                    <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <select name="buscar" class="form-control" id="patente">
                                        <option>Seleccion una patente:</option> 
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
                                            <td><?php echo $td['km_unidad']?></td>
                                            <td><?php echo $td['cambio_aceite']?></td>
                                            <td><?php echo $td['filtro_aire']?></td>
                                            <td><?php echo $td['direccion']?></td>
                                        </tr>
                                        <?php }} ?>  
                                        <tr>
                                            <td colspan="5"><p class="text-muted">Seleccione una patente</p></td>
                                        </tr>               
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
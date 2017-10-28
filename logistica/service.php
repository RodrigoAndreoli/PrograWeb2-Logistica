<!DOCTYPE html>
<html lang="es">
    
<head>
    <title>Service</title>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!="mecanico" && $_SESSION['rol']!="admin"){
        $miSession -> permisos();}
        
    
        $obj = new controlDB();  

        if($_POST){
            $buscar=trim($_POST['buscar']);   
        }
        if(empty($buscar)){
            $buscar="";
        }
        else{
            $datos = $obj -> consultar("SELECT m.fecha_entrada, m.fecha_salida, m.repuestos, v.patente 
                    FROM mantenimiento AS m 
                    JOIN vehiculo AS v ON v.idVehiculo = m.idVehiculo 
                    WHERE v.patente like '%".$buscar."%' ");
        }
        $patentes = $obj -> consultar("SELECT m.fecha_entrada, m.fecha_salida, m.repuestos, v.patente 
                FROM mantenimiento AS m 
                JOIN vehiculo AS v ON v.idVehiculo = m.idVehiculo");
        
     
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
                                            <th>Fecha salida</th>
                                            <th>Service</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        if(isset($datos)){
                                            foreach($datos as $td){ ?>
                                        <tr>   
                                            <td><?php echo $td['patente']?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php }} ?>  
                                        <tr>
                                            <td colspan="3"><p class="text-muted">Seleccione una patente</p></td>
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
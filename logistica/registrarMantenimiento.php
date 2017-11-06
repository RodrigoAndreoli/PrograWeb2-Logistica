<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Mantenimiento</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
    
        $obj = new controlDB();
        $vehiculos = $obj -> consultar("SELECT idVehiculo,patente FROM vehiculo");
        $mecanico = $obj -> consultar("SELECT m.idMecanico FROM mantenimiento m join usuario u ON u.idUsuario=m.idMantenimiento where rol = '".$_SESSION['rol']."' AND nombre = '".$_SESSION['usuario']."'");
        
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
                                    <h3>Registrar nuevo mantenimiento</h3>
                                </div>
                            </div>
                            <form action="bdMantenimiento.php" method="post">
                                <table class="table">
                                  
                                   <?php foreach($mecanico as $m){ ?>
                                       <input type="hidden" name="idMecanico" value="<?php echo $m['idMecanico']?>">
                                   <?php } ?>
                                   
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre">Vehiculo</label>
                                            <select class="form-control" id="idVehiculo" name="idVehiculo">
                                                <?php foreach($vehiculos as $vehiculo){ ?>
                                                    <option value="<?php echo $vehiculo['idVehiculo']?>"><?php echo $vehiculo['patente']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="doc">Tipo vehiculo</label>
                                            <input type="text" class="form-control" name="tipo_vehiculo" placeholder="Tipo...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Fecha entrada</label>
                                            <input type="date" class="form-control" name="fecha_entrada" placeholder="2000-12-01">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fecha_salida</label>
                                            <input type="date" class="form-control" name="fecha_salida" placeholder="2000-12-01">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Km</label>
                                            <input type="number" class="form-control" name="km_unidad" placeholder="km...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Costo</label>
                                            <input type="number" class="form-control" name="costo" placeholder="costo...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Repuestos</label>
                                            <input type="text" class="form-control" name="repuestos" placeholder="repuestos...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Externo:</label>
                                            <div class="">
                                                <select class="form-control" id="externo" name="externo">
                                                    <option value="si">si</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="vista_mantenimientos.php" class="btn btn-danger btn-lg">Volver</a>
                                        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                    </div>
                                </table>
                                <input type="hidden" name="funcion" value="insertar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

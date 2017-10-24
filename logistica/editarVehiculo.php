<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Vehículo</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
    
        $cod = $_GET['id'];
        $obj = new controlDB();
        $vehiculo = $obj -> consultar("SELECT * 
            FROM vehiculo 
            WHERE idVehiculo = '$cod'");
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
                        <div class="row">
                            <div class="col">
                                <h3>Editar vehículo</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdVehiculo.php" method="post" class="form-horizontal">
                                        <table class="table table-striped  table-condensed table-hover">
                                            <?php foreach($vehiculo as $vehiculos){ ?>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">IdVehículo:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  placeholder="<?php echo $vehiculos['idVehiculo']; ?>" name="idVehiculo" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Marca:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $vehiculos['marca']; ?>" name="marca">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Modelo:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $vehiculos['modelo']; ?>" name="modelo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <div class="control-label col-xs-4 col-sm-3">
                                                        <label for="">Tipo de vehículo</label>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="selVehi" name="tipo_vehi">
                                                            <option value="<?php echo $vehiculos['tipo_vehiculo'];?>" selected><?php echo $vehiculos['tipo_vehiculo']; ?></option>
                                                            <option value="camion">Camión</option>
                                                            <option value="acoplado">Acoplado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Patente:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $vehiculos['patente']; ?>" name="patente">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Número de chasis:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $vehiculos['nro_chasis']; ?>" name="num_chasis">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Kilometros:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $vehiculos['km']; ?>" name="kilometros">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Año:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $vehiculos['anio']; ?>" name="anio">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Número de motor:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $vehiculos['nro_motor']; ?>" name="num_motor">
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <a href="vehiculo.php" class="btn btn-danger">Volver</a>
                                                    <input type="submit" value="Modificar" class="btn btn-primary">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <input type="hidden" name="funcion" value="modificar"> 
                                        <input type="hidden" name="cod" value="<?php echo $cod; ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
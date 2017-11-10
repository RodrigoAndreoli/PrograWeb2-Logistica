<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Veh&iacute;culo</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Chofer' || $_SESSION['rol']=='Mecanico'){
                $miSession -> permisos();
            } 
        $cod = $_GET['id'];
        $obj = new controlDB();
        $vehiculo = $obj -> consultar("SELECT * 
            FROM Vehiculo 
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
                                <h3>Editar veh&iacute;culo</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdVehiculo.php" method="post" class="form-horizontal">
                                        <table class="table table-striped  table-condensed table-hover">
                                            <?php foreach($vehiculo as $vehiculos){ ?>
                                            <input type="hidden" class="form-control"  placeholder="<?php echo $vehiculos['idVehiculo']; ?>" id="idVehiculo" name="idVehiculo" readonly>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <div class="control-label col-xs-4 col-sm-3">
                                                        <label for="">Tipo de veh&iacute;culo</label>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="tipo_vehiculo" name="tipo_vehiculo">
                                                            <option value="<?php echo $vehiculos['tipo_vehiculo'];?>" selected disabled><?php echo $vehiculos['tipo_vehiculo']; ?></option>
                                                            <option value="Camion">Camion</option>
                                                            <option value="Acoplado">Acoplado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Patente:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $vehiculos['patente']; ?>" name="patente" id="patente">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Marca:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $vehiculos['marca']; ?>" name="marca" id="marca">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Modelo:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $vehiculos['modelo']; ?>" name="modelo" id="modelo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">A&ntilde;o:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="number" class="form-control" value="<?php echo $vehiculos['anio']; ?>" name="anio" id="anio">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">N&uacute;mero de chasis:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $vehiculos['nro_chasis']; ?>" name="nro_chasis" id="nro_chasis">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">N&uacute;mero de motor:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="number" class="form-control" value="<?php echo $vehiculos['nro_motor']; ?>" name="nro_motor" id="nro_motor">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Kilometraje:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $vehiculos['km']; ?>" name="km" id="km">
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <a href="vista_vehiculos.php" class="btn btn-danger">Volver</a>
                                                    <input type="submit" value="Modificar" class="btn btn-primary">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <input type="hidden" name="funcion" id="funcion" value="modificar" readonly> 
                                        <input type="hidden" name="cod" id="cod" value="<?php echo $cod; ?>" readonly>
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
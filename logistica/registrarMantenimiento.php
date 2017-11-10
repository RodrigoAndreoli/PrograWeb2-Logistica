<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Mantenimiento</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Chofer'){
                $miSession -> permisos();
            }    
    
        $obj = new controlDB();
        
        $vehiculos = $obj -> consultar("SELECT idVehiculo, patente 
            FROM Vehiculo");
        
        $mecanicos = $obj -> consultar("SELECT M.fkMecanicoM 
        FROM Mantenimiento M 
        JOIN Usuario U ON U.idUsuario=M.fkMecanicoM 
        WHERE U.rol = '".$_SESSION['rol']."' 
            AND U.nombre = '".$_SESSION['usuario']."'");
        
    ?>
    <script type="text/javascript" src="/resources/js/validMantenimiento.js"></script>
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
                            <form action="bdMantenimiento.php" method="post" name="form" id="form" onsubmit="return validar()">
                                <table class="table">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre">Vehiculo:</label>
                                            <select class="form-control" name="idVehiculo" id="idVehiculo">
                                                <?php foreach($vehiculos as $vehiculo){ ?>
                                                    <option value="<?php echo $vehiculo['idVehiculo']?>"><?php echo $vehiculo['patente']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php foreach($mecanicos as $m){ ?>
                                        <input type="hidden" id="fkMecanicoM" name="fkMecanicoM" value="<?php echo $m['fkMecanicoM']?>" readonly>
                                    <?php } ?>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Fecha de Entrada:</label>
                                            <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada" placeholder="2000-12-31">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fecha de Salida:</label>
                                            <input type="date" class="form-control" name="fecha_salida" id="fecha_salida" placeholder="2000-12-31">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Costo</label>
                                            <input type="number" class="form-control" name="costo" id="costo" placeholder="Costo...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Externo:</label>
                                            <div class="">
                                                <select class="form-control" name="externo" id="externo">
                                                    <option value="No" selected>No</option>
                                                    <option value="Si">Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Cambio aceite:</label>
                                            <div class="">
                                                <select class="form-control" name="cambio_aceite" id="cambio_aceite">
                                                    <option value="No" selected>No</option>
                                                    <option value="Si">Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Filtro aire:</label>
                                            <div class="">
                                                <select class="form-control" name="filtro_aire" id="filtro_aire">
                                                    <option value="No" selected>No</option>
                                                    <option value="Si">Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Direccion:</label>
                                            <div class="">
                                                <select class="form-control" name="direccion" id="direccion">
                                                    <option value="No" selected>No</option>
                                                    <option value="Si">Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Repuestos</label>
                                            <input type="text" class="form-control" name="repuestos" id="repuestos" placeholder="repuestos..." onblur="return validar()">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                        <a href="vista_mantenimientos.php" class="btn btn-danger btn-lg">Volver</a>
                                        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                    </div>
                                    </div>
                                    <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                </table>
                                <input type="hidden" name="funcion" id="funcion" value="insertar" readonly>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

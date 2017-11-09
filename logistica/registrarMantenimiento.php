<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Mantenimiento</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='chofer'){
                $miSession -> permisos();
            }    
    
        $obj = new controlDB();
        $vehiculos = $obj -> consultar("SELECT idVehiculo,patente FROM vehiculo");
        $mecanico = $obj -> consultar("SELECT m.idMecanico FROM mantenimiento m join usuario u ON u.idUsuario=m.idMantenimiento where rol = '".$_SESSION['rol']."' AND nombre = '".$_SESSION['usuario']."'");
        
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
                                  
                                   <?php foreach($mecanico as $m){ ?>
                                       <input type="hidden" name="idMecanico" value="<?php echo $m['idMecanico']?>">
                                   <?php } ?>
                                   
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre">Vehiculo</label>
                                            <select class="form-control" name="idVehiculo" id="idVehiculo" onblur="return validar()">
                                                <?php foreach($vehiculos as $vehiculo){ ?>
                                                    <option value="<?php echo $vehiculo['idVehiculo']?>"><?php echo $vehiculo['patente']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="doc">Tipo vehiculo</label>
                                            <input type="text" class="form-control"name="tipo_vehiculo" id="tipo_vehiculo" onblur="return validar()" placeholder="Tipo...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Fecha entrada</label>
                                            <input type="date" class="form-control"name="fecha_entrada" id="fecha_entrada" onblur="return validar() "placeholder="2000-12-01">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fecha_salida</label>
                                            <input type="date" class="form-control" name="fecha_salida" id="fecha_salida" onblur="return validar()" placeholder="2000-12-01">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Km</label>
                                            <input type="number" class="form-control" name="km_unidad" id="km_unidad" onblur="return validar()" placeholder="km...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Costo</label>
                                            <input type="number" class="form-control" name="costo" id="costo" onblur="return validar() "placeholder="costo...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Repuestos</label>
                                            <input type="text" class="form-control" name="repuestos" id="repuestos" onblur="return validar()" placeholder="repuestos...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Externo:</label>
                                            <div class="">
                                                <select class="form-control" name="externo" id="externo" onblur="return validar()">
                                                    <option value="">n/d</opion>
                                                    <option value="si">si</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Cambio aceite:</label>
                                            <div class="">
                                                <select class="form-control" name="cambio_aceite" id="cambio_aceite" onblur="return validar()">
                                                    <option value="">n/d</opion>
                                                    <option value="si">si</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Filtro aire:</label>
                                            <div class="">
                                                <select class="form-control" name="filtro_aire" id="filtro_aire" onblur="return validar()">
                                                    <option value="">n/d</opion>
                                                    <option value="si">si</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label class="control-label col-xs-4 col-sm-3">Direccion:</label>
                                            <div class="">
                                                <select class="form-control" name="direccion" id="direccion" onblur="return validar()">
                                                    <option value="">n/d</opion>
                                                    <option value="si">si</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </div>
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

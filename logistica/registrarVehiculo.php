<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Chofer' || $_SESSION['rol']=='Mecanico'){
                $miSession -> permisos();
            } 
    ?>
    <script type="text/javascript" src="/resources/js/validVehiculo.js"></script>
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
                                    <h3>Registrar un nuevo veh&iacute;culo</h3>
                                </div>
                            </div>
                            <form action="bdVehiculo.php" method="post" name="form" id="form" onsubmit="return validar()">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Tipo de veh&iacute;culo:</label>
                                        <select class="form-control" id="tipo_vehiculo" name="tipo_vehiculo">
                                            <option value="Camion">Camion</option>
                                            <option value="Acoplado">Acoplado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Patente:</label>
                                        <input type="text" class="form-control" name="patente" id="patente" placeholder="Patente...">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Marca:</label>
                                        <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca...">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Modelo:</label>
                                        <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo...">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">A&ntilde;o:</label>
                                        <input type="text" class="form-control" name="anio" id="anio" placeholder="2000">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Nro. de chasis:</label>
                                        <input type="text" class="form-control" name="nro_chasis" id="nro_chasis" placeholder="Nro. de chasis...">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Nro. de motor:</label>
                                        <input type="text" class="form-control" name="nro_motor" id="nro_motor" placeholder="Nro. de motor...">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Kilometros:</label>
                                        <input type="text" class="form-control" name="kilometros" id="kilometros" onblur="return validar()" placeholder="Kilometros...">
                                    </div>
                                </div>
                                <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                <div class="form-group">
                                    <a href="vista_vehiculos.php" class="btn btn-danger btn-lg">Volver</a>
                                    <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                </div>
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
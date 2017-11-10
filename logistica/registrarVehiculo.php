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
                                            <h3>Registrar un nuevo vehículo</h3>
                                        </div>
                                    </div>
                                    <form action="bdVehiculo.php" method="post" name="form" id="form" onsubmit="return validar()">
                                        <table class="table">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Marca</label>
                                                    <input type="text" class="form-control" name="marca" id="marca" onblur="return validar()" placeholder="Marca...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Modelo</label>
                                                    <input type="text" class="form-control" name="modelo" id="modelo" onblur="return validar()" placeholder="Modelo...">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Tipo de vehículo</label>
                                                    <select class="form-control" id="selVehi" name="tipo_vehi" onblur="return validar()">
                                                <option value="camion">Camión</option>
                                                <option value="acoplado">Acoplado</option>
                                            </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Patente</label>
                                                    <input type="text" class="form-control" name="patente" id="patente" onblur="return validar()" placeholder="Patente...">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Número de chasis</label>
                                                    <input type="text" class="form-control" name="num_chasis" id="num_chasis" onblur="return validar()" placeholder="Número de chasis...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Número de motor</label>
                                                    <input type="text" class="form-control" name="num_motor" id="num_motor" onblur="return validar()" placeholder="Número de motor...">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Año</label>
                                                    <input type="text" class="form-control" name="anio" id="anio" onblur="return validar()" placeholder="2000">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Kilometros</label>
                                                    <input type="text" class="form-control" name="kilometros" id="kilometros" onblur="return validar()" placeholder="Kilometros...">
                                                </div>
                                            </div>
                                            <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                            <div class="form-group">
                                                <a href="vista_vehiculos.php" class="btn btn-danger btn-lg">Volver</a>
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
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
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
                                    <h3>Registrar un nuevo vehículo</h3>
                                </div>
                            </div>
                            <form action="bdVehiculo.php" method="post">
                                <table class="table">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Marca</label>
                                            <input type="text" class="form-control" name="marca" placeholder="Marca...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Modelo</label>
                                            <input type="text" class="form-control" name="modelo" placeholder="Modelo...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Tipo de vehículo</label>
                                            <select class="form-control" id="selVehi" name="tipo_vehi">
                                                <option value="camion">Camión</option>
                                                <option value="acoplado">Acoplado</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Patente</label>
                                            <input type="text" class="form-control" name="patente" placeholder="Patente...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Número de chasis</label>
                                            <input type="text" class="form-control" name="num_chasis" placeholder="Número de chasis...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Número de motor</label>
                                            <input type="text" class="form-control" name="num_motor" placeholder="Número de motor...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Año</label>
                                            <input type="text" class="form-control" name="anio" placeholder="Año...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kilometros</label>
                                            <input type="text" class="form-control" name="kilometros" placeholder="Kilometros...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="vehiculo.php" class="btn btn-danger btn-lg">Volver</a>
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
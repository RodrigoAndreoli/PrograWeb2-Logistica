<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Viaje</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='chofer' ||  $_SESSION['rol']=='mecanico'){
                $miSession -> permisos();
            } 
    ?>
    <script type="text/javascript" src="/resources/js/validViaje.js"></script>
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
                                            <h3>Registrar un nuevo viaje</h3>
                                        </div>
                                    </div>
                                    <form action="bdViajes.php" method="POST" name="form" id="form" onsubmit="return validar()">
                                        <table class="table">
                                            <div class="col-xs-6">

                                                <div class="form-group">
                                                    <label for="">Fecha de Partida</label>
                                                    <input type="datetime" class="form-control" name="fecha" id="fecha" onblur="return validar()" placeholder="2000-12-31 23:59:59">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Origen</label>
                                                    <input type="text" class="form-control" name="origen" id="origen" onblur="return validar()" placeholder="Origen...">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Destino</label>
                                                    <input type="text" class="form-control" name="destino" id="destino" onblur="return validar()" placeholder="Destino...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Tipo de Carga</label>
                                                    <input type="text" class="form-control" name="carga" id="carga" onblur="return validar()" placeholder="Tipo de Carga...">
                                                </div>
                                            </div>
                                            <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                        </table>
                                        <div class="form-group">
                                            <a href="vista_viajes.php" class="btn btn-danger btn-lg">Volver</a>
                                            <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                        </div>
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

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Viaje</title>
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
                                    <h3>Registrar un nuevo viaje</h3>
                                </div>
                            </div>
                            <form action="bdViajes.php" method="POST">
                                <table class="table">
                                    <div class="col-xs-6">
                                    
										<div class="form-group">
                                            <label for="">Fecha</label>
                                            <input type="date" class="form-control" name="fecha" placeholder="dd/mm/aaaa">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Origen</label>
                                            <input type="text" class="form-control" name="origen" placeholder="Origen...">
                                        </div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
                                            <label for="">Destino</label>
                                            <input type="text" class="form-control" name="destino" placeholder="Destino...">
                                        </div>
										 <div class="form-group">
                                            <label for="">Tipo de Carga</label>
                                            <input type="text" class="form-control" name="carga" placeholder="Tipo de Carga...">
                                        </div>
								   </div>  
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
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
        
        $vehiculos = $obj -> consultar("SELECT idVehiculo, patente , tipo_vehiculo , marca , km 
            FROM Vehiculo");
        
        $mecanicos = $obj -> consultar("SELECT U.idUsuario FROM Usuario U WHERE U.idUsuario = '".$_SESSION['idUsuario']."'");
        
    ?>
    <script type="text/javascript" src="/resources/js/validService.js"></script>
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
                                    <h3>Registrar nuevo service</h3>
                                </div>
                            </div>
                            <br>
							<form action="bdService.php" method="post" name="form" id="form" onsubmit="return validar()">
									<?php foreach($mecanicos as $m){ ?>
                                        <input type="hidden" id="fkMecanicoS" name="fkMecanicoS" value="<?php echo $m['idUsuario']?>" readonly>
                                    <?php } ?>
								<table class="table">
                                    <div class="col-xs-12" style="padding:0;">
										<div class="col-xs-6 col-xs-offset-3">
											<div class="form-group">
												<label for="nombre">Patente Vehiculo:</label>										
												<select class="form-control" name="idVehiculo" id="idVehiculo">
												    <option value="">Seleccionar</option>
													<?php foreach($vehiculos as $vehiculo){ ?>
														<option value="<?php echo $vehiculo['idVehiculo']?>"><?php echo $vehiculo['patente']?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <label for="">Fecha de service:</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <label class="control-label">Service:</label>
                                                <select class="form-control" name="service" id="service">
                                                    <option value="">Seleccionar</option>
                                                    <option value="cambio aceite">cambio aceite</option>
                                                    <option value="filtro aire">filtro aire</option>
                                                    <option value="direccion">direccion</option>
                                                </select>
                                        </div>
                                    </div>
                        
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <label for="">Km service</label>
                                            <input type="number" class="form-control" name="km_service" id="km_service"  onblur="return validar()">
                                        </div>
                                    </div>
                                    <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <a href="service.php" class="btn btn-danger btn-lg">Volver</a>
                                            <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                        </div>
                                    </div>
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

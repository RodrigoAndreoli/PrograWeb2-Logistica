<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Presupuesto</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!='Supervisor'){
            $miSession -> permisos();
        }  
        $obj = new controlDB();
        $clientes = $obj -> consultar("SELECT c.idCliente AS fkClienteP, c.razon FROM cliente c");
        $viajes = $obj -> consultar("SELECT idViaje FROM viaje");
        
        $usuario = $obj -> consultar("SELECT idUsuario,nombre FROM usuario WHERE idUsuario = '".$_SESSION['idUsuario']."' ");
    ?>
    <script type="text/javascript" src="/resources/js/validPresupuesto.js"></script>
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
                                            <h3>Registrar nuevo presupuesto</h3>
                                        </div>
                                    </div>
                                    <form action="bdPresupuesto.php" method="post" name="form" id="form" onsubmit="return validar()">
                                        <table class="table">

                                            <?php foreach($usuario as $usr){ ?>
                                            <input type="hidden" name="fkAdministradorP" id="fkAdministradorP" value="<?php echo $usr['idUsuario']; ?>" readonly>
                                            <?php } ?>

                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="idCliente">Cliente:</label>
                                                    <select class="form-control" id="fkClienteP" name="fkClienteP">
                                                        <?php foreach($clientes as $cliente){ ?>
                                                            <option value="<?php echo $cliente['fkClienteP']; ?>"><?php echo $cliente['razon']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
												<div class="form-group">
                                                    <label for="nombre">Tiempo Estimado:</label>
                                                    <input type="text" class="form-control" name="tiempo_estimado" id="tiempo_estimado" placeholder="00:00:00">
                                                </div>
                                                
                                            </div>
                                     
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Costo a Presupuestar:</label>
                                                    <input type="text" class="form-control" name="costo_real" id="costo_real" placeholder="Costo...">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Gasto en Combustible Estimado:</label>
                                                    <input type="number" class="form-control" name="combustible_estimado" id="combustible_estimado" placeholder="combustible...">
                                                </div>
												
                                            </div>
											<div class="col-xs-12" >
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<div class="form-group">
														<label for="doc">Kilometraje Estimado:</label>
														<input type="number" class="form-control" name="km_estimado" id="km_estimado" onblur="return validar()" placeholder="Km">
													</div>
												</div>
												<div class="col-xs-3"></div>
											</div>
                                            <div class="form-group">
								                <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
								            </div>
                                            <div class="form-group">
                                                <a href="vista_presupuestos.php" class="btn btn-danger btn-lg">Volver</a>
                                                <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                            </div>
                                        </table>
                                        <input type="hidden" class="form-control" name="aceptado" id="aceptado" value="No" readonly>
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

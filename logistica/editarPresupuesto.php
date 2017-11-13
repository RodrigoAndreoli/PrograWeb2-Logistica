<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Presupuesto</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!='Supervisor'){
            $miSession -> permisos();
        }
        $cod = $_GET['id'];
        $obj = new controlDB();
        $idUsuario = $_SESSION['idUsuario'];
		$presupuestos = $obj -> consultar("SELECT * 
            FROM Presupuesto 
            WHERE idPresupuesto = '$cod'");
        $nombreUsuario = $_SESSION['usuario']; 
        $rolUsuario = $_SESSION['rol'];  
        $clientes = $obj -> consultar("SELECT idCliente, razon 
            FROM Cliente");
        $viajes = $obj -> consultar("SELECT idViaje 
            FROM Viaje");
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
                        <div class="row">
                            <div class="col">
                                <h3>Editar Presupuesto</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdPresupuesto.php" method="post" class="form-horizontal" id="formu" name="formu" onsubmit="return validar()">
                                        <table class="table table-striped  table-condensed table-hover">
                                            <?php foreach($presupuestos as $dato) { ?>
                                            <input type="hidden" class="form-control" value="<?php echo $dato['fkClienteP']; ?>" name="fkClienteP" id="fkClienteP" readonly>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Costo Presupuestado:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $dato['costo_real']; ?>" name="costo_real" id="costo_real">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Tiempo estimado:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $dato['tiempo_estimado']; ?>" name="tiempo_estimado" id="tiempo_estimado">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Kilometraje Estimado:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $dato['km_estimado']; ?>" name="km_estimado" id="km_estimado">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Combustible Estimado:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $dato['combustible_estimado']; ?>" name="combustible_estimado" id="combustible_estimado" onblur="return validar()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
								                <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
								            </div>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <a href="vista_presupuestos.php" class="btn btn-danger">Volver</a>
                                                    <input type="submit" value="Modificar" class="btn btn-primary">
                                                </td>
                                            </tr>
										 <?php } ?>
                                        </table>
                                        <input type="hidden" name="funcion" id="funcion" value="modificar" readonly>
                                        <input type="hidden" name="aceptado" id="aceptado" value="no" readonly>
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
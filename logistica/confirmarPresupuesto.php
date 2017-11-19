<!DOCTYPE html>
<html lang="es">

<head>
<title>Confirmar Presupuesto</title>
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
    $idPresupuesto = $_REQUEST['id'];
	/*$presupuestos = $obj -> consultar("SELECT * 
        FROM Presupuesto 
        WHERE idPresupuesto = '$cod'");
    
    $nombreUsuario = $_SESSION['usuario']; 
    $rolUsuario = $_SESSION['rol'];  
    $clientes = $obj -> consultar("SELECT idCliente, razon 
        FROM Cliente");

    $viajes = $obj -> consultar("SELECT idViaje 
        FROM Viaje");*/
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
                                <h3>Confirmar presupuesto</h3>
                            </div>
                        </div>
                        <form action="bdViajes.php" method="post" name="form" id="form" onsubmit="return validar()">

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Fecha:</label>
<!--                                    <input type="datetime-local" class="form-control" name="fecha" id="fecha" placeholder="2000-12-31 23:59:59">-->
                                    <input type="datetime" class="form-control" name="fecha" id="fecha" placeholder="2000-12-31 23:59:59">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Origen:</label>
                                    <input type="text" class="form-control" name="origen" id="origen" placeholder="Origen...">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Destino:</label>
                                    <input type="text" class="form-control" name="destino" id="destino" placeholder="Destino...">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="">Tipo de carga:</label>
                                    <input type="text" class="form-control" name="tipo_carga" id="tipo_carga" placeholder="Tipo de carga...">
                                </div>
                            </div>

                                    <input type="hidden" class="form-control" name="fkPresupuestoV" id="fkPresupuestoV"  value="<?php echo $idPresupuesto ?>">
                                    
                            <div class="form-group">

                                <a href="vista_presupuestos.php" class="btn btn-danger btn-lg">Volver</a>
                                <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                            </div>

                            <input type="hidden" name="funcion" id="funcion" value="insertar" readonly>
                        </form>
                        <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
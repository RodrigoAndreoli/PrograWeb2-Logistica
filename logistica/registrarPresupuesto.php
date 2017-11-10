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
    <script type="text/javascript" src="/resources/js/valida.js"></script>
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
                                            <input type="hidden" name="fkAdministradorP" value="<?php echo $usr['idUsuario']; ?>">
                                            <?php } ?>

                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="idCliente">Cliente</label>
                                                    <select class="form-control" id="idCliente" name="fkClienteP" onblur="return validar()" >
                                                        <option value="">n/d</option>
                                                        <?php foreach($clientes as $cliente){ ?>
                                                            <option value="<?php echo $cliente['fkClienteP']; ?>"><?php echo $cliente['razon']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
												<div class="form-group">
                                                    <label for="nombre">Tiempo</label>
                                                    <input type="text" class="form-control" name="tiempo_estimado" id="tiempo_estimado" onblur="return validar()" placeholder="00:00:00">
                                                </div>
                                                <div class="form-group">
                                                    <label for="doc">km previstos</label>
                                                    <input type="number" class="form-control" name="km_estimado" id="km_estimado" onblur="return validar()" placeholder="Km">
                                                </div>
                                            </div>
                                     
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="sel1">Aceptado</label>
                                                    <select class="form-control" id="aceptado" onblur="return validar()" name="aceptado">
                                                        <option value="no">no</option>
                                                        <option value="si">si</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Combustible previsto</label>
                                                    <input type="number" class="form-control" name="combustible_estimado" id="combustible_previsto" onblur="return validar()" placeholder="combustible...">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="">Costo</label>
                                                    <input type="text" class="form-control" name="costo_real" id="costo_real" onblur="return validar()" placeholder="Costo...">
                                                </div>
                                            </div>
                                            <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                            <div class="form-group">
                                                <a href="vista_presupuestos.php" class="btn btn-danger btn-lg">Volver</a>
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

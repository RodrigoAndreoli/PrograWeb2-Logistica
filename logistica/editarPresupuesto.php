<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Presupuesto</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
    
        $cod = $_GET['id'];
        $obj = new controlDB();
        $presupuestos = $obj -> consultar("SELECT * 
            FROM presupuesto 
            WHERE idPresupuesto = '$cod'");
        
        $nombreUsuario = $_SESSION['usuario']; 
        $rolUsuario = $_SESSION['rol'];  

        $clientes = $obj -> consultar("select idCliente,razon from cliente");
        $viajes = $obj -> consultar("SELECT idViaje FROM viaje");
        $usuario = $obj -> consultar("SELECT u.idUsuario,u.nombre FROM usuario u  WHERE u.nombre = '$nombreUsuario' AND u.rol = '$rolUsuario'");
      
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
                        <div class="row">
                            <div class="col">
                                <h3>Editar presupuesto</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdPresupuestos.php" method="post" class="form-horizontal">
                                        <table class="table table-striped  table-condensed table-hover">
                                          
                                            <?php foreach($presupuestos as $dato){ ?>

                                            <?php foreach($usuario as $usr){ ?>
                                                <input type="hidden" name="idUsuario" value="<?php echo $usr['idUsuario']; ?>">
                                            <?php } ?>

                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3 cliente">Cliente:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="cliente" name="idCliente">
                                                           <?php foreach($clientes as $cliente){ ?>
                                                            <option value="<?php echo $cliente['idCliente']; ?>"><?php echo $cliente['razon']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3 viaje">Viaje:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="viaje" name="idViaje">
                                                           <?php foreach($viajes as $viaje){ ?>
                                                            <option value="<?php echo $viaje['idViaje']; ?>"><?php echo $viaje['idViaje']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Tiempo:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $dato['tiempo_estimado']; ?>" name="tiempo_estimado">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Km:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $dato['km_previstos']; ?>" name="km_previstos">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Combustible:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $dato['combustible_previsto']; ?>" name="combustible_previsto">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Costo:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $dato['costo_real']; ?>" name="costo_real">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3 aceptado">Aceptado:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="aceptado" name="aceptado" required>
                                                            <option value="si">si</option>
                                                            <option value="no">no</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3 estado">Estado:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="aceptado" name="estado" required>
                                                            <option value="en curso">En curso</option>
                                                            <option value="finalizado">Finalizado</option>
                                                            <option value="cancelado">Cancelado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>    
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <a href="vista_presupuestos.php" class="btn btn-danger">Volver</a>
                                                    <input type="submit" value="Modificar" class="btn btn-primary">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <input type="hidden" name="funcion" value="modificar"> 
                                        <input type="hidden" name="cod" value="<?php echo $cod; ?>">
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
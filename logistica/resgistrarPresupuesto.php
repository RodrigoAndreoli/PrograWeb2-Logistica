<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        $obj = new controlDB();
        $clientes = $obj -> consultar("SELECT c.idCliente, c.razon FROM cliente c");
        $viajes = $obj -> consultar("SELECT idViaje FROM viaje");
        
        $usuario = $obj -> consultar("SELECT idUsuario,nombre FROM usuario WHERE nombre = '".$_SESSION['usuario']."' AND rol= '".$_SESSION['rol']."' ");
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
                                    <h3>Registrar nuevo presupuesto</h3>
                                </div>
                            </div>
                            <form action="bdPresupuestos.php" method="post">
                                <table class="table">
                                   
                                   <?php foreach($usuario as $usr){ ?>
                                        <input type="hidden" name="idUsuario" value="<?php echo $usr['idUsuario']; ?>">
                                    <?php } ?>
                                   
                                   <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="viaje">Viajes</label>
                                            <select class="form-control" id="viaje" name="idViaje">
                                               <?php foreach($viajes as $viaje){ ?>
                                                <option value="<?php echo $viaje['idViaje']; ?>"><?php echo $viaje['idViaje']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="cliente">Cliente</label>
                                            <select class="form-control" id="cliente" name="idCliente">
                                               <?php foreach($clientes as $cliente){ ?>
                                                <option value="<?php echo $cliente['idCliente']; ?>"><?php echo $cliente['razon']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre">Tiempo</label>
                                            <input type="text" class="form-control" name="tiempo_estimado" placeholder="00:00:00">
                                        </div>
                                        <div class="form-group">
                                            <label for="doc">km previstos</label>
                                            <input type="number" class="form-control" name="km_previstos" placeholder="Km">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="sel1">Aceptado</label>
                                            <select class="form-control" id="aceptado" name="aceptado">
                                                <option value="no">no</option>
                                                <option value="si">si</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sel2">Estado</label>
                                            <select class="form-control" id="sel2" name="estado">
                                                <option value="en curso">en curso</option>
                                                <option value="finalizado">finalizado</option>
                                                <option value="cancelado">cancelado</option> 
                                              </select>                           
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                          <div class="form-group">
                                            <label for="">Combustible previsto</label>
                                            <input type="number" class="form-control" name="combustible_previsto" placeholder="combustible...">                    
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Costo</label>
                                            <input type="text" class="form-control" name="costo_real" placeholder="Costo...">
                                        </div>
                                    </div>
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

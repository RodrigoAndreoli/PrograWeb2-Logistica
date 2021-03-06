<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Chofer' ||  $_SESSION['rol']=='Mecanico'){
                $miSession -> permisos();
            } 
    ?>
    <script type="text/javascript" src="/resources/js/validCliente.js"></script>
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
                                    <h3>Registrar nuevo cliente</h3>
                                </div>
                            </div>
                            <form action="bdCliente.php" method="post" name="form" id="form" onsubmit="return validar()">
                                <table class="table">
                                    <div class="col-xs-12">
										<div class="col-xs-2">
											<div class="form-group">
												<label for="cuit">Cuit:</label>
												<input type="text" class="form-control" name="cuit" id="cuit" placeholder="Cuit...">
											</div>
										</div>
										<div class="col-xs-8">
											<div class="form-group">
												<label for="razon">Raz&oacute;n Social:</label>
												<input type="text" class="form-control" name="razon" id="razon" placeholder="Raz&oacute;n social...">
											</div>
										</div>
										<div class="col-xs-2">
											<div class="form-group">
												<label for="">Tel&eacute;fono:</label>
												<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Tel&eacute;fono...">
											</div>
										</div>
									
									</div>
                                   
                                    <div class="col-xs-12">
										<div class="col-xs-4">
											<div class="form-group">
												<label for="">Calle:</label>
												<input type="text" class="form-control" name="dom_calle" id="dom_calle" placeholder="Calle...">
											</div>
										</div>
										<div class="col-xs-3">
											<div class="form-group">
												<label for="">N&uacute;mero:</label>
												<input type="text" class="form-control" name="dom_numero" id="dom_numero" placeholder="N&uacute;mero...">
											</div>
										</div>
										<div class="col-xs-3">
											<div class="form-group">
												<label for="">Piso:</label>
												<input type="text" class="form-control" name="dom_piso" id="dom_piso" placeholder="Piso..." onblur="return validar()">
											</div>
										</div>
										<div class="col-xs-2">
											<div class="form-group">
												<label for="">C&oacute;d. postal:</label>
												<input type="text" class="form-control" name="dom_cp" id="dom_cp" placeholder="C&oacute;d. postal...">
											</div>
										</div>
                                    </div>
									
                                    <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                    <div class="form-group">
                                        <a href="vista_clientes.php" class="btn btn-danger btn-lg">Volver</a>
                                        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
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

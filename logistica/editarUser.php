<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!='Supervisor'){
            $miSession -> permisos();
        }
        $cod = $_GET['id'];
        $obj = new controlDB();
        $user = $obj -> consultar("SELECT * 
            FROM Usuario 
            WHERE idUsuario = '$cod'");
    ?>
	<script type="text/javascript" src="/resources/js/validUser.js"></script>
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
                                <h3>Editar usuario</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdUser.php" method="post" class="form-horizontal" onsubmit="return validar();">
                                        <table class="table table-striped  table-condensed table-hover">
                                            <?php foreach($user as $users){ ?>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Nro documento:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $users['num_doc']; ?>" name="num_doc" id="num_doc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Password:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="password" class="form-control" placeholder="****" name="pass" id="pass" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <div class="control-label col-xs-4 col-sm-3">
                                                        <label for="sel1 ">Rol:</label>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="rol" name="rol" onblur="mostrarLic();">
                                                            <option value="<?php echo $users['rol']; ?>" selected disabled><?php echo $users['rol']; ?></option>
                                                            <option value="Chofer">Chofer</option>
                                                            <option value="Administrador">Administrador</option>
                                                            <option value="Supervisor">Supervisor</option>
                                                            <option value="Mecanico">Mecanico</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Nombre y Apellido:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $users['nombre']; ?>" name="nombre" id="nombre">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Fecha de Nacimiento:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $users['fecha_nacimiento']; ?>" name="fecha_nacimiento" id="fecha_nacimiento">
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group" id="mostrarLicencia" style="display:none">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <div class="control-label col-xs-4 col-sm-3">
                                                        <label for="sel2 ">Tipo Licencia:</label>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="tipo_licencia" name="tp_licencia">
                                                            <option value="<?php echo $users['tipo_licencia']; ?>" selected disabled><?php echo $users['tipo_licencia']; ?></option>
                                                            <option value="C">C</option>
                                                            <option value="D1">D1</option>
                                                            <option value="E1">E1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <a href="vista_usuarios.php" class="btn btn-danger">Volver</a>
                                                    <input type="submit" value="Modificar" class="btn btn-primary">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <input type="hidden" name="funcion" id="funcion" value="modificar" readonly> 
                                        <input type="hidden" name="cod" id="cod" value="<?php echo $cod; ?>" readonly>
                                    </form>
									<div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
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
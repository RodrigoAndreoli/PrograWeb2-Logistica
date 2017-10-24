<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
    
        $cod = $_GET['id'];
        $obj = new controlDB();
        $user = $obj -> consultar("SELECT * 
            FROM usuario 
            WHERE idUsuario = '$cod'");
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
                                <h3>Editar usuario</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdUser.php" method="post" class="form-horizontal">
                                        <table class="table table-striped  table-condensed table-hover">
                                            <?php foreach($user as $users){ ?>

                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Nombre:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $users['nombre']; ?>" name="nombre">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Password:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="password" class="form-control"  placeholder="****" name="pass" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Documento:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $users['tipo_doc']; ?>" name="tipo_doc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Nro documento:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $users['num_doc']; ?>" name="num_doc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Nacimiento:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $users['fecha_nacimiento']; ?>" name="fecha_nacimiento">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <div class="control-label col-xs-4 col-sm-3">
                                                        <label for="sel1 ">Rol</label>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="sel1" name="rol">
                                                            <option value="<?php echo $users['rol']; ?>" selected><?php echo $users['rol']; ?></option>
                                                            <option value="chofer">chofer</option>
                                                            <option value="admin'">admin</option>
                                                            <option value="supervisor">supervisor</option>
                                                            <option value="mecanico">mecanico</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>    
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <a href="usuarios.php" class="btn btn-danger">Volver</a>
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
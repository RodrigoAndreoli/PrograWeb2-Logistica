<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
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
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h3>Registrar nuevo usuario</h3>
                                </div>
                            </div>
                            <form action="bdUser.php" method="post" name="form" id="form" onsubmit="return validar()">
                                <table class="table">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" onblur="return validar()" placeholder="Nombre...">
                                        </div>
                                        <div class="form-group">
                                            <label for="doc">Tipo documento</label>
                                            <input type="text" class="form-control" name="tipo_doc" id="tipo_doc" onblur="return validar()" placeholder="Tipo...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="pass" id="pass" onblur="return validar()" placeholder="****">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Numero documento</label>
                                            <input type="text" class="form-control" name="num_doc" id="num_doc" onblur="return validar()" placeholder="Numero...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="sel1">Rol</label>
                                            <select class="form-control" id="sel1" onblur="return validar()" name="rol">
                                                <option value="chofer">chofer</option>
                                                <option value="admin">admin</option>
                                                <option value="supervisor">supervisor</option>
                                                <option value="mecanico">mecanico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Fecha nacimiento</label>
                                            <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" onblur="return validar()" placeholder="2017-07-28">
                                        </div>
                                    </div>
                                    <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                    <div class="form-group">
                                        <a href="vista_usuarios.php" class="btn btn-danger btn-lg">Volver</a>
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

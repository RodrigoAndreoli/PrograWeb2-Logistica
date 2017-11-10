<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!='Supervisor'){
                $miSession -> permisos();
            }
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
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Nro. de documento:</label>
                                        <input type="text" class="form-control" name="num_doc" id="num_doc"  placeholder="Nro. de documento..." tabindex="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contrase&ntilde;a:</label>
                                        <input type="password" class="form-control" name="pass" id="pass" placeholder="****" tabindex="2" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Rol</label>
                                        <select class="form-control" id="rol" name="rol" tabindex="3" onblur="mostrarLic()">
                                            <option value="Supervisor" selected>Supervisor</option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Chofer">Chofer</option>
                                            <option value="Mecanico">Mecanico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre..." tabindex="4">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento:</label>
                                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"  placeholder="2017-07-28" tabindex="5" onblur="return validar()">
                                    </div>
                                </div>
                                <div class="col-xs-6" style="display:none" id="mostrarLicencia">
                                    <div class="form-group">
                                        <label for="">Tipo de Licencia:</label>
                                        <select class="form-control" id="tipo_licencia" name="tipo_licencia" tabindex="6">
                                            <option value="" selected disabled></option>
                                            <option value="C">C</option>
                                            <option value="D1">D1</option>
                                            <option value="E1">E1</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                <div class="form-group">
                                    <a href="vista_usuarios.php" class="btn btn-danger btn-lg">Volver</a>
                                    <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                                </div>
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

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']!='supervisor'){
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
                                <table class="table">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre..." tabindex="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="doc">Tipo documento</label>
                                            <select class="form-control" name="tipo_doc" id="tipo_doc" tabindex="3">
												<option value="DNI"> DU </option>
												<option value="DNI"> LC </option>
												<option value="DNI"> LE </option>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name="pass" id="pass"  placeholder="****" tabindex="2" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Numero documento</label>
                                            <input type="text" class="form-control" name="num_doc" id="num_doc"  placeholder="Numero..." tabindex="4">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="sel1">Rol</label>
                                            <select class="form-control" id="sel1"  name="rol" tabindex="5" onblur="mostrarLic()">
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
                                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"  placeholder="2017-07-28" tabindex="6">
                                        </div>
                                    </div>
									 <div class="col-xs-6" style="display:none" id="tp_licencia_mostrar">
                                        <div class="form-group">
                                            <label for="">Tipo de Licencia</label>
											<select class="form-control" id="sel2"  name="tp_licencia" tabindex="7">
                                                <option value="">Seleccione el tipo de licencia. . .</option>
												<option value="a">a</option>
                                                <option value="b">b</option>
                                                <option value="c">c</option>
                                            </select>
										</div>
									</div>
									<div class="col-xs-6" style="display:none" id="nro_licencia_mostrar">	
										<div class="form-group">
											<label for="">Nro Licencia</label>
											<input type="text" class="form-control" name="nro_licencia" id="nro_licencia" placeholder="Nro de Licencia..." tabindex="8">
										</div>
									</div>
                                    <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                    <div class="form-group">
                                        <a href="vista_usuarios.php" class="btn btn-danger btn-lg" tabindex="9">Volver</a>
                                        <button type="submit" class="btn btn-primary btn-lg" tabindex="10">Crear</button>
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

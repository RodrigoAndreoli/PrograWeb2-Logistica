<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='chofer' ||  $_SESSION['rol']=='mecanico'){
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
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="cuit">Cuit</label>
                                            <input type="text" class="form-control" name="cuit" id="cuit" onblur="return validar()"placeholder="Cuit...">
                                        </div>
                                        <div class="form-group">
                                            <label for="razon">Razón Social</label>
                                            <input type="text" class="form-control" name="razon" id="razon" onblur="return validar()"placeholder="Razón social...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Calle</label>
                                            <input type="text" class="form-control" name="dom_calle" id="dom_calle" onblur="return validar()" placeholder="Calle...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Número</label>
                                            <input type="text" class="form-control" name="dom_numero" id="dom_numero" onblur="return validar()"placeholder="Número...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Piso</label>
                                            <input type="text" class="form-control" name="dom_piso" id="dom_piso" onblur="return validar()"placeholder="Piso...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Cód. postal</label>
                                            <input type="text" class="form-control" name="dom_cp" id="dom_cp" onblur="return validar()"placeholder="Cód. postal...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <input type="text" class="form-control" name="telefono" id="telefono" onblur="return validar()"placeholder="Teléfono...">
                                        </div>
                                    </div>
                                    <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
                                    <div class="form-group">
                                        <a href="vista_clientes.php" class="btn btn-danger btn-lg">Volver</a>
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

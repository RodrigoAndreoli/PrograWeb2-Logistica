<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Usuario</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
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
                                    <h3>Registrar nuevo cliente</h3>
                                </div>
                            </div>
                            <form action="bdCliente.php" method="post">
                                <table class="table">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="cuit">Cuit</label>
                                            <input type="text" class="form-control" name="cuit" placeholder="Cuit...">
                                        </div>
                                        <div class="form-group">
                                            <label for="razon">Razón Social</label>
                                            <input type="text" class="form-control" name="razon" placeholder="Razón social...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Calle</label>
                                            <input type="text" class="form-control" name="dom_calle" placeholder="Calle...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Número</label>
                                            <input type="text" class="form-control" name="dom_numero" placeholder="Número...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Piso</label>
                                            <input type="text" class="form-control" name="dom_piso" placeholder="Piso...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Cód. postal</label>
                                            <input type="text" class="form-control" name="dom_cp" placeholder="Cód. postal...">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <input type="text" class="form-control" name="telefono" placeholder="Teléfono...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a href="clientes.php" class="btn btn-danger btn-lg">Volver</a>
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

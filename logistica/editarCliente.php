<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Cliente</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
    
        $cod = $_GET['id'];
        $obj = new controlDB();
        $cliente = $obj -> consultar("SELECT * 
            FROM cliente 
            WHERE idCliente = '$cod'");
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
                                <h3>Editar cliente</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdCliente.php" method="post" class="form-horizontal">
                                        <table class="table table-striped  table-condensed table-hover">
                                            <?php foreach($cliente as $clientes){ ?>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">IdCliente:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  placeholder="<?php echo $clientes['idCliente']; ?>" name="idCliente" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Cuit:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $clientes['cuit']; ?>" name="cuit">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Razón social:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $clientes['razon']; ?>" name="razon">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Calle:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $clientes['dom_calle']; ?>" name="dom_calle">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Número:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $clientes['dom_numero']; ?>" name="dom_numero">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Piso:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $clientes['dom_piso']; ?>" name="dom_piso">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Cód. Postal:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $clientes['dom_cp']; ?>" name="dom_cp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Teléfono:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control"  value="<?php echo $clientes['telefono']; ?>" name="telefono">
                                                    </div>
                                                </div>
                                            </div>
   
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <a href="clientes.php" class="btn btn-danger">Volver</a>
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
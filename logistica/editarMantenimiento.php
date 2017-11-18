<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Mantenimiento</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Chofer'){
                $miSession -> permisos();
        } 
        $cod = $_REQUEST['id'];
        $obj = new controlDB();
        $mantenimientos = $obj -> consultar("SELECT * 
            FROM Mantenimiento 
            WHERE idMantenimiento = '$cod'");
    ?>
	
	<script type="text/javascript" src="/resources/js/validMantenimiento.js"></script>

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
                                <h3>Editar mantenimiento</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="bdMantenimiento.php" method="post" class="form-horizontal" onsubmit="return validar();">
                                        <table class="table table-striped  table-condensed table-hover">
                                            <?php foreach($mantenimientos as $mant){ ?>
                                            <input type="hidden" value="<?php echo $mant['fkVehiculoM']; ?>" name="fkVehiculoM" id="fkVehiculoM" readonly>
                                            <input type="hidden" value="<?php echo $mant['fkMecanicoM']; ?>" name="fkMecanicoM" id="fkMecanicoM" readonly>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Fecha entrada:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="date" class="form-control" value="<?php echo $mant['fecha_entrada']; ?>" name="fecha_entrada" id="fecha_entrada">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Fecha salida:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="date" class="form-control" value="<?php echo $mant['fecha_salida']; ?>" name="fecha_salida" id="fecha_salida">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Costo:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $mant['costo']; ?>" name="costo" id="costo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Externo:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <select class="form-control" id="externo" name="externo">
                                                            <option value="No">No</option>
                                                            <option value="Si">Si</option>
                                                            <script>
                                                                document.getElementById("externo").value="<?php echo $mant['externo']; ?>";
                                                            </script>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                                    <label class="control-label col-xs-4 col-sm-3">Repuestos:</label>
                                                    <div class="col-xs-8 col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $mant['repuestos']; ?>" name="repuestos" id="repuestos">
                                                    </div>
                                                </div>
                                            </div> 
                                            <tr>
                                                <div id="mensaje" class="alert alert-danger alert-dismissable" style="clear: both; display: none;"></div>
												<td colspan="3" class="text-center">
                                                    <a href="vista_mantenimientos.php" class="btn btn-danger">Volver</a>
                                                    <input type="submit" value="Modificar" class="btn btn-primary">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                        <input type="hidden" id="funcion" name="funcion" value="modificar" readonly> 
                                        <input type="hidden" id="cod" name="cod" value="<?php echo $cod; ?>" readonly>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</body>
</html>
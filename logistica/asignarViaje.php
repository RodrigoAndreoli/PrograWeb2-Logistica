<!DOCTYPE html>
<html lang="es">

<head>
    <title>Viajes</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        //$miSession -> permisos();
		$id = $_REQUEST['id'];
        $obj = new controlDB();
        include $LIBRARY_PATH.'/vehiculo_viaje_pag.php';
    ?>
    <script type="text/javascript">
        function abrirQr() {
            var win = window.open("imprimirViajeQR.php?id=<?php echo $id ?>", '_blank');
            win.focus();
            return true;
        }
    </script>
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
                                            <h1>Asignar Viajes</h1>
                                            <hr/>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="table-responsive">
                                                <form action="bdVehiculoChoferViaje.php" method="POST" onsubmit="return abrirQr()">
                                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                                        <tr>
                                                            <th class="text-center">Chofer</th>
                                                            <th class="text-center"> Vehiculo</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="chofer1" class="form-control" id="sel1"><?php foreach($datos as $td){ ?>
													               <option value="<?php echo $td['idUsuario'];?>"><?php echo $td['idUsuario']." - ".$td['nombre'];?> </option>
												                <?php } ?>
												            </td>
												            <td>
                                                                <select name="vehiculo1" class="form-control" id="sel1"><?php foreach($datos2 as $td2){ ?>
													               <option value="<?php echo $td2['idVehiculo'];?>"><?php echo $td2['patente']." - ".$td2['marca'];?></option> 
												                <?php } ?>
												            </td>
												        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="chofer2" class="form-control" id="sel1"><option value="0">N/A</option><?php foreach($datos as $td){ ?>
													               <option value="<?php echo $td['idUsuario'];?>"><?php echo $td['idUsuario']." - ".$td['nombre'];?> </option>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <select name="vehiculo2" class="form-control" id="sel1"><option value="0">N/A</option><?php foreach($datos3 as $td3){ ?>
                                                                    <option value="<?php echo $td3['idVehiculo'];?>"><?php echo $td3['patente']." - ".$td3['marca'];?></option> 
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </table> 
                                                    <input type="hidden" name="id" value="<?php echo $id ; ?>">
                                                    <input type="hidden" name="funcion" value="asignar">
                                                    <div class="col"> 
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>    
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

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Viajes</title>
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=='Chofer' || $_SESSION['rol']=='Mecanico' || $_SESSION['rol']=='Administrador'){
                $miSession -> permisos();
            } 
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
                                                                <select name="fkChoferT" class="form-control" id="fkChoferT"><?php foreach($datos as $td){ ?>
													               <option value="<?php echo $td['IdUsuario'];?>"><?php echo $td['IdUsuario']." - ".$td['Nombre'];?> </option>
												                <?php } ?>
												            </td>
												            <td>
                                                                <select name="fkCamionT" class="form-control" id="fkCamionT"><?php foreach($datos2 as $td2){ ?>
													               <option value="<?php echo $td2['IdVehiculo'];?>"><?php echo $td2['Patente']." - ".$td2['Marca'];?></option> 
												                <?php } ?>
												            </td>
												        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="fkAcompanianteT" class="form-control" id="fkAcompanianteT"><option value="0">N/A</option><?php foreach($datos as $td){ ?>
													               <option value="<?php echo $td['IdUsuario'];?>"><?php echo $td['IdUsuario']." - ".$td['Nombre'];?> </option>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <select name="fkAcopladoT" class="form-control" id="fkAcopladoT"><option value="0">N/A</option><?php foreach($datos3 as $td3){ ?>
                                                                    <option value="<?php echo $td3['IdVehiculo'];?>"><?php echo $td3['Patente']." - ".$td3['Marca'];?></option> 
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </table> 
                                                    <input type="hidden" name="fkViajeT" id="fkViajeT" value="<?php echo $id; ?>" readonly>
                                                    <input type="hidden" name="funcion" id="funcion" value="asignar" readonly>
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

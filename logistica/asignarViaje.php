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
                                    <h1>Zona de Viajes</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">
                                            <tr>
                                                <th  class="text-center">idViaje</th>
												<th class="text-center">Chofer</th>
												<th  class="text-center"> Vehiculo</th>
											</tr>
											<tr>
												<td> <?php echo $id ; ?></td>
												
												<td><select name="chofer"><?php foreach($datos as $td){ ?>
													<option value="<?php echo $td['idUsuario'];?>"><?php echo $td['idUsuario'];?> </option>
												
												<?php } ?>
												</td>
												
												<td><select name="vehiculo"><?php foreach($datos2 as $td2){ ?>
													<option value="<?php echo $td2['idVehiculo'];?>"><?php echo $td2['idVehiculo'];?></option> 
												<?php } ?>
												</td>
												
												
											</tr>
                                        
                                        </table>    
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col"> 
                                <a href="bdViajes.php?idV=<?php echo $id ?>&idU=<?php echo $td['idUsuario']?>&idVe=<?php echo $td2['idVehiculo']?>&funcion=guardar" class="btn btn-primary">Guardar</a>
                                </div>
                        </div>
                        <div class="row">
                            <a href="#">
                                <button class="btn btn-link" target="_blank">Exportar a PDF</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 

if(isset($_REQUEST['id'])) {
    $idViaje = $_REQUEST['id'];
}
else if  (isset($_POST['enviar'])){
          $idViaje = $_POST['idViaje'];       
    }
    else {
        $idViaje = null;
    }

    
    if(isset($_POST['enviar'])) {   

        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
		$user = $_POST['num_doc'];
		$pass = md5($_POST['pass']);
		$hoy = date("Y-m-d H:i:s");

        //Prepared statement
		$ingreso = $conexion->prepare("
            SELECT idUsuario, rol, nombre
            FROM Usuario 
            WHERE num_doc = ? and pass = ? 
            ");
        
		$ingreso->bind_param("is",$user,$pass);
		//Ejecucion de la sentencia preparada
		$ingreso->execute();
		//Formateo de resultados
		$resultado = $ingreso->get_result();
		$fila = $resultado->fetch_assoc();
	
		if($resultado->num_rows>=1) {
			session_start();
            $_SESSION['idUsuario'] = $fila['idUsuario'];
            $_SESSION['rol'] = $fila['rol'];
			$_SESSION['usuario'] = $fila['nombre'];

                if ($idViaje >= 1 && $fila['rol'] == 'Chofer') {
                    header('Location: registrarReporte.php?id=' .$idViaje);    
                    exit();
                }
            header('Location: ppal.php');
            exit();
		} else {
            echo "
                <script> 
                    window.onload = function() {
                        document.getElementById('msjError').style.visibility = 'visible'; 
                    }
                </script>"
            ;
        }
	}

?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <title> Logistica </title>
    <?php
    
            require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
    
    ?>
</head>

<body>
    <div class='container'>
        <header class='page-header'>
            <div class="container-fluid bg-1">
                <div class="row">
                    <div class="col text-center">
                        <img src="/resources/images/login.jpg" style="display:inline" alt="Loguistica">
                        <h3 class="margin">LOGISTICA</h3>
                    </div>
                </div>
            </div>
        </header>

        <section>
            <div class='row'>
                <div class='col-lg-4 col-lg-offset-4 col-xs-12 col-md-4 col-md-offset-4'>
                    <form action="login.php" class='form-horizontal' method='POST'>
                        <div class="form-group">
                            <label class="col-lg-12">N&uacute;mero de Documento:</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="num_doc" placeholder="N&uacute;mero de Documento" name='num_doc' required='required'>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-12" for="hasta">Contrase&ntilde;a:</label>
                            <div class="col-lg-12">
                                <input type="password" class="form-control" id="pass" placeholder="Password" name='pass' required='required'>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="idViaje"  name='idViaje' value=<?php echo $idViaje ?> readonly>
                        <div class="form-group">
                            <label class="control-label col-md-8" for="msjError" id="msjError" style="visibility: hidden; color:red; font-size:12px; text-align: left;">Usuario o contrase&ntilde;a incorrecto.</label>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <center>
                                    <button type="submit" class="btn btn-lg  btn-primary" style="width: 100%" name='enviar' value='1'>Enviar</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

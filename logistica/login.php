<?php 
	
    if(isset($_POST['enviar'])) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
		$user = $_POST['num_doc'];
		$pass = md5($_POST['password']);
		$hoy = date("Y-m-d H:i:s");
	   
        //Prepared statement
		$ingreso = $conexion->prepare("
            SELECT idUsuario,nombre,rol 
            FROM usuario 
            WHERE num_doc = ? and password = ? 
            ");
        
		$ingreso->bind_param("si",$user,$pass);
		//Ejecucion de la sentencia preparada
		$ingreso->execute();
		//Formateo de resultados
		$resultado = $ingreso->get_result();
		$fila = $resultado->fetch_assoc();
	
		if($resultado->num_rows>=1) {
			session_start();
			$_SESSION['usuario'] = $fila['nombre'];
            $_SESSION['rol'] = $fila['rol'];
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
                                <input type="text" class="form-control" id="usuario" placeholder="N&uacute;mero de Documento" name='num_doc' required='required'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12" for="hasta">Contrase&ntilde;a:</label>
                            <div class="col-lg-12">
                                <input type="password" class="form-control" id="pass" placeholder="Password" name='password' required='required'>
                            </div>
                        </div>
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

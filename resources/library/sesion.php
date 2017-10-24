<?php
    class Sesion{
        public function _construct(){}
        
        public function iniciarSesion(){
            session_start();
            if(!isset($_SESSION['usuario'])) {
                header('Location: login.php');
            }
        }
        
        public function destruirSesion(){
            unset($_SESSION['usuario']);
            session_destroy();
            header('Location: login.php');
            exit();
        }
        
        public function permisos(){
            
            $rol=$_SESSION['rol'];/*
            if($rol!='supervisor' )
            {
                header('Location: ppal.php');
            }*/
            switch ($rol) {
                case 'chofer':
                    header('Location: viajes.php');
                   break;
                case 'admin':
                    header('Location: viajes.php');
                    header('Location: vehiculos.php');
                    header('Location: clientes.php');
                    header('Location: mantenimientoReparacion.php');
                    break;
                case 'mecanico':
                    header('Location: viajes.php');
                    header('Location: vehiculos.php');
                    header('Location: mantenimientoReparacion.php');
                    break;
            }
        }
    }//fin
?>
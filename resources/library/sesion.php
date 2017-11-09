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
                    header('Location: vista_viajes.php');
                   break;
                case 'admin':
                    header('Location: vista_viajes.php');
                    header('Location: vista_vehiculos.php');
                    header('Location: vista_clientes.php');
                    header('Location: vista_mantenimientos.php');
                    header('Location: graficos.php');
                    header('Location: service.php');
                    break;
                case 'mecanico':
                    header('Location: vista_viajes.php');
                    header('Location: vista_vehiculos.php');
                    header('Location: graficos.php');
                    header('Location: service.php');
                    header('Location: vista_mantenimientos.php');
                    break;
            }
        }
    }//fin
?>
<?php

    class controlDB{
        /*-------------------CONEXION----------------------------*/
        //constructor
        function __construct(){
            
            try{
             //aca va la conexion,declaro variables
            $host="localhost";
            $dbname="logistica";
            $user="root";
            $pass="";  
            
            //conexion dentro de variable
            $this->con=mysqli_connect($host,$user,$pass) or die("No se puede conectar con la base de datos.");
            //selecciona la base
            mysqli_select_db($this->con,$dbname)or die("No se encuentra la base de datos.");
            mysqli_set_charset($this->con, "utf8");    
            //echo "conexion ok";
            }catch(Exception $ex){
                throw $ex;
            }    
        }
        
        /*----------------------CONSULTAR-------------------------*/
         //$sql va ser el select, los select
        function consultar($sql){
            
			
			$log = new creaLog();
			$log->escribir($sql);//conexion,consulta
            $result=mysqli_query($this->con,$sql);
            //array vacio
            $data=null;
            //capturar la info,fecth captura datos fila por fila y almacena con el indice de la tabla, el nombre, fethc row no trae el nombre del campo
            while($fila=mysqli_fetch_array($result)){
                $data[]=$fila;
            }
            return $data;
        }
        /*
            ejemplo:
            $obj = new controlDB();
            $obj->consultar("select * from cliente"); obj conexion, y
            la consulta 
        */
        
        /*---------------------INSERTAR-----------------------------*/
//        Esta funcion se encarga de los insert, delete, update, etc.
        function insertar($sql){
			
			mysqli_query($this->con,$sql);
            //validar cuando se inserta,columnas afectadas
            //if si no hay cambios en la tabla
		   if(mysqli_affected_rows($this->con)<=0) {
            //   echo "No se pudo realizar la operaciontrue
               return false;
            } else {
              //  echo "Se realizaron los cambios";  
               return true;
            }
        }
        
        /*---------------------VALIDAR-----------------------------*/
        function validstring ($valid) {
            $regexstring = '/([A-Z]+[a-z]*)/';
            if (preg_match($regexstring, $valid)) {
                return true;
            } else {
                return false;
            }
        }
        
        function validint ($valid) {
            $regexint = '/([0-9]+)/';
            if (preg_match($regexint, $valid)) {
                return true;
            } else {
                return false;
            }
        }
        
    }
    
?>
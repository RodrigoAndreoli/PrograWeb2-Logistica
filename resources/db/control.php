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
        //conexion,consulta
        //$res=mysqli_query($this->con,$sql);
        $link=$this->con;
        $stmt = mysqli_prepare($link, $sql);  
        mysqli_stmt_execute($stmt);  
        $result = $stmt->get_result();
        //array vacio
        $data=null;
        //capturar la info,fecth captura datos fila por fila y almacena con el indice de la tabla el nombre, fethc row no trae el nombre del campo
        while($fila=$result->fetch_assoc()){
            $data[]=$fila;
        }
        return $data;
        }
        
        
        /*---------------------INSERTAR-----------------------------*/
        //Esta funcion se encarga de los insert, delete, update, etc.
        function insertar($sql){
            //mysqli_query($this->con,$sql);
            $stmt = mysqli_prepare($this->con, $sql); 
            mysqli_stmt_execute($stmt); 
            //validar cuando se inserta,columnas afectadas
            //if si no hay cambios en la tabla
            if(mysqli_affected_rows($this->con)<=0){
                echo "No se pudo realizar la operacion";
            }else{
                echo "Se realizaron los cambios";
            }
        }
        
    }
    
?>
<?php

	class creaLog {
		
		function __construct()
		{
		
			
		}
		
		function escribir($mensaje)
		{
			$nombre_archivo = $_SERVER['DOCUMENT_ROOT'].'/resources/log/logs.txt'; 
			if($archivo = fopen($nombre_archivo, 'a'))
					{
						echo "Se ha ejecutado correctamente";
					}
					else
					{
						echo "Ha habido un problema al crear el archivo";
					}	
			
			if(fwrite($archivo, date("d m Y H:m:s"). " ". $mensaje. "\n"))
					{
						echo "Se ha ejecutado correctamente";
					}
					else
					{
						echo "Ha habido un problema al escribir en el archivo";
					}
			 
			fclose($archivo);
			
		}
	}
 ?>
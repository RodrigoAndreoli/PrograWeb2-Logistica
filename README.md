# PrograWeb2-TP

## Esta revisado todo lo pertinente al Chofer y al Supervisor, falta chequear Mecanico y Admin

## usuarios
    * chofer     nro 1 contraseña 1
    * supervisor nro 2 contraseña 1234
    * mecanico   nro 3 contraseña 3
    * admin      nro 4 contraseña 4


### A HACER 
    * VER LOS DATETIME Y TIME
    * ORGANIZAR LA TABLA VIAJES PARA QUE APAREZCAN LOS "A ASIGNAR" PRIMERO, LOS "A CERRAR" SEGUNDOS Y ULTIMOS LOS "YA CERRADOS".
    * Rodri: Lo de datetime-local tira error por los JS. 
	  Nico: Trate de usar un datetime de jquery pero es un bolonqui.
		    Creo que lo tendriamos que hacer en HTML5.
    * Rodri: Trate de hacer que cuando un viaje este cerrado no puedan registrarReportes, pero no funciona.
	* Nico: agregue en tabla viajes campo estado: 0 sin asignar - 1 asignado - 2 cerrado para ordenar en la consulta
		    funciona el ordenamiento, por default al insertar 0, al cerrar se updatea el estado a 2, 
			pero al asignar, al hacer el update a 1 no anda el pdf. Deje la linea comentada en bdVehiculoChoferViaje
			

### Hecho
    * VISTA REPORTES CHOFER RESPONSIVE
    * ORGANIZAR LA TABLA PRESUPUESTOS PARA QUE APAREZCAN LOS "A CONFIRMAR" PRIMERO
    * VISTA VIAJES CHOFER RESPONSIVE
    * Km TOTAL Y TIEMPO TOTAL = DIFERENCIA ENTRE PRIMER REPORTE(HORA Y KM) Y ULTIMO REPORTE (HORA Y KM)
        COMBUSTIBLE TOTAL = SUMA DE TODOS LOS REPORTES(COMBUSTIBLE)
    * CALENDARIO SERVICE en proceso falta crear y acomodar
    * NO PERMITIR MODIFICAR O ELIMINAR EL SUPERVISOR 2
    * NRO DOCUMENTO TIENE QUE SER UNIQUE
    * PATENTE TIENE QUE SER UNIQUE
    * * SACAR LOS BOTONES/LINK QUE NO SE USAN
    * PERMISO MANTENIMIENTO DE ADMIN

### Para branchear:
    //CREO (-b) EL BRANCH 'ejemplo', Y ME SITUO (checkout) EN EL.
    $git checkout -b ejemplo
    //HAGO CAMBIOS
    //AGREGO (add) LOS CAMBIOS
    $git add -A
    //COMMITEO (commit) LOS CAMBIOS CON EL MENSAJE DESCRIPTIVO 'Agrego ABM usuario.'
    $git commit -m "Agrego ABM usuario."
    //VUELVO (checkout) AL BRANCH MASTER
    $git checkout master
    //HAGO EL MERGE (merge) AL MASTER
    $git merge ejemplo
    //BORRO (delete) EL BRANCH 'ejemplo' <-- Este no es necesario
    $ git branch -d ejemplo
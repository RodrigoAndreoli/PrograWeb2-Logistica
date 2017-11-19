# PrograWeb2-TP

## Esta revisado todo lo pertinente al Chofer y al Supervisor, falta chequear Mecanico y Admin

## usuarios
    * chofer     nro 1 contraseña 1
    * supervisor nro 2 contraseña 1234
    * mecanico   nro 3 contraseña 3
    * admin      nro 4 contraseña 4


### A HACER 
    * VISTAS CHOFER RESPONSIVE(modifique el mapa para q sea reponsive, miren si quieren cambiar la tabla podria se en vertical)
    * ORGANIZAR LAS TABLAS PARA QUE APAREZCAN LOS "A ASIGNAR" PRIMERO
    * VER LOS DATETIME Y TIME
    * Rodri: Lo de Presupuestos a mi por lo menos no me aparecia, y lo de datetime-local tira error por los JS. 
    * Rodri: Trate de hacer que cuando un viaje este cerrado no puedan registrarReportes, pero no funciona.

### Hecho
    * Km TOTAL Y TIEMPO TOTAL = DIFERENCIA ENTRE PRIMER REPORTE(HORA Y KM) Y ULTIMO REPORTE (HORA Y KM)
        COMBUSTIBLE TOTAL = SUMA DE TODOS LOS REPORTES(COMBUSTIBLE)
    * CALENDARIO SERVICE en proceso falta crear y acomodar
    * NO PERMITIR MODIFICAR O ELIMINAR EL SUPERVISOR 2
    * NRO DOCUMENTO TIENE QUE SER UNIQUE
    * PATENTE TIENE QUE SER UNIQUE
    * * SACAR LOS BOTONES/LINK QUE NO SE USAN
    * PERMISO MANTENIMIENTO DE ADMIN

* Para branchear:

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






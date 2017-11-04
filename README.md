# NOTAS

* la ternaria para mi no va si ponemos una ternaria tenemos que hacer
    un abm de esa ternaria, si no no se ven los viajes porque primero se necesita la ternaria y por lo que viajes me quedo sin hacer.

* presupuesto creo que hay que revisarlo (en el tp no dice nada 
    de presupuesto), antes lo teniamos con
    idSupervisor,idCliente,idPresupuesto y otros atributos, lo que modifica en primer lugar es arreglar idSupervisor que no era fk, despues para crear un presupuesto necesitamos el idUsuario por lo que tome la session rol y nombre del usuario logeado para buscar con eso su id y pasarlo al registrarPresupuesto podriamos guardar la id en la session  cuando hace el log creo que es mejor.
    despues para la vista meti un join con viaje para mostrar origen y destino.
    A todo esto, de esta forma cuanto se registraba un nuevo peresupuesto no se podia ver en la vista presupuestos.php, y eso era por que habia q crear viajes primero, por lo que se podian crear presupuestos, pero no se podian ver en las vistas, muy loco pero si se persistian en phpmyadmin.
    entonces agregue idViaje que no estaba. Pero de esta forma tenemos que crear primero un viaje y despues hacer el presupuesto lo que me parece que es perdon por mi lenguaje tecnico medio choto, el nos dijo que lo pusieramos asi no me acuerdo?. 
    
    tenemos en presupuesto un estado que creo q deberia ir en viaje, estado = en curso, finalizado, cancelado.


* necesitamos para el calendario del service datos, cambio de aceite, cambio filtro de aire, idVehiculo, la fecha ect creamos una tabla nueva o la agregamos a mantenimiento y la tabla reporte de mantenimiento parece que no la vamos a necesitar. 

* ver alarmas

## PrograWeb2-TP

Para branchear:

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

## usuarios

* chofer     nro 1 contraseña 1
* supervisor nro 2 contraseña 1234
* mecanico   nro 3 contraseña 3
* admin      nro 4 contraseña 4




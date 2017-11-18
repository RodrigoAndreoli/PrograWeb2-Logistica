
function validar() {
    
    var idVehiculo = document.getElementById('idVehiculo').value;
    var fecha = document.getElementById('fecha').value;
    var service = document.getElementById('service').value;
    var km_service = document.getElementById('km_service').value;


    
    //expresiones regulares
    var regexnum = /([0-9]+(\.|\,?)[0-9]{0,2})/;
    var regexstr = /\b([A-Z]*[a-z]+)+\b/;
    var regexfecha = /(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[0-1])/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;

   

    if (idVehiculo == "") {
        mensaje += "<p>Campo 'Patente' vac&iacute;o.</p>";
        error++;
    } 
    
    if (fecha == "") {
        mensaje += "<p>Campo 'Fecha Salida' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexfecha).test(fecha)) {
            mensaje += "<p>La fecha debe ser en formato YYYY-MM-DD (Entre el a&ntilde;o 1900 y el 2099).</p>";
            error++;
        }
    }
    
    if (service == "") {
        mensaje += "<p>Campo 'Service' vac&iacute;o.</p>";
        error++;
    }
    
    if (km_service == "") {
        mensaje += "<p>Campo 'Km service' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(km_service)) {
            mensaje += "<p>Campo 'Km service' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (error > 0) {
        document.getElementById('mensaje').style.display = "block";
        document.getElementById('mensaje').innerHTML = mensaje;
        return false;
    } else {
        document.getElementById('mensaje').style.display = "none";
        return true;
    }

}
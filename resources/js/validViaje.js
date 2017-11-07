function validar() {
    var fecha = document.getElementById('fecha').value;
    var origen = document.getElementById('origen').value;
    var destino = document.getElementById('destino').value;
    var carga = document.getElementById('carga').value;

    //expresiones regulares
    var regexstr = /\b([A-Z]*[a-z]+)+\b/;
    var regexfecha = /(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[0-1])/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;

    if (fecha == "") {
        mensaje += "<p>Campo 'Fecha' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexfecha).test(fecha)) {
            mensaje += "<p>Campo 'Fecha' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (origen == "") {
        mensaje += "<p>Campo 'Origen' vac&iacute;o.</p>";
        error++;
    }

    if (destino == "") {
        mensaje += "<p>Campo 'Destino' vac&iacute;o.</p>";
        error++;
    }
    
    if (carga == "") {
        mensaje += "<p>Campo 'Tipo de Carga' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexstr).test(carga)) {
            mensaje += "<p>Campo 'Tipo de Carga' inv&aacute;lido.</p>";
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
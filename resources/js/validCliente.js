function validar() {
    var cuit = document.getElementById('cuit').value;
    var razon = document.getElementById('razon').value;
    var dom_calle = document.getElementById('dom_calle').value;
    var dom_numero = document.getElementById('dom_numero').value;
    var dom_piso = document.getElementById('dom_piso').value;
    var dom_cp = document.getElementById('dom_cp').value;
    var telefono = document.getElementById('telefono').value;

    //expresiones regulares
    var regexnum = /([0-9]+)/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;

    if (cuit == "") {
        mensaje += "<p>Campo 'Cuit' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(cuit)) {
            mensaje += "<p>Campo 'Cuit' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (razon == "") {
        mensaje += "<p>Campo 'Razon Social' vac&iacute;o.</p>";
        error++;
    }

    if (dom_calle == "") {
        mensaje += "<p>Campo 'Calle' vac&iacute;o.</p>";
        error++;
    }

    if (dom_numero == "") {
        mensaje += "<p>Campo 'Numero' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(dom_numero)) {
            mensaje += "<p>Campo 'Numero' inv&aacute;lido.</p>";
            error++;
        }
    }

    if (dom_piso == "") {
        mensaje += "<p>Campo 'Piso' vac&iacute;o.</p>";
        error++;
    }
    
    if (dom_cp == "") {
        mensaje += "<p>Campo 'Codigo Postal' vac&iacute;o.</p>";
        error++;
    }

    if (telefono == "") {
        mensaje += "<p>Campo 'Telefono' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(telefono)) {
            mensaje += "<p>Campo 'Telefono' inv&aacute;lido.</p>";
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
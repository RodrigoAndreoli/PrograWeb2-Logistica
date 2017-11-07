function validar() {
    var idViaje = document.getElementById('idViaje').value;
    var idCliente = document.getElementById('idCliente').value;
    var tiempo_estimado = document.getElementById('tiempo_estimado').value;
    var km_previstos = document.getElementById('km_previstos').value;
    var aceptado = document.getElementById('aceptado').value;
    var sel2 = document.getElementById('sel2').value;
    var combustible_previsto = document.getElementById('combustible_previsto').value;
    var costo_real = document.getElementById('costo_real').value;

    //expresiones regulares
    var regexnum = /([0-9]+(\.|\,?)[0-9]{0,2})/;
    var regextime = /\d\d\:(0\d|1\d|2\d|3\d|4\d|5\d)\:(0\d|1\d|2\d|3\d|4\d|5\d)/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;
    
    if (idViaje == "") {
        mensaje += "<p>Campo 'Viaje' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(idViaje)) {
            mensaje += "<p>Campo 'Viaje' inv&aacute;lido.</p>";
            error++;
        }
    }

    if (idCliente == "") {
        mensaje += "<p>Campo 'Cliente' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(idCliente)) {
            mensaje += "<p>Campo 'Cliente' inv&aacute;lido.</p>";
            error++;
        }
    }

    if (tiempo_estimado == "") {
        mensaje += "<p>Campo 'Tiempo' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regextime).test(tiempo_estimado)) {
            mensaje += "<p>Campo 'Tiempo' inv&aacute;lido (Formato 23:59:59).</p>";
            error++;
        }
    }

    if (km_previstos == "") {
        mensaje += "<p>Campo 'Km Previstos' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(km_previstos)) {
            mensaje += "<p>Campo 'Km Previstos' inv&aacute;lido.</p>";
            error++;
        }
    }

    if (aceptado == "") {
        mensaje += "<p>Campo 'Aceptado' vac&iacute;o.</p>";
        error++;
    }
    
    if (sel2 == "") {
        mensaje += "<p>Campo 'Estado' vac&iacute;o.</p>";
        error++;
    }
    
    if (combustible_previsto == "") {
        mensaje += "<p>Campo 'Combustible Previsto' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(combustible_previsto)) {
            mensaje += "<p>Campo 'Combustible Previsto' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (costo_real == "") {
        mensaje += "<p>Campo 'Costo' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(costo_real)) {
            mensaje += "<p>Campo 'Costo' inv&aacute;lido.</p>";
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
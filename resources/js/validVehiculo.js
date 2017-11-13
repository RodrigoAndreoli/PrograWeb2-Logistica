function validar() {
    var marca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var selVehi = document.getElementById('tipo_vehiculo').value;
    var patente = document.getElementById('patente').value;
    var num_chasis = document.getElementById('nro_chasis').value;
    var num_motor = document.getElementById('nro_motor').value;
    var anio = document.getElementById('anio').value;
    var kilometros = document.getElementById('kilometros').value;

    //expresiones regulares
    var regexnum = /([0-9]+(\.|\,?)[0-9]{0,2})/;
    var regexstr = /\b([A-Z]*[a-z]+)+\b/;
    var regexanio = /(19|20)\d{2}/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;

    if (marca == "") {
        mensaje += "<p>Campo 'Marca' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexstr).test(marca)) {
            mensaje += "<p>Campo 'Marca' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (modelo == "") {
        mensaje += "<p>Campo 'Modelo' vac&iacute;o.</p>";
        error++;
    }

    if (selVehi == "") {
        mensaje += "<p>Campo 'Tipo Vehiculo' vac&iacute;o.</p>";
        error++;
    }
    
    if (patente == "") {
        mensaje += "<p>Campo 'Patente' vac&iacute;o.</p>";
        error++;
    }
    
    if (num_chasis == "") {
        mensaje += "<p>Campo 'Numero de Chasis' vac&iacute;o.</p>";
        error++;
    }
    
    if (num_motor == "") {
        mensaje += "<p>Campo 'Numero de Motor' vac&iacute;o.</p>";
        error++;
    }
    
    if (anio == "") {
        mensaje += "<p>Campo 'A&ntilde;o' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexanio).test(anio)) {
            mensaje += "<p>Campo 'A&ntilde;o' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (kilometros == "") {
        mensaje += "<p>Campo 'Kilometros' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(kilometros)) {
            mensaje += "<p>Campo 'Marca' inv&aacute;lido.</p>";
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
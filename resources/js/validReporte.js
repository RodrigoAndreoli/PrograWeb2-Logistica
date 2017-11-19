function habilitarCombustible() {
    var motivo = document.getElementById('motivo').value;
    var combustible = document.getElementById('combustible');
    if(motivo == "Parada Tecnica"){
        combustible.disabled = false;
    } else {
        combustible.value = "";
        combustible.disabled = true;
    }
}

function validar() {
    var motivo = document.getElementById('motivo').value;
    var km = document.getElementById('km').value;
    var combustible = document.getElementById('combustible').value;
    var descripcion = document.getElementById('descripcion').value;
    
    //expresiones regulares
    var regexstr = /\b([A-Z]*[a-z]+)+\b/;
    var regexfecha = /((19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[0-1]))\s(\d\d\:(0\d|1\d|2\d|3\d|4\d|5\d)\:(0\d|1\d|2\d|3\d|4\d|5\d))/;
    var regexnum = /([0-9]+(\.|\,?)[0-9]{0,2})/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;

    if (motivo == "") {
        mensaje += "<p>Campo 'Motivo' vac&iacute;o.</p>";
        error++;
    }
    
    if (km == "") {
        mensaje += "<p>Campo 'Kilometros' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(km)) {
            mensaje += "<p>Campo 'Kilometros' inv&aacute;lido.</p>";
            error++;
        }
    }

    if (combustible == "") {
        mensaje += "<p>Campo 'Combustible' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(combustible)) {
            mensaje += "<p>Campo 'Combustible' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (descripcion == "") {
        mensaje += "<p>Campo 'Descripcion' vac&iacute;o.</p>";
        error++;
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
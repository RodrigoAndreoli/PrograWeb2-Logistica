
function validar() {
    
    var fecha_entrada = document.getElementById('fecha_entrada').value;
    var fecha_salida = document.getElementById('fecha_salida').value;
    var costo = document.getElementById('costo').value;
    var repuestos = document.getElementById('repuestos').value;
    var externo = document.getElementById('externo').value;

    //expresiones regulares
    var regexnum = /([0-9]+(\.|\,?)[0-9]{0,2})/;
    var regexstr = /\b([A-Z]*[a-z]+)+\b/;
    var regexfecha = /(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[0-1])/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;

   

    if (fecha_entrada == "") {
        mensaje += "<p>Campo 'Fecha Entrada' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexfecha).test(fecha_entrada)) {
            mensaje += "<p>La fecha debe ser en formato YYYY-MM-DD (Entre el a&ntilde;o 1900 y el 2099).</p>";
            error++;
        }
    }

    if (fecha_salida == "") {
        mensaje += "<p>Campo 'Fecha Salida' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexfecha).test(fecha_salida)) {
            mensaje += "<p>La fecha debe ser en formato YYYY-MM-DD (Entre el a&ntilde;o 1900 y el 2099).</p>";
            error++;
        }
    }

    

    if (costo == "") {
        mensaje += "<p>Campo 'Costo' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(costo)) {
            mensaje += "<p>Campo 'Costo' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (repuestos == "") {
        mensaje += "<p>Campo 'Repuestos' vac&iacute;o.</p>";
        error++;
    }
    
    if (externo == "") {
        mensaje += "<p>Campo 'Externo' vac&iacute;o.</p>";
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
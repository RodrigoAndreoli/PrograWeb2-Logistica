function validar() {
    var nombre = document.getElementById('nombre').value;
    var tipo_doc = document.getElementById('tipo_doc').value;
    var pass = document.getElementById('pass').value;
    var num_doc = document.getElementById('num_doc').value;
    var sel1 = document.getElementById('sel1').value;
    var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;

    //expresiones regulares
    var regexnum = /([0-9]+)/;
    var regexstr = /\b([A-Z]*[a-z]+)+\b/;
    var regexfecha = /(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[0-1])/;
    
    //variables auxiliares
    var mensaje = "";
    var error = 0;

    if (nombre == "") {
        mensaje += "<p>Campo 'Nombre y Apellido' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexstr).test(nombre)) {
            mensaje += "<p>Campo 'Nombre' inv&aacute;lido.</p>";
            error++;
        }
    }
    
    if (tipo_doc == "") {
        mensaje += "<p>Campo 'Tipo Documento' vac&iacute;o.</p>";
        error++;
    }

    if (pass == "") {
        mensaje += "<p>Campo 'Password' vac&iacute;o.</p>";
        error++;
    } else {
        if (pass.length < 4 || pass.length > 10) {
            mensaje += "<p>La Password debe tener entre 4 y 10 caracteres.</p>";
            error++;
        }
    }

    if (num_doc == "") {
        mensaje += "<p>Campo 'Numero Documento' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexnum).test(num_doc)) {
            mensaje += "<p>Campo 'Numero Documento' inv&aacute;lido.</p>";
            error++;
        }
    }

    if (sel1 == "") {
        mensaje += "<p>Campo 'Rol' vac&iacute;o.</p>";
        error++;
    }

    if (fecha_nacimiento == "") {
        mensaje += "<p>Campo 'Fecha de Nacimiento' vac&iacute;o.</p>";
        error++;
    } else {
        if (!(regexfecha).test(fecha_nacimiento)) {
            mensaje += "<p>La fecha debe ser en formato YYYY-MM-DD (Entre el a&ntilde;o 1900 y el 2099).</p>";
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
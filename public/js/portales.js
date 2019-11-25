
function ingresar_p(tipo) {
    var host = window.location.protocol + "//" + window.location.host + "/";

    $.post(host + 'Index/ingreso_p', {codigo: tipo}, function (datos) {
        if (datos.carga) {
            $('#llave'+tipo).html('<input type="hidden" name="llave" value="'+datos.llave+'"><input type="hidden" name="usuario" value="'+datos.codigo+'"><input type="hidden" name="documento" value="'+datos.documento+'">');
            document.getElementById("form_consulta"+tipo).submit();
            $('#llave'+tipo).html('');
        }
        //console.log(datos);
    }, 'json');
}

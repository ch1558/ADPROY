function agregarModal(titulo_anteproyecto, resumen_anteproyecto, codigo_modalidad, codigo_grupo, tema, codigo_anteproyecto) {
    $('#editar').modal('show');
    document.getElementById("titulo").value = titulo_anteproyecto;
    document.getElementById("resumen").value = resumen_anteproyecto;
    document.getElementById("modalidad").value = codigo_modalidad;
    document.getElementById("grupo").value = codigo_grupo;
    document.getElementById("tema").value = tema;
    document.getElementById("codigo").value = codigo_anteproyecto;
    document.getElementById("editable").value = '1';
}

function agregarCodigo(codigo_anteproyecto){
    document.getElementById("codigo").value = codigo_anteproyecto;
}

function verificarAnteproyecto(titulo_anteproyecto, resumen_anteproyecto, modalidad, grupo, tema, codigo_anteproyecto, directores, autores){
    document.getElementById("codigo").value = codigo_anteproyecto;
    document.getElementById("titulo").innerHTML = titulo_anteproyecto;
    document.getElementById("resumen").innerHTML = resumen_anteproyecto;
    document.getElementById("modalidad").innerHTML = modalidad;
    document.getElementById("grupo").innerHTML = grupo;
    document.getElementById("tema").innerHTML = tema;
    document.getElementById("directores").innerHTML = directores;
    document.getElementById("autores").innerHTML = autores;
}

function documentos(codigo,ugad,ante,comite){
    document.getElementById("code").value = codigo;

    if(ante == '1'){
        document.getElementById("boolante").innerHTML = '(documento no ha sido cargado)';
    }else{
        document.getElementById("boolante").innerHTML = '(documento ya fue cargado)';
    }

    if(ugad == '1'){
        document.getElementById("boolugad").innerHTML = '(documento no ha sido cargado)';
    }else{
        document.getElementById("boolugad").innerHTML = '(documento ya fue cargado)';
    }

    if(comite == '2'){
        document.getElementById("send").disabled = false;
    }else{
        document.getElementById("send").disabled = true;
    }
}
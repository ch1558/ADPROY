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

function verificarAnteproyecto(titulo_anteproyecto, resumen_anteproyecto, codigo_modalidad, codigo_grupo, codigo_tema, codigo_anteproyecto, codigo_persona){
    document.getElementById("codigo").innerHTML = codigo_anteproyecto;
    document.getElementById("titulo").innerHTML = titulo_anteproyecto;
    document.getElementById("resumen").innerHTML = resumen_anteproyecto;
    document.getElementById("modalidad").innerHTML = codigo_modalidad;
    document.getElementById("grupo").innerHTML = codigo_grupo;
    document.getElementById("tema").innerHTML = codigo_tema;
    document.getElementById("director").innerHTML = codigo_persona;
}